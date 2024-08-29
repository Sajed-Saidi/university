<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Application Form</title>
    <link rel="stylesheet" href="styles.css">
    <style>/* styles.css */
body {
    font-family: 'Arial', sans-serif;
    background-color: #EEF7FF; /* Light blue background */
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
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
</style>
</head>
<body>
    <div class="container">
        <div class="tabs">
            <button class="tab-button active" onclick="openTab('tab1')">Personal Information</button>
            <button class="tab-button" onclick="openTab('tab2')">Academic Background</button>
            <button class="tab-button" onclick="openTab('tab3')">Contact Details</button>
            <button class="tab-button" onclick="openTab('tab4')">Additional Information</button>
        </div>

        <div class="tab-content">
            <div id="tab1" class="tab-panel">
                <h2>Personal Information</h2>
                <form>
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" placeholder="John Doe" required><br><br>
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required><br><br>
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select><br><br>
                </form>
            </div>
            <div id="tab2" class="tab-panel">
                <h2>Academic Background</h2>
                <form>
                    <label for="highschool">High School Name:</label>
                    <input type="text" id="highschool" name="highschool" placeholder="ABC High School" required><br><br>
                    <label for="gpa">GPA:</label>
                    <input type="number" step="0.01" id="gpa" name="gpa" placeholder="3.75" required><br><br>
                    <label for="major">Intended Major:</label>
                    <input type="text" id="major" name="major" placeholder="Computer Science" required><br><br>
                </form>
            </div>
            <div id="tab3" class="tab-panel">
                <h2>Contact Details</h2>
                <form>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="example@example.com" required><br><br>
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" placeholder="+1234567890" required><br><br>
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" placeholder="123 Main St, City, State, ZIP" required><br><br>
                </form>
            </div>
            <div id="tab4" class="tab-panel">
                <h2>Additional Information</h2>
                <form>
                    <label for="extracurricular">Extracurricular Activities:</label>
                    <textarea id="extracurricular" name="extracurricular" rows="4" placeholder="Describe any extracurricular activities..." required></textarea><br><br>
                    <label for="essay">Personal Statement:</label>
                    <textarea id="essay" name="essay" rows="6" placeholder="Write your personal statement here..." required></textarea><br><br>
                </form>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
<script>// script.js
function openTab(tabId) {
    // Get all tab panels and buttons
    const panels = document.querySelectorAll('.tab-panel');
    const buttons = document.querySelectorAll('.tab-button');

    // Hide all panels and remove active class from all buttons
    panels.forEach(panel => {
        panel.classList.remove('active');
    });
    buttons.forEach(button => {
        button.classList.remove('active');
    });

    // Show the selected panel and set the corresponding button as active
    document.getElementById(tabId).classList.add('active');
    const activeButton = [...buttons].find(button => button.onclick.toString().includes(tabId));
    if (activeButton) {
        activeButton.classList.add('active');
    }
}

// Set default tab
document.addEventListener('DOMContentLoaded', () => {
    openTab('tab1');
});
</script>