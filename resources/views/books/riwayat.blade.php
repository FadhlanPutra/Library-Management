<x-app-layout>

    <section class=" dark:bg-gray-900 lg:pl-64 mx-3 pt-5">
        <h1 class="dark:text-white text-center font-extrabold text-3xl my-10">Daftar Buku Dipinjam</h1>
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4 mb-10">
                    <div class="w-full md:w-1/2">
                        <form id="form-search-riwayat-admin" class="flex items-center" method="GET">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <button onclick="clearInput()" type="button" class="absolute inset-y-0 right-1 flex items-center pl-3">
                                    <svg  class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                    </svg>
                                </button>
                                <input value="{{ $search }}" id="search-riwayat-admin" name="search" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                            </div>
                        </form>
                    </div>
                </div>

                {{-- @if($loans->isEmpty())
                    <p class="dark:text-gray-300 text-gray-700">Data Belum Tersedia</p>
                @endif --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No</th>
                                <th scope="col" class="px-4 py-3">Judul Buku</th>
                                <th scope="col" class="px-4 py-3">Penulis</th>
                                <th scope="col" class="px-4 py-3">Nama Peminjam</th>
                                <th scope="col" class="px-4 py-3">Tanggal Pinjam</th>
                                <th scope="col" class="px-4 py-3">Tanggal Kembali</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Action</span>
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $no = 1;
                            @endphp
                           
                        @foreach ($loans as $loan)
                        @php
                                $time = date('Y-m-d');
                                $timeClass = $loan->tanggal_kembali === $time ? 'text-red-500' : '';
                                $timeClass2 = $loan->tanggal_kembali < $time ? 'bg-red-500 text-white' : '';
                        @endphp
                            <tr class="border-b dark:border-gray-700 {{ $timeClass. ' ' .$timeClass2 }}">
                                {{-- <td class="px-4 py-3">{{ $loop->iteration }}</td> --}}
                                <td class="px-4 py-3">{{ $no++ }}</td>
                                <td class="px-4 py-3">{{ Str::words($loan->book->judul_buku, 5) }}</td>
                                <td class="px-4 py-3">{{ $loan->book->penulis }}</td>
                                <td class="px-4 py-3">{{ $loan->user->name }}</td>
                                <td class="px-4 py-3">{{ $loan->tanggal_pinjam }}</td>
                                <td class="px-4 py-3">{{ $loan->tanggal_kembali }}</td>
                                <form action={{ route('books.update.riwayat', $loan->id) }} method="POST" enctype="multipart/form-data" id="loan-form-{{$loan->id}}">
                                    @csrf
                                    @method('PATCH')
                                    <td class="px-4 py-3">
                                        {{-- <span class=" {{ $loan->status === 'borrowed' ? 'bg-yellow-500 text-black p-1 rounded-md' : 'bg-green-500 text-white p-1 rounded-md' }}"> --}}
                                            <select name="status" id="status" class="{{ $loan->status == 'borrowed' ? 'text-red-500' : 'text-green-500' }} w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 " onchange="document.getElementById('loan-form-{{$loan->id}}').submit()">
                                                <option value="{{ $loan->status }}">{{ ucfirst($loan->status) }}</option>
                                                <option class="dark:text-white" value="borrowed" {{ $loan->status === 'borrowed' ? 'hidden' : '' }}>Borrowed</option>
                                                <option class="dark:text-white" value="diperiksa" {{ $loan->status === 'diperiksa' ? 'hidden' : '' }}>Diperiksa</option>
                                            </select>
                                        {{-- </span> --}}
                                    </td>
                                </form>
                                <td class="px-4 py-3">
                                    <button id="{{ $loan->id }}-dropdown-button" data-dropdown-toggle="{{ $loan->id }}-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    
                                    <div id="{{ $loan->id }}-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ $loan->id }}-dropdown-button">
                                            <button id="edit-modal" data-modal-target="edit-modal-{{$loan->id}}" data-id="{{ $loan->id }}" data-modal-toggle="edit-modal-{{$loan->id}}" type="button" class="my-1 pr-48 block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" aria-labelledby="{{ $loan->id }}-dropdown-button">perpanjang&nbsp;Masa&nbsp;Pinjam</button>
                                        </ul>
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" >
                                            <form id="kembalikan-buku-form" action="{{ route('books.delete.riwayat', $loan->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="">
                                                    <button data-message="Buku Sudah Dikembalikan?" data-form="kembalikan-buku-form" type="button" class="confirm-button my-1 pr-48 block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Kembalikan</button>
                                                </div>
                                            </form>
                                        </ul>
                                        <form id="buku-rusak-form" action="{{ route('books.destroy.riwayat', $loan->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="">
                                                <button data-message="Buku ini Rusak?" data-form="buku-rusak-form" type="button" class="confirm-button my-1 pr-48 block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Rusak</button>
                                            </div>
                                        </form>
                                </td>
                            </tr>

                            <div id="edit-modal-{{$loan->id}}" aria-labelledby="edit-modal-{{ $loan->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Perpanjang Masa Pinjam
                                            </h3>
                                            <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-modal-{{$loan->id}}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5">
                                            <form id="perpanjang-form-{{$loan->id}}" class="space-y-4" action="{{ route('books.perpanjang', $loan->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div>
                                                    <label for="tanggal_pinjam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pinjam</label>
                                                    <input type="date" class="my-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="example@example.com" value="{{ $loan->tanggal_pinjam }}" required readonly/>
                                                </div>
                                                <div>
                                                    <label for="tanggal_kembali" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Kembali</label>
                                                    <input type="date" name="tanggal_kembali" id="tanggal_kembali" placeholder="Tanggal Kembali" class="my-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{ $loan->tanggal_kembali }}" required />
                                                </div>
                                                <button type="button" data-message="Masa Akan Diperpanjang. Yakin?" data-form="perpanjang-form-{{$loan->id}}" class="confirm-button w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Perpanjang Masa Pinjam</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        @endforeach

                            @php
                            // dump(request('search'));

                            $no --  ;
                            $msg;
                            $search = $search ?? null;

                            if ($no == 0 && is_null($search)) {
                                $msg = "<span style='color:red; margin-left:1.25rem;'>Data Belum Tersedia</span>";
                            }
                            elseif ($no == 0 && !empty($search)) {
                                $msg = "<p class='text-white ml-5'>Nama Yang Anda Cari \"<span style='color:red;'>$search</span>\" Tidak Ada</p>";
                            }
                            elseif ($no > 0 && !empty($search)) {
                                $msg = "<p class='text-white ml-5'>Menampilkan <span style='color:rgb(1, 255, 1);'>$no</span> hasil pada pencarian Nama \"<span style='color:rgb(1, 255, 1);'>$search</span>\"</p>";
                            }
                            else {
                                $msg = "";
                            };

                            echo $msg;
                            // echo request('search');
                            // echo $search;
                            // echo $no;
                            @endphp
                        </tbody>
                    </table>
                    {{ $loans->links() }}
                </div>
            </div>
        </div>
        </section>

</x-app-layout>

<script>
    function clearInput(){
        document.getElementById('search-riwayat-admin').value = '';
        document.getElementById('form-search-riwayat-admin').submit();
    };
</script>