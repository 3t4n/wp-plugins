<?php

// create custom plugin settings menu
add_action('admin_menu', 'bp_wp_navbar_config');

function bp_wp_navbar_config() {
//create new settings menu
	add_options_page('BP-WP-Navbar Options', 'BP-WP-Navbar', 'administrator', __FILE__, 'bp_wp_navbar_options',plugins_url('/images/icon.png', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'bp_wp_navbar_settings' );
}


function bp_wp_navbar_settings() {
	//register our settings
	register_setting( 'bp_wp_navbar-settings-group', 'hide_main_nav' );
	register_setting( 'bp_wp_navbar-settings-group', 'hide_site_name' );
	register_setting( 'bp_wp_navbar-settings-group', 'hide_login_signup' );
	register_setting( 'bp_wp_navbar-settings-group', 'hide_visit_random' );
	register_setting( 'bp_wp_navbar-settings-group', 'scroll_with_pages' );
	register_setting( 'bp_wp_navbar-settings-group', 'add_wp_pages' );
	register_setting( 'bp_wp_navbar-settings-group', 'add_bp_components' );
	register_setting( 'bp_wp_navbar-settings-group', 'page_link_dropdown' );
	register_setting( 'bp_wp_navbar-settings-group', 'bp_community_links' );
	register_setting( 'bp_wp_navbar-settings-group', 'list_pages_dropdown' );
	register_setting( 'bp_wp_navbar-settings-group', 'main_background_color' );
	register_setting( 'bp_wp_navbar-settings-group', 'sub_background_color' );
	register_setting( 'bp_wp_navbar-settings-group', 'main_text_color' );
	register_setting( 'bp_wp_navbar-settings-group', 'link_hover_color' );
	register_setting( 'bp_wp_navbar-settings-group', 'nav_back_color' );
	register_setting( 'bp_wp_navbar-settings-group', 'sub_item_width' );
	register_setting( 'bp_wp_navbar-settings-group', 'main_item_padding' );
	register_setting( 'bp_wp_navbar-settings-group', 'menu_border_color' );
	register_setting( 'bp_wp_navbar-settings-group', 'overall_navbar_width' );
	register_setting( 'bp_wp_navbar-settings-group', 'overall_item_height' );
	register_setting( 'bp_wp_navbar-settings-group', 'submenu_top_margin' );
	register_setting( 'bp_wp_navbar-settings-group', 'navbar_vertical_offset' );
	register_setting( 'bp_wp_navbar-settings-group', 'navbar_horizontal_offset' );
	register_setting( 'bp_wp_navbar-settings-group', 'item_font_family' );
	register_setting( 'bp_wp_navbar-settings-group', 'item_font_size' );
	register_setting( 'bp_wp_navbar-settings-group', 'item_font_style' );
	register_setting( 'bp_wp_navbar-settings-group', 'item_font_weight' );
}

function bp_wp_navbar_options() {
?>

<script type="text/javascript">
 /* <![CDATA[*/
 // Other Page
 function other() {
 // Tab
 document.getElementById('OtherTab').className = 'SelectedTab';
 document.getElementById('SizesTab').className = 'Tab';
 document.getElementById('ColorsTab').className = 'Tab';
 document.getElementById('LabelsTab').className = 'Tab';
 document.getElementById('OptionsTab').className = 'Tab';
 // Page
 document.getElementById('Other').style.display= 'block';
 document.getElementById('Sizes').style.display = 'none';
 document.getElementById('Colors').style.display = 'none';
 document.getElementById('Labels').style.display = 'none';
 document.getElementById('Options').style.display = 'none';
 }
 // Sizes Page
 function sizes() {
 // Tab
 document.getElementById('OtherTab').className = 'Tab';
 document.getElementById('SizesTab').className = 'SelectedTab';
 document.getElementById('ColorsTab').className = 'Tab';
 document.getElementById('LabelsTab').className = 'Tab';
 document.getElementById('OptionsTab').className = 'Tab';
 // Page
 document.getElementById('Other').style.display = 'none';
 document.getElementById('Sizes').style.display = 'block';
 document.getElementById('Colors').style.display = 'none';
 document.getElementById('Labels').style.display = 'none';
 document.getElementById('Options').style.display = 'none';
 }
 // Colors Page
 function colors() {
 // Tab
 document.getElementById('OtherTab').className = 'Tab';
 document.getElementById('SizesTab').className = 'Tab';
 document.getElementById('ColorsTab').className = 'SelectedTab';
 document.getElementById('LabelsTab').className = 'Tab';
 document.getElementById('OptionsTab').className = 'Tab';
 // Page
 document.getElementById('Other').style.display= 'none';
 document.getElementById('Sizes').style.display = 'none';
 document.getElementById('Colors').style.display = 'block';
 document.getElementById('Labels').style.display = 'none';
 document.getElementById('Options').style.display = 'none';
 }
 // Labels Page
 function labels() {
 // Tab
 document.getElementById('OtherTab').className = 'Tab';
 document.getElementById('SizesTab').className = 'Tab';
 document.getElementById('ColorsTab').className = 'Tab';
 document.getElementById('LabelsTab').className = 'SelectedTab';
 document.getElementById('OptionsTab').className = 'Tab';
 // Page
 document.getElementById('Other').style.display= 'none';
 document.getElementById('Sizes').style.display = 'none';
 document.getElementById('Colors').style.display = 'none';
 document.getElementById('Labels').style.display = 'block';
 document.getElementById('Options').style.display = 'none';
 }
 // Options Page
 function options() {
 // Tab
 document.getElementById('OtherTab').className = 'Tab';
 document.getElementById('SizesTab').className = 'Tab';
 document.getElementById('ColorsTab').className = 'Tab';
 document.getElementById('LabelsTab').className = 'Tab';
 document.getElementById('OptionsTab').className = 'SelectedTab';
 // Page
 document.getElementById('Other').style.display= 'none';
 document.getElementById('Sizes').style.display = 'none';
 document.getElementById('Colors').style.display = 'none';
 document.getElementById('Labels').style.display = 'none';
 document.getElementById('Options').style.display = 'block';
 }
 /* ]]> */
 </script> 

<div class="wrap">
<div id="Container">
	<!-- Title -->

	<div id="Title"><span style="color: #555;">BP-WP-Navbar Configuration</span></div>

<form method="post" action="options.php">
    <?php settings_fields( 'bp_wp_navbar-settings-group' ); ?>

	<!-- Tabs -->
	<ul id="Tabs">
		<li id="OptionsTab" class="SelectedTab"><a href="#Options" onclick="options(); return false;" title="Options">Feature Options</a></li>
		<li id="LabelsTab" class="Tab"><a href="#Labels" onclick="labels(); return false;" title="Labels">Labels &amp; Fonts</a></li>
		<li id="ColorsTab" class="Tab"><a href="#Colors" onclick="colors(); return false;" title="Colors">Color Scheme</a></li>
		<li id="SizesTab" class="Tab"><a href="#Sizes" onclick="sizes(); return false;" title="Sizes">Sizes &amp; Position</a></li>
		<li id="OtherTab" class="Tab"><a href="#Other" onclick="other(); return false;" title="Other">Other Stuff</a></li>
		<li class="SubmitTab">
    <input type="submit" class="button-primary" value="<?php _e('Save Settings') ?>" />
    </li>
	</ul>

	<!-- Content -->
	<div id="Content">

		<!-- Options -->	
		<div id="Options">
		<div id="toolbox">To view more information and tips about any feature, simply hover your mouse pointer over the <strong>&raquo;?&laquo;</strong> next to it.<br /><br />To preview your new custom BP-WP-Navbar as you go, click <strong>Save Settings</strong> and refresh any site page. Remember to save when you&#39;re done too!</div>
			<div class="SubTitle">&raquo; Feature Options</div>
			<div class="SubSubTitle">Check the features you wish to enable or disable below.</div>

    <table class="form-table">
        <tr valign="top">
        <th scope="row">Hide Main Theme Nav</th>
        <td><input type="radio" name="hide_main_nav" <?php if ( (int)get_option( 'hide_main_nav' ) ) : ?> checked="checked"<?php endif; ?> value="1" /><?php _e( 'Enable', '' ) ?>
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="hide_main_nav" <?php if ( !(int)get_option( 'hide_main_nav' ) ) : ?> checked="checked"<?php endif; ?> value="0" /><?php _e( 'Disable', '' ) ?>
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'You may as well hide your theme nav. It becomes kind of redundant once you have all your nav items in your fancy new custom job!<br /><br /><strong>If your theme is not a child theme of bp-default,</strong> this feature may not work as it targets "ul#nav". To allow this plugin to hide your theme nav in this case, edit line 219 of bp-wp-navbar.php. Change "ul#nav" to the appropriate container ID. <strong>Or...</strong><br />- Edit your theme&#39;s css file by adding "display:none;" to the appropriate nav ID. <strong>Or...</strong><br />- Use remove_action in bp-custom.php or your theme&#39;s functions.php.', '' ) ?></span></a></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Hide Site Name</th>
        <td><input type="radio" name="hide_site_name" <?php if ( (int)get_option( 'hide_site_name' ) ) : ?> checked="checked"<?php endif; ?> value="1" /><?php _e( 'Enable', '' ) ?>
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="hide_site_name" <?php if ( !(int)get_option( 'hide_site_name' ) ) : ?> checked="checked"<?php endif; ?> value="0" /><?php _e( 'Disable', '' ) ?>
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'This is simply the name of your site that appears on the left of the standard bp-adminbar. It&#39;s also kind of redundant on your main site, because that info is already visible in your header (if it isn&#39;t, it <em>should</em> be).<br /><br />Remember this plugin only modifies the navbar on your main site. If you enable this feature, your site name will remain visible in the bp-adminbar on all blogs of an MU/MS install.', '' ) ?></span></a></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Hide Login and Signup Links</th>
        <td><input type="radio" name="hide_login_signup" <?php if ( (int)get_option( 'hide_login_signup' ) ) : ?> checked="checked"<?php endif; ?> value="1" /><?php _e( 'Enable', '' ) ?>
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="hide_login_signup" <?php if ( !(int)get_option( 'hide_login_signup' ) ) : ?> checked="checked"<?php endif; ?> value="0" /><?php _e( 'Disable', '' ) ?>
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'This can be handy if you have login stuff elsewhere (for example, in your theme sidebar or footer) and have no need to show it twice.<br /><br />Note that if you are using Brajesh Singh&#39;s <em>damn cool</em> Branded Login Plugin, it will be detected and links will show or hide as you set them. (See "Other Stuff" for more.)', '' ) ?></span></a></td>
        </tr>

        <tr valign="top">
        <th scope="row">Hide Visit Random Menu</th>
        <td><input type="radio" name="hide_visit_random" <?php if ( (int)get_option( 'hide_visit_random' ) ) : ?> checked="checked"<?php endif; ?> value="1" /><?php _e( 'Enable', '' ) ?>
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="hide_visit_random" <?php if ( !(int)get_option( 'hide_visit_random' ) ) : ?> checked="checked"<?php endif; ?> value="0" /><?php _e( 'Disable', '' ) ?>
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'This can be very useful if you require users to sign up before viewing your content.<br /><br />For example, if you have a membership management plugin like s2member installed, and you limit access to certain information to logged-in members only (like member profiles or groups), it doesn&#39;t really make sense to provide a link to them, now does it?<br /><br />See "Other Stuff" for more on s2member. It&#39;s really cool!', '' ) ?></span></a></td>
        </tr>

        <tr valign="top">
        <th scope="row">Add Wordpress pages/menus</th>
        <td><input type="radio" name="add_wp_pages" <?php if ( (int)get_option( 'add_wp_pages' ) ) : ?> checked="checked"<?php endif; ?> value="1" /><?php _e( 'Enable', '' ) ?>
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="add_wp_pages" <?php if ( !(int)get_option( 'add_wp_pages' ) ) : ?> checked="checked"<?php endif; ?> value="0" /><?php _e( 'Disable', '' ) ?>
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'This feature allows you to add your Wordpress pages to your new BP-WP-Navbar.<br /><br />Configure the display of your pages under the "Labels &amp; Fonts" tab.', '' ) ?></span></a></td>
				</tr>

        <tr valign="top">
        <th scope="row">Add Buddypress components</th>
        <td><input type="radio" name="add_bp_components" <?php if ( (int)get_option( 'add_bp_components' ) ) : ?> checked="checked"<?php endif; ?> value="1" /><?php _e( 'Enable', '' ) ?>
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="add_bp_components" <?php if ( !(int)get_option( 'add_bp_components' ) ) : ?> checked="checked"<?php endif; ?> value="0" /><?php _e( 'Disable', '' ) ?>
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'This feature allows you to add ALL your active Buddypress components to your navbar in a single <em>Community</em> dropdown menu.<br /><br />See "Labels &amp; Fonts to change the default label.', '' ) ?></span></a></td>
        </tr>

        <tr valign="top">
        <th scope="row">Scroll with pages</th>
        <td><input type="radio" name="scroll_with_pages" <?php if ( (int)get_option( 'scroll_with_pages' ) ) : ?> checked="checked"<?php endif; ?> value="1" /><?php _e( 'Enable', '' ) ?>
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="scroll_with_pages" <?php if ( !(int)get_option( 'scroll_with_pages' ) ) : ?> checked="checked"<?php endif; ?> value="0" /><?php _e( 'Disable', '' ) ?>
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Enabling this feature will <em>unstick</em> the BP-WP-Navbar from the top of your screen and allow it to scroll with your pages.<br /><br />If you want to position the navbar in a precise location relative to your theme, enter the appropriate values in the <em>Vertical Offset</em> and <em>Horizontal Offset</em> fields under the "Sizes &amp; Position" tab.', '' ) ?></span></a></td>
        </tr>
    </table>

		</div>

		<!-- Labels -->	
		<div id="Labels" style="display: none;">
		<div id="toolbox"></div>
			<div class="SubTitle">&raquo; Labels &amp; Fonts</div>
			<div class="SubSubTitle">Define how you want your menu items to be displayed.</div>

    <table class="form-table">
