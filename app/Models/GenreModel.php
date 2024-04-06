<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreModel extends Model
{
    use HasFactory;
    protected $table = 'genre';
    protected $fillable = ['nama_genre'];
    public $timestamps = false;

    public function buku()
    {
        return $this->belongsTo(BukuModel::class, 'id_buku', 'id_buku');
    }
}
