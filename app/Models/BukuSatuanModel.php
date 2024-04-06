<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuSatuanModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_buku_satuan';
    protected $table = 'buku_satuan';
    protected $fillable = ['id_buku', 'kondisi'];
    public $timestamps = false;

    public function buku()
    {
        return $this->belongsTo(BukuModel::class, 'id_buku', 'id_buku');
    }

    public function detailPeminjaman()
    {
        return $this->hasMany(DetailPeminjamanModel::class, 'id_buku_satuan', 'id_buku_satuan');
    }
}
