@extends('layouts.index')
@section('container')
<h1>All Items</h1>
<a href="/items/create" class="btn btn-primary mt-2">+ Add Item</a>

@if(session()->has('success'))
    <div class="col-md-6 mt-4">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

<style>
    th, td {
        background: transparent !important;
        color: inherit !important;
    }
</style>
<table class="table mt-4" style="max-width: 1000px;">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Type</th>
            <th>Stock</th>
            <th>Price ($)</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $index => $item)
            <tr class="{{ $item->stock == 0 ? 'bg-dark text-white' : '' }}">
                <th>{{ $index + 1 }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->type }}</td>
                <td>
                    {{ $item->stock }}
                </td>
                <td>${{ $item->price }}</td>
                <td>
                    <a href="/items/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/items/{{ $item->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-sm btn-danger" onclick="return confirm('You sure want to delete this item?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection