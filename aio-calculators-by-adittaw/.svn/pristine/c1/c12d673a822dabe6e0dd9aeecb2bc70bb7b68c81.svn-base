<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Midface_Ratio_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Midface_Ratio_Calculator -->


  <div class="container">
    <h1>Midface Ratio Calculator</h1>
    <div class="input-group">
      <label for="upperFaceHeight">Upper Face Height (mm):</label>
      <input type="number" id="upperFaceHeight" placeholder="Enter upper face height">
    </div>
    <div class="input-group">
      <label for="midfaceHeight">Midface Height (mm):</label>
      <input type="number" id="midfaceHeight" placeholder="Enter midface height">
    </div>
    <button onclick="calculateRatio()">Calculate Ratio</button>
    <div id="result"></div>
  </div>



    <style>
    /* CSS styles for the Midface_Ratio_Calculator */


    

.container {
  max-width: 400px;
  margin: 50px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  color: #333;
}

.input-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  color: #666;
}

input[type="number"] {
  width: 100%;
  padding: 8px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  width: 100%;
  padding: 10px;
  font-size: 18px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #0056b3;
}

#result {
  margin-top: 20px;
  font-size: 18px;
  text-align: center;
}




    </style>
   <script>


function calculateRatio() {
  var upperFaceHeight = parseFloat(document.getElementById('upperFaceHeight').value);
  var midfaceHeight = parseFloat(document.getElementById('midfaceHeight').value);

  if (isNaN(upperFaceHeight) || isNaN(midfaceHeight)) {
    document.getElementById('result').innerHTML = 'Please enter valid numbers for both fields.';
    return;
  }

  var ratio = midfaceHeight / upperFaceHeight;

  document.getElementById('result').innerHTML = 'Midface Ratio: ' + ratio.toFixed(2);
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Midface_Ratio_Calculator', 'adittaw_Midface_Ratio_Calculator_shortcode');
