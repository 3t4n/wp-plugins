<?php 
$id 				= $post->ID;
$custom_data 		= json_decode(get_post_meta( $id,'button_custom_setting_'.$id, true));
if(!(isset($custom_data->button_layout) && isset($id))){	
	$custom_data = json_decode(button_default_settings());	
} 
?>
<div class="wdbutton_preview_box">
	<h2 class="header"><?php esc_html_e('Live Preview','button') ?></h2>
	<div class="wdbutton_preview_style"></div>	
	<div class="wdbutton_live">
		
	</div>
	<h3 class="header_hover"><?php esc_html_e('Hover','button') ?></h3>
	<div class="wdbutton_live_hover"></div>	
</div>
<div class="wdbutton_settings_box">
	<div class="wrapper buttons">
		<!-- basic start -->

		<div class="container">	
			<h2 class="set-seprator" style="margin-top: 0!important;"><?php esc_html_e('General Settings', 'button'); ?></h2>			
			<div class="input_group icon_simple_none hexagons_none circle_icon_none">
				<div class="input_label">
					<label><?php esc_html_e('Text','button') ?></label>
				</div>
				<div class="input_field">
					<input type="text" class="input_box" id="" name="button_text" value="<?php echo esc_html($custom_data->button_text); ?>">
				</div>
				<div class="clear_fix"></div> 
			</div>

			<div class="input_group">
				<div class="input_label">
					<label><?php esc_html_e('URL','button'); ?></label>
				</div>
				<div class="input_field">
					<input type="text" class="input_box" name="button_link" placeholder="<?php esc_html_e('http://','button'); ?>" value="<?php echo esc_html($custom_data->button_link); ?>">
				</div>
				<div class="clear_fix"></div> 
			</div>

			<div class="input_group">
				<div class="input_label">
					<label><?php esc_html_e('Selector','button') ?></label>
				</div>
				<div class="input_field">
					<input type="text" class="input_box" name="selector" placeholder="Enter Selector" value="<?php echo esc_html( isset($custom_data->selector) ? $custom_data->selector : '') ?>">
				</div>
				<p><?php echo esc_html__('Enter your CSS class(selector) here.', 'button') ?></p>
				<div class="clear_fix"></div> 
			</div>

			<div class="input_group">
				<div class="input_label">
					<label><?php esc_html_e('Attribute Id','button') ?></label>
				</div>
				<div class="input_field">
					<input type="text" class="input_box" name="attribute_id" placeholder="data-id" value="<?php echo esc_html($custom_data->attribute_id); ?>">
				</div>
				<div class="clear_fix"></div> 
			</div>

			<div class="input_group">
				<div class="input_label">
					<label><?php esc_html_e('Attribute Value','button') ?></label>
				</div>
				<div class="input_field">
					<input type="text" class="input_box" name="attribute_value" placeholder="Enter Value" value="<?php echo esc_html($custom_data->attribute_value); ?>">
				</div>
				<div class="clear_fix"></div> 
			</div>

			<div class="input_group">
				<div class="input_label">
					<label><?php esc_html_e('Target','button') ?></label>
				</div>
				<div class="input_field">
					<input type="checkbox"  name="button_target" value="1" <?php if(isset($custom_data->button_target) && $custom_data->button_target==1){echo "checked";} ?>>
					<label><?php esc_html_e('Open in new tab','button') ?></label>
				</div>
				<div class="clear_fix"></div> 
			</div>
			<div class="input_group padding_section icon_with_text_none hexagons_none circle_icon_none">
				<div class="input_label">
					<label><?php esc_html_e('Padding','button') ?></label>
				</div>
				<div class="input_field">
					<div class="input input_inline button_padding_top">
						<label><?php esc_html_e('Top','button') ?></label>
						<input type="number" class="input_box" name="padding_top" value="<?php echo esc_html($custom_data->padding_top); ?>">
						<span class="px"><?php esc_html_e('PX','button') ?></span>
					</div>
					<div class="input input_inline button_padding_right" >
						<label><?php esc_html_e( 'Right', 'button' ); ?></label>
						<input type="number" class="input_box" name="padding_right" value="<?php echo esc_html($custom_data->padding_right); ?>">
						<span class="px"><?php esc_html_e('PX','button') ?></span>
					</div>
					<div class="input input_inline button_padding_bottom">
						<label><?php esc_html_e( 'Bottom', 'button' ); ?></label>
						<input type="number" class="input_box" name="padding_bottom" value="<?php echo esc_html($custom_data->padding_bottom); ?>">
						<span class="px"><?php esc_html_e( 'PX', 'button' ); ?></span>
					</div>

					<div class="input text_right input_inline button_padding_left">
						<label><?php esc_html_e( 'Left', 'button' ); ?></label>
						<input type="number" class="input_box" name="padding_left" value="<?php echo esc_html($custom_data->padding_left); ?>">
						<span class="px"><?php esc_html_e( 'PX', 'button' ); ?></span>
					</div>

				</div>
				<div class="clear_fix"></div> 
			</div>

			<div class="input_group button_section hexagons_none circle_icon_none">
				<div class="input_label">
					<label><?php esc_html_e( 'Button Size', 'button' ); ?></label>
				</div>
				<div class="input_field">
					<div class="input two_col button_width">
						<label><?php esc_html_e( 'Width', 'button' ); ?></label>
						<input type="number" class="input_box" name="button_width" value="<?php echo esc_html($custom_data->button_width); ?>">
						<span class="px"><?php esc_html_e( 'PX', 'button' ); ?></span>
					</div>

					<div class="input text_right two_col button_height icon_simple_none icon_with_text_none" >
						<label><?php esc_html_e( 'Height', 'button' ); ?></label>
						<input type="number" class="input_box" name="button_height" value="<?php echo esc_html($custom_data->button_height); ?>">
						<span class="px"><?php esc_html_e( 'PX', 'button' ); ?></span>
					</div>				

				</div>
				<div class="clear_fix"></div> 
			</div>

			<div class="input_group text_color_section">
				<div class="input_label">
					<label><?php esc_html_e( 'Text Color', 'button' ); ?></label>
				</div>
				<div class="input_field">
					<div class="input two_col">
						<label><?php esc_html_e( 'Color', 'button' ); ?></label>
						<input name="button_text_color" type="text" value="<?php echo esc_html($custom_data->button_text_color); ?>" class="button_color_field" data-default-color="#000000" />
					</div>

					<div class="input two_col" >
						<label><?php esc_html_e( 'Hover Color', 'button' ); ?></label>
						<input name="button_text_hover_color" type="text" value="<?php echo esc_html($custom_data->button_text_hover_color); ?>" class="button_color_field" data-default-color="#000000" />
					</div>				

				</div>
				<div class="clear_fix"></div> 
			</div>	

			<div class="input_group font_section border_none hexagons_none circle_icon_none">
				<div class="input_label">
					<label><?php esc_html_e( 'Typography', 'button' ); ?></label>
				</div>
				<div class="input_field">
					<div class="input three_col font_family">						
						<input type="number" class="2 icon_with_text_none" name="font_size" value="<?php echo esc_html($custom_data->font_size); ?>">
						<span class="px icon_with_text_none"><?php esc_html_e( 'PX', 'button' ); ?></span>
					</div>

					<?php $text_bold =  (isset($custom_data->text_bold) &&  $custom_data->text_bold=="bold" ) ? "checked" : "" ; ?>
					<div class="input text_center three_col font_weight icon_simple_none" >
						<input type="checkbox" id="text_bold" name="text_bold" value="bold" <?php echo esc_attr($text_bold); ?>>
						<label for="text_bold">
							<i class="dashicons dashicons-editor-bold"></i>
						</label>

						<?php $text_italic =  (isset($custom_data->text_italic) &&  $custom_data->text_italic=="italic" ) ? "checked" : "" ; ?>

						<input type="checkbox" id="text_italic" name="text_italic" value="italic" <?php echo esc_attr($text_italic); ?> >
						<label for="text_italic">
							<i class="dashicons dashicons-editor-italic"></i>
						</label>
					</div>

					<div class="input three_col font_weight icon_with_text_none icon_simple_none">
						<input type="radio" id="text_alignleft" name="text_align" value="left" <?php if($custom_data->text_align=="left"){echo "checked";} ?>>
						<label for="text_alignleft">
							<i class="dashicons dashicons-editor-alignleft"></i>
						</label>

						<input type="radio" id="text_aligncenter" name="text_align" value="center" <?php if($custom_data->text_align=="center"){echo "checked";} ?>>
						<label for="text_aligncenter">
							<i class="dashicons dashicons-editor-aligncenter"></i>
						</label>

						<input type="radio" id="text_alignright" name="text_align" value="right" <?php if($custom_data->text_align=="right"){echo "checked";} ?>>
						<label for="text_alignright">
							<i class="dashicons dashicons-editor-alignright"></i>
						</label>
					</div>			
				</div>
				<div class="clear_fix"></div> 
			</div>
		</div>

		<!-- end -->

		<!-- Shadow start -->

		<div class="container hexagons_none circle_icon_none">
			<h2 class="home_title"><?php esc_html_e( 'Text Shadow', 'button' ); ?></h2>
			<div class="input_group button_shadow_offset_section">
				<div class="input_label">
					<label><?php esc_html_e( 'Shadow Offset', 'button' ); ?></label>
				</div>
				<div class="input_field">
					<div class="input two_col">
						<label><?php esc_html_e( 'Left', 'button' ); ?></label>
						<input type="number" class="input_box" name="shadow_offset_left" value="<?php echo esc_html($custom_data->shadow_offset_left); ?>">

					</div>

					<div class="input text_right two_col" >
						<label><?php esc_html_e( 'Top', 'button' ); ?></label>
						<input type="number" class="input_box" name="shadow_offset_top" value="<?php echo esc_html($custom_data->shadow_offset_top); ?>">

					</div>	
				</div>
				<div class="clear_fix"></div> 
			</div>

			<div class="input_group background_shadow_color_section">
				<div class="input_label">
					<label><?php esc_html_e( 'Shadow', 'button' ); ?></label>
				</div>
				<div class="input_field">
					<div class="input two_col">
						<label><?php esc_html_e( 'Color', 'button' ); ?></label>
						<input name="shadow_color" type="text" value="<?php echo esc_html($custom_data->shadow_color); ?>" class="button_color_field" data-default-color="#000000" />
					</div>

					<div class="input two_col" >
						<label><?php esc_html_e( 'Hover', 'button' ); ?></label>
						<input name="shadow_hover_color" type="text" value="<?php echo esc_html($custom_data->shadow_hover_color); ?>" class="button_color_field" data-default-color="#000000" />
					</div>				

				</div>
				<div class="clear_fix"></div> 
			</div>

			<div class="input_group button_shadow_blur_section border_none">
				<div class="input_label">
					<label><?php esc_html_e( 'Shadow Blur', 'button' ); ?></label>
				</div>
				<div class="input_field">
					<div class="input two_col">				
						<input type="number" class="input_box" name="shadow_blur" value="<?php echo esc_html($custom_data->shadow_blur); ?>">

					</div>
				</div>
				<div class="clear_fix"></div> 
			</div>
		</div>		

		<!-- end -->

		<!-- Border start -->

		<div class="container">
			<h2 class="home_title"><?php esc_html_e( 'Border', 'button' ); ?></h2>
			<div class="input_group button_circle">
				<div class="input_label">
					<label><?php esc_html_e( 'Button Circle', 'button' ); ?></label>
				</div>
				<?php $button_circle =  (isset($custom_data->button_circle) &&  $custom_data->button_circle == 1 ) ? "checked" : "" ; ?>
				<div class="input_field">
					<input type="checkbox" name="button_circle" value="1" <?php echo esc_attr($button_circle); ?>>
				</div>		
				<div class="clear_fix"></div> 
				<p><?php esc_html_e( 'Note :-  Button height and width same.', 'button' ); ?></p>
			</div>
			<div class="input_group radius_section hexagons_none circle_icon_none">
				<div class="input_label">
					<label><?php esc_html_e( 'Radius', 'button' ); ?></label>
				</div>
				<div class="input_field">
					<div class="input two_col button_radius">
						<label><?php esc_html_e( 'Top Left', 'button' ); ?></label>
						<input type="number" class="input_box" name="border_top_left" value="<?php echo esc_html($custom_data->border_top_left); ?>">
						<span class="px"><?php esc_html_e( 'PX', 'button' ); ?></span>
						<span class="dashicons dashicons-arrow-left-alt2 top_left"></span>
					</div>

					<div class="input two_col button_radius">
						<span class="dashicons dashicons-arrow-left-alt2 top_right"></span>
						<input type="number" class="input_box" name="border_top_right" value="<?php echo esc_html($custom_data->border_top_right); ?>">
						<span class="px"><?php esc_html_e( 'PX', 'button' ); ?></span>				
						<label><?php esc_html_e( 'Top Right', 'button' ); ?></label>
					</div>

					<div class="input two_col button_radius">
						<label><?php esc_html_e( 'Bootom Left', 'button' ); ?></label>

						<input type="number" class="input_box" name="border_bottom_left" value="<?php echo esc_html($custom_data->border_bottom_left); ?>">
						<span class="px"><?php esc_html_e( 'PX', 'button' ); ?></span>
						<span class="dashicons dashicons-arrow-left-alt2 bottom_left"></span>

					</div>

					<div class="input two_col button_radius">
						<span class="dashicons dashicons-arrow-left-alt2 bottom_right"></span>
						<input type="number" class="input_box" name="border_bottom_right" value="<?php echo esc_html($custom_data->border_bottom_right); ?>">
						<span class="px"><?php esc_html_e( 'PX', 'button' ); ?></span>
						<label><?php esc_html_e( 'Bootom Right', 'button' ); ?></label>

					</div>
				</div>
				<div class="clear_fix"></div> 
			</div>

			<div class="input_group style_section border_transitions_none curl_none">
				<div class="input_label">
					<label><?php esc_html_e( 'Style', 'button' ); ?></label>
				</div>
				<div class="input_field">
					<div class="input two_col border_style">
						<?php $border_style=array('none','solid','double','dashed','dotted','inset','groove','ridge','outset'); ?>				
						<select name="border_style">
							<?php 
							foreach ($border_style as $val ) {
								?>
								<option value="<?php echo esc_attr($val); ?>" <?php selected($custom_data->border_style,$val) ?>><?php echo esc_html($val); ?>
							</option>
							<?php
						}
						?>													
					</select>
				</div>

				<div class="input text_right two_col border_style hexagons_none" >
					<label><?php esc_html_e( 'Size', 'button' ); ?></label>
					<input type="number" class="input_box" name="border_width" value="<?php echo esc_html($custom_data->border_width); ?>">
					<span class="px"><?php esc_html_e( 'PX', 'button' ); ?></span>
				</div>	
			</div>
			<div class="clear_fix"></div> 
		</div>

		<div class="input_group border_color_section border_transitions_none curl_none">
			<div class="input_label">
				<label><?php esc_html_e( 'Color', 'button' ); ?></label>
			</div>
			<div class="input_field">
				<div class="input two_col">
					<label><?php esc_html_e( 'Color', 'button' ); ?></label>
					<input name="border_color" type="text" value="<?php echo esc_html($custom_data->border_color); ?>" class="button_color_field" data-default-color="#000000" />
				</div>

				<div class="input two_col" >
					<label><?php esc_html_e( 'Hover Color', 'button' ); ?></label>
					<input name="border_hover_color" type="text" value="<?php echo esc_html($custom_data->border_hover_color); ?>" class="button_color_field" data-default-color="#000000" />
				</div>				

			</div>
			<div class="clear_fix"></div> 
		</div>

		<div class="input_group border_shadow_section hexagons_none">
			<div class="input_label">
				<label><?php esc_html_e( 'Border Shadow', 'button' ); ?></label>
			</div>
			<div class="input_field">
				<div class="input two_col">
					<label><?php esc_html_e( 'Color', 'button' ); ?></label>
					<input name="border_shadow_color" type="text" value="<?php echo esc_html($custom_data->border_shadow_color); ?>" class="button_color_field" data-default-color="#000000" />
				</div>

				<div class="input two_col" >
					<label><?php esc_html_e( 'Hover Color', 'button' ); ?></label>
					<input name="border_shadow_hover_color" type="text" value="<?php echo esc_html($custom_data->border_shadow_hover_color); ?>" class="button_color_field" data-default-color="#000000" />
				</div>				

			</div>
			<div class="clear_fix"></div> 
		</div>

		<div class="input_group shadow_offset_section hexagons_none">
			<div class="input_label">
				<label><?php esc_html_e( 'Shadow Offset', 'button' ); ?> </label>
			</div>
			<div class="input_field">
				<div class="input two_col">
					<label><?php esc_html_e( 'Left', 'button' ); ?></label>
					<input type="number" class="input_box" name="border_shadow_offset_left" value="<?php echo esc_html($custom_data->border_shadow_offset_left); ?>">
				</div>

				<div class="input two_col">
					<label><?php esc_html_e( 'Top', 'button' ); ?></label>
					<input type="number" class="input_box" name="border_shadow_offset_top" value="<?php echo esc_html($custom_data->border_shadow_offset_top); ?>">
				</div>				

			</div>
			<div class="clear_fix"></div> 
		</div>

		<div class="input_group shadow_blur_section border_none hexagons_none">
			<div class="input_label">
				<label><?php esc_html_e( 'Shadow Blur', 'button' ); ?> </label>
			</div>
			<div class="input_field">
				<div class="input two_col">				
					<input type="number" class="input_box" name="border_shadow_blur" value="<?php echo esc_html($custom_data->border_shadow_blur); ?>">
				</div>
			</div>
			<div class="clear_fix"></div> 
		</div>
	</div>

	<!-- end -->

	<!-- Background start -->

	<div class="container">
		<h2 class="home_title"><?php esc_html_e( 'Background', 'button' ); ?></h2>
		<div class="input_group background_color_section">
			<div class="input_label">
				<label><?php esc_html_e( 'Background Color', 'button' ); ?></label>
			</div>
			<div class="input_field">
				<div class="input two_col">
					<label><?php esc_html_e( 'start', 'button' ); ?></label>
					<input name="button_bg_color_start" type="text" value="<?php echo esc_html($custom_data->button_bg_color_start); ?>" class="button_color_field" data-default-color="#000000" />
				</div>

				<div class="input two_col hexagons_none" >
					<label><?php esc_html_e( 'End', 'button' ); ?></label>
					<input name="button_bg_color_end" type="text" value="<?php echo esc_html($custom_data->button_bg_color_end); ?>" class="button_color_field" data-default-color="#000000" />
				</div>				

			</div>
			<div class="clear_fix"></div> 
		</div>

		<div class="input_group background_hover_color_section">
			<div class="input_label">
				<label><?php esc_html_e( 'Hover Color', 'button' ); ?></label>
			</div>
			<div class="input_field">
				<div class="input two_col">
					<label><?php esc_html_e( 'start', 'button' ); ?></label>
					<input name="button_bg_hover_color_start" type="text" value="<?php echo esc_html($custom_data->button_bg_hover_color_start); ?>" class="button_color_field" data-default-color="#000000" />
				</div>

				<div class="input two_col hexagons_none" >
					<label><?php esc_html_e( 'End', 'button' ); ?></label>
					<input name="button_bg_hover_color_end" type="text" value="<?php echo esc_html($custom_data->button_bg_hover_color_end); ?>" class="button_color_field" data-default-color="#000000" />
				</div>				

			</div>
			<div class="clear_fix"></div> 
		</div>

		<div class="input_group button_opacity_section hexagons_none">
			<div class="input_label">
				<label><?php esc_html_e( 'Opacity', 'button' ); ?></label>
			</div>
			<div class="input_field">
				<div class="input two_col">
					<label><?php esc_html_e( 'Start', 'button' ); ?></label>
					<input type="number" class="input_box" name="opacity_start" value="<?php echo esc_html($custom_data->opacity_start); ?>">

				</div>

				<div class="input text_right two_col" >
					<label><?php esc_html_e( 'End', 'button' ); ?></label>
					<input type="number" class="input_box" name="opacity_end" value="<?php echo esc_html($custom_data->opacity_end); ?>">

				</div>				

			</div>
			<div class="clear_fix"></div> 
		</div>

		<div class="input_group button_hover_opacity_section hexagons_none">
			<div class="input_label">
				<label><?php esc_html_e( 'Hover Opacity', 'button' ); ?></label>
			</div>
			<div class="input_field">
				<div class="input two_col">
					<label><?php esc_html_e( 'Start', 'button' ); ?></label>
					<input type="number" class="input_box" name="hover_opacity_start" value="<?php echo esc_html($custom_data->hover_opacity_start); ?>">

				</div>

				<div class="input text_right two_col" >
					<label><?php esc_html_e( 'End', 'button' ); ?></label>
					<input type="number" class="input_box" name="hover_opacity_end" value="<?php echo esc_html($custom_data->hover_opacity_end); ?>">

				</div>				

			</div>
			<div class="clear_fix"></div> 
		</div>

		<div class="input_group button_gradient_section border_none hexagons_none">
			<div class="input_label">
				<label><?php esc_html_e( 'Gradient stop', 'button' ); ?></label>
			</div>
			<div class="input_field">
				<div class="input two_col">				
					<input type="number" class="input_box" name="gradient_stop" value="<?php echo esc_html($custom_data->gradient_stop); ?>">
				</div>
			</div>
			<div class="clear_fix"></div> 
		</div>
	</div>

	<!-- end -->

	<!-- Container start -->

	<div class="container">
		<h2 class="home_title"><?php esc_html_e( 'Container', 'button' ); ?></h2>
		<div class="input_group container_use_section">
			<div class="input_label">
				<label><?php esc_html_e( 'Container Use', 'button' ); ?></label>
			</div>

			<?php $container_use =  (isset($custom_data->container_use) &&  $custom_data->container_use == 1 ) ? "checked" : "" ; ?>
			<div class="input_field">
				<input type="checkbox" name="container_use" value="1" <?php echo esc_attr($container_use); ?> >
			</div>
			<div class="clear_fix"></div> 	
		</div>

		<div class="input_group container_center_section">
			<div class="input_label">
				<label><?php esc_html_e( 'Container Center', 'button' ); ?></label>
			</div>
			<div class="input_field">
				<input type="checkbox" name="container_center" value="1" <?php if(isset($custom_data->container_center) && $custom_data->container_center ==1){echo "checked";} ?>>
			</div>
			<div class="clear_fix"></div> 	
		</div>

		<div class="input_group container_section">
			<div class="input_label">
				<label><?php esc_html_e( 'Container Width', 'button' ); ?> </label>
			</div>
			<div class="input_field">			
				<input type="number" name="container_width" value="<?php echo esc_html($custom_data->container_width); ?>">
				<span class="px"><?php esc_html_e( 'PX', 'button' ); ?></span>
			</div>
			<div class="clear_fix"></div> 	
		</div>

		<div class="input_group container_align_section">
			<div class="input_label">
				<label><?php esc_html_e( 'Button Align', 'button' ); ?> </label>
			</div>
			<div class="input_field">
				<?php $_align=array('left','center','right'); ?>			
				<select name="button_align">
					<?php 
					foreach ($_align as $val ) {
						?>
						<option value="<?php echo esc_attr($val); ?>" <?php selected($custom_data->button_align,$val) ?>><?php echo esc_html($val); ?></option>
						<?php
					}
					?>	
				</select>

			</div>
			<div class="clear_fix"></div> 	
		</div>

		<div class="input_group margin_section border_none">
			<div class="input_label">
				<label><?php esc_html_e( 'Margin', 'button' ); ?></label>
			</div>
			<div class="input_field">
				<div class="input input_inline button_margin_top">
					<label><?php esc_html_e( 'Top', 'button' ); ?></label>
					<input type="number" class="input_box" name="margin_top" value="<?php echo esc_html($custom_data->margin_top); ?>">
					<span class="px"><?php esc_html_e( 'PX', 'button' ); ?></span>
				</div>

				<div class="input input_inline button_margin_right" >
					<label><?php esc_html_e( 'Right', 'button' ); ?></label>
					<input type="number" class="input_box" name="margin_right" value="<?php echo esc_html($custom_data->margin_right); ?>">
					<span class="px"><?php esc_html_e( 'PX', 'button' ); ?></span>
				</div>

				<div class="input input_inline button_margin_bottom">
					<label><?php esc_html_e( 'Bottom', 'button' ); ?></label>
					<input type="number" class="input_box" name="margin_bottom" value="<?php echo esc_html($custom_data->margin_bottom); ?>">
					<span class="px"><?php esc_html_e( 'PX', 'button' ); ?></span>
				</div>

				<div class="input text_right input_inline button_margin_left">
					<label><?php esc_html_e( 'Left', 'button' ); ?></label>
					<input type="number" class="input_box" name="margin_left" value="<?php echo esc_html($custom_data->margin_left); ?>">
					<span class="px"><?php esc_html_e( 'PX', 'button' ); ?></span>
				</div>
			</div>
			<div class="clear_fix"></div> 
		</div>
	</div>

	<div class="custom_css_box">
		<h3><?php esc_html_e( 'Custom Css', 'button' ); ?></h3>
		<textarea name="custom_css" id="wdbuttoncustom_css"><?php echo esc_attr($custom_data->custom_css); ?></textarea>
		<p><?php esc_html_e( 'Enter Css without', 'button' ); ?> <?php echo wp_kses_post('<strong>&lt;style&gt; &lt;/style&gt; </strong> tag'); ?></p>
	</div>
	<!-- end -->

</div>
</div>