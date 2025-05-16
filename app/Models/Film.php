<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_film';

    protected $fillable = [
        'title',
        'genre',
        'duration',
        'status',
        'poster_file',
        'description',
        'release_date',
    ];
}
