<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class ProfileDesa extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'profile_desa';
    protected $fillable = [
        'title',
        'url',
        'body'
    ];

    public function getUrlAtrribute($url)
    {
        return config('app.url') . Storage::url($url);
    }
}
