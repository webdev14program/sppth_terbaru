<div class="row">
	<div class="col-md">
		<div class="card bg-primary">
			<div class="card-body">
				<div class="row">
					<div class="col-md">
						<h5 class="text-white font-weight-bold text-uppercase">Administrasi smk tunas harapan (<?= $tahun_ajaran['tahun_ajaran'] ?>)</h5>
					</div>
					<div class="col-md mx-auto">
						<h5 class="text-white font-weight-bold text-uppercase text-right">Tanggal <?= date("Y-m-d") ?></h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md mt-2">
		<div class="card bg-success">
			<div class="card-body">
				<h5 class="text-white font-weight-bold text-uppercase">siswa aktif</h5>
				<h5 class="text-white font-weight-bold text-uppercase"><?= $siswa ?> siswa</h5>
			</div>
		</div>
	</div>
	<div class="col-md mt-2">
		<div class="card bg-danger">
			<div class="card-body">
				<h5 class="text-white font-weight-bold text-uppercase">siswa tidak aktif</h5>
				<h5 class="text-white font-weight-bold text-uppercase"><?= $siswa_tidak_aktif ?> siswa</h5>
			</div>
		</div>
	</div>
	<div class="col-md mt-2">
		<div class="card bg-dark">
			<div class="card-body">
				<h5 class="text-white font-weight-bold text-uppercase">jurusan siswa</h5>
				<h5 class="text-white font-weight-bold text-uppercase"><?= $jurusan ?> jurusan</h5>
			</div>
		</div>
	</div>
	<div class="col-md mt-2">
		<div class="card bg-info">
			<div class="card-body">
				<h5 class="text-white font-weight-bold text-uppercase">jumlah rombel </h5>
				<h5 class="text-white font-weight-bold text-uppercase"><?= $kelas['kelas'] ?> rombel</h5>
			</div>
		</div>
	</div>
</div>

<!-- <div class="row">
	<div class="col-md mt-2">
		<div class="card">
			<div class="card-header bg-primary">
				<h5 class="text-white font-weight-bold text-uppercase">Pembayaran Rerbaru</h5>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md">
						<div class="card">
							<div class="card-header bg-success">
								<h5 class="font-weight-bolder text-white" style="text-transform: uppercase;">Jumlah SPP</h5>
							</div>
							<div class="card-body">
								<table class="table table-border">
									<tbody>
										<h4 class=" font-weight-bold "><?= $hasil_rupiah = "Rp " . number_format($jumlah_spp_terbaru['jumlah'], 2, ',', '.') ?></h4>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md">
						<div class="card">
							<div class="card-header bg-danger">
								<h5 class="font-weight-bolder text-white" style="text-transform: uppercase;">Jumlah ADM LAIN</h5>
							</div>
							<div class="card-body">
								<table class="table table-border">
									<tbody>
										<h4 class="font-weight-bold "><?= $hasil_rupiah = "Rp " . number_format($jumlah_adm_lain_terbaru['jumlah'], 2, ',', '.') ?></h4>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md">
						<div class="card">
							<div class="card-header bg-dark">
								<h5 class="font-weight-bolder text-white" style="text-transform: uppercase;">Jumlah PANGKAL</h5>
							</div>
							<div class="card-body">
								<table class="table table-border">
									<tbody>
										<h4 class="font-weight-bold">Rp 0,00</h4>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md ">
						<div class="card">
							<div class="card-header bg-info">
								<h5 class="font-weight-bolder text-white" style="text-transform: uppercase;">Jumlah DU</h5>
							</div>
							<div class="card-body">
								<table class="table table-border">
									<tbody>
										<h4 class=" font-weight-bold ">Rp 0,00</h4>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->