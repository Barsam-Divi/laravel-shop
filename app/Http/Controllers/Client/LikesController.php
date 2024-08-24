<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class LikesController extends Controller
{

    public function index()
    {
        return view('client.likes.index' , [
            'products' => auth()->user()->likes()->get()
        ]);
    }

    public function store($product)
    {

        if (product::query()->where('id',$product)->exists())
        {

            auth()->user()->like($product);

            return response(['like_count' => auth()->user()->likes()->count()],200);
        }
        else{
            return response([],404);
        }
    }

    public function destroy($product)
    {
        if (product::query()->where('id',$product)->exists())
        {

            auth()->user()->like($product);

            return response(['like_count' => auth()->user()->likes()->count()],200);
        }
        else{
            return response([],404);
        }
    }
}
