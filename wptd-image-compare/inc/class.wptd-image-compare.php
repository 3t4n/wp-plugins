<?php
/**
 * WPTD Image Compare Shortcode Class
 * The main class that initiates and runs the plugin. 
 * @since 1.0.0
 */
final class WPTD_Image_Compare_Shortcode {
	
	/**
	 * Instance
	 * @since 1.0.0
	 * @access private
	 * @static
	 * @var Shortcode The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Constructor
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		
		$this->init();

	}
	
	public function init() {
			
		// Create Catgeory
		$this->create_wptd_elementor_category();
		
		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'editor_enqueue_scripts' ] );
		
		// Register Elementor Widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		
		//Register Widget Styles
		add_action( 'elementor/frontend/after_register_styles', array( $this, 'widget_styles' ) );
		
		// Register Widget Scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
		
	}
	
	/**
     * Register plugin shortcode category
	 * @since 2.6.8
	 * @access public
	 * @return void
	 */
	public function create_wptd_elementor_category() {
	   \Elementor\Plugin::instance()->elements_manager->add_category(
			'wptd',
			array(
				'title' => esc_html__( 'WPTD', 'wptd-image-compare' )
			),
		1);
	}
	
	public function editor_enqueue_scripts(){
		wp_enqueue_style( 'wptdimgc-icons', WPTD_IMGC_URL .'assets/css/wptdimgc-icons.css', array(), '1.0', 'all' );
	}
	
	/**
	 * Widget Styles
	 * Include widgets styles
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_styles() {
		wp_enqueue_style( 'wptdimgc', WPTD_IMGC_URL .'assets/css/wptdimgc.css', array(), '1.0', 'all' );
	}
	
	/**
	 * Widget Scripts
	 * Include widgets scripts
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_scripts() {
		wp_register_script( 'jquery-event-move', WPTD_IMGC_URL . 'assets/js/jquery.event.move.js',  array( 'jquery' ), '2.0.0', true );
		wp_register_script( 'jquery-wptdimgc', WPTD_IMGC_URL . 'assets/js/jquery.wptdimgc.js',  array( 'jquery' ), '1.0', true );
		wp_register_script( 'wptd-image-compare', WPTD_IMGC_URL . 'assets/js/wptd-image-compare.js',  array( 'jquery' ), '1.0', true );
	}
	
	/**
	 * Init Widgets
	 * Include widgets files and register them
	 * @since 1.0.0
	 * @access public
	 */
	public function init_widgets() {
		// Connect Widget File
		require_once( WPTD_IMGC_DIR . 'widgets/image-compare.php' );
		
		//Call Widget Class
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \WPTD_Image_Compare_Widget() );
	}
	
	public static function wptd_get_attachment_image_html( $settings, $image_size_key = 'image', $image_key = null, $cur_class ) {
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
	
	/**
	 * Creates and returns an instance of the class
	 * @since 2.6.8
	 * @access public
	 * return object
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	
} 
WPTD_Image_Compare_Shortcode::instance();