@extends('layout/app')

@section('konten')

<div class="bg-white p-6 rounded-lg shadow-md">
    @if (Auth::user()->level == 'admin')
    <a href="/bukuAll" class="bg-[#A63F0F] btn btn-sm hover:bg-[#174E71] text-white font-bold py-2 px-4 rounded" type="button"><i class="bi bi-arrow-90deg-left"></i> Back</a>
    @else
    <a href="/officer/bukuAll" class="bg-[#A63F0F] btn btn-sm hover:bg-[#174E71] text-white font-bold py-2 px-4 rounded" type="button"><i class="bi bi-arrow-90deg-left"></i> Back</a>
    @endif

    <div class="flex flex-row items-start space-x-4 mt-3">
        <img src="{{asset('cover/'. $data[0]->gambar_cover)}}" alt="Book Cover" class="w-48 h-72 shadow-md rounded-lg sticky top-6">
        <div class="flex-1">
            <h1 class="text-xl font-semibold">{{$data[0]->nama_buku}}</h1>
            <p class="text-gray-600">By {{$data[0]->namaPenulis}}</p>
            <div class="mt-6">
                <ul class="flex space-x-4">
                    <li class="ml-4">
                        <a href="#deskripsi" class="text-gray-500">Book Description</a>
                    </li>
                    <li class="ml-4">
                        <a href="#detail" class="text-gray-500">Book Details</a>
                    </li>
                </ul>
                <hr>
            </div>
            <div class="mt-6">
                <p id="deskripsi" class="text-lg font-semibold">Book Description</p>
                <div id="truncatedContent" class="whitespace-pre-line"><p class="text-gray-700">{{$data[0]->sinopsis}}</p></div>
                <div class="text-end">
                    <a class="text-[#174E71] text-end font-semibold" href="#" id="readMore">Read More</a>
                </div>
            </div>
            <div class="mt-6">
                <p id="detail" class="text-lg font-semibold">Book Details</p>
                <div class="mt-2">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-600 font-semibold">Number of pages</p>
                            <p class="text-gray-800">{{$data[0]->halaman}}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 font-semibold">Year Published</p>
                            <p class="text-gray-800">{{$data[0]->thn_terbit}}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 font-semibold">Code ISBN</p>
                            <p class="text-gray-800">{{$data[0]->kode_isbn}}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 font-semibold">Publisher</p>
                            <p class="text-gray-800">{{$data[0]->nama_penerbit}}</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>    
</div>

<script>
$(document).ready(function () {
    var truncatedContent = $('#truncatedContent');
    var originalText = truncatedContent.text();
    var maxLength = 600;
    var isExpanded = false;
    var truncatedText = $.trim(originalText).substring(0, maxLength) + '...';

    if (originalText.length > maxLength) {
        truncatedContent.text(truncatedText);
        $('#readMore').show();

        $('#readMore').on('click', function (e) {
            e.preventDefault();
            if (isExpanded) {
                truncatedContent.text(truncatedText);
                $(this).text('Read More');
            } 
            else { 
                truncatedContent.text(originalText);
                $(this).text('Close');
            } 
            isExpanded = !isExpanded;
        });
    } else {
        $('#readMore').hide();
    }
});
</script>
@endsection

