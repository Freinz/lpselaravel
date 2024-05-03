<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inputuser;

use App\Models\User;

use App\Models\Role;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     public function index () {

        $user_type = Auth::user()->usertype;
        
        if($user_type == 'superadmin') {

            return view('managementdata.index');
        }

        else if ($user_type == 'pimpinan') {

            return view('pimpinan.index');
        }
        else if ($user_type == 'operator') {

            return view('operator.index');
        }

    else {
        return redirect()->back();
    }

}

     public function role_page () {

        $data = Role::all();


        return view('users.input_role', compact('data'));

    }

     public function role_add (Request $request) {
        
        $data = new Role;

        $data->role_user = $request->role;

        $data->save();


        return redirect()->back();

        return redirect()->back()->with('message','Role Added Successfully');

       
    }

    public function role_delete($id) {

        $data = Role::find($id); // Category dari nama models

        $data->delete();

        return redirect()->back()->with('message', 'Role deleted succesfully'); // agar kembali ke page yang sama
        
    }
    
    public function role_read($id) {

        $data = Role::find($id);

        return view('users.update_role', compact('data'));

    }

    public function role_update(Request $request, $id) {


        $data = Role::find($id);


        $data->role_user = $request -> role;

        $data->save();

        return redirect('/role_page')->with ('message', 'Role Updated Succesfully'); // untuk kembali ke page awal setelah edit

        $data->role_user = $request -> role_user;

        $data->save();

        return redirect('/category_page')->with ('message', 'Role Updated Succesfully'); // untuk kembali ke page awal setelah edit


    }


    public function input_user() {

        $data = Role::all();

        return view('users.input_user', compact('data') );

        $inputuser = Inputuser::all();


        return view('users.input_user', compact(['inputuser']) );


    }


    public function store_user(Request $request) {

        $data = new Inputuser;

        $data->user_name = $request->user_name;


        $data->role_id = $request->role;
        
        $data->address_user = $request->address_user;
        
        $data->phone_user = $request->phone_user;

        
        $data->email = $request->email;

        $data->nip = $request->nip;
        
        $data->no_ktp = $request->no_ktp;
        
        $data->tempat_lahir = $request->tempat_lahir;
        
        $data->tanggal_lahir = $request->tanggal_lahir;



        $data->save();
        
        return redirect()->back();
    }

    public function show_user() {

        $inputuser = Inputuser::all();

        return view('users.show_user', compact('inputuser'));

    }

   

    public function user_delete($id) {

        $data = Inputuser::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'User Data has Deleted Successfully');

    }

    public function user_read($id) {

        $data = Inputuser::find($id);

        $role = role::all();

        return view('users.update_user', compact('data', 'role'));

    }

    public function user_edit (Request $request, $id) {

        $data = Inputuser::find($id);

        $data->user_name = $request->user_name;

        $data->email = $request->email;

        $data->role_id = $request->role;
        
        $data->address_user = $request->address_user;
        
        $data->phone_user = $request->phone_user;
        
        $data->nip = $request->nip;
        
        $data->no_ktp = $request->no_ktp;
        
        $data->tempat_lahir = $request->tempat_lahir;
        
        $data->tanggal_lahir = $request->tanggal_lahir;



        $data->save();

        return redirect('/show_user')->with('message', 'Users Update Successfully');

    }

 

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}

