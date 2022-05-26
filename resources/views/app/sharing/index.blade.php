@extends('layouts.app')

@section('title')
    <title>sharing</title>
@endsection


@section('custom_css')
    <style>
        .banner-inner .banner-details  p{
            display: block
        }
    </style>
@endsection

@section('custom_js')

@endsection

@section('content')
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-md-12">
                <a href="{{route('sharing.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus mr-2"></i>New post</a>
            </div>
        </div>
    </div>
    <div class="pd-top-80 pd-bottom-50" id="grid">
        <div class="container">
            <div class="row">
                @foreach($sharingPosts as $post)
                    <a href="{{route('sharing.single-post',['id' => $post->id])}}">
                        <div class="col-lg-6 col-sm-9">
                            <div class="single-post-wrap ">
                                <div class="thumb">
                                    <img style="width: 100%" src="{{$post->main_img_path}}" alt="{{$post->main_img_name}}">
                                    <a class="tag-base tag-purple" href="#">Tech</a>
                                </div>
                                <div class="details">
                                    <div class="post-meta-single">
                                        <p><i class="fa fa-clock-o"></i>{{$post->getCreatedAttribute()}}</p>
                                    </div>
                                    <h6 class="title"><a href="#">{{$post->title}}</a></h6>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="text-xs-center">
                    {{$sharingPosts->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection


