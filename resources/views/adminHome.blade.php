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
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
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
                    You are in admin dashboard.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection