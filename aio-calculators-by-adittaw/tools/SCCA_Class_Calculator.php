<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_SCCA_Class_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the SCCA_Class_Calculator -->


<div class="container">
        <h1>SCCA Class Calculator</h1>
        <div class="input-container">
            <label for="weight">Vehicle Weight (lbs):</label>
            <input type="number" id="weight">
        </div>
        <div class="input-container">
            <label for="horsepower">Horsepower:</label>
            <input type="number" id="horsepower">
        </div>
        <div class="input-container">
            <label for="displacement">Engine Displacement (cc):</label>
            <input type="number" id="displacement">
        </div>
        <button onclick="calculateClass()">Calculate Class</button>
        <div id="result"></div>
    </div>



    <style>
    /* CSS styles for the SCCA_Class_Calculator */


    

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.input-container {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="number"] {
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

function calculateClass() {
    const weight = parseFloat(document.getElementById('weight').value);
    const horsepower = parseFloat(document.getElementById('horsepower').value);
    const displacement = parseFloat(document.getElementById('displacement').value);

    // Perform SCCA class calculation
    let result = "";
    if (weight >= 2000 && horsepower >= 125 && displacement <= 1914) {
        result = "Street Touring";
    } else if (weight <= 3000 && horsepower <= 280 && displacement <= 1999) {
        result = "Street Modified";
    } else {
        result = "Other class or not eligible";
    }

    document.getElementById('result').innerText = "Your SCCA class is: " + result;
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_SCCA_Class_Calculator', 'adittaw_SCCA_Class_Calculator_shortcode');
