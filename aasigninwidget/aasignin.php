<?php

/**
 * Plugin Name: AA Signin Widget
 * Plugin URI: https://wordpress.org/plugins/aasigninwidget/
 * Description: It's signin extension from AA Production House. . 
 * Version: 1.0
 * Author: aaextention
 * Author URI: http://webdesigncr3ator.com
 * Support Email : contact2us.aa@gmail.com
 * License: GPL2
 **/




/**
@That is the theme login widget
*/	function ss_current_url_get() {
	$pageURL = 'http://';
	$pageURL .= $_SERVER['HTTP_HOST'];
	$pageURL .= $_SERVER['REQUEST_URI'];
	if ( force_ssl_login() || force_ssl_admin() ) $pageURL = str_replace( 'http://', 'https://', $pageURL );
	return $pageURL;
}
class aa_login_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'aa_login_widget', // Base ID
			'Sign in Widget', // Name
			array( 'description' => __( 'Sign in Widget', 'text_domain' ), ) // Args
		);
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
		extract( $args );
		//$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		if ( !is_user_logged_in() ){
		// if user login
		 $args = array(
		'echo' => true,
		//'redirect' => site_url( $_SERVER['REQUEST_URI'] ), 
		//'redirect' => $_SERVER['REQUEST_URI'] , 
		'redirect' => ss_current_url_get() , 
        'form_id' => 'loginform',
        'label_username' => ( 'Username' ),
        'label_password' => ( 'Password' ),
        'label_remember' => ( 'Remember Me' ),
        'label_log_in' => ( 'Log In' ),
        'id_username' => 'user_login',
        'id_password' => 'user_pass',
        'id_remember' => 'rememberme',
        'id_submit' => 'wp-submit',
        'remember' => true,
        'value_username' => NULL,
        'value_remember' => false );
		wp_login_form( $args );
		
return " <a href='".wp_lostpassword_url( ss_current_url_get())."' title='Lost Password'> Lost Password ?</a> <p></p>". wp_register('', '');
; 	  
		}
		else {
		
		// it  include

		global $current_user;
		$currentusername= $current_user->display_name . "\n";
		echo '<div id="loginwidgettheme">';
		echo '<div class="loginavatar">';
		echo get_avatar( $current_user->ID, 70 ); 
		echo '</div>';
		echo '<p> Welcome '.$currentusername.'</p>';		
		echo '<p> You write '.count_user_posts( $current_user->ID).' posts on this blog</p>';
	echo '<p id="loginbottom">';

						?><a href="<?php echo site_url('/wp-admin/'); ?>"><?php _e('Dashboard',' '); ?></a> <a href='<?php echo get_author_posts_url( $current_user->ID ) ;?>' >Profile</a> <a href="<?php echo wp_logout_url(ss_current_url_get()); ?>" title="Logout">Logout</a><?php

		echo '</p>';
		echo '</div>';
	
		}
		echo $after_widget;
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
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		?><br>
		There are no options for this widget.
		<br><br>
		<?php 
	}

} // class Foo_Widget

// register Foo_Widget widget
add_action( 'widgets_init', create_function( '', 'register_widget( "aa_login_widget" );' ) );














//////////////////////////////////////////////////////////////
//shortcode 
function aa_login_shortcode(){
		if ( !is_user_logged_in() ){
		// if user login
		 $args = array(
		'echo' => true,
		//'redirect' => site_url( $_SERVER['REQUEST_URI'] ), 
		//'redirect' => $_SERVER['REQUEST_URI'] , 
		'redirect' => ss_current_url_get() , 
        'form_id' => 'loginform',
        'label_username' => ( 'Username' ),
        'label_password' => ( 'Password' ),
        'label_remember' => ( 'Remember Me' ),
        'label_log_in' => ( 'Log In' ),
        'id_username' => 'user_login',
        'id_password' => 'user_pass',
        'id_remember' => 'rememberme',
        'id_submit' => 'wp-submit',
        'remember' => true,
        'value_username' => NULL,
        'value_remember' => false ,
		'echo' => false);
		

return  wp_login_form( $args )." <a href='".wp_lostpassword_url( ss_current_url_get())."' title='Lost Password'> Lost Password ?</a> <p></p>". wp_register('', '');		
		}
		else {
		
		// it  include

		global $current_user;
		$currentusername= $current_user->display_name . "\n";
		$the_code = '<div id="loginshortcode">';
		$the_code .='<div class="loginavatar">';
		$the_code .=get_avatar( $current_user->ID, 70 ); 
		$the_code .='</div>';
		$the_code .='<p> Welcome '.$currentusername.'</p>';		
		$the_code .='<p> You write '.count_user_posts( $current_user->ID).' posts on this blog</p>';
		$the_code .='<p id="loginbottom">';

			$the_code .= "<a href='".site_url('/wp-admin/')."'>Dashboard</a> <a href='".get_author_posts_url( $current_user->ID )."' >Profile</a> <a href='". wp_logout_url(ss_current_url_get())."'>Logout</a>";

		$the_code  .='</p>';
		$the_code .= '</div>';
		return $the_code ;
		}
		


}

add_shortcode('signinform','aa_login_shortcode');
add_shortcode('signinwidget','aa_login_shortcode');
add_shortcode('signin','aa_login_shortcode');