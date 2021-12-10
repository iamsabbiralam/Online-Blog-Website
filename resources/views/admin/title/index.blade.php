@extends('admin.layout')
@section('page_title', 'Title')
@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Title List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Title</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

	@include('message')

    @if ($errors->any())
    &nbsp; <br><br>
    <center>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </center>
    @endif

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <!-- Main row -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        	<div class="card-header">
				                <a href="{{ route('admin.addtitle') }}" class="btn btn-primary" style="float:right">Add New Title</a>
				             </div>
			              <!-- /.card-header -->
			              <div class="card-body p-0">
			                <table class="table table-striped">
			                  <thead>
			                    <tr>
			                      <th>ID</th>
			                      <th>Title</th>
			                      <th>Status</th>
			                      <th>Action</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@foreach($title as $t)
			                    <tr>
			                      <td>{{ $t->id }}</td>
			                      <td>{{ $t->title }}</td>
			                      <td>{{ $t->status }}</td>
			                      <td>
			                      	<a href="{{ route('admin.edittitle', [ 'id' => $t->id ]) }}"><i class="fas fa-edit"></i></a> | 
                                    	<a href="javascript:confirmation<?php echo $t->id; ?>()"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i>
                                		<script type="text/javascript">
                        					function confirmation<?php echo $t->id; ?>() {
                            				var answer = confirm("Are you sure want to delete?")
                            				if (answer) {
                               				//alert("Entry Deleted")
                                			window.location = "{{ route('admin.deletettitle', [ 'id' => $t->id ]) }}";
                            					} else {}
                        					}
                        				</script>
			                      </td>
			                    </tr>
			                   	@endforeach
			                  </tbody>
			                </table>
			              </div>
			              <!-- /.card-body -->
			            </div>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->

@endsection