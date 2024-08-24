<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brands.index',[
            'brands' =>Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewBrandRequest $request)
    {

     $path = $request->file('image')->storeAs('public/brandImage',$request->file('image')->getClientOriginalName());

        Brand::query()->create([
            'name' => $request->get('name'),
            'image' => $path
        ]);

        return redirect(route('brands.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', [
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $BrandExists = Brand::query()
            ->where('name',$request->get('name'))
            ->where('id','!=',$brand->id)
            ->exists();
        if ($BrandExists)
        {
            return back()->withErrors(['title' =>'is already taken']);
        }
        $path = $brand->image;
        if ($request->hasFile('image'))
        {
            $path = $request->file('image')->storeAs('public/brandImage',$request->file('image')->getClientOriginalName());
            $path_OldImage = str_replace('public','storage',$brand->image);
            if (file_exists($path_OldImage))
            {
                unlink($path_OldImage);
            }
        }
        $brand->update([
            'name' => $request->get('name'),
            'image' => $path
        ]);

        return redirect(route('brands.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $path = str_replace('public','storage',$brand->image);
        if (file_exists($path))
        {
            unlink($path);
        }
        $brand->delete();

        return redirect(route('brands.index'));

    }
}
