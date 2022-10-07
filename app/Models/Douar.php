<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Douar extends Model
{
    use HasFactory;
    protected $fillable = [
        'douar', 
        'commun_id',
    ];
}
