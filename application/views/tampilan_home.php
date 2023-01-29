<div class="row">
	<div class="col-md">
		<div class="card bg-primary">
			<div class="card-body">
				<h5 class="text-white font-weight-bold text-uppercase">SPP <span class="text-success"><?= $version ?></span> smk tunas harapan (<?= $tahun_ajaran['tahun_ajaran'] ?>)</h5>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md mt-2">
		<div class="card bg-success">
			<div class="card-body">
				<h4 class="text-white font-weight-bold text-uppercase">jumlah siswa aktif</h4>
				<h4 class="text-white font-weight-bold text-uppercase"><?= $siswa ?> siswa</h4>
			</div>
		</div>
	</div>
	<div class="col-md mt-2">
		<div class="card bg-danger">
			<div class="card-body">
				<h4 class="text-white font-weight-bold text-uppercase">jumlah siswa tidak aktif</h4>
				<h4 class="text-white font-weight-bold text-uppercase"><?= $siswa_tidak_aktif ?> siswa</h4>
			</div>
		</div>
	</div>
	<div class="col-md mt-2">
		<div class="card bg-warning">
			<div class="card-body">
				<h4 class="text-white font-weight-bold text-uppercase">jurusan siswa</h4>
				<h4 class="text-white font-weight-bold text-uppercase"><?= $jurusan ?> jurusan</h4>
			</div>
		</div>
	</div>
	<div class="col-md mt-2">
		<div class="card bg-danger">
			<div class="card-body">
				<h4 class="text-white font-weight-bold text-uppercase">jumlah rombel </h4>
				<h4 class="text-white font-weight-bold text-uppercase"><?= $kelas['kelas'] ?> rombel</h4>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md mt-2">
		<div class="card">
			<div class="card-header bg-primary">
				<h5 class="font-weight-bolder text-white" style="text-transform: uppercase;">Identitas Sekolah</h5>
			</div>
			<div class="card-body">
				<table class="table table-border">
					<tbody class="text-dark">
						<tr>
							<td>Nama Sekolah </td>
							<td>: SMK Tunas Harapan</td>
						</tr>
						<tr>
							<td>NPSN </td>
							<td>: 20101484</td>
						</tr>
						<tr>
							<td>Alamat </td>
							<td>: JL. KOMP. BNI 46 PESING</td>
						</tr>
						<tr>
							<td>Email </td>
							<td>: admin@smkth-jakbar.com</td>
						</tr>
						<tr>
							<td>Website </td>
							<td>: <a class="text-dark" target="_blank" href="https://smkth-jakbar.com/">https://smkth-jakbar.com/</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md mt-2">
		<div class="card">
			<div class="card-header bg-primary">
				<h5 class="font-weight-bolder text-white" style="text-transform: uppercase;">Detail Aplikasi</h5>
			</div>
			<div class="card-body">
				<table class="table table-border">
					<tbody>
						<tr>
							<td>Versi Aplikasi </td>
							<td class="text-uppercase">: SPP <?= $version ?> (<?= $tahun_ajaran['tahun_ajaran'] ?>)</td>
						</tr>
						<tr>
							<td>Versi PHP </td>
							<td>: PHP 7.3.23</td>
						</tr>
						<tr>
							<td>Database </td>
							<td>: MySqli 5.0.12</td>
						</tr>
						<tr>
							<td>Web Server </td>
							<td>: Apache</td>
						</tr>
						<tr>
							<td>Contact Developer </td>
							<td>: <a class="btn btn-primary btn-sm" href="https://api.whatsapp.com/send?phone=62 81383814312&text=Assalamu'alaikum Selamat Pagi Siang Sore malam, Admin Pak Rahmadika, Saya ingin bertanya tentang pengisian SPP TU SMK TUNAS HARAPAN" target="_blank">DEVELOPER SPP TU</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>