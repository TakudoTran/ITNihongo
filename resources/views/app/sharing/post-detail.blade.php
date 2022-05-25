@extends('layouts.app')

@section('title')
    <title>sharing</title>
@endsection


@section('custom_css')
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">
    <link href="{{asset('apps/sharing/single-post/style.css')}}" rel="stylesheet">
@endsection

@section('custom_js')
    <script src="{{asset('vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('apps/sharing/add/add.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/hs0hspk14k2y30j7kqjieanll961v60zcy71z7m80zwbcnd4/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="single-news mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sn-container">
                        <div class="sn-img">
                            <img src="{{$post->main_img_path}}" alt="{{$post->main_img_name}}"/>
                        </div>
                        <div class="sn-content">
                            <h1 class="sn-title">{{$post->title}}</h1>
                            <div class="row">
                                {!! $post->content!!}
                            </div>
                        </div>
                    </div>
                    {{--comments--}}
                    <form action="{{route('sharing.single-post-comment')}}" method="post">
                        @csrf
                        <div class="form-group ">
                            <label><h2>Comments</h2></label>
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <textarea name="comment_content"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Write your comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <hr>
                    {{--                    all comments--}}
                    <div class="sn-container">
                        <h2>All commnents</h2>
                        <ul class="timeline-comments">
                            @foreach($comments as $comment)
                                <li class="timeline-comment">
                                    <div class="timeline-comment-wrapper">
                                        <div class="card">
                                            <div class="card-header d-flex align-items-center">
                                                <a href="#" class="d-flex align-items-center">
                                                    <img class="rounded-circle" src="https://picsum.photos/50"
                                                         alt="avatar"/>
                                                    <h5>{{$comment->owner->name}}</h5>
                                                </a>
                                                <div class="comment-date">{{$comment->getCreatedAttribute()}}</div>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">{{$comment->content}}</p>
                                            </div>
{{--                                            reply--}}
                                            <div class="card-footer bg-white p-2">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                        data-toggle="collapse" data-target="#reply{{$comment->id}}"
                                                        aria-expanded="false" aria-controls="reply{{$comment->id}}">Reply
                                                </button>
                                                <small class="text-muted ml-2">Last updated 3 mins ago</small>
                                            </div>
                                            <div class="collapse" id="reply{{$comment->id}}">
                                                <div class="card card-body">
                                                    <form action="{{route('sharing.single-post-comment')}}"
                                                          method="post">
                                                        @csrf
                                                        <div class="form-group ">
                                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                                            <input type="hidden" name="parent_id"
                                                                   value="{{$comment->id}}">
                                                            <textarea name="comment_content"
                                                                      class="form-control"
                                                                      rows="3"
                                                                      placeholder="Write your comment"></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
{{--                                            end reply--}}

                                            {{--                                            child comments--}}
                                            <ul class="timeline-comments">
                                                @foreach($comment->childComments as $child)
                                                    <li class="timeline-comment">
                                                        <div class="timeline-comment-wrapper">
                                                            <div class="card">
                                                                <div class="card-header d-flex align-items-center">
                                                                    <a href="#" class="d-flex align-items-center">
                                                                        <img class="rounded-circle" src="https://picsum.photos/50" alt="avatar" />
                                                                        <h5>{{$child->owner->name}}</h5>
                                                                    </a>
                                                                    <div class="comment-date" >{{$child->getCreatedAttribute()}}</div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <p class="card-text">{{$child->content}}</p>
                                                                </div>
                                                                <div class="card-footer bg-white p-2">
                                                                    <small class="text-muted ml-2">Last updated 3 mins ago</small>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 ">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <div class="tab-news">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#featured">Featured</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#popular">Popular</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="featured" class="container tab-pane active">
                                        @foreach($featuredPosts as $post)
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="{{$post->main_img_path}}" alt="{{$post->main_img_name}}"/>
                                                </div>
                                                <div class="tn-title">
                                                    <a href="{{route('sharing.single-post',['id' => $post->id])}}">{{$post->title}}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div id="popular" class="container tab-pane fade">
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-4.jpg"/>
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-3.jpg"/>
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-2.jpg"/>
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-1.jpg"/>
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-2.jpg"/>
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="latest" class="container tab-pane fade">
                                        @foreach($latestPosts as $post)
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="{{$post->main_img_path}}" alt="{{$post->main_img_name}}"/>
                                                </div>
                                                <div class="tn-title">
                                                    <a href="{{route('sharing.single-post',['id' => $post->id])}}">{{$post->title}}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

@endsection


