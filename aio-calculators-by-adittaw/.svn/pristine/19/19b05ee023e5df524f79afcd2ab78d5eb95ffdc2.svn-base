<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Shortcode function
function adittaw_Snow_Day_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Snow calculator -->
    
    <div class="container">
        <h1>Snow Day Calculator</h1>
        <label for="temperature">Enter temperature (in Celsius):</label>
        <input type="number" id="temperature" min="-50" max="50" step="1">
        
        <label for="snowfall">Enter snowfall (in cm) <span class="optional">(optional)</span>:</label>
        <input type="number" id="snowfall" min="0" step="1">
        
        <button onclick="calculateSnowDay()">Calculate</button>
        <p id="result"></p>
    </div>




    <style>
    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

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

label {
    display: block;
    margin-bottom: 5px;
    color: #666;
}

input {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
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

p#result {
    text-align: center;
    font-weight: bold;
    margin-top: 20px;
}

.optional {
    font-size: 12px;
    color: #666;
}

    </style>

    <script>
    function calculateSnowDay() {
    var temperature = parseFloat(document.getElementById('temperature').value);

    if (temperature <= 0) {
        document.getElementById('result').innerText = "It might snow! Enjoy your day!";
    } else {
        document.getElementById('result').innerText = "No snow day today. Keep warm!";
    }
}

    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Snow_Day_Calculator', 'adittaw_Snow_Day_Calculator_shortcode');
