<?php
//------------------------ CREATE RYAN'S OPTIONS PAGE ---------------------------------------------------------//	
// Start Class
if ( ! class_exists( 'WPEX_Theme_Options' ) ) {
	class WPEX_Theme_Options {
		/**
		 * Start things up
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			// We only need to register the admin panel on the back-end
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'WPEX_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'WPEX_Theme_Options', 'register_settings' ) );
			}
		}
		/**
		 * Returns all theme options
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}
		/**
		 * Returns single theme option
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}
		/**
		 * Add sub menu page
		 *
		 * @since 1.0.0
		 */
		public static function add_admin_menu() {
			add_options_page(
				esc_html__( 'Ryan\'s Useful Options', 'text-domain' ),
				esc_html__( 'Ryan\'s Useful Options', 'text-domain' ),
				'manage_options',
				'ryans-useful-options',
				array( 'WPEX_Theme_Options', 'create_admin_page' )
			);
		}
		/**
		 * Register a setting and its sanitization callback.
		 *
		 * We are only registering 1 setting so we can store all options in a single option as
		 * an array. You could, however, register a new setting for each option
		 *
		 * @since 1.0.0
		 */
		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'WPEX_Theme_Options', 'sanitize' ) );
		}
		/**
		 * Sanitization callback
		 *
		 * @since 1.0.0
		 */
		public static function sanitize( $options ) {
			// If we have options lets sanitize them
			if ( $options ) {
				// Input
				if ( ! empty( $options['home-slider-category'] ) ) {
					$options['home-slider-category'] = sanitize_text_field( $options['home-slider-category'] );
				} else {
					unset( $options['home-slider-category'] ); // Remove from options if empty
				}
				// Input
				if ( ! empty( $options['include-harmonia-javascript'] ) ) {
					$options['include-harmonia-javascript'] = sanitize_text_field( $options['include-harmonia-javascript'] );
				} else {
					unset( $options['include-harmonia-javascript'] ); // Remove from options if empty
				}
				// Input
				if ( ! empty( $options['include-bx-slider-css-js'] ) ) {
					$options['include-bx-slider-css-js'] = sanitize_text_field( $options['include-bx-slider-css-js'] );
				} else {
					unset( $options['include-bx-slider-css-js'] ); // Remove from options if empty
				}
				// Input
				if ( ! empty( $options['user-login-protected-pages'] ) ) {
					$options['user-login-protected-pages'] = sanitize_text_field( $options['user-login-protected-pages'] );
				} else {
					unset( $options['user-login-protected-pages'] ); // Remove from options if empty
				}
				// Input
				if ( ! empty( $options['login-custom-message'] ) ) {
					$options['login-custom-message'] = sanitize_text_field( $options['login-custom-message'] );
				} else {
					unset( $options['login-custom-message'] ); // Remove from options if empty
				}
				// Input
				if ( ! empty( $options['main-menu-ul-class'] ) ) {
					$options['main-menu-ul-class'] = sanitize_text_field( $options['main-menu-ul-class'] );
				} else {
					unset( $options['main-menu-ul-class'] ); // Remove from options if empty
				}
					// Input
				if ( ! empty( $options['bx-slider-ul-class'] ) ) {
					$options['bx-slider-ul-class'] = sanitize_text_field( $options['bx-slider-ul-class'] );
				} else {
					unset( $options['bx-slider-ul-class'] ); // Remove from options if empty
				}					
				// Input
				if ( ! empty( $options['custom-logo-url'] ) ) {
					$options['custom-logo-url'] = sanitize_text_field( $options['custom-logo-url'] );
				} else {
					unset( $options['custom-logo-url'] ); // Remove from options if empty
				}					
				// Input
				if ( ! empty( $options['custom-logo-height'] ) ) {
					$options['custom-logo-height'] = sanitize_text_field( $options['custom-logo-height'] );
				} else {
					unset( $options['custom-logo-height'] ); // Remove from options if empty
				}					
				// Input
				if ( ! empty( $options['custom-logo-width'] ) ) {
					$options['custom-logo-width'] = sanitize_text_field( $options['custom-logo-width'] );
				} else {
					unset( $options['custom-logo-width'] ); // Remove from options if empty
				}
				// Input
				if ( ! empty( $options['remove-header-stuff'] ) ) {
					$options['remove-header-stuff'] = sanitize_text_field( $options['remove-header-stuff'] );
				} else {
					unset( $options['remove-header-stuff'] ); // Remove from options if empty
				}			
				// Input
				if ( ! empty( $options['remove-tagcloud-styles'] ) ) {
					$options['remove-tagcloud-styles'] = sanitize_text_field( $options['remove-tagcloud-styles'] );
				} else {
					unset( $options['remove-tagcloud-styles'] ); // Remove from options if empty
				}			
				// Input
				if ( ! empty( $options['remove-self-ping'] ) ) {
					$options['remove-self-ping'] = sanitize_text_field( $options['remove-self-ping'] );
				} else {
					unset( $options['remove-self-ping'] ); // Remove from options if empty
				}				
				// Input
				if ( ! empty( $options['remove-dashboard-widgets'] ) ) {
					$options['remove-dashboard-widgets'] = sanitize_text_field( $options['remove-dashboard-widgets'] );
				} else {
					unset( $options['remove-dashboard-widgets'] ); // Remove from options if empty
				}					
				// Input
				if ( ! empty( $options['include-bootstrap-grid'] ) ) {
					$options['include-bootstrap-grid'] = sanitize_text_field( $options['include-bootstrap-grid'] );
				} else {
					unset( $options['include-bootstrap-grid'] ); // Remove from options if empty
				}			
				// Input
				if ( ! empty( $options['remove-query-strings'] ) ) {
					$options['remove-query-strings'] = sanitize_text_field( $options['remove-query-strings'] );
				} else {
					unset( $options['remove-query-strings'] ); // Remove from options if empty
				}	
				// Input
				if ( ! empty( $options['delete-post-attachments'] ) ) {
					$options['delete-post-attachments'] = sanitize_text_field( $options['delete-post-attachments'] );
				} else {
					unset( $options['delete-post-attachments'] ); // Remove from options if empty
				}		
				// Input
				if ( ! empty( $options['change-excerpt-dots'] ) ) {
					$options['change-excerpt-dots'] = sanitize_text_field( $options['change-excerpt-dots'] );
				} else {
					unset( $options['change-excerpt-dots'] ); // Remove from options if empty
				}				
				// Input
				if ( ! empty( $options['allow-contributor-uploads'] ) ) {
					$options['allow-contributor-uploads'] = sanitize_text_field( $options['allow-contributor-uploads'] );
				} else {
					unset( $options['allow-contributor-uploads'] ); // Remove from options if empty
				}			
				// Input
				if ( ! empty( $options['disable-others-media'] ) ) {
					$options['disable-others-media'] = sanitize_text_field( $options['disable-others-media'] );
				} else {
					unset( $options['disable-others-media'] ); // Remove from options if empty
				}
				// Input
				if ( ! empty( $options['restrict-to-own-uploads'] ) ) {
					$options['restrict-to-own-uploads'] = sanitize_text_field( $options['restrict-to-own-uploads'] );
				} else {
					unset( $options['restrict-to-own-uploads'] ); // Remove from options if empty
				}
				// Input
				if ( ! empty( $options['add-nav-search'] ) ) {
					$options['add-nav-search'] = sanitize_text_field( $options['add-nav-search'] );
				} else {
					unset( $options['add-nav-search'] ); // Remove from options if empty
				}
				// Input
				if ( ! empty( $options['disable-xmlrpc-ping'] ) ) {
					$options['disable-xmlrpc-ping'] = sanitize_text_field( $options['disable-xmlrpc-ping'] );
				} else {
					unset( $options['disable-xmlrpc-ping'] ); // Remove from options if empty
				}
				// Input
				if ( ! empty( $options['include-pure-css'] ) ) {
					$options['include-pure-css'] = sanitize_text_field( $options['include-pure-css'] );
				} else {
					unset( $options['include-pure-css'] ); // Remove from options if empty
				}
				// Input
				if ( ! empty( $options['add-google-analytics'] ) ) {
					$options['add-google-analytics'] = sanitize_text_field( $options['add-google-analytics'] );
				} else {
					unset( $options['add-google-analytics'] ); // Remove from options if empty
				}
				// Input
				if ( ! empty( $options['add-google-jquery'] ) ) {
					$options['add-google-jquery'] = sanitize_text_field( $options['add-google-jquery'] );
				} else {
					unset( $options['add-google-jquery'] ); // Remove from options if empty
				}
				// Input
				if ( ! empty( $options['block-user-enumeration'] ) ) {
					$options['block-user-enumeration'] = sanitize_text_field( $options['block-user-enumeration'] );
				} else {
					unset( $options['block-user-enumeration'] ); // Remove from options if empty
				}
				// Input
				if ( ! empty( $options['disable-author-archives'] ) ) {
					$options['disable-author-archives'] = sanitize_text_field( $options['disable-author-archives'] );
				} else {
					unset( $options['disable-author-archives'] ); // Remove from options if empty
				}
			}
			// Return sanitized options
			return $options;
		}
		/**
		 * Settings page output
		 *
		 * @since 1.0.0
		 */
		public static function create_admin_page() {
		wp_enqueue_script('jquery');
		wp_enqueue_media();
		?>
				<form method="post" action="options.php" runat="server">
			<div class="ryans-wrap" id="ryans-wrap">
		<div id="ryans-options-header">
		    		<h1><?php esc_html_e( 'Ryan\'s Useful Plugin Options', 'text-domain' ); ?></h1>
<p>Check below for is_child usage examples.</p>
				<h3>Checks if the current page, posting or category is somehow related to category or page ID 10.</h3>
	<pre>is_child(10)</pre>
				<h3>Checks just if the current element is a direct child of Example Category.</h3>
	<pre>is_child(Example Category,false)</pre>
<h3>Checks if the current element (page) is somehow related to a page with the slug some-page.</h3>
	<pre>is_child(some-page, 1)</pre>
			</div>	
					<?php settings_fields( 'theme_options' ); ?>
<div class="container-fluid border-bottom"><div class="row"><div class="hilite col-md-12 p-3">Miscellaneous Configuration</div></div>
<div class="row">
	<div class="col-md-6 p-3"><h3><?php esc_html_e( 'Protect Pages With WP User Login', 'text-domain' ); ?></h3>
								<?php $ulpvalue = self::get_theme_option( 'user-login-protected-pages' ); ?>
								<input type="text" name="theme_options[user-login-protected-pages]" value="<?php echo htmlentities( $ulpvalue ); ?>" class="form-control-input">
                                <p class="description">Enter the "parent" page slug here.</p></div>
	<div class="col-md-6 p-3"><h3><?php esc_html_e( 'Homepage Slider Category ID', 'text-domain' ); ?></h3>
							<?php $value = self::get_theme_option( 'home-slider-category' ); ?>
								<input type="text" name="theme_options[home-slider-category]" value="<?php echo esc_attr( $value ); ?>" class="form-control-input"></div>
</div>	
	<div class="row"><div class="col-md-6 p-3"><h3><?php esc_html_e( 'Remove Header Stuff', 'text-domain' ); ?></h3>
								<?php $removeheaderstuff = self::get_theme_option( 'remove-header-stuff' ); ?>
								<select name="theme_options[remove-header-stuff]" class="form-control-input">
								<option>--</option>
								<option value="yes"<?php if( $removeheaderstuff == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select></div>
	<div class="col-md-6 p-3"><h3><?php esc_html_e( 'Remove Tag Cloud Styles', 'text-domain' ); ?></h3>
								<?php $removetagcloudstyles = self::get_theme_option( 'remove-tagcloud-styles' ); ?>
								<select name="theme_options[remove-tagcloud-styles]" class="form-control-input">
								<option>--</option>
								<option value="yes"<?php if( $removetagcloudstyles == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select></div>
</div>	<div class="row"><div class="col-md-6 p-3"><h3><?php esc_html_e( 'Remove Self Ping', 'text-domain' ); ?></h3>
								<?php $removeselfping = self::get_theme_option( 'remove-self-ping' ); ?>
								<select name="theme_options[remove-self-ping]" class="form-control-input">
								<option>--</option>
								<option value="yes"<?php if( $removeselfping == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select></div>
	<div class="col-md-6 p-3"><h3><?php esc_html_e( 'Remove Dashboard Widgets', 'text-domain' ); ?></h3>
								<?php $removedbwidgets = self::get_theme_option( 'remove-dashboard-widgets' ); ?>
								<select name="theme_options[remove-dashboard-widgets]" class="form-control-input">
								<option>--</option>
								<option value="yes"<?php if( $removedbwidgets == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select></div>
					</div>
<div class="row"><div class="col-md-6 p-3">
	<h3><?php esc_html_e( 'Enqueue Bootstrap Grid', 'text-domain' ); ?></h3>
								<?php $includebsgrid = self::get_theme_option( 'include-bootstrap-grid' ); ?>
	<select name="theme_options[include-bootstrap-grid]" class="form-control-input">
								<option>--</option>
								<option value="yes"<?php if( $includebsgrid == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select>
	<p class="description"><strong>Attention:</strong> check your theme layout after setting this to 'Yes', as it can conflict with some templates and mess things up.</p>
	</div><div class="col-md-6 p-3">
	<h3><?php esc_html_e( 'Remove Query Strings', 'text-domain' ); ?></h3>
								<?php $removeqstrings = self::get_theme_option( 'remove-query-strings' ); ?>
	<select name="theme_options[remove-query-strings]" class="form-control-input">
								<option>--</option>
								<option value="yes"<?php if( $removeqstrings == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select>
	</div></div>	
	<div class="row"><div class="col-md-6 p-3"><h3><?php esc_html_e( 'Delete Post Attachments', 'text-domain' ); ?></h3>
								<?php $deletepattachments = self::get_theme_option( 'delete-post-attachments' ); ?>
	<select name="theme_options[delete-post-attachments]" class="form-control-input">
								<option>--</option>
								<option value="yes"<?php if( $deletepattachments == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select>
		<p class="description">
			This will change the WordPress default behaviour to delete associated page/post attachments.
		</p>
		</div><div class="col-md-6 p-3">
		<h3><?php esc_html_e( 'Replace the_excerpt() 3 Dots - Add Read More Link', 'text-domain' ); ?></h3>
								<?php $changeedots = self::get_theme_option( 'change-excerpt-dots' ); ?>
	<select name="theme_options[change-excerpt-dots]" class="form-control-input">
								<option>--</option>
								<option value="yes"<?php if( $changeedots == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select>
								<p class="description">This doesn't work on some themes that modify the_excerpt() default behaviour.</p>
	</div></div>			
<!-- REPEAT -->	
	<div class="row"><div class="col-md-6 p-3"><h3><?php esc_html_e( 'Include Pure CSS', 'text-domain' ); ?></h3>
								<?php $includepcss = self::get_theme_option( 'include-pure-css' ); ?>
	<select name="theme_options[include-pure-css]" class="form-control-input">
								<option>--</option>
								<option value="yes"<?php if( $includepcss == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select>
		<p class="description">
			This will enqueue the Pure CSS minimized file into your template. <a href="https://purecss.io/" target="top_">Source</a>
		</p>
		</div><div class="col-md-6 p-3">
<h3><?php esc_html_e( 'Add Google Analytics ', 'text-domain' ); ?></h3>
								<?php $addganalytics = self::get_theme_option( 'add-google-analytics' ); ?>
<input type="text" name="theme_options[add-google-analytics]" value="<?php echo esc_attr( $addganalytics ); ?>"  class="form-control-input">	
		<p class="description">
			Enter your full Google Analytics code that looks like the following: '<strong>UA-XXXXXXXX-1</strong>'.  This will ensure it stays even after template updates and/or changes.
		</p>
	</div></div>			
<!-- REPEAT -->
	<div class="row"><div class="col-md-6 p-3"><h3><?php esc_html_e( 'Allow Contributor Uploads', 'text-domain' ); ?></h3>
								<?php $allowcupload = self::get_theme_option( 'allow-contributor-uploads' ); ?>
	<select name="theme_options[allow-contributor-uploads]" class="form-control-input">
								<option>--</option>
								<option value="yes"<?php if( $allowcuploads == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select>
		<p class="description">
			This allows contributor accounts to upload images to their posts, without granting them any additional privileges or rights. <a href="https://wp-snippet.com/snippets/allow-contributors-upload-images/" target="_blank">Source</a>.
		</p>
		</div><div class="col-md-6 p-3">
		<h3><?php esc_html_e( 'Restrict Media Library Access', 'text-domain' ); ?></h3>
								<?php $restricttouploads = self::get_theme_option( 'restrict-to-own-uploads' ); ?>
	<select name="theme_options[restrict-to-own-uploads]" class="form-control-input">
								<option>--</option>
								<option value="yes"<?php if( $restricttouploads == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select>
								<p class="description">By default, WordPress allows authors/users to see all images uploaded to the media library. This restricts user access in the Media Library to user’s own uploads. <a href="https://wp-snippet.com/snippets/how-to-restrict-wordpress-media-library-access-to-users-own-uploads/" target="_blank">Source</a>.</p>
	</div></div>			
<!-- REPEAT -->
	<div class="row"><div class="col-md-6 p-3"><h3><?php esc_html_e( 'Add Search Box To Nav Menu', 'text-domain' ); ?></h3>
								<?php $addnsearch = self::get_theme_option( 'add-nav-search' ); ?>
	<select name="theme_options[add-nav-search]" class="form-control-input">
								<option>--</option>
								<option value="yes"<?php if( $addnsearch == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select>
		</div><div class="col-md-6 p-3">
		<h3><?php esc_html_e( 'Disable XMLRPC Ping', 'text-domain' ); ?></h3>
								<?php $disablexmlping = self::get_theme_option( 'disable-xmlrpc-ping' ); ?>
	<select name="theme_options[disable-xmlrpc-ping]" class="form-control-input">
								<option>--</option>
								<option value="yes"<?php if( $disablexmlping == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select>
	</div></div>		



	
<!-- REPEAT -->
	<div class="row"><div class="col-md-6 p-3"><h3><?php esc_html_e( 'Disable User Enumeration', 'text-domain' ); ?></h3>
								<?php $blockuenumeration = self::get_theme_option( 'block-user-enumeration' ); ?>
	<select name="theme_options[block-user-enumeration]" class="form-control-input">
								<option>--</option>
								<option value="yes"<?php if( $blockuenumeration == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select>
<p class="description">This is a security option that stops automated scanning of WP author query string URLs.  <strong>If you turn this on,  you must turn on the next option disabling author archives.</strong> <a href="https://perishablepress.com/stop-user-enumeration-wordpress/" target="top_">Source</a></p>		
		</div><div class="col-md-6 p-3">
		<h3><?php esc_html_e( 'Disable Author Archives', 'text-domain' ); ?></h3>
								<?php $disableaarchives = self::get_theme_option( 'disable-author-archives' ); ?>
	<select name="theme_options[disable-author-archives]" class="form-control-input">
								<option>--</option>
								<option value="yes"<?php if( $disableaarchives == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select>
<p class="description">This disables all author-archive views and is useful to help prevent user enumeration scans.<strong>This should be turned on if user enumeration is on.</strong> <a href="https://wp-mix.com/wordpress-disable-author-archives/" target="top_">Source</a></p>	
	</div></div>	



	
<!-- REPEAT -->
	<div class="row"><div class="col-md-6 p-3"><h3><?php esc_html_e( 'Replace Bundled jQuery with Google Library Latest', 'text-domain' ); ?></h3>
								<?php $addgjquery = self::get_theme_option( 'add-google-jquery' ); ?>
	
	<input type="text" name="theme_options[add-google-jquery]" value="<?php echo esc_attr( $addgjquery ); ?>"  class="form-control-input">	
	
<p class="description"><strong>ATTENTION:</strong> You must check the following link to get the latest Google Hosted  <a href="https://developers.google.com/speed/libraries/#jquery" target="_blank">https://developers.google.com/speed/libraries/#jquery</a>.</p>		
		</div><div class="col-md-6 p-3">
	</div></div>	




	
<!-- REPEAT -->
<div class="row"><div class="hilite col-md-12 p-3">Harmonia Menu Configuration</div></div>
<div class="row"><div class="col-md-6 p-3"><h3><?php esc_html_e( 'Main Menu UL Class', 'text-domain' ); ?></h3>
								<?php $value = self::get_theme_option( 'main-menu-ul-class' ); ?>
								<input type="text" name="theme_options[main-menu-ul-class]" value="<?php echo esc_attr( $value ); ?>"  class="form-control-input">
								<p class="description">This class is used to dynamically add Harmonia Menu to an ordered list menu. On some servers, this is not written to file instantly, and is only written if the 'Include' command on the right is set to 'Yes'.</p>
		</div><div class="col-md-6 p-3">
		<h3><?php esc_html_e( 'Include Harmonia Javascript', 'text-domain' ); ?></h3>
								<?php $harmoniavalue = self::get_theme_option( 'include-harmonia-javascript' ); ?>
								<select name="theme_options[include-harmonia-javascript]" class="form-control-input">
								<?php global $ihjvalue; $ihjvalue = esc_attr( $harmoniavalue ); ?>
									<option>--</option>
								<option value="yes"<?php if( $ihjvalue == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select>
								<p class="description">The javascript left will only be inserted if this option is set to 'Yes'.</p>
						</div>
</div>			
<!-- REPEAT -->
<div class="row"><div class="hilite col-md-12 p-3">BX Slider Configuration</div></div>
<div class="row"><div class="col-md-6 p-3"><h3><?php esc_html_e( 'BX Slider UL Class', 'text-domain' ); ?></h3>
							<?php $value = self::get_theme_option( 'bx-slider-ul-class' ); ?>
								<input type="text" name="theme_options[bx-slider-ul-class]" value="<?php echo esc_attr( $value ); ?>" class="form-control-input">
								<p class="description">This is used to determine which post category is turned into the slider. On some servers, this is not written to file instantly, and is only written if the 'Include' command on the right is set to 'Yes'.</p>
						</div><div class="col-md-6 p-3"><h3><?php esc_html_e( 'Include BX Slider CSS &amp; Javascript', 'text-domain' ); ?></h3>
								<?php $bxvalue = self::get_theme_option( 'include-bx-slider-css-js' ); ?>
								<select name="theme_options[include-bx-slider-css-js]" class="form-control-input">
								<?php $ibxjcvalue = esc_attr( $bxvalue ); ?>
									<option>--</option>
								<option value="yes"<?php if( $ibxjcvalue == 'yes') { echo ' selected="selected"';} ?>>Yes</option>
								</select>
				<p class="description">Use the following code in your template: 
					&#x3C;?php if( function_exists(&#x27;get_bxslider&#x27;) ) { get_bxslider(<strong>YOUR-SLIDER-CATEGORY-ID-HERE</strong>); } ?&#x3E;
	</p></div></div>
<div class="row"><div class="hilite col-md-12 p-3">Login Page Configuration</div></div>
<div class="row"><div class="col-md-6 p-3"><h3>Login Logo</h3>
					<?php $customlogourl = self::get_theme_option( 'custom-logo-url' ); ?>
						<table class="inner-table">
							<tr><td>

								<input type="text" id="custom-logo-url" name="theme_options[custom-logo-url]" value="<?php echo esc_attr( $customlogourl ); ?>" class="form-control-input" /></td><td><input type="button" name="upload-btn" id="upload-btn" class="button button-primary form-control-input" value="Upload Logo"></td></tr>
								</table>
						<p class="description">It will appear as a responsive image in the WP login page set to the same width as the '<em>#logo</em>' CSS id (usually 400px).</p>
						<img  id="blah" src="<?php echo esc_attr( $customlogourl ); ?>" alt="" style="width:200px !important; height:auto !important;" /></div><div class="col-md-6 p-3"><h3><?php esc_html_e( 'Login Page Custom Message Text', 'text-domain' ); ?></h3>
								<?php $lcmvalue = self::get_theme_option( 'login-custom-message' ); ?>
								<input type="text" name="theme_options[login-custom-message]" value="<?php echo htmlentities( $lcmvalue ); ?>" class="form-control-input">
								<p class="description"><em>You can only enter plain text.</em></p>
</div>
</div>			
<!-- REPEAT -->	
</div>
			</div><!-- .wrap -->
<?php submit_button(); ?>
				</form>
<?php }
	}
}
new WPEX_Theme_Options();
// Helper function to use in your theme to return a theme option value
function myprefix_get_theme_option( $id = '' ) { return WPEX_Theme_Options::get_theme_option( $id ); }