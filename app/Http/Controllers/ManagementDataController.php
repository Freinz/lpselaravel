<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Managementdata;  

use Maatwebsite\Excel\Facades\Excel;

use App\Models\ImportedFile;

use App\Imports\EmployeeImport;

use Illuminate\Support\Facades\Auth;

    class ManagementDataController extends Controller
    {
    

        public function show_data() {

            $user_type = Auth::user()->usertype;
            
            $managementdata = Managementdata::all();
            if($user_type == 'superadmin') {


            return view('managementdata.show_data', compact('managementdata'));
            }

            else if ($user_type == 'pimpinan') {

                return view('pimpinan.show_data', compact('managementdata'));
            }
            else if ($user_type == 'operator') {

                return view('operator.show_data', compact('managementdata'));
            }

        else {
            return redirect()->back();
        }


            

        }
        public function approver_data() {

            $user_type = Auth::user()->usertype;
            
            $managementdata = Managementdata::all();

            return view('pimpinan.approver_data', compact('managementdata'));
           
            

        }
      
       

        public function update_data() {

            $managementdata = Managementdata::all();

            return view('managementdata.update_data', compact('managementdata'));


        }

        public function importexcel(Request $request)
        {
            $data = $request->file('file');
            $namafile = $data->getClientOriginalName();
            
            // Simpan file ke direktori
            $data->move('EmployeeData', $namafile);
        
            Excel::import(new EmployeeImport, \public_path('/EmployeeData/'.$namafile));

            return redirect()->back()->with('message', 'File imported successfully and awaiting approval');
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

            $data->kategori = $request->kategori;

            $data->sub_kategori = $request->sub_kategori;
            
            $data->nama_barang = $request->nama_barang;
            
            $data->satuan = $request->satuan;

            $data->merk = $request->merk;

            $data->harga = $request->harga;

            $data->save();

            return redirect('/show_data');

        }

        public function update_status(Request $request, $id) {
            $data = Managementdata::find($id);
            $data->status = $request->status; // Assuming 'status' is the name of the column storing status
            $data->save();
            return redirect()->back()->with('message', 'Status updated successfully');
        }


    }

