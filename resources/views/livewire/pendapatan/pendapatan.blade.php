<div>
    <div class="page-heading">
        <h3>Pendapatan</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Rumah</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->rumah->nama }}</td>
                                    <td>{{ 'Rp. ' . number_format($item->jumlah_pembayaran, 0, '.', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-center font-weight-bold"><strong>TOTAL</strong></td>
                                <td colspan="1">
                                    <strong>{{ 'Rp. ' . number_format($totalPendapatan, 0, '.', '.') }}</strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
