<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Shortcode function
function adittaw_ZFS_Storage_Calculator_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <!-- HTML code for the ZFS_Storage_Calculator -->


<div class="container">
    <h2>ZFS Storage Calculator</h2>
    <label for="diskSize">Total Disk Size (GB):</label>
    <input type="number" id="diskSize" min="1" placeholder="Enter total disk size">
    <label for="raidLevel">RAID Level:</label>
    <select id="raidLevel">
        <option value="1">RAID 1 (Mirroring)</option>
        <option value="5">RAID 5 (Single Parity)</option>
        <option value="6">RAID 6 (Double Parity)</option>
        <option value="10">RAID 10 (Mirrored Stripes)</option>
    </select>
    <label for="usableSpace">Usable Space (%):</label>
    <input type="number" id="usableSpace" min="1" max="100" placeholder="Enter usable space percentage">
    <button onclick="calculateStorage()">Calculate</button>
    <div id="result"></div>
</div>



    <style>
    /* CSS styles for the ZFS_Storage_Calculator */


    
.container {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        width: 350px;
        max-width: 100%;
        text-align: center;
    }
    h2 {
        color: #333333;
        margin-bottom: 20px;
    }
    label {
        display: block;
        color: #555555;
        margin-bottom: 8px;
        text-align: left;
    }
    input[type="number"],
    select {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border: 1px solid #cccccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    button {
        background-color: #007bff;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        padding: 12px 24px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }
    button:hover {
        background-color: #0056b3;
    }
    #result {
        margin-top: 20px;
        color: #333333;
        font-size: 16px;
        text-align: left;
    }



    </style>

<script>

    function calculateStorage() {
        const diskSize = parseFloat(document.getElementById('diskSize').value);
        const raidLevel = parseInt(document.getElementById('raidLevel').value);
        const usableSpace = parseFloat(document.getElementById('usableSpace').value);
        
        if (isNaN(diskSize) || isNaN(raidLevel) || isNaN(usableSpace)) {
            alert("Please enter valid input.");
            return;
        }

        let totalStorage = 0;
        let usableStorage = 0;

        switch (raidLevel) {
            case 1:
                usableStorage = diskSize / 2 * (usableSpace / 100);
                totalStorage = diskSize / 2;
                break;
            case 5:
                usableStorage = diskSize * (usableSpace / 100) * (diskSize - 1);
                totalStorage = diskSize * (diskSize - 1);
                break;
            case 6:
                usableStorage = diskSize * (usableSpace / 100) * (diskSize - 2);
                totalStorage = diskSize * (diskSize - 2);
                break;
            case 10:
                usableStorage = diskSize / 2 * (usableSpace / 100);
                totalStorage = diskSize / 2;
                break;
            default:
                alert("Invalid RAID level.");
                return;
        }

        document.getElementById('result').innerHTML = `
            <p>Total Usable Storage: ${usableStorage.toFixed(2)} GB</p>
            <p>Total Storage: ${totalStorage.toFixed(2)} GB</p>
        `;
    }



    </script>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register shortcode
add_shortcode('adittaw_ZFS_Storage_Calculator', 'adittaw_ZFS_Storage_Calculator_shortcode');
