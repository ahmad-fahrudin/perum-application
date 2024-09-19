<div>
    <div class="page-heading">
        <h3>Edit Ringkasan Bulanan</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a wire:click="show_index" class="btn btn-secondary">Kembali</a>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="editRingkasan">
                    <!-- Bulan Tahun -->
                    <div class="form-group">
                        <label for="bulan_tahun">Bulan Tahun</label>
                        <input type="text" id="bulan_tahun" class="form-control" wire:model.lazy="bulan_tahun"
                            placeholder="Masukkan Bulan dan Tahun">
                        @error('bulan_tahun')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Total Pemasukan -->
                    <div class="form-group">
                        <label for="total_pemasukan">Total Pemasukan</label>
                        <input type="number" id="total_pemasukan" class="form-control"
                            wire:model.lazy="total_pemasukan" placeholder="Masukkan Total Pemasukan">
                        @error('total_pemasukan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Total Pengeluaran -->
                    <div class="form-group">
                        <label for="total_pengeluaran">Total Pengeluaran</label>
                        <input type="number" id="total_pengeluaran" class="form-control"
                            wire:model.lazy="total_pengeluaran" placeholder="Masukkan Total Pengeluaran">
                        @error('total_pengeluaran')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Saldo -->
                    <div class="form-group">
                        <label for="saldo">Saldo</label>
                        <input type="number" id="saldo" class="form-control" wire:model.lazy="saldo"
                            placeholder="Masukkan Saldo">
                        @error('saldo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
</div>
