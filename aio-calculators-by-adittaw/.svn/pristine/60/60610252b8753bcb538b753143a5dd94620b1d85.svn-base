<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Current_Shunt_Resistor_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Current_Shunt_Resistor_Calculator -->


  <div class="calculator">
    <h2>Advanced Current Shunt Resistor Calculator</h2>
    <div class="input-group">
      <label for="current">Insert the value of Im:</label>
      <input type="number" id="current" step="0.01">
      <select id="currentUnit">
        <option value="A">A</option>
        <option value="mA">mA</option>
      </select>
    </div>
    <div class="input-group">
      <label for="resistance">Insert the value of Rm:</label>
      <input type="number" id="resistance" step="0.01">
      <select id="resistanceUnit">
        <option value="Ω">Ω</option>
        <option value="kΩ">kΩ</option>
        <option value="mΩ">mΩ</option>
      </select>
    </div>
    <div class="input-group">
      <label for="required">Insert the value of Ireq:</label>
      <input type="number" id="required" step="0.01">
      <select id="requiredUnit">
        <option value="A">A</option>
        <option value="mA">mA</option>
      </select>
    </div>
    <div class="result">
      <p>RShunt: <span id="rShunt">0</span> <span id="rShuntUnit">Ω</span></p>
      <p>PShunt: <span id="pShunt">0</span> <span id="pShuntUnit">W</span></p>
    </div>
    <button onclick="calculate()">Calculate</button>
  </div>



    <style>
    /* CSS styles for the Current_Shunt_Resistor_Calculator */


    

.calculator {
  max-width: 400px;
  margin: 50px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.input-group {
  margin-bottom: 15px;
}

.input-group label {
  display: block;
  margin-bottom: 5px;
}

.input-group input {
  width: 100%;
  padding: 8px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.result {
  margin-top: 20px;
}

.result p {
  margin-bottom: 5px;
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




    </style>

<script>

function calculate() {
  var Im = parseFloat(document.getElementById('current').value);
  var Rm = parseFloat(document.getElementById('resistance').value);
  var Ireq = parseFloat(document.getElementById('required').value);

  var ImUnit = document.getElementById('currentUnit').value;
  var RmUnit = document.getElementById('resistanceUnit').value;
  var IreqUnit = document.getElementById('requiredUnit').value;

  // Convert units to standard (A, Ω)
  Im = convertToStandardUnit(Im, ImUnit);
  Rm = convertToStandardUnit(Rm, RmUnit);
  Ireq = convertToStandardUnit(Ireq, IreqUnit);

  // Calculate shunt resistor
  var Rshunt = (Rm * Ireq) / (Im - Ireq);
  var Pshunt = Math.pow((Ireq * Rshunt), 2);

  // Display results
  document.getElementById('rShunt').innerText = Rshunt.toFixed(2);
  document.getElementById('rShuntUnit').innerText = 'Ω';
  document.getElementById('pShunt').innerText = Pshunt.toFixed(2);
  document.getElementById('pShuntUnit').innerText = 'W';
}

function convertToStandardUnit(value, unit) {
  switch (unit) {
    case 'mA':
      return value / 1000; // Convert milliamps to amps
    case 'kΩ':
      return value * 1000; // Convert kilo-ohms to ohms
    case 'mΩ':
      return value / 1000; // Convert milli-ohms to ohms
    default:
      return value;
  }
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Current_Shunt_Resistor_Calculator', 'adittaw_Current_Shunt_Resistor_Calculator_shortcode');
