<script src="../assets/js/jquery-3.7.1.js" crossorigin="anonymous"></script>
<!-- <script src="../assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->

<script src="../assets/datatables/datatables-simple-demo.js"></script>
<script src="../assets/datatables/simple.min.js" crossorigin="anonymous"></script>


<script src="../assets/js/sweetalert2.min.js"></script>
<script src="../assets/js/sweetalert.min.js"></script>
<script src="../assets/js/admin.js"></script>
<script>
    $('input[type="text"],textarea,input[type="password"]').on('input', function() {
        var trimmedValue = $(this).val().trim();
        if (trimmedValue == "") {
            $(this).val(trimmedValue);
        }
    });

    $('form button[type="submit"]').on("click", function() {
        $('form input[type="text"]').each(function() {
            var trimmedValue = $(this).val().trim();
            $(this).val(trimmedValue);
        });
    })
</script>

<!-- sendFormAJAX -->
<script>
    function sendFormAJAX(e) {
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
    }

    function sendDeleteAJAX(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4D869C', // Primary color
            cancelButtonColor: '#7AB2B2', // Secondary color
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            customClass: {
                title: 'swal-title',
                htmlContainer: 'swal-html',
                content: 'swal-content'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                sendFormAJAX(e);
            }
        });
    }
</script>
