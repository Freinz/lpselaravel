<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inputuser;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function store_user(Request $request) {

        $data = new Inputuser;

        $data->user_name = $request->user_name;

        $data->role_user = $request->role_user;
        
        $data->address_user = $request->address_user;
        
        $data->phone_user = $request->phone_user;

        $data->save();
        
        return redirect()->back();
    }

    public function input_user() {

        $inputuser = Inputuser::all();


        return view('users.input_user', compact(['inputuser']) );

    }

    public function user_delete($id) {

        $data = Inputuser::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'User Data has Deleted Successfully');

    }

    public function user_edit (Request $request, $id) {

        $data = Inputuser::find($id);

        $data->user_name = $request->user_name;

        $data->role_user = $request->role_user;
        
        $data->address_user = $request->address_user;
        
        $data->phone_user = $request->phone_user;

        $data->save();

        return redirect('/input_user')->with('message', 'Users Update Successfully');

    }

 

    public function index()
    {
        //
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
