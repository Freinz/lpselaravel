<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Managementdata;

use App\Models\City;

use Maatwebsite\Excel\Facades\Excel;

use App\Imports\EmployeeImport;


use Illuminate\Support\Facades\Auth;

class ManagementDataController extends Controller
{
   

    public function city_page () {

        $data = Managementdata::all();

        return view('managementdata.input_city', compact('data'));
    }

    public function city_add (Request $request) {
        
        $data = new City;

        $data->nama_kota = $request->city;

        $data->save();

        return redirect()->back();
       
    }

    public function city_delete($id) {

        $data = Managementdata::find($id); // Category dari nama models

        $data->delete();

        return redirect()->back()->with('message', 'City deleted succesfully'); // agar kembali ke page yang sama
        
    }
    
    public function city_read($id) {

        $data = Managementdata::find($id);

        return view('managementdata.update_city', compact('data'));

    }

    

    public function input_data() {

        $data = Managementdata::all();

        return view('managementdata.input_data', compact('data') );

    }

    public function store_data(Request $request) {

        $data = new Managementdata;

        $data->jenis_barang = $request->jenis_barang;

        $data->nama_kota = $request->nama_kota;
        
        $data->nama_barang = $request->nama_barang;
        
        $data->harga_satuan = $request->harga_satuan;

        $data->kuartal = $request->kuartal;

        $data->tahun = $request->tahun;

        $data->nama_kota = $request->nama_kota;

        $data->save();
        
        return redirect()->back();
    }

    public function show_data() {

        $managementdata = Managementdata::all();

        return view('managementdata.show_data', compact('managementdata'));

    }

    public function update_data() {

        $managementdata = Managementdata::all();

        return view('managementdata.update_data', compact('managementdata'));


    }

    public function importexcel(Request $request) {

        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();

        $data->move('EmployeeData', $namafile);

        Excel::import(new EmployeeImport, \public_path('/EmployeeData/'.$namafile));

        return redirect()-> back();

    }

    
    public function data_delete($id) {

        $data = Managementdata::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'data Data has Deleted Successfully');

    }

    public function data_read($id) {

        $data = Managementdata::find($id);

        $city = Managementdata::all();

        return view('managementdata.update_data', compact('data', 'city'));

    }

    public function data_edit (Request $request, $id) {

        $data = Managementdata::find($id);

        $data->nama_kota = $request->nama_kota;

        $data->jenis_barang = $request->jenis_barang;
        
        $data->nama_barang = $request->nama_barang;
        
        $data->harga_satuan = $request->harga_satuan;
        
        $data->kuartal = $request->kuartal;
        
        $data->tahun = $request->tahun;

        $data->save();

        return redirect('/show_data')->with('message', 'Data Update Successfully');

    }


}


