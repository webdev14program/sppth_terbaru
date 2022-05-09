<div class="alert alert-success" role="alert">
    <h5 class="text-center text-uppercase font-weight-bold">setting pembayaran</h5>
</div>

<div class="card mt-2">
    <div class="card-body">
        <button type="button" class="btn btn-primary btn-sm text-uppercase font-weight-bold" data-toggle="modal" data-target="#tambahPembayaran">
            tambah Pembayaran
        </button>
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
                        <th>nama pembayaran</th>
                        <th>jenis pembayaran</th>
                        <th>Grup kelas</th>
                        <th>nominal</th>
                        <th>tahun ajaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($setting_pembayaran as $row) {
                        ?>
                            <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['id_setting_pembayaran']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['nama_pembayaran']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['jenis_pembayaran']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['nama_group']; ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['nominal'], 2, ',', '.') ?></td>
                            <td class="text-center text-uppercase font-weight-bold"><?= $row['tahun_ajaran']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-uppercase font-weight-bold text-white">tambah Pembayaran</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Dashboard/simpan_setting_pembayaran" method="POST">
                    <div class="form-group">
                        <label>Nama Pembayaran</label>
                        <input type="text" name="nama_pembayaran" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Group Kelas</label>
                        <select class="form-control" name="group_kelas">
                            <option class="bg-info text-white" disabled>PILIH GROUP KELAS</option>
                            <?php foreach ($kelas as $row) { ?>
                                <option value="<?= $row['id_groupKelas']; ?>"><?= $row['id_groupKelas']; ?> | <?= $row['nama_group']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <select class="form-control" name="tahun_ajaran">
                            <option class="bg-info text-white" disabled>Tahun Ajaran</option>
                            <?php foreach ($tahun_ajaran as $row) { ?>
                                <option value="<?= $row['id_tahun_ajaran']; ?>"><?= $row['id_tahun_ajaran']; ?> | <?= $row['tahun_ajaran']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis Pembayaran</label>
                        <select class="form-control" name="jenis_pembayaran">
                            <option>Pembayaran SPP</option>
                            <option>Pembayaran Administrasi Lain</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" name="nominal" class="form-control">
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