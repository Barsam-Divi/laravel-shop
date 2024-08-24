<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewCategoryRequest;
use App\Models\category;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index',[
            'categories' => category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create',[
            'categories' => category::all(),
            'properties' => PropertyGroup::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewCategoryRequest $request)
    {
       $category = category::query()->create([
            'title' => $request->get('title'),
            'parent_id' => $request->get('parent_id')
        ]);

        if (!empty($request->get('properties')))
        {
            $category->propertyGroups()->attach($request->get('properties'));
        }

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('admin.categories.edit',[
            'category' => $category,
            'categories' => category::all(),
            'properties' => PropertyGroup::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $categoryExists = category::query()
            ->where('title' , $request->get('title'))
            ->where('id','!=',$category->id)
            ->exists();
        if ($categoryExists)
        {
            return back()->withErrors(['title' =>'title is already been taken']);
        }
        if (!empty($request->get('properties')))
        {
            $category->propertyGroups()->sync($request->get('properties'));
        }
        elseif ($category->propertyGroups()->count() > 0)
        {
            $category->propertyGroups()->detach();
        }
        $category->update([
            'title' => $request->get('title'),
            'parent_id' => $request->get('parent_id')
        ]);

        return redirect('/adminpanel/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->propertyGroups()->detach();

        $category->delete();

        return redirect('/adminpanel/categories');
    }
}
