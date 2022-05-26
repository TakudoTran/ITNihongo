@extends('layouts.app')

@section('title')
    <title>This is title</title>
@endsection
@section('custom_css')
    <style>
        img.img-latest {
            max-height: 100px;
            width: 100%;
            object-fit: cover
        }

        img.img-trending {
            max-height: 210px;
            width: 100%;
            object-fit: cover
        }
    </style>
@endsection

@section('content')
    <!-- banner area start -->
    @include('partials.banner')
    <!-- banner area end -->
    <div class="post-area pd-top-75 pd-bottom-50" id="trending">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="section-title">
                        <h6 class="title">Trending News</h6>
                    </div>
                    <div class="post-slider owl-carousel">
                        <div class="item">
                            @php($i = 0)
                            <div class="trending-post">
                                @foreach($trendingPosts as $trendingPost)
                                    @if($i == 2)
                                        @break
                                    @endif
                                    <div class="single-post-wrap style-overlay">
                                        <div class="thumb">
                                            <img class="img-trending" src="{{$trendingPost->main_img_path}}"
                                                 alt="{{$trendingPost->main_img_name}}">
                                        </div>
                                        <div class="details">
                                            <div class="post-meta-single">
                                                <p><i class="fa fa-clock-o"></i>{{$trendingPost->getCreatedAttribute()}}
                                                </p>
                                            </div>
                                            <h6 class="title">{{$trendingPost->title}}</h6>
                                        </div>
                                    </div>
                                    @php($i++)
                                @endforeach
                            </div>
                        </div>
                        <div class="item">
                            @php($i = 0)
                            <div class="trending-post">
                                @foreach($trendingPosts as $trendingPost)
                                    @if($i >= 2)
                                        <div class="single-post-wrap style-overlay">
                                            <div class="thumb">
                                                <img class="img-trending" src="{{$trendingPost->main_img_path}}"
                                                     alt="{{$trendingPost->main_img_name}}">
                                            </div>
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <p>
                                                        <i class="fa fa-clock-o"></i>{{$trendingPost->getCreatedAttribute()}}
                                                    </p>
                                                </div>
                                                <h6 class="title">{{$trendingPost->title}}</h6>
                                            </div>
                                        </div>
                                    @endif
                                    @php($i++)
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
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
                                                <img class="img-latest" src="{{$latestPost->main_img_path}}"
                                                     alt="{{$latestPost->main_img_name}}">
                                            </div>
                                            <div class="media-body">
                                                <div class="details">
                                                    <div class="post-meta-single">
                                                        <ul>
                                                            <li>
                                                                <i class="fa fa-clock-o"></i>{{$latestPost->getCreatedAttribute()}}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <h6 class="title">{{$latestPost->title}}</h6>
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
                                @if($i >= 5)
                                    <a href="{{route('sharing.single-post',['id' => $latestPost->id])}}">
                                        <div class="single-post-list-wrap">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="img-latest" src="{{$latestPost->main_img_path}}"
                                                         alt="{{$latestPost->main_img_name}}">
                                                </div>
                                                <div class="media-body">
                                                    <div class="details">
                                                        <div class="post-meta-single">
                                                            <ul>
                                                                <li>
                                                                    <i class="fa fa-clock-o"></i>{{$latestPost->getCreatedAttribute()}}
                                                                    /li>
                                                            </ul>
                                                        </div>
                                                        <h6 class="title">{{$latestPost->title}}</h6>
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
            </div>
        </div>
    </div>
    <div class="pd-top-80 pd-bottom-50" id="grid">
        <div class="container">
            <hr>
            <div class="row mb-3">
                <h2>Popular posts</h2>
            </div>
            <div class="row">
                @php($tags = ['Hot', 'New', 'Popular'])
                @php($colors = ['red', 'blue', 'purple'])
                @foreach($highRatePosts as $post)
                    @php($i = rand(0,2))
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-post-wrap style-overlay">
                            <div class="thumb">
                                <img style="height: 250px;object-fit: cover;" src="{{$post->main_img_path}}"
                                     alt="{{$post->main_img_name}}">
                                <a class="tag-base tag-{{$colors[$i]}}"
                                   href="{{route('sharing.single-post',['id'=> $post->id])}}">{{$post['aggregate']}}</a>
                            </div>
                            <div class="details">
                                <div class="post-meta-single">
                                    <p><i class="fa fa-clock-o"></i>{{$post->getCreatedAttribute()}}</p>
                                </div>
                                <h6 class="title"><a
                                        href="{{route('sharing.single-post',['id'=> $post->id])}}">{{$post->title}}</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
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
