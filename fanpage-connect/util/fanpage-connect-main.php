<?php
// get form variables if there are any
global $frm_submit;

$frm_email = isset($_GET['usr_email']) ? trim($_GET['usr_email']) : '';
$frm_name = isset($_GET['usr_name']) ? trim($_GET['usr_name']) : '';
$frm_onlist = isset($_GET['fpc_onlist']) ? trim($_GET['fpc_onlist']) : '';
$frm_step = isset($_GET['reg_step']) ? intval(trim($_GET['reg_step'])) : 0;
$frm_submit = isset($_GET['submit']) ? trim($_GET['submit']) : '';

$reg_form_args = array(
	'name' => $frm_name,
	'email' => $frm_email
	);

/* handle the form submission */
if($frm_email != '' && $frm_name != '' && $frm_submit != '')
{
	// activate if we're already on the list.
	$activated = ($frm_onlist != '')? true : false;

	// update the options now that we have a name and email.
	$options = array(
		'activated' => $activated,
		'name' => $frm_name,
		'email' => $frm_email,
		'plugin_type' => 'free'
	);
	update_option($this->fpc2_db_option,$options);
	$this->plugin_activated = $options['activated'];
}
global $wp_filter;
global $post;
?>
<link rel="stylesheet" href="<?php echo FPC_PLUGIN_URL; ?>/css/fpc-admin.css" type="text/css" media="screen" />
<div class="wrap" style="max-width:950px !important;">

	<a href="http://www.fanpageconnect.com/" target="_blank">
		<img src="<?php echo FPC_PLUGIN_URL; ?>/img/fbconnect-logo.png" style="border:none;margin:8px 0px 4px 0px;">
	</a>

	<div id="fpc-fb-like">
		<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.fanpageconnect.com%2Ffanpage-connect%2F&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;font=lucida+grande&amp;colorscheme=light&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:35px;" allowTransparency="true"></iframe>
	</div>

	<div class="dbx-content">

		<?php
		if(!$this->plugin_activated){
			if($frm_email == '' && $frm_name == '' && $frm_submit == '') {

				// not activated, show the reg form, step 1
				reg_step1();

			} elseif($frm_email != '' && $frm_name != '' && $frm_onlist == '' && $frm_submit != '' && $frm_step == 1) {

				// user registered, show step 2
				reg_step2($frm_name,$frm_email);

			}
		} elseif($frm_email != '' && $frm_name != '' && $frm_onlist!= '' && $frm_submit != '' && $frm_step == 2) {
				reg_step3(); // activated!
		}
		?>

		<?php if($this->plugin_activated): ?>

			<?php if(isset($this->fpc2_options)){ ?>
			<h2>Fanpage Connect Plugin Info</h2>
			<table class="fpc-info" border="0">
				<tr>
					<td class="label">Plugin Version:</td>
					<td>v<?php echo FPC_PLUGIN_VERSION; ?> <?php echo ucfirst($this->fpc2_options['plugin_type']); ?></td>
				</tr>
				<tr>
					<td class="label">Registered To:</td>
					<td><?php echo ucfirst($this->fpc2_options['name']); ?></td>
				</tr>
				<tr>
					<td class="label">Registered Email:</td>
					<td><?php echo $this->fpc2_options['email']; ?></td>
				</tr>
					<td class="label">Upgraded from v1.x?</td>
					<td><?php if($this->fpc2_options['upgraded'] == 'true'){ ?>Yes<?php } else { ?>No<?php } ?></td>
				</tr>
				<?php if(!empty($this->fpc2_options['cb_receipt'])){ ?>
				</tr>
					<td class="label">Purchase Date:</td>
					<td><?php echo $this->fpc2_options['cb_date']; ?></td>
				</tr>
				</tr>
					<td class="label">Receipt ID:</td>
					<td><?php echo $this->fpc2_options['cb_receipt']; ?></td>
				</tr>
				</tr>
					<td class="label">Customer Name:</td>
					<td><?php echo $this->fpc2_options['cb_name']; ?></td>
				</tr>
				<?php } ?>
			</table>

			<p>
				<strong>
				Remember that you'll need a secure certificate for your fan pages!
				<a href='http://www.fanpageconnect.com/go/ssl-store' target="_blank" title="Secure Your Fanpage">The SSL Store</a>
				has certificates from $10.99 USD!
				</strong>
			</p>

			<p>
				<strong>
				Need some support, tips or tricks on using Fanpage Connect?<br>
				<a href='https://www.facebook.com/groups/FanpageConnectMastermind/' target="_blank" title="Join our Fanpage Connect Mastermind Facebook Group">Join our Fanpage Connect Mastermind Facebook Group</a>
				</strong>
			</p>

			<h3>Suggested &amp; Recommended Plugins</h3>
			<ul class="fpc-suggested-plugins">
			<li>
				<a href="http://wordpress.org/plugins/easy-columns/" target="_blank">Easy Columns</a><br>
				Another of our plugins, Easy Columns allows you to create content in an easy, responsive grid layout.
			</li>
			<li>
				<a href="http://wordpress.org/plugins/shortcodes-ultimate/" target="_blank">Shortcodes Ultimate</a><br>
				This plugin has it all - accordions, call out boxes, slideshows; video. Combined with Fanpage Connect, your
				fan pages will be unstoppable!
			</li>
			<li>
				<a href="http://wordpress.org/plugins/advanced-text-widget/" target="_blank">Advanced Text Widget</a><br>
				ATW allows you to put any content in your sidebars, even php. Much better than the standard WordPress text widget.
			</li>
			<li>
				<a href="http://www.fanpageconnect.com/go/webcasterwp" target="_blank">Webcaster WP</a><br>
				You can really ramp up the viral in your fan pages with video call to actions. WebCaster WP converts!
			</li>
			<li>
				<a href="http://wordpress.org/plugins/wordpress-https/" target="_blank">WordPress HTTPS</a><br>
				This plugin ensures that all your content is secure when viewed via HTTPS, so your users won't get the annoying warnings that
				there's unsecured content on the page. It also works <b>very</b> well using WordPress with Shared SSL.
			</li>
			<li>
				<a href="http://wordpress.org/plugins/wordpress-https-test/" target="_blank">WordPress HTTPS Test</a><br>
				Another of our plugins. Use this one to find any unsecured content in case you get the security warnings in your secure tab.
				It'll highlight any unsecure content or alert you to unsecured scripts or stylesheets.
			</li>
			<li>
				<a href="http://www.fanpageconnect.com/go/gravity-forms" target="_blank">GravityForms</a><br>
				This is the mother of all contact form plugins. With confirmations, notifications and drag and drop form editor, it doesn't
				get any easier than Gravity Forms.
			</li>
			<li>
				<a href="http://wordpress.org/extend/plugins/contact-form-7/" target="_blank">Contact Form 7</a><br>
				A long time staple of WordPress sites, Contact Form 7 is a tried and true form solution.
			</li>
			</ul>
			<?php } ?>

			<?php if(!empty($this->fpc1_options)){ ?>
			<h3>FanPage Connect Legacy Settings</h3>
			<p>
				It looks like you had the older version of Fanpage Connect installed. Thanks for being a loyal customer! The good news is that
				Fanpage Connect 2 will remain backwards compatible with the legacy 1.x pages. However, to keep from bloating the plugin by fully supporting
				both versions, you won't be able to edit the legacy <b>Global Settings</b> or create <u>new</u> legacy pages. But to help out,
				we'll display the old settings for your reference. Migrate your old pages to the new schema - we may not stay backwards compatible forever!
			</p>
			<table border="0" cellpadding="2" cellspacing="2">
				<tr>
					<td valign="top" width="150"><strong>Fan Page URL</strong></td>
					<td><?php echo $this->fpc1_options['fpurl']; ?></td>
				</tr>
				<tr>
					<td valign="top" colspan="2"><b>Open Graph Tags</b></td>
				</tr>
				<tr>
					<td valign="top" width="150"><strong>&nbsp;&nbsp;&nbsp;Title</strong></td>
					<td><?php echo $this->fpc1_options['fpogtitle']; ?></td>
				</tr>
				<tr>
					<td valign="top" width="150"><strong>&nbsp;&nbsp;&nbsp;Type</strong></td>
					<td><?php echo $this->fpc1_options['fpogtype']; ?></td>
				</tr>
				<tr>
					<td valign="top" width="150"><strong>&nbsp;&nbsp;&nbsp;Canonical URL</strong></td>
					<td><?php echo $this->fpc1_options['fpogurl']; ?></td>
				</tr>
				<tr>
					<td valign="top" width="150"><strong>&nbsp;&nbsp;&nbsp;Site Image URL</strong></td>
					<td><?php echo $this->fpc1_options['fpogimg']; ?></td>
				</tr>
				<tr>
					<td valign="top" width="150"><strong>&nbsp;&nbsp;&nbsp;Site Name</strong></td>
					<td><?php echo $this->fpc1_options['fpogname']; ?></td>
				</tr>
				<tr>
					<td valign="top" colspan="2"><b>Menu Options</b></td>
				</tr>
				<tr>
					<td valign="top"><strong>&nbsp;&nbsp;&nbsp;Use a Custom Menu?</strong></td>
					<td><?php echo $this->fpc1_options['use_menu']; ?></td>
				</tr>
				<tr>
					<td valign="top"><strong>&nbsp;&nbsp;&nbsp;Menu to Use</strong></td>
					<td><?php echo $this->fpc1_options['menu_name']; ?></td>
				</tr>
				<tr>
					<td valign="top"><strong>&nbsp;&nbsp;&nbsp;Display Menu</strong></td>
					<td><?php echo $this->fpc1_options['show_menu']; ?></td>
				</tr>
				<tr>
					<td valign="top" colspan="2"><b>Miscellaneous Options</b></td>
				</tr>
				<tr>
					<td valign="top"><strong>&nbsp;&nbsp;&nbsp;Link Luv?</strong></td>
					<td><?php echo $this->fpc1_options['link_luv']; ?></td>
				</tr>
				<tr>
					<td valign="top"><strong>&nbsp;&nbsp;&nbsp;ClickBank ID</strong></td>
					<td><?php echo $this->fpc1_options['aff']; ?></td>
				</tr>
				<tr>
					<td valign="top"><strong>&nbsp;&nbsp;&nbsp;Debug Mode?</strong></td>
					<td><?php echo $this->fpc1_options['debug']; ?></td>
				</tr>
				<tr>
					<td valign="top"><strong>&nbsp;&nbsp;&nbsp;Filter Removal</strong></td>
					<td>
						<b>Header Filters</b><br>
						<?php if(!empty($this->fpc1_options['header_filters'])){
						foreach($this->fpc1_options['header_filters'] as $filter){
							echo $filter."<br>";
						}
						} ?>
						<b>Content Filters</b><br>
						<?php if(!empty($this->fpc1_options['content_filters'])){
						foreach($this->fpc1_options['content_filters'] as $filter){
							echo $filter."<br>";
						}
						} ?>
						<b>Footer Filters</b><br>
						<?php if(!empty($this->fpc1_options['footer_filters'])){
						foreach($this->fpc1_options['footer_filters'] as $filter){
							echo $filter."<br>";
						}
						} ?>
					</td>
				</tr>
			</table>
			<?php } ?>

		<?php endif; ?>

		<h4>Fanpage Connect plugin by <a href="http://www.fanpageconnect.com" target="_blank">FanpageConnect</a>.  Copyright <?php echo date('Y'); ?> Pat Friedl, Christopher Friedl &amp; Bryan Batson</h4>

	</div><!-- dbx-content -->

</div><!-- wrap -->