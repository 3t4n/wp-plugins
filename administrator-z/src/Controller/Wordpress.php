<?php
namespace Adminz\Controller;

final class Wordpress {
	private static $instance = null;
	public $id = 'adminz_wordpress';
	public $name = 'Wordpress';
	public $option_name = 'adminz_admin';
	public $settings = [];

	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	function __construct() {
		add_filter( 'adminz_option_page_nav', [ $this, 'add_admin_nav' ], 10, 1 );
		add_filter( 'admin_menu', [ $this, 'save_admin_menu' ], 999, 1 );
		add_action( 'admin_init', [ $this, 'register_settings' ] );
		$this->load_settings();
		$this->run();
		add_action( 'init', [ $this, 'init' ] );
		add_shortcode( 'adminz_test', 'adminz_test' );
	}

	function run() {
		// spam protect
		new \Adminz\Helper\Comment();

		// 
		if ( $this->settings['adminz_tax_thumb'] ?? [] ) {
			foreach ( (array) $this->settings['adminz_tax_thumb'] as $taxonomy ) {
				$a = new \Adminz\Helper\TermTaxonomy();
				$a->init_thumbnail( $taxonomy );
			}
		}

		// 
		if ( $this->settings['adminz_post_type_thumb'] ?? [] ) {
			foreach ( (array) $this->settings['adminz_post_type_thumb'] as $post_type ) {
				new \Adminz\Helper\PostTypeThumbnail( $post_type );
			}
		}

		// 
		foreach ( glob( ADMINZ_DIR . '/includes/shortcodes/wpdefault-*.php' ) as $filename ) {
			require_once $filename;
		}

		// 
		if ( $this->settings['adminz_notice'] ?? "" ) {
			$notice = $this->settings['adminz_notice'];
			adminz_user_admin_notice( $notice );
		}

		// 
		if ( $this->settings['adminz_admin_logo'] ?? "" ) {
			$image_url = $this->settings['adminz_admin_logo'];
			adminz_admin_login_logo( $image_url );
		}

		// 
		if ( $this->settings['adminz_admin_login_footer_text'] ?? "" ) {
			$text = $this->settings['adminz_admin_login_footer_text'];
			adminz_admin_login_footer_text( $text );
		}

		// 
		if ( $this->settings['adminz_admin_background'] ?? "" ) {
			$image_url = $this->settings['adminz_admin_background'];
			adminz_admin_background( $image_url );
		}

		// 
		if ( $this->settings['adminz_admin_login_quiz'] ?? "" ) {
			$a = new \Adminz\Helper\Wpadminlogin();
			$a->init_quiz();
		}

		// 
		if ( $this->settings['adminz_use_classic_editor'] ?? "" ) {
			add_filter( 'use_block_editor_for_post', function () {
				return false;
			} );
			add_filter( 'use_widgets_block_editor', function () {
				return false;
			} );
		}

		// 
		if ( $this->settings['hide_admin_menu'] ?? [] ) {
			add_action( 'admin_menu', function () {
				foreach ( (array) $this->settings['hide_admin_menu'] ?? [] as $key => $value ) {
					if ( !in_array(
						get_current_user_id(),
						$this->settings['hide_admin_menu_excluded_user'] ?? []
					)
					) {
						remove_menu_page( $value );
					}
				}
			}, 1000 );
		}

		// 
		if ( $this->settings['adminz_use_adminz_widgets'] ?? [] ) {
			add_action( 'widgets_init', function () {
				foreach ( (array) $this->settings['adminz_use_adminz_widgets'] as $widget_class ) {
					if ( $widget_class ) {
						register_widget( $widget_class );
					}
				}
			} );
		}

		// 
		if ( $this->settings['disable_plugins_update'] ?? [] ) {
			foreach ( (array) $this->settings['disable_plugins_update'] as $key => $value ) {
				if ( $value ) {
					adminz_disable_plugin_update( $value );
				}
			}
		}

		// 
		if ( $this->settings['adminz_sidebars'] ?? [] ) {
			foreach ( (array) $this->settings['adminz_sidebars'] as $key => $value ) {
				if ( $value ) {
					register_sidebar( array(
						'name'          => $value,
						'id'            => sanitize_title( $value ),
						'description'   => '',
						'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						'after_widget'  => '</aside>',
						'before_title'  => '<span class="widget-title"><span>',
						'after_title'   => '</span></span><div class="is-divider small"></div>',
					) );
				}
			}
		}

		// 
		if ( $this->settings['auto_image_excerpt'] ?? "" ) {
			adminz_user_image_auto_excerpt();
		}

		// 
		if ( $this->settings['image_auto_watermark'] ?? "" ) {
			$a               = new \Adminz\Helper\Watermark();
			$a->watermark_id = $this->settings['image_auto_watermark'];
			$a->init();
		}

		// 
		if ( $this->settings['post_thumbnail_size'] ?? "" ) {
			add_filter( 'post_thumbnail_size', function ($size) {
				if ( is_admin() && is_main_query() ) {
					return $size;
				}
				return $this->settings['post_thumbnail_size'];
			}, 10, 1 );
		}

		// 
		if ( $taxonomies = ( $this->settings['adminz_tiny_mce_taxonomy'] ?? "" ) ) {
			new \Adminz\Helper\Category( $taxonomies );
		}

		// 
		if ( $preg_replace = ( $this->settings['preg_replace'] ?? [] ) ) {
			if ( !empty( $preg_replace ) ) {

				add_action( 'wp_body_open', function () {
					ob_start();
				} );

				add_action( 'get_footer', function () use ($preg_replace) {
					$search  = [];
					$replace = [];
					foreach ( (array) $preg_replace as $key => $value ) {
						$search[]  = '#' . $value['key'] . '#s';
						$replace[] = $value['value'];
					}

					echo preg_replace(
						$search,
						$replace,
						ob_get_clean()
					);

				} );
			}
		}

		// 
		if ( $gettext = ( $this->settings['gettext'] ?? [] ) ) {
			if ( !empty( $gettext ) ) {
				foreach ( (array) $gettext as $item ) {
					if ( $item['your_text'] ?? '' ) {
						add_filter( 'gettext', function ($translation, $text, $domain) use ($item) {

							// also is_admin for more backend featured
							// if ( is_admin() ) {
							// 	return $translation;
							// }

							$match_domain = true;
							$item_domain  = $item['domain'] ?? '';
							if ( $item_domain and $domain != $item_domain ) {
								$match_domain = false;
							}

							$match_text = true;
							$item_text  = $item['text'] ?? '';
							if ( $item_text and $text != $item_text ) {
								$match_domain = false;
							}

							$match_translation = false;
							if ( ( $item['translation'] ?? '' ) == $translation ) {
								$match_translation = true;
							}

							if ( $match_domain and $match_text and $match_translation ) {
								return $item['your_text'];
							}

							return $translation;
						}, 10, 3 );
					}
				}

			}
		}
	}

