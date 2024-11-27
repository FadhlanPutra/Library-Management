<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'judul_buku',
        'penulis',
        'kategori',
        'tahun_terbit',
        'jumlah_stock',
        'status',
        'loan_status',
        'deskripsi',
    ];
    public function loans()
    {
        return $this->hasMany(pinjamBuku::class, 'book_id');
    }
}