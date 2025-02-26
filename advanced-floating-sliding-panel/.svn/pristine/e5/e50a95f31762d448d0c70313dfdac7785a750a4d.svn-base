<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-fafcing aspects of the plugin.
 *
 * @link       http://www.codetides.com/
 * @since      1.0.0
 *
 * @pafckage    Advanced_Floating_Sliding_Panel
 * @subpafckage Advanced_Floating_Sliding_Panel/admin/views
 */
?>
<div class="afsp-panel"> 
	
	<?php for($number=1; $number<=3; $number++) {
	?>	
		
		<div class="panel-bg-border">
	
		<div class="afsp-panel-close"><a href="javascript:void(0);" class="hide-tab"><?php esc_html_e('Close','advanced-floating-sliding-panel')?></a></div>
		
		<div class="afsp-panel-div tabs one-third">
		   <label><?php esc_html_e('Title','advanced-floating-sliding-panel')?></label>
		   <input type="text" name="ct_afsp_tab_label_<?php echo esc_attr($number);?>" id="ct_afsp_tab_label_<?php echo $number;?>" placeholder="<?php esc_html_e('Enter Text for Tab','advanced-floating-sliding-panel')?>" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_label_'.$number,""));?>" class="" style="width:90%;">        
		</div>
		<div class="afsp-panel-div tabs one-third">
		   <label><?php esc_html_e('Icon','advanced-floating-sliding-panel')?></label>
		   <input type="text" name="ct_afsp_tab_icon_<?php echo esc_attr($number);?>" id="ct_afsp_tab_icon_<?php echo $number;?>" class="iconpicker" placeholder="<?php esc_html_e('Select Icon','advanced-floating-sliding-panel')?>" value="<?php echo esc_attr(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_icon_'.$number,""));?>" class="" style="width:90%;">        
		</div>
		<div class="afsp-panel-div tabs one-third">
		   <label><?php esc_html_e('Icon Alignment','advanced-floating-sliding-panel')?></label>
		   <select style="width: 98%;" name="ct_afsp_tab_alignment_<?php echo esc_attr($number);?>" id="ct_afsp_tab_alignment_<?php echo $number;?>" class="chosen">
					<?php
						$options = array('left'=>'Left to Title','right'=>'Right to Title');
						foreach($options as $key => $value) { 
						?>
						<option value="<?php echo esc_attr($key);?>" <?php if ($key==afsp_get_text_value(get_the_ID(),'ct_afsp_tab_alignment_'.$number,'left')) {?> selected="selected" <?php } ?>><?php echo esc_attr($value);?></option>
					<?php } ?>
			</select>
		</div>
		
		<div class="afsp-panel-div tabs">
		   <label><?php esc_html_e('Description','advanced-floating-sliding-panel')?></label>
		   <?php wp_editor(afsp_get_text_value(get_the_ID(),'ct_afsp_tab_content_'.$number,"") , 'ct_afsp_tab_content_'.$number ); ?> 
		   
		</div>
	
	</div>
		
	<?php	
	}
	?>	
	
</div>
<div id="advanced-floating-content-meta-box-nonce" class="hidden">
  <?php wp_nonce_field( 'advanced_floating_sliding_panel_save', 'advanced_floating_sliding_panel_nonce' ); ?>
</div>