<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User; 

use Spatie\Permission\Models\Role;



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

        $user = User::all();

        return view('superadmin.user.input_user', compact(['user']) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = new User;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',

        ]);

        // Membuat instance User baru
        $data = new User;

        // Menyimpan data yang telah divalidasi
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);

        // Menyimpan data ke database
        $data->save();

        // Temukan atau buat peran "operator"
        $role = Role::firstOrCreate(['name' => 'operator']);

        // Berikan peran "operator" kepada pengguna baru
        $data->assignRole($role);

        // Menampilkan notifikasi sukses
        Alert::success('Sukses', 'Permintaan pendaftaran berhasil diajukan');

        // Mengarahkan kembali ke halaman sebelumnya
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = User::all();

        return view('superadmin.user.show_user', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = User::find($id);

        $role = role::all();

        return view('superadmin.user.update_user', compact('data', 'role'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = User::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $data->name = $request->name;

        $data->email = $request->email;

        // $data->name = $request->role;
        
        // $data->address_user = $request->address_user;
        
        // $data->phone_user = $request->phone_user;
        
        // $data->nip = $request->nip;
        
        // $data->no_ktp = $request->no_ktp;
        
        // $data->tempat_lahir = $request->tempat_lahir;
        
        // $data->tanggal_lahir = $request->tanggal_lahir;


        Alert::success('Sukses', 'User berhasil diperbarui');

        $data->save();

        return redirect('/show_user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = User::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'User Data has Deleted Successfully');

    }

    


}


