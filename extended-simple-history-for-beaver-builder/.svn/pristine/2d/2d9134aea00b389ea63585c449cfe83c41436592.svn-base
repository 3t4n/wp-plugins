<?php
/**
 * Beaver Builder Logger
 *
 * Logs more details for Beaver Builder edits.
 *
 * @package Extended_Simple_History_Beaver_Builder
 * @since 1.0.0
 */

namespace WEBDOGS\Extended_Simple_History_Beaver_Builder\Classes\Simple_History\Loggers;

if ( ! defined( 'WPINC' ) ) {
	exit;
}

if ( ! class_exists( '\Simple_History\Loggers\Logger' ) ) {
	exit;
}

use WEBDOGS\Extended_Simple_History_Beaver_Builder as Plugin;
use WEBDOGS\Extended_Simple_History_Beaver_Builder\Scripts_Styles;


/**
 * Beaver Builder Logger.
 *
 * Logs more details for Beaver Builder edits.
 * Upated in 1.2.0 to extend \Simple_History\Loggers\Logger
 *
 * @since 1.0.0
 *
 * @see \Simple_History\Loggers\Logger
 */
class Beaver_Builder extends \Simple_History\Loggers\Logger {

	use \WEBDOGS\Extended_Simple_History_Beaver_Builder\Classes\Memoize_Get;

	/**
	 * Logger Slug. Use the plugin namespace basename.
	 * If the plugin namespace basename is longer than 30 characters,
	 * it will be truncated in the construct method.
	 *
	 * @since 1.0.0
	 * @access public
	 * @var string $slug The logger slug.
	 */
	public $slug = Plugin\ROOT_NAMESPACE_BASENAME;

	/**
	 * Data from the post, before it is saved.
	 *
	 * @since 1.0.0
	 * @access public
	 * @var array $post_pre_save Data from the post, before it is saved.
	 */
	public $post_pre_save;

	/**
	 * Translatable strings.
	 *
	 * @since 1.0.0
	 * @access public
	 * @var array $label_strings Array of translatable strings.
	 */
	public $label_strings = array();

	/**
	 * Constructor.
	 *
	 * Set object values and initiate the parent constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param object $simple_history Optional. Simple History object.
	 * @return void.
	 */
	public function __construct( $simple_history = null ) {
		$this->slug = substr( Plugin\ROOT_NAMESPACE_BASENAME, 0, min( 30, strlen( Plugin\ROOT_NAMESPACE_BASENAME ) ) );

		$this->label_strings = array(
			'rendered' => __( 'Rendered', 'extended-simple-history-beaver-builder' ),
			'setting'  => __( 'Settings', 'extended-simple-history-beaver-builder' ),
			'position' => __( 'Position', 'extended-simple-history-beaver-builder' ),
		);

		parent::__construct( $simple_history );
	}

	/**
	 * Get Logger Info.
	 *
	 * Returns details about the logger.
	 * Upated in 1.2.0 from getInfo to get_info
	 *
	 * @since 1.0.0
	 *
	 * @return array Details about the logger for the Simple History admin page.
	 */
	public function get_info(): array {
		return array(
			'name'        => 'Beaver Builder Logging',
			'description' => _x(
				'Logs more details for Beaver Builder edits.',
				'Logger: Beaver Builder',
				'extended-simple-history-beaver-builder'
			),
			'name_via'    => _x(
				'Using plugin Beaver Builder',
				'Logger: Beaver Builder',
				'extended-simple-history-beaver-builder'
			),
			'capability'  => 'manage_options',
			'messages'    => array(
				'post_updated'           => __(
					'Beaver Builder {post_type_label} "{post_title}" updated',
					'extended-simple-history-beaver-builder'
				),
				'post_draft'             => __(
					'Beaver Builder {post_type_label} "{post_title}" draft saved',
					'extended-simple-history-beaver-builder'
				),
				'global_settings_update' => __(
					'Beaver Builder Global Settings Updated',
					'extended-simple-history-beaver-builder'
				),
			),
		);
	}

