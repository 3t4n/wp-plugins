<div class="wrap">

	<div class="inner">
	
		 <h2><?php _e('Buttons Manager');?></h2>
		 
		<form method="post" action="options.php">
		
			<?php
			settings_errors();
			
			settings_fields('combar_sab_buttons');
			do_settings_sections( 'combar_sab_buttons' );
			$buttons = get_option('combar_sab_buttons');
			$buttonsObj = json_decode($buttons);
			$plugin_dir = COMBAR_SAB_DIR;
			
			$settings['lastView'] = combar_sab_setting_deafult($settings['lastView'], 'desktopView');
				
			?>
			
            <div class="row desc-row">
                <div class="inner-row">
				<?php	
				_e('In this screen you can create action buttons for use within the plugin.', 'combar-sab'); 		
				echo '<br>';
				_e('You can create unlimited buttons, set their design, add a link and determine which screens types they will appear on.', 'combar-sab');
				echo '<br>';
				_e('You can also drag the items to change the order in which they appear.', 'combar-sab'); 
				?>
                </div>
            </div>
			
            <div class="row actions">
			
				<button class="button button-secondary add-item">
					<span class="dashicons dashicons-plus"></span>
					<?php _e('Add Button', 'combar-sab'); ?>
				</button>
				
				<div class="filter">

					<div class="filters">
						<button class="desk-filter filter-on" title="<?php _e('Show desktop buttons', 'combar-sab'); ?>">
							<span class="dashicons dashicons-desktop"></span>
						</button>
						<button class="mob-filter filter-on" title="<?php _e('Show mobile buttons', 'combar-sab'); ?>">
							<span class="dashicons dashicons-smartphone"></span>
						</button>
					</div>
				</div>
            </div>

            <div class="buttons-manager row" id="sortable">

            <?php
			
			$count = 1;
			if (!empty($buttonsObj)) {
				
				foreach ($buttonsObj as $but) {
					$statesArray = array();
					if ('on' == $but->desktop) {
						$statesArray[] = 'state-desktop';
					}
					if ('on' ==  $but->mobile) {
						$statesArray[] = 'state-mobile';
					}
					$states = implode(' ', $statesArray);
					
					echo '<div class="button-item inner-row closed ' . esc_attr($states) . '">';
					echo '<div class="row button-item-title">';
					echo '<b>' . esc_html($but->title) . '</b>';
					echo '<span class="delete-item dashicons dashicons-trash"></span>';
					echo '<div class="item-state">';
					echo '<span class="dashicons dashicons-desktop desk" title="' . __('Show on desktop', 'combar-sab') . '"></span>';
					echo '<span class="dashicons dashicons-smartphone mob" title="' .  __('Show on mobile', 'combar-sab') . '"></span>';
					echo '</div>';
					echo '</div>';
					echo '<div class="button-item-content">';
					echo '<div class="row">';
					echo '<div class="inner-row">';
					echo '<label>';
					echo '<span>' . __('Button Title', 'combar-sab') . '</span>';
					echo '<input type="text" data-key="title" class="item-title" value="' . esc_attr($but->title) . '" required />';
					echo '</label>';
					echo '</div>';
					echo '<div class="inner-row">';
					echo '<div class="option-title">' . __('Button Icon', 'combar-sab') . '</div>';
					echo '<label>';		
					echo '<input type="text" data-key="icon" value="' . esc_attr($but->icon) . '" placeholder="' . __('Click to choose...', 'combar-sab') . '" class="fa-picker';				
					if ( '' != $but->icon ) {
						echo ' icon-found';
					}
					echo '" />';
					echo '<i class="' . esc_attr($but->icon) . '"></i>';
					echo '<span class="clear-icon dashicons dashicons-no-alt';
					if ( '' == $but->icon ) {
						echo ' hide';
					}
					echo '"></span>';
					echo '</label>';
					echo '<small>';
					echo sprintf( __( 'Note: The plugin uses FontAwesome in the selector, but you can use any HTML class of Icon font that is installed on your site. Try for example: %s', 'combar-sab'  ), '<code>dashicons dashicons-wordpress</code>' );
					echo '</small>';
					echo '</div>';
					echo '<div class="inner-row">';
					echo '<label>';
					echo '<span>' . __('Button Link', 'combar-sab');
					//echo . '<a class="help" href="#">?</a>
					echo '</span>';
					echo '<input type="url" data-key="url" value="' . esc_attr($but->url) . '"/>';
					echo '</label>';
					echo '</div>';
					echo '<div class="inner-row cr checkbox-row">';
					echo '<label>';
					echo	'<input type="checkbox" data-key="target" ' . checked( 'on', $but->target, false ) . '/>';
					echo '<span>' . __('Open link in a new window.', 'combar-sab') . '</span>';
					echo '</label>';
					echo '</div>';
					echo '<div class="inner-row">';
					echo '<label>';	
					echo '<span>' . __('Special button action', 'combar-sab') . '</span>';
					echo '<select data-key="special_action">';
					echo '<option value="">' . __('No special action', 'combar-sab') . '</option>';
					echo '<option value="toTop" ' . selected( 'toTop', $but->special_action, false ) . '>' . __('Scroll to top', 'combar-sab') . '</option>';
					echo '<option value="copy" ' . selected( 'copy', $but->special_action, false ) . '>' . __('Copy page URL', 'combar-sab') . '</option>';
					echo '</select>';
					echo '</label>';
					echo '<small>' . __('Note: These options will disable the button link if selected.', 'combar-sab') . '</small>';
					echo '</div>';
					echo '<div class="inner-row cr checkbox-row multi state-trigger">';
					echo '<div class="option-title">' . __('Show on devices', 'combar-sab') . '</div>';
					echo '<label>';
					echo	'<input type="checkbox" data-key="desktop" ' . checked( 'on', $but->desktop, false ) . '/>';
					echo	'<span class="dashicons dashicons-desktop"></span><span>' . __('Desktop', 'combar-sab') . '</span>';
					echo '</label>';
					echo '<label>';
					echo	'<input type="checkbox" data-key="mobile" ' . checked( 'on', $but->mobile, false ) . '/>';
					echo	'<span class="dashicons dashicons-smartphone"></span><span>' . __('Mobile', 'combar-sab') . '</span>';
					echo '</label>';
					echo '</div>';
					echo '<div class="inner-row cr radio-row radio-imgs small-img">';
					echo '<div class="radio-row-title">' . __('Buttons Title style', 'combar-sab') . '</div>';
					echo '<label>';
					echo '<img src="' . esc_url($plugin_dir . '/assets/images/text_2.svg') . '">';				
					echo '<input type="radio" name="radio_' . esc_attr($count) . '" data-key="text_style" value="reguler"';
					echo checked( 'reguler', $but->text_style, false );
					echo ' />';					
					echo '<span>' . __('Icon and text', 'combar-sab') . '</span>';
					echo '<div class="label-act"></div>';
					echo '</label>';
					echo '<label>';
					echo '<img src="' . esc_url($plugin_dir . '/assets/images/text_1.svg') . '">';				
					echo '<input type="radio" name="radio_' . esc_attr($count) . '" data-key="text_style" value="no_text"';
					echo checked( 'no_text', $but->text_style, false );
					echo ' />';
					echo '<span>' . __('Only icon', 'combar-sab') . '</span>';
					echo '<div class="label-act"></div>';
					echo '</label>';
					echo '<label>';
					echo '<img src="' . esc_url($plugin_dir . '/assets/images/text_3.svg') . '">';				
					echo '<input type="radio" name="radio_' . esc_attr($count) . '" data-key="text_style" value="tooltip"';
					echo checked( 'tooltip', $but->text_style, false );
					echo ' />';				
					echo '<span>' . __('Tooltip', 'combar-sab') . '</span>';
					echo '<div class="label-act"></div>';
					echo '</label>';
					echo '<label>';
					echo '<img src="' . esc_url($plugin_dir . '/assets/images/text_4.svg') . '">';				
					echo '<input type="radio" name="radio_' . esc_attr($count) . '" data-key="text_style" value="toogle_tooltip"';
					echo checked( 'toogle_tooltip', $but->text_style, false );
					echo ' />';
					echo '<span>' . __('Hover tooltip', 'combar-sab') . '</span>';
					echo '<div class="label-act"></div>';
					echo '</label>';
					echo '<small>';
					echo sprintf( __( 'Note: It is required to put text on each button even if it is hidden as it appears in the %s attribute.', 'combar-sab'  ), '<code>title</code>' );
					echo '</small>';
					echo '</div>';	
					echo '<div class="inner-row cr radio-row">';
					echo '<div class="radio-row-title">' . __('Icon side', 'combar-sab') . '</div>';
					echo '<label>';
					echo '<input type="radio" name="icon_side_' . esc_attr($count) . '" data-key="icon_side" value="left" checked />';
					echo '<span>' . __('Left to text', 'combar-sab') . '</span>';
					echo '</label>';
					echo '<label>';
					echo '<input type="radio" name="icon_side_' . esc_attr($count) . '" data-key="icon_side" value="right" />';
					echo '<span>' . __('Right to text', 'combar-sab') . '</span>';
					echo '</label>';
					echo '<small>';		
					echo __('For "Icon and text" Button', 'combar-sab');
					echo '</small>';		
					echo '</div>';		
					echo '</div>';
					echo '<div class="button-options-toggle">' . __('Design options', 'combar-sab') . '</div>';
					echo '<div class="row">';
					echo '<div class="inner-row">';
					echo '<div class="option-title">' . __('Button background', 'combar-sab') . '</div>';
					echo '<label>';	
					echo '<input type="text" data-key="bg" class="color-picker" data-alpha-enabled="true" value="' . esc_attr($but->bg) . '"/>';
					echo '</label>';
					echo '<small>' . __('Leave blank to use default.', 'combar-sab') . '</small>';
					echo '</div>';
					echo '<div class="inner-row">';
					echo '<div class="option-title">' . __('Hover background', 'combar-sab') . '</div>';
					echo '<label>';	
					echo '<input type="text" data-key="hover_bg" class="color-picker" data-alpha-enabled="true" value="' . esc_attr($but->hover_bg) . '"/>';
					echo '</label>';
					echo '<small>' . __('Leave blank to use default.', 'combar-sab') . '</small>';
					echo '</div>';
					echo '<div class="inner-row">';
					echo '<div class="option-title">' . __('Title color', 'combar-sab') . '</div>';
					echo '<label>';
					echo '<input type="text" data-key="color" class="color-picker" data-alpha-enabled="true" value="' . esc_attr($but->color) . '"/>';
					echo '</label>';
					echo '<small>' . __('Leave blank to use default.', 'combar-sab') . '</small>';
					echo '</div>';
					echo '<div class="inner-row">';
					echo '<div class="option-title">' . __('Hover color', 'combar-sab') . '</div>';
					echo '<label>';	
					echo '<input type="text" data-key="hover_color" class="color-picker" data-alpha-enabled="true" value="' . esc_attr($but->hover_color) . '"/>';
					echo '</label>';
					echo '<small>' . __('Leave blank to use default.', 'combar-sab') . '</small>';
					echo '</div>';
					echo '<div class="inner-row">';
					echo '<div class="option-title">' . __('Icon color', 'combar-sab') . '</div>';
					echo '<label>';
					echo '<input type="text" data-key="icon_color" class="color-picker" data-alpha-enabled="true" value="' . esc_attr($but->icon_color) . '"/>';
					echo '</label>';
					echo '<small>' . __('Leave blank to use default.', 'combar-sab') . '</small>';
					echo '</div>';
					echo '<div class="inner-row">';
					echo '<div class="option-title">' . __('Icon hover color', 'combar-sab') . '</div>';
					echo '<label>';	
					echo '<input type="text" data-key="icon_hover" class="color-picker" data-alpha-enabled="true" value="' . esc_attr($but->icon_hover) . '"/>';
					echo '</label>';
					echo '<small>' . __('Leave blank to use default.', 'combar-sab') . '</small>';
					echo '</div>';
					echo '<div class="inner-row">';
					echo '<div class="option-title">' . __('Border color', 'combar-sab') . '</div>';
					echo '<label>';
					echo '<input type="text" data-key="border_color" class="color-picker" data-alpha-enabled="true" value="' . esc_attr($but->border_color) . '"/>';
					echo '</label>';
					echo '<small>' . __('Leave blank to use default.', 'combar-sab') . '</small>';
					echo '</div>';
					echo '<div class="inner-row">';
					echo '<div class="option-title">' . __('Hover border', 'combar-sab') . '</div>';
					echo '<label>';
					echo '<input type="text" data-key="border_hover" class="color-picker" data-alpha-enabled="true" value="' . esc_attr($but->border_hover) . '"/>';
					echo '</label>';
					echo '<small>' . __('Leave blank to use default.', 'combar-sab') . '</small>';
					echo '</div>';
					echo '<div class="inner-row cr checkbox-row">';
					echo '<label>';
					echo	'<input type="checkbox" data-key="gradient" ' . checked( 'on', $but->gradient, false ) . '/>';
					echo '<span>' . __('Add gradient effect to button.', 'combar-sab') . '</span>';
					echo '</label>';
					echo '</div>';
					echo '</div>';
					echo '<div class="button-options-toggle">' . __('Advanced options', 'combar-sab') . '</div>';
					echo '<div class="row">';
					echo '<div class="inner-row">';
					echo '<label>';
					echo '<span>' . __('Button ID', 'combar-sab') . '</span>';
					echo '<input type="text" data-key="id" value="' . esc_attr($but->id) . '" />';
					echo '</label>';
					echo '<small>' . __('Custom html ID attribute.', 'combar-sab') . '</small>';
					echo '</div>';
					echo '<div class="inner-row">';
					echo '<label>';
					echo '<span>' . __('Button Class', 'combar-sab') . '</span>';
					echo '<input type="text" data-key="class" value="' . esc_attr($but->class) . '" />';
					echo '</label>';
					echo '<small>' . __('Custom html class attribute.', 'combar-sab') . '</small>';
					echo '</div>';
					echo '<div class="inner-row">';
					echo '<label>';
					echo '<span>' . __('Button custom attribute', 'combar-sab') . '</span>';
					echo '<input type="text" data-key="attr" value="' . esc_attr($but->attr) .  '" />';
					echo '</label>';
					echo '<small>';
					echo sprintf( __( 'Custom html attributes. Should look like this: %s', 'combar-sab'  ), '<code>key=value;key=value</code>' );
					echo '</small>';
					echo '</div>';
					echo '<div class="inner-row">';
					echo '<label>';
					echo '<span>' . __('Button Identifier', 'combar-sab') . '</span>';
					echo '<input type="text" class="unique" data-key="unique" value="' . esc_attr($but->unique) .  '" readonly />';
					echo '</label>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div/>';			
					
					$count++;
				}
			}
			
			
			?>

            </div>

            <div class="sample" hidden>

                <div class="button-item inner-row state-desktop state-mobile">
                    <div class="row button-item-title">
                        <b><?php _e('Button Title', 'combar-sab');?></b>
						<span class="delete-item dashicons dashicons-trash"></span>
						<div class="item-state">
							<span class="dashicons dashicons-desktop desk" title="<?php _e('Show on desktop', 'combar-sab'); ?>"></span>
							<span class="dashicons dashicons-smartphone mob" title="<?php _e('Show on mobile', 'combar-sab'); ?>"></span>
						</div>
                    </div>
                    <div class="button-item-content">
                        <div class="row">
                            <div class="inner-row">
                                <label>
									<span><?php _e('Button Title', 'combar-sab');?></span>
									<input type="text" class="item-title" data-key="title" value="Button Title" required />
								</label>
                            </div>
                            <div class="inner-row">
                                <div class="option-title">
                                    <?php _e('Button Icon', 'combar-sab');?>
                                </div>
                                <label>
									<input type="text" data-key="icon" value="" placeholder="<?php _e('Click to choose...', 'combar-sab');?>" class="fa-picker" />
									<i class=""></i>
									<span class="clear-icon dashicons dashicons-no-alt hide"></span>
								</label>
								<small>
								<?php printf( __( 'Note: The plugin uses FontAwesome in the selector, but you can use any HTML class of Icon font that is installed on your site. Try for example: %s', 'combar-sab'  ), '<code>dashicons dashicons-wordpress</code>' );?>
								</small>
                            </div>
                            <div class="inner-row">
                                <label>
									<span><?php _e('Button Link', 'combar-sab');?><!-- <a class="help" href="#">?</a> --></span>
									<input type="url" data-key="url" value=""/>
								</label>
                            </div>
							<div class="inner-row cr checkbox-row">
								<label>
									<input type="checkbox" data-key="target" />
									<span><?php _e('Open link in a new window.', 'combar-sab');?></span>
								</label>
							</div>
							<div class="inner-row">
								<label>	
								<span><?php _e('Special button action', 'combar-sab');?></span>
								<select data-key="special_action">
								<option value=""><?php _e('No special action', 'combar-sab'); ?></option>
								<option value="toTop"><?php _e('Scroll to top', 'combar-sab');?></option>
								<option value="copy"><?php _e('Copy page URL', 'combar-sab'); ?></option>
								</select>
								</label>
								<small><?php _e('Note: These options will disable the button link if selected.', 'combar-sab'); ?></small>
							</div>
                            <div class="inner-row cr checkbox-row multi state-trigger">
                                <div class="option-title">
                                    <?php _e('Show on devices', 'combar-sab');?>
                                </div>
                                <label>
									<input type="checkbox" data-key="desktop" checked />
									<span class="dashicons dashicons-desktop"></span><span><?php _e('Desktop', 'combar-sab');?></span>
								</label>
                                <label>
									<input type="checkbox" data-key="mobile" checked />
									<span class="dashicons dashicons-smartphone"></span><span><?php _e('Mobile', 'combar-sab');?></span>
								</label>
                            </div>

							<div class="inner-row cr radio-row radio-imgs small-img">
								<div class="radio-row-title">
									<?php _e('Buttons Title style', 'combar-sab');?>
								</div>
								<label>
									<img src="<?php echo esc_url($plugin_dir . '/assets/images/text_2.svg');?>">
									<input type="radio" name="radio_<?php echo esc_attr($count); ?>" data-key="text_style" value="reguler"  checked />
									<span><?php _e('Icon and text', 'combar-sab');?></span>
									<div class="label-act"></div>
								</label>
								<label>
									<img src="<?php echo  esc_url($plugin_dir . '/assets/images/text_1.svg');?>">
									<input type="radio" name="radio_<?php echo esc_attr($count); ?>" data-key="text_style" value="no_text" />
									<span><?php _e('Only icon', 'combar-sab');?></span>
									<div class="label-act"></div>
								</label>
								<label>
									<img src="<?php echo  esc_url($plugin_dir . '/assets/images/text_3.svg');?>">
									<input type="radio" name="radio_<?php echo esc_attr($count); ?>" data-key="text_style" value="tooltip" />
									<span><?php _e('Tooltip', 'combar-sab');?></span>
									<div class="label-act"></div>
								</label>
								<label>
									<img src="<?php echo esc_url($plugin_dir . '/assets/images/text_4.svg');?>">
									<input type="radio" name="radio_<?php echo esc_attr($count); ?>" data-key="text_style" value="toogle_tooltip" />
									<span><?php _e('Hover tooltip', 'combar-sab');?></span>
									<div class="label-act"></div>
								</label>
								<small>
							<?php printf( __( 'Note: It is required to put text on each button even if it is hidden as it appears in the %s attribute.', 'combar-sab'  ), '<code>title</code>' );?>
							</small>
							</div>
						
							<div class="inner-row cr radio-row">
								<div class="radio-row-title">
									<?php _e('Icon side', 'combar-sab');?>
								</div>
								<label>
									<input type="radio" name="icon_side_<?php echo esc_attr($count); ?>" data-key="icon_side" value="left" checked />
									<span><?php _e('Left to text', 'combar-sab');?></span>
								</label>
								<label>
									<input type="radio" name="icon_side_<?php echo esc_attr($count); ?>" data-key="icon_side" value="right" />
									<span><?php _e('Right to text', 'combar-sab');?></span>
								</label>
								<small>
								<?php _e('For "Icon and text" Button', 'combar-sab'); ?>	
								</small>
							</div>
							
						</div>
						
						<div class="button-options-toggle"><?php _e('Design options', 'combar-sab'); ?></div>

						<div class="row">
							<div class="inner-row">
								<div class="option-title">
									<?php _e('Button background', 'combar-sab');?>
								</div>
								<label>
									<input type="text" data-key="bg" class="color-picker" data-alpha-enabled="true" value=""/>
								</label>
								<small><?php _e('Leave blank to use default.', 'combar-sab');?></small>
							</div>
							<div class="inner-row">
								<div class="option-title">
									<?php _e('Hover background', 'combar-sab');?>
								</div>
								<label>
									<input type="text" data-key="hover_bg" class="color-picker" data-alpha-enabled="true" value=""/>
								</label>
								<small><?php _e('Leave blank to use default.', 'combar-sab');?></small>
							</div>
							<div class="inner-row">
								<div class="option-title">
									<?php _e('Title color', 'combar-sab');?>
								</div>
								<label>
									<input type="text" data-key="color" class="color-picker" data-alpha-enabled="true" value=""/>
								</label>
								<small><?php _e('Leave blank to use default.', 'combar-sab');?></small>
							</div>
							<div class="inner-row">
								<div class="option-title">
									<?php _e('Hover color', 'combar-sab');?>
								</div>
								<label>
									<input type="text" data-key="hover_color" class="color-picker" data-alpha-enabled="true" value=""/>
								</label>
								<small><?php _e('Leave blank to use default.', 'combar-sab');?></small>
							</div> 

							<div class="inner-row">
								<div class="option-title">
									<?php _e('Icon color', 'combar-sab');?>
								</div>
								<label>
									<input type="text" data-key="icon_color" class="color-picker" data-alpha-enabled="true" value=""/>
								</label>
								<small><?php _e('Leave blank to use default.', 'combar-sab');?></small>
							</div>
							<div class="inner-row">
								<div class="option-title">
									<?php _e('Icon hover color', 'combar-sab');?>
								</div>
								<label>
									<input type="text" data-key="icon_hover" class="color-picker" data-alpha-enabled="true" value=""/>
								</label>
								<small><?php _e('Leave blank to use default.', 'combar-sab');?></small>
							</div>
							<div class="inner-row">
								<div class="option-title">
									<?php _e('Border color', 'combar-sab');?>
								</div>
								<label>
									<input type="text" data-key="border_color" class="color-picker" data-alpha-enabled="true" value=""/>
								</label>
								<small><?php _e('Leave blank to use default.', 'combar-sab');?></small>
							</div>
							<div class="inner-row">
								<div class="option-title">
									<?php _e('Hover border', 'combar-sab');?>
								</div>
								<label>
									<input type="text" data-key="border_hover" class="color-picker" data-alpha-enabled="true" value=""/>
								</label>
								<small><?php _e('Leave blank to use default.', 'combar-sab');?></small>
							</div>
							<div class="inner-row cr checkbox-row">
								<label>
									<input type="checkbox" data-key="gradient" />
									<span><?php _e('Add gradient effect to button', 'combar-sab');?></span>
								</label>
							</div>	
						</div>
						
						<div class="button-options-toggle"><?php _e('Advanced options', 'combar-sab'); ?></div>

                        <div class="row">
                            <div class="inner-row">
                                <label>
									<span><?php _e('Button ID', 'combar-sab');?></span>
									<input type="text" data-key="id" value=""/>
								</label>
                                <small><?php _e('Custom html ID attribute.', 'combar-sab');?></small>
                            </div>
                            <div class="inner-row">
                                <label>
									<span><?php _e('Button Class', 'combar-sab');?></span>
									<input type="text" data-key="class" value=""/>
								</label>
                                <small><?php _e('Custom html class attribute.', 'combar-sab');?></small>
                            </div>
                            <div class="inner-row">
                                <label>
									<span><?php _e('Button custom attribute', 'combar-sab');?></span>
									<input type="text" data-key="attr" value=""/>
								</label>
                                <small>
							<?php printf( __( 'Custom html attributes. Should look like this: %s', 'combar-sab'  ), '<code>key=value;key=value</code>' );?>
							</small>
                            </div>
                            <div class="inner-row">
                                <label>
									<span><?php _e('Button Identifier', 'combar-sab');?></span>
									<input type="text" class="unique" data-key="unique" value="" readonly />
								</label>
                            </div>
                        </div>
                    </div>
                </div />
                <?php $count++;?>
                <input type="hidden" id="count" value="<?php echo esc_attr($count); ?>" />
            </div>

			<div class="bottom-row">
			    <input type="hidden" name="combar_sab_buttons" id="buttonsInput" value="<?php echo esc_attr( $buttons ); ?>"/>
				<?php
					submit_button( __('Save','combar-sab') );
				?>
				<div class="screenSwitcer">
					<span class="currentOption button button-secondary">
						<span class="dashicons dashicons-desktop"></span>
					</span>
					<div class="screenSwitcerOptions desktopView">
						<span class="option acitve" data-class="desktopView">
							<span class="dashicons dashicons-desktop"></span>
							<?php _e('Desktop view', 'combar-sab');?>
						</span>	
						<span class="option" data-class="tabletView">
							<span class="dashicons dashicons-tablet"></span>
							<?php _e('Tablet view', 'combar-sab');?>
						</span>
						<span class="option" data-class="mobileView">
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