<?php

namespace App\Http\Controllers;

use App\Models\PenerbitModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenerbitController extends Controller
{
    function index()
    {
        $data = [
            'penerbit' => PenerbitModel::count(),
            'penerbitAll' => PenerbitModel::paginate(5)
        ];

        return view('admin/penerbitAll')->with($data);
    }
    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_penerbit' => 'required',
            'email_penerbit' => 'required|unique:penerbit',
            'no_telp_penerbit' => 'required',
            'alamat_penerbit' => 'required',

        ], [
            'nama_penerbit.required' => 'Must be filled in',
            'email_penerbit.required' => 'Must be filled in',
            'no_telp_penerbit.required' => 'Must be filled in',
            'alamat_penerbit.required' => 'Must be filled in',
            'email_penerbit.unique' => 'This email already in use',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('Salah', 'There was an error sending in, please check again')
                ->withInput();
        };
        $data = [
            'nama_penerbit' => $request->input('nama_penerbit'),
            'email_penerbit' => $request->input('email_penerbit'),
            'no_telp_penerbit' => $request->input('no_telp_penerbit'),
            'alamat_penerbit' => $request->input('alamat_penerbit')
        ];
        PenerbitModel::create($data);
        return redirect()->back()->with('Benar', 'Successfully add Publisher');
    }
}
