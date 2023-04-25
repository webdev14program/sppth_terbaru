<div class="alert alert-success" role="alert">
	<h5 class="text-center text-uppercase font-weight-bold">detail pembayaran spp</h5>
</div>


<div class="row">
	<div class="col-md">
		<div class="alert alert-success" role="alert">
			<h5 class="text-center text-uppercase font-weight-bold"><?= $siswa['nama_siswa'] ?></h5>
		</div>
	</div>
	<div class="col-md">
		<div class="alert alert-success" role="alert">
			<h5 class="text-center text-uppercase font-weight-bold"><?= $siswa['kelas'] ?></h5>
		</div>
	</div>
	<div class="col-md">
		<div class="alert alert-success" role="alert">
			<h5 class="text-center text-uppercase font-weight-bold"><?= $siswa['kode'] ?></h5>
		</div>
	</div>
	<div class="col-md">
		<div class="alert alert-success" role="alert">
			<h5 class="text-center text-uppercase font-weight-bold"><?= $siswa['tahun_ajaran'] ?></h5>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<div class="alert alert-success" role="alert">
			<h5 class="text-center text-uppercase font-weight-bold">Jumlah Bulan <br> <?= $jumlah_bulan['jumlah_bulan'] ?></h5>
		</div>
	</div>
	<div class="col-md">
		<div class="alert alert-success" role="alert">
			<h5 class="text-center text-uppercase font-weight-bold">Sisa Bulan <br> <?= $total_bayar['total_bulan'] - $jumlah_bulan['jumlah_bulan'] ?></h5>
		</div>
	</div>
	<div class="col-md">
		<div class="alert alert-success" role="alert">
			<h5 class="text-center text-uppercase font-weight-bold">Sudah Bayar <br> <?= $hasil_rupiah = "Rp " . number_format($jumlah_bayar['jumlah_pembayaran'], 2, ',', '.') ?></h5>
		</div>
	</div>
	<div class="col-md">
		<div class="alert alert-success" role="alert">
			<h5 class="text-center text-uppercase font-weight-bold">Sisa bayar <br> <?= $hasil_rupiah = "Rp " . number_format($total_bayar['total_pembayaran'] - $jumlah_bayar['jumlah_pembayaran'], 2, ',', '.') ?></h5>
		</div>
	</div>
</div>
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-8">
				<h6 class="text-danger text-uppercase font-weight-bold text-center">jika belum ada data tagihan pembayaran spp, silahakan click generate di samping , agar dapat ter-generate daftar tagihan pembayaran spp</h6>
			</div>
			<div class="col-md-4">
				<h5 class="text-center">
					<a class="btn btn-primary btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Pembayaran/generate_detail_pembayaran_spp/<?= $siswa['siswa_tahun_ajaran'] ?>"> <i class="fas fa-sync-alt"></i> generate</a>
				</h5>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr class="text-center text-uppercase">
							<th scope="col">Nomor</th>
							<th scope="col">Bulan</th>
							<!-- <th scope="col">status</th> -->
							<th scope="col">SPP</th>
							<th scope="col">KOMPUTER</th>
							<th scope="col">MANDARIN</th>
							<th scope="col">TABUNGAN</th>
							<th scope="col">INTERNET</th>
							<th scope="col">PRAKTEK</th>
							<th scope="col">TOTAL</th>
							<th scope="col">STATUS PEMBAYARAN</th>
							<th scope="col">WAKTU</th>
							<th scope="col">PEMBAYARAN</th>
							<!-- <th scope="col">KWITANSI</th> -->
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
								<td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['spp'], 0, ',', '.') ?></td>
								<td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['komputer'], 0, ',', '.') ?></td>
								<td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['mandarin'], 0, ',', '.') ?></td>
								<td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['tabungan'], 0, ',', '.') ?></td>
								<td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['internet'], 0, ',', '.') ?></td>
								<td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['praktek'], 0, ',', '.') ?></td>
								<td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['nominal'], 0, ',', '.') ?></td>
								<td class="text-center text-uppercase font-weight-bold"><?= $row['status_pabayar_spp']; ?> </td>
								<td class="text-center text-uppercase font-weight-bold"><?= $row['date']; ?> </td>
								<td>
									<div class="row">
										<div class="col-md">
											<form action="<?= base_url() ?>Pembayaran/bayar_spp_nonKJP/<?= $row['id_spp_siswa'] ?>" method="POST">
												<input type="text" class="form-control text-uppercase" name="id_spp_siswa" value="<?= $row['id_spp_siswa'] ?>" hidden>
												<input type="text" class="form-control text-uppercase" name="id_siswa" value="<?= $row['id_siswa'] ?>" hidden>
												<input type="text" class="form-control text-uppercase" name="kode_bulan" value="<?= $row['kode_bulan'] ?>" hidden>
												<input type="text" class="form-control text-uppercase" name="bulan" value="<?= $row['bulan'] ?>" hidden>
												<input type="text" class="form-control text-uppercase" name="cash" value="<?= $row['nominal'] ?>" hidden>
												<h5 class="text-center ">
													<button type="submit" class="badge badge-primary text-uppercase">non kjp</button>
												</h5>
											</form>
										</div>
										<div class="col-md">
											<h5 class="text-center text-uppercase">
												<a class="badge badge-danger" href="<?= base_url() ?>Pembayaran/bayar_spp_kjp/<?= $row['id_spp_siswa']; ?>">KJP</a>
											</h5>
										</div>
									</div>
								</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
