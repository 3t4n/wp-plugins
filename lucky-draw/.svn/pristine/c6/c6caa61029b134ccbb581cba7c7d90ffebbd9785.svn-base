<?php 


function lucky_draw_winner_mail($to,$winner_name,$winner_mail,$subject,$drawname,$prize,$drawdate){
    $message='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contest Participation Confirmation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
            color: #444;
            padding: 0;
            margin: 0;
        }

        .email-wrapper {
            margin-top:5em;
            margin-left:160px;
            height:100%;
            width: 60%;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
        }
            @media only screen and (max-width: 768px) {
        .email-wrapper{
        margin-left: 20px;
        width:90%;
               }
        }

        .email-header {
            background: linear-gradient(45deg, #ff5f6d, #ffc3a0);
            padding: 15px;
            text-align: center;
            color: white;
            font-size: 34px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .email-header h1 {
            margin: 0;
        }

        .email-content {
            height:100%;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .email-content h2 {
            font-size: 26px;
            font-weight: 600;
            color: #ff5f6d;
            margin-bottom: 15px;
        }

        .email-content p {
            font-size: 16px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .email-details {
            background: #ff5f6d;
            padding: 20px;
            width:80%;
            margin-left:10%;
            border-radius: 8px;
            color: white;
            margin-bottom: 30px;
        }

        .email-details ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .email-details ul li {
            font-size: 18px;
            padding: 5px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
        }

        .highlight {
            color: #ffc3a0;
            font-weight: 700;
        }

      

        .email-footer {
            background-color: #f8f8f8;
            padding: 5px;
            text-align: center;
            color: #888;
            font-size: 14px;
        }

        .email-footer a {
            color: #ff5f6d;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="email-wrapper">
        <!-- Header Section -->
        <div class="email-header">
            <h1>You Won 🎉</h1>
        </div>

        <!-- Content Section -->
        <div class="email-content">
            <h2>Congratulations, '.$winner_name.'</h2>
            <p>You have won the <span class="highlight">'.$drawname.'</span>  held on  <span class="highlight">'.$drawdate.'</span> Here is everything you need to know:</p>

            <div class="email-details">
                <ul>
                <li><strong>Contest Name:</strong> <span class="highlight">'.$drawname.'</span></li>
                <li><strong>Winning Prize:</strong> <span class="highlight">'.$prize.'</span></li>
                 </ul>
            </div>

      <p>We are thrilled to announce you as the winner! <br>Our team will be in touch shortly to arrange the prize delivery. Keep an eye on your inbox for further instructions!</p>

            <p>Once again, congratulations for winning the '.$drawname.'</p>
                  <!-- CTA Section -->
        </div>

        <!-- Footer Section -->
            </div>

</body>
</html>';
$headers = "Content-type:text/html;charset=UTF-8" . "\r\n";

wp_mail($to, $subject, $message,$headers);
    }


//Participation Mail
function lucky_draw_participation_mail($to,$participant_name,$subject,$drawname,$prize,$drawdate){
    $message='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contest Participation Confirmation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
            color: #444;
            padding: 0;
            margin: 0;
        }

        .email-wrapper {
            margin-top:5em;
            margin-left:160px;
            height:100%;
            width: 60%;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
        }
        @media only screen and (max-width: 768px) {
        .email-wrapper{
        margin-left: 20px;
        width:90%;
               }
        }


        .email-header {
            background: linear-gradient(45deg, #ff5f6d, #ffc3a0);
            padding: 15px;
            text-align: center;
            color: white;
            font-size: 34px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .email-header h1 {
            margin: 0;
        }

        .email-content {
            height:100%;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .email-content h2 {
            font-size: 26px;
            font-weight: 600;
            color: #ff5f6d;
            margin-bottom: 15px;
        }

        .email-content p {
            font-size: 16px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .email-details {
            background: #ff5f6d;
            padding: 20px;
            width:80%;
            margin-left:10%;
            border-radius: 8px;
            color: white;
            margin-bottom: 30px;
        }

        .email-details ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .email-details ul li {
            font-size: 18px;
            padding: 5px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
        }

        .highlight {
            color: #ffc3a0;
            font-weight: 700;
        }

      

        .email-footer {
            background-color: #f8f8f8;
            padding: 5px;
            text-align: center;
            color: #888;
            font-size: 14px;
        }

        .email-footer a {
            color: #ff5f6d;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="email-wrapper">
        <!-- Header Section -->
        <div class="email-header">
            <h1>You are In! 🎉</h1>
        </div>

        <!-- Content Section -->
        <div class="email-content">
            <h2>Dear, '.$participant_name.'</h2>
            <p>You have entered into the <span class="highlight">'.$drawname.'</span> Here is everything you need to know:</p>

            <div class="email-details">
                <ul>
                <li><strong>Name:</strong> <span class="highlight">'.$drawname.'</span></li>
                <li><strong>Date:</strong> <span class="highlight">'.$drawdate.'</span></li>
                <li><strong>Prize:</strong> <span class="highlight">'.$prize.'</span></li>

                 </ul>
            </div>

      <p>We are thrilled to have as part of our '.$drawname.'</p>

            <p>Once again, congratulations and thank you for participating!</p>
                  <!-- CTA Section -->
        </div>

        <!-- Footer Section -->
            </div>

</body>
</html>';
$headers = "Content-type:text/html;charset=UTF-8" . "\r\n";

wp_mail($to, $subject, $message,$headers);
    }

