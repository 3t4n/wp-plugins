<?php
/**
 * Settings Page
 *
 * @package Advanced Mailto Links
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
?>

<div class="wrap amtol-settings-form-settings">

	<h2><?php _e( 'Advanced Mailto Links - Settings', 'advanced-mailto-links' ); ?></h2><br />
	
	<style type="text/css">
		.wpos-pro-box .hndle{background-color:#0073AA; color:#fff;}
		.wpos-pro-box .postbox{background:#dbf0fa none repeat scroll 0 0; border:1px solid #0073aa; color:#191e23;}
		.postbox-container .wpos-list li:before{font-family: dashicons; content: "\f139"; font-size:20px; color: #0073aa; vertical-align: middle;}
		.wptww-wrap .wpos-button-full{display:block; text-align:center; box-shadow:none; border-radius:0;}
		.wptww-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
		
	</style>
	
	<div class="post-box-container">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
			
				<!--How it workd HTML -->
				<div id="post-body-content">
					<div class="metabox-holder">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
								
								<h3 class="hndle">
									<span><?php _e( 'How It Works - Display and shortcode', 'advanced-mailto-links' ); ?></span>
								</h3>
								
								<div class="inside">
									<table class="form-table">
										<tbody>
											<tr>
												<th>
													<label><?php _e('Geeting Started', 'advanced-mailto-links'); ?>:</label>
												</th>
												<td>
													<ul>
														<li><?php _e('Step-1. Just open/edit any page add the shortcode at any section(Check the shortcode bellow)".', 'advanced-mailto-links'); ?></li>
														<li><?php _e('Step-2. Plugin will automatically get the mail id added in Settings --> General : Administration Email Address and add this mail id under mailto. Note : You can change this mail id using shortcode parameter. ', 'advanced-mailto-links'); ?></li>
														
													</ul>
												</td>
											</tr>

											<tr>
												<th>
													<label><?php _e('Use the following shortcode parameters with the shortcode', 'advanced-mailto-links'); ?>:</label>
												</th>
												<td>
													<ul>
														<li><?php _e('to : Add the mail id to mailto eg : to="support@domain.com"', 'advanced-mailto-links'); ?></li>
														<li><?php _e('subject : Subject for mail. eg : subject="Hello"', 'advanced-mailto-links'); ?></li>
														<li><?php _e('cc : CC for mail (if any).  eg : cc="support@domain.com"', 'advanced-mailto-links'); ?></li>
														<li><?php _e('body : Body content part for mail (if any).  eg : body="Hope you are doing well"', 'advanced-mailto-links'); ?></li>
														<li><?php _e('text : Text for mail where user will click. eg : text="Contect us"', 'advanced-mailto-links'); ?></li>
													</ul>
												</td>
											</tr>

											<tr>
												<th>
													<label><?php _e('Shortcode', 'advanced-mailto-links'); ?>:</label>
												</th>
												<td>
													<span class="wptww-shortcode-preview">[amailto_link]</span> – <?php _e('Display Mailto link', 'advanced-mailto-links'); ?> <br />
													<span class="wptww-shortcode-preview">echo do_shortcode('[amailto_link]')</span> – <?php _e('Add this code inside ant .php file inside php tag. For more deatil please check plugin readme.txt file.', 'advanced-mailto-links'); ?> <br />												
												</td>
											</tr>
											
											<tr>
												<th>
													<label><?php _e('Complete Shortcode Example', 'advanced-mailto-links'); ?>:</label>
												</th>
												<td>
													<span class="wptww-shortcode-preview">[amailto_link to="support@domain.com" subject="Hello" cc="support@domain.com" body="Hope you are doing well" text="Contect us"]</span> 
																									
												</td>
											</tr>
										</tbody>
									</table>
								</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->
				</div><!-- #post-body-content -->
				
				<!--Upgrad to Pro HTML -->
				<div id="postbox-container-1" class="postbox-container">					

					<!-- Help to improve this plugin! -->
					<div class="metabox-holder">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
									<h3 class="hndle">
										<span><?php _e( 'Help to improve this plugin!', 'advanced-mailto-links' ); ?></span>
									</h3>									
									<div class="inside">										
										<p><?php _e('Enjoyed this plugin? You can help by rate this plugin', 'advanced-mailto-links'); ?> <a href="https://wordpress.org/support/plugin/advanced-mailto-links/reviews/" target="_blank"><?php _e('Your Rating!', 'advanced-mailto-links'); ?></a></p>
									</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->
				</div><!-- #post-container-1 -->

			</div><!-- #post-body -->
		</div><!-- #poststuff -->
	</div><!-- #post-box-container -->
	
</div><!-- end .amtol-settings-form-settings -->