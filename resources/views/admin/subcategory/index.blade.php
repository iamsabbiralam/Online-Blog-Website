@extends('admin.layout')
@section('page_title', 'SubCategories')
@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Subcategories</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">SubCategories</li>
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
				                <a href="{{ route('admin.addsubcategory') }}" class="btn btn-primary" style="float:right">Add SubCategory</a>
				             </div>
			              <!-- /.card-header -->
			              <div class="card-body p-0">
			                <table class="table table-striped">
			                  <thead>
			                    <tr>
			                      <th>ID</th>
			                      <th>SubCategory Name</th>
			                      <th>Category</th>
                                  <th>Status</th>
                                  <th>Action</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@foreach($sub as $s)
			                    <tr>
			                      <td>{{ $s->id }}</td>
                                  <td>{{ $s->name }}</td>
                                  <td>
                                      @php
                                      $cat = DB::table('categories')->where('id', $s->cat_id)->first();
                                      @endphp
                                      {{ $cat->cat_name }}
                                  </td>
                                  <td>{{ $s->status }}</td>
                                  <td>
                                      <a href="{{ route('admin.editsubcategory', [ 'id' => $s->id ]) }}"><i class="fas fa-edit"></i></a> | 
                                      <a href="javascript:confirmation<?php echo $s->id; ?>()"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i>
                                        <script type="text/javascript">
                                            function confirmation<?php echo $s->id; ?>() {
                                            var answer = confirm("Are you sure want to delete?")
                                            if (answer) {
                                            //alert("Entry Deleted")
                                            window.location = "{{ route('admin.deletesubcategory', [ 'id' => $s->id ]) }}";
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