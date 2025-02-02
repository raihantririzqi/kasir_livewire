<?php

namespace App\Livewire;

use App\Models\Pelanggan as ModelsPelanggan;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Pelanggan extends Component
{
    public $nama_pelanggan, $alamat, $nomor_telepon, $id;
    #[Layout('master')]
    public function render()
    {
        $no = 1;
        $data = ModelsPelanggan::all();
        return view('livewire.pelanggan', ['data' => $data, 'no' => $no]);
    }

    public function show($id){
        $data = ModelsPelanggan::findOrFail($id)->first();
        $this->nama_pelanggan = $data->nama_pelanggan;
        $this->alamat = $data->alamat;
        $this->nomor_telepon = $data->nomor_telepon;
        $this->id = $data->id;
    }

    public function update(){
        $data = [
            'nama_pelanggan' =>  $this->nama_pelanggan,
            'alamat' => $this->alamat,
            'nomor_telepon' => $this->nomor_telepon
        ];
        ModelsPelanggan::findOrFail($this->id)->update($data);
    }

    public function store(){
        $data = [
            'nama_pelanggan' =>  $this->nama_pelanggan,
            'alamat' => $this->alamat,
            'nomor_telepon' => $this->nomor_telepon
        ];
        ModelsPelanggan::create($data);
        $this->clear_form();
    }

    public function destoy($id){
        ModelsPelanggan::findOrFail($id)->delete();
    }

    public function clear_form(){
        $this->nama_pelanggan = '';
        $this->alamat = '';
        $this->nomor_telepon = '';
    }
}
