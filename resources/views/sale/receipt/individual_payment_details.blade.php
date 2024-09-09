@extends('layouts.app')

@section('style')
    <style>
        #receipt-content{
            font-size: 18px;
        }

        .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
            border: 1px solid black !important;
        }
    </style>
@endsection

@section('title')
    Payment Details
@endsection

@section('content')
    <div class="row" id="receipt-content">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary" onclick="getprint('printarea')">Print</button>
                        </div>
                    </div>

                    <hr>

                    <div id="printarea">
                        <div class="row">
                            <div class="col-sm-4">
                                <h2 style="margin: 0px; float: left">RECEIPT</h2>
                            </div>

                            <div class="col-sm-4 text-center">
                                <b>Date: </b> {{ $payment->date}}
                            </div>

                            <div class="col-sm-4 text-right">
                                <b>Receipt Payment No: </b> {{ $payment->receipt_payment_no }}
                            </div>
                        </div>

                        <div class="row" style="margin-top: 20px">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="10%">Amount</th>
                                        <td width="15%" colspan="4">৳{{ number_format($payment->amount, 2) }}</td>
                                    </tr>

                                    <tr>
                                        <th>Amount (In Word)</th>
                                        <td colspan="4">{{ $payment->amount_in_word }}</td>
                                    </tr>

                                    <tr>
                                        <th>Paid By</th>
                                        <td colspan="2">
                                            @if($payment->transaction_method == 1)
                                                Cash
                                            @elseif($payment->transaction_method == 3)
                                                Mobile Banking
                                            @else
                                                Bank
{{--                                                Bank - {{ $payment->bank->name.' - '.$payment->branch->name.' - '.$payment->account->account_no ?? '' }}--}}
                                            @endif
                                        </td>
                                        <td>Cheque no</td>
                                        <td>{{$payment->cheque_no??''}}</td>
                                    </tr>

                                    @if($payment->transaction_method == 2)
                                        <tr>
                                            <th>Cheque No.</th>
                                            <td colspan="4">{{ $payment->cheque_no }}</td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <th>Note</th>
                                        <td colspan="4">{{ $payment->notes }}</td>
                                    </tr>


                                    @if($payment->transaction_method == 2)
                                        <tr>
                                            <th>Cheque Image</th>
                                            <td colspan="4" class="text-center">
                                                <img src="{{ asset($payment->cheque_image) }}" height="300px">
                                            </td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var APP_URL = '{!! url()->full()  !!}';
        function getprint(print) {

            $('body').html($('#'+print).html());
            window.print();
            window.location.replace(APP_URL)
        }
    </script>
@endsection

