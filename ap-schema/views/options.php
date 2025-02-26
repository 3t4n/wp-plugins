<script type="text/javascript">var __namespace = '<?php echo $namespace; ?>';</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=591144350915437";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="wrap">


<div id="icon-options-general" class="icon32"></div>
<h2 id="aps_options_title"><?php echo $page_title; ?></h2>

<h3>** IMPORTANT ** - AP Schema is no longer supported - please check out Schema Creator by Raven - <a href="http://wordpress.org/plugins/schema-creator/">http://wordpress.org/plugins/schema-creator/</a> instead.</h3>

<form action="" method="post">
        <?php wp_nonce_field( $namespace . "-update-options" ); ?>

			<span id="aps_options_top_button" class="submit">
        <input type="submit" name="Submit" class="button-primary" value="<?php _e( "Save Changes", $namespace ) ?>" />
        </span>


<div id="poststuff">

<div id="post-body" class="metabox-holder columns-2">

<!-- main content -->
<div id="post-body-content">


        <div class="meta-box-sortables ui-sortable">
        <div class="postbox">
            <h3><?php _e("Your Google Plus ID", $namespace); ?></h3>
        <div class="inside">

            <p>
            <label><input type="text" name="data[aps_google_id]" value="<?php echo $this->get_option( 'aps_google_id' ); ?>" /> <br />
			<?php _e("Your Google Plus ID is found by going to your own profile page on Google Plus and getting the long bunch of numbers at the end of the URL.", $namespace); ?><br />
			<?php _e("If the URL is <em>https://plus.google.com/u/0/101791654756776386228/posts</em> then what you want is <strong>101791654756776386228</strong>", $namespace); ?></label>
            </p>
<p><a href="<?php echo APSCHEMA_URLPATH . '/images/gplus_example.gif'; ?>" target="_blank">Example</a></p>
        </div> <!-- .inside -->
        </div> <!-- .postbox -->
        </div> <!-- .meta-box-sortables .ui-sortable -->



<div class="meta-box-sortables ui-sortable">
<div class="postbox">
    <h3><?php _e("Choose a background colour style for your schema boxes", $namespace ); ?></h3>
<div class="inside">

        <p><?php //_e("You can see a preview of the style by using the options on the right hand side", $namespace ); ?></p>

        <fieldset id="aps_styles_options">
        <label title='Basic'><input type="radio" name="data[styles]" value="basic" <?php $aps_styles_option = $this->get_option( 'styles' ); if ($aps_styles_option == 'basic') { echo 'checked="checked"'; } ?> /> <span><?php _e("Basic - <em>Just a basic layout, no styling at all (default)</em>", $namespace ); ?></span></label><br />
        <label title='Green'><input type="radio" name="data[styles]" value="green" <?php $aps_styles_option = $this->get_option( 'styles' ); if ($aps_styles_option == 'green') { echo 'checked="checked"'; } ?> /> <span><?php _e("Green", $namespace ); ?></span></label><br />
        <label title='Light Blue'><input type="radio" name="data[styles]" value="lightblue" <?php $aps_styles_option = $this->get_option( 'styles' ); if ($aps_styles_option == 'lightblue') { echo 'checked="checked"'; } ?> /> <span><?php _e("Light Blue", $namespace ); ?></span></label><br />
        <label title='Orange'><input type="radio" name="data[styles]" value="orange" <?php $aps_styles_option = $this->get_option( 'styles' ); if ($aps_styles_option == 'orange') { echo 'checked="checked"'; } ?> /> <span><?php _e("Orange", $namespace ); ?></span></label><br />
        <label title='Pale Yellow'><input type="radio" name="data[styles]" value="paleyellow" <?php $aps_styles_option = $this->get_option( 'styles' ); if ($aps_styles_option == 'paleyellow') { echo 'checked="checked"'; } ?> /> <span><?php _e("Pale Yellow", $namespace ); ?></span></label><br />
        <label title='Red-pink'><input type="radio" name="data[styles]" value="redpink" <?php $aps_styles_option = $this->get_option( 'styles' ); if ($aps_styles_option == 'redpink') { echo 'checked="checked"'; } ?> /> <span><?php _e("Red-pink", $namespace ); ?></span></label><br />
        <label title='Silver Grey'><input type="radio" name="data[styles]" value="silvergrey"<?php $aps_styles_option = $this->get_option( 'styles' ); if ($aps_styles_option == 'silvergrey') { echo 'checked="checked"'; } ?> /> <span><?php _e('Silver Grey', 'ap-schema'); ?></span></label><br />
        <label title='Turquoise'><input type="radio" name="data[styles]" value="turquoise" <?php $aps_styles_option = $this->get_option( 'styles' ); if ($aps_styles_option == 'turquoise') { echo 'checked="checked"'; } ?> /> <span><?php _e("Turquoise", $namespace ); ?></span></label><br />
        </fieldset>
        <p><?php _e("<strong>Note: </strong>If you are styling the boxes yourself, you can find the full list of CSS classes and ID's available", $namespace ); ?> <a href="<?php echo APSCHEMA_URLPATH . '/css/all_styles.css'; ?>" target="_blank"><?php _e('here', $namespace ); ?></a></p>

