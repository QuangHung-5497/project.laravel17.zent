<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('deleted_at',NULL)->paginate(10);
        $category_name = Category::where('deleted_at',NULL)->get();
        return view('backend.categories.index')->with([
            'categories'=>$categories,
            'category_name'=>$category_name
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(Gate::allows('create-category')){
            $categories = Category::where('parent_id',0)->where('deleted_at',NULL)->get();
            return view('backend.categories.create')->with(['categories'=>$categories]);
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
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->get('name');
        $category->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $category->parent_id = $request->get('parent_id');
        $category->save();
        return redirect()->route('backend.category.index');



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
        $category = Category::find($id);
        if(Gate::allows('update-category', $category)){
            $categories = Category::where('parent_id',0)->where('deleted_at',NULL)->get();
        
            return view('backend.categories.edit')->with([
                'categories'=>$categories,
                'category'=>$category
            ]);
        }else
        return abort(404);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $name = $request->get('name');
        $slug = \Illuminate\Support\Str::slug($request->get('name'));
        $parent_id = $request->get('parent_id');

        $category = Category::find($id);
        $category->name = $name;
        $category->slug = $slug;
        $category->parent_id = $parent_id;


        $category->save();

        return redirect()->route('backend.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if(Gate::allows('destroy', $product)){
            
            $category->deleted_at = \Carbon\Carbon::now();
            $category->save();
            $url_back = url()->previous();
            return redirect($url_back);
        }else{
            return abort(404);
        }
        
    }
}
