<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Superadmin;

class SearchController extends Controller
{
    public function filter(Request $request)
    {
        $query = Superadmin::query();

        if ($request->has('nama_kota') && $request->input('nama_kota') != '') {
            $query->where('nama_kota', $request->input('nama_kota'));
        }

        if ($request->has('kategori') && $request->input('kategori') != '') {
            $query->where('kategori', $request->input('kategori'));
        }

        if ($request->has('sub_kategori') && $request->input('sub_kategori') != '') {
            $query->where('sub_kategori', $request->input('sub_kategori'));
        }

        return response()->json($query->where('status', 'diterima')->get());
    }

    public function getCategories(Request $request)
    {
        $categories = Superadmin::where('nama_kota', $request->input('nama_kota'))
            ->select('kategori')
            ->distinct()
            ->get()
            ->pluck('kategori');

        return response()->json($categories);
    }

    public function getSubCategories(Request $request)
    {
        $subCategories = Superadmin::where('kategori', $request->input('kategori'))
            ->select('sub_kategori')
            ->distinct()
            ->get()
            ->pluck('sub_kategori');

        return response()->json($subCategories);
    }
}

