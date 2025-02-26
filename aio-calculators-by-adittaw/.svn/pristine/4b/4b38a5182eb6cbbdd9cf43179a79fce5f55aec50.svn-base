<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Subwoofer_Cone_Area_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Subwoofer_Cone_Area_Calculator -->


    <div class="container">
        <h1>Subwoofer Cone Area Calculator</h1>
        <div class="input-group">
            <label for="diameter">Diameter (in inches):</label>
            <input type="number" id="diameter" min="0" step="0.1">
        </div>
        <button onclick="calculate()">Calculate</button>
        <div id="result"></div>
    </div>



    <style>
    /* CSS styles for the Subwoofer_Cone_Area_Calculator */


    

.container {
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555;
    font-weight: bold;
}

input[type="number"] {
    width: calc(100% - 12px);
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: white;
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
    text-align: center;
    color: #333;
}




    </style>
<script>


function calculate() {
    var diameter = parseFloat(document.getElementById('diameter').value);
    if (!isNaN(diameter)) {
        var radius = diameter / 2;
        var area = Math.PI * Math.pow(radius, 2);
        document.getElementById('result').innerHTML = "Subwoofer Cone Area: " + area.toFixed(2) + " square inches";
    } else {
        document.getElementById('result').innerHTML = "Please enter a valid diameter.";
    }
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Subwoofer_Cone_Area_Calculator', 'adittaw_Subwoofer_Cone_Area_Calculator_shortcode');
