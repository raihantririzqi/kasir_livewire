<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $table = 'detail_penjualan';
    protected $guarded = [];
    protected $hidden = [];
    protected $fillable = [
        'id_penjualan', 'id_produk', 'jumlah_produk', 'sub_total'
    ];
}
