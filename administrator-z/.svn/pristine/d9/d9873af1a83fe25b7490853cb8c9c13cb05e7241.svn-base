<?php
namespace Adminz\Controller;

final class Icons {
	private static $instance = null;
	public $id = 'adminz_icons';
	public $name = 'Icons';
	public $option_name = 'adminz_icons';

	public $settings = [];
	public $icons = [];
	public $custom_icons = [];
	public $dashicons = [];

	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	function __construct() {
		add_filter( 'adminz_option_page_nav', [ $this, 'add_admin_nav' ], 10, 1 );
		add_action( 'admin_init', [ $this, 'register_settings' ] );
		$this->load_settings();
	}

	function load_settings() {
		$this->settings = get_option( $this->option_name, [] );

		// dashicons
		foreach ((array) adminz_get_list_dashicons() as $key => $value) {
			$this->dashicons[ $value ] = $value;
		}

		// icons
		foreach ( glob( ADMINZ_DIR . '/assets/icons/*.svg' ) as $path ) {
			// $this->icons[] = str_replace( '.svg', '', basename( $path ) );
			$icon = str_replace( '.svg', '', basename( $path ) );
			$this->icons[$icon] = $path;
		}

		// custom icons
		foreach($this->settings['custom_icons'] ?? [] as $key => $item){
			$this->custom_icons[$item['key']] = $item['value'];
		}
	}

	function add_admin_nav( $nav ) {
		$nav[ $this->id ] = $this->name;
		return $nav;
	}

	function register_settings() {
		register_setting( $this->id, $this->option_name );

		// add section
		add_settings_section(
			'adminz_icons',
			'Icons',
			function () {},
			$this->id
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Shortcode',
			function () {
				?>
                    <small class="adminz_click_to_copy" data-text='[adminz_icon icon="clock" max_width="16px" class="footer_icon"]'>
						[adminz_icon icon="clock" max_width="16px" class="footer_icon"]
					</small>
			    <?php
			},
			$this->id,
			'adminz_icons'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Adminz icons',
			function () {

				// adminz icon
				if(!empty($this->icons)){
					foreach ($this->icons as $icon => $path) {
						?>
						<div 
							class="adminz_click_to_copy adminz_icon_item"
							data-text="<?= esc_attr($icon) ;?>">
							<?php echo $this->get_icon_html($icon, [ 'width' => '30px', 'height' => '30px' ]) ?>
							<small class="icon_name"><?= esc_attr($icon) ?></small>
						</div>
						<?php
					}
				}
				?>
				<br>
				<small><em>Source: fontawesome</em></small>
				<?php
			},
			$this->id,
			'adminz_icons'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Dashicon icons',
			function () {

				// dashicon
				foreach ( $this->dashicons as $icon) {
					?>
					<div 
						class="adminz_click_to_copy adminz_icon_item"
						data-text="<?= esc_attr($icon) ;?>">
						<?php echo $this->get_icon_html($icon, [ 'style' => ['font-size'=>'30px' ]]) ?>
						<small class="icon_name"><?= str_replace( 'dashicons-', '', $icon ) ?></small>
					</div>
					<?php
				}
				
			},
			$this->id,
			'adminz_icons'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Custom icons',
			function () {
				if(!empty($this->custom_icons)){
					foreach ($this->custom_icons as $icon => $path) {
						if(!$icon) continue;
						?>
						<div 
							class="adminz_click_to_copy adminz_icon_item"
							data-text="<?= esc_attr($icon) ;?>">
							<?php echo $this->get_icon_html($icon, [ 'width' => '30px', 'height' => '30px' ]) ?>
						</div>
						<?php
					}
					echo '</br>';
					echo '</br>';
                }

				$current = $this->settings['custom_icons'] ?? adminz_repeater_array_default(3);
				echo adminz_repeater( 
					$current, 
					$this->option_name . '[custom_icons]',
					[
						'[key]' => [
							'field'     => 'input',
							'attribute' => [ 
								'type'  => 'text',
								'placeholder' => 'Icon code'
							],
						],
						'[value]' =>[
							'field'     => 'input',
							'attribute' => [ 
								'type'  => 'text',
								'placeholder' => 'Image url'
							],
						]
					]
				);
			},
			$this->id,
			'adminz_icons'
		);

	}

