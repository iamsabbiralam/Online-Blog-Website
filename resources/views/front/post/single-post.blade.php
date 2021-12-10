@extends('front.master')
@section('content')
@section('tittle')

@endsection
   <!----------  Home Section Section Start ---------->

<section class="single-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">   
					   <li><a href="/"><i class="fa fa-home"></i></a></li>					   
						<li><a href="{{ route('news', ['id' => $cat->id]) }}">{{ $cat->cat_name }}</a></li>
						<li><a href="{{ route('subnews', ['id' => $sub->id]) }}">{{ $sub->name }}</a></li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12"> 											
					<header class="headline-header margin-bottom-10">
						<h1 class="headline">{{ $post->title }}</h1>
					</header>
		 
		 
				 <div class="article-info margin-bottom-20">
				  <div class="row">
						<div class="col-md-6 col-sm-6"> 
						 <ul class="list-inline">						 						 
							<li><i class="fa fa-pencil" aria-hidden="true"></i>{{ $post->reporter }}</li>     
							<li><i class="fa fa-clock-o"></i> ০৯ মে ২০২০, ১০:৪৯</li>
						 </ul>
						
						</div>
						<div class="col-md-6 col-sm-6 pull-right"> 						
							<ul class="social-nav">
								<li><a target="_blank"
                        			href="https://www.facebook.com/sharer/sharer.php?u=https://mybikri.com/singlenews/{{ $post->id }}"><i class="fa fa-facebook"></i>
                        		</a></li>

								<li><a target="_blank" href="https://twitter.com/share?text=https://mybikri.com/singlenews/{{ $post->id }}"><i class="fa fa-twitter"></i>
								</a></li>
								<li><a target="_blank" href="https://plus.google.com/share?url=https://mybikri.com/singlenews/{{ $post->id }}"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" id="print-button" onclick="window.print();return false;"><i class="fa fa-print"></i></a></li>
						
							</ul>						   
						</div>						
					</div>				 
				 </div>				
			</div>
		  </div>
		  <!-- ******** -->
		  <div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="single_images">
					<img src="{{asset('storage/app/public/images/post/'.$post->image)}}" alt="" />
					<div class="content">					
						 <div class="caption">{{ $post->sub_title }}</div>
					</div>					
				</div>
				<div class="single-ditails"> 
					<p>{{ $post->details }}</p>
				</div>
				<!-- facebook comment -->
				<h2>Facebook comment Here</h2>
				
				<!-- facebook comment -->
				<!-- ********* -->
				<div class="row">
					<div class="col-md-12"><h2 class="heading">আরো সংবাদ</h2></div>
					@php
                    $post = DB::table('posts')->where('cat_id', $cat->id)->where('id', '<>', $post->id)->limit(6)->get();
                    @endphp
                    @foreach($post as $p)
					<div class="col-md-4 col-sm-4">
						<a href="{{ route('singlenews', ['id' => $p->id]) }}">
							<div class="lead-news-02">
							<div class="service-img"><img src="{{asset('storage/app/public/images/post/'.$p->image)}}" alt="post"></div>
								<div class="content-02">
								<h4 class="lead-heading-02">
									{{$p->title}}
								</h4>
								</div>
							</div>
						</a> 
					</div>
					@endforeach
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				 <div class="tab-header">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">সর্বশেষ</a></li>
                        <li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">জনপ্রিয়</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content ">
                        <div role="tabpanel" class="tab-pane in active" id="tab21">

                            <div class="news-titletab">
                            	@php
			                    $post = DB::table('posts')->orderBy('id', 'desc')->get();
			                    @endphp
			                    @foreach($post as $p)
                                <div class="tab_img">
                                    <img src="{{asset('storage/app/public/images/post/'.$p->image)}}" alt="image">
                                    <h4 class="small_heading"><a href="{{ route('singlenews', ['id' => $p->id]) }}">{{$p->title}}</a></h4> 
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab22">                                      
                            <div class="news-titletab">
                            	@php
			                    $post = DB::table('posts')->orderBy('view', 'desc')->get();
			                    @endphp
                                @foreach($post as $p)
                                <div class="tab_img">
                                    <img src="{{asset('storage/app/public/images/post/'.$p->image)}}" alt="image">
                                    <h4 class="small_heading"><a href="{{ route('singlenews', ['id' => $p->id]) }}">{{$p->title}}</a></h4> 
                                </div>
                                @endforeach
                            </div>                                          
                        </div>
                    </div>
                </div>
				<!--header-->
		
		
				<!-- facebook-page-start -->
				<div class="cetagory-title-03">ফেসবুকে আমরা</div>
				<div class="fb-root">
					facebook page here
				</div><!-- /.facebook-page-close -->	
			</div>
		  </div>
		</div>
	</section>
@endsection