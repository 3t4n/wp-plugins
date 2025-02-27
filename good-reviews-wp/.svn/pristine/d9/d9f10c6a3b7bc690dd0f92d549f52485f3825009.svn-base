<?php
/**
 * Class to create the 'About Us' submenu
 */

if ( !defined( 'ABSPATH' ) )
	exit;

if ( !class_exists( 'grfwpAboutUs' ) ) {
class grfwpAboutUs {

	public function __construct() {

		add_action( 'wp_ajax_grfwp_send_feature_suggestion', array( $this, 'send_feature_suggestion' ) );

		add_action( 'admin_menu', array( $this, 'register_menu_screen' ), 11 );
	}

	/**
	 * Adds About Us submenu page
	 * @since 2.3.0
	 */
	public function register_menu_screen() {
		global $grfwp_controller;

		add_submenu_page(
			'grfwp-restaurant-reviews', 
			esc_html__( 'About Us', 'good-reviews-wp' ),
			esc_html__( 'About Us', 'good-reviews-wp' ),
			'manage_options', 
			'grfwp-about-us',
			array( $this, 'display_admin_screen' )
		);
	}

	/**
	 * Displays the About Us page
	 * @since 2.3.0
	 */
	public function display_admin_screen() { ?>

		<div class='grfwp-about-us-logo'>
			<img src='<?php echo plugins_url( "../assets/img/fsplogo.png", __FILE__ ); ?>'>
		</div>

		<div class='grfwp-about-us-tabs'>

			<ul id='grfwp-about-us-tabs-menu'>

				<li class='grfwp-about-us-tab-menu-item grfwp-tab-selected' data-tab='who_we_are'>
					<?php _e( 'Who We Are', 'good-reviews-wp' ); ?>
				</li>

				<li class='grfwp-about-us-tab-menu-item' data-tab='lite_vs_premium'>
					<?php _e( 'Lite vs. Premium', 'good-reviews-wp' ); ?>
				</li>

				<li class='grfwp-about-us-tab-menu-item' data-tab='getting_started'>
					<?php _e( 'Getting Started', 'good-reviews-wp' ); ?>
				</li>

				<li class='grfwp-about-us-tab-menu-item' data-tab='suggest_feature'>
					<?php _e( 'Suggest a Feature', 'good-reviews-wp' ); ?>
				</li>

			</ul>

			<div class='grfwp-about-us-tab' data-tab='who_we_are'>

				<p>
					<strong>Five Star Plugins focuses on creating high-quality, easy-to-use WordPress plugins centered around the restaurant, hospitality and business industries.</strong> With over <strong>50,000 active users worldwide</strong>, our plugins bring a great amount of value to many websites and business owners every day, by offering them solutions that are simple to implement and that provide powerful functionality necessary for their operations. Our <a href='https://www.fivestarplugins.com/plugins/five-star-restaurant-reservations/?utm_source=grfwp_admin_about_us' target='_blank'>WordPress restaurant reservations plugin</a> and <a href='https://www.fivestarplugins.com/plugins/five-star-restaurant-menu/?utm_source=grfwp_admin_about_us' target='_blank'>WordPress restaurant menu plugin</a> are both rich in features, responsive and highly customizable. Our <a href='https://www.fivestarplugins.com/plugins/five-star-good-reviews-wp/?utm_source=grfwp_admin_about_us' target='_blank'>business profile WordPress plugin</a> and <a href='https://www.fivestarplugins.com/plugins/five-star-restaurant-reviews/?utm_source=grfwp_admin_about_us' target='_blank'>WordPress restaurant reviews plugin</a> allow you to extend the functionality of your site and offer a full WordPress restaurant solution.
				</p>

				<p>
					<strong>On top of this, we pride ourselves on offering great and timely support and customer service.</strong>
				</p>

				<p>
					Our team is made up of developers, graphic designers, marketing associates and support specialists. Our partnership with <a href='https://www.etoilewebdesign.com/?utm_source=grfwp_admin_about_us' target='_blank'>Etoile Web Design</a> gives us access to their fantastic support team and allows us to offer unparalleled customer service and technical support via multiple channels.
				</p>

			</div>

			<div class='grfwp-about-us-tab grfwp-hidden' data-tab='lite_vs_premium'>

				<p><?php _e( 'The premium version includes several extra features that let you extend the functionality of the reviews plugin and provide a great user experience, such as advanced layout and styling options, custom fields for reviews and more.', 'good-reviews-wp' ); ?></p>

				<p><em><?php _e( 'The following table provides a comparison of the lite and premium versions.', 'good-reviews-wp' ); ?></em></p>

				<div class='grfwp-about-us-premium-table'>
					<div class='grfwp-about-us-premium-table-head'>
						<div class='grfwp-about-us-premium-table-cell'><?php _e( 'Feature', 'good-reviews-wp' ); ?></div>
						<div class='grfwp-about-us-premium-table-cell'><?php _e( 'Lite Version', 'good-reviews-wp' ); ?></div>
						<div class='grfwp-about-us-premium-table-cell'><?php _e( 'Premium Version', 'good-reviews-wp' ); ?></div>
					</div>
					<div class='grfwp-about-us-premium-table-body'>
						<div class='grfwp-about-us-premium-table-cell'><?php _e( 'Create unlimited reviews/testimonials', 'good-reviews-wp' ); ?></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='grfwp-about-us-premium-table-body'>
						<div class='grfwp-about-us-premium-table-cell'><?php _e( 'Add 5-star or numbered ratings to reviews', 'good-reviews-wp' ); ?></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='grfwp-about-us-premium-table-body'>
						<div class='grfwp-about-us-premium-table-cell'><?php _e( 'Gutenberg block and shortcode to add reviews to your site', 'good-reviews-wp' ); ?></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='grfwp-about-us-premium-table-body'>
						<div class='grfwp-about-us-premium-table-cell'><?php _e( 'Schema.org structured data included with reviews', 'good-reviews-wp' ); ?></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='grfwp-about-us-premium-table-body'>
						<div class='grfwp-about-us-premium-table-cell'><?php _e( 'Clean, responsive layout', 'good-reviews-wp' ); ?></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='grfwp-about-us-premium-table-body'>
						<div class='grfwp-about-us-premium-table-cell'><?php _e( 'Integration with Five Star Restaurant Reservations and Restaurant Menu plugins', 'good-reviews-wp' ); ?></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='grfwp-about-us-premium-table-body'>
						<div class='grfwp-about-us-premium-table-cell'><?php _e( 'Thumbnail layout option', 'good-reviews-wp' ); ?></div>
						<div class='grfwp-about-us-premium-table-cell'></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='grfwp-about-us-premium-table-body'>
						<div class='grfwp-about-us-premium-table-cell'><?php _e( 'Image-based layout option', 'good-reviews-wp' ); ?></div>
						<div class='grfwp-about-us-premium-table-cell'></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='grfwp-about-us-premium-table-body'>
						<div class='grfwp-about-us-premium-table-cell'><?php _e( 'Advanced styling options', 'good-reviews-wp' ); ?></div>
						<div class='grfwp-about-us-premium-table-cell'></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='grfwp-about-us-premium-table-body'>
						<div class='grfwp-about-us-premium-table-cell'><?php _e( 'Add custom fields to reviews', 'good-reviews-wp' ); ?></div>
						<div class='grfwp-about-us-premium-table-cell'></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
					<div class='grfwp-about-us-premium-table-body'>
						<div class='grfwp-about-us-premium-table-cell'><?php _e( 'Advanced labelling options', 'good-reviews-wp' ); ?></div>
						<div class='grfwp-about-us-premium-table-cell'></div>
						<div class='grfwp-about-us-premium-table-cell'><img src="<?php echo plugins_url( '../assets/img/dash-asset-checkmark.png', __FILE__ ); ?>"></div>
					</div>
				</div>

				<?php printf( __( '<a href="%s" target="_blank" class="grfwp-about-us-tab-button grfwp-about-us-tab-button-purchase">Buy Premium Version</a>', 'good-reviews-wp' ), 'https://www.fivestarplugins.com/license-payment/?Selected=GRFWP&Quantity=1&utm_source=admin_about_us' ); ?>
				
			</div>

			<div class='grfwp-about-us-tab grfwp-hidden' data-tab='getting_started'>

				<p><?php _e( 'To view our video playlist for this plugin, please click the button below.', 'good-reviews-wp' ); ?></p>

				<?php printf( __( '<a href="%s" target="_blank" class="grfwp-about-us-tab-button grfwp-about-us-tab-button-youtube">YouTube Playlist</a>', 'good-reviews-wp' ), 'https://www.youtube.com/playlist?list=PLEndQUuhlvSqCjaSTnemJnSy2V9MQqtoz' ); ?>

				
			</div>

			<div class='grfwp-about-us-tab grfwp-hidden' data-tab='suggest_feature'>

				<div class='grfwp-about-us-feature-suggestion'>

					<p><?php _e( 'You can use the form below to let us know about a feature suggestion you might have.', 'good-reviews-wp' ); ?></p>

					<textarea placeholder="<?php _e( 'Please describe your feature idea...', 'good-reviews-wp' ); ?>"></textarea>
					
					<br>
					
					<input type="email" name="feature_suggestion_email_address" placeholder="<?php _e( 'Email Address', 'good-reviews-wp' ); ?>">
				
				</div>
				
				<div class='grfwp-about-us-tab-button grfwp-about-us-send-feature-suggestion'>Send Feature Suggestion</div>
				
			</div>

		</div>

	<?php }

	/**
	 * Sends the feature suggestions submitted via the About Us page
	 * @since 2.3.0
	 */
	public function send_feature_suggestion() {
		global $grfwp_controller;
		
		if (
			! check_ajax_referer( 'grfwp-admin-js', 'nonce' ) 
			|| 
			! current_user_can( 'manage_options' )
		) {
			grfwpHelper::admin_nopriv_ajax();
		}

		$headers = 'Content-type: text/html;charset=utf-8' . "\r\n";  
	    $feedback = sanitize_text_field( $_POST['feature_suggestion'] );
		$feedback .= '<br /><br />Email Address: ';
	  	$feedback .=  sanitize_email( $_POST['email_address'] );
	
	  	wp_mail( 'contact@fivestarplugins.com', 'GRFWP Feature Suggestion', $feedback, $headers );
	
	  	die();
	} 

}
} // endif;