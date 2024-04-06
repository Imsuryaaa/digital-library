<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\DetailPeminjamanModel;
use App\Models\PeminjamanModel;
use App\Models\PenerbitModel;
use App\Models\PenulisModel;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{
    // Admin Zone
    function index()
    {
        $data = [
            'penulis' => PenulisModel::count(),
            'penerbit' => PenerbitModel::count(),
            'buku' => BukuModel::count(),
            'borrowed' => DetailPeminjamanModel::count()
        ];
        return view('admin/adm_dashboard')->with($data);
    }

    function tambahPetugas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nama_lengkap' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Username must be filled in',
            'nama_lengkap.required' => 'Full Name must be filled in',
            'no_telp.required' => 'Phone Number must be filled in',
            'alamat.required' => 'Address must be filled in',
            'email.required' => 'Email must be filled in',
            'password.required' => 'Password must be filled in',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('Salah', 'There was an error sending in, please check again')->withInput();
        }
        $pw = $request->input('password');
        $data = [
            'name' => $request->input('name'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'alamat' => $request->input('alamat'),
            'no_telp' => $request->input('no_telp'),
            'email' => $request->input('email'),
            'level' => 'officer',
            'password' => bcrypt($pw)
        ];

        // return $data;
        User::create($data);
        return redirect()->back()->with('Benar', 'Successfully add Officer');
    }
    function tambahPeminjam(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nama_lengkap' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Username must be filled in',
            'nama_lengkap.required' => 'Full Name must be filled in',
            'no_telp.required' => 'Phone Number must be filled in',
            'alamat.required' => 'Address must be filled in',
            'email.required' => 'Email must be filled in',
            'password.required' => 'Password must be filled in',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('Salah', 'There was an error sending in, please check again')->withInput();
        }
        $pw = $request->input('password');
        $data = [
            'name' => $request->input('name'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'alamat' => $request->input('alamat'),
            'no_telp' => $request->input('no_telp'),
            'email' => $request->input('email'),
            'level' => 'borrowers',
            'password' => bcrypt($pw)
        ];

        // return $data;
        User::create($data);
        return redirect()->back()->with('Benar', 'Successfully add Borrowers');
    }

    function report(Request $request)
    {
        $reportsCount =  DetailPeminjamanModel::count();
        $tgl_peminjaman = $request->input('tgl_peminjaman');
        $tgl_pengembalian = $request->input('tgl_pengembalian');
        $status_peminjaman = $request->input('status_peminjaman');

        // return $tgl_peminjaman;

        $query = PeminjamanModel::query()
            ->join('detail_peminjaman as dp', 'peminjaman.id_peminjaman', '=', 'dp.id_peminjaman')
            ->join('buku_satuan as bs', 'dp.id_buku_satuan', '=', 'bs.id_buku_satuan')
            ->join('buku as b', 'bs.id_buku', '=', 'b.id_buku')
            ->join('users as u', 'peminjaman.id', '=', 'u.id')
            ->select('peminjaman.tgl_peminjaman', 'peminjaman.tgl_pengembalian', 'dp.tgl_dikembalikan', 'dp.status_peminjaman', 'bs.id_buku_satuan', 'b.nama_buku', 'u.nama_lengkap')
            ->when($tgl_peminjaman, function ($query) use ($tgl_peminjaman) {
                return $query->where('peminjaman.tgl_peminjaman', $tgl_peminjaman);
            })
            ->when($tgl_pengembalian, function ($query) use ($tgl_pengembalian) {
                return $query->where('peminjaman.tgl_pengembalian', $tgl_pengembalian);
            })
            ->when($status_peminjaman, function ($query) use ($status_peminjaman) {
                return $query->where('dp.status_peminjaman', $status_peminjaman);
            });

        // return $tgl_peminjaman;
        $reports = $query->paginate(5);
        // var_dump($tgl_peminjaman, $tgl_pengembalian);
        // return $reports;

        return view('admin/report', compact('reports', 'reportsCount'));
    }
    // End

    // Officer Zone
    function indexPetugas()
    {
        $data = [
            'penulis' => PenulisModel::count(),
            'penerbit' => PenerbitModel::count(),
            'buku' => BukuModel::count(),
            'borrowed' => DetailPeminjamanModel::where('status_peminjaman', '=', 'borrowed')->count()
        ];
        return view('admin/adm_dashboard')->with($data);
    }
    // End


}
