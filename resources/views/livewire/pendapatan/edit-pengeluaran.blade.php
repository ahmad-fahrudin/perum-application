<div>
    <div class="page-heading">
        <h3>Edit Pengeluaran</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a wire:click="show_index" class="btn btn-secondary">Kembali</a>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="editPengeluaran">
                    <!-- Deskripsi -->
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea cols="50" rows="4" class="form-control" wire:model.lazy="deskripsi"
                            placeholder="Masukkan deskripsi"></textarea>
                        @error('deskripsi')
                            <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Jumlah -->
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" id="jumlah" class="form-control" wire:model.lazy="jumlah"
                            placeholder="Masukkan jumlah">
                        @error('jumlah')
                            <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tanggal Pengeluaran -->
                    <div class="form-group">
                        <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label>
                        <input type="date" id="tanggal_pengeluaran" class="form-control"
                            wire:model.lazy="tanggal_pengeluaran">
                        @error('tanggal_pengeluaran')
                            <span class="text-red-500 text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tombol Update -->
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
</div>
