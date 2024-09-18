<div>
    <div class="page-heading">
        <h3>Create Rumah</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a wire:click="show_index" class="btn btn-secondary">Kembali</a>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="createRumah">
                    <div class="row">
                        <!-- Nomor Rumah -->
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="nama">Nama Rumah</label>
                                <input type="text" id="nama" class="form-control" wire:model.lazy="nama"
                                    placeholder="Masukkan nama rumah">
                                @error('nama')
                                    <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Status Rumah -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Status Rumah</label>
                                <select id="status" wire:model.lazy="status" class="form-control">
                                    <option selected>-----Pilih Status Rumah-----</option>
                                    <option value="Dihuni">Dihuni</option>
                                    <option value="Tidak Dihuni">Tidak Dihuni</option>
                                </select>
                                @error('status')
                                    <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="flex">
                        <a wire:click="show_index" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
