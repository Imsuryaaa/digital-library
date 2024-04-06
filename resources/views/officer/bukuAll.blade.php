@extends('layout/app')
@section('konten')
<div class="min-h-screen overflow-y-auto">
    <div class="flex items-center justify-center">
        <div class="card w-96 bg-[#B9D7EA] shadow-xl text-black">
            <div class="card-body">
                <p class="text-center text-xl font-bold mb-3">ALL BOOKS</p>
                <p class="text-center font-bold">{{$buku}}</p>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto mt-20">
        <a href="/admin" class="bg-yellow-500 mb-2 text-white font-bold py-2 px-4 rounded" type="button"><i class="bi bi-arrow-90deg-left"></i> Back</a>
        <table class="table">
            <!-- head -->
            <thead>
                <tr class="text-black bg-[#B9D7EA]">
                    <th>No</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @php
                $i = 1;
                @endphp
                @foreach ($bukuAll as $item)
                <tr>
                    <th>{{$i++}}</th>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="mask mask-squircle w-12 h-12">
                                    <img src="{{asset('cover/'.$item->gambar_cover)}}"
                                        alt="Avatar Tailwind CSS Component" />
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">{{$item->nama_buku}}</div>
                                <div class="text-sm opacity-50">{{$item->genre->nama_genre}}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{$item->penulis->namaPenulis}}
                    </td>
                    <td>{{$item->penerbit->nama_penerbit}}</td>
                    <th>
                        <button class="btn btn-success btn-xs bg-blue-600 hover:bg-blue-700"
                            onclick="myModal{{$item->id_buku}}.showModal()">Buku Satuan</button>
                        <button class="btn btn-secondary btn-xs bg-gray-600 hover:bg-gray-700">details</button>
                        <button class="btn btn-secondary btn-xs bg-gray-600 hover:bg-gray-700">details</button>
                    </th>
                </tr>
                @endforeach
            </tbody>
            <!-- foot -->
            <tfoot class="text-black bg-[#B9D7EA]">
                <tr>
                    <th>No</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
        {{$bukuAll->links()}} 
    </div>
    {{-- Modal (Buku Satuan) --}}
    @foreach ($bukuAll as $item)
    <dialog id="myModal{{$item->id_buku}}" class="modal">
        <div class="modal-box bg-blue-600 text-black">
            {{-- <p>{{$item->id_buku}}</p> --}}
            <h3 class="font-bold text-lg">Increase Number of books</h3>
            <form action="/admin/bukuSatuan" method="post">
                @csrf
                <label for="jml_buku" class="block mt-2 text-sm">Input Number of Books :</label>
                <input type="hidden" name="id_buku" value="{{$item->id_buku}}">
                <input id="jml_buku" name="jml_buku" type="text"
                    class="w-full p-2 mt-1 border rounded-md bg-gray-100"
                    placeholder="Enter Number of books">
                <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-black rounded-md hover:bg-blue-700">Add</button>
            </form>
            <p class="py-4">Press ESC key or click outside to close</p>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button class="bg-blue-600 text-black hover:bg-blue-700">close</button>
        </form>
    </dialog>
    @endforeach
    {{-- End --}}
</div>
@endsection
