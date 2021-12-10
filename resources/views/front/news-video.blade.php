@extends('front.master')
@section('content')
@section('tittle')
@endsection
<section class="single_section">		
            <div class="container">			                
                 <div class="row">
                 @foreach($post as $p)					
					<div class="col-md-4 col-sm-4">
                        <div class="photo">
                            <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
								<video width="200px" controls>
                                    <source src="{{ URL::asset('storage/app/public/images/post/'.$p->video) }}"
                                        type="video/mp4">
                                </video>	
                            </div>
                            <div class="photo_title">{{ $p->title }}</div>
                        </div>
                    </div>
                    @endforeach					
                </div>
			

				<!-- pagination Here -->
                <center>
                    <div class="d-flex justify-content-center">
                        {!! $post->links() !!}
                    </div>
                </center>
				
            </div>
        </section>
@endsection