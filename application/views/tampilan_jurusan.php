<div class="alert alert-success" role="alert">
	<h5 class="text-center text-uppercase font-weight-bold">jurusan</h5>
</div>

<div class="row">
	<div class="col-md">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr class="text-center">
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">#</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">ID Jurusan</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">Kode Jurusan</h6>
								</th>
								<th scope="col">
									<h6 class="font-weight-bold" style="text-transform: uppercase;">Jurusan</h6>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
								$no = 1;
								foreach ($jurusan as $row) {
								?>
									<td class="text-centers">
										<h6><?php echo $no++; ?></h6>
									</td>
									<td>
										<h6 class="text-uppercase text-center"><?php echo $row['id']; ?></h6>
									</td>
									<td>
										<h6 class="text-uppercase text-center"><?php echo $row['kode']; ?></h6>
									</td>
									<td>
										<h6 class="text-uppercase"><?php echo $row['jurusan']; ?></h6>
									</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>