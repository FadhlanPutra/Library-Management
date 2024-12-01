<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\pinjamBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(10);
        return view('anggota.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        // dd($request->all());

        $book = Book::findOrFail($request->book_id);

        //cek ketersediaan buku
        if(!$book->status) {
            return back()->with('error', 'stock buku sudah habis');
        }

        // $book->update(['loan_status' => 'borrowed']);

        $book->decrement('jumlah_stock');

        if ($book->jumlah_stock == 0) {
            // $book->update(['loan_status' => 'borrowed']);
            $book->update(['status' => 0]);
        } elseif ($book->jumlah_stock >= 1) {
            $book->update(['status' => 1]);
        }

        //buat peminjaman
        pinjamBuku::create([        
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'borrowed',
        ]);

        //perbarui status
        $book->update([
            'loan_status' => 'borrowed',
        ]);

        return redirect()->back()->with('success', 'Buku berhasil dipinjam');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function riwayat(Request $request){
        // $loans = pinjamBuku::paginate(10);

        $search = $request->input('search'); 

        // $loans = Book::where('judul_buku', 'like', '%' . $search . '%')
        $loans = PinjamBuku::whereHas('User', function ($query) use ($search) {
        $query->where('name', 'like', '%' . $search . '%');
        })->latest()->paginate(10);

        return view('anggota.riwayat', compact('loans', 'search'));
    }
}
