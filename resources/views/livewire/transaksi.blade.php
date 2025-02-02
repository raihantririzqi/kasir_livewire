<div class="container">
    <div class="my-3">
        <div class="border rounded mb-3 p-3">
            <div class="fs-1">
                {{ $total_harga }}
            </div>
        </div>
        @if (session('error'))
            <div class="bg-danger mb-3 p-2 col-md-2 text-center text-white">
                {{ session('error') }}
            </div>
        @endif
        <div>
            <div class="row mb-3">
                <div class="col">
                    <div>
                        <select wire:model.live="id_produk" class="form-select">
                            <option value="">Pilih Produk</option>
                            @foreach ($produk as $row)
                            <option value="{{ $row->id }}">{{ $row->nama_produk }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" placeholder="Jumlah" wire:model.live="jumlah">
                        <label for="">Jumlah</label>
                    </div>
                </div>
            </div>
            <div>
                <button wire:click="beli_produk" class="btn btn-primary">Tambah</button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Nama Pelanggan</td>
                        <td>Nama Produk</td>
                        <td>Sub Total</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_penjualan as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->nama_pelanggan }}</td>
                        <td>{{ $row->nama_produk }}</td>
                        <td>{{ $row->sub_total }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