</div> <!-- .inside -->
</div> <!-- .postbox -->
</div> <!-- .meta-box-sortables .ui-sortable -->





<div class="meta-box-sortables ui-sortable">
<div class="postbox">
    <h3><?php _e("Choose a rating icon style", $namespace ); ?></h3>
<div class="inside">

        <p><?php _e("These only apply for Review, Recipe and Product schemas", $namespace ); ?></p>

        <p><?php _e("You can over rule this on a post by post basis by choosing the '<em>Override Default Star Type?</em>' option in each post.", $namespace ); ?></p>

        <fieldset id="aps_review_icons_options">

        <label title='yellowstar'><input type="radio" name="data[reviewicons]" value="yellowstar" <?php $aps_review_icons_options = $this->get_option( 'reviewicons' ); if ($aps_review_icons_options == 'yellowstar') { echo 'checked="checked"'; } ?> /> <img id="yellowstar" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/yellowstar.png'; ?>" /><span><?php _e("Yellow Star (default)", $namespace ); ?></span></label><br />

        <label title='greenstar'><input type="radio" name="data[reviewicons]" value="greenstar" <?php $aps_review_icons_options = $this->get_option( 'reviewicons' ); if ($aps_review_icons_options == 'greenstar') { echo 'checked="checked"'; } ?> /> <img id="greenstar" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/greenstar.png'; ?>" /><span><?php _e("Green Star", $namespace ); ?></span></label><br />

        <label title='bluestar'><input type="radio" name="data[reviewicons]" value="bluestar" <?php $aps_review_icons_options = $this->get_option( 'reviewicons' ); if ($aps_review_icons_options == 'bluestar') { echo 'checked="checked"'; } ?> /> <img id="bluestar" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/bluestar.png'; ?>" /><span><?php _e("Blue Star", $namespace ); ?></span></label><br />

        <label title='heart'><input type="radio" name="data[reviewicons]" value="heart" <?php $aps_review_icons_options = $this->get_option( 'reviewicons' ); if ($aps_review_icons_options == 'heart') { echo 'checked="checked"'; } ?> /> <img id="heart" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/heart.png'; ?>" /><span><?php _e("Heart", $namespace ); ?></span></label><br />

        <label title='tick'><input type="radio" name="data[reviewicons]" value="tick" <?php $aps_review_icons_options = $this->get_option( 'reviewicons' ); if ($aps_review_icons_options == 'tick') { echo 'checked="checked"'; } ?> /> <img id="tick" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/tick.png'; ?>" /><span><?php _e("Tick", $namespace ); ?></span></label><br />

        <label title='lightning'><input type="radio" name="data[reviewicons]" value="lightning" <?php $aps_review_icons_options = $this->get_option( 'reviewicons' ); if ($aps_review_icons_options == 'lightning') { echo 'checked="checked"'; } ?> /> <img id="lightning" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/lightning.png'; ?>" /><span><?php _e("Lightning", $namespace ); ?></span></label><br />

        <label title='skulllight'><input type="radio" name="data[reviewicons]" value="skulllight"<?php $aps_review_icons_options = $this->get_option( 'reviewicons' ); if ($aps_review_icons_options == 'skulllight') { echo 'checked="checked"'; } ?> /> <img id="skulllight" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/skulllight.png'; ?>" /><span><?php _e("Skull (for light backgrounds)", $namespace ); ?></span></label><br />

        <label title='skulldark'><input type="radio" name="data[reviewicons]" value="skulldark" <?php $aps_review_icons_options = $this->get_option( 'reviewicons' ); if ($aps_review_icons_options == 'skulldark') { echo 'checked="checked"'; } ?> /> <img id="skulldark" class="aps_star" src="<?php echo APSCHEMA_URLPATH . '/images/icons/skulldark.png'; ?>" /><span><?php _e("Skull (for dark backgrounds)", $namespace ); ?></span></label><br />
        <br />
        <label title='numeric'><input type="radio" name="data[reviewicons]" value="numeric" <?php $aps_review_icons_options = $this->get_option( 'reviewicons' ); if ($aps_review_icons_options == 'numeric') { echo 'checked="checked"'; } ?> /> <span><?php _e("Numeric - displays the rating in number form", $namespace ); ?></span></label><br />

        <p>
        <label><input type="text" class="small-text" name="data[reviewicons_size]" value="<?php echo $this->get_option( 'reviewicons_size' ); ?>" /> <?php _e("Icon size - please enter number only, size is in pixels - default is 32. Recommended sizes are 16, 24 or 32", $namespace ); ?></label>
        </p>
		</fieldset>

