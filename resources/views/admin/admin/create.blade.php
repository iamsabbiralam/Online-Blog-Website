@extends('admin.layout')
@section('page_title', 'Add Admin')
@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add New Admin</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="admin.dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Admin</li>
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
	              <form action="{{ route('admin.proadmin') }}" method="post">
	              	@csrf
	                <div class="card-body">
	                  <div class="form-group">
	                    <label for="name">Name</label>
	                    <input type="text" class="form-control" name="name" placeholder="Enter name">
	                  </div>
	                  <div class="form-group">
	                    <label for="email">Email</label>
	                    <input type="email" class="form-control" name="email" placeholder="Enter Email">
	                  </div>
	                  <div class="form-group">
	                    <label for="password">Password</label>
	                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
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