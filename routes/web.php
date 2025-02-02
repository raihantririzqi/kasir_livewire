<?php

use App\Livewire\Dashboard;
use App\Livewire\Pelanggan;
use App\Livewire\Penjualan;
use App\Livewire\Produk;
use App\Livewire\Transaksi;
use Illuminate\Support\Facades\Route;

Route::get('/',Dashboard::class);
Route::get('/pelanggan', Pelanggan::class);
Route::get('/produk', Produk::class);
Route::get('/penjualan', Penjualan::class);
Route::get('/transaksi/{id}', Transaksi::class);
