@extends('layout/app')
@section('konten')
<h1 class="text-4xl mb-3">User Return Transaction Page</h1>
<hr class="border-t border-b border-gray-700 my-4">
{{-- Card 1 Transaksi --}}
    @if ($data->isEmpty())
        <p class="flex justify-center text-3xl mt-52">--- The Borrower Has Never Borrowed a Book ---</p>
    @else
        
    <div class="bg-gray-100 border border-gray-300 rounded-lg shadow-md mb-4">
        <div class="p-6">
            <h3 class="text-lg font-semibold mb-2">Transaction Confirmation / <span class="text-gray-700 text-opacity-50 inline-block">{{$data[0]->nama_lengkap}}</span></h3>
            <p class="mb-6">If the data is mostly please use the search feature that has been provided!</p>
            <form action="/transaksiUserPengembalian/{{$data[0]->id}}" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        @csrf
                        <label for="nama" class="block mb-1">Full Name:</label>
                        <input type="text" id="nama" name="nama" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" disabled value="{{$data[0]->nama_lengkap}}">
                    </div>
                    <input type="hidden" name="tgl_peminjaman" value="{{date('Y-m-d')}}">
                    {{-- <input hidden type="text" name="row" id="inp_row"> --}}
                    <input hidden type="text" name='id' value="{{$data[0]->id}}">
                    <div>
                        <label for="tanggal_pengembalian" class="block mb-1">Find Book Units :</label>
                        <div class="flex">
                            <input type="search" id="search_query" name="search_id_buku_satuan" class="flex-grow px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 " placeholder="Search...">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
{{-- End Card 1 Transaksi --}}
{{-- Card 2 Tabel --}}
<div class="w-full">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-4">
            <table class="w-full table mb-2">
                <thead>
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Full Name</th>
                        <th class="px-4 py-2">Loan Date</th>
                        <th class="px-4 py-2">Return Date</th>
                        <th class="px-4 py-2">Unit Books Id</th>
                        <th class="px-4 py-2">Loan Status</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody> 
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td class="border px-4 py-2">{{$i++}}</td>
                            <td class="border px-4 py-2">{{$item->nama_lengkap}}</td>
                            <td class="border px-4 py-2">{{$item->tgl_peminjaman}}</td>
                            <td class="border px-4 py-2">{{$item->tgl_pengembalian}}</td>
                            <td class="border px-4 py-2">{{$item->id_buku_satuan}}</td>
                            <td class="border px-4 py-2">{{$item->status_peminjaman}}</td>
                            <td class="border px-4 py-2">
                                @if ($item->status_peminjaman == 'borrowed')   
                                <a href="{{'/indexTransaksiPengembalianBukuUnit/'.$item->id_detail_peminjaman}}" class="btn btn-secondary btn-xs bg-gray-600 hover:bg-gray-700">Process now!
                                </a>
                                @else
                                    <p class="font-bold">DONE</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        {{$data->links()}} 
        </div>
    </div>
</div>
{{-- End Card 2 Tabel --}}
@endif


{{-- Modal Untuk Proses Transaksi --}}
{{-- @foreach ($tr_peminjaman as $item) --}}
    {{-- <dialog id="myModal{{$tr_peminjaman2->id_peminjaman}}" class="modal">
        <div class="modal-box bg-[#769FCD] text-black w-11/12">
            <h3 class="font-bold text-lg mb-4">Transaction Confirmation</h3>
            <form action="/transaksiUser/create/{{$tr_peminjaman2->id_peminjaman}}" method="POST">
                @csrf
                <input hidden type="text" name="row" id="inp_row">
                <input name='id_peminjaman' value="{{$tr_peminjaman2->id_peminjaman}}">
                <div class="mb-4">
                    <label for="id_buku_satuan" class="block mb-1">Unit Book :</label>
                    <div class="flex items-center">
                        <input type="text" id="id_buku_satuan" name="pinjam0[]" class="flex-grow px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 @error('id_buku_satuan') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror">
                        @error('id_buku_satuan')
                            <p class="text-sm text-red-500 ml-2">{{ $message }}</p>
                        @enderror
                        <button type="button" onclick="addRow()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ml-2 rounded">Add</button>
                    </div>
                    <div id="formContainer" class="gap-2 mt-2"></div>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-8 rounded">Submit</button>
                </div>
            </form>
            <p class="py-4">Press ESC key or click outside to close</p>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button class="bg-[#769FCD] text-black">Close</button>
        </form>
    </dialog>

    <script>
        let row = 1;
        document.getElementById("inp_row").value = row;
        function addRow() {
            var formContainer = document.getElementById("formContainer");
            var newRow = document.createElement("div");
            newRow.className = "flex items-center mb-4 justify-center";
            newRow.innerHTML = `
            <input type="text" id="id_buku_satuan" name="pinjam${row}[]" class="flex-grow px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                <button type="button" onclick="removeRow(this)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 ml-2 rounded">Remove</button>
            `;
            formContainer.appendChild(newRow);
            row++;
            document.getElementById("inp_row").value = row;
            }

        function removeRow(button) {
            var row = button.parentNode;
            row.parentNode.removeChild(row);
        }
        if (inputCount >= 4) {
            alert("You have reached the maximum limit of rows.");
            return;
        }
    </script> --}}

{{-- @endforeach --}}
{{-- End Modal nya --}}



@endsection