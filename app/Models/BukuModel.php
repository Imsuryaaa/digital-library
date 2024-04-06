<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;
    protected $primarykey = 'id_buku';
    protected $table = 'buku';
    protected $fillable = ['id_genre', 'id_penulis', 'id_penerbit', 'nama_buku', 'thn_terbit', 'kode_isbn', 'halaman', 'gambar_cover', 'sinopsis'];
    public $timestamps = true;

    public function penulis()
    {
        return $this->belongsTo(PenulisModel::class, 'id_penulis', 'id_penulis');
    }

    public function penerbit()
    {
        return $this->belongsTo(PenerbitModel::class, 'id_penerbit', 'id_penerbit');
    }

    public function genre()
    {
        return $this->hasOne(GenreModel::class, 'id_genre', 'id_genre');
    }
}
