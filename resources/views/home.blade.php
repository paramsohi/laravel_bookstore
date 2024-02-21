@extends('layouts.app')
@section('content')
<div class="container">

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <a class="nav-item nav-link "href="{{route('home')}}">Dashboard <span class="sr-only"></span></a>
    <a class="nav-item nav-link " href="{{route('userviewbooks')}}">Book list</a>
    <a class="nav-item nav-link " href="{{route('userviewbooks')}}">Book in hand</a>
   
    </div>
  </div>
</nav>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome   {{ Auth::user()->name }}</div>
                <div class="card-body">
                    @if(session('login-success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('login-success') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are in user dashboard.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection