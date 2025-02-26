<?php 

class AIEA_Templates_Library {
	
	private static $_instance = null;
	
	public function __construct() {
		
		add_action( 'wp_ajax_render_aiea_templates_library', [ $this, 'render_aiea_templates_library' ] );
		
		add_action( 'wp_ajax_aiea_templates_import', [ $this, 'aiea_templates_import' ] );
				
	}
		
	function aiea_templates_import() {
		
		if ( isset( $_POST['nonce'] ) && !wp_verify_nonce( $_POST['nonce'], 'ai-library(*&&%^#' ) ) wp_die ( esc_html__( 'Busted', 'ai-addons' ) );
		
		$template = isset( $_POST['template'] ) ? sanitize_text_field( $_POST['template'] ) : 'contact';
		$part = isset( $_POST['part'] ) ? sanitize_text_field( $_POST['part'] ) : 'sections';
		$editor_post_id = isset( $_POST['editor_post_id'] ) ? sanitize_text_field( $_POST['editor_post_id'] ) : '';
		
		require_once ( AIEA_DIR . 'core/admin/ai-library-source.php' );		
		$source = new AIEA_Library_Source();
		$data = $source->get_data( array( 'part' => $part, 'template' => $template, 'editor_post_id' => $editor_post_id ) );
		
		wp_send_json( array( 'data' => $data ) );
		
	}
	
	function render_toolbar( $key ) {
		
		$toolbar = '<div class="ai-library-toolbar">
			<div class="ai-templates-search-wrap">
				<input class="ai-templates-search-text" placeholder="Search '. esc_attr( $key ) .'"><i class="eicon-search"></i>
			</div>
		</div>';
		
		return $toolbar;
		
	}
	
