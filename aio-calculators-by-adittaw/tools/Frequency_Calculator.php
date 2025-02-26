<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Frequency_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Frequency_Calculator -->


  <div class="container">
    <h1>Frequency Calculator</h1>
    <div class="input-container">
      <label for="signal-frequency">Signal Frequency (Hz):</label>
      <input type="number" id="signal-frequency" placeholder="Enter signal frequency">
    </div>
    <div class="input-container">
      <label for="nyquist-rate">Desired Nyquist Rate:</label>
      <input type="number" id="nyquist-rate" placeholder="Enter desired Nyquist rate">
    </div>
    <button onclick="calculate()">Calculate</button>
    <div id="result"></div>
  </div>



    <style>
    /* CSS styles for the Frequency_Calculator */


    

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
}

.input-container {
  margin-bottom: 15px;
}

label {
  font-weight: bold;
}

input {
  width: 100%;
  padding: 8px;
  border-radius: 4px;
  border: 1px solid #ccc;
}

button {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
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


function calculate() {
  var signalFrequency = parseFloat(document.getElementById('signal-frequency').value);
  var nyquistRate = parseFloat(document.getElementById('nyquist-rate').value);
  
  if (isNaN(signalFrequency) || isNaN(nyquistRate)) {
    document.getElementById('result').innerText = "Please enter valid numbers.";
    return;
  }
  
  var nyquistFrequency = nyquistRate / 2;
  var result = "Nyquist Frequency: " + nyquistFrequency + " Hz\n";
  
  if (signalFrequency > nyquistFrequency) {
    result += "Signal frequency exceeds Nyquist frequency. Aliasing will occur.";
  } else {
    result += "Signal frequency is within Nyquist frequency. No aliasing will occur.";
  }
  
  document.getElementById('result').innerText = result;
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Frequency_Calculator', 'adittaw_Frequency_Calculator_shortcode');