<?php if ( !function_exists( 'wp_nav_menu' ) ): ?>
        <tr valign="top">
        <th scope="row">Display Top-Level Wordpress Pages</th>
        <td><input type="radio" name="page_link_dropdown" <?php if ( (int)get_option( 'page_link_dropdown' ) ) : ?> checked="checked"<?php endif; ?> value="1" /><?php _e( 'In a dropdown menu', '' ) ?>
        <a class="tip">&nbsp;&nbsp;&nbsp;&nbsp;&raquo;?&laquo;<span><?php _e( 'Select <em>In a dropdown menu</em> if you want top-level pages in a <strong>single</strong> dropdown menu with child pages appearing as flyout sub-menus. Make sure you enter a menu label below in this case!<br /><br />Select <em>As menu items</em> if you want to arrange top-level pages horizontally as menu items, with their child pages appearing in dropdowns.', '' ) ?></span></a>
        <br /><input type="radio" name="page_link_dropdown" <?php if ( !(int)get_option( 'page_link_dropdown' ) ) : ?> checked="checked"<?php endif; ?> value="0" /><?php _e( 'As menu items', '' ) ?></td>
        </tr>

        <tr valign="top">
        <th scope="row">Label for Wordpress 2.x Page Dropdown</th>
        <td><input type="text" name="list_pages_dropdown" value="<?php echo get_option('list_pages_dropdown'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Enter the label for your menu here if you have selected <em>In a dropdown menu</em> above.<br /><br />IMPORTANT: If you upgrade to Wordpress 3.x, you can define up to 5 custom menu dropdowns.', '' ) ?></span></a></td>
        </tr>
