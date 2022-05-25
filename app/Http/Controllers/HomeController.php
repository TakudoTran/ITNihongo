<?php

namespace App\Http\Controllers;

use App\Models\SharingPost;
use Illuminate\Http\Request;

class HomeController extends Controller

{
    private $sharingPost;
    public function __construct(SharingPost $sharingPost)
    {
        $this->sharingPost = $sharingPost;
    }

    //
    public function index()
    {
        $trendingPosts = $this->sharingPost->inRandomOrder()->limit(3)->get();
        $latestPosts = $this->sharingPost->latest()->limit(10)->get();
        $newPost = $this->sharingPost->latest()->limit(3)->get();
        return view('home',['latestPosts' => $latestPosts]);
    }
}
