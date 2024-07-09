@extends('layouts.app')
@section('title','Product Add')
@section('style')
    <style>
        .img-thumbnail {
            background-color: #fff !important;
        }
        .block__list {
            padding: 0;
            width: 100%;
        }
        .block__list li {
            width: 9.8%;
            list-style: none;
            cursor: move;
        }
        @media (max-width: 767px) {
            .block__list li {
                width: 49%;
            }
        }
        .block__list_tags li {
            display: inline-block;
            text-align: center;
        }
        .btnRemoveImage {
            color: red !important;
            cursor: pointer !important;
        }

        .block__list img {
            height: 100px;
        }

        input[type="file"] {
            display: block;
            }
            .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
            }
            .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
            }
            .remove {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
            }
            .remove:hover {
            background: white;
            color: black;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Product Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('product_add') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row {{ $errors->has('category') ? 'has-error' :'' }}">
                            <label for="category" class="col-sm-2 col-form-label">Category <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="category" class="form-control select2" id="category">
                                    <option value="">Select Option</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ old('category') == $category->id  ? 'selected' : '' }}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('name') ? 'has-error' :'' }}">
                            <label for="name" class="col-sm-2 col-form-label">Product Name <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name" placeholder="Enter Product Name">
                                @error('name')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('price') ? 'has-error' :'' }}">
                            <label for="name" class="col-sm-2 col-form-label">Product Price <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('price') }}"
                                       name="price" class="form-control" id="price" placeholder="Enter Product Price">
                                @error('price')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('product_capacity') ? 'has-error' :'' }}">
                            <label for="name" class="col-sm-2 col-form-label">Product Capacity <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('product_capacity') }}"
                                       name="product_capacity" class="form-control" id="product_capacity" placeholder="Enter Product Capacity">
                                @error('product_capacity')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('youtube_link') ? 'has-error' :'' }}">
                            <label for="name" class="col-sm-2 col-form-label">YouTube Video Link <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('product_capacity') }}"
                                       name="youtube_link" class="form-control" id="youtube_link" placeholder="Enter YouTube Link">
                                @error('youtube_link')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('quotation') ? 'has-error' :'' }}">
                            <label for="quotation" class="col-sm-2 col-form-label">Quotation(pdf) <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="file" name="quotation" class="form-control" id="quotation" placeholder="">
                                @error('quotation')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('catalogue') ? 'has-error' :'' }}">
                            <label class="col-sm-2 col-form-label">Catalogue(pdf) <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="file" name="catalogue" class="form-control" id="catalogue" placeholder="">
                                @error('catalogue')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('image') ? 'has-error' :'' }}">
                            <label for="image" class="col-sm-2 col-form-label">Image <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="file" name="image" class="form-control" id="image" placeholder="">
                                @error('image')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('short_description') ? 'has-error' :'' }}">
                            <label for="name" class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                                <textarea name="short_description" class="form-control" placeholder="Enter Short Description">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('description') ? 'has-error' :'' }}">
                            <label for="name" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea id="editor" name="description" class="form-control" placeholder="Enter Description">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('status') ? 'has-error' :'' }}">
                            <label for="status" class="col-sm-2 col-form-label">Status<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <div class="radio" style="display: inline">
                                    <label class="col-form-label">
                                        <input checked type="radio" name="status" value="1" {{ old('status') == '1' ? 'checked' : '' }}>
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

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-info btnUploadImages" id="btnUploadImages">Upload Images</button>
                                <input type="file" style="display: none;" class="hidden" multiple id="inputImages">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <div style="width: 100%;height: auto;border: 3px dotted {{ $errors->has('imagesId') ? 'red' :'black' }};padding: 20px;">
                                    <div class="row" id="images" style="padding: 20px;">
                                        <span>Drag & Drop Images from your computer</span>
                                        <ul id="image-container" class="block__list block__list_tags">
                                            @if (old('imagesId') != null && sizeof(old('imagesId')) > 0)
                                                @foreach(old('imagesId') as $img)
                                                    <li>
                                                        <div class="image-item" style="margin-right: 10px">
                                                            <img class="img-thumbnail img" style="margin-bottom: 10px"
                                                                 src="{{ asset(old('imagesSrc.'.$loop->index)) }}">
                                                            <a class="btnRemoveImage">Remove</a>

                                                            <input class="inputImageId" type="hidden" name="imagesId[]" value="{{ $img }}">
                                                            <input class="inputImageSrc" type="hidden" name="imagesSrc[]" value="{{ old('imagesSrc.'.$loop->index) }}">
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('all_product') }}" class="btn btn-default float-right">Cancel</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
    <template id="imageTemplate">
        <li>
            <div class="image-item" style="margin-right: 10px">
                <img class="img-thumbnail img" style="margin-bottom: 10px">
                <a class="btnRemoveImage">Remove</a>

                <input class="inputImageId" type="hidden" name="imagesId[]">
                <input class="inputImageSrc" type="hidden" name="imagesSrc[]">
            </div>
        </li>
    </template>
