<a class="btn btn-sm btn-success text-uppercase font-weight-bold mb-2" href="<?= base_url() ?>Dashboard/detail_pembayaran_spp/<?= $siswa['id_siswa'] ?><? ?>">Kembali</a>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white text-uppercase font-weight-bold text-center">
                Pembayaran KJP
            </div>
            <div class="card-body">
                <form action="<?= base_url() ?>Dashboard/simpan_spp_kjp" method="POST">
                    <input type="text" value="<?= $siswa['id_spp_siswa'] ?>" name="id_spp_siswa" hidden>
                    <input type="text" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" hidden>
                    <input type="text" value="<?= $siswa['kode_bulan'] ?>" name="kode_bulan" hidden>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" class="form-control" value="<?= $siswa['nama_siswa'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Bulan</label>
                        <input type="text" class="form-control" value="<?= $siswa['bulan'] ?>" name="bulan" readonly>
                    </div>
                    <div class="form-group">
                        <label>Pembayaran SPP Bulan <?= $siswa['bulan'] ?></label>
                        <input type="text" class="form-control" value="<?= $siswa['nominal'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Pembayaran KJP</label>
                        <input type="text" name="kjp" value=" <?= $siswa['kjp'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Pembayaran KJP Cash</label>
                        <input type="text" name="kjp_cash" value="<?= $siswa['kjp_cash'] ?>" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="LUNAS">
                                <label class="form-check-label">
                                    Lunas
                                </label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="BELUM LUNAS">
                                <label class="form-check-label">
                                    Belum Lunas
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="col-md">
        <div class="card">
            <div class="card-header bg-primary text-white text-uppercase font-weight-bold text-center">
                status pembayaran
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->
</div>