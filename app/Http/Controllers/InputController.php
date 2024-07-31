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
        $kategori = Kategori::all();
        return view('pimpinan.input.input_kategori', compact('kategori'));
    }

    public function kategori_read($id)
    {
        $kategori = Kategori::find($id);

        return view('pimpinan.input.update_kategori', compact('kategori'));
    }

    public function kategori_update(Request $request, $id)
    {
        $kategori = Kategori::find($id);

        $request->validate([
            'kategori' => 'required|min:2|max:255',
        ]);

        $kategori->nama_kategori = $request->kategori;

        $kategori->save();

        Alert::success('Sukses', 'Kategori Berhasil Diperbarui');

        return redirect('/input_kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function kategori_delete($id)
    {
        $kategori = Kategori::find($id); // Kategori dari nama models

        $kategori->delete();

        Alert::success('Sukses', 'Kategori Berhasil Dihapus');

        return redirect()->back();
    }


    // Menampilkan form input subkategori
    public function inputSubkategori()
    {
        $subKategori = Subkategori::all();
        $kategoris = Kategori::all();
        return view('pimpinan.input.input_subkategori', compact('kategoris', 'subKategori'));
    }

    public function getSubKategoris($kategori_id)
    {
        $sub_kategoris = SubKategori::where('kategori_id', $kategori_id)->get();
        return response()->json($sub_kategoris);
    }

    // Menampilkan form input nama kota
    public function inputNamakota()
    {
        $kota = Kota::all();

        return view('pimpinan.input.input_namakota', compact('kota'));
    }

    public function kota_read($id)
    {
        $kota = Kota::find($id);

        return view('pimpinan.input.update_kota', compact('kota'));
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

    public function kota_update(Request $request, $id)
    {
        $kota = Kota::find($id);

        $request->validate([
            'kota' => 'required|min:2|max:255',
        ]);

        $kota->nama_kota = $request->kota;

        $kota->save();

        Alert::success('Sukses', 'Kota Berhasil Diperbarui');

        return redirect('/input_namakota');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function kota_delete($id)
    {
        $kota = Kota::find($id); // kota dari nama models

        $kota->delete();

        Alert::success('Sukses', 'Kota Berhasil Dihapus');

        return redirect()->back();
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
    public function subKategori_read($id)
    {
        $subKategori = Subkategori::find($id);

        if (!$subKategori) {
            return redirect()->back()->with('error', 'Subkategori tidak ditemukan.');
        }

        $kategoris = Kategori::all(); // Ambil semua kategori untuk dropdown

        return view('pimpinan.input.update_subkategori', compact('subKategori', 'kategoris'));
    }


    public function subkategori_update(Request $request, $id)
    {
        $subKategori = Subkategori::find($id);

        if (!$subKategori) {
            return redirect()->back()->with('error', 'Subkategori tidak ditemukan.');
        }

        $request->validate([
            'subKategori' => 'required|min:2|max:255',
            'kategori_id' => 'required|exists:kategoris,id', // Validasi kategori_id
        ]);

        $subKategori->nama_subkategori = $request->subKategori;
        $subKategori->kategori_id = $request->kategori_id; // Update kategori_id
        $subKategori->save();

        Alert::success('Sukses', 'Sub Kategori Berhasil Diperbarui');

        return redirect('/input_subkategori');
    }

    public function subKategori_delete($id)
    {
        $subKategori = Subkategori::find($id);

        if (!$subKategori) {
            return redirect()->back()->with('error', 'Subkategori tidak ditemukan.');
        }

        $subKategori->delete();

        Alert::success('Sukses', 'Sub Kategori Berhasil Dihapus');

        return redirect()->back();
    }
}
