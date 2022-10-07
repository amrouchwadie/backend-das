<?php

namespace App\Imports;

use App\Models\Planificationppdh;
use Maatwebsite\Excel\Concerns\ToModel;

class PlanificationppdhImport implements ToModel
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Planificationppdh([
            'annee'     => $row['annee'],
            'programme'    => $row['programme'], 
            'typeprojet'     => $row['typeprojet'],
            'demensioncible'    => $row['demensioncible'], 
            'problemcible'     => $row['problemcible'],
            'freindev'    => $row['freindev'], 
            'nbrprojet'     => $row['nbrprojet'],
            'couttotal'    => $row['couttotal'], 
        ]);
    }
}
