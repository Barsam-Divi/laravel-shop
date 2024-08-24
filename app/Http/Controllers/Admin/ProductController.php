<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index',[
            'products' => product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create',[
            'categories' => category::query()->where('parent_id','!=',null)->get(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewProductRequest $request)
    {
        $request['slug'] = str_replace(array(' ','!',')','(','[',']','?','_'),'-',$request->get('name'));

        $slugExists = product::query()->where('slug',$request->get('slug'))->exists();

        if ($slugExists)
        {
            return redirect()->back()->withErrors(['title' => 'title is already exists']);
        }

        $ImagePath = $request->file('image')->storeAs('public/productimage',$request->file('image')->getClientOriginalName());

        product::query()->create([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'category_id' => $request->get('category_id'),
            'brand_id' => $request->get('brand_id'),
            'cost' => $request->get('cost'),
            'description' => $request->get('description'),
            'image' => $ImagePath
        ]);

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        return view('admin.products.edit',[
            'product' => $product,
            'categories' => category::query()->where('parent_id','!=',null)->get(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, product $product)
    {

        $request['slug'] = str_replace(array(' ','!',')','(','[',']','?','_'),'-',$request->get('name'));

        $slugExists = product::query()
            ->where('slug',$request->get('slug'))
            ->where('id','!=',$product->id)
            ->exists();

        if ($slugExists)
        {
            return redirect()->back()->withErrors(['title' => 'title is already exists']);
        }

        $ImagePath = $product->image;
        if ($request->hasFile('image'))
        {
            $ImagePath = $request->file('image')->storeAs('public/productimage',$request->file('image')->getClientOriginalName());
            $path_OldImage = str_replace('public','storage',$product->image);
            if (file_exists($path_OldImage))
            {
                unlink($path_OldImage);
            }
        }

        $product->update([
            'name' => $request->get('name',$product->name),
            'slug' => $request->get('slug'),
            'category_id' => $request->get('category_id'),
            'brand_id' => $request->get('brand_id'),
            'cost' => $request->get('cost'),
            'description' => $request->get('description'),
            'image' => $ImagePath
        ]);

        return redirect(route('products.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $path = str_replace('public','storage',$product->image);

        if (file_exists($path))
        {
            unlink($path);
        }

        $product->delete();

        return redirect(route('products.index'));
    }
}
