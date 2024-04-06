<?php

namespace App\Http\Controllers;

use App\Models\BukuSatuanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuSatuanController extends Controller
{
    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jml_buku' => 'required',
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ], [
            'jml_buku.required' => 'Please input the number of books first'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('Salah', 'Please input the number of books first');
        }
        $jml_buku = $request->input('jml_buku');
        for ($i = 1; $i <= $jml_buku; $i++) {
            $data = [
                'id_buku' => $request->input('id_buku'),
                'kondisi' => 'good'
            ];

            BukuSatuanModel::create($data);
        }
        return redirect()->back()->with('Benar', 'Successfully Add unit book');
    }
}
