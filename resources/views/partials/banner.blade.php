<div class="banner-area banner-inner-1 bg-black" id="banner">
    <!-- banner area start -->
    <div class="banner-inner pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="thumb after-left-top">
                        <img style="width: 100%" src="{{$bannerPost[0]->main_img_path}}" alt="img">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="banner-details mt-4 mt-lg-0">
                        <div class="post-meta-single">
                            <ul>
                                <li><a class="tag-base tag-red" href="#">Hot</a></li>
                                <li class="date"><i class="fa fa-clock-o"></i>{{$bannerPost[0]->getCreatedAttribute()}}
                                </li>
                            </ul>
                        </div>
                        <h2>{{$bannerPost[0]->title}}</h2>
                        <div class="row">
                            <div class="col text-truncate" style="max-height: 120px;">
                                {!!$bannerPost[0]->content!!}
                            </div>
                        </div>

                        <a class="btn btn-blue" href="{{route('sharing.single-post',['id'=> $bannerPost[0]->id])}}">Read
                            More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner area end -->

    <div class="container">
        <div class="row">
            @php($tags = ['Hot', 'Popular', 'New'])
            @php($colors = ['red', 'purple', 'blue'])
             @foreach($bannerRandomPosts as $post)
                @php($i = rand(0,2))
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-white">
                        <div class="thumb">
                            <img style="width: 265px; height: 193px" src="{{$post->main_img_path}}" alt="{{$post->main_img_name}}">
                            <a class="tag-base tag-{{$colors[$i]}}" href="#">{{$tags[$i]}}</a>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="{{route('sharing.single-post',['id' => $post->id])}}">{{$post->title}}</a></h6>
                            <div class="post-meta-single mt-3">
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>{{$post->getCreatedAttribute()}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
             @endforeach
        </div>
    </div>
</div>
