<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        // Your code here
    }

    public function lihat_profil()
    {
        // Alternatif: Jika menggunakan relasi, Anda bisa langsung akses seperti ini:
        $detail_user = auth()->user()->detailuser;

        return view('operator.lihat_profil', compact('detail_user'));
    }

    public function lihat_profil_pimpinan()
    {
        // Alternatif: Jika menggunakan relasi, Anda bisa langsung akses seperti ini:
        $detail_user = auth()->user()->detailuser;

        return view('pimpinan.lihat_profil', compact('detail_user'));
    }



    public function kirim_edit_profil(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15', // biasanya no HP maksimal 15 karakter
            'nip' => 'required|string|max:20', // disesuaikan dengan panjang NIP
            'no_ktp' => 'required|string|max:20', // disesuaikan dengan panjang KTP
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date', // menggunakan tipe date untuk validasi tanggal
        ]);

        $detail_user = DetailUser::findOrFail($id);

        // Update user details
        $detail_user->update($request->all());

        Alert::success('Sukses', 'Profil berhasil diperbarui');
        return redirect()->back();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('superadmin.user.input_user', compact('roles'));

        $user = User::all();
        return view('superadmin.user.input_user', compact('user'));
    }

    public function input_user_operator()
    {
        $user = User::all();
        $detail_user = DetailUser::all();
        return view('pimpinan.input_user', compact('user', 'detail_user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255', // Mengubah menjadi nullable
            'no_hp' => 'nullable|string|max:20',   // Mengubah menjadi nullable
            'nip' => 'nullable|string|max:20',      // Mengubah menjadi nullable
            'no_ktp' => 'nullable|string|max:20',   // Mengubah menjadi nullable
            'tempat_lahir' => 'nullable|string|max:255', // Mengubah menjadi nullable
            'tanggal_lahir' => 'nullable|date',     // Mengubah menjadi nullable
        ]);

        // menambah detail user baru
        $detail_user = DetailUser::create([
            'email' => $request->email,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'nip' => $request->nip,
            'no_ktp' => $request->no_ktp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'detail_user_id' => $request->detail_user_id,
        ]);

        // Membuat pengguna baru terkait dengan detail user yang baru dibuat
        $user = User::create([
            'email' => $detail_user->email,
            'password' => bcrypt('password'),
            'detail_user_id' => $detail_user->id,
        ]);

        // Menyimpan pengguna dan menetapkan peran operator
        $role = Role::firstOrCreate(['name' => 'operator']);
        $user->assignRole($role);

        // Menampilkan notifikasi sukses
        Alert::success('Sukses', 'Akun berhasil dibuat');
        return redirect()->back();
    }



    /**
     * Display the specified resource.
     */
    public function show()
    {
        $roles = Role::all(); // Ubah $role menjadi $roles untuk konsistensi
        $users = User::all(); // Ubah $user menjadi $users untuk konsistensi

        // Ambil detail_user untuk setiap user
        foreach ($users as $user) {
            $user->detail_user = DetailUser::find($user->detail_user_id);
        }

        return view('superadmin.user.show_user', compact('users', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function store_user_superadmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'role' => 'required|exists:roles,id',
        ]);

        $detail_user = DetailUser::create([
            'email' => $request->email,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'nip' => $request->nip,
            'no_ktp' => $request->no_ktp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'detail_user_id' => $request->detail_user_id,
        ]);

        $user = User::create([
            'email' => $detail_user->email,
            'password' => bcrypt('password'),
            'detail_user_id' => $detail_user->id,
        ]);


        // Attach role to user
        $user->roles()->attach($request->role);

        Alert::success('Sukses', 'Akun berhasil dibuat');
        return redirect()->back();
    }

    public function edit($id)
    {
        $data = User::find($id);
        $roles = Role::all();

        // Ambil DetailUser berdasarkan detail_user_id dari User
        $detail_user = DetailUser::find($data->detail_user_id);

        return view('superadmin.user.update_user', compact('data', 'roles', 'detail_user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|exists:roles,id',
        ]);

        // Ambil data user berdasarkan ID
        $user = User::findOrFail($id);

        // Update data nama pada DetailUser (jika nama berada di DetailUser)
        $user->detailUser->update(['name' => $request->name]);

        // Atau, jika nama berada langsung di User:
        // $user->update(['name' => $request->name]);

        // Update email pada User
        $user->update(['email' => $request->email]);

        // Sinkronisasi roles
        $user->roles()->sync([$request->role]);

        Alert::success('Sukses', 'User berhasil diperbarui');
        return redirect('/show_user');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $users = User::find($id); // User dari nama models

        $users->delete();

        Alert::success('Sukses', 'Role Berhasil Dihapus');

        return redirect()->back();
    }
}