	function all_templates() {
		
		$templates = [
			'sections' => [
				'content-switcher-1' => [ 'pro' => true, 'title' => 'Content Switcher With Icon' ],
				'content-switcher-2' => [ 'pro' => true, 'title' => 'Content Switcher Without Icon' ],
				'day-counter-style-2' => [ 'pro' => true, 'title' => 'Day Counter Section 1'  ],	
				'day-counter-style-3' => [ 'pro' => true, 'title' => 'Day Counter Section 2' ],	
				'day-counter-style-4' => [ 'pro' => true, 'title' => 'Day Counter Section 3' ],						
				'day-counter-style-5' => [ 'pro' => true, 'title' => 'Day Counter Section 4' ],
				'chart-style-1' => [ 'pro' => true, 'title' => 'Bar Chart' ],
				'chart-style-3' => [ 'pro' => true, 'title' => 'Line Chart' ],
				'circle-progress-style-3' => [ 'pro' => true, 'title' => 'Circle Progress With Background' ],
				'counter-style-1' => [ 'pro' => false, 'title' => 'Counter 1' ],
				'fancy-text-1' => [ 'pro' => false, 'title' => 'Fancy Text 1' ],	
				'fancy-text-3' => [ 'pro' => true, 'title' => 'Fancy Text 2' ],
				'fancy-text-6' => [ 'pro' => false, 'title' => 'Fancy Text 3' ],	
				'fancy-text-7' => [ 'pro' => false, 'title' => 'Fancy Text 4' ],	
				'feature-box-1' => [ 'pro' => false, 'title' => 'Trending Feature Box' ],	
				'feature-box-2' => [ 'pro' => false, 'title' => 'Modern Feature Box' ],
				'feature-box-3' => [ 'pro' => false, 'title' => 'Feature Box With Image' ],	
				'feature-box-4' => [ 'pro' => true, 'title' => 'Grid Style Feature Box' ],		
				'feature-box-5' => [ 'pro' => true, 'title' => 'Gradient Background Feature Box' ],	
				'feature-box-6' => [ 'pro' => true, 'title' => 'Creative Feature Box' ],	
				'flip-box-1' => [ 'pro' => true, 'title' => 'Flip Box with Background' ],	
				'flip-box-2' => [ 'pro' => true, 'title' => '3D Flip Box' ],	
				'flip-box-3' => [ 'pro' => true, 'title' => 'Multi Effects Flip Boxes' ],	
				'flip-box-4' => [ 'pro' => true, 'title' => 'Flip Box with Image' ],
				'icon-box-1' => [ 'pro' => false, 'title' => 'Icon Box with Border' ],	
				'icon-box-2' => [ 'pro' => false, 'title' => 'Icon Box with Background' ],	
				'icon-box-3' => [ 'pro' => false, 'title' => 'Classic Icon Box' ],	
				'icon-box-4' => [ 'pro' => true, 'title' => 'Icon Box with Gradient Background' ],
				'icon-box-5' => [ 'pro' => true, 'title' => 'Modern Icon Box' ],
				'icon-box-6' => [ 'pro' => false, 'title' => 'Trending Icon Box' ],
				'icon-box-7' => [ 'pro' => true, 'title' => 'Icon Box With Background Image' ],
				'icon-box-8' => [ 'pro' => true, 'title' => 'Advance Icon Box' ],
				'image-box-1' => [ 'pro' => true, 'title' => 'Image Box Style 1' ],	
				'image-box-2' => [ 'pro' => true, 'title' => 'Image Box Style 2' ],	
				'image-box-3' => [ 'pro' => true, 'title' => 'Image Box Style 3' ],	
				'image-box-4' => [ 'pro' => true, 'title' => 'Image Box Style 4' ],
				'image-box-5' => [ 'pro' => true, 'title' => 'Image Box Style 5' ],
				'image-box-6' => [ 'pro' => true, 'title' => 'Image Box Style 6' ],
				'image-box-7' => [ 'pro' => true, 'title' => 'Image Box Style 7' ],
				'image-box-8' => [ 'pro' => true, 'title' => 'Image Box Style 8' ],
				'image-grid-1' => [ 'pro' => true, 'title' => 'Fit Row Grid' ],		
				'image-grid-2' => [ 'pro' => true, 'title' => 'Masonry Trigger' ],	
				'image-grid-3' => [ 'pro' => true, 'title' => 'Even Grid' ],	
				'image-grid-4' => [ 'pro' => true, 'title' => 'Full Screen Masonry Grid' ],
				'image-grid-5' => [ 'pro' => true, 'title' => 'Image Grid With Slider' ],	
				'image-grid-6' => [ 'pro' => true, 'title' => 'Full Screen Slider' ],
				'modal-popup-1' => [ 'pro' => true, 'title' => 'Button Trigger' ],	
				'modal-popup-2' => [ 'pro' => true, 'title' => 'Icon Trigger' ],	
				'modal-popup-3' => [ 'pro' => true, 'title' => 'Image Trigger' ],
				'pricing-table-1' => [ 'pro' => true, 'title' => 'Basic Pricing Table' ],		
				'pricing-table-2' => [ 'pro' => true, 'title' => 'Pricing Table With Border' ],	
				'pricing-table-3' => [ 'pro' => true, 'title' => 'Pricing Table With Image' ],	
				'pricing-table-4' => [ 'pro' => true, 'title' => 'Trending Pricing Table' ],
				'pricing-table-5' => [ 'pro' => true, 'title' => 'Pricing Table With Gradient Background' ],	
				'pricing-table-6' => [ 'pro' => true, 'title' => 'Pricing Table With Ribbon' ],	
				'pricing-table-7' => [ 'pro' => true, 'title' => 'Classic Pricing Table' ],	
				'offcanvas-1' => [ 'pro' => true, 'title' => 'Left & Right Slide' ],	
				'offcanvas-2' => [ 'pro' => true, 'title' => 'Full cover canvas' ],	
				'offcanvas-3' => [ 'pro' => true, 'title' => 'Left & Right Push' ],
				'contact-form-4' => [ 'pro' => true, 'title' => 'Contact Form 4' ],
				'contact-form-5' => [ 'pro' => true, 'title' => 'Contact Form 5' ],
				'content-carousel-1' => [ 'pro' => true, 'title' => 'Content Carousel Style 1' ],
				'content-carousel-2' => [ 'pro' => false, 'title' => 'Content Carousel Style 2' ],
				'content-carousel-3' => [ 'pro' => false, 'title' => 'Content Carousel Style 3' ],				
				'content-carousel-4' => [ 'pro' => true, 'title' => 'Content Carousel Style 4' ],	
				'post-1' => [ 'pro' => false, 'title' => 'Default Post Grid' ],	
				'post-2' => [ 'pro' => false, 'title' => '2 Columns Post Grid' ],	
				'post-3' => [ 'pro' => true, 'title' => 'Slider Post' ],
				'post-4' => [ 'pro' => true, 'title' => 'Post In List Type' ],	
				'tab-1' => [ 'pro' => false, 'title' => 'Default Tab' ],	
				'tab-2' => [ 'pro' => false, 'title' => 'Tab Title with Icon' ],	
				'tab-3' => [ 'pro' => true, 'title' => 'Modern Tab' ],
				'tab-4' => [ 'pro' => true, 'title' => 'Vertical Tab with Icon' ],
				'tab-5' => [ 'pro' => true, 'title' => 'Tab with Templates' ],	
				'timeline-1' => [ 'pro' => true, 'title' => 'Timeline Style 1' ],	
				'timeline-2' => [ 'pro' => true, 'title' => 'Timeline Style 2' ],	
				'timeline-3' => [ 'pro' => true, 'title' => 'Timeline Style 3' ],
				'timeline-4' => [ 'pro' => true, 'title' => 'Timeline Style 4' ],	
				'timeline-slider-1' => [ 'pro' => true, 'title' => 'Timeline Slider Style 1' ],	
				'timeline-slider-2' => [ 'pro' => true, 'title' => 'Timeline Slider Style 2' ],	
				'timeline-slider-3' => [ 'pro' => true, 'title' => 'Timeline Slider Style 3' ],
				'tooltip-1' => [ 'pro' => true, 'title' => 'Tooltip for Team Member' ],	
				'tooltip-2' => [ 'pro' => true, 'title' => 'Tooltip with Button Trigger' ],	
				'tooltip-3' => [ 'pro' => true, 'title' => 'Tooltip with Icon Trigger' ],
				'video-popup-1' => [ 'pro' => true, 'title' => 'Video Popup Style 1' ],	
				'video-popup-2' => [ 'pro' => true, 'title' => 'Video Popup Style 2' ],	
				'video-popup-3' => [ 'pro' => true, 'title' => 'Video Popup Style 3' ],
			],
			
			'pages' => [
				'agency-home-1' => [ 'pro' => true, 'title' => 'Agency Home 1' ],				
				'agency-home-2' => [ 'pro' => true, 'title' => 'Agency Home 2' ],				
				'agency-home-3' => [ 'pro' => true, 'title' => 'Agency Home 3' ],
				'fashion-home-1' => [ 'pro' => true, 'title' => 'Fashion Home 1' ],
				'fashion-home-2' => [ 'pro' => true, 'title' => 'Fashion Home 2' ],
				'garden-home' => [ 'pro' => true, 'title' => 'Garden Home' ],
				'organic-home' => [ 'pro' => true, 'title' => 'Organic Home' ],
				'gym-home' => [ 'pro' => true, 'title' => 'Gym Home' ],
				'education-home' => [ 'pro' => true, 'title' => 'Education Home' ],
				'restaurant-home' => [ 'pro' => true, 'title' => 'Restaurant Home' ],
				'restaurant-home-2' => [ 'pro' => true, 'title' => 'Restaurant Home 2' ],
				'medical-home' => [ 'pro' => true, 'title' => 'Medical Home' ],
				'medical-home-2' => [ 'pro' => true, 'title' => 'Medical Home 2' ],
				'medical-home-3' => [ 'pro' => true, 'title' => 'Medical Home 3' ],
				'bike-home' => [ 'pro' => true, 'title' => 'Bike Home' ],
				'automobile-home' => [ 'pro' => true, 'title' => 'Automobile Home' ],
				'car-home' => [ 'pro' => true, 'title' => 'Car Home' ],
				'spa-home' => [ 'pro' => true, 'title' => 'Spa Home' ],
				'construction-home' => [ 'pro' => true, 'title' => 'Construction Home' ],
				'digital-marketing-home' => [ 'pro' => true, 'title' => 'Digital Marketing Home' ],
				'digital-marketing-2-home' => [ 'pro' => true, 'title' => 'Digital Marketing Home 2' ],
				'charity-home' => [ 'pro' => true, 'title' => 'Charity Home' ],
				'wedding-home' => [ 'pro' => true, 'title' => 'Wedding Home' ],				
				'about-us-1' => [ 'pro' => true, 'title' => 'About Us Demo 1' ],
				'about-us-2' => [ 'pro' => true, 'title' => 'About Us Demo 2' ],
				'about-us-3' => [ 'pro' => true, 'title' => 'About Us Demo 3' ],
				'about-us-4' => [ 'pro' => true, 'title' => 'About Us Demo 4' ],
				'about-us-5' => [ 'pro' => true, 'title' => 'About Us Demo 5' ],
				'theme-park-home' => [ 'pro' => true, 'title' => 'Theme Park Home' ],
				'kids-home' => [ 'pro' => true, 'title' => 'Kids Home' ],
				'magazine-home' => [ 'pro' => true, 'title' => 'Magazine Home' ],
				'travel-agency-home' => [ 'pro' => true, 'title' => 'Travel Agency Home' ],
				'education-home-2' => [ 'pro' => true, 'title' => 'Education Home 2' ],
				'accountant-home' => [ 'pro' => true, 'title' => 'Accountant Home' ],
			],
			
			'widgets' => [
				'accordion' => [
					'accordion-style-1' => [ 'pro' => false, 'title' => 'Default Accordion' ],
					'accordion-style-2' => [ 'pro' => false, 'title' => 'Classic Accordion' ],
					'accordion-style-3' => [ 'pro' => false, 'title' => 'Modern Accordion' ],
					'accordion-style-4' => [ 'pro' => false, 'title' => 'Classic Pro Accordion' ],
					'accordion-style-5' => [ 'pro' => true, 'title' => 'Rounded Color Accordion' ],
					'accordion-style-6' => [ 'pro' => true, 'title' => 'Floating Point Accordion' ],
					'accordion-style-7' => [ 'pro' => true, 'title' => 'Rounded Background Accordion' ],
					'accordion-style-8' => [ 'pro' => true, 'title' => 'Rounded Outline Accordion' ],
					'accordion-style-9' => [ 'pro' => true, 'title' => 'Boxshadow Accordion' ],
					'accordion-style-10' => [ 'pro' => true, 'title' => 'Gradient Background Accordion' ],
				],
				'before-after-image' => [			
					'before-after-image-1' => [ 'pro' => true, 'title' => 'Horizondal and Verticle Style'	 ],
					'before-after-image-2' => [ 'pro' => true, 'title' => 'Hover Slide Move' ],
					'before-after-image-3' => [ 'pro' => true, 'title' => 'Simple Photo Editor' ],	
					'before-after-image-4' => [ 'pro' => true, 'title' => 'Before After With Overlay' ],
					'before-after-image-5' => [ 'pro' => true, 'title' => 'Full With Verticle Style' ],
				],
				'button' => [			
					'button-style-1' => [ 'pro' => false, 'title' => 'Extra Large Button' ],
					'button-style-2' => [ 'pro' => false, 'title' => 'Large Button' ],		
					'button-style-3' => [ 'pro' => false, 'title' => 'Medium Button' ],		
					'button-style-4' => [ 'pro' => false, 'title' => 'Small Button' ],		
					'button-style-5' => [ 'pro' => false, 'title' => 'Extra Small Button' ],		
					'button-style-6' => [ 'pro' => false, 'title' => 'Rounded Extra Large Button' ],		
					'button-style-7' => [ 'pro' => false, 'title' => 'Rounded Large Button' ],		
					'button-style-8' => [ 'pro' => false, 'title' => 'Rounded Medium Button' ],		
					'button-style-9' => [ 'pro' => false, 'title' => 'Rounded Small Button' ],		
					'button-style-10' => [ 'pro' => false, 'title' => 'Rounded Extra Small Button' ],
					'button-style-11' => [ 'pro' => false, 'title' => 'Extra Large Button With Icon' ],
					'button-style-12' => [ 'pro' => false, 'title' => 'Large Button With Icon' ],
					'button-style-13' => [ 'pro' => false, 'title' => 'Medium Button With Icon' ],
					'button-style-14' => [ 'pro' => false, 'title' => 'Small Button With Icon' ],
					'button-style-15' => [ 'pro' => false, 'title' => 'Extra Small Button With Icon' ],
					'button-style-16' => [ 'pro' => false, 'title' => 'Creative Button Types' ],
				],
				'contact-form' => [			
					'contact-form-1' => [ 'pro' => false, 'title' => 'Contact Form 1' ],	
					'contact-form-2' => [ 'pro' => false, 'title' => 'Contact Form 2' ],	
					'contact-form-3' => [ 'pro' => false, 'title' => 'Contact Form 3' ],
					'contact-form-4' => [ 'pro' => true, 'title' => 'Contact Form 4' ],
					'contact-form-5' => [ 'pro' => true, 'title' => 'Contact Form 5' ],
				],
				'chart' => [			
					'chart-style-1' => [ 'pro' => true, 'title' => 'Bar Chart' ],
					'chart-style-2' => [ 'pro' => false, 'title' => 'Pie Chart And Doughnut Chart' ],
					'chart-style-3' => [ 'pro' => true, 'title' => 'Line Chart' ],				
				],
				'circle progress' => [			
					'circle-progress-style-1' => [ 'pro' => false, 'title' => 'Colorful Circle Progress' ],
					'circle-progress-style-2' => [ 'pro' => true, 'title' => 'Gradient Circle Progress' ],
					'circle-progress-style-3' => [ 'pro' => true, 'title' => 'Circle Progress With Background' ],					
				],
				'content-carousel' => [			
					'content-carousel-1' => [ 'pro' => true, 'title' => 'Content Carousel Style 1' ],
					'content-carousel-2' => [ 'pro' => false, 'title' => 'Content Carousel Style 2' ],
					'content-carousel-3' => [ 'pro' => false, 'title' => 'Content Carousel Style 3' ],				
					'content-carousel-4' => [ 'pro' => true, 'title' => 'Content Carousel Style 4' ],				
				],
				'content-switcher' => [			
					'content-switcher-1' => [ 'pro' => true, 'title' => 'Content Switcher With Icon' ],
					'content-switcher-2' => [ 'pro' => true, 'title' => 'Content Switcher Without Icon' ],
					'content-switcher-3' => [ 'pro' => false, 'title' => 'Default Content Switcher' ],			
				],
				'counter' => [			
					'counter-style-1' => [ 'pro' => false, 'title' => 'Counter 1' ],	
					'counter-style-2' => [ 'pro' => true, 'title' => 'Counter 2' ],	
					'counter-style-3' => [ 'pro' => true, 'title' => 'Counter 3' ],	
					'counter-style-4' => [ 'pro' => false, 'title' => 'Counter 4' ],	
					'counter-style-5' => [ 'pro' => true, 'title' => 'Counter 5' ],	
				],
				'data-table' => [			
					'data-table-1' => [ 'pro' => false, 'title' => 'Data Table Style 1' ],
					'data-table-2' => [ 'pro' => true, 'title' => 'Data Table Style 2' ],
					'data-table-3' => [ 'pro' => true, 'title' => 'Data Table Style 3' ],				
					'data-table-4' => [ 'pro' => true, 'title' => 'Data Table Style 4' ],				
				],
				'day-counter' => [			
					'day-counter-style-1' => [ 'pro' => true, 'title' => 'Day Counter 1' ],	
					'day-counter-style-2' => [ 'pro' => true, 'title' => 'Day Counter 2'  ],	
					'day-counter-style-3' => [ 'pro' => true, 'title' => 'Day Counter 3' ],	
					'day-counter-style-4' => [ 'pro' => true, 'title' => 'Day Counter 4' ],	
					'day-counter-style-5' => [ 'pro' => true, 'title' => 'Day Counter 5' ],	
				],
				'fancy-text' => [			
					'fancy-text-1' => [ 'pro' => false, 'title' => 'Fancy Text 1' ],	
					'fancy-text-2' => [ 'pro' => true, 'title' => 'Fancy Text 2' ],	
					'fancy-text-3' => [ 'pro' => true, 'title' => 'Fancy Text 3' ],	
					'fancy-text-4' => [ 'pro' => true, 'title' => 'Fancy Text 4' ],		
					'fancy-text-5' => [ 'pro' => true, 'title' => 'Fancy Text 5' ],	
					'fancy-text-6' => [ 'pro' => false, 'title' => 'Fancy Text 6' ],	
					'fancy-text-7' => [ 'pro' => false, 'title' => 'Fancy Text 7' ],		
				],
				'feature-box' => [			
					'feature-box-1' => [ 'pro' => false, 'title' => 'Trending Feature Box' ],	
					'feature-box-2' => [ 'pro' => false, 'title' => 'Modern Feature Box' ],
					'feature-box-3' => [ 'pro' => false, 'title' => 'Feature Box With Image' ],	
					'feature-box-4' => [ 'pro' => true, 'title' => 'Grid Style Feature Box' ],		
					'feature-box-5' => [ 'pro' => true, 'title' => 'Gradient Background Feature Box' ],	
					'feature-box-6' => [ 'pro' => true, 'title' => 'Creative Feature Box' ],		
				],
				'flip-box' => [			
					'flip-box-1' => [ 'pro' => true, 'title' => 'Flip Box with Background' ],	
					'flip-box-2' => [ 'pro' => true, 'title' => '3D Flip Box' ],	
					'flip-box-3' => [ 'pro' => true, 'title' => 'Multi Effects Flip Boxes' ],	
					'flip-box-4' => [ 'pro' => true, 'title' => 'Flip Box with Image' ],
				],
				'icon-box' => [			
					'icon-box-1' => [ 'pro' => false, 'title' => 'Icon Box with Border' ],	
					'icon-box-2' => [ 'pro' => false, 'title' => 'Icon Box with Background' ],	
					'icon-box-3' => [ 'pro' => false, 'title' => 'Classic Icon Box' ],	
					'icon-box-4' => [ 'pro' => true, 'title' => 'Icon Box with Gradient Background' ],
					'icon-box-5' => [ 'pro' => true, 'title' => 'Modern Icon Box' ],
					'icon-box-6' => [ 'pro' => false, 'title' => 'Trending Icon Box' ],
					'icon-box-7' => [ 'pro' => true, 'title' => 'Icon Box With Background Image' ],
					'icon-box-8' => [ 'pro' => true, 'title' => 'Advance Icon Box' ],
				],
				'icon-list' => [			
					'icon-list-1' => [ 'pro' => false, 'title' => 'Icon List Style 1' ],	
					'icon-list-2' => [ 'pro' => false, 'title' => 'Icon List Style 2' ],	
					'icon-list-3' => [ 'pro' => false, 'title' => 'Icon List Style 3' ],
					'icon-list-4' => [ 'pro' => false, 'title' => 'Inline Icon List Style' ],
				],
				'image-box' => [			
					'image-box-1' => [ 'pro' => true, 'title' => 'Image Box Style 1' ],	
					'image-box-2' => [ 'pro' => true, 'title' => 'Image Box Style 2' ],	
					'image-box-3' => [ 'pro' => true, 'title' => 'Image Box Style 3' ],	
					'image-box-4' => [ 'pro' => true, 'title' => 'Image Box Style 4' ],
					'image-box-5' => [ 'pro' => true, 'title' => 'Image Box Style 5' ],
					'image-box-6' => [ 'pro' => true, 'title' => 'Image Box Style 6' ],
					'image-box-7' => [ 'pro' => true, 'title' => 'Image Box Style 7' ],
					'image-box-8' => [ 'pro' => true, 'title' => 'Image Box Style 8' ],
				],
				'image-grid' => [			
					'image-grid-1' => [ 'pro' => true, 'title' => 'Fit Row Grid' ],		
					'image-grid-2' => [ 'pro' => true, 'title' => 'Masonry Grid' ],	
					'image-grid-3' => [ 'pro' => true, 'title' => 'Even Grid' ],	
					'image-grid-4' => [ 'pro' => true, 'title' => 'Full Screen Masonry Grid' ],
					'image-grid-5' => [ 'pro' => true, 'title' => 'Image Grid With Slider' ],	
					'image-grid-6' => [ 'pro' => true, 'title' => 'Full Screen Slider' ],
				],	
				'post' => [			
					'post-1' => [ 'pro' => false, 'title' => 'Default Post Grid' ],	
					'post-2' => [ 'pro' => false, 'title' => '2 Columns Post Grid' ],	
					'post-3' => [ 'pro' => true, 'title' => 'Slider Post' ],
					'post-4' => [ 'pro' => true, 'title' => 'Post In List Type' ],				
				],			
				'pricing-table' => [			
					'pricing-table-1' => [ 'pro' => true, 'title' => 'Basic Pricing Table' ],		
					'pricing-table-2' => [ 'pro' => true, 'title' => 'Pricing Table With Border' ],	
					'pricing-table-3' => [ 'pro' => true, 'title' => 'Pricing Table With Image' ],	
					'pricing-table-4' => [ 'pro' => true, 'title' => 'Trending Pricing Table' ],
					'pricing-table-5' => [ 'pro' => true, 'title' => 'Pricing Table With Gradient Background' ],	
					'pricing-table-6' => [ 'pro' => true, 'title' => 'Pricing Table With Ribbon' ],	
					'pricing-table-7' => [ 'pro' => true, 'title' => 'Classic Pricing Table' ],
				],
				'modal-popup' => [			
					'modal-popup-1' => [ 'pro' => true, 'title' => 'Button Trigger' ],	
					'modal-popup-2' => [ 'pro' => true, 'title' => 'Icon Trigger' ],	
					'modal-popup-3' => [ 'pro' => true, 'title' => 'Image Trigger' ],
				],
				'offcanvas' => [			
					'offcanvas-1' => [ 'pro' => true, 'title' => 'Left & Right Slide' ],	
					'offcanvas-2' => [ 'pro' => true, 'title' => 'Full cover canvas' ],	
					'offcanvas-3' => [ 'pro' => true, 'title' => 'Left & Right Push' ],
				],
				'section-title' => [			
					'section-title-1' => [ 'pro' => false, 'title' => 'Dual Color' ],	
					'section-title-2' => [ 'pro' => false, 'title' => 'Heading with Icon' ],	
					'section-title-3' => [ 'pro' => true, 'title' => 'Heading with Image' ],	
					'section-title-4' => [ 'pro' => false, 'title' => 'Heading with Divider' ],	
					'section-title-5' => [ 'pro' => true, 'title' => 'Heading with  Button' ],
				],
				'social-icons' => [			
					'social-icons-1' => [ 'pro' => false, 'title' => 'Social Icons Style 1' ],	
					'social-icons-2' => [ 'pro' => false, 'title' => 'Social Icons Style 2' ],	
					'social-icons-3' => [ 'pro' => false, 'title' => 'Social Icons Style 3' ],	
					'social-icons-4' => [ 'pro' => false, 'title' => 'Social Icons Style 4' ],
				],	
				'tab' => [			
					'tab-1' => [ 'pro' => false, 'title' => 'Default Tab' ],	
					'tab-2' => [ 'pro' => false, 'title' => 'Tab Title with Icon' ],	
					'tab-3' => [ 'pro' => true, 'title' => 'Modern Tab' ],
					'tab-4' => [ 'pro' => true, 'title' => 'Vertical Tab with Icon' ],
					'tab-5' => [ 'pro' => true, 'title' => 'Tab with Templates' ],
				],		
				'timeline' => [			
					'timeline-1' => [ 'pro' => true, 'title' => 'Timeline Style 1' ],	
					'timeline-2' => [ 'pro' => true, 'title' => 'Timeline Style 2' ],	
					'timeline-3' => [ 'pro' => true, 'title' => 'Timeline Style 3' ],
					'timeline-4' => [ 'pro' => true, 'title' => 'Timeline Style 4' ],
				],							
				'timeline-slider' => [			
					'timeline-slider-1' => [ 'pro' => true, 'title' => 'Timeline Slider Style 1' ],	
					'timeline-slider-2' => [ 'pro' => true, 'title' => 'Timeline Slider Style 2' ],	
					'timeline-slider-3' => [ 'pro' => true, 'title' => 'Timeline Slider Style 3' ],
				],						
				'toggle-content' => [			
					'toggle-content-1' => [ 'pro' => false, 'title' => 'Toggle Content Style 1' ],	
					'toggle-content-2' => [ 'pro' => false, 'title' => 'Toggle Content Style 2' ],	
					'toggle-content-3' => [ 'pro' => false, 'title' => 'Toggle Content Style 3' ],
				],						
				'tooltip' => [			
					'tooltip-1' => [ 'pro' => true, 'title' => 'Tooltip for Team Member' ],	
					'tooltip-2' => [ 'pro' => true, 'title' => 'Tooltip with Button Trigger' ],	
					'tooltip-3' => [ 'pro' => true, 'title' => 'Tooltip with Icon Trigger' ],
				],						
				'video-popup' => [			
					'video-popup-1' => [ 'pro' => true, 'title' => 'Video Popup Style 1' ],	
					'video-popup-2' => [ 'pro' => true, 'title' => 'Video Popup Style 2' ],	
					'video-popup-3' => [ 'pro' => true, 'title' => 'Video Popup Style 3' ],
				],	
			],
		];
		
		return $templates;
		
	}
	
