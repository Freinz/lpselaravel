<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inputuser;

use App\Models\Superadmin;  

use App\Models\Role;  

use Maatwebsite\Excel\Facades\Excel;

use App\Models\ImportedFile;

use App\Imports\EmployeeImport;

use Illuminate\Support\Facades\Auth;

use RealRashid\SweetAlert\Facades\Alert;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_type = Auth::user()->usertype;
        
        if($user_type == 'superadmin') {

            return view('superadmin.index');
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

    public function show()
    {
        $user_type = Auth::user()->usertype;
        
        $superadmin = Superadmin::all();
        if($user_type == 'superadmin') {

        return view('superadmin.show_data', compact('superadmin'));
        }

        else if ($user_type == 'pimpinan') {

            return view('pimpinan.show_data', compact('superadmin'));
        }
        else if ($user_type == 'operator') {

            return view('operator.show_data', compact('superadmin'));
        }

    else {
        return redirect()->back();
    }   
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit($id)
    {
        $data = Superadmin::find($id);

        $city = Superadmin::all();

        return view('superadmin.update_data', compact('data', 'city'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, $id)
    {
        $data = Superadmin::find($id);

        $data->nama_kota = $request->nama_kota;

        $data->kategori = $request->kategori;

        $data->sub_kategori = $request->sub_kategori;
        
        $data->nama_barang = $request->nama_barang;
        
        $data->satuan = $request->satuan;

        $data->merk = $request->merk;

        $data->harga = $request->harga;

        $data->save();

        Alert::success('Sukses', 'Data Berhasil Diupdate');

        return redirect('/show_data');
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy($id)
    {
        $data = Superadmin::find($id);

        $data->delete();

        return redirect()->back();

    }



    public function approver_data() {

        $user_type = Auth::user()->usertype;
        
        $superadmin = Superadmin::all();

        return view('pimpinan.approver_data', compact('superadmin'));
       
        

    }

    public function importexcel(Request $request)
    {
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        
        // Simpan file ke direktori
        $data->move('EmployeeData', $namafile);
    
        Excel::import(new EmployeeImport, \public_path('/EmployeeData/'.$namafile));

        Alert::success('Sukses', 'Data Excel Berhasil Diimport');

        return redirect()->back()->with('message', 'File imported successfully and awaiting approval');
    }

    public function update_status(Request $request) {
        // Ambil semua data
        $data = Superadmin::all();
        
        // Lakukan iterasi untuk setiap data dan update status
        foreach ($data as $data) {
            $data->status = $request->status; // Menggunakan status dari request
            $data->save();
        }
    
        Alert::success('Sukses', 'Status Data Telah Terupdate');

        return redirect()->back();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
   
}