	function get_icon_dashicons( $icon, $attr ) {
		wp_enqueue_style( 'dashicons' );

		// Các thuộc tính mặc định
		$default_attr = [ 
			'class' => [ 
				$icon,
				'adminz_dashicon',
				'dashicons',
			],
			'alt'   => [ 
				'adminz' ],
			'style' => [ 
				'color'     => 'currentColor',
				'font-size' => '1em',
				'height'    => '1em',
				'width'     => '1em',
				'position'  => 'relative',
			],
		];

		// Chuẩn hóa các thuộc tính
		foreach ( $attr as $key => $value ) {
			$attr[ $key ] = is_array( $value ) ? $value : explode( ' ', $value );
		}

		// Duyệt qua $default_attr để thêm thuộc tính nếu $attr không có
		foreach ( $default_attr as $key => $default_values ) {
			if ( !isset( $attr[ $key ] ) ) {
				$attr[ $key ] = $default_values;
			} else {
				$attr[ $key ] = array_merge( $default_values, $attr[ $key ] );
			}
		}

		// Xây dựng chuỗi thuộc tính
		$attr_strings = [];
		foreach ( $attr as $key => $values ) {
			if ( $key === 'style' && is_array( $values ) ) {
				// Định dạng style dưới dạng CSS
				$style_string = '';
				foreach ( $values as $property => $value ) {
					$style_string .= is_int( $property ) ? "$value; " : "$property: $value; ";
				}
				$attr_strings[] = $key . '="' . trim( $style_string ) . '"';
			} else {
				// Định dạng các thuộc tính khác
				$attr_strings[] = $key . '="' . implode( ' ', (array)$values ) . '"';
			}
		}

		// Trả về mã HTML của icon
		return '<i ' . implode( ' ', $attr_strings ) . '></i>';
	}

	function get_icon_html( $icon = 'info-circle', $attr = [] ) {

		// Kiểm tra dashicon
		if ( array_key_exists( $icon, $this->dashicons ) ) {
			return $this->get_icon_dashicons( $icon, $attr );
		}

		// Thiết lập icon mặc định nếu trống
		$icon = empty( $icon ) ? 'info-circle' : $icon;

		// Tìm URL của icon
		if ( isset( $this->icons[ $icon ] ) ) {
			$iconurl = $this->icons[ $icon ];
		} elseif ( isset( $this->custom_icons[ $icon ] ) ) {
			$iconurl = $this->custom_icons[ $icon ];
		} else {
			$iconurl = $icon;
		}

		$is_image = pathinfo( $iconurl, PATHINFO_EXTENSION ) !== 'svg';

		// Thuộc tính mặc định
		$default_attr = [ 
			'width'  => $is_image ? 'auto' : '1em',
			'height' => '1em',
			'class'  => [ 
				'adminz_svg',
			],
			'alt'    => [ 
				'adminz',
			],
			'style'  => [ 
				'fill' => 'currentColor',
			],
		];

		// Chuẩn hóa các thuộc tính
		foreach ( $default_attr as $key => $default_values ) {
			if ( !isset( $attr[ $key ] ) ) {
				$attr[ $key ] = $default_values;
			} else {
				$attr[ $key ] = is_array( $attr[ $key ] ) ? array_merge( $default_values, $attr[ $key ] ) : explode( ' ', $attr[ $key ] );
			}
		}

		// Xây dựng chuỗi thuộc tính
		$attr_strings = [];
		foreach ( $attr as $key => $values ) {
			if ( $key === 'style' && is_array( $values ) ) {
				// Định dạng style theo CSS
				$style_string = '';
				foreach ( $values as $property => $value ) {
					$style_string .= is_int( $property ) ? "$value; " : "$property: $value; ";
				}
				$attr_strings[] = $key . '="' . trim( $style_string ) . '"';
			} else {
				// Định dạng cho các thuộc tính khác
				$attr_strings[] = $key . '="' . implode( ' ', (array)$values ) . '"';
			}
		}

		// nếu là img thì trả lại 
		if ( $is_image ) {
			return '<img ' . implode( ' ', $attr_strings ) . ' src="' . esc_url( $iconurl ) . '"/>';
		}

		$response = @file_get_contents( $iconurl );
		return $this->cleansvg( $response, implode( ' ', $attr_strings ) );
	}

	public function cleansvg( $response, $attr_item ) {
		$return = "";
		preg_match( '/<svg[^>]*>(.*?)<\/svg>/is', $response, $matches );
		if ( isset( $matches[0] ) ) {
			$response = $matches[0];
			$return   = str_replace(
				'<svg',
				'<svg ' . $attr_item,
				$response
			);
			$return   = preg_replace( '/<!--(.*)-->/', '', $return );
		}
		return $return;
	}
}