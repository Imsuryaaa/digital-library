@extends('layout/app')
@section('konten')
<h1 class="text-4xl mb-3">Transaction Return validation zone</h1>
<div class="bg-gray-100 border border-gray-300 rounded-lg shadow-md mb-4">
    <div class="p-6">
        <h3 class="text-lg font-semibold mb-2">Transaction Return Confirmation / <span class="text-gray-700 text-opacity-50 inline-block">{{$data[0]->nama_lengkap}}</span></h3>
        <p class="mb-6">Please fill in first whether the condition of the book is lost or looks pretty good!</p>
        @if (Auth::user()->level == 'admin')
        <form action="/indexTransaksiPengembalianBukuUnitCreate/{{$data[0]->id}}/{{$data[0]->id_buku_satuan}}" method="post">
        @else
        <form action="/officer/indexTransaksiPengembalianBukuUnitCreate/{{$data[0]->id}}/{{$data[0]->id_buku_satuan}}" method="post">
        @endif
        
        <input type="text" hidden name="id_detail_peminjaman" value="{{$data[0]->id_detail_peminjaman}}" id="">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    @csrf
                    <label for="nama" class="block mb-1">Unit Book ID:</label>
                    <input type="text" id="nama" name="nama" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" disabled value="{{$data[0]->id_buku_satuan}}">
                </div>
                <input type="hidden" name="tgl_dikembalikan" value="{{date('Y-m-d')}}">
                <input type="text" hidden name="id_buku_satuan" value="{{$data[0]->id_buku_satuan}}">
                <input  type="text" hidden name='id' value="{{$data[0]->id}}">
                <div>
                    <label for="tanggal_pengembalian" class="block mb-1">Book Condition :</label>
                    <div class="flex">
                        <select id="search_query" name="kondisi" class="flex-grow px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                            <!-- Tambahkan opsi-opsi sesuai kebutuhan -->
                            <option value="good">{{ucFirst($data[0]->kondisi)}}</option>
                            <option value="pretty_good">Pretty good</option>
                            <option value="lost">Lost</option>
                        </select>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">Done</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection