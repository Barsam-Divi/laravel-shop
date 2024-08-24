<?php

namespace App\Models;

use App\Http\Requests\NewCartRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class cart extends Model
{
    use HasFactory;


    public static function new(NewCartRequest $request, product $product)
    {
        if (session()->has('cart'))
        {
            $cart = self::GetCart();
        }



        $cart[$product->id] = [
            'product' => $product,
            'quantity' => $request->get('quantity')
        ];




        $cart['total_item'] = self::TotalItem();
        $cart['total_amount'] = self::TotalAmount() ;



        session()->put([
            'cart' => $cart
        ]);

    }

    public static function TotalAmount ()
    {
        $totalAmount = 0;
        $carts = self::GetCart();

        if (session()->has('cart'))
        {
            foreach ($carts as $cart)
            {
                if (is_array($cart) && array_key_exists('product' , $cart) && array_key_exists('quantity' ,$cart))
                {
                    $totalAmount += $cart['product']->cost_with_discount * $cart['quantity'];
                }
            }
        }

        return number_format($totalAmount);
    }

    public static function TotalItem()
    {
      $item =  self::GetCartItems();

      return count($item);
    }

    public static function GetCartItems()
    {
      $item = collect(self::GetCart())->filter(function ($item) {

            return is_array($item);
        });

      return $item;
    }

    public static function GetCart()
    {

        return session()->get('cart');
    }

    public static function remove(product $product)
    {
        if (session()->has('cart'))
        {
            $cart = self::GetCartItems();
        }


        $cart->forget($product->id);



        session()->put([
            'cart' => $cart
        ]);

        $cart['total_item'] = self::TotalItem();
        $cart['total_amount'] = self::TotalAmount() ;



    }

    public static function removeCard()
    {
        session()->forget('cart');
    }
}
