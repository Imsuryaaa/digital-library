@extends('layout/app')
@section('konten')
<h1 class="text-4xl mb-3">Lending Page</h1>
<hr class="mb-2">
<div class="min-h-screen overflow-y-auto">
    <div class="flex items-center justify-center">
        <div class="card w-96 bg-[#174E71] shadow-xl text-white">
            <div class="card-body">
                <p class="text-center text-sm font-bold mb-3">ALL USERS</p>
                <p class="text-center text-5xl font-bold">{{$userPeminjam}}</p>
            </div>
        </div>
    </div>
   
    <div class="overflow-x-auto mt-6">
        <!-- Input Search -->
        <div class="flex justify-end mb-4 mr-4">
            @if (Auth::user()->level == 'admin')
                
            <form action="{{ url('/pilihUser') }}" method="GET">
                <input type="text" id="bookId" placeholder="Search..." name="search" class="px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ml-2 rounded">Search</button>
            </form>
            @else
            <form action="{{ url('/officer/pilihUser') }}" method="GET">
                <input type="text" id="bookId" placeholder="Search..." name="search" class="px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ml-2 rounded">Search</button>
            </form>
            @endif
        </div>        

        <table class="table mb-2">
            <!-- head -->
            <thead>
                <tr class="text-[#F3F4F6] bg-[#174E71]">
                    <th>No</th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>User Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @if ($userPeminjamAll->isEmpty())
                    <tr>
                        <td class="text-center">Name Not Found</td>
                    </tr>
                @else
                    
                @php
                $i = 1;
                @endphp
                @foreach ($userPeminjamAll as $item)
                <tr>
                    <th>{{$i++}}</th>
                    <td>
                        {{$item->nama_lengkap}}
                    </td>
                    <td>
                        {{$item->no_telp}}
                    </td>
                    <td>
                        {{$item->alamat}}
                    </td>
                    <td>
                        {{$item->email}}
                    </td>
                    <th>
                        @if (Auth::user()->level == 'admin')
                        <a href="/transaksiUser/{{$item->id}}" class="btn btn-xs bg-[#427909] hover:bg-[#174E71] text-white">Go</a>
                        @else
                        <a href="/officer/transaksiUser/{{$item->id}}" class="btn btn-xs bg-[#427909] hover:bg-[#174E71] text-white">Go</a>
                        @endif
                        
                    </th>
                </tr>
                @endforeach
                @endif
            </tbody>
            <!-- foot -->
            <tfoot class="text-[#F3F4F6] bg-[#174E71]">
                <tr>
                    <th>No</th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>User Email</th>
                    <th>Action</th>
                </tr>
                </tr>
            </tfoot>
        </table>
        {{$userPeminjamAll->links()}}
    </div>
</div>

{{-- <script>
    function addCommaOnSpace(inputString) {
    // Memisahkan string menjadi array kata berdasarkan spasi
    var words = inputString.split(' ');

    // Menggabungkan kembali array kata menjadi satu string dengan menambahkan koma dan spasi setelah setiap kata
    var result = words.join(',');

    // Mengatur nilai hasil ke elemen input dengan id 'bookId'
    document.getElementById('bookId').value = result;
}
</script> --}}

@endsection