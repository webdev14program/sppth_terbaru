<div class="alert alert-dark" role="alert">
    <h5 class="text-center text-uppercase font-weight-bold">setting pembayaran administrasi lain <br><?= $header['tahun_ajaran'] ?></h5>
</div>


<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <h5 class="text-uppercase">
                    <a class="btn btn-primary btn-sm font-weight-bold" href="<?= base_url() ?>Setting/setting_adm_lain">Kembali</a>
                </h5>
            </div>
        </div>
    </div>
</div>

<div class="card mt-2">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-uppercase text-center font-weight-bold">
                        <th>#</th>
                        <th>id pembayaran</th>
                        <th>jenis pembayaran</th>
                        <th>Grup kelas</th>
                        <th>nominal</th>
                        <th>tahun ajaran</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($setting_pembayaran as $row) {
                        ?>
                            <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['id_setting_pembayaran_lain']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['nama_pembayaran_lain']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['nama_group']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['nominal'], 2, ',', '.') ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['tahun_ajaran']; ?></td>
                            <td>
                                <h5 class="text-center">
                                    <a class="btn btn-danger btn-sm  text-uppercase" href="<?= base_url() ?>Setting/hapus_setting_pembayaran_adm_lain/<?= $row['id_setting_pembayaran_lain'] ?>"><i class="fas fa-trash"></i></a>
                                </h5>
                            </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>