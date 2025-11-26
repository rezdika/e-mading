<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class, 'id_kategori');
    }

    public function getNamaAttribute()
    {
        return $this->nama_kategori;
    }
}