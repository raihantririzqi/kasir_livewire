<div class="container">
    <button class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#modal_add">
        Tambah
    </button>
    <table class="table">
        <thead>
            <tr>
                <td>No.</td>
                <td>Nama Produk</td>
                <td>Harga</td>
                <td>Stok</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->nama_produk }}</td>
                <td>{{ $row->harga }}</td>
                <td>{{ $row->stok }}</td>
                <td>
                    <button class="btn btn-success" data-bs-target="#modal_edit" data-bs-toggle="modal" wire:click="show({{ $row->id }})">Edit</button>
                    <button class="btn btn-danger" wire:click="destoy({{ $row->id }})">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="modal_add" wire:ignore>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Form Add Pelanggan</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="close" wire:click="clear_form"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Nama Produk" wire:model.live="nama_produk">
                                    <label for="">Nama Produk</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Harga" wire:model.live="harga">
                                    <label for="">Harga</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Stok" wire:model.live="stok"/>
                                    <label for="">Stok</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" wire:click="store">Tambah</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal" wire:click="clear_form">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_edit" wire:ignore>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Form Edit Pelanggan</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="close" wire:click="clear_form"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Nama Produk" wire:model.live="nama_produk">
                                    <label for="">Nama Produk</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Harga" wire:model.live="harga">
                                    <label for="">Harga</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Stok" wire:model.live="stok">
                                    <label for="">Stok</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" wire:click="update">Update</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal" wire:click="clear_form">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
