<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Micromorts_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Micromorts_Calculator -->
<div class="container">
        <h1>Micromorts Calculator</h1>
        <div class="form">
            <label for="activity">Select an Activity:</label>
            <select id="activity">
                <option value="0">Select an activity...</option>
                <option value="1">Driving 1 mile</option>
                <option value="5">Skydiving</option>
                <option value="8">Scuba diving</option>
                <option value="12">Horseback riding</option>
                <option value="20">Base jumping</option>
                <option value="25">Bungee jumping</option>
            </select>
            <button id="calculate">Calculate</button>
        </div>
        <div id="result"></div>
    </div>

    <style>
    /* CSS styles for the Micromorts_Calculator */
    
.container {
    max-width: 600px;
    margin: 100px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
}

.form {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

select, button {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button {
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

#result {
    font-size: 20px;
    text-align: center;
}

    /* Add your CSS styles here */
    </style>

    <script>
    document.getElementById("calculate").addEventListener("click", function() {
    var activity = document.getElementById("activity").value;
    var micromorts = activity * 1; // Adjust this multiplier as needed

    if (activity === "0") {
        document.getElementById("result").innerHTML = "Please select an activity.";
    } else {
        document.getElementById("result").innerHTML = "This activity carries approximately " + micromorts + " micromorts of risk.";
    }
});
    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Micromorts_Calculator', 'adittaw_Micromorts_Calculator_shortcode');
