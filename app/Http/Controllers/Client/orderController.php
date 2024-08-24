<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\order;
use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class orderController extends Controller
{
    public function create()
    {
        return view('client.orders.create',
        [
            'items' => cart::GetCartItems(),
            'total_amount' => cart::TotalAmount(),
            'total_item' => cart::TotalItem()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => ['required' ,'min:1' ,'max:220']
        ]);

        $amount = str_replace(',','',cart::TotalAmount());

        $order =  order::query()->create([
            'user_id' => auth()->user()->id,
            'amount' => $amount,
            'address' => $request->get('address')
        ]);
        foreach (cart::GetCartItems() as $item){
            $product = $item['product'];
            $quantity = $item['quantity'];

            $order->details()->create([
                'product_id'=> $product->id,
                'unit_cost' => $product->cost_with_discount,
                'quantity' => $quantity,
                'total_amount' => $product->cost_with_discount *$quantity
        ]);
        }

        cart::removeCard();








        $invoice = (new Invoice)->amount($order->amount);




        return payment::purchase($invoice, function ($driver,$transactionId) use ($order) {
            $order->update([
                'transaction_id' => $transactionId
            ]);
        })->pay()->render();


    }

    public function callback(Request $request)
    {

       $order = order::query()->where('transaction_id',$request->get('token'))->first();

        $order->update([
            'status' => $request->get('status')
        ]);


        return redirect(route('client.orders.show',$order));
    }

    public function show(order $order)
    {
        return view('client.orders.show',[
            'order' => $order
        ]);
    }
}
