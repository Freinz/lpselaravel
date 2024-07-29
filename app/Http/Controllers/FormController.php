<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Kategori;
use App\Models\Kota;
use App\Models\SubKategori;
use App\Models\TabelProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;
use RealRashid\SweetAlert\Facades\Alert;

class FormController extends Controller
{

    public function import_data()
    {
        // Mengambil data untuk dropdown
        $kotas = Kota::all();
        $kategoris = Kategori::all();
        $sub_kategoris = SubKategori::all();
        $detail_user = auth()->user()->detailuser;

        // Mengambil data form yang ada
        $form = Form::all();

        return view('operator.import_data', compact('kotas', 'kategoris', 'sub_kategoris', 'form', 'detail_user'));
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
    
        for ($row = 2; $row <= $highest_row; ++$row) {
            $row_data = [];
            for ($col = 3; $col <= $highest_column_index; ++$col) {
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

}
