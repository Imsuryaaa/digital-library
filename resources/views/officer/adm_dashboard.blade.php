@extends('layout/app')
@section('konten')
    <h1 class="text-5xl m-5">Dashboard</h1>
    {{-- Card ATAS 4 Biji --}}
   {{-- Card ATAS 4 Biji --}}
   <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <!-- 4 card di bagian atas -->
    <div class="card bg-[#B9D7EA] text-[#253149] shadow-md"> <!-- LightBlue color -->
        <p class="text-center text-2xl font-bold mb-3">ALL BOOKS</p>
        <p class="text-center font-bold">{{$buku}}</p>
    </div>
    <div class="card bg-[#B9D7EA] text-[#253149] shadow-md"> <!-- LightBlue color -->
        <p class="text-center text-2xl font-bold mb-3">ALL AUTHORS</p>
        <p class="text-center font-bold">{{$penulis}}</p>
    </div>
    <div class="card bg-[#B9D7EA] text-[#253149] shadow-md"> <!-- LightBlue color -->
        <p class="text-center text-2xl font-bold mb-3">BORROWED</p>
        <p class="text-center font-bold">0</p>
    </div>
    <div class="card bg-[#B9D7EA] text-[#253149] shadow-md"> <!-- LightBlue color -->
        <p class="text-center text-2xl font-bold mb-3">ALL PUBLISHER</p>
        <p class="text-center font-bold">{{$penerbit}}</p>
    </div>
</div>
{{-- End Card ATAS 4 Biji --}}

{{-- Card 2 Biji Besar --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
    <!-- 2 card Yang besar di bagian bawah -->
    <div class="card big-card bg-[#B9D7EA] text-[#253149] shadow-md" style="height: 350px">
        <h1 class="text-3xl m-3 text-center">Your Info</h1>
        <div class="flex flex-wrap -mx-2 mt-[15px]">
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
    <div class="card big-card bg-[#B9D7EA] text-[#253149] shadow-md p-4" style="height: 320px">
        <h1 class="text-3xl mt-2 mb-5 text-center">Master Data</h1>
        <div class="space-y-2 flex flex-col">
            <a href="/penulisAll" class="btn bg-[#D6E6F2] text-[#253149] w-full"><i class="bi bi-pen"></i> Authors Data</a>
            <a href="/penerbitAll" class="btn bg-[#D6E6F2] text-[#253149] w-full"><i class="bi bi-building"></i> Publisher Data</a>
            <a href="/genreAll" class="btn bg-[#D6E6F2] text-[#253149] w-full"><i class="bi bi-flower1"></i> Genre Data</a>
            <a href="/bukuAll" class="btn bg-[#D6E6F2] text-[#253149] w-full"><i class="bi bi-book"></i> Data Books</a>
        </div>
    </div>
</div>
    {{-- End Card 2 Biji Besar --}}
@endsection
