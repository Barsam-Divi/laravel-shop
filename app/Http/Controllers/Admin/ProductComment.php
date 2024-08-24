<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\product;
use Illuminate\Http\Request;

class ProductComment extends Controller
{
    public function index(product $product)
    {
        return view('admin.productcomments.index',[
            'product' =>$product
        ]);
    }

    public function destroy(Comment $comment)
    {

        $comment->delete();

        return redirect()->back();
    }
}
