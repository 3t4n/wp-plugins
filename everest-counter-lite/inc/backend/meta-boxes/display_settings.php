<?php defined('ABSPATH') or die("No script kiddies please!");

global $ec_variables;
global $post;
$post_id = $post->ID;

$ec_counter_data = get_post_meta($post_id, 'ec_counter_data', true);
$display_settings = isset($ec_counter_data['ec_display_settings']) ? $ec_counter_data['ec_display_settings'] : array();
?>

<div class="ec-display-settings-wrap clearfix">
	<div class="ec-tabs-header">
		<ul class='ec-tabs-wrap'>
			<li class="ec-tab ec-template-selection ec-active" id='ec-tab-template-selection'><?php _e( 'Template Selection', 'everest-counter-lite' ); ?></li>
			<li class="ec-tab" id='ec-tab-column-settings'><?php _e('Column Settings', 'everest-counter-lite'); ?></li>
			<li class="ec-tab" id='ec-tab-background-settings'><?php _e('Background Settings', 'everest-counter-lite'); ?></li>
		</ul>
	</div>
	<div class="ec-tabs-content-wrap">
		<div class='ec-tab-content ec-tab-template-selection ec-tab-content-active' style=''>
			<div class="ec-tab-content-header">
				<div class='ec-tab-content-header-title'><?php _e('Template Settings' , 'everest-counter-lite'); ?></div>
			</div>
			<div class='ec-tab-content-body'>
				<div class="ec-template-selection-options-wrap">
					<label for='ec-template-selection'><?php _e('Template Selection', 'everest-counter-lite'); ?></label>
					<div class="ec-template-select-wrap">
						<select id='ec-template-selection' name='ec_display_settings[template-selection]' class="appts-img-selector">
						<?php
						$img_url = E_COUNTER_IMAGE_DIR . "/templates/template1.jpg";
						foreach ($ec_variables['templates'] as $key => $value) { ?>
							<option value="<?php echo esc_attr($value['value']); ?>" <?php if(isset($display_settings['template-selection']) && $display_settings['template-selection'] == $value['value'] ){ ?> selected <?php $img_url = $value['img']; } ?> data-img="<?php echo esc_url($value['img']); ?>"><?php echo esc_attr($value['name']); ?></option>
						<?php
						}
						?>
						</select>
					</div>
					<div class="appts-img-selector-media">
						<img src="<?php echo esc_url($img_url); ?>" alt='template image' />
					</div>
				</div>
			</div>
		</div>
		<div class="ec-tab-content ec-tab-column-settings" style="display: none;">
			<div class="ec-tab-content-header">
				<div class='ec-tab-content-header-title'><?php _e('Column Settings' , 'everest-counter-lite'); ?></div>
			</div>
			<div class='ec-tab-content-body'>
				<div class="ec-template-selection-options-wrap">
					<label for='ec-desktop'><?php _e('Desktop', 'everest-counter-lite'); ?></label>
					<div class="ec-template-input-wrap clearfix">
						<div class="slider-range-max"></div>
						<input type='int' id="ec-desktop" readonly name='ec_display_settings[columns][desktop]' key='any' class='ec-input-field' data-min='1' data-max='6' value='<?php if(isset($display_settings['columns']['desktop']) && $display_settings['columns']['desktop'] != '' ){ echo esc_attr($display_settings['columns']['desktop']); }else{ echo "3"; } ?>' />
					</div>
				</div>
				<div class="ec-template-selection-options-wrap">
					<label for='ec-tablet'><?php _e('Tablet', 'everest-counter-lite'); ?></label>
					<div class="ec-template-input-wrap clearfix">
						<div class="slider-range-max"></div>
						<input type='int' id="ec-tablet" readonly name='ec_display_settings[columns][tablet]' key='any' class='ec-input-field' data-min='1' data-max='4' value='<?php if(isset($display_settings['columns']['tablet']) && $display_settings['columns']['tablet'] != '' ){ echo esc_attr($display_settings['columns']['tablet']); }else{ echo "3"; } ?>' />
					</div>
				</div>
				<div class="ec-template-selection-options-wrap">
					<label for="ec-mobile"><?php _e('Mobile', 'everest-counter-lite'); ?></label>
					<div class="ec-template-input-wrap clearfix">
						<div class="slider-range-max"></div>
						<input type='int' id="ec-mobile" readonly name='ec_display_settings[columns][mobile]' key='any' class='ec-input-field' data-min='1' data-max='2' value='<?php if(isset($display_settings['columns']['mobile']) && $display_settings['columns']['mobile'] != '' ){ echo esc_attr($display_settings['columns']['mobile']); }else{ echo "2"; } ?>' />
					</div>
				</div>
			</div>
		</div>
		<div class="ec-tab-content ec-tab-background-settings" style="display: none;">
			<div class="ec-tab-content-header">
				<div class='ec-tab-content-header-title'><?php _e('Background settings' , 'everest-counter-lite'); ?></div>
			</div>
			<div class='ec-tab-content-body'>
				<div class="ec-options-wrap">
					<label for="ec-background-option"><?php _e('Background selection', 'everest-counter-lite'); ?></label>
					<div class="ec-background-select-wrap">
						<select id='ec-background-option' name='ec_display_settings[background][option]' class="ec-select-options ec-background-selector">
							<option value='' ><?php _e( 'None', 'everest-counter-lite' ); ?></option>
							<option value='image' <?php if(isset($display_settings['background']['option']) && $display_settings['background']['option'] == 'image' ){ ?> selected  <?php } ?> > <?php _e( 'Image', 'everest-counter-lite'); ?></option>
							<option value='background-color' <?php if(isset($display_settings['background']['option']) && $display_settings['background']['option'] == 'background-color' ){ ?> selected  <?php } ?>><?php _e( 'Background Color', 'everest-counter-lite'); ?></option>
						</select>
					</div>
					<div class="ec-background-select-content">
						<div class="ec-background-image-content-wrap ec-image ec-common-content-wrap" style="display: <?php if(isset($display_settings['background']['option']) && $display_settings['background']['option'] =='image' ){ ?> block; <?php }else{ ?> none; <?php } ?>">
							<div class="ec-input-field-wrap">
								<label for="ec-background-image-url"><?php _e( 'Image Upload: ', 'everest-counter-lite' ); ?></label>
								<div class="ec-item-input-field-wrap">
									<input type="text" id='ec-background-image-url' name='ec_display_settings[background][image][url]' class='ec-image-upload-url' value='<?php if(isset($display_settings['background']['image']['url']) && $display_settings['background']['image']['url'] != '' ){ echo esc_attr($display_settings['background']['image']['url']); } ?>' />
									<input type="button" class='ec-button ec-image-upload-button' value='<?php _e('Upload Image', 'everest-counter-lite'); ?>' />
								</div>
								<div class='ec-image-preview'>
									<img src='<?php if(isset($display_settings['background']['image']['url']) && $display_settings['background']['image']['url'] != '' ){ echo esc_attr($display_settings['background']['image']['url']); } ?>' alt='Preview Image' />
								</div>
							</div>
						</div>
						<div class="ec-background-color-content ec-background-color ec-common-content-wrap" style="display: <?php if(isset($display_settings['background']['option']) && $display_settings['background']['option'] =='background-color' ){ ?> block; <?php }else{ ?> none; <?php } ?>">
							<div class="ec-background-color-content-wrap ec-options-wrap">
								<div class="ec-input-field-wrap">
									<label for="ec-background-background-color">
										<?php _e('Background Color', 'everest-counter-lite' ); ?>
									</label>
									<input id='ec-background-background-color' type="text" name='ec_display_settings[background][background-color][color]' class='ec-color-picker' data-alpha="true" value='<?php if(isset($display_settings['background']['background-color']['color']) && $display_settings['background']['background-color']['color'] != '' ){ echo esc_attr($display_settings['background']['background-color']['color']); } ?>' />
								</div>
							</div>
						</div>
						<div class="ec-parallax-options-content-wrap ec-options-wrap ec-common-content-wrap ec-common-content-wrap-all" style="<?php if( isset($display_settings['background']['option']) && ($display_settings['background']['option'] =='image' ) ){ ?> display:block; <?php }else{ ?> display: none; <?php } ?>">
							<div class="ec-checkbox-outer-wrap">
								<div class="ec-input-field-wrap">
									<label for="ec-background-video-overlay-enable"><?php _e( 'Enable Overlay?', 'everest-counter-lite' ); ?></label>
									<input type="checkbox" id='ec-background-video-overlay-enable' name='ec_display_settings[background][overlay][enable]' class='ec-image-overlay-enable-option' <?php if(isset($display_settings['background']['overlay']['enable'])){ ?> checked <?php } ?> />
									<label for='ec-background-video-overlay-enable'></label>
								</div>
								<div class="ec-input-field-wrap ec-checkbox-checked-options ec-image-overlay-color" style="display: <?php if(isset($display_settings['background']['overlay']['enable'])){ ?> block; <?php }else{ ?> none; <?php } ?>">
									<label for="ec-background-video-overlay-color"><?php _e( 'Overlay Color', 'everest-counter-lite' ); ?></label>
									<input type="text" id='ec-background-video-overlay-color' class='ec-color-picker' name='ec_display_settings[background][overlay][color]' data-alpha="true" value='<?php if(isset($display_settings['background']['overlay']['color']) && $display_settings['background']['overlay']['color'] != '' ){ echo esc_attr($display_settings['background']['overlay']['color']); } ?>' />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>