<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;

use Illuminate\Support\Facades\Auth;

use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Role::all();

        return view('superadmin.role.input_role', compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Role;

        $data->name = $request->role;

        $data->guard_name = 'web'; 

        $data->save();

        Alert::success('Sukses', 'Role Berhasil Ditambahkan');

        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Role::find($id);

        return view('superadmin.role.update_role', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Role::find($id);

        $data->name = $request -> role;

        $data->guard_name = 'web'; 

        $data->save();

        Alert::success('Sukses', 'Role Berhasil Diperbarui');

        return redirect('/role_page');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Role::find($id); // Role dari nama models

        $data->delete();

        return redirect()->back();
    }
}