<?php endif; ?>
         
<?php if ( function_exists( 'wp_nav_menu' ) ): ?>
        <tr valign="top">
        <th scope="row"><strong>Wordpress 3.x detected.</strong></th>
        <td><strong>Important stuff here!&nbsp;&raquo;</strong>
        <a class="tip">&nbsp;&raquo;?&laquo;<span>You have Wordpress 3.x installed. Create your custom menus under "Appearance" > "Menus". Then select the menus you wish to display in your BP-WP-Navbar in the "Theme Locations" area of that screen (the custom menu names will be the main items in your new navbar). If you forget this important step, your menus will <strong>not</strong> display.<br /<br />Note that this plugin provides for the display of up to 5 distinct WP3.x custom menus in your new navbar.</span></a></td>
        </tr>
<?php endif; ?>

        <tr valign="top">
        <th scope="row">Label for Buddypress component menu</th>
        <td><input type="text" name="bp_community_links" value="<?php echo get_option('bp_community_links'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Enter the label you wish to give to your Buddypress directory dropdown. Leave blank for the default label: "Community".<br /><br />Note that it is not advisable for a plugin to change slugs for the component names themselves, so you cannot do that here. See "Other Stuff" for more info about how you can.', '' ) ?></span></a></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Font for all menu items</th>
        <td><input type="text" name="item_font_family" value="<?php echo get_option('item_font_family'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Enter your desired font. (Leave blank for default.) Ex: Times New Roman, Trebuchet, Arial, Harrington, Poor Richard, Onyx.<br /><br />Note that not all browsers will adequately render fancy fonts, so try to keep it simple... and check your spelling!', '' ) ?></span></a></td>
        </tr>

        <tr valign="top">
        <th scope="row">Font size</th>
        <td><input type="text" name="item_font_size" value="<?php echo get_option('item_font_size'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Enter your desired font size for the link text. No need to add <strong><em>px</em></strong> here &#39;cuz it&#39;s already in the code.<br /><br />Note that this setting will affect ALL menu items. Also, if you set this too high, your navbar could look really freaky. If you need a rather large size, adjust the "Navbar and menu item height" setting under the "Sizes &amp; Position" tab.', '' ) ?></span></a></td>
        </tr>

        <tr valign="top">
        <th scope="row">Italic font?</th>
        <td><input type="radio" name="item_font_style" <?php if ( (int)get_option( 'item_font_style' ) ) : ?> checked="checked"<?php endif; ?> value="1" /><?php _e( 'Yes', '' ) ?>
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="item_font_style" <?php if ( !(int)get_option( 'item_font_style' ) ) : ?> checked="checked"<?php endif; ?> value="0" /><?php _e( 'No', '' ) ?>
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Bold font?</th>
        <td><input type="radio" name="item_font_weight" <?php if ( (int)get_option( 'item_font_weight' ) ) : ?> checked="checked"<?php endif; ?> value="1" /><?php _e( 'Yes', '' ) ?>
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="item_font_weight" <?php if ( !(int)get_option( 'item_font_weight' ) ) : ?> checked="checked"<?php endif; ?> value="0" /><?php _e( 'No', '' ) ?>
        </td>
    </table>

		</div>

		<!-- Colors -->
		<div id="Colors" style="display: none;">
		<div id="toolbox">Set any color to <em>transparent</em> if you want your theme background to show through. Leave blank for default colors.<br />You may specify colors using standard names like <em>red, yellow or green</em> (without the "#" sign), or html color codes (remember to include the "#" sign in this case!)</div>
			<div class="SubTitle">&raquo; Color Scheme</div>
			<div class="SubSubTitle">Configure the color scheme for your new navbar.</div>

    <table class="form-table">
        <tr valign="top">
        <th scope="row">Navbar background color</th>
        <td><input type="text" name="nav_back_color" value="<?php echo get_option('nav_back_color'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Overall background color of the navbar.', '' ) ?></span></a></td>
        </tr>

        <tr valign="top">
        <th scope="row">Main menu item color</th>
        <td><input type="text" name="main_background_color" value="<?php echo get_option('main_background_color'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Background color of main menu items.', '' ) ?></span></a></td>
        </tr>

        <tr valign="top">
        <th scope="row">Sub menu item color</th>
        <td><input type="text" name="sub_background_color" value="<?php echo get_option('sub_background_color'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Background color of sub menu and flyout items.', '' ) ?></span></a></td>
        </tr>

        <tr valign="top">
        <th scope="row">Sub menu border color</th>
        <td><input type="text" name="menu_border_color" value="<?php echo get_option('menu_border_color'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Adds a 1px wide border around all sub menus and flyouts. Set to same color as <strong>Sub menu item color</strong> to mimic no border.', '' ) ?></span></a></td>
        </tr>

        <tr valign="top">
        <th scope="row">Menu item text color</th>
        <td><input type="text" name="main_text_color" value="<?php echo get_option('main_text_color'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Text color of ALL menu items.', '' ) ?></span></a></td>
        </tr>

        <tr valign="top">
        <th scope="row">Menu item hover color</th>
        <td><input type="text" name="link_hover_color" value="<?php echo get_option('link_hover_color'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Hover color of ALL menu items. Do not use <em>transparent</em> here (unless you do not want a hover color).', '' ) ?></span></a></td>
        </tr>
    </table>

		</div>

		<!-- Sizes -->
		<div id="Sizes" style="display: none;">
		<div id="toolbox">For all dimensions, simply enter the value. No need to add "px" here 'cuz it's already in the code.</div>
			<div class="SubTitle">&raquo; Sizes &amp; Position</div>
			<div class="SubSubTitle">Configure the dimensions and positioning.</div>

    <table class="form-table">
        <tr valign="top">
        <th scope="row">Overall navbar width</th>
        <td><input type="text" name="overall_navbar_width" value="<?php echo get_option('overall_navbar_width'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Sets the width of the navbar on ALL pages, including permalink <em>View</em> pages.<br /><br />Note that the navbar will remain centered on the page. To reposition it relative to your theme, see <em>Vertical Offset</em> and <em>Horizontal Offset</em> below.', '' ) ?></span></a></td>
        </tr>

        <tr valign="top">
        <th scope="row">Navbar and menu item height</th>
        <td><input type="text" name="overall_item_height" value="<?php echo get_option('overall_item_height'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Sets the height of the navbar and ALL menu items. If you enter a value here, remember to also adjust the sub-menu top margin below!', '' ) ?></span></a></td>
        </tr>

        <tr valign="top">
        <th scope="row">Sub-menu top margin</th>
        <td><input type="text" name="submenu_top_margin" value="<?php echo get_option('submenu_top_margin'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Adjusts the top margin of sub-menus. Required if you changed the navbar and menu item height above. Note that this value <strong>must</strong> be negative!', '' ) ?></span></a></td>
        </tr>

        <tr valign="top">
        <th scope="row">Main menu item padding</th>
        <td><input type="text" name="main_item_padding" value="<?php echo get_option('main_item_padding'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Use this setting to adjust the width of your main navbar items. This sets the padding <strong>to the right</strong> of the link text of each main menu item. Note that this value <strong>cannot</strong> be negative.', '' ) ?></span></a></td>
        </tr>

        <tr valign="top">
        <th scope="row">Sub menu item width</th>
        <td><input type="text" name="sub_item_width" value="<?php echo get_option('sub_item_width'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Sets the width of sub menus and flyouts.', '' ) ?></span></a></td>
        </tr>

        <tr valign="top">
        <th scope="row">Vertical offset</th>
        <td><input type="text" name="navbar_vertical_offset" value="<?php echo get_option('navbar_vertical_offset'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Repositions the navbar this many pixels from the <strong>top</strong> of your theme template.<br /><br />If you set a value here, you may want to enable <em>Scroll with pages</em> under the "Feature Options" tab.', '' ) ?></span></a></td>
        </tr>

        <tr valign="top">
        <th scope="row">Horizontal offset</th>
        <td><input type="text" name="navbar_horizontal_offset" value="<?php echo get_option('navbar_horizontal_offset'); ?>" />
        <a class="tip">&nbsp;&raquo;?&laquo;<span><?php _e( 'Offsets the center of your navbar this many pixels to <strong>the right</strong> of your theme template&#39;s vertical centerline. Enter a negative value to offset to the left.<br /><br />If you set a value here, you may want to enable <em>Scroll with pages</em> under the "Feature Options" tab.', '' ) ?></span></a></td>
        </tr>
    </table>

		</div>

	</form>


		<!-- Other -->
		<div id="Other" style="display: none;">
