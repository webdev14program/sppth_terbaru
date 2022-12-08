<div class="row">
    <div class="col-md">
        <div class="alert alert-success" role="alert">
            <h5 class="text-center text-uppercase font-weight-bold">Rekap SPP Admin perbulan</h5>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <table class="table table-striped table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Total Siswa</th>
                    <th scope="col">Total NON KJP</th>
                    <th scope="col">Total KJP CASH</th>
                    <th scope="col">Total Pembayaran</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $no = 1;
                    foreach ($spp_perbulan_perbulan as $row) {
                    ?>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $row['bulan']; ?></td>
                        <td><?= $row['tahun']; ?></td>
                        <td><?= $row['jumlah_siswa']; ?> Siswa</td>
                        <td><?= $hasil_rupiah = "Rp " . number_format($row['cash'], 2, ',', '.') ?></td>
                        <td><?= $hasil_rupiah = "Rp " . number_format($row['kjp_cash'], 2, ',', '.') ?></td>
                        <td><?= $hasil_rupiah = "Rp " . number_format($row['total_pembayaran'], 2, ',', '.') ?></td>
                        <td class="text-center"><a class="btn btn-danger btn-sm" href="<?= base_url() ?>Dashboard/print_perbulan_pembayaran_spp/<?= $row['bulan_tahun'] ?>" target="_blank"><i class="fas fa-print"></i> Print</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>