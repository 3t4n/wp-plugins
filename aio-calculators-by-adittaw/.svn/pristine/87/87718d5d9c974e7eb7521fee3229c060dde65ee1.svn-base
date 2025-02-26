<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Water_Potential_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Water_Potential_Calculator -->


<div class="container">
  <h1>Water Potential Calculator</h1>
  <div class="input-group">
    <label for="solute-potential">Solute Potential (Ψs):</label>
    <input type="number" id="solute-potential" placeholder="Enter solute potential">
  </div>
  <div class="input-group">
    <label for="pressure-potential">Pressure Potential (Ψp):</label>
    <input type="number" id="pressure-potential" placeholder="Enter pressure potential">
  </div>
  <div class="input-group">
    <label for="gravitational-potential">Gravitational Potential (Ψg):</label>
    <input type="number" id="gravitational-potential" placeholder="Enter gravitational potential">
  </div>
  <button onclick="calculateWaterPotential()">Calculate</button>
  <div id="result"></div>
</div>



    <style>
    /* CSS styles for the Water_Potential_Calculator */


    

.container {
  max-width: 500px;
  margin: 50px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  margin-bottom: 20px;
}

.input-group {
  margin-bottom: 20px;
}

.input-group label {
  display: block;
  margin-bottom: 5px;
}

.input-group input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

#result {
  margin-top: 20px;
  font-weight: bold;
}




    </style>

<script>

function calculateWaterPotential() {
  var solutePotential = parseFloat(document.getElementById("solute-potential").value);
  var pressurePotential = parseFloat(document.getElementById("pressure-potential").value);
  var gravitationalPotential = parseFloat(document.getElementById("gravitational-potential").value);

  if (isNaN(solutePotential) || isNaN(pressurePotential) || isNaN(gravitationalPotential)) {
    alert("Please enter valid numbers for all potentials.");
    return;
  }

  var waterPotential = solutePotential + pressurePotential + gravitationalPotential;
  document.getElementById("result").innerText = "Water Potential (Ψw): " + waterPotential.toFixed(2) + " MPa";
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Water_Potential_Calculator', 'adittaw_Water_Potential_Calculator_shortcode');
