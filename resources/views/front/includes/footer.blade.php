<section class="top_footer_section">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="footer_logo">
                            <img src="{{asset('asset/frontend/assets/img/logo.gif')}}" alt="" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div class="about_dtails">
														
							অনলাইন নিউজপেপার থিম। এই থিমটি দিয়ে আপনারা বাংলা এবং ইংরেজি নিউজপেপার সাইট তৈরি করতে পারবেন । বার্তা ও বাণিজ্যিক কার্যালয়: ৭১, মতিঝিল, ঢাকা-১০০০। সম্পাদক : মো আসাদুজ্জামান আমানউল্লাহ । মোবাইল : 01993637358 । ইমেইল : Support@news.com ।

                        </div>
                    </div>
                    
                </div>


            </div>
        </section>

    <!----------  Top footer Section Close ---------->


    <!----------  footer Section Start ---------->


        <section class="footer_section">
            <div class="container">
                
               

                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        
                        <div class="footer_title">
							আমাদের ঠিকানা 
                        </div>

                        <div class="address_text">							
							বার্তা ও বাণিজ্যিক কার্যালয়: ৭১, মতিঝিল, ঢাকা-১০০০।

							সম্পাদক : মো আসাদুজ্জামান আমানউল্লাহ ।

							মোবাইল : +8801993-637358 ।

							ইমেইল : Support@news.com ।
                        </div> 

                    </div>
                    <div class="col-md-3 col-sm-6">
                        
                        <div class="footer_title">
							সাবস্ক্রাইব করুন 
                        </div>
                        @php
                        $cat = DB::table('categories')->where('status', 'active')->orderBy('id', 'asc')->get();
                        $count = count($cat);
                        $count2 = (count($cat)/2);
                        $count3 = (count($cat)/2)+1;
                        $cat1 = DB::table('categories')->where('status', 'active')->whereBetween('id', ['1', $count2])->get();
                        $cat2 = DB::table('categories')->where('status', 'active')->whereBetween('id', [$count3, $count])->get();
                        @endphp
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <ul class="footer_menu">
                                   @foreach($cat1 as $c)
										<li><a href="{{ route('news', ['id' => $c->id]) }}">{{ $c->cat_name }}</a></li>
									@endforeach
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <ul class="footer_menu">
                                     @foreach($cat2 as $c)
                                        <li><a href="{{ route('news', ['id' => $c->id]) }}">{{ $c->cat_name }}</a></li>
									@endforeach
                                </ul>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-3 col-sm-6">
                        
                        <div class="footer_title">
								সাবস্ক্রাইব করুন 
                        </div>

                        <div class="subscribe_box">
                            <div class="subscribe_title"> 
								নিত্য নতুন তথ্য পেতে সাবস্ক্রাইব করে আমাদের সাথে থাকুন 
                            </div>
                            <form class="newslatter" method="POST" action="{{ route('front.email') }}">
                                @csrf
                                <input type="email" name="email" class="input" placeholder="Enter Your Email ">   
                                <button class="btn" type="submit">subscribe</button> 
                            </form>
                        </div>        


                    </div>

                    <div class="col-md-3 col-sm-6">
                        
                        <div class="footer_title">
							আমাদের ফেইসবুক পেইজ 
                        </div>

                        <div class="facebook">
                            facebook page
                        </div>          


                    </div>
                </div>

            </div>
        </section>
		<section class="btm_footer_section">
            <div class="container">
                
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="copy">                          
							© All rights reserved 2021 ThemesDealer
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="design_developed">
                            Deeloped By <a href="http://www.themesdealer.com/">ThemesDealer.Com</a>
                        </div>
                    </div>
                </div>

                <!--------------- go to top start---------------->

                <a href="" class="TopUp"><i class="fa fa-angle-up"></i></a>

                <!--------------- go to top close---------------->

            </div>
        </section>