	/**
	 * Loaded function.
	 *
	 * Runs when the logger is loaded. Sets up the actions to log data.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function loaded(): void {
		$this_logger = $this;

		add_action(
			'fl_builder_before_save_layout',
			array( $this, 'set_pre_save_data' ),
			1
		);

		add_action(
			'fl_builder_after_save_layout',
			array( $this, 'log_post_updated_notice_message' ),
			10,
			2
		);

		add_action(
			'fl_builder_after_save_draft',
			array( $this, 'log_post_draft_notice_message' )
		);

		add_action(
			'update_option',
			// Log and update to the builder global settings if _fl_builder_settings is updated.
			function( string $option, $old_value, $value ) use ( $this_logger ): void {
				if ( '_fl_builder_settings' === $option ) {
					$this_logger->log_global_settings_update( $value, $old_value );
				}
			},
			10,
			3
		);
	}

	/**
	 * Log a global settings update notice message if needed.
	 *
	 * Create a notice context and log a notice if needed.
	 *
	 * @since 1.0.0
	 *
	 * @see \Simple_History\Loggers\Logger::notice_message
	 *
	 * @param object $new_settings The new value of the _fl_builder_settings option.
	 * @param object $old_settings The old value of the _fl_builder_settings option.
	 * @return void
	 */
	public function log_global_settings_update( object $new_settings, object $old_settings ): void {
		$context = array(
			'type'  => 'global_settings',
			'diffs' => array(),
		);

		foreach ( $new_settings as $setting_key => $setting_value ) {
			if ( $setting_value !== $old_settings->$setting_key ) {
				$context['diffs'][] = array(
					'diff_type' => 'update',
					'type'      => 'setting',
					// Translators: %s is the Beaver Builder setting slug.
					'label'     => sprintf( __( 'Global Setting %s', 'extended-simple-history-beaver-builder' ), $setting_key ),
					'diff'      => array(
						'old' => $old_settings->$setting_key,
						'new' => $setting_value,
					),
				);
			}
		}

		if ( $context['diffs'] && count( $context['diffs'] ) ) {
			$this->notice_message( 'global_settings_update', $context );
		}
	}

	/**
	 * Store the pre-save post data.
	 *
	 * On the fl_builder_before_save_layout action, store the pre-save post data to $post_pre_save.
	 *
	 * @since 1.0.0
	 *
	 * @see \FLBuilderModel
	 *
	 * @param int $post_id The saving post ID.
	 * @return void
	 */
	public function set_pre_save_data( int $post_id ): void {
		$this->post_pre_save = array(
			'post'            => get_post( $post_id ),
			'layout-settings' => \FLBuilderModel::get_layout_settings( 'published', $post_id ),
			'layout-data'     => \FLBuilderModel::get_layout_data( 'published', $post_id ),
			'fl-builder-data' => get_post_meta( $post_id, '_fl_builder_data', true ),
		);
	}

	/**
	 * Log a draft notice message if needed.
	 *
	 * Create a notice context and log a notice if needed.
	 *
	 * @since 1.0.0
	 *
	 * @see \Simple_History\Loggers\Logger::notice_message
	 * @see \FLBuilderModel
	 *
	 * @param int $post_id The saving post ID.
	 * @return void
	 */
	public function log_post_draft_notice_message( int $post_id ): void {
		$post_type_name   = get_post_type( $post_id );
		$post_type_object = get_post_type_object( $post_type_name );

		$context = array(
			'type'            => 'draft',
			'post_title'      => get_the_title( $post_id ),
			'post_type'       => $post_type_name,
			'post_type_label' => $post_type_object->labels->singular_name,
			'post_url'        => get_permalink( $post_id ),
		);

		$context['diffs'] = self::generate_context_diffs(
			array(
				'post'            => get_post( $post_id ),
				'layout-settings' => \FLBuilderModel::get_layout_settings( 'draft', $post_id ),
				'layout-data'     => \FLBuilderModel::get_layout_data( 'draft', $post_id ),
				'fl-builder-data' => get_post_meta( $post_id, '_fl_builder_draft', true ),
			),
			array(
				'post'            => get_post( $post_id ),
				'layout-settings' => \FLBuilderModel::get_layout_settings( 'published', $post_id ),
				'layout-data'     => \FLBuilderModel::get_layout_data( 'published', $post_id ),
				'fl-builder-data' => get_post_meta( $post_id, '_fl_builder_data', true ),
			)
		);

		$this->notice_message( 'post_draft', $context );
	}

	/**
	 * Log an update notice message if needed.
	 *
	 * Create a notice context and log a notice if needed.
	 *
	 * @since 1.0.0
	 *
	 * @see \Simple_History\Loggers\Logger::notice_message
	 * @see \FLBuilderModel
	 *
	 * @param int  $post_id The saving post ID.
	 * @param bool $publish True if a published change.
	 * @return void
	 */
	public function log_post_updated_notice_message( int $post_id, bool $publish ): void {
		$post_data = array(
			'type'            => 'publish',
			'post'            => get_post( $post_id ),
			'layout-settings' => \FLBuilderModel::get_layout_settings( 'published', $post_id ),
			'layout-data'     => \FLBuilderModel::get_layout_data( 'published', $post_id ),
			'fl-builder-data' => get_post_meta( $post_id, '_fl_builder_data', true ),
		);

		if ( ! is_array( $post_data['fl-builder-data'] ) ) {
			$post_data['fl-builder-data'] = array();
		}

		$post_type_object = get_post_type_object( $post_data['post']->post_type );

		$context = array(
			'post_title'      => $post_data['post']->post_title,
			'post_type'       => $post_data['post']->post_type,
			'post_type_label' => $post_type_object->labels->singular_name,
			'post_url'        => get_permalink( $post_data['post']->ID ),
		);

		$context['diffs'] = self::generate_context_diffs( $post_data, $this->post_pre_save );

		if ( $publish ) {
			if ( $context['diffs'] && count( $context['diffs'] ) ) {
				$this->notice_message( 'post_updated', $context );
			}

			delete_post_meta( $post_id, 'node_moved' );
		}
	}

