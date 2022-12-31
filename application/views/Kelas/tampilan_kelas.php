<div class="alert alert-success" role="alert">
	<h5 class="text-center text-uppercase font-weight-bold">kelas</h5>
</div>
<div class="row">
	<div class="col-md">
		<div class="card">
			<div class="card-body">
				<!-- <a class="btn btn-success btn-sm" href="<?= base_url() ?>Dashboard/tambah_jurusan"><i class="fas fa-plus-square"></i> Tambah Jurusan</a> -->
				<button type="button" class="btn btn-success btn-sm text-uppercase font-weight-bold" data-toggle="modal" data-target="#exampleModal">
					<i class="fas fa-plus-square"></i> Upload Kelas
				</button>
				<a class="btn btn-danger btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/hapus_all_kelas"><i class="fas fa-trash"></i> Hapus Kelas</a>
			</div>
		</div>
	</div>
</div>

<?= $this->session->flashdata('pesan') ?>
<div class="card mt-2">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr class="text-center text-uppercase font-weight-bold">
						<th>#</th>
						<th>ID tahun ajaran kelas</th>
						<th>tahun ajaran</th>
						<th>jumlah kelas</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						$no = 1;
						foreach ($tahun_ajaran as $row) {
						?>
							<td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $row['id_tahun_ajaran']; ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $row['tahun_ajaran']; ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $row['jumlah_kelas']; ?> Kelas</td>
							<td>
								<h5 class="text-center">
									<a class="btn btn-primary btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/detail_kelas/<?= $row['id_tahun_ajaran']; ?>">Detail</a>
								</h5>
							</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="exampleModalLabel">Upload Kelas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open_multipart('Dashboard/upload_kelas'); ?>
				<div class="form-group">
					<input type="file" name="excel" class="form-control-file" name="file" required accept=".xlsx">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="submit" value="upload" class="btn btn-primary">Upload</button>
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>
