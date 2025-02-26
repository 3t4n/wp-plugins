<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Florida_Paycheck_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Florida calculator -->
    <div class="calculator">
    <h2>Florida Paycheck Calculator</h2>
    <label for="type">Select Type:</label>
    <select id="type" onchange="toggleFields()">
      <option value="hourly">Hourly</option>
      <option value="salary">Salary</option>
    </select>
    <br>
    <div id="hourlyFields">
      <label for="hourly">Hourly Wage:</label>
      <input type="number" id="hourly" placeholder="Hourly Wage">
      <br>
      <label for="hours">Hours (per pay period):</label>
      <input type="number" id="hours" placeholder="Hours">
    </div>
    <div id="salaryFields" style="display: none;">
      <label for="salary">Salary (per year):</label>
      <input type="number" id="salary" placeholder="Salary">
    </div>
    <br>
    <input type="checkbox" id="overtimeCheckbox">
    <label for="overtimeCheckbox">Include Overtime</label>
    <br>
    <div id="overtimeFields" style="display: none;">
      <label for="overtimeRate">Overtime Rate:</label>
      <input type="number" id="overtimeRate" placeholder="Overtime Rate">
      <br>
      <label for="overtimeHours">Overtime Hours:</label>
      <input type="number" id="overtimeHours" placeholder="Overtime Hours">
      <br>
    </div>
    <button onclick="calculatePaycheck()">Calculate</button>
    <div id="result"></div>
  </div>


    <style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
}

.calculator {
  width: 300px;
  margin: 50px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  font-size: 24px;
  margin-bottom: 20px;
  color: #333;
}

label {
  font-size: 16px;
  color: #555;
}

input[type="number"], select, button, input[type="checkbox"] {
  width: 100%;
  padding: 10px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  background-color: #007bff;
  color: #fff;
  border: none;
  cursor: pointer;
  font-size: 16px;
}

button:hover {
  background-color: #0056b3;
}

#result {
  margin-top: 20px;
  font-size: 18px;
  font-weight: bold;
  color: #007bff;
}

#overtimeFields {
  margin-top: 10px;
}

#overtimeFields label {
  display: block;
  margin-top: 5px;
}

#overtimeFields input {
  width: calc(50% - 5px);
  margin-top: 5px;
  margin-right: 5px;
}

#type {
  margin-bottom: 10px;
}


    </style>

    <script>
    function toggleFields() {
  const type = document.getElementById('type').value;
  const hourlyFields = document.getElementById('hourlyFields');
  const salaryFields = document.getElementById('salaryFields');

  if (type === 'hourly') {
    hourlyFields.style.display = 'block';
    salaryFields.style.display = 'none';
  } else {
    hourlyFields.style.display = 'none';
    salaryFields.style.display = 'block';
  }
}

function calculatePaycheck() {
  const type = document.getElementById('type').value;
  let totalPay = 0;

  if (type === 'hourly') {
    const hourlyWage = parseFloat(document.getElementById('hourly').value);
    const hours = parseFloat(document.getElementById('hours').value);
    const overtimeCheckbox = document.getElementById('overtimeCheckbox').checked;
    let overtimePay = 0;

    if (overtimeCheckbox) {
      const overtimeRate = parseFloat(document.getElementById('overtimeRate').value);
      const overtimeHours = parseFloat(document.getElementById('overtimeHours').value);
      overtimePay = (overtimeRate * 1.5 * overtimeHours);
    }

    if (hourlyWage && hours) {
      if (hours <= 40) {
        totalPay = hourlyWage * hours + overtimePay;
      } else {
        totalPay = (hourlyWage * 40) + ((hourlyWage * 1.5) * (hours - 40)) + overtimePay;
      }
    }
  } else {
    const salary = parseFloat(document.getElementById('salary').value);
    const biWeeklySalary = salary / 26; // Assuming bi-weekly pay frequency
    totalPay = biWeeklySalary;

    const overtimeCheckbox = document.getElementById('overtimeCheckbox').checked;
    let overtimePay = 0;

    if (overtimeCheckbox) {
      const overtimeRate = parseFloat(document.getElementById('overtimeRate').value);
      const overtimeHours = parseFloat(document.getElementById('overtimeHours').value);
      overtimePay = (overtimeRate * 1.5 * overtimeHours);
    }

    totalPay = biWeeklySalary + overtimePay;
  }

  document.getElementById('result').innerText = `Total Pay: $${totalPay.toFixed(2)}`;
}



document.getElementById('overtimeCheckbox').addEventListener('change', function() {
  const overtimeFields = document.getElementById('overtimeFields');
  overtimeFields.style.display = this.checked ? 'block' : 'none';
});

// Call toggleFields on page load to set initial visibility of fields
window.onload = toggleFields;


    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Florida_Paycheck_Calculator', 'adittaw_Florida_Paycheck_Calculator_shortcode');
