<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planificationppdh extends Model
{
    use HasFactory;

    protected $fillable = [
        'annee', 'programme',  'typeprojet',  'demensioncible',  'problemcible',  'freindev',  'nbrprojet',  'couttotal', 
    ];
}
