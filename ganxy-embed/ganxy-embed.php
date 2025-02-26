<?php
/*
Plugin Name: Ganxy Embed
Plugin URI: http://ganxy.com/
Description: Official WordPress Plugin to Embed Ganxy products by URL or Embed script. 
Version: 1.4.2
Author: Ganxy, Inc.
Author URI: http://ganxy.com/
Text Domain: ganxy-embed
Domain Path: /lang
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

 * Copyright (C)2016 Ganxy, Inc.
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the [GNU General Public License](http://wordpress.org/about/gpl/)
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * on an "AS IS", but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see [GNU General Public Licenses](http://www.gnu.org/licenses/),
 * or write to the Free Software Foundation, Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301, USA.
*/

class GWP_ganxy_shortcode{
	/**
	 * $shortcode_tag 
	 * holds the name of the shortcode tag
	 * @var string
	 */
	public $shortcode_tag = 'ganxy_shortcode';

	/**
	 * __construct 
	 * class constructor will set the needed filter and action hooks
	 * 
	 * @param array $args 
	 */
	function __construct($args = array()){
		add_shortcode( $this->shortcode_tag, array( $this, 'shortcode_handler' ) );
		/**
		* We do not want to run these if this is an ajax call or a autosave.
		*/
		if ( is_admin() && !( defined('DOING_AJAX') && DOING_AJAX ) && !( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ){
			add_action(	'admin_head', array( $this, 'admin_head') );
			add_action( 'admin_menu', array( $this, 'ganxy_plugin_help_page' ) );
			add_action( 'admin_enqueue_scripts', array( $this , 'admin_enqueue_scripts' ) );
			add_filter( 'mce_external_languages', array( $this, 'add_translations' ) );
			add_action( 'plugins_loaded', array( $this, 'ganxy_load_textdomain' ) );
		}
		/*
		* Front End Script. 
		* Although loaded on every frontend page, it does not trigger the function upless the required element exists.
		*/
		add_action( 'wp_enqueue_scripts', array( $this, 'ganxy_embed_script' ) );
	}

	/**
	 * Load plugin textdomain.
	 */
	function ganxy_load_textdomain() {
		load_plugin_textdomain( 'ganxy-embed', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' ); 
	}

	/**
	 * add help page to plugins menu
	 * @return void
	 */
	function ganxy_plugin_help_page() {
		add_plugins_page( 'Ganxy ' . __( 'Plugin Help', 'ganxy-embed' ), 'Ganxy ' . __( 'Plugin Help', 'ganxy-embed' ) , 'manage_options', 'ganxy-help-page', array( $this, 'ganxy_help_page_function' ) );
	}	
		
	/**
	 * help page content
	 * @return void
	 */
	function ganxy_help_page_function() {
		//plugins_page_ganxy-help-page
		echo '
			<div class="wrap">
				<h1>' . __( 'Ganxy Embed Plugin Help', 'ganxy-embed' ) . '</h1>
				<p>' . __( 'To get help with creating Ganxy products and getting the embed code or product URL, please visit', 'ganxy-embed' ) . ' <a href="https://ganxy.com/help" target="_blank">https://ganxy.com/help</a>.</p>
				<p>' . __( 'This plugin creates what is called a "shortcode". This shortcode has a placeholder image that is displayed in the visual editor for an easy visual queue of where the product will be in relation to your content. If you are familiar with shortcodes, you can edit the products in the text editor, but for the purpose of this help page, we will show only adding and modifications using the plugin interface and placeholders.', 'ganxy-embed' ) . '</p>
				<h2 class="nav-tab-wrapper">
				  <a class="nav-tab nav-tab-active" href="'.admin_url().'/plugins.php?page=ganxy-help-page-embed">' . __( 'Embedding with Embed Code', 'ganxy-embed' ) . '</a>
				  <a class="nav-tab" href="'.admin_url().'plugins.php?page=ganxy-help-page-url">' . __( 'Embedding with Product URL', 'ganxy-embed' ) . '</a>
				  <a class="nav-tab" href="'.admin_url().'plugins.php?page=ganxy-help-page-shortcode">' . __( 'Shortcode Overview', 'ganxy-embed' ) . '</a>
				</h2>';
		echo '
				<div id="ganxy-help-sections">
					<section>
						<div class="ganxy-screenshots">
							<div class="screen-caption"><a target="_blank" href="' . plugins_url( 'img/screen1.png', __FILE__ ) . '" class="lightbox"><img src="' . plugins_url( 'img/screen1.png', __FILE__ ) . '" alt=""></a>' . __( 'Figure 1: Ganxy Embed icon and Menu.', 'ganxy-embed' ) . '</div>
							<div class="screen-caption"><a target="_blank" href="' . plugins_url( 'img/screen3.png', __FILE__ ) . '" class="lightbox"><img src="' . plugins_url( 'img/screen3.png', __FILE__ ) . '" alt=""></a>' . __( 'Figure 2: Ganxy Embed screen - shows pasted code.', 'ganxy-embed' ) . '</div>
						</div>
						<p>' . __( 'After you create a product on Ganxy, get the Embed code from the "Promote your Product" page. This embed code can be pasted into the Ganxy Plugin to add the product top your website.', 'ganxy-embed' ) . '</p>
						<p><strong>' . __( 'To add the Embed code to your site:', 'ganxy-embed' ) . '</strong></p>
						<ol>
							<li>' . __( 'Either create a new Page or Post or click to edit the page/post.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'On the edit screen, in the visual editor, click in the editor window to place the cursor where you want the product embed to go.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'On the visual editor menubar, click Ganxy icon to display the available options. (See Figure 1.)', 'ganxy-embed' ) . '</li>
							<li>' . __( 'Click the "Ganxy Embed by Code" option from the menu - a popup will display. (See Figure 2.)', 'ganxy-embed' ) . '</li>
							<li>' . __( 'In the "Ganxy Embed Code" textarea, paste the embed code that you received from the Ganxy product promotion page on the Ganxy website.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'Click "OK" to add the code to the editor.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'This will add a placeholder image to the editor window where your cursor was originally placed.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'Save or Publish the page/post as usual.', 'ganxy-embed' ) . '</li>
						</ol>
						<p><strong>' . __( 'To EDIT the Embedded code:', 'ganxy-embed' ) . '</strong></p>
						<ol>
							<li>' . __( 'In the visual editor window, double-click the placeholder image for your embed code - a popup will display. (See Figure 1.)', 'ganxy-embed' ) . '</li>
							<li>' . __( 'The current embed code will be entered in the "Ganxy Embed Code" textarea. If you have a new code, replace it here. If you just need to modify the code, make your changes.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'Click "OK" to add the modified code to the editor.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'This will update the code where the placeholder image is located.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'Save or Publish the page/post as usual.', 'ganxy-embed' ) . '</li>
						</ol>
						<p><strong>' . __( 'To DELETE the Embedded code:', 'ganxy-embed' ) . '</strong></p>
						<ol>
							<li>' . __( 'In the visual editor window, single-click the placeholder image for your embed code.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'Press the "delete" key on your keyboard. The placeholder image will be removed.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'Save or Publish the page/post as usual.', 'ganxy-embed' ) . '</li>
						</ol>
					</section>';
		echo '
					<section>
						<div class="ganxy-screenshots">
							<div class="screen-caption"><a target="_blank" href="' . plugins_url( 'img/screen1.png', __FILE__ ) . '" class="lightbox"><img src="' . plugins_url( 'img/screen1.png', __FILE__ ) . '" alt=""></a>' . __( 'Figure 1: Ganxy Embed icon and Menu', 'ganxy-embed' ) . '</div>
							<div class="screen-caption"><a target="_blank" href="' . plugins_url( 'img/screen2.png', __FILE__ ) . '" class="lightbox"><img src="' . plugins_url( 'img/screen2.png', __FILE__ ) . '" alt=""></a>' . __( 'Figure 2: Ganxy Embed by URL screen.', 'ganxy-embed' ) . '</div>
						</div>
						<p>' . __( 'After you create a product on Ganxy, get the product URL "Promote your Product" page. This Product URL can be pasted into the Ganxy Plugin to add the product top your website.', 'ganxy-embed' ) . '</p>
						<p><strong>' . __( 'To add the Product URL code to your site:', 'ganxy-embed' ) . '</strong></p>
						<ol class="help-page-ol">
							<li>' . __( 'Either create a new Page or Post or click to edit the page/post.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'On the edit screen, in the visual editor, click in the editor window to place the cursor where you want the product embed to go.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'On the visual editor menubar, click Ganxy icon to display the available options. (See Figure 1.)', 'ganxy-embed' ) . '</li>
							<li>' . __( 'Click the "Ganxy Embed by URL" option from the menu - a popup will display. (See Figure 2.)', 'ganxy-embed' ) . '</li>
							<li class="help-settings">' . __( 'The popup has a lot of settings and options, but the only required fields are the <strong>Ganxy Product URL</strong>, <strong>Product Name</strong>, and <strong>Author/by</strong>.', 'ganxy-embed' ) . '
								<br/><br/><strong>' . __( 'This is a list of available fields:', 'ganxy-embed' ) . '</strong>
								<ul>
									<li><strong>' . __( 'Ganxy Product URL:', 'ganxy-embed' ) . '</strong> ' . __( 'Paste the Ganxy Product URL here. The URL may also contain the Product Title, Product Author and a Voucher code depending on where the URL was copied from.', 'ganxy-embed' ) . '</li>
									<li><strong>' . __( 'Product Name / Title:', 'ganxy-embed' ) . '</strong> ' . __( 'Enter the title of the product. If the title is in the URL, it will be added automatically.', 'ganxy-embed' ) . '</li>
									<li><strong>' . __( 'Author/by:', 'ganxy-embed' ) . '</strong> ' . __( 'Enter the author for the product. If the author is in the URL, it will be added automatically.', 'ganxy-embed' ) . '</li>
									<li><strong>' . __( 'Voucher Code:', 'ganxy-embed' ) . '</strong> (optional)' . __( ' Enter a valid voucher code if one is set up. If the voucher code is in the URL, it will be added automatically.', 'ganxy-embed' ) . '</li>
									<li><strong>' . __( 'Select Widget Skin:', 'ganxy-embed' ) . '</strong> ' . __( 'Select "Light" or "Dark". "Light" (dark text on a light color background) is the default layout. Select "Dark" (light text on a dark background) if your website has a darker background.', 'ganxy-embed' ) . ' </li>
									<li><strong>' . __( 'Initial Payment Layout:', 'ganxy-embed' ) . '</strong> ' . __( 'By default, the "Buy Button" will be displayed for purchasing the product in the widget. When you select any other option, the payment block layout will change to the selected option. You may select "Standard", "Credit Card", "Gift" or "Bulk".', 'ganxy-embed' ) . '</li>
								</ul>
								<strong>' . __( 'Other available options:', 'ganxy-embed' ) . '</strong>
								<ul>
									<li><strong>' . __( 'Use Transparent Background?', 'ganxy-embed' ) . '</strong> ' . __( 'Check if you want the background of the widget to be transparent.', 'ganxy-embed' ) . '</li>
									<li><strong>' . __( 'Open in a Modal:', 'ganxy-embed' ) . '</strong> ' . __( 'If not checked, the product will open in a new tab or window and will not be embedded (only a link will be displayed).', 'ganxy-embed' ) . '</li>
									<li><strong>' . __( 'Show Image & Description?', 'ganxy-embed' ) . '</strong> ' . __( 'If checked, the image and description will be displayed in the widget (default). If you want to use your own image or description, uncheck this option.', 'ganxy-embed' ) . '</li>
									<li><strong>' . __( 'Show Social Sharing Buttons?', 'ganxy-embed' ) . '</strong> ' . __( 'If checked, Social Media Sharing buttons will show in the widget.', 'ganxy-embed' ) . '</li>
									<li><strong>' . __( 'Show Third Party Retailers?', 'ganxy-embed' ) . '</strong> ' . __( 'If checked, other retailers will be shown in the widget.', 'ganxy-embed' ) . '</li>
									<li><strong>' . __( 'Show Email Capture Options?', 'ganxy-embed' ) . '</strong>  ' . __( 'If checked, the email subscription box will be displayed.', 'ganxy-embed' ) . '</li>
									<li><strong>' . __( 'Show PayPal Button?', 'ganxy-embed' ) . '</strong> ' . __( ' If checked, the PayPal payment button will be included in the payment options.', 'ganxy-embed' ) . '</li>
									<li><strong>' . __( 'Offer Download?', 'ganxy-embed' ) . '</strong>  ' . __( 'If checked, the widget will display the digital downloading section in the payment block.', 'ganxy-embed' ) . '</li>
									<li><strong>' . __( 'Orchard/Soundcloud Widget?', 'ganxy-embed' ) . '</strong> ' . __( 'If this is an Orchard or Soundcloud embed code, check this box.', 'ganxy-embed' ) . '</li>
								</ul><br/>
							</li>
							<li>' . __( 'After selecting the desired options, click "OK" to add the product to the editor.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'This will add a placeholder image to the editor window where your cursor was originally placed.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'Save or Publish the page/post as usual.', 'ganxy-embed' ) . '</li>
						</ol>
						<p><strong>' . __( 'To EDIT an added Product:', 'ganxy-embed' ) . '</strong></p>
						<ol>
							<li>' . __( 'In the visual editor window, double-click the placeholder image for your product - a popup will display.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'The current product data will be entered in the corresponding fields on the popup, based on your settings when you added the product initially.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'Modify the settings and options as desired (see previous section for details on each setting).', 'ganxy-embed' ) . '</li>
							<li>' . __( 'Click "OK" to add the modified product to the editor.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'This will update the product where the placeholder image is located.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'Save or Publish the page/post as usual.', 'ganxy-embed' ) . '</li>
						</ol>
						<p><strong>' . __( 'To DELETE an added Product:', 'ganxy-embed' ) . '</strong></p>
						<ol>
							<li>' . __( 'In the visual editor window, single-click the placeholder image for your embed code.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'Press the "delete" key on your keyboard. The placeholder image will be removed.', 'ganxy-embed' ) . '</li>
							<li>' . __( 'Save or Publish the page/post as usual.', 'ganxy-embed' ) . '</li>
						</ol>
					</section>
					
