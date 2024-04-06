@extends('layout/app')
@section('konten')
<h1 class="text-4xl mb-3">Transaction validation zone</h1>
<div class="bg-gray-100 border border-gray-300 rounded-lg shadow-md mb-4">
    <div class="p-6">
            <form action="/transaksiUser/create/{{$tr_peminjaman2->id_peminjaman}}" method="POST">
                @csrf
                <input hidden type="text" name="id" value="{{$userPeminjam->id}}">
                {{-- <input hidden type="text" name="status" value="1"> --}}
                <input hidden type="text" name="row" id="inp_row">
                <label for="">id_peminjaman</label>
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


    // function getSiswa() {
    // var kelas_id = $('#kelasSelect').val();

    // $.ajax({
    //     url: '/get-siswa',
    //     type: 'GET',
    //     data: {kelas_id: kelas_id},
    //     success: function(data) {
    //         var siswaSelect = $('#siswaSelect');
    //         siswaSelect.empty();

    //         $.each(data, function(key, value) {
    //             siswaSelect.append('<option class="py-2 px-4 hover:bg-gray-300" value="' + value.id + '">' + value.nama_siswa + '</option>');
    //         });

    //         // Enable siswaSelect after options are loaded
    //         siswaSelect.prop('disabled', false);
    //     }
    // });
    // }

</script>
@endsection