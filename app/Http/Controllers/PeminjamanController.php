<?php

namespace App\Http\Controllers;

use App\Models\DetailPeminjamanModel;
use App\Models\PeminjamanModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PeminjamanController extends Controller
{
    // View Lending
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
        return view('admin.circulation.userMinjam')->with($data);
    }
    // End View Lending

    // View Tambah Transaksi
    function indexTransaksi($idPeminjam)
    {
        $userPeminjam = User::where('level', 'borrowers')->where('id', $idPeminjam)->first();
        $data = [
            // 'userPeminjam' => User::where('level', 'borrowers')->first(),
            'tr_peminjaman' => PeminjamanModel::orderBy('tgl_peminjaman', 'desc')->where('id', $idPeminjam)->paginate(5),
        ];
        return view('admin/circulation/userTransaksi', compact('userPeminjam'))->with($data);
    }
    // End View Tambah Transaksi

    // Create Transaksi (Tanpa Buku)
    function indexTransaksiCreate(Request $request)
    {
        $request->validate([
            'tanggal_pengembalian' => 'required'
        ], [
            'tanggal_pengembalian.required' => 'The return date must be filled in before proceeding'
        ]);

        $data = [
            'id' => $request->input('id'),
            'tgl_peminjaman' => $request->input('tgl_peminjaman'),
            'status' => 'belum',
            'tgl_pengembalian' => $request->input('tanggal_pengembalian')
        ];

        PeminjamanModel::create($data);
        // return redirect()->route('transaksiUser', ['id' => $request->input('id')]);
        return redirect()->back()->with('Benar', 'Successfully Add Lending transaction');
    }
    // End Create Transaksi (Tanpa Buku)

    function indexTransaksiBuku($id)
    {
        $idPeminjaman = request()->route('id_peminjaman');

        $data = [
            'userPeminjam' => User::where('level', 'borrowers')->where('id', $id)->first(),
            'tr_peminjaman2' => PeminjamanModel::where('id_peminjaman', $idPeminjaman)->first()
        ];
        // return $data;
        return view('admin/circulation/userFixPinjam', ['id' => $id])->with($data);
    }

    function prosesTransaksiBuku(Request $request, $id_peminjaman)
    {
        $request->validate([
            'pinjam0.*' => [
                'required',
                Rule::unique('detail_peminjaman', 'id_buku_satuan')->where(function ($query) {
                    $query->where('status_peminjaman', '!=', 'returned');
                })
            ]
        ], [
            'pinjam0.*.required' => "Unit book code must be filled in",
            'pinjam0.*.unique' => "This book is currently on loan",
        ]);

        $id_peminjaman = $request->input('id_peminjaman');
        $data = [];

        // Loop untuk menyimpan detail peminjaman
        for ($i = 0; $i < $request->row; $i++) {
            if ($request->has("pinjam$i") && !is_null($request->input("pinjam$i"))) {
                $detailPeminjaman = new DetailPeminjamanModel();
                $detailPeminjaman->id_peminjaman = $id_peminjaman; // Menggunakan $id_peminjaman yang diberikan
                $detailPeminjaman->id_buku_satuan = $request->input("pinjam$i")[0];
                $detailPeminjaman->status_peminjaman = 'borrowed';
                $detailPeminjaman->save();

                $data[] = $detailPeminjaman;
            }
        }

        // return $data;
        $id = $request->input('id');
        PeminjamanModel::where('id_peminjaman', $id_peminjaman)->update(['status' => 'selesai']);

        // return redirect('/pilihUser');
        if (Auth::user()->level == 'admin') {
            # code...
            return Redirect()->route('transaksiUser', ['id' => $id])->with('Benar', 'Successfully made a loan');
        } else {
            # code...
            return Redirect()->route('transaksiUser.officer', ['id' => $id])->with('Benar', 'Successfully made a loan');
        }

        // return redirect()->back()->with('Benar', 'Successfully made a loan');
    }
}