					<section>
						<p>' . __( 'The basic shortcode usage is ', 'ganxy-embed' ) . '<code>[ganxy_shortcode gid="0000"][/ganxy_shortcode]</code>.</p>
						<p>' . __( 'The shortcode has quite a few parameters:', 'ganxy-embed' ) . '<br/>
						<ul>
							<li><code>gid</code> -' . __( ' Ganxy product ID - (required)', 'ganxy-embed' ) . '</li>
							<li><code>title</code> - ' . __( 'Product title name (required)', 'ganxy-embed' ) . '</li>
							<li><code>author</code> - ' . __( 'Product author (required)', 'ganxy-embed' ) . '</li>
							<li><code>voucher</code> - ' . __( 'voucher code to use - blank by default (optional)', 'ganxy-embed' ) . '</li>
							<li><code>skin</code> - ' . __( 'the widget skin to use - <code>light</code> or <code>dark</code> - default <code>light</code>.', 'ganxy-embed' ) . '</li>
							<li><code>initlayout</code> - ' . __( 'initial payment block layout - blank for standard "Buy Button", <code>cc</code> (credit card payment block), <code>bulk</code> (bulk purchase block), <code>gift</code> (gift purchase block), - default blank (optional)', 'ganxy-embed' ) . '</li>
							<li><code>transparent</code> - ' . __( 'use transparent background - <code>true</code> or <code>false</code> - default <code>false</code> (optional)', 'ganxy-embed' ) . '</li>
							<li><code>blurb</code> - ' . __( 'show image and description - <code>true</code> or <code>false</code> - default <code>true</code> (optional)', 'ganxy-embed' ) . '</li>
							<li><code>sharing</code> - ' . __( 'show social media sharing icons - <code>true</code> or <code>false</code> - default <code>false</code> (optional)', 'ganxy-embed' ) . '</li>
							<li><code>retailers</code> - ' . __( 'show additional retailers - <code>true</code> or <code>false</code> <code>false</code> (optional)', 'ganxy-embed' ) . '</li>
							<li><code>emailcap</code> - ' . __( 'show email subscribe box - <code>true</code> or <code>false</code> <code>false</code> (optional)', 'ganxy-embed' ) . '</li>
							<li><code>datamodal</code> - ' . __( 'show in modal -  <code>true</code> or <code>false</code> - default <code>false</code> (optional)', 'ganxy-embed' ) . '</li>
							<li><code>idownload</code> - ' . __( 'show download block - <code>true</code> or <code>false</code> - default <code>false</code> (optional)', 'ganxy-embed' ) . '</li>
							<li><code>nopaypal</code> - ' . __( 'hide PayPal button - <code>true</code> or <code>false</code> - default <code>true</code> (show) (optional)', 'ganxy-embed' ) . '</li>
							<li><code>music</code> - ' . __( 'music code (orchard/soundcloud widget) - <code>true</code> or <code>false</code> - default <code>false</code> (optional)', 'ganxy-embed' ) . '</li>
							<li><code>musicdata</code> - ' . __( 'single track embed code (orchard/soundcloud widget) <strong>OR</strong> bundled embed code (optional). <strong>If this is a bundle</strong>, the embed code must be base64 encoded and preceded by ', 'ganxy-embed' ) . '<code>bundle-</code> ' . __( 'and then the encoded data.', 'ganxy-embed' ) . '</li>
						<ul></p>
						<p>' . __( 'Sample Shortcode:', 'ganxy-embed' ) . '<br/>
							<code style="word-wrap: break-word;">
							[ganxy_shortcode skin="dark" transparent="true" blurb="true" sharing="true" retailers="true" emailcap="true" title="Ganxy%20Content%20Giveaway" author="The%20Ganxy%20Team" gid="78718" voucher="ganxy-demo" datamodal="true" idownload="true" nopaypal="true" initlayout="cc"]
							[/ganxy_shortcode]
							</code>
						</p>
						<p>' . __( 'Sample Bundled Shortcode:', 'ganxy-embed' ) . '<br/>
						<code style="word-wrap: break-word;">
						[ganxy_shortcode gid="95554" music="true" musicdata="bundle-PHN0eWxlPgouZ2FueHktYnVuZGxlIHsgd2lkdGg6IDM2MHB4OyBtYXJnaW46IDA7IHBhZGRpbmc6IDE1cHggMjBweCA1cHg7IH0KLmdhbnh5LWJ1bmRsZS1zYW1wbGVzIHsgcGFkZGluZzogMTNweCAwIDAgMDsgYm9yZGVyLXRvcDogMXB4IHNvbGlkOyBtYXJnaW46IDAgMCAxNHB4IDA7IG92ZXJmbG93OiBoaWRkZW47IH0KLmdhbnh5LWJ1bmRsZS1hcnQgeyB3aWR0aDogMTgwcHg7IGJvcmRlcjogMXB4IHNvbGlkOyBtYXJnaW46IDAgMTBweCAwIDA7IGZsb2F0OiBsZWZ0OyB9Ci5nYW54eS1idW5kbGUtaGVhZGVyLWRldGFpbHMgeyB3aWR0aDogMTYwcHg7IGZsb2F0OiBsZWZ0OyBmb250OiAxMXB4LzE0cHggSGVsdmV0aWNhLCBBcmlhbCwgc2Fucy1zZXJpZjsgfQouZ2FueHktYnVuZGxlLWhlYWRlciBpZnJhbWUgeyB3aWR0aDogMzYwcHg7IG1hcmdpbjogLTJweCAwIDFweDsgfQouZ2FueHktYnVuZGxlIGxpIGlmcmFtZSB7IHdpZHRoOiAzNjFweDsgdmVydGljYWwtYWxpZ246IG1pZGRsZTsgbWFyZ2luOiAwIC0yNnB4IDAgMDsgfQpvbC5nYW54eS1idW5kbGUtdHJhY2tzLCB1bC5nYW54eS1idW5kbGUtZXh0cmEsIHVsLmdhbnh5LWJ1bmRsZS1yZXRhaWxlcnMgeyBib3JkZXItdG9wOiAxcHggc29saWQ7IHBhZGRpbmc6IDEwcHggMCAxMHB4IDIwcHg7IG1hcmdpbjogMDsgfQpwLmdhbnh5LWJ1bmRsZS1yZXRhaWxlcnMgeyBtYXJnaW46IDAgMCAtNnB4IDA7IGZvbnQtd2VpZ2h0OiBib2xkOyBmb250LXNpemU6IDEycHg7IGxpbmUtaGVpZ2h0OiAxOHB4OyB9CnVsLmdhbnh5LWJ1bmRsZS1yZXRhaWxlcnMgeyBsaXN0LXN0eWxlOiBub25lOyBwYWRkaW5nLWxlZnQ6IDA7IGJvcmRlci10b3A6IDAgbm9uZTsgfQp1bC5nYW54eS1idW5kbGUtcmV0YWlsZXJzIGxpIHsgbGluZS1oZWlnaHQ6IDE4cHg7IHBhZGRpbmc6IDJweCAwIDNweDsgfQp1bC5nYW54eS1idW5kbGUtcmV0YWlsZXJzIGxpIGEgaW1nIHsgdmVydGljYWwtYWxpZ246IG1pZGRsZTsgbWFyZ2luOiAwIDI4cHggMCAwOyB9Ci5nYW54eS1idW5kbGUgbGkgeyBmb250OiAxMXB4IEhlbHZldGljYSwgQXJpYWwsIHNhbnMtc2VyaWY7IH0KLmdhbnh5LWJ1bmRsZS1wdWJsaXNoZXIgeyB3aWR0aDogMTgycHg7IG1hcmdpbjogMCAxMHB4IDAgMDsgY2xlYXI6IGJvdGg7IH0KLmdhbnh5LWJ1bmRsZSB7IGJhY2tncm91bmQ6IHdoaXRlOyBiYWNrZ3JvdW5kOiByZ2JhKDI1NSwyNTUsMjU1LDAuOTUpOyB9Ci5nYW54eS1idW5kbGUgbGkgeyBjb2xvcjogIzg3ODc4NTsgfQouZ2FueHktYnVuZGxlLXNhbXBsZXMgeyBib3JkZXItdG9wLWNvbG9yOiAjZGFkYWRhOyB9Ci5nYW54eS1idW5kbGUtaGVhZGVyLWRldGFpbHMgeyBjb2xvcjogIzYwNjA2MDsgfQouZ2FueHktYnVuZGxlLWFydCB7IGJvcmRlci1jb2xvcjogIzYwNjA2MDsgfQpvbC5nYW54eS1idW5kbGUtdHJhY2tzLCB1bC5nYW54eS1idW5kbGUtZXh0cmEgeyBib3JkZXItdG9wLWNvbG9yOiAjZGFkYWRhOyB9CnAuZ2FueHktYnVuZGxlLXJldGFpbGVycyB7IGNvbG9yOiAjM0IzQjNCOyB9Ci5nYW54eS1idW5kbGUtcmV0YWlsZXJzIGEgeyBvdXRsaW5lOiAwIG5vbmU7IHRleHQtZGVjb3JhdGlvbjogbm9uZTsgfQouZ2FueHktYnVuZGxlLXJldGFpbGVycyBhIHNwYW4sIC5nYW54eS1idW5kbGUtaGVhZGVyLWRldGFpbHMgYSB7IGNvbG9yOiAjODc4Nzg1OyB0ZXh0LWRlY29yYXRpb246IHVuZGVybGluZTsgfQouZ2FueHktYnVuZGxlLXJldGFpbGVycyBhOmhvdmVyIHNwYW4sIC5nYW54eS1idW5kbGUtaGVhZGVyLWRldGFpbHMgYTpob3ZlciB7IGNvbG9yOiAjODc4Nzg1OyB0ZXh0LWRlY29yYXRpb246IG5vbmU7IH0KPC9zdHlsZT4KPGRpdiBjbGFzcz0iZ2FueHktYnVuZGxlIj4KCTxkaXYgY2xhc3M9Imdhbnh5LWJ1bmRsZS1oZWFkZXIiPiA8c2NyaXB0IHNyYz0iaHR0cHM6Ly9nYW54eS5jb20vZy5qcyNleUpwWkNJNk9UVTFOVFFzSW5CeWFXTmxJam9pSkRrdU9Ua2lMQ0prWlhOamNtbHdkR2x2YmlJNklrSnNkV1Z6SUZCcGJHeHpJQzBnUW14MVpYTWdVR2xzYkhNaUxDSnliMnhsSWpvaVluVnVaR3hsSW4wPSI%2BPC9zY3JpcHQ%2BIDwvZGl2PgoJPGRpdiBjbGFzcz0iZ2FueHktYnVuZGxlLXNhbXBsZXMiPiA8aW1nIHNyYz0naHR0cHM6Ly9nYW54eS1zYW1wbGVzLnMzLmFtYXpvbmF3cy5jb20vMTAzNTY3L29yaWdpbmFsLzg4ODgzMTMxMDI4MC5qcGcnIGFsdD0nQmx1ZXMgUGlsbHMgLSBCbHVlcyBQaWxscycgY2xhc3M9J2dhbnh5LWJ1bmRsZS1hcnQnPiA8L2Rpdj4KCTxvbCBjbGFzcz0iZ2FueHktYnVuZGxlLXRyYWNrcyI%2BCgkJPGxpPiAKCQkJPHNjcmlwdCBzcmM9Imh0dHBzOi8vZ2FueHkuY29tL2cuanMjZXlKcFpDSTZPVFUxTkRRc0luQnlhV05sSWpvaUpEQXVPVGtpTENKa1pYTmpjbWx3ZEdsdmJpSTZJa2hwWjJnZ1EyeGhjM01nVjI5dFlXNGlMQ0p5YjJ4bElqb2lkSEpoWTJzaUxDSndjbVYyYVdWM0lqcGJJbWgwZEhCek9pOHZaMkZ1ZUhrdGMyRnRjR3hsY3k1ek15NWhiV0Y2YjI1aGQzTXVZMjl0THpFd016VTFOeTl2Y21sbmFXNWhiQzl6WVcxd2JHVXViWEF6SWwxOSI%2BPC9zY3JpcHQ%2BIAoJCTwvbGk%2BCgkJPGxpPiAKCQkJPHNjcmlwdCBzcmM9Imh0dHBzOi8vZ2FueHkuY29tL2cuanMjZXlKcFpDSTZPVFUxTkRVc0luQnlhV05sSWpvaUpEQXVPVGtpTENKa1pYTmpjbWx3ZEdsdmJpSTZJa0ZwYmlkMElFNXZJRU5vWVc1blpTSXNJbkp2YkdVaU9pSjBjbUZqYXlJc0luQnlaWFpwWlhjaU9sc2lhSFIwY0hNNkx5OW5ZVzU0ZVMxellXMXdiR1Z6TG5NekxtRnRZWHB2Ym1GM2N5NWpiMjB2TVRBek5UVTRMMjl5YVdkcGJtRnNMM05oYlhCc1pTNXRjRE1pWFgwPSI%2BPC9zY3JpcHQ%2BIAoJCTwvbGk%2BCgkJPGxpPiAKCQkJPHNjcmlwdCBzcmM9Imh0dHBzOi8vZ2FueHkuY29tL2cuanMjZXlKcFpDSTZPVFUxTkRZc0luQnlhV05sSWpvaUpEQXVPVGtpTENKa1pYTmpjbWx3ZEdsdmJpSTZJa3AxY0dsMFpYSWlMQ0p5YjJ4bElqb2lkSEpoWTJzaUxDSndjbVYyYVdWM0lqcGJJbWgwZEhCek9pOHZaMkZ1ZUhrdGMyRnRjR3hsY3k1ek15NWhiV0Y2YjI1aGQzTXVZMjl0THpFd016VTFPUzl2Y21sbmFXNWhiQzl6WVcxd2JHVXViWEF6SWwxOSI%2BPC9zY3JpcHQ%2BIAoJCTwvbGk%2BCgkJPGxpPiAKCQkJPHNjcmlwdCBzcmM9Imh0dHBzOi8vZ2FueHkuY29tL2cuanMjZXlKcFpDSTZPVFUxTkRjc0luQnlhV05sSWpvaUpEQXVPVGtpTENKa1pYTmpjbWx3ZEdsdmJpSTZJa0pzWVdOcklGTnRiMnRsSWl3aWNtOXNaU0k2SW5SeVlXTnJJaXdpY0hKbGRtbGxkeUk2V3lKb2RIUndjem92TDJkaGJuaDVMWE5oYlhCc1pYTXVjek11WVcxaGVtOXVZWGR6TG1OdmJTOHhNRE0xTmpBdmIzSnBaMmx1WVd3dmMyRnRjR3hsTG0xd015SmRmUT09Ij48L3NjcmlwdD4gCgkJPC9saT4KCQk8bGk%2BIAoJCQk8c2NyaXB0IHNyYz0iaHR0cHM6Ly9nYW54eS5jb20vZy5qcyNleUpwWkNJNk9UVTFORGdzSW5CeWFXTmxJam9pSkRBdU9Ua2lMQ0prWlhOamNtbHdkR2x2YmlJNklsSnBkbVZ5SWl3aWNtOXNaU0k2SW5SeVlXTnJJaXdpY0hKbGRtbGxkeUk2V3lKb2RIUndjem92TDJkaGJuaDVMWE5oYlhCc1pYTXVjek11WVcxaGVtOXVZWGR6TG1OdmJTOHhNRE0xTmpFdmIzSnBaMmx1WVd3dmMyRnRjR3hsTG0xd015SmRmUT09Ij48L3NjcmlwdD4gCgkJPC9saT4KCQk8bGk%2BIAoJCQk8c2NyaXB0IHNyYz0iaHR0cHM6Ly9nYW54eS5jb20vZy5qcyNleUpwWkNJNk9UVTFORGtzSW5CeWFXTmxJam9pSkRBdU9Ua2lMQ0prWlhOamNtbHdkR2x2YmlJNklrNXZJRWh2Y0dVZ1RHVm1kQ0JtYjNJZ1RXVWlMQ0p5YjJ4bElqb2lkSEpoWTJzaUxDSndjbVYyYVdWM0lqcGJJbWgwZEhCek9pOHZaMkZ1ZUhrdGMyRnRjR3hsY3k1ek15NWhiV0Y2YjI1aGQzTXVZMjl0THpFd016VTJNaTl2Y21sbmFXNWhiQzl6WVcxd2JHVXViWEF6SWwxOSI%2BPC9zY3JpcHQ%2BIAoJCTwvbGk%2BCgkJPGxpPiAKCQkJPHNjcmlwdCBzcmM9Imh0dHBzOi8vZ2FueHkuY29tL2cuanMjZXlKcFpDSTZPVFUxTlRBc0luQnlhV05sSWpvaUpEQXVPVGtpTENKa1pYTmpjbWx3ZEdsdmJpSTZJa1JsZG1sc0lFMWhiaUlzSW5KdmJHVWlPaUowY21GamF5SXNJbkJ5WlhacFpYY2lPbHNpYUhSMGNITTZMeTluWVc1NGVTMXpZVzF3YkdWekxuTXpMbUZ0WVhwdmJtRjNjeTVqYjIwdk1UQXpOVFl6TDI5eWFXZHBibUZzTDNOaGJYQnNaUzV0Y0RNaVhYMD0iPjwvc2NyaXB0PiAKCQk8L2xpPgoJCTxsaT4gCgkJCTxzY3JpcHQgc3JjPSJodHRwczovL2dhbnh5LmNvbS9nLmpzI2V5SnBaQ0k2T1RVMU5URXNJbkJ5YVdObElqb2lKREF1T1RraUxDSmtaWE5qY21sd2RHbHZiaUk2SWtGemRISmhiSEJzWVc1bElpd2ljbTlzWlNJNkluUnlZV05ySWl3aWNISmxkbWxsZHlJNld5Sm9kSFJ3Y3pvdkwyZGhibmg1TFhOaGJYQnNaWE11Y3pNdVlXMWhlbTl1WVhkekxtTnZiUzh4TURNMU5qUXZiM0pwWjJsdVlXd3ZjMkZ0Y0d4bExtMXdNeUpkZlE9PSI%2BPC9zY3JpcHQ%2BIAoJCTwvbGk%2BCgkJPGxpPiAKCQkJPHNjcmlwdCBzcmM9Imh0dHBzOi8vZ2FueHkuY29tL2cuanMjZXlKcFpDSTZPVFUxTlRJc0luQnlhV05sSWpvaUpEQXVPVGtpTENKa1pYTmpjbWx3ZEdsdmJpSTZJa2Q1Y0hONUlpd2ljbTlzWlNJNkluUnlZV05ySWl3aWNISmxkbWxsZHlJNld5Sm9kSFJ3Y3pvdkwyZGhibmg1TFhOaGJYQnNaWE11Y3pNdVlXMWhlbTl1WVhkekxtTnZiUzh4TURNMU5qVXZiM0pwWjJsdVlXd3ZjMkZ0Y0d4bExtMXdNeUpkZlE9PSI%2BPC9zY3JpcHQ%2BIAoJCTwvbGk%2BCgkJPGxpPiAKCQkJPHNjcmlwdCBzcmM9Imh0dHBzOi8vZ2FueHkuY29tL2cuanMjZXlKcFpDSTZPVFUxTlRNc0luQnlhV05sSWpvaUpEQXVPVGtpTENKa1pYTmpjbWx3ZEdsdmJpSTZJa3hwZEhSc1pTQlRkVzRpTENKeWIyeGxJam9pZEhKaFkyc2lMQ0p3Y21WMmFXVjNJanBiSW1oMGRIQnpPaTh2WjJGdWVIa3RjMkZ0Y0d4bGN5NXpNeTVoYldGNmIyNWhkM011WTI5dEx6RXdNelUyTmk5dmNtbG5hVzVoYkM5ellXMXdiR1V1YlhBeklsMTkiPjwvc2NyaXB0PiAKCQk8L2xpPgoJPC9vbD4KPC9kaXY%2B"]
						[/ganxy_shortcode]
						</code></p>
					</section>
				</div>
			</div>
		';
	}
	
	/**
	 * shortcode_handler
	 * @param  array  $atts shortcode attributes
	 * @param  string $content shortcode content
	 * @return string
	 */
	function shortcode_handler($atts , $content = null){
		$defaults = array( //default shortcode attributes
			'skin' 			=> 'light', //or 'dark'
			'transparent'	=> 'false',
			'blurb' 		=> 'false',
			'sharing' 		=> 'false',
			'retailers' 	=> 'false',
			'emailcap'		=> 'false',
			'datamodal'		=> 'false',
			'nopaypal'		=> 'true', // true shows false hides (to keep with consistant lables).
			'idownload'		=> 'false',
			'voucher'		=> '',
			'initlayout'	=> '',
			'title' 		=> '',
			'author'		=> '',
			'gid'			=> '', //ganxy id
			'music'			=> 'false',
			'musicdata'		=> ''
		);
		extract(shortcode_atts($defaults, $atts));
		$codeline = '';
		$optionsattr = array();
		if($gid == '')
			return $content;
		if($skin != 'light')
			$skin = 'dark';
		if($transparent != 'false')
			$optionsattr[] = 'data-transparent';
		if($blurb != 'true')
			$optionsattr[] = 'data-no-blurb';
		if($sharing != 'true')
			$optionsattr[] = 'data-no-sharing-options';
		if($retailers != 'true')
			$optionsattr[] = 'data-no-retailers';
		if($emailcap != 'true')
			$optionsattr[] = 'data-no-email-capture';
		if($datamodal == 'true')
			$optionsattr[] = 'data-modal="true"';
		if($nopaypal == 'false')
			$optionsattr[] = 'data-no-paypal';
		if($idownload == 'true')
			$optionsattr[] = 'data-inline-download';
		if($initlayout != '')
			$optionsattr[] = 'data-init-layout="'.$initlayout.'"';
		$additional_options = implode( ' ', $optionsattr );
		$titleOut = '';
		if( $title != '' && $author != '' ){
			$titleOut =  $title . __( ' by ', 'ganxy-embed' )  . $author;
		}elseif( $title == '' && $author == '' ){
			$titleOut =  '' ;
		}elseif( $title == '' && $author != '' ){
			$titleOut =  $author . __( ' (author)', 'ganxy-embed' ) ;
		}elseif( $title != '' && $author == '' ){
			$titleOut =  $title;
		}
		$gVouch 	= $voucher != '' ? '?voucher='.esc_attr($voucher) : '';
		$classOut 	= 'ganxy-book';
		if( $music != 'false' && $musicdata != ''){
			if( strpos( $musicdata, 'bundle' ) !== false ){
				$mdata = str_replace( 'bundle-', '', $musicdata );
				$codeline 	= base64_decode(urldecode($mdata));		
			}else{
				$codeline 	= '	<script src="https://ganxy.com/g.js#'. $musicdata .'"></script>';
			}
		}else{
			$contentImg = preg_match_all( "/^(?:\\s+)?\\<(?:img)(?:.+)\\/?\\>(?:\\s+)?$/i", $content, $matches );
			if( $contentImg >= 1 && $titleOut == '' && $datamodal == 'true' ){
				//this checks for the content being JUST an image AND there is no title / author AND it is model mode (link only) so we will wrap it in the anchor tag to make a clickable link to product. 
				$codeline 	= '	<a class="'.$classOut.'" href="https://ganxy.com/i/' . $gid . $gVouch. '" data-width="600" data-style="embed" data-skin="' . $skin . '" ' . $additional_options . '>' . $content . '</a>';
				$content 	= ''; //clear the content because we are using it in the link
			}elseif( $contentImg == 0 && $titleOut == '' && $datamodal == 'true' ){
				// if it is not an image AND the title / author is blank AND it is model mode (link only), we need a link, so we add the URL hot linked to product page.
				$codeline 	= '	<a class="'.$classOut.'" href="https://ganxy.com/i/' . $gid . $gVouch. '" data-width="600" data-style="embed" data-skin="' . $skin . '" ' . $additional_options . ' title="https://ganxy.com/i/' . $gid . $gVouch. '">https://ganxy.com/i/' . $gid . $gVouch. '</a>';
			}else{
				$codeline 	= '	<a class="'.$classOut.'" href="https://ganxy.com/i/' . $gid . $gVouch. '" data-width="600" data-style="embed" data-skin="' . $skin . '" ' . $additional_options . '>' . urldecode($titleOut) . '</a>';
			}
		}
		$basicClass = ' class="ganxy-item-wrapper" ';
		$basicStyle = 'text-align:center;';
		if($datamodal == 'true'){
			$basicStyle = 'text-align:left;';
			$basicClass = ' class="ganxy-item-wrapper ganxy-modal-item" ';
		}

		$scline[]	= '<div style="' . $basicStyle . '"' . $basicClass . '>';
		$scline[]	= '	<div style="margin:0 auto;">';
		if( $content != ''){
			$scline[]	= $content;
		}
		$scline[]	= $codeline;
		$scline[]	= '	</div>';
		$scline[]	= '</div>';
		return implode("\n\t",$scline);
	}

	/**
	 * admin_head
	 * calls functions into the correct filters
	 * @return void
	 */
	function admin_head() {
		// check user permissions
		if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
			return;
		}
		
		// check if WYSIWYG is enabled
		if ( 'true' == get_user_option( 'rich_editing' ) ) {
			add_filter( 'mce_external_plugins', array( $this ,'mce_external_plugins' ) );
			add_filter( 'mce_buttons', array($this, 'mce_buttons' ) );
		}
	}

	/**
	 * mce_external_plugins 
	 * Adds our tinymce plugin
	 * @param  array $plugin_array 
	 * @return array
	 */
	function mce_external_plugins( $plugin_array ) {
		$plugin_array[$this->shortcode_tag] = plugins_url( 'js/mce-button.min.js' , __FILE__ );
		return $plugin_array;
	}

	/**
	 * mce_buttons 
	 * Adds our tinymce button
	 * @param  array $buttons 
	 * @return array
	 */
	function mce_buttons( $buttons ) {
		array_push( $buttons, $this->shortcode_tag );
		return $buttons;
	}

	/**
	 * admin_enqueue_scripts 
	 * Used to enqueue custom styles
	 * @return void
	 */
	function admin_enqueue_scripts( $hook = '' ){
		//needed on all admin pages (for the font icon).
		wp_enqueue_style( 'ganxy_shortcode_all_pages', plugins_url( 'css/ganxy-admin-all-pages.css' , __FILE__ ), null, '1.4.0' );
		if( $hook == 'plugins_page_ganxy-help-page'){
			//on plugin help page only
			wp_enqueue_style( 'ganxy_shortcode_help_page', plugins_url( 'css/ganxy-admin-help-page.css' , __FILE__ ), null, '1.4.0' );
			wp_enqueue_script( 'ganxy-script-help-page', plugins_url( 'js/ganxy-admin-help-page.min.js', __FILE__ ), array('jquery'), '1.4.0', true );
		}elseif($hook == 'post-new.php' || $hook == 'post.php'){
			//on edit or new post page only
			wp_enqueue_style('ganxy_shortcode', plugins_url( 'css/mce-button.css' , __FILE__ ), null, '1.4.0');
		}
	}
	
	/**
	 * add_translations
	 * Adds translastions to the Popup
	 * @param  array $locales the available locales for translation
	 * @return array
	 */
	function add_translations( $locales ) { 
		$locales['ganxy_shortcode'] = plugin_dir_path ( __FILE__ ) . 'inc/ganxy-translations.php'; 
		return $locales;
	}
	
	/**
	 * ganxy_embed_script
	 * Embed the ganxy trigger script
	 * @return void
	 */
	function ganxy_embed_script(){
		// get rid of other script should they be using the quick fix plugin created previously.
		wp_dequeue_script( 'ganxy-fix-embed' );
		wp_enqueue_script( 'ganxy-script-embed', plugins_url( 'js/ganxy-embed-trigger.min.js', __FILE__ ), array('jquery'), '1.4.0', true );
	}
}

new GWP_ganxy_shortcode();