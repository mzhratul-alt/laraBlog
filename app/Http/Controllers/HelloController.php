<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HelloController extends Controller
{
    public function index(){
        return view('home');
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }

    public function postCreate(){
        return view('post.createPost');
    }
    public function categories(){
        return view('categories.createCategory');
    }

    public function StoreCategory(Request $request){
        $insCat = [
            'name' => $request->name,
            'slug' => $request->slug,
        ];
        $category= DB::table('categories')->insert($insCat);
    }
}
