<?php

namespace App\Livewire;

use App\Models\Pelanggan;
use App\Models\Penjualan as ModelsPenjualan;
use Illuminate\Support\Facades\Date;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Penjualan extends Component
{
    public $id_pelanggan;
    #[Layout('master')]
    public function render()
    {
        $pelanggan = Pelanggan::all();
        return view('livewire.penjualan', ['pelanggan' => $pelanggan]);
    }

    public function create_penjualan(){
        $date = now();
        $penjualan = ModelsPenjualan::where('id_pelanggan', '=', $this->id_pelanggan)
                                    ->whereDate('tanggal_penjualan', '=', $date)
                                    ->first();

        if($penjualan){
            return redirect('/transaksi/'.$penjualan->id);
        }else{
            $data = [
                'tanggal_penjualan' => now(),
                'total_harga' => 0,
                'id_pelanggan' => $this->id_pelanggan
            ];

            $pejualan_create = ModelsPenjualan::create($data);
            return redirect('/transaksi/'.$pejualan_create->id);
        }
    }
}
