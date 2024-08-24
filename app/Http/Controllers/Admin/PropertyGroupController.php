<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyGroupRequest;
use App\Http\Requests\UpdatePropertyGroupRequest;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;

class PropertyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.propertygroups.index',[
            'properties' => PropertyGroup::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.propertygroups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyGroupRequest $request)
    {

        PropertyGroup::query()->create([
            'title' => $request->get('title')
        ]);

        return redirect(route('propertyGroups.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PropertyGroup $propertyGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyGroup $propertyGroup)
    {

        return view('admin.propertygroups.edit',[
            'property' => $propertyGroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyGroupRequest $request, PropertyGroup $propertyGroup)
    {
        $propertyExists = PropertyGroup::query()
            ->where('title' , $request->get('title'))
            ->where('id','!=',$propertyGroup->id)
            ->exists();

        if ($propertyExists)
        {
            return back()->withErrors(['title'=>'گروه مشخصات وجود دارد']);
        }

        $propertyGroup->update([
            'title' => $request->get('title')
        ]);

        return redirect(route('propertyGroups.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyGroup $propertyGroup)
    {
        
    }
}
