<?php
namespace AcademyEA\Admin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use AcademyEA\Helper;

class TemplateManager {

	const CPTTYPE = 'academyea-template';
	const CPT_META = 'academyea_template_meta';

	public static function init() {
		$self = new self();

		// Load Scripts
		add_action( 'admin_enqueue_scripts', [ $self, 'enqueue_scripts' ] );

		// Print template edit popup.
		add_action( 'admin_footer', [ $self, 'print_popup' ] );

		// Template type column.
		add_action( 'manage_' . self::CPTTYPE . '_posts_columns', [ $self, 'manage_columns' ] );
		add_action( 'manage_' . self::CPTTYPE . '_posts_custom_column', [ $self, 'columns_content' ], 10, 2 );

		// query filter
		add_filter( 'parse_query', [ $self, 'query_filter' ] );

		// Template store ajax action
		add_action( 'wp_ajax_academyea_template_store', [ $self, 'template_store_request' ] );

		// Get template data Ajax action
		add_action( 'wp_ajax_academyea_get_template', [ $self, 'get_post_by_id' ] );

		// Manage Template Default Status
		add_action( 'wp_ajax_academyea_manage_default_template', [ $self, 'manage_template_status' ] );

	}

	/**
	 * Manage Post Table columns
	 *
	 * @param [array] $columns
	 * @return array
	 */
	public function manage_columns( $columns ) {

		$column_author  = $columns['author'];
		$column_date    = $columns['date'];

		unset( $columns['date'] );
		unset( $columns['author'] );

		$columns['type']        = esc_html__( 'Type', 'academy-elementor-addons' );
		$columns['setdefault']  = esc_html__( 'Default', 'academy-elementor-addons' );
		$columns['author']      = esc_html( $column_author );
		$columns['date']        = esc_html( $column_date );

		return $columns;
	}

	/**
	 * Manage Custom column content
	 *
	 * @param [string] $column_name
	 * @param [int]    $post_id
	 * @return void
	 */
	public function columns_content( $column_name, $post_id ) {
		$tmpType = get_post_meta( $post_id, 'academyea_template_meta_type', true );

		if ( ! array_key_exists( $tmpType, self::get_template_type() ) ) {
			return;
		}

		// Tabs Group
		if ( strpos( $tmpType, 'cart' ) !== false ) {
			$tmpTypeGroup = 'cart';
		} elseif ( strpos( $tmpType, 'myaccount' ) !== false ) {
			$tmpTypeGroup = 'myaccount';
		} elseif ( strpos( $tmpType, 'checkout' ) !== false ) {
			$tmpTypeGroup = 'checkout';
		} else {
			$tmpTypeGroup = $tmpType;
		}

		if ( 'type' === $column_name ) {
			$tabs = '';
			echo isset( self::get_template_type()[ $tmpType ] ) ? '<a class="column-tmptype" href="edit.php?post_type=' . esc_attr( self::CPTTYPE ) . '&template_type=' . esc_attr( $tmpType ) . '&tabs=' . esc_attr( $tmpTypeGroup ) . '">' . esc_attr( self::get_template_type()[ $tmpType ]['label'] ) . '</a>' : '-';
		} elseif ( 'setdefault' === $column_name ) {

			$value = Helper::get_option( self::get_template_type()[ $tmpType ]['optionkey'], 'academyea_template_tabs', '0' );

			$checked = checked( $value, $post_id, false );

			echo '<label class="academyea-default-tmp-status-switch" id="academyea-default-tmp-status-' . esc_attr( $tmpType ) . '-' . esc_attr( $post_id ) . '"><input class="academyea-status-' . esc_attr( $tmpType ) . '" id="academyea-default-tmp-status-' . esc_attr( $tmpType ) . '-' . esc_attr( $post_id ) . '" type="checkbox" value="' . esc_attr( $post_id ) . '" ' . esc_attr( $checked ) . '/><span><span>' . esc_html__( 'NO', 'academy-elementor-addons' ) . '</span><span>' . esc_html__( 'YES', 'academy-elementor-addons' ) . '</span></span><a>&nbsp;</a></label>';

		}

	}

	/**
	 * Check academyea template screen
	 *
	 * @return boolean
	 */
	private function is_current_screen() {
		global $pagenow, $typenow;
		return 'edit.php' === $pagenow && self::CPTTYPE === $typenow;
	}

