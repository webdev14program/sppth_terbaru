<div class="alert alert-success" role="alert">
    <h5 class="text-center text-uppercase font-weight-bold">detail pembayaran administrasi lain</h5>
</div>
<a class="btn btn-sm btn-success text-uppercase font-weight-bold mb-2" href="<?= base_url() ?>Dashboard/pembayaran_spp_per_nis/<?= $header['nis'] ?>">kembali</a>
<div class="card">
    <div class="card-header bg-danger text-white">
        <h5 class="text-uppercase font-weight-bold">Nama Siswa : <?= $header['nama_siswa'] ?></h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="text-center text-uppercase">
                                <th scope="col">Nomor</th>
                                <th scope="col">ID ADM LAIN</th>
                                <th scope="col">Nama Pembaran</th>
                                <th scope="col">Nominal</th>
                                <th scope="col">Group Kelas</th>
                                <th scope="col">Tahun Ajaran</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                foreach ($adm_lain as $row) {
                                ?>
                                    <td class="text-center text-uppercase font-weight-bold"><?= $no++; ?></td>
                                    <td class="text-center text-uppercase font-weight-bold"><?= $row['id_setting_pembayaran_lain']; ?></td>
                                    <td class="text-center text-uppercase font-weight-bold"><?= $row['nama_pembayaran_lain']; ?></td>
                                    <td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['nominal'], 0, ',', '.') ?></td>
                                    <td class="text-center text-uppercase font-weight-bold"><?= $row['nama_group']; ?></td>
                                    <td class="text-center text-uppercase font-weight-bold"><?= $row['tahun_ajaran']; ?></td>
                                    <td>
                                        <h5 class="text-center">
                                            <a class="btn btn-danger btn-sm text-uppercase font-weight-bold" href="#">Cash</a>
                                            <a class="btn btn-success btn-sm text-uppercase font-weight-bold" href="#">cicil</a>
                                            <a class="btn btn-primary btn-sm text-uppercase font-weight-bold" href="#">kjp</a>
                                        </h5>
                                    </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>