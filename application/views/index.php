<div tabindex="-1" class="modal bs-example-modal-sm" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Logout <i class="fa fa-lock"></i></h4>
			</div>
			<div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?
			</div>
			<div class="modal-footer"><a class="btn btn-primary btn-block" href="javascript:;">Logout</a></div>
		</div>
	</div>
</div>
<!--end header -->
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content pt-1">
		<div class="row text-center mb-4 pb-2 border-bottom">
			<h4 class="mb-0 mt-0">SELAMAT DATANG</h4>
			<h4 class="mb-0">DI APLIKASI SARPRAS</h4>
			<h4 class="mb-0">SMK PASUNDAN 2 CIANJUR</h4>
			<h5 class="mb-0">Aplikasi Sarana dan Prasarana yang membantu memudahkan pekerjaan anda</h5>
		</div>
		<div class="row row-cols-1 row-cols-lg-3 row-cols-xl-3 justify-content-center">
			<div class="col">
				<div class="card radius-10 overflow-hidden bg-danger">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-white">Barang</p>
								<h5 class="mb-0 text-white"><?= $barang; ?></h5>
							</div>
							<div class="ms-auto text-white"> <i class='bx bx-briefcase font-30'></i>
							</div>
						</div>
					</div>
					<!-- <div class="" id="chart1"></div> -->
				</div>
			</div>

			<div class="col">
				<div class="card radius-10 overflow-hidden bg-primary">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-white">Ruangan</p>
								<h5 class="mb-0 text-white"><?= $ruangan; ?></h5>
							</div>
							<div class="ms-auto text-white"> <i class='bx bx-door-open font-30'></i>
							</div>
						</div>
					</div>
					<!-- <div class="" id="chart2"></div> -->
				</div>
			</div>
			<?php if ($this->session->userdata('role') == 'staff') { ?>
				<div class="col">
					<div class="card radius-10 overflow-hidden bg-warning">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-dark">Peminjaman</p>
									<h5 class="mb-0 text-dark"><?= $peminjaman; ?></h5>
								</div>
								<div class="ms-auto text-dark"> <i class='bx bx-task font-30'></i>
								</div>
							</div>
						</div>
						<!-- <div class="" id="chart3"></div> -->
					</div>
				</div>
			<?php } ?>
		</div><!--end row-->



	</div>
</div>
<!--end page wrapper -->
<!--start overlay-->