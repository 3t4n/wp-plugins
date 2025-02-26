<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_flames_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the flames_Calculator -->


<div class="container">
    <h1>Flames Calculator</h1>
    <div class="input-container">
      <input type="text" id="name1" class="input" placeholder="Enter Name 1">
      <input type="text" id="name2" class="input" placeholder="Enter Name 2">
      <button onclick="calculate()">Calculate</button>
    </div>
    <div id="result"></div>
  </div>



    <style>
    /* CSS styles for the flames_Calculator */


    

.container {
  max-width: 500px;
  margin: 50px auto;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  padding: 30px;
}

h1 {
  text-align: center;
  color: #333;
  margin-bottom: 30px;
}

.input-container {
  display: flex;
  flex-direction: column; /* Arrange inputs in a column */
  gap: 15px; /* Add a gap between inputs */
}

.input {
  padding: 15px;
  border: 2px solid #ccc;
  border-radius: 8px;
  font-size: 16px;
  transition: border-color 0.3s;
}

.input:focus {
  outline: none;
  border-color: #4caf50;
}

button {
  padding: 15px 30px;
  border: none;
  border-radius: 8px;
  background-color: #4caf50;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #45a049;
}

#result {
  text-align: center;
  font-size: 24px;
  margin-top: 30px;
  color: #4caf50;
  font-weight: bold;
  text-transform: uppercase;
}




    </style>

<script>

function calculate() {
  var name1 = document.getElementById('name1').value.toLowerCase().replace(/[^a-z]/g, '');
  var name2 = document.getElementById('name2').value.toLowerCase().replace(/[^a-z]/g, '');

  var flames = ['Friendship', 'Love', 'Affection', 'Marriage', 'Enemy', 'Sibling'];
  var commonLetters = [];

  for (var i = 0; i < name1.length; i++) {
    var index = name2.indexOf(name1[i]);
    if (index !== -1) {
      commonLetters.push(name1[i]);
      name2 = name2.slice(0, index) + name2.slice(index + 1);
    }
  }

  var remainingLetters = name1.length + name2.length;
  var result = flames[remainingLetters % flames.length];

  document.getElementById('result').innerHTML = `Result: ${result}`;
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_flames_Calculator', 'adittaw_flames_Calculator_shortcode');
