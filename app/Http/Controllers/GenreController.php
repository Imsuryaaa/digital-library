<?php

namespace App\Http\Controllers;

use App\Models\GenreModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class GenreController extends Controller
{
    function index()
    {
        $data = [
            'genre' => GenreModel::count(),
            'genreAll' => GenreModel::paginate(5)
        ];

        return view('admin/genreAll')->with($data);
    }
    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_genre' => 'required|unique:genre'
        ], [
            'nama_genre.required' => 'Must be filled in',
            'nama_genre.unique' => 'This genre already exists'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('Salah', 'There was an error sending in, please check again')->withInput();
        }
        $data = [
            'nama_genre' => $request->input('nama_genre')
        ];
        GenreModel::create($data);
        return redirect()->back()->with('Benar', 'Successfully add genres');
    }
}
