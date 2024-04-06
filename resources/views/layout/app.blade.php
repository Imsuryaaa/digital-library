<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital Library</title>
    <link rel="icon" href="{{asset('img/logo.png')}}">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"
    />
    <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
    @vite('./resources/css/app.css')
</head>
<style>
    .card {
        /* background-color: #f0f0f0; */
        /* border: 1px solid black; */
        padding: 20px;
    }

    .big-card {
        height: 300px; /* Sesuaikan dengan tinggi yang diinginkan */
    }
    .custom-swal-popup {
  font-size: 14px; /* Sesuaikan dengan ukuran yang Anda inginkan */
}

.custom-swal-title {
  font-size: 18px; /* Sesuaikan dengan ukuran yang Anda inginkan */
}

.custom-swal-html-container {
  font-size: 14px; /* Sesuaikan dengan ukuran yang Anda inginkan */
}

.custom-swal-confirm-button {
  font-size: 14px; /* Sesuaikan dengan ukuran yang Anda inginkan */
}

.custom-swal-cancel-button {
  font-size: 14px; /* Sesuaikan dengan ukuran yang Anda inginkan */
}

.custom-swal-close-button {
  font-size: 14px; /* Sesuaikan dengan ukuran yang Anda inginkan */
}

::-webkit-scrollbar-track
{
	border: 5px solid white;
	// border color does not support transparent on scrollbar
	// border-color: transparent;
	background-color: #b2bec3;
}

::-webkit-scrollbar
{
	width: 15px;
	background-color: #dfe6e9;
}

::-webkit-scrollbar-thumb
{
	background-color: #174E71;
	border-radius: 10px;
}

    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Pacifico&display=swap');
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body class="flex flex-col min-h-screen bg-slate-400">
    @if (Session::get('Benar'))
    {{-- <div class="toast toast-top toast-end">
        <div class="alert alert-success">
            <span class="text-white">{{Session::get('Benar')}}</span>
        </div>
    </div> --}}
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "{{Session::get('Benar')}}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif
    @if (Session::get('Salah'))
    {{-- <div class="toast toast-top toast-end">
        <div class="alert alert-error">
            <span class="text-white">{{Session::get('Salah')}}</span>
        </div>
    </div> --}}
    <script>
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "{{Session::get('Salah')}}",
      });
    </script>
    @endif
    @include('layout.partial.header')
        @yield('konten')
    @include('layout.partial.footer')
</body>

</html>