	function filter_templates( $part, $templates, $key ) {
		
		$input = array_keys( $templates );
		$filtered_templates = preg_filter('/'. strtolower( $key ) .'/', '$0', $input );
		$f_templates = [];
		if( !empty( $filtered_templates ) ) {
			foreach( $filtered_templates as $t ) $f_templates[$t] = $templates[$t];
		}
		return $f_templates;
		
	}
	
	function render_templates( $part ) {
		
		$part = !empty( $part ) ? esc_attr( $part ) : 'sections';
		
		$templates = $this->all_templates();
		
		$filtered_templates = isset( $templates[$part] ) ? $templates[$part] : $templates['sections'];
		
		return $filtered_templates;
		
	}
	
	function make_array_to_html( $part, $n ) {
		
		$html = '<div class="ai-templates-wrap">';
		
		foreach( $n as $t => $template ) {
			$is_pro = $template['pro'] && $template['pro'] ? true : false;
			$class_names = $is_pro ? ' pro-template-item' : '';
			$html .= '<div class="ai-template-item inc-animated'. esc_attr( $class_names ) .'"><a href="#"><img src="https://aiaddons.ai/ai-import/images/'. $part .'/xs/'. $t .'.jpg" alt="'. $t .'" /></a><div class="ai-template-overlay" data-template="'. esc_attr( $t ) .'">';
			$html .= '<a href="#" class="ai-template-zoom" title="'. esc_attr__( 'Zoom', 'ai-addons' ) .'" data-lg="https://aiaddons.ai/ai-import/images/'. $part .'/lg/'. $t .'.jpg"><i class="eicon-zoom-in-bold"></i></a>';
			$html .= !$is_pro ? '<a href="#" class="ai-template-import" title="'. esc_attr__( 'Import', 'ai-addons' ) .'" data-template="'. esc_attr( $t ) .'"><i class="eicon-download-bold"></i></a>' : '';
			$html .= '</div><span class="template-title">'. esc_html( $template['title'] ) .'</span>';			
			$html .= $is_pro ? '<span class="template-pro-badge">'. esc_html__( 'Pro', 'ai-addons' ) .'</span>' : '';
			$html .= '</div>';
		}
		
		$html .= '</div>';
		
		return $html;
		
	}
	
