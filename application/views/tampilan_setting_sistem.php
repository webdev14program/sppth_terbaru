<div class="alert alert-dark " role="alert">
	<h3 class="text-center text-uppercase font-weight-bold">setting sistem</h3>
</div>
<?= $this->session->flashdata('info') ?>
<div class="row">
	<div class="col-md">
		<div class="card">
			<div class="card-header bg-gradient-danger text-white">
				<h5 class="text-center text-uppercase font-weight-bold">Hapus</h5>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md">
						<div class="card">
							<div class="card-header bg-gradient-success text-white text-center">
								<h5 class="text-uppercase font-weight-bold">spp</h5>
							</div>
							<div class="card-body">
								<h5 class="text-center text-uppercase font-weight-bold">
									<a class="btn btn-danger btn-sm" href="<?= base_url() ?>Setting/hapus_data_spp_all">Hapus</a>
								</h5>
							</div>
						</div>
					</div>
					<div class="col-md">
						<div class="card">
							<div class="card-header bg-gradient-info text-white text-center">
								<h5 class="text-uppercase font-weight-bold">adm lain</h5>
							</div>
							<div class="card-body">
								<h5 class="text-center text-uppercase font-weight-bold">
									<a class="btn btn-danger btn-sm" href="">Hapus</a>
								</h5>
							</div>
						</div>
					</div>
					<div class="col-md">
						<div class="card">
							<div class="card-header bg-gradient-primary text-white text-center">
								<h5 class="text-uppercase font-weight-bold">uang masuk</h5>
							</div>
							<div class="card-body">
								<h5 class="text-center text-uppercase font-weight-bold">
									<a class="btn btn-danger btn-sm" href="">Hapus</a>
								</h5>
							</div>
						</div>
					</div>
					<div class="col-md">
						<div class="card">
							<div class="card-header bg-gradient-dark text-white text-center">
								<h5 class="text-uppercase font-weight-bold">daftar ulang</h5>
							</div>
							<div class="card-body">
								<h5 class="text-center text-uppercase font-weight-bold">
									<a class="btn btn-danger btn-sm" href="">Hapus</a>
								</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>