<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Goal_To_Game_Ratio_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Goal_To_Game_Ratio_Calculator -->


<div class="container">
    <h1>Goal-To-Game Ratio Calculator</h1>
    <label for="goals">Total Goals:</label>
    <input type="number" id="goals" min="0" value="0"><br>
    <label for="games">Total Games:</label>
    <input type="number" id="games" min="0" value="0"><br>
    <button onclick="calculateRatio()">Calculate Ratio</button>
    <div id="result"></div>
</div>



    <style>
    /* CSS styles for the Goal_To_Game_Ratio_Calculator */


    
    .container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
    }

    h1 {
        color: #333;
    }

    input[type="number"] {
        width: 80px;
        padding: 8px;
        margin: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    #result {
        font-size: 24px;
        margin-top: 20px;
    }



    </style>
   <script>


    function calculateRatio() {
        var goals = parseFloat(document.getElementById('goals').value);
        var games = parseFloat(document.getElementById('games').value);
        if (games === 0) {
            document.getElementById('result').innerText = "Cannot divide by zero!";
            return;
        }
        var ratio = goals / games;
        document.getElementById('result').innerText = "Your goal-to-game ratio is: " + ratio.toFixed(2);
    }



    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Goal_To_Game_Ratio_Calculator', 'adittaw_Goal_To_Game_Ratio_Calculator_shortcode');
