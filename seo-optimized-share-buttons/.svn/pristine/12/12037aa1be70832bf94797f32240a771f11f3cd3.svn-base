<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="apss-wrapper-block">

	<?php $options = get_option( APSS_SETTING_NAME );
	if ( isset( $_SESSION['apss_message'] ) ) {
		?>
		<div class="apss-message">
			<p><?php
				echo $_SESSION['apss_message'];
				unset( $_SESSION['apss_message'] );
				?></p>
			</div>
			<?php } ?>

			<div class="apps-wrap">
				<form method="post" action="<?php echo admin_url() . 'admin-post.php' ?>">
					<input type="hidden" name="action" value="apss_save_options"/>

					<ul class="apss-setting-tabs clearfix">
						<li><a href="javascript:void(0)" id="apss-social-networks" class="apss-tabs-trigger apss-active-tab	"><?php _e( 'Social Networks', 'accesspress-social-share' ); ?></a></li>
						<li><a href="javascript:void(0)" id="apss-share-options" class="apss-tabs-trigger "><?php _e( 'Display Settings', 'accesspress-social-share' ) ?></a></li>
						<li><a href="javascript:void(0)" id="apss-display-settings" class="apss-tabs-trigger"><?php _e( 'Design & Placement', 'accesspress-social-share' ); ?></a></li>
						<li><a href="javascript:void(0)" id="apss-miscellaneous" class="apss-tabs-trigger"><?php _e( 'Miscellaneous', 'accesspress-social-share' ); ?></a></li>
						<!--<li><a href="javascript:void(0)" id="apss-about" class="apss-tabs-trigger"><?php // _e( 'Not in use currently', 'accesspress-social-share' ); ?></a></li>-->
					</ul>

					<div class='apss-tab-contents-wrapper'>
						<div class="apss-wrapper">

							<div class="apss-tab-contents apss-social-networks" id="tab-apss-social-networks" style='display:block'>
								<h2><?php _e( 'Social Media chooser:', 'accesspress-social-share' ); ?> </h2>
								<span class="social-text"><?php _e( 'Please choose the social media you want to display. Also you can order these social media\'s by drag and drop:', 'accesspress-social-share' ); ?></span>
								<div class="apps-opt-wrap clearfix">
									<?php
									$label_array = array( 
										'facebook' => ' <span class="media-icon"><i class="fa fa-facebook"></i></span> Facebook',
										'twitter' => ' <span class="media-icon"><i class="fa fa-twitter"></i></span> Twitter',
										'google-plus' => '<span class="media-icon"><i class="fa fa-google-plus"></i></span> Google Plus',
										'pinterest' => '<span class="media-icon"> <i class="fa fa-pinterest"></i> </span>Pinterest',
										'linkedin' => '<span class="media-icon"><i class="fa fa-linkedin"></i></span> Linkedin',
										'digg' => '<span class="media-icon"><i class="fa fa-digg"></i></span> Digg',
										'email' => '<span class="media-icon"><i class="fa  fa-envelope"></i></span> Email',
										'print' => '<span class="media-icon"><i class="fa fa-print"></i> </span>Print',
										);
										?>
										<?php foreach ( $options['social_networks'] as $key => $val ) {
											?>
											<div class="apss-option-wrapper">
												<div class="apss-option-field">
													<label class="clearfix"><span class="left-icon"><i class="fa fa-arrows"></i></span><span class="social-name"><?php echo $label_array[$key]; ?></span><input type="checkbox" data-key='<?php echo $key; ?>' name="social_networks[<?php echo $key; ?>]" value="1" <?php if ( $val == '1' ) {
														echo "checked='checked'";
													} ?> /></label>
												</div>
											</div>
											<?php } ?>
										</div>
										<input type="hidden" name="apss_social_newtwork_order" id='apss_social_newtwork_order' value="<?php echo implode( ',', array_keys( $options['social_networks'] ) ); ?>"/>
									</div>

									<div class="apss-tab-contents apss-share-options" id="tab-apss-share-options" style='display:none'>
										<h2><?php _e( 'Display Settings', 'accesspress-social-share' ); ?> </h2>
										<span class="social-text"><?php _e( 'Please choose the options where you want to display social share buttons:', 'accesspress-social-share' ); ?></span>
										<p><input type="checkbox" id="apss_posts" value="post" name="apss_share_settings[share_options][]" <?php if ( in_array( "post", $options['share_options'] ) || in_array( "posts", $options['share_options'] ) ) {
											echo "checked='checked'";
										} ?> ><label for="apss_posts"><?php _e( 'Posts', 'accesspress-social-share' ); ?> </label></p>
										<p><input type="checkbox" id="apss_pages" value="page" name="apss_share_settings[share_options][]" <?php if ( in_array( "page", $options['share_options'] ) || in_array( "pages", $options['share_options'] ) ) {
											echo "checked='checked'";
										} ?> ><label for="apss_pages"><?php _e( 'Pages', 'accesspress-social-share' ); ?> </label></p>

										<p><input type="checkbox" id="apss_front_page" value="front_page" name="apss_share_settings[share_options][]" <?php if ( in_array( "front_page", $options['share_options'] ) ) {
											echo "checked='checked'";
										} ?> ><label for="apss_front_page"><?php _e( 'Front Page', 'accesspress-social-share' ); ?></label></p>
										<p><input type="checkbox" id="apss_archives" value="archives" name="apss_share_settings[share_options][]" <?php if ( in_array( "archives", $options['share_options'] ) ) {
											echo "checked='checked'";
										} ?> ><label for="apss_archives"><?php _e( 'Archives', 'accesspress-social-share' ); ?></label></p>

										<p><input type="checkbox" id="apss_attachement" value="attachment" name="apss_share_settings[share_options][]" <?php if ( in_array( "attachment", $options['share_options'] ) ) {
											echo "checked='checked'";
										} ?> ><label for="apss_attachment"><?php _e( 'Attachment pages', 'accesspress-social-share' ); ?></label></p>

										<p><input type="checkbox" id="apss_categories" value="categories" name="apss_share_settings[share_options][]" <?php if ( in_array( "categories", $options['share_options'] ) ) {
											echo "checked='checked'";
										} ?> ><label for="apss_categories"><?php _e( 'Categories', 'accesspress-social-share' ); ?></label></p>
										<p><input type="checkbox" id="apss_all" value="all" name="apss_share_settings[share_options][]" <?php if ( in_array( "all", $options['share_options'] ) ) {
											echo "checked='checked'";
										} ?> ><label for="apss_all"><?php _e( 'Other (search results, etc)', 'accesspress-social-share' ); ?></label></p>

									</div>

									<div class="apss-tab-contents apss-display-settings" id="tab-apss-display-settings" style='display:none'>
										<div class=' apss-display-positions'>
											<h2><?php _e( 'Button Placement', 'accesspress-social-share' ); ?></h2>
											<span class='social-text'><?php _e( 'Please choose the option where you want to display the social share buttons:', 'accesspress-social-share' ); ?></span>
											<p><input type="radio" id="apss_below_content" name="apss_share_settings[social_share_position_options]" value="below_content" <?php if ( $options['share_positions'] == 'below_content' ) {
												echo "checked='checked'";
											} ?> /><label for='apss_below_content'><?php _e( 'Below content', 'accesspress-social-share' ); ?></label></p>
											<p><input type="radio" id="apss_above_content" name="apss_share_settings[social_share_position_options]"/ value="above_content" <?php if ( $options['share_positions'] == 'above_content' ) {
												echo "checked='checked'";
											} ?> /><label for='apss_above_content'><?php _e( 'Above content', 'accesspress-social-share' ); ?></label></p>
											<p><input type="radio" id="apss_below_above_content" id="below_above_content" name="apss_share_settings[social_share_position_options]" value="on_both" <?php if ( $options['share_positions'] == 'on_both' ) {
												echo "checked='checked'";
											} ?> /><label for='apss_below_above_content'><?php _e( 'Both(Below content and Above content)', 'accesspress-social-share' ); ?></label></p>
										</div>
										<div class=" apss-icon-sets">
											<h2 style="margin-top:50px;"><?php _e( 'Pick a design! ', 'accesspress-social-share' ); ?> </h2>
											<?php _e( '', 'accesspress-social-share' ); ?>
											<?php for ( $i = 4; $i <= 4; $i++ ) { ?>
											<p><input id="apss_icon_set_<?php echo $i; ?>" checked="checked" value="<?php echo $i; ?>" name="apss_share_settings[social_icon_set]" type="radio" <?php if ( $options['social_icon_set'] == $i ) {
												echo "checked='checked'"; } ?> >
												<label for="apss_icon_set_<?php echo $i; ?>"><span class="apss_demo_icon apss_demo_icons_<?php echo $i; ?>"></span><?php _e( "Theme $i", 'accesspress-social-share' ); ?><div class="apss-theme-image"><img src='<?php echo APSS_IMAGE_DIR . "/theme/theme$i.jpg"; ?>'/></div></label></p>
												<?php } ?>
											</div>
										</div>

										<div class="apss-tab-contents apss-miscellaneous" id="tab-apss-miscellaneous" style='display:none'>
											<div class="apss-share-text-settings clearfix">
												<h2>Use your own CSS & JS</h2>
												<p><strong>Note:</strong> Only use this option if you have your own CSS & JS added, otherwise there will be no design.</p>
												<h4><?php _e( 'Disable the plugins frontend assets?', 'accesspress-social-share' ); ?> </h4>
												<div class="misc-opt"><input type="radio" id='disable_frontend_assets_n' name="apss_share_settings[disable_frontend_assets]" value="0" <?php if ( isset( $options['disable_frontend_assets'] ) && $options['disable_frontend_assets'] == '0' ) {
													echo "checked='checked'";
												} ?> /><label for="disable_frontend_assets_n"><?php _e( 'No', 'accesspress-social-share' ); ?></label></div>
												<div class="misc-opt"><input type="radio" id='disable_frontend_assets_y' name="apss_share_settings[disable_frontend_assets]" value="1" <?php if ( isset( $options['disable_frontend_assets'] ) && $options['disable_frontend_assets'] == '1' ) {
													echo "checked='checked'";
												} ?> /><label for="disable_frontend_assets_y"><?php _e( 'Yes', 'accesspress-social-share' ); ?></label></div>
												<br />
												<div class="apss_notes_cache_settings">
													<?php _e( 'Please set this value if you don\'t want to use our frontend assets (js and css files).', 'accesspress-social-share' ); ?>
												</div>
											</div>
											<br />
											<h2 style="margin-top:50px;">Share Settings</h2>
											<div class="apss-share-text-settings clearfix">
												<?php _e( 'Share text:', 'accesspress-social-share' ); ?> <input type="text" name="apss_share_settings[share_text]"  value="<?php if ( isset( $options['share_text'] ) ) {
													echo $options['share_text'];
												} ?>" />
												<div class="apss_notes_cache_settings">
													<?php _e( 'Please enter the share text to make it appear above social share icons. Leave blank if you don\'t want to use share text.', 'accesspress-social-share' ); ?>
												</div>
											</div>
											<div class="apss-counter-settings clearfix">
												<h2 style="margin-top:50px;">Social counter</h2>
												<p><strong>Note: </strong>Studies show that websites with zero shares, are better off not showing how many have previously shared the site, since low share amount <a href="https://vwo.com/blog/removing-social-sharing-buttons-from-ecommerce-product-page-increase-conversions/">decreases conversion</a>.</p>


												<h4><?php _e( 'Social share counter enable?', 'accesspress-social-share' ); ?> </h4>
												<div class="misc-opt"><input type="radio" id='counter_enable_options_n' name="apss_share_settings[counter_enable_options]" value="0" <?php if ( $options['counter_enable_options'] == '0' ) {
													echo "checked='checked'";
												} ?> /><label for="counter_enable_options_n"><?php _e( 'No', 'accesspress-social-share' ); ?></label></div>
												<div class="misc-opt"><input type="radio" id='counter_enable_options_y' name="apss_share_settings[counter_enable_options]" value="1" <?php if ( $options['counter_enable_options'] == '1' ) {
													echo "checked='checked'";
												} ?> /><label for="counter_enable_options_y"><?php _e( 'Yes', 'accesspress-social-share' ); ?></label></div>
											</div>

											<div class="apss-counter-api-options apss-counter-settings clearfix" style="<?php if(isset($options['counter_enable_options']) && $options['counter_enable_options'] == '1'){ echo 'display:block'; }else{ echo 'display:none'; } ?>">
												<div class='apss-counter-api'>
													<input type="radio" id='apss_twitter_counter_option' name="apss_share_settings[twitter_counter_api]" value="1" <?php if(isset($options['twitter_counter_api'])){ if($options['twitter_counter_api'] == '1') {
														echo "checked='checked'";
													} } ?> />
													<label for="apss_twitter_counter_option"><?php _e( "Don't show Twitter share counts", 'accesspress-social-share' ); ?></label>
													<div class="apss_notes_cache_settings"> Please select this option if you don't want to show twitter share counts.</div>
												</div>

												<div class='apss-counter-api'>
													<input type="radio" id='apss_twitter_counter_option_1' name="apss_share_settings[twitter_counter_api]" value="2" <?php if(isset($options['twitter_counter_api'])){ if($options['twitter_counter_api'] == '2') {
														echo "checked='checked'";
													} } ?> />
													<label for="apss_twitter_counter_option_1"><?php _e( 'Use', 'accesspress-social-share'); ?> <a href='http://newsharecounts.com' target='_blank'>NewShareCounts</a><?php _e( ' to show Twitter share counts', 'accesspress-social-share' ); ?></label>
													<div class="apss_notes_cache_settings"> To use newsharecount public API, you have to enter your website url <?php echo site_url(); ?> and sign in using Twitter at their <a href='http://newsharecounts.com/' target='_blank'>website</a>.</div>
												</div>

												<div class='apss-counter-api'>
													<input type="radio" id='apss_twitter_counter_option_2' name="apss_share_settings[twitter_counter_api]" value="3" <?php if(isset($options['twitter_counter_api'])){ if($options['twitter_counter_api'] == '3') {
														echo "checked='checked'";
													}} ?> /><label for="apss_twitter_counter_option_2"><?php _e( 'Use', 'accesspress-social-share'); ?> <a href='	http://opensharecount.com/' target='_blank'>OpenShareCount</a><?php _e( ' to show Twitter share counts', 'accesspress-social-share' ); ?></label>
													<div class="apss_notes_cache_settings"> To use opensharecount public API, you have to sign up and register your website url <?php echo site_url(); ?> at their <a href='http://opensharecount.com/' target='_blank'>website</a>. </div>
												</div>
												<div class="apss_notes_cache_settings"> Note: If you switch the API please don't forget to clear cache for fetching new share counts.</div>

												<div class="apss_counter-api">
													<h4>If facebook counter is not working. Please setup the facebook APP and enter required details below.</h4>
													<div class='apss_input_wrapper'>
														<label for=apss_facebook_app_id"">APP ID: </label><input type='text' id="apss_facebook_app_id" name='apss_share_settings[api_configuration][facebook][app_id]' value="<?php if ( isset( $options['api_configuration']['facebook']['app_id'] ) ) { echo $options['api_configuration']['facebook']['app_id']; } ?>" />
														<div class="apss_notes_cache_settings">Please go to <a href="https://developers.facebook.com/" target="_blank">https://developers.facebook.com/</a> and create an app and get the App ID.</div>
													</div>
													<div class='apss_input_wrapper'>
														<label for=apss_facebook_app_secret"">APP Secret: </label><input type='text' id="apss_facebook_app_secret" name='apss_share_settings[api_configuration][facebook][app_secret]' value="<?php if ( isset( $options['api_configuration']['facebook']['app_secret'] ) ) { echo $options['api_configuration']['facebook']['app_secret']; } ?>" />
														<div class="apss_notes_cache_settings">Please go to <a href="https://developers.facebook.com/" target="_blank">https://developers.facebook.com/</a> and create an app and get the App Secret.</div>
													</div>
													<div class="apss_notes_cache_settings">
														<b>Please note that you should make your APP live.</b>
														You can get the details instruction for creating facebook app <a href='http://demo.accesspressthemes.com/wordpress-plugins/accesspress-social-share/?p=89' target="_blank">here</a>.
													</div>
												</div>
											</div>

											<div class="apss-total-counter-settings clearfix">
												<h4><?php _e( 'Social share total counter enable?', 'accesspress-social-share' ); ?> </h4>
												<div class="misc-opt"><input type="radio" id='total_counter_enable_options_n' name="apss_share_settings[total_counter_enable_options]" value="0" <?php if ( isset( $options['total_counter_enable_options'] ) && $options['total_counter_enable_options'] == '0' ) {
													echo "checked='checked'";
												} ?> /><label for="total_counter_enable_options_n"><?php _e( 'No', 'accesspress-social-share' ); ?></label></div>
												<div class="misc-opt"><input type="radio" id='total_counter_enable_options_y' name="apss_share_settings[total_counter_enable_options]" value="1" <?php if ( isset( $options['total_counter_enable_options'] ) && $options['total_counter_enable_options'] == '1' ) {
													echo "checked='checked'";
												} ?> /><label for="total_counter_enable_options_y"><?php _e( 'Yes', 'accesspress-social-share' ); ?></label></div>
											</div>

											<div class='apss_cache_enable_opt'>
												<h2 style="margin-top:50px;">If you've moved from HTTP to HTTPS</h2>
												<h4><?php _e( 'Fetch the share counts from HTTP url as well? ', 'accesspress-social-share' ); ?> </h4>
												<div class='misc-opt'>
													<input type="radio" id='enable_http_count_yes' name="apss_share_settings[enable_http_count]" value="1" <?php if ( isset($options['enable_http_count']) && $options['enable_http_count'] == '1' ) { echo "checked='checked'"; } ?> />
													<label for='enable_http_count_yes'><?php _e('Yes', 'accesspress-social-share'); ?></label>
												</div>
												<div class='misc-opt'>
													<input type="radio" id='enable_http_count_no' name="apss_share_settings[enable_http_count]" value="0" <?php if ( isset($options['enable_http_count']) && $options['enable_http_count'] == '0' ) { echo "checked='checked'"; } ?> />
													<label for='enable_http_count_no'><?php _e('No', 'accesspress-social-share'); ?></label>
												</div>
												<br />
												<div class="apss_notes_cache_settings">
													<?php _e( '<b>Note:</b> Please select this option if you have moved your site from HTTP to HTTPS', 'accesspress-social-share' ); ?>
												</div>
											</div>
											<br />

											<div class="apss-dialog-boxs clearfix">
												<h2 style="margin-top:50px;">Open share in box in new window?</h2>
												<p><strong>Note:</strong> If you use the Popup window settings, some browsers and ad blockers might block it, making it impossible for the user to share your page.</p>
												<h4><?php _e( 'Social share link options:', 'accesspress-social-share' ); ?> </h4>
												<div class="misc-opt"><input type="radio" id='dialog_box_options_1' name="apss_share_settings[dialog_box_options]" value="0" <?php if ( $options['dialog_box_options'] == '0' ) {
													echo "checked='checked'";
												} ?> /><label for="dialog_box_options_1"><?php _e( 'Open in same window', 'accesspress-social-share' ); ?></label></div>
												<div class="misc-opt"><input type="radio" id='dialog_box_options_2' name="apss_share_settings[dialog_box_options]" value="1" <?php if ( $options['dialog_box_options'] == '1' ) {
													echo "checked='checked'";
												} ?> /><label for="dialog_box_options_2"><?php _e( 'Open in new window/Tab', 'accesspress-social-share' ); ?></label></div>

												<div class="misc-opt"><input type="radio" id='dialog_box_options_3' name="apss_share_settings[dialog_box_options]" value="2" <?php if ( $options['dialog_box_options'] == '2' ) {
													echo "checked='checked'";
												} ?> /><label for="dialog_box_options_3"><?php _e( 'Open in popup window', 'accesspress-social-share' ); ?></label></div>
											</div>


											<div class='apss_cache_enable_opt'>
												<h2 style="margin-top:50px;">Caching</h2>
												<p>
													Pagespeed is an important part of your SEO, so please make sure you have other caching installed before disabling this. 
													We recommend <a href="https://wordpress.org/plugins/w3-total-cache/" target="_blank">W3 Cache</a> or <a href="https://wordpress.org/plugins/wp-super-cache/" target="_blank">Super Cache</a>
												</p>
												<h4><?php _e( 'Enable cache? ', 'accesspress-social-share' ); ?> </h4>
												<div class='misc-opt'>
													<input type="radio" id='enable_cache_yes' name="apss_share_settings[enable_cache]" value="1" <?php if ( isset($options['enable_cache']) && $options['enable_cache'] == '1' ) { echo "checked='checked'"; } ?> />
													<label for='enable_cache_yes'><?php _e('Yes', 'accesspress-social-share'); ?></label>
												</div>
												<div class='misc-opt'>
													<input type="radio" id='enable_cache_no' name="apss_share_settings[enable_cache]" value="0" <?php if ( isset($options['enable_cache']) && $options['enable_cache'] == '0' ) { echo "checked='checked'"; } ?> />
													<label for='enable_cache_no'><?php _e('No', 'accesspress-social-share'); ?></label>
												</div>
											</div>
											<br />
											<div class='cache-settings'>
												<h4><?php _e( 'Cache Settings: ', 'accesspress-social-share' ); ?> </h4>
												<label for="apss_cache_settings"><?php _e( 'Cache Period:', 'accesspress-social-share' ); ?></label>
												<input type='text' id="apss_cache_period" name='apss_share_settings[cache_settings]' value="<?php if ( isset( $options['cache_period'] ) ) {
													echo $options['cache_period'];
												} ?>" onkeyup="removeMe('invalid_cache_period');"/>
												<span class="error invalid_cache_period"></span>
												<div class="apss_notes_cache_settings">
													<?php _e( 'Please enter the time in hours in which the social share counter should be updated from social networks. Default is 48 hours. <br> If you have a lot of visitors and care to show people how many have shared it in real time, feel free to put it down, but the higher it is, the better it is for your pagespeed.', 'accesspress-social-share' ); ?>
												</div>
											</div>

											<div class="apss-email-settings">
												<h2 style="margin-top:50px;">Email & Email messages</h2>
												<h4><?php _e( 'Email Settings:', 'accesspress-social-share' ); ?></h4>
												<div class="app-email-sub email-setg">
													<label for='apss-email-subject'><?php _e( 'Email subject:', 'accesspress-social-share' ); ?></label>
													<input type='text' name="apss_share_settings[apss_email_subject]" value="<?php echo $options['apss_email_subject'] ?>" />
												</div>
												<div class="app-email-body email-setg">
													<label for='apss-email-body'><?php _e( 'Email body:', 'accesspress-social-share' ); ?></label>
													<textarea rows='30' cols='30' name="apss_share_settings[apss_email_body]"><?php echo $options['apss_email_body'] ?></textarea>
												</div>
												<div class="apss_notes_cache_settings">
													Available parameters: <br />
													%%url%% = current page/post url(custom url if you have used "custom_share_link" attribute in the shortcode ) <br /> 
													%%title%% = current page/post's title <br />
													%%permalink%% = current page/post url <br />
													%%siteurl%% = Site url <br />
												</div>
											</div>
										</div>
										<div class="apss-tab-contents apss-how-to-use" id="tab-apss-how-to-use" style='display:none' ><?php include_once('how-to-use.php'); ?></div>

										<div class="apss-tab-contents apss-about" id="tab-apss-about" style='display:none' ><?php include('about-apss.php'); ?></div>
										<?php wp_nonce_field( 'apss_nonce_save_settings', 'apss_add_nonce_save_settings' ); ?>
										<input type="submit" class="submit_settings button primary-button" value="<?php _e( 'Save settings', 'accesspress-social-share' ); ?>" name="apss_submit_settings" id="apss_submit_settings"/>
										<?php
						/**
						 * Nonce field
						 * */
						wp_nonce_field( 'apss_settings_action', 'apss_settings_action' );
						?>
						<?php $nonce = wp_create_nonce( 'apss-restore-default-settings-nonce' ); ?>
						<?php $nonce_clear = wp_create_nonce( 'apss-clear-cache-nonce' ); ?>
						<a href="<?php echo admin_url() . 'admin-post.php?action=apss_restore_default_settings&_wpnonce=' . $nonce; ?>" onclick="return confirm('<?php _e( 'Are you sure you want to restore default settings?', 'accesspress-social-share' ); ?>')"><input type="button" value="Restore Default Settings" class="apss-reset-button button primary-button"/></a>
						<a href="<?php echo admin_url() . 'admin-post.php?action=apss_clear_cache&_wpnonce=' . $nonce_clear; ?>" onclick="return confirm('<?php _e( 'Are you sure you want to clear cache share counter?', 'accesspress-social-share' ); ?>')"><input type="button" value="Clear Cache" class="apss-reset-button button primary-button"/></a>
					</div>
					
					<div class="apss-promoFloat" style="max-width: 220px; background: #fff; box-shadow: 2px 0px 5px rgba(51, 51, 51, 0.24);">
						<a href="https://sowl.co/73PvA" target="_blank">
						<img style="max-width:220px" src="https://bycodeninjas.github.io/plugins/simple-seo-friendly-share-buttons/img/upgrade-now.png" alt="preview">
						</a>
					</div>
				</div>
				<div class="clear"></div>
			</form>
		</div>
	</div>
