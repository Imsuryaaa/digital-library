<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenulisModel extends Model
{
    use HasFactory;

    protected $table = 'penulis';
    protected $fillable = ['namaPenulis', 'emailPenulis'];
    public $timestamps = false;

    public function buku()
    {
        return $this->hasMany(BukuModel::class, 'id_buku', 'id_buku');
    }
}
