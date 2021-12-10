@extends('front.master')
@section('content')
@section('tittle')

@endsection
	<section class="single_section">           		
		<div class="container">						
			 <div class="row">
			 	@foreach($post as $p)
				<div class="col-md-3 col-sm-3">
					<a href="{{ route('singlenewsphoto', ['id' => $p->id]) }}">
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
			
			<!-- pagination Here -->
                <center>
                    <div class="d-flex justify-content-center">
                        {!! $post->links() !!}
                    </div>
                </center>

			<!-- /.options -->  
		</div>
	</section>
@endsection