@extends('layouts.index')
@section('container')
    <h1>All Orders</h1>

    <a href="/orders/create" class="btn btn-primary mt-2">+ Add Order</a>

    @if(session()->has('success'))
    <div class="col-md-6 mt-4">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <table class="table mt-4" style="max-width: 1000px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Buyer Name</th>
                <th>Order time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $index => $order)
                <tr>
                    <th>{{ $index + 1 }}</th>
                    <td>{{ $order->buyer->name }}</td>
                    <td>{{ $order->created_at }} <span class="fst-italic text-secondary">({{ $order->created_at->diffForHumans() }})</span></td>
                    <td>
                        <a href="/orders/{{ $order->id }}" class="btn btn-sm btn-warning">See details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection