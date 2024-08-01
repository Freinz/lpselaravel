<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Kategori;
use App\Models\Kota;
use App\Models\Role;
use App\Models\SubKategori;
use App\Models\TabelProduk;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\facades\Alert;


class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function dashboard(Request $request)
    {
        $query = TabelProduk::query();

        if ($request->kategori) {
            $query->where('kategori_id', $request->kategori);
        }

        if ($request->sub_kategori) {
            $query->where('sub_kategori_id', $request->sub_kategori);
        }

        $tabelproduk = $query->get();

        $form = Form::all();
        $kategori = Kategori::all();
        $sub_kategori = SubKategori::all();

        $jumlah_kota = Kota::count();
        $jumlah_kategori = $kategori->count();
        $total_barang = TabelProduk::count();

        $jumlah_user = User::count();

        $persentase_kota = ($jumlah_kota / 13) * 100;
        $persentase_kategori = ($jumlah_kategori / 100) * 100;

        return view('dashboard', compact(
            'tabelproduk',
            'form',
            'kategori',
            'sub_kategori',
            'jumlah_user',
            'jumlah_kota',
            'jumlah_kategori',
            'persentase_kota',
            'persentase_kategori',
            'total_barang'
        ));
    }


    public function index()
    {
        $tabelproduk = TabelProduk::all();

        $detail_user = auth()->user()->detailuser;

        $role = Role::all();

        $total_barang = TabelProduk::count();

        $total_barang_ditunda = TabelProduk::where('status', 'ditunda')->count();

        $total_barang_ditolak = TabelProduk::where('status', 'ditolak')->count();

        $jumlah_keseluruhan_barang = $total_barang + $total_barang_ditunda + $total_barang_ditolak;

        if ($jumlah_keseluruhan_barang != 0) {
            $persentase_jumlah_barang = ($total_barang / $jumlah_keseluruhan_barang) * 100;
        } else {
            // Handle the case when $jumlah_keseluruhan_barang is zero
            $persentase_jumlah_barang = 0; // or any other appropriate value
        }

        $jumlah_operator = Role::where('name', 'operator')->count();

        $jumlah_user = User::count();

        $jumlah_role = Role::count();

        if (Auth::user()->hasRole('superadmin')) {
            return view('superadmin.index', compact('jumlah_user', 'jumlah_role', 'total_barang'));
        } else if (Auth::user()->hasRole('pimpinan')) {
            return view('pimpinan.index', compact('tabelproduk', 'detail_user', 'total_barang', 'total_barang_ditunda', 'total_barang_ditolak', 'jumlah_keseluruhan_barang', 'persentase_jumlah_barang', 'jumlah_operator'));
        } else if (Auth::user()->hasRole('operator')) {
            return view('operator.index', compact('tabelproduk', 'detail_user',  'total_barang', 'total_barang_ditunda'));
        } else {
            return redirect()->back();
        }
    }

    public function show()
    {

        $tabelproduk = TabelProduk::all();

        $detail_user = auth()->user()->detailuser;

        if (Auth::user()->hasRole('superadmin')) {
            return view('superadmin.show_data', compact('tabelproduk', 'detail_user'));
        } else if (Auth::user()->hasRole('pimpinan')) {
            return view('pimpinan.show_data', compact('tabelproduk', 'detail_user'));
        } else if (Auth::user()->hasRole('operator')) {
            return view('operator.show_data', compact('tabelproduk', 'detail_user'));
        } else {
            return view('pimpinan.show_data', compact('tabelproduk', 'detail_user'));
        }
    }



    public function revisi_data()
    {

        $detail_user = auth()->user()->detailuser;

        $tabelproduk = TabelProduk::all();

        $form = Form::all();

        return view('operator.revisi_data', compact('tabelproduk', 'form', 'detail_user'));
    }

    public function detail_revisi($id)
    {

        // Ambil data Superadmin berdasarkan form_id
        $form = Form::findOrFail($id); // Mengambil data formulir berdasarkan ID

        $tabelproduk = $form->tabelproduk;

        $detail_user = auth()->user()->detailuser;

        return view('operator.detail_revisi', compact('form', 'tabelproduk', 'detail_user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = TabelProduk::find($id);
        $kotas = Kota::all();
        $kategoris = Kategori::all();
        $subKategoris = SubKategori::all();

        return view('superadmin.update_data', compact('data', 'kotas', 'kategoris', 'subKategoris'));
    }
    
    public function getSubKategori($kategori_id)
    {
        $subKategoris = SubKategori::where('kategori_id', $kategori_id)->get();
        return response()->json($subKategoris);
    }

    public function update(Request $request, $id)
    {
        $data = TabelProduk::find($id);

        $request->validate([
            'kota_id' => 'required|exists:kotas,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'sub_kategori_id' => 'required|exists:sub_kategoris,id',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'merk' => 'nullable',
            'harga' => 'required',
        ]);

        $data->kota_id = $request->kota_id;
        $data->kategori_id = $request->kategori_id;
        $data->sub_kategori_id = $request->sub_kategori_id;
        $data->nama_barang = $request->nama_barang;
        $data->satuan = $request->satuan;
        $data->merk = $request->merk;
        $data->harga = $request->harga;

        $data->save();

        Alert::success('Sukses', 'Data Berhasil Diperbarui');

        return redirect('/show_data');
    }



    public function destroy($id)
    {
        $data = TabelProduk::find($id);

        $data->delete();

        Alert::success('Sukses', 'Data Berhasil Dihapus');

        return redirect()->back();
    }


    public function revisi_read($id)
    {
        $detail_user = auth()->user()->detailuser;

        $data = TabelProduk::find($id);
        $kotas = Kota::all();
        $kategoris = Kategori::all();
        $subKategoris = SubKategori::all();

        $form = Form::all();

        return view('operator.revisi_read', compact('data', 'kotas', 'kategoris', 'subKategoris', 'form', 'detail_user'));
    }


    public function revisi_edit(Request $request, $id)
    {
        $data = TabelProduk::find($id);

        $request->validate([
            'kota_id' => 'required|exists:kotas,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'sub_kategori_id' => 'required|exists:sub_kategoris,id',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'merk' => 'nullable',
            'harga' => 'required',
        ]);

        $data->kota_id = $request->kota_id;
        $data->kategori_id = $request->kategori_id;
        $data->sub_kategori_id = $request->sub_kategori_id;
        $data->nama_barang = $request->nama_barang;
        $data->satuan = $request->satuan;
        $data->merk = $request->merk;
        $data->harga = $request->harga;

        $data->save();

        Alert::success('Sukses', 'Data Berhasil Diperbarui');

        return redirect('/revisi_data');
    }

    public function revisi_delete($id)
    {
        $data = TabelProduk::find($id);

        $data->delete();

        Alert::success('Sukses', 'Data Berhasil Dihapus');

        return redirect()->back();
    }



    public function approver_data()
    {

        $user_type = Auth::user()->usertype;

        $tabelproduk = TabelProduk::all();

        $form = Form::all();

        return view('pimpinan.approver_data', compact('tabelproduk', 'form'));
    }

    public function detail_data($id)
    {
        // Ambil data Form berdasarkan ID
        $form = Form::findOrFail($id);

        // Ambil data produk terkait dengan relasi kategori, subkategori, dan kota
        $tabelproduk = $form->tabelproduk()->with('kategori', 'subKategori', 'kota')->get();

        // Ambil detail user yang sedang login
        $detail_user = auth()->user()->detailuser;

        return view('pimpinan.detail_data', compact('form', 'tabelproduk', 'detail_user'));
    }



    public function revisi_update_status(Request $request, $form_id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        // Mengubah status pada semua entri Superadmin dengan form_id yang sama
        TabelProduk::where('form_id', $form_id)->update(['status' => $request->status]);

        // Mengubah status pada form dengan form_id yang sama
        Form::where('id', $form_id)->update(['status' => $request->status]);

        // Redirect kembali dengan notifikasi atau tampilkan halaman revisi_data
        // Jika Anda ingin menampilkan halaman revisi_data, ganti redirect dengan:
        // return view('operator.revisi_data', compact('superadmin', 'form'));

        Alert::success('Sukses', 'Revisi Data Telah Terkirim');

        return redirect()->back()->with('success', 'Status berhasil diubah menjadi ' . $request->status);
    }

    public function hubungi_kami()
    {

        return view('hubungi_kami');
    }
}
