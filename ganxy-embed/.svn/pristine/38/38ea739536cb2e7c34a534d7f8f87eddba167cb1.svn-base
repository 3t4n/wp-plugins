<?php  
if ( ! defined( 'ABSPATH' ) ) 
	exit;  
if ( ! class_exists( '_WP_Editors' ) ) 
	require( ABSPATH . WPINC . '/class-wp-editor.php' );  

function ganxy_embed_translation() { 
	$strings 	= array( 
		// Title, Button and Misc Translations
		'button_tooltip' 	=> __( 'Ganxy Embed', 'ganxy-embed' ),
		'panel_title_url'	=> __( 'Ganxy Embed by URL', 'ganxy-embed' ),
		'panel_title_embed' => __( 'Ganxy Embed by Code', 'ganxy-embed' ),
		'panel_title_id' 	=> __( 'Ganxy Embed by ID', 'ganxy-embed' ),
		'panel_title_help' 	=> __( 'Ganxy Embed Help', 'ganxy-embed' ),
		'panel_help_text' 	=> '<style>.mce-container-body p a{color:#ff0000;}.mce-container-body p {white-space: normal;margin-bottom: 1em;}.mce-container-body p strong{font-weight:bold;background-color: #EFEFEF;padding: 0 1%;}</style>
			<p>'. __('This plugin assumes you already have products setup through Ganxy. If you do not have any products set up, or need a Ganxy account, please visit the <a href="http://get.ganxy.com/" target="_blank">Ganxy website</a>.', 'ganxy-embed' ).'</p>
			<p>'. __('After you have setup your prducts, you will receive an embed code or URL to promote your products. Use this code or URL to create your embeds or links for your website.', 'ganxy-embed' ).'</p>
			<p>'. __('If you have an embed code, use the <strong>Ganxy Embed by Code</strong> option and paste the entire code into the box supplied for the code.', 'ganxy-embed' ).'</p>
			<p>'. __('If you want to customize the embed further, use your product URL and select the <strong>Ganxy Embed By URL</strong> option. You will then be able to fine tune the embed.', 'ganxy-embed' ).'</p>
			<p>'. __('To edit an embeded product, double click the placeholder image to make changes.', 'ganxy-embed' ).'</p>
			<p>'. __('Go to <strong>Plugins > Ganxy Plugin Help</strong> in your admin menu for more detailed help.', 'ganxy-embed' ).'</p>
		',
		
		// label translations
		'options_label' 	=> __( 'Additional Options', 'ganxy-embed' ),
		'author_label' 		=> __( 'Author/by', 'ganxy-embed' ),
		'blurb_label' 		=> __( 'Show Image & Description?', 'ganxy-embed' ),
		'emailcap_label' 	=> __( 'Show Email Capture Options?', 'ganxy-embed' ),
		'ganxy_embed_label' => __( 'Ganxy Embed Code', 'ganxy-embed' ), 
		'ganxyurl_label' 	=> __( 'Ganxy Product URL', 'ganxy-embed' ), 
		'gid_label' 		=> __( 'Ganxy Product ID', 'ganxy-embed' ), 
		'idownload_label'	=> __( 'In-page download?', 'ganxy-embed' ),
		'initlayout_label'	=> __( 'Initial Payment Layout', 'ganxy-embed' ),
		'menu_embed_label' 	=> __( 'Paste Embed Code', 'ganxy-embed' ),
		'menu_help_label' 	=> __( 'Help', 'ganxy-embed' ),
		'menu_id_label' 	=> __( 'Embed by ID', 'ganxy-embed' ),
		'menu_url_label' 	=> __( 'Embed by URL', 'ganxy-embed' ),
		'modal_label' 		=> __( 'Open in a Modal?', 'ganxy-embed' ),
		'music_label' 		=> __( 'Orchard/SoundCloud Widget?', 'ganxy-embed' ),
		'nopaypal_label' 	=> __( 'Show PayPal Button?', 'ganxy-embed' ),
		'retailers_label' 	=> __( 'Show Third Party Retailers?', 'ganxy-embed' ),
		'sharing_label' 	=> __( 'Show Social Sharing Buttons?', 'ganxy-embed' ),
		'skin_label' 		=> __( 'Select Widget Skin', 'ganxy-embed' ),
		'title_label' 		=> __( 'Product Name / Title', 'ganxy-embed' ),
		'transparent_label' => __( 'Use Transparent Background?', 'ganxy-embed' ),
		'voucher_label' 	=> __( 'Voucher Code (optional)', 'ganxy-embed' ),
		
		// tooltip translations
		'author_tip' 		=> __( 'Enter Author Name (optional).', 'ganxy-embed' ),
		'blurb_tip' 		=> __( 'Uncheck if you only need to include the payment module and would like to provide your own description and/or image.', 'ganxy-embed' ),
		'emailcap_tip' 		=> __( 'Check to show email signup box.', 'ganxy-embed' ),
		'ganxy_embed_tip' 	=> __( 'Paste the embed code you received from Ganxy.', 'ganxy-embed' ), 
		'ganxyurl_tip' 		=> __( 'Enter the URL of the Product.', 'ganxy-embed' ),
		'gid_tip' 			=> __( 'Enter Ganxy Product ID.', 'ganxy-embed' ), 
		'idownload_tip'		=> __( 'Prevent Ganxy from opening a new tab for downloads. Warning: user experience gets worse.', 'ganxy-embed' ),
		'initlayout_tip' 	=> __( 'Set default purchase view to "Credit Card", "Gift", "Bulk" or the standard "Buy Button"', 'ganxy-embed' ),
		'modal_tip' 		=> __( 'if checked showcase will not be embedded, but will display in a new tab or window.', 'ganxy-embed' ),
		'music_tip' 		=> __( 'Check if this is an Orchard/SoundCloud widget.', 'ganxy-embed' ),
		'nopaypal_tip' 		=> __( 'If checked, PayPal payment option will be shown.', 'ganxy-embed' ),
		'retailers_tip' 	=> __( 'Check to show other retailers in the widget.', 'ganxy-embed' ),
		'sharing_tip' 		=> __( 'Check to show social sharing links.', 'ganxy-embed' ),
		'skin_tip' 			=> __( 'Select the skin to use.', 'ganxy-embed' ),
		'title_tip' 		=> __( 'Enter Your Title (optional).', 'ganxy-embed' ),
		'transparent_tip'	=> __( 'Check to use a transparent background.', 'ganxy-embed' ),
		'voucher_tip' 		=> __( 'Include a voucher code if you have one (optional).', 'ganxy-embed' ), 
		
		// option translations
		'layout_option1' 	=> __( 'Default (show "Buy Button")', 'ganxy-embed' ),
		'layout_option2' 	=> __( 'Show Credit Card Purchase block', 'ganxy-embed' ),
		'layout_option3' 	=> __( 'Show Gift Purchase block', 'ganxy-embed' ),
		'layout_option4' 	=> __( 'Show Bulk Purchase block', 'ganxy-embed' ),
		'skin_option1' 		=> __( 'Light - default', 'ganxy-embed' ),
		'skin_option2' 		=> __( 'Dark (Use on Dark Background)', 'ganxy-embed' ),
	);  
	$locale = _WP_Editors::$mce_locale; 
	$translated = 'tinyMCE.addI18n("' . $locale . '.ganxy_embed", ' . json_encode( $strings ) . ");\n";  
	return $translated; 
}  
$strings = ganxy_embed_translation();