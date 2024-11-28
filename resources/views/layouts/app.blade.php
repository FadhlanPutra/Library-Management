<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="aset/buku.webp">
        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

        <title>Perpustakaan-Pesat_{{ucfirst(Auth::user()->role)}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    </head>
    <body class="font-sans antialiased">
        
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <nav class="bg-white text-white border-gray-200 p-4 dark:bg-gray-800 drop-shadow-lg">
                
                <div class="flex flex-row justify-between gap-6 items-center px-4 sm:px-6 lg:px-4 xl:pl-64 md:pl-32 drop-shadow-md">
                    <div>
                        <input type="text" class="rounded-lg border-gray-500 focus:ring-opacity-50" placeholder="Cari Buku...">
                    </div>
                    {{-- <p>{{ now()->format('l, d M Y | H:i ') }}</p> --}}
                    <div class="flex flex-row gap-4">
                        <p>{{ now()->locale('id')->isoFormat('dddd, D MMMM YYYY | HH:mm') }}</p>
                        <i class="fa-regular fa-calendar"></i>
                            <i id="theme-toogle-icon" class="fas fa-sun"></i>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>



    //message with sweetalert
    @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "BERHASIL",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @elseif(session('error'))
        Swal.fire({
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif




</script>


        </div>
    </body>
</html>
