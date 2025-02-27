<div class="wrap">

	<div class="inner">
		 <h2><?php _e('Desktop Settings');?></h2>
		<form method="post" action="options.php">
		<?php
		settings_errors();

		settings_fields('combar_sab_setting_desk');
		do_settings_sections( 'combar_sab_setting_desk' );
		$settings = get_option('combar_sab_setting_desk');
		//$buttons = get_option('combar_sab_buttons');
		$plugin_dir = COMBAR_SAB_DIR;
		
		
		/*
		 * set default values to radio and checkboxes
		 */
		 
		$settings['style'] = combar_sab_setting_deafult($settings['style'], 'buttons');
		$settings['style_1'] = combar_sab_setting_deafult($settings['style_1'], 'full_radius');
		$settings['style_2'] = combar_sab_setting_deafult($settings['style_2'], 'vertical_buttons');
		$settings['style_3'] = combar_sab_setting_deafult($settings['style_3'], 'vertical_buttons');
		$settings['style_4'] = combar_sab_setting_deafult($settings['style_4'], 'slide_menu');
		$settings['animation'] = combar_sab_setting_deafult($settings['animation'], 'to-top');
		$settings['side'] = combar_sab_setting_deafult($settings['side'], 'left');
		$settings['align'] = combar_sab_setting_deafult($settings['align'], 'bottom');
		$settings['icon_side'] = combar_sab_setting_deafult($settings['icon_side'], 'left');
		$settings['trigger_text_style'] = combar_sab_setting_deafult($settings['trigger_text_style'], 'reguler');
		$settings['lastView'] = combar_sab_setting_deafult($settings['lastView'], 'desktopView');

		?>

  
			<section class="row first">
				<div class="row">
					<div class="inner-row cr checkbox-row">
						<div class="option-title">
							<?php _e('Sticky Action Buttons on desktop', 'combar-sab');?>
						</div>
						<label for="active">
							<input type="checkbox" id="active" class="toggle_control" data-target=".main-toggle" name="combar_sab_setting_desk[active]" <?php checked( 'on', $settings['active'] ); ?> />
							<span><?php _e('Add Sticky Action Buttons on desktop', 'combar-sab');?></span>
						</label>
					</div>
				</div>
			</section>

			<div class="main-toggle row hide">

				<section class="row">

					<div class="row">

						<div class="inner-row cr radio-row radio-imgs">
							<div class="radio-row-title">
								<?php _e('Sticky Action Buttons style', 'combar-sab');?>
							</div>
							<label for="btns_style_1">
								<img src="<?php echo esc_url($plugin_dir . '/assets/images/style_2.svg');?>">
								<input type="radio" id="btns_style_1" name="combar_sab_setting_desk[style]" value="buttons" <?php checked( 'buttons', $settings['style'] ); ?> class="radio_control" data-target=".style2"/>
								<span><?php _e('Separate buttons', 'combar-sab');?></span>
								<div class="label-act"></div>
							</label>
							<label for="btns_style_2">
								<img src="<?php echo esc_url($plugin_dir . '/assets/images/style_3.svg');?>">
								<input type="radio" id="btns_style_2" name="combar_sab_setting_desk[style]" value="toggle_buttons" <?php checked( 'toggle_buttons', $settings['style'] ); ?> class="radio_control" data-target=".style3" />
								<span><?php _e('Toggle buttons', 'combar-sab');?></span>
								<div class="label-act"></div>
							</label>
							<label for="btns_style_0">
								<img src="<?php echo esc_url($plugin_dir . '/assets/images/style_1.svg');?>">
								<input type="radio" id="btns_style_0" name="combar_sab_setting_desk[style]" value="block" <?php checked( 'block', $settings['style'] ); ?> class="radio_control" data-target=".style1"/>
								<span><?php _e('Buttons block', 'combar-sab');?></span>
								<div class="label-act"></div>
							</label>
							<label class="soon" for="btns_style_3">
								<span class="soon_badge"><?php _e('Coming soon', 'combar-sab');?></span>
								<img src="<?php echo esc_url($plugin_dir . '/assets/images/style_4.svg');?>">
								<input type="radio" id="btns_style_3" name="combar_sab_setting_desk[style]" value="toggle_menu" <?php checked( 'toggle_menu', $settings['style'] ); ?> class="radio_control" data-target=".style4" disabled />
								<span><?php _e('Toggle menu', 'combar-sab');?></span>
								<div class="label-act"></div>
							</label>
						</div>

						<div class="inner-row cr radio-row radio-imgs style1 hide">
							<div class="radio-row-title">
								<?php _e('Buttons block style', 'combar-sab');?>
							</div>
							 <label for="btns_style_1_1">
								<img src="<?php echo esc_url($plugin_dir . '/assets/images/style_1_1.svg');?>">
								<input type="radio" id="btns_style_1_1" name="combar_sab_setting_desk[style_1]" value="full_radius" <?php checked( 'full_radius', $settings['style_1'] ); ?> class="radio_control" data-target=".style1_1" />
								<span><?php _e('Full radius', 'combar-sab');?></span>
								<div class="label-act"></div>
							</label>
							<label for="btns_style_1_0">
								<img src="<?php echo esc_url($plugin_dir . '/assets/images/style_1.svg');?>">
								<input type="radio" id="btns_style_1_0" name="combar_sab_setting_desk[style_1]" value="calc_radius" <?php checked( 'calc_radius', $settings['style_1'] ); ?> class="radio_control" />
								<span><?php _e('Sides calculated radius', 'combar-sab');?></span>
								<div class="label-act"></div>
							</label>
						</div>

						<div class="inner-row cr radio-row radio-imgs style2 hide">
							<div class="radio-row-title">
								<?php _e('Separate buttons style', 'combar-sab');?>
							</div>
							<label for="btns_style_2_1">
								<img src="<?php echo esc_url($plugin_dir . '/assets/images/style_2.svg');?>">
								<input type="radio" id="btns_style_2_1" name="combar_sab_setting_desk[style_2]" value="vertical_buttons" <?php checked( 'vertical_buttons', $settings['style_2'] ); ?> />
								<span><?php _e('Vertical', 'combar-sab');?></span>
								<div class="label-act"></div>
							</label>
							<label for="btns_style_2_0">
								<img src="<?php echo esc_url($plugin_dir . '/assets/images/style_2_1.svg');?>">
								<input type="radio" id="btns_style_2_0" name="combar_sab_setting_desk[style_2]" value="horizontal_buttons" <?php checked( 'horizontal_buttons', $settings['style_2'] ); ?> />
								<span><?php _e('Horizontal', 'combar-sab');?></span>
								<div class="label-act"></div>
							</label>
						</div>

						<div class="inner-row cr radio-row radio-imgs style3 hide">
							<div class="radio-row-title">
								<?php _e('Toggle buttons style', 'combar-sab');?>
							</div>
							 <label for="btns_style_3_1">
								<img src="<?php echo esc_url($plugin_dir . '/assets/images/style_3.svg');?>">
								<input type="radio" id="btns_style_3_1" name="combar_sab_setting_desk[style_3]" value="vertical_buttons" <?php checked( 'vertical_buttons', $settings['style_3'] ); ?> />
								<span><?php _e('Vertical', 'combar-sab');?></span>
								<div class="label-act"></div>
							</label>
							<label for="btns_style_3_0">
								<img src="<?php echo esc_url($plugin_dir . '/assets/images/style_3_1.svg');?>">
								<input type="radio" id="btns_style_3_0" name="combar_sab_setting_desk[style_3]" value="horizontal_buttons" <?php checked( 'horizontal_buttons', $settings['style_3'] ); ?> />
								<span><?php _e('Horizontal', 'combar-sab');?></span>
								<div class="label-act"></div>
							</label>
						</div>

						<div class="inner-row cr radio-row radio-imgs style4 hide">
							<div class="radio-row-title">
								<?php _e('Toggle menu style', 'combar-sab');?>
							</div>
							<label for="btns_style_4_0">
								<img src="<?php echo esc_url($plugin_dir . '/assets/images/style_4.svg');?>">
								<input type="radio" id="btns_style_4_0" name="combar_sab_setting_desk[style_4]" value="slide_menu" <?php checked( 'slide_menu', $settings['style_4'] ); ?> disabled />
								<span><?php _e('Slide menu', 'combar-sab');?></span>
								<div class="label-act"></div>
							</label>
							<label for="btns_style_4_1">
								<img src="<?php echo esc_url($plugin_dir . '/assets/images/style_4_1.svg');?>">
								<input type="radio" id="btns_style_4_1" name="combar_sab_setting_desk[style_4]" value="float_menu" <?php checked( 'float_menu', $settings['style_4'] ); ?> disabled />
								<span><?php _e('Float menu', 'combar-sab');?></span>
								<div class="label-act"></div>
							</label>
						</div>

					</div>

					<div class="row style3 style4">
						<div class="inner-row cr radio-row style3">
							<div class="radio-row-title">
								<?php _e('Toggle animation', 'combar-sab');?>
							</div>
							<label for="animation_0">
								<input type="radio" id="animation_0" name="combar_sab_setting_desk[animation]" value="to-top" <?php checked( 'to-top', $settings['animation'] ); ?> />
								<span><?php _e('Move to top', 'combar-sab');?></span>
							</label>
							<label for="animation_1">
								<input type="radio" id="animation_1" name="combar_sab_setting_desk[animation]" value="to-bottom" <?php checked( 'to-bottom', $settings['animation'] ); ?> />
								<span><?php _e('Move to bottom', 'combar-sab');?></span>
							</label>
							<label for="animation_2">
								<input type="radio" id="animation_2" name="combar_sab_setting_desk[animation]" value="to-left" <?php checked( 'to-left', $settings['animation'] ); ?> />
								<span><?php _e('Move to left', 'combar-sab');?></span>
							</label>
							<label for="animation_3">
								<input type="radio" id="animation_3" name="combar_sab_setting_desk[animation]" value="to-right" <?php checked( 'to-right', $settings['animation'] ); ?> />
								<span><?php _e('Move to right', 'combar-sab');?></span>
							</label> 
							<label for="animation_4">
								<input type="radio" id="animation_4" name="combar_sab_setting_desk[animation]" value="fade" <?php checked( 'fade', $settings['animation'] ); ?> />
								<span><?php _e('Fade', 'combar-sab');?></span>
							</label>
							<label for="animation_5">
								<input type="radio" id="animation_5" name="combar_sab_setting_desk[animation]" value="pop" <?php checked( 'pop', $settings['animation'] ); ?> />
								<span><?php _e('Scale', 'combar-sab');?></span>
							</label>
							<label for="animation_6">
								<input type="radio" id="animation_6" name="combar_sab_setting_desk[animation]" value="flipx" <?php checked( 'flipx', $settings['animation'] ); ?> />
								<span><?php _e('Flip X', 'combar-sab');?></span>
							</label>
							<label for="animation_7">
								<input type="radio" id="animation_7" name="combar_sab_setting_desk[animation]" value="flipy" <?php checked( 'flipy', $settings['animation'] ); ?> />
								<span><?php _e('Flip Y', 'combar-sab');?></span>
							</label>
							<label for="animation_8">
								<input type="radio" id="animation_8" name="combar_sab_setting_desk[animation]" value="rot-left" <?php checked( 'rot-left', $settings['animation'] ); ?> />
								<span><?php _e('Rotate left', 'combar-sab');?></span>
							</label>
							<label for="animation_9">
								<input type="radio" id="animation_9" name="combar_sab_setting_desk[animation]" value="rot-right" <?php checked( 'rot-right', $settings['animation'] ); ?> />
								<span><?php _e('Rotate Right', 'combar-sab');?></span>
							</label>
						</div>
						
						<div class="inner-row cr checkbox-row">
							<div class="option-title">
								<?php _e('Toggle trigger', 'combar-sab');?>
							</div>
							<label for="hover">
								<input type="checkbox" id="hover" name="combar_sab_setting_desk[hover]" <?php checked( 'on', $settings['hover'] ); ?> />
								<span><?php _e('Trigger toggles on hover', 'combar-sab');?></span>
							</label>
							<small>
							<?php _e('By default the trigger event activate by click. Check this if you want it to be triggered  by mouse hover instead.', 'combar-sab'); ?>
							<br>
							<?php _e('On mobile devices the event will still be activated by click.', 'combar-sab'); ?>
							</small>
						</div>	
					</div>

				</section>

				<h3 class="close-accordion">
					<div class="title-text">
						<?php _e('Position (Buttons, Trigger button & Block)', 'combar-sab');?>
					</div>
				</h3>
				<section class="row">

					<div class="row">
					
						<div class="inner-row cr radio-row">
							<div class="radio-row-title">
								<?php _e('Buttons alignment', 'combar-sab');?>
							</div>
							<label for="align_0">
								<input type="radio" id="align_0" name="combar_sab_setting_desk[align]" value="top" <?php checked( 'top', $settings['align'] ); ?> />
								<span><?php _e('Top', 'combar-sab');?></span>
							</label> 
							<label for="align_1">
								<input type="radio" id="align_1" name="combar_sab_setting_desk[align]" value="center" <?php checked( 'center', $settings['align'] ); ?> />
								<span><?php _e('Center', 'combar-sab');?></span>
							</label>
							<label for="align_2">
								<input type="radio" id="align_2" name="combar_sab_setting_desk[align]" value="bottom" <?php checked( 'bottom', $settings['align'] ); ?> />
								<span><?php _e('Bottom', 'combar-sab');?></span>
							</label>
						</div>

						<div class="inner-row cr radio-row">
							<div class="radio-row-title">
								<?php _e('Buttons side', 'combar-sab');?>
							</div>
							<label for="side_0">
								<input type="radio" id="side_0" name="combar_sab_setting_desk[side]" value="left" <?php checked( 'left', $settings['side'] ); ?> />
								<span><?php _e('Left', 'combar-sab');?></span>
							</label>
							<label for="side_1">
								<input type="radio" id="side_1" name="combar_sab_setting_desk[side]" value="right" <?php checked( 'right', $settings['side'] ); ?> />
								<span><?php _e('Right', 'combar-sab');?></span>
							</label>
						</div>
						

						<div class="inner-row">
							<label for="side_gap">
								<span><?php _e('Gap from sides (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="side_gap" name="combar_sab_setting_desk[side_gap]" min="0" value="<?php echo esc_attr( $settings['side_gap'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 10px.';?></small>
						</div>

						<div class="inner-row">
							<label for="bottom_gap">
								<span><?php _e('Gap from top/bottom (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="bottom_gap" name="combar_sab_setting_desk[bottom_gap]" min="0" value="<?php echo esc_attr( $settings['bottom_gap'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 10px.';?></small>
						</div>

						<div class="inner-row style1">
							<label for="max_width">
								<span><?php _e('Block width', 'combar-sab');?></span>
								<input type="text" id="width" name="combar_sab_setting_desk[width]" value="<?php echo esc_attr( $settings['width'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 100%.</br>' . __('Valid css value: 50%, 300px, 50vw, etc...', 'combar-sab');?></small>
						</div>

						<div class="inner-row style2 style3">
							<label for="buttons_gap">
								<span><?php _e('Gap between buttons (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="buttons_gap" name="combar_sab_setting_desk[buttons_gap]" min="0" value="<?php echo esc_attr( $settings['buttons_gap'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 15px.';?></small>
						</div>

					</div>

				</section>

				<h3 class="close-accordion">
					<div class="title-text">
						<?php _e('Design default settings (Buttons, Trigger button & Block)', 'combar-sab');?>
					</div>
				</h3>
				<section class="row">

					<div class="row">

						<div class="inner-row">
							<label for="size">
								<span><?php _e('Buttons size / Block height (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="size" name="combar_sab_setting_desk[height]"  min="40" value="<?php echo esc_attr( $settings['height'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 50px. ' . __('min:', 'combar-sab') . ' 40.</br>' . __('Buttons minimum width will be equal to their height.', 'combar-sab');?></small>
						</div>

						<div class="inner-row">
							<label for="inline_gap">
								<span><?php _e('Gap between Icon and Title (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="inline_gap" name="combar_sab_setting_desk[inline_gap]"  min="40" value="<?php echo esc_attr( $settings['inline_gap'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 8px.';?></small>
						</div>

						<div class="inner-row">
							<div class="option-title">
								<?php _e('Background color', 'combar-sab');?>
							</div>
							<label for="bg">
								<input type="text" id="bg" class="color-picker" data-alpha-enabled="true" name="combar_sab_setting_desk[bg]" value="<?php echo esc_attr( $settings['bg'] ); ?>"/>
							</label>
							<small>
							<?php echo __('Default:', 'combar-sab') . ' #000.</br>' . __('Can be set manually for each button.', 'combar-sab'); ?>
							</small>
						</div>

						<div class="inner-row">
							<div class="option-title">
								<?php _e('Background hover color', 'combar-sab');?>
							</div>
							<label for="hover_bg">
								<input type="text" id="hover_bg" class="color-picker" data-alpha-enabled="true" name="combar_sab_setting_desk[hover_bg]" value="<?php echo esc_attr( $settings['hover_bg'] ); ?>"/>
							</label>
							<small>
							<?php echo __('Default:', 'combar-sab') . ' #333.</br>' . __('Can be set manually for each button.', 'combar-sab'); ?>
							</small>
						</div>

						<div class="inner-row">
							<label for="border_width">
								<span><?php _e('Border width (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="border_width" name="combar_sab_setting_desk[border_width]" min="0" value="<?php echo esc_attr( $settings['border_width'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 0px.';?></small>
						</div>

						<div class="inner-row">
							<label for="border_style">
								<span><?php _e('Border style', 'combar-sab');?></span>
								<select id="border_style" name="combar_sab_setting_desk[border_style]">
									<option value=""><?php _e('Choose', 'combar-sab');?></option>
									<option value="solid" <?php selected( 'solid', $settings['border_style'] ); ?>><?php _e('Solid', 'combar-sab');?></option>
									<option value="dashed" <?php selected( 'dashed', $settings['border_style'] ); ?>><?php _e('Dashed', 'combar-sab');?></option>
									<option value="dotted" <?php selected( 'dotted', $settings['border_style'] ); ?>><?php _e('Dotted', 'combar-sab');?></option>
									<option value="double" <?php selected( 'double', $settings['border_style'] ); ?>><?php _e('Double', 'combar-sab');?></option>
								</select>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' ' . __('Solid', 'combar-sab') . '.';?></small>
						</div>

						<div class="inner-row">
							<div class="option-title">
								<?php _e('Border color', 'combar-sab');?>
							</div>
							<label for="border_color">
								<input type="text" id="border_color" class="color-picker" data-alpha-enabled="true" name="combar_sab_setting_desk[border_color]" value="<?php echo esc_attr( $settings['border_color'] ); ?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' #000.</br>' . __('Can be set manually for each button.', 'combar-sab'); ?></small>
						</div>

						<div class="inner-row">
							<div class="option-title">
								<?php _e('Border hover color', 'combar-sab');?>
							</div>
							<label for="border_hover_color">
								<input type="text" id="border_hover_color" class="color-picker" data-alpha-enabled="true" name="combar_sab_setting_desk[border_hover_color]" value="<?php echo esc_attr( $settings['border_hover_color'] ); ?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' #000.</br>' . __('Can be set manually for each button.', 'combar-sab'); ?></small>
						</div>

						<div class="inner-row">
							<label for="border_radius">
								<span><?php _e('Border radius (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="border_radius" name="combar_sab_setting_desk[border_radius]" min="0" value="<?php echo esc_attr( $settings['border_radius'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 100px.';?></small>
						</div>

						<div class="inner-row">
							<label for="shadow_h">
								<span><?php _e('Shadow horizontal offset (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="shadow_h" name="combar_sab_setting_desk[shadow_h]" value="<?php echo esc_attr( $settings['shadow_h'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 0px.';?></small>
						</div>

						<div class="inner-row">
							<label for="shadow_v">
								<span><?php _e('Shadow vertical offset (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="shadow_v" name="combar_sab_setting_desk[shadow_v]" value="<?php echo esc_attr( $settings['shadow_v'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 0px.';?></small>
						</div>

						<div class="inner-row">
							<label for="shadow_blur">
								<span><?php _e('Shadow blur (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="shadow_blur" name="combar_sab_setting_desk[shadow_blur]" min="0" value="<?php echo esc_attr( $settings['shadow_blur'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 5px.';?></small>
						</div>

						<div class="inner-row">
							<label for="shadow_spread">
								<span><?php _e('Shadow spread (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="shadow_spread" name="combar_sab_setting_desk[shadow_spread]" value="<?php echo esc_attr( $settings['shadow_spread'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 0px.';?></small>
						</div>

						<div class="inner-row">
							<div class="option-title">
								<?php _e('Shadow color', 'combar-sab');?>
							</div>
							<label for="shadow_color">
								<input type="text" id="shadow_color" class="color-picker" data-alpha-enabled="true" name="combar_sab_setting_desk[shadow_color]" value="<?php echo esc_attr( $settings['shadow_color'] ); ?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' #ccc.';?></small>
						</div>

					</div>

				</section>

				<h3 class="close-accordion">
					<div class="title-text">
						<?php _e('Buttons title design default settings', 'combar-sab');?>
					</div>
				</h3>
				<section class="row">

					<div class="row">

						<div class="inner-row">
							<div class="option-title">
								<?php _e('Title color', 'combar-sab');?>
							</div>
							<label for="text_color">
									<input type="text" id="text_color" class="color-picker" data-alpha-enabled="true" name="combar_sab_setting_desk[text_color]" value="<?php echo esc_attr( $settings['text_color'] ); ?>"/>
								</label>
							<small>
								<?php echo __('Default:', 'combar-sab') . ' #fff.</br>' . __('Can be set manually for each button.', 'combar-sab');?>
								</small>
						</div>

						<div class="inner-row">
							<div class="option-title">
								<?php _e('Title hover color', 'combar-sab');?>
							</div>
							<label for="hover_color">
									<input type="text" id="hover_color" class="color-picker" data-alpha-enabled="true" name="combar_sab_setting_desk[hover_color]" value="<?php echo esc_attr( $settings['hover_color'] ); ?>"/>
								</label>
							<small>
								<?php echo __('Default:', 'combar-sab') . ' #fff.</br>' . __('Can be set manually for each button.', 'combar-sab');?>
								</small>
						</div>

						<div class="inner-row">
							<label for="text_size">
								<span><?php _e('Title size (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="text_size" name="combar_sab_setting_desk[text_size]" min="0" value="<?php echo esc_attr( $settings['text_size'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 20px.';?></small>
						</div>
						
						<div class="inner-row">
							<label for="text_weight">
								<span><?php _e('Title weight', 'combar-sab');?></span>
								<select id="text_weight" name="combar_sab_setting_desk[text_weight]">
									<option value=""><?php _e('Choose', 'combar-sab');?></option>
									<option value="100" <?php selected( '100', $settings['text_weight'] ); ?>>100</option>
									<option value="200" <?php selected( '200', $settings['text_weight'] ); ?>>200</option>
									<option value="300" <?php selected( '300', $settings['text_weight'] ); ?>>300</option>
									<option value="400" <?php selected( '400', $settings['text_weight'] ); ?>>400</option>
									<option value="500" <?php selected( '500', $settings['text_weight'] ); ?>>500</option>
									<option value="600" <?php selected( '600', $settings['text_weight'] ); ?>>600</option>
									<option value="700" <?php selected( '700', $settings['text_weight'] ); ?>>700</option>
									<option value="800" <?php selected( '800', $settings['text_weight'] ); ?>>800</option>
									<option value="900" <?php selected( '900', $settings['text_weight'] ); ?>>900</option>
								</select>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 700.';?></small>
						</div>
	
						<div class="inner-row">
							<div class="option-title">
								<?php _e('Icon color', 'combar-sab');?>
							</div>
							<label for="icon_color">
									<input type="text" id="text_color" class="color-picker" data-alpha-enabled="true" name="combar_sab_setting_desk[icon_color]" value="<?php echo esc_attr( $settings['icon_color'] ); ?>"/>
								</label>
							<small>
								<?php echo __('Default:', 'combar-sab') .  ' ' .  __('As title color.', 'combar-sab') . '</br>' . __('Can be set manually for each button.', 'combar-sab');?>
								</small>
						</div>

						<div class="inner-row">
							<div class="option-title">
								<?php _e('Icon hover color', 'combar-sab');?>
							</div>
							<label for="icon_hover_color">
									<input type="text" id="icon_hover_color" class="color-picker" data-alpha-enabled="true" name="combar_sab_setting_desk[icon_hover_color]" value="<?php echo esc_attr( $settings['icon_hover_color'] ); ?>"/>
								</label>
							<small>
								<?php echo __('Default:', 'combar-sab') . ' ' . __('As title hover color.', 'combar-sab') . '</br>' . __('Can be set manually for each button.', 'combar-sab');?>
								</small>
						</div>

						<div class="inner-row">
							<label for="icon_size">
								<span><?php _e('Icon size (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="icon_size" name="combar_sab_setting_desk[icon_size]" min="0" value="<?php echo esc_attr( $settings['icon_size'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' ' . __('As title size.', 'combar-sab'); ?></small>
						</div>

					</div>

				</section>

				<h3 class="close-accordion style3 style4">
					<div class="title-text">
						<?php _e('Trigger button settings', 'combar-sab');?>
					</div>
				</h3>
				<section class="row style3 style4">
					<div class="row">
						<div class="inner-row cr radio-row radio-imgs">
							<div class="radio-row-title">
								<?php _e('Title style', 'combar-sab');?>
							</div>
							<label for="trigger_text_style_1">
								<img src="<?php echo esc_url($plugin_dir . '/assets/images/text_2.svg');?>">
								<input type="radio" id="trigger_text_style_1" name="combar_sab_setting_desk[trigger_text_style]" value="reguler" <?php checked( 'reguler', $settings['trigger_text_style'] ); ?>  />
								<span><?php _e('Icon and text', 'combar-sab');?></span>
								<div class="label-act"></div>
							</label>
							<label for="trigger_text_style_2">
								<img src="<?php echo esc_url($plugin_dir . '/assets/images/text_1.svg');?>">
								<input type="radio" id="trigger_text_style_2" name="combar_sab_setting_desk[trigger_text_style]" value="no_text" <?php checked( 'no_text', $settings['trigger_text_style'] ); ?>  />
								<span><?php _e('Only icon', 'combar-sab');?></span>
								<div class="label-act"></div>
							</label>
							<label for="trigger_text_style_3">
								<img src="<?php echo esc_url($plugin_dir . '/assets/images/text_3.svg');?>">
								<input type="radio" id="trigger_text_style_3" name="combar_sab_setting_desk[trigger_text_style]" value="tooltip" <?php checked( 'tooltip', $settings['trigger_text_style'] ); ?> />
								<span><?php _e('Tooltip', 'combar-sab');?></span>
								<div class="label-act"></div>
							</label>
							<label for="trigger_text_style_3">
								<img src="<?php echo esc_url($plugin_dir . '/assets/images/text_4.svg');?>">
								<input type="radio" id="trigger_text_style_3" name="combar_sab_setting_desk[trigger_text_style]" value="toogle_tooltip" <?php checked( 'toogle_toolip', $settings['trigger_text_style'] ); ?> />
								<span><?php _e('Hover tooltip', 'combar-sab');?></span>
								<div class="label-act"></div>
							</label>
							<small>
							<?php _e( 'Trigger button style based on "Design default settings."', 'combar-sab'  ); ?>
							</small>
						</div>

						<div class="inner-row">
							<div class="option-title">
								<?php _e('Title', 'combar-sab');?>
							</div>
							<label for="trigger_text">
								<input type="text" id="trigger_text" name="combar_sab_setting_desk[trigger_text]" value="<?php echo esc_attr( $settings['trigger_text'] ); ?>" />
							</label>
						</div>

						<div class="inner-row">
							<div class="option-title">
								<?php _e('Icon', 'combar-sab');?>
							</div>
							<label for="trigger_icon">
								<input type="text" id="trigger_icon" name="combar_sab_setting_desk[trigger_icon]" value="<?php echo esc_attr( $settings['trigger_icon'] ); ?>" placeholder="<?php _e('Click to choose...', 'combar-sab');?>" class="fa-picker
								<?php
									if ( '' != $settings['trigger_icon']) {
										echo ' icon-found';
									}
								?>
								" />
								<i class="<?php echo esc_attr( $settings['trigger_icon'] ); ?>"></i>
								<span class="clear-icon dashicons dashicons-no-alt 
								<?php
								if ( '' == $settings['trigger_icon'] ) {
									echo 'hide';
								}
								?>
								"></span>
							</label>
							<small>
							<?php printf( __( 'Note: The plugin uses FontAwesome in the selector, but you can use any HTML class of Icon font that is installed on your site. Try for example: %s', 'combar-sab'  ), '<code>dashicons dashicons-wordpress</code>' );?>
							</small>
						</div>

						<div class="inner-row">
							<div class="option-title">
								<?php _e('Close Title', 'combar-sab');?>
							</div>
							<label for="close_text">
									<input type="text" id="close_text" name="combar_sab_setting_desk[close_text]" value="<?php echo esc_attr( $settings['close_text'] ); ?>"/>
								</label>
						</div>

						<div class="inner-row">
							<div class="option-title">
								<?php _e('Close Icon', 'combar-sab');?>
							</div>
							<label for="close_icon">
								<input type="text" id="close_icon" name="combar_sab_setting_desk[close_icon]" value="<?php echo esc_attr( $settings['close_icon'] ); ?>" placeholder="<?php _e('Click to choose...', 'combar-sab');?>" class="fa-picker
								<?php
									if ( '' !=  $settings['close_icon'] ) {
										echo ' icon-found';
									}
								?>
								" />
								<i class="<?php echo esc_attr( $settings['close_icon'] ); ?>"></i>
								<span class="clear-icon dashicons dashicons-no-alt 
								<?php
								if ( '' ==  $settings['close_icon'] ) {
									echo 'hide';
								}
								?>
								"></span>
							</label>
							<small>
							<?php printf( __( 'Note: The plugin uses FontAwesome in the selector, but you can use any HTML class of Icon font that is installed on your site. Try for example: %s', 'combar-sab'  ), '<code>dashicons dashicons-wordpress</code>' );?>
							</small>
						</div>
					
						<div class="inner-row cr radio-row">
							<div class="radio-row-title">
								<?php _e('Icon side', 'combar-sab');?>
							</div>
							<label for="icon_side_0">
								<input type="radio" id="icon_side_0" name="combar_sab_setting_desk[icon_side]" value="left" <?php checked( 'left', $settings['icon_side'] ); ?> />
								<span><?php _e('Left to text', 'combar-sab');?></span>
							</label>
							<label for="icon_side_1">
								<input type="radio" id="icon_side_1" name="combar_sab_setting_desk[icon_side]" value="right" <?php checked( 'right', $settings['icon_side'] ); ?> />
								<span><?php _e('Right to text', 'combar-sab');?></span>
							</label>
						</div>

						<div class="inner-row cr checkbox-row">
							<div class="option-title">
								<?php _e('Button Gradient', 'combar-sab');?>
							</div>
							<label for="trigger_gradient">
								<input type="checkbox" id="trigger_gradient" name="combar_sab_setting_desk[trigger_gradient]" <?php checked( 'on', $settings['trigger_gradient'] ); ?> />
								<span><?php _e('Add gradient effect to Trigger button', 'combar-sab');?></span>
							</label>
						</div>

					</div>
				</section>

				<h3 class="close-accordion">
					<div class="title-text">
						<?php _e('Tootltip design settings', 'combar-sab');?>
					</div>
				</h3>
				
				<section class="row">
					<div class="row">
						<div class="inner-row">
							<div class="option-title">
								<?php _e('Background color', 'combar-sab');?>
							</div>
							<label for="tooltip_bg">
									<input type="text" id="tooltip_bg" class="color-picker" data-alpha-enabled="true" name="combar_sab_setting_desk[tooltip_bg]" value="<?php echo esc_attr( $settings['tooltip_bg'] ); ?>"/>
								</label>
							<small>
								<?php echo __('Default:', 'combar-sab') . ' #000.';?>
								</small>
						</div>

						<div class="inner-row">
							<div class="option-title">
								<?php _e('Text color', 'combar-sab');?>
							</div>
							<label for="tooltip_color">
									<input type="text" id="tooltip_color" class="color-picker" data-alpha-enabled="true" name="combar_sab_setting_desk[tooltip_color]" value="<?php echo esc_attr( $settings['tooltip_color'] ); ?>"/>
								</label>
							<small>
								<?php echo __('Default:', 'combar-sab') . ' #fff.';?>
								</small>
						</div>

						<div class="inner-row">
							<label for="tooltip_radius">
								<span><?php _e('Border radius (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="tooltip_radius" name="combar_sab_setting_desk[tooltip_radius]" min="0" value="<?php echo esc_attr( $settings['tooltip_radius'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 5px.';?></small>
						</div>
						
						<div class="inner-row">
							<label for="tt_shadow_h">
								<span><?php _e('Shadow horizontal offset (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="tt_shadow_h" name="combar_sab_setting_desk[tt_shadow_h]" value="<?php echo esc_attr( $settings['tt_shadow_h'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 0px.';?></small>
						</div>

						<div class="inner-row">
							<label for="tt_shadow_v">
								<span><?php _e('Shadow vertical offset (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="tt_shadow_v" name="combar_sab_setting_desk[tt_shadow_v]" value="<?php echo esc_attr( $settings['tt_shadow_v'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 0px.';?></small>
						</div>

						<div class="inner-row">
							<label for="tt_shadow_blur">
								<span><?php _e('Shadow blur (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="tt_shadow_blur" name="combar_sab_setting_desk[tt_shadow_blur]" min="0" value="<?php echo esc_attr( $settings['tt_shadow_blur'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 5px.';?></small>
						</div>

						<div class="inner-row">
							<label for="tt_shadow_spread">
								<span><?php _e('Shadow spread (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="tt_shadow_spread" name="combar_sab_setting_desk[tt_shadow_spread]" value="<?php echo esc_attr( $settings['tt_shadow_spread'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 0px.';?></small>
						</div>

						<div class="inner-row">
							<div class="option-title">
								<?php _e('Shadow color', 'combar-sab');?>
							</div>
							<label for="tt_shadow_color">
								<input type="text" id="tt_shadow_color" class="color-picker" data-alpha-enabled="true" name="combar_sab_setting_desk[tt_shadow_color]" value="<?php echo esc_attr( $settings['tt_shadow_color'] ); ?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' rgba(0, 0, 0, 0.3).';?></small>
						</div>

					</div>
				</section>

				<h3 class="close-accordion style1">
					<div class="title-text">
						<?php _e('Separator between buttons in block', 'combar-sab');?>
					</div>
				</h3>
				<section class="row style1">

					<div class="row">
						<div class="inner-row half-row cr checkbox-row">
							<div class="option-title">
								<?php _e('"Soft separator" style', 'combar-sab');?>
							</div>
							<label for="soft_sep">
								<input type="checkbox" id="soft_sep" name="combar_sab_setting_desk[soft_sep]" <?php checked( 'on', $settings['soft_sep'] ); ?> />
								<span><?php _e('Use "soft separator" style', 'combar-sab');?></span>
							</label>
							<small><?php echo __('Thin line with a subtle 3D effect.', 'combar-sab') . '</br>' . __('Will disable the effect of Separator width and color.', 'combar-sab');?></small>
						</div>

						<div class="inner-row">
							<label for="separator_width">
								<span><?php _e('Width (px)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="separator_width" name="combar_sab_setting_desk[separator_width]" min="0" value="<?php echo esc_attr( $settings['separator_width'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 2px.';?></small>
						</div>

						<div class="inner-row">
							<label for="separator_height">
								<span><?php _e('Height (%)', 'combar-sab');?></span>
								<input type="number" placeholder="<?php _e('Only numbers', 'combar-sab'); ?>"  id="separator_height" min="0" name="combar_sab_setting_desk[separator_height]"  min="0" value="<?php echo esc_attr( $settings['separator_height'] );?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' 100%.</br>' . __('Set 0 to disable separator.', 'combar-sab');?></small>
						</div>

						<div class="inner-row">
							<div class="option-title">
								<?php _e('Color', 'combar-sab');?>
							</div>
							<label for="separator_color">
								<input type="text" id="separator_color" class="color-picker" data-alpha-enabled="true" name="combar_sab_setting_desk[separator_color]" value="<?php echo esc_attr( $settings['separator_color'] ); ?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' #fff.';?></small>
						</div>

					</div>

				</section>

				<h3 class="close-accordion">
					<div class="title-text">
						<?php _e('Bottom site blank gap', 'combar-sab');?>
					</div>
				</h3>
				<section class="row">
				
					<div class="row">
					
						<div class="inner-row cr checkbox-row">
							<div class="option-title">
								<?php _e('Add buttom gap', 'combar-sab');?>
							</div>
							<label for="footer_gap">
								<input type="checkbox" id="footer_gap" class="toggle_control" data-target=".footer-toggle" name="combar_sab_setting_desk[footer_gap]" <?php checked( 'on', $settings['footer_gap'] ); ?> />
								<span><?php _e('Add gap with the height of the buttons at the bottom of the website.', 'combar-sab');?></span>
							</label>
							<small><?php echo __('Use in case elements at the bottom of the website are hidden by the buttons.', 'combar-sab');?></small>
						</div>
					
						<div class="inner-row footer-toggle">
							<div class="option-title">
								<?php _e('Blank space background', 'combar-sab');?>
							</div>
							<label for="footer_gap_color">
								<input type="text" id="footer_gap_color" class="color-picker" data-alpha-enabled="true" name="combar_sab_setting_desk[footer_gap_color]" value="<?php echo esc_attr( $settings['footer_gap_color'] ); ?>"/>
							</label>
							<small><?php echo __('Default:', 'combar-sab') . ' #000.';?></small>
						</div>

						<div class="inner-row cr checkbox-row footer-toggle">
							<div class="option-title">
								<?php _e('Bottom gap fix', 'combar-sab');?>
							</div>
							<label for="footer_gap_js">
								<input type="checkbox" id="footer_gap_js" name="combar_sab_setting_desk[footer_gap_js]" <?php checked( 'on', $settings['footer_gap_js'] ); ?> />
								<span><?php _e('Use js to fix bottom gap position', 'combar-sab');?></span>
							</label>
							<small><?php echo __('Use in case the bottom space does not appear at the bottom of the site.', 'combar-sab');?></small>
						</div>
						
					</div>

				</section>

			</div> <!-- main toggle -->

			<div class="bottom-row">
				<input class="lastView" type="hidden" name="combar_sab_setting_desk[lastView]" value="<?php echo esc_attr( $settings['lastView'] ); ?>"/>
				<div class="bottom-buttons">
				<?php
					submit_button( __('Save','combar-sab') );
				?>
				<input type="button" class="button button-secondary" id="restart_option"
					value="<?php _e('Restart to default', 'combar-sab');?>" 
					data-option="combar_sab_setting_desk" data-nonce="<?php echo wp_create_nonce( 'sab-restart' )?>">
				</div>

				<div class="screenSwitcer">
					<span class="currentOption button button-secondary">
						<span></span>
					</span>
					<div class="screenSwitcerOptions <?php echo esc_attr($settings['lastView']); ?>">
						<span class="option <?php if ('desktopView' == $settings['lastView']) { echo 'active'; } ?>" data-class="desktopView">
							<span class="dashicons dashicons-desktop"></span>
							<?php _e('Desktop view', 'combar-sab');?>
						</span>	
						<span class="option <?php if ('tabletView' == $settings['lastView']) { echo 'active'; } ?>" data-class="tabletView">
							<span class="dashicons dashicons-tablet"></span>
							<?php _e('Tablet view', 'combar-sab');?>
						</span>
						<span class="option <?php if ('mobileView' == $settings['lastView']) { echo 'active'; } ?>" data-class="mobileView">
							<span class="dashicons dashicons-smartphone"></span>
							<?php _e('Mobile view', 'combar-sab');?>
						</span>
					</div>
				</div>
			</div>
		</form>

	</div> <!-- inner -->
</div> <!-- wrap -->

<div id="livepreview">
	<div id="livepreviewContainer" class="<?php echo esc_attr( $settings['lastView'] ); ?>" 
	data-src="<?php echo esc_url(home_url('?sab-preview=true'));?>"></div>
</div>