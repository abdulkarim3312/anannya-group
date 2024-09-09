@extends('layouts.app')
@section('title')
    Sale Receipt Details
@endsection
@section('style')
    <style>
        hr.hrbold {
            border: 1px solid red;
        }
    </style>
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 ">
                            <a style="float: right;" target="_blank"
                               href="{{ route('sale_receipt.print', ['order' => $order->id]) }}" class="btn btn-primary"><i
                                    class="fa fa-print"></i>Print</a>
                            <a style="float: right; margin-right: 5px !important" target="_blank"
                               href="{{ route('sale_receipt.print_with_header', ['order' => $order->id]) }}"
                               class="btn btn-primary"><i class="fa fa-print"></i>Print With Header</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center col-md-offset-1">
                            {{--                            <img src="{{ asset('img/logo.png') }}" height="70" width="300px" style="margin-top: 10px"> --}}
                            <h1>FAZLE RABBI ENTERPRISE</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2><b>Invoice</b></h2>
                        </div>
                    </div>
                    <hr class="hrbold">
                    <div class="row ">
                        <div class="col-md-7 pl-5">
                            <h5>{{ $order->client->name ?? '' }}</h5>
                            <p style="line-height: 0.5;">{{ $order->client->address ?? '' }}</p>
                            <p style="line-height: 0.5;"> {{ $order->client->mobile ?? '' }}</p>
                        </div>
                        <div class="col-md-5 pr-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <p> <b>Order No</b></p>
                                    <p style="line-height: 0.5;"><b>Date</b></p>
                                    <p style="line-height: 0.5;"><b>Received By</b> </p>
                                    <p style="line-height: 0.5;"><b>Note</b> </p>
                                </div>
                                <div class="col-md-1">
                                    <p><b>:</b></p>
                                    <p><b>:</b></p>
                                    <p><b>:</b></p>
                                </div>
                                <div class="col-md-7">
                                    <p> {{ $order->sr_order_no }}</p>
                                    <p style="line-height: 0.5;">{{ $order->date }}</p>
                                    <p style="line-height: 0.5;"> {{ $order->user->name ?? '' }}</p>
                                    <p style="line-height: 0.5;">{{ $order->note ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (count($order->products) > 0)
                        <div class="row">
                            <div class="col-md-12" style="margin-top: 20px">
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Sl</th>
                                        <th class="text-center">Product</th>
                                        <th class="text-center">Qty/Pcs</th>
                                        <th class="text-center">Unit</th>
                                        <th class="text-center">Rate</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($order->products->groupBy('product.name') as $productName => $products)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $productName }}</td>
                                            <td class="text-center">
                                                @php
                                                    $quantity = 0;
                                                @endphp
                                                @foreach ($products as $product)
                                                    @php
                                                        $quantity = $quantity + $product->quantity;
                                                    @endphp
                                                @endforeach
                                                {{ $quantity }}
                                            </td>
                                            <td class="text-center">{{ $product->product->unit->name ?? '' }}</td>
                                            <td class="text-right">৳{{ number_format($product->selling_price, 2) }}
                                            </td>
                                            <td class="text-right">
                                                ৳{{ number_format($product->selling_price * $quantity, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="offset-7 col-md-5 ">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Sub Total</th>
                                    <td>৳ {{ number_format($order->sub_total, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Regular Commission</th>
                                    <td class="">৳{{ number_format($order->regular_commission, 2) }}@if ($order->regular_commission_percentage > 0)
                                            ({{ $order->regular_commission_percentage }}%)
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Sub Total(deduct commission)</th>
                                    <td>৳ {{ number_format($order->sub_total - $order->regular_commission, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Extra Commission</th>
                                    <td class="">৳{{ number_format($order->extra_commission, 2) }}@if ($order->extra_commission_percentage > 0)
                                            ({{ $order->extra_commission_percentage }}%)
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Discount</th>
                                    <td class="">৳{{ number_format($order->discount, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td class="">৳{{ number_format($order->total, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Paid</th>
                                    <td>৳ {{ number_format($order->paid, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Due</th>
                                    <td>৳ {{ number_format($order->due, 2) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('#table-payments').DataTable({
                "order": [
                    [0, "desc"]
                ],
            });
        });
    </script>
@endsection