	/**
	 * Get module object by type.
	 *
	 * @since 1.0.0
	 *
	 * @see \FLBuilderModel
	 *
	 * @param string $module_type The module type.
	 * @return object The module object.
	 */
	protected static function get_module( ?string $module_type = '' ): ?object {
		if ( ! $module_type ) {
			return null;
		}

		$uncategorized_modules = self::memoize_get( array( 'FLBuilderModel', 'get_uncategorized_modules' ) );

		return array_reduce(
			$uncategorized_modules,
			function( $matched_module, $module ) use ( $module_type ) {
				if ( $matched_module ) {
					return $matched_module;
				}

				if ( $module_type === $module->slug ) {
					return $module;
				}

				return $matched_module;
			},
			null
		);
	}

	/**
	 * Get module object by node.
	 *
	 * @since 1.0.0
	 *
	 * @param object $node The node.
	 * @return object The module object.
	 */
	protected static function get_node_module( object $node ): ?object {
		$module_type = '';

		if ( isset( $node->settings )
			&& is_object( $node->settings )
			&& isset( $node->settings->type )
			&& is_string( $node->settings->type )
		) {
			$module_type = $node->settings->type;
		}

		return self::memoize_get( array( self::class, 'get_module' ), array( $module_type ) );
	}

	/**
	 * Get an array of a module's setting labels.
	 *
	 * @since 1.0.0
	 *
	 * @see \FLBuilderModel
	 *
	 * @param string $module_slug The module slug string.
	 * @return array An array of setting label strings.
	 */
	protected static function get_module_form_field_labels( string $module_slug ): ?array {
		$fields = array();

		if ( ! class_exists( 'FLBuilderModel' )
			|| ! \FLBuilderModel::$modules
			|| ! isset( \FLBuilderModel::$modules[ $module_slug ] )
			|| ! \FLBuilderModel::$modules[ $module_slug ]
			|| ! isset( \FLBuilderModel::$modules[ $module_slug ]->form )
			|| ! \FLBuilderModel::$modules[ $module_slug ]->form
			|| ! is_iterable( \FLBuilderModel::$modules[ $module_slug ]->form )
		) {
			return $fields;
		}

		foreach ( \FLBuilderModel::$modules[ $module_slug ]->form as $tab_slug => $tab ) {
			if ( isset( $tab['sections'] )
				&& $tab['sections']
				&& is_iterable( $tab['sections'] )
			) {
				foreach ( $tab['sections'] as $section_slug => $section ) {
					if ( isset($section['fields'] )
						&& $section['fields']
						&& is_iterable( $section['fields'] )
					) {
						foreach ( $section['fields'] as $field_slug => $field ) {
							$fields[ $field_slug ] = array(
								'slug'    => $field_slug,
								'type'    => $field['type'],
								'label'   => isset( $field['label'] ) ? $field['label'] : ( isset( $field['title'] ) ? $field['title'] : $field_slug ),
								'section' => array(
									'slug'  => $section_slug,
									'label' => isset( $section['label'] ) ? $section['label'] : ( isset( $section['title'] ) ? $section['title'] : $section_slug ),
								),
								'tag'     => array(
									'slug'  => $tab_slug,
									'label' => isset( $tab['label'] ) ? $tab['label'] : ( isset( $tab['title'] ) ? $tab['title'] : $tab_slug ),
								),
							);
						}
					}
				}
			}
		}

		return $fields;
	}

	/**
	 * Get an array of a node's setting labels.
	 *
	 * @since 1.0.0
	 *
	 * @param object $node The node.
	 * @return array An array of setting label strings.
	 */
	protected static function get_node_module_form_field_labels( object $node ): ?array {
		if ( isset( $node->settings )
			&& is_object( $node->settings )
			&& isset( $node->settings->type )
			&& is_string( $node->settings->type )
		) {
			return self::memoize_get( array( self::class, 'get_module_form_field_labels' ), array( $node->settings->type ) );
		}

		return array();
	}

