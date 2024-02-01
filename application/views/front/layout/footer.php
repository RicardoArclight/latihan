<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <p>Copyright © 2023 Ricardo D. Prayoga

      </div>
    </div>
  </div>
</footer>

<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url(); ?>asset/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo base_url(); ?>asset/assets/js/isotope.min.js"></script>
<script src="<?php echo base_url(); ?>asset/assets/js/owl-carousel.js"></script>
<script src="<?php echo base_url(); ?>asset/assets/js/tabs.js"></script>
<!-- <script src="<?php echo base_url(); ?>asset/assets/js/swiper.js"></script> -->
<script src="<?php echo base_url(); ?>asset/assets/js/custom.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>adm/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>adm/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>adm/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>adm/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>adm/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>adm/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>adm/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>adm/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>adm/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>adm/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>adm/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>adm/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="<?php echo base_url(); ?>asset/assets/script.js"></script>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example4').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#summernote').summernote({
      height: "200px",
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link']]

      ],
      callbacks: {
        onImageUpload: function(image) {
          uploadImage(image[0]);
        },
        onMediaDelete: function(target) {
          deleteImage(target[0].src);
        }
      }
    });

    function uploadImage(image) {
      var data = new FormData();
      data.append("image", image);
      $.ajax({
        url: "<?= site_url('pengaduan/upload_image') ?>",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "POST",
        success: function(url) {
          $('#summernote').summernote("insertImage", url);
        },
        error: function(data) {
          console.log(data);
        }
      });
    }

    function deleteImage(src) {
      $.ajax({
        data: {
          src: src
        },
        type: "POST",
        url: "<?= site_url('pengaduan/delete_image') ?>",
        cache: false,
        success: function(response) {
          console.log(response);
        }
      });
    }
  });
</script>
<script>
  var interleaveOffset = 0.5;

  var swiperOptions = {
    loop: true,
    speed: 1000,
    grabCursor: true,
    watchSlidesProgress: true,
    mousewheelControl: true,
    keyboardControl: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    on: {
      progress: function() {
        var swiper = this;
        for (var i = 0; i < swiper.slides.length; i++) {
          var slideProgress = swiper.slides[i].progress;
          var innerOffset = swiper.width * interleaveOffset;
          var innerTranslate = slideProgress * innerOffset;
          swiper.slides[i].querySelector(".slide-inner").style.transform =
            "translate3d(" + innerTranslate + "px, 0, 0)";
        }
      },
      touchStart: function() {
        var swiper = this;
        for (var i = 0; i < swiper.slides.length; i++) {
          swiper.slides[i].style.transition = "";
        }
      },
      setTransition: function(speed) {
        var swiper = this;
        for (var i = 0; i < swiper.slides.length; i++) {
          swiper.slides[i].style.transition = speed + "ms";
          swiper.slides[i].querySelector(".slide-inner").style.transition =
            speed + "ms";
        }
      }
    }
  };

  var swiper = new Swiper(".swiper-container", swiperOptions);
</script>
</body>

</html>