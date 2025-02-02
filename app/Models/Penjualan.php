<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    protected $guarded = [];
    protected $hidden = [];
    protected $fillable = [
        'tanggal_penjualan', 'total_harga', 'id_pelanggan'
    ];
}
