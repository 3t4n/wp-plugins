<?php
class AIEA_Addon_Base {
	
	protected static $instance;
	
	public static $aiea_options;
	
	public static function instance() {

		if ( null === self::$instance ) {

			self::$instance = new self();
		}

		return self::$instance;
	}
		
	public function aiea_options( $key ) {
		if ( null === self::$aiea_options ) self::$aiea_options = get_option( 'aiea_options' );
		
		return isset( self::$aiea_options[$key] ) ? self::$aiea_options[$key] : '';
	}
	
	public function aiea_default_options() {
		return [ 'mailchimp-api' => '' ];
	}
	
	public function aiea_default_widgets() {
		return [ 'fancy-text' => 'off' ];
	}
	
	public function aiea_default_modules() {
		return [ 'smoke' => 'off' ];
	}
	
	public function aiea_shortcodes(){
	
		$available_shortcodes = array(
			
			// AI Content
			'ai-title'			=> [ 'url' => 'https://aiaddons.ai/ai-title/', 'pro' => false, 'title' => esc_html__( 'Elementor AI Title Widget', 'ai-addons' ) ],
			'ai-content'		=> [ 'url' => 'https://aiaddons.ai/ai-content/', 'pro' => false, 'title' => esc_html__( 'Elementor AI Content Widget', 'ai-addons' ) ],
			
			//Common Widgets
			'fancy-text' 		=> [ 'url' => 'https://aiaddons.ai/fancy-text-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Fancy Text Widget', 'ai-addons' ) ],
			'tooltip'			=> [ 'url' => 'https://aiaddons.ai/tooltip-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Tooltip Widget', 'ai-addons' ) ],
			'contact-info' 		=> [ 'url' => 'https://aiaddons.ai/contact-form-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Contact Info Widget', 'ai-addons' ) ],
			'google-map' 		=> [ 'url' => 'https://aiaddons.ai/google-map-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Google Map Widget', 'ai-addons' ) ],
			'button' 			=> [ 'url' => 'https://aiaddons.ai/button-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Button Widget', 'ai-addons' ) ],
			'creative-button'	=> [ 'url' => 'https://aiaddons.ai/button-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Creative Button Widget', 'ai-addons' ) ],
			'icon-list' 		=> [ 'url' => 'https://aiaddons.ai/icon-list-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Icon List Widget', 'ai-addons' ) ],
			'icon' 				=> [ 'url' => 'https://aiaddons.ai/icon-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Icon Widget', 'ai-addons' ) ],
			'icon-box' 			=> [ 'url' => 'https://aiaddons.ai/icon-box-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Icon Box Widget', 'ai-addons' ) ],
			'image-box' 		=> [ 'url' => 'https://aiaddons.ai/image-box-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Image Box Widget', 'ai-addons' ) ],
			'feature-box' 		=> [ 'url' => 'https://aiaddons.ai/feature-box-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Feature Box Widget', 'ai-addons' ) ],
			'flip-box' 			=> [ 'url' => 'https://aiaddons.ai/flip-box-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Flip Box Widget', 'ai-addons' ) ],			
			'section-title' 	=> [ 'url' => 'https://aiaddons.ai/section-title-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Section Title Widget', 'ai-addons' ) ],
			
			// charts
			'chart' 			=> [ 'url' => 'https://aiaddons.ai/chart-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Chart Widget', 'ai-addons' ) ],
			'bar-chart'			=> [ 'url' => 'https://aiaddons.ai/bar-chart-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Bar Chart Widget', 'ai-addons' ) ],
			'line-chart'		=> [ 'url' => 'https://aiaddons.ai/line-chart-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Line Chart Widget', 'ai-addons' ) ],
			'polar-area-chart'	=> [ 'url' => 'https://aiaddons.ai/polar-area-chart-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Polar Area Chart Widget', 'ai-addons' ) ],
			'pie-chart'	=> [ 'url' => 'https://aiaddons.ai/polar-area-chart-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Pie Chart Widget', 'ai-addons' ) ],
			
			'circle-progress'	=> [ 'url' => 'https://aiaddons.ai/circle-progress-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Circle Progress Widget', 'ai-addons' ) ],
			'progress-bar'	=> [ 'url' => 'https://aiaddons.ai/progress-bar-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Progress Bar Widget', 'ai-addons' ) ],
			'counter' 			=> [ 'url' => 'https://aiaddons.ai/counter-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Counter Widget', 'ai-addons' ) ],
			'day-counter' 		=> [ 'url' => 'https://aiaddons.ai/day-counter-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Day Counter Widget', 'ai-addons' ) ],
			'pricing-table' 	=> [ 'url' => 'https://aiaddons.ai/pricing-table-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Pricing Table Widget', 'ai-addons' ) ],
			'timeline' 			=> [ 'url' => 'https://aiaddons.ai/timeline-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Timeline Widget', 'ai-addons' ) ],
			'timeline-slide' 	=> [ 'url' => 'https://aiaddons.ai/timeline-slide-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Timeline Slide Widget', 'ai-addons' ) ],	
			'offcanvas' 		=> [ 'url' => 'https://aiaddons.ai/offcanvas-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Offcanvas Widget', 'ai-addons' ) ],			
			'image-grid' 		=> [ 'url' => 'https://aiaddons.ai/image-grid-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Image Grid Widget', 'ai-addons' ) ],
			'social-icons' 		=> [ 'url' => 'https://aiaddons.ai/social-icons-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Social Icons Widget', 'ai-addons' ) ],
			'social-share' 		=> [ 'url' => 'https://aiaddons.ai/social-share-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Social Share Widget', 'ai-addons' ) ],
			'modal-popup' 		=> [ 'url' => 'https://aiaddons.ai/modal-popup-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Modal Popup Widget', 'ai-addons' ) ],
			'mailchimp' 		=> [ 'url' => 'https://aiaddons.ai/counter-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Mailchimp Widget', 'ai-addons' ) ],
			'image-before-after' => [ 'url' => 'https://aiaddons.ai/before-after-image-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Image Before After Widget', 'ai-addons' ) ],
			'image-hotspot' => [ 'url' => 'https://aiaddons.ai/image-hotspot-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Image Hotspot Widget', 'ai-addons' ) ],
			'image-hover' => [ 'url' => 'https://aiaddons.ai/image-hover-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Image Hover Widget', 'ai-addons' ) ],
			'pretty-hover' => [ 'url' => 'https://aiaddons.ai/pretty-hover-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Pretty Hover Widget', 'ai-addons' ) ],
			'image-accordion' => [ 'url' => 'https://aiaddons.ai/image-accordion-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Image Accordion Widget', 'ai-addons' ) ],
			'weather' => [ 'url' => 'https://aiaddons.ai/weather-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Weather Widget', 'ai-addons' ) ],
			
			'team' 				=> [ 'url' => 'https://aiaddons.ai/team/', 'pro' => false, 'title' => esc_html__( 'Elementor Team Widget', 'ai-addons' ) ],
			'testimonial' 		=> [ 'url' => 'https://aiaddons.ai/testimonial/', 'pro' => false, 'title' => esc_html__( 'Elementor Testimonial Widget', 'ai-addons' ) ],
			'portfolio' 				=> [ 'url' => 'https://aiaddons.ai/portfolio-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Portfolio Widget', 'ai-addons' ) ],
			
			//Container Widgets
			'accordion' 		=> [ 'url' => 'https://aiaddons.ai/accordion-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Accordion Widget', 'ai-addons' ) ],
			'tab' 				=> [ 'url' => 'https://aiaddons.ai/tab-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Tab Widget', 'ai-addons' ) ],
			'video-popup'		=> [ 'url' => 'https://aiaddons.ai/video-popup-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Video Popup Widget', 'ai-addons' ) ],
			'content-carousel' 	=> [ 'url' => 'https://aiaddons.ai/content-carousel-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Content Carousel Widget', 'ai-addons' ) ],
			'content-switcher' 	=> [ 'url' => 'https://aiaddons.ai/content-switcher-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Content Switcher Widget', 'ai-addons' ) ],
			'toggle-content' 	=> [ 'url' => 'https://aiaddons.ai/toggle-content-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Toggle Content Widget', 'ai-addons' ) ],
			'data-table' 		=> [ 'url' => 'https://aiaddons.ai/data-table-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Table Widget', 'ai-addons' ) ],
			
			//Form Widgets
			'contact-form-7'	=> [ 'url' => 'https://aiaddons.ai/contact-form-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Contact Form 7 Widget', 'ai-addons' ) ],
			'ninja-form'	=> [ 'url' => 'https://aiaddons.ai/ninja-form-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Ninja Form Widget', 'ai-addons' ) ],
			'wp-form'	=> [ 'url' => 'https://aiaddons.ai/wp-form-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor WP Form Widget', 'ai-addons' ) ],
			
			//Post Widget
			'posts'				=> [ 'url' => 'https://aiaddons.ai/post-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Posts Widget', 'ai-addons' ) ],
			'posts-magazine'	=> [ 'url' => 'https://aiaddons.ai/post-magazine-demo/', 'pro' => true, 'title' => esc_html__( 'Elementor Posts Magazine Widget', 'ai-addons' ) ],
			
			// Product Widgets
			'product'			=> [ 'url' => 'https://aiaddons.ai/product-demo/', 'pro' => false, 'title' => esc_html__( 'Elementor Product Widget', 'ai-addons' ) ],
			'product-slider'	=> [ 'url' => 'https://aiaddons.ai/product-slider/', 'pro' => true, 'title' => esc_html__( 'Elementor Product Slider Widget', 'ai-addons' ) ],
			'products-category'	=> [ 'url' => 'https://aiaddons.ai/products-category/', 'pro' => true, 'title' => esc_html__( 'Elementor Products Category Widget', 'ai-addons' ) ],
			'products-category-slider'	=> [ 'url' => 'https://aiaddons.ai/products-category-slider/', 'pro' => true, 'title' => esc_html__( 'Elementor Products Category Slider Widget', 'ai-addons' ) ],
			'product-single'			=> [ 'url' => 'https://aiaddons.ai/product-single/', 'pro' => false, 'title' => esc_html__( 'Elementor Product Single Widget', 'ai-addons' ) ],
			
			// Header & Footer
			'logo'				=> [ 'url' => 'https://aiaddons.ai/', 'pro' => false, 'title' => esc_html__( 'Elementor Logo Widget', 'ai-addons' ) ],
			'menu'				=> [ 'url' => 'https://aiaddons.ai/', 'pro' => false, 'title' => esc_html__( 'Elementor Menu Widget', 'ai-addons' ) ],
			'search'			=> [ 'url' => 'https://aiaddons.ai/', 'pro' => false, 'title' => esc_html__( 'Elementor Search Widget', 'ai-addons' ) ],
			'copyright'			=> [ 'url' => 'https://aiaddons.ai/', 'pro' => false, 'title' => esc_html__( 'Elementor Copyright Widget', 'ai-addons' ) ],
			'page-title'		=> [ 'url' => 'https://aiaddons.ai/', 'pro' => false, 'title' => esc_html__( 'Elementor Page Title Widget', 'ai-addons' ) ],
			'post-title'		=> [ 'url' => 'https://aiaddons.ai/', 'pro' => false, 'title' => esc_html__( 'Elementor Post Title Widget', 'ai-addons' ) ],
			'archive-title'		=> [ 'url' => 'https://aiaddons.ai/', 'pro' => false, 'title' => esc_html__( 'Elementor Archive Title Widget', 'ai-addons' ) ],
			'site-title'		=> [ 'url' => 'https://aiaddons.ai/', 'pro' => false, 'title' => esc_html__( 'Elementor Site Title Widget', 'ai-addons' ) ],'breadcrumbs'		=> [ 'url' => 'https://aiaddons.ai/', 'pro' => true, 'title' => esc_html__( 'Elementor Breadcrumbs Widget', 'ai-addons' ) ],			
				
		);
				
		return $available_shortcodes;
	}
	
	public function aiea_modules(){
		
		$available_modules = array(

			'smoke'			=> [ 'url' => 'https://aiaddons.ai/image-box-demo/', 'pro' => true, 'title' => esc_html__( 'Smoke Effects', 'ai-addons' ) ],
			'rain-drops'	=> [ 'url' => 'https://aiaddons.ai/content-carousel-demo/', 'pro' => true, 'title' => esc_html__( 'Rain Drop Effects', 'ai-addons' ) ],
			'parallax'		=> [ 'url' => 'https://aiaddons.ai/counter-demo/', 'pro' => false, 'title' => esc_html__( 'Background Parallax', 'ai-addons' ) ],
			'float-image'	=> [ 'url' => 'https://aiaddons.ai/content-carousel-demo/', 'pro' => true, 'title' => esc_html__( 'Floating Images', 'ai-addons' ) ],
			'header-footer'	=> [ 'url' => 'https://aiaddons.ai/mega-menu-demo/', 'pro' => false, 'title' => esc_html__( 'Header Footer', 'ai-addons' ) ],
			'mega-menu'		=> [ 'url' => 'https://aiaddons.ai/mega-menu-demo/', 'pro' => false, 'title' => esc_html__( 'Mega Menu', 'ai-addons' ) ]
			
		);
				
		return $available_modules;
		
	}
	
	public function make_default_content( $key ) {
		$content = '';
		
		// api call
		
		switch( $key ) {
			case "tooltip":
				$content = 'AI Elementor Tooltip Widget allows you to add a tooltip to any element on your website.';
			break;
			case "offcanvas":
				$content = 'AI Addons is a powerful WordPress plugin that helps you create stunning websites in minutes. It adds numerous professional features to the Elementor Page Builder, including ai elements, custom widgets, and global controls. With AI Addons, you can build beautiful websites faster than ever before.';
			break;
			case "cs-primary":
				$content = 'The AI Addon Content Switcher elementor is a powerful plugin for Elementor that makes it easier for you to switch between content on your website. With this plugin, you can easily switch between different content types, such as text, images, videos, and other forms of content. This makes it easier for you to create dynamic and engaging websites without having to manually switch between different content types.

				The AI Addon Content Switcher elementor allows you to quickly and easily switch between different types of content. The plugin has a user-friendly interface, making it easy for you to quickly and easily switch between different content types. It also allows you to customize the content switcher with different colors, fonts, and other settings.';
			break;			
			case "cs-secondary":
				$content = 'The plugin also allows you to create custom content types, such as polls, surveys, and quizzes. This makes it easier for you to create dynamic and engaging websites that are tailored to your specific needs. You can also use the plugin to create custom content types for specific pages on your website.

				The AI Addon Content Switcher elementor also makes it easy for you to manage your content. You can easily see which content types are currently active and which ones are inactive. You can also control how long each content';
			break;
			case "accordion-content":
				$content = 'An AI Addon Accordion is a tool that helps to organize content into collapsible sections. These sections can be opened and closed with a click, allowing users to easily find and access the information they need. It is an efficient way to display large amounts of content in a condensed format.';
			break;
			case "content-carousel-1":
				$content = 'Stay organized with our AI Addon Content Carousel! Create beautiful and professional carousels with multiple images, captions, and call-to-action buttons. Customize the look and feel of your carousels to match your branding and website design.';
			break;
			case "content-carousel-2":
				$content = 'Make your content stand out with AI Addon Content Carousel! Show off your best content with stunning visuals and animations that draw attention to your products and services. Increase engagement and keep your visitors coming back for more';
			break;
			case "content-carousel-3":
				$content = 'Organize your content quickly and easily with our AI Addon Content Carousel! Get up and running in no time with our simple drag-and-drop feature. Set up multiple carousels with different themes and styles to keep your content fresh and engaging.';
			break;
			case "modal-popup":
				$content = 'With this modal popup, you can create custom messages, surveys, or calls to action that appear in a popup window when a user visits your site. You can choose to show the popup once or multiple times, or even on specific pages. You can also customize the look and feel of the popup with different colors and styles.';
			break;
			case "tab-content":
				$content = 'The AI Addons Tab Widget is a powerful tool to add extra functionality to your website. This tab widget makes it easy to organize a variety of different elements, giving visitors quick access to important information. It can also be used to create tabbed navigation menus, allowing visitors to quickly find the content they need.';
			break;
			case "toggle-content":
				$content = 'Toggle content is a type of content that is hidden until a user interacts with it. It can be used to hide or reveal additional information or to provide a more efficient way of navigating a website. Toggle content can be used to display FAQs, instructions, or other information that may be needed but does not need to be visible all of the time. It can also be used to break up a page into smaller sections or to hide content until a user is ready to view it. Toggle content can help to reduce the amount of clutter on a page and make the information more organized and accessible.';
			break;
			case "icon-box":
				$content = 'We bring most ai and awesome icon box.';
			break;
			case "image-box":
				$content = 'We bring most ai and awesome image box.';
			break;
			case "feature-box":
				$content = 'We bring most ai and awesome feature box.';
			break;
			
			case "ai-content":
				$content = 'The rise of artificial intelligence (AI) has been nothing short of revolutionary, with the technology now being used in a wide variety of industries and applications. AI has been instrumental in aiding the development of autonomous vehicles, robotics, medical diagnostics, natural language processing, and more. As the technology continues to expand, the possibilities and implications of AI are being explored by academics, entrepreneurs, and industry experts around the world.';
			break;
			case "team":
				$content = 'Get team widget now for Elementor along with a fully responsive & mobile friendly interface to help you manage your client teams. Never waste your time finding widgets, get everything you need in one place.';
			break;
			case "testimonial":
				$content = 'Get testimonial widget now for Elementor along with a fully responsive & mobile friendly interface to help you manage your client testimonials. Never waste your time finding widgets, get everything you need in one place.';
			break;
			case "pretty-hover":
				$content = 'We bring most ai and awesome Pretty Hover Effects.';
			break;
		}
		return $content;
	}
	
	public function make_widget_class_name( $name ) {
		return 'AIEA_'. str_replace( " ", "_", $name );
	}
	
	public function shortcode_rand_id() {
		static $shortcode_rand = 1;
		return $shortcode_rand++;
	}
	
	function themify_icons() {
		$pattern = '/\.(ti-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
		$ti_path = AIEA_URL . 'assets/css/front-end/themify-icons.css';
			
		$response = wp_remote_get( $ti_path );
		if( is_array( $response ) ) {
			$file = $response['body']; // use the content
			preg_match_all($pattern, $file, $str, PREG_SET_ORDER);
			return $str;
		}	
		return '';
	}
	
	function bootstrap_icons(){
		$pattern = '/\.(bi-(?:\w+(?:-)?)+)::before\s+{\s*content:\s*"(.+)";\s+}/';
		$bi_path = AIEA_URL . 'assets/css/front-end/bootstrap-icons.css';  
			
		$response = wp_remote_get( $bi_path );
		if( is_array($response) ) {
			$file = $response['body']; // use the content
			preg_match_all($pattern, $file, $str, PREG_SET_ORDER);
			return $str;
		}
		return '';
	}
	
	function icon_fonts( $fonts_array ){
		
		// Themify
		$fonts_array['themify'] = [
			'name' => 'themify',
			'label' => __( 'Themify Icons', 'ai-addons' ),
			'url' => AIEA_URL . 'assets/css/front-end/themify-icons.css',
			'enqueue' => [ AIEA_URL . 'assets/css/front-end/themify-icons.css' ],
			'prefix' => 'ti-',
			'displayPrefix' => '',
			'labelIcon' => 'ti-heart',
			'ver' => '1.0',
			'fetchJson' => AIEA_URL . 'assets/js/front-end/themify-icons.js',
			'native' => false,
		];
		
		// Bootstrap
		$fonts_array['bootstrap'] = [
			'name' => 'bootstrap',
			'label' => __( 'Bootstrap Icons', 'ai-addons' ),
			'url' => AIEA_URL . 'assets/css/front-end/bootstrap-icons.css',
			'enqueue' => [ AIEA_URL . 'assets/css/front-end/bootstrap-icons.css' ],
			'prefix' => '',
			'displayPrefix' => '',
			'labelIcon' => 'bi-bootstrap',
			'ver' => '1.0',
			'fetchJson' => AIEA_URL . 'assets/js/front-end/bootstrap-icons.js',
			'native' => false,
		];
		
		return $fonts_array;
		
	}
	
	function register_controls( $controls_manager ) {
		
		// Include Control
		require_once( AIEA_DIR . 'includes/controls/drag-drop.php' );
		require_once( AIEA_DIR . 'includes/controls/themify-icon.php' );
		require_once( AIEA_DIR . 'includes/controls/bootstrap-icon.php' );		
		require_once( AIEA_DIR . 'includes/controls/trigger.php' );
		require_once( AIEA_DIR . 'includes/controls/ai.php' );
		require_once( AIEA_DIR . 'includes/controls/image-select.php' );

		// Register control
		$controls_manager->register( new \Elementor\AIEA_Drag_Drop_Control() );
		$controls_manager->register( new \Elementor\AIEA_Themify_Icon_Control() );
		$controls_manager->register( new \Elementor\AIEA_Bootstrap_Icon_Control() );		
		$controls_manager->register( new \Elementor\AIEA_Choose_Trigger_Control() );
		$controls_manager->register( new \Elementor\AIEA_Image_Select_Control() );
		$controls_manager->register( new \Elementor\AIEA_Control() );
		
	}
	
	function get_attachment_image_html( $settings, $image_size_key = 'image', $image_key = null, $cur_class = '') {
		if ( ! $image_key ) {
			$image_key = $image_size_key;
		}
		
		$image_class = $cur_class->image_class;
		
		$image = $settings[ $image_key ];
		// Old version of image settings.
		if ( ! isset( $settings[ $image_size_key . '_size' ] ) ) {
			$settings[ $image_size_key . '_size' ] = '';
		}
		$size = $settings[ $image_size_key . '_size' ];
		$html = '';
		// If is the new version - with image size.
		$image_sizes = get_intermediate_image_sizes();
		$image_sizes[] = 'full';
		if ( ! empty( $image['id'] ) && ! wp_attachment_is_image( $image['id'] ) ) {
			$image['id'] = '';
		}
		if( ! empty( $image['id'] ) && in_array( $size, $image_sizes ) ){
			$cur_class->add_render_attribute( 'image_class', 'class', "attachment-$size size-$size" );
			$img_attr = $cur_class->get_render_attributes( $image_class );
			$img_attr['class'] = implode( " ", $img_attr['class'] );
			$html .= wp_get_attachment_image( $image['id'], $size, false, $img_attr );
		}else{
			$image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $image['id'], $image_size_key, $settings );
			if ( ! $image_src && isset( $image['url'] ) ) {
				$image_src = $image['url'];
			}
			if ( ! empty( $image_src ) ) {
				$html .= sprintf( '<img src="%s" title="%s" alt="%s" %s />', esc_attr( $image_src ), \Elementor\Control_Media::get_image_title( $image ), \Elementor\Control_Media::get_image_alt( $image ), $cur_class->get_render_attribute_string( $image_class ) );
			}
		}
		return $html;
	}
	
	function scripts_regsiter( $type = 'style', $process = 'register', $args = array() ) {
		
		if( $type == 'style' ) {
			if( $process == 'register' ) {
				wp_register_style( $args['key'], AIEA_URL .'assets/css/front-end/' . $args['file'], $args['lib'], $args['version'], 'all' );
			} else {
				wp_enqueue_style( $args['key'], AIEA_URL .'assets/css/front-end/' . $args['file'], $args['lib'], $args['version'], 'all' );
			}
		} elseif( $type == 'script' ) {
			$script_path = !isset( $args['external'] ) ? AIEA_URL .'assets/js/front-end/' . $args['file'] : $args['file'] ;
			if( $process == 'register' ) {				
				wp_register_script( $args['key'], $script_path, $args['lib'], $args['version'], 'all' );
			} else {
				wp_enqueue_script( $args['key'], $script_path, $args['lib'], $args['version'], true );
			}
		} elseif( $type = 'map' ) {
			wp_register_script( $args['key'], $args['file'], $args['lib'], $args['version'], 'all' );
		}
		
	}
	
	function widget_icon_classes( $key = '' ) {
		
		$icon_classes = [
			'ai-title' => 'aieaicon-title',
			'ai-content' => 'aieaicon-content',
			'fancy-text' => 'aieaicon-fancy-text',
			'tooltip' => 'aieaicon-tool-tip',
			'contact-info' => 'aieaicon-contact-info',
			'google-map' => 'aieaicon-google-map',
			'button' => 'aieaicon-button',
			'creative-button' => 'aieaicon-creative-button',
			'icon-list' => 'aieaicon-icon-list',
			'icon' => 'aieaicon-icon',
			'icon-box' => 'aieaicon-icon-box',
			'image-box' => 'aieaicon-image',
			'feature-box' => 'aieaicon-featured-box',
			'flip-box' => 'aieaicon-flip-box',
			'section-title' => 'aieaicon-section-title',
			'chart' => 'aieaicon-charts',
			'bar-chart' => 'aieaicon-bar-chart',
			'line-chart' => 'aieaicon-line-chart',
			'polar-area-chart' => 'aieaicon-polar-chart',
			'pie-chart' => 'aieaicon-pie-chart',
			'circle-progress' => 'aieaicon-circle-progress',
			'progress-bar' => 'aieaicon-progress-bar',
			'counter' => 'aieaicon-counter',
			'day-counter' => 'aieaicon-day-counter',
			'pricing-table' => 'aieaicon-pricing-table',
			'timeline' => 'aieaicon-timeline',
			'timeline-slide' => 'aieaicon-timeline-slide',
			'offcanvas' => 'aieaicon-offcanvas',
			'image-grid' => 'aieaicon-image-grid',
			'social-icons' => 'aieaicon-social-links',
			'social-share' => 'aieaicon-social-share',
			'modal-popup' => 'aieaicon-pop-up',
			'mailchimp' => 'aieaicon-mailchimp',
			'image-before-after' => 'aieaicon-before-after',
			'image-hotspot' => 'aieaicon-image-hotspot',
			'image-hover' => 'aieaicon-image-hover',
			'pretty-hover' => 'aieaicon-pretty-hover',
			'image-accordion' => 'aieaicon-image-accordion',
			'team' => 'aieaicon-team',
			'testimonial' => 'aieaicon-testimonial',
			'portfolio' => 'aieaicon-portfolio',
			'accordion' => 'aieaicon-accordion',
			'tab' => 'aieaicon-tab',
			'video-popup' => 'aieaicon-video-popup',
			'content-carousel' => 'aieaicon-carousel',
			'content-switcher' => 'aieaicon-content-switcher',
			'toggle-content' => 'aieaicon-toggle-content',
			'data-table' => 'aieaicon-table',
			'contact-form-7' => 'aieaicon-form',
			'ninja-form' => 'aieaicon-form',
			'wp-form' => 'aieaicon-form',
			'posts-magazine' => 'aieaicon-magazine',
			'posts' => 'aieaicon-post',
			'product' => 'aieaicon-product',
			'product-slider' => 'aieaicon-product-slider',
			'products-category' => 'aieaicon-product-category',
			'products-category-slider' => 'aieaicon-product-category-slider',
			'product-single' => 'aieaicon-single-product',
			'logo' => 'aieaicon-logo',
			'menu' => 'aieaicon-menu',
			'search' => 'aieaicon-search',
			'copyright' => 'aieaicon-copyright',
			'page-title' => 'aieaicon-page-title',
			'post-title' => 'aieaicon-post-title',
			'archive-title' => 'aieaicon-archive-title',
			'site-title' => 'aieaicon-site-title',
			'breadcrumbs' => 'aieaicon-breadcrumb',
			'smoke' => 'aieaicon-smoke',
			'rain-drops' => 'aieaicon-rain-drops',
			'parallax' => 'aieaicon-parallax',
			'float-image' => 'aieaicon-float',
			'header-footer' => 'aieaicon-header-footer',
			'mega-menu' => 'aieaicon-maga-menu',
			'weather' => 'aieaicon-weather'
		];
		
		if( empty( $key ) ) return $icon_classes;
		
		return isset( $icon_classes[$key] ) ? $icon_classes[$key] : '';
		
	}
	
}

function aiea_addon_base() {
	return AIEA_Addon_Base::instance();
}

