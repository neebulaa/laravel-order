@extends('layouts.index')
<style>
    .invoice {
        background: #fff;
        padding: 20px
    }

    .invoice-company {
        font-size: 20px
    }

    .invoice-header {
        margin: 0 -20px;
        background: #f0f3f4;
        padding: 20px
    }

    .invoice-date,
    .invoice-from,
    .invoice-to {
        display: table-cell;
        width: 1%
    }

    .invoice-from,
    .invoice-to {
        padding-right: 20px
    }

    .invoice-date .date,
    .invoice-from strong,
    .invoice-to strong {
        font-size: 16px;
        font-weight: 600
    }

    .invoice-date {
        text-align: right;
        padding-left: 20px
    }

    .invoice-price {
        background: #f0f3f4;
        display: table;
        width: 100%
    }

    .invoice-price .invoice-price-left,
    .invoice-price .invoice-price-right {
        display: table-cell;
        padding: 20px;
        font-size: 20px;
        font-weight: 600;
        width: 75%;
        position: relative;
        vertical-align: middle
    }

    .invoice-price .invoice-price-left .sub-price {
        display: table-cell;
        vertical-align: middle;
        padding: 0 20px
    }

    .invoice-price small {
        font-size: 12px;
        font-weight: 400;
        display: block
    }

    .invoice-price .invoice-price-row {
        display: table;
        float: left
    }

    .invoice-price .invoice-price-right {
        width: 25%;
        background: #2d353c;
        color: #fff;
        font-size: 28px;
        text-align: right;
        vertical-align: bottom;
        font-weight: 300
    }

    .invoice-price .invoice-price-right small {
        display: block;
        opacity: .6;
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 12px
    }

    .invoice-footer {
        border-top: 1px solid #ddd;
        padding-top: 10px;
        font-size: 10px
    }

    .invoice-note {
        color: #999;
        margin-top: 80px;
        font-size: 85%
    }

    .invoice>div:not(.invoice-footer) {
        margin-bottom: 20px
    }

    .btn.btn-white,
    .btn.btn-white.disabled,
    .btn.btn-white.disabled:focus,
    .btn.btn-white.disabled:hover,
    .btn.btn-white[disabled],
    .btn.btn-white[disabled]:focus,
    .btn.btn-white[disabled]:hover {
        color: #2d353c;
        background: #fff;
        border-color: #d9dfe3;
    }
</style>

@section('container')
<div class="invoice">
    <div class="d-flex justify-content-between gap-2 align-items-center">
        <div class="invoice-company text-inverse f-w-600"> <span class="pull-right hidden-print"></span>{{ ucwords($order->buyer->name) }}'s Order</div>
        <p>{{ $order->created_at }}</p>
    </div>

    <div class="invoice-content">
        <div class="table-responsive">
            <table class="table table-invoice">
                <thead>
                    <tr>
                        <th>ITEMS</th>
                        <th class="text-center" width="10%">PRICE</th>
                        <th class="text-center" width="10%">QTY</th>
                        <th class="text-right" width="20%">LINE TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->order_details as $detail)
                        <tr>
                            <td> <span class="text-inverse">{{ $detail->item->name }}</span><br> <small>{{ $detail->item->type }}</small></td>
                            <td class="text-center">${{ $detail->item->price }}</td>
                            <td class="text-center">{{ $detail->quantity }}</td>
                            <td class="text-right">${{ round( $detail->item->price * $detail->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="invoice-price">
            <div class="invoice-price-left">
                @php
                    $total = $order->order_details->reduce(fn($acc, $curr) => $acc + ($curr->item->price * $curr->quantity));
                    $tax_rate = 1; // in percent
                    $tax = round($total * ($tax_rate / 100), 2);
                @endphp
                <div class="invoice-price-row">
                    <div class="sub-price"> <small>SUBTOTAL</small> <span class="text-inverse">${{ $total }}</span></div>
                    <div class="sub-price"> <i class="fa fa-plus text-muted"></i></div>
                    <div class="sub-price"> <small>TAX ({{ $tax_rate }}%)</small> <span class="text-inverse">${{ $tax }}</span></div>
                </div>
            </div>
            <div class="invoice-price-right"> <small>TOTAL</small> <span class="f-w-600">${{ round($total + $tax ,2) }}</span></div>
        </div>
    </div>
    <div class="invoice-note"> * Make all cheques payable to [Laravel Order]<br> * If you have any questions concerning this invoice, contact [Edwin Hendly, +62894759203, edwinhendly17@gmail.com]</div>   
    <div class="invoice-footer">
        <p class="text-center m-b-5 f-w-600"> THANK YOU FOR YOUR ORDER</p>
    </div>
</div>
@endsection