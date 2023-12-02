<div class="content-wrapper">
	<section class="content">
		<h1>Pengaduan</h1>
		<br />
		<br />
		<div class="tab-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Daftar Pengaduan</h3>
						</div>
						<div class="card-body">
							<table id="example2" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="1%">NO</th>
										<th>Tiket</th>
										<th width="15%">Nama</th>
										<th>Email</th>
										<th>Isi</th>
										<th>Tanggal</th>
										<th>Status</th>
										<th width="10%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($pengaduan as $k) {
									?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $k->tiket; ?></td>
											<td><?php echo $k->nama_pengadu; ?></td>
											<td><?php echo $k->email_pengadu; ?></td>
											<!-- <td><?php echo $k->jenis_pengaduan; ?></td> -->
											<td><?php echo $k->isi_pengaduan; ?></td>
											<td><?php echo $k->tanggal_pengaduan; ?></td>
											<td>
												<?php
												if ($k->status_pengaduan == "Sudah") {
													echo "<span class='label label-success'>Sudah Ditanggapi</span>";
												} else {
													echo "<span class='label label-danger'>Belum Ditanggapi</span>";
												}
												?>

											</td>
											<td>
												<a href="<?php echo base_url() . 'dashboard/pengaduan_balas/' . $k->id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pen"></i> </a>
												<a href="" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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
	</section>

</div>