	/**
	 * Manage Template filter by template type
	 *
	 * @param \WP_Query $query
	 * @return void
	 */
	public function query_filter( \WP_Query $query ) {

		if ( ! is_admin() || ! $this->is_current_screen() || ! empty( $query->query_vars['meta_key'] ) ) {
			return;
		}
		if ( isset( $_GET['template_type'] ) && ( '' !== $_GET['template_type'] ) && 'all' !== $_GET['template_type'] ) {// phpcs:ignore WordPress.Security.NonceVerification
			$type                              = isset( $_GET['template_type'] ) ? sanitize_key( $_GET['template_type'] ) : '';// phpcs:ignore WordPress.Security.NonceVerification
			$query->query_vars['meta_key']     = self::CPT_META . '_type';
			$query->query_vars['meta_value']   = $type;
			$query->query_vars['meta_compare'] = '=';
		}

	}

	/**
	 * Get Template Menu Tabs
	 *
	 * @return array
	 */
	public static function get_tabs() {

		$tabs = [
			'course' => [
				'label' => __( 'Course Single', 'academy-elementor-addons' ),
			],
		];

		return apply_filters( 'academyea_template_menu_tabs', $tabs );

	}

	/**
	 * Get Template Type
	 *
	 * @return array
	 */
	public static function get_template_type() {

		$template_type = [
			'course' => [
				'label'     => __( 'Course Single', 'academy-elementor-addons' ),
				'optionkey' => 'singlecoursepage',
			],
			'archive' => [
				'label'     => __( 'Course Archive', 'academy-elementor-addons' ),
				'optionkey' => 'archivepage',
			],
		];

		return apply_filters( 'academyea_template_types', $template_type );

	}

	/**
	 * Print Template edit popup
	 *
	 * @return void
	 */
	public function print_popup() {
		if ( isset( $_GET['post_type'] ) && 'academyea-template' === $_GET['post_type'] ) {// phpcs:ignore WordPress.Security.NonceVerification
			include_once ACADEMYEA_CORE_ROOT_PATH . 'includes/admin/templates/template_edit_popup.php';
		}
	}

	/**
	 * Manage Scripts
	 *
	 * @param [string] $hook
	 * @return void
	 */
	public function enqueue_scripts( $hook ) {

		if ( isset( $_GET['post_type'] ) && 'academyea-template' === $_GET['post_type'] ) {// phpcs:ignore WordPress.Security.NonceVerification
			wp_enqueue_style( 'academyea-template-edit-manager', ACADEMYEA_PLUGIN_URL . 'assets/admin/css/template_edit_manager.css', array(), ACADEMYEA_VERSION );

			wp_enqueue_style( 'academyea-sweetalert', ACADEMYEA_PLUGIN_URL . 'assets/admin/css/lib/sweetalert2.min.css', array(), ACADEMYEA_VERSION );

			wp_enqueue_script( 'academyea-sweetalert', ACADEMYEA_PLUGIN_URL . 'assets/admin/js/lib/sweetalert2.min.js', array(), ACADEMYEA_VERSION, true );

			wp_enqueue_script( 'academyea-template-edit-manager', ACADEMYEA_PLUGIN_URL . 'assets/admin/js/template_edit_manager.js', array( 'jquery', 'wp-util' ), ACADEMYEA_VERSION, true );

			$localize_data = [
				'ajaxurl'   => admin_url( 'admin-ajax.php' ),
				'nonce'     => wp_create_nonce( 'academyea_tmp_nonce' ),
				'templatetype' => self::get_template_type(),
				'adminURL'  => admin_url(),
				'labels' => [
					'fields' => [
						'name'  => [
							'title'       => __( 'Name your template', 'academy-elementor-addons' ),
							'placeholder' => __( 'Enter a template name', 'academy-elementor-addons' ),
						],
						'type'       => __( 'Select the type of template you want to work on', 'academy-elementor-addons' ),
						'setdefault' => __( 'Set As Default', 'academy-elementor-addons' ),
					],
					'head' => __( 'Template Builder', 'academy-elementor-addons' ),
					'buttons' => [
						'elementor' => [
							'label' => __( 'Edit With Elementor', 'academy-elementor-addons' ),
							'link'  => '#',
						],
						'save' => [
							'label'  => __( 'Save Settings', 'academy-elementor-addons' ),
							'saving' => __( 'Saving...', 'academy-elementor-addons' ),
							'saved'  => __( 'All Data Saved', 'academy-elementor-addons' ),
							'link'   => '#',
						],
					],
				],
			];
			wp_localize_script( 'academyea-template-edit-manager', 'ACADEMYEACPT', $localize_data );

		}//end if

	}

