<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;

class OnetechController extends Controller
{
    public function index(){
    	$cate = Category::where('parent_id','!=',0)->where('deleted_at', NULL)->get();
    	$product_dacsac = Product::where('deleted_at', NULL)->limit(16)->get();
        $product_giamgia = Product::where('deleted_at', NULL)->orderBy('sale_price','desc')->limit(8)->get();
        $product_banchay = Product::where('deleted_at', NULL)->orderBy('view_count', 'desc')->limit(8)->get();
        $product_random = Product::where('deleted_at' , NULL)->get()->random(3);
    	return view('fontend.index')->with([
    		'cate'=>$cate,
    		'product_dacsac'=>$product_dacsac,
            'product_giamgia'=>$product_giamgia,
            'product_banchay'=>$product_banchay,
            'product_random'=>$product_random
    	]);
    }
    public function cart(){
    	return view('fontend.pages.cart');
    }
    public function contact(){
    	return view('fontend..pages.contact');
    }
    public function product($id){
        $product = Product::find($id);
        $images = Image::where('product_id', $id)->where('deleted_at', NULL)->get()->random(3);
    	return view('fontend.pages.product')->with([
            'product'=>$product,
            'images'=>$images
        ]);
    }
    public function shop($slug){
        $category_slug = Category::where('deleted_at', NULL)->where('slug', $slug)->first();
        $category_con = Category::where('deleted_at', NULL)->where('parent_id', $category_slug->id)->get();
        $category_id = Category::where('deleted_at', NULL)->where('parent_id', $category_slug->id)->get('id');
        $product_found = Product::where('deleted_at', NULL)->whereIn('category_id', $category_id)->orWhere('category_id', $category_slug->id)->paginate(20);
        $product_view = Product::where('deleted_at', NULL)->orderBy('view_count','desc')->limit(6)->get();
    	return view('fontend.pages.shop')->with([
            'category_con'=>$category_con,
            'product_found'=>$product_found,
            'product_view'=>$product_view
        ]);
    }
    // public function shop1($id $slug){
    //     $category_id = Category::where('deleted_at', NULL)->find($id);
    //     $category_slug = Category::where('deleted_at', NULL)->where('category_id', $category_id->id)->get();
    //     dd($category_slug);
    // }


}
