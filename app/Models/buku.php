<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    protected $fillable = [
        'id_kategori',
        'judul',
        'penulis',
        'penerbit',
        'tahunterbit',
        'slug',
        'gambar',
        'deskripsi',
        'genre',
        'stok',
    ];

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori', 'id_kategori');
    }


    public function peminjaman()
    {
        return $this->hasMany(peminjaman::class, 'id_buku');
    }
    public function koleksi()
    {
        return $this->hasMany(koleksi::class, 'id_koleksi');
    }
    public function ulasan()
    {
        return $this->hasMany(koleksi::class, 'id_koleksi');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
