<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Inflation_Premium_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Inflation_Premium_Calculator -->


    <div class="calculator">
        <h2>Inflation Premium Calculator</h2>
        <div class="input-container">
            <label for="nominalRate">Nominal Rate (%):</label>
            <input type="number" id="nominalRate" placeholder="Enter nominal rate">
        </div>
        <div class="input-container">
            <label for="realRate">Real Rate (%):</label>
            <input type="number" id="realRate" placeholder="Enter real rate">
        </div>
        <div class="result">
            <button onclick="calculate()">Calculate</button>
            <p id="premium"></p>
        </div>
    </div>



    <style>
    /* CSS styles for the Inflation_Premium_Calculator */


    

.calculator {
    background-color: #fff;
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

.input-container {
    margin-bottom: 20px;
}

input[type="number"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #3d6cff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #3d6cff;
}

.result {
    text-align: center;
}




    </style>
   <script>


function calculate() {
    var nominalRate = parseFloat(document.getElementById('nominalRate').value);
    var realRate = parseFloat(document.getElementById('realRate').value);

    if (isNaN(nominalRate) || isNaN(realRate)) {
        alert('Please enter valid values.');
        return;
    }

    var inflationPremium = nominalRate - realRate;
    document.getElementById('premium').textContent = "Inflation Premium: " + inflationPremium.toFixed(2) + "%";
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Inflation_Premium_Calculator', 'adittaw_Inflation_Premium_Calculator_shortcode');
