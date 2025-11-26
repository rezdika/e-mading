<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'aksi',
        'waktu',
    ];

    protected $casts = [
        'waktu' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public static function log($userId, $aksi)
    {
        return self::create([
            'id_user' => $userId,
            'aksi' => $aksi,
            'waktu' => now(),
        ]);
    }
}