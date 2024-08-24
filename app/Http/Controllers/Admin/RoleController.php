<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\permission;
use App\Models\role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index',[
            'roles' => role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create',[
            'permissions' => permission::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewRoleRequest $request)
    {
        $role = role::query()->create([
            'title' => $request->get('title')
        ]);

        $role->permissions()->attach($request->get('permissions'));

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(role $role)
    {
        return view('admin.roles.edit',[
            'role' => $role,
            'permissions' => permission::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, role $role)
    {
        $role->update([
            'title' => $request->get('title')
        ]);

        $role->permissions()->sync($request->get('permissions'));


        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(role $role)
    {
        $role->permissions()->detach();

        $role->delete();

        return redirect()->back();
    }
}
