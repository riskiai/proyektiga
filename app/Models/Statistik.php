<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Statistik extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['tgl_transaksi'];

    protected $fillable = [
        'terjual',
        'tgl_transaksi',
        'products_id'
    ];


    public function products(){
        return $this->belongsTo(Product::class,'products_id','id');
    }

}
