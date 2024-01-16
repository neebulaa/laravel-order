@extends('layouts.index')
@section('container')
    <h1>All Buyers</h1>
    <table class="table mt-4" style="max-width: 1000px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buyers as $index => $buyer)
                <tr>
                    <th>{{ $index + 1 }}</th>
                    <td>{{ $buyer['name'] }}</td>
                    <td>{{ $buyer['email'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection