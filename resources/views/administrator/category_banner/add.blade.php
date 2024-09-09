@extends('layouts.app')
@section('title','Category Banner Add')

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Category Banner Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('category_banner_add') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                       <div class="row">
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Eco Friend Bricks Machinery Banner</label>
                                    <input type="file" name="category_banner_image_two" class="form-control dropify" data-height="120" data-default-file="{{ isset($categoryBanner->category_banner_image_two) ? asset($categoryBanner->category_banner_image_two) : null }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Garments Fashion Banner</label>
                                    <input type="file" name="category_banner_image_four" class="form-control dropify" data-height="120" data-default-file="{{ isset($categoryBanner->category_banner_image_four) ? asset($categoryBanner->category_banner_image_four) : null }}">
                                </div>
                            </div>


                       </div>
                       <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Electric Bicycle & Electronics Goods Banner</label>
                                    <input type="file" name="category_banner_image_three" class="form-control dropify" data-height="120" data-default-file="{{ isset($categoryBanner->category_banner_image_three) ? asset($categoryBanner->category_banner_image_three) : null }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Eco Friend Bricks & Tiles Banner</label>
                                    <input type="file" name="category_banner_image_one" class="form-control dropify" data-height="120" data-default-file="{{ isset($categoryBanner->category_banner_image_one) ? asset($categoryBanner->category_banner_image_one) : null }}">
                                </div>
                            </div>

                       </div>
                       <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Others Machinery's Banner</label>
                                    <input type="file" name="category_banner_image_five" class="form-control dropify" data-height="120" data-default-file="{{ isset($categoryBanner->category_banner_image_five) ? asset($categoryBanner->category_banner_image_five) : null }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Furniture & Electric Bicycle</label>
                                    <input type="file" name="category_banner_image_six" class="form-control dropify" data-height="120" data-default-file="{{ isset($categoryBanner->category_banner_image_six) ? asset($categoryBanner->category_banner_image_six) : null }}">
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jute Bag Banner</label>
                                    <input type="file" name="category_banner_image_seven" class="form-control dropify" data-height="120" data-default-file="{{ isset($categoryBanner->category_banner_image_seven) ? asset('public/uploads/category_banner_image/'.$categoryBanner->category_banner_image_seven) : null }}">
                                </div>
                            </div> --}}
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

            $('#users_table').DataTable({
                aLengthMenu: [[10,25, 50, 100, 1000, -1], [10,25, 50, 100, 1000, "All"]],
                "columnDefs": [
                    {
                        "targets": 0,
                        "className": "text-center",
                    },
                    {
                        'bSortable': false,
                        'bSearchable': false,
                        "className": "text-center",
                        'aTargets': [-1]
                    }
                ]
            });
        });
    </script>
@endsection
