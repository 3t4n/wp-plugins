<div class="wrap">

	<div class="inner">
	
		<h2><?php _e('General Settings');?></h2>
		
		<form method="post" action="options.php">
		
			<?php
			settings_errors();
				
			settings_fields('combar_sab_general_setting');
			do_settings_sections( 'combar_sab_general_setting' );
			$settings = get_option('combar_sab_general_setting');
			$plugin_dir = COMBAR_SAB_DIR;	
					
			$settings['lastView'] = combar_sab_setting_deafult($settings['lastView'], 'desktopView');
	
			?>

			<section class="row">
				<div class="row">

					<div class="inner-row cr checkbox-row">
						<div class="option-title">
							<?php _e('Toggle actions', 'combar-sab');?>
						</div>
						<label for="hash">
							<input type="checkbox" id="hash" name="combar_sab_general_setting[hash]" <?php checked( 'on', $settings['hash'] ); ?> />
							<span><?php _e('Support Hash link when toggles are used', 'combar-sab');?></span>
						</label>
						<small><?php
							echo __('Recommended.', 'combar-sab') . ' ';
							printf (__( 'Adds %s to the trigger button.', 'combar-sab'  ), '<code>href="#sab-toggle"</code>' );
							echo '</br>';					
							echo __('Allows browsers to close the toggle by using the "back" button and prevents mobile users from leaving the site by mistake.', 'combar-sab');					
							?>
						</small>
						<br>
						<label for="esc">
							<input type="checkbox" id="esc" name="combar_sab_general_setting[esc]" <?php checked( 'on', $settings['esc'] ); ?> />
							<span><?php _e('Support Escape click to close toggles when used', 'combar-sab');?></span>
						</label>
						<small><?php
							echo __('Recommended.', 'combar-sab') . ' ';				
							echo __('Allows browsers to close the toggle by using the Escape button.', 'combar-sab');					
							?>
						</small>
					</div>

					<div class="inner-row cr checkbox-row multi-cb">
						<div class="option-title">
							<?php _e('Plugin files', 'combar-sab');?>
						</div>

						<label for="fontawesome">
							<input type="checkbox" id="fontawesome" name="combar_sab_general_setting[fontawesome]" <?php checked( 'on', $settings['fontawesome'] ); ?> />
							<span><?php _e('Load FontAwesome 5 on website', 'combar-sab');?></span>
						</label>
						<small><?php
							echo __('If your website theme or plugins already loads FontAwesome 5 you can uncheck this and prevent Sticky Action Buttons from loading it.', 'combar-sab') . '</br>';
							echo __('This will help reduce the page size.', 'combar-sab');					
							?>
						</small>
						<br>
						<label for="minified">
							<input type="checkbox" id="minified" name="combar_sab_general_setting[minified]" <?php checked( 'on', $settings['minified'] ); ?> />
							<span><?php _e('Use minified CSS and JS files', 'combar-sab');?></span>
						</label>
						<small><?php
							echo __('Recommended.', 'combar-sab') . ' ';
							echo __('This will help reduce the page size.', 'combar-sab');
							echo '</br>';					
							echo __('Uncheck only if you experienced any compatibility issues.', 'combar-sab');					
							?>
						</small>
					</div>

					<div class="inner-row cr radio-row">
						<div class="radio-row-title">
							<?php _e('Tablet dislpay as...', 'combar-sab');?>
						</div>
						<label for="tablet_0">
							<input type="radio" id="tablet_0" name="combar_sab_general_setting[tablet]" value="mob" <?php checked( 'mob', $settings['tablet'] ); ?> />
							<span><?php _e('Mobile', 'combar-sab');?></span>
						</label>
						<label for="tablet_1">
							<input type="radio" id="tablet_1" name="combar_sab_general_setting[tablet]" value="desk" <?php checked( 'desk', $settings['tablet'] ); ?> />
							<span><?php _e('Desktop', 'combar-sab');?></span>
						</label>
					</div>
					
					<div class="inner-row">
						<label for="nopage">
					<span><?php _e('Hide action buttons on pages', 'combar-sab');?></span>
					<input type="text" id="nopage" name="combar_sab_general_setting[nopage]" value="<?php echo esc_attr( $settings['nopage'] );?>"/>
					</label>
						<small>
						<?php
							echo __('Comma separated list of pages ID.', 'combar-sab') . '</br>';
							echo __('For example: 13,22,72,105.', 'combar-sab');					
						?>
						</small>
					</div>	
					
					<div class="inner-row cr checkbox-row">
						<div class="option-title">
							<?php _e('Uninstall actions', 'combar-sab');?>
						</div>
						<label for="uninstall_delete">
							<input type="checkbox" id="uninstall_delete" name="combar_sab_general_setting[uninstall_delete]" <?php checked( 'on', $settings['uninstall_delete'] ); ?> />
							<span><?php _e('Delete plugin data on uninstall', 'combar-sab');?></span>
						</label>
					</div>

				
				</div>
				
			</section>



			<div class="bottom-row">
				<input class="lastView" type="hidden" name="combar_sab_general_setting[lastView]" value="<?php echo esc_attr( $settings['lastView'] ); ?>"/>
				<div class="bottom-buttons">
				<?php
					submit_button( __('Save','combar-sab') );
				?>
				<input type="button" class="button button-secondary" id="restart_option"
					value="<?php _e('Restart to default', 'combar-sab');?>" 
					data-option="combar_sab_general_setting" data-nonce="<?php echo wp_create_nonce( 'sab-restart' )?>">
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