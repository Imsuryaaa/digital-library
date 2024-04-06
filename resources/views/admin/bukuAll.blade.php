@extends('layout/app')
@section('konten')
<div class="min-h-screen overflow-y-auto">
    <div class="flex items-center justify-center">
        <div class="card w-4/12 h-40 bg-[#174E71] shadow-xl text-white">
            <div class="card-body">
                <p class="text-center text-sm font-bold mb-2">ALL BOOKS</p>
                <p class="text-center text-4xl font-bold">{{$buku}} <i class="bi bi-book-fill"></i></p>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto mt-8">
        @if (Auth::user()->level == 'admin')       
            <a href="/admin" class="bg-[#A63F0F] btn btn-sm hover:bg-[#174E71] text-white font-bold py-2 px-4 rounded" type="button"><i class="bi bi-arrow-90deg-left"></i> Back</a>
        @else
            <a href="/petugas" class="bg-[#A63F0F] btn btn-sm hover:bg-[#174E71] text-white font-bold py-2 px-4 rounded" type="button"><i class="bi bi-arrow-90deg-left"></i> Back</a>
        @endif
        <div class="flex justify-end mb-4 mr-4">
            
            @if (Auth::user()->level == 'admin')
            <form action="{{ url('/bukuAll') }}" method="GET">
                <input type="text" id="bookId" placeholder="Search..." name="search" class="px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ml-2 rounded">Search
                </button>
            </form>
            @else
            <form action="{{ url('/officer/bukuAll') }}" method="GET">
                <input type="text" id="bookId" placeholder="Search..." name="search" class="px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ml-2 rounded">Search
                </button>
            </form>
            @endif
        </div>

        <table class="table mb-2">
            <!-- head -->
            <thead>
                <tr class="text-[#F3F4F6] bg-[#174E71]">
                    <th>No</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#D6E6F2]">
                <!-- row 1 -->
                @if (count($results))
                @php
                $i = 1;
                @endphp
                @foreach ($results as $item)
                <tr>
                    <th>{{$i++}}</th>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="mask mask-squircle w-12 h-12">
                                    <img src="{{asset('cover/'.$item->gambar_cover)}}"
                                        alt="Ngeheheheh"/>
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">{{$item->nama_buku}}</div>
                                <div class="text-sm opacity-50">{{$item->genre->nama_genre}}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{$item->penulis->namaPenulis}}
                    </td>
                    <td>{{$item->penerbit->nama_penerbit}}</td>
                    <th>
                        <button class="btn btn-xs bg-[#427909] hover:bg-[#174E71] text-white"
                        onclick="myModal{{$item->id_buku}}.showModal()">Unit Books</button>
                        {{-- <button class="btn btn-xs  bg-[#A63F0F] hover:bg-[#427909] text-white" onclick="my_modal_detail.showModal()">details</button> --}}
                        @if (Auth::user()->level == 'admin')    
                        <form action="/details/{{$item->id_buku}}" class="inline-block" method="GET">
                            <button class="btn btn-xs  bg-[#A63F0F] hover:bg-[#427909] text-white">
                                Details
                            </button>
                        </form>
                        @else
                        <form action="/officer/details/{{$item->id_buku}}" class="inline-block" method="GET">
                            <button class="btn btn-xs  bg-[#A63F0F] hover:bg-[#427909] text-white">
                                Details
                            </button>
                        </form>
                        @endif
                    </th>
                </tr>
                @endforeach
                @else
                    <td class="text-center">
                        --- Book not found! --- 
                    </td>
                @endif
                
            </tbody>
            <!-- foot -->
            <tfoot class="text-[#F3F4F6] bg-[#174E71]">
                <tr>
                    <th>No</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
        {{$results->links()}} 
    </div>
    {{-- Modal (Buku Satuan) --}}
    @foreach ($results as $item)
    <dialog id="myModal{{$item->id_buku}}" class="modal">
        <div class="modal-box bg-[#174E71] text-black">
            {{-- <p>{{$item->id_buku}}</p> --}}
            <h3 class="font-bold text-lg text-white">Increase Number of books</h3>
            @if (Auth::user()->level == 'admin')
            <form action="/admin/bukuSatuan" method="post">
                @csrf
                <label for="jml_buku" class="bloc mt-2 text-sm">Input Number of Books :</label>
                <input type="hidden" name="id_buku" value="{{$item->id_buku}}">
                <input id="jml_buku" name="jml_buku" type="number"
                    class="w-full p-2 mt-1 text-black border rounded-md bg-gray-100 @error('jml_buku') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror"
                    placeholder="Enter Number of books">
                    @error('jml_buku')
                        <p class="text-sm text-red-500 ml-2">{{ $message }}</p>
                    @enderror
                <button type="submit" class="mt-4 px-4 py-2 bg-[#427909] text-[#F3F4F6] rounded-md hover:bg-[#A63F0F]">Add</button>
            </form>
            @else
            <form action="/officerTmbh/bukuSatuan" method="post">
                @csrf
                <label for="jml_buku" class="block mt-2 text-sm">Input Number of Books :</label>
                <input type="hidden" name="id_buku" value="{{$item->id_buku}}">
                <input id="jml_buku" name="jml_buku" type="number"
                    class="w-full p-2 mt-1  border rounded-md bg-gray-100 @error('jml_buku') bg-red-100 border-t border-b border-red-500  text-red-700 @enderror"
                    placeholder="Enter Number of books">
                    @error('jml_buku')
                        <p class="text-sm text-red-500 ml-2">{{ $message }}</p>
                    @enderror
                <button type="submit" class="mt-4 px-4 py-2 bg-[#427909] text-[#F3F4F6] rounded-md hover:bg-[#A63F0F]">Add</button>
            </form>
            @endif
            
            <p class="py-4 text-white" >Press ESC key or click outside to close</p>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button class="text-white">close</button>
        </form>
    </dialog>
    @endforeach
    {{-- End --}}

    {{-- Modal Details --}}
    <dialog id="my_modal_detail" class="modal">
        <div class="modal-box w-11/12 max-w-5xl flex">
            <!-- Gambar buku (sebelah kiri) -->
            <img src="{{asset('cover/240218035816.jpg')}}" alt="Book Cover" class="w-1/2 h-auto rounded-lg">

    
            <!-- Informasi buku (sebelah kanan) -->
            <div class="w-1/2 p-6">
                <h3 class="font-bold text-center text-5xl">JUJUTSU KAISEN VOL 8</h3>
                <hr class="my-2 bg-[#174E71] h-[2]px]">
                <div>
                    <label for="" class="text-gray-600  text-2xl">
                        Author: <p id="" class="inline-block"> Author Name</p>
                    </label>
                </div>
                <div>
                    <label for="" class="text-gray-600  text-2xl">
                        Genre: <p id="" class="inline-block"> Genre Name</p>
                    </label>
                </div>
                <div>
                    <label for="" class="text-gray-600  text-2xl">
                        Publisher: <p id="" class="inline-block"> Publisher Name</p>
                    </label>
                </div>
                <div>
                    <label for="" class="text-gray-600  text-2xl">
                        Pages: <p id="" class="inline-block"> Number Of Pages</p>
                    </label>            
                </div>
                <div>
                    <label for="" class="text-gray-600  text-2xl">
                        Year Published: <p id="" class="inline-block"> When? </p>
                    </label>
                </div>
                <div>
                    <label for="" class="text-gray-600  text-2xl">
                        ISBN Code: <p id="" class="inline-block"> ex.112223344 </p>
                    </label>
                </div>
                <div>
                    <label for="" class="text-gray-600 text-2xl">
                        Synopsis: 
                        <p id="" class="inline-block overflow-ellipsis overflow-hidden whitespace-nowrap max-w-xs"> 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ullam aperiam fugit inventore unde labore debitis illo dolores sunt exercitationem. Aliquid iure ad ipsum rerum a nobis eligendi autem voluptates! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore eaque explicabo repudiandae! Natus assumenda eos reprehenderit nisi veniam! Id, consequatur. Officiis harum rerum, eius officia nam a! Quidem, velit perspiciatis! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id dolorum quia molestias? Ea magnam nobis ipsum fuga praesentium quo qui fugit, sunt, placeat rerum iste officiis aut temporibus asperiores. Deserunt.
                        </p>
                    </label>
                </div>
  
                <!-- Tombol untuk menutup modal -->
                <div class="modal-action mt-6">
                    <form method="dialog">
                        <button class="btn">Tutup</button>
                    </form>
                </div>
            </div>
        </div>
    </dialog>
    
    {{-- End --}}
</div>
@endsection
