<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Profil
		</h1>
		<small>Update Profil Pengguna</small>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Update Profil</h3>
					</div>
					<div class="card-body">

						<?php 
						if(isset($_GET['alert'])){
							if($_GET['alert'] == "sukses"){
								echo "<div class='alert alert-success'>Profil telah diupdate!</div>";
							}
						}
						?>
						
						<?php foreach($profil as $p){ ?>

							<form method="post" action="<?php echo base_url('dashboard/profil_update') ?>">
								<div class="box-body">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" name="nama" class="form-control" placeholder="Masukkan nama .." value="<?php echo $p->nama; ?>">
										<?php echo form_error('nama'); ?>
									</div>

									<div class="form-group">
										<label>Email</label>
										<input type="text" name="email" class="form-control" placeholder="Masukkan email .." value="<?php echo $p->email; ?>">
										<?php echo form_error('email'); ?>
									</div>
								</div>

								<div class="box-footer">
									<input type="submit" class="btn btn-success" value="Update">
								</div>
							</form>

						<?php } ?>

					</div>
				</div>

			</div>
		</div>

	</section>

</div>