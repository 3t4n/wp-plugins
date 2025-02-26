<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-fafsping aspects of the plugin.
 *
 * @link       http://www.codetides.com/
 * @since      1.0.0
 *
 * @pafspkage    Advanced_Floating_Sliding_Panel
 * @subpafspkage Advanced_Floating_Sliding_Panel/admin/views
 */
 
?>
<div class="afsp-panel">		
	<div class="afsp-panel-div">
        <label for="width"><?php esc_html_e('Show on HomePage','advanced-floating-sliding-panel')?></label>
        <div class="control-radio">
         <?php
                $options = array(
                    '1'=>'Yes',
                    '0'=>'No'
                );
                foreach($options as $key => $value) { 
                ?>
                <label><input type="radio" name="ct_afsp_show_on_homepage" value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_show_on_homepage','1')) {?> checked="checked" <?php } ?> disabled /><?php echo $value;?></label>
                <?php } ?>
                
            <label><a href="https://1.envato.market/bg1N9" target="_blank" class="afsp_pro_feature"><?php esc_html_e('Pro Feature','advanced-floating-sliding-panel'); ?></a></label>    
        </div>        
    </div>
    <div class="afsp-panel-div">
        <label for="width"><?php esc_html_e('Show on Search Page','advanced-floating-sliding-panel')?></label>
        <div class="control-radio">
         <?php
                $options = array(
                    '1'=>'Yes',
                    '0'=>'No'
                );
                foreach($options as $key => $value) { 
                ?>
                <label><input type="radio" name="ct_afsp_show_on_search" value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_show_on_search','1')) {?> checked="checked" <?php } ?> disabled /><?php echo $value;?></label>
                <?php } ?>
            <label><a href="https://1.envato.market/bg1N9" target="_blank" class="afsp_pro_feature"><?php esc_html_e('Pro Feature','advanced-floating-sliding-panel'); ?></a></label>        
        </div>        
    </div>
    <div class="afsp-panel-div">
        <label for="width"><?php esc_html_e('Show on Archive Pages','advanced-floating-sliding-panel')?></label>
        <div class="control-radio">
         <?php
                $options = array(
                    '1'=>'Yes',
                    '0'=>'No'
                );
                foreach($options as $key => $value) { 
                ?>
                <label><input type="radio" name="ct_afsp_show_on_archive" value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_show_on_archive','1')) {?> checked="checked" <?php } ?> disabled /><?php echo $value;?></label>
                <?php } ?>
            <label><a href="https://1.envato.market/bg1N9" target="_blank" class="afsp_pro_feature"><?php esc_html_e('Pro Feature','advanced-floating-sliding-panel'); ?></a></label>        
        </div>        
    </div>
    <div class="afsp-panel-div">
        <label for="width"><?php esc_html_e('Show on Posts','advanced-floating-sliding-panel')?></label>
        <div class="control-radio">
         <?php
                $options = array(
                    '1'=>'All Posts',
                    '0'=>'Only Selected Posts'
                );
                foreach($options as $key => $value) { 
                ?>
                <label><input type="radio" name="ct_afsp_show_on_posts" value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_show_on_posts','1')) {?> checked="checked" <?php } ?> disabled /><?php echo $value;?></label>
                <?php } ?>
            <label><a href="https://1.envato.market/bg1N9" target="_blank" class="afsp_pro_feature"><?php esc_html_e('Pro Feature','advanced-floating-sliding-panel'); ?></a></label>        
        </div>
    </div>    
    <div class="afsp-panel-div">
        <label for="width"><?php esc_html_e('Show on Pages','advanced-floating-sliding-panel')?></label>
        <div class="control-radio">
         <?php
                $options = array(
                    '1'=>'All Pages',
                    '0'=>'Only Selected Pages'
                );
                foreach($options as $key => $value) { 
                ?>
                <label><input type="radio" name="ct_afsp_show_on_pages" value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_show_on_pages','1')) {?> checked="checked" <?php } ?> disabled /><?php echo $value;?></label>
                <?php } ?>
            <label><a href="https://1.envato.market/bg1N9" target="_blank" class="afsp_pro_feature"><?php esc_html_e('Pro Feature','advanced-floating-sliding-panel'); ?></a></label>        
        </div>        
    </div>   
    <div class="afsp-panel-div">
        <label for="width"><?php esc_html_e('Show on Categories','advanced-floating-sliding-panel')?></label>
        <div class="control-radio">
         <?php
                $options = array(
                    '1'=>'All Categories',
                    '0'=>'Only Selected Categories'
                );
                foreach($options as $key => $value) { 
                ?>
                <label><input type="radio" name="ct_afsp_show_on_categories" value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_show_on_categories','1')) {?> checked="checked" <?php } ?> disabled /><?php echo $value;?></label>
                <?php } ?>
            <label><a href="https://1.envato.market/bg1N9" target="_blank" class="afsp_pro_feature"><?php esc_html_e('Pro Feature','advanced-floating-sliding-panel'); ?></a></label>        
        </div>        
    </div> 
    
    <div class="afsp-panel-div">
        <label for="width"><?php esc_html_e('Show on Custom Post Types','advanced-floating-sliding-panel')?></label>
        <div class="control-radio">
         <?php
                $options = array(
                    '1'=>'All Custom Post Types',
                    '0'=>'Only Selected Custom Post Types'
                );
                foreach($options as $key => $value) { 
                ?>
                <label><input type="radio" name="ct_afsp_show_on_cpts" value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_show_on_cpts','1')) {?> checked="checked" <?php } ?> disabled /><?php echo $value;?></label>
                <?php } ?>
            <label><a href="https://1.envato.market/bg1N9" target="_blank" class="afsp_pro_feature"><?php esc_html_e('Pro Feature','advanced-floating-sliding-panel'); ?></a></label>        
        </div>        
    </div>   
   
   <div class="afsp-panel-div">
        <label for="width"><?php esc_html_e('Show on WooCommerce Pages','advanced-floating-sliding-panel')?></label>
        <div class="control-radio">
         <?php
                $options = array(
                    '1'=>'All WooCommerce Products Pages',
                    '0'=>'Only Selected WooCommerce Products'
                );
                foreach($options as $key => $value) { 
                ?>
                <label><input type="radio" name="ct_afsp_show_on_wooCommerce" value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_show_on_wooCommerce','1')) {?> checked="checked" <?php } ?> disabled /><?php echo $value;?></label>
                <?php } ?>
            <label><a href="https://1.envato.market/bg1N9" target="_blank" class="afsp_pro_feature"><?php esc_html_e('Pro Feature','advanced-floating-sliding-panel'); ?></a></label>        
        </div>        
    </div>   

	
	<div class="afsp-panel-div">
        <label for="width"><?php esc_html_e('Show on WooCommerce Categories','advanced-floating-sliding-panel')?></label>
        <div class="control-radio">
         <?php
                $options = array(
                    '1'=>'All WooCommerce Categories',
                    '0'=>'Only Selected WooCommerce Categories'
                );
                foreach($options as $key => $value) { 
                ?>
                <label><input type="radio" name="ct_afsp_show_on_wooCategories" value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_show_on_wooCategories','1')) {?> checked="checked" <?php } ?> disabled /><?php echo $value;?></label>
                <?php } ?>
            <label><a href="https://1.envato.market/bg1N9" target="_blank" class="afsp_pro_feature"><?php esc_html_e('Pro Feature','advanced-floating-sliding-panel'); ?></a></label>        
        </div>        
    </div>
    
	
	
	<div class="afsp-panel-div">
        <label for="width"><?php esc_html_e('Show on bbPress','advanced-floating-sliding-panel')?></label>
        <div class="control-radio">
         <?php
                $options = array(
                    '1'=>'All bbPress Pages',
                    '0'=>'Only Selected bbPress Pages'
                );
                foreach($options as $key => $value) { 
                ?>
                <label><input type="radio" name="ct_afsp_show_on_bbPress" value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_show_on_bbPress','1')) {?> checked="checked" <?php } ?> disabled /><?php echo $value;?></label>
                <?php } ?>      
            <label><a href="https://1.envato.market/bg1N9" target="_blank" class="afsp_pro_feature"><?php esc_html_e('Pro Feature','advanced-floating-sliding-panel'); ?></a></label>        
        </div>        
    </div>
    
	
    <div class="afsp-panel-div">
        <label for="width"><?php esc_html_e('Control Impressions','advanced-floating-sliding-panel')?></label>
        <div class="control-radio">
         <?php
                $options = array(
                    '0'=>'No Control Impressions',
                    '1'=>'Yes Control Impressions'
                );
                foreach($options as $key => $value) { 
                ?>
                <label><input type="radio" name="ct_afsp_control_impressions" value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_control_impressions','0')) {?> checked="checked" <?php } ?> disabled /><?php echo $value;?></label>
                <?php } ?>
            <label><a href="https://1.envato.market/bg1N9" target="_blank" class="afsp_pro_feature"><?php esc_html_e('Pro Feature','advanced-floating-sliding-panel'); ?></a></label>        
        </div>        
    </div>
    <div class="afsp-panel-div" id="control_impressions_limit" style=" <?php if(afsp_get_text_value(get_the_ID(),'ct_afsp_control_impressions','0')==1) {echo "display:block;";} ?>">
        <label for="width"><?php esc_html_e('&nbsp;','advanced-floating-sliding-panel')?></label>
        <input type="number" name="ct_afsp_impressions_limit" id="ct_afsp_impressions_limit" value="" class="" style="width:34%;"> <?php esc_html_e('No of Impressions to Limit','advanced-floating-sliding-panel')?>
        <label style="float: right; text-align:left;"><a href="https://1.envato.market/bg1N9" target="_blank" class="afsp_pro_feature"><?php esc_html_e('Pro Feature','advanced-floating-sliding-panel'); ?></a></label>    
    </div>
	
	
  
	<div class="afsp-panel-div">
        <label for="width"><?php esc_html_e('Control Devices Medium','advanced-floating-sliding-panel')?></label>
        <div class="control-radio">
         <?php
                $options = array(
                    '0'=>'Dont Hide on Any Device',
                    '1'=>'Hide On Web/Desktop/laptop',
					'2'=>'Hide On All Mobile Devices'
                );
                foreach($options as $key => $value) { 
                ?>
                <label><input type="radio" name="ct_afsp_control_devices_medium" value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_control_devices_medium','0')) {?> checked="checked" <?php } ?> disabled /><?php echo $value;?></label>
                <?php } ?>
            <label><a href="https://1.envato.market/bg1N9" target="_blank" class="afsp_pro_feature"><?php esc_html_e('Pro Feature','advanced-floating-sliding-panel'); ?></a></label>        
        </div>        
    </div> 
	
	<div class="afsp-panel-div">
        <label for="width"><?php esc_html_e('Control Other Devices','advanced-floating-sliding-panel')?></label>
        <div class="control-radio">
         <?php
                $options = array(
					'0'=>'Display On All Other Devices',
                    '1'=>'Hide On Windows OS',
                    '2'=>'Hide On Mac OS'
                );
                foreach($options as $key => $value) { 
                ?>
                <label><input type="radio" name="ct_afsp_control_other_devices" value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_control_other_devices','0')) {?> checked="checked" <?php } ?> disabled /><?php echo $value;?></label>
                <?php } ?>
            <label><a href="https://1.envato.market/bg1N9" target="_blank" class="afsp_pro_feature"><?php esc_html_e('Pro Feature','advanced-floating-sliding-panel'); ?></a></label>        
        </div>        
    </div> 	
    
</div>