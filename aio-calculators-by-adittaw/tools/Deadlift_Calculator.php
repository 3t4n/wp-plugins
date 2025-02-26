<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Deadlift_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Deadlift_Calculator -->


  <div class="container">
    <h1>Deadlift Calculator</h1>
    <div class="form-group">
      <label for="weight">Weight (in pounds):</label>
      <input type="number" id="weight" placeholder="Enter weight">
    </div>
    <div class="form-group">
      <label for="reps">Repetitions:</label>
      <input type="number" id="reps" placeholder="Enter reps">
    </div>
    <button id="calculate-btn">Calculate</button>
    <div id="result"></div>
  </div>



    <style>
    /* CSS styles for the Deadlift_Calculator */


    

.container {
  max-width: 400px;
  margin: 50px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
}

input[type="number"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
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
  text-align: center;
}




    </style>
   <script>


document.getElementById('calculate-btn').addEventListener('click', function() {
  var weight = parseFloat(document.getElementById('weight').value);
  var reps = parseFloat(document.getElementById('reps').value);

  if (isNaN(weight) || isNaN(reps)) {
    document.getElementById('result').innerText = 'Please enter valid numbers.';
  } else {
    var maxWeight = calculateMax(weight, reps);
    document.getElementById('result').innerText = 'Your estimated one-rep max is: ' + maxWeight.toFixed(2) + ' lbs';
  }
});

function calculateMax(weight, reps) {
  return weight * (1 + reps / 30);
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Deadlift_Calculator', 'adittaw_Deadlift_Calculator_shortcode');
