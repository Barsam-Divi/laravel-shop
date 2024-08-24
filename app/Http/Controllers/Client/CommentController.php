<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CommentController extends Controller
{


    public function store(Request $request , product $product)
    {
        $request->validate([
            'message' => ['required' , 'min:1' , 'max:220']
        ]);



        Comment::query()->create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'message' => $request->get('message')

        ]);


        return redirect()->back();

    }
}
