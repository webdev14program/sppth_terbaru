<div class="alert alert-primary" role="alert">
	<h5 class="text-center text-uppercase font-weight-bold">detail setting pembayaran</h5>
</div>
<a class="btn btn-sm btn-success text-uppercase font-weight-bold mb-2" href="<?= base_url() ?>Setting/setting_uang_masuk_sekolah">kembali</a>

<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header bg-danger">
				<h5 class="text-uppercase text-white font-weight-bold">Grup Kelas : <?= $setting_pembayaran['nama_group'] ?></h5>
				<h5 class="text-uppercase text-white font-weight-bold">Tahun Ajaran : <?= $setting_pembayaran['tahun_ajaran'] ?></h5>
				<h5 class="text-uppercase text-white font-weight-bold">Pendaftaran : <?= $hasil_rupiah = "Rp " . number_format($setting_pembayaran['pendaftaran'], 2, ',', '.') ?></h5>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<tbody>
							<tr>
								<th class="text-center">1</th>
								<td>UANG PANGKAL</td>
								<td><?= $hasil_rupiah = "Rp " . number_format($setting_pembayaran['uang_pangkal'], 2, ',', '.') ?></td>
							</tr>
							<tr>
								<th class="text-center">2</th>
								<td>UANG PERALATAN</td>
								<td><?= $hasil_rupiah = "Rp " . number_format($setting_pembayaran['uang_peralatan'], 2, ',', '.') ?></td>
							</tr>
							<tr>
								<th class="text-center">3</th>
								<td>SPP & TABUNGAN</td>
								<td><?= $hasil_rupiah = "Rp " . number_format($setting_pembayaran['spp_tabungan'], 2, ',', '.') ?></td>
							</tr>
							<tr>
								<th class="text-center">4</th>
								<td>OSIS</td>
								<td><?= $hasil_rupiah = "Rp " . number_format($setting_pembayaran['osis'], 2, ',', '.') ?></td>
							</tr>
							<tr>
								<th class="text-center">5</th>
								<td>MOS</td>
								<td><?= $hasil_rupiah = "Rp " . number_format($setting_pembayaran['mos'], 2, ',', '.') ?></td>
							</tr>
							<tr>
								<th class="text-center">6</th>
								<td>Kartu Pelajar</td>
								<td><?= $hasil_rupiah = "Rp " . number_format($setting_pembayaran['kartu_pelajar'], 2, ',', '.') ?></td>
							</tr>
							<tr>
								<th class="text-center">*</th>
								<td class="font-weight-bold">JUMLAH</td>
								<td class="font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($setting_pembayaran['jumlah_nominal'], 2, ',', '.') ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>