@endsection
@section('script')
    <script>
        $(function () {
            //ckeditor activate
            CKEDITOR.replace('editor');


            // Images
            var el = document.getElementById('image-container');
            Sortable.create(el, {
                group: "words",
                animation: 150,
            });

            $(document).on('click','.btnUploadImages',function (e) {
                e.preventDefault();
                $('#inputImages').click();
            });

            $('#images').on({
                'dragover dragenter': function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                },
                'drop': function(e) {
                    var dataTransfer =  e.originalEvent.dataTransfer;
                    if( dataTransfer && dataTransfer.files.length) {
                        e.preventDefault();
                        e.stopPropagation();
                        $.each( dataTransfer.files, function(i, file) {
                            console.log(file);
                            if (file.size > 5242880 ) {
                                alert('Max allowed image size is 5MB per image.')
                            } else if (file.type != 'image/jpeg' && file.type != 'image/png') {
                                alert('Only jpg and png file allowed.');
                            } else if ($(".image-container").length > 20) {
                                alert('Maximum 20 photos allows');
                            } else {
                                let formData = new FormData();
                                formData.append("file", file);

                                $.ajax({
                                    method: "POST",
                                    url: "{{ route('product_image_upload') }}",
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                }).done(function( response ) {
                                    if (response.success) {
                                        var html = $('#imageTemplate').html();
                                        var item = $(html);
                                        item.find('.img').attr('src', response.data.fullPath);
                                        item.find('.inputImageId').val(response.data.id);
                                        item.find('.inputImageSrc').val(response.data.path);

                                        $('#image-container').append(item);
                                    }else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Sorry...',
                                            text: response.message
                                        })
                                    }
                                });

                            }
                        });
                    }
                }
            });

            $('#inputImages').change(function (e) {
                $.each(e.target.files, function (index, file) {
                    if (file.size > 5242880 ) {
                        alert('Max allowed image size is 5MB per image.')
                    } else if (file.type != 'image/jpeg' && file.type != 'image/png') {
                        alert('Only jpg and png file allowed.');
                    } else if ($(".image-container").length > 2) {
                        alert('Maximum 20 photos allows');
                    } else {
                        let formData = new FormData();
                        formData.append("file", file);
                        $.ajax({
                            method: "POST",
                            url: "{{ route('product_image_upload') }}",
                            data: formData,
                            processData: false,
                            contentType: false,
                        }).done(function( response ) {
                            if (response.success) {
                                var html = $('#imageTemplate').html();
                                var item = $(html);
                                item.find('.img').attr('src', response.data.fullPath);
                                item.find('.inputImageId').val(response.data.id);
                                item.find('.inputImageSrc').val(response.data.path);

                                $('#image-container').append(item);
                            }else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Sorry...',
                                    text: response.message
                                })
                            }
                        });

                    }
                });

                $(this).val('');
            });

            $('body').on('click', '.btnRemoveImage', function () {
                $(this).closest('li').remove();
            });

        });
    </script>
@endsection
