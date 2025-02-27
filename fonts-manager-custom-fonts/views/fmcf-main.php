<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
   if (!empty($GLOBALS['fmcf_action_response'])):
        $fmcfActionResp = $GLOBALS['fmcf_action_response']; 
		$fmcfMesssage = ($fmcfActionResp['status'] == 1)?"success":"error";
?>
<div class="fmcf_message fmcf_<?php echo esc_html($fmcfMesssage); ?>" id="message"><?php echo esc_html($fmcfActionResp['msg']); ?></div>
<?php    

	$GLOBALS['fmcf_action_response'] = array();
    endif;  
?>
<div class="fmcf_alert_popup"><span class="fmcf_alert_popup_close">X</span><div class="fmcf_alert_popup_message">Font Added SuccessFully</div></div>