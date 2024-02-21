@extends('layouts.app')
@section('content')
<div class="container">

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav">
      <a class="nav-item nav-link "href="{{route('admin.home')}}">Dashboard <span class="sr-only"></span></a>
      <a class="nav-item nav-link " href="{{route('admin.viewbooks')}}">View books</a>
      <a class="nav-item nav-link active" href="{{route('admin.addbook')}}">Add book</a>
    </div>
  </div>
</nav>

    <div class="row justify-content-center">
        <div class="col-md-8">
            
          
  <h1>Add Book</h1>

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
  <form action="{{route('admin.savebook')}}" method="post">
  @csrf
    <div class="form-group">
      <label for="name">Book name</label>
      <input class="form-control" id="name" type="text" name="book_name">
    </div>
    <div class="form-group">
      <label for="code">Sku code</label>
      <input class="form-control" id="text" type="text" name="sku_code">
    </div>
    <div class="form-group">
      <label for="message">Author</label>
      <input class="form-control" id="name" type="text" name="author">
    </div>
    <div class="form-group">
      <label for="message">Quantity</label>
      <input class="form-control" id="name" type="number" name="qty">
    </div>
    <br>
    <input class="btn btn-primary" type="submit" value="Submit" />
    </div>
  </form>

           
        </div>
    </div>
</div>
@endsection