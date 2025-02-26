<style>
    #wls-notice-support-view{
        margin-top: 10px;
        padding: 10px 10px 10px 10px;
        border-color: rgba(0, 0, 0, 0.22);
        border-width: 1px;
        border-style: solid;
        border-radius: 2px;
        margin-left: 10px;
    }
    .wls-support-click-common {
        display: inline;
        position: relative;
    }





</style>
<script>
    jQuery(document).ready(function(){
        jQuery( '#wls-notice-support-close' ).click( function (event) {
            jQuery("#wls-notice-support-view").hide();

            var data = {
                action:'wls_set_support_time'
            };

            jQuery.post(ajax_object.ajax_url, data, function(respond) {

            });
            return false;
        } );

        jQuery( '#wls-notice-support-click' ).click( function (event) {

                if(document.getElementById('wls_author_linking'))        document.getElementById('wls_author_linking').checked = true;

                var data = {
                    action:'wls_set_support_link'
                };

                jQuery.post(ajax_object.ajax_url, data, function(respond) {
                    jQuery("#wls_support_title_1").hide();
                    jQuery("#wls_support_title_2").show();
                    jQuery("#wls_support_title_3").hide();
                });

        } );

    });

</script>

<div class="updated" id="wls-notice-save-view" style="display: none; margin-left: 10px;">
<p>Save Settings Successfully.</p>
</div>
<?php echo WLS_Main::$settings['wsw_initial_dt'];?>
<div class="updated" id="wls-notice-support-view" style="<?php
if(WLS_Main::$settings['wls_author_linking'] == '0'){

    if((time() - WLS_Main::$settings['wls_initial_dt']) <= 24*60*60 ){

            echo 'display:none;';

    }

    else{

        echo 'display: block;';

    }

}

else {

    echo 'display: none;';

}


?>">

    <div class="wls-support-click-title wls-support-click-common" id="wls_support_title_1">Thank you for using
        <a href="<?php  $url = admin_url();
        echo $url . 'options-general.php?page=live-scores-plugin-menu';?>">Live Scores</a>,  if you enjoy our plugin 
        <a href="#" id="wls-notice-support-click"> please activate the author link credit by clicking here.</a>

    </div>
    <div class="wls-support-click-title wls-support-click-common" id="wls_support_title_2" style="display: none;">Thank you for supporting our plugin.</div>
    <div style="float: right;" id="wls_support_title_3">
        <small><a href="#" id="wls-notice-support-close"> Hide this Message</a> </small>
    </div>

</div>