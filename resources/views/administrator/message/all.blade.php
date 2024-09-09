@extends('layouts.app')
@section('title','Messages')
@section('style')
    <style>
        table.table-bordered.dataTable th, table.table-bordered.dataTable td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                {{-- <div class="card-header">
                    <a href="{{ route('category_add') }}" class="btn btn-primary bg-gradient-primary">Add Category</a>
                </div> --}}
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table id="table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Mobile No</th>
                                <th>Message</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse( $message->created_at ?? '')->format('d/m/Y') }}</td>
                                    <td>{{ $message->name ?? '' }}</td>
                                    <td>{{ $message->number ?? '' }}</td>
                                    <td>{{ $message->message ?? '' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- DataTables -->
    <script>
        $(function () {
            $('#table').DataTable();
        })
    </script>
@endsection
