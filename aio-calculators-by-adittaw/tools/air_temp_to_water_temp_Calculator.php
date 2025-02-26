<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_air_temp_to_water_temp_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the air_temp_to_water_temp_Calculator -->


<div class="container">
        <h1>Air to Water Temperature Calculator</h1>
        <div class="input-container">
            <label for="airTemp">Air Temperature (°C):</label>
            <input type="number" id="airTemp" placeholder="Enter air temperature">
        </div>
        <button onclick="calculateWaterTemp()">Calculate</button>
        <div id="result"></div>
    </div>



    <style>
    /* CSS styles for the air_temp_to_water_temp_Calculator */


    

.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
}

.input-container {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

input {
    width: 100%;
    padding: 8px;
    font-size: 16px;
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
    font-size: 18px;
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


function calculateWaterTemp() {
    var airTemp = parseFloat(document.getElementById('airTemp').value);
    var waterTemp = airTemp * 1.43 + 10;
    document.getElementById('result').innerHTML = "Estimated Water Temperature: " + waterTemp.toFixed(2) + " °C";
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_air_temp_to_water_temp_Calculator', 'adittaw_air_temp_to_water_temp_Calculator_shortcode');
