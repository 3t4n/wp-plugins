<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Time_to_Freeze_Water_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Time_to_Freeze_Water_Calculator -->


<div class="container">
  <h2 style="margin-bottom: 20px;">Time to Freeze Water Calculator</h2>
  <label for="initial-temp">Initial Temperature (°C):</label>
  <input type="number" id="initial-temp" placeholder="Enter initial temperature" required>
  <label for="final-temp">Final Temperature (°C):</label>
  <input type="number" id="final-temp" placeholder="Enter final temperature" required>
  <label for="volume">Volume of Water (mL):</label>
  <input type="number" id="volume" placeholder="Enter volume of water" required>
  <button onclick="calculateTime()">Calculate</button>
  <div id="result"></div>
</div>



    <style>
    /* CSS styles for the Time_to_Freeze_Water_Calculator */


    
.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
    max-width: 400px;
    width: 100%;
  }

  input[type="number"], input[type="text"] {
    width: calc(100% - 22px);
    padding: 12px;
    margin: 8px 0;
    border: 1px solid #ced4da;
    border-radius: 6px;
    box-sizing: border-box;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  input[type="number"]:focus, input[type="text"]:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
  }

  button {
    background-color: #007bff;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
    transition: background-color 0.3s ease;
  }

  button:hover {
    background-color: #0056b3;
  }

  #result {
    margin-top: 20px;
    font-size: 18px;
  }



    </style>

<script>

function calculateTime() {
  var initialTemp = parseFloat(document.getElementById('initial-temp').value);
  var finalTemp = parseFloat(document.getElementById('final-temp').value);
  var volume = parseFloat(document.getElementById('volume').value);
  
  // Constants
  var freezingPoint = 0; // °C
  var heatCapacity = 4.184; // J/(g°C)
  var density = 1.00; // g/mL
  var latentHeat = 334; // J/g
  
  var heatReleased = heatCapacity * volume * (initialTemp - finalTemp);
  var timeToFreeze = heatReleased / (density * latentHeat);
  
  document.getElementById('result').innerHTML = "Time to freeze: " + timeToFreeze.toFixed(2) + " seconds";
}



    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Time_to_Freeze_Water_Calculator', 'adittaw_Time_to_Freeze_Water_Calculator_shortcode');
