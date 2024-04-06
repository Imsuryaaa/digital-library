<?php

namespace App\Http\Controllers;

use App\Models\PenulisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PenulisController extends Controller
{

    function index()
    {
        $data = [
            'penulis' => PenulisModel::count(),
            'penulisAll' => PenulisModel::paginate(5)
        ];
        return view('admin/penulisAll')->with($data);
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namaPenulis' => 'required',
            'emailPenulis' => 'required|unique:penulis'
        ], [
            'namaPenulis.required' => 'Must be filled in',
            'emailPenulis.required' => 'Must be filled in',
            'emailPenulis.unique' => 'This email already in use',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('Salah', 'There was an error sending in, please check again')->withInput();
        }
        $data = [
            'namaPenulis' => $request->input('namaPenulis'),
            'emailPenulis' => $request->input('emailPenulis')
        ];
        PenulisModel::create($data);
        return redirect()->back()->with('Benar', 'Successfully add Author');
    }
}
