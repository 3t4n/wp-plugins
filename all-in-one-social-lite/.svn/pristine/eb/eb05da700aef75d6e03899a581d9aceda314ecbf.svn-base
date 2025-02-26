<?php
function all_in_one_social_general_callback() {
	//Handling Form Data
	if(isset($_POST['cube3x_post_back']) && $_POST['cube3x_post_back'] == 'Y') {
		$all_in_one_social_options = get_option('all_in_one_social_settings');
			$all_in_one_social_options['facebook_fans'] = $_POST['cube3x_facebook_fans'];
			$all_in_one_social_options['twitter_fans'] = $_POST['cube3x_twitter_fans'];
			$all_in_one_social_options['gplus_fans'] = $_POST['cube3x_gplus_fans'];
			$all_in_one_social_options['linkedin_fans'] = $_POST['cube3x_linkedin_fans'];
			$all_in_one_social_options['stumple_fans'] = $_POST['cube3x_stumpleupon_fans'];
		update_option('all_in_one_social_settings', $all_in_one_social_options);
    }
		$all_in_one_social_options = get_option('all_in_one_social_settings');
	
	//End of Form Data handling
	$plugin_url = plugin_dir_url(__FILE__);
	$icon_url = $plugin_url.'images/cube3x-social-icon.png';
	$menu_page_html = <<<EOT
	<div class="wrap">
		<div class="icon32"><img src="$icon_url"/></div>
		<h2>All in One Social Lite Settings</h2>
		
		<table class="form-table">
			<tr>
				<td>
					<form method="post">
					<input type="hidden" name="cube3x_post_back" value="Y"/>
					<table class="form-table">
						<tr valign="top">
							<td style="width: 200px"><h3 style="margin: 0;">Social Site</h3></td>
							<td><h3 style="margin: 0;">Subscriber Count</h3></td>
						</tr>
						<tr valign="top">
							<td style="width: 200px">Facebook</td>
							<td>
								<input name="cube3x_facebook_fans" id="cube3x_facebook_fans" type="text" class="regular-text" value="{$all_in_one_social_options['facebook_fans']}">
							</td>
						</tr>
						<tr valign="top">
							<td style="width: 200px">Twitter</td>
							<td>
								<input name="cube3x_twitter_fans" id="cube3x_twitter_fans" type="text" class="regular-text" value="{$all_in_one_social_options['twitter_fans']}">
							</td>
						</tr>
						<tr valign="top">
							<td style="width: 200px">Google+</td>
							<td>
								<input name="cube3x_gplus_fans" id="cube3x_gplus_fans" type="text" class="regular-text" value="{$all_in_one_social_options['gplus_fans']}">
							</td>
						</tr>
						<tr valign="top">
							<td style="width: 200px">LinkedIn</td>
							<td>
								<input name="cube3x_linkedin_fans" id="cube3x_linkedin_fans" type="text" class="regular-text" value="{$all_in_one_social_options['linkedin_fans']}">
							</td>
						</tr>
						<tr valign="top">
							<td style="width: 200px">StumpleUpon</td>
							<td>
								<input name="cube3x_stumpleupon_fans" id="cube3x_stumpleupon_fans" type="text" class="regular-text" value="{$all_in_one_social_options['stumple_fans']}">
							</td>
						</tr>
						<tr valign="top">
							<td style="width: 200px"></td>
							<td>
								<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
							</td>
							<td></td>
						</tr>
					</table>
					</form>
				</td>
			</tr>
		</table>
		<p>&nbsp;</p>
        <p>All in One Social Lite is a free social sharing plugin created and maintained by <a href="http://cube3x.com" target="_blank">CUBE3X</a>, a company dedicated to make web a more open and better place. <br/>We thank all people who help us to keep going with their efforts, knowledge and tuts.</p>
		<h3>How can we help you?</h3>
		<p>Please use our <a href="http://cube3x.com/forums/forum/4/all-in-one-social/" target="_blank" title="Opens in new tab">central support forum</a>, if you face any bug or have a new suggestion. Here is our <a href="http://cube3x.com/contact" target="_blank" title="Opens in new tab">contact form</a> for any enhancement or customization. There is a <a href="http://cube3x.com/all-in-one-social" target="_blank" title="Opens in new tab">pro version</a> with advanced features like more widget features, social banner etc.</p>
		<p>&nbsp;</p>
		<h3>Show your support!</h3>
		<p><a href="http://cube3x.com/donate" class="button button-primary">Donate</a> to keep our servers and brain, up and running!</p>
		<p style="line-height: 20px; float: left; width: 100%;"><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fcube3x&amp;send=false&amp;layout=button_count&amp;width=80&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=108889339213388" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:44px; height:21px; float: left; margin-right: 7px;" allowTransparency="true"></iframe>us, if you are happy and smiling.</p>
		<p style="line-height: 20px; float: left; width: 100%;"><span style="float:left; margin-right: 7px;"><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://cube3x.com/all-in-one-social" data-text="All in One Social Wordpress Plugin is awesome!" data-via="cube3x" data-count="none">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> </span><span style="float:left; margin-right: 7px;">for your friends, if All in One Social is awesome.</span></p>
<p style="line-height: 20px; float: left; width: 100%;"><span style="float:left; margin-right: 7px;"><a href="https://twitter.com/cube3x" class="twitter-follow-button" data-show-count="false">Follow @cube3x</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> </span><span style="float:left; margin-right: 7px;">to receive plugin updates.</span></p>
	</div>
EOT;
	echo $menu_page_html;
}
?>