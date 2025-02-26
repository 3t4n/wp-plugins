<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Church_Growth_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Church_Growth_Calculator -->


  <div class="container">
    <h1>Church Growth Calculator</h1>
    <div class="input-group">
      <label for="currentMembers">Current Number of Members:</label>
      <input type="number" id="currentMembers" placeholder="Enter current number">
    </div>
    <div class="input-group">
      <label for="growthRate">Annual Growth Rate (%):</label>
      <input type="number" id="growthRate" placeholder="Enter growth rate">
    </div>
    <button id="calculateButton">Calculate</button>
    <div id="result"></div>
  </div>



    <style>
    /* CSS styles for the Church_Growth_Calculator */


    
.container {
  max-width: 400px;
  margin: 50px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  color: #333;
  margin-bottom: 20px;
}

.input-group {
  margin-bottom: 20px;
}

.input-group label {
  display: block;
  margin-bottom: 5px;
  color: #555;
}

.input-group input {
  width: calc(100% - 22px);
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

.button {
  display: block;
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #007bff;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.button:hover {
  background-color: #0056b3;
}

#result {
  margin-top: 20px;
  padding: 20px;
  background-color: #f0f0f0;
  border-radius: 5px;
  font-size: 16px;
  line-height: 1.5;
  text-align: center;
}




    </style>
<script>


document.getElementById("calculateButton").addEventListener("click", function() {
  var currentMembers = parseInt(document.getElementById("currentMembers").value);
  var growthRate = parseFloat(document.getElementById("growthRate").value);

  if (!isNaN(currentMembers) && !isNaN(growthRate)) {
    var nextYearMembers = Math.round(currentMembers * (1 + growthRate / 100));
    var growth = nextYearMembers - currentMembers;
    var resultText = "Next year's projected members: " + nextYearMembers + "<br>";
    resultText += "Projected growth: " + growth + " members<br>";
    
    var projectedSizeIn10Years = currentMembers * Math.pow((1 + growthRate / 100), 10);
    resultText += "Projected size in 10 years: " + Math.round(projectedSizeIn10Years);
    
    document.getElementById("result").innerHTML = resultText;
  } else {
    document.getElementById("result").innerHTML = "Please enter valid numbers.";
  }
});




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Church_Growth_Calculator', 'adittaw_Church_Growth_Calculator_shortcode');
