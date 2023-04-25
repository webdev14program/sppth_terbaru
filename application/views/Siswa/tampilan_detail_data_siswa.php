<div class="alert alert-success" role="alert">
	<h5 class="text-center text-uppercase font-weight-bold">siswa</h5>
	<h5 class="text-center text-uppercase font-weight-bold"><?= $header_siswa['tahun_ajaran'] ?></h5>
</div>
<div class="card">
	<div class="card-body">
		<a class="btn btn-success btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Peserta_didik">kembali</a>
	</div>
</div>

<div class="card mt-2">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr class="text-uppercase font-weight-bold">
						<th>#</th>
						<th>NIS</th>
						<th>nama siswa</th>
						<th>jurusan</th>
						<th>kelas</th>
						<th>aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						$no = 1;
						foreach ($data_siswa as $row) {
						?>
							<td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $row['nis']; ?></td>
							<td class=" text-uppercase font-weight-bold"><?= $row['nama_siswa']; ?></td>
							<td class=" text-uppercase font-weight-bold"><?= $row['nama_jurusan']; ?></td>
							<td class="text-center text-uppercase font-weight-bold"><?= $row['kelas']; ?></td>
							<td class="text-center text-uppercase font-weight-bold">
								<h5 class="text-center">
									<form method="POST" action="<?= base_url() ?>Peserta_didik/simpan_siswa_non_aktif">
										<input type="text" value="<?= $row['id_siswa']; ?>" name="id_siswa" hidden>
										<input type="text" value="<?= $row['nis']; ?>" name="nis" hidden>
										<input type="text" value="<?= $row['nama_siswa']; ?>" name="nama_siswa" hidden>
										<input type="text" value="<?= $row['jurusan']; ?>" name="jurusan" hidden>
										<input type="text" value="<?= $row['kelas']; ?>" name="kelas" hidden>
										<input type="text" value="<?= $row['group_kelas']; ?>" name="group_kelas" hidden>
										<input type="text" value="<?= $row['id_tahun_ajaran']; ?>" name="tahun_ajaran" hidden>
										<input type="text" value="TIDAK AKTIF" name="status" hidden>
										<button type="submit" class="btn btn-danger btn-sm text-uppercase font-weight-bold">Non Aktif</button>
									</form>
								</h5>
							</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>