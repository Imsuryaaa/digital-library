@extends('layout/app')
@section('konten')
<h1 class="text-4xl mb-3">Transaction validation zone</h1>
<div class="bg-gray-100 border border-gray-300 rounded-lg shadow-md mb-4">
    <div class="p-6">
        @if (Auth::user()->level == 'admin')
        <form action="/transaksiUser/create/{{$userPeminjam->id}}" method="POST">
            @csrf
            
            <input  type="text" hidden name="id" value="{{$userPeminjam->id}}">
            <input  type="text" hidden name="id_peminjaman" value="{{$tr_peminjaman2->id_peminjaman}}">
            {{-- <input hidden type="text" name="status" value="1"> --}}
            <input hidden type="text" name="row" id="inp_row">
            {{-- <label for="">id_peminjaman</label> --}}
            <input name='id_peminjaman' hidden value="{{$tr_peminjaman2->id_peminjaman}}">
            <div class="mb-4">
                <label for="id_buku_satuan" class="block mb-1">Unit Book :</label>
                <div class="flex items-center">
                    <input type="text" id="id_buku_satuan" name="pinjam0[]" class="flex-grow px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 @error('pinjam0.*') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror" value="{{old('pinjam0[0]')}}">
                    <button type="button" onclick="addRow()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ml-2 rounded">Add</button>
                </div>
                @error('pinjam0.*')
                    <p class="text-sm text-red-500 ml-2">{{ $message }}</p>
                @enderror
                <div id="formContainer" class="gap-2 mt-2"></div>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-8 rounded">Submit</button>
            </div>
        </form>
        @else
        <form action="/officer/transaksiUser/create/{{$userPeminjam->id}}" method="POST">
            @csrf
            <input  type="text" hidden name="id" value="{{$userPeminjam->id}}">
            <input  type="text" hidden name="id_peminjaman" value="{{$tr_peminjaman2->id_peminjaman}}">
            {{-- <input hidden type="text" name="status" value="1"> --}}
            <input hidden type="text" hidden name="row" id="inp_row">
            {{-- <label for="">id_peminjaman</label> --}}
            <div class="mb-4">
                <label for="id_buku_satuan" class="block mb-1">Unit Book :</label>
                <div class="flex items-center">
                    <input type="text" id="id_buku_satuan" name="pinjam0[]" class="flex-grow px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 @error('pinjam0.*') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror" value="{{old('pinjam0[0]')}}">
                    <button type="button" onclick="addRow()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ml-2 rounded">Add</button>
                </div>
                @error('pinjam0.*')
                    <p class="text-sm text-red-500 ml-2">{{ $message }}</p>
                @enderror
                <div id="formContainer" class="gap-2 mt-2"></div>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-8 rounded">Submit</button>
            </div>
        </form>
        @endif
            
    </div>
</div>
<script>
    let row = 1;
    document.getElementById("inp_row").value = row;
    function addRow() {

    var formContainer = document.getElementById("formContainer");
    var newRow = document.createElement("div");
    newRow.className = "flex items-center mb-4 justify-center";
    newRow.innerHTML = `
        <input type="text" id="id_buku_satuan${row}" name="pinjam${row}[]" class="flex-grow px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
        <button type="button" onclick="removeRow(this)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 ml-2 rounded">Remove</button>
        <p id="error-message${row}" class="text-sm text-red-500 ml-2 hidden">Unit Book harus diisi.</p>
    `;
    formContainer.appendChild(newRow);
    row++;
    document.getElementById("inp_row").value = row;

}


    function removeRow(button) {
        var row = button.parentNode;
        row.parentNode.removeChild(row);
    }

</script>
@endsection