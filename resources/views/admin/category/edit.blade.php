@extends('admin.layout')
@section('page_title', 'Edit Category')
@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="admin.dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Categories</li>
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
	              <form action="" method="post">
	              	@csrf
	              	@method('PUT')
	                <div class="card-body">
	                  <div class="form-group">
	                    <label for="cat_name">Category Name</label>
	                    <input type="text" class="form-control" name="cat_name" value="{{ $cat->cat_name }}">
	                  </div>
	                  <div class="form-group">
	                    <label for="position">Status</label>
	                    <select name="status" class="form-control">
	                    	<option value="active" @if($cat->status == "active") selected @endif>Active</option>
	                    	<option value="inactive" @if($cat->status == "inactive") selected @endif>Inactive</option>
	                    </select>
	                  </div>
	                </div>
	                <!-- /.card-body -->
	                <div class="card-footer">
	                  <button type="submit" class="btn btn-primary">Update</button>
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

@endsection