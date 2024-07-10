<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Role;
use App\Models\Superadmin;
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
        $query = Superadmin::query();



        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->sub_kategori) {
            $query->where('sub_kategori', $request->sub_kategori);
        }

        $superadmin = $query->get();


        $kategori = Superadmin::select('kategori')->groupBy('kategori')->get();
        $sub_kategori = Superadmin::select('sub_kategori')->groupBy('sub_kategori')->get();

        $jumlah_kota = 13;
        $jumlah_kategori = $kategori->count();
        $total_barang = Superadmin::count();

        $jumlah_user = User::count();

        $persentase_kota = ($jumlah_kota / 13) * 100;
        $persentase_kategori = ($jumlah_kategori / 100) * 100;

        return view('dashboard', compact(
            'superadmin',
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
        $superadmin = Superadmin::all();

        $detail_user = auth()->user()->detailuser;

        $role = Role::all();

        $total_barang = Superadmin::count();

        $total_barang_ditunda = Superadmin::where('status', 'ditunda')->count();

        $total_barang_ditolak = Superadmin::where('status', 'ditolak')->count();

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
            return view('pimpinan.index', compact('superadmin', 'detail_user', 'total_barang', 'total_barang_ditunda', 'total_barang_ditolak', 'jumlah_keseluruhan_barang', 'persentase_jumlah_barang', 'jumlah_operator'));
        } else if (Auth::user()->hasRole('operator')) {
            return view('operator.index', compact('superadmin', 'detail_user',  'total_barang', 'total_barang_ditunda'));
        } else {
            return redirect()->back();
        }
    }

    public function show()
    {

        $superadmin = Superadmin::all();

        $detail_user = auth()->user()->detailuser;

        if (Auth::user()->hasRole('superadmin')) {
            return view('superadmin.show_data', compact('superadmin', 'detail_user'));
        } else if (Auth::user()->hasRole('pimpinan')) {
            return view('pimpinan.show_data', compact('superadmin', 'detail_user'));
        } else if (Auth::user()->hasRole('operator')) {
            return view('operator.show_data', compact('superadmin', 'detail_user'));
        } else {
            return view('pimpinan.show_data', compact('superadmin', 'detail_user'));
        }
    }

    public function import_data()
    {
        $detail_user = auth()->user()->detailuser;

        $superadmin = Superadmin::all();

        $form = Form::all();

        return view('operator.import_data', compact('superadmin', 'detail_user', 'form'));
    }

    public function revisi_data()
    {

        $detail_user = auth()->user()->detailuser;

        $superadmin = Superadmin::all();

        $form = Form::all();

        return view('operator.revisi_data', compact('superadmin', 'form', 'detail_user'));
    }

    public function detail_revisi($id)
    {

        // Ambil data Superadmin berdasarkan form_id
        $form = Form::findOrFail($id); // Mengambil data formulir berdasarkan ID

        $superadmin = $form->superadmin;

        $detail_user = auth()->user()->detailuser;

        return view('operator.detail_revisi', compact('form', 'superadmin', 'detail_user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Superadmin::find($id);

        return view('superadmin.update_data', compact('data'));
    }

    public function revisi_read($id)
    {
        $detail_user = auth()->user()->detailuser;

        $data = Superadmin::find($id);

        $form = Form::all();

        return view('operator.revisi_read', compact('data', 'form', 'detail_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Superadmin::find($id);

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
        $data = Superadmin::find($id);

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
        $data = Superadmin::find($id);

        $data->delete();

        Alert::success('Sukses', 'Data Berhasil Dihapus');
        
        return redirect()->back();
    }
    
    public function revisi_delete($id)
    {
        $data = Superadmin::find($id);
        
        $data->delete();
        
        Alert::success('Sukses', 'Data Berhasil Dihapus');

        return redirect()->back();
    }



    public function approver_data()
    {

        $user_type = Auth::user()->usertype;

        $superadmin = Superadmin::all();

        $form = Form::all();

        return view('pimpinan.approver_data', compact('superadmin', 'form'));
    }

    public function detail_data($id)
    {

        // Ambil data Superadmin berdasarkan form_id
        $form = Form::findOrFail($id); // Mengambil data formulir berdasarkan ID

        $superadmin = $form->superadmin;

        $detail_user = auth()->user()->detailuser;


        return view('pimpinan.detail_data', compact('form', 'superadmin', 'detail_user'));
    }

    /* ==== UPLOAD EXCEL + NEW FORM ==== */
    public function importexcel(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:2|max:255',
            'tgl_survey' => 'required',
            'periode' => 'required',
        ]);

        $file = $request->file('file');

        // Nama file dibikin random biar gak tabrakan sama nama file baru yg namanya sama
        $file_name = Str::random(40) . '.' . $file->getClientOriginalExtension();

        $file_path = $file->move('EmployeeData', $file_name);

        $form = new Form();

        $form->nama = $request->nama;
        $form->tgl_survey = $request->tgl_survey;
        $form->periode = $request->periode;
        $form->save();

        $this->process_excel($file_path, $form->id);

        Alert::success('Sukses', 'Data Excel Berhasil Dikirim');

        return redirect()->back();
    }

    /* ==== READ & PROCESS EXCEL ==== */
    public function process_excel($file_path, $form_id)
    {
        $spreadsheet = IOFactory::load($file_path);
        $combined_data = [];

        // Ambil sheet pertama saja
        $worksheet = $spreadsheet->getSheet(0);
        $highest_row = $worksheet->getHighestRow();
        $highest_column = $worksheet->getHighestColumn();

        $highest_column_index = Coordinate::columnIndexFromString($highest_column);
        $highest_column_index = min($highest_column_index, 18); // Column 18 (R)

        for ($row = 4; $row <= $highest_row; ++$row) {
            $row_data = [];

            for ($col = 1; $col <= $highest_column_index; ++$col) {
                $cell_coordinate = Coordinate::stringFromColumnIndex($col) . $row;
                $cell_value = $worksheet->getCell($cell_coordinate)->getValue();
                $row_data[] = $cell_value;
            }

            if (!empty(array_filter($row_data, function ($value) {
                return !is_null($value) && $value !== '';
            }))) {
                $combined_data[] = $row_data;
            }
        }

        // Menyimpan data langsung sesuai kolom yang ada
        foreach ($combined_data as $data) {
            $new_array = [
                'kategori' => $data[0],
                'sub_kategori' => $data[1],
                'nama_barang' => $data[2],
                'satuan' => $data[3],
                'merk' => $data[4],
                'banjarmasin' => $data[5],
                'banjarbaru' => $data[6],
                'banjar' => $data[7],
                'batola' => $data[8],
                'tapin' => $data[9],
                'hss' => $data[10],
                'hst' => $data[11],
                'hsu' => $data[12],
                'balangan' => $data[13],
                'tabalong' => $data[14],
                'tanah_laut' => $data[15],
                'tanah_bumbu' => $data[16],
                'kotabaru' => $data[17],
                'status' => 'ditunda',
                'form_id' => $form_id,
            ];

            Superadmin::create($new_array);
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
        Superadmin::where('form_id', $form_id)->update(['status' => $request->input('status')]);

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
        Superadmin::where('form_id', $form_id)->update(['status' => $request->status]);

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
