<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_title',
        'hero_subtitle', 
        'hero_background',
        'about_title',
        'about_description',
        'contact_phone',
        'contact_email',
        'contact_address'
    ];

    public static function getSettings()
    {
        return self::first() ?? self::create([]);
    }
}