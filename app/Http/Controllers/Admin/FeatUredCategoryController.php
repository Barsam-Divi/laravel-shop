<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\FeatUredCategory;

class FeatUredCategoryController extends Controller
{
    public function create()
    {
        return view('admin.featuredcategory.create',[
            'categories' => category::query()->where('parent_id' , null)->get() ,
            'featuredCategory' => FeatUredCategory::getCategory()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required' , 'exists:categories,id']
        ]);

        FeatUredCategory::query()->delete();

        FeatUredCategory::query()->create(
            [
                'category_id' => $request->get('category')
            ]
        );

        return back();
    }
}
