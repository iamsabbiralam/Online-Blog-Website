@extends('admin.layout')
@section('page_title', 'Add Subcategory')
@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add New Subcategory</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="admin.dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Subcategories</li>
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
	              <form action="{{ route('admin.prosubcategory') }}" method="post">
	              	@csrf
	                <div class="card-body">
	                  <div class="form-group">
	                    <label for="name">Subcategory Name</label>
	                    <input type="text" class="form-control" name="name" placeholder="Enter Subcategory">
	                  </div>
	                  <div class="form-group">
	                    <label for="cat_id">Category Name</label>
	                    <select name="cat_id" class="form-control">
	                    	<option value="">Select a Category</option>
	                    	@foreach($cat as $c)
	                    	<option value="{{ $c->id }}">{{ $c->cat_name }}</option>
	                    	@endforeach
	                    </select>
	                  </div>
	                  <div class="form-group">
	                    <label for="status">Status</label>
	                    <select name="status" class="form-control">
	                    	<option value="">Select Status</option>
	                    	<option value="active">Active</option>
	                    	<option value="inactive">Inactive</option>
	                    </select>
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

@endsection