@extends('layouts.index')
@section('container')
    <h1>Add Order</h1>
    <a href="/orders">Back to orders</a>

    <form action="/orders" method="post" class="mt-4">
        @csrf
        <table class="table" style="max-width: 1000px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Item Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $index => $item)
                    <tr>
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <input type="number" class="form-control" min="1" max="{{ $item->stock }}" name="{{ $item->id }}_quantity" disabled>
                        </td>
                        <td>
                            <input type="checkbox" class="form-check-input" name="{{ $item->id }}_select">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary">Add order</button>
    </form>
    <script>
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    
        checkboxes.forEach(check => {
            check.addEventListener('input', function(){
                const [itemId, inputName] = check.name.split('_');

                const numberInput = document.querySelector(`input[type='number'][name='${itemId}_quantity']`); 
                if(check.checked){
                    numberInput.disabled = false;
                    numberInput.value = 1;
                }else {
                    numberInput.disabled = true;
                    numberInput.value = null;
                }
            });
        });
    </script>
@endsection