	/**
	 * Parse update data and return diffs.
	 *
	 * Compare new and old data to find any added, deleted, or updated data.
	 *
	 * @since 1.0.0
	 *
	 * @see \FLBuilder
	 * @see \FLBuilderModel
	 *
	 * @param array $new_data An array of new builder data.
	 * @param array $old_data An array of old builder data.
	 * @return array An array of diffs for the notice context.
	 */
	public static function generate_context_diffs( array $new_data, array $old_data ): array {

		$moved_nodes = false;

		if ( isset( $new_data['post'] )
			&& isset( $new_data['post']->ID )
		) {
			$moved_nodes = get_post_meta( $new_data['post']->ID, 'node_moved' );
		}

		$diffs = array();

		if ( isset( $new_data['layout-settings'] ) ) {
			foreach ( $new_data['layout-settings'] as $setting_key => $setting_value ) {
				if ( isset( $old_data['layout-settings'] )
					&& isset( $old_data['layout-settings']->$setting_key )
					&& $setting_value !== $old_data['layout-settings']->$setting_key
				) {
					$diffs[] = array(
						'diff_type' => 'update',
						'type'      => 'setting',
						// Translators: %s is the Beaver Builder setting slug.
						'label'     => sprintf( __( 'Layout %s', 'extended-simple-history-beaver-builder' ), $setting_key ),
						'diff'      => array(
							'old' => $old_data['layout-settings']->$setting_key,
							'new' => $setting_value,
						),
					);
				}
			}
		}

		if ( isset( $old_data['fl-builder-data'] )
			&& is_array( $old_data['fl-builder-data'] )
			&& isset( $new_data['fl-builder-data'] )
			&& is_array( $new_data['fl-builder-data'] )
		) {
			foreach ( array_diff( array_keys( $old_data['fl-builder-data'] ), array_keys( $new_data['fl-builder-data'] ) ) as $deleted_node_id ) {
				$deleted_node = $old_data['fl-builder-data'][ $deleted_node_id ];

				$old_node = null;

				$diff = array(
					'diff_type' => 'delete',
					'type'      => $deleted_node->type,
					// Translators: %1$s is the Beaver Builder node type (Row, Column-group, Column, or Module). %2$s is the Module type if the node type is module, otherwise an empty string.
					'label'     => trim( sprintf( __( 'Deleted: %1$s %2$s', 'extended-simple-history-beaver-builder' ), ucfirst( $deleted_node->type ), ( 'module' === $deleted_node->type ? $deleted_node->settings->type : '' ) ) ),
					'graphic'   => self::get_node_position_graphic( $deleted_node, $old_data['fl-builder-data'] ),
					'diff'      => array(),
				);

				$diffs[] = $diff;
			}
		}

		if ( isset( $new_data['fl-builder-data'] )
			&& is_array( $new_data['fl-builder-data'] )
		) {
			foreach ( $new_data['fl-builder-data'] as $node_key => $node ) {

				$old_node      = null;
				$node_module   = self::get_node_module( $node );
				$module_fields = self::get_node_module_form_field_labels( $node );

				$diff = array(
					'diff_type' => 'update',
					'type'      => $node->type,
					'label'     => trim(
						sprintf(
							// Translators: %1$s is the Beaver Builder node type (Row, Column-group, Column, or Module). %2$s is the Module type if the node type is module, otherwise an empty string.
							__( '%1$s %2$s', 'extended-simple-history-beaver-builder' ),
							ucfirst( $node->type ),
							( $node_module ? $node_module->name : '' )
						)
					),
					'graphic'   => self::get_node_position_graphic( $node, $new_data['fl-builder-data'] ),
					'diff'      => array(),
				);

				if ( isset( $old_data['fl-builder-data'] )
					&& $old_data['fl-builder-data']
					&& isset( $old_data['fl-builder-data'][ $node_key ] )
					&& $old_data['fl-builder-data'][ $node_key ]
				) {
					$old_node = $old_data['fl-builder-data'][ $node_key ];
				} else {
					if ( 'column-group' === $node->type ) {
						continue;
					}

					$diff['diff_type'] = 'new';

					$diff['label'] = trim(
						sprintf(
							// Translators: %1$s is the Beaver Builder node type (Row, Column-group, Column, or Module). %2$s is the Module type if the node type is module, otherwise an empty string.
							__( 'New %1$s %2$s', 'extended-simple-history-beaver-builder' ),
							ucfirst( $node->type ),
							( $node_module ? $node_module->name : '' )
						)
					);

					$diffs[] = $diff;
					continue;
				}

				if ( ! $old_node ) {
					continue;
				}

				if ( in_array(
					$node->type,
					array(
						'module',
						'column',
						'row',
					),
					true
				) ) {
					if ( wp_json_encode( $old_node->settings ) !== wp_json_encode( $node->settings ) ) {
						foreach ( $node->settings as $setting_key => $setting_value ) {
							if ( isset( $old_node->settings->$setting_key )
								&& wp_json_encode( $old_node->settings->$setting_key ) !== wp_json_encode( $setting_value )
								&& wp_json_encode( $old_node->settings->$setting_key ) !== $setting_value
								&& ( $old_node->settings->$setting_key || $setting_value )
							) {
								$diff['diff'][ $setting_key ] = array(
									'type'        => 'setting',
									'label'       => isset( $module_fields[ $setting_key ]['label'] ) ? $module_fields[ $setting_key ]['label'] : $setting_key,
									'old'         => wp_json_encode( $old_node->settings->$setting_key ),
									'new'         => wp_json_encode( $setting_value ),
									'old_graphic' => self::get_setting_graphic( $old_node, $setting_key ),
									'new_graphic' => self::get_setting_graphic( $node, $setting_key ),
								);
							}
						}
					}
				}

				if ( in_array( $node->node, $moved_nodes, true ) ) {
					$old_position_graphic = self::get_node_position_graphic( $old_node, $old_data['fl-builder-data'] );
					$new_position_graphic = self::get_node_position_graphic( $node, $new_data['fl-builder-data'] );

					if ( $old_position_graphic !== $new_position_graphic ) {
						$diff['diff']['moved'] = array(
							'type'  => 'position',
							'label' => __( 'Moved', 'extended-simple-history-beaver-builder' ),
							'old'   => $old_position_graphic,
							'new'   => $new_position_graphic,
						);
					}
				}

				if ( count( $diff['diff'] ) ) {
					uasort(
						$diff['diff'],
						// Sort order for diff type: position, setting.
						function( $a, $b ) {
							if ( $a['type'] === $b['type'] ) {
								return 0;
							}

							if ( 'position' === $a['type'] ) {
								return -1;
							}

							if ( 'position' === $b['type'] ) {
								return 1;
							}

							return 0;
						}
					);

					$diffs[] = $diff;
				}
			}
		}

		return $diffs;
	}

