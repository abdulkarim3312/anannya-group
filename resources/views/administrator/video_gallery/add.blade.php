@extends('layouts.app')
@section('title','Video Gallery Add')

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Video Gallery Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('video_gallery_add') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row {{ $errors->has('product_id') ? 'has-error' :'' }}">
                            <label for="name" class="col-sm-2 col-form-label">Concern <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="product_id">
                                    <option>Select Option</option>
                                    <option value="0">Admin</option>
                                    <option value="1">ECO Friendly Bricks Machinery</option>
                                    <option value="2">Others Machinery's</option>
                                    <option value="3">Bricks And Tiles/option>
                                    <option value="4">Garments</option>
                                </select>
                                @error('product_id')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('image') ? 'has-error' :'' }}">
                            <label for="youtube_link" class="col-sm-2 col-form-label">Youtube Video Link <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="youtube_link" class="form-control" id="youtube_link" placeholder="">
                                @error('youtube_link')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('status') ? 'has-error' :'' }}">
                            <label for="status" class="col-sm-2 col-form-label">Status<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <div class="radio" style="display: inline">
                                    <label class="col-form-label">
                                        <input type="radio" name="status" value="1" {{ old('status') == '1' ? 'checked' : '' }}>
                                        Active
                                    </label>
                                </div>

                                <div class="radio" style="display: inline">
                                    <label class="col-form-label">
                                        <input type="radio" name="status" value="0" {{ old('status') == '0' ? 'checked' : '' }}>
                                        Inactive
                                    </label>
                                </div>
                                @error('status')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('video_gallery') }}" class="btn btn-default float-right">Cancel</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection
