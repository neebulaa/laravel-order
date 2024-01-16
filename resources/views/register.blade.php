@extends('layouts.index')

@section('container')
<form class="w-100" action="/register" method="POST">
    @csrf
    <h1 class="mb-4">Registration Form</h1>

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
      @error('name')
        <p class="text-danger mt-1">{{ $message }}</p>
      @enderror
    </div>
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
    <button type="submit" class="btn btn-primary mt-3">Register</button>
    <a href="/login" class="d-block mt-1">Already have account? Login here!</a>
</form>
@endsection