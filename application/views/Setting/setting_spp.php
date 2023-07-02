<div class="alert alert-success" role="alert">
	<h5 class="text-center text-uppercase font-weight-bold">setting pembayaran SPP</h5>
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
						<th>Tahun Ajaran</th>
						<th>jenis pembayaran</th>
						<th>tahun ajaran</th>
						<th>setting Pembayaran</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						$no = 1;
						foreach ($setting_pembayaran as $row) {
						?>
							<td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $row['id_tahun_ajaran']; ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $row['nama_pembayaran']; ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $row['tahun_ajaran']; ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $row['jumlah_setting_spp']; ?> jumlah setting spp</td>
							<td>
								<h5 class="text-center">
									<a class="btn btn-primary btn-sm text-uppercase font-wight-bold" href="<?= base_url() ?>/Setting/setting_pembayaran_spp/<?= $row['id_tahun_ajaran']; ?>">Detail List</a>
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
				<form action="<?= base_url() ?>Setting/simpan_setting_pembayaran" method="POST">
					<div class="row">
						<div class="col-md">
							<div class="form-group">
								<label>Nama Pembayaran</label>
								<input type="text" name="nama_pembayaran" class="form-control">
							</div>
							<div class="form-group">
								<label>Group Kelas</label>
								<select class="form-control" name="group_kelas">
									<option class="bg-info text-white" disabled>PILIH GROUP KELAS</option>
									<?php foreach ($kelas as $row) { ?>
										<option value="<?= $row['id_groupKelas']; ?>"><?= $row['id_groupKelas']; ?> | <?= $row['nama_group']; ?> </option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Tahun Ajaran</label>
								<select class="form-control" name="tahun_ajaran">
									<option class="bg-info text-white" disabled>Tahun Ajaran</option>
									<?php foreach ($tahun_ajaran as $row) { ?>
										<option value="<?= $row['id_tahun_ajaran']; ?>"><?= $row['id_tahun_ajaran']; ?> | <?= $row['tahun_ajaran']; ?> </option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Jenis Pembayaran</label>
								<select class="form-control" name="jenis_pembayaran">
									<option value="1001">Pembayaran SPP</option>
									<option value="2002" disabled>Pembayaran Administrasi Lain</option>
								</select>
							</div>
							<div class="form-group">
								<label>SPP</label>
								<input type="number" name="spp" class="form-control">
							</div>
						</div>
						<div class="col-md">

							<div class="form-group">
								<label>Tabungan</label>
								<input type="number" name="tabungan" class="form-control">
							</div>
							<div class="form-group">
								<label>Komputer</label>
								<input type="number" name="komputer" class="form-control">
							</div>
							<div class="form-group">
								<label>Mandarin</label>
								<input type="number" name="mandarin" class="form-control">
							</div>

							<div class="form-group">
								<label>Internet</label>
								<input type="number" name="internet" class="form-control">
							</div>
							<div class="form-group">
								<label>Praktek</label>
								<input type="number" value="0" name="praktek" class="form-control">
							</div>
						</div>
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