<?php

namespace App\Http\Controllers;

use App\Models\BukuSatuanModel;
use App\Models\DetailPeminjamanModel;
use App\Models\PeminjamanModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    function index(Request $request)
    {
        $search = $request->input('search');

        $query = User::where('level', 'borrowers');

        if (!empty($search)) {
            $query->where('nama_lengkap', 'like', '%' . $search . '%');
        }

        $userPeminjamAll = $query->paginate(5)->appends(['search' => $search]);
        $data = [
            'userPeminjam' => $query->count(),
            'userPeminjamAll' => $query->paginate(5)->appends(['search' => $search]),
            'pesan' => $userPeminjamAll
        ];
        return view('admin.circulation.userPengembalian')->with($data);
    }

    function indexTransaksiPengembalian(Request $request, $id)
    {
        $searchIdBukuSatuan = $request->input('search_id_buku_satuan');

        $data = User::select('users.nama_lengkap', 'users.id', 'peminjaman.tgl_peminjaman', 'peminjaman.tgl_pengembalian', 'detail_peminjaman.status_peminjaman', 'detail_peminjaman.id_detail_peminjaman', 'buku_satuan.id_buku_satuan', 'detail_peminjaman.tgl_dikembalikan')
            ->join('peminjaman', 'users.id', '=', 'peminjaman.id')
            ->join('detail_peminjaman', 'peminjaman.id_peminjaman', '=', 'detail_peminjaman.id_peminjaman')
            ->join('buku_satuan', 'detail_peminjaman.id_buku_satuan', '=', 'buku_satuan.id_buku_satuan')
            ->when($searchIdBukuSatuan, function ($query) use ($searchIdBukuSatuan) {
                return $query->where('buku_satuan.id_buku_satuan', 'LIKE', '%' . $searchIdBukuSatuan . '%');
            })->where('users.id', $id)->paginate(5);
        return view('admin.circulation.userTransaksiPengembalian', compact('data'));
    }

    function indexTransaksiPengembalianBukuUnit($id)
    {
        // $id_user
        $userId = request()->route('id');
        $detailPeminjamanId = request()->route('id_detail_peminjaman');
        // $data = User::with(['peminjaman.detailPeminjaman.bukuSatuan.detailPeminjaman'])->where('id', $id)->get();
        // $id_detail_peminjaman = DetailPeminjamanModel::where('id_detail_peminjaman', $id)->first();
        $data = User::where('users.id', $userId)
            ->join('peminjaman', 'users.id', '=', 'peminjaman.id')
            ->join('detail_peminjaman', 'peminjaman.id_peminjaman', '=', 'detail_peminjaman.id_peminjaman')
            ->join('buku_satuan', 'detail_peminjaman.id_buku_satuan', '=', 'buku_satuan.id_buku_satuan')
            ->where('detail_peminjaman.id_detail_peminjaman', $detailPeminjamanId)
            ->select('users.nama_lengkap', 'detail_peminjaman.id_detail_peminjaman', 'buku_satuan.id_buku_satuan', 'buku_satuan.kondisi', 'users.id')
            ->get();
        // return $data;
        return view('admin.circulation.userFixPengembalian', compact('data'));
    }

    function indexTransaksiPengembalianBukuUnitCreate(Request $request, $id)
    {
        $id_detail_peminjaman = $request->input('id_detail_peminjaman');
        $id_buku_satuan = $request->input('id_buku_satuan');
        $kondisi = $request->input('kondisi');
        $tgl_dikembalikan = $request->input('tgl_dikembalikan');

        // Temukan record BukuSatuanModel berdasarkan id_buku_satuan
        $bukuSatuan = BukuSatuanModel::find($id_buku_satuan);
        // return $bukuSatuan;

        // Jika bukuSatuan ditemukan, update kondisi buku
        if ($bukuSatuan) {
            $bukuSatuan->kondisi = $kondisi;
            $bukuSatuan->save();
            // return $bukuSatuan;
        }

        // Update tgl_dikembalikan dan status peminjaman di DetailPeminjamanModel
        $detailPeminjaman = DetailPeminjamanModel::where('id_detail_peminjaman', $id_detail_peminjaman)->first();
        if ($detailPeminjaman) {
            $detailPeminjaman->tgl_dikembalikan = $tgl_dikembalikan;
            $detailPeminjaman->status_peminjaman = 'returned'; // Ubah status peminjaman ke tersedia
            $detailPeminjaman->save();
            // return $detailPeminjaman;
        }

        if (Auth::user()->level == 'admin') {
            # code...
            return redirect()->route('transaksiUserPengembalian', ['id' => $id])->with('Benar', 'Successfully Restore Book');
        } else {
            # code...
            return redirect()->route('transaksiUserPengembalian.officer', ['id' => $id])->with('Benar', 'Successfully Restore Book');
        }

        // return redirect()->back()->with('Benar', 'Berhasil');
    }
}
