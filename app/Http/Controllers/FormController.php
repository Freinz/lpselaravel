<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FormController extends Controller
{
    

    public function create()
    {

        $inputform = Form::all();

        return view('operator.input_formulir', compact(['inputform']) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Form;

        $request->validate([
            'nama' => 'required|min:2|max:255',
            'tgl_survey' => 'required',
            'periode' => 'required',
            'ket_salah' => 'required',

        ]);
        $data->nama = $request->nama;
        $data->tgl_survey = $request->tgl_survey;
        $data->periode = $request->periode;
        $data->ket_salah = $request->ket_salah;
    

        $data->save();

        Alert::success('Sukses', 'Permintaan pendaftaran berhasil diajukan');
        
        return redirect()->back();
        
    }

    public function show()
    {
        $data = Form::all();

        return view('pimpinan.show_form', compact('data'));

    }

    public function setuju_form ($id) {

        $data = Form::find($id);

        $data -> status = 'disetujui';

        $data -> save();

        return redirect('/show_form');

        // return redirect('pimpinan.show_form');

    }

    public function tidaksetuju_form ($id) {

        $data = Form::find($id);

        $data -> status = 'Ditolak';

        $data -> save();

        return redirect('/show_form');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       

    }

}
