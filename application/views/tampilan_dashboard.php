<!-- Page Wrapper -->
<div id="wrapper">

	<!-- Sidebar -->
	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>Dashboard">
			<div class="sidebar-brand-text mx-3 text-uppercase">Admin SPP <br> SMK TH</sup></div>
		</a>

		<!-- Divider -->
		<hr class="sidebar-divider my-0">

		<!-- Nav Item - Dashboard -->
		<li class="nav-item active">
			<a class="nav-link" href="<?= base_url() ?>Dashboard">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>DASHBOARD</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading text-uppercase">
			master akademik
		</div>
		<li class="nav-item text-uppercase">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-cog"></i>
				<span class="text-uppercase">master akademik</span>
			</a>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded text-primary">
					<a class="collapse-item text-primary" href="<?= base_url() ?>Tahun_ajaran">Tahun Ajaran</a>
					<a class="collapse-item text-primary" href="<?= base_url() ?>Jurusan">Jurusan</a>
					<a class="collapse-item text-primary" href="<?= base_url() ?>Kelas">Kelas</a>
					<a class="collapse-item text-primary" href="<?= base_url() ?>Peserta_didik">Peserta Didik</a>
					<a class="collapse-item text-primary" href="<?= base_url() ?>Peserta_didik/data_siswa_non_aktif"> PD Non Aktif</a>
					<a class="collapse-item text-primary" href="<?= base_url() ?>Peserta_didik/nis_siswa_tahun_ajaran"> NIS Siswa</a>
				</div>
			</div>
		</li>
		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Pembayaran
		</div>
		<!-- Nav Item - Charts -->
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url() ?>Pembayaran">
				<i class="fas fa-credit-card"></i>
				<span class="text-uppercase">Pembayaran</span></a>
		</li>


		<hr class="sidebar-divider d-none d-md-block">
		<div class="sidebar-heading">
			laporan
		</div>
		<!-- Nav Item - Charts -->
		<li class="nav-item text-uppercase">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapse">
				<i class="fas fa-book-open"></i>
				<span>PEMBAYARAN SPP</span>
			</a>
			<div id="collapsePages" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item text-primary" href="<?= base_url() ?>Laporan_spp/rekap_spp_perbulan_perhari">Rekap Hari</a>
					<a class="collapse-item text-primary" href="<?= base_url() ?>Laporan_spp/rekap_spp_perbulan_perbulan">Rekap Bulan</a>
					<a class="collapse-item text-primary" href="<?= base_url() ?>Laporan_spp/rekap_spp_kelas">Rekap Kelas</a>
				</div>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
				<i class="fas fa-book-open"></i>
				<span>ADMINISTRASI</span>
			</a>
			<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="#">Rekap Perhari</a>
					<a class="collapse-item" href="#">Rekap Kelas</a>
				</div>
			</div>
		</li>
		<hr class="sidebar-divider d-none d-md-block">
		<div class="sidebar-heading">
			Setting
		</div>
		<!-- <li class="nav-item">
			<a class="nav-link" href="<?= base_url() ?>Setting/setting_sistem">
				<i class="fas fa-cog"></i>
				<span class="text-uppercase">setting sistem</span></a>
		</li> -->
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url() ?>Setting/setting_spp">
				<i class="fas fa-cog"></i>
				<span class="text-uppercase">Pembayaran SPP</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url() ?>Setting/setting_adm_lain">
				<i class="fas fa-cog"></i>
				<span class="text-uppercase">Pembayaran ADM Lain</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url() ?>Setting/setting_daftar_ulang">
				<i class="fas fa-cog"></i>
				<span class="text-uppercase">Daftar Ulang</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url() ?>Setting/setting_uang_masuk_sekolah">
				<i class="fas fa-cog"></i>
				<span class="text-uppercase">Uang Masuk SEKOLAH</span></a>
		</li>
		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>
		<!-- Sidebar Message -->
	</ul>
	<!-- End of Sidebar -->

	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">

			<!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

				<!-- Sidebar Toggle (Topbar) -->
				<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
					<i class="fa fa-bars"></i>
				</button>
				<!-- Topbar Navbar -->
				<ul class="navbar-nav ml-auto">
					<div class="topbar-divider d-none d-sm-block"></div>

					<!-- Nav Item - User Information -->
					<li class="nav-item dropdown no-arrow">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="mr-2 d-none d-lg-inline text-gray-600 small">ADMIN SPP SMK TH</span>
							<img class="img-profile rounded-circle" src="https://smkth-jakbar.com/assets/images/logo.png">
						</a>
						<!-- Dropdown - User Information -->
						<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
								<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
								Logout
							</a>
						</div>
					</li>

				</ul>

			</nav>
			<!-- End of Topbar -->

			<!-- Begin Page Content -->
			<div class="container-fluid">
				<?php $this->load->view($content) ?>
			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->

		<!-- Footer -->
		<footer class="sticky-footer bg-warning ">
			<div class="container my-auto">
				<div class="copyright text-center text-white my-auto">
					<h6 class="text-center font-weight-bold">Copyright &copy; SMK Tunas Harapan</h6>
					<h6 class="text-center font-weight-bold">Developer by Rahmadika Surya Setiawan, S.Kom</h6>
				</div>
			</div>
		</footer>
		<!-- End of Footer -->

	</div>
	<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">INGIN KELUAR APLIKASI SEKARANG?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body"><span class="text-danger">LOGOUT UNTUK KELUAR SYSTEM</span> </div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?= base_url() ?>Dashboard/logout">Logout</a>
			</div>
		</div>
	</div>
</div>