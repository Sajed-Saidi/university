<!DOCTYPE html>
<html lang="en">
<?php require('common/head.php');
?>

<style>
  input.invalid, select.invalid {
  border: 1px solid red;
}

h2{
    color:#4D869C;
}
.applyf {
    width: 90%;
    max-width: 900px;
    background: #FFFFFF; /* White background for the form */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.tabs {
    display: flex;
    border-bottom: 2px solid #7AB2B2; /* Teal color for the border */
    background-color: #CDE8E5; /* Light teal background */
}

.tab-button {
    flex: 1;
    background: #CDE8E5;
    border: none;
    padding: 15px;
    text-align: center;
    cursor: pointer;
    transition: background 0.3s, color 0.3s, border-bottom 0.3s;
    font-size: 16px;
    color: #4D869C; /* Dark blue text */
}

.tab-button:hover {
    background: #B0D9D6; /* Slightly darker teal */
}

.tab-button.active {
    background: #FFFFFF; /* White background for the active tab */
    color: #4D869C; /* Dark blue text for the active tab */
    border-bottom: 2px solid #4D869C; /* Dark blue bottom border */
}

.tab-content {
    padding: 20px;
    background: #FFFFFF; /* White background for content */
    animation: fadeIn 0.3s ease-in-out;
}

.tab-panel {
    display: none;
}

.tab-panel.active {
    display: block;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
    color: #4D869C; /* Dark blue text for labels */
}

input, select, textarea {
  width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #7AB2B2; /* Teal border for input fields */
    border-radius: 4px;
    font-size: 16px;
}

input:focus, select:focus, textarea:focus {
    border-color: #4D869C; /* Dark blue border on focus */
    outline: none;
}

textarea {
    resize: vertical; /* Allow vertical resizing only */
}

/* New styles for the submit button */
button[type="submit"] {
    background-color: #4D869C; /* Dark blue background */
    color: #FFFFFF; /* White text */
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
    float:right;
}

button[type="submit"]:hover {
    background-color: #3a6f84; /* Slightly darker blue */
    transform: scale(1.05); /* Slight scale effect on hover */
}

button[type="submit"]:focus {
    outline: none;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2); /* Light shadow on focus */
}

/* New styles for the file input */
input[type="file"] {
    padding: 0;
    margin: 0;
    border: 1px solid #7AB2B2; /* Teal border for file input */
    border-radius: 4px;
    background-color: #FFFFFF; /* White background */
    color: #4D869C; /* Dark blue text for file input */
    font-size: 16px;
    cursor: pointer;
}

input[type="file"]::file-selector-button {
    background-color: #4D869C; /* Dark blue button background */
    color: #FFFFFF; /* White text */
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
}

input[type="file"]::file-selector-button:hover {
    background-color: #3a6f84; /* Slightly darker blue */
    transform: scale(1.05); /* Slight scale effect on hover */
}
/* New styles for the navigation buttons */
button.next-button, button.prev-button {
    background-color: #4D869C; /* Dark blue background */
    color: #FFFFFF; /* White text */
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
    margin: 5px;
}

button.next-button:hover, button.prev-button:hover {
    background-color: #3a6f84; /* Slightly darker blue */
    transform: scale(1.05); /* Slight scale effect on hover */
}

button.next-button:focus, button.prev-button:focus {
    outline: none;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2); /* Light shadow on focus */
}</style>
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
  <div class="applyf container-fluid">
    <div class="tabs">
      <button class="tab-button active" onclick="openTab('tab1')">Personal Information</button>
      <button class="tab-button" onclick="openTab('tab2')">Academic Background</button>
      <button class="tab-button" onclick="openTab('tab3')">Contact Details</button>
    </div>

    <div class="tab-content">
      <form id="application-form">
   
        <div id="tab1" class="tab-panel active">
          <h2>Personal Information</h2>
          <label for="fname">First Name:</label>
          <input type="text" id="fname" name="fname" placeholder="Enter your first name" required><br><br>
          <label for="lname">Last Name:</label>
          <input type="text" id="lname" name="lname" placeholder="Enter your last name" required><br><br>
          <label for="dob">Date of Birth:</label>
          <input type="date" id="dob" name="dob" required><br><br>
          <label for="gender">Gender:</label>
          <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select><br><br>
          <button type="button" class="next-button" onclick="nextTab()">Next</button>
        </div>
        <div id="tab2" class="tab-panel">
  <h2>Academic Background</h2>
  <label for="status">Current Academic Status:</label>
  <select id="status" name="status" required onchange="toggleAcademicInfo()">
    <option value="highschool">High School Graduate</option>
    <option value="university">Currently Attending University</option>
  </select><br><br>

  <div id="highschool-info" class="academic-info">
    <label for="highschool">High School Name:</label>
    <input type="text" id="highschool" name="highschool" placeholder="ABC High School"><br><br>
    <label for="avg">Official Average:</label>
    <input type="number" id="avg" name="avg" placeholder="Official Exams Average /20" min="10" max="20" required><br><br>
