@extends('admin.layout')
@section('page_title', 'Edit Team')
@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Member</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="admin.dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Team</li>
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
	              <form action="{{ route('admin.updateteam', [ 'id' => $team->id ]) }}" method="post" enctype="multipart/form-data">
	              	@csrf
	              	@method('PUT')
	                <div class="card-body">
	                  <div class="form-group">
	                    <label for="image">Image</label>
	                    <input type="file" class="form-control" name="image">
	                  </div>
	                  <div class="form-group">
	                    <label for="image">Image</label>
	                    <img src="{{ asset('storage/app/public/images/team/'.$team->image) }}" alt="image" width="100px">
	                  </div>
	                  <div class="form-group">
	                    <label for="name">Name</label>
	                    <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ $team->name }}">
	                  </div>
	                  <div class="form-group">
	                    <label for="position">Position</label>
	                    <input type="text" class="form-control" name="position" placeholder="Office Position" value="{{ $team->position }}">
	                  </div>
	                  <div class="form-group">
	                    <label for="email">Email</label>
	                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $team->email }}">
	                  </div>
	                  <div class="form-group">
	                    <label for="phone">Mobile No</label>
	                    <input type="tel" class="form-control" name="phone" placeholder="Mobile No" value="{{ $team->phone }}">
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