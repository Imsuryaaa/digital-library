<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\GenreModel;
use App\Models\PenerbitModel;
use App\Models\PenulisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BukuController extends Controller
{

    // Admin
    function index(Request $request)
    {
        $searchTerm = $request->input('search');

        $results = BukuModel::whereHas('penulis', function ($query) use ($searchTerm) {
            $query->where('namaPenulis', 'like', '%' . $searchTerm . '%');
        })
            ->orWhere('nama_buku', 'like', '%' . $searchTerm . '%')
            ->orWhereHas('penerbit', function ($query) use ($searchTerm) {
                $query->where('nama_penerbit', 'like', '%' . $searchTerm . '%');
            })
            ->orderBy('id_buku', 'desc')
            ->paginate(5);

        $buku = BukuModel::count();
        return view('admin/bukuAll', compact('results', 'buku'));
    }

    function create()
    {
        $data = [
            'listGenre' => GenreModel::all(),
            'listPenerbit' => PenerbitModel::all(),
            'listPenulis' => PenulisModel::all()
        ];
        return view('admin/buku')->with($data);
    }

    function store(Request $request)
    {
        $request->validate([
            'namaBuku' => 'required',
            'namaPenulis' => 'required',
            'nama_genre' => 'required',
            'nama_penerbit' => 'required',
            'thn_terbit' => 'required',
            'kode_isbn' => 'required',
            'gambar_cover' => 'mimes:jpeg,jpg,png',
            'halaman' => 'required',
            'sinopsis' => 'required'
        ], [
            'namaBuku.required' => 'Book name is required',
            'namaPenulis.required' => 'Author name is required',
            'nama_genre.required' => 'Genre Required',
            'nama_penerbit.required' => 'Publisher name is required',
            'thn_terbit.required' => 'Publication year required',
            'kode_isbn.required' => 'ISBN code required',
            'halaman.required' => 'Page is required',
            'sinopsis.required' => 'Synopsis is required',
            'gambar_cover.mimes' => 'Covers that can be uploaded are only JPEG, JPG, and PNG'
        ]);

        $cover_file = $request->file('gambar_cover');
        // Fungsi Jika User Belum ada cover
        if ($cover_file) {
            $ekstensi = $cover_file->extension();
            $fiks_cover = date('ymdhis') . '.' . $ekstensi;
            $cover_file->move(public_path('cover'), $fiks_cover);
        } else {
            // Generete Nama Sampul Random
            $fiks_cover = 'Default.jpg';
        }
        $data = [
            'nama_buku' => $request->input('namaBuku'),
            'id_penulis' => $request->input('namaPenulis'),
            'id_genre' => $request->input('nama_genre'),
            'id_penerbit' => $request->input('nama_penerbit'),
            'thn_terbit' => $request->input('thn_terbit'),
            'kode_isbn' => $request->input('kode_isbn'),
            'gambar_cover' => $fiks_cover,
            'halaman' => $request->input('halaman'),
            'sinopsis' => $request->input('sinopsis')
        ];


        BukuModel::create($data);
        return redirect()->back()->with('Benar', 'Book Added successfully');
    }

    function detailBuku()
    {
        $id_buku = request()->route('id_buku');
        $data = BukuModel::where('id_buku', $id_buku)
            ->join('penulis', 'buku.id_penulis', '=', 'penulis.id_penulis')
            ->join('penerbit', 'buku.id_penerbit', '=', 'penerbit.id_penerbit')
            ->join('genre', 'buku.id_genre', '=', 'genre.id_genre')
            ->get();

        // return $data;
        return view('admin/detailBook', compact('data'));
    }
    // End

    // Officer
    function indexBuku(Request $request)
    {
        $searchTerm = $request->input('search');

        $results = BukuModel::whereHas('penulis', function ($query) use ($searchTerm) {
            $query->where('namaPenulis', 'like', '%' . $searchTerm . '%');
        })
            ->orWhere('nama_buku', 'like', '%' . $searchTerm . '%')
            ->orWhereHas('penerbit', function ($query) use ($searchTerm) {
                $query->where('nama_penerbit', 'like', '%' . $searchTerm . '%');
            })
            ->orderBy('id_buku', 'desc')
            ->paginate(5);

        $buku = BukuModel::count();
        return view('admin/bukuAll', compact('results', 'buku'));
    }

    function createBuku()
    {
        $data = [
            'listGenre' => GenreModel::all(),
            'listPenerbit' => PenerbitModel::all(),
            'listPenulis' => PenulisModel::all()
        ];
        return view('admin/buku')->with($data);
    }
    // End

}
