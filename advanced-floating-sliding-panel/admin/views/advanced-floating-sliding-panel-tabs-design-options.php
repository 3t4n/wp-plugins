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
        <label for="margin"><?php esc_html_e('Width','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_tab_width" id="ct_afsp_tab_width" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_width',0));?>" class="" style="width:34%;">
                <label>/<?php esc_html_e('px','advanced-floating-sliding-panel')?></label>
            </span>           
        </div>            
    </div>
	<div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('height','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_tab_height" id="ct_afsp_tab_height" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_height',0));?>" class="" style="width:34%;">
                <label>/<?php esc_html_e('px','advanced-floating-sliding-panel')?></label>
            </span>           
        </div>            
    </div>
	<div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('Padding','advanced-floating-sliding-panel')?></label>
         <div class="control-input">
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_tab_padding_top" id="ct_afsp_tab_padding_top" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_padding_top',0));?>" class="" style="width:34%;">
            </span>
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_tab_padding_right" id="ct_afsp_tab_padding_right" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_padding_right',0));?>" class="" style="width:34%;">
            </span>
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_tab_padding_bottom" id="ct_afsp_tab_padding_bottom" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_padding_bottom',0));?>" class="" style="width:34%;">
            </span>
            <span>    
                <input type="number" class="numbersonly" name="ct_afsp_tab_padding_left" id="ct_afsp_tab_padding_left" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_padding_left',0));?>" class="" style="width:34%;">
            </span>
        </div>          
    </div>
	<div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('Border','advanced-floating-sliding-panel')?></label>
         <div class="control-input">
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_tab_border_top" id="ct_afsp_tab_border_top" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_border_top',0));?>" class="" style="width:34%;">
            </span>
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_tab_border_right" id="ct_afsp_tab_border_right" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_border_right',0));?>" class="" style="width:34%;">
            </span>
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_tab_border_bottom" id="ct_afsp_tab_border_bottom" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_border_bottom',0));?>" class="" style="width:34%;">
            </span>
            <span>    
                <input type="number" class="numbersonly" name="ct_afsp_tab_border_left" id="ct_afsp_tab_border_left" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_border_left',0));?>" class="" style="width:34%;">
            </span>
        </div>          
    </div>
	<div class="afsp-panel-div">
        <label for="border_properties"><?php esc_html_e('Border Properties','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <select style="width:30%;" name="ct_afsp_tab_border_type" id="ct_afsp_tab_border_type">
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
                <option value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_tab_border_type','solid')) {?> selected="selected" <?php } ?>><?php echo $value;?></option>
                <?php } ?>
            </select>
            
            <input type="text" name="ct_afsp_tab_border_color" id="ct_afsp_tab_border_color" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_border_color','#FFFFFF'));?>" class="color-picker-afsp">
            
            <select style="width:30%;" name="ct_afsp_tab_border_radius" id="ct_afsp_tab_border_radius">
                <?php
                $options = array(
                    '0'=>'Straight Cornor',
                    '1'=>'Round Cornor'
                );
                foreach($options as $key => $value) { 
                ?>
                <option value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_tab_border_radius','0')) {?> selected="selected" <?php } ?>><?php echo $value;?></option>
                <?php } ?>
            </select>
            
        </div>            
    </div>  
	<div class="afsp-panel-div" id="tab_border_radious_area" style=" <?php if(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_border_radius','0')==1) {echo "display:block;";} ?>">
        <label for="border_properties"><?php esc_html_e('&nbsp;','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_tab_border_radious_topleft" id="ct_afsp_tab_border_radious_topleft" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_border_radious_topleft',0));?>" class="" style="width:34%;">
            </span>
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_tab_border_radious_topright" id="ct_afsp_tab_border_radious_topright" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_border_radious_topright',0));?>" class="" style="width:34%;">
            </span>
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_tab_border_radious_bottomleft" id="ct_afsp_tab_border_radious_bottomleft" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_border_radious_bottomleft',0));?>" class="" style="width:34%;">
            </span>
            <span>    
                <input type="number" class="numbersonly" name="ct_afsp_tab_border_radious_bottomright" id="ct_afsp_tab_border_radious_bottomright" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_border_radious_bottomright',0));?>" class="" style="width:34%;">
            </span>
        </div>           
    </div>
	
	
	<div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('Text Alignment','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
			<select style="width:34%;" name="ct_afsp_tab_text_alignment" id="ct_afsp_tab_text_alignment">
                <?php
                $options = array(
                    'left'=>'Left',
                    'right'=>'Right',
					'center'=>'Center',
                );
                foreach($options as $key => $value) { 
                ?>
                <option value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_tab_text_alignment',0)) {?> selected="selected" <?php } ?>><?php echo $value;?></option>
                <?php } ?>
            </select>
        </div>            
    </div>
	<div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('Tab Placement','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
			<select style="width:60%;" name="ct_afsp_tab_placement" id="ct_afsp_tab_placement">
                <?php
                $options = array(
                    '0'=>'Top With Content (for left or right sliding pannel)',
                    '1'=>'Premium Feature - Bottom With Content (for left or right sliding pannel)',
					'2'=>'Premium Feature - Left With Content (for top or bottom sliding pannel)',
					'3'=>'Premium Feature - Right With Content (for top or bottom sliding pannel)',
					
                );
                foreach($options as $key => $value) { 
                ?>
                <option <?php if($key!==0){ ?>disabled<?php } ?> value="<?php echo $key;?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_tab_placement',"")) {?> selected="selected" <?php } ?>><?php echo $value;?></option>
                <?php } ?>
            </select>
        </div>            
    </div>
	<div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('First Tab Margin','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_tab_first_margin" id="ct_afsp_tab_first_margin" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_first_margin','0'));?>" placeholder="Font Size" style="width:34%;" /> 
				<label>/<?php esc_html_e('px','advanced-floating-sliding-panel')?></label>
            </span>           
        </div>             
    </div>
	<div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('Background Color','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <span>
                <input type="text" name="ct_afsp_tab_bg_color" id="ct_afsp_tab_bg_color" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_bg_color','#EA2100'));?>" class="color-picker-afsp" />
                
            </span>           
        </div>            
    </div>
	<div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('Background Hover Color','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <span>
                <input type="text" name="ct_afsp_tab_bg_hover_color" id="ct_afsp_tab_bg_hover_color" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_bg_hover_color','#EA2100'));?>" class="color-picker-afsp" />
                
            </span>           
        </div>            
    </div>
	<div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('Text Color','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <span>
                <input type="text" name="ct_afsp_tab_text_color" id="ct_afsp_tab_text_color" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_text_color','#ffffff'));?>" class="color-picker-afsp" />
               
            </span>           
        </div>            
    </div>
	<div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('Text Hover Color','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <span>
                <input type="text" name="ct_afsp_tab_text_hover_color" id="ct_afsp_tab_text_hover_color" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_text_hover_color','#ffffff'));?>" class="color-picker-afsp" />
                
            </span>           
        </div>            
    </div>
	
	<div class="afsp-panel-div">
        <label for="margin"><?php esc_html_e('Font Size','advanced-floating-sliding-panel')?></label>
        <div class="control-input">
            <span>
                <input type="number" class="numbersonly" name="ct_afsp_tab_font_size" id="ct_afsp_tab_font_size" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_font_size','12'));?>" placeholder="Font Size" style="width:34%;" /> 
				<label>/<?php esc_html_e('px','advanced-floating-sliding-panel')?></label>
            </span>           
        </div>            
    </div>
</div>