<!----------  Header Section start ---------->
<section class="theme_hdr_section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="hdr_logo">
                    <img src="{{asset('asset/frontend/assets/img/logo.gif')}}" />
                </div>
            </div>
            <div class="col-md-9 col-sm-8">
                <div class="hdr_banner">

                </div>
            </div>
        </div>

    </div>
</section>
<!----------  Header Section start ---------->
<section class="hdr_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div class="date">
                    <i class="fa fa-calendar-o "></i>
                        <script language = "JavaScript"> var now = new Date();
                            var dayNames =
                            new Array("রবিবার","সোমবার","মঙ্গলবার","বুধবার","বৃহস্পতিবার","শুক্রবার","শনিবার");
                            var monNames = new Array("জানুয়ারি","ফেব্রুয়ারী","মার্চ","এপ্রিল","মে","জুন","জুলাই","আগস্ট","সেপ্টেম্বর","অক্টোবর","নভেম্বর","ডিসেম্বর");

                            document.write("আজ " + dayNames[now.getDay()] + " " + monNames[now.getMonth()] + " " + now.getDate() + ", " + now.getFullYear()); </script> | <script>
                            atoj = new Date();
                            atoj1= atoj.getHours();
                            atoj2 = atoj.getMinutes();
                            atoj3= atoj.getSeconds();

                            if(atoj1==0){atoj4=" AM";atoj1=12}
                            else if(atoj1 <= 11){atoj4=" AM"} else if(atoj1 == 12){atoj4=" PM";atoj1=12} else if(atoj1 >= 13){atoj4=" PM";atoj1-=12}

                            if(atoj2 <= 9){atoj2="0"+atoj2} document.write(""+atoj1+":"+atoj2+":"+atoj3+""+atoj4+""+"");
                        </script>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="search">
                    <ul>
                        <li class="search_box">
                            <div class="search-icon-holder"> <a href="#" class="search-icon" data-toggle="modal"
                                    data-target=".bd-example-modal-lg"><i class="fa fa-search"
                                        aria-hidden="true"></i></a>
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"> <i class="fa fa-times-circle"
                                                        aria-hidden="true"></i> </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="search_box">
                                                            <form method="get" class="search-form"
                                                                action="{{ route('search') }}">
                                                                <input type="text" name="search"
                                                                    class="form-control input-sm"
                                                                    placeholder="অনুসন্ধান..." />
                                                                <button type="submit" class="btn btn-primary btn-sm"><i
                                                                        class="fa fa-search"></i> </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="social_icons">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
<!--header-->
<section class="header" data-spy="affix" data-offset-top="197" role="navigation">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="menu_bottom">
                        <nav role="navigation" class="navbar navbar-default mainmenu">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" data-target="#navbarCollapse" data-toggle="collapse"
                                    class="navbar-toggle">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <!-- Collection of nav links and other content for toggling -->
                            <div id="navbarCollapse" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="/">Home</a></li>
                                    @php
                                    $cat = DB::table('categories')->where('status', 'active')->limit(25)->get();
                                    @endphp
                                    @foreach($cat as $c)
                                    @php
                                    $sub = DB::table('subcategories')->where('status', 'active')->where('cat_id',
                                    $c->id)->get();
                                    @endphp
                                    @if(count($sub) < 1) <li><a href="{{ route('news', ['id' => $c->id]) }}"
                                            target="_blank">{{$c->cat_name}}</a></li>
                                        @else
                                        <li class="dropdown">
                                            <a href="{{ route('news', ['id' => $c->id]) }}" class="dropdown-toggle"
                                                data-toggle="dropdown">{{$c->cat_name}}<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                @foreach($sub as $s)
                                                <li><a href="{{ route('subnews', ['id' => $s->id]) }}">{{$s->name}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endif
                                        
                                        @php
                                        $other = DB::table('categories')->where('status', 'active')->where('id', '>', $c->id)->get();
                                        @endphp
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle"
                                                data-toggle="dropdown">Others<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                @foreach($other as $o)
                                                <li><a href="{{ route('news', ['id' => $o->id]) }}">{{ $o->cat_name }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('news_photo') }}" target="_blank">Photo News</a></li>
                                        <li><a href="{{ route('news_video') }}" target="_blank">Photo Video</a></li>
                                        <li><a href="{{ route('team') }}" target="_blank">Our Team</a></li>
                                </ul>
                                @endforeach
                            </div>
                        </nav>

                    </div><!-- /.header_bottom -->

                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!----------  Scrool  Section Start ---------->

<section class="scrrol_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 scrool">
                <div class="col-md-2 col-sm-2 scrool_1">
                    শিরোনাম :
                </div>
                @php
                $titles = DB::table('posts')->orderBY('id', 'desc')->limit('1')->get();
                @endphp
                <div class="col-md-10 col-sm-10 scrool_2">
                    <marquee>
                        @foreach($titles as $title)
                        <a href="{{ route('singlenews', [ 'id' => $title->id ]) }}">{{ $title->title }}</a>
                        @endforeach
                    </marquee>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="http://bangladate.appspot.com/index2.php"></script>
</section>