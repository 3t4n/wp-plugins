<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Measurement_Ratio_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Measurement_Ratio_Calculator -->


<div class="container">
  <h1>Advanced Ratio Calculator</h1>
  <input type="number" id="input1" placeholder="Value 1">
  <input type="number" id="input2" placeholder="Value 2">
  <button onclick="calculateRatio()">Calculate Ratio</button>
  <p id="result"></p>
</div>



    <style>
    /* CSS styles for the Measurement_Ratio_Calculator */


    
 .container {
    text-align: center;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  h1 {
    margin-top: 0;
  }
  input[type="number"] {
    width: 80px;
    padding: 8px;
    margin: 5px;
    border-radius: 4px;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }
  button {
    padding: 10px 20px;
    margin-top: 10px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
  }
  button:hover {
    background-color: #0056b3;
  }



    </style>
<script>


  function calculateRatio() {
    var value1 = parseFloat(document.getElementById('input1').value);
    var value2 = parseFloat(document.getElementById('input2').value);

    if (isNaN(value1) || isNaN(value2)) {
      document.getElementById('result').innerText = 'Please enter valid numbers.';
      return;
    }

    var gcdValue = gcd(value1, value2);
    var ratio = (value1 / gcdValue) + ':' + (value2 / gcdValue);
    document.getElementById('result').innerText = 'Ratio: ' + ratio;
  }

  function gcd(a, b) {
    if (b < 0.0000001) return a;
    return gcd(b, Math.floor(a % b));
  }



    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Measurement_Ratio_Calculator', 'adittaw_Measurement_Ratio_Calculator_shortcode');
