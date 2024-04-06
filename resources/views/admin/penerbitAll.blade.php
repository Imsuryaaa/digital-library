@extends('layout/app')
@section('konten')
<div class="min-h-screen overflow-y-auto">
    <div class="flex items-center justify-center">
        <div class="card w-96 bg-[#174E71] shadow-xl text-white">
            <div class="card-body">
                <p class="text-center text-sm font-bold mb-2">ALL PUBLISHERS</p>
                <p class="text-center text-4xl font-bold">{{$penerbit}} <i class="bi bi-building"></i></p>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto mt-8">
        @if (Auth::user()->level == 'admin')       
            <a href="/admin" class="bg-[#A63F0F] btn btn-sm hover:bg-[#174E71] mb-2 text-white font-bold py-2 px-4 rounded" type="button"><i class="bi bi-arrow-90deg-left"></i> Back</a>
        @else
            <a href="/petugas" class="bg-[#A63F0F] btn btn-sm hover:bg-[#174E71] mb-2 text-white font-bold py-2 px-4 rounded" type="button"><i class="bi bi-arrow-90deg-left"></i> Back</a>
        @endif
        <table class="table text-center mb-2">
            <!-- head -->
            <thead>
                <tr class="text-[#F3F4F6] bg-[#174E71]">
                    <th>No</th>
                    <th>Publishers Name</th>
                    <th>Publishers Email</th>
                    <th>Publishers Phone</th>
                    <th>Publishers Address</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#D6E6F2]">
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
                </tr>
                @endforeach
            </tbody>
            <!-- foot -->
            <tfoot class="text-[#F3F4F6] bg-[#174E71]">
                <tr>
                    <th>No</th>
                    <th>Publishers Name</th>
                    <th>Publishers Email</th>
                    <th>Publishers Phone</th>
                    <th>Publishers Address</th>
                </tr>
            </tfoot>
        </table>
        {{$penerbitAll->links()}} 
    </div>
</div>
@endsection
