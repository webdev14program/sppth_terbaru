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

<div class="modal fade" id="tambahPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-uppercase font-weight-bold text-white">tambah Pembayaran</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Nama Pembayaran</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Group Kelas</label>
                        <select class="form-control" name="kelas">
                            <option class="bg-info text-white" disabled>PILIH GROUP KELAS</option>
                            <?php foreach ($kelas as $row) { ?>
                                <option value="<?= $row['id_groupKelas']; ?>"><?= $row['id_groupKelas']; ?> | <?= $row['nama_group']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <select class="form-control" name="kelas">
                            <option class="bg-info text-white" disabled>PILIH GROUP KELAS</option>
                            <?php foreach ($tahun_ajaran as $row) { ?>
                                <option value="<?= $row['id_tahun_ajaran']; ?>"><?= $row['id_tahun_ajaran']; ?> | <?= $row['tahun_ajaran']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <select class="form-control" name="tahun_ajaran">
                            <option value="10001"> 1001 | Pembayaran SPP</option>
                            <option value="20002"> 2002 | Pembayaran Administrasi Lain</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="text" class="form-control">
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