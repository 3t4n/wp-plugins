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

						<h3 class="hndle"><span>Usage Instructions</span></h3>

						<div class="inside">
							<h4>Step 1</h4>
							
							<p><strong>Resave your permalinks!</strong> You can do this by clicking here: <a href="<?php echo site_url(); ?>/wp-admin/options-permalink.php">Permalinks</a>, and then click the "Save Changes" button at the bottom of the screen. Make sure you do this upon activating the plugin, and also if you update your permalink slug.</p>

							<p>The first step after resaving your permalins will be to create some categories for your simple sorter. To do this you'll click on <strong><a href="<?php echo site_url(); ?>/wp-admin/edit-tags.php?taxonomy=awsscategories&post_type=awsimplesorter">AW SS Categories</a></strong> in the Simple Sorter submenu to the left or right here on this link. Once there, give your category a name and leave the remaining fields alone. Click the blue "Add New AW SS Category" button to add the category. Repeat this to add all the categories you'd like to use. These categories are specific to the Simple Sorter post type and will not show up on other posts types.</p>
							
							<h4>Step 2</h4>
							
							<p>The second step will be to add some posts. to add posts click here: <strong><a href="<?php echo site_url(); ?>/wp-admin/post-new.php?post_type=awsimplesorter">Add New</a></strong>, or click the link to the left in the Simple Sorter submenu. You can use a plugin such as the highly recommended <strong><a target="_blank" href="https://pippinsplugins.com/products/easy-content-types/?ref=384">Easy Content Types</a></strong> to add metaboxes and metafields to your Simple Sorter post type. Metafields can then be displayed on the single post page for each item in your Simple Sorter. Use the <strong>Featured Image</strong> to upload the image you wish to show for the item in the Simple Sorter</p>
							
							<p>The single post page for each item will use the standard <strong>single.php</strong> file in your theme. You can set up a custom one by creating a new file called <strong>single-awsimplesorter.php</strong> in the root of your theme directory. In the custom one you can display any other info you'd like, including custom metafields if you set any up.</p>
							
							<h4>Step 3</h4>
							
							<p>The last step is to set up the Simple Sorter shortcode and place it in your theme or on a page where you want to display the Simple Sorter.</p>
							
							<p>The shortcode has a couple of options you can use. The full shortcode looks like this: <code>[aw_simple_sorter show_title="true" show_posts="-1" animation="fade" hover_overlay="true"].</code> The shortcode attributes are defined below for your reference.</p>
							
							<ul>
								<li><code>show_title="true"</code> will display each post's title on the Simple Sorter - set to <code>show_title="false"</code> or leave it entirely out to hide the post titles.</li>
								<li><code>show_posts="-1"</code> is the number of posts to show on the Simple Sorter - Set a number or leave it entirely out to show all posts (-1 means show all).</li>
								<li><code>animation="fade"</code> is the jQuery UI Effect that will be used to show/hide items in the Simple Sorter. These affects are listed below and can be seen <a target="_blank" href="https://jqueryui.com/effect/">here</a>. (Note - scale, size, and transfer cannot be used and will default to fade)
									<ol>
										<li>Fade</li>
										<li>Blind</li>
										<li>Bounce</li>
										<li>Clip</li>
										<li>Drop</li>
										<li>Explode</li>
										<li>Fold</li>
										<li>Highlight</li>
										<li>Puff</li>
										<li>Pulsate</li>
										<li>Shake</li>
										<li>Slide</li>
									</ol>
								</li>
								<li><code>hover_overlay="true"</code> will show an overlay with a "Read More" button that links to the post - set to <code>hover_overlay="false"</code> to not have an overlay effect on hover and just wrap the featured image in a link to the post.</li>
							</ul>
							
							<p>Place the shorcode with the attributes you choose to include into a theme file using <code>&lt;?php echo do_shortcode('[aw_simple_sorter show_title="true" show_posts="-1" animation="fade" hover_overlay="true"]'); ?&gt;</code>.</p>
							
							<p><strong>OR</strong></p>
							
							<p>Place the shortcode <code>[aw_simple_sorter show_title="true" show_posts="-1" animation="fade" hover_overlay="true"]</code> with the attributes you choose to include directly into a page editor in the WordPress admin area. </p>
						
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
