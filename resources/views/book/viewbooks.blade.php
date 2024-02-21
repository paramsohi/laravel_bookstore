@extends('layouts.app')
@section('content')
<div class="container">

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav">
      <a class="nav-item nav-link "href="{{route('admin.home')}}">Dashboard <span class="sr-only"></span></a>
      <a class="nav-item nav-link active" href="{{route('admin.viewbooks')}}">View books</a>
      <a class="nav-item nav-link " href="{{route('admin.addbook')}}">Add book</a>
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




        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S.R.</th>
                                        <th>Book Name</th>
                                        <th>SKU Code</th>
                                        <th>Author</th>
                                        <th>Quanity</th>
                            
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

                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>        


           
        </div>
    </div>
</div>
@endsection