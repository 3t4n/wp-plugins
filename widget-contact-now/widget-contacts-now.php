<?php
/* 
Plugin Name: 	Widget Contact Now
Plugin URI: 	https://longvietweb.com/plugins/widget-contact
Description: 	This is a fast contact widget information Includes instant Call Now Button and Send Now Email with just One Click.
Tags: 			widget contact now, contact information, contact information widget, contact, widget contact, contact widget, contact us
Author URI: 	https://longvietweb.com/
Author: 		LongViet
Version: 		1.0.1
License: 		GPL3
Text Domain:    lv-web
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

define('LV_WIDGET_CONTACT_NOW_VERSION', '1.0.1');
define('LV_WIDGET_CONTACT_NOW_DIR', plugin_dir_path(__FILE__));
define('LV_WIDGET_CONTACT_NOW_URI', plugins_url('/', __FILE__));

/*
 * Adding the scripts and styles
 */
add_action('wp_enqueue_scripts', 'contact_widget_enqueue_scripts');
add_action('admin_enqueue_scripts', 'contact_widget_enqueue_scripts');
function contact_widget_enqueue_scripts() {
    wp_enqueue_style('ionicons', '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
	wp_enqueue_style("widget-contacts", LV_WIDGET_CONTACT_NOW_URI . "assets/css/widget-contacts.css");
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}

class LV_Contacts_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct( 'contacts', '&#76;&#86;' .__(' Contacts Now Information', 'lv-web'), 
			array( 'description' => __( 'This is a fast contact widget Includes instant Call Now Button and Send Now Email with just One Click.', 'lv-web' ), )
		);
		
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );
	}
	/**
	 * Enqueue scripts.
	 *
	 * @since 1.0
	 *
	 * @param string $hook_suffix
	 */
	public function enqueue_scripts( $hook_suffix ) {
		if ( 'widgets.php' !== $hook_suffix ) {
			return;
		}

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'underscore' );
	}

	/**
	 * Print scripts.
	 *
	 * @since 1.0
	 */
	public function print_scripts() {
		?>
		<script>
			( function( $ ){
				function initColorPicker( widget ) {
					widget.find( '.contacts' ).wpColorPicker( {
						change: _.throttle( function() { // For Customizer
							$(this).trigger( 'change' );
						}, 3000 )
					});
				}

				function onFormUpdate( event, widget ) {
					initColorPicker( widget );
				}

				$( document ).on( 'widget-added widget-updated', onFormUpdate );

				$( document ).ready( function() {
					$( '#widgets-right .widget:has(.contacts)' ).each( function () {
						initColorPicker( $( this ) );
					} );
				} );
			}( jQuery ) );
		</script>
		<?php
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		$iconcolor = $instance['iconcolor'];
		$textcolor = $instance['textcolor'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		}
		?>
		<!-- START Widget Contacts By LongVietWeb.com -->
        <?php	
        echo '<ul class="widget-contact-now">';
		if(!empty($instance['company'])){
			echo '<li class="widget-contact"><div class="icon"><i class="ion-ios-home" style="color: '. $iconcolor .'"></i></div><div class="widget-contact-text" style="color: '. $textcolor .'">' . html_entity_decode( $instance['company'] ) . '</div></li>';
		}
		
		if(!empty($instance['address'])){
			echo '<li class="widget-contact"><div class="icon"><i class="ion-ios-location" style="color: '. $iconcolor .'"></i></div><div class="widget-contact-text" style="color: '. $textcolor .'">' . html_entity_decode( $instance['address'] ) . '</div></li>';
		}

		if(!empty($instance['phone'])){
			echo '<li class="widget-contact"><div class="icon"><i class="ion-ios-telephone" style="color: '. $iconcolor .'"></i></div><div class="widget-contact-text" style="color: '. $textcolor .'"><a href="tel:' . html_entity_decode( $instance['phone'] ) . '">' . html_entity_decode( $instance['phone'] ) . '</a></div></li>';
		}
		
		if(!empty($instance['mobilephone'])){
			echo '<li class="widget-contact"><div class="icon"><i class="ion-android-phone-portrait" style="color: '. $iconcolor .'"></i></div><div class="widget-contact-text" style="color: '. $textcolor .'"><a href="tel:' . html_entity_decode( $instance['mobilephone'] ) . '">' . html_entity_decode( $instance['mobilephone'] ) . '</a></div></li>';
		}

		if(!empty($instance['fax'])){
			echo '<li class="widget-contact"><div class="icon"><i class="ion-ios-printer" style="color: '. $iconcolor .'"></i></div><div class="widget-contact-text" style="color: '. $textcolor .'">' . html_entity_decode( $instance['fax'] ) . '</div></li>';
		}

		if(!empty($instance['email'])){
			echo '<li class="widget-contact"><div class="icon"><i class="ion-email" style="color: '. $iconcolor .'"></i></div><div class="widget-contact-text" style="color: '. $textcolor .'"><a href="mailto:'.sanitize_email( $instance['email'] ).'">'.sanitize_email( $instance['email'] ).'</a></div></li>';
		}
		
		if(!empty($instance['workhours'])){
			echo '<li class="widget-contact"><div class="icon"><i class="ion-android-time" style="color: '. $iconcolor .'"></i></div><div class="widget-contact-text" style="color: '. $textcolor .'">' . html_entity_decode( $instance['workhours'] ) . '</div></li>';
		}
		
		if(!empty($instance['workcalendar'])){
			echo '<li class="widget-contact"><div class="icon"><i class="ion-android-calendar" style="color: '. $iconcolor .'"></i></div><div class="widget-contact-text" style="color: '. $textcolor .'">' . html_entity_decode( $instance['workcalendar'] ) . '</div></li>';
		}
		?>
		<!-- END Widget Contacts By LongVietWeb.com -->
        <?php			
        echo '</ul>';

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

		$title = '';
		$company = '';
		$address = '';
		$phone = '';
		$mobilephone = '';
		$fax = '';
		$email = '';
		$workhours = '';
		$workcalendar = '';
		$iconcolor = '';
		$textcolor = '';

		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}else {
			$title = __( 'Contacts Information', 'lv-web' );
		}

		if ( isset( $instance[ 'company' ] ) ) {
			$company = $instance[ 'company' ];
		}
		
		if ( isset( $instance[ 'address' ] ) ) {
			$address = $instance[ 'address' ];
		}

		if ( isset( $instance[ 'phone' ] ) ) {
			$phone = $instance[ 'phone' ];
		}
		
		if ( isset( $instance[ 'mobilephone' ] ) ) {
			$mobilephone = $instance[ 'mobilephone' ];
		}

		if ( isset( $instance[ 'fax' ] ) ) {
			$fax = $instance[ 'fax' ];
		}

		if ( isset( $instance[ 'email' ] ) ) {
			$email = $instance[ 'email' ];
		}
		
		if ( isset( $instance[ 'workhours' ] ) ) {
			$workhours = $instance[ 'workhours' ];
		}
		
		if ( isset( $instance[ 'workcalendar' ] ) ) {
			$workcalendar = $instance[ 'workcalendar' ];
		}
		
		if ( isset( $instance[ 'iconcolor' ] ) ) {
			$iconcolor = $instance[ 'iconcolor' ];
		}
		
		if ( isset( $instance[ 'textcolor' ] ) ) {
			$textcolor = $instance[ 'textcolor' ];
		}

		?>
        <p class="widget-contacts-note"><?php echo __('Blank labels will not be displayed on the website.', 'lv-web'); ?></p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title :', 'lv-web' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'company' ) ); ?>"><?php _e( 'Company Name :', 'lv-web' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'company' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'company' ) ); ?>" type="text" placeholder="Company Name" value="<?php echo esc_attr( $company ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php _e( 'Address :', 'lv-web' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" type="text" placeholder="Address" value="<?php echo esc_attr( $address ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php _e( 'Phone :', 'lv-web' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" type="text" placeholder="+084( 24 )555-8888" value="<?php echo esc_attr( $phone ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'mobilephone' ) ); ?>"><?php _e( 'Mobile Phone :', 'lv-web' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'mobilephone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'mobilephone' ) ); ?>" type="text" placeholder="+08495558888" value="<?php echo esc_attr( $mobilephone ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'fax' ) ); ?>"><?php _e( 'Fax :', 'lv-web' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fax' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fax' ) ); ?>" type="text" placeholder="Fax : +084( 24 )555-8888" value="<?php echo esc_attr( $fax ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php _e( 'E-mail :', 'lv-web' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" placeholder="E-mail : contact@company.com" value="<?php echo sanitize_email( $email ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'workhours' ) ); ?>"><?php _e( 'Work Hours :', 'lv-web' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'workhours' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'workhours' ) ); ?>" type="text" placeholder="Hours are 7am to 6pm." value="<?php echo esc_attr( $workhours ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'workcalendar' ) ); ?>"><?php _e( 'Work Calendar :', 'lv-web' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'workcalendar' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'workcalendar' ) ); ?>" type="text" placeholder="Working Every Day of The Week." value="<?php echo esc_attr( $workcalendar ); ?>">
		</p>
        <p class="widget-contacts">
        <label for="<?php echo $this->get_field_id('iconcolor'); ?>"><?php _e('Icon Color : ', 'lv-web' ); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('iconcolor'); ?>" class="contacts" id="<?php echo $this->get_field_id('iconcolor'); ?>" value="<?php if($iconcolor) { echo $iconcolor; } else { echo '#e24e13'; } ?>" />
        </p>
		<p class="widget-contacts">
        <label for="<?php echo $this->get_field_id('textcolor'); ?>"><?php _e('Text Color : ', 'lv-web' ); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('textcolor'); ?>" class="contacts" id="<?php echo $this->get_field_id('textcolor'); ?>" value="<?php if($textcolor) { echo $textcolor; } else { echo '#000'; } ?>" />
        </p>
		
	<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? esc_attr( $new_instance['title'] ) : '';
		$instance['company'] = ( ! empty( $new_instance['company'] ) ) ? esc_attr( $new_instance['company'] ) : '';
		$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? esc_attr( $new_instance['address'] ) : '';
		$instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? esc_attr( $new_instance['phone'] ) : '';
		$instance['mobilephone'] = ( ! empty( $new_instance['mobilephone'] ) ) ? esc_attr( $new_instance['mobilephone'] ) : '';
		$instance['fax'] = ( ! empty( $new_instance['fax'] ) ) ? esc_attr( $new_instance['fax'] ) : '';
		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? sanitize_email( $new_instance['email'] ) : '';
		$instance['workhours'] = ( ! empty( $new_instance['workhours'] ) ) ? esc_attr( $new_instance['workhours'] ) : '';
		$instance['workcalendar'] = ( ! empty( $new_instance['workcalendar'] ) ) ? esc_attr( $new_instance['workcalendar'] ) : '';
		$instance['iconcolor'] = ( ! empty( $new_instance['iconcolor'] ) ) ? esc_attr( $new_instance['iconcolor'] ) : '';
		$instance['textcolor'] = ( ! empty( $new_instance['textcolor'] ) ) ? esc_attr( $new_instance['textcolor'] ) : '';

		return $instance;
	}

}

function register_contacts_widget() {
	register_widget( 'LV_Contacts_Widget' );
}
add_action( 'widgets_init', 'register_contacts_widget' );