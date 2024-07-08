<?php

namespace App\Imports;

use App\Models\Superadmin;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $form_id;

    public function __construct($form_id)
    {

        $this->form_id = $form_id;
    }


    public function model(array $row)
    {
        return new Superadmin([
            'nama_kota'=> $row[0],
            'kategori'=> $row[1],
            'sub_kategori'=> $row[2],
            'nama_barang'=> $row[3],
            'satuan'=> $row[4],
            'merk'=> $row[5],
            'harga'=> $row[6],
            'form_id' => $this->form_id
        ]);
    }
}

