<?php
/**
 * @package pcb
*/

/**
 * 
 * Plugin Name: Packerland Custom Blocks
 * Description: Updates Gutenberg with extra features!
 * Version: 1.1.0
 * Author: PackerlandWebsites
 * Author URI: https://www.packerlandwebsites.com
 * License: GPLv2 or later
 * Test Domain: pcb
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class PcbClass{ // class wrapper

    function __construct() {
        
        add_filter( 'block_categories_all', array( $this,'PcbBlockCategories'), 10, 2 );
        add_action('init', array($this, 'PcbLoadBlocks') );     
        add_action('admin_head', array($this, 'PcbGutenbergEditorStyles'));
		add_action('wp_head', array($this,'PcbHeaderCode'));
		add_action( 'widgets_init', array($this,'PcbLoadWidget') );
   	
    }
	
	function PcbHeaderCode(){// Puts Code Into Header
		?>
		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
		<?php
	}

    function PcbLoadBlocks() { // load blocks
    
        wp_register_script('advanced-paragraph-js', plugins_url( 'blocks/advanced-paragraph.js', __FILE__ ) , array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-data', 'wp-editor', 'wp-plugins', 'wp-compose', 'jquery'), rand(100,999));
    
        register_block_type('pcb/advanced-paragraph', array (
            'editor_script' => 'advanced-paragraph-js',
            'render_callback' => [$this, 'PcbCustomHtmlRender']
        ));
		
		wp_register_script('advanced-facebook-feed-js', plugins_url( 'blocks/advanced-facebook-feed.js', __FILE__ ) , array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-data', 'wp-editor', 'wp-plugins', 'wp-compose','jquery'), rand(100,999));
    
        register_block_type('pcb/advanced-facebook-feed', array (
            'editor_script' => 'advanced-facebook-feed-js',
            'render_callback' => [$this, 'PcbCustomHtmlRender']
        ));
        
    }
    
    function PcbCustomHtmlRender( $attributes, $content ) { // make a render that allows html code in the output
        return html_entity_decode($content);
    } 
    
    function PcbBlockCategories( $categories, $post ) { // create our custom category

        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'pcb-category',
                    'title' => __( 'Packerland Websites' ),
                    //'icon'  => 'wordpress', 
                ),
            )
        );
    }
   
    function PcbGutenbergEditorStyles() { // admin styles

        echo '<style>
          body.gutenberg-editor-page .editor-post-title__block, body.gutenberg-editor-page .editor-default-block-appender, body.gutenberg-editor-page .editor-block-list__block {
              max-width: none !important;
          }
          .block-editor__container .wp-block {
              max-width: none !important;
          }
		  .pcb-admin-form__input{
		  	  background: white;
			  padding: 5px;
			  border: 1px black solid;
			  min-width: 400px;
		  }
		  .pcb-admin_block_menu_input {
			background: white;
			padding: 5px;
			border: 1px #8d96a0 solid;
			min-width: 230px;
			border-raduis: 5px;
		}
		
		.pcb-floating-input{
			background: #366930;
		}
		
		
        </style>';

      }  
	
	// Custom Faceook Feed Widget
	
	function PcbLoadWidget() {
		register_widget('pcbFacebookWidget' );
	}
	
}

if (class_exists('PcbClass')){
    $PcbClass = new PcbClass();
}

class pcbFacebookWidget extends WP_Widget {

	function __construct() {

		parent::__construct(

			// Base ID
			'PcbFacebookWidgetId', 

			// Widget name 
			__('PCB Facebook Feed', ''), 

			// Widget description
			array( 'description' => __( 'Add Your Facebook Feed In A Widget', '' ), ) 
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {

		if ( array_key_exists( 'before_widget', $args ) ) {
			echo $args['before_widget'];
		}
		
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}else{
			echo $args['before_title'] . apply_filters( 'widget_title', 'PCB Facebook Feed' ) . $args['after_title'];
		}

		$tab_output = array();
		
		if ( ! empty( $instance['timeline_tab'] ) ) {
			if ( $instance['timeline_tab'] == 1 ) {
				array_push( $tab_output, 'timeline' );
			}
		}else{
			$instance['timeline_tab'] = 1;
			array_push( $tab_output, 'timeline' );
		}
		
		if ( ! empty( $instance['events_tab'] ) ) {
			if ( $instance['events_tab'] == 1 ) {
				array_push( $tab_output, 'events' );
			}
		}
		
		if ( ! empty( $instance['messages_tab'] ) ) {
			if ( $instance['messages_tab'] == 1 ) {
				array_push( $tab_output, 'messages' );
			}
		}
		
		if(empty($instance['align'])){
			$instance['align'] = 'left';
		}
		
		if(empty($instance['facebook_url'])){
			$instance['facebook_url'] = 'https://www.facebook.com/facebook';
		}
		
		if(empty($instance['width'])){
			$instance['width'] = '340';
		}
		
		if(empty($instance['height'])){
			$instance['height'] = '500';
		}
		
		if(empty($instance['show_cover'])){
			$instance['show_cover'] = '0';
		}
		
		if(empty($instance['show_facepile'])){
			$instance['show_facepile'] = '1';
		}
		
		if(empty($instance['show_cta'])){
			$instance['show_cta'] = '0';
		}
		
		if(empty($instance['small_header'])){
			$instance['small_header'] = '0';
		}
		
		if(empty($instance['adapt_container_width'])){
			$instance['adapt_container_width'] = '0';
		}

		$output = '';

		$output .= '<div id="pcb-facebookfeed" style="text-align:' . esc_attr( $instance['align'] ) . ';">';
		$output .= '<div class="fb-page" ';
		if ( false !== strpos( $instance['facebook_url'], 'facebook.com' ) ) {
			$output .= 'data-href="' . esc_attr( $instance['facebook_url'] ) . '" ';
		} else {
			$output .= 'data-href="https://facebook.com/' . esc_attr( $instance['facebook_url'] ) . '" ';
		}
		$output .= 'data-width="' . esc_attr( $instance['width'] ) . '" ';
		$output .= 'data-height="' . esc_attr( $instance['height'] ) . '" ';
		$output .= 'data-tabs="' . implode( ', ', $tab_output ) . '" ';
		$output .= 'data-hide-cover="' . esc_attr( $instance['show_cover'] ) . '" ';
		$output .= 'data-show-facepile="' . esc_attr( $instance['show_facepile'] ) . '" ';
		$output .= 'data-hide-cta="' . esc_attr( $instance['show_cta'] ) . '" ';
		$output .= 'data-small-header="' . esc_attr( $instance['small_header'] ) . '" ';
		$output .= 'data-adapt-container-width="' . esc_attr( $instance['adapt_container_width'] ) . '">';
		$output .= '</div>';

		$output .= '</div>';

		echo $output;

		if ( array_key_exists( 'after_widget', $args ) ) {
			echo $args['after_widget'];
		}

	}

	// Widget Backend 
	public function form( $instance ) {


		$defaults = $this->defaults();

		$instance = wp_parse_args( (array) $instance, $defaults );

		$title = strip_tags( $instance['title'] );

		$facebookUrl = strip_tags( $instance['facebook_url'] );

		$width = range( 280, 500, 20 );

		$height = range( 125, 800, 25 );

		$show_cover = array( 'true' => 'Yes', 'false' => 'No' );

		$show_facepile = array( 'true' => 'Yes', 'false' => 'No' );

		$align = array( 'initial' => 'None', 'left' => 'Left', 'center' => 'Center', 'right' => 'Right' );

		$timeline_tab = array( 'true' => 'Yes', 'false' => 'No' );

		$events_tab = array( 'true' => 'Yes', 'false' => 'No' );

		$messages_tab = array( 'true' => 'Yes', 'false' => 'No' );

		$show_cta = array( 'true' => 'Yes', 'false' => 'No' );

		$small_header = array( 'true' => 'Yes', 'false' => 'No' );

		$adapt_container_width = array( 'true' => 'Yes', 'false' => 'No' );

		$reverse_boolean = array( 0 => 'Yes', 1 => 'No' );

		$boolean = array( 1 => 'Yes', 0 => 'No' );

		?>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'pcb' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>"
			       value="<?php echo esc_attr( $instance['title'] ); ?>"/>

			<label
				for="<?php echo $this->get_field_id( 'facebook_url' ); ?>"><?php _e( 'Facebook Page URL:', 'pcb' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'facebook_url' ); ?>"
			       name="<?php echo $this->get_field_name( 'facebook_url' ); ?>"
			       value="<?php echo esc_attr( $instance['facebook_url'] ); ?>"/>

			<label
				for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Width:', 'pcb' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>"
			        name="<?php echo $this->get_field_name( 'width' ); ?>">
				<?php foreach ( $width as $val ): ?>
					<option
						value="<?php echo esc_attr( $val ); ?>" <?php selected( $instance['width'], $val ); ?>><?php echo esc_html( $val ); ?></option>
				<?php endforeach; ?>
			</select>

			<label
				for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Height:', 'pcb' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>"
			        name="<?php echo $this->get_field_name( 'height' ); ?>">
				<?php foreach ( $height as $val ): ?>
					<option
						value="<?php echo esc_attr( $val ); ?>" <?php selected( $instance['height'], $val ); ?>><?php echo esc_html( $val ); ?></option>
				<?php endforeach; ?>
			</select>

			<label
				for="<?php echo $this->get_field_id( 'show_cover' ); ?>"><?php _e( 'Show Cover Photo?', 'pcb' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'show_cover' ); ?>"
			        name="<?php echo $this->get_field_name( 'show_cover' ); ?>">
				<?php foreach ( $reverse_boolean as $key => $val ): ?>
					<option
						value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['show_cover'], $key ); ?>><?php echo esc_html( $val ); ?></option>
				<?php endforeach; ?>
			</select>

			<label
				for="<?php echo $this->get_field_id( 'show_facepile' ); ?>"><?php _e( 'Show Facepile?', 'pcb' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'show_facepile' ); ?>"
			        name="<?php echo $this->get_field_name( 'show_facepile' ); ?>">
				<?php foreach ( $boolean as $key => $val ): ?>
					<option
						value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['show_facepile'], $key ); ?>><?php echo esc_html( $val ); ?></option>
				<?php endforeach; ?>
			</select>

			<label
				for="<?php echo $this->get_field_id( 'show_cta' ); ?>"><?php _e( 'Show Call to Action button?', 'pcb' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'show_cta' ); ?>"
			        name="<?php echo $this->get_field_name( 'show_cta' ); ?>">
				<?php foreach ( $reverse_boolean as $key => $val ): ?>
					<option
						value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['show_cta'], $key ) ?>><?php echo esc_html( $val ); ?></option>
				<?php endforeach; ?>
			</select>

			<label
				for="<?php echo $this->get_field_id( 'small_header' ); ?>"><?php _e( 'Small Header?', 'pcb' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'small_header' ); ?>"
			        name="<?php echo $this->get_field_name( 'small_header' ); ?>">
				<?php foreach ( $boolean as $key => $val ): ?>
					<option
						value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['small_header'], $key ); ?>><?php echo esc_html( $val ); ?></option>
				<?php endforeach; ?>
			</select>

			<label
				for="<?php echo $this->get_field_id( 'timeline_tab' ); ?>"><?php _e( 'Show Timeline Tab?', 'pcb' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'timeline_tab' ); ?>"
			        name="<?php echo $this->get_field_name( 'timeline_tab' ); ?>">
				<?php foreach ( $boolean as $key => $val ): ?>
					<option
						value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['timeline_tab'], $key ); ?>><?php echo esc_html( $val ); ?></option>
				<?php endforeach; ?>
			</select>

			<label
				for="<?php echo $this->get_field_id( 'events_tab' ); ?>"><?php _e( 'Show Events Tab?', 'pcb' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'events_tab' ); ?>"
			        name="<?php echo $this->get_field_name( 'events_tab' ); ?>">
				<?php foreach ( $boolean as $key => $val ): ?>
					<option
						value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['events_tab'], $key ); ?>><?php echo esc_html( $val ); ?></option>
				<?php endforeach; ?>
			</select>

			<label
				for="<?php echo $this->get_field_id( 'messages_tab' ); ?>"><?php _e( 'Show Messages Tab?', 'pcb' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'messages_tab' ); ?>"
			        name="<?php echo $this->get_field_name( 'messages_tab' ); ?>">
				<?php foreach ( $boolean as $key => $val ): ?>
					<option
						value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['messages_tab'], $key ); ?>><?php echo esc_html( $val ); ?></option>
				<?php endforeach; ?>
			</select>

			<label
				for="<?php echo $this->get_field_id( 'adapt_container_width' ); ?>"><?php _e( 'Beta: Auto-responsive?', 'pcb' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'adapt_container_width' ); ?>"
			        name="<?php echo $this->get_field_name( 'adapt_container_width' ); ?>">
				<?php foreach ( $boolean as $key => $val ): ?>
					<option
						value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['adapt_container_width'], $key ); ?>><?php echo esc_html( $val ); ?></option>
				<?php endforeach; ?>
			</select>

			<label
				for="<?php echo $this->get_field_id( 'align' ); ?>"><?php _e( 'Alignment:', 'pcb' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'align' ); ?>"
			        name="<?php echo $this->get_field_name( 'align' ); ?>">
				<?php foreach ( $align as $key => $val ): ?>
					<option
						value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['align'], $key ); ?>><?php echo esc_html( $val ); ?></option>
				<?php endforeach; ?>
			</select>
	
		<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {

		$defaults = $this->defaults();
		
		$instance = $old_instance;
		foreach ( $defaults as $key => $val ) {
			$instance[ $key ] = strip_tags( $new_instance[ $key ] );
		}

		return $instance;
	}

	function defaults() {

		$defaults = array(
			'title'                 => 'Facebook Page Widget',
			'facebook_url'                  => 'https://www.facebook.com/facebook',
			'width'                 => '340',
			'height'                => '500',
			'show_cover'            => '0',
			'show_facepile'         => '0',
			'align'                 => 'initial',
			'timeline_tab'          => '1',
			'events_tab'            => '0',
			'messages_tab'          => '0',
			'show_cta'              => '0',
			'small_header'          => '0',
			'adapt_container_width' => '1'
		);

		return $defaults;
	}

}

