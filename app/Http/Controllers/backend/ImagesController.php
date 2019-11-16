<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Http\Requests\StoreImageRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;


class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::where('deleted_at',NULL)->get();
        $products = Product::where('deleted_at',NULL)->paginate(10);
        return view('backend.images.index')->with([
            'images'=>$images,
            'products'=>$products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.images.create');
        
    }
    public function created($id)
    {
        if(Gate::allows('create-image', $product)){
            $product = Product::find($id);
            return view('backend.images.create')->with(['product'=>$product]);
        }else{
            return abort(404);
        }
        
        
    }
    public function stores(StoreImageRequest $request, $id)
    {
        $product = Product::find($id);
        $info_images = [];
        if ($request->hasFile('images')) {

            $images = $request->file('images');
            foreach ($images as $key => $image) {
                $namefile = $image->getClientOriginalName();//lấy tên gốc của ảnh
                $url = 'storage/images/' . $namefile;
                Storage::disk('public')->putFileAs('images', $image , $namefile);//chuyeern tuwf thu muc nguon sang thu muc dich
                $info_images[] = [
                    'url' => $url,
                    'name' => $namefile
                ];
            }
            // if ($url) {
            //     $request->session()->flash('picture','thêm ảnh thành công');
            // }else{
            //     $request->session()->flash('picture','thêm ảnh không thành công');
            //     // $image->store('images_11');
            // }
            // foreach ($images as $image) {
            //     $name = $image->getClientOriginalName();
            //     $image->move('images_11', $name);
            // }
        }
        else{
            dd('Khong co file');
        }
        // $image = Product::find($id);
        foreach($info_images as $info){
            $img = new Image();
            $img->name = $info['name'];
            // $product->image = $info['name'];
            $img->path = $info['url'];
            $img->product_id = $product->id;
            $img->save();
        }
        return redirect()->route('backend.image.edit',$product->id);
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info_images = [];
        if ($request->hasFile('images')) {

            $images = $request->file('images');
            foreach ($images as $key => $image) {
                $namefile = $image->getClientOriginalName();//lấy tên gốc của ảnh
                $url = 'storage/images/' . $namefile;
                Storage::disk('public')->putFileAs('images', $image , $namefile);//chuyeern tuwf thu muc nguon sang thu muc dich
                $info_images[] = [
                    'url' => $url,
                    'name' => $namefile
                ];
            }
            // if ($url) {
            //     $request->session()->flash('picture','thêm ảnh thành công');
            // }else{
            //     $request->session()->flash('picture','thêm ảnh không thành công');
            //     // $image->store('images_11');
            // }
            // foreach ($images as $image) {
            //     $name = $image->getClientOriginalName();
            //     $image->move('images_11', $name);
            // }
        }
        else{
            dd('Khong co file');
        }
        // $image = Product::find($id);
        foreach($info_images as $info){
            $img = new Image();
            $img->name = $info['name'];
            // $product->image = $info['name'];
            $img->path = $info['url'];
            $img->product_id = 1;
            $img->save();
        }
        return redirect()->route('backend.image.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        if(Gate::allows('edit-image', $products)){
            $images = Image::where('deleted_at',NULL)->get();
            
            // dd($products);
            return view('backend.images.edit')->with([
                'images'=>$images,
                'products'=>$products
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
    public function update(StoreImageRequest $request, $id)
    {
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $name_img = $file->getClientOriginalName();
            $path = $file->move('products', $name_img);
        }else{
             dd('k co file');
        }
        $image =Image::find($id);
        $image->path = $path;
        $image->name = $name_img;
        $image->save();
        return redirect()->route('backend.image.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        if(Gate::allows('destroy-image', $image)){
            
            $image->deleted_at = \Carbon\Carbon::now();
            $image->save();
            $url_back = url()->previous();
            return redirect($url_back);
        }else{
            return abort(404);
        }
        
    }
}