	/**
	 * Store Template
	 *
	 * @return void
	 */
	public function template_store_request() {
		if ( isset( $_POST ) ) {
			if ( ! wp_verify_nonce( $_POST['nonce'], 'academyea_tmp_nonce' ) ) {
				$errormessage = array(
					'message'  => __( 'Nonce Varification Faild !', 'academy-elementor-addons' ),
				);
				wp_send_json_error( $errormessage );
			}

			$title      = ! empty( $_POST['title'] ) ? sanitize_text_field( $_POST['title'] ) : esc_attr( 'AcademyEA template ' . time() );
			$tmpid      = ! empty( $_POST['tmpId'] ) ? sanitize_text_field( $_POST['tmpId'] ) : '';
			$tmpType    = ! empty( $_POST['tmpType'] ) ? sanitize_text_field( $_POST['tmpType'] ) : 'course';
			$setDefault = ! empty( $_POST['setDefault'] ) ? sanitize_text_field( $_POST['setDefault'] ) : 'no';
			$sampleTmpID = ! empty( $_POST['sampleTmpID'] ) ? sanitize_text_field( $_POST['sampleTmpID'] ) : '';
			$sampleTmpBuilder = ! empty( $_POST['sampleTmpBuilder'] ) ? sanitize_text_field( $_POST['sampleTmpBuilder'] ) : '';

			$data = [
				'title'         => $title,
				'id'            => $tmpid,
				'tmptype'       => $tmpType,
				'setdefaullt'   => $setDefault,
				'sampletmpid'   => $sampleTmpID,
				'sampletmpbuilder' => $sampleTmpBuilder,
			];

			if ( $tmpid ) {
				$this->update( $data );
			} else {
				$this->insert( $data );
			}
		} else {
			$errormessage = array(
				'message'  => __( 'Post request does not found', 'academy-elementor-addons' ),
			);
			wp_send_json_error( $errormessage );
		}//end if

	}

	/**
	 * Template Insert
	 *
	 * @param [array] $data
	 * @return void
	 */
	public function insert( $data ) {

		$args = [
			'post_type'    => self::CPTTYPE,
			'post_status'  => 'publish',
			'post_title'   => $data['title'],
		];
		$new_post_id = wp_insert_post( $args );

		if ( $new_post_id ) {
			$return = array(
				'message'  => __( 'Template has been inserted', 'academy-elementor-addons' ),
				'id'       => $new_post_id,
			);

			// Meta data
			update_post_meta( $new_post_id, self::CPT_META . '_type', $data['tmptype'] );
			update_post_meta( $new_post_id, '_wp_page_template', 'elementor_header_footer' );

			if ( 'yes' === $data['setdefaullt'] ) {
				$is_updated = $this->update_option( 'academyea_template_tabs', self::get_template_type()[ $data['tmptype'] ]['optionkey'], $new_post_id );

				if ( $is_updated ) {
					wp_send_json_success( array_merge( $return, [ 'set_default' => $is_updated ] ) );
				} else {
					$errormessage = array(
						'message'  => __( "Couldn't save as default", 'academy-elementor-addons' ),
					);
					wp_send_json_error( array_merge( $return, $errormessage ) );
				}
			}

			wp_send_json_success( $return );

		} else {
			$errormessage = array(
				'message'  => __( 'Some thing is worng !', 'academy-elementor-addons' ),
			);
			wp_send_json_error( $errormessage );
		}//end if

	}