	function init() {


	}

	function load_settings() {
		$this->settings = get_option( $this->option_name, [] );
	}

	function add_admin_nav( $nav ) {
		$nav[ $this->id ] = $this->name;
		return $nav;
	}

	public $admin_menu;
	function save_admin_menu() {
		global $menu;
		$this->admin_menu = $menu;
	}

	function register_settings() {

		register_setting( $this->id, $this->option_name );

		// add section
		add_settings_section(
			'adminz_admin',
			'Admin',
			function () {},
			$this->id
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Admin login',
			function () {

				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type'        => 'wp_media',
						'name'        => $this->option_name . '[adminz_admin_logo]',
						'placeholder' => '',
					],
					'value'     => $this->settings['adminz_admin_logo'] ?? "",
					'note'      => 'Login Logo',
				] );

				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type'        => 'wp_media',
						'name'        => $this->option_name . '[adminz_admin_background]',
						'placeholder' => '',
					],
					'value'     => $this->settings['adminz_admin_background'] ?? "",
					'note'      => 'Admin login Background',
				] );

				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type'        => 'checkbox',
						'name'        => $this->option_name . '[adminz_admin_login_quiz]',
						'placeholder' => '',
					],
					'value'     => $this->settings['adminz_admin_login_quiz'] ?? "",
					'note'      => 'Admin login quiz',
				] );

				// field
				echo adminz_field( [ 
					'field'     => 'textarea',
					'attribute' => [ 
						'name' => $this->option_name . '[adminz_admin_login_footer_text]',
					],
					'value'     => $this->settings['adminz_admin_login_footer_text'] ?? "",
					'note'      => 'Admin login Footer text',
				] );
			},
			$this->id,
			'adminz_admin'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Admin notice',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'textarea',
					'attribute' => [ 
						'name' => $this->option_name . '[adminz_notice]',
					],
					'value'     => $this->settings['adminz_notice'] ?? "",
				] );
			},
			$this->id,
			'adminz_admin'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Classic editor',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type' => 'checkbox',
						'name' => $this->option_name . '[adminz_use_classic_editor]',
					],
					'value'     => $this->settings['adminz_use_classic_editor'] ?? "",
				] );
			},
			$this->id,
			'adminz_admin'
		);

		// field 		
		add_settings_field(
			wp_rand(),
			'Hide admin menu',
			function () {

				// hide admin menu
				$menu_items = [ "" => __( 'Select' ),];
				foreach ( $this->admin_menu as $menu_item ) {
					$menu_slug = $menu_item[2];
					$menu_name = $menu_item[0];
					if ( !$menu_name ) {
						$menu_name = $menu_slug;
					}
					$menu_items[ $menu_slug ] = wp_strip_all_tags( $menu_name );
				}

				$current = $this->settings['hide_admin_menu'] ?? [ '' ];

				$args          = [ 
					'field'   => 'select',
					'options' => $menu_items,
				];
				$field_configs = [ 
					']' => $args,
				];

				echo adminz_repeater(
					$current,
					$this->option_name . '[hide_admin_menu]',
					$field_configs
				);


				// user excluded
				echo '<h4>User excluded </h4>';
				$current      = $this->settings['hide_admin_menu_excluded_user'] ?? [ '' ];
				$users        = get_users( [ 'role' => 'administrator' ] );
				$user_options = [ "" => __( 'Select' ),];
				foreach ( (array) $users as $key => $user ) {
					$user_options[ $user->data->ID ] = $user->data->user_login;
				}
				$args          = [ 
					'field'   => 'select',
					'options' => $user_options,
				];
				$field_configs = [ 
					']' => $args,
				];
				echo adminz_repeater(
					$current,
					$this->option_name . '[hide_admin_menu_excluded_user]',
					$field_configs
				);

			},
			$this->id,
			'adminz_admin'
		);

		// add section
		add_settings_section(
			'adminz_attachment',
			'Attchment',
			function () {},
			$this->id
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Image auto watermark',
			function () {
				// field
				$gd_status = \Adminz\Helper\Watermark::check_gd_library() ? 'Yes' : 'No';
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type'        => 'wp_media',
						'name'        => $this->option_name . '[image_auto_watermark]',
						'placeholder' => '',
					],
					'value'     => $this->settings['image_auto_watermark'] ?? "",
					'note'      => "Gd library enabled status: $gd_status",
				] );

				// Others
				echo adminz_toggle_button( __( 'Tools' ), ".xxxxxxxxxxxx" );
				echo '<div class="xxxxxxxxxxxx hidden" style="margin-top: 15px;">';
				$link_tool = add_query_arg( [ 'adminz_run_watermark' => '',], get_site_url() );
				echo "<a target=_blank class=button href='/?adminz_test_watermark'>" . __( "Test watermark" ) . "</a> ";
				echo "<a target=_blank class=button href='$link_tool'>" . __( 'Set watermark' ) . "</a> ";

				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type'          => 'button',
						'class'         => [ 'button', 'adminz_open_wpmedia' ],
						'data-config'   => json_encode( [ 
							'title'    => __( 'Media' ),
							'button'   => [ 
								'text' => __( 'Select' ),
							],
							'multiple' => true,
						] ),
						'data-callback' => 'watermark_restore',
					],
					'value'     => __( 'Restore' ),
					'before'    => '',
					'after'     => '',
				] );
				?>
			<script type="text/javascript">
				document.addEventListener('watermark_restore', function (e) {
					const images = e.detail.images;
					const button = e.detail.context;
					const output = document.querySelector('.watermark_restore_output');

					// Fetch 
					(async () => {
						try {
							const url = adminz_js.ajax_url;
							const formData = new FormData();
							formData.append('action', 'adminz_restore_watermark');
							formData.append('data', JSON.stringify(images));
							formData.append('nonce', adminz_js.nonce);
							//console.log('Before Fetch:', formData.get('data');

							const response = await fetch(url, {
								method: 'POST',
								body: formData,
							});

							if (!response.ok) {
								throw new Error('Network response was not ok');
							}

							const data = await response.json(); // reponse.text()
							// console.log(data.data);
							if (data.success) {
								output.innerHTML = data.data

							} else {
							}
						} catch (error) {
							console.error('Fetch error:', error);
						}
					})();
				});
			</script>
			<div class="adminz_response watermark_restore_output"></div>
			<?php
				echo '</div>';
			},
			$this->id,
			'adminz_attachment'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Auto image excerpt',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type' => 'checkbox',
						'name' => $this->option_name . '[auto_image_excerpt]',
					],
					'value'     => $this->settings['auto_image_excerpt'] ?? "",
				] );
			},
			$this->id,
			'adminz_attachment'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Post thumbnail size',
			function () {
				// field
				$options = [ "" => __( 'Select' ),];
				foreach ( (array) get_intermediate_image_sizes() as $key => $value ) {
					$options[ $value ] = $value;
				};

				echo adminz_field( [ 
					'field'     => 'select',
					'attribute' => [ 
						'name' => $this->option_name . '[post_thumbnail_size]',
					],
					'options'   => $options,
					'value'     => $this->settings['post_thumbnail_size'] ?? "",
				] );
			},
			$this->id,
			'adminz_attachment'
		);

		// add section
		add_settings_section(
			'adminz_plugins',
			'Plugins',
			function () {},
			$this->id
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Disable plugins update',
			function () {
				$current = $this->settings['disable_plugins_update'] ?? [ '' ];
				$args    = [ 
					'field'   => 'select',
					'options' => [ 
						"" => __( 'Select' ),
					],
				];

				$args['options'] = array_merge( $args['options'], adminz_plugins_installed() );
				$field_configs   = [ 
					']' => $args,
				];

				echo adminz_repeater(
					$current,
					$this->option_name . '[disable_plugins_update]',
					$field_configs
				);
			},
			$this->id,
			'adminz_plugins'
		);


		// add section
		add_settings_section(
			'adminz_sidebar',
			'Sidebar',
			function () {},
			$this->id
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Sidebar creator',
			function () {
				$adminz_sidebars = $this->settings['adminz_sidebars'] ?? [ '' ];
				$args            = [ 
					'field'     => 'input',
					'attribute' => [ 
						'type'        => 'text',
						'placeholder' => 'Sidebar name',
					],
				];

				$field_configs = [ 
					']' => $args,
				];

				echo adminz_repeater(
					$adminz_sidebars,
					$this->option_name . '[adminz_sidebars]',
					$field_configs
				);
			},
			$this->id,
			'adminz_sidebar'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Use adminz widgets',
			function () {
				$current       = $this->settings['adminz_use_adminz_widgets'] ?? [ '' ];
				$args          = [ 
					'field'   => 'select',
					'options' => [ 
						""                                 => __( 'Select' ),
						'Adminz\Widget\Adminz_Taxonomies'  => 'Adminz Taxonomies',
						'Adminz\Widget\Adminz_RecentPosts' => 'Adminz Recent Posts',
					],
				];
				$field_configs = [ 
					']' => $args,
				];

				echo adminz_repeater(
					$current,
					$this->option_name . '[adminz_use_adminz_widgets]',
					$field_configs
				);
			},
			$this->id,
			'adminz_sidebar'
		);



		// add section
		add_settings_section(
			'adminz_posttype',
			'Post types & taxonomies',
			function () {},
			$this->id
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Post type thumbnail',
			function () {
				$current = $this->settings['adminz_post_type_thumb'] ?? [ '' ];
				$args    = [ 
					'field'   => 'select',
					'options' => [ "" => __( 'Select' ) ],
				];
				foreach ( get_post_types() as $value ) {
					$args['options'][ $value ] = $value;
				}
				$field_configs = [ 
					']' => $args,
				];

				echo adminz_repeater(
					$current,
					$this->option_name . '[adminz_post_type_thumb]',
					$field_configs
				);
				$metaKey = adminz_copy( 'thumbnail_id' );
				echo <<<HTML
				<p>
					<small>Meta key: {$metaKey}</small>
				</p>
				HTML;
			},
			$this->id,
			'adminz_posttype'
		);

		// add section
		add_settings_section(
			'adminz_term_taxonomy',
			'Term Taxonomies',
			function () {},
			$this->id
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Term thumbnail',
			function () {
				$current = $this->settings['adminz_tax_thumb'] ?? [ '' ];
				$args    = [ 
					'field'   => 'select',
					'options' => [ "" => __( 'Select' ) ],
				];
				foreach ( get_taxonomies() as $value ) {
					$args['options'][ $value ] = $value;
				}
				$field_configs = [ 
					']' => $args,
				];

				echo adminz_repeater(
					$current,
					$this->option_name . '[adminz_tax_thumb]',
					$field_configs
				);

				$metaKey = adminz_copy( 'thumbnail_id' );
				echo <<<HTML
				<p>
					<small>Meta key: {$metaKey}</small>
				</p>
				HTML;
			},
			$this->id,
			'adminz_term_taxonomy'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Term content tiny mce',
			function () {
				$current = $this->settings['adminz_tiny_mce_taxonomy'] ?? [ '' ];
				$args    = [ 
					'field'   => 'select',
					'options' => [ "" => __( 'Select' ) ],
				];
				foreach ( get_taxonomies() as $value ) {
					$args['options'][ $value ] = $value;
				}
				$field_configs = [ 
					']' => $args,
				];
				echo adminz_repeater(
					$current,
					$this->option_name . '[adminz_tiny_mce_taxonomy]',
					$field_configs
				);

			},
			$this->id,
			'adminz_term_taxonomy'
		);

		// add section
		add_settings_section(
			'adminz_wordpress_content',
			'Content',
			function () {},
			$this->id
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Preg Replace',
			function () {
				$current = $this->settings['preg_replace'] ?? [];

				// default 
				if ( empty( $current ) ) {
					$current = adminz_repeater_array_default( 3 );
				}

				$key_args = [ 
					'field'     => 'textarea',
					'attribute' => [ 
						'placeholder' => __( 'Search' ),
						'rows'        => 2,
					],
				];

				$value_args = [ 
					'field'     => 'textarea',
					'attribute' => [ 
						'placeholder' => __( 'Replace' ),
						'rows'        => 2,
					],
				];

				$field_configs = [ 
					'[key]'   => $key_args,
					'[value]' => $value_args,
				];

				echo adminz_repeater(
					$current,
					$this->option_name . '[preg_replace]',
					$field_configs
				);

				$searchEx  = adminz_copy( htmlentities2( '<h3 class="comments-title uppercase">(.*?)</h3>' ) );
				$replaceEx = adminz_copy( htmlentities2( '<h4 class="comments-title uppercase">$1</h4>' ) );
				echo <<<HTML
				<p>
					<strong><small>Search Ex:</small> </strong>
					{$searchEx}
				</p>
				<p>
					<strong><small>Replace Ex:</small> </strong>
					{$replaceEx}
				</p>
				HTML;
			},
			$this->id,
			'adminz_wordpress_content'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Gettext',
			function () {
				$current = $this->settings['gettext'] ?? [];

				// default 
				if ( empty( $current ) ) {
					$current = [ 
						[ 
							'your_text'   => '',
							'translation' => '',
							'text'        => '',
							'domain'      => '',
						],
					];
				}

				$field_configs = [ 
					'[your_text]'   => [ 
						'field'     => 'input',
						'attribute' => [ 
							'type'        => 'text',
							'placeholder' => 'Your text',
						],
					],
					'[translation]' => [ 
						'field'     => 'input',
						'attribute' => [ 
							'type'        => 'text',
							'placeholder' => 'Translated text',
						],
					],
					'[text]'        => [ 
						'field'     => 'input',
						'attribute' => [ 
							'type'        => 'text',
							'placeholder' => 'Text to translate',
						],
					],
					'[domain]'      => [ 
						'field'     => 'input',
						'attribute' => [ 
							'type'        => 'text',
							'placeholder' => 'Text domain',
						],
					],
				];

				echo adminz_repeater(
					$current,
					$this->option_name . '[gettext]',
					$field_configs
				);

				$note = __( 'Note' );
				echo <<<HTML
				<p>
					<small>
						<strong>
							{$note}:
						</strong>
						Like filter hooks <a target="_blank"
							href="https://developer.wordpress.org/reference/hooks/gettext">gettext</a>
					</small>
				</p>
				HTML;

			},
			$this->id,
			'adminz_wordpress_content'
		);
	}
}