<div style="float:right;text-align:center;">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="LVQRWKA7SWWZL">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<br /><a href="http://nowrecovery.com"><img src="http://nowrecovery.com/images/logo-alt.png"></a>
</div>
			<div class="SubTitle">&raquo; Other Stuff</div>
			<div class="SubSubTitle">Maybe some useful information here for ya...</div>

<h4>I love this thing! Where can I donate?</h4>
<p>You can show your love by helping to support my addiction recovery network: <a href="http://nowrecovery.com">NOWrecovery.com</a> The "Donate" button will take you straight to PayPal<sup>&#169;</sup>. If you or someone you care about are at odds with addiction and its devastating consequences, click the logo and get involved today!</p>
<h4>Need help with this plugin?</h4>
<p>There are support forums at <a target="_blank" href="http://buddypress.org/community/groups/add-all-nav-links-to-bp-adminbar/forum/">Buddypress.org</a> and at <a target="_blank" href="http://wordpress.org/tags/add-all-nav-links-to-bp-adminbar?forum_id=10">Wordpress.org</a> where a bunch of helpful folks love to hang out!</p>
<h4>Some more cool stuff you might like here.</h4>
<p>Not fond of the WP login page? Brajesh Singh&#39;s <a target="_blank" href="http://buddydev.com/buddypress/buddypress-branded-login-plugin-for-your-buddypress-powered-site/">Branded Login Plugin</a> themes your login page to match your main site.</p>
<p>Want a powerful membership management system for your Buddypress site? Check out the <a target="_blamk" href="http://www.primothemes.com/post/s2member-membership-plugin-with-paypal/">s2member</a> plugin.</p>
<p>Want to change the slug names (labels) for your Buddypress components? See the codex <a target="_blank" href="http://codex.buddypress.org/how-to-guides/customizing-labels-messages-and-urls/">here</a> to learn how.</p>
<p class="small">Links to other plugins &amp; stuff are provided simply &#39;cuz I like &#39;em &amp; I use &#39;em. Enjoy!</p>
<p class="foot">Add All Nav Links to BP-Adminbar (BP-WP-Navbar) Copyright &#169; 2010 by <a href="http://nowrecovery.com/members/admin/profile/public/">Patrick Cohen</a>. (With <strong>lots</strong> of help &amp; tutoring from <a href="http://buddypress.org/community/members/hnla/">hnla</a>. Thanks buddy!)</p>
		</div>

	</div><!--Content-->



