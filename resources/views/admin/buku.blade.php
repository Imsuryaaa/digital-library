@extends('layout/app')
@section('konten')

<div class="container mx-auto px-4 sm:px-8 max-w-3xl">
    <div class="py-8">
        <div class="bg-white rounded-lg shadow-lg p-6">
            @if (Auth::user()->level == 'admin')       
            <form action="/admin/buku" method="POST" enctype="multipart/form-data">
                @csrf
                <a href="/admin" class="bg-[#A63F0F] text-white font-bold py-2 px-4 rounded" type="button"><i class="bi bi-arrow-90deg-left"></i> Back</a>
                <h1 class="text-4xl font-semibold text-center uppercase">Add book form</h1>
                <div class="my-4 bg-black h-[1px] mb-9"></div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="namaBuku">Book Name :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline @error('namaBuku') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" value="{{old('namaBuku')}}" name="namaBuku" id="namaBuku" type="text" placeholder="Book Name">
                        @error('namaBuku')
                            <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="penulis">Author :</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline @error('namaPenulis') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" name="namaPenulis" id="penulis">
                            <option value="" hidden>--- Select Author ---</option>
                            @foreach ($listPenulis as $item)
                            <option {{old('namaPenulis' == $item) ? 'selected' : '' }} value="{{$item->id_penulis}}">
                                {{$item->namaPenulis}}
                            </option>
                        @endforeach
                        </select>
                        @error('namaPenulis')
                            <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                        @enderror
                    </div>
                </div>                
                <div class="flex flex-wrap -mx-3 mb-6">
                    <!-- Genre -->
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="genre">Genre :</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline @error('nama_genre') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" name="nama_genre" id="genre">
                            <option value="" hidden>--- Select Genre ---</option>
                            @foreach ($listGenre as $item)
                                <option value="{{$item->id_genre}}">
                                {{$item->nama_genre}}</option>
                            @endforeach
                        </select>
                        @error('nama_genre')
                            <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                        @enderror
                    </div>
                    <!-- Publisher -->
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="publisher">Publisher :</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline @error('nama_penerbit') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" name="nama_penerbit" id="publisher">
                            <option value="" hidden>--- Select Publisher ---</option>
                            @foreach ($listPenerbit as $item)
                                <option value="{{$item->id_penerbit}}">
                                    {{$item->nama_penerbit}}
                                </option>
                            @endforeach
                        </select>
                        @error('nama_penerbit')
                            <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="flex flex-wrap -mx-3 mb-6">
                    <!-- Year Published -->
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="yearPublished">Year Published :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline @error('thn_terbit') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" name="thn_terbit" id="yearPublished" type="number" value="{{old('thn_terbit')}}" placeholder="Year Published" min="1000" max="9999">
                        @error('thn_terbit')
                            <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                        @enderror
                    </div>
                    <!-- ISBN Code -->
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="isbn">ISBN Code :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline @error('kode_isbn') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" value="{{old('kode_isbn')}}" name="kode_isbn" id="isbn" type="text" placeholder="ISBN">
                        @error('kode_isbn')
                            <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="flex flex-wrap -mx-3 mb-6">
                    <!-- Book Pages -->
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="bookPages">Book Pages :</label>
                        <div class="relative">
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline @error('halaman') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" value="{{old('halaman')}}" name="halaman" id="bookPages" type="number" placeholder="Pages">
                            <span class="absolute inset-y-0 right-0 flex h-[39px] items-center px-2 text-[#174E71] bg-[#D6E6F2]">
                                Pages
                            </span>
                        </div>
                        @error('halaman')
                            <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                        @enderror
                    </div>
                    <!-- Cover -->
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="cover">Cover :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline @error('gambar_cover') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" name="gambar_cover" id="cover" type="file">
                            @error('gambar_cover')
                                <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                            @enderror
                    </div>       
                </div>
                
                <div class="flex flex-wrap -mx-3 mb-6">
                    <!-- Synopsis -->
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="synopsis">Synopsis :</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline resize-y @error('sinopsis') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" name="sinopsis" id="synopsis" placeholder="Synopsis" rows="4" style="max-height: 90px;">{{old('sinopsis')}}</textarea>
                        @error('sinopsis')
                            <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                        @enderror
                    </div>
                    <!-- Submit Button -->
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <button class="bg-[#427909] hover:bg-[#174E71] mt-7 text-white font-bold py-2 px-4 rounded w-full" type="submit">Submit</button>
                    </div>
                </div>
                
            </form>
            @else
            <form action="/officerTmbh/buku" method="POST" enctype="multipart/form-data">
                @csrf
                <a href="/petugas" class="bg-[#A63F0F] text-white font-bold py-2 px-4 rounded" type="button"><i class="bi bi-arrow-90deg-left"></i> Back</a>
                <h1 class="text-4xl font-semibold text-center uppercase">Add book form</h1>
                <div class="my-4 bg-black h-[1px] mb-9"></div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="namaBuku">Book Name :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline @error('namaBuku') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" value="{{old('namaBuku')}}" name="namaBuku" id="namaBuku" type="text" placeholder="Book Name">
                        @error('namaBuku')
                            <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="penulis">Author :</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline @error('namaPenulis') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" name="namaPenulis" id="penulis">
                            <option value="" hidden>--- Select Author ---</option>
                            @foreach ($listPenulis as $item)
                            <option {{old('namaPenulis' == $item) ? 'selected' : '' }} value="{{$item->id_penulis}}">
                                {{$item->namaPenulis}}
                            </option>
                        @endforeach
                        </select>
                        @error('namaPenulis')
                            <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                        @enderror
                    </div>
                </div>                
                <div class="flex flex-wrap -mx-3 mb-6">
                    <!-- Genre -->
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="genre">Genre :</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline @error('nama_genre') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" name="nama_genre" id="genre">
                            <option value="" hidden>--- Select Genre ---</option>
                            @foreach ($listGenre as $item)
                                <option value="{{$item->id_genre}}">
                                {{$item->nama_genre}}</option>
                            @endforeach
                        </select>
                        @error('nama_genre')
                            <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                        @enderror
                    </div>
                    <!-- Publisher -->
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="publisher">Publisher :</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline @error('nama_penerbit') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" name="nama_penerbit" id="publisher">
                            <option value="" hidden>--- Select Publisher ---</option>
                            @foreach ($listPenerbit as $item)
                                <option value="{{$item->id_penerbit}}">
                                    {{$item->nama_penerbit}}
                                </option>
                            @endforeach
                        </select>
                        @error('nama_penerbit')
                            <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="flex flex-wrap -mx-3 mb-6">
                    <!-- Year Published -->
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="yearPublished">Year Published :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline @error('thn_terbit') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" name="thn_terbit" id="yearPublished" type="number" value="{{old('thn_terbit')}}" placeholder="Year Published" min="1000" max="9999">
                        @error('thn_terbit')
                            <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                        @enderror
                    </div>
                    <!-- ISBN Code -->
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="isbn">ISBN Code :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline @error('kode_isbn') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" value="{{old('kode_isbn')}}" name="kode_isbn" id="isbn" type="text" placeholder="ISBN">
                        @error('kode_isbn')
                            <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="flex flex-wrap -mx-3 mb-6">
                    <!-- Book Pages -->
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="bookPages">Book Pages :</label>
                        <div class="relative">
                            <div>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline @error('halaman') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" value="{{old('halaman')}}" name="halaman" id="bookPages" type="number" placeholder="Pages">
                                <span class="absolute inset-y-0 right-0 flex h-[39px] items-center px-2 text-[#174E71] bg-[#D6E6F2]">
                                    Pages
                                </span>
                            </div>
                            @error('halaman')
                                <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- Cover -->
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="cover">Cover :</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline @error('gambar_cover') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" name="gambar_cover" id="cover" type="file">
                            @error('gambar_cover')
                                <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                            @enderror
                    </div>       
                </div>
                
                <div class="flex flex-wrap -mx-3 mb-6">
                    <!-- Synopsis -->
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-[#174E71] text-sm font-bold mb-2" for="synopsis">Synopsis :</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-[#174E71] leading-tight focus:outline-none focus:shadow-outline resize-y @error('sinopsis') bg-[#E29B7A] border-[#A63F0F] text-[#174E71] @endError" name="sinopsis" id="synopsis" placeholder="Synopsis" rows="4" style="max-height: 90px;">{{old('sinopsis')}}</textarea>
                        @error('sinopsis')
                            <p class="text-sm text-[#A63F0F]">{{$message}}</p>
                        @enderror
                    </div>
                    <!-- Submit Button -->
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <button class="bg-[#427909] hover:bg-[#174E71] mt-7 text-white font-bold py-2 px-4 rounded w-full" type="submit">Submit</button>
                    </div>
                </div>
                
            </form>
            @endif
            
        </div>
    </div>
</div>
@endsection