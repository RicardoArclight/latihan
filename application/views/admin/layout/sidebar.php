<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url() . 'dashboard' ?>" class="brand-link">
    <?php $pengaturan = $this->m_data->get_data('pengaturan')->row(); ?>
    <!-- <img src="<?php echo base_url() . '/gambar/website/' . $pengaturan->logo; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" /> -->
    <span class="brand-text font-weight"><b>Diskominfosantik</b></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url() ?>adm/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
      </div>
      <div class="info">
        <?php
        // $id_user = $this->session->userdata('id');
        // $user = $this->db->query("select * from pengguna where id='$id_user'")->row(); 
        ?>
        <a><?php echo $this->session->userdata('nama'); ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?php echo base_url() . 'dashboard' ?>" class="nav-link <?= $this->uri->segment(2) == '' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <?php
        if ($this->session->userdata('level') == "admin") {
        ?>
          <li class="nav-item <?= $this->uri->segment(2) == 'kategori' || $this->uri->segment(2) == 'polsek' || $this->uri->segment(2) == 'satker' || $this->uri->segment(2) == 'aplikasi' || $this->uri->segment(2) == 'pengguna' ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= $this->uri->segment(2) == 'kategori' || $this->uri->segment(2) == 'polsek' || $this->uri->segment(2) == 'satker' || $this->uri->segment(2) == 'aplikasi' || $this->uri->segment(2) == 'pengguna' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">

              <li class="nav-item">
                <a href="<?php echo base_url() . 'dashboard/pengguna' ?>" class="nav-link <?= $this->uri->segment(2) == 'pengguna' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PENGGUNA & HAK AKSES</p>
                </a>
              </li>
            </ul>
          </li>
        <?php
        }
        ?>

        <li class="nav-item">
          <a href="<?php echo base_url() . 'dashboard/pengaduan' ?>" class="nav-link <?= $this->uri->segment(2) == 'pengaduan' ? 'active' : '' ?>">
            <i class="nav-icon fa fa-envelope"></i>
            <p>PENGADUAN</p>
          </a>
        </li>
        <?php
        if ($this->session->userdata('level') == "admin") {
        ?>
          <li class="nav-item">
            <a href="<?php echo base_url() . 'dashboard/pengaturan' ?>" class="nav-link <?= $this->uri->segment(2) == 'pengaturan' ? 'active' : '' ?>">
              <i class="nav-icon fa fa-cog"></i>
              <p>PENGATURAN WEBSITE</p>
            </a>
          </li>
        <?php
        }
        ?>
        <li class="nav-item">
          <a href="<?php echo base_url() . 'dashboard/ganti_password' ?>" class="nav-link <?= $this->uri->segment(2) == 'ganti_password' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-lock"></i>
            <p>GANTI PASSWORD</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url() . 'dashboard/keluar' ?>" class="nav-link">
            <i class="nav-icon fas fa-share"></i>
            <p>KELUAR</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>