</div><!--Container-->
</div><!--Wrap-->


<style type="text/css" media="screen">
 P {
 padding-left: 10px;
 }
 .small {
  font-size:0.8em;
  line-height:1em;
  font-weight:normal;
  font-style:italic;
  text-align:left;
  margin-bottom:0;
 }
 .foot {
  font-size:0.8em;
  line-height:1em;
  font-weight:normal;
  font-style:italic;
  text-align:center;
  padding-top:10px;
  margin-bottom:0;
  border-top: 1px solid #a2b6cb;
 }
 LI {
 margin-top: 20px;
 }
 /* Place Holder Style */
 #Container {
 float:left;
 width: 780px;
 margin: 15px 20px;
 }
 #Content {
 position:relative;
 background-color: #fafafa;
 border-top: 1px solid #a2b6cb;
 border-bottom: 1px solid #a2b6cb;
 padding: 20px 10px 10px;
 margin-top: -13px;
 }
 /* Title Style */
 #Title {
 font-family: Verdana, Arial;
 font-size: 22px;
 font-weight: bold;
 color: #389aff;
 margin: 10px 0;
 padding-bottom:5px;
 }
 .SubTitle {
 font-family: Verdana, Arial;
 font-size: 18px;
 font-weight: bold;
 color: #5b87b4;
 }
 .SubSubTitle {
 font-family: Verdana, Arial;
 font-size: 14px;
 font-weight: bold;
 color: #73a4d6;
 }
 /* Tabs */
 UL#Tabs {
 font-family: Verdana, Arial;
 font-size: 12px;
 font-weight: bold;
 list-style-type: none;
 padding-bottom: 28px;
 border-bottom: 1px solid #a2b6cb;
 margin-bottom: 12px;
 z-index: 1;
 position:relative;
 }
 #Tabs LI.Tab {
 float: left;
 height: 25px;
 background-color: #deedfb;
 margin: 2px 5px 0px 0px;
 border: 1px solid #a2b6cb;
 }
 #Tabs LI.SubmitTab {
 float: right;
 height: 25px;
 margin: 2px 5px 0px 0px;
 }
 #Tabs LI.Tab A {
 float: left;
 display: block;
 color: #666666;
 text-decoration: none;
 padding: 5px;
 }
 #Tabs LI.Tab A:hover {
 background-color: #bfe0fe;
 }
 /* Selected Tab */
 #Tabs LI.SelectedTab {
 float: left;
 height: 25px;
 background-color: #fafafa;
 margin: 2px 5px 0px 0px;
 border-top: 1px solid #a2b6cb;
 border-right: 1px solid #a2b6cb;
 border-bottom: 1px solid #fafafa;
 border-left: 1px solid #a2b6cb;
 }
 #Tabs LI.SelectedTab A {
 float: left;
 display: block;
 color: #666666;
 text-decoration: none;
 padding: 5px;
 cursor: default;
 }
 /* Tooltips */
#toolbox {
  position:absolute;
  top:68px;
  right:0;
	width: 295px;
	height:200px;
	padding: 5px 10px 10px;
	background: #F9F9F9;
	text-align:left;
	font-weight:normal;
	color: #666666;
}
a.tip {
  font-size:1.4em;
  font-weight:bold;
}
a.tip span {
  font-size:0.68em;
  line-height:1.4em;
  font-weight:normal;
  position:absolute;
	display: none;
  top:68px;
  right:0px;
	width: 305px;
	height:180px;
	padding: 5px;
	z-index: 100;
	color: #555;
	background: #F9F9F9;
}
a:hover.tip {

}
a:hover.tip span {
	display: block;
}
  </style>
 
<?php } ?>