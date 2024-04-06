{{-- Awal Sidebar --}}

    <div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-[#F7FBFC]">
    <div class="text-white text-xl">
        <div class="p-2.5 mt-1 flex items-center">
            <i class="bi bi-app-indicator px-2 py-1 rounded-md bg-[#174E71]"></i>
            <h1 class="font-bold text-[#174E71] text-[15px] ml-3">Digital Library</h1>
        </div>
        <div class="my-2 bg-[#174E71] h-[1]px]"></div>
    </div>
    @if (Auth::user()->level == 'admin')
    <a href="/admin">
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-[#174E71] text-[#146274] hover:text-[#F7FBFC] {{ request()->is('admin*') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#146274] text-[#146274] hover:text-[#146274]' }}">
            <i class="bi bi-house-door-fill"></i>
            <span class="text-[15px] ml-4  font-bold">Home</span>
        </div>
    </a>
    @else
    <a href="/petugas">
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-[#174E71] text-[#146274] hover:text-[#F7FBFC] {{ request()->is('petugas*') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#174E71] text-[#146274] hover:text-[#146274]' }}">
            <i class="bi bi-house-door-fill"></i>
            <span class="text-[15px] ml-4  font-bold">Home</span>
        </div>
    </a>
    @endif
    @if (Auth::user()->level == 'admin')
    <a href="/report">
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-[#174E71] text-[#146274] hover:text-[#F7FBFC] {{ request()->is('report*') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#146274] text-[#146274] hover:text-[#146274]' }}">
           <i class="bi bi-envelope-paper"></i>
            <span class="text-[15px] ml-4  font-bold">Report</span>
        </div>
    </a>
    @else
    <a href="/officer/report">
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-[#174E71] text-[#146274] hover:text-[#F7FBFC] {{ request()->is('officer/report*') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#174E71] text-[#146274] hover:text-[#146274]' }}">
           <i class="bi bi-envelope-paper"></i>
            <span class="text-[15px] ml-4  font-bold">Report</span>
        </div>
    </a>
    @endif

    <div class="my-4 bg-[#174E71] h-[1px]"></div>
        {{-- Menu 1 Master Data --}}
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer {{ request()->is('bukuAll', 'officer/bukuAll', 'penulisAll','officer/penulisAll', 'penerbitAll','officer/penerbitAll', 'genreAll','officer/genreAll') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#174E71] text-[#146274] hover:text-[#146274]' }} hover:bg-[#174E71] text-[#146274] hover:text-[#F7FBFC]" onclick="dropdown()">
                <i class="bi bi-bar-chart-line"></i>    
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 font-bold">Master Data</span>
                <span class="text-sm rotate-180" id="arrow">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </div>
            </div>
            <div class="text-left text-sm mt-2 w-4/5 mx-auto text-white font-bold" id="submenu">
                @if (Auth::user()->level == 'admin')
                <a href="/bukuAll" class="selected">
                    <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#174E71] rounded-md mt-1 {{ request()->is('bukuAll*') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#146274] text-[#146274] hover:text-[#ffffff]' }}">
                        <i class="bi bi-book-fill"></i> Data Books
                    </h1>
                </a>
                @else
                <a href="/officer/bukuAll" class="selected">
                    <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#174E71] rounded-md mt-1 {{ request()->is('officer/bukuAll') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#174E71] text-[#146274] hover:text-[#ffffff]' }}">
                        <i class="bi bi-book-fill"></i> Data Books
                    </h1>
                </a>
                @endif
                @if (Auth::user()->level == 'admin')
                <a href="/penulisAll">
                    <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#146274] rounded-md mt-1 {{ request()->is('penulisAll') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#146274] text-[#146274] hover:text-[#ffffff]' }}">
                        <i class="bi bi-pen"></i> Authors Data
                    </h1>
                </a>
                @else
                <a href="/officer/penulisAll">
                    <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#146274] rounded-md mt-1 {{ request()->is('officer/penulisAll') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#174E71] text-[#146274] hover:text-[#ffffff]' }}">
                        <i class="bi bi-pen"></i> Authors Data
                    </h1>
                </a>
                @endif
                @if (Auth::user()->level == 'admin')
                <a href="/penerbitAll">
                    <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#146274] rounded-md mt-1 {{ request()->is('penerbitAll') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#146274] text-[#146274] hover:text-[#ffffff]' }}">
                        <i class="bi bi-building"></i> Publisher Data
                    </h1>
                </a>
                @else
                <a href="/officer/penerbitAll">
                    <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#146274] rounded-md mt-1 {{ request()->is('officer/penerbitAll') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#174E71] text-[#146274] hover:text-[#ffffff]' }}">
                        <i class="bi bi-building"></i> Publisher Data
                    </h1>
                </a>
                @endif
                @if (Auth::user()->level == 'admin')
                <a href="/genreAll">
                    <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#146274] rounded-md mt-1 {{ request()->is('genreAll') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#174E71] text-[#146274] hover:text-[#ffffff]' }}">
                        <i class="bi bi-flower3"></i> Genre Data
                    </h1>
                </a>
                @else
                <a href="/officer/genreAll">
                    <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#146274] rounded-md mt-1 {{ request()->is('officer/genreAll') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#174E71] text-[#146274] hover:text-[#ffffff]' }}">
                        <i class="bi bi-flower3"></i> Genre Data
                    </h1>
                </a>
                @endif
                
                
                
                
            </div>
        {{-- End Menu 1 --}}
        {{-- Menu 2 Task --}}
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-[#174E71] text-[#174E71] hover:text-[#ffffff] {{ request()->is('buku') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#174E71] text-[#174E71] hover:text-[#ffffff]' }} rounded-md mt-1"" onclick="dropdown1()">
                <i class="bi bi-list-task"></i>
                <div class="flex justify-between w-full items-center">
                    <span class="text-[15px] ml-4  font-bold">Task</span>
                    <span class="text-sm rotate-180" id="arrow1">
                        <i class="bi bi-chevron-down"></i>
                    </span>
                </div>
            </div>

            <div class="text-left text-sm mt-2 w-4/5 mx-auto text-white font-bold" id="submenu1">
                @if (Auth::user()->level == 'admin')      
                <a href="/buku">
                    <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#174E71] {{ request()->is('buku') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#174E71] text-[#174E71] hover:text-[#ffffff]' }} rounded-md mt-1">
                        + Books
                    </h1>
                </a>
                @else
                <a href="/officer/buku">
                    <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#174E71] {{ request()->is('buku') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#174E71] text-[#174E71] hover:text-[#ffffff]' }} rounded-md mt-1">
                        + Books
                    </h1>
                </a>
                @endif
               
                <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#174E71] hover:text-white rounded-md mt-1" onclick="my_modal_1.showModal()">
                    + Authors
                </h1>
                <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#174E71] hover:text-white rounded-md mt-1" onclick="my_modal_2.showModal()">
                    + Publisher
                </h1>
                <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#174E71] hover:text-white rounded-md mt-1" onclick="my_modal_3.showModal()">
                    + Genre
                </h1>
                @if ((Auth::user()->level == 'admin'))
                <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#174E71] hover:text-white rounded-md mt-1" onclick="my_modal_4.showModal()">
                    + Officer
                </h1>
                @else
                <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#174E71] hover:text-white rounded-md mt-1" onclick="my_modal_5.showModal()">
                    + Borrower
                </h1>
                @endif 
            </div>
        {{-- End Menu 2 --}}
        {{-- Menu 3 Circulation --}}
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer {{ request()->is('pilihUser','officer/pilihUser', 'officer/pilihUserPeengembalian') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#174E71] text-[#146274] hover:text-[#146274]' }} hover:bg-[#174E71] text-[#174E71] hover:text-[#F7FBFC]" onclick="dropdown2()">
                <i class="bi bi-arrow-repeat"></i>  
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 font-bold">Circulation</span>
                <span class="text-sm rotate-180" id="arrow2">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </div>
            </div>
            <div class="text-left text-sm mt-2 w-4/5 mx-auto text-white font-bold" id="submenu2">
                @if (Auth::user()->level == 'admin')
                <a href="/pilihUser" class="selected">
                    <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#174E71] rounded-md mt-1 {{ request()->is('pilihUser') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#174E71] text-[#146274] hover:text-[#ffffff]' }}">
                        <i class="bi bi-arrow-right-square"></i> Lending
                    </h1>
                </a>
                @else
                <a href="/officer/pilihUser" class="selected">
                    <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#174E71] rounded-md mt-1 {{ request()->is('officer/pilihUser') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#174E71] text-[#146274] hover:text-[#ffffff]' }}">
                        <i class="bi bi-arrow-right-square"></i> Lending
                    </h1>
                </a>
                @endif
                @if (Auth::user()->level == 'admin')
                <a href="/pilihUserPeengembalian">
                    <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#174E71] rounded-md mt-1 {{ request()->is('pilihUserPeengembalian') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#174E71] text-[#146274] hover:text-[#ffffff]' }}">
                        <i class="bi bi-arrow-left-square"></i> Return
                    </h1>
                </a>
                @else
                <a href="/officer/pilihUserPeengembalian">
                    <h1 class="cursor-pointer p-2 hover:bg-[#174E71] text-[#174E71] rounded-md mt-1 {{ request()->is('officer/pilihUserPeengembalian') ? 'bg-[#174E71] text-[#ffffff]' : 'hover:bg-[#174E71] text-[#146274] hover:text-[#ffffff]' }}">
                        <i class="bi bi-arrow-left-square"></i> Return
                    </h1>
                </a>
                @endif
                
                
            </div>
            <a href="#" onclick="logout()">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-[#174E71] text-[#174E71] hover:text-[#F7FBFC]">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span class="text-[15px] ml-4  font-bold">Logout</span>
                </div>
            </a>
            <script>
                function logout() {
                    Swal.fire({
                        title: "Are you sure you want to sign out?",
                        text: "Make sure all your work is done :)!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, I am sure!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'logout'
                        }
                    });
                }
            </script>
        {{-- end menu 3 --}}
    </div>
{{-- Akhir Sidebar --}}
<div class="flex-grow ml-[300px] p-6 bg-gray-100 text-[#253149]">
