<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
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

    public function lihat_profil() {

        return view('operator.lihat_profil');

    }
    
    public function edit_profil() {

        $data = DetailUser::all();

        return view('operator.edit_profil', compact('data'));

    }

    public function kirim_edit_profil(Request $request)
    {

        $request->validate([
            'nama_user' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15', // biasanya no HP maksimal 15 karakter
            'nip' => 'required|string|max:20', // disesuaikan dengan panjang NIP
            'no_ktp' => 'required|string|max:20', // disesuaikan dengan panjang KTP
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date', // menggunakan tipe date untuk validasi tanggal
        ]);

        // Membuat instance User baru
        $data = new DetailUser;

        // Menyimpan data yang telah divalidasi
        $data->nama_user = $request->nama_user;
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
        $data->nip = $request->nip;
        $data->no_ktp = $request->no_ktp;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;   

        // Menyimpan data ke database
        $data->save();

        // Menampilkan notifikasi sukses
        Alert::success('Sukses', 'Permintaan pendaftaran berhasil diajukan');

        // Mengarahkan kembali ke halaman sebelumnya
        return redirect()->back();
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
   
    public function input_user_operator()
    {

        $user = User::all();

        return view('pimpinan.input_user', compact('user') );
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
        ]);

        // Membuat instance User baru
        $data = new User;

        // Menyimpan data yang telah divalidasi
        $data->name = $request->name;
        $data->email = $request->email;

        $data->password = Hash::make('password');
       

        // Menyimpan data ke database
        $data->save();

        // Temukan atau buat peran "operator"
        $role = Role::firstOrCreate(['name' => 'operator']);

    // Berikan peran "operator" kepada pengguna baru
        $data->assignRole($role);

        // Menampilkan notifikasi sukses
        Alert::success('Sukses', 'Akun berhasil dibuat');

        // Mengarahkan kembali ke halaman sebelumnya
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $role = Role::all();
        $user = User::all();

        return view('superadmin.user.show_user', compact('user', 'role'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $data = User::find($id);

        $roles = Role::all();

        return view('superadmin.user.update_user', compact('data', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = User::find($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|exists:roles,id', // memastikan role yang dipilih ada di database
        ]);
    
        $data->name = $request->name;
        $data->email = $request->email;
    
        // Simpan user
        $data->save();
    
        // Sinkronisasi role user
        $data->roles()->sync([$request->role]);
    
        Alert::success('Sukses', 'User berhasil diperbarui');
    
        return redirect('/show_user');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user -> delete();

    return redirect()->back();

    }

    


}


