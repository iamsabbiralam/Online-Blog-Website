@extends('front.master')
@section('content')
@section('tittel')
this is home page
@endsection
<section class="news-section">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-9">
                <div class="row">
                    @php
                    $majorPost = DB::table('majorposts')->get();
                    @endphp
                    @foreach($majorPost as $p)
                    @if($p->id == 1)
                    <div class="col-md-8 col-sm-6">
                        <div class="lead-news">
                            @else
                            <div class="col-md-4 col-sm-6">
                                <div class="lead-news-02">
                                    @endif
                                    <div class="service-img"><img
                                            src="{{asset('storage/app/public/images/post/'.$p->image)}}" alt="post">
                                    </div>
                                    @if($p->id == 1)
                                    <div class="content">
                                        <h4 class="lead-heading-01">
                                            @else
                                            <div class="content-02">
                                                <h4 class="lead-heading-02">
                                                    @endif
                                                    <a
                                                        href="{{ route('singlemajornews', ['id' => $p->id]) }}">{{$p->title}}</a>
                                                </h4>
                                            </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="tab-header">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-justified" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21"
                                            role="tab" data-toggle="tab" aria-expanded="false">সর্বশেষ</a></li>
                                    <li role="presentation"><a href="#tab22" aria-controls="tab22" role="tab"
                                            data-toggle="tab" aria-expanded="true">জনপ্রিয়</a></li>
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
                                                <img src="{{asset('storage/app/public/images/post/'.$p->image)}}"
                                                    alt="image">
                                                <h4 class="small_heading"><a
                                                        href="{{ route('singlenews', ['id' => $p->id]) }}">{{$p->title}}</a>
                                                </h4>
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
                                                <img src="{{asset('storage/app/public/images/post/'.$p->image)}}"
                                                    alt="image">
                                                <h4 class="small_heading"><a
                                                        href="{{ route('singlenews', ['id' => $p->id]) }}">{{$p->title}}</a>
                                                </h4>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--header-->


                            <p>widget area</p>
                        </div>
                    </div>
                </div>
</section>

<!--news-section-02-->
<section class="news-section">
    <div class="container">
        <div class="row">
            @php
            $cat = DB::table('categories')->where('status', 'active')->orderBy('id', 'asc')->get();
            $count = count($cat);
            $count2 = (count($cat)/2);
            $count3 = (count($cat)/2)+1;
            $cat1 = DB::table('categories')->where('status', 'active')->whereBetween('id', ['1', $count2])->get();
            $cat2 = DB::table('categories')->where('status', 'active')->whereBetween('id', [$count3, $count])->get();
            @endphp

            <div class="col-md-9 col-sm-8">
                @foreach($cat1 as $c)
                <div class="catagory_title">
                    <a href="{{ route('news', ['id' => $c->id]) }}"> {{$c->cat_name}} </a>
                </div>
                <div class="row">
                    @php
                    $post1 = DB::table('posts')->where('cat_id', $c->id)->first();
                    if($post1) {
                    $post2 = DB::table('posts')->where('cat_id', $c->id)->where('id', '<>',
                        $post1->id)->limit(5)->get();
                        }
                        @endphp
                        @if($post1)
                        <div class="col-md-7 col-sm-6">
                            <div class="middle_img">
                                <img src="{{asset('storage/app/public/images/post/'.$post1->image)}}" alt="image">
                                <h4 class="medium_heading"><a
                                        href="{{ route('singlenews', ['id' => $post1->id]) }}">{{$post1->title}}</a>
                                </h4>
                                <p>{{$post1->details}}</p>
                            </div>
                        </div>
                        @foreach($post2 as $p)
                        <div class="col-md-5 col-sm-6">
                            <div class="tab_img">
                                <img src="{{asset('storage/app/public/images/post/'.$p->image)}}" alt="image">
                                <h4 class="small_heading"><a
                                        href="{{ route('singlenews', ['id' => $p->id]) }}">{{$p->title}}</a></h4>
                            </div>
                        </div>
                        @endforeach
                        @endif
                </div>
                @endforeach
            </div>
            <!-- side section -->
            @php
            $cat = DB::table('categories')->where('status', 'active')->orderBy('id', 'desc')->get();
            $count = count($cat);
            $count2 = (count($cat)/2);
            $count3 = (count($cat)/2)+1;
            $cat1 = DB::table('categories')->where('status', 'active')->whereBetween('id', ['1', $count2])->get();
            $cat2 = DB::table('categories')->where('status', 'active')->whereBetween('id', [$count3, $count])->get();
            @endphp
            <div class="col-md-3 col-sm-4">
                @foreach($cat2 as $c)
                <div class="catagory_title">
                    <a href="{{ route('news', ['id' => $c->id]) }}"> {{$c->cat_name}} </a>
                </div>
                @php
                $post = DB::table('posts')->where('cat_id', $c->id)->limit(5)->get();
                @endphp
                @foreach($post as $p)
                <div class="tab_img">
                    <img src="{{asset('storage/app/public/images/post/'.$p->image)}}" alt="image">
                    <p class="small_heading"><a href="{{ route('singlenews', ['id' => $p->id]) }}">{{ $p->title }}</a>
                    </p>
                </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--news-section-02-->