</div> <!-- .inside -->
</div> <!-- .postbox -->
</div> <!-- .meta-box-sortables .ui-sortable -->



<div class="meta-box-sortables ui-sortable">
<div class="postbox">
	<h3><?php _e("Alignment and Width of the Schema Box", $namespace ); ?></h3>
<div class="inside">

        <p><?php _e("This only affects the schema box in the content (not the widget).", $namespace ); ?><?php _e("If you use PX it will mean the box will have fixed width in pixels. If you use percentage (%) then the box will be the width of the content area it is in and will shrink as the browser window is resized.", $namespace ); ?></p>
        <fieldset id="aps_float_options">
        <label title='Left'><input type="radio" name="data[aps_float]" value="left" <?php $aps_float_options = $this->get_option( 'aps_float' ); if ($aps_float_options == 'left') { echo 'checked="checked"'; } ?> /> <span><?php _e("Left", $namespace ); ?></span></label><br />
        <label title='Center'><input type="radio" name="data[aps_float]" value="center"<?php $aps_float_options = $this->get_option( 'aps_float' ); if ($aps_float_options == 'center') { echo 'checked="checked"'; } ?> /> <span><?php _e("Center", $namespace ); ?></span></label><br />
        <label title='Right'><input type="radio" name="data[aps_float]" value="right"<?php $aps_float_options = $this->get_option( 'aps_float' ); if ($aps_float_options == 'right') { echo 'checked="checked"'; } ?> /> <span><?php _e("Right", $namespace ); ?></span></label>

        </fieldset>
        <p>
        <label><input type="text" name="data[aps_width]" value="<?php echo $this->get_option( 'aps_width' ); ?>" /> <?php _e("Make sure to add px or % after the number", $namespace); ?></label>
        </p>

</div> <!-- .inside -->
</div> <!-- .postbox -->
</div> <!-- .meta-box-sortables .ui-sortable -->




<div class="meta-box-sortables ui-sortable">
<div class="postbox">
    <h3><?php _e("Misc. Options", $namespace); ?></h3>
<div class="inside">

        <label title='allowshortcodes'><input type="checkbox" name="data[allowshortcodes]" value="basic" <?php $aps_styles_option = $this->get_option( 'allowshortcodes' ); if ($aps_styles_option == TRUE) { echo 'checked="checked"'; } ?> /> <span><?php _e('Allow shortcodes in widgets? If selected you can use the AP Schema Shortcodes (or any shortcode for that matter) in a Text Widget.', 'ap-schema'); ?></span></label><br />
        <p>
        <label><input type="text" name="data[aps_price]" value="<?php echo $this->get_option( 'aps_price' ); ?>" /> <?php _e("Currency Type", $namespace); ?></label>
        </p>

        </div>



</div> <!-- .inside -->
</div> <!-- .postbox -->
			<p class="submit">
        <input type="submit" name="Submit" class="button-primary" value="<?php _e( "Save Changes", $namespace ) ?>" />
        </p>
