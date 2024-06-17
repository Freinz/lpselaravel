<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inputuser;

use App\Models\Superadmin;  

use App\Models\Role;  

use Maatwebsite\Excel\Facades\Excel;

use App\Models\ImportedFile;

use App\Imports\EmployeeImport;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;

use RealRashid\SweetAlert\Facades\Alert;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function dashboard(Request $request) {

        if($request->keyword) {
            $superadmin = Superadmin::search($request->keyword)->get();
        } 
        else {
            $superadmin = Superadmin::all();
        }


        $jumlah_kota = Superadmin::select('nama_kota')
        ->groupBy('nama_kota')
        ->get()
        ->count();

        $nama_kota = Superadmin::select('nama_kota')
        ->groupBy('nama_kota')
        ->get();
        
        $kategori = Superadmin::select('kategori')
        ->groupBy('kategori')
        ->get();
       
        $sub_kategori = Superadmin::select('sub_kategori')
        ->groupBy('sub_kategori')
        ->get();

        $jumlah_kategori = Superadmin::select('kategori')
        ->groupBy('kategori')
        ->get()
        ->count();
       
        $total_barang = Superadmin::count();

        $persentase_kota = ($jumlah_kota / 13) * 100;

        $persentase_kategori = ($jumlah_kategori / 100) * 100;

        return view('dashboard', ['superadmin' => $superadmin] ,compact('superadmin', 'jumlah_kota', 'nama_kota', 'kategori', 'sub_kategori', 'jumlah_kategori', 'persentase_kota', 'persentase_kategori', 'total_barang'));
    }

    public function index()
    {
        $superadmin = Superadmin::all();

        $role = Role::all();

        $total_barang = Superadmin::count();
        
        $total_barang_ditunda = Superadmin::where('status', 'ditunda')->count();
        
        $total_barang_ditolak = Superadmin::where('status', 'ditolak')->count();
        
        $jumlah_keseluruhan_barang = $total_barang + $total_barang_ditunda + $total_barang_ditolak;

        $persentase_jumlah_barang = $total_barang / $jumlah_keseluruhan_barang * 100;

        $jumlah_operator = Role::where('name', 'operator')->count();

        if(Auth::user()->hasRole('superadmin')) {
            return redirect()->to('superadmin.index');
        } else if(Auth::user()->hasRole('pimpinan')) {
            return view('pimpinan.index', compact ('superadmin','total_barang', 'total_barang_ditunda', 'total_barang_ditolak', 'jumlah_keseluruhan_barang', 'persentase_jumlah_barang', 'jumlah_operator'));
        }else if(Auth::user()->hasRole('operator')) {
            return view('operator.index', compact('superadmin', 'total_barang', 'total_barang_ditunda'));
        } else {
            return redirect() -> back();
        }

 }

    public function show()
    {
        
        $superadmin = Superadmin::all();

        if(Auth::user()->hasRole('superadmin')) {
            return view('superadmin.show_data', compact('superadmin'));
        } else if(Auth::user()->hasRole('pimpinan')) {
            return view('pimpinan.show_data', compact('superadmin'));
        }else if(Auth::user()->hasRole('operator')) {
            return view('operator.show_data', compact('superadmin'));
        }

        
else {
        return view ('pimpinan.show_data', compact('superadmin'));
    }   
    }

    public function import_data() {

        $superadmin = Superadmin::all();

        $form = Form::all();

        return view('operator.import_data', compact('superadmin', 'form'));

    }
    
    public function revisi_data() {

        $superadmin = Superadmin::all();

        $form = Form::all();

        return view('operator.revisi_data', compact('superadmin', 'form'));

    }

    public function detail_revisi($id) {

        // Ambil data Superadmin berdasarkan form_id
        $form = Form::findOrFail($id); // Mengambil data formulir berdasarkan ID
 
        $superadmin = $form->superadmin;
    
 
        return view('operator.detail_revisi', compact('form', 'superadmin'));
        
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
    
    public function revisi_read($id)
    {
        $data = Superadmin::find($id);

        $form = Form::all();

        return view('operator.revisi_read', compact('data', 'form'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, $id)
    {
        $data = Superadmin::find($id);

        $request->validate([
            'nama_kota' => 'required|min:2|max:255',
            'kategori' => 'required',
            'sub_kategori' => 'required',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'merk' => 'required',
            'harga' => 'required',
        ]);

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


    public function revisi_edit(Request $request, $id)
    {
        $data = Superadmin::find($id);

        $request->validate([
            'nama_kota' => 'required|min:2|max:255',
            'kategori' => 'required',
            'sub_kategori' => 'required',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'merk' => 'required',
            'harga' => 'required',
        ]);

        $data->nama_kota = $request->nama_kota;
        $data->kategori = $request->kategori;
        $data->sub_kategori = $request->sub_kategori;
        $data->nama_barang = $request->nama_barang;
        $data->satuan = $request->satuan;
        $data->merk = $request->merk;
        $data->harga = $request->harga;

        $data->save();

        Alert::success('Sukses', 'Data Berhasil Diupdate');

        return redirect('/revisi_data');
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
    
    public function revisi_delete($id)
    {
        $data = Superadmin::find($id);

        $data->delete();

        return redirect()->back();

    }



    public function approver_data() {

        $user_type = Auth::user()->usertype;
        
        $superadmin = Superadmin::all();

        $form = Form::all();

        return view('pimpinan.approver_data', compact('superadmin', 'form'));
       
    }
   
    public function detail_data($id) {

       // Ambil data Superadmin berdasarkan form_id
       $form = Form::findOrFail($id); // Mengambil data formulir berdasarkan ID

       $superadmin = $form->superadmin;
   

       return view('pimpinan.detail_data', compact('form', 'superadmin'));
       
    }

    public function importexcel(Request $request)
    {
        
        $request->validate([
            'nama' => 'required|min:2|max:255',
            'tgl_survey' => 'required',
            'periode' => 'required',
            
        ]);

        $form = new Form();
        
        $form->nama = $request->nama;
        $form->tgl_survey = $request->tgl_survey;
        $form->periode = $request->periode;
        $form->save();
        
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        
        // Simpan file ke direktori
        $data->move('EmployeeData', $namafile);

        $form_id = $form -> id;
    
        Excel::import(new EmployeeImport($form_id), \public_path('/EmployeeData/'.$namafile));
        

        Alert::success('Sukses', 'Data Excel Berhasil Diimport');

        return redirect()->back();
    }

    public function update_status(Request $request, $form_id) {
        // Validasi input
        $request->validate([
            'status' => 'required|string',
            'keterangan' => 'required|string',
        ]);
    
        // Perbarui semua data yang memiliki form_id yang sama
        Superadmin::where('form_id', $form_id)->update(['status' => $request->input('status')]);

        $form = Form::find($form_id);
        if ($form) {
            $form->status = $request->input('status');
            $form->keterangan = $request->input('keterangan');
            $form->save();
        }
    
        // Berikan notifikasi sukses
        Alert::success('Sukses', 'Status Data Telah Terupdate');
    
        return redirect()->back();
    }

    public function revisi_update_status(Request $request, $form_id) {
        $request->validate([
            'status' => 'required|string',
        ]);
    
        // Mengubah status pada semua entri Superadmin dengan form_id yang sama
        Superadmin::where('form_id', $form_id)->update(['status' => $request->status]);
    
        // Mengubah status pada form dengan form_id yang sama
        Form::where('id', $form_id)->update(['status' => $request->status]);
    
        // Redirect kembali dengan notifikasi atau tampilkan halaman revisi_data
        // Jika Anda ingin menampilkan halaman revisi_data, ganti redirect dengan:
        // return view('operator.revisi_data', compact('superadmin', 'form'));
        return redirect()->back()->with('success', 'Status berhasil diubah menjadi ' . $request->status);
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
