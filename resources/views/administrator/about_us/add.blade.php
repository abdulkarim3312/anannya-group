@extends('layouts.app')
@section('title','About Us')

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">About Us Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('about_us') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row {{ $errors->has('product_id') ? 'has-error' :'' }}">
                            <label for="name" class="col-sm-2 col-form-label">About Us Image<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="file" name="image" class="form-control dropify" data-height="120" data-default-file="{{ isset($catalogue->image) ? asset($catalogue->image) : null }}">
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('description') ? 'has-error' :'' }}">
                            <label for="description" class="col-sm-2 col-form-label">Description <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea name="description" rows="6" class="form-control">{{ $catalogue->description ?? '' }}</textarea>
                                @error('description')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.dropify').dropify();
        });
    </script>
@endsection
