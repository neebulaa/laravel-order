@extends('layouts.index')
@section('container')
<h1>Add new item</h1>
<a href="/items">Back to items</a>


<form class="w-100 mt-4" style="max-width: 400px" action="/items" method="POST">
    @csrf
    
    @if(session()->has('login_failed'))
        <div class="alert mt-4 alert-danger alert-dismissible fade show" role="alert">
            {{ session('login_failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="mb-3">
      <label for="name" class="form-label">Item name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
      @error('name')
        <p class="text-danger mt-1">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Item Type</label>
        <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
            <option value="" {{ old('type') == '' ? 'selected' : '' }}>Choose type</option>
            <option value="goods" {{ old('type') == 'goods' ? 'selected' : '' }}>Goods</option>
            <option value="service" {{ old('type') == 'service' ? 'selected' : '' }}>Service</option>
        </select>
        @error('type')
            <p class="text-danger mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <div class="input-group">
            <span class="input-group-text">Qty</span>
            <input type="number" min="0" class="form-control @error('stock') is-invalid @enderror" name="stock" min="1" value="{{ old('stock', 0) }}">
        </div>
        @error('stock')
            <p class="text-danger mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Item Price</label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" min="0" step="any" value="{{ old('price', 0) }}">
        </div>
        @error('price')
            <p class="text-danger mt-1">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-3">Add Item</button>
</form>
@endsection