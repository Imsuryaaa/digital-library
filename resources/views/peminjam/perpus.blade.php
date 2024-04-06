<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library App</title>
    <link rel="icon" href="{{asset('img/logo.png')}}">
    @vite('./resources/css/app.css')
</head>

<body class="bg-[#F7FBFC] font-sans">
    <!-- Navbar -->
    <nav class="bg-[#D6E6F2] p-4 sticky top-0">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-[#769FCD]">Library App</h1>
            <ul class="flex space-x-4">
                <li><a href="#" class="text-[#769FCD] hover:text-[#B9D7EA]">Home</a></li>
                <li><a href="#" class="text-[#769FCD] hover:text-[#B9D7EA]">Books</a></li>
                <li><a href="#" class="text-[#769FCD] hover:text-[#B9D7EA]">Authors</a></li>
                <li><a href="#" class="text-[#769FCD] hover:text-[#B9D7EA]">Contact</a></li>
                <li><a href="logout" class="text-[#769FCD] hover:text-[#B9D7EA]">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    

<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-1.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-2.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-3.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-4.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-5.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>


    <!-- Featured Books Section -->
    <section class="py-16 bg-[#B9D7EA]">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center">Featured Books</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-2">
                <!-- Book Card -->
                @foreach ($bukuAll as $item)      
                <div class="bg-white shadow-md rounded-lg p-6 flex justify-center items-center">
                    <div class="text-center">
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
    <footer class="bg-[#769FCD] text-white py-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Library App. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
