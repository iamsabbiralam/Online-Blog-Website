@extends('admin.layout')
@section('page_title', 'Major News')
@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Major News</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Major News</li>
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
				                <a href="{{ route('admin.addnews') }}" class="btn btn-primary" style="float:right">Add New Post</a>
				             </div>
			              <!-- /.card-header -->
			              <div class="card-body p-0">
			                <table class="table table-striped">
			                  <thead>
			                    <tr>
			                      <th>ID</th>
                                  <th>Image</th>
                                  <th>Image title</th>
			                      <th>category</th>
                                  <th>Subcategory</th>
                                  <th>Title</th>
                                  <th>Details</th>
                                  <th>Reporter</th>
                                  <th>Post Views</th>
                                  <th>Action</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@foreach($news as $p)
                                <tr>
                                  <td>{{ $p->id }}</td>
                                  <td>
                                      <img src="{{ asset('storage/app/public/images/post/'.$p->image) }}" alt="image" width="100px">
                                  </td>
                                  <td>{{ $p->sub_title }}</td>
                                  @php
                                  $cat = DB::table('categories')->where('id', $p->cat_id)->first();
                                  $sub = DB::table('subcategories')->where('id', $p->sub_id)->first();
                                  @endphp
                                  <td>{{ $cat->cat_name }}</td>
                                  <td>{{ $sub->name }}</td>
                                  <td>{{ $p->title }}</td>
                                  <td>{{ $p->details }}</td>
                                  <td>{{ $p->reporter }}</td>
                                  <td>{{ $p->view }}</td>
                                  <td>
                                      <a href="{{ route('admin.editnews', [ 'id' => $p->id ]) }}"><i class="fas fa-edit"></i></a> | 
                                      <a href="javascript:confirmation<?php echo $p->id; ?>()"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i>
                                        <script type="text/javascript">
                                            function confirmation<?php echo $p->id; ?>() {
                                            var answer = confirm("Are you sure want to delete?")
                                            if (answer) {
                                            //alert("Entry Deleted")
                                            window.location = "{{ route('admin.deletenews', [ 'id' => $p->id ]) }}";
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