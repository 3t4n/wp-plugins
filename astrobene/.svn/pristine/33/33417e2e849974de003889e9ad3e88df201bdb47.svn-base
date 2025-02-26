<?php 
/*
Plugin Name: AstroBene
Plugin URI: http://astrobene.ru
Description: Astrological weather for every day (Russian). Астрологическая погода на каждый день
Version: 1.1
Author: C-In-OFF
Author URI: http://astrobene.ru
*/
	/* Стили для Фронтенд
	----------------------------------------------------------------- */	
	function astrobene_stylesheets(){
		$Style_Path = plugin_dir_url (__FILE__) .'style.css';
		wp_enqueue_style ('astrobene', $Style_Path, false, null );			
	}
	add_action ('wp_enqueue_scripts', 'astrobene_stylesheets');
	
	class astrobene_widget extends WP_Widget {
		function __construct() {
			parent::__construct(
				'astrobene_widget', __('AstroBene Informer', 'astrobene_informer'), 
				array( 'description' => __( 'Astrological weather for every day (Russian). Астрологическая погода на каждый день', 'astrobene_informer' ), ) 
			);
		}

		/* Widget
		----------------------------------------------------------------- */			
		public function widget ($args, $instance) {
			$title = apply_filters ('widget_title', $instance['title']);
			
			// before Theme variable identification
			echo $args['before_widget'];
			
			if (! empty ($title)) {
				echo $args['before_title'] .$title .$args['after_title'];	
			}
		
			// Feeds Data Output
			?>
			<script src="http://feeds.feedburner.com/Astrobene?format=sigpro" type="text/javascript" ></script>					
			<?php
			
			echo $args['after_widget'];
		}
				
		/* Close widget
		----------------------------------------------------------------- */		
		public function form ($instance) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = __( 'AstroBene', 'astrobene_informer' );
			}
			
			// Admin console
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<?php 
		}
			
		/* Update Widget
		----------------------------------------------------------------- */			
		public function update ($new_instance, $old_instance) {
			$instance = array();
			
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			
			return $instance;
		}
	}

	/* Reg & Start widget
	----------------------------------------------------------------- */
	function astrobene_load_widget () {
		register_widget( 'astrobene_widget' );
	}
	add_action ('widgets_init', 'astrobene_load_widget');
?>