	/**
	 * Get a prefixed css class string.
	 *
	 * @since 1.0.0
	 *
	 * @param string $css_class The un-prefixed css class string.
	 * @return string The prefixed css class string.
	 */
	protected static function get_prefixed_css_class( string $css_class ): string {
		return Plugin\BASENAME . '-' . $css_class;
	}

	/**
	 * Add details to the log row output.
	 *
	 * Add a post link and details about Beaver Builder changes.
	 * Upated in 1.2.0 from getLogRowDetailsOutput
	 * to get_log_row_details_output
	 *
	 * @since 1.0.0
	 *
	 * @param object $row The row data object. We cannot use typehinting here because it must be compatible with the parent method.
	 * @return string Row details output.
	 */
	public function get_log_row_details_output( $row ) {
		$output = '';

		if ( $row->context['post_url'] ) {
			// Translators: %s is the post type.
			$output .= '<div class="view-page"><a href="' . esc_url( $row->context['post_url'] ) . '">' . sprintf( __( 'View %s', 'extended-simple-history-beaver-builder' ), esc_html( $row->context['post_type'] ) ) . '</a></div>';
		}

		$diffs = json_decode( $row->context['diffs'], true );

		if ( is_array( $diffs ) && count( $diffs ) ) {

			foreach ( $diffs as $diff ) {

				$output .= '<div class="' . esc_attr( self::get_prefixed_css_class( 'diff' ) ) . ' ' . esc_attr( self::get_prefixed_css_class( 'diff-' . $diff['type'] ) ) . ' diff-type-' . esc_attr( $diff['diff_type'] ) . '">';
				$output .= '<button class="' . esc_attr( self::get_prefixed_css_class( 'diff-label' ) ) . '">' . esc_html( $diff['label'] ) . '<span class="screen-reader-text">' . __( ' Click to view/hide', 'extended-simple-history-beaver-builder' ) . '</span></button>';
				$output .= '<div class="' . esc_attr( self::get_prefixed_css_class( 'diff-container' ) ) . '">';

				switch ( $diff['type'] ) {
					case 'module':
					case 'row':
					case 'column':
						$output .= $diff['graphic'];

						$current_section = null;

						if ( $diff['diff'] && is_iterable( $diff['diff'] ) && count( $diff['diff'] ) ) {

							foreach ( $diff['diff'] as $diff_key => $diff_values ) {

								if ( $current_section !== $diff_values['type'] ) {
									if ( $current_section ) {
										$output .= '</div>';
									}
									$output .= '<div class="' . esc_attr( self::get_prefixed_css_class( 'diff-section' ) ) . '">';

									$current_section = $diff_values['type'];
								}

								if ( isset( $row->context['type'] ) && 'draft' === $row->context['type'] ) {
									// Translators: %s is the diff label.
									$output .= '<button class="' . esc_attr( self::get_prefixed_css_class( 'diff-label' ) ) . ' ' . esc_attr( self::get_prefixed_css_class( 'diff-label-setting' ) ) . '">' . sprintf( __( 'Drafted change: %s', 'extended-simple-history-beaver-builder' ), esc_html( isset( $diff_values['label'] ) ? $diff_values['label'] : $diff_key ) ) . '<span class="screen-reader-text">' . __( ' Click to view/hide', 'extended-simple-history-beaver-builder' ) . '</span></button>';
								} else {
									// Translators: %s is the diff label.
									$output .= '<button class="' . esc_attr( self::get_prefixed_css_class( 'diff-label' ) ) . ' ' . esc_attr( self::get_prefixed_css_class( 'diff-label-setting' ) ) . '">' . sprintf( __( 'Updated: %s', 'extended-simple-history-beaver-builder' ), esc_html( isset( $diff_values['label'] ) ? $diff_values['label'] : $diff_key ) ) . '<span class="screen-reader-text">' . __( ' Click to view/hide', 'extended-simple-history-beaver-builder' ) . '</span></button>';
								}

								$output .= '<div class="' . esc_attr( self::get_prefixed_css_class( 'diff-container' ) ) . '">';

								if ( 'moved' === $diff_key ) {
									$output .= '<table class="node-moved-diff">';
									$output .= '<tbody>';
									$output .= '<tr>';
									$output .= '<td class="node-position-old">';
									$output .= $diff_values['old'];
									$output .= '</td>';
									$output .= '<td class="node-position-new">';
									$output .= $diff_values['new'];
									$output .= '</td>';
									$output .= '</tr>';
									$output .= '</tbody>';
									$output .= '</table>';
								} else {
									if ( $diff_values['old_graphic'] && $diff_values['new_graphic'] ) {
										$output .= self::graphic_diff( $diff_values );
									}
									$output .= \Simple_History\Helpers::text_diff( $diff_values['old'], $diff_values['new'] );
								}

								// div.{css-prefix}-diff-container.
								$output .= '</div>';
							}

							// div.{css-prefix}-diff-section.
							$output .= '</div>';
						}

						break;
					case 'setting':
					default:
						if ( isset( $diff['diff'] )
							&& isset( $diff['diff']['old'] )
							&& isset( $diff['diff']['new'] )
						) {
							$diff_old = '';
							$diff_new = '';

							if ( is_string( $diff['diff']['old'] )
								&& is_string( $diff['diff']['new'] )
							) {
								$diff_old = $diff['diff']['old'];
								$diff_new = $diff['diff']['new'];
							} else {
								$diff_old = wp_json_encode( $diff['diff']['old'] );
								$diff_new = wp_json_encode( $diff['diff']['new'] );
							}

							if ( $diff_old && $diff_new ) {
								$output .= \Simple_History\Helpers::text_diff( $diff_old, $diff_new );
							}
						}

						break;
				}

				// div.{css-prefix}-diff-container.
				$output .= '</div>';

				// div.{css-prefix}-beaver-builder-diff.
				$output .= '</div>';
			}
		}

		return $output;
	}

