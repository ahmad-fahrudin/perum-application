<div>
    <div class="page-heading">
        <h3>Create Penghuni</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a wire:click="show_index" class="btn btn-secondary">Kembali</a>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="createPenghuni" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Nama Lengkap -->
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" id="nama_lengkap" class="form-control"
                                    wire:model.lazy="nama_lengkap" placeholder="Masukkan nama lengkap">
                                @error('nama_lengkap')
                                    <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Status Kontrak -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status_kontrak">Status Kontrak</label>
                                <select id="status_kontrak" wire:model.lazy="status_kontrak" class="form-control">
                                    <option selected>-----Pilih Status Kontrak-----</option>
                                    <option value="Kontrak">Kontrak</option>
                                    <option value="Tetap">Tetap</option>
                                </select>
                                @error('status_kontrak')
                                    <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" wire:model.lazy="alamat" cols="50" rows="4" class="form-control"
                            placeholder="Masukkan alamat"></textarea>
                        @error('alamat')
                            <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <!-- Status Menikah -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status_menikah">Status Menikah</label>
                                <select id="status_menikah" wire:model.lazy="status_menikah" class="form-control">
                                    <option selected>-----Pilih Status Menikah-----</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                </select>
                                @error('status_menikah')
                                    <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Tanggal Masuk -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_masuk">Tanggal Masuk</label>
                                <input type="date" id="tanggal_masuk" wire:model.lazy="tanggal_masuk"
                                    class="form-control">
                                @error('tanggal_masuk')
                                    <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Upload Foto KTP -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto_ktp">Upload Foto KTP</label>
                                <input type="file" id="foto_ktp" wire:model.lazy="foto_ktp" class="form-control">
                                @error('foto_ktp')
                                    <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                                @enderror
                                <div wire:loading wire:target="foto_ktp" class="text-info">
                                    Uploading...
                                </div>
                            </div>
                        </div>

                        <!-- Preview Image -->
                        <div class="col-md-4">
                            <div class="form-group">
                                @if ($foto_ktp)
                                    <img src="{{ $foto_ktp->temporaryUrl() }}" style="width: 150px"
                                        class="rounded-circle avatar-lg img-thumbnail" alt="profile-image"
                                        id="showImage">
                                @else
                                    <img src="{{ url('no_image.jpg') }}" style="width: 100px"
                                        class="rounded-circle avatar-lg img-thumbnail" alt="profile-image"
                                        id="showImage">
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="form-group">
                        <label for="nomor_telepon">Nomor Telepon</label>
                        <input type="text" id="nomor_telepon" wire:model.lazy="nomor_telepon" class="form-control"
                            placeholder="Masukkan nomor telepon">
                        @error('nomor_telepon')
                            <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status Iuran Bulanan -->
                    <div class="form-group">
                        <label for="status_iuran_bulanan">Status Iuran Bulanan</label>
                        <select id="status_iuran_bulanan" wire:model.lazy="status_iuran_bulanan" class="form-control">
                            <option selected>-----Pilih Status Iuran Bulanan-----</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                        @error('status_iuran_bulanan')
                            <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                        @enderror
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
