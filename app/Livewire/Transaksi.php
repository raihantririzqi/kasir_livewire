<?php

namespace App\Livewire;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Transaksi extends Component
{
    public $id_penjualan, $id_produk, $jumlah;
    #[Layout('master')]
    public function mount($id){
        $this->id_penjualan = $id;
    }

    public function render()
    {
        $detail_penjualan = DetailPenjualan::where('id_penjualan', '=', $this->id_penjualan)
                                            ->join('produk', 'produk.id', '=', 'detail_penjualan.id_produk')
                                            ->join('penjualan', 'penjualan.id', '=', 'detail_penjualan.id_penjualan')
                                            ->join('pelanggan', 'pelanggan.id', '=', 'penjualan.id_pelanggan')
                                            ->get();
        $produk = Produk::all();
        $total_harga = Penjualan::where('id', '=', $this->id_penjualan)->first();
        $no = 1;
        return view('livewire.transaksi', ['produk' => $produk, 'detail_penjualan' => $detail_penjualan, 'no' => $no, 'total_harga' => $total_harga->total_harga]);
    }

    public function beli_produk(){
        $produk = Produk::findOrFail($this->id_produk)->first();

        $produk_exist = DetailPenjualan::where('id_penjualan', '=', $this->id_penjualan)
                                        ->where('id_produk', '=', $this->id_produk)
                                        ->first();

        $sub_total = $produk->harga * $this->jumlah;

        if ($produk->stok < $this->jumlah) {
            session()->flash('error', 'Stok produk tidak mencukupi.');
            return;
        }

        Produk::findOrFail($this->id_produk)->update([
            'stok' => $produk->stok - $this->jumlah
        ]);

        if($produk_exist){
            $data = [
                'id_penjualan' => $this->id_penjualan,
                'id_produk' => $this->id_produk,
                'jumlah_produk' => $this->jumlah + $produk_exist->jumlah_produk,
                'sub_total' => $sub_total + $produk_exist->sub_total
            ];

            DetailPenjualan::findOrFail($produk_exist->id)->update($data);
        }else{
            $data = [
                'id_penjualan' => $this->id_penjualan,
                'id_produk' => $this->id_produk,
                'jumlah_produk' => $this->jumlah,
                'sub_total' => $sub_total
            ];

            DetailPenjualan::create($data);
        }

        $penjualan = Penjualan::findOrFail($this->id_penjualan)->first();

        Penjualan::findOrFail($this->id_penjualan)->update([
            'total_harga' => $penjualan->total_harga + $sub_total
        ]);

        $this->clear_form();
    }

    public function clear_form(){
        $this->jumlah = '';
        $this->id_produk = '';
    }
}