	function render_aiea_templates_library() {
	  
		if ( isset( $_POST['nonce'] ) && !wp_verify_nonce( $_POST['nonce'], 'ai-library(*&&%^#' ) ) wp_die ( esc_html__( 'Busted', 'ai-addons' ) );
		
		$part = isset( $_POST['part'] ) ? sanitize_text_field( $_POST['part'] ) : 'sections';
		$search = isset( $_POST['search'] ) ? sanitize_text_field( $_POST['search'] ) : '';
		
		$templates = $this->render_templates( $part );
		
		$widget_templates = []; $widget_select = '';
		if( $part == 'widgets' ) {
			
			$selected_widget = isset( $_POST['widget'] ) && $_POST['widget'] != 'all' ? sanitize_text_field( $_POST['widget'] ) : '';
			
			$widget_select = '<div class="ai-widget-select-wrap"><select class="ai-template-widget"><option value="all">'. esc_html__( 'All', 'ai-addons' ) .'</option>';
			foreach( $templates as $p => $c ) {
				$widget_select .= '<option value="'. esc_attr( $p ) .'" '. selected( $selected_widget, $p, false ) .'>'. esc_html( ucwords( str_replace( "-", " ", $p ) ) ) .'</option>';
				if( $selected_widget == '' ) {
					$widget_templates = array_merge( $widget_templates, $c );
				} else {
					$widget_templates = $templates[$selected_widget];
				}
			}
			$templates = $widget_templates;
			
			$widget_select .= '</select></div>';
		}
		
		$search_stat = false;
		if( !empty( $search ) ) {
			$templates = $this->filter_templates( $part, $templates, $search );
			$search_stat = true;
		}
		
		if( !empty( $templates ) ) {
			$templates_out = $this->make_array_to_html( $part, $templates );
		}
		
		$output = '<div class="ai-templates-body">';
		$output .= $this->render_toolbar( $part );
		$output .= $templates_out;
		$output .= '</div>';
		
		wp_send_json( array( 'library_html' => $output, 'search_stat' => $search_stat, 'widget_select' => $widget_select, 'test' => $widget_templates ) );
		
	}
		
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

} AIEA_Templates_Library::instance();