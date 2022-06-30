<div class="alert alert-success" role="alert">
    <h5 class="text-center text-uppercase font-weight-bold">pembayaran spp</h5>
</div>

<div class="card mt-2">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-uppercase font-weight-bold">
                        <th class="text-center">#</th>
                        <th>id siswa</th>
                        <th>nis</th>
                        <th>nama siswa</th>
                        <th>kelas</th>
                        <th>group</th>
                        <th>tahun ajaran</th>
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
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['kelas']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['nama_group']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['tahun_ajaran']; ?></td>
                            <td>
                                <h5 class="text-center">
                                    <a class="btn btn-sm btn-success" href="<?= base_url() ?>Dashboard/detail_pembayaran_spp/<?= $row['siswa_tahun_ajaran'] ?>">Detail</a>
                                </h5>
                            </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>