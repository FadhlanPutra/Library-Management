<x-app-layout>

    {{-- <section class="bg-gray-50 dark:bg-gray-900 lg:pl-64">
        <h1>Edit Buku</h1>
        <form action="{{ route('books.update', $books->id) }}" method="POST">
            @csrf

            <div>
                <label for="">Judul Buku</label>
                <input type="text" name="judul_buku" id="" value="{{ $books->judul_buku }}">
            </div>

            <div>
                <label for="">Penulis</label>
                <input type="text" name="penulis" id="" value="{{ $books->penulis }}">
            </div>    

            <div>
                <label for="">Kategori</label>
                <input type="text" name="kategori" id="" value="{{ $books->kategori }}">
            </div>

            <div>    
                <label for="">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" id="" value="{{ $books->tahun_terbit }}">
            </div>

            <div>
                <label for="">Jumlah Stock</label>
                <input type="number" name="jumlah_stock" id="" value="{{ $books->jumlah_stock }}">
            </div>

            <div>
                <label for="">Status</label>
                <input type="text" name="status" id="" value="{{ $books->status }}">
            </div>

            <div>
                <label for="">Deskripsi</label>
                <input type="text" name="deskripsi" id="" value="{{ $books->deskripsi }}">
            </div>

            <button type="submit">Simpan</button>
        </form>
    </section> --}}


    <section class="bg-white dark:bg-gray-900 lg:pl-64">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-whitet">Edit Buku</h2>
            <form action={{ route('books.update', $books->id) }} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="judul_buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Buku</label>
                        <input type="text" name="judul_buku" id="judul_buku" value="{{ $books->judul_buku }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Judul Buku" required="">
                    </div>
                    <div class="w-full">
                        <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
                        <input type="text" name="penulis" id="penulis" value="{{ $books->penulis }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Penulis" required="">
                    </div>
                    <div class="w-full">
                        <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" id="tahun_terbit" value="{{ $books->tahun_terbit }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tahun Terbit" required="">
                    </div>
                    <div>
                        <label for="kategory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                        <select id="kategory" name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="" disabled>Pilih Kategori</option>
                            <option value="Novel" {{ $books->kategori == 'Novel' ? 'selected' : '' }}>Novel</option>
                            <option value="Fiksi" {{ $books->kategori == 'Fiksi' ? 'selected' : '' }}>Fiksi</option>
                            <option value="Pendidikan" {{ $books->kategori == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                            <option value="Sejarah" {{ $books->kategori == 'Sejarah' ? 'selected' : '' }}>Sejarah</option>
                            <option value="Biografi" {{ $books->kategori == 'Biografi' ? 'selected' : '' }}>Biografi</option>
                        </select>
                    </div>
                    <div>
                        <label for="jumlah_stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                        <input type="number" name="jumlah_stock" id="jumlah_stock" value="{{ $books->jumlah_stock }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Stock" required="">
                    </div> 
                    <div>
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="1" {{ $books->status == 1 ? 'selected' : '' }} class="text-green-600">Tersedia</option>
                            <option value="0" {{ $books->status == 0 ? 'selected' : '' }} class="text-red-600">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div>
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" value="{{ $books->deskripsi }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Deskripsi Singkat" required="">
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Update Buku
                </button>
            </form>
        </div>
    </section>


</x-app-layout>