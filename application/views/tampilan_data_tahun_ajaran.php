<div class="alert alert-success" role="alert">
    <h5 class="text-center text-uppercase font-weight-bold">tahun ajaran</h5>
</div>

<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data
                </button>
            </div>
        </div>
    </div>
</div>

<?= $this->session->flashdata('info') ?>

<div class="row">
    <div class="col-md">
        <div class="card mt-2">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center text-uppercase font-weight-bold">
                                <th>#</th>
                                <th>ID</th>
                                <th>tahun ajaran</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                foreach ($tahun_ajaran as $row) {
                                ?>
                                    <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                                    <td class="text-center text-uppercase font-weight-bold"><?= $row['id_tahun_ajaran']; ?></td>
                                    <td class="text-center text-uppercase font-weight-bold">Tahun Ajaran <?= $row['tahun_ajaran']; ?></td>
                                    <td class="text-center text-uppercase font-weight-bold"><?= $row['status_tahun_ajaran']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white text-uppercase">
                <h5 class="modal-title">Tambah Tahun Ajaran</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url() ?>Tahun_ajaran/simpan">
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <input type="text" class="form-control" name="tahun_ajaran" aria-describedby="emailHelp">
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