	/**
	 * Get setting graphic if available.
	 *
	 * Generate a div element and CSS to represent a setting value.
	 *
	 * @since 1.1.0
	 *
	 * @param object $node The Beaver Builder node for the setting.
	 * @param string $key The setting name.
	 * @return string An HTML string. A div element and CSS to represent a setting value.
	 */
	public static function get_setting_graphic( object $node, string $key ): string {
		$output_graphic = false;

		$graphic_id = 'graphic-id-' . md5( wp_json_encode( array( $node, $key, time() ) ) );

		if ( in_array(
			$key,
			array(
				'bg_overlay_type',
				'bg_type',
			),
			true
		) ) {
			$key = str_replace( 'type', $node->settings->$key, $key );
		}

		ob_start();
		?>
		<style>
		#<?php echo esc_attr( $graphic_id ); ?> {
			<?php
			if ( false === $output_graphic ) {

				// Handle settings by key.
				switch ( $key ) {
					case 'border':
					case 'photo_border':
					case 'btn_border':
						foreach ( \FLBuilderCSS::border_field_props( $node->settings->$key ) as $border_setting => $border_value ) {
							switch ( $border_setting ) {
								case 'color':
								case 'border-color':
									if ( class_exists( 'FLBuilderColor' ) && method_exists( 'FLBuilderColor', 'hex_or_rgb' ) ) {
										echo esc_attr( $border_setting ) . ':' . esc_attr( \FLBuilderColor::hex_or_rgb( $border_value ) ) . ';';
									}
									break;
								default:
									echo esc_attr( $border_setting ) . ':' . esc_attr( $border_value ) . ';';
									break;
							}
						}
						$output_graphic = true;
						break;
				}
			}

			// Catch color values.
			if ( false === $output_graphic
				&& is_string( $node->settings->$key )
				&& ( sanitize_hex_color_no_hash( $node->settings->$key ) === $node->settings->$key
					|| sanitize_hex_color( $node->settings->$key ) === $node->settings->$key
					|| preg_match( '/^rgba?\x28([012]\d\d|\d\d{0,1})(\s*?,\s*?)([012]\d\d|\d\d{0,1})(\s*?,\s*?)([012]\d\d|\d\d{0,1})((\s*?,\s*?)(0?\.\d+|[01]))?\x29$/', $node->settings->$key )
				)
			) {
				if ( class_exists( 'FLBuilderColor' ) && method_exists( 'FLBuilderColor', 'hex_or_rgb' ) ) {
					?>
					background-color: <?php echo esc_attr( \FLBuilderColor::hex_or_rgb( $node->settings->$key ) ); ?>;
					<?php
				}
				$output_graphic = true;
			}

			// Catch gradient values.
			if ( false === $output_graphic
				&& class_exists( 'FLBuilderColor' )
				&& method_exists( 'FLBuilderColor', 'gradient' )
				&& is_array( $node->settings->$key )
				&& isset( $node->settings->$key['colors'] )
				&& isset( $node->settings->$key['stops'] )
				&& isset( $node->settings->$key['type'] )
			) {
				$gradient_string = \FLBuilderColor::gradient( $node->settings->$key );

				if ( is_string( $gradient_string ) && ! empty( $gradient_string ) ) {
					?>
					background-image: <?php echo esc_attr( $gradient_string ); ?>;
					<?php
					$output_graphic = true;
				}
			}
			?>
		}
		</style>
		<div id="<?php echo esc_attr( $graphic_id ); ?>" class="<?php echo esc_attr( self::get_prefixed_css_class( 'graphic-diff-inner' ) ); ?> <?php echo esc_attr( self::get_prefixed_css_class( 'graphic-diff-' . sanitize_title( $key ) ) ); ?>"></div>
		<?php

