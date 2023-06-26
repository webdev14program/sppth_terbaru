<div class="alert alert-primary" role="alert">
	<h5 class="text-center text-uppercase font-weight-bold">setting pembayaran Uang Masuk Sekolah</h5>
</div>
<div class="card mt-2">
	<div class="card-body">
		<button type="button" class="btn btn-primary btn-sm text-uppercase font-weight-bold" data-toggle="modal" data-target="#tambahPembayaran">
			tambah Pembayaran
		</button>
	</div>
</div>
<?= $this->session->flashdata('info') ?>

<div class="card mt-2">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr class="text-uppercase text-center font-weight-bold">
						<th>#</th>
						<th>id pembayaran</th>
						<th>JURUSAN</th>
						<th>nominal</th>
						<th>tahun ajaran</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						$no = 1;
						foreach ($setting_uang_masuk as $row) {
						?>
							<td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $row['id_uang_masuk']; ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $row['nama_group']; ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $hasil_rupiah = "Rp " . number_format($row['jumlah_nominal'], 2, ',', '.') ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $row['tahun_ajaran']; ?></td>
							<td>
								<h5 class="text-center">
									<a class="btn btn-primary btn-sm  text-uppercase" href="<?= base_url() ?>Setting/detail_setting_uang_masuk/<?= $row['id_uang_masuk'] ?>"><i class="fas fa-search"></i></i></a>
									<a class="btn btn-danger btn-sm  text-uppercase" href="<?= base_url() ?>Setting/hapus_setting_pembayaran_spp/<?= $row['id_uang_masuk'] ?>"><i class="fas fa-trash"></i></a>
								</h5>
							</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="tambahPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h5 class="modal-title text-uppercase font-weight-bold text-white">tambah Pembayaran</h5>
			</div>
			<div class="modal-body">
				<form action="<?= base_url() ?>Setting/simpan_uang_masuk" method="POST">
					<div class="row">
						<div class="col-md">
							<div class="form-group">
								<label>Group Kelas</label>
								<select class="form-control" name="id_groupKelas">
									<option class="bg-info text-white" disabled>PILIH GROUP KELAS</option>
									<?php foreach ($kelas as $row) { ?>
										<option value="<?= $row['id_groupKelas']; ?>"><?= $row['id_groupKelas']; ?> | <?= $row['nama_group']; ?> </option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Tahun Ajaran</label>
								<select class="form-control" name="id_tahun_ajaran">
									<option class="bg-info text-white" disabled>Tahun Ajaran</option>
									<?php foreach ($tahun_ajaran as $row) { ?>
										<option value="<?= $row['id_tahun_ajaran']; ?>"><?= $row['id_tahun_ajaran']; ?> | <?= $row['tahun_ajaran']; ?> </option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>SPP & TABUNGAN</label>
								<select class="form-control" name="id_setting_pembayaran">
									<option class="bg-info text-white" disabled>Tahun Ajaran</option>
									<?php foreach ($setting_spp as $row) { ?>
										<option value="<?= $row['id_setting_pembayaran']; ?>"><?= $row['nama_group']; ?> | <?= $hasil_rupiah = "Rp " . number_format($row['jumlah_nominal'], 2, ',', '.') ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Seragam</label>
								<input type="number" name="seragam" class="form-control">
							</div>
						</div>
						<div class="col-md">
							<div class="form-group">
								<label>Peralatan</label>
								<input type="number" name="uang_peralatan" class="form-control">
							</div>
							<div class="form-group">
								<label>Osis</label>
								<input type="number" name="osis" class="form-control">
							</div>
							<div class="form-group">
								<label>Mos</label>
								<input type="number" name="mos" class="form-control">
							</div>
							<div class="form-group">
								<label>Foto & Kartu Pelajar</label>
								<input type="number" name="kartu_pelajar" class="form-control">
							</div>

						</div>

					</div>
					<div class="form-group">
						<label>Uang Pangkal</label>
						<input type="number" name="uang_pangkal" class="form-control">
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