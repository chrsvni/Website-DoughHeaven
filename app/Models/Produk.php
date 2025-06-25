<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'kategori_id',
        'nama_produk',
        'deskripsi',
        'harga',
        'gambar',
        'rekomendasi',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function promosis()
    {
        return $this->belongsToMany(Promosi::class, 'produk_promosi');
    }
}
