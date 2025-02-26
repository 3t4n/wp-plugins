<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congratulations! You Are a Lucky Draw Winner</title>
    <style>
        #body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            background-color: #f9f9f9;
            margin: 0;
        }
        #email-container {
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        #email-header {
            text-align: center;
            padding-bottom: 20px;
        }
        #email-header h1 {
            color: #28a745;
            font-size: 24px;
        }
        #email-body {
            font-size: 16px;
            margin-bottom: 20px;
        }
        #email-body p {
            margin: 10px 0;
        }
        #footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: 20px;
        }
        #footer a {
            color: #007bff;
            text-decoration: none;
        }
        #button {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <?php 
// Inline CSS to be added
$inline_css = "
    #body {
        font-family: Arial, sans-serif;
        color: #333;
        line-height: 1.6;
        background-color: #f9f9f9;
        margin: 0;
    }
    #email-container {
        background-color: #fff;
        border-radius: 8px;
        padding: 30px;
        max-width: 600px;
        margin: auto;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    #email-header {
        text-align: center;
        padding-bottom: 20px;
    }
    #email-header h1 {
        color: #28a745;
        font-size: 24px;
    }
    #email-body {
        font-size: 16px;
        margin-bottom: 20px;
    }
    #email-body p {
        margin: 10px 0;
    }
    #footer {
        text-align: center;
        font-size: 14px;
        color: #777;
        margin-top: 20px;
    }
    #footer a {
        color: #007bff;
        text-decoration: none;
    }
    #button {
        background-color: #28a745;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        display: inline-block;
        margin-top: 15px;
    }
";

// Add the inline CSS to the 'luckydrawbootstrapedit' style handle
wp_add_inline_style('luckydrawbootstrapedit', $inline_css);
?>

    <div id="email-container">
        <div id="email-header">
            <h1>Congratulations! You're a Winner!</h1>
        </div>
        <div id="email-body">
            <p>Dear <?php if(isset($_GET["_wpnonce"])){ echo '<strong>'.wp_kses_post($winner_name).'</strong>'; }else{ echo "[Winner Name]"; } ?></p>
            <p>We are thrilled to announce that you are the winner of our Lucky Draw Contest !</p>
            <p>Your entry has been selected, and you’ve won <?php if(isset($_GET["_wpnonce"])){ echo '<strong>'.wp_kses_post($prize["SKUText1"]).'</strong>'; }else{ echo "[Prize Name]"; } ?>. We can’t wait for you to claim your prize.</p>
            
            <p>If you have any questions or need assistance with claiming your prize, feel free to reach out to us at <?php if(isset($_GET["_wpnonce"])){ echo '<strong>'.wp_kses_post($winner_name).'</strong>'; }else{ echo "[Admin Email Address]"; } ?>.</p>
        </div>
        <div id="footer">
        </div>
    </div>

</body>
</html>