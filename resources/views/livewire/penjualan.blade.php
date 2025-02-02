<div class="container">
    <div class="my-3">
        <div class="mb-3">
            <select wire:model.live="id_pelanggan" id="" class="form-select mb-3">
                <option value="">Pilih Pelanggan</option>
                @foreach ($pelanggan as $row)
                <option value="{{ $row->id }}">{{ $row->nama_pelanggan }}</option>
                @endforeach
            </select>
            <div>
                <button class="btn btn-outline-success" wire:click="create_penjualan">Next</button>
            </div>
        </div>
    </div>
</div>
