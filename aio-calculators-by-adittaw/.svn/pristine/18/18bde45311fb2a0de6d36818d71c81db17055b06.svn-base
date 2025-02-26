<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Bacterial_Growth_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Bacterial_Growth_Calculator -->


    <div class="container">
        <h1>Bacterial Growth Calculator</h1>
        <div class="input-container">
            <label for="initial-population">Initial Population (N<sub>0</sub>):</label>
            <input type="number" id="initial-population" min="1" required>
        </div>
        <div class="input-container">
            <label for="growth-rate">Growth Rate (r):</label>
            <input type="number" id="growth-rate" min="0" step="0.01" required>
        </div>
        <div class="input-container">
            <label for="time">Time (t):</label>
            <input type="number" id="time" min="1" required>
        </div>
        <button onclick="calculateBacterialGrowth()">Calculate</button>
        <div id="result"></div>
    </div>



    <style>
    /* CSS styles for the Bacterial_Growth_Calculator */


    

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
}

.input-container {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

input[type="number"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

#result {
    margin-top: 20px;
    font-weight: bold;
}




    </style>
<script>


function calculateBacterialGrowth() {
    var initialPopulation = parseFloat(document.getElementById("initial-population").value);
    var growthRate = parseFloat(document.getElementById("growth-rate").value);
    var time = parseFloat(document.getElementById("time").value);

    var finalPopulation = initialPopulation * Math.exp(growthRate * time);

    document.getElementById("result").innerHTML = "Final Population (N): " + finalPopulation.toFixed(2);
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Bacterial_Growth_Calculator', 'adittaw_Bacterial_Growth_Calculator_shortcode');
