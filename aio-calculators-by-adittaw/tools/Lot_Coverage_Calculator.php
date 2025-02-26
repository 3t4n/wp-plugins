<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Lot_Coverage_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Lot_Coverage_Calculator -->


<div class="container">
  <h2>Lot Coverage Calculator</h2>
  <label for="lotSize">Lot Size (in square feet):</label>
  <input type="number" id="lotSize" placeholder="Enter lot size">
  <label for="buildingSize">Building Size (in square feet):</label>
  <input type="number" id="buildingSize" placeholder="Enter building size">
  <button onclick="calculateCoverage()">Calculate</button>
  <div id="result"></div>
</div>



    <style>
    /* CSS styles for the Lot_Coverage_Calculator */


    
  .container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
  }
  label {
    display: inline-block;
    margin-bottom: 5px;
  }
  input[type="number"] {
    padding: 8px;
    width: 100%;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  button {
    padding: 10px 20px;
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
    margin-top: 15px;
    font-weight: bold;
  }



    </style>
<script>


  function calculateCoverage() {
    var lotSize = parseFloat(document.getElementById('lotSize').value);
    var buildingSize = parseFloat(document.getElementById('buildingSize').value);

    if (isNaN(lotSize) || isNaN(buildingSize)) {
      document.getElementById('result').innerText = "Please enter valid numbers for both lot size and building size.";
      return;
    }

    var coveragePercentage = (buildingSize / lotSize) * 100;
    document.getElementById('result').innerText = "Lot Coverage: " + coveragePercentage.toFixed(2) + "%";
  }



    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Lot_Coverage_Calculator', 'adittaw_Lot_Coverage_Calculator_shortcode');
