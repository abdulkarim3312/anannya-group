@extends('layouts.app')
@section('title','Shop Add')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title">Shop Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('customer.add')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row {{ $errors->has('name') ? 'has-error' :'' }}">
                            <label for="name" class="col-sm-2 col-form-label">Shop Name <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{old('name')}}" name="name" class="form-control" id="name" placeholder="Enter Shop Name">
                                @error('name')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('owner_name') ? 'has-error' :'' }}">
                            <label for="owner_name" class="col-sm-2 col-form-label">Owner Name <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{old('owner_name')}}" name="owner_name" class="form-control" id="owner_name" placeholder="Enter Owner Name">
                                @error('owner_name')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('area') ? 'has-error' :'' }}" id="area">
                            <label for="category" class="col-sm-2 col-form-label">Area <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="area" class="form-control select2" id="area">
                                    <option value="">Select Area</option>
                                    @foreach($areas as $area)
                                        <option value="{{$area->id}}" {{ old('area') == $area->id  ? 'selected' : '' }}>{{$area->name}}</option>
                                    @endforeach
                                </select>
                                @error('area')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('mobile_no') ? 'has-error' :'' }}">
                            <label for="mobile_no" class="col-sm-2 col-form-label">Mobile No <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" value="{{old('mobile_no')}}" name="mobile_no" class="form-control" id="mobile_no" placeholder="Enter Mobile No">
                                @error('mobile_no')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('address') ? 'has-error' :'' }}">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{old('address')}}" name="address" class="form-control" id="address" placeholder="Enter Address">
                                @error('address')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('email') ? 'has-error' :'' }}">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{old('email')}}" name="email" class="form-control" id="email" placeholder="Enter Email">
                                @error('email')
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
                        <a href="{{route('customer')}}" class="btn btn-default float-right">Cancel</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection
