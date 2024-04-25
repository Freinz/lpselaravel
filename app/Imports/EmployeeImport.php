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
            'city_name' => $row[0],
            'jenis_barang' => $row[1],
            'nama_barang' => $row[2],
            'harga_satuan' => $row[3],
            'kuartal' => $row[4],
            'tahun' => $row[5]
        ]);
    }
}

