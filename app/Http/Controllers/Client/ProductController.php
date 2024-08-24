<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\category;
use App\Models\product;

class ProductController extends Controller
{
    public function show(product $product)
    {
        return view('client.products.show',[
            'product' => $product,

        ]);
    }
}
