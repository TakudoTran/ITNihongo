<?php

namespace App\Http\Controllers;

use App\Components\Recursive;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\PostComment;
use App\Models\PostImage;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\SharingPost;
use App\Models\Tag;
use App\Models\rate;
use App\Traits\CheckAuthTraits;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTraits;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function Psy\sh;

class SharingPostController extends Controller
{
    use StorageImageTraits;
    use CheckAuthTraits;

    private $category;
    private $postImage;
    private $sharingPost;
    private $postComment;

    public function __construct(Category $category,PostImage $postImage, SharingPost $sharingPost, PostComment $postComment)
    {
        $this->category = $category;
        $this->postImage = $postImage;
        $this->sharingPost = $sharingPost;
        $this->postComment = $postComment;
    }

    //
    public function index()
    {
        $sharingPosts =  $this->sharingPost->latest()->paginate(5);
        return view('app.sharing.index',['sharingPosts'=>$sharingPosts]);
    }
    public function single_post($id)
    {
        $featuredPosts = $this->sharingPost->inRandomOrder()->limit(3)->get();
        $latestPosts = $this->sharingPost->latest()->limit(3)->get();
        $comments = $this->postComment->where(['parent_id' => '0', 'post_id' => $id])->get();
        $post = $this->sharingPost->find($id);
        $rates = rate::where('post_id', $id)->get();
        $total = 0;
        foreach ($rates as $rate){
            $total = $total + $rate->value;
        }
        return view('app.sharing.post-detail', ['post' => $post,
            'featuredPosts' => $featuredPosts, 'latestPosts' => $latestPosts,
            'comments' => $comments, 'totalRate' => $total]);
    }
    public function single_post_comment(Request $request)
    {
        if($this->notLoggedIn()) return redirect('user/login');
        DB::beginTransaction();
        $post_id = $request->post_id;
        $newComment = [
            'content' => $request->comment_content,
            'user_id' => Auth::user()->id
        ];
        if(!empty($request->parent_id)){
            $newComment['parent_id'] = $request->parent_id;
        }
        $this->sharingPost->find($post_id)->comments()->create($newComment);
        DB::commit();
        return redirect()->route('sharing.single-post',$post_id);
    }

    public function create()
    {
        if($this->notLoggedIn()) return redirect()->to('user/login');
        return view('app.sharing.create',['category_id' => 1, 'category_name'=>'sharing']);
    }

    public function store(Request $req): RedirectResponse
    {

        try {
            DB::beginTransaction();
            //base product data
            $dataPostCreate = [
                'title' => $req->title,
                'content' => $req->postcontent,
                'user_id' => auth()->id(),
                'category_id' => '1',
            ];
            //product main image data
            if ($req->hasFile('main_image')) {
                $image_file = $req->main_image;
                $post_image_info = $this->getUploadedImageInfo($image_file, 'product');
                if (!empty($post_image_info)) {
                    $dataPostCreate['main_img_path'] = $post_image_info['file_path'];
                    $dataPostCreate['main_img_name'] = $post_image_info['file_name'];
                }
            }
            // add new product
            $newPost = $this->sharingPost->create($dataPostCreate);

            //insert detail image to product_images
            if ($req->hasFile('detail_images')) {
                foreach ($req->detail_images as $detail_image) {
                    $detail_image_info = $this->getUploadedImageInfo($detail_image, 'sharing-posts');
                    $newPost->detailImages()->create([
                        'img_path' => $detail_image_info['file_path'],
                        'img_name' => $detail_image_info['file_name'],

                    ]);
                }
            }

            DB::commit();
            $resMessage = 'Thêm thành công!';
            return redirect()->route('sharing.create')->with('success', $resMessage);
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . '----Line: ' . $exception->getLine());
            DB::rollBack();
            $resMessage = 'Thêm thất bại!';
            return redirect()->route('sharing.create')->with('failure', $resMessage);

        }
    }

    public function edit($id)
    {

    }

    public function update($id, Request $req)
    {

    }

    public function delete($id)
    {

    }
    //rate
    public function createRate($id, $type)
    {
        try{
                $rate = rate::where('user_id', Auth::id())->where('post_id',$id)->first();
                if(is_null($rate))
                {
                    $rate = rate::create([
                        'user_id' => Auth::id(),
                        'post_id' => $id,
                        'value' => $type,
                    ]);
                }
                else
                {
                    $rate->update([
                        'value' => $type
                    ]);

                }
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        }
        catch(Exception $e){
            return response()->json([
                'code' => 500,
                'message' => 'failed'
            ], 500);
        }
    }
}
