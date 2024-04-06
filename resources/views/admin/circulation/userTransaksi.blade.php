@extends('layout/app')
@section('konten')
<h1 class="text-4xl mb-3">User Lending Transaction Page</h1>
{{-- Card 1 Transaksi --}}
    <div class="bg-gray-100 border border-gray-300 rounded-lg shadow-md mb-4">
        <div class="p-6">
            @if (Auth::user()->level == 'admin')
            <a href="/pilihUser" class="btn bg-[#A63F0F] hover:bg-[#174E71] text-white btn-sm"><i class="bi bi-arrow-90deg-left"></i> Back</a>    
            @else
            <a href="/officer/pilihUser" class="btn bg-[#A63F0F] hover:bg-[#174E71] text-white btn-sm"><i class="bi bi-arrow-90deg-left"></i> Back</a>
            @endif
            <h3 class="text-lg font-semibold mb-2">Transaction Confirmation / <span class="text-gray-700 text-opacity-50 inline-block">{{$userPeminjam->nama_lengkap}}</span></h3>
            <p class="mb-6">Before proceeding, please enter the return date first!</p>
            @if (Auth::user()->level == 'admin')
            <form action="/transaksiUser/{{$userPeminjam->id}}" method="POST">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        @csrf
                        <label for="nama" class="block mb-1">Full Name:</label>
                        <input type="text" id="nama" name="nama" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" disabled value="{{$userPeminjam->nama_lengkap}}">
                    </div>
                    <input type="hidden" name="tgl_peminjaman" value="{{date('Y-m-d')}}">
                    {{-- <input hidden type="text" name="row" id="inp_row"> --}}
                    <input hidden type="text" hidden name='id' value="{{$userPeminjam->id}}">
                    <div>
                        <label for="tanggal_pengembalian" class="block mb-1">Return Date :</label>
                        <div class="flex">
                            <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" class="flex-grow px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 @error('tanggal_pengembalian') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror">
                            {{-- Pesan error di bawah input tanggal_pengembalian --}}
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">Submit</button>
                        </div>
                        @error('tanggal_pengembalian')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </form>
            @else
            <form action="/officer/transaksiUser/{{$userPeminjam->id}}" method="POST">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        @csrf
                        <label for="nama" class="block mb-1">Full Name:</label>
                        <input type="text" id="nama" name="nama" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" disabled value="{{$userPeminjam->nama_lengkap}}">
                    </div>
                    <input type="hidden" name="tgl_peminjaman" value="{{date('Y-m-d')}}">
                    {{-- <input hidden type="text" name="row" id="inp_row"> --}}
                    <input hidden type="text" hidden name='id' value="{{$userPeminjam->id}}">
                    <div>
                        <label for="tanggal_pengembalian" class="block mb-1">Return Date :</label>
                        <div class="flex">
                            <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" class="flex-grow px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 @error('tanggal_pengembalian') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror">
                            {{-- Pesan error di bawah input tanggal_pengembalian --}}
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">Submit</button>
                        </div>
                        @error('tanggal_pengembalian')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </form>
            @endif
            
        </div>
    </div>
{{-- End Card 1 Transaksi --}}
{{-- Card 2 Tabel --}}
    <div class="w-full">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-4">
                <table class="w-full table mb-2">
                    <thead>
                        <tr class="text-center">
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Loan Date</th>
                            <th class="px-4 py-2">Return Date</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($tr_peminjaman))
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($tr_peminjaman as $item)
                                <tr class="text-center">
                                    <td class="border px-4 py-2">{{$i++}}</td>
                                    <td class="border px-4 py-2">{{$item->tgl_peminjaman}}</td>
                                    <td class="border px-4 py-2">{{$item->tgl_pengembalian}}</td>
                                    <td class="border px-4 py-2">
                                        <input hidden type="text" value="{{$item->id_peminjaman}}">
                                        @if ($item->status == 'belum')   
                                        @if (Auth::user()->level == 'admin')
                                        <a href="{{'/indexTransaksiBuku/' . $item->id . '/' .$item->id_peminjaman}}" class="btn bg-[#85c6ee] btn-xs text-black rounded-md hover:bg-[#5d98bc]">Process now!</a>
                                            
                                        @else
                                        <a href="{{'/officer/indexTransaksiBuku/' . $item->id . '/' .$item->id_peminjaman}}" class="btn bg-[#85c6ee] btn-xs text-black rounded-md hover:bg-[#5d98bc]">Process now!</a>        
                                        @endif
                                        @else
                                            <p class="font-bold text-green-400">DONE</p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="4" class="text-center">--- No data yet ---</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            {{$tr_peminjaman->links()}} 
            </div>
        </div>
    </div>
{{-- End Card 2 Tabel --}}


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