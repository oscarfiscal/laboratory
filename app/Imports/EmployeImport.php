<?php

namespace App\Imports;

use App\Models\Employe;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class EmployeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employe([
            'employe_id' => $row['employe_id'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'departament' => $row['departament'],
            'active' => $row['active'],
        ]);
    }
}