</div> <!-- .meta-box-sortables .ui-sortable -->

</form>
			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">
                     					<h3><?php _e("Be Social!", $namespace); ?></h3>

                                        <div class="aps_admin_sidebar_inner">


                        <span id="sidebar_twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.apinadev.com/ap-schema" data-text="I am using #ap-schema for all my #wordpress schema needs!" data-count="none">Tweet</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></span>
                        <span id="sidebar_facebox"><div class="fb-like" data-href="http://www.apinadev.com/ap-schema/" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div></span>
                        <span id="sidebar_gplus"><div class="g-plusone" data-size="medium" data-annotation="none" data-href="http://www.apinadev.com/ap-schema/"></div>
                        </span>
</div>
					</div> <!-- .postbox -->


					<div class="postbox">
					<h3><?php _e("CleanLinks by ApinaDev", $namespace); ?></h3>
                    <div class="aps_admin_sidebar_inner">
                        <p><a href="http://www.apinadev.com/downloads/cleanlinks" target="_blank"><img src="<?php echo APSCHEMA_URLPATH . '/images/cleanlinks.png'; ?>" style="width:100%;"/></a></p>
                    </div>
					</div> <!-- .postbox -->




					<div class="postbox">
					<h3><?php _e("Useful Links", $namespace); ?></h3>
                    <div class="aps_admin_sidebar_inner">
                        <p><a href="http://www.apinadev.com/ap-schema/" target="_blank">Documentation</a></p>
                        <p><a href="http://www.apinadev.com/feature-requests-and-bug-reports/" target="_blank">Feature Requests</a></p>
                        <p><a href="http://www.apinadev.com/feature-requests-and-bug-reports/" target="_blank">Bug Reports</a></p>
                    </div>
					</div> <!-- .postbox -->



					<div class="postbox">
                    					<h3><?php _e("Support the Development", $namespace); ?></h3>
                    <div class="aps_admin_sidebar_inner">

<div>
<p style="font-size:14px;">Help support the development of AP Schema</p>
<p style="font-size:14px;">Please donate a small some to keep me housed and in caffeine or make my day by sending me an Amazon gift!</p>
</div>
<div >
<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="6CLAKHXS63L24">
<table id="aps_pp_donate">
<tr><td><input type="hidden" name="on0" value="Donate to AP Schema"><span style="display:none;">Donate to AP Schema</span></td></tr><tr><td><select name="os0">
<option value="Five">5.00 EUR</option>
<option value="Ten">10.00 EUR</option>
<option value="Fifteen">15.00 EUR</option>
<option value="Twenty Five">25.00 EUR</option>
<option value="Fifty">50.00 EUR</option>
<option value="Hundred">100.00 EUR</option>
<option value="Two Hundred and Fifty">250.00 EUR</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="EUR">
<input id="aps_pp_donate_button" type="image" src="<?php echo APSCHEMA_URLPATH . '/images/donate.png'; ?>" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" title="Donate to AP Schema via PayPal">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</div>

<p id="aps_or">or</p>

<div class="" style="text-align:center;"><a href="http://www.amazon.co.uk/registry/wishlist/3E86Y5KRL1O2P"><img src="<?php echo APSCHEMA_URLPATH . '/images/amazon.png'; ?>" title="My Amazon Wishlist" width="200px" /></a></div>
                        </div>
					</div> <!-- .postbox -->



					<div class="postbox">
                                            <h3><?php _e("The Apina Network", $namespace); ?></h3>

                                        <div class="aps_admin_sidebar_inner">

                        <p><a href="http://www.apinadev.com/" style="text-decoration:none;"><strong>ApinaDev</strong> - Plugins & Themes</a></p>
                        <p><a href="http://www.apinapress.com/" style="text-decoration:none;"><strong>ApinaPress</strong> - WordPress goodness</a></p>
                        <p><a href="http://www.apinamarketing.com/" style="text-decoration:none;"><strong>ApinaMarketing</strong> - Internet & Affiliate marketing</a></p>
                        </div>
					</div> <!-- .postbox -->



				</div> <!-- .meta-box-sortables -->

			</div> <!-- #postbox-container-1 .postbox-container -->

		</div> <!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div> <!-- #poststuff -->

</div> <!-- .wrap -->


<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
