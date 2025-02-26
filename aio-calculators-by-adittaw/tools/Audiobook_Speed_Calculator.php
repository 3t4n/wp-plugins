<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Audiobook_Speed_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Audiobook_Speed_Calculator -->


 <div class="container">
        <h1>Audiobook Speed Calculator</h1>
        <div class="input-group">
            <label for="duration">Duration of Audiobook (in hours)</label>
            <input type="number" id="duration" step="0.1" min="0" placeholder="Enter duration">
        </div>
        <div class="input-group">
            <label for="speed">Playback Speed (in times)</label>
            <input type="number" id="speed" step="0.1" min="0.5" max="3" placeholder="1.0">
        </div>
        <button onclick="calculate()">Calculate</button>
        <div id="result"></div>
    </div>



    <style>
    /* CSS styles for the Audiobook_Speed_Calculator */


    

.container {
    max-width: 500px;
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

.input-group {
    margin-bottom: 20px;
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
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}

#result {
    margin-top: 20px;
    text-align: center;
    font-size: 18px;
    color: #333;
}




    </style>
<script>


function calculate() {
    var duration = parseFloat(document.getElementById('duration').value);
    var speed = parseFloat(document.getElementById('speed').value);

    if (isNaN(duration) || isNaN(speed) || duration <= 0 || speed <= 0) {
        document.getElementById('result').innerHTML = 'Please enter valid values.';
        return;
    }

    var adjustedDuration = duration / speed;
    var hours = Math.floor(adjustedDuration);
    var minutes = Math.round((adjustedDuration - hours) * 60);

    document.getElementById('result').innerHTML = 'Adjusted Duration: ' + hours + ' hours ' + minutes + ' minutes';
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Audiobook_Speed_Calculator', 'adittaw_Audiobook_Speed_Calculator_shortcode');