<!-- Dropdown -->
    <label for="major">Intended Major:</label>
    <input type="text" id="major" name="major" placeholder="Computer Science"><br><br>
  </div>

  <div id="university-info" class="academic-info" style="display:none;">
    <label for="university">Current University:</label>
    <input type="text" id="university" name="university" placeholder="XYZ University"><br><br>
    <label for="current-major">Current Major:</label>
    <input type="text" id="current-major" name="current-major" placeholder="Engineering"><br><br>
    <label for="current-gpa">Current GPA:</label>
    <input type="number" step="0.01" id="current-gpa" name="current-gpa" placeholder="3.75" min="2" max="4"><br><br>
  </div>
  
  <button type="button" class="prev-button" onclick="prevTab()">Previous</button>
  <button type="button" class="next-button" onclick="nextTab()">Next</button>
</div>
        <div id="tab3" class="tab-panel">
          <h2>Contact Details</h2>
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="example@example.com" required><br><br>
    <!-- Phone number validation -->
          <label for="phone">Phone Number:</label>
          <input type="tel" id="phone" name="phone" placeholder="+1234567890" required><br><br>
          <label for="address">Address:</label>
          <input type="text" id="address" name="address" placeholder="123 Main St, City, State, ZIP" required><br><br>
          <button type="submit" class="applybtn">
                Submit
                <svg fill="currentColor" viewBox="0 0 24 24" class="icon">
                  <path
                    clip-rule="evenodd"
                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z"
                    fill-rule="evenodd"
                  ></path>
                </svg>
              </button>
         
          <button type="button" class="prev-button" onclick="prevTab()">Previous</button>
        </div>
      </form>
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
    document.addEventListener('DOMContentLoaded', () => {
      // Initialize the first tab as active
      openTab('tab1');
    });

    function openTab(tabId) {
      // Get all tab panels and buttons
      const tabs = document.querySelectorAll('.tab-panel');
      const buttons = document.querySelectorAll('.tab-button');

      // Hide all tab panels and remove active class from all buttons
      tabs.forEach(tab => tab.classList.remove('active'));
      buttons.forEach(button => button.classList.remove('active'));

      // Show the selected tab panel and set the corresponding button as active
      document.getElementById(tabId).classList.add('active');
      document.querySelector(`.tab-button[onclick="openTab('${tabId}')"]`).classList.add('active');
    }

    function nextTab() {
      const activeTab = document.querySelector('.tab-panel.active');
      const tabs = Array.from(document.querySelectorAll('.tab-panel'));
      const currentIndex = tabs.indexOf(activeTab);
      if (currentIndex < tabs.length - 1) {
        const nextTabId = tabs[currentIndex + 1].id;
        openTab(nextTabId);
      }
    }

    function prevTab() {
      const activeTab = document.querySelector('.tab-panel.active');
      const tabs = Array.from(document.querySelectorAll('.tab-panel'));
      const currentIndex = tabs.indexOf(activeTab);
      if (currentIndex > 0) {
        const prevTabId = tabs[currentIndex - 1].id;
        openTab(prevTabId);
      }
    }

    function toggleAcademicInfo() {
  const status = document.getElementById('status').value;
  const highschoolInfo = document.getElementById('highschool-info');
  const universityInfo = document.getElementById('university-info');

  if (status === 'highschool') {
    highschoolInfo.style.display = 'block';
    universityInfo.style.display = 'none';
    // Ensure that fields in the hidden section are not validated
    document.querySelectorAll('#university-info input').forEach(input => {
      input.removeAttribute('required');
    });
    document.querySelectorAll('#highschool-info input').forEach(input => {
      input.setAttribute('required', 'required');
    });
  } else if (status === 'university') {
    highschoolInfo.style.display = 'none';
    universityInfo.style.display = 'block';
    // Ensure that fields in the hidden section are not validated
    document.querySelectorAll('#highschool-info input').forEach(input => {
      input.removeAttribute('required');
    });
    document.querySelectorAll('#university-info input').forEach(input => {
      input.setAttribute('required', 'required');
    });
  }
}
document.getElementById('application-form').addEventListener('submit', function(e) {
  e.preventDefault(); // Prevent the form from submitting the default way

  // Ensure all required fields are validated
  const form = e.target;
  const inputs = form.querySelectorAll('input[required], select[required]');
  let formIsValid = true;

  inputs.forEach(input => {
    if (!input.checkValidity()) {
      formIsValid = false;
      input.classList.add('invalid'); // Add a class for styling if needed
    } else {
      input.classList.remove('invalid');
    }
  });

  if (!formIsValid) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Please fill out all required fields correctly.',
      background: '#4D869C',
      color: 'white',
      confirmButtonColor: '#3b6d7d',
      confirmButtonText: 'OK'
    });
    return;
  }

  const formData = new FormData(form);

  fetch('actions/submit_application.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json()) // Assuming the server responds with JSON
  .then(data => {
    // Handle success
    console.log('Success:', data);
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: 'Form submitted successfully!',
      background: '#4D869C',
      color: 'white',
      confirmButtonColor: '#3b6d7d',
      timer: 2000, // Auto-close after 2 seconds
      willClose: () => {
        window.location.href = 'index.php'; // Redirect to home page after the alert is closed
      }
    });
  })
  .catch(error => {
    // Handle error
    console.error('Error:', error);
    Swal.fire({
      icon: 'error',
      title: 'Error!',
      text: 'There was an error submitting the form.',
      background: '#4D869C',
      color: 'white',
      confirmButtonColor: '#3b6d7d',
      confirmButtonText: 'OK'
    });
  });
});

  </script>