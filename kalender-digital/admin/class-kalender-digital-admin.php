<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://kalender.digital
 * @since      1.0.0
 *
 * @package    Kalender_Digital
 * @subpackage Kalender_Digital/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Kalender_Digital
 * @subpackage Kalender_Digital/admin
 * @author     Kalender.digital <info@kalender.digital>
 */
class Kalender_Digital_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $kalender_digital    The ID of this plugin.
	 */
	private $kalender_digital;

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
	 * @param      string    $kalender_digital       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $kalender_digital, $version ) {
        add_action( 'admin_menu', array($this, 'kalender_digital_options_page') );
        add_filter( 'plugin_action_links', array($this, 'kalender_digital_plugin_action'), 10, 2 );

		$this->kalender_digital = $kalender_digital;
		$this->version = $version;

	}

    function kalender_digital_options_page() {
        add_menu_page(
            __('Calendar', 'kalender-digital'),
            __('Calendar', 'kalender-digital'),
            'manage_options',
            'kalender_digital',
            array($this, 'kalender_digital_options_page_html'),
            'dashicons-calendar-alt',
            20
        );
    }

    function kalender_digital_plugin_action( $links, $plugin_file_name ) {

	    if($plugin_file_name === 'kalender-digital/kalender-digital.php') {
            $links[] = '<a href="admin.php?page=kalender_digital">Hilfe</a>';
        }

        return $links;
    }

    function kalender_digital_options_page_html() {
        ?>
        <div class="wrap">
            <h1>Calendar.online / Kalender.digital Plugin</h1>

            <div class="kalender-digital-container">
                <h1><?= __('Calendar Integration', 'kalender-digital') ?></h1>

                <p>
                    <?= __('Please follow these steps to integrate the calendar', 'kalender-digital') ?>:<br><br>

                    1. <?= __('Create a free account on <a title="Online Calendar" href="https://calendar.online" target="_blank">Calendar.online</a> (german speaking users: <a title="Online Kalender" href="https://kalender.digital" target="_blank">Kalender.digital</a>)', 'kalender-digital') ?>.<br>
                    2. <?= __('Add the shortcode below to your website', 'kalender-digital') ?>.<br>
                    3. <?= __('Exchange in the shortcode the link to the calendar with your "reader link", which you received by email after registration. You can also find the "reader link" in the settings', 'kalender-digital') ?>.<br>
                    4. <?= __('You can now easily edit events and settings via your "administrator link", which you received after registration', 'kalender-digital') ?>.<br>
                </p>

            </div>

            <div class="kalender-digital-container">
                <h1>Shortcode</h1>

                <div class="kalender-digital-shortcode">
                    [calendar_online height=650px width=100% link=https://calendar.online/45ebc4aef6fd5149539c]
                </div>

                <?= __('or', 'kalender-digital') ?>

                <div class="kalender-digital-shortcode">
                    [kalender_digital height=650px width=100% link=https://kalender.digital/12073b2a94a3ac83cbf7]
                </div>
            </div>

            <div class="kalender-digital-container">
                <h1>Shortcode <?= __('Parameters', 'kalender-digital') ?></h1>

                <h3>height</h3>
                <p><?= __('Height of the calendar in pixels (e.g. "500px") or percent (e.g. "100%")', 'kalender-digital') ?></p>

                <h3>width</h3>
                <p><?= __('Width of the calendar in pixels (e.g. "500px") or percent (e.g. "100%")', 'kalender-digital') ?></p>

                <h3>link</h3>
                <p><?= __('Link to your calendar', 'kalender-digital') ?></p>
            </div>

            <div class="kalender-digital-container">
                <h1><?= __('Help', 'kalender-digital') ?></h1>

                <p><?= __('You can find further information at', 'kalender-digital') ?> <a href="<?= __('https://calendar.online/c/on-your-website', 'kalender-digital') ?>" target="_blank"><?= __('https://calendar.online/c/on-your-website', 'kalender-digital') ?></a></p>
            </div>

        </div>
        <?php
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
		 * defined in Kalender_Digital_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Kalender_Digital_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->kalender_digital, plugin_dir_url( __FILE__ ) . 'css/kalender-digital-admin.css', array(), $this->version, 'all' );

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
		 * defined in Kalender_Digital_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Kalender_Digital_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->kalender_digital, plugin_dir_url( __FILE__ ) . 'js/kalender-digital-admin.js', array( 'jquery' ), $this->version, false );

	}

}
