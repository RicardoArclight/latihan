<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard<small> Control panel</small></h1>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 col-6">
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?php echo $jumlah_pengaduan ?></h3>
							<p>Jumlah Pengaduan</p>
						</div>
						<div class="icon">
							<i class="ion ion-android-list"></i>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-6">
					<div class="small-box bg-green">
						<div class="inner">
							<h3><?php echo $jumlah_ditanggapi  ?></h3>
							<p>Jumlah Sudah Ditanggapi</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-6">
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3><?php echo $jumlah_pengguna ?></h3>
							<p>Jumlah Pengguna</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-lg-6">

					<div class="box box-primary">
						<div class="box-body">
							<h3>Selamat Datang !</h3>

							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<tr>
										<th width="%">Nama</th>
										<th width="1px">:</th>
										<td>
											<?php
											$id_user = $this->session->userdata('id');
											$user = $this->db->query("select * from pengguna where id='$id_user'")->row();
											?>
											<p><?php echo $user->nama; ?></p>
										</td>
									</tr>
									<tr>
										<th width="20%">Username</th>
										<th width="1px">:</th>
										<td><?php echo $this->session->userdata('username') ?></td>
									</tr>
									<tr>
										<th width="20%">Level</th>
										<th width="1px">:</th>
										<td><?php echo $this->session->userdata('level') ?></td>
									</tr>
									<tr>
										<th width="20%">Status</th>
										<th width="1px">:</th>
										<td>Aktif</td>
									</tr>
								</table>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

</div>