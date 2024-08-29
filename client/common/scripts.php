
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/js/sweetalert2.min.js"></script>
<script src="assets/js/sweetalert.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script> function sendFormAJAX(e) {
        e.preventDefault();
        var form = $(e.target); // The form element
        var formData = new FormData(form[0]); // Create FormData from form
        console.log(form);
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            processData: false,
            contentType: false,
            dataType: 'json',
            data: formData,
            success: function(response) {
                console.log(response);
                Swal.fire({
                    icon: response.status === 'success' ? 'success' : 'warning',
                    title: response.message,
                    showConfirmButton: true,
                    confirmButtonColor: '#4D869C', // Primary color
                    customClass: {
                        confirmButton: 'button btn btn-primary app_style',
                        title: 'swal-title',
                        htmlContainer: 'swal-html',
                        content: 'swal-content'
                    }
                }).then(function() {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                });

            },
            error: function(xhr, status, error) {
                console.log('AJAX Error: ' + status + error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'AJAX Error!',
                    showConfirmButton: true,
                    confirmButtonColor: '#4D869C', // Primary color
                    customClass: {
                        confirmButton: 'button btn btn-primary app_style',
                        title: 'swal-title',
                        htmlContainer: 'swal-html',
                        content: 'swal-content'
                    }
                });
            }
        });
    }</script>