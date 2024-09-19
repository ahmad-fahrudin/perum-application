<div>
    <div class="page-heading">
        <h3>Data Pembayaran</h3>
    </div>
    <section class="section">
        <div class="card">
            <div wire:loading wire:target="show_create_form">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Loading...
            </div>
            <!-- Flash Message Notification -->
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-header">
                <a wire:click="show_create_form" class="btn btn-primary">Tambah Baru</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Rumah</th>
                                <th>Iuran</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Jenis</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->rumah->nama }}</td>
                                    <td>{{ $item->iuran->jenis_iuran }}</td>
                                    <td>{{ $item->tanggal_pembayaran }}</td>
                                    <td>{{ 'Rp. ' . number_format($item->jumlah_pembayaran, 0, '.', '.') }}</td>
                                    <td>{{ $item->jenis_pembayaran }}</td>
                                    <td>
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
