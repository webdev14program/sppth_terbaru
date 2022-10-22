<a class="btn btn-success text-uppercase font-weight-bold mb-3" href="<?= base_url() ?>Dashboard/rekap_spp_perbulan_perhari">kembali</a>
<div class="row">
    <div class="col-md">
        <div class="alert alert-success" role="alert">
            <h5 class="text-center text-uppercase font-weight-bold">Rekap SPP Admin per hari</h5>
            <h5 class="text-center text-uppercase font-weight-bold"><?= $header['nama_bulan'] ?> <?= $header['tahun'] ?></h5>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">
                                    <h6 class="font-weight-bold" style="text-transform: uppercase;">#</h6>
                                </th>
                                <th scope="col">
                                    <h6 class="font-weight-bold" style="text-transform: uppercase;">Tanggal</h6>
                                </th>
                                <th scope="col">
                                    <h6 class="font-weight-bold" style="text-transform: uppercase;">Bulan</h6>
                                </th>
                                <th scope="col">
                                    <h6 class="font-weight-bold" style="text-transform: uppercase;">Tahun</h6>
                                </th>
                                <th scope="col">
                                    <h6 class="font-weight-bold" style="text-transform: uppercase;">Non KJP</h6>
                                </th>
                                <th scope="col">
                                    <h6 class="font-weight-bold" style="text-transform: uppercase;">KJP Cash</h6>
                                </th>
                                <th scope="col">
                                    <h6 class="font-weight-bold" style="text-transform: uppercase;">Total Pembayaran</h6>
                                </th>
                                <th scope="col">
                                    <h6 class="font-weight-bold" style="text-transform: uppercase;">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <?php
                                $no = 1;
                                foreach ($tabel_perhari as $row) {
                                ?>
                                    <td class="text-centers">
                                        <h6><?php echo $no++; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="text-uppercase text-center"><?php echo $row['tanggal_spp']; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="text-uppercase text-center"><?php echo $row['bulan_spp']; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="text-uppercase"><?php echo $row['tahun_spp']; ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="text-uppercase"><?= $hasil_rupiah = "Rp " . number_format($row['cash_non_kjp'], 2, ',', '.') ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="text-uppercase"><?= $hasil_rupiah = "Rp " . number_format($row['kjp_cash'], 2, ',', '.') ?></h6>
                                    </td>
                                    <td>
                                        <h6 class="text-uppercase"><?= $hasil_rupiah = "Rp " . number_format($row['total_pembayarn'], 2, ',', '.') ?></h6>
                                    </td>
                                    <th>
                                        <h5 class="text-center">
                                            <a class="btn btn-danger btn-sm text-uppercase text-white font-weight-bold" href="<?= base_url() ?>Dashboard/print_perhari_pembayaran_spp/<?= $row['hari_bulan_tahun'] ?>" target="_blank"><i class="fas fa-print"></i> Print</a>
                                        </h5>
                                    </th>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>