<?php

namespace App\Livewire;

use App\Models\Produk as ModelsProduk;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Produk extends Component
{
    public $nama_produk, $harga, $stok, $id;
    #[Layout('master')]
    public function render()
    {
        $data = ModelsProduk::all();
        $no = 1;
        return view('livewire.produk', ['data' => $data, 'no' => $no]);
    }

    public function show($id){
        $data = ModelsProduk::findOrFail($id)->first();
        $this->nama_produk = $data->nama_produk;
        $this->harga = $data->harga;
        $this->stok = $data->stok;
        $this->id = $data->id;
    }

    public function update(){
        $data = [
            'nama_produk' =>  $this->nama_produk,
            'harga' => $this->harga,
            'stok' => $this->stok
        ];
        ModelsProduk::findOrFail($this->id)->update($data);
    }

    public function store(){
        $data = [
            'nama_produk' =>  $this->nama_produk,
            'harga' => $this->harga,
            'stok' => $this->stok
        ];
        ModelsProduk::create($data);
        $this->clear_form();
    }

    public function destoy($id){
        ModelsProduk::findOrFail($id)->delete();
    }

    public function clear_form(){
        $this->nama_produk = '';
        $this->harga = '';
        $this->stok = '';
    }
}
