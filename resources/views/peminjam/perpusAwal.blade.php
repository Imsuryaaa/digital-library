<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library App</title>
    <link rel="icon" href="{{asset('img/logo.png')}}">
    @vite('./resources/css/app.css')
</head>

<body class="bg-[#174E71] font-sans">
    <!-- Navbar -->
    <nav class="bg-[#F3F4F6] p-5 sticky top-0" >
        <div class="container mx-auto flex justify-between items-center">
            <img class="w-12" src="{{asset('img/logo.png')}}" alt="">
            <p class="text-2xl font-bold text-[#174E71]">Library App</p>
            <ul class="flex space-x-4">
                <li><a href="#" class="text-[#174E71] font-bold hover:text-[#B9D7EA]">Home</a></li>
                <li><a href="/login" class="text-[#174E71] font-bold hover:text-[#B9D7EA]">Login</a></li>
            </ul>
        </div>
    </nav>
    

    <!-- Hero Section -->
    <section class="py-20 text-white bg-cover bg-center relative" style="background-image: url('{{ asset('img/perpus.jpg') }}'); filter: brightness(70%);">
        <div class="container mx-auto text-center relative z-50">
            <h1 class="text-4xl font-bold mb-4 " >Welcome to Digital Library</h1>
            <p class="text-lg">Explore our extensive collection of books and authors</p>
            <form action="/login">
                @csrf
                <button class="btn bg-[#174E71] text-[#F7FBFC] px-6 py-2 mt-6 rounded-lg hover:bg-[#A63F0F] hover:text-[#F7FBFC]">Getting Started</button>
            </form>
        </div>
        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-50"></div>
    </section>
    
    <!-- Featured Books Section -->
    <section class="py-16 bg-[#174E71]">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold text-[#F3F4F6] mb-6 text-center">Featured Books</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-2">
                <!-- Book Card -->
                @foreach ($bukuAll as $item)      
                <div class="bg-[#F3F4F6] shadow-md rounded-lg p-6 flex justify-center items-center">
                    <div class="text-center text-[#174E71]">
                        <img src="{{asset('cover/'.$item->gambar_cover)}}" alt="Book Cover" class="mb-4 mx-auto">
                        <h3 class="text-lg font-bold">{{$item->nama_buku}}</h3>
                        <p class="text-sm text-gray-600">{{$item->penulis->namaPenulis}}</p>
                    </div>
                </div>
                @endforeach
                <!-- Repeat for other featured books -->
            </div>
            {{$bukuAll->links()}} 
        </div>

    </section>

    <!-- Footer -->
    <footer class="bg-[#F3F4F6] text-[#174E71] py-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Library App. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