		if ( $output_graphic ) {
			return trim(
				preg_replace(
					array(
						'/\s+/',
						'/<style>\s*#/',
						'/>\s*</',
						'/\s*{\s*/',
						'/\s*}\s*/',
						'/\s*:\s*/',
						'/\s*;\s*/',
					),
					array(
						' ',
						'<style>#',
						'><',
						'{',
						'}',
						':',
						';',
					),
					ob_get_clean()
				)
			);
		}

		ob_end_clean();

		return '';
	}

	/**
	 * Get a graphic diff if available.
	 *
	 * Generate a graphic diff.
	 *
	 * @since 1.1.0
	 *
	 * @param array $diff A diff array.
	 * @return string An HTML string. A graphic diff approximating the setting change.
	 */
	public static function graphic_diff( array $diff ): string {
		$allowed_html = array(
			'style' => array(
				'id'    => true,
				'class' => true,
			),
			'div'   => array(
				'id'    => true,
				'class' => true,
			),
		);

		ob_start();
		?>
		<div class="<?php echo esc_attr( self::get_prefixed_css_class( 'graphic-diff' ) ); ?>">
			<div class="<?php echo esc_attr( self::get_prefixed_css_class( 'graphic-diff-old' ) ); ?>">
			<?php
				echo wp_kses( $diff['old_graphic'], $allowed_html );
			// div.{css-prefix}-graphic-diff-old.
			?>
			</div>
			<div class="<?php echo esc_attr( self::get_prefixed_css_class( 'graphic-diff-new' ) ); ?>">
			<?php
				echo wp_kses( $diff['new_graphic'], $allowed_html );
			// div.{css-prefix}-graphic-diff-new.
			?>
			</div>
			<?php
			// div.{css-prefix}-graphic-diff.
			?>
		</div>
		<?php

		return ob_get_clean();
	}

	/**
	 * Get node position data.
	 *
	 * Generate an array of position data for the node and each of its ancestors.
	 *
	 * @since 1.0.0
	 *
	 * @see FLBuilderModel::order_nodes
	 *
	 * @param object $node A Beaver Builder node object.
	 * @param array  $nodes An array of Beaver Builder node objects.
	 * @return array An array of position data for the node and each of its ancestors.
	 */
	public static function get_node_position( object $node, array $nodes ): array {
		$position_data = array();

		while ( true ) {
			$sibling_nodes = array_values(
				array_filter(
					$nodes,
					// Get all nodes with the same parent as $node.
					function( object $possible_sibling ) use ( $node ): bool {
						return $possible_sibling->parent === $node->parent;
					}
				)
			);

			usort( $sibling_nodes, array( 'FLBuilderModel', 'order_nodes' ) );

			$child_nodes = array_values(
				array_filter(
					$nodes,
					// Get all nodes with a parent of $node.
					function( object $possible_child ) use ( $node ): bool {
						return $possible_child->parent === $node->node;
					}
				)
			);

			$node_position_data = array(
				'id'            => $node->node,
				'type'          => $node->type,
				'parent'        => $node->parent,
				'sibling_count' => count( $sibling_nodes ),
				'child_count'   => count( $child_nodes ),
				'position'      => array_search(
					$node->node,
					array_map(
						// Return node id string.
						function( object $sibling_node ): string {
							return $sibling_node->node;
						},
						$sibling_nodes
					),
					true
				),
			);

			$position_data[] = $node_position_data;

			if ( ! $node->parent ) {
				break;
			}

			$parent_array = array_filter(
				$nodes,
				// Get all nodes with the same parent as $node.
				function( object $possible_parent ) use ( $node ): bool {
					return $possible_parent->node === $node->parent;
				}
			);

			$node = array_shift( $parent_array );
		}

		return $position_data;
	}

	/**
	 * Get node position graphic.
	 *
	 * Generate an HTML string of div elements approximating a node's layout on a page.
	 *
	 * @since 1.0.0
	 *
	 * @param array $position_data An array of position data for the node and each of its ancestors.
	 * @return string An HTML string of div elements approximating a node's layout on a page.
	 */
	public static function get_position_graphic( array $position_data ): string {
		$graphic_dom_string = '';

		foreach ( $position_data as $level => $position ) {
			$graphic_dom_string = '<div class="' . esc_attr(
				implode(
					' ',
					array(
						'node-' . $position['id'],
						'type-' . $position['type'],
						'level-' . $level,
						'position-' . $position['position'],
						'sibling-count-' . $position['sibling_count'],
						'child-count-' . $position['child_count'],
					)
				)
			) . '">' . $graphic_dom_string . '</div>';

			for ( $i = 0; $i < $position['sibling_count']; $i++ ) {
				if ( $i < $position['position'] ) {
					$graphic_dom_string = '<div class="' . esc_attr(
						implode(
							' ',
							array(
								'node-sibling-' . $position['id'],
								'type-sibling',
								'level-' . $level,
								'position-' . $i,
							)
						)
					) . '"></div>' . $graphic_dom_string;
				} elseif ( $i > $position['position'] ) {
					$graphic_dom_string .= '<div class="' . esc_attr(
						implode(
							' ',
							array(
								'node-sibling-' . $position['id'],
								'type-sibling',
								'level-' . $level,
								'position-' . $i,
							)
						)
					) . '"></div>';
				}
			}
		}

		$graphic_dom_string = '<div class="' . esc_attr(
			implode(
				' ',
				array(
					'node-position-graphic',
					'node-page',
					'type-page',
					'level-page',
					'position-page',
				)
			)
		) . '">' . $graphic_dom_string . '</div>';

		return $graphic_dom_string;
	}

	/**
	 * Get node position graphic from a node and a list of nodes.
	 *
	 * Generate an HTML string of div elements approximating a node's layout on a page.
	 *
	 * @see get_node_position
	 * @see get_position_graphic
	 *
	 * @since 1.0.0
	 *
	 * @param object $node A Beaver Builder node object.
	 * @param array  $nodes An array of Beaver Builder node objects.
	 * @return string An HTML string of div elements approximating a node's layout on a page.
	 */
	public static function get_node_position_graphic( object $node, array $nodes ): string {
		return self::get_position_graphic( self::get_node_position( $node, $nodes ) );
	}

	/**
	 * Parse an attribute string.
	 *
	 * Parse an attribute string into a array of key value pairs.
	 *
	 * @since 1.0.0
	 *
	 * @param string $attribute_string An HTML attribute string.
	 * @return array An array of HTML attributes.
	 */
	public static function parse_attribute_string( string $attribute_string ): array {
		return preg_match_all( '/(?:^|\s+)([\w-]+)=(["\'])(.+?)\2/', $attribute_string, $matches ) ? array_combine( $matches[1], $matches[3] ) : array();
	}
}
