@extends('layouts.app')
@section('content')


<div class="modal" tabindex="-1" role="dialog" id="reviewmodal">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      
        <h4 class="modal-title" id="myModalLabel">Add Review</h4>
      </div>
      <div class="modal-body">

      <form method="POST" action="{{route('reviewbook')}}">
          @csrf
        <label for="">Add review for book</label>
        <textarea name="review" required id="textareaID" class="form-control"></textarea>

        <input type="hidden" id="book_id" name="book_id" value="">
   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>

      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<div class="container">

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav">
  <a class="nav-item nav-link "href="{{route('home')}}">Dashboard <span class="sr-only"></span></a>
    <a class="nav-item nav-link " href="{{route('userviewbooks')}}">Book list</a>
    <a class="nav-item nav-link active" href="{{route('bookinhand')}}">Book in hand</a>
    </div>
  </div>
</nav>

    <div class="row justify-content-center">
        <div class="col-md-8">
            
          
  <h1>Books in hand</h1>

  @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if(session('success'))
        <div class="alert alert-success">
        <ul>
        <li>{{session('success')}}</li>
        </ul>
        </div>
        @endif




        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S.R.</th>
                                        <th>Book Name</th>
                                        <th>SKU Code</th>
                                        <th>Author</th>
                                        <th>Qty</th>
                                        <th>status</th>
                                        <th>Action</th>
                            
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($books as $key=>$val)
                                    <tr id="{{$val->id}}">
                                        <td>{{$key+1}}</td>
                                        <td>{{$val->book->book_name}}</td>
                                        <td>{{$val->book->sku_code}}</td>
                                        <td>{{$val->book->author}}</td>
                                        <td>{{$val->qty}}</td>
                                        <td>Borrowed</td>
                                        <td>
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Action
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/book/{{$val->id}}/return">Return</a>
    <a class="dropdown-item" href="/book/{{$val->book->id}}/view">View</a>
    <a class="dropdown-item reviewbook" data-id="{{$val->book->id}}"  data-toggle="modal" data-target="#reviewmodal">Review</a>

  </div>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>        


           
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
  $(".reviewbook").click(function () {
   let bookid = $(this).attr('data-id');
        $("#book_id").val(bookid);
  });
});

</script>
@endsection