<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{UserBooks,Book,UserBookReviews};
use Validator;
use Auth;
use DB;
class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addbook()
    {
        return view('book.addbook');
    }

    public function savebook(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'book_name' => 'required',
            'sku_code' => 'required|unique:books,sku_code',
            'author' => 'required',
            'qty' => 'required|integer'
        ]);

        if($validator->fails()){
            return redirect()->back()//->route('login')
            ->withErrors($validator->messages());
       
        } else {
            $input = $request->all();
            $data['sku_code'] = $input['sku_code'];
            $data['book_name'] = $input['book_name'];
            $data['author'] = $input['author'];
            $data['qty'] = $input['qty'];

            Book::insert($data);

            return redirect()->back()->withSuccess('Book added successfully!');
        }
    }

    public function viewbooks(){
        $books = Book::all();
        return view('book.viewbooks', compact(array('books')));
       
    }

    public function userviewbooks(Request $request){
        $search = NULL;
        $input = $request->all();
        $books = Book::where('book_name','!=','');
        if(isset($input['search']) && $input['search'] != ''){
            $search=$input['search'];
            // dd('ddd');
            $books =  $books->where('book_name', 'like', '%'.$search.'%')
           ->orwhere('author', 'like', '%'.$search.'%');
        }
        $books =  $books->get();
        return view('user.viewbooks', compact(array('books','search')));
       
    }
    public function bookinhand(){
        // return Auth::user()->name;
        // return Auth::id();

        $books = UserBooks::where('user_id',Auth::id())->with(['book'])->get();
        // $books = Book::all();
         return view('user.bookinhand', compact(array('books')));
       
    }
    
    public function viewbook($id){
        $book = Book::with(['reviews'])->find($id);
       
        return view('user.viewbook', compact(array('book')));
       
    }

    public function borrow($id){
        $book = Book::find($id);
        if($book && $book->qty >= 1){
            $check = UserBooks::where('user_id',Auth::id())->where('book_id',$book->id)->first();
            if(!$check){
                $data['user_id'] = Auth::id();
                $data['book_id'] = $book->id;
                $data['status'] = 'Borrowed';
                $data['qty'] = 1;
                UserBooks::create($data);

                Book::where('id',$id)
                ->update([
                'qty'=> DB::raw('qty-1')
                ]);
            }else{
                
                    return redirect()->back()//->route('login')
                    ->withErrors('Book already borrowed');
                

            }


            return redirect()->back()->withSuccess('Book borrowed successfully!');
        }else{
            return redirect()->back()//->route('login')
            ->withErrors('Book not available');
        }
       
    }

    public function returnbook($id){
        $book = UserBooks::find($id);
        if($book){

            Book::where('id',$book->book_id)
            ->update([
            'qty'=> DB::raw('qty+1')
            ]);

            $book->delete();

            return redirect()->back()->withSuccess('Book returned successfully!');
        }
       
    }

    public function reviewbook(Request $request){
        $input = $request->all();
        $bookid = $input['book_id'];
        $review = $input['review'];


        $book = Book::find($bookid);
        if($book){
            $check = UserBookReviews::where('user_id',Auth::id())->where('book_id',$book->id)->first();
            if(!$check){
                $data['user_id'] = Auth::id();
                $data['book_id'] = $book->id;
                $data['review'] = $review;

                UserBookReviews::create($data);
            }else{
                UserBookReviews::where('user_id',Auth::id())->where('book_id',$book->id)
                ->update([
                'review'=>$review
                ]);
            }


            return redirect()->back()->withSuccess('Book reviewed successfully!');
        }
    }
}
