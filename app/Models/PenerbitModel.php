<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerbitModel extends Model
{
    use HasFactory;
    protected $table = 'penerbit';
    protected $fillable = ['nama_penerbit', 'email_penerbit', 'no_telp_penerbit', 'alamat_penerbit'];
    public $timestamps = false;

    public function buku()
    {
        return $this->hasMany(BukuModel::class, 'id_buku', 'id_buku');
    }
}
