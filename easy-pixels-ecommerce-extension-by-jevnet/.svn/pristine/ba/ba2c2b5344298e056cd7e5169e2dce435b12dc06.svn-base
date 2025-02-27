<?php

function jn_easypixels_admintabs_WC()
{
}


function jn_easypixels_createWCMenuOption()
{
	if(!class_exists( 'jn_Analytics' ) )
	{
	    add_menu_page('Easy Pixel Settings','Easy Pixels','administrator','easypixels','jn_easypixels_initWCTrackingOptions');
	}
     add_submenu_page('easypixels', 'Contact form tracking', 'WooCommerce tracking', 'administrator', 'WCeasytracking', 'jn_easypixels_initWCTrackingOptions' );
}


function jn_easypixels_initWCTrackingOptions()
{
     if (!class_exists( 'jn_Analytics' ) ){require(JN_EasyPixelsWC_PATH . '/admin/page-basicNotInstalled.php');}
     else{require(JN_EasyPixelsWC_PATH . '/admin/page-easyPixelsWCAdmin.php');}
}


function jn_easypixels_saveEPWCSettings()
{
     if ( false == get_option( 'jnEasyPixelsSettings-group' ) ) {add_option( 'jnEasyPixelsSettings-group' );}
     if( class_exists( 'jn_easypixels' ) )
     {
          $easypixels=new jn_easypixels();
          $easypixels->save();
     }
}

add_action('easyPixelsWC',function() use ($easyPixels){jn_easypixelsWC_TrackingAdminSettings($easyPixels);});

//add_action('easyPixelsWC','jn_easypixelsWC_TrackingAdminSettings');

function jn_easypixelsWC_TrackingAdminSettings($easyPixels)
{
     if ( class_exists( 'WooCommerce' ) )
     {
          $easyPixels=new jn_easypixels();
          $jn_gads_enabled=(($easyPixels->trackingOptions->gads->is_enabled())&&($easyPixels->trackingOptions->gads->getCode()!=''));
          $jn_FB_enabled=(($easyPixels->trackingOptions->facebook->is_enabled())&&($easyPixels->trackingOptions->facebook->getCode()!=''));
          $jn_GTM_enabled=(($easyPixels->trackingOptions->gtm->is_enabled())&&($easyPixels->trackingOptions->gtm->getCode()!=''));
          $jn_GA_enabled=(($easyPixels->trackingOptions->analytics->is_enabled())&&($easyPixels->trackingOptions->analytics->getCode()!=''));
          $jn_easyBingAdsWC=(($easyPixels->trackingOptions->bing->is_enabled())&&($easyPixels->trackingOptions->bing->getCode()!=''));
     ?>
     <p><?php echo __('This plugin tracks Woocommerce users in Google Analytics, Google Ads, Facebook and Microsoft Advertising platforms. If you have the Easy Pixels options configured in the Basic Tracking Tab, the only thing you need to configure is the Google Ads conversion label if it\'s required. Nothing else!','easy-pixels-ecommerce-extension-by-jevnet'); ?></p>
     <input type="hidden" name="epWCform" value="">
     <table class="form-table">
          <tr>
               <th><?php echo __('Analytics tracking','easy-pixels-ecommerce-extension-by-jevnet'); ?></th><td><?php echo (($jn_GA_enabled)?'<span style="color:#0A0">'.__('Enabled','easy-pixels-ecommerce-extension-by-jevnet').'</span>':'<span style="color:#A00">'.__('Disabled','easy-pixels-ecommerce-extension-by-jevnet').'</span>');?></td>
          </tr>
          <tr>
               <th><?php echo __('Google Tag Manager tracking','easy-pixels-ecommerce-extension-by-jevnet'); ?></th><td><?php echo (($jn_GTM_enabled)?'<span style="color:#0A0">'.__('Enabled','easy-pixels-ecommerce-extension-by-jevnet').'</span>':'<span style="color:#A00">'.__('Disabled','easy-pixels-ecommerce-extension-by-jevnet').'</span>');?></td>
          </tr>
          <tr>
               <th><?php echo __('Facebook tracking','easy-pixels-ecommerce-extension-by-jevnet'); ?></th><td><?php echo (($jn_FB_enabled)?'<span style="color:#0A0">'.__('Enabled','easy-pixels-ecommerce-extension-by-jevnet').'</span>':'<span style="color:#A00">'.__('Disabled','easy-pixels-ecommerce-extension-by-jevnet').'</span>');?></td>
          </tr>
          <tr>
               <th><?php echo __('Google Ads tracking','easy-pixels-ecommerce-extension-by-jevnet'); ?></th><td><?php echo (($jn_gads_enabled)?'<span style="color:#0A0">'.__('Enabled','easy-pixels-ecommerce-extension-by-jevnet').'</span>':'<span style="color:#A00">'.__('Disabled','easy-pixels-ecommerce-extension-by-jevnet').'</span>');?></td>
          </tr>
          <tr>
               <th><?php echo __('Microsoft Advertising tracking','easy-pixels-ecommerce-extension-by-jevnet'); ?></th><td><?php echo (($jn_easyBingAdsWC)?'<span style="color:#0A0">'.__('Enabled','easy-pixels-ecommerce-extension-by-jevnet').'</span>':'<span style="color:#A00">'.__('Disabled','easy-pixels-ecommerce-extension-by-jevnet').'</span>');?></td>
          </tr>
          <tr>
               <th><label for="jn_GADW_WCLabel"><?php echo __('Google Ads conversion label','easy-pixels-ecommerce-extension-by-jevnet'); ?></label></th><td><?php echo $easyPixels->trackingOptions->gads->getCode(); ?> / <input value="<?php echo $easyPixels->trackingOptions->gads->getLabel(); ?>" type="text" id="jn_GADW_WCLabel" name="jn_GADW_WCLabel"></td>
          </tr>
     </table>
<?php }
else{echo '<p>'.__('Woocommerce is not installed. This extension has no sense but you can keep it if you love it.','easy-pixels-ecommerce-extension-by-jevnet').'</p>';}
}


?>