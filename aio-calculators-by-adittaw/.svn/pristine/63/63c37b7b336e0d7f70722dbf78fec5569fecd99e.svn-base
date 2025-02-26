<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_Pool_Tournament_Payout_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the Pool_Tournament_Payout_Calculator -->


    <div class="container">
        <h1>Pool Tournament Payout Calculator</h1>
        <div class="form">
            <label for="totalPlayers">Total Players:</label>
            <input type="number" id="totalPlayers" min="2" value="8">
            <button onclick="addPlayers()">Add Players</button>
            <button onclick="removePlayers()">Remove Players</button>
            <br>
            <label for="entryFee">Entry Fee ($):</label>
            <input type="number" id="entryFee" min="0" value="0">
            <button onclick="calculatePayout()">Calculate</button>
        </div>
        <div id="playerList"></div>
        <div id="result"></div>
    </div>



    <style>
    /* CSS styles for the Pool_Tournament_Payout_Calculator */


    

.container {
    max-width: 600px;
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

.form {
    text-align: center;
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

input[type="number"] {
    padding: 8px;
    width: 100px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="number"]:focus {
    outline: none;
    border-color: #007bff;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

#playerList {
    margin-bottom: 20px;
}

#playerList div {
    margin-bottom: 5px;
}

#result {
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    margin-top: 20px;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 5px;
}




    </style>
<script>


var players = [];

function addPlayers() {
    var totalPlayers = document.getElementById('totalPlayers').value;
    for (var i = 0; i < totalPlayers; i++) {
        var playerName = prompt("Enter Player " + (i + 1) + "'s Name:");
        players.push(playerName ? playerName : "Player " + (i + 1));
    }
    displayPlayers();
}

function removePlayers() {
    players.pop();
    displayPlayers();
}

function displayPlayers() {
    var playerList = document.getElementById('playerList');
    playerList.innerHTML = '';
    players.forEach(function(player, index) {
        playerList.innerHTML += '<div>Player ' + (index + 1) + ': ' + player + '</div>';
    });
}

function calculatePayout() {
    var totalPlayers = players.length;
    var entryFee = parseFloat(document.getElementById('entryFee').value);
    
    if (totalPlayers < 2) {
        alert('Minimum 2 players required.');
        return;
    }

    if (entryFee < 0) {
        alert('Entry fee cannot be negative.');
        return;
    }

    var payouts = [];

    // Example payout structure, you can customize this
    if (totalPlayers <= 8) {
        payouts = [50, 30, 20];
    } else {
        payouts = [40, 30, 20, 10];
    }

    var totalPayouts = payouts.reduce((acc, curr) => acc + curr, 0);
    var prizePool = totalPlayers * entryFee;
    var remainingPrizePool = prizePool - totalPayouts;
    var result = '<p>Prize Pool: $' + prizePool.toFixed(2) + '</p>';
    result += '<p>Payout Structure:</p><ul>';
    for (var i = 0; i < payouts.length; i++) {
        result += '<li>Position ' + (i + 1) + ': $' + (payouts[i] * prizePool / 100).toFixed(2) + '</li>';
    }
    result += '</ul>';
    result += '<p>Remaining Prize Pool: $' + remainingPrizePool.toFixed(2) + '</p>';
    document.getElementById('result').innerHTML = result;
}




    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_Pool_Tournament_Payout_Calculator', 'adittaw_Pool_Tournament_Payout_Calculator_shortcode');
