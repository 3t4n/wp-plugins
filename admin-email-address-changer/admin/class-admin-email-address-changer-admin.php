<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       activity-log.com
 * @since      1.0.0
 *
 * @package    Admin_Email_Address_Changer
 * @subpackage Admin_Email_Address_Changer/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Admin_Email_Address_Changer
 * @subpackage Admin_Email_Address_Changer/admin
 * @author     SWIT & Ivica <sandi@swit.hr>
 */
class Admin_Email_Address_Changer_Admin {

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
		 * defined in Admin_Email_Address_Changer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Admin_Email_Address_Changer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/admin-email-address-changer-admin.css', array(), $this->version, 'all' );

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
		 * defined in Admin_Email_Address_Changer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Admin_Email_Address_Changer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/admin-email-address-changer-admin.js', array( 'jquery' ), $this->version, false );

	}

    public function admin_email_change()
    {

        $message = '';

        if(isset($_POST['new_admin_email']))
        {
            update_option('admin_email', sanitize_email($_POST['new_admin_email']));
            update_option('new_admin_email', sanitize_email($_POST['new_admin_email']));

            $message = '<div class="updated inline"><p>'.__('Great, your admin email address changed!', 'admin-email-address-changer').'</p></div>';
        }

        $admin_email = get_option('admin_email');

        ?>

            <div class="wrap">
            <h1><?php echo __('Admin Email Address Changer', 'admin-email-address-changer'); ?></h1>

            <p><?php echo __('Admin Email Address Will be changed immediately without need of email confirmation, what is required in default WordPress Settings', 'admin-email-address-changer'); ?></p>

            <?php if(!empty($message))echo $message; ?>

            <form action="<?php echo get_admin_url(NULL, 'options-general.php?page=admin-email-address-changer'); ?>" method="POST">
            <table>
            <tr>
            <th scope="row"><label for="new_admin_email"><?php echo __('Administration Email Address', 'admin-email-address-changer'); ?></label></th>
            <td><input name="new_admin_email" type="email" id="new_admin_email" aria-describedby="new-admin-email-description" value="<?php echo esc_attr($admin_email); ?>" class="regular-text ltr">

            </td>
            </tr>

            </table>

            <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p></form>
            </form>
            </div>

        <?php
    }

    /**
     * To add Plugin Menu and Settings page
     */
    public function plugin_menu() {

        add_options_page( __('Admin Email', 'admin-email-address-changer'), 
                          __('Admin Email', 'admin-email-address-changer'), 
                          'manage_options', 'admin-email-address-changer', array($this, 'admin_email_change'), 1 );

    }

}
