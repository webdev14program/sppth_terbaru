<div class="row">
	<div class="col-md">
		<div class="card">
			<div class="card-body">
				<a class="btn btn-success btn-sm text-white text-uppercase font-weight-bold" href="<?= base_url() ?>Pembayaran">Kembali</a>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md mt-2">
		<div class="card">
			<div class="card-body bg-primary">
				<h5 class="text-white text-uppercase font-weight-bold">Nama Siswa : <?= $header['nama_siswa'] ?> (<?= $header['jurusan'] ?>)</h5>
			</div>
		</div>
	</div>
</div>



<div class="row">
	<div class="col-md mt-2">
		<div class="card">
			<div class="card-header bg-success">
				<h5 class="text-center font-weight-bold text-white text-uppercase">Pembayaran SPP</h5>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr class="text-center">
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">#</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">Kelas</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">Tahun Ajar</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">Aksi</h6>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
								$no = 1;
								foreach ($siswa as $row) {
								?>
									<td class="text-centers">
										<h6><?php echo $no++; ?></h6>
									</td>
									<td>
										<h6 class="text-uppercase text-center"><?php echo $row['kelas']; ?></h6>
									</td>
									<td>
										<h6 class="text-uppercase text-center"><?php echo $row['tahun_ajaran']; ?></h6>
									</td>
									<td>
										<h5 class="text-center">
											<a class="btn btn-success btn-sm" href="<?= base_url() ?>Pembayaran/detail_pembayaran_spp/<?= $row['siswa_tahun_ajar'] ?>">Pembayaran</a>
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
	<div class="col-md mt-2">
		<div class="card">
			<div class="card-header bg-danger">
				<h5 class="text-center font-weight-bold text-white text-uppercase">Pembayaran Administrasi Lain</h5>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr class="text-center">
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">#</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">Kelas</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">Tahun Ajar</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">Aksi</h6>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
								$no = 1;
								foreach ($adm_lain as $row) {
								?>
									<td class="text-centers">
										<h6><?php echo $no++; ?></h6>
									</td>
									<td>
										<h6 class="text-uppercase text-center"><?php echo $row['kelas']; ?></h6>
									</td>
									<td>
										<h6 class="text-uppercase text-center"><?php echo $row['tahun_ajaran']; ?></h6>
									</td>
									<td>
										<h5 class="text-center">
											<a class="btn btn-success btn-sm" href="<?= base_url() ?>Adm_lain/detail_pembayaran_adm_lain/<?= $row['siswa_tahun_ajaran'] ?>">Pembayaran</a>
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
	<!-- <div class="col-md mt-2 mb-2">
		<div class="card">
			<div class="card-header bg-success">
				<h5 class="text-center font-weight-bold text-white text-uppercase">UANG MASUK SMK TH (KELAS X)</h5>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr class="text-center">
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">#</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">Jurusan</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">Kelas</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">Tahun Ajar</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">Aksi</h6>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
								$no = 1;
								foreach ($siswa as $row) {
								?>
									<td class="text-centers">
										<h6><?php echo $no++; ?></h6>
									</td>
									<td>
										<h6 class="text-uppercase text-center"><?php echo $row['jurusan']; ?></h6>
									</td>
									<td>
										<h6 class="text-uppercase text-center"><?php echo $row['kelas']; ?></h6>
									</td>
									<td>
										<h6 class="text-uppercase text-center"><?php echo $row['tahun_ajaran']; ?></h6>
									</td>
									<td>
										<h5 class="text-center">
											<a class="btn btn-success btn-sm" target="_blank" href="<?= base_url() ?>Dashboard/detail_pembayaran_spp/<?= $row['siswa_tahun_ajar'] ?>">Pembayaran</a>
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
	<div class="col-md mt-2 mb-2">
		<div class="card">
			<div class="card-header bg-danger">
				<h5 class="text-center font-weight-bold text-white text-uppercase">DAFTAR ULANG (KELAS XI DAN XII)</h5>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr class="text-center">
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">#</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">Jurusan</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">Kelas</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">Tahun Ajar</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">Aksi</h6>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
								$no = 1;
								foreach ($siswa as $row) {
								?>
									<td class="text-centers">
										<h6><?php echo $no++; ?></h6>
									</td>
									<td>
										<h6 class="text-uppercase text-center"><?php echo $row['jurusan']; ?></h6>
									</td>
									<td>
										<h6 class="text-uppercase text-center"><?php echo $row['kelas']; ?></h6>
									</td>
									<td>
										<h6 class="text-uppercase text-center"><?php echo $row['tahun_ajaran']; ?></h6>
									</td>
									<td>
										<h5 class="text-center">
											<a class="btn btn-success btn-sm" target="_blank" href="<?= base_url() ?>Dashboard/detail_pembayaran_adm_lain/<?= $row['siswa_tahun_ajar'] ?>">Pembayaran</a>
										</h5>
									</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div> -->
</div>