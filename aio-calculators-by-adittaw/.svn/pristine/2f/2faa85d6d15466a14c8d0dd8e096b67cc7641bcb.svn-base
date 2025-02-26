<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Cords_Of_Wood_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Cords_Of_Wood_Calculator -->


  <div class="container">
    <h1>Cords Of Wood Calculator</h1>
    <div class="input-group">
      <label for="length">Length (ft):</label>
      <input type="number" id="length" min="0" step="1">
    </div>
    <div class="input-group">
      <label for="width">Width (ft):</label>
      <input type="number" id="width" min="0" step="1">
    </div>
    <div class="input-group">
      <label for="height">Height (ft):</label>
      <input type="number" id="height" min="0" step="1">
    </div>
    <button onclick="calculateCords()">Calculate</button>
    <div id="result"></div>
  </div>



    <style>
    /* CSS styles for the Cords_Of_Wood_Calculator */


    

.container {
  max-width: 400px;
  margin: 50px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  color: #333;
}

.input-group {
  margin-bottom: 20px;
}

.input-group label {
  display: block;
  margin-bottom: 5px;
  color: #666;
}

.input-group input {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
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
  padding: 10px;
  background-color: #f0f0f0;
  border-radius: 5px;
  text-align: center;
}




    </style>
<script>


function calculateCords() {
  var length = parseFloat(document.getElementById('length').value);
  var width = parseFloat(document.getElementById('width').value);
  var height = parseFloat(document.getElementById('height').value);

  var volume = length * width * height;
  var cords = volume / 128; // 128 cubic feet in a cord of wood

  document.getElementById('result').innerHTML = "<p>You'll need approximately " + cords.toFixed(2) + " cords of wood.</p>";
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Cords_Of_Wood_Calculator', 'adittaw_Cords_Of_Wood_Calculator_shortcode');
