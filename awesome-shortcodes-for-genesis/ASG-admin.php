<?php
function asg_admin_menu() {
	$page = add_submenu_page( 'options-general.php', 'Shortcodes For Genesis', 'Awesome Shortcodes', 'manage_options', 'asg-shortcode-plugin', 'asg_shortcode_options' );
}

function asg_shortcode_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
        if ($_POST['action'] == 'update') {
		$_POST['show_css'] == 'on' ? update_option('asg_css', 'checked') : update_option('asg_css', '');
                $_POST['show_gist_footer'] == 'on' ? update_option('asg_gist_footer', 'checked') : update_option('asg_gist_footer', '');
                $_POST['gist_username'] == NULL ? update_option('asg_gist_username', '') : update_option('asg_gist_username', $_POST['gist_username']);
		$message = '<div id="message" class="updated fade"><p><strong>Options Saved</strong></p></div>';
	}
        ?>
	<div class="wrap">
	<h2>Awesome Shortcodes For Genesis</h2>
        <?php echo $message; ?>
	<div class="metabox-holder columns-2">	
	<div id="postbox-container-1" class="postbox-container" style="width:65%; padding:1.0em;">
	<div class="meta-box-sortables ui-sortable">
	<div id="optionboxdesc" class="postbox">
		<h3 class="hndle"><span><b><u>Settings:</u></b></span></h3>
		<div class="inside">
			This plugin will add an Shortcodes for Genesis Theme. These shortcodes will be added to your visual editor and can be accessed from the Awesome Shortcodes icon.
			<p><b>Plugin By <a href="https://techkle.com/about/">Sanjeev Mohindra</a></b></p><hr>
                        <?php
                        $options['css'] = get_option('asg_css');
                        $options['gist_footer'] = get_option('asg_gist_footer');
                        $gistusername = get_option('asg_gist_username');
                        ?>
                        <form method="post" action="">
			<input type="hidden" name="action" value="update" />
			<?php
			echo '<p><b>1. Gist</b></p>Default Username For Gist: <input name="gist_username" type="text" id="gist_username" value="' . $gistusername . '"/>
                            <p>Default Username will be used when you do not give any username while adding Gist in the post. Please make sure you have username at any one place otherwise Gist will not be processed correctly.</p>
                            <p><input name="show_gist_footer" type="checkbox" id="show_gist_footer" '.$options['gist_footer'].' /> Add a footer about Javascript requirement. (It is useful for Apple News and AMP)<p>
                            <hr><p><b>2. Plugin CSS Options</b></p><input name="show_css" type="checkbox" id="show_css" '.$options['css'].' /> Do Not Load the CSS for Awesome Shortcodes For Genesis.<p>If you check this option, plugin CSS will not be loaded. You can copy the CSS from below textarea and add it to your theme CSS file.</p>
                            <p>Please do not update the CSS below, it will not have any impact.</p>
			    <p><textarea rows="10" cols="80">' . file_get_contents('asg_shortcodes.css', FILE_USE_INCLUDE_PATH) . '</textarea></p>
                        ';
                        ?>
			<br />
			<input type="submit" class="button-primary" value="Save Changes" />
			</form>
                </div>
        </div>
        </div>
        </div>
        <div id="postbox-container-2" class="postbox-container" style="width:25%; padding:1.0em;">
	<div class="meta-box-sortables ui-sortable">
	<div id="likebox" class="postbox">
		<h3 class="hndle"><span><b><u>Like the Plugin</u></b></span></h3>
		<div class="inside">
		<p><div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=206579272749132";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-like" data-href="http://www.facebook.com/Techkle" data-send="false" data-width="200" data-show-faces="true"></div></p> 
		<p><!-- Place this tag where you want the widget to render. -->
                    <div class="g-page" data-width="273" data-href="//plus.google.com/106123958131751689609" data-layout="landscape" data-showtagline="false" data-rel="publisher"></div>

                    <!-- Place this tag after the last widget tag. -->
                    <script type="text/javascript">
                      (function() {
                        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                        po.src = 'https://apis.google.com/js/plusone.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                      })();
                    </script></p>
                <p><a href="https://twitter.com/techkle" class="twitter-follow-button" data-show-count="true" data-lang="en">Follow @Techkle</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p> 
		<p><a href="https://wordpress.org/plugins/awesome-shortcodes-for-genesis/" title="Awesome Shortcodes For Genesis" target="_blank">Give rating on Wordpress.org</a></p>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
                ">
                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>
        </div>
	</div>
	<div id="supportbox" class="postbox">
		<h3 class="hndle"><span><b><u>Plugin Support:</u></b></span></h3>
		<div class="inside">
			<p><a href="https://docs.google.com/forms/d/1eypcTatZ5wWsWyleEuiDvKViJXryJrZDg__9UPsctJc/viewform?usp=send_form" target="_blank" rel="noopener">Request New Features</a></p> 
                        <p><a href="https://Techkle.com/contact-us/" target="_blank" rel="noopener">Contact Us</a></p> 
		</div>
	</div>
	<div id="rssbox" class="postbox">
		<h3 class="hndle"><span><b><u>Latest Articles:</u></b></span></h3>
		<div class="inside">
			<?php asg_load_techkle_rss(); ?>
		</div>
		</div>    
        </div>
        </div>
		<?php
}
?>