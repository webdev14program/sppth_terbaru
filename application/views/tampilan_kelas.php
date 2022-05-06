<div class="alert alert-success" role="alert">
    <h5 class="text-center text-uppercase font-weight-bold">kelas</h5>
</div>

<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-primary btn-sm text-uppercase font-weight-bold" data-toggle="modal" data-target="#tahun_ajaran-perkelas">
            <i class="fas fa-plus-square"></i> TAMBAH TAHUN AJARAN KELAS
        </button>
    </div>
</div>

<div class="modal fade" id="tahun_ajaran-perkelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white text-uppercase font-weight-bold" id="exampleModalLabel">TAMBAH TAHUN AJARAN KELAS</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Tahun Ajaran Untuk Kelas</label>
                        <select class="form-control" name="tahun_ajaran_kelas">
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