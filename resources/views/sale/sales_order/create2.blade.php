@extends('layouts.app')
@section('title','Sales')

@section('style')
    <style>
        .form-control {
            width: 100%;
        }
        input.form-control.service_customer_name {
            width: 138px !important;
        }
        input.form-control.service_customer_mobile {
            width: 138px !important;
        }
        input.form-control.service_customer_address {
            width: 138px !important;
        }
        input.form-control.service_customer_email {
            width: 138px !important;
        }
        select.form-control.zone {
            width: 138px !important;
        }
        select.form-control.product {
            width: 138px !important;
        }
        input.form-control.selling_price{
            width: 130px;
        }
        input.form-control.stock{
            width: 130px;
        }
        input.form-control.quantity{
            width: 130px;
        }
        input.form-control.single_customer_quantity{
            width: 130px;
        }
        th {
            text-align: center;
        }
        select.form-control {
            min-width: 130px;
        }
        .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
            vertical-align: middle;
        }
        td .form-group {
            margin-bottom: 0;
        }
    </style>
@endsection


@section('content')
    <form method="POST" enctype="multipart/form-data"  action="{{ route('sales_order.create') }}">
        @csrf

        <div class="row" id="all-technician-area">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Order Information</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('sale_type') ? 'has-error' :'' }}">
                                    <label>Sale Type <span class="text-danger">*</span></label>
                                    <select class="form-control" id="sale_type" name="sale_type">
                                        <option {{ old('sale_type') == 1 ? 'selected' : '' }} value="1">Normal Sale</option>
                                        <option {{ old('sale_type') == 2 ? 'selected' : '' }} value="2">Booking Sale</option>
                                    </select>
                                    @error('sale_type')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3" id="sale_type_area">
                                <div class="form-group {{ $errors->has('booking') ? 'has-error' :'' }}">
                                    <label>Booking Customer</label>

                                    <select class="form-control booking select2" style="width: 100%;" name="booking">
                                        <option value="">Select Customer</option>
                                        @foreach($bookings as $booking)
                                            @if($booking->quantity >($booking->delivery_quantity+$booking->cancel_quantity))
                                            <option value="{{ $booking->id }}" {{ old('booking') == $booking->id ? 'selected' : '' }}>{{ $booking->customer->name }} ({{$booking->order_no}}) {{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y')}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('booking')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('date') ? 'has-error' :'' }}">
                                    <label>Date</label>

                                    <div class="input-group date">
                                        <input type="text" class="form-control pull-right date-picker" id="date" name="date" value="{{ empty(old('date')) ? ($errors->has('date') ? '' : date('d-m-Y')) : old('date') }}" autocomplete="off">
                                    </div>
                                    <!-- /.input group -->

                                    @error('date')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('supporting_document') ? 'has-error' :'' }}">
                                    <label for="supporting_document">Supporting Document</label>

                                    <div class="input-group supporting_document">
                                        <input type="file" class="form-control " name="supporting_document">
                                    </div>
                                    <!-- /.input group -->
                                    @error('supporting_document')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row" id="booking-info-area">
                            <div class="col-md-3">
                                <label>Booking Quantity</label>
                                <div class="form-group">
                                  <div class="booking_quantity"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Booking Advance</label>
                                <div class="form-group">
                                  <div class="booking_advance"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="background-color: white">
                <div class="table-responsive-sm">
                    <table class="table table-bordered  table-custom-form">
                        <tbody id="booking-detail-container"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row" id="all-customer-area">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Customer Information</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row" id="customer-type-area">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('customer_type') ? 'has-error' :'' }}">
                                    <label>Customer Type </label>
                                    <select class="form-control" id="customer_type" name="customer_type">
                                        <option {{ old('customer_type') == 1 ? 'selected' : '' }} value="1">New Customer</option>
                                        <option {{ old('customer_type') == 2 ? 'selected' : '' }} value="2">Old Customer</option>

                                    </select>
                                    @error('customer_type')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row" id="old_customer_area">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('customer') ? 'has-error' :'' }}">
                                    <label>Customer</label>

                                    <select class="form-control customer select2" style="width: 100%;" name="customer">
                                        <option value="">Select Customer</option>

                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}" {{ old('customer') == $customer->id ? 'selected' : '' }}>{{ $customer->name.' - '.$customer->mobile_no.' - '.$customer->address }}</option>
                                        @endforeach
                                    </select>

                                    @error('customer')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row" id="new_customer_area">
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('customer_name') ? 'has-error' :'' }}">
                                    <label>Customer Name</label>
                                    <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" class="form-control">
                                    @error('customer_name')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('mobile_no') ? 'has-error' :'' }}">
                                    <label>Customer Mobile</label>
                                    <input type="text" id="mobile_no" value="{{ old('mobile_no') }}" name="mobile_no" class="form-control" >
                                    @error('mobile_no')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
                                    <label>Customer Address</label>
                                    <input type="text" id="address" value="{{ old('address') }}" name="address" class="form-control"  >
                                    @error('address')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
                                    <label>Email</label>
                                    <input type="email" id="email" value="{{ old('email') }}" name="email" class="form-control"  >
                                    @error('email')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Products</h3>
                    </div>
                    <div class="card-body">
                        <div class="row" id="multiple-customer-sale-type">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-custom-form">
                                        <thead>
                                        <tr>
                                            <th class="text-center" width="25%">Product <span class="text-danger">*</span></th>
                                            <th class="text-center" width="10%">Unit <span class="text-danger">*</span></th>
                                            <th class="text-center" width="5%">Quantity <span class="text-danger">*</span></th>
                                            <th class="text-center" width="10%">Warranty</th>
                                            <th class="text-center" width="20%">Unit Price</th>
                                            <th class="text-center" width="12%">Selling Price <span class="text-danger">*</span></th>
                                            <th class="text-center" width="13%">Total Cost <span class="text-danger">*</span></th>
                                            <th class="text-center" width="5%"></th>
                                        </tr>
                                        </thead>

                                        <tbody id="product-container">
                                        @if (old('product') != null && sizeof(old('product')) > 0)
                                            @foreach(old('product') as $item)
                                                <tr class="product-item">
                                                    <td>
                                                        <div class="form-group product_area {{ $errors->has('product.'.$loop->index) ? 'has-error' :'' }}">
                                                            <select class="form-control select2 product" style="width: 100%;" name="product[]" >
                                                                <option value="">Select Product</option>
                                                                @if (old('product.'.$loop->index) != '')
                                                                    <option value="{{ old('product.'.$loop->index) }}" selected>{{ old('product_name.'.$loop->index) }}</option>
                                                                @endif
                                                            </select>
                                                            <input type="hidden" name="product_name[]" class="product_name" value="{{ old('product_name.'.$loop->index) }}">

                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="unit_name"></div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group {{ $errors->has('quantity.'.$loop->index) ? 'has-error' :'' }}">
                                                            <input type="text" step="any" class="form-control text-center quantity" name="quantity[]" value="{{ old('quantity.'.$loop->index) }}" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group {{ $errors->has('warranty.'.$loop->index) ? 'has-error' :'' }}">
                                                            <input type="text" step="any" class="form-control warranty" name="warranty[]" value="{{ old('warranty.'.$loop->index) }}">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-group {{ $errors->has('unit_price.'.$loop->index) ? 'has-error' :'' }}">
                                                            <input type="text" step="any" class="form-control unit_price" name="unit_price[]" value="{{ old('unit_price.'.$loop->index) }}" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group {{ $errors->has('selling_price.'.$loop->index) ? 'has-error' :'' }}">
                                                            <input type="text" step="any" class="form-control selling_price" name="selling_price[]" value="{{ old('selling_price.'.$loop->index) }}">
                                                        </div>
                                                    </td>
                                                    <td  class="total-cost text-right">0.00</td>
                                                    <td  class="text-center">
                                                        <a role="button" class="btn btn-danger bg-gradient-danger btn-sm btn-remove"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="product-item">
                                                <td>
                                                    <div class="form-group product_area">
                                                        <select class="form-control select2 product" style="width: 100%;" name="product[]" >
                                                            <option value="">Select Product</option>
                                                        </select>
                                                        <input type="hidden" name="product_name[]" class="product_name">
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="unit_name"></div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" step="any" class="form-control quantity text-center" name="quantity[]" readonly>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" step="any" class="form-control warranty" name="warranty[]">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" step="any" class="form-control unit_price" name="unit_price[]" readonly>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" step="any" class="form-control selling_price" name="selling_price[]">
                                                    </div>
                                                </td>
                                                <td  class="total-cost text-right"> 0.00</td>
                                                <td class="text-center">
                                                    <a role="button" class="btn btn-danger bg-gradient-danger btn-sm btn-remove"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td>
                                                <a role="button" class="btn btn-primary btn-sm" id="btn-add-product"><i class="fa fa-plus"></i></a>
                                            </td>
                                            <th id="total-quantity" colspan="2" class="text-right">0.00</th>
                                            <th colspan="3" class="text-right">Total Amount</th>
                                            <th id="total-amount" class="text-right">0.00</th>
                                            <td></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header with-border">
                                        <h3 class="card-title">Payment</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('financial_year') ? 'has-error' :'' }}">
                                                    <label for="financial_year">Select Financial Year <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-control select2" name="financial_year" id="financial_year">
                                                        <option value="">Select Year</option>
                                                        @for($i=2022; $i <= date('Y'); $i++)
                                                            <option value="{{ $i }}" {{ old('financial_year') == $i ? 'selected' : '' }}>{{ $i }}-{{ $i+1 }}</option>
                                                        @endfor
                                                    </select>
                                                    @error('financial_year')
                                                    <span class="help-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Payment Type </label>
                                                    <select class="form-control select2" id="payment_type" name="payment_type">
                                                        <option value="">Select Payment Type</option>
                                                        <option {{ old('payment_type') == 1 ? 'selected' : '' }} value="1">Cheque</option>
                                                        <option {{ old('payment_type') == 2 ? 'selected' : '' }} value="2">Cash</option>

                                                    </select>
                                                    @error('payment_type')
                                                    <span class="help-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group {{ $errors->has('account') ? 'has-error' :'' }}">
                                                    <label>Bank/Cash Account <span class="text-danger">*</span></label>
                                                    <select class="form-control select2" id="account" name="account">
                                                        <option value="">Select Bank/Cash Account</option>
                                                        @if (old('account') != '')
                                                            <option value="{{ old('account') }}" selected>{{ old('account_name') }}</option>
                                                        @endif
                                                    </select>
                                                    @error('account')
                                                    <span class="help-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group  bank-area {{ $errors->has('cheque_date') ? 'has-error' :'' }}" style="display: none">
                                                    <label>Cheque Date <span class="text-danger">*</span></label>
                                                    <div class="input-group date">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" class="form-control pull-right date-picker"
                                                               id="cheque_date" name="cheque_date" value="{{ old('cheque_date',date('Y-m-d'))  }}" autocomplete="off">
                                                    </div>
                                                    @error('cheque_date')
                                                    <span class="help-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group  bank-area {{ $errors->has('cheque_no') ? 'has-error' :'' }}" style="display: none">
                                                    <label>Cheque No. <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                           id="cheque_no" name="cheque_no" value="{{ old('cheque_no') }}">

                                                    @error('cheque_no')
                                                    <span class="help-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group bank-area" style="display: none">
                                                    <label for="issuing_bank_name">Issuing Bank Name</label>
                                                    <input type="text" value="" id="issuing_bank_name" name="issuing_bank_name" class="form-control" placeholder="Enter Issuing Bank Name">
                                                </div>
                                                <div class="form-group bank-area" style="display: none">
                                                    <label for="issuing_branch_name">Issuing Branch Name </label>
                                                    <input type="text" value="" id="issuing_branch_name" name="issuing_branch_name" class="form-control" placeholder="Enter Issuing Bank Branch Name">
                                                </div>

                                            </div>

                                            <div class="col-6 col-md-6">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th colspan="4" class="text-right">Sub Total</th>
                                                        <th id="product-sub-total">৳0.00</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="4" class="text-right">Discount (Tk)</th>
                                                        <td>
                                                            <div class="form-group {{ $errors->has('discount') ? 'has-error' :'' }}">
                                                                <input type="text" class="form-control" name="discount" id="discount" value="{{ empty(old('discount')) ? ($errors->has('discount') ? '' : '0') : old('discount') }}">
                                                                <span id="discount_total">৳0.00</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="4" class="text-right">Total</th>
                                                        <th id="final-amount">৳0.00</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="4" class="text-right">From Advance Payment</th>
                                                        <td>
                                                            <div class="form-group {{ $errors->has('advance_deduct') ? 'has-error' :'' }}">
                                                                <input type="text" class="form-control text-center" name="advance_deduct" id="advance_deduct" value="{{ empty(old('advance_deduct')) ? ($errors->has('advance_deduct') ? '' : '0') : old('advance_deduct') }}" readonly>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="4" class="text-right">Paid</th>
                                                        <td>
                                                            <div class="form-group {{ $errors->has('paid') ? 'has-error' :'' }}">
                                                                <input type="text" class="form-control text-center" name="paid" id="paid" value="{{ empty(old('paid')) ? ($errors->has('paid') ? '' : '0') : old('paid') }}">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="4" class="text-right">Due</th>
                                                        <th id="due">৳0.00</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="4" class="text-right"> Note </th>
                                                        <td>
                                                            <div class="form-group {{ $errors->has('note') ? 'has-error' :'' }}">
                                                                <input type="text" class="form-control" name="note" id="note" value="{{ old('note') }}">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="total" id="total">
                        <input type="hidden" name="due_total" id="due_total">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <template id="template-product">
        <tr class="product-item">
            <td>
                <div class="form-group product_area">
                    <select class="form-control select2 product" style="width: 100%;" name="product[]" >
                        <option value="">Select Product</option>
                    </select>
                    <input type="hidden" name="product_name[]" class="product_name">
                </div>
            </td>
            <td class="text-center">
                <div class="unit_name"></div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" step="any" class="form-control quantity text-center" name="quantity[]" readonly>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" step="any" class="form-control warranty" name="warranty[]">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" step="any" class="form-control unit_price" name="unit_price[]" readonly>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" step="any" class="form-control selling_price" name="selling_price[]">
                </div>
            </td>
            <td  class="total-cost text-right"> 0.00</td>
            <td class="text-center">
                <a role="button" class="btn btn-danger bg-gradient-danger btn-sm btn-remove"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    </template>
