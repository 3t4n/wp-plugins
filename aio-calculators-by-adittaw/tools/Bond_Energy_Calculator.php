<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Bond_Energy_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Bond_Energy_Calculator -->


  <div class="container">
    <h1>Bond Energy Calculator</h1>
    <div class="input-group">
      <label for="bond">Enter Bond Energy (kJ/mol):</label>
      <input type="number" id="bond" min="0" step="any">
    </div>
    <div class="input-group">
      <label for="num_bonds">Enter Number of Bonds:</label>
      <input type="number" id="num_bonds" min="1" step="1">
    </div>
    <button onclick="calculateEnergy()">Calculate</button>
    <div id="result"></div>
  </div>



    <style>
    /* CSS styles for the Bond_Energy_Calculator */


    

.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
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


function calculateEnergy() {
  var bondEnergy = parseFloat(document.getElementById('bond').value);
  var numBonds = parseInt(document.getElementById('num_bonds').value);

  if (!isNaN(bondEnergy) && !isNaN(numBonds) && numBonds > 0) {
    var totalEnergy = bondEnergy * numBonds;
    var result = document.getElementById('result');
    result.textContent = "The total energy for " + numBonds + " bonds is: " + totalEnergy.toFixed(2) + " kJ/mol";
  } else {
    alert("Please enter valid numbers for bond energy and number of bonds.");
  }
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Bond_Energy_Calculator', 'adittaw_Bond_Energy_Calculator_shortcode');
