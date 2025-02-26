<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Pie_Cut_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Pie_Cut_Calculator -->


  <div class="container">
    <h1>Pie Cut Calculator</h1>
    <div class="form-group">
      <label for="totalSlices">Total Slices:</label>
      <input type="number" id="totalSlices" min="1" value="8">
    </div>
    <div class="form-group">
      <label for="slicesToCut">Slices to Cut:</label>
      <input type="number" id="slicesToCut" min="1" value="2">
    </div>
    <button onclick="calculate()">Calculate</button>
    <div id="result"></div>
  </div>



    <style>
    /* CSS styles for the Pie_Cut_Calculator */


    

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

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  color: #666;
}

input[type="number"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #45a049;
}

#result {
  margin-top: 20px;
  padding: 10px;
  background-color: #f5f5f5;
  border-radius: 5px;
}




    </style>
<script>


function calculate() {
  var totalSlices = parseInt(document.getElementById('totalSlices').value);
  var slicesToCut = parseInt(document.getElementById('slicesToCut').value);

  if (totalSlices <= 0 || slicesToCut <= 0) {
    alert("Please enter valid values.");
    return;
  }

  var slicesAfterCut = totalSlices + (slicesToCut - 1);
  var sliceSize = 360 / slicesAfterCut;
  var degreesBetweenSlices = sliceSize * (slicesToCut - 1);

  var resultText = "After cutting " + slicesToCut + " slices, there will be " + slicesAfterCut + " slices.<br>";
  resultText += "Each slice will be " + sliceSize.toFixed(2) + " degrees.<br>";
  resultText += "There will be " + degreesBetweenSlices.toFixed(2) + " degrees between the cut slices.";

  document.getElementById('result').innerHTML = resultText;
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Pie_Cut_Calculator', 'adittaw_Pie_Cut_Calculator_shortcode');
