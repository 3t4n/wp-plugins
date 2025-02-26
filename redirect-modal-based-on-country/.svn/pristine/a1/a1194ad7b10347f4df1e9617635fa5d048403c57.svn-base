<?php

/**
 * Admin menu.
 *
 * @link       https://github.com/David-Kurniawan/
 * @since      1.0.0
 *
 * @package    Redirect_Modal_Based_On_Country
 * @subpackage Redirect_Modal_Based_On_Country/includes
 */

/**
 * Admin menu.
 *
 * This class defines all code necessary to run in Admin menu.
 *
 * @since      1.0.0
 * @package    Redirect_Modal_Based_On_Country
 * @subpackage Redirect_Modal_Based_On_Country/includes
 * @author     David Kurniawan <jatinangorservice@gmail.com>
 */
class Redirect_Modal_Based_On_Country_Admin_Menu {
	/**
	 * Register sub menu
	 *
	 * @since    1.0.0
	 */
	public function rmboc_register_sub_menu() {
        global $wp_filesystem;

        /**
         * Registers options page menu item and form.
         */
        $cmb = new_cmb2_box( array(
            'id'           => RMBOC_SHORT_PREFIX,
            'title'        => esc_attr('Redirect Modal Based On Country'),
            'object_types' => array( 'options-page' ),
            'option_key'      => RMBOC_SHORT_PREFIX.'_options',
            'parent_slug'     => 'options-general.php',
            'capability'      => 'manage_options',
        ) );

        /**
         * Options fields ids only need
         * to be unique within this box.
         * Prefix is not needed.
         */
        require_once ( ABSPATH . '/wp-admin/includes/file.php' );
        WP_Filesystem();

        $json = plugin_dir_path( dirname( __FILE__ ) ) . 'data/json/countries.json';
        $json = $wp_filesystem->get_contents($json);

        $results = json_decode($json);

        foreach ($results as $result) {
            $cmb->add_field( array(
                'name' => esc_attr( $result->text ),
                'desc' => wp_sprintf( '%s %l', esc_html__( 'Full redirect URL if visitor country is from', 'redirect-modal-based-on-country' ), $result->text ),
                'id'   => esc_attr(RMBOC_SHORT_PREFIX.'_'.$result->value),
                'type' => 'text_url',
            ) );
        }
	}

    /**
     * Run action
     *
     * @since    1.0.0
     */
    public function rmboc_run()
    {
        $this->rmboc_register_sub_menu();
    }

}
