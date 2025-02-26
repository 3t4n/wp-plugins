<?php

/**
 * Load Localisation files.
 * @since 1.0.0
 */
function mts_load_plugin_textdomain() {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'mythemeshop-theme-customizer' );
	load_textdomain( 'mythemeshop-theme-customizer', WP_LANG_DIR . '/mythemeshop-theme-customizer-' . $locale . '.mo' );
	load_plugin_textdomain( 'mythemeshop-theme-customizer', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action('init', 'mts_load_plugin_textdomain');

/**
 * Companion code for onepage-Lite
 *
 * @author MyThemeShop
 * @package mts-companion
 */

/**
 * Populate OnePage frontpage widgets areas with default widgets
 */
function mts_populate_with_default_widgets() {

	$onepage_lite_sidebars = array( 'sidebar-homepage' => 'sidebar-homepage' );

	$active_widgets = get_option( 'sidebars_widgets' );

	/**
	 * Populate the HomePage sidebar
	 */
	if ( empty ( $active_widgets[ $onepage_lite_sidebars['sidebar-homepage'] ] ) ) {

		$onepage_lite_counter = 1;

		/* Featured widget #1 */

		$active_widgets['sidebar-homepage'][0] = 'onepage_featured-widget-' . $onepage_lite_counter;

		$featured_content[ $onepage_lite_counter ] = array(
			'featuredimg'	=> get_template_directory_uri() . "/images/featured.jpg",
			'featuredtitle'	=> 'Creative OnePage Theme',
			'featuredtext'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet tincidunt orci. Curabitur hendrerit lacinia vestibulum. Pellentesque lacus dui, rutrum quis nunc sit amet, laoreet convallis leo.',
		);

		update_option( 'widget_onepage_featured-widget', $featured_content );

		$onepage_lite_counter ++;

		/* Buttons widget #2 */

		$active_widgets['sidebar-homepage'][] = 'onepage_buttons-widget-' . $onepage_lite_counter;

		$buttons_content[ $onepage_lite_counter ] = array(
			'button1text'	=> 'View Services',
			'button1url'	=> '#',
			'button1icon'	=> 'th-large',

			'button2text'	=> 'Request Quote',
			'button2url'	=> '#',
			'button2icon'	=> 'shopping-cart',
		);

		update_option( 'widget_onepage_buttons-widget', $buttons_content );

		$onepage_lite_counter ++;

		/* Features widget #3 */

		$active_widgets['sidebar-homepage'][] = 'onepage_features-widget-' . $onepage_lite_counter;

		$features_content[ $onepage_lite_counter ] = array(
			'title'	=> 'Features',
			'subtext'	=> 'Lorem ipsum dolor sit amet',

			'feature_icon1'	=> 'desktop',
			'title1'	=> 'Fully Responsive',
			'text1'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet tincidunt orci. Curabitur hendrerit lacinia vestibulum. Pellentesque lacus dui, rutrum quis nunc sit amet, laoreet convallis leo.',

			'feature_icon2'	=> 'cogs',
			'title2'	=> 'Easy Customization',
			'text2'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet tincidunt orci. Curabitur hendrerit lacinia vestibulum. Pellentesque lacus dui, rutrum quis nunc sit amet, laoreet convallis leo.',

			'feature_icon3'	=> 'file-text',
			'title3'	=> 'Well Documented',
			'text3'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet tincidunt orci. Curabitur hendrerit lacinia vestibulum. Pellentesque lacus dui, rutrum quis nunc sit amet, laoreet convallis leo.',
		);

		update_option( 'widget_onepage_features-widget', $features_content );

		$onepage_lite_counter ++;

		/* Counter widget #4 */

		$active_widgets['sidebar-homepage'][] = 'onepage_counter-widget-' . $onepage_lite_counter;

		$counter_content[ $onepage_lite_counter ] = array(
			'title'	=> 'Counter',
			'subtext'	=> 'Lorem ipsum dolor sit amet consectetur',

			'count1'	=> '950',
			'subtext1'	=> 'Happy Clients',

			'count2'	=> '1,320',
			'subtext2'	=> 'Projects Completed',

			'count3'	=> '732',
			'subtext3'	=> 'Support Queries',

			'count4'	=> '98',
			'subtext4'	=> 'Free Stuff',

			'count5'	=> '4,231',
			'subtext5'	=> 'Registered Members',
		);

		update_option( 'widget_onepage_counter-widget', $counter_content );

		$onepage_lite_counter ++;

		/* Services widget #5 */

		$active_widgets['sidebar-homepage'][] = 'onepage_services-widget-' . $onepage_lite_counter;

		$services_content[ $onepage_lite_counter ] = array(
			'title'	=> 'Services',
			'subtext'	=> 'Lorem ipsum dolor sit amet consectetur adipiscing elit',

			'service_icon1'	=> 'code',
			'title1'	=> 'Web Design',
			'text1'	=> 'Sed vitae aliquet libero. Duis cursus, augue tempus venenatis fermentum, massa tellus posuere augue, sit amet consectetur ante arcu vitae metus. Suspendisse aliquet congue cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at nisl lorem, vel porttitor justo. ',

			'service_icon2'	=> 'apple',
			'title2'	=> 'App Development',
			'text2'	=> 'Sed vitae aliquet libero. Duis cursus, augue tempus venenatis fermentum, massa tellus posuere augue, sit amet consectetur ante arcu vitae metus. Suspendisse aliquet congue cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at nisl lorem, vel porttitor justo. ',

			'service_icon3'	=> 'cloud',
			'title3'	=> 'Cloud Storage',
			'text3'	=> 'Sed vitae aliquet libero. Duis cursus, augue tempus venenatis fermentum, massa tellus posuere augue, sit amet consectetur ante arcu vitae metus. Suspendisse aliquet congue cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at nisl lorem, vel porttitor justo. ',
		);

		update_option( 'widget_onepage_services-widget', $services_content );

		$onepage_lite_counter ++;

		/* Tweets widget #6 */

		$active_widgets['sidebar-homepage'][] = 'mts_widget_recent_tweets-' . $onepage_lite_counter;

		$tweets_content[ $onepage_lite_counter ] = array(
			'title'	=> '',
		);

		update_option( 'widget_mts_widget_recent_tweets', $tweets_content );

		$onepage_lite_counter ++;

		/* Testimonials widget #7 */

		$active_widgets['sidebar-homepage'][] = 'onepage_testimonials-widget-' . $onepage_lite_counter;

		$testimonials_content[ $onepage_lite_counter ] = array(
			'title'	=> 'Testimonials',
			'subtext'	=> 'Lorem ipsum dolor sit amet consectetur adipiscing elit',

			'img1'	=> get_template_directory_uri() . "/images/testimonial1.jpg",
			'text1'	=> '"Sed vitae aliquet libero. Duis cursus, augue tempus venenatis fermentum, massa tellus posuere augue, sit amet consectetur ante arcu vitae metus. Suspendisse aliquet congue cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at nisl lorem, vel porttitor justo"',
			'testifier1'	=> '- Ann Roberts',

			'img2'	=> get_template_directory_uri() . "/images/testimonial2.jpg",
			'text2'	=> '"Sed vitae aliquet libero. Duis cursus, augue tempus venenatis fermentum, massa tellus posuere augue, sit amet consectetur ante arcu vitae metus. Suspendisse aliquet congue cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at nisl lorem, vel porttitor justo"',
			'testifier2'	=> '- Robert Snyder',
		);

		update_option( 'widget_onepage_testimonials-widget', $testimonials_content );

		$onepage_lite_counter ++;

		/* Clients widget #8 */

		$active_widgets['sidebar-homepage'][] = 'onepage_clients-widget-' . $onepage_lite_counter;

		$clients_content[ $onepage_lite_counter ] = array(
			'title'	=> 'Clients',
			'subtext' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit',

			'img1'	=> get_template_directory_uri() . "/images/brand1.png",
			'img2'	=> get_template_directory_uri() . "/images/brand2.png",
			'img3'	=> get_template_directory_uri() . "/images/brand3.png",
			'img4'	=> get_template_directory_uri() . "/images/brand4.png",
			'img5'	=> get_template_directory_uri() . "/images/brand5.png",
		);

		update_option( 'widget_onepage_clients-widget', $clients_content );

		$onepage_lite_counter ++;

		/* Blog widget #9 */

		$active_widgets['sidebar-homepage'][] = 'onepage_blog-widget-' . $onepage_lite_counter;

		$blog_content[ $onepage_lite_counter ] = array(
			'title'	=> 'Blog',
			'subtext' => 'Lorem ipsum dolor sit amet consectetur',

			'num_post'		=> '4',
			'button_url' 	=> get_home_url() . "/blog/",
		);

		update_option( 'widget_onepage_blog-widget', $blog_content );

		$onepage_lite_counter ++;

		update_option( 'sidebars_widgets', $active_widgets );

	}

	update_option( 'mts_customizer_flag', 'installed' );

}

/**
 * Register onepage Widgets
 */
function mts_register_widgets() {

	register_widget( 'onepage_featured' );
	register_widget( 'onepage_buttons' );
	register_widget( 'onepage_features' );
	register_widget( 'onepage_counter' );
	register_widget( 'onepage_services' );
	register_widget( 'mts_widget_recent_tweets' );
	register_widget( 'onepage_testimonials' );
	register_widget( 'onepage_clients' );
	register_widget( 'onepage_blog' );

	$theme = wp_get_theme();

	/* Populate the sidebar only for onepage Lite */
	if ( 'OnePage Lite' == $theme->name || 'OnePage Lite' == $theme->parent_theme ) {

		$mts_customizer_flag = get_option( 'mts_customizer_flag' );
		if ( empty( $mts_customizer_flag ) && function_exists( 'mts_populate_with_default_widgets' ) ) {
			mts_populate_with_default_widgets();
		}
	}
}

add_action( 'widgets_init', 'mts_register_widgets' );

/* Require The Widget Files */
require_once MTS_CUSTOMIZER_PATH . 'inc/widgets/widget-featured.php';
require_once MTS_CUSTOMIZER_PATH . 'inc/widgets/widget-buttons.php';
require_once MTS_CUSTOMIZER_PATH . 'inc/widgets/widget-features.php';
require_once MTS_CUSTOMIZER_PATH . 'inc/widgets/widget-counter.php';
require_once MTS_CUSTOMIZER_PATH . 'inc/widgets/widget-services.php';
require_once MTS_CUSTOMIZER_PATH . 'inc/widgets/widget-tweets.php';
require_once MTS_CUSTOMIZER_PATH . 'inc/widgets/widget-testimonials.php';
require_once MTS_CUSTOMIZER_PATH . 'inc/widgets/widget-clients.php';
require_once MTS_CUSTOMIZER_PATH . 'inc/widgets/widget-blog.php';
