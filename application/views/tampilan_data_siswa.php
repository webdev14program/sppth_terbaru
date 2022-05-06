<div class="alert alert-success" role="alert">
    <h5 class="text-center text-uppercase font-weight-bold">siswa</h5>
</div>

<div class="card mt-2">
    <div class="card-body">
        <button type="button" class="btn btn-primary btn-sm text-uppercase" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-plus-square"></i> tambah siswa
        </button>
    </div>
</div>

<div class="card mt-2">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center text-uppercase font-weight-bold">
                        <th>#</th>
                        <th>ID Siswa Siswa</th>
                        <th>Nama Siswa</th>
                        <th>Rombel</th>
                        <th>Group Rombel</th>
                        <th>Jurusan</th>
                        <th>Tahun Ajaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($siswa as $row) {
                        ?>
                            <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['nis']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['nama_siswa']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['kelas']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['nama_group']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['jurusan']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['tahun_ajaran']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Dashboard/save_siswa" method="POST">
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" class="form-control" name="nis">
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_siswa">
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select class="form-control" name="jurusan">
                            <option class="bg-info text-white" disabled>PILIH JURUSAN</option>
                            <?php foreach ($jurusan as $row) { ?>
                                <option value="<?= $row['id']; ?>"><?= $row['id']; ?> | <?= $row['jurusan']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="kelas">
                            <option class="bg-info text-white" disabled>PILIH KELAS</option>
                            <?php foreach ($kelas as $row) { ?>
                                <option value="<?= $row['id']; ?>"><?= $row['id']; ?> | <?= $row['kelas']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Group Kelas</label>
                        <select class="form-control" name="group_kelas">
                            <option class="bg-info text-white" disabled>PILIH GROUP KELAS</option>
                            <?php foreach ($group_kelas as $row) { ?>
                                <option value="<?= $row['id_groupKelas']; ?>"><?= $row['id_groupKelas']; ?> | <?= $row['nama_group']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>



                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <select class="form-control" name="tahun_ajaran">
                            <option class="bg-info text-white" disabled>PILIH TAHUN AJARAN</option>
                            <?php foreach ($tahun_ajaran as $row) { ?>
                                <option value="<?= $row['id_tahun_ajaran']; ?>"><?= $row['id_tahun_ajaran']; ?> | <?= $row['tahun_ajaran']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>