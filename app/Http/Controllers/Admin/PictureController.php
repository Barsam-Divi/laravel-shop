<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewProductPictureRequest;
use App\Models\picture;
use App\Models\product;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(product $product)
    {

        return view('admin.pictures.index',[
            'product' =>$product
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(product $product)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewProductPictureRequest $request,product $product)
    {
        $product->addPictures($request);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product ,picture $picture)
    {
        $product->deletePicture($picture);

        return redirect()->back();
    }
}
