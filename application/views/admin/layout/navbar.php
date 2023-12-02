<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto dropdown-menu-dark">
        <!-- Notifications Dropdown Menu -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url(); ?>adm/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs">HAK AKSES : <b><?php echo $this->session->userdata('level') ?></b></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li class="user-header">
              <img src="<?php echo base_url(); ?>adm/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              <p>
                <?php echo $this->session->userdata('username') ?>
                <small>Hak akses : <?php echo $this->session->userdata('level') ?></small>
              </p>
            </li>

            <li class="user-footer">
              <div class="float-left">
                <a href="<?php echo base_url() . 'dashboard/profil' ?>" class="btn btn-default btn-flat">Profil</a>
              </div>
              <div class="float-right">
                <a href="<?php echo base_url() . 'dashboard/keluar' ?>" class="btn btn-default btn-flat">Keluar</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->