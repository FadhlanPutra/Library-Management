<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto max-sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-max-sm max-sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>  
        </div>
    </div> --}}


    
    <section class="bg-black dark:bg-gray-900 lg:pl-64 mx-3 pt-5">
    
    <div class="flex flex-col me-1 text-white">
        <div class='p-4 bg-black rounded-xl border-black shadow-lg'>
            <div class='flex flex-col lg:flex-row gap-8  justify-center'>
                <img src="/aset/library.webp" alt="logo Library" class='w-full max-w-md' />
                <div class='flex flex-col justify-center gap-4 lg:w-1/2'>
                    <h1 class='font-extrabold text-2xl'>Selamat Pagi, {{ Auth::user()->name }}!</h1>
                    <p>Selamat datang di Dashboard Library Pesat! Di sini, Anda dapat melihat buku-buku yang tersedia untuk dipinjam, memantau status peminjaman Anda, dan mengelola riwayat peminjaman dengan mudah. Nikmati pengalaman peminjaman buku yang lebih mudah dan efisien, dan pastikan Anda selalu mendapatkan buku favorit Anda!</p>
                
                    <div class='flex lg:gap-5 max-sm:justify-between'>
                        <a href="{{ route('books.index') }}">
                            <button href='#' class='p-3 px-6 bg-gray-300 rounded-full text-black'>Baca Buku</button>
                        </a>

                        <a href="{{ route('anggota.index') }}">
                            <button class='p-3 px-6 bg-[#A78E51] rounded-full'>Pinjam Buku</button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        
        
    </div>

        
        <div class="mt-10 me-1 text-white">
            <h1 class='font-medium text-2xl'>Info Dashboard Buku</h1>

            <div class="flex max-sm:flex-col lg:flex-row justify-between">
                <p class='py-3'>Dashboard informasi total buku, buku sedang dipinjam, buku diperiksa, buku rusak</p>
                <a href="{{ route('books.riwayat') }}">
                    <button class='p-2 px-3 mt-1 bg-gray-300 rounded-full text-black'>Kelola</button>
                </a>
            </div>


            <div class='flex mt-14 gap-5 justify-between text-white lg:flex-row flex-wrap'>
                <div class="bg-[#6E987C] lg:w-72 lg:h-72 max-sm:w-44 max-sm:h-44 rounded-3xl shadow-md">
                    <span class="flex justify-between mt-5 mx-5">
                        <img src="/aset/buku_dipinjam.png" class="w-24 h-24 max-sm:w-12 max-sm:h-12"  alt="buku dipinjam" />
                        <p class="font-medium lg:text-7xl max-sm:text-4xl">{{ $totalBuku }}</p>
                    </span>
                    <p class="text-center lg:mt-28 max-sm:mt-16">Total Buku</p>
                </div>
                <div class="bg-[#22615D] lg:w-72 lg:h-72 max-sm:w-44 max-sm:h-44 rounded-3xl shadow-md">
                    <span class="flex justify-between mt-5 mx-5">
                        <img src="/aset/sedang_dipinjam.png" class="w-24 h-24 max-sm:w-12 max-sm:h-12" alt="sedang dipinjam" />
                        <p class="font-medium lg:text-7xl max-sm:text-4xl">{{ $totalPinjam }}</p>
                    </span>
                    <p class="text-center lg:mt-28 max-sm:mt-16">Sedang Dipinjam</p>
                </div>
                <div class="bg-[#FBC78F] lg:w-72 lg:h-72 max-sm:w-44 max-sm:h-44 rounded-3xl shadow-md">
                    <span class="flex justify-between mt-5 mx-5">
                        <img src="/aset/buku_dikembalikan.png" class="w-24 h-24 max-sm:w-12 max-sm:h-12" alt="buku dikembalikan" />
                        <p class="font-medium lg:text-7xl max-sm:text-4xl">{{ $totalDiperiksa }}</p>
                    </span>
                    <p class="text-center lg:mt-28 max-sm:mt-16">Buku Dikembalikan</p>
                </div>
                <div class="bg-[#AC455E] lg:w-72 lg:h-72 max-sm:w-44 max-sm:h-44 rounded-3xl shadow-md">
                    <span class="flex justify-between mt-5 mx-5">
                        <img src="/aset/buku_rusak.png" class="w-24 h-24 max-sm:w-12 max-sm:h-12" alt="buku rusak" />
                        <p class="font-medium lg:text-7xl max-sm:text-4xl">{{ $totalRusak }}</p>
                    </span>
                    <p class="text-center lg:mt-28 max-sm:mt-16">Buku Rusak</p>
                </div>        
            </div>
        </div>


        </section>


</x-app-layout>
