<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ACFC
 * @copyright  Copyright (c) 2025, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\ACFC;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

if ( ! class_exists( 'ACFC_Extend_Field_Types' ) ) {

	class ACFC_Extend_Field_Types {
		/**
		 * Consturtor.
		 */
		public function __construct() {
			// Add constructor content...
		}

		/**
		 * Initializor.
		 */
		public function init() {
			add_action( 'wp_loaded', array( $this, 'on_loaded' ) );
			add_action( 'acf/include_field_types', array( $this, 'extend_field_types' ) );
		}

		/**
		 * Plugin loaded.
		 */
		public function on_loaded() {
			// Add on_loaded actions and filters...
		}

		/**
		 * Extend ACF field types.
		 */
		public function extend_field_types() {
			global $pagenow;

			$acfc_admin = new ACFC_Admin();

			$has_user_cap = $acfc_admin->check_user_cap();

			if ( ! $has_user_cap ) {
				return;
			}

			$post_id = absint( isset( $_GET['post'] ) ? $_GET['post'] : ( isset( $_POST['post_ID'] ) ? $_POST['post_ID'] : 0 ) );
			$post    = ( 0 !== $post_id ) ? get_post( $post_id ) : false;

			if ( in_array( $pagenow, array( 'post-new.php', 'post.php' ), true ) ) {
				if ( in_array( $post->post_type, array( 'acf-field-group' ), true ) ) {
					// Extend render field settings.
					add_action( 'acf/render_field_settings/type=button_group', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=checkbox', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=color_picker', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=date_picker', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=date_time_picker', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=email', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=file', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=icon_picker', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=image', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=link', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=number', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=oembed', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=page_link', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=password', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=post_object', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=radio', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=range', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=relationship', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=select', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=taxonomy', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=text', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=textarea', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=time_picker', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=true_false', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=url', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=user', array( $this, 'extend_render_field_settings' ) );
					add_action( 'acf/render_field_settings/type=wysiwyg', array( $this, 'extend_render_field_settings' ) );
					// Extend prepare field.
					add_filter( 'acf/prepare_field/type=button_group', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=checkbox', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=color_picker', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=date_picker', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=date_time_picker', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=email', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=file', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=icon_picker', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=image', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=link', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=number', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=oembed', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=page_link', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=password', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=post_object', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=radio', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=range', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=relationship', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=select', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=taxonomy', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=text', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=textarea', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=time_picker', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=true_false', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=url', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=user', array( $this, 'extend_prepare_field' ) );
					add_filter( 'acf/prepare_field/type=wysiwyg', array( $this, 'extend_prepare_field' ) );
				}
			}
		}

		/**
		 * Add additional settings to the existing button group field.
		 */
		public function extend_render_field_settings( $field ) {
			// Add a "Components" dropdown setting.
			$acfc_html_components = new ACFC_HTML_Components();

			acf_render_field_setting(
				$field,
				array(
					'label'        => __( 'Library', 'acf-copilot' ),
					'instructions' => __( 'Collection with ready to use Base and Bootstrap components.', 'acf-copilot' ),
					'type'         => 'select',
					'name'         => 'html_components_' . $field['key'],
					'class'        => 'acfc-html-components',
					'ui'           => 1,
					'choices'      => $acfc_html_components->load(),
				),
				true
			);

			// Add a "Custom Template" textarea setting.
			acf_render_field_setting(
				$field,
				array(
					'label'        => __( 'Custom Template', 'acf-copilot' ),
					'instructions' => __( "Quickly add field code snippet to the custom template.<br /><br /><code><a href='#' class='acfc-custom-field-name' title='Add custom field name...'>&lt;?php the_field( '\${field_name}' ); ?&gt;</a></code>", 'acf-copilot' ),
					'type'         => 'textarea',
					'name'         => 'custom_template_' . $field['key'],
					'class'        => 'acfc-cm-editor',
					'ui'           => 1,
					'rows'         => 8,
				),
				true
			);
		}

		/**
		 * Modify the rendered field to include the "Custom Template" as a hidden input.
		 */
		public function extend_prepare_field( $field ) {
			// Add hidden input for custom template if it's defined.
			if ( isset( $field[ 'custom_template_' . $field['key'] ] ) && '' !== $field[ 'custom_template_' . $field['key'] ] ) {
				$field['html'] .= sprintf(
					'<input type="hidden" name="%1$s_custom_template" value="%2$s" data-name="custom_template" />',
					esc_attr( $field['name'] ),
					esc_html( $field[ 'custom_template_' . $field['key'] ] )
				);
			}
			return $field;
		}
	}

	// Initialize.
	$acfc_extend_field_types = new ACFC_Extend_Field_Types();
	$acfc_extend_field_types->init();
}
