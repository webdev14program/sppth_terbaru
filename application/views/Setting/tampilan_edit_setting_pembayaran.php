<div class="alert alert-success" role="alert">
    <h5 class="text-center text-uppercase font-weight-bold">setting edit pembayaran SPP</h5>
</div>

<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-danger btn-sm text-uppercase" href="<?= base_url() ?>Setting/setting_pembayaran_spp/<?= $setting_pembayaran['id_tahun_ajaran'] ?>">kembali</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3 mt-2">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="text-uppercase text-white font-weight-bold">Jenis pembayaran : <?= $setting_pembayaran['nama_pembayaran'] ?></h5>
                <h5 class="text-uppercase text-white font-weight-bold">Grup Kelas : <?= $setting_pembayaran['nama_group'] ?></h5>
                <h5 class="text-uppercase text-white font-weight-bold">Tahun Ajaran : <?= $setting_pembayaran['tahun_ajaran'] ?></h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url() ?>Setting/simpan_edit_pembayaran_spp" method="POST">
                    <input type="text" value="<?= $setting_pembayaran['id_setting_pembayaran'] ?>" name="id_setting_pembayaran" hidden>
                    <input type="text" value="<?= $setting_pembayaran['id_groupKelas'] ?>" name="id_setting_pembayaran" hidden>
                    <input type="text" value="<?= $setting_pembayaran['id_tahun_ajaran'] ?>" name="id_tahun_ajaran" hidden>
                    <input type="text" value="<?= $setting_pembayaran['jenis_pembayaran'] ?>" name="jenis_pembayaran" hidden>

                    <div class="form-group">
                        <label>SPP</label>
                        <input type="text" class="form-control" value="<?= $setting_pembayaran['spp'] ?>" name="spp">
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Komputer</label>
                                <input type="text" class="form-control" value="<?= $setting_pembayaran['komputer'] ?>" name="komputer">
                            </div>
                            <div class="form-group">
                                <label>Mandarin</label>
                                <input type="text" class="form-control" value="<?= $setting_pembayaran['mandarin'] ?>" name="mandarin">
                            </div>
                            <div class="form-group">
                                <label>Tabungan</label>
                                <input type="text" class="form-control" value="<?= $setting_pembayaran['tabungan'] ?>" name="tabungan">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Komputer</label>
                                <input type="text" class="form-control" value="<?= $setting_pembayaran['komputer'] ?>" name="komputer">
                            </div>
                            <div class="form-group">
                                <label>Internet</label>
                                <input type="text" class="form-control" value="<?= $setting_pembayaran['internet'] ?>" name="internet">
                            </div>
                            <div class="form-group">
                                <label>Praktek</label>
                                <input type="text" class="form-control" value="<?= $setting_pembayaran['praktek'] ?>" name="praktek">
                            </div>
                        </div>
                    </div>
                    <h5 class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </h5>
                </form>
            </div>
        </div>

    </div>
</div>