
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo URL; ?>public/assets2/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="<?php echo URL; ?>public/assets2/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/select2/dist/js/select2.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/nouislider/distribute/nouislider.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/quill/dist/quill.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/dropzone/dist/min/dropzone.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="<?php echo URL; ?>public/assets2/vendor/dropzone/dist/min/dropzone.min.js"></script>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
  <!-- Argon JS -->
  <script src="<?php echo URL; ?>public/assets2/js/argon.js?v=1.1.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="<?php echo URL; ?>public/assets2/js/demo.min.js"></script>
  <script>
      if ( window.location.href.indexOf('category') > -1){
        $('[href*="category"]').closest('.nav-link').addClass("active")
      }else if ( window.location.href.indexOf('chambre') > -1){
        $('[href*="chambre"]').closest('.nav-link').addClass("active")
      }else if ( window.location.href.indexOf('dashboards') > -1){
        $('[href*="dashboards"]').closest('.nav-link').addClass("active")     
      }else if ( window.location.href.indexOf('image') > -1){
          $('[href*="image"]').closest('.nav-link').addClass("active")
      }else if ( window.location.href.indexOf('ville') > -1){
          $('[href*="ville"]').closest('.nav-link').addClass("active")
      }else if ( window.location.href.indexOf('hotel') > -1){
          $('[href*="hotel"]').closest('.nav-link').addClass("active")
      }else if ( window.location.href.indexOf('promotion') > -1){
          $('[href*="promotion"]').closest('.nav-link').addClass("active")
      }
  </script>
  <script>
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
$(document).on('click', 'a.table-action-delete', function(e) {
    e.preventDefault(); // does not go through with the link.

    var $this = $(this);

    $.post({
        type: $this.data('method'),
        url: $this.attr('href')
    }).done(function (data) {
        location.reload();
    });

});
</script>
<script>
    $('.nav-link').on('click',function(){

//Remove any previous active classes
$('.nav-link').removeClass('active');

//Add active class to the clicked item
$(this).addClass('active');
});

</script>

</body>

</html>
