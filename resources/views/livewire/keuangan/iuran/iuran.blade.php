<div>
    <div class="page-heading">
        <h3>Data Iuran</h3>
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
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Jenis Iuran</th>
                                <th>Nominal <sub>/Bulan</sub></th>
                                {{-- <th>Opsi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($iuran as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->jenis_iuran }}</td>
                                    <td>{{ 'Rp. ' . number_format($item->nominal, 0, '.', '.') }}</td>
                                    {{-- <td>
                                        <a wire:click="show_edit_form({{ $item->id }})"
                                            class="btn btn-warning text-center">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