@endsection

@section('script')

    <script>
        var oldPaid ={{ old('paid') ? old('paid') : 0 }};
        var oldAdvanceDeduct ={{ old('advance_deduct') ? old('advance_deduct') : 0 }};
        $(function () {
            intSelect2();

            $("#payment_type").change(function (){
                var payType = $(this).val();

                if(payType != ''){
                    if(payType == 1){
                        $(".bank-area").show();
                    }else{
                        $(".bank-area").hide();
                    }
                }
            })
            $("#payment_type").trigger("change");

            //Initialize Select2 Elements
            //$('.pre_filter_category').select2()

            //Date picker
            $('#date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });

            var message = '{{ session('message') }}';
            var message = '{{ session('message') }}';

            if (!window.performance || window.performance.navigation.type != window.performance.navigation.TYPE_BACK_FORWARD) {
                if (message != '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: message,
                    });
                }
            }

            $('#customer_type').change(function (){
                var customerType = $(this).val();
                if (customerType == '1'){

                    $("#old_customer_area").hide();
                    $("#new_customer_area").show();
                }else{
                    $("#new_customer_area").hide();
                    $("#old_customer_area").show();
                }

            });

            $('#customer_type').trigger("change");

            $('#sale_type').change(function (){
                var sale_type = $(this).val();
                if (sale_type == '1'){
                    $("#sale_type_area").hide();
                    $("#booking-info-area").hide();
                    $("#all-customer-area").show();
                    $("#booking-detail-container").hide();
                }else{
                    $("#sale_type_area").show();
                    $("#all-customer-area").hide();
                    $("#booking-detail-container").show();
                }

            });

            $('#sale_type').trigger("change");


            $('body').on('change','.product', function () {

                var productId = $(this).val();
                var itemProduct= $(this);
                itemProduct.closest('tr').find('.selling_price').val('');
                itemProduct.closest('tr').find('.quantity').val('');

                if (productId != '') {

                    $.ajax({
                        method: "GET",
                        url: "{{ route('get_sale_details') }}",
                        data: {productId:productId}
                    }).done(function(response) {
                        if(response.inventory){
                            itemProduct.closest('tr').find('.quantity').val(response.inventory.quantity);
                            itemProduct.closest('tr').find('.unit_price').val(response.inventory.unit_price);
                            itemProduct.closest('tr').find('.selling_price').val(response.inventory.selling_price);
                        }else{
                            itemProduct.closest('tr').find('.quantity').text('Stock out').addClass('text-danger');
                            itemProduct.closest('tr').find('.unit_price').val(' ');
                            itemProduct.closest('tr').find('.selling_price').val(' ');
                        }
                        if(response.product) {
                            itemProduct.closest('tr').find('.unit_name').text(response.product.unit.name);
                            itemProduct.closest('tr').find('.warranty').val(response.product.warranty);
                        }else{
                            itemProduct.closest('tr').find('.unit_name').text(' ');

                        }

                        calculate();
                    });
                }
            });
            $('.product').trigger('change');

            $("#booking-info-area").hide();

            $('body').on('change', '.booking', function () {
                $("#booking-detail-container").html(' ');
                var bookingId = $(this).val();
                if (bookingId != '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('get_booking_details') }}",
                        data: {bookingId:bookingId}
                    }).done(function(response) {
                        var bookingAdvance= response.advance;
                        $('#advance_deduct').val(bookingAdvance);
                        $("#booking-detail-container").html(response.html);

                    });
                }
            });

            $('.booking').trigger('change');




            $('#btn-add-product').click(function () {
                var html = $('#template-product').html();
                var item = $(html);

                $('#product-container').append(item);

                if ($('.product-item').length >= 1 ) {
                    $('.btn-remove').show();
                }
                intSelect2();
            });

            $('body').on('click', '.btn-remove', function () {
                $(this).closest('.product-item').remove();
                calculate();

                if ($('.product-item').length <= 1 ) {
                    $('.btn-remove').hide();
                }
            });

            $('body').on('click', '.btn-remove', function () {
                $(this).closest('.product-item').remove();
                calculate();

                if ($('.product-item').length <= 1 ) {
                    $('.btn-remove').hide();
                }
            });

            $('body').on('keyup',' .selling_price,.quantity,#advance_deduct,#paid,#discount', function () {
                calculate();
            });

            $('body').on('change',' .selling_price,.quantity,#advance_deduct,#paid,#discount', function () {
                calculate();
            });


            if ($('.product-item').length <= 1 ) {
                $('.btn-remove').hide();
            } else {
                $('.btn-remove').show();
            }
            calculate();
            //payment
            $('#modal-pay-type').change(function() {
                if ($(this).val() == '1') {
                    $('#modal-bank-info').hide();
                    $('#modal-mobile-bank-info').hide();
                }
                if($(this).val() == '3'){
                    $('#modal-bank-info').hide();
                    $('#modal-mobile-bank-info').show();
                }
                if($(this).val() == '2') {
                    $('#modal-mobile-bank-info').hide();
                    $('#modal-bank-info').show();
                }
            });

            $('#modal-pay-type').trigger('change');
            //-------end payment type -----

        });

        function calculate() {
            var productSubTotal = 0;
            var productSubQuantity = 0;
            var paid = $('#paid').val() || 0;
            var advance_deduct = $('#advance_deduct').val() || 0;
            var discount = $('#discount').val();

            if (discount == '' || discount < 0 || !$.isNumeric(discount))
                discount = 0;


            $('.product-item').each(function(i, obj) {
                var selling_price = $('.selling_price:eq('+i+')').val();
                var quantity = $('.quantity:eq('+i+')').val();

                if (selling_price === '' || selling_price < 0 || !$.isNumeric(selling_price))
                    selling_price = 0;

                if (quantity === '' || quantity < 0 || !$.isNumeric(quantity))
                    quantity = 0;


                $('.total-cost:eq('+i+')').html('' + (1 * selling_price).toFixed(2) );
                productSubTotal += (1 * selling_price);
                productSubQuantity += parseInt(quantity);
            });

            $('#total-amount').html('৳' + productSubTotal.toFixed(2));
            $('#product-sub-total').html('৳' + productSubTotal.toFixed(2));
            $('#total-quantity').html('' + productSubQuantity .toFixed(2));

            var productTotalDiscount = parseFloat(discount);
            $('#discount_total').html('৳' + productTotalDiscount.toFixed(2));

            var total = parseFloat(productSubTotal) - parseFloat(productTotalDiscount);
            $('#final-amount').html('৳' + total.toFixed(2));
            $('#total').val(total);

            if(parseFloat(productSubTotal) < parseFloat(advance_deduct))
                var due = 0;
            else

            var due = parseFloat(total)-parseFloat(paid)-parseFloat(advance_deduct);

            $('#due').html('৳' + due.toFixed(2));

        }


        function intSelect2(){
            $('.select2').select2()
            $('.product').select2({
                ajax: {
                    url: "{{ route('sale_product.json') }}",
                    type: "get",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
            $('.product').on('select2:select', function (e) {
                let data = e.params.data;
                let index = $(".product").index(this);
                $('.product_name:eq('+index+')').val(data.text);
            });
            $('#account').select2({
                ajax: {
                    url: "{{ route('account_head_code.json') }}",
                    type: "get",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });

            $('#account').on('select2:select', function (e) {
                var data = e.params.data;
                var index = $("#account").index(this);
                //$('#account_name:eq('+index+')').val(data.text);
                $('#account_name').val(data.text);
            });
        }


        function initProduct() {
            $('.select2').select2();
            $('.category').select2();
            $('.sub_category').select2();
            $('.product').select2();
        }
    </script>

@endsection
