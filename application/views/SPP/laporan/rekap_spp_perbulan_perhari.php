<div class="row">
	<div class="col-md">
		<div class="alert alert-success" role="alert">
			<h5 class="text-center text-uppercase font-weight-bold">Rekap SPP Admin per hari</h5>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md">
		<div class="card">
			<div class="card-body">
				<table class="table table-striped table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th scope="col">Nomor</th>
							<th scope="col">Bulan</th>
							<th scope="col">Tahun</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php
							$no = 1;
							foreach ($spp_perbulan_perhari as $row) {
							?>
								<td class="text-center"><?php echo $no++; ?></td>
								<td class="text-center"><?= $row['bulan']; ?></td>
								<td><?= $row['tahun']; ?></td>
								<td class="text-center"><a class="btn btn-primary btn-sm" href="<?= base_url() ?>Laporan_spp/rekap_spp_admin_perhari/<?= $row['bulan_tahun'] ?>">List Tanggal</a></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>