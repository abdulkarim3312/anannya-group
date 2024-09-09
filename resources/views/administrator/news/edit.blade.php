@extends('layouts.app')
@section('title')
    News & Events
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title">News & Events Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('news.edit', ['news' => $news->id]) }}">
                    @csrf

                    <div class="card-body">
                        <div class="form-group row {{ $errors->has('title') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Title <span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{ $news->title }}">

                                @error('title')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('author') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Author</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Author"
                                       name="author" value="{{ $news->author }}">

                                @error('author')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('image') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Featured  Image</label>

                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image">

                                @error('image')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                                <img src="{{ asset($news->image) }}" width="200px" alt="">
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('description') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Description <span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <textarea id="editor" class="form-control" name="description" rows="10">{{ empty(old('description')) ? ($errors->has('description') ? '' : $news->description) : old('description') }}</textarea>

                                @error('description')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('type') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Type <span class="text-danger">*</span></label>

                            <div class="col-sm-10">

                                <div class="radio" style="display: inline">
                                    <label>
                                        <input type="radio" name="type" value="1" {{ empty(old('type')) ? ($errors->has('type') ? '' : ($news->type == '1' ? 'checked' : '')) :
                                            (old('type') == '1' ? 'checked' : '') }}>
                                        News
                                    </label>
                                </div>

                                <div class="radio" style="display: inline">
                                    <label>
                                        <input type="radio" name="type" value="2" {{ empty(old('type')) ? ($errors->has('type') ? '' : ($news->type == '2' ? 'checked' : '')) :
                                            (old('type') == '2' ? 'checked' : '') }}>
                                        Events
                                    </label>
                                </div>

                                @error('type')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('status') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Status <span class="text-danger">*</span></label>

                            <div class="col-sm-10">

                                <div class="radio" style="display: inline">
                                    <label>
                                        <input type="radio" name="status" value="1" {{ empty(old('status')) ? ($errors->has('status') ? '' : ($news->status == '1' ? 'checked' : '')) :
                                            (old('status') == '1' ? 'checked' : '') }}>
                                        Active
                                    </label>
                                </div>

                                <div class="radio" style="display: inline">
                                    <label>
                                        <input type="radio" name="status" value="0" {{ empty(old('status')) ? ($errors->has('status') ? '' : ($news->status == '0' ? 'checked' : '')) :
                                            (old('status') == '0' ? 'checked' : '') }}>
                                        Inactive
                                    </label>
                                </div>

                                @error('status')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-info" id="btnUploadImages">Upload Images</button>
                                <input type="file" class="hidden" multiple id="inputImages">
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
                                            @else
                                                @if (sizeof($news->images) > 0)
                                                    @foreach($news->images as $img)
                                                        <li class="img-item">
                                                            <div class="image-item">
                                                                <img class="img-thumbnail img" style="margin-bottom: 10px"
                                                                     src="{{ asset($img->path) }}">
                                                                <a class="btnRemoveImage">Remove</a>

                                                                <input class="inputImageId" type="hidden" name="imagesId[]" value="{{ $img->id }}">
                                                                <input class="inputImageSrc" type="hidden" name="imagesSrc[]" value="{{ $img->path }}">
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @error('imagesId')
                        <span class="help-block text-red">{{ $message }}</span>
                        @enderror --}}
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
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
    <!-- Select2 -->
    <script src="{{ asset('themes/backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- Sortable -->
    <script src="{{ asset('themes/backend/plugins/sortable/Sortable.min.js') }}"></script>

    <script>
        $(function () {
            CKEDITOR.replace('editor');

            // Images
            var el = document.getElementById('image-container');
            Sortable.create(el, {
                group: "words",
                animation: 150,
            });

            $('#btnUploadImages').click(function (e) {
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
                            if (file.size > 1228800) {
                                alert('Max allowed image size is 1.2MB per image.')
                            } else if (file.type != 'image/jpeg' && file.type != 'image/png') {
                                alert('Only jpg and png file allowed.');
                            } else if ($(".image-container").length > 20) {
                                alert('Maximum 20 photos allows');
                            } else {
                                var xmlHttpRequest = new XMLHttpRequest();
                                xmlHttpRequest.open("POST", '{{ route('news_events_upload_image') }}', true);
                                var formData = new FormData();
                                formData.append("file", file);
                                xmlHttpRequest.send(formData);

                                xmlHttpRequest.onreadystatechange = function() {
                                    if (xmlHttpRequest.readyState == XMLHttpRequest.DONE) {
                                        var response = JSON.parse(xmlHttpRequest.responseText);

                                        if (response.success) {
                                            var html = $('#imageTemplate').html();
                                            var item = $(html);
                                            item.find('.img').attr('src', response.data.fullPath);
                                            item.find('.inputImageId').val(response.data.id);
                                            item.find('.inputImageSrc').val(response.data.path);

                                            $('#image-container').append(item);
                                        }
                                    }
                                }
                            }
                        });
                    }
                }
            });

            $('#inputImages').change(function (e) {
                $.each(e.target.files, function (index, file) {
                    if (file.size > 1228800) {
                        alert('Max allowed image size is 1.2MB per image.')
                    } else if (file.type != 'image/jpeg' && file.type != 'image/png') {
                        alert('Only jpg and png file allowed.');
                    } else if ($(".image-container").length > 2) {
                        alert('Maximum 20 photos allows');
                    } else {
                        var xmlHttpRequest = new XMLHttpRequest();
                        xmlHttpRequest.open("POST", '{{ route('news_events_upload_image') }}', true);
                        var formData = new FormData();
                        formData.append("file", file);
                        xmlHttpRequest.send(formData);

                        xmlHttpRequest.onreadystatechange = function() {
                            if (xmlHttpRequest.readyState == XMLHttpRequest.DONE) {
                                var response = JSON.parse(xmlHttpRequest.responseText);

                                if (response.success) {
                                    var html = $('#imageTemplate').html();
                                    var item = $(html);
                                    item.find('.img').attr('src', response.data.fullPath);
                                    item.find('.inputImageId').val(response.data.id);
                                    item.find('.inputImageSrc').val(response.data.path);

                                    $('#image-container').append(item);
                                }
                            }
                        }
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
