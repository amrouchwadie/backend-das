<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activiteroyal extends Model
{
    use HasFactory;

    protected $fillable = [
        'typeactivite', 'site','commun','douar','programme','secteur','objectif','couttotal','coutannul','typeprojet','disponiblite','etude','autorisation','finance','typeoffre','datedebut','datefin','etatavance','percavance','suiteobserve','observation',
    ];
}
