
@extends('layouts.app')
@section('title','Sale Receipt')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Status</th>
                                <th>SR Name</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function () {
            intSelect2();

            $('#payment_type').change(function () {
                if ($(this).val() == '1') {
                    $('.modal-bank-info').show();
                } else {
                    $('.modal-bank-info').hide();
                }
            });
            $('#modal-pay-type').trigger('change');

            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('sr_sale_receipt.datatable') }}',
                columns: [
                    {data: 'date', name: 'date',searchable:false},
                    {data: 'status', name: 'status'},
                    {data: 'sr', name: 'sr.name'},
                    {data: 'client', name: 'client.name'},
                    {data: 'total', name: 'total'},
                    {data: 'paid', name: 'paid'},
                    {data: 'due', name: 'due'},
                    {data: 'action', name: 'action', orderable: false},
                ],
                order: [[ 0, "desc" ]],
            });

            //Date picker
            $('#date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });

            $('body').on('click', '.btn-pay', function () {
                var orderId = $(this).data('id');
                var order_number = $(this).data('order');
                var order_due = $(this).data('due');
                $('#modal-order-number').val(order_number);
                $('#modal-order-due').val(order_due);
                $('#order_id').val(orderId);
                $('#modal-pay').modal('show');
            });

            $('#modal-btn-pay').click(function () {
                var formData = new FormData($('#modal-form')[0]);

                $.ajax({
                    type: "POST",
                    url: "{{ route('sale_receipt.make_receipt') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            $('#modal-pay').modal('hide');
                            Swal.fire(
                                'Paid!',
                                response.message,
                                'success'
                            ).then((result) => {
                                //location.reload();
                                window.location.href = response.redirect_url;
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                            });
                        }
                    }
                });
            });
        });

        function intSelect2(){
            $('.date-picker').datepicker({
                autoclose: true,
                format: 'dd-mm-yyyy'
            });
            $('.select2').select2()

            $('#cash_account_code').select2({
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
            $('#cash_account_code').on('select2:select', function (e) {
                var data = e.params.data;
                var index = $("#cash_account_code").index(this);
                $('#cash_account_code_name').val(data.text);
            });
        }
    </script>
@endsection

