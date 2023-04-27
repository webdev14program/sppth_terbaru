<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	<title>SPP SMK TUNAS HARAPAN</title>
	<link rel="icon" href="https://smkth-jakbar.com/assets/images/logo.png">
</head>

<body>
	<div class="container mt-5">
		<!-- <h3 class="text-center text-uppercase font-weight-bold">Rekap Pembayaran SPP Per Kelas</h3>
        <h3 class="text-center text-uppercase font-weight-bold"><?= $header['kelas'] ?></h3> -->

		<div class="row">
			<div class="col-md">

				<div class="row">
					<img src="https://smkth-jakbar.com/assets/images/logo.png" style="width: 160px;height: 160px;margin-top: 20px; margin-left: 20px;">
					<div class="col-md mt-4">
						<table class="table border">
							<tbody>
								<tr>
									<td class="text-uppercase font-weight-bold">Nama Aplikasi </td>
									<td class="font-weight-bold text-uppercase">: SPP SMK TUNAS HARAPAN</td>
								</tr>
								<tr>
									<td class="text-uppercase font-weight-bold">Kelas</td>
									<td class="font-weight-bold text-uppercase">: <?= $header['kelas'] ?></td>
								</tr>

								<tr>
									<td class="text-uppercase font-weight-bold">Tahun Ajaran</td>
									<td class="font-weight-bold text-uppercase">: <?= $header['tahun_ajaran'] ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div><br>
				<hr style="border-top: 2px dashed black;">
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-md">
				<table class="table table-striped table-bordered">
					<thead>
						<tr class="text-uppercase">
							<th scope="col" class="text-center">No</th>
							<th scope="col" class="text-center">ID Siswa</th>
							<th scope="col">Nama Siswa</th>
							<th scope="col" class="text-center">Kelas</th>
							<th scope="col" class="text-center">Bulan Lunas</th>
							<th scope="col" class="text-center">Bulan Belum Lunas</th>

						</tr>
					</thead>
					<tbody>
						<tr>
							<?php
							$no = 1;
							foreach ($siswa as $row) {
							?>
								<td class="text-center"><?php echo $no++; ?></td>
								<td class="text-center"><?= $row['nis']; ?></td>
								<td class="text-uppercase"><?= $row['nama_siswa']; ?></td>
								<td class="text-uppercase text-center"><?= $row['kelas']; ?></td>
								<td class="text-uppercase text-center"><?= $row['jumlah_bulan']; ?> Bulan</td>
								<td class="text-uppercase text-center"><?= 11 - $row['jumlah_bulan']; ?> Bulan</td>
						</tr>
					<?php } ?>
					<!-- <tr>
                        <td colspan="2" class="font-weight-bold text-center text-uppercase">Jumlah Pembayaran SPP</td>
                        <td colspan="2" class="font-weight-bold text-center text-uppercase"><?= $hasil_rupiah = "Rp " . number_format($header['total_spp'], 2, ',', '.') ?></td>
                    </tr> -->
					</tbody>
				</table>
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-md">
				<h4 class="text-center"><?php
										function bulan_indo($bln)
										{
											$bln = (int) $bln;
											$bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

											return $bulan[$bln];
										}
										function tgl_indo($tgl)
										{
											$tanggal = substr($tgl, 8, 2);
											$bulan = bulan_indo(substr($tgl, 5, 2));
											$tahun = substr($tgl, 0, 4);

											return $tanggal . ' ' . $bulan . ' ' . $tahun;
										}
										$tanggal = date('Y-m-d');
										$bulan = date('m');
										echo tgl_indo($tanggal);
										?></h4>
				<h4 class="text-center">Kepala Tata Usaha</h4>
				<h4 class="text-center" style="margin-top: 120px;">Septiana Pajar Nurcahyati, A.md</h4>
			</div>
			<div class="col-md">
				<h4 class="text-center">Yang Mengetahui</h4>
				<h4 class="text-center">Kepala Sekolah</h4>
				<h4 class="text-center" style="margin-top: 120px;">Widodo, S.E, M.M</h4>
			</div>
		</div>
	</div>

	<script>
		window.print();
	</script>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>

</html>
