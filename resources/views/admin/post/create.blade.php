@extends('admin.layout')
@section('page_title', 'Add Post')
@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add New Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="admin.dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Post</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <!-- Main row -->
            <div class="col-md-12">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.propost') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group">
                                <label for="sub_title">Sub Title</label>
                                <input type="text" class="form-control" name="sub_title" placeholder="Enter Sub Title">
                            </div>
                            @php
                            $categories = DB::table('categories')->where('status', 'active')->get();
                            @endphp
                            <div class="form-group">
                                <label for="cat_id">Category</label>
                                <select required="" class="form-control" name="cat_id">
                                    <option value="">--Select Category--</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub_id">Subcategory</label>
                                <select class="form-control" name="sub_id" required="" id="sub_category">
                                    <option value="">--Select Sub Category--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label for="details">Details</label>
                                <textarea class="form-control" name="details" placeholder="Enter Details" rows="5"
                                    cols="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="reporter">Reporter</label>
                                <input type="text" class="form-control" name="reporter"
                                    placeholder="Enter Reporter Name">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
<!--jQuery-->
<script src="{{ asset('asset/frontend/assets/js/jquery.min.js') }}"></script>

<!-- for category and subcategory -->
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('select[name="cat_id"]').on('change', function() {
        var catID = jQuery(this).val();
        if (catID) {
            jQuery.ajax({
                url: '/getsubcat/' + catID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    jQuery('select[name="sub_id"]').empty();
                    jQuery('select[name="sub_id"]').append(
                        '<option value="">---Select Sub Category---</option>');
                    jQuery.each(data, function(key, value) {
                        $('select[name="sub_id"]').append('<option value="' + key +
                            '">' + value + '</option>');
                    });
                }
            });
        } else {
            $('select[name="sub_id"]').empty();
            $('select[name="sub_id"]').append('<option>---No Sub Category Found---</option>');
        }
    });
});
</script>
@endsection