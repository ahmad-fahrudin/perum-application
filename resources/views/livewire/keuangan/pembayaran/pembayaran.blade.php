<div>
    <div class="page-heading">
        <h3>Semua Penghuni</h3>
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
                                <th>Nama</th>
                                <th>Foto KTP</th>
                                <th>Rumah</th>
                                <th>Status Kontrak</th>
                                <th>Telepon</th>
                                <th>Tanggal Masuk</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penghuni as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td><img src="{{ asset($item->foto_ktp) }}" alt=""
                                            style="width: 75px; height:50px;">
                                    </td>
                                    <td>{{ $item->rumah->nama }}</td>
                                    <td>{{ $item->status_kontrak }}</td>
                                    <td>{{ $item->telepon }}</td>
                                    <td>{{ $item->tanggal_masuk }}</td>
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
