@extends('layout/app')
@section('konten')
<div class="min-h-screen overflow-y-auto">
    <div class="flex items-center justify-center">
        <div class="card w-96 bg-[#B9D7EA] shadow-xl text-black">
            <div class="card-body">
                <p class="text-center text-xl font-bold mb-3">ALL PUBLISHERS</p>
                <p class="text-center font-bold">{{$penerbit}}</p>
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
                    <th>Publishers Name</th>
                    <th>Publishers Email</th>
                    <th>Publishers Phone</th>
                    <th>Publishers Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @php
                $i = 1;
                @endphp
                @foreach ($penerbitAll as $item)
                <tr>
                    <th>{{$i++}}</th>
                    <td>
                        {{$item->nama_penerbit}}
                    </td>
                    <td>{{$item->email_penerbit}}</td>
                    <td>{{$item->no_telp_penerbit}}</td>
                    <td>{{$item->alamat_penerbit}}</td>
                    <th>
                        <button class="btn btn-secondary btn-xs bg-gray-600 hover:bg-gray-700">Edit</button>
                        <button class="btn btn-secondary btn-xs bg-gray-600 hover:bg-gray-700">Delete</button>
                    </th>
                </tr>
                @endforeach
            </tbody>
            <!-- foot -->
            <tfoot class="text-black bg-[#B9D7EA]">
                <tr>
                    <th>No</th>
                    <th>Publishers Name</th>
                    <th>Publishers Email</th>
                    <th>Publishers Phone</th>
                    <th>Publishers Address</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
        {{$penerbitAll->links()}} 
    </div>
</div>
@endsection
