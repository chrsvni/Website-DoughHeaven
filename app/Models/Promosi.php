<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promosi extends Model
{
    use HasFactory;

    protected $table = 'promosi';

    protected $fillable = [
        'nama_promosi',
        'kategori_promosi',
        'deskripsi',
        'jatuh_tempo',
    ];

    protected $casts = [
        'jatuh_tempo' => 'date',
    ];

    public function produks()
    {
        return $this->belongsToMany(Produk::class, 'produk_promosi');
    }
}
