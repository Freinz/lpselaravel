<?php

namespace App\Imports;

use App\Models\Managementdata;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Managementdata([
            'nama_kota'=> $row[0],
            'kategori'=> $row[1],
            'sub_kategori'=> $row[2],
            'nama_barang'=> $row[3],
            'satuan'=> $row[4],
            'merk'=> $row[5],
            'harga'=> $row[6]
        ]);
    }
}

