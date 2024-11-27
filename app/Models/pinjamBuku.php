<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pinjamBuku extends Model
{
    protected $fillable = [
        'book_id',
        'user_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'loan_status',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    
}
