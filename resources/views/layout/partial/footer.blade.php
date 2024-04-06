  {{-- Semua Modal --}}
    {{-- Modal 1 (Penulis) --}}
      <dialog id="my_modal_1" class="modal">
        <div class="modal-box bg-[#174E71] text-[#174E71]">
          <h3 class="font-bold text-lg">Add New Authors</h3>
          @if (Auth::user()->level == 'admin')
          <form action="/admin/penulis" method="post">
            @csrf
            <label for="name" class="block mt-2 text-sm text-white">Author Name :</label>
            <input id="name" name="namaPenulis" type="text" class="w-full p-2 mt-1 border rounded-md   @error('namaPenulis') bg-red-100 border-t border-b border-red-500 text-red-700 @endError" placeholder="Enter Author Name" value="{{old('namaPenulis')}}">
            @error('namaPenulis')
                    <p class="text-sm text-red-500">{{$message}}</p>
            @enderror
            <label for="email" class="block mt-2 text-sm text-white">Author Email :</label>
            <input id="email" name="emailPenulis" type="email" class="w-full p-2 mt-1 border rounded-md  @error('emailPenulis') bg-red-100 border-t border-b border-red-500 text-red-700 @endError" placeholder="Enter Author Email" value="{{old('emailPenulis')}}">
            @error('emailPenulis')
                    <p class="text-sm text-red-500">{{$message}}</p>
            @enderror
            <button type="submit" class="mt-4 px-4 py-2 bg-[#427909] hover:bg-[#A63F0F] text-[#F3F4F6] rounded-md">Add Author</button>
          </form>
          @else
          <form action="/officer/penulis" method="post">
            @csrf
            <label for="name" class="block mt-2 text-sm text-white">Author Name :</label>
            <input id="name" name="namaPenulis" type="text" class="w-full p-2 mt-1 border rounded-md   @error('namaPenulis') bg-red-100 border-t border-b border-red-500 text-red-700 @endError" placeholder="Enter Author Name" value="{{old('namaPenulis')}}">
            @error('namaPenulis')
                    <p class="text-sm text-red-500">{{$message}}</p>
            @enderror
            <label for="email" class="block mt-2 text-sm text-white">Author Email :</label>
            <input id="email" name="emailPenulis" type="email" class="w-full p-2 mt-1 border rounded-md  @error('emailPenulis') bg-red-100 border-t border-b border-red-500 text-red-700 @endError" placeholder="Enter Author Email" value="{{old('emailPenulis')}}">
            @error('emailPenulis')
                    <p class="text-sm text-red-500">{{$message}}</p>
            @enderror
            <button type="submit" class="mt-4 px-4 py-2 bg-[#427909] hover:bg-[#A63F0F] text-[#F3F4F6] rounded-md">Add Author</button>
          </form>
          @endif
          
          <p class="py-4">Press ESC key or click outside to close</p>
        </div>
        <form method="dialog" class="modal-backdrop">
          <button class="text-white">close</button>
        </form>
      </dialog>
    {{-- End --}}
    {{-- Modal 2 (Penerbit) --}}
      <dialog id="my_modal_2" class="modal">
        <div class="modal-box bg-[#174E71] text-[#174E71]">
          <h3 class="font-bold text-lg">Add New Publisher</h3>
        @if (Auth::user()->level == 'admin')
          <form action="/admin/penerbit" method="post">
            @csrf
            <label for="nama_penerbit" class="block mt-2 text-sm text-white">Publisher Name :</label>
            <input id="nama_penerbit" name="nama_penerbit" type="text" class="w-full p-2 mt-1 border rounded-md  @error('nama_penerbit') bg-red-100 border-t border-b border-red-500 text-red-700 @endError " placeholder="Enter Publisher Name" value="{{old('nama_penerbit')}}">
            @error('nama_penerbit')
                    <p class="text-sm text-red-500">{{$message}}</p>
            @enderror
            <label for="email_penerbit" class="block mt-2 text-sm text-white">Publisher Email :</label>
            <input id="email_penerbit" name="email_penerbit" type="email" class=" w-full p-2 mt-1 border rounded-md  @error('email_penerbit') bg-red-100 border-t border-b border-red-500 text-red-700 @endError" placeholder="Enter Publisher Email" value="{{old('email_penerbit')}}">
            @error('email_penerbit')
                    <p class="text-sm text-red-500">{{$message}}</p>
            @enderror
            <label for="no_telp_penerbit" class="block mt-2 text-sm text-white">Publisher Phone Number :</label>
            <input id="no_telp_penerbit" name="no_telp_penerbit" type="number" class=" w-full p-2 mt-1 border rounded-md  @error('no_telp_penerbit') bg-red-100 border-t border-b border-red-500 text-red-700 @endError" placeholder="Enter Publisher Phone Number" value="{{old('no_telp_penerbit')}}">
            @error('no_telp_penerbit')
                    <p class="text-sm text-red-500">{{$message}}</p>
            @enderror
            <label for="address" class="block mt-2 text-sm text-white">Publisher Address :</label>
            <textarea id="address" name="alamat_penerbit"  class=" w-full p-2 mt-1 border rounded-md  @error('alamat_penerbit') bg-red-100 border-t border-b border-red-500 text-red-700 @endError" placeholder="Enter Publisher Address" style="max-height: 100px; min-height: 100px">{{old('alamat_penerbit')}}</textarea>
            @error('alamat_penerbit')
                    <p class="text-sm text-red-500">{{$message}}</p>
            @enderror
            <button type="submit" class="mt-4 px-4 py-2 bg-[#427909] hover:bg-[#A63F0F] text-[#F3F4F6] rounded-md">Add Publisher</button>
          </form>
        @else
          <form action="/officer/penerbit" method="post">
            @csrf
            <label for="nama_penerbit" class="block mt-2 text-sm text-white">Publisher Name :</label>
            <input id="nama_penerbit" name="nama_penerbit" type="text" class="w-full p-2 mt-1 border rounded-md  @error('nama_penerbit') bg-red-100 border-t border-b border-red-500 text-red-700 @endError " placeholder="Enter Publisher Name" value="{{old('nama_penerbit')}}">
            @error('nama_penerbit')
                    <p class="text-sm text-red-500">{{$message}}</p>
            @enderror
            <label for="email_penerbit" class="block mt-2 text-sm text-white">Publisher Email :</label>
            <input id="email_penerbit" name="email_penerbit" type="email" class=" w-full p-2 mt-1 border rounded-md  @error('email_penerbit') bg-red-100 border-t border-b border-red-500 text-red-700 @endError" placeholder="Enter Publisher Email" value="{{old('email_penerbit')}}">
            @error('email_penerbit')
                    <p class="text-sm text-red-500">{{$message}}</p>
            @enderror
            <label for="no_telp_penerbit" class="block mt-2 text-sm text-white">Publisher Phone Number :</label>
            <input id="no_telp_penerbit" name="no_telp_penerbit" type="number" class=" w-full p-2 mt-1 border rounded-md  @error('no_telp_penerbit') bg-red-100 border-t border-b border-red-500 text-red-700 @endError" placeholder="Enter Publisher Phone Number" value="{{old('no_telp_penerbit')}}">
            @error('no_telp_penerbit')
                    <p class="text-sm text-red-500">{{$message}}</p>
            @enderror
            <label for="address" class="block mt-2 text-sm text-white">Publisher Address :</label>
            <textarea id="address" name="alamat_penerbit"  class=" w-full p-2 mt-1 border rounded-md  @error('alamat_penerbit') bg-red-100 border-t border-b border-red-500 text-red-700 @endError" placeholder="Enter Publisher Address" style="max-height: 100px; min-height: 100px">{{old('alamat_penerbit')}}</textarea>
            @error('alamat_penerbit')
                    <p class="text-sm text-red-500">{{$message}}</p>
            @enderror
            <button type="submit" class="mt-4 px-4 py-2 bg-[#427909] hover:bg-[#A63F0F] text-[#F3F4F6] rounded-md">Add Publisher</button>
          </form>
        @endif
          <p class="py-4">Press ESC key or click outside to close</p>
        </div>
        <form method="dialog" class="modal-backdrop">
          <button class="text-white">close</button>
        </form>
      </dialog>
    {{-- End --}}
    {{-- Modal 3 (Genre) --}}
      <dialog id="my_modal_3" class="modal">
        <div class="modal-box bg-[#174E71] text-[#174E71]">
          <h3 class="font-bold text-lg ">Add New Genre</h3>
          @if (Auth::user()->level == 'admin')
          <form action="/admin/genre" method="post">
            @csrf
            <label for="name" class="block mt-2 text-sm text-white">Genre :</label>
            <input id="name" name="nama_genre" type="text" class="w-full p-2 mt-1 border rounded-md @error('nama_genre') bg-red-100 border-t border-b border-red-500 text-red-700 @endError" placeholder="Enter Genre Name" value="{{old('nama_genre')}}">
            @error('nama_genre')
                    <p class="text-sm text-red-500">{{$message}}</p>
            @enderror
            <button type="submit" class="mt-4 px-4 py-2 bg-[#427909] hover:bg-[#A63F0F] text-[#F3F4F6] rounded-md">Add Genre</button>
          </form>
          @else
          <form action="/officer/genre" method="post">
            @csrf
            <label for="name" class="block mt-2 text-sm text-white">Genre :</label>
            <input id="name" name="nama_genre" type="text" class="w-full p-2 mt-1 border rounded-md @error('nama_genre') bg-red-100 border-t border-b border-red-500 text-red-700 @endError" placeholder="Enter Genre Name" value="{{old('nama_genre')}}">
            @error('nama_genre')
                    <p class="text-sm text-red-500">{{$message}}</p>
            @enderror
            <button type="submit" class="mt-4 px-4 py-2 bg-[#427909] hover:bg-[#A63F0F] text-[#F3F4F6] rounded-md">Add Genre</button>
          </form>
          @endif
          
          <p class="py-4">Press ESC key or click outside to close</p>
        </div>
        <form method="dialog" class="modal-backdrop">
          <button class="text-white">close</button>
        </form>
      </dialog>
    {{-- End --}}
    {{-- Modal 4 (officer) --}}
      <dialog id="my_modal_4" class="modal">
        <div class="modal-box bg-[#174E71] text-[#174E71]">
          <h3 class="font-bold text-lg text-white">Add New Officer</h3>
          <form action="/admin/addOfficer" method="post" class="flex flex-wrap">
            @csrf
            <div class="w-full md:w-1/2 px-2">
                <label for="name" class="block mt-2 text-sm text-white">Username :</label>
                <input id="name" name="name" type="text" class="w-full p-2 mt-1 border rounded-md @error('name') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror" placeholder="Enter Username" value="{{ old('name') }}">
                @error('name')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-2">
                <label for="nama_lengkap" class="block mt-2 text-sm text-white">Full Name :</label>
                <input id="nama_lengkap" name="nama_lengkap" type="text" class="w-full p-2 mt-1 border rounded-md @error('nama_lengkap') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror" placeholder="Enter Full Name" value="{{ old('nama_lengkap') }}">
                @error('nama_lengkap')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-2">
                <label for="no_telp" class="block mt-2 text-sm text-white">Phone Number :</label>
                <input id="no_telp" name="no_telp" type="text" class="w-full p-2 mt-1 border rounded-md @error('no_telp') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror" placeholder="Enter Phone Number" value="{{ old('no_telp') }}">
                @error('no_telp')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-2">
                <label for="alamat" class="block mt-2 text-sm text-white">Address :</label>
                <input id="alamat" name="alamat" type="text" class="w-full p-2 mt-1 border rounded-md @error('alamat') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror" placeholder="Enter Address" value="{{ old('alamat') }}">
                @error('alamat')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-2">
                <label for="email" class="block mt-2 text-sm text-white">Email :</label>
                <input id="email" name="email" type="text" class="w-full p-2 mt-1 border rounded-md @error('email') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror" placeholder="Enter Email" value="{{ old('email') }}">
                @error('email')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-2">
                <label for="password" class="block mt-2 text-sm text-white">Password :</label>
                <input id="password" name="password" type="password" class="w-full p-2 mt-1 border rounded-md @error('password') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror" placeholder="Enter password" value="{{ old('password') }}">
                @error('password')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full md:w-auto mt-4 px-4 py-2 bg-[#427909] hover:bg-[#A63F0F] text-white rounded-md">Add Officer</button>
        </form>
        
          <p class="py-4">Press ESC key or click outside to close</p>
        </div>
        <form method="dialog" class="modal-backdrop">
          <button class="text-white">close</button>
        </form>
      </dialog>
    {{-- End --}}
    {{-- Modal 5 (Peminjam) --}}
      <dialog id="my_modal_5" class="modal">
        <div class="modal-box bg-[#174E71] text-white">
          <h3 class="font-bold text-lg ">Add New Borrowers</h3>
          <form action="/officer/addBorrower" method="post" class="flex flex-wrap">
            @csrf
            <div class="w-full md:w-1/2 px-2">
                <label for="name" class="block mt-2 text-sm text-white">Username :</label>
                <input id="name" name="name" type="text"  class="text-black w-full p-2 mt-1 border rounded-md @error('name') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror" placeholder="Enter Username" value="{{ old('name') }}">
                @error('name')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-2">
                <label for="nama_lengkap" class="block mt-2 text-sm text-white">Full Name :</label>
                <input id="nama_lengkap" name="nama_lengkap"  type="text" class="text-black w-full p-2 mt-1 border rounded-md @error('nama_lengkap') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror" placeholder="Enter Full Name" value="{{ old('nama_lengkap') }}">
                @error('nama_lengkap')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-2">
                <label for="no_telp" class="block mt-2 text-sm text-white">Phone Number :</label>
                <input id="no_telp" name="no_telp" type="text"  class="text-black w-full p-2 mt-1 border rounded-md @error('no_telp') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror" placeholder="Enter Phone Number" value="{{ old('no_telp') }}">
                @error('no_telp')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-2">
                <label for="alamat" class="block mt-2 text-sm text-white">Address :</label>
                <input id="alamat" name="alamat" type="text"  class="text-black w-full p-2 mt-1 border rounded-md @error('alamat') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror" placeholder="Enter Address" value="{{ old('alamat') }}">
                @error('alamat')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-2">
                <label for="email" class="block mt-2 text-sm text-white">Email :</label>
                <input id="email" name="email" type="text"  class="text-black w-full p-2 mt-1 border rounded-md @error('email') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror" placeholder="Enter Email" value="{{ old('email') }}">
                @error('email')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-2">
                <label for="password" class="block mt-2 text-sm text-white">Password :</label>
                <input id="password" name="password" type="password"  class="text-black w-full p-2 mt-1 border rounded-md @error('password') bg-red-100 border-t border-b border-red-500 text-red-700 @enderror" placeholder="Enter password" value="{{ old('password') }}">
                @error('password')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full md:w-auto mt-4 px-4 py-2 bg-[#427909] hover:bg-[#A63F0F] text-white rounded-md">Add Borrowers</button>
        </form>
          <p class="py-4">Press ESC key or click outside to close</p>
        </div>
        <form method="dialog" class="modal-backdrop">
          <button class="text-white">close</button>
        </form>
      </dialog>
    {{-- End --}}
  {{-- End Semua Modal  --}}
</div>
<script type="text/javascript">
    function dropdown() {
      document.querySelector("#submenu").classList.toggle("hidden");
      document.querySelector("#arrow").classList.toggle("rotate-0");
    }
    dropdown();

    function dropdown1() {
    document.querySelector("#submenu1").classList.toggle("hidden");
    document.querySelector("#arrow1").classList.toggle("rotate-0");
    }
    dropdown1();

    function dropdown2() {
    document.querySelector("#submenu2").classList.toggle("hidden");
    document.querySelector("#arrow2").classList.toggle("rotate-0");
    }
    dropdown2();
</script>
<script>
  window.onload = function() {
    // Periksa status dropdown 1
    var submenuStatus = localStorage.getItem("submenuStatus");
    if (submenuStatus === "open") {
        var submenu = document.getElementById("submenu");
        submenu.classList.remove("hidden");
        var arrow = document.getElementById("arrow");
        arrow.classList.add("rotate-180");
    }

    // Periksa status dropdown 2
    var submenu1Status = localStorage.getItem("submenu1Status");
    if (submenu1Status === "open") {
        var submenu1 = document.getElementById("submenu1");
        submenu1.classList.remove("hidden");
        var arrow1 = document.getElementById("arrow1");
        arrow1.classList.add("rotate-180");
    }
    // Periksa status dropdown 3
    var submenu1Status = localStorage.getItem("submenu2Status");
    if (submenu1Status === "open") {
        var submenu1 = document.getElementById("submenu2");
        submenu1.classList.remove("hidden");
        var arrow1 = document.getElementById("arrow2");
        arrow1.classList.add("rotate-180");
    }
  };

  function dropdown() {
      var submenu = document.getElementById("submenu");
      submenu.classList.toggle("hidden");
      var arrow = document.getElementById("arrow");
      arrow.classList.toggle("rotate-180");

      var submenuStatus = submenu.classList.contains("hidden") ? "closed" : "open";
      localStorage.setItem("submenuStatus", submenuStatus);
  }

  function dropdown1() {
      var submenu1 = document.getElementById("submenu1");
      submenu1.classList.toggle("hidden");
      var arrow1 = document.getElementById("arrow1");
      arrow1.classList.toggle("rotate-180");

      var submenu1Status = submenu1.classList.contains("hidden") ? "closed" : "open";
      localStorage.setItem("submenu1Status", submenu1Status);
  }
  function dropdown2() {
      var submenu1 = document.getElementById("submenu2");
      submenu1.classList.toggle("hidden");
      var arrow1 = document.getElementById("arrow2");
      arrow1.classList.toggle("rotate-180");

      var submenu2Status = submenu1.classList.contains("hidden") ? "closed" : "open";
      localStorage.setItem("submenu2Status", submenu2Status);
  }

  var currentUrl = window.location.href;

    // Ambil semua tautan di dalam sidebar
    var links = document.querySelectorAll('.sidebar a');

    // Iterasi melalui setiap tautan
    links.forEach(function(link) {
        // Jika href tautan cocok dengan URL saat ini
        if(link.getAttribute('href') === currentUrl) {
            // Tambahkan kelas 'selected' ke tautan
            link.classList.add('selected');
        }
    });
</script>