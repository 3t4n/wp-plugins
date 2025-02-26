<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky Draw Participation Confirmation</title>
    
</head>
<body>
<?php 
// Inline CSS to be added
function lucky_draw__admin_inline_css(){
      echo "#body {
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
}
// Add the inline CSS to the 'luckydrawbootstrapedit' style handle
add_action( 'admin_print_styles', 'lucky_draw__admin_inline_css' ); ?>

    <div id="email-container">
        <div id="email-header">
            <h1> [Contest Name] <br>Participation Confirmation</h1>
        </div>
        <div id="email-body">
            <p>Dear [Participant Name]" ,</p>
            <p>Thank you for participating in our Lucky Draw! We are excited to inform you that your entry has been successfully registered. You are now in the running to win amazing prizes!</p>
            <p>The lucky draw will take place on [Draw Date] and the winners will be announced shortly after. Stay tuned, and we wish you the best of luck!</p>
        </div>
        <div id="footer">
            <p>Thank you for being part of this exciting event!<br>
            From [Website Name]</p>
        </div>
    </div>