<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" href="{{asset('img/logo.png')}}">
    @vite('resources/css/app.css')
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Pacifico&display=swap');
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body class="flex items-center justify-center h-screen bg-[#F2F7FF]">
  @if (Session::get('Benar'))
    <div class="toast toast-top toast-end">
      <div role="alert" class="alert bg-green-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span class="text-white">{{Session::get('Benar')}}</span>
      </div>
    </div>
  @endif
  @if (Session::get('Salah'))
    <div class="toast toast-top toast-end">
        <div class="alert bg-red-500">
            <span class="text-white">{{Session::get('Salah')}}</span>
        </div>
    </div>
    {{-- <script>
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "{{Session::get('Salah')}}",
      });
    </script> --}}
  @endif
    <div class="flex w-4/5 max-w-2xl bg-white shadow-md rounded-lg overflow-hidden mx-auto">
      <div class="w-1/2 bg-cover" style="background-color: #A5D1EA">
        <img class="mt-8" src="{{asset('img/image.png')}}">
      </div>
      <div class="w-1/2 p-8 rounded-md" style="font-family: 'Inter';">
          <h1 class="block w-full text-gray-800 text-2xl font-bold " style="color: #146274">Login</h1>
          <p class="mb-16 text-sm" style="color: #146274">Please login to continue</p>
          <form action="/login" method="post" class="mb-4 md:flex md:flex-wrap md:justify-between">
            @csrf
              <div class="field-group mb-4 md:w-full">
                  <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide" style="color: #146274">Username :</label>
                  <input type="text" name="name" value="{{old('name')}}" class="w-full px-4 py-3 rounded- shadow-sm focus:outline-none focus:shadow-outline text-teal-800 font-medium @error('name') bg-red-100 border-t border-b border-red-500 text-red-700 @endError" placeholder="Enter your username">
                  @error('name')
                    <p class="text-sm text-red-500">{{$message}}</p>
                  @enderror
              </div>
              <div class="field-group mb-4 md:w-full">
                  <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide" style="color: #146274">Password :</label>
                  <input type="password" name="password" value="{{old('password')}}"" class="w-full px-4 py-3 rounded shadow-sm focus:outline-none focus:shadow-outline text-teal-800 font-medium @error('password') bg-red-100 border-t border-b border-red-500 text-red-700 @endError" placeholder="Enter your password">
                  @error('password')
                    <p class="text-sm text-red-500">{{$message}}</p>
                  @enderror
              </div>
              <button type="submit" class="w-full py-3  text-white rounded font-medium tracking-wide hover:bg-blue-500" style="background-color: #74C9F8">Login</button>
          </form>
      </div>
  </div>
</body>
</html>