@extends('layout/app')
@section('konten')
<div class="min-h-screen overflow-y-auto">
    <div class="flex items-center justify-center">
        <div class="card w-4/12 h-40 bg-[#174E71] shadow-xl text-white">
            <div class="card-body">
                <p class="text-center text-sm font-bold mb-2">ALL AUTHORS</p>             
                <p class="text-center text-4xl font-bold">{{$penulis}} <i class="bi bi-pen"></i></p>
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
                    <th>Authors Name</th>
                    <th>Authors Email</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#D6E6F2]">
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
                    
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center">Belum ada data</td>
                </tr>
            @endif
            
            </tbody>
            <!-- foot -->
            <tfoot class="text-[#F3F4F6] bg-[#174E71]">
                <tr>
                    <th>No</th>
                    <th>Authors Name</th>
                    <th>Authors Email</th>
                </tr>
            </tfoot>
        </table>
        {{$penulisAll->links()}} 
    </div>
</div>
@endsection
