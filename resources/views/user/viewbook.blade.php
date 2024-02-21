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
            
          
  <h1>View book</h1>
  <table style="border 2px solid">
      <tr>
          <td>
              Book name :
          </td>
          <td>
              {{$book->book_name}}
          </td>
      </tr>

      <tr>
          <td>
              Book SKU :
          </td>
          <td>
              {{$book->sku_code}}
          </td>
      </tr>

      <tr>
          <td>
              Author :
          </td>
          <td>
              {{$book->author}}
          </td>
      </tr>
  </table>

<br>
<h3>Reviews</h3>
<div class="container">
                <ul>
                    @foreach ($book->reviews as $r)
                        <li>{{ $r->review }}</li>
                    @endforeach
                </ul>
            </div>


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





    </div>
</div>
@endsection