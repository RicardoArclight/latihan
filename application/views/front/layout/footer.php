<div style="height: 60px;"></div>
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