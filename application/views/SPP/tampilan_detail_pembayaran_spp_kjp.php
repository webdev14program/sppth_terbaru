<a class="btn btn-sm btn-success text-uppercase font-weight-bold mb-2" href="<?= base_url() ?>Dashboard/detail_pembayaran_spp/<?= $siswa['id_siswa'] ?><? ?>">Kembali</a>
<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header bg-primary text-white text-uppercase font-weight-bold text-center">
                Pembayaran KJP
            </div>
            <div class="card-body">
                <form action="<?= base_url() ?>Dashboard/simpan_spp_kjp" method="POST">
                    <div class="row">
                        <div class="col-md">
                            <input type="text" value="<?= $siswa['id_spp_siswa'] ?>" name="id_spp_siswa" hidden>
                            <input type="text" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" hidden>
                            <input type="text" value="<?= $siswa['kode_bulan'] ?>" name="kode_bulan" hidden>
                            <div class="form-group">
                                <label>Bulan</label>
                                <input type="text" class="form-control" value="<?= $siswa['bulan'] ?>" name="bulan" readonly>
                            </div>
                            <div class="form-group">
                                <label>Pembayaran SPP Bulan <?= $siswa['bulan'] ?></label>
                                <input type="text" class="form-control" value="<?= $siswa['spp'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Pembayaran Tabungan Bulan <?= $siswa['bulan'] ?></label>
                                <input type="text" class="form-control" value="<?= $siswa['tabungan'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Pembayaran Internet Bulan <?= $siswa['bulan'] ?></label>
                                <input type="text" class="form-control" value="<?= $siswa['internet'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Pembayaran Praktek Bulan <?= $siswa['bulan'] ?></label>
                                <input type="text" class="form-control" value="<?= $siswa['praktek'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Total Pembayaran SPP Bulan <?= $siswa['bulan'] ?></label>
                                <input type="text" class="form-control" value="<?= $siswa['nominal'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Pembayaran KJP</label>
                                <input type="text" name="kjp" value="240000" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Pembayaran KJP Cash</label>
                                <input type="text" name="kjp_cash" value="<?= $siswa['kjp_cash'] ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>