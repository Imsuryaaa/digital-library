<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\PenerbitModel;
use App\Models\PenulisModel;
use Illuminate\Http\Request;

class peminjamController extends Controller
{
    //
    function index()
    {
        $data = [
            'bukuAll' => BukuModel::latest()->paginate(8)
        ];
        return view('peminjam/perpus')->with($data);
    }
}
