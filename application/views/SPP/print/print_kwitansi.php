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
	<div class="container">
		<h4 class="text-uppercase text-center font-weight-bold mt-5">Kwitansi Pembayaran SPP</h4>
		<div class="row">
			<div class="col-md">

				<div class="row">
					<div class="col-md mt-4">
						<table class="table border">
							<tbody>
								<tr>
									<td class="text-uppercase font-weight-bold">
										Nama Siswa
									</td>
									<td class="font-weight-bold text-uppercase">
										: <?= $kwitansi['nama_siswa'] ?>
									</td>
								</tr>

								<tr>
									<td class="text-uppercase font-weight-bold">
										Kelas
									</td>
									<td class="font-weight-bold text-uppercase">
										: <?= $kwitansi['kelas'] ?>
									</td>
								</tr>
								<tr>
									<td class="text-uppercase font-weight-bold">
										Tahun Ajaran
									</td>
									<td class="font-weight-bold text-uppercase">
										: <?= $kwitansi['tahun_ajaran'] ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md mt-4">
						<table class="table border">
							<tbody>
								<tr>
									<td class="text-uppercase font-weight-bold">Bulan</td>
									<td class="font-weight-bold text-uppercase">: <?= $kwitansi['bulan'] ?></td>
								</tr>
								<tr>
									<td class="text-uppercase font-weight-bold">Nominal</td>
									<td class="font-weight-bold text-uppercase">: <?= $hasil_rupiah = "Rp " . number_format($kwitansi['jumlah_bayar_spp'], 0, ',', '.') ?></td>
								</tr>

								<tr>
									<td class="text-uppercase font-weight-bold">Tanggal & Waktu</td>
									<td class="font-weight-bold text-uppercase">: <?= $kwitansi['date'] ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row mt-2">
			<div class="col-md">
			</div>
			<div class="col-md">
				<h5 class="text-center"><?php
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
										?></h5>
				<h5 class="text-center">Kepala Tata Usaha</h5>
				<h5 class="text-center" style="margin-top: 90px;">Septiana Pajar Nurcahyati, A.md</h5>
			</div>
		</div>
	</div>




	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</body>

</html>
