<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;  // Asumsikan ada model Kategori
use App\Models\Subkategori;  // Asumsikan ada model Subkategori
use App\Models\Kota;  // Asumsikan ada model Kota
use RealRashid\SweetAlert\Facades\Alert;

class InputController extends Controller
{
    // Menampilkan form input kategori
    public function inputKategori()
    {
        return view('pimpinan.input.input_kategori');
    }

    // Menampilkan form input subkategori
    public function inputSubkategori()
    {
        $kategoris = Kategori::all();
        return view('pimpinan.input.input_subkategori', compact('kategoris'));
    }

    public function getSubKategoris($kategori_id)
    {
        $sub_kategoris = SubKategori::where('kategori_id', $kategori_id)->get();
        return response()->json($sub_kategoris);
    }

    // Menampilkan form input nama kota
    public function inputNamakota()
    {
        return view('pimpinan.input.input_namakota');
    }

    // Menyimpan data kategori
    public function storeKategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        Alert::success('Sukses', 'Kategori berhasil ditambahkan');
        return redirect()->back();
    }

    public function storeSubkategori(Request $request)
    {
        $request->validate([
            'nama_subkategori' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        SubKategori::create([
            'nama_subkategori' => $request->nama_subkategori,
            'kategori_id' => $request->kategori_id,
        ]);

        Alert::success('Sukses', 'Sub Kategori berhasil ditambahkan');
        return redirect()->back();
    }

    public function storeKota(Request $request)
    {
        $request->validate([
            'nama_kota' => 'required|string|max:255',
        ]);

        Kota::create([
            'nama_kota' => $request->nama_kota,
        ]);

        Alert::success('Sukses', 'Nama Kota berhasil ditambahkan');
        return redirect()->back();
    }
}
