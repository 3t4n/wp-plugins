<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Calories_Burned_Bowling_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Calories_Burned_Bowling_Calculator -->


<div class="calculator-container">
  <h1>Calories Burned Bowling Calculator</h1>
  <div class="input-group">
    <label for="weight">Weight (lbs):</label>
    <input type="number" id="weight" placeholder="Enter weight in pounds">
  </div>
  <div class="input-group">
    <label for="time">Time (minutes):</label>
    <input type="number" id="time" placeholder="Enter time in minutes">
  </div>
  <div class="input-group">
    <label for="activity">Type of Activity:</label>
    <select id="activity">
      <option value="1">Casual Bowling</option>
      <option value="2">Competitive Bowling</option>
      <option value="3">Bowling Practice</option>
      <option value="4">Bowling Party</option>
    </select>
  </div>
  <button onclick="calculateCalories()">Calculate</button>
  <div id="result"></div>
</div>



    <style>
    /* CSS styles for the Calories_Burned_Bowling_Calculator */


    
/* styles.css */


.calculator-container {
  background-color: #ffffff;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  text-align: center;
  max-width: 400px;
  width: 100%;
}

h1 {
  color: #333333;
  margin-bottom: 20px;
}

.input-group {
  margin-bottom: 20px;
}

label {
  font-weight: bold;
  display: block;
  margin-bottom: 5px;
  color: #666666;
}

input[type="number"],
select {
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #cccccc;
  width: 100%;
}

button {
  background-color: #4caf50;
  color: #ffffff;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #45a049;
}

#result {
  margin-top: 20px;
  font-weight: bold;
  color: #333333;
  font-size: 18px;
}




    </style>

<script>

// script.js
function calculateCalories() {
  const weight = document.getElementById('weight').value;
  const time = document.getElementById('time').value;
  const activity = document.getElementById('activity').value;

  let caloriesBurnedPerMinute;

  switch (parseInt(activity)) {
    case 1: // Casual Bowling
      caloriesBurnedPerMinute = 3.5 * weight / 200;
      break;
    case 2: // Competitive Bowling
      caloriesBurnedPerMinute = 6 * weight / 200;
      break;
    case 3: // Bowling Practice
      caloriesBurnedPerMinute = 4 * weight / 200;
      break;
    case 4: // Bowling Party
      caloriesBurnedPerMinute = 5 * weight / 200;
      break;
    default:
      caloriesBurnedPerMinute = 0;
  }

  const totalCaloriesBurned = caloriesBurnedPerMinute * time;

  document.getElementById('result').innerText = `Calories Burned: ${totalCaloriesBurned.toFixed(2)} kcal`;
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Calories_Burned_Bowling_Calculator', 'adittaw_Calories_Burned_Bowling_Calculator_shortcode');
