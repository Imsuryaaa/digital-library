<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use Illuminate\Http\Request;

class awalController extends Controller
{
    function index()
    {
        $data = [
            'bukuAll' => BukuModel::latest()->paginate(8)
        ];
        return view('peminjam/perpusAwal')->with($data);
    }
}
