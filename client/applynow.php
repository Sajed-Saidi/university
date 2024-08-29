<!DOCTYPE html>
<html lang="en">
<?php require('common/head.php');?>
<style>/* From Uiverse.io by mi-series */ 
.selection-button {
  outline: 0;
  display: inline-flex;
  align-items: center;
  justify-content: space-between;
  background: #4D869C;
  min-width: 200px;
  border: 0;
  border-radius: 4px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, .1);
  box-sizing: border-box;
  padding: 16px 20px;
  color: #fff;
  font-size: 12px;
  font-weight: 600;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  overflow: hidden;
  cursor: pointer;
}

.selection-button:hover {
  opacity: .95;
}

.selection-button .animation {
  border-radius: 100%;
  animation: ripple 0.6s linear infinite;
}

@keyframes ripple {
  0% {
    box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.1), 0 0 0 20px rgba(255, 255, 255, 0.1), 0 0 0 40px rgba(255, 255, 255, 0.1), 0 0 0 60px rgba(255, 255, 255, 0.1);
  }

  100% {
    box-shadow: 0 0 0 20px rgba(255, 255, 255, 0.1), 0 0 0 40px rgba(255, 255, 255, 0.1), 0 0 0 60px rgba(255, 255, 255, 0.1), 0 0 0 80px rgba(255, 255, 255, 0);
  }
}
.application-selection {
       background-image: url(./assets/img/about.jpg);
       background-position: center;
       background-repeat: no-repeat;
       background-size: cover;
    width: 100%;
 height:300px;
    max-width: 800px;

    border-radius: 8px;
    box-shadow: 0 4px 8px #4D869C;
    padding: 20px;
    margin: 20px auto;
    text-align: center;

}
.selection-content{
    margin-top: 50px;
}

.selection-content h2 {
    font-size: 24px;
    color: #EEF7FF; /* Dark blue text */
    margin-bottom: 10px;
}

.selection-content p {
    font-size: 18px;
    color: #EEF7FF; /* Gray text */
    margin-bottom: 20px;
}

.selection-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.selection-button {
 
    background-color: #4D869C; /* Dark blue background */
    color: #FFFFFF; /* White text */
    border: none;
    padding: 15px 30px;
    border-radius: 4px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
    text-align: center;
}

.selection-button:hover {
    background-color: #CDE8E5; /* Slightly darker blue */
    transform: scale(1.05); /* Slight scale effect on hover */
    color:#4D869C;
}

.selection-button:focus {
    outline: none;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2); /* Light shadow on focus */
}
</style>
<body class="index-page">

  <main class="main">

    <!-- Hero Section -->
    <section id="apply" class="apply section accent-background">
      
  <?php require('common/navbar.php');?>

    </section><!-- /Hero Section -->
    <div class="container-fluid px-4"><br>
            <p class="mt-1" style="color:#729762;text-align:center;text-shadow:2px 2px 5px white;">
                <button data-text="Awesome" class="buttonpma">
                    <span class="actual-text">&nbsp;Apply&nbsp;Now&nbsp;</span>
                    <span class="hover-text" aria-hidden="true">&nbsp;Apply&nbsp;Now&nbsp;</span>
                </button>
            </p>
        </div><br>
          <!-- Application Form Section -->

    <!-- Professional Selection Section -->
    <div class="application-selection container-fluid">
        <div class="selection-content">
            <h2>Application Type</h2>
            <p>Please select your application type to proceed:</p>
            <div class="selection-buttons">
           
    <button class="selection-button"onclick="applyAs('student')"><i class="animation"></i>Apply as student<i class="animation"></i>
    </button>
    <button class="selection-button "onclick="applyAs('doctor')"><i class="animation"></i>Apply as doctor<i class="animation"></i>
    </button>

             
            </div>
        </div>
    </div>
      <!-- End Application Form Section -->

  </main><br>
<?php require('./common/footer.php')
?>
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>
  <?php require('./common/scripts.php')
?>

</body>

</html>
<script>
        function applyAs(type) {
            if (type === 'student') {
                // Redirect or display student application form
                window.location.href = 'applynow_students.php'; // Example URL
            } else if (type === 'doctor') {
                // Redirect or display doctor application form
                window.location.href = 'applynow_doctors.php'; // Example URL
            }
        }
    </script>