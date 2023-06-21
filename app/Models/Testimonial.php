<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'nama',
        'pekerjaan',
        'komentar',
        'url'
    ];


    public function getUrlAtrribute($url)
    {
        return config('app.url') . Storage::url($url);
    }
}
