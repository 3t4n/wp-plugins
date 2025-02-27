<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WOO_F_LOOKBOOK_Data {
	private $params;
	protected static $instance = null, $cache=[], $allow_html = null;

	/**
	 * WOO_F_LOOKBOOK_Data constructor.
	 * Init setting
	 */
	public function __construct() {
		global $wlb_settings;
		if ( ! $wlb_settings ) {
			$wlb_settings = get_option( 'woo_lookbook_params', array() );
		}
		$args         = array(
			'link_redirect'          => 0,
			'external_product'       => 0,
			'background_color'       => '#fff',
			'text_color'             => '#212121',
			'border_radius'          => 0,
			'close_button'           => 0,
			'key'                    => 0,
			/*Node*/
			'icon_background_color'  => '#E8CE40',
			'icon_color'             => '#fff',
			'icon_border_color'      => '#E8CE40',
			'custom_css'             => '',
			'hide_title'             => 0,
			'title_color'            => '#212121',
			'title_background_color' => '#eee',
			/*Quick view*/
			'slide_width'            => 1170,
			'slide_height'           => 600,
			'slide_effect'           => 0,
			'slide_pagination'       => 0,
			'slide_navigation'       => 0,
			'slide_time'             => 5000,
			'slide_auto_play'        => 0,
			'see_more'               => 0,
			/*Instagram*/
			'ins_username'           => '',
			'ins_display'            => 0,
			'ins_items_per_row'      => 4,
			'ins_display_limit'      => 12,
			'ins_link'               => 0,
			'ins_client_id'          => '',
			'ins_client_secret'      => '',
			'ins_access_token'       => '',
			'fb_user_id'             => '',
			'ins_page_id'            => '',
		);
		$this->params =  wp_parse_args( $wlb_settings, $args ) ;
	}
	public static function get_instance( $new = false ) {
		if ( $new || null === self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
	public function get_params( $name = '', $default = false ) {
		if ( ! $name ) {
			return apply_filters( 'wlb_settings_args', $this->params );
		}
		$name_filter = 'wlb_get_' . $name;
		$result =  $this->params[ $name ] ?? $default;
		return $name_filter ? apply_filters( $name_filter, $result ) : $result;
	}

	public static function get_lookbook_data($id,$key='', $default = ''){
		if (!$id || !$key){
			return '';
		}
		if (!isset(self::$cache['lookbook_data'])){
			self::$cache['lookbook_data'] = [];
		}
		if (!isset(self::$cache['lookbook_data'][$id])){
			self::$cache['lookbook_data'][$id]= get_post_meta($id,'wlb_params', true);
		}
		$params = self::$cache['lookbook_data'][$id];
		return $params[$key] ?? $default;
	}
	/**
	 * @param $tags
	 *
	 * @return array
	 */
	public static function filter_allowed_html( $tags = [] ) {
		if ( self::$allow_html && empty( $tags ) ) {
			return self::$allow_html;
		}
		$tags = array_merge_recursive( $tags, wp_kses_allowed_html( 'post' ), array(
			'input'  => array(
				'type'         => 1,
				'id'           => 1,
				'name'         => 1,
				'class'        => 1,
				'placeholder'  => 1,
				'autocomplete' => 1,
				'style'        => 1,
				'value'        => 1,
				'size'         => 1,
				'checked'      => 1,
				'disabled'     => 1,
				'readonly'     => 1,
				'data-*'       => 1,
			),
			'form'   => array(
				'method' => 1,
				'id'     => 1,
				'class'  => 1,
				'action' => 1,
				'data-*' => 1,
			),
			'select' => array(
				'id'       => 1,
				'name'     => 1,
				'class'    => 1,
				'multiple' => 1,
				'data-*'   => 1,
			),
			'option' => array(
				'value'    => 1,
				'selected' => 1,
				'data-*'   => 1,
			),
			'style'  => array(
				'id'    => 1,
				'class' => 1,
				'type'  => 1,
			),
			'source' => array(
				'type' => 1,
				'src'  => 1
			),
			'video'  => array(
				'width'  => 1,
				'height' => 1,
				'src'    => 1
			),
			'iframe' => array(
				'width'           => 1,
				'height'          => 1,
				'allowfullscreen' => 1,
				'allow'           => 1,
				'src'             => 1
			),
		) );
		$tmp = $tags;
		foreach ( $tmp as $key => $value ) {
			if ( in_array( $key, array( 'div', 'span', 'a', 'form', 'select', 'option', 'table', 'tr', 'th', 'td' ) ) ) {
				$tags[ $key ] = wp_parse_args( [
					'width'  => 1,
					'height' => 1,
					'class'  => 1,
					'id'     => 1,
					'type'   => 1,
					'style'  => 1,
					'data-*' => 1,
				],$value);
			}
		}
		self::$allow_html = $tags;

		return self::$allow_html;
	}
	public static function implode_html_attributes( $raw_attributes ) {
		$attributes = array();
		foreach ( $raw_attributes as $name => $value ) {
			$attributes[] = esc_attr( $name ) . '="' . esc_attr( $value ) . '"';
		}
		return implode( ' ', $attributes );
	}
	public static function villatheme_render_field( $name, $field ) {
		if ( ! $name ) {
			return;
		}
		if ( ! empty( $field['html'] ) ) {
			echo $field['html'];
//			echo wp_kses($field['html'], self::filter_allowed_html());
			return;
		}
		$type  = $field['type'] ?? '';
		$value = $field['value'] ?? '';
		if ( ! empty( $field['prefix'] ) ) {
			$id = "viwlb-{$field['prefix']}-{$name}";
		} else {
			$id = "viwlb-{$name}";
		}
		$class             = $field['class'] ?? $id;
		$custom_attributes = array_merge( [
			'type'  => $type,
			'name'  => $name,
			'id'    => $id,
			'value' => $value,
			'class' => $class,
		], (array) ( $field['custom_attributes'] ?? [] ) );
		if ( ! empty( $field['input_label'] ) ) {
			$input_label_type = $field['input_label']['type'] ?? 'left';
			echo wp_kses( sprintf( '<div class="vi-ui %s labeled input">', ( ! empty( $field['input_label']['fluid'] ) ? 'fluid ' : '' ) . $input_label_type ), self::filter_allowed_html() );
			if ( $input_label_type === 'left' ) {
				echo wp_kses( sprintf( '<div class="%s">%s</div>', $field['input_label']['label_class'] ?? 'vi-ui label', $field['input_label']['label'] ?? '' ), self::filter_allowed_html() );
			}
		}
		switch ( $type ) {
			case 'checkbox':
				unset( $custom_attributes['type'] );
				echo wp_kses( sprintf( '
					<div class="vi-ui toggle checkbox">
						<input type="hidden" %s>
						<input type="checkbox" id="%s-checkbox" %s ><label></label>
					</div>', self::implode_html_attributes( $custom_attributes ), $id, $value ? 'checked' : ''
				), self::filter_allowed_html() );
				break;
			case 'select':
				$select_options = $field['options'] ?? '';
				$multiple       = $field['multiple'] ?? '';
				unset( $custom_attributes['type'] );
				unset( $custom_attributes['value'] );
				$custom_attributes['class'] = "vi-ui fluid dropdown {$class}";
				if ( $multiple ) {
					$value                         = (array) $value;
					$custom_attributes['name']     = $name . '[]';
					$custom_attributes['multiple'] = "multiple";
				}
				echo wp_kses( sprintf( '<select %s>', self::implode_html_attributes( $custom_attributes ) ), self::filter_allowed_html() );
				if ( is_array( $select_options ) && count( $select_options ) ) {
					foreach ( $select_options as $k => $v ) {
						$selected = $multiple ? in_array( $k, $value ) : ( $k == $value );
						echo wp_kses( sprintf( '<option value="%s" %s>%s</option>',
							$k, $selected ? 'selected' : '', $v ), self::filter_allowed_html() );
					}
				}
				printf( '</select>' );
				break;
			case 'textarea':
				unset( $custom_attributes['type'] );
				unset( $custom_attributes['value'] );
				echo wp_kses( sprintf( '<textarea %s>%s</textarea>', self::implode_html_attributes( $custom_attributes ), $value ), self::filter_allowed_html() );
				break;
			default:
				if ( $type ) {
					echo wp_kses( sprintf( '<input %s>', self::implode_html_attributes( $custom_attributes ) ), self::filter_allowed_html() );
				}
		}
		if ( ! empty( $field['input_label'] ) ) {
			if ( ! empty( $input_label_type ) && $input_label_type === 'right' ) {
				printf( '<div class="%s">%s</div>', esc_attr( $field['input_label']['label_class'] ?? 'vi-ui label' ), wp_kses_post( $field['input_label']['label'] ?? '' ) );
			}
			printf( '</div>' );
		}
	}

	public static function villatheme_render_table_field( $options ) {
		if ( ! is_array( $options ) || empty( $options ) ) {
			return;
		}
		if ( ! empty( $options['html'] ) ) {
			echo wp_kses( $options['html'], self::filter_allowed_html() );

			return;
		}
		if ( isset( $options['section_start'] ) ) {
			if ( ! empty( $options['section_start']['accordion'] ) ) {
				echo wp_kses( sprintf( '<div class="vi-ui styled fluid accordion%s">
                                            <div class="title%s">
                                                <i class="dropdown icon"> </i>
                                                %s
                                            </div>
                                        <div class="content%s">',
					! empty( $options['section_start']['class'] ) ? " {$options['section_start']['class']}" : '',
					! empty( $options['section_start']['active'] ) ? " active" : '',
					$options['section_start']['title'] ?? '',
					! empty( $options['section_start']['active'] ) ? " active" : ''
				),
					self::filter_allowed_html() );
			}
			if ( empty( $options['fields_html'] ) ) {
				echo wp_kses_post( '<table class="form-table">' );
			}
		}
		if ( ! empty( $options['fields_html'] ) ) {
			echo wp_kses( $options['fields_html'], self::filter_allowed_html() );
		} else {
			$fields = $options['fields'] ?? '';
			if ( is_array( $fields ) && count( $fields ) ) {
				foreach ( $fields as $key => $param ) {
					$type = $param['type'] ?? '';
					$name = $param['name'] ?? $key;
					if ( ! $name ) {
						continue;
					}
					if ( ! empty( $param['prefix'] ) ) {
						$id = "viwlb-{$param['prefix']}-{$name}";
					} else {
						$id = "viwlb-{$name}";
					}
					if ( empty( $param['not_wrap_html'] ) ) {
						if ( ! empty( $param['wrap_class'] ) ) {
							printf( '<tr class="%s"><th><label for="%s">%s</label></th><td>',
								esc_attr( $param['wrap_class'] ), esc_attr( $type === 'checkbox' ? $id . '-' . $type : $id ), wp_kses_post( $param['title'] ?? '' ) );
						} else {
							printf( '<tr><th><label for="%s">%s</label></th><td>', esc_attr( $type === 'checkbox' ? $id . '-' . $type : $id ), wp_kses_post( $param['title'] ?? '' ) );
						}
					}
					do_action( 'viwlb_before_option_field', $name, $param );
					self::villatheme_render_field( $name, $param );
					if ( ! empty( $param['custom_desc'] ) ) {
						echo wp_kses_post( $param['custom_desc'] );
					}
					if ( ! empty( $param['desc'] ) ) {
						printf( '<p class="description">%s</p>', wp_kses_post( $param['desc'] ) );
					}
					do_action( 'viwlb_after_option_field', $name, $param );
					if ( empty( $param['not_wrap_html'] ) ) {
						echo wp_kses_post( '</td></tr>' );
					}
				}
			}
		}
		if ( isset( $options['section_end'] ) ) {
			if ( empty( $options['fields_html'] ) ) {
				echo wp_kses_post( '</table>' );
			}
			if ( ! empty( $options['section_end']['accordion'] ) ) {
				echo wp_kses_post( '</div></div>' );
			}
		}
	}
	public static function remove_other_script() {
		global $wp_scripts;
		$scripts         = $wp_scripts->registered;
		$exclude_dequeue = apply_filters( 'viwlb_exclude_dequeue_scripts', array(
			'dokan-vue-bootstrap',
			'query-monitor',
			'uip-app',
			'uip-vue',
			'uip-toolbar-app'
		) );
		foreach ( $scripts as $script ) {
			if ( in_array( $script->handle, $exclude_dequeue ) ) {
				continue;
			}
			preg_match( '/\/wp-/i', $script->src, $result );
			if ( count( array_filter( $result ) ) ) {
				preg_match( '/(\/wp-content\/plugins|\/wp-content\/themes)/i', $script->src, $result1 );
				if ( count( array_filter( $result1 ) ) ) {
					wp_dequeue_script( $script->handle );
				}
			} else {
				wp_dequeue_script( $script->handle );
			}
		}
		wp_dequeue_script( 'select-js' );//Causes select2 error, from ThemeHunk MegaMenu Plus plugin
		wp_dequeue_style( 'eopa-admin-css' );
	}

	public static function enqueue_style( $handles = array(), $srcs = array(), $is_suffix = array(), $des = array(), $type = 'enqueue' ) {
		if ( empty( $handles ) || empty( $srcs ) ) {
			return;
		}
		$action = $type === 'enqueue' ? 'wp_enqueue_style' : 'wp_register_style';
		$suffix = WP_DEBUG ? '' : '.min';
		foreach ( $handles as $i => $handle ) {
			if ( ! $handle || empty( $srcs[ $i ] ) ) {
				continue;
			}
			$suffix_t = ! empty( $is_suffix[ $i ] ) ? '.min' : $suffix;
			$action( $handle, WOO_F_LOOKBOOK_CSS . $srcs[ $i ] . $suffix_t . '.css', ! empty( $des[ $i ] ) ? $des[ $i ] : array(), WOO_F_LOOKBOOK_VERSION );
		}
	}

	public static function enqueue_script( $handles = array(), $srcs = array(), $is_suffix = array(), $des = array(), $type = 'enqueue', $in_footer = false ) {
		if ( empty( $handles ) || empty( $srcs ) ) {
			return;
		}
		$action = $type === 'register' ? 'wp_register_script' : 'wp_enqueue_script';
		$suffix = WP_DEBUG ? '' : '.min';
		foreach ( $handles as $i => $handle ) {
			if ( ! $handle || empty( $srcs[ $i ] ) ) {
				continue;
			}
			$suffix_t = ! empty( $is_suffix[ $i ] ) ? '.min' : $suffix;
			$action( $handle, WOO_F_LOOKBOOK_JS . $srcs[ $i ] . $suffix_t . '.js', ! empty( $des[ $i ] ) ? $des[ $i ] : array( 'jquery' ),
				WOO_F_LOOKBOOK_VERSION, $in_footer );
		}
	}

/**
	 * Get Access token of Instagram
	 * @return mixed|void
	 */
	public function get_access_token() {
		return apply_filters( 'wlb_get_access_token', $this->params['ins_access_token'] );
	}
	/**
	 * Check enable instagram link
	 * @return mixed|void
	 */
	public function ins_link() {
		return apply_filters( 'wlb_ins_link', $this->params['ins_link'] );
	}


	/**
	 * Get Instagram user name
	 * @return mixed|void
	 */
	public function get_ins_username() {
		return apply_filters( 'wlb_get_ins_username', $this->params['ins_username'] );
	}

	/**
	 * Get Title Color
	 * @return mixed|void
	 */
	public function get_title_color() {
		return apply_filters( 'wlb_get_title_color', $this->params['title_color'] );
	}

	/**
	 * Get Title Background Color
	 * @return mixed|void
	 */
	public function get_title_background_color() {
		return apply_filters( 'wlb_get_title_background_color', $this->params['title_background_color'] );
	}

	/**
	 * Check show see more button
	 * @return mixed|void
	 */
	public function see_more() {
		return apply_filters( 'wlb_see_more', $this->params['see_more'] );
	}


	/**
	 * Get custom CSS
	 * @return mixed|void
	 */
	public function get_custom_css() {
		return apply_filters( 'wlb_get_custom_css', $this->params['custom_css'] );
	}

	/**
	 * Get Icon border color
	 * @return mixed|void
	 */
	public function get_icon_border_color() {
		return apply_filters( 'wlb_get_icon_border_color', $this->params['icon_border_color'] );
	}


	/**
	 * Get purchased code
	 * @return mixed|void
	 */
	public function get_key() {
		return apply_filters( 'wlb_get_key', $this->params['key'] );
	}

	/**
	 * Check close button
	 * @return mixed|void
	 */
	public function enable_close_button() {
		return apply_filters( 'wlb_enable_close_button', $this->params['close_button'] );
	}

	/**
	 * Get Border radius
	 * @return mixed|void
	 */
	public function get_border_radius() {
		return apply_filters( 'wlb_get_border_radius', $this->params['border_radius'] );
	}

	/**
	 * Get Text Color
	 * @return mixed|void
	 */
	public function get_text_color() {
		return apply_filters( 'wlb_get_text_color', $this->params['text_color'] );
	}

	/**
	 * Get Background color
	 * @return mixed|void
	 */
	public function get_background_color() {
		return apply_filters( 'wlb_get_background_color', $this->params['background_color'] );
	}

	/**
	 * Check working with external product
	 * @return mixed|void
	 */
	public function external_product() {
		return apply_filters( 'wlb_external_product', $this->params['external_product'] );
	}


	/**
	 * Get Background Color
	 * @return mixed|void
	 */
	public function get_icon_background_color() {
		return apply_filters( 'wlb_get_icon_background_color', $this->params['icon_background_color'] );
	}

	/**
	 * Get Icon Color
	 * @return mixed|void
	 */
	public function get_icon_color() {
		return apply_filters( 'wlb_get_icon_color', $this->params['icon_color'] );
	}
	/**
	 * Get duplicate
	 * @return mixed|void
	 */
	public function get_ins_duplicate() {
		return apply_filters( 'wlb_get_ins_duplicate', $this->params['ins_duplicate'] );
	}

	public function get_ins_client_id() {
		return $this->params['ins_client_id'];
	}

	public function get_ins_client_secret() {
		return $this->params['ins_client_secret'];
	}

	public function get_fb_page_id() {
		return $this->params['ins_page_id'];
	}

	public function get_gallery_to_slide_option() {
		return $this->params['gallery_to_slide'];
	}

}