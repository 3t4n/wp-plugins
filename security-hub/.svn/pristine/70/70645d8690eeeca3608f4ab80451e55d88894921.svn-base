<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">

        <title>Home plugin</title>
     
        <meta name="author" content="WP Security Hub">
        <meta name="description" content="Proteggi il tuo sito in un click.">
        <meta name="keywords" content="media designer, WordPress plugin, security plugin, web designer, Milano, digital, creative, website">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 


        <style>

            /* white: #FFFFFF */
            /* deep blue: #002336 */
            /* sky blue: #BFD7EA */
            /* pink: #F6B7CB */
            /* green: #00818D */

            body {
                background-color: #BFD7EA;
                color: #002336;
                height: 100vh;
            }

            .container {
                height: 100vh;
                display: flex;
                flex-direction: vertical;
                margin: auto;
                overflow-y: hidden;
            }

            #home-license {
                padding: 10px 20px;
                background: #BFD7EA;          
                font-family: "Lato", sans-serif;
                font-weight: 500;
                text-align: center;
                margin: auto;
            }

            h1, h2, h3, h4, h5 {
                font-family: "Montserrat", sans-serif;
                font-weight: 600;
                margin-bottom: 0;
                color: #002336;
            }

            h1 {
                font-size: 27px;
                margin-top: -30px;
            }

            h2 {
                font-size: 21px;
                line-height: 24px;
            }

            h3 {
                font-size: 18px;
            }

            h3 a {
                color: #00818D;
            }

            p, label {
                font-size: 14px;
                color: #002336;
            }

            input {
                height: 40px;
                border-radius: 16px;
                border: 1px solid #BFD7EA;
                width: 300px;
                color: #002336;
                padding-left: 15px;
            }

            .pink, .pink:hover {
                color: #F6B7CB;
            }

            .green, .green:hover {
                color: #00818D;
                font-weight: 600;
                margin-top: 20px;
                font-family: "Montserrat", sans-serif;
            }

            .deepBlue, .deepBlue:hover {
                color: #002336;
                font-weight: 600;
                margin-top: 20px;
                font-family: "Montserrat", sans-serif;
            }

            a, a:hover {
                font-size: 14px;
                text-decoration: none;
                cursor: pointer;
                color: #00818D;
                font-weight: 600;
            }

            .link {
                font-family: "Montserrat", sans-serif;
                color: #002336;
                font-weight: 600;
            }

            #licenseCode {
                width: 300px;
                border: 1px solid #BFD7EA;
                border-radius: 8px;
                height: 40px;
                margin-right: 10px;
                padding-left: 15px;
            }

            .greenBtn {
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
                width: 150px;
            }

            .greenBtn > a, .greenBtn > a:hover {
                font-size: 14px;
                text-decoration: none;
                cursor: pointer;
                color: #FFFFFF;
            }

           

        </style>

    </head>


    <body>
        
        <div class="container">

            <div id="home-license">
                
                <div id="logo">

                    <h1>
                        <?php echo '<img src="' . esc_url( plugins_url( 'img/wp-securityhub-logo.png', dirname(__FILE__) ) ) . '" height="36" alt="logo WP Security Hub"> ';?><br>
                    </h1>
                    
                </div>
           
                <div style="margin-top: 30px">
                    <h2>Hai già acquistato un nostro piano? Registralo ora.</h2>
                    <p>Inserisci il codice univoco della tua licenza.</p>

                    <form action="" method="post">
                        <input type="text" name="code" placeholder="Codice licenza" id="licenseCode">
                        <button type="submit" class="greenBtn">Attiva</button>
                    </form>
                </div>


                <div style="margin-top: 60px">

                    <h3 style="margin-bottom: 8px">Non hai ancora una licenza? <a href="https://www.wp-securityhub.it/prezzi/" style="font-size:18px" target="_blank">Acquistala ora.</a></h4>

                    <a href="admin.php?page=SHslugHome2" class="green">oppure scopri di più →</a>


                </div>
                

            </div>
        </div>
           
    </body>
    
</html>



