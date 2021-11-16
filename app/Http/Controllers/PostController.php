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
        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.name')
            ->get();
        return view('post.postIndex', ['categories' => $categories, 'posts' => $posts]);
    }

    public function postStore(Request $request)
    {

        $validatePost = $request->validate([
            'title' => 'required|max:125|min:5',
            'details' => 'required|max:400',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $post = array();

        $post['title'] = $request->title;
        $post['category_id'] = $request->category_id;
        $post['details'] = $request->details;
        $postImg = $request->file('image');

        if ($postImg) {
            $uploadTime = Carbon::now()->format('y_m_d h_i_s');
            $ext = Str::lower($postImg->getClientOriginalExtension());
            $imgFullName = $uploadTime . '.' . $ext;
            $uploadPath = 'frontend/upload/images/';
            $imgUrl = $uploadPath . $imgFullName;
            $succcess = $postImg->move(public_path($uploadPath), $imgFullName);
            $post['image'] = $imgUrl;
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
        } else {
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

    public function postSingleView($id)
    {
        $singlePost = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.name')
            ->where('posts.id', $id)
            ->first();
        return view('post.postSingleView', ['singlePost' => $singlePost]);
    }


    public function postEdit($id)
    {
        $categories = DB::table('categories')->get();
        $singlePost = DB::table('posts')->where('id', $id)->first();

        return view('post.postEdit', ['categories' => $categories, 'singlePost' => $singlePost]);
    }

    public function postUpdate(Request $request, $id)
    {
        $validateUpdatePost = $request->validate([
            'title' => 'required|max:125|min:5',
            'details' => 'required|max:400',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $post = array();

        $post['title'] = $request->title;
        $post['category_id'] = $request->category_id;
        $post['details'] = $request->details;
        $postImg = $request->file('image');

        if ($postImg) {
            $uploadTime = Carbon::now()->format('y_m_d h_i_s');
            $ext = Str::lower($postImg->getClientOriginalExtension());
            $imgFullName = $uploadTime . '.' . $ext;
            $uploadPath = 'frontend/upload/images/';
            $imgUrl = $uploadPath . $imgFullName;
            $succcess = $postImg->move(public_path($uploadPath), $imgFullName);
            $post['image'] = $imgUrl;

            unlink($request->oldPhoto);
            $storePost = DB::table('posts')->where('id',$id)->update($post);

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
        } else {
            $post['image'] = $request->oldPhoto;
            $storePost = DB::table('posts')->where('id',$id)->update($post);

            if ($storePost) {
                return back()->with([
                    'message' => 'Post Updated Successfully',
                    'alert-type' => 'success',
                ]);
            } else {
                return back()->with([
                    'message' => 'Post does not update.',
                    'alert-type' => 'error',
                ]);
            }
        }
    }

    public function postDelete($id){
        $post = DB::table('posts')->where('id',$id)->first();
        $postImg = $post->image;
        $deletPost = DB::table('posts')->where('id',$id)->delete();

        if ($deletPost) {
            unlink($postImg);
            return back()->with([
                'message' => 'Post Deleted Successfully',
                'alert-type' => 'success',
            ]);
        } else {
            return back()->with([
                'message' => 'Post can not delete.',
                'alert-type' => 'error',
            ]);
        }
    }
}
