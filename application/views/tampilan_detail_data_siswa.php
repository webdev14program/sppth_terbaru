<div class="alert alert-success" role="alert">
    <h5 class="text-center text-uppercase font-weight-bold">siswa</h5>
    <h5 class="text-center text-uppercase font-weight-bold"><?= $header_siswa['tahun_ajaran'] ?></h5>
</div>
<a class="btn btn-success btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/data_siswa">kembali</a>
<div class="card mt-2">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-uppercase font-weight-bold">
                        <th>#</th>
                        <th>NIS</th>
                        <th>nama siswa</th>
                        <th>jurusan</th>
                        <th>kelas</th>
                        <th>group</th>
                        <th>tahun ajaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($data_siswa as $row) {
                        ?>
                            <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['nis']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['nama_siswa']; ?></td>
                            <td class=" text-uppercase font-weight-bold"><?= $row['jurusan']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['kelas']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['nama_group']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['tahun_ajaran']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>