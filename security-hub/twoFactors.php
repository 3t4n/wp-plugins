<?php
session_start();
require_once 'apiEmail.php';
require_once 'Authenticator.php';

$authenticator = new WPSH_Authenticator();
if (!isset($_SESSION['auth_secret'])) {
    $secret = $authenticator->generateRandomSecret();
    $_SESSION['auth_secret'] = $secret;
}


$qrCodeUrl = $authenticator->getQR('WP Security Hub', $_SESSION['auth_secret']);

if (!isset($_SESSION['failed'])) {
    $_SESSION['failed'] = false;
}



?>


<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">

        <title> Autenticazione a due fattori </title>
     
        <meta name="author" content="WP Security Hub">
        <meta name="description" content="Proteggi il tuo sito in un click.">
        <meta name="keywords" content="media designer, WordPress plugin, security plugin, web designer, Milano, digital, creative, website">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

        <style>

            body {
                font-family: "Lato", sans-serif;
                font-weight: 600;
                text-align: center;
                display: block;
                background-color: #BFD7EA;
            }

            h1, h2, h3, h4, h5 {
                font-family: "Montserrat", sans-serif;
                font-weight: 600;
            }

            h1 {
                font-size: 27px;
            }

            h2 {
                font-size: 18px;
            }

            p {
                font-size: 14px;
            }

            button {
                font-family: "Montserrat", sans-serif;
                font-weight: 500;
                background-color: #00818D;
                color: #FFFFFF;
                border-radius: 8px;
                border: none;
                padding: 8px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 14px;
                cursor: pointer;
                height: 40px;
                margin-top: 10px;
            }


            #box {
                padding: 10px 20px;
                background: #BFD7EA;          
                align-items: center;
                justify-content: center;
            }

            #box h2, #box p {
                color: #002336;
            }

        
            .imageqrcode {
                width: 150px;
                height: 150px;
                padding: 15px;
                background-color: #FFFFFF;
                border-radius: 8px;
                border: 1px solid #00818D;
                margin-top: 50px;
            }

            #inputcodeQR {
                height: 40px;
                border-radius: 8px;
                border: 1px solid #BFD7EA;
                width: 250px;
                margin-top: 30px;
                text-align: center;
                color: #002336;
            }

            .error {
                color: red;
            }

            .container {
                display: flex;
                justify-content: center;
                vertical-align:middle;
            }


        </style>

    </head>


    <body>

        <div id="box">
            <form action="" method="post" style="margin-top: 50px">
                
                <h1>Scannerizza il QR Code</h1>
                <p>Assicurati di utilizzare l'applicazione <span class="green">Google Autenticator</span></p>
            
                <div>
                    <?php
                        print_r('<img src="'.$qrCodeUrl.'" alt="QRcode autenticazione a due fattori" class="imageqrcode">');
                    ?>
                    
                </div>
                
                <input id="inputcodeQR" type="text" name="code" placeholder="Inserisci codice"><br>
                <button type="submit">Verifica codice</button>
                
            </form>

            <div style="margin-top: 50px">
                <div class="container">
                    <p>Questo sito è protetto da</p>
                    <img src="img/wp-securityhub-logo.png" alt="logo WP Security Hub" id="logo" height="30" style="margin-top: 8px">
                </div>
            </div>
            
        </div>

    </body>
</html>

<?php

if(isset($_POST['code'])){

    if($_SERVER['REQUEST_METHOD'] != "POST"){
        // header("location: twoFactors.php");
        // die();
    }
    
    $authernticator = new WPSH_Authenticator();
    
    $checkResult = $authernticator->verifyCode($_SESSION['auth_secret'], $_POST['code'], 0);
    
    if(!$checkResult){
        $_SESSION['failed'] = true;
        // header("location: twoFactors.php");
        // die();
    }


    if($checkResult){
       
        header("location: /wp-admin/about.php");
        echo 'Il codice inserito è corretto';
    } else {
        // echo '<strong> Oooooops.... </storng> Il codice inserito è sbagliato';
        echo '<div class="error">Codice errato</div>';
        
        // verificare dove sia meglio posizionare l'avviso di errore! 
    }
    
} 
?>
