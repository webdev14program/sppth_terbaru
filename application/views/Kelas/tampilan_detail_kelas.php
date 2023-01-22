<div class="alert alert-success" role="alert">
	<h5 class="text-center text-uppercase font-weight-bold">detail kelas</h5>
</div>
<div class="row">
	<div class="col-md">
		<div class="card">
			<div class="card-body">
				<a class="btn btn-success btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/data_kelas">Kembali Kelas</a>
			</div>
		</div>
	</div>
</div>
<div class="card mt-2">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr class="text-center text-uppercase font-weight-bold">
						<th>#</th>
						<th>ID Kelas</th>
						<th>Kelas</th>
						<th>Jurusan</th>
						<th>Tahun Ajaran</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						$no = 1;
						foreach ($kelas as $row) {
						?>
							<td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $row['id']; ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $row['kelas']; ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $row['jurusan']; ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $row['tahun_ajaran']; ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
