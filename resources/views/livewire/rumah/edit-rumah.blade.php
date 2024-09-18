<div>
    <div class="page-heading">
        <h3>Edit Rumah</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a wire:click="show_index" class="btn btn-secondary">Kembali</a>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="editRumah">
                    <div class="row">
                        <!-- Nama Rumah -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Nama Rumah</label>
                                <input type="text" id="nama" class="form-control" wire:model.lazy="nama"
                                    placeholder="Masukkan nama rumah">
                                @error('nama')
                                    <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="flex">
                        <a wire:click="show_index" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
            <!-- Flash Message Notification -->
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </section>
</div>
