<?php
/*************
 * Admin Options Page Settings
*************/

function smfbvv_options_page () {

	global $smfbvv_options;



	ob_start(); ?>
	<div class="wrap">
		<h2><?php _e('ViewVox Social Media Follow Buttons Options','smfbvv_domain');?></h2>

		<form method="post" action="options.php">

			<?php settings_fields('smfbvv_settings_group'); ?>

			<!--- Option Settings --->

			<h4><?php _e('Choose where to display on your site. If you choose to disable on all you can still use the settings below to display in the ViewVox Social Media Widget in any sidebar. </br> All settings except the Icon Size and Social Media urls are disabled in the widget.', 'smfbvv_domain'); ?></h4>
			<p>
				<?php $locations = array(
					'none'=>__('Disable on all single posts and pages', 'smfbvv_domain' ),
					'home'=>__('Enable on home page only', 'smfbvv_domain' ),
					'all'=>__('Enable on all single posts and pages', 'smfbvv_domain' ),
					'posts'=>__('Enable on all single posts', 'smfbvv_domain' ),
					'pages'=>__('Enable on all single pages','smfbvv_domain' )
				); ?>
				<select name="smfbvv_settings[location]" id="smfbvv_settings[location]">
					<?php foreach($locations as $location) { ?>
						<?php if($smfbvv_options['location'] == $location) { $selected = 'selected="selected"';} else { $selected = '';} ?>
						<option value="<?php echo $location; ?>"<?php echo $selected; ?>> <?php echo $location; ?></option>
					<?php } ?>
				</select>

			</p>

			<p>
				<input id="smfbvv_settings[position_above]" name="smfbvv_settings[position_above]" type="checkbox" value="1" <?php checked('1',isset($smfbvv_options['position_above']));?>/>
				<label class="description" for="smfbvv_settings[position_above]"><?php _e('Position above content','smfbvv_domain');?></label>
			</p>
			<p>
				<input id="smfbvv_settings[position_below]" name="smfbvv_settings[position_below]" type="checkbox" value="1" <?php checked('1',isset($smfbvv_options['position_below']));?>/>
				<label class="description" for="smfbvv_settings[position_below]"><?php _e('Position below content','smfbvv_domain');?></label>
			</p>

			<p>
				<input id="smfbvv_settings[include_site_name]" name="smfbvv_settings[include_site_name]" type="checkbox" value="1" <?php checked('1', isset($smfbvv_options['include_site_name']));?>/>
				<label class="description" for="smfbvv_settings[include_site_name]"><?php _e('Include Site Name in Follow text - eg Follow ViewVox on','smfbvv_domain');?></label>
			</p>

			<h4><?php _e('Follow Message', 'smfbvv_domain'); ?></h4>
			<p>
				<input id="smfbvv_settings[follow_message]" name="smfbvv_settings[follow_message]" type="text" placeholder="Follow" value="<?php echo $smfbvv_options['follow_message']; ?>"/>
				<label class="description" for="smfbvv_settings[follow_message]"><?php _e('Enter your Follow message', 'smfbvv_domain'); ?></label>
			</p>

			<h4><?php _e('Customise Appearance', 'smfbvv_domain'); ?></h4>
			<p>
				<?php $sizes = array(
					'16'=>__('Small', 'smfbvv_domain' ),
					'32'=>__('Medium', 'smfbvv_domain' ),
					'64'=>__('Large','smfbvv_domain' )
				); ?>
				<select name="smfbvv_settings[size]" id="smfbvv_settings[size]">
					<?php foreach($sizes as $size => $icon ) { ?>
						<?php if($smfbvv_options['size'] == $size) { $selected = 'selected="selected"';} else { $selected = '';} ?>
						<option value="<?php echo $size; ?>"<?php echo $selected; ?>> <?php echo $icon; ?></option>
					<?php } ?>

				</select>
				<label class="description" for="smfbvv_settings[size]"><?php _e('Choose icon size','smfbvv_domain');?></label>

			</p>

			<p>
				<input id="smfbvv_settings[background]" name="smfbvv_settings[background]" type="text" class="vv-color-field" value="<?php echo $smfbvv_options['background']; ?>"/>
				<label class="vv-description" for="smfbvv_settings[background]"><?php _e('Change the background colour', 'smfbvv_domain'); ?></label>

			</p>

			<p>
				<input id="smfbvv_settings[font_color]" name="smfbvv_settings[font_color]" type="text" class="vv-color-field" value="<?php echo $smfbvv_options['font_color']; ?>"/>
				<label class="vv-description" for="smfbvv_settings[font_color]"><?php _e('Change the font colour', 'smfbvv_domain'); ?></label>

			</p>

			<p>
				<input id="smfbvv_settings[font_size]"  name="smfbvv_settings[font_size]" size="5" type="text" value="<?php echo $smfbvv_options['font_size']; ?>"/>
				<label class="description" for="smfbvv_settings[font_size]"><?php _e('Change the font size', 'smfbvv_domain'); ?></label>

			</p>

			<p>
				<input id="smfbvv_settings[font_align]" name="smfbvv_settings[font_align]" size="5" type="text" value="<?php echo $smfbvv_options['font_align']; ?>"/>
				<label class="description" for="smfbvv_settings[font_align]"><?php _e('Align font - enter center left or right - else will use theme default', 'smfbvv_domain'); ?></label>

			</p>

			<p>
				<input id="smfbvv_settings[padding]" name="smfbvv_settings[padding]" size="5" type="text" value="<?php echo $smfbvv_options['padding']; ?>"/>
				<label class="description" for="smfbvv_settings[padding]"><?php _e('Padding - enter value for padding eg 10px - else will use theme default', 'smfbvv_domain'); ?></label>

			</p>

			<p>
				<input id="smfbvv_settings[icon_padding]" name="smfbvv_settings[icon_padding]" size="5" type="text" value="<?php echo $smfbvv_options['icon_padding']; ?>"/>
				<label class="description" for="smfbvv_settings[icon_padding]"><?php _e('Icon Padding - enter value for left padding eg 10px - else will use theme default', 'smfbvv_domain'); ?></label>

			</p>

			<!--- Social Media Links --->
			<h4><?php _e('Add your social media links', 'smfbvv_domain'); ?></h4>

			<p>
				<input id="smfbvv_settings[facebook_url]" name="smfbvv_settings[facebook_url]" size="26" type="text" value="<?php echo $smfbvv_options['facebook_url']; ?>"/>
				<label class="description" for="smfbvv_settings[facebook_url]"><?php _e('Enter your Facebook URL', 'smfbvv_domain'); ?></label>

				<input id="smfbvv_settings[facebook]" name="smfbvv_settings[facebook]" type="checkbox" value="1" <?php checked('1',isset($smfbvv_options['facebook']));?>/>
				<label class="description" for="smfbvv_settings[facebook]"><?php _e('Display the Follow Me on Facebook link','smfbvv_domain');?></label>
			</p>

			<p>
				<input id="smfbvv_settings[twitter_url]" name="smfbvv_settings[twitter_url]" size="26" type="text" value="<?php echo $smfbvv_options['twitter_url']; ?>"/>
				<label class="description" for="smfbvv_settings[twitter_url]"><?php _e('Enter your Twitter URL', 'smfbvv_domain'); ?></label>

				<input id="smfbvv_settings[twitter]" name="smfbvv_settings[twitter]" type="checkbox" value="1" <?php checked('1',isset($smfbvv_options['twitter']));?>/>
				<label class="description" for="smfbvv_settings[twitter]"><?php _e('Display the Follow Me on Twitter link','smfbvv_domain');?></label>
			</p>

			<p>
				<input id="smfbvv_settings[linkedin_url]" name="smfbvv_settings[linkedin_url]" size="26" type="text" value="<?php echo $smfbvv_options['linkedin_url']; ?>"/>
				<label class="description" for="smfbvv_settings[linkedin_url]"><?php _e('Enter your linkedin URL', 'smfbvv_domain'); ?></label>

				<input id="smfbvv_settings[linkedin]" name="smfbvv_settings[linkedin]" type="checkbox" value="1" <?php checked('1',isset($smfbvv_options['linkedin']));?>/>
				<label class="description" for="smfbvv_settings[linkedin]"><?php _e('Display the Follow Me on linkedin link','smfbvv_domain');?></label>
			</p>

			<p>
				<input id="smfbvv_settings[youtube_url]" name="smfbvv_settings[youtube_url]" size="26" type="text" value="<?php if(isset($smfbvv_options['youtube_url'])) {echo $smfbvv_options['youtube_url']; }; ?>"/>
				<label class="description" for="smfbvv_settings[youtube_url]"><?php _e('Enter your YouTube URL', 'smfbvv_domain'); ?></label>

				<input id="smfbvv_settings[youtube]" name="smfbvv_settings[youtube]" type="checkbox" value="1" <?php checked('1',isset($smfbvv_options['youtube']));?>/>
				<label class="description" for="smfbvv_settings[youtube]"><?php _e('Display the Follow Me on YouTube link','smfbvv_domain');?></label>
			</p>

			<p>
				<input id="smfbvv_settings[google_url]" name="smfbvv_settings[google_url]" size="26" type="text" value="<?php if(isset($smfbvv_options['google_url'])) {echo $smfbvv_options['google_url']; }; ?>"/>
				<label class="description" for="smfbvv_settings[google_url]"><?php _e('Enter your Google+ URL', 'smfbvv_domain'); ?></label>

				<input id="smfbvv_settings[google]" name="smfbvv_settings[google]" type="checkbox" value="1" <?php checked('1',isset($smfbvv_options['google']));?>/>
				<label class="description" for="smfbvv_settings[google]"><?php _e('Display the Follow Me on Google+ link','smfbvv_domain');?></label>
			</p>

			<p>
				<input id="smfbvv_settings[pinterest_url]" name="smfbvv_settings[pinterest_url]" size="26" type="text" value="<?php if(isset($smfbvv_options['pinterest_url'])) {echo $smfbvv_options['pinterest_url']; }; ?>"/>
				<label class="description" for="smfbvv_settings[pinterest_url]"><?php _e('Enter your Pinterest URL', 'smfbvv_domain'); ?></label>

				<input id="smfbvv_settings[pinterest]" name="smfbvv_settings[pinterest]" type="checkbox" value="1" <?php checked('1',isset($smfbvv_options['pinterest']));?>/>
				<label class="description" for="smfbvv_settings[pinterest]"><?php _e('Display the Follow Me on Pinterest link','smfbvv_domain');?></label>
			</p>

			<p>
				<input id="smfbvv_settings[blogger_url]" name="smfbvv_settings[blogger_url]" size="26" type="text" value="<?php if(isset($smfbvv_options['blogger_url'])) {echo $smfbvv_options['blogger_url']; }; ?>"/>
				<label class="description" for="smfbvv_settings[blogger_url]"><?php _e('Enter your Blogger URL', 'smfbvv_domain'); ?></label>

				<input id="smfbvv_settings[blogger]" name="smfbvv_settings[blogger]" type="checkbox" value="1" <?php checked('1',isset($smfbvv_options['blogger']));?>/>
				<label class="description" for="smfbvv_settings[blogger]"><?php _e('Display the Follow Me on Blogger link','smfbvv_domain');?></label>
			</p>

			<p>
				<input id="smfbvv_settings[tumblr_url]" name="smfbvv_settings[tumblr_url]" size="26" type="text" value="<?php if(isset($smfbvv_options['tumblr_url'])) {echo $smfbvv_options['tumblr_url']; }; ?>"/>
				<label class="description" for="smfbvv_settings[tumblr_url]"><?php _e('Enter your Tumblr URL', 'smfbvv_domain'); ?></label>

				<input id="smfbvv_settings[tumblr]" name="smfbvv_settings[tumblr]" type="checkbox" value="1" <?php checked('1',isset($smfbvv_options['tumblr']));?>/>
				<label class="description" for="smfbvv_settings[tumblr]"><?php _e('Display the Follow Me on Tumblr link','smfbvv_domain');?></label>
			</p>

			<p>
				<input id="smfbvv_settings[digg_url]" name="smfbvv_settings[digg_url]" size="26" type="text" value="<?php if(isset($smfbvv_options['digg_url'])) {echo $smfbvv_options['digg_url']; }; ?>"/>
				<label class="description" for="smfbvv_settings[digg_url]"><?php _e('Enter your Digg URL', 'smfbvv_domain'); ?></label>

				<input id="smfbvv_settings[digg]" name="smfbvv_settings[digg]" type="checkbox" value="1" <?php checked('1',isset($smfbvv_options['digg']));?>/>
				<label class="description" for="smfbvv_settings[digg]"><?php _e('Display the Follow Me on Digg link','smfbvv_domain');?></label>
			</p>

			<p>
				<input id="smfbvv_settings[stumble_url]" name="smfbvv_settings[stumble_url]" size="26" type="text" value="<?php if(isset($smfbvv_options['stumble_url'])) {echo $smfbvv_options['stumble_url']; }; ?>"/>
				<label class="description" for="smfbvv_settings[stumble_url]"><?php _e('Enter your Stumbleupon URL', 'smfbvv_domain'); ?></label>

				<input id="smfbvv_settings[stumble]" name="smfbvv_settings[stumble]" type="checkbox" value="1" <?php checked('1',isset($smfbvv_options['stumble']));?>/>
				<label class="description" for="smfbvv_settings[stumble]"><?php _e('Display the Follow Me on Stumbleupon link','smfbvv_domain');?></label>
			</p>


			<!--- END Social Media Links --->

			<!--- CUSTOM Social Media Link --->

			<h4><?php _e('Add a custom social media link', 'smfbvv_domain'); ?></h4>

			<p>

				<input id="smfbvv_settings[upload]" name="smfbvv_settings[upload]" type="checkbox" value="1" <?php checked('1',isset($smfbvv_options['upload']));?>/>
				<label class="description" for="smfbvv_settings[upload]"><?php _e('Display the upload link','smfbvv_domain');?></label>
			</p>
				<label for="smfbvv_settings[upload_image]">
					<input id="smfbvv_settings[upload_image]" type="text" size="56" class="upload_image" name="smfbvv_settings[upload_image]" value="<?php echo $smfbvv_options['upload_image']; ?>" />
					<input id="smfbvv_settings[upload_image_button]" class="button" type="button" value="Upload Image" />
					<br />Enter a URL or upload an image - must be correct size to match icon size setting above - Small = 16x16, Medium = 32x32, Large = 64x64
				</label>


			<p>
				<input id="smfbvv_settings[custom_url]" name="smfbvv_settings[custom_url]" size="26" type="text" value="<?php echo $smfbvv_options['custom_url']; ?>"/>
				<label class="description" for="smfbvv_settings[custom_url]"><?php _e('Enter custom URL', 'smfbvv_domain'); ?></label>

			</p>

			<!--- END CUSTOM Social Media Link --->

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Options', 'smfbvv_domain'); ?>"/>
			</p>

		</form>

	</div>
	<?php
	echo ob_get_clean();
}

function smfbvv_add_options_link () {
	add_options_page ( 'Social Media Follow Buttons', 'ViewVox Social Media', 'manage_options', 'smfbvv-options', 'smfbvv_options_page' );
}

add_action('admin_menu', 'smfbvv_add_options_link');

function smfbvv_register_settings () {
	register_setting('smfbvv_settings_group', 'smfbvv_settings');
}
add_action('admin_init', 'smfbvv_register_settings');



