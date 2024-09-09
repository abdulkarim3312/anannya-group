
@extends('layouts.app')
@section('title','Gallery Edit')

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Gallery Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('gallery_edit', ['gallery' => $gallery->id]) }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row {{ $errors->has('product_id') ? 'has-error' :'' }}">
                            <label for="name" class="col-sm-2 col-form-label">Concern <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="product_id">
                                    <option>Select Option</option>
                                    <option value="0" {{ $gallery->product_id==0?'selected':'' }}>Admin</option>
                                    <option value="1" {{ $gallery->product_id==1?'selected':'' }}>ECO Friendly Bricks Machinery</option>
                                    <option value="2" {{ $gallery->product_id==2?'selected':'' }}>Others Machinery's</option>
                                    <option value="3" {{ $gallery->product_id==3?'selected':'' }}>Bricks And Tiles</option>
                                    <option value="4" {{ $gallery->product_id==4?'selected':'' }}>Garments</option>
                                </select>
                                @error('product_id')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('image') ? 'has-error' :'' }}">
                            <label for="image" class="col-sm-2 col-form-label">Image  (440 x 320)</label>
                            <div class="col-sm-10">
                                <input type="file" name="image" class="form-control" id="image" placeholder="">
                                @error('image')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('status') ? 'has-error' :'' }}">
                            <label for="status" class="col-sm-2 col-form-label">Status<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <div class="radio" style="display: inline">
                                    <label class="col-form-label">
                                        <input type="radio" name="status" value="1" {{ empty(old('status')) ? ($errors->has('status') ? '' : ($gallery->status == '1' ? 'checked' : '')) :
                                            (old('status') == '1' ? 'checked' : '') }}>
                                        Active
                                    </label>
                                </div>

                                <div class="radio" style="display: inline">
                                    <label class="col-form-label">
                                        <input type="radio" name="status" value="0" {{ empty(old('status')) ? ($errors->has('status') ? '' : ($gallery->status == '0' ? 'checked' : '')) :
                                            (old('status') == '0' ? 'checked' : '') }}>
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
                        <a href="{{ route('banner') }}" class="btn btn-default float-right">Cancel</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection

