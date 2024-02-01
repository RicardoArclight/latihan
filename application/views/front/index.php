<body>
  <!-- ***** Main Banner Area Start ***** -->
  <div class="swiper-container" id="top">
    <div class="slide-inner" style="background-image:url(<?php echo base_url(); ?>asset/assets/images/diskominfo.jpg)">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="header-text">
              <h2>
                <en><br><?php echo $satu ?></en><br><em><?php echo $dua ?></em>
              </h2>
              <div class="div-dec"></div>
              <form action="<?php echo base_url('welcome/search'); ?>" id="contact" method="post">
                <input class="form-control form-control-sidebar" name="tiket" value="" type="search" placeholder="cek pengaduan" aria-label="Search" required />
                <P></P>

                <button type="submit" id="form-submit" class="green-button">Cari</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>