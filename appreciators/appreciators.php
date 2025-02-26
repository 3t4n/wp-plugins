<?php
/**
 * Appreciators WP Plugin
 *
 * @package   Appreciators
 * @author    Minh Lee <minh@appreciators.org>
 * @license   GPL-2.0+
 * @copyright 2016 Appreciators Clique
 *
 * @wordpress-plugin
 * Plugin Name:       Appreciators WP Plugin
 * Description:       A WordPress plugin that allows viewers to appreciate and tip content creators
 * Version:           1.1.1
 * Author:            Appreciators Clique
 * Author URI:        https://appreciators.org
 * Text Domain:       appreciators
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Include plugin main class.
 */
require_once plugin_dir_path( __FILE__ ) . 'public/class-appreciators.php';

/**
 * Perform installation.
 */
register_activation_hook( __FILE__, array( 'Appreciators', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Appreciators', 'deactivate' ) );

/**
 * Initialize the plugin instance.
 */
add_action( 'plugins_loaded', array( 'Appreciators', 'get_instance' ) );

/**
 * Plugin admin.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'admin/class-appreciators-admin.php';

	add_action( 'plugins_loaded', array( 'Appreciators_Admin', 'get_instance' ) );
}

/**
 * Shows the Appreciators WP Plugin.
 *
 * @return string Appreciators WP Plugin HTML.
 */
function get_Appreciators() {
	return Appreciators::view( get_option( 'appreciators_settings' ) );
}

/**
 * Shows the Appreciators WP Plugin legacy.
 *
 * @return string Appreciators WP Plugin HTML.
 */
function authorbbio_add_authorbox() {
	echo get_Appreciators();
}

add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

/**
 * Adds custom user profile fields shown in Appreciators WP Plugin
 *
 */
function extra_user_profile_fields( $user ) {

$settings = get_option( 'appreciators_settings' );

if ( $settings['user_roles_access'] == "admins" && !current_user_can('administrator') ||
	 $settings['user_roles_access'] == "editors" && !current_user_can('administrator') && !current_user_can('editor') ||
	 $settings['user_roles_access'] == "authors" && !current_user_can('administrator') && !current_user_can('editor') && !current_user_can('author') ||
	 $settings['user_roles_access'] == "contributors" && !current_user_can('administrator') && !current_user_can('editor') && !current_user_can('author') && !current_user_can('contributor')
   ){ 
		// nothing
	}else{

?>



<h3><?php _e("Author Signature Info", "blank"); ?></h3>

<div style=\"display:none!important;\">

<?php 
if ( $settings['author_links'] == "link_to_author_page"){ 
	$sabhide = " style=\"display:none!important;\"";
}else{
	$sabhide = "";
}
?>

</div>

<table class="form-table">
<tr>
<th><label for="job-title"><?php _e("Job Title"); ?></label></th>
<td>
<input type="text" name="job-title" id="job-title" value="<?php echo esc_attr( get_the_author_meta( 'job-title', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("Please enter your job title."); ?></span>
</td>
</tr>
<tr>
<th><label for="hide-job-title"><?php _e("Hide Job Title"); ?></label></th>
<td>
<input type="checkbox" name="hide-job-title" id="hide-job-title" value="yes" <?php if (esc_attr( get_the_author_meta( "hide-job-title", $user->ID )) == "yes") echo "checked"; ?> /><br />
<span class="description"><?php _e("Check this checkbox if you want the job title hidden for this user."); ?></span>
</td>
</tr>
<tr>
<th><label for="company"><?php _e("Company"); ?></label></th>
<td>
<input type="text" name="company" id="company" value="<?php echo esc_attr( get_the_author_meta( 'company', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("Please enter your company."); ?></span>
</td>
</tr>
<tr>
<th><label for="company-website-url"><?php _e("Company Website URL"); ?></label></th>
<td>
<input type="text" name="company-website-url" id="company-website-url" value="<?php echo esc_attr( get_the_author_meta( 'company-website-url', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("Please enter your company's website URL."); ?></span>
</td>
</tr>
<tr<?php echo $sabhide; ?>>
<th><label for="name-link"><?php _e("Name Link"); ?></label></th>
<td>
<input type="text" name="name-link" id="name-link" value="<?php echo esc_attr( get_the_author_meta( 'name-link', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("Please enter the URL you want your name to link to."); ?></span>
</td>
</tr>
<tr<?php echo $sabhide; ?>>
<th><label for="avatar-link"><?php _e("Avatar Link"); ?></label></th>
<td>
<input type="text" name="avatar-link" id="avatar-link" value="<?php echo esc_attr( get_the_author_meta( 'avatar-link', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("Please enter the URL you want your avatar to link to."); ?></span>
</td>
</tr>
<tr>
<th><label for="hide-signature"><?php _e("Hide Signature"); ?></label></th>
<td>
<input type="checkbox" name="hide-signature" id="hide-signature" value="yes" <?php if (esc_attr( get_the_author_meta( "hide-signature", $user->ID )) == "yes") echo "checked"; ?> /><br />
<span class="description"><?php _e("Check this checkbox if you want the signature hidden for this user."); ?></span>
</td>
</tr>
<tr>
<th><label for="avatar-url"><?php _e("Custom Avatar URL"); ?></label></th>
<td>
<input type="text" name="avatar-url" id="avatar-url" value="<?php echo esc_attr( get_the_author_meta( 'avatar-url', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("If you would prefer to use a custom avatar image instead of your Gravatar, enter the URL of the custom avatar image here."); ?></span>
</td>
</tr>
</table>

<?php 

	}

}

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {

if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

update_user_meta( $user_id, 'job-title', $_POST['job-title'] );
update_user_meta( $user_id, 'hide-job-title', $_POST['hide-job-title'] );
update_user_meta( $user_id, 'company', $_POST['company'] );
update_user_meta( $user_id, 'company-website-url', $_POST['company-website-url'] );
update_user_meta( $user_id, 'name-link', $_POST['name-link'] );
update_user_meta( $user_id, 'avatar-link', $_POST['avatar-link'] );
update_user_meta( $user_id, 'hide-signature', $_POST['hide-signature'] );
update_user_meta( $user_id, 'avatar-url', $_POST['avatar-url'] );
}

// Enable Appreciators WP Plugin Shortcode
function appreciators_shortcode( $atts ){
	if ( function_exists( 'get_Appreciators' ) ) {
        return get_Appreciators();
    }
}
add_shortcode( 'appreciate-author', 'appreciators_shortcode' );
add_filter('widget_text', 'do_shortcode');


// Add settings link on plugin page
function appreciators_settings_link($links) { 
  $settings_link = '<a href="admin.php?page=appreciators">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'appreciators_settings_link' );

/**
 * Adds Appreciators_Widget widget.
 */
class Appreciators_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'appreciators_widget', // Base ID
			__( 'Appreciators WP Plugin', 'text_domain' ), // Name
			array( 'description' => __( 'The Appreciators WP Plugin Widget', 'text_domain' ), ) // Args
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
	
     	echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		if ( function_exists( 'get_Appreciators' ) ){
			echo __( get_Appreciators() , 'text_domain' );
		}
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
     	        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( '', 'text_domain' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Appreciators_Widget

// register Appreciators_Widget widget
function register_appreciators_widget() {
    register_widget( 'Appreciators_Widget' );
}
add_action( 'widgets_init', 'register_appreciators_widget' );

