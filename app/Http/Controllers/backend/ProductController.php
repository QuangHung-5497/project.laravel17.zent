<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use App\Providers\AuthServiceProvider;
use Illuminate\Support\Facades\Gate;
use Gloudemans\Shoppingcart\Facades\Cart;




class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('deleted_at', NULL)->paginate(10);
        return view('backend.products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('create-product')){
            $categories = Category::where('deleted_at', NULL)->get();
            return view('backend.products.create')->with(['categories'=>$categories]);
        }else{
            return abort(404);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if ($request->hasFile('images')){
            $file = $request->file('images');
            $name = $file->getClientOriginalName();
            $path = $file->move('products', $name);
        }else{
            dd('k co file');
        }

        // $info_images = [];
        // if ($request->hasFile('images')) {

        //     $images = $request->file('images');
        //     foreach ($images as $key => $image) {
        //         $namefile = $image->getClientOriginalName();//lấy tên gốc của ảnh
        //         $url = 'storage/products/' . $namefile;
        //         Storage::disk('public')->putFileAs('products', $image , $namefile);//chuyeern tuwf thu muc nguon sang thu muc dich
        //         $info_images[] = [
        //             'url' => $url,
        //             'name' => $namefile
        //         ];
        //     }
        //     // if ($url) {
        //     //     $request->session()->flash('picture','thêm ảnh thành công');
        //     // }else{
        //     //     $request->session()->flash('picture','thêm ảnh không thành công');
        //     //     // $image->store('images_11');
        //     // }
        //     // foreach ($images as $image) {
        //     //     $name = $image->getClientOriginalName();
        //     //     $image->move('images_11', $name);
        //     // }
        // }
        // else{
        //     echo "không";
        // }

        $product = new Product();
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->content = $request->get('content');
        $product->status = $request->get('status');
        $product->description = $request->get('description');
        $product->image = $path;
        $product->save();
        // foreach($info_images as $info){
        //     $img = new Image();
        //     $img->name = $info['name'];
        //     $product->image = $info['name'];
        //     $img->path = $info['url'];
        //     $img->product_id = $product->id;
        //     $img->save();
        // }

        return redirect()->route('backend.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (Gate::allows('update-product', $product)){
            $categories = Category::where('deleted_at', NULL)->get();
            
            return view('backend.products.edit')->with([
                'categories'=>$categories,
                'product'=>$product
            ]);
        }else{
            return abort(404);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
            if ($request->hasFile('images')){
                $file = $request->file('images');
                $name_img = $file->getClientOriginalName();
                $path = $file->move('products', $name_img);
            }else{
                dd('k co file');
            }

            $name = $request->get('name');
            $slug = \Illuminate\Support\Str::slug($request->get('name'));
            $category_id = $request->get('category_id');
            $origin_price = $request->get('origin_price');
            $sale_price = $request->get('sale_price');
            $content = $request->get('content');
            $status = $request->get('status');
            $description = $request->get('description');
            $image = $path;
            
            

            $product = Product::find($id);
            $product->name = $name;
            $product->slug = $slug;
            $product->category_id = $category_id;
            $product->origin_price = $origin_price;
            $product->sale_price = $sale_price;
            $product->content = $content;
            $product->status = $status;
            $product->description = $description;
            
            $product->image = $image;

            $product->save();

            return redirect()->route('backend.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(Gate::allows('destroy-product', $product)){
            $product->deleted_at = \Carbon\Carbon::now();
            $product->save();
            $url_back = url()->previous();
            return redirect($url_back);
        }else{
            return abort(404);
        }
        
    }
}
