<?php defined('ABSPATH') or die("No script kiddies please!");

global $ec_variables;
if(isset($key)){ $key = $key; }else{ $key = everestCounterClass_lite:: generateRandomIndex(); }
?>
<div class='ec-count-item-wrap'>
	<div class='ec-count-item-wrap-inner'>
		<div class="ec-count-item-header clearfix">
			<div class='ec-item-header-title'><?php _e('Item '.$counter, 'everest-counter-lite'); $counter++;?></div>
			<div class='ec-item-functions'>
				<span class='ec-item-shorting'><i class="fa fa-arrows-alt"></i></span>
				<span class='ec-item-delete' data-confirm="<?php _e('Are you sure you want to delete this item?', 'everest-counter-lite' ); ?>"><i class="fa fa-trash"></i></span>
				<span class='ec-item-hide-show'><i class="fa fa-caret-down"></i></span>
			</div>
		</div>
		<div class='ec-count-item-body clearfix' style='display:none;'>
			<div class='ec-item-imageoricon-selection ec-item-section-wrap'>
				<div class="ec-count-item-inner-header">
					<span class='ec-item-title'><?php _e('Icon Settings', 'everest-counter-lite'); ?></span>
					<span class='ec-item-section-hide-show'><i class="fa fa-caret-down"></i></span>
				</div>
				<div class="ec-count-item-inner-body">
					<div class="ec-item-font-or-image-selection">
						<div class="ec-item">
							<label for='ec-icon-selection_<?php echo esc_attr($key); ?>' class='ec-item-label'><?php _e( 'Icon selection ', 'everest-counter-lite' ); ?></label>
							<select id='ec-icon-selection_<?php echo esc_attr($key); ?>' class="ec-icon-selection" name='item[<?php echo esc_attr($key); ?>][icon-selection]'>
								<option><?php _e('None', 'everest-counter-lite' ); ?></option>
								<option value='icon' <?php if(isset($item['icon-selection']) && $item['icon-selection'] == 'icon' ){ ?> selected <?php } ?>><?php _e('Font Icon', 'everest-counter-lite'); ?></option>
							</select>
						</div>
						<div class="ec-item ec-count-item-font-icon" <?php if(isset($item['icon-selection']) && $item['icon-selection'] == 'icon' ){ ?> style="display:block;" <?php }else{ ?> style="display:none;" <?php } ?>>
							<div class='ec-item'>
								<label for="wpfm-icon-picker-icon_<?php echo esc_attr($key); ?>"><?php _e( 'Icon', 'everest-counter-lite' ); ?></label>
								<input class="ec-icon-picker" type="hidden" id="wpfm-icon-picker-icon_<?php echo esc_attr($key); ?>" name='item[<?php echo esc_attr($key); ?>][icon][name]' value='<?php if(isset($item['icon']['name']) && $item['icon']['name'] != '' ){ echo esc_attr($item['icon']['name']); } ?>' />
								<div data-target="#wpfm-icon-picker-icon_<?php echo esc_attr($key); ?>" class="ec-button icon-picker <?php if (isset($item['icon']['name']) && $item['icon']['name'] !='') { $v = explode('|', $item['icon']['name']); echo $v[0] . ' ' . $v[1]; } ?> "><?php _e( 'Select Icon', 'everest-counter-lite' ); ?></div>
							</div>
							<div class='ec-style-settings'>
								<div class='ec-style-label'><?php _e( 'Styles', 'everest-counter-lite' ); ?> </div>
								<div class="ec-item">
									<label for="ec-item-font-icon-color_<?php echo esc_attr($key); ?>"><?php _e( 'Icon Color ', 'everest-counter-lite' ); ?></label>
									<div class='ec-item-input'><input type="text" data-alpha="true" name='item[<?php echo esc_attr($key); ?>][icon][font-color]' id='ec-item-font-icon-color_<?php echo esc_attr($key); ?>' class='ec-color-picker' value='<?php if(isset($item['icon']['font-color']) && $item['icon']['font-color'] != '' ){ echo esc_attr($item['icon']['font-color']); } ?>' /></div>
								</div>
								<div class="ec-item">
									<label for="ec-item-font-icon-size_<?php echo esc_attr($key); ?>"><?php _e( 'Font Size (px)', 'everest-counter-lite' ); ?></label>
									<div class='ec-item-input'><input id='ec-item-font-icon-size_<?php echo esc_attr($key); ?>' type="number" step=0.01 name='item[<?php echo esc_attr($key); ?>][icon][font-size]' class='ec-font-size' value='<?php if(isset($item['icon']['font-size']) && $item['icon']['font-size'] !='' ){ echo esc_attr($item['icon']['font-size']); } ?>' /></div>
								</div>
							</div>
							<div class='ec-item'>
								<label for='ec-checkbox-icon-border_<?php echo esc_attr($key); ?>' ><?php _e( 'Enable icon border? ', 'everest-counter-lite' ); ?></label>
								<input type="checkbox" name='item[<?php echo esc_attr($key); ?>][icon][border][enable]' class='ec-checkbox-image-border ec-checkbox-enable-option' id='ec-checkbox-icon-border_<?php echo esc_attr($key); ?>' <?php if(isset($item['icon']['border']['enable'])){ echo "checked"; } ?> />
								<label for='ec-checkbox-icon-border_<?php echo esc_attr($key); ?>' ></label>
								<div class="ec-image-border-options ec-checkbox-enabled-option" style="display: <?php if(isset($item['icon']['border']['enable'])){ echo "block"; }else { echo "none"; } ?>">
						      		<div class='ec-item-inner'>
										<label for="ec-item-icon-width_<?php echo esc_attr($key); ?>"><?php _e( 'Container Width/Height (px)', 'everest-counter-lite' ); ?></label>
										<input id='ec-item-icon-width_<?php echo esc_attr($key); ?>' type="number" class='ec-item-half-size-field' step='0.01' name='item[<?php echo esc_attr($key); ?>][icon][width]' placeholder='<?php _e('Width', 'everest-counter-lite'); ?>' value='<?php if(isset($item['icon']['width']) && $item['icon']['width'] != '' ){ echo esc_attr($item['icon']['width']); } ?>' />
										<input type="number" class='ec-item-half-size-field' step='0.01' name='item[<?php echo esc_attr($key); ?>][icon][height]' placeholder='<?php _e('Height', 'everest-counter-lite'); ?>' value='<?php if(isset($item['icon']['height']) && $item['icon']['height'] != '' ){ echo esc_attr($item['icon']['height']); } ?>' />
									</div>
									<div class="ec-item-inner">
										<label for='ec-icon-border-width_<?php echo esc_attr($key); ?>'><?php _e('Border width (px)', 'everest-counter-lite'); ?></label>
										<input type='number' step='0.01' id='ec-icon-border-width_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][icon][border][width]' value='<?php if(isset($item['icon']['border']['width']) && $item['icon']['border']['width'] != '' ){ echo esc_attr($item['icon']['border']['width']); } ?>'/>
									</div>
						      		<div class="ec-item-inner">
						      			<label for='ec-icon-border-color_<?php echo esc_attr($key); ?>'><?php _e('Border color', 'everest-counter-lite'); ?></label>
										<input type='text' id='ec-icon-border-color_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][icon][border][color]' data-alpha="true" class='ec-color-picker' value='<?php if(isset($item['icon']['border']['color']) && $item['icon']['border']['color'] != '' ){ echo esc_attr($item['icon']['border']['color']); } ?>'/>
						      		</div>
						      		<div class="ec-item-inner">
						      			<label for='ec-icon-border-radius_<?php echo esc_attr($key); ?>'><?php _e('Border Radius', 'everest-counter-lite'); ?></label>
						      			<div class="ec-item-input-field-wrap">
											<input type='text' id='ec-icon-border-radius_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][icon][border][radius]' class='ec-text-input' value='<?php if(isset($item['icon']['border']['radius']) && $item['icon']['border']['radius'] != '' ){ echo esc_attr($item['icon']['border']['radius']); } ?>'/>
											<div class='input-info'><?php _e('Please enter the values either in % or in px.', 'everest-counter-lite'); ?> </div>
						      			</div>
						      		</div>
						      		<div class="ec-item-inner">
						      			<label for='ec-icon-border-line-height_<?php echo esc_attr($key); ?>'><?php _e('Line Height (px)', 'everest-counter-lite'); ?></label>
										<input type='number' step='0.01' id='ec-icon-border-line-height_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][icon][border][line-height]' class='ec-text-input' value='<?php if(isset($item['icon']['border']['line-height']) && $item['icon']['border']['line-height'] != '' ){ echo esc_attr($item['icon']['border']['line-height']); } ?>'/>
						      		</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class='ec-item-count-value ec-item-section-wrap'>
				<div class="ec-count-item-inner-header">
					<span class="ec-item-title"><?php _e( 'Counter Settings', 'everest-counter-lite' ); ?></span>
					<span class="ec-item-section-hide-show"><i class="fa fa-caret-down"></i></span>
				</div>
				<div class="ec-count-item-inner-body">
					<div class='ec-item'>
						<label for="ec-count-content_<?php echo esc_attr($key); ?>"><?php _e( 'Count value ', 'everest-counter-lite' ); ?></label>
						<input type="number" step='0.01' id='ec-count-content_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][count][content]' value='<?php if( isset($item['count']['content']) && $item['count']['content'] !='' ){ echo esc_attr($item['count']['content']); } ?>' />
					</div>
					<div class='ec-style-settings'>
						<div class='ec-style-label'><?php _e( 'Styles', 'everest-counter-lite' ); ?> </div>
						<div class='ec-item'>
							<label for="ec-count-font-family_<?php echo esc_attr($key); ?>"><?php _e( 'Font Family ', 'everest-counter-lite' ); ?></label>
							<select name='item[<?php echo esc_attr($key); ?>][count][font-family]' id='ec-count-font-family_<?php echo esc_attr($key); ?>'>
								<option value ><?php _e( 'Default', 'everest-counter-lite' ); ?></option>
								<?php
								foreach ( $ec_variables['google-fonts'] as $key1 => $value1 ) { ?>
								<option value='<?php echo esc_attr($key1); ?>' <?php if(isset( $item['count']['font-family'] )){ selected( $item['count']['font-family'], $key1 ); } ?> ><?php echo esc_attr($key1); ?></option>
									<?php
								}
								?>
							</select>
						</div>
						<div class='ec-item'>
							<label for="ec-count-font-size_<?php echo esc_attr($key); ?>"><?php _e( 'Font size (px) ', 'everest-counter-lite' ); ?></label>
							<input type="number" id='ec-count-font-size_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][count][font-size]' value='<?php if( isset($item['count']['font-size']) && $item['count']['font-size'] !='' ){ echo esc_attr($item['count']['font-size']); } ?>' step='0.01' />
						</div>
						<div class='ec-item'>
							<label for="ec-count-font-color_<?php echo esc_attr($key); ?>"><?php _e( 'Font color ', 'everest-counter-lite' ); ?></label>
							<input type="text" id='ec-count-font-color_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][count][font-color]' class='ec-color-picker' data-alpha="true" value='<?php if( isset($item['count']['font-color']) && $item['count']['font-color'] !='' ){ echo esc_attr($item['count']['font-color']); } ?>' />
						</div>
						<div class='ec-item'>
							<label for="ec-count-animation-enable_<?php echo esc_attr($key); ?>"><?php _e( 'Enable counter animation? ', 'everest-counter-lite' ); ?></label>
							<input type="checkbox" id='ec-count-animation-enable_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][count][animation][enable]' class='ec-counter-animation-enable ec-checkbox-enable-option' id='ec-checkbox-image-border-1' <?php if(isset($item['count']['animation']['enable'])){ echo "checked"; } ?> />
							<label for="ec-count-animation-enable_<?php echo esc_attr($key); ?>"></label>

							<div class="ec-counter-animation-options ec-checkbox-enabled-option" style="display: <?php if(isset($item['count']['animation']['enable'])){ echo "block"; }else { echo "none"; } ?>">
								<div class="ec-item-inner">
									<label for='ec-count-animation-delay_<?php echo esc_attr($key); ?>'><?php _e('Delay(milliseconds)', 'everest-counter-lite'); ?></label>
									<input type='number' step='0.01' id='ec-count-animation-delay_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][count][animation][delay]' value='<?php if(isset($item['count']['animation']['delay']) && $item['count']['animation']['delay'] != '' ){ echo esc_attr($item['count']['animation']['delay']); } ?>'/>
								</div>
					      		<div class="ec-item-inner">
					      			<label for='ec-count-animation-duration_<?php echo esc_attr($key); ?>'><?php _e('Duration(milliseconds)', 'everest-counter-lite'); ?></label>
									<input type='number' step='0.01' id='ec-count-animation-duration_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][count][animation][duration]' value='<?php if(isset($item['count']['animation']['duration']) && $item['count']['animation']['duration'] != '' ){ echo esc_attr($item['count']['animation']['duration']); } ?>'/>
					      		</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class='ec-item-block-title ec-item-section-wrap'>
				<div class="ec-count-item-inner-header">
					<span class="ec-item-title"><?php _e( 'Title Settings', 'everest-counter-lite' ); ?></span>
					<span class="ec-item-section-hide-show"><i class="fa fa-caret-down"></i></span>
				</div>
				<div class="ec-count-item-inner-body">
					<div class='ec-item'>
						<label for="ec-title-content_<?php echo esc_attr($key); ?>"><?php _e( 'Title ', 'everest-counter-lite' ); ?></label>
						<input type="text" id='ec-title-content_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][title][content]' value='<?php if( isset($item['title']['content']) && $item['title']['content'] !='' ){ echo esc_attr($item['title']['content']); } ?>' />
					</div>
					<div class='ec-style-settings'>
						<div class='ec-style-label'><?php _e( 'Styles', 'everest-counter-lite' ); ?> </div>
						<div class='ec-item'>
							<label for="ec-title-font-family_<?php echo esc_attr($key); ?>"><?php _e( 'Font Family ', 'everest-counter-lite' ); ?></label>
							<select id='ec-title-font-family_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][title][font-family]'>
								<option value ><?php _e( 'Default', 'everest-counter-lite' ); ?></option>
								<?php
								foreach ( $ec_variables['google-fonts'] as $key1 => $value1 ) { ?>
								<option value='<?php echo esc_attr($key1); ?>' <?php if(isset( $item['title']['font-family'] )){ selected( $item['title']['font-family'], $key1 ); } ?> ><?php echo esc_attr($key1); ?></option>
									<?php
								}
								?>
							</select>
						</div>
						<div class='ec-item'>
							<label for="ec-title-font-size_<?php echo esc_attr($key); ?>"><?php _e( 'Font size (px) ', 'everest-counter-lite' ); ?></label>
							<input type="number" step='0.01' id='ec-title-font-size_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][title][font-size]' value='<?php if( isset($item['title']['font-size']) && $item['title']['font-size'] !='' ){ echo esc_attr($item['title']['font-size']); } ?>' />
						</div>
						<div class='ec-item'>
							<label for="ec-title-font-color_<?php echo esc_attr($key); ?>"><?php _e( 'Font color ', 'everest-counter-lite' ); ?></label>
							<input type="text" id='ec-title-font-color_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][title][font-color]' class='ec-color-picker' data-alpha="true" value='<?php if( isset($item['title']['font-color']) && $item['title']['font-color'] !='' ){ echo esc_attr($item['title']['font-color']); } ?>' />
						</div>
					</div>
				</div>
			</div>
			<div class='ec-item-block-subtitle ec-item-section-wrap'>
				<div class="ec-count-item-inner-header">
					<span class="ec-item-title"><?php _e( 'Sub Title Settings', 'everest-counter-lite' ); ?></span>
					<span class="ec-item-section-hide-show"><i class="fa fa-caret-down"></i></span>
				</div>
				<div class="ec-count-item-inner-body">
					<div class='ec-item'>
						<label for="ec-subtitle-content_<?php echo esc_attr($key); ?>"><?php _e( 'Sub Title ', 'everest-counter-lite' ); ?></label>
						<input type="text" id='ec-subtitle-content_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][subtitle][content]' value='<?php if( isset($item['subtitle']['content']) && $item['subtitle']['content'] !='' ){ echo esc_attr($item['subtitle']['content']); } ?>' />
					</div>
					<div class='ec-style-settings'>
						<div class='ec-style-label'><?php _e( 'Styles', 'everest-counter-lite' ); ?> </div>
						<div class='ec-item'>
							<label for="ec-subtitle-font-family_<?php echo esc_attr($key); ?>"><?php _e( 'Font Family ', 'everest-counter-lite' ); ?></label>
							<select id='ec-subtitle-font-family_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][subtitle][font-family]'>
								<option value ><?php _e( 'Default', 'everest-counter-lite' ); ?></option>
								<?php
								foreach ( $ec_variables['google-fonts'] as $key1 => $value1 ) { ?>
								<option value='<?php echo esc_attr($key1); ?>' <?php if(isset( $item['subtitle']['font-family'] )){ selected( $item['subtitle']['font-family'], $key1 ); } ?> ><?php echo esc_attr($key1); ?></option>
									<?php
								}
								?>
							</select>
						</div>
						<div class='ec-item'>
							<label for="ec-subtitle-font-size_<?php echo esc_attr($key); ?>"><?php _e( 'Font size (px) ', 'everest-counter-lite' ); ?></label>
							<input type="number" step='0.01' id='ec-subtitle-font-size_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][subtitle][font-size]' value='<?php if( isset($item['subtitle']['font-size']) && $item['subtitle']['font-size'] !='' ){ echo esc_attr($item['subtitle']['font-size']); } ?>' />
						</div>
						<div class='ec-item'>
							<label for="ec-subtitle-font-color_<?php echo esc_attr($key); ?>"><?php _e( 'Font color ', 'everest-counter-lite' ); ?></label>
							<input type="text" id='ec-subtitle-font-color_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][subtitle][font-color]' class='ec-color-picker' data-alpha="true" value='<?php if( isset($item['subtitle']['font-color']) && $item['subtitle']['font-color'] !='' ){ echo esc_attr($item['subtitle']['font-color']); } ?>' />
						</div>
					</div>
				</div>
			</div>
			<div class='ec-item-button-link ec-item-section-wrap'>
				<div class="ec-count-item-inner-header">
					<span class="ec-item-title"><?php _e( 'Button Settings', 'everest-counter-lite' ); ?></span>
					<span class="ec-item-section-hide-show"><i class="fa fa-caret-down"></i></span>
				</div>
				<div class="ec-count-item-inner-body">
					<div class='ec-item'>
						<label for="ec-button-label_<?php echo esc_attr($key); ?>"><?php _e( 'Button Label ', 'everest-counter-lite' ); ?></label>
						<input type="text" id='ec-button-label_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][button][label]' value='<?php if( isset($item['button']['label']) && $item['button']['label'] !='' ){ echo esc_attr($item['button']['label']); } ?>' />
					</div>
					<div class='ec-item'>
						<label for="ec-button-url_<?php echo esc_attr($key); ?>"><?php _e( 'Button link URL ', 'everest-counter-lite' ); ?></label>
						<input type="url" id='ec-button-url_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][button][url]' value='<?php if( isset($item['button']['url']) && $item['button']['url'] !='' ){ echo esc_url($item['button']['url']); } ?>' />
					</div>
					<div class='ec-item'>
						<label for="ec-button-target_<?php echo esc_attr($key); ?>"><?php _e( 'Target ', 'everest-counter-lite' ); ?></label>
						<select id='ec-button-target_<?php echo esc_attr($key); ?>' class="ec-icon-selection" name='item[<?php echo esc_attr($key); ?>][button][target]'>
							<option><?php _e('None', 'everest-counter-lite' ); ?></option>
							<option value='_self' <?php if(isset($item['button']['target']) && $item['button']['target'] == 'icon' ){ ?> selected <?php } ?>><?php _e('_self', 'everest-counter-lite'); ?></option>
							<option value='_blank' <?php if(isset($item['button']['target']) && $item['button']['target'] == 'image' ){ ?> selected <?php } ?>><?php _e('_blank', 'everest-counter-lite'); ?></option>
						</select>
					</div>
					<div class='ec-style-settings'>
						<div class='ec-style-label'><?php _e( 'Styles', 'everest-counter-lite' ); ?> </div>
						<div class='ec-item'>
							<label for="ec-button-font-family_<?php echo esc_attr($key); ?>"><?php _e( 'Font Family ', 'everest-counter-lite' ); ?></label>
							<select id='ec-button-font-family_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][button][font-family]'>
								<option value ><?php _e( 'Default', 'everest-counter-lite' ); ?></option>
								<?php
								foreach ( $ec_variables['google-fonts'] as $key1 => $value1 ) { ?>
								<option value='<?php echo esc_attr($key1); ?>' <?php if(isset( $item['button']['font-family'] )){ selected( $item['button']['font-family'], $key1 ); } ?> ><?php echo esc_attr($key1); ?></option>
									<?php
								}
								?>
							</select>
						</div>
						<div class='ec-item'>
							<label for="ec-button-font-size_<?php echo esc_attr($key); ?>"><?php _e( 'Font size (px) ', 'everest-counter-lite' ); ?></label>
							<input type="number" step='0.01' id='ec-button-font-size_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][button][font-size]' value='<?php if( isset($item['button']['font-size']) && $item['button']['font-size'] !='' ){ echo esc_attr($item['button']['font-size']); } ?>' />
						</div>
						<div class='ec-item'>
							<label for="ec-button-font-color_<?php echo esc_attr($key); ?>"><?php _e( 'Font color ', 'everest-counter-lite' ); ?></label>
							<input type="text" id='ec-button-font-color_<?php echo esc_attr($key); ?>' name='item[<?php echo esc_attr($key); ?>][button][font-color]' class='ec-color-picker' data-alpha="true" value='<?php if( isset($item['button']['font-color']) && $item['button']['font-color'] !='' ){ echo esc_attr($item['button']['font-color']); } ?>' />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>