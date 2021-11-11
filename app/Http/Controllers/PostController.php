<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function postIndex()
    {
        $categories = DB::table('categories')->get();
        $posts = DB::table('posts')->get();
        return view('post.postIndex',['categories' => $categories,'posts' => $posts]);

    }

    public function postStore(Request $request){

        $validatePost = $request->validate([
            'title' =>'required|max:125|min:5',
            'details' =>'required|max:400',
            'image' =>'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $post = array();

        $post['title'] = $request->title;
        $post['category_id'] = $request->category_id;
        $post['details'] = $request->details;
        $postImg = $request->file('image');

        if($postImg) {
            $uploadTime = Carbon::now()->format('y_m_d h_i_s');
            $ext = Str::lower($postImg->getClientOriginalExtension());
            $imgFullName = $uploadTime.'.'.$ext;
            $uploadPath = 'frontend/upload/images/';
            $imgUrl = $uploadPath.$imgFullName;
            $succcess = $postImg->move(public_path($uploadPath),$imgFullName);
            $post['image']=$imgUrl;
            $storePost = DB::table('posts')->insert($post);

            if ($storePost) {
                return back()->with([
                    'message' => 'Post Inserted Successfully',
                    'alert-type' => 'success',
                ]);
            } else {
                return back()->with([
                    'message' => 'Post does not insert.',
                    'alert-type' => 'error',
                ]);
            }

        }else{
            $storePost = DB::table('posts')->insert($post);

            if ($storePost) {
                return back()->with([
                    'message' => 'Post Inserted Successfully',
                    'alert-type' => 'success',
                ]);
            } else {
                return back()->with([
                    'message' => 'Post does not insert.',
                    'alert-type' => 'error',
                ]);
            }
        }
    }

    public function postSingleView(){

    }
}
