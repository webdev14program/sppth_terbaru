<div class="alert alert-success" role="alert">
    <h5 class="text-center text-uppercase font-weight-bold">siswa</h5>
</div>

<div class="card mt-2">
    <div class="card-body">
        <button type="button" class="btn btn-primary btn-sm text-uppercase" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-plus-square"></i> tambah siswa
        </button>
        <button type="button" class="btn btn-success btn-sm text-uppercase font-weight-bold" data-toggle="modal" data-target="#uploadSiswa">
            <i class="fas fa-plus-square"></i> Upload siswa
        </button>
        <a class="btn btn-danger btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/hapus_all_siswa"><i class="fas fa-trash"></i> Hapus Siswa</a>
    </div>
</div>



<?= $this->session->flashdata('pesan') ?>

<div class="card mt-2">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center text-uppercase font-weight-bold">
                        <th>#</th>
                        <th>ID tahun ajaran kelas</th>
                        <th>tahun ajaran</th>
                        <th>jumlah siswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($siswa as $row) {
                        ?>
                            <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['id_tahun_ajaran']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['tahun_ajaran']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['jumlah_siswa']; ?> Siswa</td>
                            <td>
                                <h5 class="text-center">
                                    <a class="btn btn-primary btn-sm" href="<?= base_url() ?>Dashboard/detail_data_siswa/<?= $row['id_tahun_ajaran']; ?>">Detail</a>
                                </h5>
                            </td>
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
                                <option value="<?= $row['kode']; ?>"><?= $row['kode']; ?> | <?= $row['jurusan']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="kelas">
                            <option class="bg-info text-white" disabled>PILIH KELAS</option>
                            <?php foreach ($kelas as $row) { ?>
                                <option value="<?= $row['kelas']; ?>"><?= $row['id']; ?> | <?= $row['kelas']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Group Kelas</label>
                        <select class="form-control" name="group_kelas">
                            <option class="bg-info text-white" disabled>PILIH GROUP KELAS</option>
                            <?php foreach ($group_kelas as $row) { ?>
                                <option value="<?= $row['nama_group']; ?>"><?= $row['id_groupKelas']; ?> | <?= $row['nama_group']; ?> </option>
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

<div class="modal fade" id="uploadSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Upload Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('Dashboard/upload_siswa'); ?>
                <div class="form-group">
                    <input type="file" name="excel" class="form-control-file" name="file" required accept=".xlsx">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" value="upload" class="btn btn-primary">Upload</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>