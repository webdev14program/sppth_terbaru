<div class="alert alert-success" role="alert">
    <h5 class="text-center text-uppercase font-weight-bold">detail pembayaran spp</h5>
</div>

<a class="btn btn-sm btn-success text-uppercase font-weight-bold mb-2" href="<?= base_url() ?>Dashboard/pembayaran_spp">kembali</a>


<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="text-center text-uppercase font-weight-bold text-white">identitas siswa</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" class="form-control text-uppercase" value="<?= $siswa['nama_siswa'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" class="form-control" value="<?= $siswa['kelas'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" class="form-control" value="<?= $siswa['jurusan'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <input type="text" class="form-control" value="<?= $siswa['tahun_ajaran'] ?>" readonly>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="text-center text-uppercase font-weight-bold text-white">data pembayaran</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h6 class="text-danger text-uppercase font-weight-bold text-center">jika belum ada data taagihan pembayaran spp, silahakan click generate di samping , agar dapat generate datar tagihan pembayaran spp</h6>
                    </div>
                    <div class="col-md-4">
                        <h5 class="text-center">
                            <a class="btn btn-primary btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/generate_detail_pembayaran_spp/<?= $siswa['id_siswa'] ?>"> <i class="fas fa-sync-alt"></i> generate</a>
                        </h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">Nomor</th>
                                                <th scope="col">Bulan</th>
                                                <th scope="col">Tagihan</th>
                                                <th scope="col">status</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $no = 1;
                                                foreach ($siswa_spp as $row) {
                                                ?>
                                                    <td class="text-center text-uppercase font-weight-bold"><?= $no++; ?></td>
                                                    <td class="text-center text-uppercase font-weight-bold"><?= $row['bulan']; ?></td>
                                                    <td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['nominal'], 2, ',', '.') ?></td>
                                                    <td class="text-center text-uppercase font-weight-bold"><?= $row['status']; ?></td>
                                                    <td>
                                                        <h5 class="text-center">
                                                            <a class="btn btn-primary btn-sm text-uppercase font-weight-bold" href="#">Bayar</a>
                                                        </h5>
                                                    </td>

                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>