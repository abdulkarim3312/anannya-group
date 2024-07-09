@extends('layouts.app')
@section('title', 'Sales')

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

        /*input.form-control.selling_price{*/
        /*    width: 130px;*/
        /*}*/
        /*input.form-control.stock{*/
        /*    width: 130px;*/
        /*}*/
        /*input.form-control.quantity{*/
        /*    width: 130px;*/
        /*}*/
        input.form-control.single_customer_quantity {
            width: 130px;
        }

        th {
            text-align: center;
        }

        select.form-control {
            min-width: 130px;
        }

        .table-bordered>thead>tr>th,
        .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>th,
        .table-bordered>thead>tr>td,
        .table-bordered>tbody>tr>td,
        .table-bordered>tfoot>tr>td {
            vertical-align: middle;
        }

        td .form-group {
            margin-bottom: 0;
        }
    </style>
@endsection


@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ route('sr_sales_order.create') }}">
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
                            <input type="hidden" name="sr" value="{{auth()->user()->company_sr_id}}">
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                                    <label>Select Area</label>
                                    <select class="form-control select2 area" style="width: 100%;" name="area" required>
                                        <option value="">Select Area</option>
                                        @foreach ($areas as $area)
                                            <option value="{{ $area->id }}"
                                                {{ old('area') == $area->id ? 'selected' : '' }}>{{ $area->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('area')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('shop') ? 'has-error' : '' }}">
                                    <label>Select Shop</label>

                                    <select class="form-control shop select2" style="width: 100%;" name="shop" required>
                                        <option value="">Select Shop</option>
                                    </select>
                                    @error('shop')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                                    <label>Category</label>
                                    <select class="form-control select2 category" style="width: 100%;" name="category"
                                            data-placeholder="Select Category" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                                    <label>Date</label>

                                    <div class="input-group date">
                                        <input type="text" class="form-control pull-right date-picker" id="date"
                                               name="date"
                                               value="{{ empty(old('date')) ? ($errors->has('date') ? '' : date('d-m-Y')) : old('date') }}"
                                               autocomplete="off">
                                    </div>
                                    <!-- /.input group -->

                                    @error('date')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                    @if(auth()->user()->role!=2)
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label>Total Dues</label>
                                    <div class="input-group total_dues">
                                        ৳0.00
                                    </div>
                                </div>
                            </div>
                    @endif
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="row">
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
                                            <th class="text-center" width="40%">Product <span
                                                    class="text-danger">*</span></th>
                                            <th class="text-center" width="5%">Unit <span
                                                    class="text-danger">*</span></th>
                                            <th class="text-center" width="10%">Stock <span
                                                    class="text-danger">*</span></th>
                                            <th class="text-center" width="5%">Quantity <span
                                                    class="text-danger">*</span></th>
                                            <th class="text-center" width="15%">Selling Price <span
                                                    class="text-danger">*</span></th>
                                            <th class="text-center" width="10%">Total Cost <span
                                                    class="text-danger">*</span></th>
                                            <th class="text-center" width="5%"></th>
                                        </tr>
                                        </thead>

                                        <tbody id="product-container">
                                        @if (old('product') != null && sizeof(old('product')) > 0)
                                            @foreach (old('product') as $item)
                                                <tr class="product-item">
                                                    <td>
                                                        <div
                                                            class="form-group product_area {{ $errors->has('product.' . $loop->index) ? 'has-error' : '' }}">
                                                            <select class="form-control select2 product"
                                                                    style="width: 100%;" name="product[]">
                                                                <option value="">Select Product</option>
                                                                @if (old('product.' . $loop->index) != '')
                                                                    <option
                                                                        value="{{ old('product.' . $loop->index) }}"
                                                                        selected>
                                                                        {{ old('product_name.' . $loop->index) }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            <input type="hidden" name="product_name[]"
                                                                   class="product_name"
                                                                   value="{{ old('product_name.' . $loop->index) }}">

                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="unit_name"></div>
                                                    </td>

                                                    <td>
                                                        <div
                                                            class="form-group {{ $errors->has('stock.' . $loop->index) ? 'has-error' : '' }}">
                                                            <input type="text" step="any"
                                                                   class="form-control stock" name="stock[]"
                                                                   value="{{ old('stock.' . $loop->index) }}" readonly>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div
                                                            class="form-group {{ $errors->has('quantity.' . $loop->index) ? 'has-error' : '' }}">
                                                            <input type="text" step="any"
                                                                   class="form-control text-center quantity"
                                                                   name="quantity[]"
                                                                   value="{{ old('quantity.' . $loop->index) }}">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div
                                                            class="form-group {{ $errors->has('selling_price.' . $loop->index) ? 'has-error' : '' }}">
                                                            <input type="text" step="any"
                                                                   class="form-control selling_price"
                                                                   name="selling_price[]"
                                                                   value="{{ old('selling_price.' . $loop->index) }}">
                                                        </div>
                                                    </td>
                                                    <td class="total-cost text-right">0.00</td>
                                                    <td class="text-center">
                                                        <a role="button"
                                                           class="btn btn-danger bg-gradient-danger btn-sm btn-remove"><i
                                                                class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="product-item">
                                                <td>
                                                    <div class="form-group product_area">
                                                        <select class="form-control select2 product product_selected"
                                                                style="width: 100%;" name="product[]">
                                                            <option value="">Select Product</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="unit_name"></div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" step="any"
                                                               class="form-control stock text-center" name="stock[]"
                                                               readonly>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" step="any"
                                                               class="form-control quantity text-center"
                                                               name="quantity[]">
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" step="any"
                                                               class="form-control selling_price" name="selling_price[]">
                                                    </div>
                                                </td>
                                                <td class="total-cost text-right"> 0.00</td>
                                                <td class="text-center">
                                                    <a role="button"
                                                       class="btn btn-danger bg-gradient-danger btn-sm btn-remove"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td>
                                                <a role="button" class="btn btn-primary btn-sm"
                                                   id="btn-add-product"><i class="fa fa-plus"></i></a>
                                            </td>
                                            <th colspan="2" class="text-right">Total Qty</th>
                                            <th colspan="1" class="text-right"><span
                                                    id="total-quantity">0.00</span></th>
                                            <th colspan="1" class="text-right">Total Amount</th>
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
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                            </div>

                                            <div class="col-6 col-md-6">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th colspan="4" class="text-right">Sub Total</th>
                                                        <th id="product-sub-total">৳0.00</th>
                                                    </tr>
                                                    {{--                                                    <tr> --}}
                                                    {{--                                                        <th colspan="4" class="text-right">Discount (Tk)</th> --}}
                                                    {{--                                                        <td> --}}
                                                    {{--                                                            <div class="form-group {{ $errors->has('discount') ? 'has-error' :'' }}"> --}}
                                                    {{--                                                                <input type="text" class="form-control" name="discount" id="discount" value="{{ empty(old('discount')) ? ($errors->has('discount') ? '' : '0') : old('discount') }}"> --}}
                                                    {{--                                                                <span id="discount_total">৳0.00</span> --}}
                                                    {{--                                                            </div> --}}
                                                    {{--                                                        </td> --}}
                                                    {{--                                                    </tr> --}}

                                                    <tr>
                                                        <th colspan="4" class="text-right">Regular Commission (%/Tk)
                                                        </th>
                                                        <td>
                                                            <div
                                                                class="form-group {{ $errors->has('regular_commission') ? 'has-error' : '' }}">
                                                                <input type="text" class="form-control"
                                                                       id="regular_commission"
                                                                       value="{{ empty(old('regular_commission')) ? ($errors->has('regular_commission') ? '' : '0') : old('regular_commission') }}">
                                                                <span>৳<span
                                                                        id="regular_commission_total">0.00</span></span>
                                                                <input type="hidden" class="regular_commission_total"
                                                                       name="regular_commission"
                                                                       value="{{ empty(old('regular_commission')) ? ($errors->has('regular_commission') ? '' : '0') : old('regular_commission') }}">
                                                                <input type="hidden"
                                                                       class="regular_commission_percentage"
                                                                       name="regular_commission_percentage"
                                                                       value="{{ empty(old('regular_commission_percentage')) ? ($errors->has('regular_commission_percentage') ? '' : '0') : old('regular_commission_percentage') }}">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="4" class="text-right">After Commission Total</th>
                                                        <th id="after_commission_total">৳0.00</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="4" class="text-right">Extra Commission (%/Tk)</th>
                                                        <td>
                                                            <div
                                                                class="form-group {{ $errors->has('extra_commission') ? 'has-error' : '' }}">
                                                                <input type="text" class="form-control"
                                                                       id="extra_commission"
                                                                       value="{{ empty(old('extra_commission')) ? ($errors->has('extra_commission') ? '' : '0') : old('extra_commission') }}">
                                                                <span>৳<span id="extra_commission_total">0.00</span></span>
                                                                <input type="hidden" class="extra_commission_total"
                                                                       name="extra_commission"
                                                                       value="{{ empty(old('extra_commission')) ? ($errors->has('extra_commission') ? '' : '0') : old('extra_commission') }}">
                                                                <input type="hidden" class="extra_commission_percentage"
                                                                       name="extra_commission_percentage"
                                                                       value="{{ empty(old('extra_commission_percentage')) ? ($errors->has('extra_commission_percentage') ? '' : '0') : old('extra_commission_percentage') }}">
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th colspan="4" class="text-right">Discount (TK)</th>
                                                        <td>
                                                            <div
                                                                class="form-group {{ $errors->has('discount') ? 'has-error' : '' }}">
                                                                <input type="text" class="form-control"
                                                                       name="discount" id="discount"
                                                                       value="{{ empty(old('discount')) ? ($errors->has('discount') ? '' : '0') : old('discount') }}">
                                                                <span id="discount_total">৳0.00</span>
                                                            </div>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <th colspan="4" class="text-right">Total</th>
                                                        <th id="final-amount">৳0.00</th>
                                                    </tr>

                                                    <tr>
                                                        <th colspan="4" class="text-right">Paid</th>
                                                        <td>
                                                            <div
                                                                class="form-group {{ $errors->has('paid') ? 'has-error' : '' }}">
                                                                <input type="text" class="form-control text-center"
                                                                       name="paid" id="paid"
                                                                       value="{{ empty(old('paid')) ? ($errors->has('paid') ? '' : '0') : old('paid') }}">
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
                                                            <div
                                                                class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
                                                                <input type="text" class="form-control" name="note"
                                                                       id="note" value="{{ old('note') }}">
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
                    <select class="form-control select2 product product_selected" style="width: 100%;" name="product[]">
                        <option value="">Select Product</option>
                    </select>
                </div>
            </td>
            <td class="text-center">
                <div class="unit_name"></div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" step="any" class="form-control stock text-center" name="stock[]" readonly>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" step="any" class="form-control quantity text-center" name="quantity[]">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" step="any" class="form-control selling_price" name="selling_price[]">
                </div>
            </td>
            <td class="total-cost text-right"> 0.00</td>
            <td class="text-center">
                <a role="button" class="btn btn-danger bg-gradient-danger btn-sm btn-remove"><i
                        class="fa fa-trash"></i></a>
            </td>
        </tr>
    </template>
@endsection

@section('script')

    <script>
        var oldPaid = {{ old('paid') ? old('paid') : 0 }};
        var oldAdvanceDeduct = {{ old('advance_deduct') ? old('advance_deduct') : 0 }};
        $(function() {
            intSelect2();

            $(document).on("change", "#payment_type", function() {
                var payType = $(this).val();
                if (payType != '') {
                    if (payType == 1) {
                        $(".bank-area").show();
                    } else {
                        $(".bank-area").hide();
                    }
                }
            })
            $("#payment_type").trigger("change");


            //Date picker
            $('#date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });

            var message = '{{ session('message') }}';
            var message = '{{ session('message') }}';

            if (!window.performance || window.performance.navigation.type != window.performance.navigation
                .TYPE_BACK_FORWARD) {
                if (message != '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: message,
                    });
                }
            }

            // select Area
            $('body').on('change', '.area', function() {
                var areaID = $(this).val();
                // alert(areaID);
                $('.shop').html('<option value="">Select Shop</option>');
                if (areaID != '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('get_shop') }}",
                        data: {
                            areaID: areaID
                        }
                    }).done(function(response) {
                        // console.log(response);
                        $.each(response, function(index, item) {
                            $('.shop').append('<option value="' + item.id + '">' + item
                                .name + '</option>');
                        });
                        $('.total_dues').text('৳0.00');
                    });
                }
            })

            // select shop
            $('body').on('change', '.shop', function() {
                var shopID = $(this).val();
                $('.total_dues').html('৳0.00');
                if (shopID != '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('get_shop_dues') }}",
                        data: {
                            shopID: shopID
                        }
                    }).done(function(response) {
                        // console.log(response);
                        $('.total_dues').text('৳' + response);
                    });
                }
            })

            // select category
            $('body').on('change', '.category', function() {
                var categoryID = $(this).val();
                // alert(categoryID);
                var itemCategory = $('#product-container tr');
                $('.product_selected').html('<option value="">Select Product</option>');
                // console.log(categoryID);
                // console.log(itemCategory);
                if (categoryID != '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('get_inventory_product') }}",
                        data: {
                            categoryID: categoryID
                        }
                    }).done(function(response) {
                        // console.log(response);
                        $.each(response, function(index, item) {
                            $('.product_selected').append('<option value="' + item
                                .product_id + '">' + item.product.name + '</option>');
                        });
                        calculate();
                    });
                }
            })


            $('body').on('change', '.product', function() {
                var productId = $(this).val();
                var itemProduct = $(this);
                var itemProduct = itemProduct.closest('tr');
                var existingProduct = itemProduct.siblings().find('.product').filter(function() {
                    return $(this).val() === productId;
                });

                // Remove Class after click
                $(this).removeClass('product_selected');

                if (existingProduct.length === 0 && productId !== '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('get_sale_details') }}",
                        data: {
                            productId: productId
                        }
                    }).done(function(response) {
                        if (response.inventory) {
                            itemProduct.closest('tr').find('.stock').val(response.inventory
                                .quantity);
                            itemProduct.closest('tr').find('.unit_price').val(response.inventory
                                .unit_price);
                            itemProduct.closest('tr').find('.selling_price').val(response.inventory
                                .selling_price);
                        } else {
                            itemProduct.closest('tr').find('.stock').text('Stock out').addClass(
                                'text-danger');
                            itemProduct.closest('tr').find('.unit_price').val(' ');
                            itemProduct.closest('tr').find('.selling_price').val(' ');
                        }
                        if (response.product) {
                            itemProduct.closest('tr').find('.unit_name').text(response.product.unit
                                .name);
                            // itemProduct.closest('tr').find('.warranty').val(response.product.warranty);
                        } else {
                            itemProduct.closest('tr').find('.unit_name').text(' ');

                        }

                        calculate();
                    });
                } else if (existingProduct.length > 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Product Already Added',
                        text: 'This product is already added to the list.',
                    });
                }
            });
            // $('.product').trigger('change');


            $('#btn-add-product').click(function() {
                var html = $('#template-product').html();
                var item = $(html);

                $('#product-container').append(item);

                if ($('.product-item').length >= 1) {
                    $('.btn-remove').show();
                }
                intSelect2();

                //after add product category trigger product inject
                $('.category').trigger('change');

            });

            $('body').on('click', '.btn-remove', function() {
                $(this).closest('.product-item').remove();
                calculate();

                if ($('.product-item').length <= 1) {
                    $('.btn-remove').hide();
                }
            });

            $('body').on('click', '.btn-remove', function() {
                $(this).closest('.product-item').remove();
                calculate();

                if ($('.product-item').length <= 1) {
                    $('.btn-remove').hide();
                }
            });

            $('body').on('keyup',
                ' .selling_price,.quantity,#advance_deduct,#paid,#discount,#regular_commission,#extra_commission',
                function() {
                    calculate();
                });

            $('body').on('change',
                ' .selling_price,.quantity,#advance_deduct,#paid,#discount,#regular_commission,#extra_commission',
                function() {
                    calculate();
                });


            if ($('.product-item').length <= 1) {
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
                if ($(this).val() == '3') {
                    $('#modal-bank-info').hide();
                    $('#modal-mobile-bank-info').show();
                }
                if ($(this).val() == '2') {
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

            //handle Commission
            let regular_commission = $('#regular_commission').val();
            let extra_commission = $('#extra_commission').val();
            let regular_commission_amount = 0;
            let extra_commission_amount = 0;
            //End Commission


            $('.product-item').each(function(i, obj) {
                var selling_price = $('.selling_price:eq(' + i + ')').val();
                var quantity = $('.quantity:eq(' + i + ')').val();

                if (selling_price === '' || selling_price < 0 || !$.isNumeric(selling_price))
                    selling_price = 0;

                if (quantity === '' || quantity < 0 || !$.isNumeric(quantity))
                    quantity = 0;


                $('.total-cost:eq(' + i + ')').html('' + (quantity * selling_price).toFixed(2));
                productSubTotal += (quantity * selling_price);
                productSubQuantity += parseInt(quantity);

            });

            $('#total-amount').html('৳' + productSubTotal.toFixed(2));
            $('#product-sub-total').html('৳' + productSubTotal.toFixed(2));
            $('#total-quantity').html('' + productSubQuantity.toFixed(2));

            var productTotalDiscount = parseFloat(discount);
            $('#discount_total').html('৳' + productTotalDiscount.toFixed(2));

            if (regular_commission.includes('%')) {
                let regular_commission_percent = regular_commission.split('%')[0];
                regular_commission_amount = (productSubTotal * regular_commission_percent) / 100;
                $('.regular_commission_percentage').val(regular_commission_percent);
            } else {
                regular_commission_amount = regular_commission;
                $('.regular_commission_percentage').val(0);
            }

            let after_commission_total = parseFloat(productSubTotal) - parseFloat(productTotalDiscount) - parseFloat(
                regular_commission_amount);
            $('#after_commission_total').html('৳' + after_commission_total.toFixed(2));
            $('#regular_commission_total').html(parseFloat(regular_commission_amount).toFixed(2));
            $('.regular_commission_total').val(regular_commission_amount);

            if (extra_commission.includes('%')) {
                let extra_commission_percent = extra_commission.split('%')[0];
                extra_commission_amount = (after_commission_total * extra_commission_percent) / 100;

                $('.extra_commission_percentage').val(extra_commission_percent);
            } else {
                extra_commission_amount = extra_commission;
                $('.extra_commission_percentage').val(0);
            }
            $('#extra_commission_total').html(parseFloat(extra_commission_amount).toFixed(2));
            $('.extra_commission_total').val(extra_commission_amount);

            var total = parseFloat(after_commission_total) - parseFloat(extra_commission_amount);
            $('#final-amount').html('৳' + total.toFixed(2));
            $('#total').val(total);

            if (parseFloat(productSubTotal) < parseFloat(advance_deduct))
                var due = 0;
            else

                var due = parseFloat(total) - parseFloat(paid);

            $('#due').html('৳' + due.toFixed(2));
            $('#due_total').val(due);

        }


        function intSelect2() {
            $('.select2').select2()

            $('#account').select2({

                ajax: {
                    url: "{{ route('account_head_code.json') }}",
                    type: "get",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });

            $('#account').on('select2:select', function(e) {
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
