<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Return_On_Net_Worth_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Return_On_Net_Worth_Calculator -->


    <div class="calculator">
        <h2>Return On Net Worth Calculator</h2>
        <div class="input-group">
            <label for="net-worth">Net Worth ($):</label>
            <input type="number" id="net-worth">
        </div>
        <div class="input-group">
            <label for="net-income">Net Income ($):</label>
            <input type="number" id="net-income">
        </div>
        <button onclick="calculateRONW()">Calculate</button>
        <div id="result"></div>
    </div>



    <style>
    /* CSS styles for the Return_On_Net_Worth_Calculator */


    
.calculator {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.input-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
}

input[type="number"] {
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
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


function calculateRONW() {
    var netWorth = parseFloat(document.getElementById("net-worth").value);
    var netIncome = parseFloat(document.getElementById("net-income").value);

    if (isNaN(netWorth) || isNaN(netIncome)) {
        document.getElementById("result").innerHTML = "Please enter valid numbers.";
    } else {
        var ronw = (netIncome / netWorth) * 100;
        document.getElementById("result").innerHTML = "Return on Net Worth: " + ronw.toFixed(2) + "%";
    }
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Return_On_Net_Worth_Calculator', 'adittaw_Return_On_Net_Worth_Calculator_shortcode');
