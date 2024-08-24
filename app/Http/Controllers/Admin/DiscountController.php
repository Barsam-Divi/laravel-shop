<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewProductDiscountRequest;
use App\Http\Requests\UpdateProductDiscountRequest;
use App\Models\discount;
use App\Models\product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewProductDiscountRequest $request,product $product)
    {
        $product->productDiscount($request);

        return redirect()->back();
    }


    public function update(UpdateProductDiscountRequest $request, product $product)
    {
            if ($request->get('percent') ==0)
            {
                return $this->destroy($product);
            }
            $product->UpdateProductDiscount($request);

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->DeleteProductDiscount();

        return redirect()->back();

    }
}
