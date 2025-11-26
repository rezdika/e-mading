<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_artikel',
        'id_user',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'id_artikel');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}