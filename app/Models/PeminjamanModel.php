<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanModel extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = ['id', 'tgl_peminjaman', 'tgl_pengembalian', 'status'];
    public $timestamps = false;

    public function detailPeminjaman()
    {
        return $this->hasMany(DetailPeminjamanModel::class, 'id_peminjaman', 'id_peminjaman');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
