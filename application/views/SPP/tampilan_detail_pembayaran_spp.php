<div class="alert alert-success" role="alert">
    <h5 class="text-center text-uppercase font-weight-bold">detail pembayaran spp</h5>
</div>

<a class="btn btn-sm btn-success text-uppercase font-weight-bold mb-2" href="<?= base_url() ?>Dashboard/pembayaran_spp">kembali</a>
<div class="card">
    <div class="card-header">
        <table class="table border">
            <tbody>
                <tr>
                    <td class="font-weight-bold text-uppercase">Nama Siswa</td>
                    <td class="font-weight-bold text-uppercase"> : <?= $siswa['nama_siswa'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-uppercase">Kelas</td>
                    <td class="font-weight-bold text-uppercase"> : <?= $siswa['kelas'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-uppercase">Jurusan</td>
                    <td class="font-weight-bold text-uppercase"> : <?= $siswa['jurusan'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-uppercase">Tahun AJaran</td>
                    <td class="font-weight-bold text-uppercase"> : <?= $siswa['tahun_ajaran'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <h6 class="text-danger text-uppercase font-weight-bold text-center">jika belum ada data tagihan pembayaran spp, silahakan click generate di samping , agar dapat ter-generate daftar tagihan pembayaran spp</h6>
            </div>
            <div class="col-md-4">
                <h5 class="text-center">
                    <a class="btn btn-primary btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/generate_detail_pembayaran_spp/<?= $siswa['siswa_tahun_ajaran'] ?>"> <i class="fas fa-sync-alt"></i> generate</a>
                </h5>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center text-uppercase">
                            <th scope="col">Nomor</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">status</th>
                            <th scope="col">Jenis Pembayaran</th>
                            <th scope="col">nominal</th>
                            <th scope="col">NON KJP</th>
                            <th scope="col">KJP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $no = 1;
                            foreach ($siswa_spp as $row) {
                            ?>
                                <td class="text-center text-uppercase font-weight-bold"><?= $no++; ?></td>
                                <td class="text-center text-uppercase font-weight-bold"><?= $row['bulan']; ?></td>
                                <td class="text-center text-uppercase font-weight-bold"><?= $row['status']; ?> </td>
                                <td class="text-center text-uppercase font-weight-bold"><?= $row['pembayaran']; ?> </td>
                                <td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['nominal'], 2, ',', '.') ?></td>
                                <td>
                                    <form action="<?= base_url() ?>Dashboard/bayar_spp_nonKJP/<?= $row['id_spp_siswa'] ?>" method="POST">
                                        <input type="text" class="form-control text-uppercase" name="id_spp_siswa" value="<?= $row['id_spp_siswa'] ?>" hidden>
                                        <input type="text" class="form-control text-uppercase" name="id_siswa" value="<?= $row['id_siswa'] ?>" hidden>
                                        <input type="text" class="form-control text-uppercase" name="kode_bulan" value="<?= $row['kode_bulan'] ?>" hidden>
                                        <input type="text" class="form-control text-uppercase" name="bulan" value="<?= $row['bulan'] ?>" hidden>
                                        <!-- <input type="text" class="form-control text-uppercase" name="status" hidden> -->
                                        <h5 class="text-center"><button type="submit" class="btn btn-primary btn-sm btn-block">NON KJP</button></h5>
                                    </form>
                                </td>
                                <td>
                                    <form action="<?= base_url() ?>Dashboard/bayar_spp_KJP/<?= $row['id_spp_siswa'] ?>" method="POST">
                                        <input type="text" class="form-control text-uppercase" name="id_spp_siswa" value="<?= $row['id_spp_siswa'] ?>" hidden>
                                        <input type="text" class="form-control text-uppercase" name="id_siswa" value="<?= $row['id_siswa'] ?>" hidden>
                                        <input type="text" class="form-control text-uppercase" name="kode_bulan" value="<?= $row['kode_bulan'] ?>" hidden>
                                        <input type="text" class="form-control text-uppercase" name="bulan" value="<?= $row['bulan'] ?>" hidden>
                                        <!-- <input type="text" class="form-control text-uppercase" name="status" hidden> -->
                                        <h5 class="text-center"><button type="submit" class="btn btn-danger btn-sm btn-block">KJP</button></h5>
                                    </form>
                                </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>