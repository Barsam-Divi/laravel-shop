<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        return view('admin.sliders.index',
        [
           'sliders' => slider::all()
        ]);
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function edit(slider $slider)
    {
        return view('admin.sliders.edit',
            [
                'slider' => $slider
            ]);
    }

    public function store(SliderRequest $request)
    {
        $path = $request->file('image')
            ->storeAs('public/sliderImages',
                $request->
                file('image')->getClientOriginalName());


        slider::query()->create([
            'link' => $request->get('link'),
            'image' => $path
        ]);

        return redirect(route('sliders.index'));
    }

    public function update(Request $request,slider $slider)
    {
        $request->validate([
            'image' => ['min:1','max:5024'],
            'link' => ['min:1' , 'max:210']
        ]);

        if ($request->hasFile('image'))
        {
            Storage::delete($slider->image);

            $path = $request->file('image')->storeAs('public/sliderImages',$request->file('image')->getClientOriginalName());

            $slider->update([
                'link' => $request->get('link'),
                'image' => $path
            ]);
        }

        $slider->update([
            'link' => $request->get('link')
        ]);

        return redirect(route('sliders.index'));
    }

    public function destroy(slider $slider)
    {
        $slider->delete();

        return back();
    }
}
