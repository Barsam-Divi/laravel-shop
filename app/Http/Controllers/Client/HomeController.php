<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\category;
use App\Models\FeatUredCategory;
use App\Models\slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.home',[
            'sliders' => slider::all(),
            'featuredCategory' => FeatUredCategory::getCategory()
        ]);
    }
}