	/**
	 * Template Update
	 *
	 * @param [array] $data
	 * @return void
	 */
	public function update( $data ) {

		$update_post_args = array(
			'ID'         => $data['id'],
			'post_title' => $data['title'],
		);
		wp_update_post( $update_post_args );

		// Update Meta data
		update_post_meta( $data['id'], self::CPT_META . '_type', $data['tmptype'] );
		update_post_meta( $data['id'], '_wp_page_template', 'elementor_header_footer' );

		$return = array(
			'message'  => __( 'Template has been updated', 'academy-elementor-addons' ),
			'id'       => $data['id'],
		);

		if ( 'yes' === $data['setdefaullt'] ) {
			$is_updated = $this->update_option( 'academyea_template_tabs', self::get_template_type()[ $data['tmptype'] ]['optionkey'], $data['id'] );
			if ( $is_updated ) {
				wp_send_json_success( array_merge( $return, [ 'set_default' => $is_updated ] ) );
			} else {
				$errormessage = array(
					'message'  => __( "Couldn't save as default", 'academy-elementor-addons' ),
				);
				wp_send_json_error( array_merge( $return, $errormessage ) );
			}
		} elseif ( 'no' === $data['setdefaullt'] ) {

			$default_template = Helper::get_option( 'singlecoursepage', 'academyea_template_tabs', '0' );

			if ( $data['id'] === $default_template ) {
				$is_updated = $this->update_option( 'academyea_template_tabs', self::get_template_type()[ $data['tmptype'] ]['optionkey'], '0' );

				if ( $is_updated ) {
					wp_send_json_success( array_merge( $return, [ 'unset_default' => $is_updated ] ) );
				} else {
					$errormessage = array(
						'message'  => __( "Couldn't unset as default", 'academy-elementor-addons' ),
					);
					wp_send_json_error( array_merge( $return, $errormessage ) );
				}
			}
		}//end if
		wp_send_json_success( $return );

	}

	/**
	 * Get Template data by id
	 *
	 * @return void
	 */
	public function get_post_by_id() {
		if ( isset( $_POST ) ) {
			if ( ! wp_verify_nonce( $_POST['nonce'], 'academyea_tmp_nonce' ) ) {
				$errormessage = array(
					'message'  => __( 'Nonce Varification Faild !', 'academy-elementor-addons' ),
				);
				wp_send_json_error( $errormessage );
			}

			$tmpid = ! empty( $_POST['tmpId'] ) ? sanitize_text_field( $_POST['tmpId'] ) : '';
			$postdata = get_post( $tmpid );
			$tmpType = ! empty( get_post_meta( $tmpid, self::CPT_META . '_type', true ) ) ? get_post_meta( $tmpid, self::CPT_META . '_type', true ) : 'course';
			$data = [
				'tmpTitle'   => $postdata->post_title,
				'tmpType'    => $tmpType,
				'setDefault' => isset( self::get_template_type()[ $tmpType ]['optionkey'] ) ? Helper::get_option( self::get_template_type()[ $tmpType ]['optionkey'], 'academyea_template_tabs', '0' ) : '0',
			];
			wp_send_json_success( $data );

		} else {
			$errormessage = array(
				'message'  => __( 'Some thing is worng !', 'academy-elementor-addons' ),
			);
			wp_send_json_error( $errormessage );
		}//end if

	}

	/**
	 * Set_default_template_type function
	 *
	 * @return void
	 */
	public function manage_template_status() {

		if ( isset( $_POST ) ) {
			if ( ! wp_verify_nonce( $_POST['nonce'], 'academyea_tmp_nonce' ) ) {
				$errormessage = array(
					'message'  => __( 'Nonce Varification Faild !', 'academy-elementor-addons' ),
				);
				wp_send_json_error( $errormessage );
			}

			$tmpid      = ! empty( $_POST['tmpId'] ) ? sanitize_text_field( $_POST['tmpId'] ) : '0';
			$tmpType    = ! empty( $_POST['tmpType'] ) ? sanitize_text_field( $_POST['tmpType'] ) : 'course';

			$is_updated = $this->update_option( 'academyea_template_tabs', self::get_template_type()[ $tmpType ]['optionkey'], $tmpid );
			if ( $is_updated ) {
				$return = array(
					'message'   => __( 'Template has been updated', 'academy-elementor-addons' ),
					'id'        => $tmpid,
					'is_updated' => $is_updated,
				);
				wp_send_json_success( $return );
			} else {
				$errormessage = array(
					'message'  => __( 'Template could not updated!', 'academy-elementor-addons' ),
				);
				wp_send_json_error( $errormessage );
			}
		} else {
			$errormessage = array(
				'message'  => __( 'Some thing is worng !', 'academy-elementor-addons' ),
			);
			wp_send_json_error( $errormessage );
		}//end if

	}

	/**
	 * Update_option
	 *
	 * @param  mixed $section
	 * @param  mixed $option_key
	 * @param  mixed $new_value
	 * @return string
	 */
	public function update_option( $section, $option_key, $new_value ) {
		if ( null === $new_value ) {
			$new_value = ''; }
		$options_datad = is_array( get_option( $section ) ) ? get_option( $section ) : array();
		$options_datad[ $option_key ] = $new_value;
		$updated = update_option( $section, $options_datad );
		return $updated;
	}

}
