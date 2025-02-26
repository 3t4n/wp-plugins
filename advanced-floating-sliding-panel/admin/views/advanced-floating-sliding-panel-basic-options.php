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
        <label for="bafspkground_color"><?php esc_html_e('Position','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
			<select style="width:34%;" name="ct_afsp_position" id="ct_afsp_position">
                <?php
                    $options = array(
                        'left' => 'Left',
                        '1-paid' => 'Right - Paid Feature',
                        '2-paid' => 'Top - Paid Feature',
                        '3-paid' => 'Bottom - Paid Feature'
                    );
                    foreach($options as $key => $value) { 
                    ?>
                    <option <?php if($key!=='left') { ?>disabled<?php } ?> value="<?php echo esc_attr($key);?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_position','yes')) {?> selected="selected" <?php } ?>><?php echo esc_attr($value);?></option>
                    <?php } ?>
            </select>
         </div>
    </div>
    <div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('Margin','advanced-floating-sliding-panel')?></label>
        
		<div class="control-input">
			<select style="width:34%;" name="ct_afsp_margin" id="ct_afsp_margin">
                <?php
                    $options = array(
                        'margin-top' => 'Margin Top',
                        'margin-bottom' => 'Margin Bottom - Paid Feature',
                        'margin-left' => 'Margin Left - Paid Feature',
                        'margin-right' => 'Margin Right - Paid Feature'
                        
                    );
                    foreach($options as $key => $value) { 
                    ?>
                    <option <?php if($key!=='margin-top') { ?>disabled<?php } ?> value="<?php echo esc_attr($key);?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_margin','yes')) {?> selected="selected" <?php } ?>><?php echo esc_attr($value);?></option>
                    <?php } ?>
            </select>
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_margin_value" id="ct_afsp_margin_value" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_margin_value',0));?>" class="" style="width:30%;">
                <label><?php esc_html_e('px','advanced-floating-sliding-panel')?></label>
            </span>
            
        </div>            
    </div>
    <div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('Width','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_width" id="ct_afsp_width" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_width',0));?>" class="" style="width:34%;">
                <select style="width:30%;" name="ct_afsp_width_unit" id="ct_afsp_width_unit">
                <?php
                $options = array(
                    'px'=>'Pixels',
                    '%'=>'Percentage - Paid Feature'
                );
                foreach($options as $key => $value) { 
                ?>
                <option <?php if($key!=='px') { ?>disabled<?php } ?> value="<?php echo esc_attr($key);?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_width_unit','px')) {?> selected="selected" <?php } ?>><?php echo esc_attr($value);?></option>
                <?php } ?>
            </select>
            </span>
           
        </div>            
    </div>
    <div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('Height','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_height" id="ct_afsp_height" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_height',0));?>" class="" style="width:34%;">
                <select style="width:30%;" name="ct_afsp_height_unit" id="ct_afsp_height_unit">
                <?php
                $options = array(
                    'px'=>'Pixels',
                    '%'=>'Percentage - Paid Feature'
                );
                foreach($options as $key => $value) { 
                ?>
                <option <?php if($key!=='px') { ?>disabled<?php } ?> value="<?php echo esc_attr($key);?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_height_unit','px')) {?> selected="selected" <?php } ?>><?php echo esc_attr($value);?></option>
                <?php } ?>
            </select>
            </span>
           
        </div>            
    </div>
	  <div class="afsp-panel-div">
        <label for="padding"><?php esc_html_e('Padding','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_padding_top" id="ct_afsp_padding_top" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_padding_top',0));?>" class="" style="width:34%;">
             </span>
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_padding_right" id="ct_afsp_padding_right" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_padding_right',0));?>" class="" style="width:34%;">
            </span>
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_padding_bottom" id="ct_afsp_padding_bottom" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_padding_bottom',0));?>" class="" style="width:34%;">
            </span>
            <span>    
                <input type="number" class="numbersonly" name="ct_afsp_padding_left" id="ct_afsp_padding_left" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_padding_left',0));?>" class="" style="width:34%;">
            </span>
        </div>            
    </div>
	<div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('Border','advanced-floating-sliding-panel')?></label>
         <div class="control-input">
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_border_top" id="ct_afsp_border_top" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_border_top',0));?>" class="" style="width:34%;">
            </span>
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_border_right" id="ct_afsp_border_right" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_border_right',0));?>" class="" style="width:34%;">
            </span>
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_border_bottom" id="ct_afsp_border_bottom" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_border_bottom',0));?>" class="" style="width:34%;">
            </span>
            <span>    
                <input type="number" class="numbersonly" name="ct_afsp_border_left" id="ct_afsp_border_left" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_border_left',0));?>" class="" style="width:34%;">
            </span>
        </div>          
    </div>
	<div class="afsp-panel-div">
        <label for="border_properties"><?php esc_html_e('Border Properties','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <select style="width:30%;" name="ct_afsp_border_type" id="ct_afsp_border_type">
                <?php
                $options = array(
                    'dotted'=>'dotted',
                    'solid'=>'solid',
					'double'=>'double',
					'dashed'=>'dashed',
					'groove'=>'groove',
					'ridge'=>'ridge',
					'inset'=>'inset',
					'outset'=>'outset'
					
                );
                foreach($options as $key => $value) { 
                ?>
                <option value="<?php echo esc_attr($key);?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_border_type','solid')) {?> selected="selected" <?php } ?>><?php echo esc_attr($value);?></option>
                <?php } ?>
            </select>
            
            <input type="text" name="ct_afsp_border_color" id="ct_afsp_border_color" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_border_color','#FFFFFF'));?>" class="color-picker-afsp">
            
            <select style="width:30%;" name="ct_afsp_border_radius" id="ct_afsp_border_radius">
                <?php
                $options = array(
                    '0'=>'Straight Cornor',
                    '1'=>'Round Cornor'
                );
                foreach($options as $key => $value) { 
                ?>
                <option value="<?php echo esc_attr($key);?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_border_radius','0')) {?> selected="selected" <?php } ?>><?php echo esc_attr($value);?></option>
                <?php } ?>
            </select>
            
        </div>            
    </div>
	<div class="afsp-panel-div" id="border_radious_area" style=" <?php if(afsp_get_text_value(get_the_ID(),'ct_afsp_border_radius','0')==1) {echo "display:block;";} ?>">
        <label for="border_properties"><?php esc_html_e('&nbsp;','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <input type="text" class="numbersonly" name="ct_afsp_border_radius_size" id="ct_afsp_border_radius_size" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_border_radius_size','0'));?>" /> px
        </div>            
    </div>
	<div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('Background','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <span>
                <input type="text" name="ct_afsp_bg_color" id="ct_afsp_bg_color" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_bg_color','#FF2A00'));?>" class="color-picker-afsp" />
                
            </span>
           
        </div>            
    </div>
	<div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('Text','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <span>
                <input type="text" name="ct_afsp_text_color" id="ct_afsp_text_color" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_text_color','#FFFFFF'));?>" class="color-picker-afsp" />
                
            </span>
           
        </div>            
    </div>
	<div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('Font Size','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_font_size" id="ct_afsp_font_size" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_font_size','12'));?>" placeholder="Font Size" style="width:34%;" /> 
				<label>/<?php esc_html_e('px','advanced-floating-sliding-panel')?></label>
            </span>           
        </div>            
    </div>
</div>
<div id="advanced-floating-sliding-panel-meta-box-nonce" class="hidden">
  <?php wp_nonce_field( 'advanced_floating_sliding_panel_save', 'advanced_floating_sliding_panel_nonce' ); ?>
</div>