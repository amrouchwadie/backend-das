<?php

namespace App\Imports;

use App\Models\Programme3;
use Maatwebsite\Excel\Concerns\ToModel;

class Programme3Import implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Programme3([
            'programme3'     => $row[0],
            'annee'    => $row[1],
            'site' => $row[2],
            'commun'     => $row[3],
            'douar'    => $row[4],
            'proact' => $row[5],
            'intitule'     => $row[6],
            'sousprojet'    => $row[7],
            'typeprojet' => $row[8],
            'natureinterv'     => $row[9],
            'qte'    => $row[10],
            'cout' => $row[11],
            'demcible'     => $row[12],
            'probcible'    => $row[13],
            'freindev' => $row[14],
            'qtetotal'     => $row[15],
            'partindh'    => $row[16],
            'delai' => $row[17],
            'ntrben'    => $row[18],
            'nbrben' => $row[19],
            'partenir_id'     => $row[20],
            'validation'    => $row[21],
        ]);
    }
}
