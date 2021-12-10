@extends('front.master')
@section('content')
@section('tittle')

@endsection
	<!--news-section-02-->
		<section class="news-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="catagory_title">
							<ol class="breadcrumb">   
							    <li><a href="/" style="color:white"><i class="fa fa-home"></i></a></li>					   
								<li><a href="{{ route('news', ['id' => $cat->id]) }}" style="color:white">{{ $cat->cat_name }}</a></li>
								@if($sub)
								<li><a href="{{ route('subnews', ['id' => $sub->id]) }}" style="color:white">{{ $sub->name }}</a></li>
								@endif
							</ol>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4">
								<div class="middle_img">
									<img src="{{asset('storage/app/public/images/post/'.$post1->image)}}" alt="image">
									<h4 class="medium_heading"><a href="{{ route('singlenews', ['id' => $post1->id]) }}">{{$post1->title}}</a></h4> 
									<p>{{$post1->details}}</p>
								</div>
							</div>
							@foreach($post2 as $p)
							<div class="col-md-4 col-sm-4">
								<div class="tab_img">
									<img src="{{asset('storage/app/public/images/post/'.$p->image)}}" alt="image">
									<h4 class="small_heading"><a href="{{ route('singlenews', ['id' => $p->id]) }}">{{$p->title}}</a></h4> 
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection