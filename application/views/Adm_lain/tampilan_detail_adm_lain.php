<div class="alert alert-success" role="alert">
	<h5 class="text-center text-uppercase font-weight-bold">detail pembayaran administrasi lain</h5>
</div>
<div class="card">
	<div class="card-body">
		<a class="btn btn-sm btn-success text-uppercase font-weight-bold" href="<?= base_url() ?>Pembayaran/pembayaran_spp_per_nis/<?= $header['nis'] ?>">kembali</a>
		<button type="button" class="btn btn-primary btn-sm text-uppercase font-weight-bold" data-toggle="modal" data-target="#cash">
			Pembayar ADM LAIN
		</button>
		<!-- <button type="button" class="btn btn-danger btn-sm text-uppercase font-weight-bold" data-toggle="modal" data-target="#kjp">
			Pembayar KJP
		</button> -->
	</div>
</div>

<?= $this->session->flashdata('info') ?>

<div class="card mt-2">
	<div class="card-header bg-danger text-white">
		<h5 class="text-uppercase font-weight-bold"><?= $header['nama_siswa'] ?> - <?= $header['kelas'] ?> (<?= $header['tahun_ajaran'] ?>)</h5>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr class="text-center text-uppercase">
										<th scope="col">Nomor</th>
										<th scope="col">Nama Pembaran</th>
										<th scope="col">Nominal</th>
										<th scope="col">Jenis Pembayaran</th>
										<th scope="col">Setatus Pembayaran</th>
										<th scope="col">Waktu Bayar</th>

									</tr>
								</thead>
								<tbody>
									<tr>
										<?php
										$no = 1;
										foreach ($tabel as $row) {
										?>
											<td class="text-center text-uppercase font-weight-bold"><?= $no++; ?></td>
											<td class="text-center text-uppercase font-weight-bold"><?= $row['nama_pembayaran_lain']; ?></td>
											<td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['jumlah_nominal'], 2, ',', '.') ?></td>
											<td class="text-center text-uppercase font-weight-bold"><?= $row['jenis_pembayaran']; ?></td>
											<td class="text-center text-uppercase font-weight-bold"><?= $row['status_pembayaran_lain']; ?></td>
											<td class="text-center text-uppercase font-weight-bold"><?= $row['tanggal']; ?></td>
											<!-- <td>
												<h5 class="text-center">
													<a class="text-uppercase font-weight-bold btn btn-danger btn-sm" href="#">Hapus</a>
												</h5>
											</td> -->
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

