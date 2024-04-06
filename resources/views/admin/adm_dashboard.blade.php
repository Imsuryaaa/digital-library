@extends('layout/app')

@section('konten')
    <h1 class="text-5xl text-[#174E71] m-5">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- 4 card di bagian atas -->
        <div class="card bg-[#174E71] hover:scale-105 transition-transform cursor-pointer text-white shadow-md p-4 hover:bg-[#427909]">
            <p class="text-left text-sm font-bold mb-3">ALL BOOKS</p>
            <p class="text-left text-3xl font-bold">{{$buku}} <i class="bi bi-book-fill"></i></p>
        </div>
        <div class="card bg-[#174E71] hover:scale-105 transition-transform cursor-pointer text-white shadow-md p-4 hover:bg-[#A63F0F]">
            <p class="text-left text-sm font-bold mb-3">ALL AUTHORS</p>
            <p class="text-left text-3xl font-bold">{{$penulis}} <i class="bi bi-pen"></i></p>
        </div>
        <div class="card bg-[#174E71] hover:scale-105 transition-transform cursor-pointer text-white shadow-md p-4 hover:bg-[#427909]">
            <p class="text-left text-sm font-bold mb-3">Report</p>
           <p class="text-left text-3xl font-bold">{{$borrowed}} <i class="bi bi-envelope-paper"></i></p>
        </div>
        <div class="card bg-[#174E71] hover:scale-105 transition-transform cursor-pointer text-white shadow-md p-4 hover:bg-[#A63F0F]">
            <p class="text-left text-sm font-bold mb-3">ALL PUBLISHER</p>
            <p class="text-left text-3xl font-bold">{{$penerbit}} <i class="bi bi-building"></i></p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
        <!-- 2 card Yang besar di bagian bawah -->
        <div class="card big-card bg-[#F3F4F6] text-[#174E71] shadow-lg border" style="height: 250px">
            <h1 class="text-3xl m-3 text-center">Your Info</h1>
            <div class="flex flex-wrap -mx-2 mt-[15px]" style="font-size: 20px">
                <div class="w-full md:w-1/2 px-2 mb-4">
                    <label class="block font-bold">ID :</label>
                    <span>{{Auth::user()->id}}</span>
                </div>
                <div class="w-full md:w-1/2 px-2 mb-4">
                    <label class="block font-bold">Username :</label>
                    <span>{{ucfirst(Auth::user()->name)}}</span>
                </div>
                <div class="w-full md:w-1/2 px-2 mb-4">
                    <label class="block font-bold">Email :</label>
                    <span>{{Auth::user()->email}}</span>
                </div>
                <div class="w-full md:w-1/2 px-2 mb-4">
                    <label class="block font-bold">Level :</label>
                    <span>{{ucfirst(Auth::user()->level)}}</span>
                </div>
                <!-- tambahkan bagian lainnya di sini -->
            </div>
        </div>
        <div class="card big-card bg-[#F3F4F6] text-[#174E71] shadow-md border p-4">
            <h1 class="text-3xl mb-5 text-center">Master Data</h1>
            <div class="space-y-2">
                @if (Auth::user()->level == 'admin')
                <a href="/penulisAll" class="btn bg-[#174E71] transition-transform hover:scale-105 hover:bg-[#427909] hover:text-white text-white w-full"><i class="bi bi-pen"></i> Authors Data</a>
                @else
                <a href="/officer/penulisAll" class="btn bg-[#174E71] transition-transform hover:scale-105 hover:bg-[#427909] hover:text-white text-white w-full"><i class="bi bi-pen"></i> Authors Data</a>
                @endif
                @if (Auth::user()->level == 'admin')
                <a href="/penerbitAll" class="btn bg-[#174E71] hover:bg-[#A63F0F] transition-transform hover:scale-105 hover:text-white text-white w-full"><i class="bi bi-building"></i> Publisher Data</a>
                @else
                <a href="/officer/penerbitAll" class="btn bg-[#174E71] hover:bg-[#A63F0F] transition-transform hover:scale-105 hover:text-white text-white w-full"><i class="bi bi-building"></i> Publisher Data</a>
                @endif
                @if (Auth::user()->level == 'admin')
                <a href="/genreAll" class="btn bg-[#174E71] hover:bg-[#427909] transition-transform hover:scale-105 hover:text-white text-white w-full"><i class="bi bi-flower1"></i> Genre Data</a>
                @else
                <a href="/officer/genreAll" class="btn bg-[#174E71] hover:bg-[#427909] transition-transform hover:scale-105 hover:text-white text-white w-full"><i class="bi bi-flower1"></i> Genre Data</a>
                @endif
                @if (Auth::user()->level == 'admin')
                <a href="/bukuAll" class="btn bg-[#174E71] hover:bg-[#A63F0F] transition-transform hover:scale-105 hover:text-white text-white w-full"><i class="bi bi-book"></i> Data Books</a>
                @else
                <a href="/officer/bukuAll" class="btn bg-[#174E71] hover:bg-[#A63F0F] transition-transform hover:scale-105 hover:text-white text-white w-full"><i class="bi bi-book"></i> Data Books</a>
                @endif              
            </div>
        </div>
    </div>
@endsection
