<div class="page-heading">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="header-text">
          <h2>silahkan laporkan permasalahan anda</h2>
          <div class="div-dec"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ***** Main Banner Area End ***** -->

<section class="map">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div id="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15947.655275374054!2d113.8947849!3d-2.1863678!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dfcb3e68bdd1019%3A0x5032102225f7e98d!2sDinas%20Komunikasi%20Informatika%20Persandian%20dan%20Statistik%20(DISKOMINFOSANTIK)%20Provinsi%20Kalimantan%20Tengah!5e0!3m2!1sid!2sid!4v1695457202360!5m2!1sid!2sid" width="100%" height="450px" frameborder="0" style="border:0; border-radius: 5px; position: relative; z-index: 2;" allowfullscreen=""></iframe>
        </div>
      </div>
      <div class="col-lg-10 offset-lg-1">
        <div class="row">
          <div class="col-lg-6">
            <div class="info-item">
              <i class="fa fa-envelope"></i>
              <h4>Email Address</h4>
              <p style="font-size: 12px;">Diskominfosantiprovkal@gmail.com</p>
            </div>
          </div>
          <!-- <div class="col-lg-4">
            <div class="info-item">
              <i class="fa-brands fa-whatsapp" style="color: #1a551e;"></i>
              <h4>Whatsapp</h4>
              <a href="#">010-020-0340</a>
            </div>
          </div> -->
          <div class="col-lg-6">
            <div class="info-item">
              <i class="fa fa-map-marked-alt"></i>
              <h4>Alamat</h4>
              <a href="#">Palangkaraya, Provinsi Kalimantan Tengah</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="contact-us-form">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="section-heading">
          <h6>Helpdesk Service</h6>
          <h4>silahkan tuliskan pengaduan anda di form</h4>
        </div>
      </div>
      <div class="col-lg-10 offset-lg-1">
        <form id="contact" action="<?php echo base_url() . 'pengaduan/pengaduan_aksi'; ?>" method="post">
          <div class="row">
            <div class="col-lg-6">
              <fieldset>
                <input type="name" name="nama" id="name" placeholder="Nama" autocomplete="on" required>
              </fieldset>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <input type="phone" name="hp" id="phone" placeholder="No Telp/WA" autocomplete="on" required>
              </fieldset>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email" required="">
              </fieldset>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <input type="subjek" name="subjek" id="subjek" placeholder="Subjek" autocomplete="on" required>
              </fieldset>
            </div>
          </div>
          <div class="col-lg-12">
            <fieldset>
              <textarea name="pengaduan" id="summernote" placeholder="Silahkan isi"></textarea>
            </fieldset>
            <br>
          </div>
          <div class="col-lg-6">
            <input type="file" name="upload_file" id="file-input" onchange="toggleCancelButton()">
            <button type="button" id="cancel-upload" style="display: none;" onclick="cancelUpload()">Batal Upload</button>
          </div>
          <script>
            function toggleCancelButton() {
              var fileInput = document.getElementById('file-input');
              var cancelButton = document.getElementById('cancel-upload');

              if (fileInput.files.length > 0) {
                cancelButton.style.display = 'inline-block';
              } else {
                cancelButton.style.display = 'none';
              }
            }

            function cancelUpload() {
              var fileInput = document.getElementById('file-input');
              var cancelButton = document.getElementById('cancel-upload');

              fileInput.value = ''; // Menghapus nilai input file
              cancelButton.style.display = 'none'; // Menyembunyikan tombol "Batal Upload"
            }
          </script>
          <br>
          <div class="col-lg-12">
            <fieldset>
              <button style="mb-3" type="submit" id="form-submit" class="orange-button">kirim</button>
            </fieldset>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>