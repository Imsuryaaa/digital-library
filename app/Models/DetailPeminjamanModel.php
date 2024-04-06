<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjamanModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_detail_peminjaman';
    protected $table = 'detail_peminjaman';
    protected $fillable = ['id_peminjaman', 'id_buku_satuan', 'status_peminjaman', 'tgl_dikembalikan'];
    public $timestamps = false;

    public function bukuSatuan()
    {
        return $this->belongsTo(BukuSatuanModel::class, 'id_buku_satuan', 'id_buku_satuan');
    }
}
