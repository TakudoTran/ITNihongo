@extends('layouts.app')

@section('title')
    <title>This is title</title>
@endsection

@section('content')
    <!-- banner area start -->
    @include('partials.banner')
    <!-- banner area end -->
    <div class="post-area pd-top-75 pd-bottom-50" id="trending">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="section-title">
                        <h6 class="title">Trending News</h6>
                    </div>
                    <div class="post-slider owl-carousel">
                        <div class="item">
                            <div class="trending-post">
                                <div class="single-post-wrap style-overlay">
                                    <div class="thumb">
                                        <img src="{{asset('nextpage-lite/assets/img/post/5.png')}}" alt="img">
                                    </div>
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <p><i class="fa fa-clock-o"></i>December 26, 2018</p>
                                        </div>
                                        <h6 class="title"><a href="#">dasdasdasd </a></h6>
                                    </div>
                                </div>
                                <div class="single-post-wrap style-overlay">
                                    <div class="thumb">
                                        <img src="{{asset('nextpage-lite/assets/img/post/6.png')}}" alt="img">
                                    </div>
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <p><i class="fa fa-clock-o"></i>December 26, 2018</p>
                                        </div>
                                        <h6 class="title"><a href="#">Fssssssssrantine</a></h6>
                                    </div>
                                </div>
                                <div class="single-post-wrap style-overlay">
                                    <div class="thumb">
                                        <img src="{{asset('nextpage-lite/assets/img/post/7.png')}}" alt="img">
                                    </div>
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <p><i class="fa fa-clock-o"></i>December 26, 2018</p>
                                        </div>
                                        <h6 class="title"><a href="#">Indore bags cleanest city</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="section-title">
                        <h6 class="title">Latest News</h6>
                    </div>
                    <div class="post-slider owl-carousel">
                        <div class="item">
                            @php($i = 0)
                            @foreach($latestPosts as $latestPost)
                                @if($i == 5)
                                    @break
                                @endif
                                @php($i++)
                                <a href="{{route('sharing.single-post',['id' => $latestPost->id])}}">
                                    <div class="single-post-list-wrap">
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="{{$latestPost->main_img_path}}" alt="{{$latestPost->main_img_name}}">
                                            </div>
                                            <div class="media-body">
                                                <div class="details">
                                                    <div class="post-meta-single">
                                                        <ul>
                                                            <li><i class="fa fa-clock-o"></i>{{$latestPost->getCreatedAttribute()}}/li>
                                                        </ul>
                                                    </div>
                                                    <h6 class="title"><a href="#">{{$latestPost->title}}</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="item">
                            @php($i = 0)
                            @foreach($latestPosts as $latestPost)
                                @if($i > 5)
                                    <a href="{{route('sharing.single-post',['id' => $latestPost->id])}}">
                                        <div class="single-post-list-wrap">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="{{$latestPost->main_img_path}}" alt="{{$latestPost->main_img_name}}">
                                                </div>
                                                <div class="media-body">
                                                    <div class="details">
                                                        <div class="post-meta-single">
                                                            <ul>
                                                                <li><i class="fa fa-clock-o"></i>{{$latestPost->getCreatedAttribute()}}/li>
                                                            </ul>
                                                        </div>
                                                        <h6 class="title"><a href="#">{{$latestPost->title}}</a></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                                @php($i++)
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="section-title">
                        <h6 class="title">What’s new</h6>
                    </div>
                    <div class="post-slider owl-carousel">
                        <div class="item">
                            <div class="single-post-wrap">
                                <div class="thumb">
                                    <img src="{{asset('nextpage-lite/assets/img/post/8.png')}}" alt="img">
                                </div>
                                <div class="details">
                                    <div class="post-meta-single mb-4 pt-1">
                                        <ul>
                                            <li><a class="tag-base tag-blue" href="#">Tech</a></li>
                                            <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                        </ul>
                                    </div>
                                    <h6 class="title"><a href="#">Uttarakhand’s Hemkund Sahib yatra to start from
                                            September 4</a></h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-post-wrap">
                                <div class="thumb">
                                    <img src="{{asset('nextpage-lite/assets/img/post/8.png')}}" alt="img">
                                </div>
                                <div class="details">
                                    <div class="post-meta-single mb-4 pt-1">
                                        <ul>
                                            <li><a class="tag-base tag-blue" href="#">Tech</a></li>
                                            <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                        </ul>
                                    </div>
                                    <h6 class="title"><a href="#">Uttarakhand’s Hemkund Sahib yatra to start from
                                            September 4</a></h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="section-title">
                        <h6 class="title">Join With Us</h6>
                    </div>
                    <div class="social-area-list mb-4">
                        <ul>
                            <li><a class="facebook" href="#"><i
                                        class="fa fa-facebook social-icon"></i><span>12,300</span><span>Like</span> <i
                                        class="fa fa-plus"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter social-icon"></i><span>12,600</span><span>Followers</span>
                                    <i class="fa fa-plus"></i></a></li>
                            <li><a class="youtube" href="#"><i
                                        class="fa fa-youtube-play social-icon"></i><span>1,300</span><span>Subscribers</span>
                                    <i class="fa fa-plus"></i></a></li>
                            <li><a class="instagram" href="#"><i
                                        class="fa fa-instagram social-icon"></i><span>52,400</span><span>Followers</span>
                                    <i class="fa fa-plus"></i></a></li>
                            <li><a class="google-plus" href="#"><i
                                        class="fa fa-google social-icon"></i><span>19,101</span><span>Subscribers</span>
                                    <i class="fa fa-plus"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="bg-sky pd-top-80 pd-bottom-50" id="latest">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay-bg">
                        <div class="thumb">
                            <img src="{{asset('nextpage-lite/assets/img/post/9.png')}}" alt="img">
                        </div>
                        <div class="details">
                            <div class="post-meta-single mb-3">
                                <ul>
                                    <li><a class="tag-base tag-blue" href="cat-fashion.html">fashion</a></li>
                                    <li><p><i class="fa fa-clock-o"></i>08.22.2020</p></li>
                                </ul>
                            </div>
                            <h6 class="title"><a href="#">A Comparison of the Sony FE 85mm f/1.4 GM and Sigma</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap">
                        <div class="thumb">
                            <img src="{{asset('nextpage-lite/assets/img/post/10.png')}}" alt="img">
                            <p class="btn-date"><i class="fa fa-clock-o"></i>08.22.2020</p>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="#">Rocket Lab will resume launches no sooner than</a></h6>
                        </div>
                    </div>
                    <div class="single-post-wrap">
                        <div class="thumb">
                            <img src="{{asset('nextpage-lite/assets/img/post/11.png')}}" alt="img">
                            <p class="btn-date"><i class="fa fa-clock-o"></i>08.22.2020</p>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="#">P2P Exchanges in Africa Pivot: Nigeria and Kenya the</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap">
                        <div class="thumb">
                            <img src="{{asset('nextpage-lite/assets/img/post/12.png')}}" alt="img">
                            <p class="btn-date"><i class="fa fa-clock-o"></i>08.22.2020</p>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="#">Bitmex Restricts Ontario Residents as Mandated by</a></h6>
                        </div>
                    </div>
                    <div class="single-post-wrap">
                        <div class="thumb">
                            <img src="{{asset('nextpage-lite/assets/img/post/13.png')}}" alt="img">
                            <p class="btn-date"><i class="fa fa-clock-o"></i>08.22.2020</p>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="#">The Bitcoin Network Now 7 Plants Worth of Power</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="trending-post style-box">
                        <div class="section-title">
                            <h6 class="title">Trending News</h6>
                        </div>
                        <div class="post-slider owl-carousel">
                            <div class="item">
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{asset('nextpage-lite/assets/img/post/list/1.png')}}" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Important to rate more liquidity</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{asset('nextpage-lite/assets/img/post/list/2.png')}}" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Sounds like John got the Josh</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{asset('nextpage-lite/assets/img/post/list/3.png')}}" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Grayscale's and Bitcoin Trusts</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{asset('nextpage-lite/assets/img/post/list/4.png')}}" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Sounds like John got the Josh</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-list-wrap mb-0">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{asset('nextpage-lite/assets/img/post/list/5.png')}}" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Grayscale's and Bitcoin Trusts</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{asset('nextpage-lite/assets/img/post/list/1.png')}}" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Important to rate more liquidity</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{asset('nextpage-lite/assets/img/post/list/2.png')}}" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Sounds like John got the Josh</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{asset('nextpage-lite/assets/img/post/list/3.png')}}" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Grayscale's and Bitcoin Trusts</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{asset('nextpage-lite/assets/img/post/list/4.png')}}" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Sounds like John got the Josh</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-list-wrap mb-0">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{asset('nextpage-lite/assets/img/post/list/5.png')}}" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Grayscale's and Bitcoin Trusts</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pd-top-80 pd-bottom-50" id="grid">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="{{asset('nextpage-lite/assets/img/post/15.png')}}" alt="img">
                            <a class="tag-base tag-purple" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title"><a href="#">Why Are the Offspring of Older </a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="{{asset('nextpage-lite/assets/img/post/16.png')}}" alt="img">
                            <a class="tag-base tag-green" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title"><a href="#">People Who Eat a Late Dinner May</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="{{asset('nextpage-lite/assets/img/post/17.png')}}" alt="img">
                            <a class="tag-base tag-red" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title"><a href="#">Kids eat more calories in </a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="{{asset('nextpage-lite/assets/img/post/18.png')}}" alt="img">
                            <a class="tag-base tag-purple" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title"><a href="#">The FAA will test drone </a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="{{asset('nextpage-lite/assets/img/post/19.png')}}" alt="img">
                            <a class="tag-base tag-red" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title"><a href="#">Lifting Weights Makes Your Nervous</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="{{asset('nextpage-lite/assets/img/post/20.png')}}" alt="img">
                            <a class="tag-base tag-blue" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title"><a href="#">New, Remote Weight-Loss Method </a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="{{asset('nextpage-lite/assets/img/post/21.png')}}" alt="img">
                            <a class="tag-base tag-light-green" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title"><a href="#">Social Connection Boosts Fitness App </a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="{{asset('nextpage-lite/assets/img/post/22.png')}}" alt="img">
                            <a class="tag-base tag-blue" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title"><a href="#">Internet For Things - New results </a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-area bg-black pd-top-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h5 class="widget-title">ABOUT US</h5>
                        <div class="widget_about">
                            <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Quis ipsum ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                                facilisis.</p>
                            <ul class="social-area social-area-2 mt-4">
                                <li><a class="facebook-icon" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter-icon" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="youtube-icon" href="#"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a class="instagram-icon" href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="google-icon" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget widget_tag_cloud">
                        <h5 class="widget-title">TAGS</h5>
                        <div class="tagcloud">
                            <a href="#">Consectetur</a>
                            <a href="#">Video</a>
                            <a href="#">App</a>
                            <a href="#">Food</a>
                            <a href="#">Game</a>
                            <a href="#">Internet</a>
                            <a href="#">Phones</a>
                            <a href="#">Development</a>
                            <a href="#">Video</a>
                            <a href="#">Game</a>
                            <a href="#">Gadgets</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h5 class="widget-title">CONTACTS</h5>
                        <ul class="contact_info_list">
                            <li><i class="fa fa-map-marker"></i> 829 Cabell Avenue Arlington, VA 22202</li>
                            <li><i class="fa fa-phone"></i> +088 012121240</li>
                            <li><i class="fa fa-envelope-o"></i> Info@website.com <br> Support@mail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget widget_recent_post">
                        <h5 class="widget-title">POPULAR NEWS</h5>
                        <div class="single-post-list-wrap style-white">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{asset('nextpage-lite/assets/img/post/list/1.png')}}" alt="img">
                                </div>
                                <div class="media-body">
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <ul>
                                                <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                            </ul>
                                        </div>
                                        <h6 class="title"><a href="#">Himachal Pradesh rules in order to allow
                                                tourists </a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-post-list-wrap style-white">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{asset('nextpage-lite/assets/img/post/list/2.png')}}" alt="img">
                                </div>
                                <div class="media-body">
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <ul>
                                                <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                            </ul>
                                        </div>
                                        <h6 class="title"><a href="#">Himachal Pradesh rules in order to allow
                                                tourists </a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom text-center">
                <ul class="widget_nav_menu">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">rivacy Policy</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <p>Copyright ©2021 <a href="https://solverwp.com/">SolverWp</a></p>
            </div>
        </div>
    </div>
@endsection
