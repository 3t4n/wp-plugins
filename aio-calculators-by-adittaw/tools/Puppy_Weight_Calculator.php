<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Puppy_Weight_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Puppy_Weight_Calculator -->


  <div class="container">
        <h1>Puppy Weight Calculator</h1>
        <div class="form">
            <label for="age">Age (in months):</label>
            <input type="number" id="age" min="1" max="24" required>
            <label for="expectedWeight">Expected Weight (in pounds):</label>
            <input type="number" id="expectedWeight" min="1" required>
            <button onclick="calculateWeight()">Calculate</button>
        </div>
        <div class="result" id="result"></div>
    </div>



    <style>
    /* CSS styles for the Puppy_Weight_Calculator */


    

.container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
}

.form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.form button:hover {
    background-color: #0056b3;
}

.result {
    margin-top: 20px;
    padding: 10px;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    border-radius: 5px;
}




    </style>
<script>


function calculateWeight() {
    var age = parseInt(document.getElementById("age").value);
    var expectedWeight = parseInt(document.getElementById("expectedWeight").value);

    if (age <= 0 || expectedWeight <= 0) {
        alert("Please enter valid values.");
        return;
    }

    var weight;

    if (age <= 6) {
        weight = expectedWeight * (age / 6);
    } else {
        weight = expectedWeight;
    }

    document.getElementById("result").innerHTML = "Estimated weight: " + weight.toFixed(2) + " pounds";
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Puppy_Weight_Calculator', 'adittaw_Puppy_Weight_Calculator_shortcode');
