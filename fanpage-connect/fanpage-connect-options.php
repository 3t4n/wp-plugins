<?php
// get form variables if there are any
$frm_email = isset($_GET['usr_email'])? trim($_GET['usr_email']) : '';
$frm_name = isset($_GET['usr_name'])? trim($_GET['usr_name']) : '';
$frm_onlist = isset($_GET['fpc_onlist'])? trim($_GET['fpc_onlist']) : '';
$frm_submit = isset($_GET['submit'])? trim($_GET['submit']) : '';
$frm_step = isset($_GET['reg_step'])? intval(trim($_GET['reg_step'])) : 0;

/* handle the form submission */
if($frm_email != '' && $frm_name != '' && $frm_submit != '')
{
	// activate if we're already on the list.
	$activated = ($frm_onlist != '')? true : false;

	// update the options now that we have a name and email.
	$options = array(
		'activated' => $activated,
		'name' => $frm_name,
		'email' => $frm_email
	);
	update_option($this->FanpageConnect_DB_option,$options);
	$this->plugin_activated = $options['activated'];
}
global $wp_filter;
global $post;
$fpc_pages = array();
$fpc_posts = array();
$fpc_options = array();
?>
<link rel="stylesheet" href="<?php echo FPC_PLUGIN_URL; ?>/css/fanpage-connect.css" type="text/css" media="screen" />
<div class="wrap" style="max-width:950px !important;">

	<a href="<?php echo $this->get_fpc_link(); ?>" target="_blank">
		<img src="<?php echo FPC_PLUGIN_URL; ?>/img/fbconnect-logo.png" style="border:none;margin:8px 0px 4px 0px;">
	</a>

	<?php if($this->plugin_activated): ?>
	<div id="paypal-float" style="float:right;margin-top:10px;width:260px;padding-top:8px;">
		<img src="<?php echo FPC_PLUGIN_URL; ?>/img/coffee.jpg" style="float:left;margin:-8px 8px 8px 0px;">
		Like Fanpage Connect?<br />
		Say, then how about a cup o' coffee?<br />
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
			<input type="hidden" name="cmd" value="_donations">
			<input type="hidden" name="business" value="T8V954QPLEW2J">
			<input type="hidden" name="lc" value="US">
			<input type="hidden" name="item_name" value="Fanpage Connect Donation">
			<input type="hidden" name="item_number" value="easy-columns">
			<input type="hidden" name="item_number" value="easy-columns">
			<input type="hidden" name="amount" id="amount" value="1.00">
			<input type="hidden" name="currency_code" value="USD">
			<input type="hidden" name="no_note" value="1">
			<input type="hidden" name="no_shipping" value="1">
			<input type="hidden" name="currency_code" value="USD">
			<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHosted">
			<select id="multi-amount" onchange="changeAmount(this.options[this.selectedIndex].value);">
				<option value="1.00">$1.00 - Regular cup o' joe</option>
				<option value="5.00" selected="selected">$5.00 - Grande mocha</option>
				<option value="10.00">$10.00 - Venti caramel macchiato with whip</option>
				<option value="15.00">$15.00 - Nuclear alien coffee!</option>
			</select>
			<br />
			<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" style="float:right;">
			<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
		<script language="javascript">
		function changeAmount(v){ amt = document.getElementById('amount'); amt.value = v; }
		</script>
	</div>
	<br />
	<?php endif; ?>

	<div id="fpc-fb-like">
		<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.fanpageconnect.com%2Ffanpage-connect%2F&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;font=lucida+grande&amp;colorscheme=light&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:35px;" allowTransparency="true"></iframe>
	</div>

	<div class="dbx-content">

		<?php
		if(!$this->plugin_activated){

			if($frm_email == '' && $frm_name == '' && $frm_submit == '') {

				// not activated, show the reg form, step 1
				$this->reg_step1();

			} elseif($frm_email != '' && $frm_name != '' && $frm_onlist == '' && $frm_submit != '' && $frm_step == 1) {

				// user registered, show step 2
				$this->reg_step2($frm_name,$frm_email);

			}

		} elseif($frm_email != '' && $frm_name != '' && $frm_onlist!= '' && $frm_submit != '' && $frm_step == 2) {
				$this->reg_step3(); // activated!
		}
		?>

		<?php if($this->plugin_activated): ?>

			<div style="padding:5px;" class="updated fade below-h2" id="message">
				<strong>Supercharge your social marketing with even more options and features...</strong>
				<br>
				<a href="<?php echo $this->get_fpc_link(); ?>" target="_blank">Upgrade to Fanpage Connect Pro!</a>
			</div>

			<form name="FPCOptions" action="<?php echo $action_url ?>" method="post">
				<input type="hidden" name="submitted" value="1" />
				<?php wp_nonce_field('fpc-options-nonce'); ?>

				<span class="fpc-version">You're Rocking Fanpage Connect Free <strong>v<?php echo FPC_PLUGIN_VERSION; ?></strong></span>
				<h3>Global Fan Page Connect Settings</h3>

				<table border="0" cellpadding="4" cellspacing="4">
					<tr>
						<td valign="top" width="150"><strong>Fan Page URL</strong></td>
						<td>
							<input type="text" id="fpurl" name="fpurl" value="<?php echo $fpurl; ?>" size="60">
							<p>
								To get this link, click &quot;<strong>Ads and Pages</strong>&quot; in Facebook, then copy the link to the fan page
								from the &quot;<strong>Pages You Admin</strong>&quot; menu.
							</p>
						</td>
					</tr>

					<tr>
						<td valign="top" colspan="2"><h3>Open Graph Tags <a href="http://developers.facebook.com/docs/opengraph/" target="_blank">(?)</a></h3></td>
					</tr>

					<tr>
						<td valign="top" width="150"><strong>Title</strong></td>
						<td>
							<input type="text" id="fpogtitle" name="fpogtitle" value="<?php echo $fpogtitle; ?>" size="60">
						</td>
					</tr>
					<tr>
						<td valign="top" width="150"><strong>Type</strong></td>
						<td>
							<select id="fpogtype" name="fpogtype">
							<option value="">Chose a type</option>
							<option value="activity">activity</option>
							<option value="actor">actor</option>
							<option value="album">album</option>
							<option value="article">article</option>
							<option value="athlete">athlete</option>
							<option value="author">author</option>
							<option value="band">band</option>
							<option value="bar">bar</option>
							<option value="blog">blog</option>
							<option value="book">book</option>
							<option value="cafe">cafe</option>
							<option value="cause">cause</option>
							<option value="city">city</option>
							<option value="company">company</option>
							<option value="country">country</option>
							<option value="director">director</option>
							<option value="drink">drink</option>
							<option value="food">food</option>
							<option value="game">game</option>
							<option value="government">government</option>
							<option value="hotel">hotel</option>
							<option value="landmark">landmark</option>
							<option value="movie">movie</option>
							<option value="musician">musician</option>
							<option value="non_profit">non_profit</option>
							<option value="politician">politician</option>
							<option value="product">product</option>
							<option value="public_figure">public_figure</option>
							<option value="restaurant">restaurant</option>
							<option value="school">school</option>
							<option value="song">song</option>
							<option value="sport">sport</option>
							<option value="sports_league">sports_league</option>
							<option value="sports_team">sports_team</option>
							<option value="state_province">state_province</option>
							<option value="tv_show">tv_show</option>
							<option value="university">university</option>
							<option value="website">website</option>
							</select>
							<script>$("#fpogtype").val("<?php echo $fpogtype; ?>");</script>
						</td>
					</tr>
					<tr>
						<td valign="top" width="150"><strong>Canonical URL</strong></td>
						<td>
							<input type="text" id="fpogurl" name="fpogurl" value="<?php echo $fpogurl; ?>" size="60">
							<p>
								Tip: use the URL of your fan page tab URL
							</p>
						</td>
					</tr>
					<tr>
						<td valign="top" width="150"><strong>Site Image URL</strong></td>
						<td>
							<input type="text" id="fpogimg" name="fpogimg" value="<?php echo $fpogimg; ?>" size="60">
							<p>
								The image must be at least 50px by 50px and have a maximum aspect ratio of 3:1. We support PNG, JPEG and GIF formats.
							</p>
						</td>
					</tr>
					<tr>
						<td valign="top" width="150"><strong>Site Name</strong></td>
						<td>
							<input type="text" id="fpogname" name="fpogname" value="<?php echo $fpogname; ?>" size="60">
							<p>
								A human-readable name for your site
							</p>
						</td>
					</tr>

					<tr>
						<td valign="top" colspan="2"><h3>Menu Options</h3></td>
					</tr>

					<tr>
						<td valign="top"><strong>Use a Custom Menu?</strong></td>
						<td>
							<select id="use_menu" name="use_menu">
							<?php if($use_menu == '' || is_null($use_menu) || !$use_menu){ ?>
							<option value="false" selected="selected">No</option>
							<option value="true">Yes</option>
							<?php } else { ?>
							<option value="false">No</option>
							<option value="true" selected="selected">Yes</option>
							<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td valign="top"><strong>Menu to Use</strong></td>
						<td>
							<?php $menus = wp_get_nav_menus(); ?>
							<select name="menu" id="menu">
							<option value=""></option>
							<?php foreach($menus as $menu) :?>
								<?php if($menu_name == $menu->name){ ?>
									<option value="<?php echo $menu->name; ?>" selected="selected"><?php echo $menu->name; ?></option>
								<?php } else { ?>
									<option value="<?php echo $menu->name; ?>"><?php echo $menu->name; ?></option>
								<?php } ?>
							<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td valign="top"><strong>Display Menu</strong></td>
						<td>
							<select id="show_menu" name="show_menu">
							<?php if($show_menu == '' || is_null($show_menu) || $show_menu == 0){ ?>
							<option value="always">Always</option>
							<option value="liked" selected="selected">Only When &quot;Liked&quot;</option>
							<?php } else { ?>
							<option value="always" selected="selected">Always</option>
							<option value="liked">Only When &quot;Liked&quot;</option>
							<?php } ?>
							</select>
						</td>
					</tr>

					<tr>
						<td valign="top" colspan="2"><h3>Miscellaneous Options</h3></td>
					</tr>

					<tr>
						<td valign="top"><strong>Autofit iFrame?</strong></td>
						<td>
							<select id="autofit" name="autofit">
							<?php if($fbautofit == "true" || $fbautofit == "" || is_null($fbautofit)) { ?>
							<option value="false">No</option>
							<option value="true" selected="selected">Yes</option>
							<?php } else { ?>
							<option value="false" selected="selected">No</option>
							<option value="true">Yes</option>
							<?php } ?>
							</select>
							<p>
								This will use <a href="http://developers.facebook.com/docs/reference/javascript/" target="_blank">FBJS</a>
								to autofit the iframe and remove unintended scrollbars. <strong>Note: Fan Pages must be no more than 810 pixels wide!</strong>
							</p>
						</td>
					</tr>
					<input type="hidden" id="link_luv" name="link_luv" value="1">
					<tr>
						<td valign="top"><strong>Debug Mode?</strong></td>
						<td>
							<select id="debug" name="debug">
							<?php if($debug == "true") { ?>
							<option value="false">No</option>
							<option value="true" selected="selected">Yes</option>
							<?php } else { ?>
							<option value="false" selected="selected">No</option>
							<option value="true">Yes</option>
							<?php } ?>
							</select>
							<p>
								This will output Facebook signed request and session data on your page.
								Make sure to turn this off when you go live!
							</p>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" name="Submit" value="Update" class="option-update" />
						</td>
					</tr>
				</table>
			</form>

			<h3>Add Application to Facebook Page</h2>
			<form name="FPCAddAppToPage">
				<?php
					$fpc_qry_args = array(
						'post_type' => 'page',
						'orderby' => 'title',
						'order' => 'ASC',
						'meta_key' => '_fbfp',
						'paged' => false
						);
					$fpc_posts = new WP_Query($fpc_qry_args);
					$fpc_pages = array();
					if ($fpc_posts->have_posts()) {
						array_push($fpc_pages, array('NONE','Please select a Fanpage to add.', '', '' ));
						while( $fpc_posts->have_posts() ) {
							$fpc_posts->the_post();
							setup_postdata($post);
							$fpc_post_meta = get_post_meta($post->ID,'_fbfp',true);				
							if ( strcasecmp($fpc_post_meta['isfanpage'],'true') == 0 ) {
								array_push($fpc_pages, array($post->ID, $post->post_title, $fpc_post_meta['appid'], get_permalink() ));
							}
						}
						foreach($fpc_pages as $fpc_page) {
							array_push( $fpc_options, '<option value="'.$fpc_page[0].'">'.$fpc_page[1].'</option>' );
							$fpc_input_id = 'fpc_appid_'.$fpc_page[0];
?>
				<input type="hidden" id="<?php echo $fpc_input_id ?>" name="<?php echo $fpc_input_id ?>" value="<?php echo $fpc_page[2] ?>" />
<?php 
							$fpc_input_id = 'fpc_pagelink_'.$fpc_page[0];
?>
				<input type="hidden" id="<?php echo $fpc_input_id ?>" name="<?php echo $fpc_input_id ?>" value="<?php echo $fpc_page[3] ?>" />
<?php
						}
					}
?>
				<table border="0" cellpadding="4" cellspacing="4">
					<tr>
						<td valign="top"><strong>Your Fan Pages</strong></td>
						<td>
							<select id="App_ID_Select" name="App_ID_Select" style="width: 790px;">
<?php 
								foreach($fpc_options as $fpc_option) {
									echo $fpc_option;
								}
?>
							</select>
							<p>
								This dropdown contains a list of all pages you have configured as Fan Pages.
							</p>
						</td>
					</tr>
					<tr>
						<td valign="top"><strong>App ID</strong></td>
						<td>
							 <input id="App_ID" name="App_ID" disabled="true" value="" />
							<p>
								This is the current App ID assigned to the Fan Page selected above.
							</p>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="button" id="App_ID_Add" name="App_ID_Add" value="Add to Page" class="option-update" />
						</td>
					</tr>
				</table>
			</form>			
			
			<h3>Fanpage Connect Usage</h2>

			<h3>Fan Page Settings</h3>
			<div id="fpc-accordion1">

				<div>
					<h4><a href="#">Making Pages Facebook Ready</a></h4>
					<div>
					<p>
						To make one of your pages fan page compatible, toggle the "Make this a FanPage?" option in the Fanpage Connect Meta box
						when editing your page.
					</p>
					<p>
						<img src="<?php echo FPC_PLUGIN_URL; ?>/img/fanpage-activate.jpg">
					</p>
					<p>
						Once you select &quot;Yes&quot; your other fan page options will display.
					</p>
					<p>
						Fanpage Connect has global settings (on this page) and page level controls. Page level settings have the ability to
						override global settings. For instance, you may set fan pages to use menus all the time, but chose to hide menus
						on an individual page.
					</p>
					</div>
				</div>

				<div>
					<h4><a href="#">Application ID and Application Secret</a></h4>
					<div>
					<p>
						If this is the page that will be the first to load in your Facebook tab, then you'll need to enter your
						Application ID and Application Secret from the Facebook Application that hosts your page in its iframe.
					</p>
					<p>
						Otherwise, you won't need to enter this information. The landing page in your fan page tab will pass it to any subsequent pages.
					</p>
					<p>
						<strong>Remember,</strong> you'll need to set up a facebook application to get an application ID and secret from Facebook. You can learn
						how to get your application settings through our
						<a href="http://www.facebook.com/FanpageConnect?sk=app_201667116527432" target="_blank">training videos</a> if you haven't already.
					</p>
					</div>
				</div>

				<div>
					<h4><a href="#">Using Custom Menus</a></h4>
					<div>
					<p>
						<img src="<?php echo FPC_PLUGIN_URL; ?>/img/fb-menus.jpg">
					</p>
					<p>
						You have the ability to use WordPress Custom Menus in your fan pages. Top create a menu, select <strong>Appearance</strong>,
						then <strong>Menus</strong> from your WordPress dashboard menu. There you can create a custom menu that contains links to
						all your fan page enabled pages.
					</p>
					<p>
						<strong>Use Menu In Page</strong><br>
						This will allow you to override your global settings and allow (or disallow) custom menus in your page.
					</p>
					<p>
						<strong>Display Menu</strong><br>
						Here you can choose to always show a custom menu (if enabled) or show it only after the user has liked the page.
					</p>
					</div>
				</div>

				<div>
					<h4><a href="#">Facebook Comment Control</a></h4>
					<div>
					<p>
						If you have comments enabled on this page, you can choose to display the Facebook comments box all the time
						or only after a user has liked the page. Comments must be enabled for this to work.
					</p>
					<p>
						<strong>Note</strong><br>
						If you choose to use the Facebook comments shortcode, make sure you disable comments on your page or you'll end up with
						two comment boxes on your page (available in <a href="<?php echo $this->get_fpc_link(); ?>" target="_blank">Fanpage Connect Pro</a>).
					</p>
					</div>
				</div>

				<div>
					<h4><a href="#">Custom Templates</a></h4>
					<div>
					<p>
						To use a custom fan page template, just select one from the drop down menu.
					</p>
					<p>
						<strong>Adding Templates</strong><br />
						You can create your own templates or use more templates downloaded from the Fanpage Connect Template Club.
						To add additional templates, just upload the template to the following directory:<br />
						<strong><?php echo FPC_PLUGIN_URL; ?>/templates</strong>.
					</p>
					</div>
				</div>

				<div>
					<h4><a href="#">Using Custom CSS</a></h4>
					<div>
					<p>
						<strong>Custom CSS Link</strong><br />
						Fanpage Connect already formats content using Facebook's CSS styles. However, you can include extra CSS for your pages by
						adding a link to an external stylehseet. Be sure to use an absolute URL for the link.
					</p>
					<p>
						Linking to a custom CSS file is preferable to entering freeform CSS. This method allows you to make changes to the CSS file instead
						of having to edit the style per page.
					</p>
					<p>
						<strong>Custom CSS</strong><br />
						If you have just a little CSS to use, like a tweak or two, or if the CSS applies only to this page, then you can add custom CSS here.
					</p>
					</div>
				</div>

				<div>
					<h4><a href="#">Custom Header/Footer Content</a></h4>
					<div>
					<p>
						Fanpage Connect can use templates, and this box allows you to put any content here - shortcodes, HTML, etc.
						This content will be displayed specifically in the header or footer areas of the template.
					</p>
					</div>
				</div>

			</div>

			<h3>Fanpage Connect Shortcodes</h3>
			<p>
				Fanpage Connect allows you to show or hide content based on a user's "Like" status of your Facebook page and insert Facebook Social Plugins like comments, like and share buttons.
				This is achieved by using <a href="http://codex.wordpress.org/Shortcode" target="_blank">shortcodes</a> (they're like reuseable macros) in your content.
			</p>

			<div id="fpc-accordion2">

				<div>
					<h4><a href="#">Showing Content if Your Page <u>Hasn't</u> Been &quot;Liked&quot;</a></h4>
					<div>
					<p>
						<strong>[fbnotliked]</strong><br />
						Teaser content would go here. Calls to action (ex: &quot;Like us to get your FREE report!&quot;)<br />
						<strong>[/fbnotliked]</strong>
					</p>
					</div>
				</div>

				<div>
					<h4><a href="#">Showing Content After Your Page <u>Has</u> Been &quot;Liked&quot;</a></h4>
					<div>
					<p>
						<strong>[fbliked]</strong><br />
						Thanks for likeing us! Now here's your awesome video and free report!<br />
						<strong>[/fbliked]</strong>
					</p>
					<p>
						Once the user has liked your page, this content will no longer show up.
					</p>
					</div>
				</div>

				<div>
				<h4><a href="#">Showing Content To Users That Are Page Admins</a></h4>
					<div>
					<p>
						<strong>[fbadmin]</strong><br />
						Hey, Chris - remember to check our Facebook insights stats when you see this!<br />
						<strong>[/fbadmin]</strong>
					</p>
					<p>
						Once the user has liked your page, this content will be displayed.
					</p>
					</div>
				</div>

				<div>
				<h4><a href="#">Custom Google Fonts</a></h4>
					<div>
					<p>
						<strong>[font face='Maven Pro' size=16 color=#99000 class='']</strong><br />
						You can really add some sizzle to your fan pages with custom <a href="http://www.google.com/webfonts" target="_blank">Google Fonts</a>.
						As of June 2011, there are <strong>154</strong> fonts that you can use!
					</p>
					<p>
						<strong>Shortcode Parameters:</strong>
						<ul>
							<li>
								<em><strong>face</strong></em> - Any valid <a href="http://www.google.com/webfonts" target="_blank">Google Font</a> name. Default is none.
							</li>
							<li>
								<em><strong>size</strong></em> - size in pixels (px). Default is 14px.
							</li>
							<li>
								<em><strong>color</strong></em> - Any hexadecimal color value. Default is #000000.
							</li>
							<li>
								<em><strong>class</strong></em> - CSS class of the text's &lt;span&gt; wrapper (for more CSS control). Default is none.
							</li>
						</ul>
					</p>
					<p>
						<span class="fpc-note">NOTE: Less is more! One or two fonts look good, but a lot of fonts can really ruin a good page.
						Also remember that each font must be loaded in your page, so multiple Google Fonts can degrade page load time.</span>
					</p>
					</div>
				</div>

			</div>

			<h3>Need More Help?</h3>
			<p>
				Be sure to <a href="http://www.fanpageconnect.com" target="_blank">visit the website</a> for training videos, free custom templates and fan page tab icons.
			</p>
			<p>
				You can also visit us on <a href="http://www.facebook.com/FanpageConnect" target="_blank">Facebook</a> of course!
			</p>

			<h3>Fanpage Connect Rocks, But I Want More!</h3>
			<p>
				You're in luck! <a href="<?php echo $this->get_fpc_link(); ?>" target="_blank">Fanpage Connect Pro</a> adds a whole lot more features so that you can really amp up your social marketing. Check out these extra features...
			</p>
			<p>
				<ul class="pro-features">
					<li>Disable &quot;Link Luv&quot; - remove branding for offline marketing or client pages</li>
					<li>Add your ClickBank ID to turn the &quot;Link Luv&quot; into a money making affiliate link</li>
					<li>Filter Removal for Header, content and Footer. Allows you to keep plugins from altering your content</li>
					<li>Redirect to a different URL after being &quot;Liked&quot; - even more fan gate control</li>
					<li>Opt-In form box and shortcode to easily add opt-in forms, videos or other custom content</li>
					<li>Hide Selections of Content for N days - good for one time offers, coupon codes after &quot;like&quot;, etc</li>
					<li>Show Content On/After a Predetermined Date</li>
					<li>Expire Content On a Predetermined Date</li>
					<li>Auto-force links to open in a new window (outside the iFrame)</li>
					<li>Show your latest blog posts - by most recent, category, or custom posts</li>
					<li>Shortcode for Facebook Comments</li>
					<li>Shortcodes for Facebook Like buttons
					<li>Shortcode for Facebook Share button</li>
					<li>Shortcode for Facebook Send button</li>
					<li>Shortcode for the high conversion Multi-friend Inviter!</li>
					<li>Shortcode for Facebook Activity Feed</li>
					<li>Super Viral &quot;FB Karma&quot; Function - give users a reward for posting your link on their wall!</li>
					<li>Full point n' click interface in the visual editor - no need to type your shortcodes</li>
					<li>Widgetized areas in the content and footer</li>
					<li>Extra templates with more released regularly</li>
					<li>Custom WordPress menus per page</li>
					<li>Fan Page URL &amp; Open Graph Settings per page - host pages for your clients for even more cashflow</li>
					<li>Unlimited pages and NO monthly fees like those other guys!</li>
				</ul>
			</p>

		<?php endif; ?>

		<h5>Fanpage Connect plugin by <a href="<?php echo $this->get_fpc_link(); ?>" target="_blank">FanpageConnect</a>. Copyright <?php echo date('Y'); ?> Pat Friedl, Christopher Friedl &amp; Bryan Batson</h5>

	</div><!-- dbx-content -->

</div><!-- wrap -->
<script language="JavaScript">
	jQuery(document).ready( function() {
		jQuery("#App_ID_Add").click( function() {
			App_ID = jQuery("#App_ID").val();
			if (App_ID != "") {
				srcID = "#fpc_pagelink_" + jQuery("#App_ID_Select").val();
				redirURL = jQuery(srcID).val();
				//redirURL = 'https://apps.facebook.com/trilogicllc/';
				window.open("http://www.facebook.com/dialog/pagetab?app_id=" + App_ID + "&redirect_uri="+redirURL,"PageTab","width=790,height=200");
			} else {
				alert("Please enter your\nFacebook Application ID.");
			}
		}); 
		jQuery("#App_ID_Select").change( function() {
			srcID = "#fpc_appid_" + jQuery("#App_ID_Select").val();
			jQuery("#App_ID").val( jQuery(srcID).val() );
		});
	});  
</script>
