<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $guarded = [];
    protected $hidden = [];
    protected $fillable = [
        'nama_pelanggan', 'alamat', 'nomor_telepon'
    ];
}
