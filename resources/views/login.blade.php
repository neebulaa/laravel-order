@extends('layouts.index')

@section('container')
<form class="w-100" action="/login" method="POST">
    @csrf
    <h1 class="mb-4">Login Form</h1>

    {{-- login failed --}}
    @if(session()->has('login_failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('login_failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
      @error('email')
        <p class="text-danger mt-1">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
        @error('password')
            <p class="text-danger mt-1">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-3">Login</button>
    <a href="/register" class="d-block mt-1">Dont have account yet? Register here!</a>
</form>
@endsection