<!-- <div class="modal fade" id="kjp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h5 class="modal-title text-uppercase text-white font-weight-bold" id="exampleModalLabel">ADM LAIN KJP</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<div class="card">
							<div class="card-header bg-info text-white">
								<h5 class="text-uppercase font-weight-bold">FORM ADM PEMBAYARAN</h5>
							</div>
							<div class="card-body">
								<form action="<?= base_url() ?>Adm_lain/simpan_pembayaran_adm_lain_kjp" method="post">
									<input type="text" name="siswa_tahun_ajaran" value="<?= $header['siswa_tahun_ajaran'] ?>" hidden>
									<div class="form-group">
										<label>Pembayaran</label>
										<select class="form-control" name="id_setting_pembayaran">
											<option class="bg-info text-white" disabled>ADM PEMBAYARAN</option>
											<?php foreach ($dropDown as $row) { ?>
												<option value="<?= $row['id_setting_pembayaran_lain']; ?>"><?= $row['nama_pembayaran_lain']; ?> | <?= $hasil_rupiah = "Rp " . number_format($row['nominal'], 0, ',', '.') ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">KJP</label>
										<input type="number" class="form-control" name="kjp">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">KJP CASH</label>
										<input type="number" class="form-control" name="kjp_cash">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Save changes</button>
									</div>
								</form>
							</div>
						</div>

					</div>
					<div class="col-md-8">
						<div class="card">
							<div class="card">
								<div class="card-header bg-secondary text-white">
									<h5 class="text-uppercase font-weight-bold">FORM ADM PEMBAYARAN</h5>
								</div>
								<div class="card-body">
									<table class="table table-striped table-bordered table-hover">
										<thead>
											<tr class="text-center text-uppercase">
												<th scope="col">NO</th>
												<th scope="col">Nama Pembaran</th>
												<th scope="col">NOMINAL</th>
												<th scope="col">KJP</th>
												<th scope="col">SISA</th>
												<th scope="col">Tanggal</th>
											</tr>
										</thead>
										<tbody>
											ß <tr>
												<?php
												$no = 1;
												foreach ($table_kjp as $row) {
												?>
													<td class="text-center text-uppercase font-weight-bold"><?= $no++; ?></td>
													<td class="text-center text-uppercase font-weight-bold"><?= $row['nama_pembayaran_lain']; ?></td>
													<td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['nominal'], 0, ',', '.') ?></td>
													<td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['kjp'] + $row['kjp_cash'], 0, ',', '.') ?></td>
													<td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['nominal'] - ($row['kjp_cash'] + $row['kjp']), 0, ',', '.') ?></td>
													<td class="text-center text-uppercase font-weight-bold"><?= $row['tanggal']; ?></td>
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
</div> -->
<div class="modal fade" id="cash" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h5 class="modal-title text-uppercase text-white font-weight-bold" id="exampleModalLabel">Pembayaran Cash</h5>

			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr class="text-center text-uppercase">
									<th scope="col">NO</th>
									<th scope="col">ID PEMBAYARAN</th>
									<th scope="col">NAMA PEMBAYARAN</th>
									<th scope="col">NOMINAL</th>
									<th colspan="2">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php
									$no = 1;
									foreach ($tableDown as $row) {
									?>
										<td class="text-center text-uppercase font-weight-bold"><?= $no++; ?></td>
										<td class="text-center text-uppercase font-weight-bold"><?= $row['id_setting_pembayaran_lain']; ?></td>
										<td class="text-center text-uppercase font-weight-bold"><?= $row['nama_pembayaran_lain']; ?></td>
										<td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['nominal'], 2, ',', '.') ?></td>
										<td>
											<h5 class="text-center text-uppercase font-weight-bold">
												<form action="<?= base_url() ?>Adm_lain/simpan_pembayaran_adm_lain" method="post">
													<input type="text" value="<?= $row['id_setting_pembayaran_lain']; ?>" name="id_setting_pembayaran" hidden>
													<input type="text" value="<?= $header['siswa_tahun_ajaran']; ?>" name="siswa_tahun_ajaran" hidden>
													<input type="text" value="<?= $row['nominal']; ?>" name="cash" hidden>
													<button type="submit" class="btn btn-primary btn-sm">CASH</button>
												</form>

											</h5>
										</td>
										<td>
											<h5 class="text-center text-uppercase font-weight-bold">
												<a class="btn btn-danger btn-sm" href="">KJP</a>
											</h5>
										</td>

								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- <form action="<?= base_url() ?>Adm_lain/simpan_pembayaran_adm_lain" method="post">
					<input type="text" name="siswa_tahun_ajaran" value="<?= $header['siswa_tahun_ajaran'] ?>" hidden>
					<div class="form-group">
						<label>Pembayaran</label>
						<select class="form-control" name="id_setting_pembayaran">
							<option class="bg-info text-white" disabled>ADM PEMBAYARAN</option>
							<?php foreach ($dropDown as $row) { ?>
								<option value="<?= $row['id_setting_pembayaran_lain']; ?>"><?= $row['nama_pembayaran_lain']; ?> | <?= $hasil_rupiah = "Rp " . number_format($row['nominal'], 0, ',', '.') ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label>Nominal</label>
						<select class="form-control" name="cash">
							<option class="bg-info text-white" disabled>Nominal</option>
							<?php foreach ($dropDown as $row) { ?>
								<option value="<?= $row['nominal']; ?>"><?= $hasil_rupiah = "Rp " . number_format($row['nominal'], 0, ',', '.') ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form> -->
			</div>

		</div>
	</div>
</div>