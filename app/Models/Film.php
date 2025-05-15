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
        'studio',
        'poster_file',
        'description',
        'release_date', // tambahkan ini jika ada kolom release_date
    ];
}
