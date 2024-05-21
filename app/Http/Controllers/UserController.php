<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inputuser;

use App\Models\Role; 

use Illuminate\Support\Facades\Auth;

use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller


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

        return view('superadmin.user.input_user', compact('data') );

        $inputuser = Inputuser::all();

        return view('superadmin.user.input_user', compact(['inputuser']) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Inputuser;

        $data->user_name = $request->user_name;
        $data->email = $request->email;
        // $data->name = $request->role;
        $data->address_user = $request->address_user;
        $data->phone_user = $request->phone_user;
        $data->nip = $request->nip;
        $data->no_ktp = $request->no_ktp;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->save();

        Alert::success('Sukses', 'Permintaan pendaftaran berhasil diajukan');
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $inputuser = Inputuser::all();

        return view('superadmin.user.show_user', compact('inputuser'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Inputuser::find($id);

        $role = role::all();

        return view('superadmin.user.update_user', compact('data', 'role'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Inputuser::find($id);

        $data->user_name = $request->user_name;

        $data->email = $request->email;

        // $data->name = $request->role;
        
        $data->address_user = $request->address_user;
        
        $data->phone_user = $request->phone_user;
        
        $data->nip = $request->nip;
        
        $data->no_ktp = $request->no_ktp;
        
        $data->tempat_lahir = $request->tempat_lahir;
        
        $data->tanggal_lahir = $request->tanggal_lahir;


        Alert::success('Sukses', 'User berhasil diperbarui');

        $data->save();

        return redirect('/show_user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Inputuser::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'User Data has Deleted Successfully');

    }

    


}


