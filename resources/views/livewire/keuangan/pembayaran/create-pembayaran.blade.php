<div>
    <div class="page-heading">
        <h3>Create Pembayaran</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a wire:click="show_index" class="btn btn-secondary">Kembali</a>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="createPembayaran" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Rumah -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rumah_id">Rumah</label>
                                <select id="rumah_id" wire:model.lazy="rumah_id" class="form-control">
                                    <option selected>-----Pilih Rumah-----</option>
                                    @foreach ($rumahList as $rumah)
                                        <option value="{{ $rumah->id }}">{{ $rumah->nama }}</option>
                                    @endforeach
                                </select>
                                @error('rumah_id')
                                    <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Iuran -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="iuran_id">Jenis Iuran</label>
                                <select id="iuran_id" wire:model.lazy="iuran_id" class="form-control">
                                    <option selected>-----Pilih Iuran-----</option>
                                    @foreach ($iuranList as $iuran)
                                        <option value="{{ $iuran->id }}">{{ $iuran->jenis_iuran }}</option>
                                    @endforeach
                                </select>
                                @error('iuran_id')
                                    <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Tanggal Pembayaran -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
                                <input type="date" id="tanggal_pembayaran" wire:model.lazy="tanggal_pembayaran"
                                    class="form-control">
                                @error('tanggal_pembayaran')
                                    <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Jumlah Pembayaran -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jumlah_pembayaran">Jumlah Pembayaran</label>
                                <input type="number" id="jumlah_pembayaran" wire:model.lazy="jumlah_pembayaran"
                                    class="form-control" placeholder="Masukkan jumlah pembayaran">
                                @error('jumlah_pembayaran')
                                    <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Jenis Pembayaran -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_pembayaran">Jenis Pembayaran</label>
                                <select id="jenis_pembayaran" wire:model.lazy="jenis_pembayaran" class="form-control">
                                    <option selected>-----Pilih Jenis Pembayaran-----</option>
                                    <option value="Bulanan">Bulanan</option>
                                    <option value="Tahunan">Tahunan</option>
                                </select>
                                @error('jenis_pembayaran')
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
