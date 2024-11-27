<x-app-layout>
    <section class="bg-white dark:bg-gray-900 lg:pl-64">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Detail Buku</h2>
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Buku</label>
                    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        {{ $books->judul_buku }}
                    </div>
                </div>
                <div class="w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
                    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        {{ $books->penulis }}
                    </div>
                </div>
                <div class="w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Terbit</label>
                    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        {{ $books->tahun_terbit }}
                    </div>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        {{ $books->kategori }}
                    </div>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        {{ $books->jumlah_stock }}
                    </div>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <div class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                        @if($books->status == 1)
                            <span class="text-green-600">Tersedia</span>
                        @else
                            <span class="text-red-600">Tidak Tersedia</span>
                        @endif
                    </div>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        {{ $books->deskripsi }}
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <a href="{{ route('books.index') }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Kembali
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
