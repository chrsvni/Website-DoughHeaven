<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'user_id',
        'tanggal',
        'kategori',
        'deskripsi',
        'isi_blog',
        'gambar',
        'slug',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->judul);

                // Pastikan slug unik
                $originalSlug = $blog->slug;
                $counter = 1;

                while (static::where('slug', $blog->slug)->exists()) {
                    $blog->slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
            }
        });

        static::updating(function ($blog) {
            if ($blog->isDirty('judul')) {
                $blog->slug = Str::slug($blog->judul);

                // Pastikan slug unik
                $originalSlug = $blog->slug;
                $counter = 1;

                while (static::where('slug', $blog->slug)->where('id', '!=', $blog->id)->exists()) {
                    $blog->slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
            }
        });

        // Hapus gambar lama saat blog dihapus
        static::deleting(function ($blog) {
            if ($blog->gambar && Storage::disk('public')->exists($blog->gambar)) {
                Storage::disk('public')->delete($blog->gambar);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getKategoriOptions()
    {
        return [
            'whats_new' => "What's New",
            'whats_fun' => "What's Fun",
            'whats_good' => "What's Good",
        ];
    }

    public function getKategoriLabelAttribute()
    {
        $options = $this->getKategoriOptions();
        return $options[$this->kategori] ?? $this->kategori;
    }

    public function getGambarUrlAttribute()
    {
        if ($this->gambar) {
            return Storage::url($this->gambar);
        }
        return asset('images/default-blog.jpg'); // Gambar default jika tidak ada
    }

    public function getExcerpt($limit = 150)
    {
        return Str::limit(strip_tags($this->deskripsi), $limit);
    }
}
