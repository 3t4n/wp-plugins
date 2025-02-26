<div class="wrap">

	<h2>AW Simple Sorter Documentation</h2>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h3 class="hndle"><span>Options</span></h3>

						<div class="inside">
							<h4>Custom Permalink Slug</h4>
							
							<p><strong>Resave your permalinks after you submit this!</strong> You can do this by clicking here: <a href="<?php echo site_url(); ?>/wp-admin/options-permalink.php">Permalinks</a>, and then click the "Save Changes" button at the bottom of the screen.</p>

							<form id="aw_ss_permalink_form" method="post" action="" onSubmit="alert('Another friendly reminder to resave your permalinks after submitting this!');">
								
								<label for="post-layout">Enter your custom permalink slug with no spaces and all lowercase.<br/><strong>Use dashes ( - ) where you would want a space!</strong></label>
								<br/>
								<input id="aw_ss_PermalinkSlug" type="text" name="aw_ss_custPerm" value="<?php echo get_option('aw_ss_customPermalinkSlug'); ?>">
								<br/>			
								<br/>
								<input type="hidden" name="aw_ss_issetChecker" value="Y" />
								<input id="aw_ss_update_permalink" class="button-primary" type="submit" name="Submit Code" value="<?php _e( 'Save Permalink Slug' ); ?>" />	
							</form>
							
							
						
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h3 class="hndle"><span>Quick Info</span></h3>

						<div class="inside">
							<p><strong>Shortcode Reference:</strong><br/>
								Default: <code>[aw_simple_sorter]</code>
								<br/><br/>
								With Options: <code>[aw_simple_sorter show_title="true" show_posts="-1" animation="fade"]</code>
								</p>
							
							<p><strong>GitHub Repo:</strong> <a target="_blank" href="https://github.com/andywarren/aw_simple_sorter">https://github.com/andywarren/aw_simple_sorter</a></p>
							
							<p><strong>Like this plugin? Buy me a beer!</strong></p>
							
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
								<input type="hidden" name="cmd" value="_s-xclick">
								<input type="hidden" name="hosted_button_id" value="C6AZTULD7TEMA">
								<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
								<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form>
							
							<p>
								<strong>Notice:</strong><br/>
								This plugin requires <code>&lsaquo;?php wp_footer(); ?&rsaquo;</code> to be utilized by the theme.
							</p>


						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->
