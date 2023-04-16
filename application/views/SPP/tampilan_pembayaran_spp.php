<div class="alert alert-success" role="alert">
    <h5 class="text-center text-uppercase font-weight-bold">pembayaran administrasi sekolah</h5>
</div>

<div class="card mt-2 mb-2">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-uppercase font-weight-bold">
                        <th class="text-center">#</th>
                        <th>id siswa</th>
                        <th>nis</th>
                        <th>nama siswa</th>
                        <th>Jurusan</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($siswa as $row) {
                        ?>
                            <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['id_siswa']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['nis']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['nama_siswa']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['jurusan']; ?></td>
                            <td>
                                <h5 class="text-center">
                                    <a class="btn btn-sm btn-success" href="<?= base_url() ?>Dashboard/pembayaran_spp_per_nis/<?= $row['nis'] ?>">Detail</a>
                                </h5>
                            </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>