<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewCartRequest;
use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(NewCartRequest $request)
    {


        $product= product::find($request->get('productID'));


        cart::new($request,$product);

        return response(['msg' => 'success',
            'cart' => session()->get('cart')], 200);
    }

    public function index()
    {
        return view('client.carts.index',[
            'items' => cart::GetCartItems(),
            'total_items' => cart::TotalItem(),
            'total_amount' => cart::TotalAmount()
        ]);
    }

    public function destroy(NewCartRequest $request)
    {
        $product = product::find($request->get('productID'));

        cart::remove($product);


        return response(['msg' => 'success',
            'cart' => cart::GetCart()], 200);
    }
}
