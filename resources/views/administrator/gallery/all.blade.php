@extends('layouts.app')
@section('title','Gallery')
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
                <div class="card-header">
                    <a href="{{ route('gallery_add') }}" class="btn btn-primary bg-gradient-primary">Add Gallery</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table id="table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Concern</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($galleries as $gallery)
                                <tr>
                                    <td><img height="100" src="{{ asset($gallery->image) }}"></td>
                                    <td>
                                        @if($gallery->product_id==0)
                                            Admin
                                        @elseif($gallery->product_id==1)
                                            ECO Friendly Bricks Machinery
                                        @elseif($gallery->product_id==2)
                                            Others Machinery's
                                        @elseif($gallery->product_id==3)
                                            Bricks And Tiles
                                        @elseif($gallery->product_id==4)
                                            Garments
                                        @endif
                                    </td>
                                    <td>
                                        @if ($gallery->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-sm btn-edit" href="{{ route('gallery_edit', ['gallery' => $gallery->id]) }}"><i class="fa fa-edit"></i></a>
                                    </td>
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
