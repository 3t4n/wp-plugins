<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="robots" content="noindex,nofollow">
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
        <title>Applepay Gateway loader</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
        <link rel="stylesheet" href="<?php echo TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASEURL . 'assets/css/apple-init.css?v=1.0.0.23';?>" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            var tpAppOPPWCheckoutID = null;
            var tpconf      = {
                ajaxurl: '<?php echo admin_url('admin-ajax.php');?>',
                formpayurl: '<?php echo site_url('tp-apple-pay-init?processpay=1');?>',
            };
        </script>
        <script src="<?php echo TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASEURL . 'assets/js/tp-gateway-loader.js?v=1.0.0.89';?>"></script>
    </head>
    <body id="frameBody">
        <div id="cnpf" class="frameContainer"></div>
        <div id="mcif" class="frameContainer">
            <h3 class="waiting-text">Loading</h3>
            <div class="tp-applepay-init-loader">
                <div class="dot-bricks"></div>
            </div>        
        </div>
        <script>
        postMessageToParent({funcs:[{"name":"iframeURLLoaded","args":[]}]});
        
        //!!iFrame communication functions!!
        function postMessageToParent(obj){
            if(typeof window.CustomEvent === "function") {
                var event = new CustomEvent('parentApplePayLogV52', {detail:obj});
            } else {
                var event = document.createEvent('Event');
                event.initEvent('parentApplePayLogV52', true, true);
                event.detail = obj;
            }
            window.parent.document.dispatchEvent(event);
        }
        </script>
    </body>
</html>
