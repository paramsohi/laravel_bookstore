@extends('layouts.app')
@section('content')








<div class="container">

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav">
  <a class="nav-item nav-link "href="{{route('home')}}">Dashboard <span class="sr-only"></span></a>
    <a class="nav-item nav-link active" href="{{route('userviewbooks')}}">Book list</a>
    <a class="nav-item nav-link " href="{{route('bookinhand')}}">Book in hand</a>
    </div>
  </div>
</nav>

    <div class="row justify-content-center">
        <div class="col-md-8">
            
          
  <h1>View all books</h1>

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



       
        <form method="GET" action="{{route('userviewbooks')}}">
                            <div class="form-group row">
                                <div class="col-md-6">
                                <input type="search" id="search" name="search" placeholder="Search ..." value="{{!empty($search) ? $search : ''}}" class="form-control">
                                </div>
                            
                          
                        
                           
                            <div class="col-md-4">
                                <button type="submit" id="btn-search" style="margin-top: 6px; margin-left: 15px;" class="btn btn-info" type="submit">Go</button>
                                @if(!empty($search))
                                <a href="{{route('userviewbooks')}}" style="margin-top: 6px; margin-left: 15px;" class="btn btn-primary" type="submit">Clear</a>
                                @endif    
                            </div>    
                            </div>                        
                                           
                        </form>
        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S.R.</th>
                                        <th>Book Name</th>
                                        <th>SKU Code</th>
                                        <th>Author</th>
                                        <th>Quanity</th>
                                        <th>Action</th>
                            
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($books as $key=>$val)
                                    <tr id="{{$val->id}}">
                                        <td>{{$key+1}}</td>
                                        <td>{{$val->book_name}}</td>
                                        <td>{{$val->sku_code}}</td>
                                        <td>{{$val->author}}</td>
                                        <td>{{$val->qty}}</td>
                                        <td>
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Action
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/book/{{$val->id}}/view">View</a>
    <a class="dropdown-item" href="/book/{{$val->id}}/borrow">Borrow</a>

    <!-- /book/{{$val->id}}/review -->

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



@endsection