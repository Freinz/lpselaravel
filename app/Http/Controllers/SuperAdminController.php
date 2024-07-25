<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Kategori;
use App\Models\Kota;
use App\Models\Role;
use App\Models\SubKategori;
use App\Models\Superadmin;
use App\Models\TabelProduk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\IOFactory;
use RealRashid\SweetAlert\facades\Alert;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function dashboard(Request $request)
    {
        $query = TabelProduk::query();
        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->sub_kategori) {
            $query->where('sub_kategori', $request->sub_kategori);
        }

        $tabelproduk = $query->get();


        $kategori = TabelProduk::select('kategori')->groupBy('kategori')->get();
        $sub_kategori = TabelProduk::select('sub_kategori')->groupBy('sub_kategori')->get();

        $jumlah_kota = 13;
        $jumlah_kategori = $kategori->count();
        $total_barang = TabelProduk::count();

        $jumlah_user = User::count();

        $persentase_kota = ($jumlah_kota / 13) * 100;
        $persentase_kategori = ($jumlah_kategori / 100) * 100;

        return view('dashboard', compact(
            'tabelproduk',
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
            return view('operator.index', compact('tabelproduk','detail_user',  'total_barang', 'total_barang_ditunda'));
        } else {
            return redirect()->back();
        }
    }

    public function show()
    {

        $tabelproduk = TabelProduk::all();

        $detail_user = auth()->user()->detailuser;

        if (Auth::user()->hasRole('superadmin')) {
            return view('superadmin.show_data', compact('tabel_produk', 'detail_user'));
        } else if (Auth::user()->hasRole('pimpinan')) {
            return view('pimpinan.show_data', compact('tabel_produk', 'detail_user'));
        } else if (Auth::user()->hasRole('operator')) {
            return view('operator.show_data', compact('tabel_produk', 'detail_user'));
        } else {
            return view('pimpinan.show_data', compact('tabel_produk', 'detail_user'));
        }
    }

    public function import_data()
    {
        // Mengambil data untuk dropdown
        $kotas = Kota::all();
        $kategoris = Kategori::all();
        $sub_kategoris = SubKategori::all();

        // Mengambil data form yang ada
        $form = Form::all();

        return view('operator.import_data', compact('kotas', 'kategoris', 'sub_kategoris', 'form'));
    }

    public function revisi_data()
    {

        $detail_user = auth()->user()->detailuser;

        $tabelproduk = TabelProduk::all();

        $form = Form::all();

        return view('operator.revisi_data', compact('tabel$tabelproduk', 'form', 'detail_user'));
    }

    public function detail_revisi($id)
    {

        // Ambil data Superadmin berdasarkan form_id
        $form = Form::findOrFail($id); // Mengambil data formulir berdasarkan ID

        $tabel_produk = $form->tabel_produk;

        $detail_user = auth()->user()->detailuser;

        return view('operator.detail_revisi', compact('form', 'tabel_produk', 'detail_user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = TabelProduk::find($id);

        return view('superadmin.update_data', compact('data'));
    }

    public function revisi_read($id)
    {
        $detail_user = auth()->user()->detailuser;

        $data = TabelProduk::find($id);

        $form = Form::all();

        return view('operator.revisi_read', compact('data', 'form', 'detail_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = TabelProduk::find($id);

        $request->validate([
            'kategori' => 'required',
            'sub_kategori' => 'required',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'merk' => 'nullable',
            'banjarmasin' => 'required',
            'banjarbaru' => 'required',
            'banjar' => 'required',
            'batola' => 'required',
            'tapin' => 'required',
            'hss' => 'required',
            'hst' => 'required',
            'hsu' => 'required',
            'balangan' => 'required',
            'tabalong' => 'required',
            'tanah_laut' => 'required',
            'tanah_bumbu' => 'required',
            'kotabaru' => 'required',
        ]);

        $data->kategori = $request->kategori;
        $data->sub_kategori = $request->sub_kategori;
        $data->nama_barang = $request->nama_barang;
        $data->satuan = $request->satuan;
        $data->merk = $request->merk;
        $data->banjarmasin = $request->banjarmasin;
        $data->banjarbaru = $request->banjarbaru;
        $data->banjar = $request->banjar;
        $data->batola = $request->batola;
        $data->tapin = $request->tapin;
        $data->hss = $request->hss;
        $data->hst = $request->hst;
        $data->hsu = $request->hsu;
        $data->balangan = $request->balangan;
        $data->tabalong = $request->tabalong;
        $data->tanah_laut = $request->tanah_laut;
        $data->tanah_bumbu = $request->tanah_bumbu;
        $data->kotabaru = $request->kotabaru;

        $data->save();

        Alert::success('Sukses', 'Data Berhasil Diperbarui');

        return redirect('/show_data');
    }



    public function revisi_edit(Request $request, $id)
    {
        $data = TabelProduk::find($id);

        $request->validate([
            'kategori' => 'required',
            'sub_kategori' => 'required',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'merk' => 'nullable',
            'banjarmasin' => 'required',
            'banjarbaru' => 'required',
            'banjar' => 'required',
            'batola' => 'required',
            'tapin' => 'required',
            'hss' => 'required',
            'hst' => 'required',
            'hsu' => 'required',
            'balangan' => 'required',
            'tabalong' => 'required',
            'tanah_laut' => 'required',
            'tanah_bumbu' => 'required',
            'kotabaru' => 'required',
        ]);

        $data->kategori = $request->kategori;
        $data->sub_kategori = $request->sub_kategori;
        $data->nama_barang = $request->nama_barang;
        $data->satuan = $request->satuan;
        $data->merk = $request->merk;
        $data->banjarmasin = $request->banjarmasin;
        $data->banjarbaru = $request->banjarbaru;
        $data->banjar = $request->banjar;
        $data->batola = $request->batola;
        $data->tapin = $request->tapin;
        $data->hss = $request->hss;
        $data->hst = $request->hst;
        $data->hsu = $request->hsu;
        $data->balangan = $request->balangan;
        $data->tabalong = $request->tabalong;
        $data->tanah_laut = $request->tanah_laut;
        $data->tanah_bumbu = $request->tanah_bumbu;
        $data->kotabaru = $request->kotabaru;

        $data->save();

        Alert::success('Sukses', 'Data Berhasil Diperbarui');

        return redirect('/revisi_data');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = TabelProduk::find($id);

        $data->delete();

        Alert::success('Sukses', 'Data Berhasil Dihapus');

        return redirect()->back();
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

        // Ambil data Superadmin berdasarkan form_id
        $form = Form::findOrFail($id); // Mengambil data formulir berdasarkan ID

        $tabelproduk = $form->tabelproduk;

        $detail_user = auth()->user()->detailuser;


        return view('pimpinan.detail_data', compact('form', 'tabelproduk', 'detail_user'));
    }

    public function importexcel(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:2|max:255',
            'tgl_survey' => 'required',
            'periode' => 'required',
            'kota_id' => 'nullable|exists:kotas,id',
            'kategori_id' => 'nullable|exists:kategoris,id',
            'sub_kategori_id' => 'nullable|exists:sub_kategoris,id',
            'file' => 'required|file|mimes:xlsx,xls,csv',
        ]);
    
        $file = $request->file('file');
    
        // Nama file dibuat acak untuk menghindari tabrakan
        $file_name = Str::random(40) . '.' . $file->getClientOriginalExtension();
        $file_path = $file->move('EmployeeData', $file_name);
    
        // Simpan data form
        $form = new Form();
        $form->nama = $request->nama;
        $form->tgl_survey = $request->tgl_survey;
        $form->periode = $request->periode;
        $form->kota_id = $request->kota_id;
        $form->kategori_id = $request->kategori_id;
        $form->sub_kategori_id = $request->sub_kategori_id;
        $form->save();
    
        // Proses file Excel dan simpan data ke tabel_produk
        $this->process_excel($file_path, $form->id, $request->kategori_id, $request->sub_kategori_id, $request->kota_id);
    
        Alert::success('Sukses', 'Data Excel Berhasil Dikirim');
    
        return redirect()->back();
    }
    
    public function process_excel($file_path, $form_id, $kategori_id, $sub_kategori_id, $kota_id)
    {
        $spreadsheet = IOFactory::load($file_path);
        $worksheet = $spreadsheet->getSheet(0);
        $highest_row = $worksheet->getHighestRow();
        $highest_column = $worksheet->getHighestColumn();
        $highest_column_index = Coordinate::columnIndexFromString($highest_column);
        $highest_column_index = min($highest_column_index, 19); // Column 19 (S)
    
        for ($row = 4; $row <= $highest_row; ++$row) {
            $row_data = [];
            for ($col = 1; $col <= $highest_column_index; ++$col) {
                $cell_coordinate = Coordinate::stringFromColumnIndex($col) . $row;
                $cell_value = $worksheet->getCell($cell_coordinate)->getValue();
                $row_data[] = $cell_value;
            }
    
            // Filter untuk mengabaikan baris kosong
            if (!empty(array_filter($row_data, function ($value) {
                return !is_null($value) && $value !== '';
            }))) {
                $new_array = [
                    'kategori_id' => $kategori_id,
                    'sub_kategori_id' => $sub_kategori_id,
                    'kota_id' => $kota_id,
                    'nama_barang' => $row_data[0], // Kolom nama_barang
                    'satuan' => $row_data[1], // Kolom satuan
                    'merk' => $row_data[2], // Kolom merk
                    'harga' => $row_data[3], // Kolom harga
                    'status' => 'ditunda',
                    'form_id' => $form_id,
                ];
    
                TabelProduk::create($new_array);
            }
        }
    }
    
    






    public function update_status(Request $request, $form_id)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        // Perbarui semua data yang memiliki form_id yang sama
        TabelProduk::where('form_id', $form_id)->update(['status' => $request->input('status')]);

        $form = Form::find($form_id);
        if ($form) {
            $form->status = $request->input('status');
            $form->keterangan = $request->input('keterangan');
            $form->save();
        }

        // Berikan notifikasi sukses
        Alert::success('Sukses', 'Status Data Telah Diperbarui');

        return redirect()->back();
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
