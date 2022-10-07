<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaisirEnMiseEnOuvre extends Model
{
    use HasFactory;

    protected $fillable = [
        'annee',  'reference', 'secteur', 'intitule', 'programme', 'typeprojet', 'coutglobal',
    ];
}
