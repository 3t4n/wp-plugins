<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="robots" content="noindex">
        <meta name="google" value="notranslate">
        <title>Glamour</title>
        
        <style>
            .loading{
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #fff;
            }
            .bounceball {
                position: relative;
                display: inline-block;
                height: 37px;
                width: 30px;
            }
            .bounceball:before {
                position: absolute;
                content: '';
                display: block;
                top: 0;
                width: 30px;
                height: 30px;
                border-radius: 50%;
                background-color: #00a2ba;
                background-image: linear-gradient(to right, #00a2ba 0%, #00e18a 100%);
                -webkit-transform-origin: 50%;
                        transform-origin: 50%;
                -webkit-animation: bounce 500ms alternate infinite ease;
                        animation: bounce 500ms alternate infinite ease;
            }

            @-webkit-keyframes bounce {
                0% {
                    top: 30px;
                    height: 5px;
                    border-radius: 60px 60px 20px 20px;
                    -webkit-transform: scaleX(2);
                            transform: scaleX(2);
                }
                35% {
                    height: 15px;
                    border-radius: 50%;
                    -webkit-transform: scaleX(1);
                            transform: scaleX(1);
                }
                100% {
                    top: 0;
                }
            }

            @keyframes bounce {
                0% {
                    top: 30px;
                    height: 5px;
                    border-radius: 60px 60px 20px 20px;
                    -webkit-transform: scaleX(2);
                            transform: scaleX(2);
                }
                35% {
                    height: 15px;
                    border-radius: 50%;
                    -webkit-transform: scaleX(1);
                            transform: scaleX(1);
                }
                100% {
                    top: 0;
                }
            }
        </style>

        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo GLMR_URL . 'assets/vendors/fontawesome/css/fontawesome-all.min.css'; ?>" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo GLMR_URL . 'assets/css/glamour-editor.css'; ?>" type="text/css" media="all">
    </head>
    <body class="glamour-editor">
        <div class="glamour-wrap">
            <div class="glamour-toolbar" id="glamour-toolbar"><div class="loading"><div class="bounceball"></div></div></div>
            <div class="glamour-canvas">
                <iframe src="<?php echo esc_url( glamour_get_iframe_url() ); ?>" frameborder="0" id="glamour-iframe" name="glamour-iframe"></iframe>
            </div>
        </div>

        <?php
            do_action( 'wp_footer' )
        ?>
        
    </body>
</html>