<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Commander_Deck_Power_Level_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Commander_Deck_Power_Level_Calculator -->


 <div class="container">
    <h1>Commander Deck Power Level Calculator</h1>
    <div class="form-group">
      <label for="commander">Commander Name:</label>
      <input type="text" id="commander" placeholder="Enter commander name">
    </div>
    <div class="form-group">
      <label for="cards">Number of Cards:</label>
      <input type="number" id="cards" min="0" step="1" placeholder="Enter number of cards">
    </div>
    <div class="form-group">
      <label for="strategy">Deck Strategy:</label>
      <select id="strategy">
        <option value="aggro">Aggro</option>
        <option value="control">Control</option>
        <option value="combo">Combo</option>
        <option value="midrange">Midrange</option>
        <option value="stax">Stax</option>
      </select>
    </div>
    <button id="calculate">Calculate Power Level</button>
    <div id="result"></div>
  </div>



    <style>
    /* CSS styles for the Commander_Deck_Power_Level_Calculator */


    

.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="number"],
select {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #0056b3;
}

#result {
  margin-top: 20px;
  font-weight: bold;
}




    </style>

<script>

document.getElementById('calculate').addEventListener('click', function() {
  var commanderName = document.getElementById('commander').value;
  var numCards = parseInt(document.getElementById('cards').value);
  var strategy = document.getElementById('strategy').value;

  if (commanderName.trim() === '' || isNaN(numCards)) {
    alert('Please fill in all fields with valid values.');
    return;
  }

  var powerLevel = calculatePowerLevel(numCards, strategy);
  document.getElementById('result').innerHTML = 'Power Level of ' + commanderName + '\'s deck: ' + powerLevel;
});

function calculatePowerLevel(numCards, strategy) {
  var basePowerLevel = numCards / 100;
  switch(strategy) {
    case 'aggro':
      return basePowerLevel + 2;
    case 'control':
      return basePowerLevel + 1;
    case 'combo':
      return basePowerLevel + 3;
    case 'midrange':
      return basePowerLevel + 2.5;
    case 'stax':
      return basePowerLevel + 1.5;
    default:
      return basePowerLevel;
  }
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Commander_Deck_Power_Level_Calculator', 'adittaw_Commander_Deck_Power_Level_Calculator_shortcode');