<section class="Photo_gallery_section">
    <div class="container">

        <div class="Gallery_catagory">
            <i class="fa fa-camera" aria-hidden="true"></i> ফটো-গ্যালারী
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="Pgoto_gallery_sec owl-carousel">
                    @php
                    $gal = DB::table('galleries')->get();
                    @endphp
                    @foreach($gal as $g)
                    <div class="pto_gallery_box_shadow">
                        <div class="medium_image">
                            <img src="{{asset('storage/app/public/images/post/'.$g->image)}}" alt="Avatar">
                            <div class="gallery_content_padding">
                                <div class="photo_heading" style="color:white">
                                    {{ $g->title }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>
<!--news-section-02-->
<section class="news-section">
    <div class="container">
        <div class="row">
            @php
            $cat = DB::table('categories')->where('status', 'active')->orderBy('id', 'asc')->get();
            $count = count($cat);
            $count2 = (count($cat)/2);
            $count3 = (count($cat)/2)+1;
            $cat1 = DB::table('categories')->where('status', 'active')->whereBetween('id', ['1', $count2])->get();
            $cat2 = DB::table('categories')->where('status', 'active')->whereBetween('id', [$count3, $count])->get();
            @endphp

            <div class="col-md-9 col-sm-8">
                @foreach($cat2 as $c)
                <div class="catagory_title">
                    <a href="{{ route('news', ['id' => $c->id]) }}"> {{$c->cat_name}} </a>
                </div>
                <div class="row">
                    @php
                    $post1 = DB::table('posts')->where('cat_id', $c->id)->first();
                    if($post1) {
                    $post2 = DB::table('posts')->where('cat_id', $c->id)->where('id', '<>',
                        $post1->id)->limit(5)->get();
                        }
                        @endphp
                        @if($post1)
                        <div class="col-md-7 col-sm-6">
                            <div class="middle_img">
                                <img src="{{asset('storage/app/public/images/post/'.$post1->image)}}" alt="image">
                                <h4 class="medium_heading"><a
                                        href="{{ route('singlenews', ['id' => $post1->id]) }}">{{$post1->title}}</a>
                                </h4>
                                <p>{{$post1->details}}</p>
                            </div>
                        </div>
                        @foreach($post2 as $p)
                        <div class="col-md-5 col-sm-6">
                            <div class="tab_img">
                                <img src="{{asset('storage/app/public/images/post/'.$p->image)}}" alt="image">
                                <h4 class="small_heading"><a
                                        href="{{ route('singlenews', ['id' => $p->id]) }}">{{$p->title}}</a></h4>
                            </div>
                        </div>
                        @endforeach
                        @endif
                </div>
                @endforeach
            </div>
            <!-- side section -->
            @php
            $cat = DB::table('categories')->where('status', 'active')->orderBy('id', 'desc')->get();
            $count = count($cat);
            $count2 = (count($cat)/2);
            $count3 = (count($cat)/2)+1;
            $cat1 = DB::table('categories')->where('status', 'active')->whereBetween('id', ['1', $count2])->get();
            $cat2 = DB::table('categories')->where('status', 'active')->whereBetween('id', [$count3, $count])->get();
            @endphp
            <div class="col-md-3 col-sm-4">
                @foreach($cat1 as $c)
                <div class="catagory_title">
                    <a href="{{ route('news', ['id' => $c->id]) }}"> {{$c->cat_name}} </a>
                </div>
                @php
                $post = DB::table('posts')->where('cat_id', $c->id)->limit(5)->get();
                @endphp
                @foreach($post as $p)
                <div class="tab_img">
                    <img src="{{asset('storage/app/public/images/post/'.$p->image)}}" alt="image">
                    <h4 class="small_heading"><a
                            href="{{ route('singlenews', ['id' => $p->id]) }}">{{$p->title}}</a></h4>
                </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection