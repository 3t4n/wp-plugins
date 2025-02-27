<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <script src='<?php echo site_url('/wp-includes/js/jquery/jquery.min.js?ver=3.6.1');?>' id='jquery-core-js'></script>
    <script src='<?php echo site_url('/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2');?>' id='jquery-migrate-js'></script>
    <title>Transaction confirmation</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASEURL . 'assets/css/apple-init.css';?>" />
</head>
<body>
<h3 class="waiting-text">Please wait while payment is processing.<br />Do not refresh or close the page.</h3>
<div class="tp-applepay-init-loader"><div class="dot-bricks"></div></div>        
<script>
jQuery(document).ready(function($){
    var resourcePathVal    = "<?php echo $_GET['resourcePath']; ?>";
    var order_id_val       = "<?php echo intval($_GET['order_id']); ?>";
    var generalAlertMsg    = 'Error #if100: Uncertain Response. Please report this to the merchant before reattempting payment. They will need to verify if this transaction is successful.';
    Promise.resolve(
        $.ajax({
            type: 'POST',
            url: "<?php echo admin_url('admin-ajax.php');?>",
            data: { action: 'tpapplepay_check_transaction_status', resourcePath: resourcePathVal, order_id: order_id_val},
            success: function(response) {
                if(response.hasOwnProperty("data")){
                    if( response.data.hasOwnProperty("valid") && response.data.valid === true ){
                        postMessageToParent({funcs:[{"name":"checkout_success","args":[response.data.redirect]}]});
                    } else {
                        postMessageToParent({funcs:[{"name":"reload_checkout","args":[generalAlertMsg, order_id_val]}]});
                    }
                } else {
                    alert( "Error(#2):" + generalAlertMsg + "\n" + 'resource:' + resourcePathVal );
                    postMessageToParent({funcs:[{"name":"reload_checkout","args":[generalAlertMsg, order_id_val]}]});
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert( "Error(#3):" + generalAlertMsg + "\n" + 'Message::' + textStatus + '->' + errorThrown + "\n" + 'resource:' + resourcePathVal );
                postMessageToParent({funcs:[{"name":"reload_checkout","args":[generalAlertMsg, order_id_val]}]});
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            },
        })
    ).then(function(){
    }).catch(function(e) {
        alert( "Error(#3):" + generalAlertMsg + "\n" + 'resource:' + resourcePathVal );
        console.log(e); 
    });
});
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
