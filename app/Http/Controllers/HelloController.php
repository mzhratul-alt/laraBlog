<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }

    public function categories()
    {
        $categories = DB::table('categories')->get();
        return view('categories.createCategory', ['categories'=>$categories]);
    }

    public function StoreCategory(Request $request)
    {
        $insCat = [
            'name' => $request->name,
            'slug' => $request->slug,
        ];
        $category = Categorie::insert($insCat);

        if ($category) {
            return back()->with([
                'message' => 'Inserted Successfully',
                'alert-type' => 'success',
            ]);
        } else {
            return back()->with([
                'message' => 'Category does not insert.',
                'alert-type' => 'error',
            ]);
        }
    }

    public function categoryView($id){
        $category = DB::table('categories')->where('id',$id)->first();
        return view('categories.singleView',['category'=>$category]);
    }

    public function categoryEdit($id){
        $editcategory = DB::table('categories')->where('id',$id)->first();
        return view('categories.categoryEdit',['category'=>$editcategory]);
    }

    public function categoryUpdate(Request $request, $id){
        $validateData = $request-> validate([
            'name' => 'required|max:25|min:4',
            'slug' => 'required|max:25|min:4'
        ]);

        $updCat = [
            'name' => $request->name,
            'slug' => $request->slug,
        ];
        $updatecategory = DB::table('categories')->where('id',$id)->update($updCat);

        if ($updatecategory) {
            return back()->with([
                'message' => 'Updated Successfully',
                'alert-type' => 'success',
            ]);
        } else {
            return back()->with([
                'message' => 'Data Can not update.',
                'alert-type' => 'error',
            ]);
        }
    }

    public function categoryDelete($id){
        $delCategory = DB::table('categories')->where('id',$id)->delete();

        if ($delCategory) {
            return back()->with([
                'message' => 'Delected Successfully',
                'alert-type' => 'success',
            ]);
        } else {
            return back()->with([
                'message' => 'Category can not delete.',
                'alert-type' => 'error',
            ]);
        }
    }
}
