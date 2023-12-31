<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Pengguna
			<small>Konfirmasi Hapus Pengguna</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				<a href="<?php echo base_url() . 'dashboard/pengguna'; ?>" class="btn btn-sm btn-primary">Kembali</a>

				<br />
				<br />

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Konfirmasi Hapus</h3>
					</div>
					<div class="card-body">

						<!-- <p><b><?php echo $hapus->nama; ?></b><b><?php echo $hapus->nama; ?></b></p> -->

						<form method="post" action="<?php echo base_url('dashboard/pengguna_hapus_aksi') ?>">
							<div class="card-body">
								<div class="form-group">
									<label>Nama Pengguna</label>
									<input type="hidden" name="hapus" value="<?php echo $hapus->id; ?>">

									<select class="form-control" name="tujuan" required="required">
										<option value="">- Pilih Level -</option>
										<?php foreach ($lain as $pl) { ?>
											<option value="<?php echo $pl->id ?>"><?php echo $pl->nama; ?></option>
										<?php } ?>
									</select>
								</div>

							</div>

							<div class="card-footer">
								<input type="submit" class="btn btn-success" value="Hapus Pengguna">
							</div>
						</form>

					</div>
				</div>

			</div>
		</div>

	</section>

</div>