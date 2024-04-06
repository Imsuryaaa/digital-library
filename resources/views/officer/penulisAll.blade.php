@extends('layout/app')
@section('konten')
<div class="min-h-screen overflow-y-auto">
    <div class="flex items-center justify-center">
        <div class="card w-96 bg-[#B9D7EA] shadow-xl text-black">
            <div class="card-body">
                <p class="text-center text-xl font-bold mb-3">ALL AUTHORS</p>
                <p class="text-center font-bold">{{$penulis}}</p>
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
                    <th>Authors Name</th>
                    <th>Authors Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($penulisAll) > 0)
                <!-- row 1 -->
                @php
                $i = 1;
                @endphp
                @foreach ($penulisAll as $item)
                <tr>
                    <th>{{$i++}}</th>
                    <td>
                        {{$item->namaPenulis}}
                    </td>
                    <td>{{$item->emailPenulis}}</td>
                    <th>
                        <button class="btn btn-secondary btn-xs bg-gray-600 hover:bg-gray-700">Edit</button>
                        <button class="btn btn-secondary btn-xs bg-gray-600 hover:bg-gray-700">Delete</button>
                    </th>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center">Belum ada data</td>
                </tr>
            @endif
            
            </tbody>
            <!-- foot -->
            <tfoot class="text-black bg-[#B9D7EA]">
                <tr>
                    <th>No</th>
                    <th>Authors Name</th>
                    <th>Authors Email</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
        {{$penulisAll->links()}} 
    </div>
</div>
@endsection
