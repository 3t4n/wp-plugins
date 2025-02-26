<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Copart_Cost_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Copart_Cost_Calculator -->


 <div class="container">
    <h1>Copart Cost Calculator</h1>
    <div class="form-group">
      <label for="vehicleYear">Vehicle Year:</label>
      <input type="number" id="vehicleYear" placeholder="Enter year">
    </div>
    <div class="form-group">
      <label for="vehicleMake">Vehicle Make:</label>
      <input type="text" id="vehicleMake" placeholder="Enter make">
    </div>
    <div class="form-group">
      <label for="vehicleModel">Vehicle Model:</label>
      <input type="text" id="vehicleModel" placeholder="Enter model">
    </div>
    <div class="form-group">
      <label for="vehicleMileage">Vehicle Mileage:</label>
      <input type="number" id="vehicleMileage" placeholder="Enter mileage">
    </div>
    <button onclick="calculateCost()">Calculate Cost</button>
    <div id="result"></div>
  </div>



    <style>
    /* CSS styles for the Copart_Cost_Calculator */


    

.container {
  max-width: 500px;
  margin: 50px auto;
  padding: 30px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  color: #333;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  color: #666;
}

input[type="number"],
input[type="text"],
button {
  width: 100%;
  padding: 12px;
  font-size: 16px;
  border-radius: 6px;
  border: 1px solid #ccc;
  transition: border-color 0.3s ease;
}

input[type="number"]:focus,
input[type="text"]:focus {
  outline: none;
  border-color: #007bff;
}

button {
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #0056b3;
}

#result {
  margin-top: 20px;
  font-size: 18px;
  font-weight: bold;
  text-align: center;
  color: #007bff;
}




    </style>

<script>

function calculateCost() {
  const vehicleYear = parseInt(document.getElementById('vehicleYear').value);
  const vehicleMake = document.getElementById('vehicleMake').value;
  const vehicleModel = document.getElementById('vehicleModel').value;
  const vehicleMileage = parseInt(document.getElementById('vehicleMileage').value);

  // Perform your cost calculation here (placeholder)
  const estimatedCost = vehicleYear * 1000 + vehicleMileage * 0.1;

  const resultElement = document.getElementById('result');
  resultElement.innerText = `Estimated Cost for ${vehicleYear} ${vehicleMake} ${vehicleModel}: $${estimatedCost.toFixed(2)}`;
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Copart_Cost_Calculator', 'adittaw_Copart_Cost_Calculator_shortcode');
