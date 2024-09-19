<div>
    <div class="page-heading">
        <h3>Ringkasan</h3>
    </div>
    <section class="section">
        <div class="card">
            <!-- Flash Message Notification -->
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-header">
                <a wire:click="show_create_form" class="btn btn-primary">Tambah Ringkasan</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bulan Tahun</th>
                                <th>Total Pemasukan</th>
                                <th>Total Pengeluaran</th>
                                <th>Saldo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ringkasan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->bulan_tahun }}</td>
                                    <td>{{ 'Rp. ' . number_format($item->total_pemasukan, 0, '.', '.') }}</td>
                                    <td>{{ 'Rp. ' . number_format($item->total_pengeluaran, 0, '.', '.') }}</td>
                                    <td>{{ 'Rp. ' . number_format($item->saldo, 0, '.', '.') }}</td>
                                    <td>
                                        <a wire:click="show_edit_form({{ $item->id }})"
                                            class="btn btn-warning text-center">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a wire:click="delete({{ $item->id }})"
                                            onclick="return confirm('Anda yakin Menghapus data?')"
                                            class="btn
                                            btn-danger text-center"><i
                                                class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
