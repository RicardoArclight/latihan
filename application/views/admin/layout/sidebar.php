<aside class="main-sidebar">
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<?php
						$id_user = $this->session->userdata('id');
						$user = $this->db->query("select * from pengguna where pengguna_id='$id_user'")->row();
						?>
						<p><?php echo $user->pengguna_nama; ?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>

				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>
					<li>
						<a href="<?php echo base_url() . 'dashboard' ?>">
							<i class="fa fa-dashboard"></i>
							<span>DASHBOARD</span>


						</a>
					</li>
					<?php
					if ($this->session->userdata('level') == "admin") {
					?>
						<li>
							<a href="<?php echo base_url() . 'dashboard/kategori' ?>">
								<i class="fa fa-th"></i>
								<span>KATEGORI</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() . 'dashboard/fakultas' ?>">
								<i class="fa fa-university"></i>
								<span>Fakultas & Prodi</span>
							</a>
						</li>
					<?php
					}
					?>
					<?php
					if ($this->session->userdata('level') == "admin" || $this->session->userdata('level') == "auditor" || $this->session->userdata('level') == "auditee" || $this->session->userdata('level') == "verifikator") {
					?>
						<li class="treeview">
							<a href="">
								<i class="fa fa-folder"></i><span>SPMI</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								<?php
								if ($this->session->userdata('level') == "admin" || $this->session->userdata('level') == "auditor" || $this->session->userdata('level') == "verifikator") {
								?>
									<?php if ($this->fungsi->penetapan()+$this->fungsi->pelaksanaan()+$this->fungsi->evaluasi()+$this->fungsi->pengendalian()+$this->fungsi->peningkatan() == 0)  { 
									?>
									<span class="pull-right-container">
										<small class="label pull-right bg-green"><?=$this->fungsi->penetapan()+$this->fungsi->pelaksanaan()+$this->fungsi->evaluasi()+$this->fungsi->pengendalian()+$this->fungsi->peningkatan()?></small>
									</span>
									<?php
									} else  { 
										?>
										<span class="pull-right-container">
											<small class="label pull-right bg-red"><?=$this->fungsi->penetapan()+$this->fungsi->pelaksanaan()+$this->fungsi->evaluasi()+$this->fungsi->pengendalian()+$this->fungsi->peningkatan()?></small>
										</span>
										<?php
										}
										?>
								<?php
								}
								?>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url() . 'spmi/penetapan' ?>"><i class="fa fa-circle-o"></i> Penetapan
										<?php
										if ($this->session->userdata('level') == "admin" || $this->session->userdata('level') == "auditor" || $this->session->userdata('level') == "verifikator") {
										?>		
											<?php if ($this->fungsi->penetapan() == 0)  { 
											?>
											<span class="pull-right-container">
												<small class="label pull-right bg-green"><?=$this->fungsi->penetapan()?></small>
											</span>
											<?php
											} else  { 
												?>
												<span class="pull-right-container">
													<small class="label pull-right bg-red"><?=$this->fungsi->penetapan()?></small>
												</span>
												<?php
												}
												?>
										<?php
										}
										?>
									</a>
								</li>
								<li><a href="<?php echo base_url() . 'spmi/pelaksanaan' ?>"><i class="fa fa-circle-o"></i> Pelaksanaan
										<?php
										if ($this->session->userdata('level') == "admin" || $this->session->userdata('level') == "auditor" || $this->session->userdata('level') == "verifikator") {
										?>		
											<?php if ($this->fungsi->pelaksanaan() == 0)  { 
											?>
											<span class="pull-right-container">
												<small class="label pull-right bg-green"><?=$this->fungsi->pelaksanaan()?></small>
											</span>
											<?php
											} else  { 
												?>
												<span class="pull-right-container">
													<small class="label pull-right bg-red"><?=$this->fungsi->pelaksanaan()?></small>
												</span>
												<?php
												}
												?>
										<?php
										}
										?>
									</a>
								</li>
								<li><a href="<?php echo base_url() . 'spmi/evaluasi' ?>"><i class="fa fa-circle-o"></i> Evaluasi
										<?php
										if ($this->session->userdata('level') == "admin" || $this->session->userdata('level') == "auditor" || $this->session->userdata('level') == "verifikator") {
										?>	
											<?php if ($this->fungsi->evaluasi() == 0)  { 
											?>
											<span class="pull-right-container">
												<small class="label pull-right bg-green"><?=$this->fungsi->evaluasi()?></small>
											</span>
											<?php
											} else  { 
												?>
												<span class="pull-right-container">
													<small class="label pull-right bg-red"><?=$this->fungsi->evaluasi()?></small>
												</span>
												<?php
												}
												?>
										<?php
										}
										?>
									</a>
								</li>
								<li><a href="<?php echo base_url() . 'spmi/pengendalian' ?>"><i class="fa fa-circle-o"></i> Pengendalian
										<?php
										if ($this->session->userdata('level') == "admin" || $this->session->userdata('level') == "auditor" || $this->session->userdata('level') == "verifikator") {
										?>		
											<?php if ($this->fungsi->pengendalian() == 0)  { 
											?>
											<span class="pull-right-container">
												<small class="label pull-right bg-green"><?=$this->fungsi->pengendalian()?></small>
											</span>
											<?php
											} else  { 
												?>
												<span class="pull-right-container">
													<small class="label pull-right bg-red"><?=$this->fungsi->pengendalian()?></small>
												</span>
												<?php
												}
												?>
										<?php
										}
										?>
									</a>
								</li>
								<li><a href="<?php echo base_url() . 'spmi/peningkatan' ?>"><i class="fa fa-circle-o"></i> Peningkatan
										<?php
										if ($this->session->userdata('level') == "admin" || $this->session->userdata('level') == "auditor" || $this->session->userdata('level') == "verifikator") {
										?>	
											<?php if ($this->fungsi->peningkatan() == 0)  { 
											?>
											<span class="pull-right-container">
												<small class="label pull-right bg-green"><?=$this->fungsi->peningkatan()?></small>
											</span>
											<?php
											} else  { 
												?>
												<span class="pull-right-container">
													<small class="label pull-right bg-red"><?=$this->fungsi->peningkatan()?></small>
												</span>
												<?php
												}
												?>
										<?php
										}
										?>
									</a>
								</li>
							</ul>
						</li>
					<?php
					}
					?>

					<?php
					if ($this->session->userdata('level') == "admin" || $this->session->userdata('level') == "penulis") {
					?>
						<li>
							<a href="<?php echo base_url() . 'dashboard/artikel' ?>">
								<i class="fa fa-pencil"></i>
								<span>ARTIKEL</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() . 'dashboard/gallery' ?>">
								<i class="fa fa-image"></i>
								<span>GALERI</span>
							</a>
						</li>
					<?php
					}
					?>

					<?php
					if ($this->session->userdata('level') == "admin") {
					?>
						<li>
							<a href="<?php echo base_url() . 'dashboard/pages' ?>">
								<i class="fa fa-files-o"></i>
								<span>PAGES</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() . 'dashboard/pengguna' ?>">
								<i class="fa fa-users"></i>
								<span>PENGGUNA & HAK AKSES</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() . 'dashboard/pengaturan' ?>">
								<i class="fa fa-edit"></i>
								<span>PENGATURAN WEBSITE</span>
							</a>
						</li>
					<?php
					}
					?>

					<li>
						<a href="<?php echo base_url() . 'dashboard/profil' ?>">
							<i class="fa fa-user"></i>
							<span>PROFIL</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() . 'dashboard/ganti_password' ?>">
							<i class="fa fa-lock"></i>
							<span>GANTI PASSWORD</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() . 'dashboard/keluar' ?>">
							<i class="fa fa-share"></i>
							<span>KELUAR</span>
						</a>
					</li>
				</ul>
			</section>
		</aside>