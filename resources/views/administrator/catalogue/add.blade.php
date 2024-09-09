@extends('layouts.app')
@section('title','Catalogue Add')

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Catalogue Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('catalogue_add') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row {{ $errors->has('product_id') ? 'has-error' :'' }}">
                            <label for="name" class="col-sm-2 col-form-label">Catalogue Text Color <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="color" name="text_color" value="{{ $catalogue->text_color ?? '' }}" class="form-control" style="height: 50px;">
                                @error('text_color')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('catalogue_file') ? 'has-error' :'' }}">
                            <label for="catalogue_file" class="col-sm-2 col-form-label">File (200 x 67) <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="file" name="catalogue_file" class="form-control" id="catalogue_file">
                                @error('catalogue_file')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row {{ $errors->has('status') ? 'has-error' :'' }}">
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
                        </div> --}}

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
