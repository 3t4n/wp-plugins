<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Salt_Water_Freezing_Point_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Salt_Water_Freezing_Point_Calculator -->


<div class="container">
        <h1>Salt Water Freezing Point Calculator</h1>
        <div class="input-group">
            <label for="temperature">Enter Temperature (°C):</label>
            <input type="number" id="temperature" placeholder="Temperature in Celsius">
        </div>
        <div class="input-group">
            <label for="salt">Enter Salt Concentration (%):</label>
            <input type="number" id="salt" placeholder="Salt Concentration">
        </div>
        <button onclick="calculateFreezingPoint()">Calculate</button>
        <div id="result"></div>
    </div>



    <style>
    /* CSS styles for the Salt_Water_Freezing_Point_Calculator */


    

.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
}

.input-group {
    margin-bottom: 20px;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

.input-group input {
    width: calc(100% - 22px);
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #3498db; /* Changed button color */
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease; /* Added transition effect */
}

button:hover {
    background-color: #2980b9; /* Darker shade on hover */
}

#result {
    margin-top: 20px;
    text-align: center;
    font-weight: bold;
    color: #333;
    font-size: 18px;
}




    </style>

<script>

function calculateFreezingPoint() {
    var temperature = parseFloat(document.getElementById('temperature').value);
    var saltConcentration = parseFloat(document.getElementById('salt').value);

    if (isNaN(temperature) || isNaN(saltConcentration)) {
        document.getElementById('result').innerHTML = "Please enter valid temperature and salt concentration.";
        return;
    }

    var freezingPoint = 0;
    if (saltConcentration >= 0 && saltConcentration <= 24) {
        freezingPoint = temperature - (saltConcentration * 0.35);
    } else if (saltConcentration >= 25 && saltConcentration <= 49) {
        freezingPoint = temperature - (saltConcentration * 0.37);
    } else if (saltConcentration >= 50 && saltConcentration <= 74) {
        freezingPoint = temperature - (saltConcentration * 0.4);
    } else if (saltConcentration >= 75 && saltConcentration <= 100) {
        freezingPoint = temperature - (saltConcentration * 0.43);
    } else {
        document.getElementById('result').innerHTML = "Please enter salt concentration between 0% and 100%.";
        return;
    }

    document.getElementById('result').innerHTML = "Freezing Point: " + freezingPoint.toFixed(2) + " °C";
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Salt_Water_Freezing_Point_Calculator', 'adittaw_Salt_Water_Freezing_Point_Calculator_shortcode');
