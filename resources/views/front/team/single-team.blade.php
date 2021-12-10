@extends('front.master')
@section('content')
@section('tittle')

@endsection
<section class="single_section">		
		<div class="container">			                
			 <div class="row">
				<div class="col-md-9 col-sm-9">				
					<div class="row">
						<div class="col-md-5 col-sm-5">
							<div class="team_img">
								<img src="{{asset('storage/app/public/images/team/'.$team->image)}}" alt="Notebook">
							</div>
						</div>
						<div class="col-md-7 col-sm-7">
							<div class="team_dtails_sec">
								<div class="sngl_team_title">  {{ $team->name }}  </div>
								<div class="sngl_team_sub_title">  {{ $team->position }} </div>
								<div class="team_dtails">
									মোবাইল : {{ $team->phone }} । ইমেইল : {{ $team->email }} 
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="col-md-3 col-sm-3">
					
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