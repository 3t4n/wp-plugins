<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_LBM_to_LBF_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the LBM_to_LBF_Calculator -->


  <div class="container">
    <h1>LBM to LBF Calculator</h1>
    <div class="input-container">
      <label for="lbmInput">Enter weight in pounds-mass (lbm):</label>
      <input type="number" id="lbmInput" placeholder="Enter weight in lbm">
    </div>
    <div class="result-container">
      <button onclick="calculate()">Calculate</button>
      <p id="result"></p>
    </div>
  </div>



    <style>
    /* CSS styles for the LBM_to_LBF_Calculator */


    

.container {
  max-width: 400px;
  margin: 50px auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  background-color: #fff;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  color: #333;
}

.input-container {
  margin-bottom: 20px;
}

.input-container label {
  display: block;
  margin-bottom: 5px;
  color: #666;
}

.input-container input {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.input-container input:focus {
  outline: none;
  border-color: #007bff;
}

.result-container button {
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
}

.result-container button:hover {
  background-color: #0056b3;
}

.result-container p {
  margin-top: 10px;
  font-size: 18px;
  color: #333;
}




    </style>
   <script>


function calculate() {
  const lbmInput = document.getElementById('lbmInput').value;
  const lbm = parseFloat(lbmInput);
  
  if (isNaN(lbm)) {
    document.getElementById('result').innerText = 'Please enter a valid number.';
    return;
  }

  const lbf = lbm * 32.174; // Conversion factor from pound-mass to pound-force

  document.getElementById('result').innerText = `${lbm} lbm is equal to ${lbf.toFixed(2)} lbf.`;
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_LBM_to_LBF_Calculator', 'adittaw_LBM_to_LBF_Calculator_shortcode');
