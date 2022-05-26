<?php

namespace App\Http\Controllers;

use App\Models\SharingPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //banner
        $bannerPost = $this->sharingPost->latest()->limit(1)->get();
        $bannerRandomPosts = $this->sharingPost->inRandomOrder()->limit(4)->get();
        //
        $trendingPosts = $this->sharingPost->inRandomOrder()->limit(4)->get();
        $latestPosts = $this->sharingPost->latest()->limit(10)->get();

        $highRatePosts = SharingPost::select(DB::raw('sharing_posts.*, count(sharing_posts.id) as aggregate'))
            ->leftJoin('rates', 'rates.post_id', '=', 'sharing_posts.id')
            ->groupBy('sharing_posts.id')
            ->orderBy('aggregate', 'desc')
            ->limit(8)
            ->get();
        $interestedPosts = $this->sharingPost->inRandomOrder()->limit(8)->get();

        return view('home',['latestPosts' => $latestPosts,
            'bannerPost'=> $bannerPost,
            'bannerRandomPosts'=>$bannerRandomPosts,
            'highRatePosts'=> $highRatePosts,
            'trendingPosts' => $trendingPosts,
            'interestedPosts' => $interestedPosts]);
    }
}
