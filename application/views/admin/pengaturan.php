<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Pengaturan
			<br>
			<small>Update Pengaturan Website</small>
		</h1>
		<br>
		<?php
		if (isset($_GET['alert'])) {
			if ($_GET['alert'] == "sukses") {
				echo "<div class='alert alert-success'>Pengaturan telah diupdate!</div>";
			}
		}
		?>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="card card-default">
				<div class="card-header">
					<h3 class="card-title">Pengaturan</h3>
				</div>
				<div class="card-body">


						<form method="post" action="<?php echo base_url('dashboard/pengaturan_update') ?>" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Nama Website</label>
										<input type="text" name="nama" class="form-control" placeholder="Masukkan nama website.." value="<?php echo $pengaturan->nama; ?>">
										<?php echo form_error('nama'); ?>
									</div>

									<div class="form-group">
										<label>Deskripsi Website</label>
										<input type="text" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi .." value="<?php echo $pengaturan->deskripsi; ?>">
										<?php echo form_error('deskripsi'); ?>
									</div>

									<div class="form-group">
										<div>
											<label>Logo Website</label>
											<input type="file" name="logo">
										</div>
										<small>Kosongkan jika tidak ingin mengubah logo</small>
									</div>
									<div class="form-group">
										<div>
											<label>Background Website</label>
											<input type="file" name="bg">
										</div>
										<small>Kosongkan jika tidak ingin mengubah Background</small>
									</div>
									<div class="form-group">
										<div>
											<label>Struktur Organisasi</label>
											<input type="file" name="struktur">
										</div>
										<small>Kosongkan jika tidak ingin mengubah logo</small>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Email</label>
										<input type="text" name="link_email" class="form-control" placeholder="Masukkan Email.." value="<?php echo $pengaturan->link_email; ?>">
										<?php echo form_error('link_email'); ?>
									</div>

									<div class="form-group">
										<label>Whatsapp</label>
										<input type="text" name="link_wa" class="form-control" placeholder="Masukkan No Whatsapp.." value="<?php echo $pengaturan->link_wa; ?>">
										<?php echo form_error('link_wa'); ?>
									</div>

									
								</div>
								<div class="col-md-12">
									<hr>
									<div class="card-body">
										<div class="form-group">
								
										<hr>
									</div>
									<div class="card-footer">
										<input type="submit" class="btn btn-success" value="Simpan">
									</div>
								</div>
							</div>
						</form>

				</div>

			</div>
		</div>
	</section>
</div>