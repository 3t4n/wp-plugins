<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://profiles.wordpress.org/istvan_r9
 * @since      1.0.0
 *
 * @package    Archive_Akkordion
 * @subpackage Archive_Akkordion/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Archive_Akkordion
 * @subpackage Archive_Akkordion/admin
 * @author     istvan_r9, mlehelsz
 */
class Archive_Akkordion_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Archive_Akkordion_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Archive_Akkordion_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/archive-akkordion-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Archive_Akkordion_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Archive_Akkordion_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/archive-akkordion-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the new archive widget
	 *
	 * @since    1.0.0
	 */
	public function register_archive_widget() {

		register_widget( 'IL_Archive_Akkordion' );

	}
}



class IL_Archive_Akkordion extends WP_Widget {

	/**
	 * Extends WordPress Native Widget Class
	 *
	 * @since    1.0.0
	 */

	public function IL_Archive_Akkordion() {

		$widget_ops = array( 
			'classname' => 'widget-archive-akkordion',
			'description' => __('A widget to display a custom archive in a widget section with an accordion layout.', 'archive-akkordion')
		);

		// Instantiate the parent object
		parent::__construct( 'widget-archive-akkordion', __( 'Archive akkordion', 'archive-akkordion' ), $widget_ops );
	}



	/**
	 * Output the widget
	 *
	 * @since    1.0.0
	 * @param array $args takes arguments from widget form
	 * @param array $instance gets current setting values
	 */
	public function widget( $args, $instance ) {
		
		extract( $args );

		$title = apply_filters( 
			'widget_title', empty($instance[ 'title' ] ) ? __( 'Archives', 'archive-akkordion' ) : $instance[ 'title' ], $instance, $this->id_base
		);

		$animation = ( empty($instance[ 'animation' ] )) ? '250' : $instance[ 'animation' ];

		$structure  = $before_widget;
		if ( $title ) $structure  .= $before_title . $title . $after_title;

		$structure .= "<ul data-animation='" . $animation . "'>";

		if( $instance[ 'counter' ] ) {
			$args = array(
			    'type' 			=> 'yearly',
			    'after'			=> ',',
			    'echo'			=> false,
			    'show_post_count'		=> true,
			    'post_type'			=> 'post'
			);
			$yearly = wp_get_archives( $args );
			$yearly_arr = explode( ',', strip_tags( $yearly ) );
			
		}
		$archives = strip_tags(wp_get_archives( apply_filters( 'widget_archives_args', array(
			'type'		=> 'monthly',
			'limit'           	=> '',
			'format'	=> 'custom',
			'echo'		=> 0,
			'after'		=> ',',
			'post_type'	=> 'post'
		) ) ) );

		$archives = explode( ',', $archives );
		$months = array();
		$years = array();

		foreach ( $archives as $archive ) {
			$archive = explode( ' ', $archive );
			if ( isset( $archive[1] ) ) {
				array_push( $years, $archive[1] );
			}
		}

		$years = array_values( array_unique( $years ) );

		$i = 0;

		foreach ( $years as $year_key => $year ) {
			$number = ( $instance[ 'counter' ] ) ? $yearly_arr[ $year_key ]: $year;
			$structure .= '<li class="archive-year"><a>' . $number . '</a><ul>';

			foreach ( $archives as $key => $archive ) {
				$archive = explode( ' ', $archive );
				if ( !empty( $archive[1] ) && $archive[1] == $year ) {

					$month = trim( $archive[0] );

					switch( $month ) {
						case __( 'January' ) : $i = '01'; break;
						case __( 'February' ) : $i = '02'; break;
						case __( 'March' ) :  $i = '03'; break;
						case __( 'April' ) : $i = '04'; break;
						case __( 'May' ) : $i = '05'; break;
						case __( 'June' ) : $i = '06'; break;
						case __( 'July' ) : $i = '07'; break;
						case __( 'August' ) : $i = '08'; break;
						case __( 'September' ) : $i = '09'; break;
						case __( 'October' ) : $i = '10'; break;
						case __( 'November' ) : $i = '11'; break;
						case __( 'December' ) : $i = '12'; break;
					}
					$countposts = array();
					if( $instance[ 'counter' ] ) {
						$countposts = get_posts( "year=" . $year . "&monthnum=" . $i );
					}
					$month_nr = ( $instance[ 'counter' ] ) ? '<span> (' . count( $countposts ) . ')</span>' : "";
					$structure .= '<li class="archive-month"><a href="' . get_month_link( $year , $i ) . '">' . $month . $month_nr. '</a></li>';
				}

			}
			$structure .= '</ul></li>';
		}
		$structure .= '</ul>';
		$structure .= $after_widget;
		echo $structure;

	}



	/**
	 * Updating/saving changes for the widget
	 *
	 * @since    1.0.0
	 * @param array $old_instance Initial settings
	 * @param array $new_instance updated Settings
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$new_instance = wp_parse_args( ( array ) $new_instance, array( 
			'title' 		=> '',
			'animation'	=> '250',
			'counter'	=> false
		) );
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ]);
		$instance[ 'animation' ] = strip_tags( $new_instance[ 'animation' ] );
		$instance[ 'counter' ] = strip_tags( $new_instance[ 'counter' ] );
		return $instance;

	}



	/**
	 * Output admin widget options form
	 *
	 * @since    1.0.0
	 * @param array $instance Initial settings
	 */
	public function form( $instance ) {

		$instance = wp_parse_args( ( array ) $instance, array( 
			'title'		=> '',
			'animation'	=> '250',
			'counter'	=> false
		) );
		$title = strip_tags( $instance[ 'title' ]) ;
		$animation = strip_tags( $instance[ 'animation' ] );
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'archive-akkordion' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'animation' ); ?>"><?php _e( 'Animation speed:', 'archive-akkordion' ); ?></label>
			<input class="widefat" min="0" max="2500" id="<?php echo $this->get_field_id( 'animation' ); ?>" name="<?php echo $this->get_field_name( 'animation' ); ?>" type="number" value="<?php echo esc_attr( $animation ); ?>" />
		</p>
		<p>
			<input class="widefat" <?php checked( '1' , $instance[ 'counter' ] ); ?> id="<?php echo $this->get_field_id( 'counter' ); ?>" name="<?php echo $this->get_field_name( 'counter' ); ?>" type="checkbox" value="1" />
			<label for="<?php echo $this->get_field_id( 'counter' ); ?>"><?php _e( 'Show post counts', 'archive-akkordion' ); ?></label>
		</p>
	<?php
	}


}
