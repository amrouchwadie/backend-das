<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme2 extends Model
{
    use HasFactory;
    protected $fillable = [
        'programme2',
        'annee',
        'site',
        'commun',
        'douar',
        'proact',
        'intitule',
        'sousprojet',
        'typeprojet',
        'natureinterv',
        'qte',
        'cout',
        'demcible',
        'probcible',
        'freindev',
        'qtetotal',
        'partindh',
        'delai',
        'ntrben',
        'nbrben',
        'partenir_id',
        'validation',
    ];
}
