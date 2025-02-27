<?php defined( 'ABSPATH' ) or die( __('No script kiddies please!', 'woo-cde') );
	if ( !current_user_can( 'administrator' ) ) {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'woo-cde' ) );
	}

	global $wcde_url, $wcde_data, $wcde_pro, $wcde_premium_copy, $wcde_bulk_instantiated, $wcde_activated;
	
	$wcde_cust = get_option( 'wcde_cuztomization', array() );
	//wcde_pree($wcde_active_plugins);
	//wcde_pree($wcde_activated);
	//wcde_pree($wcde_settings);
	//pree($wcde_settings['wcde_ie']);
	$order  = new WC_Order();
	$customer_detail = $order->get_address();
?>


<div class="wrap wcde_settings_div">

        



        <div class="icon32" id="icon-options-general"><br></div><h2><?php echo $wcde_data['Name']; ?> <?php echo '('.$wcde_data['Version'].($wcde_pro?') Pro':')'); ?> - <?php _e("Settings","woo-cde"); ?> <?php if(!$wcde_pro){ ?><a class="gopro" target="_blank" href="<?php echo $wcde_premium_copy; ?>"><?php _e("Go Premium","woo-cde"); ?></a><?php } ?></h2> 
    
         
           
        <h2 class="nav-tab-wrapper">
            <a class="nav-tab nav-tab-active"><?php _e("Settings","woo-cde"); ?></a>
            
           
        </h2>      



<?php if(!$wcde_activated): ?>
<div class="wcde_notes">
<h2><?php _e("You need WooCommerce plugin to be installed and activated.","woo-cde"); ?> <?php _e("Please","woo-cde"); ?> <a href="plugin-install.php?s=woocommerce&tab=search&type=term" target="_blank"><?php _e("Install","woo-cde"); ?></a> <?php _e("and","woo-cde"); ?>/<?php _e("or","woo-cde"); ?> <a href="plugins.php?plugin_status=inactive" target="_blank"><?php _e("Activate","woo-cde"); ?></a> WooCommerce <?php _e("plugin to proceed","woo-cde"); ?>.</h2>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
</div>
<?php exit; endif; ?>



<form class="nav-tab-content" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
<input type="hidden" name="wcde_tn" value="<?php echo esc_attr($_GET['t']); ?>" />
<?php wp_nonce_field( 'wcde_settings_action', 'wcde_settings_field' ); ?>


<div class="container-mx export-customer-container">

    <div class="row mt-3">
        <div class="h4 col-md-12"><?php _e('Export customer data', 'woo-cde'); ?>:</div>
       
        <?php wp_nonce_field( 'export_customer_action', 'export_customer_field' ); ?>
        

            <?php

                if(!empty($customer_detail)){
                    foreach ($customer_detail as $key => $value) {
                        # code...
                    
            ?>
            <div class="col-md-12 mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input export-field-checkbox" id="<?php echo $key; ?>" name="customer_data[<?php echo $key; ?>]">
                <label class="custom-control-label" for="<?php echo $key; ?>" ><?php echo $key; ?></label>
            </div>
            </div>
            <?php
                }
            }
            ?>
            
	        <div class="col-md-12 mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input export-field-checkbox" id="order_id" name="customer_data[order_id]">
                <label class="custom-control-label" for="order_id" >order_id</label>
            </div>
            </div>            

            <div class="col-md-12 mt-3">
                <input type="submit" class="btn btn-primary export-data-btn" value="<?php _e('Export Data', 'woo-cde'); ?>" name="export_data" disabled>                  
            </div>

    </div>
</div>


<br />
<div class="wcde_notes"></div>


<table class="wcde_general">
<tbody>


</tbody>
</table>	

<input type="hidden" name="wcde_settings[wcde_additional][]" value="0" />




</form>













</div>

<script type="text/javascript" language="javascript">
jQuery(document).ready(function($) {
	
	<?php if(isset($_POST['wcde_tn'])): ?>
	
		$('.nav-tab-wrapper .nav-tab:nth-child(<?php echo wcde_sanitize_data($_POST['wcde_tn'])+1; ?>)').click();
	
	<?php endif; ?>

	
});	
</script>

<style type="text/css">
<?php echo ((is_array($css_arr) && !empty($css_arr))?implode('', $css_arr):''); ?>
	#wpfooter{
		display:none;
	}
<?php if(!$wcde_pro): ?>

	#adminmenu li.current a.current {
		font-size: 12px !important;
		font-weight: bold !important;
		padding: 6px 0px 6px 12px !important;
	}
	#adminmenu li.current a.current,
	#adminmenu li.current a.current span:hover{
		color:#9B5C8F;
	}
	#adminmenu li.current a.current:hover,
	#adminmenu li.current a.current span{
		color:#fff;
	}	
<?php endif; ?>
	.woocommerce-message,
	.update-nag{
		display:none;
	}

</style>
