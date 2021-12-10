@extends('front.master')
@section('content')
@section('tittle')

@endsection
   <!----------  Home Section Section Start ---------->

        <section class="single_section">		
            <div class="container">			                
                 <div class="row">    
                 @foreach($team as $t)              
					<div class="col-md-3 col-sm-3">
                        <div class="team_sec">
                            <a href="{{ route('single_team', ['id' => $t->id ]) }}"><img src="{{asset('storage/app/public/images/team/'.$t->image)}}" style="max-height:250px" alt="Notebook"></a>
                            <div class="team_height"> 
                              <div class="team_title"> <a href="{{ route('single_team', ['id' => $t->id ]) }}"> {{ $t->name }} </a> </div>
                              <div class="team_sub_title"> {{ $t->position }} </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
				

				<!-- pagination here -->

            </div>
        </section>
@endsection