<?php
/**
 * Licence:
 * AJ & MBEC Ltd Gobi Photo Montage Animator Wordpress Plugin
 * Copyright (C) 2016  AJ & MEBC Ltd
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * Gnomovision version 69, Copyright (C) 2016 AJ & MEBC Ltd
 * Gnomovision comes with ABSOLUTELY NO WARRANTY;
 * This is free software, and you are welcome to redistribute it
 * under certain conditions;
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.ajmebc.co.uk/wordpress/gobi.html
 * @since      1.1.0
 *
 * @package    ajmebc_gam
 * @subpackage ajmebc_gam/admin
 * @author     Andrew James <andrew.james@ajmebc.co.uk>
 */
class ajmebc_gam_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $ajmebc_gam    The ID of this plugin.
	 */
	private $ajmebc_gam;

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
	 * @param      string    $ajmebc_gam       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $ajmebc_gam, $version ) {

		$this->ajmebc_gam = $ajmebc_gam;
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
		 * defined in ajmebc_gam_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ajmebc_gam_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		 wp_enqueue_style($this->ajmebc_gam . '-admin-style', plugin_dir_url(__FILE__) . 'ajmebc/dist/style/css/ShiftingTilesGAM_WP_Admin-style.min.css');

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
		 * defined in ajmebc_gam_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ajmebc_gam_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_media();
		wp_enqueue_script($this->ajmebc_gam . '-knockout-latest', plugin_dir_url(__FILE__) . 'ajmebc/node_modules/knockout/build/output/knockout-latest.js', array(), $this->version, true );
		wp_enqueue_script($this->ajmebc_gam . '-admin-js', plugin_dir_url(__FILE__) . 'ajmebc/dist/js/ShiftingTilesGAM_WP_Admin.min.js', array('jquery', $this->ajmebc_gam . '-knockout-latest'), $this->version, true );

	}
	/**
	 * Define & add Metabox.
	 *
	 * @since    1.0.0
	 */
	public function ajmebc_gam_add_post_type_metabox() {
		add_meta_box( 'ajmebc_gam_post_metabox', 'Gobi Photo Montage Animator', array( $this, 'ajmebc_gam_metabox' ), null, 'normal' );
	}

	public function ajmebc_gam_metabox() {
		global $post;

		//include_once( 'partials/ajmebc-sta-admin-display.php' );
		// Noncename needed to verify where the data originated
		echo '<input type="hidden" name="ajmebc_gam_post_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

		$id = get_the_ID();
		$appData = get_post_meta($id, "ajmebc_gam_post_imgsrc_data", true);

		include_once( 'partials/ajmebc-gam-admin-display.php' );

	}

	/**
	 * Helper function to add post meta data
	 *
	 * @since    1.1.0
	 * @access   public
	 * @var      array    $args    The ID of this post, name of the input field, meta key name.
	 */
	private function ajmebc_update_post_meta( $args ) {
		$meta_value = (isset($_POST[$args['input_name']]) ? $_POST[$args['input_name']] : '');
		update_post_meta($args['post_id'], $args['meta_key'], $meta_value);
	}

	/**
	 * Save the data
	 *
	 * @since    1.1.0
	 * @access   public
	 * @var      string    $post_id    The ID of this post.
	 */
	public function ajmebc_gam_post_save_meta( $post_id ) { // save the data
		/*
		 * We need to verify this came from our screen and with proper authorization,
		 * because the save_post action can be triggered at other times.
		 */
		if ( ! isset( $_POST['ajmebc_gam_post_noncename'] ) ) { // Check if our nonce is set.
			return;
		}

		// verify nonce
		if (!wp_verify_nonce($_POST['ajmebc_gam_post_noncename'], plugin_basename(__FILE__))) {
			 return $post_id;
		}

		// check autosave
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			 return $post_id;
		}

		if (current_user_can('edit_post', $post_id)) {
			/* Desktop */
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_rows', 'meta_key' => 'ajmebc_gam_post_rows' ) );
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_columns', 'meta_key' => 'ajmebc_gam_post_columns' ) );
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_height', 'meta_key' => 'ajmebc_gam_post_height' ) );
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_width', 'meta_key' => 'ajmebc_gam_post_width' ) );
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_style_margin', 'meta_key' => 'ajmebc_gam_post_style_margin' ) );

			/* Tablet */
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_tablet_rows', 'meta_key' => 'ajmebc_gam_tablet_post_rows' ) );
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_tablet_columns', 'meta_key' => 'ajmebc_gam_tablet_post_columns' ) );
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_tablet_height', 'meta_key' => 'ajmebc_gam_tablet_post_height' ) );
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_tablet_width', 'meta_key' => 'ajmebc_gam_tablet_post_width' ) );
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_tablet_style_margin', 'meta_key' => 'ajmebc_gam_tablet_post_style_margin' ) );

			/* Mobile */
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_mobile_rows', 'meta_key' => 'ajmebc_gam_mobile_post_rows' ) );
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_mobile_columns', 'meta_key' => 'ajmebc_gam_mobile_post_columns' ) );
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_mobile_height', 'meta_key' => 'ajmebc_gam_mobile_post_height' ) );
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_mobile_width', 'meta_key' => 'ajmebc_gam_mobile_post_width' ) );
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_mobile_style_margin', 'meta_key' => 'ajmebc_gam_mobile_post_style_margin' ) );

			/* Common Settings */
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_loading', 'meta_key' => 'ajmebc_gam_post_loading' ) );
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_timer', 'meta_key' => 'ajmebc_gam_post_timer' ) );
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_animation', 'meta_key' => 'ajmebc_gam_post_animation' ) );
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_anim_timer', 'meta_key' => 'ajmebc_gam_post_anim_timer' ) );
			$this->ajmebc_update_post_meta( array('post_id' => $post_id, 'input_name' => 'ajmebc_gam_data', 'meta_key' => 'ajmebc_gam_post_imgsrc_data' ) );

		} else {
			return $post_id;
		}
	}
}
