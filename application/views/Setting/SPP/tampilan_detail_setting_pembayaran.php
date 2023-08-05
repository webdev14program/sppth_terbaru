<div class="alert alert-success" role="alert">
	<h5 class="text-center text-uppercase font-weight-bold">detail setting pembayaran</h5>
</div>
<a class="btn btn-sm btn-success text-uppercase font-weight-bold mb-2" href="<?= base_url() ?>Setting/setting_pembayaran_spp/<?= $setting_pembayaran['id_tahun_ajaran'] ?>">kembali</a>
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header bg-primary">
				<h5 class="text-uppercase text-white font-weight-bold">Jenis pembayaran : <?= $setting_pembayaran['nama_jenis_pembayaran'] ?></h5>
				<h5 class="text-uppercase text-white font-weight-bold">Grup Kelas : <?= $setting_pembayaran['nama_group'] ?></h5>
				<h5 class="text-uppercase text-white font-weight-bold">Tahun Ajaran : <?= $setting_pembayaran['tahun_ajaran'] ?></h5>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<tbody>
							<tr>
								<th class="text-center">1</th>
								<td>SPP</td>
								<td><?= $hasil_rupiah = "Rp " . number_format($setting_pembayaran['spp'], 2, ',', '.') ?></td>
							</tr>
							<tr>
								<th class="text-center">2</th>
								<td>KOMPUTER</td>
								<td><?= $hasil_rupiah = "Rp " . number_format($setting_pembayaran['komputer'], 2, ',', '.') ?></td>
							</tr>
							<tr>
								<th class="text-center">3</th>
								<td>MANDARIN</td>
								<td><?= $hasil_rupiah = "Rp " . number_format($setting_pembayaran['mandarin'], 2, ',', '.') ?></td>
							</tr>
							<tr>
								<th class="text-center">4</th>
								<td>TABUNGAN</td>
								<td><?= $hasil_rupiah = "Rp " . number_format($setting_pembayaran['tabungan'], 2, ',', '.') ?></td>
							</tr>
							<tr>
								<th class="text-center">5</th>
								<td>INTERNET</td>
								<td><?= $hasil_rupiah = "Rp " . number_format($setting_pembayaran['internet'], 2, ',', '.') ?></td>
							</tr>
							<tr>
								<th class="text-center">6</th>
								<td>PRAKTEK</td>
								<td><?= $hasil_rupiah = "Rp " . number_format($setting_pembayaran['praktek'], 2, ',', '.') ?></td>
							</tr>
							<tr>
								<th class="text-center">*</th>
								<td class="font-weight-bold">JUMLAH</td>
								<td class="font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($setting_pembayaran['nominal'], 2, ',', '.') ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>