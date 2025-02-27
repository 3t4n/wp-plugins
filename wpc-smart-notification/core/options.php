<?php

namespace WPCSN;

defined( 'ABSPATH' ) || exit;

class options {
	public $instance;

	function __construct() {
		include_once 'control/abstract.php';
		$this->instance = get_option( 'wpcsn_opts' );
	}

	function settings() {
		return [
			'group_sources'            => [
				'type'  => 'group',
				'label' => esc_html__( 'Data Sources Settings', 'wpc-smart-notification' ),
				'data'  => [
					'data_sources'  => [
						'type'        => 'checkbox',
						'std'         => 'on_sale_products',
						'label'       => esc_html__( 'Data Sources', 'wpc-smart-notification' ),
						'description' => esc_html__( 'Select the source(s) to display the feeds.', 'wpc-smart-notification' ),
						'options'     => [
							'new_orders'         => [
								'text' => esc_html__( 'New Orders', 'wpc-smart-notification' ),
							],
							'virtual_orders'     => [
								'text' => esc_html__( 'Virtual Orders', 'wpc-smart-notification' ),
							],
							'on_sale_products'   => [
								'text' => esc_html__( 'On Sale Products', 'wpc-smart-notification' ),
							],
							'low_stock_products' => [
								'text' => esc_html__( 'Low Stock Products', 'wpc-smart-notification' ),
							],
							'related_products'   => [
								'text' => esc_html__( 'Related Products', 'wpc-smart-notification' ),
							],
							'viewing'            => [
								'text' => esc_html__( 'Viewing', 'wpc-smart-notification' ),
							],
							'cart'               => [
								'text' => esc_html__( 'Cart', 'wpc-smart-notification' ),
							],
							'manual'             => [
								'text' => esc_html__( 'Manual', 'wpc-smart-notification' ),
							],
							'html'               => [
								'text' => esc_html__( 'Text Editor (Premium)', 'wpc-smart-notification' ),
							],
						],
					],
					'order'         => [
						'type'        => 'select',
						'std'         => 'rand',
						'label'       => esc_html__( 'Order', 'wpc-smart-notification' ),
						'description' => esc_html__( 'The order in which messages are displayed.', 'wpc-smart-notification' ),
						'options'     => [
							'default' => [
								'text' => esc_html__( 'Default', 'wpc-smart-notification' ),
							],
							'rand'    => [
								'text' => esc_html__( 'Random', 'wpc-smart-notification' ),
							],
						],
					],
					'display_order' => [
						'type'        => 'sortable',
						'std'         => '',
						'label'       => esc_html__( 'Sort', 'wpc-smart-notification' ),
						'description' => esc_html__( 'Sort the data sources.', 'wpc-smart-notification' ),
						'toggle'      => [
							'field' => 'order',
							'value' => 'default',
						],
						'bind'        => [
							'field' => 'data_sources',
						],
						'options'     => [
							'new_orders'         => [
								'text'     => esc_html__( 'New Orders', 'wpc-smart-notification' ),
								'disabled' => false
							],
							'virtual_orders'     => [
								'text'     => esc_html__( 'Virtual Orders', 'wpc-smart-notification' ),
								'disabled' => false
							],
							'on_sale_products'   => [
								'text'     => esc_html__( 'On Sale Products', 'wpc-smart-notification' ),
								'disabled' => false
							],
							'low_stock_products' => [
								'text'     => esc_html__( 'Low Stock Products', 'wpc-smart-notification' ),
								'disabled' => false
							],
							'related_products'   => [
								'text'     => esc_html__( 'Related Products', 'wpc-smart-notification' ),
								'disabled' => false
							],
							'viewing'            => [
								'text'     => esc_html__( 'Viewing', 'wpc-smart-notification' ),
								'disabled' => false
							],
							'cart'               => [
								'text'     => esc_html__( 'Cart', 'wpc-smart-notification' ),
								'disabled' => false
							],
							'manual'             => [
								'text'     => esc_html__( 'Manual', 'wpc-smart-notification' ),
								'disabled' => false
							],
							'html'               => [
								'text'     => esc_html__( 'Text Editor', 'wpc-smart-notification' ),
								'disabled' => false
							],
						],
					],
				],
			],
			'group_new_orders'         => [
				'type'   => 'group',
				'label'  => esc_html__( 'New Orders', 'wpc-smart-notification' ),
				'toggle' => [
					'field' => 'data_sources',
					'value' => 'new_orders',
				],
				'data'   => [
					'new_orders' => [
						'type' => 'multipleField',
						'data' => [
							'number' => [
								'type'        => 'number',
								'std'         => '10',
								'style'       => 'width: 50%',
								'label'       => esc_html__( 'Number', 'wpc-smart-notification' ),
								'description' => esc_html__( 'Number of orders.', 'wpc-smart-notification' ),
							],
							'within' => [
								'type'        => 'number',
								'std'         => '24',
								'style'       => 'width: 50%',
								'min'         => 1,
								'max'         => 720,
								'label'       => esc_html__( 'Within (hours)', 'wpc-smart-notification' ),
								'description' => esc_html__( 'Get orders within (x) hours from the present time.', 'wpc-smart-notification' ),
							],
						],
					],
				],
			],
			'group_virtual_orders'     => [
				'type'        => 'group',
				'label'       => esc_html__( 'Virtual Orders', 'wpc-smart-notification' ),
				'description' => esc_html__( 'Below information will be combined randomly.', 'wpc-smart-notification' ),
				'toggle'      => [
					'field' => 'data_sources',
					'value' => 'virtual_orders',
				],
				'data'        => [
					'virtual_orders > name'     => [
						'type'        => 'select',
						'std'         => '',
						'label'       => esc_html__( 'Buyer Name(s)', 'wpc-smart-notification' ),
						'description' => esc_html__( 'Type a name and press "Enter" to add.', 'wpc-smart-notification' ),
						'multiple'    => true,
						'tags'        => true,
					],
					'virtual_orders > address'  => [
						'type'        => 'select',
						'std'         => '',
						'label'       => esc_html__( 'Buyer Address(s)', 'wpc-smart-notification' ),
						'description' => esc_html__( 'Type an address and press "Enter" to add.', 'wpc-smart-notification' ),
						'multiple'    => true,
						'tags'        => true,
					],
					'virtual_orders > products' => [
						'type'        => 'select',
						'std'         => '',
						'multiple'    => true,
						'source'      => 'products',
						'field'       => 'all',
						'label'       => esc_html__( 'Product(s)', 'wpc-smart-notification' ),
						'description' => esc_html__( 'Product of virtual orders. If left blank the product will be taken at random.', 'wpc-smart-notification' ),
					],
					'virtual_orders > within'   => [
						'type'        => 'number',
						'std'         => 120,
						'min'         => 60,
						'max'         => 864000,
						'label'       => esc_html__( 'Within (seconds)', 'wpc-smart-notification' ),
						'description' => esc_html__( 'The time will be generated randomly within this value (seconds) and be calculated into minutes, hours, or days.', 'wpc-smart-notification' ),
					],
					'virtual_orders > number'   => [
						'type'        => 'number',
						'std'         => '10',
						'label'       => esc_html__( 'Number', 'wpc-smart-notification' ),
						'description' => esc_html__( 'Maximum number of orders to be generated.', 'wpc-smart-notification' ),
					],
				],
			],
			'group_on_sale_products'   => [
				'type'   => 'group',
				'label'  => esc_html__( 'On Sale Products', 'wpc-smart-notification' ),
				'toggle' => [
					'field' => 'data_sources',
					'value' => 'on_sale_products',
				],
				'data'   => [
					'on_sale_products > number' => [
						'type'        => 'number',
						'std'         => '10',
						'label'       => esc_html__( 'Number', 'wpc-smart-notification' ),
						'description' => esc_html__( 'Number of products.', 'wpc-smart-notification' ),
					],
				],
			],
			'group_low_stock_products' => [
				'type'   => 'group',
				'label'  => esc_html__( 'Low Stock Products', 'wpc-smart-notification' ),
				'toggle' => [
					'field' => 'data_sources',
					'value' => 'low_stock_products',
				],
				'data'   => [
					'low_stock_products' => [
						'type' => 'multipleField',
						'data' => [
							'number'              => [
								'type'        => 'number',
								'std'         => '10',
								'style'       => 'width: 50%',
								'label'       => esc_html__( 'Number', 'wpc-smart-notification' ),
								'description' => esc_html__( 'Number of products.', 'wpc-smart-notification' ),
							],
							'low_stock_threshold' => [
								'type'        => 'number',
								'std'         => '10',
								'style'       => 'width: 50%',
								'min'         => 1,
								'max'         => 10000,
								'label'       => esc_html__( 'Low stock Threshold', 'wpc-smart-notification' ),
								'description' => esc_html__( 'Number of products remaining in stock.', 'wpc-smart-notification' ),
							],
						],
					]
				],
			],
			'group_related_products'   => [
				'type'   => 'group',
				'label'  => esc_html__( 'Related Products', 'wpc-smart-notification' ),
				'toggle' => [
					'field' => 'data_sources',
					'value' => 'related_products',
				],
				'data'   => [
					'related_products > number' => [
						'type'        => 'number',
						'std'         => '10',
						'label'       => esc_html__( 'Number', 'wpc-smart-notification' ),
						'description' => esc_html__( 'Number of products.', 'wpc-smart-notification' ),
					],
				],
			],
			'group_viewing'            => [
				'type'        => 'group',
				'label'       => esc_html__( 'Viewing', 'wpc-smart-notification' ),
				'description' => esc_html__( 'The range of people are viewing a product.', 'wpc-smart-notification' ),
				'toggle'      => [
					'field' => 'data_sources',
					'value' => 'viewing',
				],
				'data'        => [
					'viewing > thumbnail' => [
						'type'  => 'image',
						'std'   => '',
						'style' => 'width: 25%',
						'label' => esc_html__( 'Thumbnail', 'wpc-smart-notification' ),
					],
					'viewing > range'     => [
						'type' => 'multipleField',
						'data' => [
							'min' => [
								'type'  => 'number',
								'std'   => 10,
								'min'   => 2,
								'style' => 'width: 50%',
								'label' => esc_html__( 'Minimum', 'wpc-smart-notification' ),
							],
							'max' => [
								'type'  => 'number',
								'std'   => 100,
								'min'   => 2,
								'style' => 'width: 50%',
								'label' => esc_html__( 'Maximum', 'wpc-smart-notification' ),
							],
						],
					],
				],
			],
			'group_cart'               => [
				'type'   => 'group',
				'label'  => esc_html__( 'Cart', 'wpc-smart-notification' ),
				'toggle' => [
					'field' => 'data_sources',
					'value' => 'cart',
				],
				'data'   => [
					'cart > thumbnail' => [
						'type'  => 'image',
						'std'   => '',
						'style' => 'width: 25%',
						'label' => esc_html__( 'Thumbnail', 'wpc-smart-notification' ),
					],
					'cart > link'      => [
						'type'        => 'select',
						'std'         => 'same',
						'label'       => esc_html__( 'Link', 'wpc-smart-notification' ),
						'description' => esc_html__( 'Choose the way to open the cart. If choose "Show the WPC Fly Cart", you need to install plugin WPC Fly Cart.', 'wpc-smart-notification' ),
						'options'     => [
							'same'  => [
								'text' => esc_html__( 'Open cart page in same tab', 'wpc-smart-notification' ),
							],
							'new'   => [
								'text' => esc_html__( 'Open cart page in new tab', 'wpc-smart-notification' ),
							],
							'woofc' => [
								'text' => esc_html__( 'Show the WPC Fly Cart', 'wpc-smart-notification' ),
							],
						],
					],
				],
			],
			'group_manual'             => [
				'type'   => 'group',
				'label'  => esc_html__( 'Manual', 'wpc-smart-notification' ),
				'toggle' => [
					'field' => 'data_sources',
					'value' => 'manual',
				],
				'data'   => [
					'manual' => [
						'type'     => 'multipleField',
						'label'    => esc_html__( 'Notification(s)', 'wpc-smart-notification' ),
						'multiple' => true,
						'data'     => [
							'thumbnail' => [
								'type'        => 'image',
								'std'         => '',
								'style'       => 'width: 25%',
								'placeholder' => esc_html__( 'Thumbnail', 'wpc-smart-notification' ),
							],
							'title'     => [
								'type'        => 'text',
								'std'         => '',
								'style'       => 'width: 25%',
								'placeholder' => esc_html__( 'Title', 'wpc-smart-notification' ),
							],
							'link'      => [
								'type'        => 'url',
								'std'         => '',
								'style'       => 'width: 25%',
								'placeholder' => esc_html__( 'Link', 'wpc-smart-notification' ),
							],
							'content'   => [
								'type'        => 'text',
								'std'         => '',
								'style'       => 'width: 25%',
								'placeholder' => esc_html__( 'Content', 'wpc-smart-notification' ),
							],
						]
					],
				],
			],
			'group_html'               => [
				'type'   => 'group',
				'label'  => esc_html__( 'Text Editor', 'wpc-smart-notification' ),
				'toggle' => [
					'field' => 'data_sources',
					'value' => 'html',
				],
				'data'   => [
					'html' => [
						'type'        => 'textarea',
						'std'         => '',
						'label'       => esc_html__( 'Notification(s)', 'wpc-smart-notification' ),
						'multiple'    => true,
						'placeholder' => esc_html__( 'Please enter html here, with shortcode support.', 'wpc-smart-notification' ),
					],
				],
			],
			'group_options'            => [
				'type'  => 'group',
				'label' => esc_html__( 'Box Settings', 'wpc-smart-notification' ),
				'data'  => [
					'options > effect'       => [
						'type' => 'multipleField',
						'data' => [
							'show' => [
								'type'        => 'select',
								'std'         => 'bounceInUp',
								'style'       => 'width: 50%',
								'label'       => esc_html__( 'Show Effect', 'wpc-smart-notification' ),
								'description' => esc_html__( 'Animation when showing item.', 'wpc-smart-notification' ),
								'options'     => [
									'bounceIn'      => [
										'text' => esc_html__( 'Bounce In', 'wpc-smart-notification' ),
									],
									'bounceInUp'    => [
										'text' => esc_html__( 'Bounce In Up', 'wpc-smart-notification' ),
									],
									'bounceInDown'  => [
										'text' => esc_html__( 'Bounce In Down', 'wpc-smart-notification' ),
									],
									'bounceInLeft'  => [
										'text' => esc_html__( 'Bounce In Left', 'wpc-smart-notification' ),
									],
									'bounceInRight' => [
										'text' => esc_html__( 'Bounce In Right', 'wpc-smart-notification' ),
									],
								],
							],
							'hide' => [
								'type'        => 'select',
								'std'         => 'bounceOutDown',
								'style'       => 'width: 50%',
								'label'       => esc_html__( 'Hide Effect', 'wpc-smart-notification' ),
								'description' => esc_html__( 'Animation when hiding item.', 'wpc-smart-notification' ),
								'options'     => [
									'bounceOut'      => [
										'text' => esc_html__( 'Bounce Out', 'wpc-smart-notification' ),
									],
									'bounceOutUp'    => [
										'text' => esc_html__( 'Bounce Out Up', 'wpc-smart-notification' ),
									],
									'bounceOutDown'  => [
										'text' => esc_html__( 'Bounce Out Down', 'wpc-smart-notification' ),
									],
									'bounceOutLeft'  => [
										'text' => esc_html__( 'Bounce Out Left', 'wpc-smart-notification' ),
									],
									'bounceOutRight' => [
										'text' => esc_html__( 'Bounce Out Right', 'wpc-smart-notification' ),
									],
								],
							],
						],
					],
					'options > delay_start'  => [
						'type'        => 'number',
						'std'         => '0',
						'min'         => 0,
						'max'         => 100000,
						'label'       => esc_html__( 'Delay Starting Time (seconds)', 'wpc-smart-notification' ),
						'description' => esc_html__( 'Countdown in seconds to show the notification upon loading the page.', 'wpc-smart-notification' ),
					],
					'options > autoplay'     => [
						'type'        => 'number',
						'std'         => '5',
						'min'         => 1,
						'max'         => 100000,
						'label'       => esc_html__( 'Autoplay Duration Time (seconds)', 'wpc-smart-notification' ),
						'description' => esc_html__( 'How long each notification will stay on the screen.', 'wpc-smart-notification' ),
					],
					'options > delay_switch' => [
						'type'        => 'number',
						'std'         => '0',
						'min'         => 0,
						'max'         => 100000,
						'label'       => esc_html__( 'Autoplay Interval Time (seconds)', 'wpc-smart-notification' ),
						'description' => esc_html__( 'The interval time in seconds between two linear notifications.', 'wpc-smart-notification' ),
					],
					'options > close_until'  => [
						'type'        => 'select',
						'std'         => 'switch-page',
						'label'       => esc_html__( 'Close Until', 'wpc-smart-notification' ),
						'description' => esc_html__( 'When pressing close button, how long that do you want to close notifications?', 'wpc-smart-notification' ),
						'options'     => [
							'switch-page' => [
								'text' => esc_html__( 'Switch page', 'wpc-smart-notification' ),
							],
							'end-season'  => [
								'text' => esc_html__( 'End of session', 'wpc-smart-notification' ),
							],
							'one-hour'    => [
								'text' => esc_html__( 'One hour', 'wpc-smart-notification' ),
							],
							'one-day'     => [
								'text' => esc_html__( 'One day', 'wpc-smart-notification' ),
							],
							'seven-days'  => [
								'text' => esc_html__( 'Seven days', 'wpc-smart-notification' ),
							],
						],
					],
					'options > position'     => [
						'type'        => 'select',
						'std'         => 'bottom-left',
						'label'       => esc_html__( 'Position', 'wpc-smart-notification' ),
						'description' => esc_html__( 'Choose where to show the box on the screen.', 'wpc-smart-notification' ),
						'options'     => [
							'top-left'     => [
								'text' => esc_html__( 'Top Left', 'wpc-smart-notification' ),
							],
							'bottom-left'  => [
								'text' => esc_html__( 'Bottom Left', 'wpc-smart-notification' ),
							],
							'top-right'    => [
								'text' => esc_html__( 'Top Right', 'wpc-smart-notification' ),
							],
							'bottom-right' => [
								'text' => esc_html__( 'Bottom Right', 'wpc-smart-notification' ),
							],
						],
					],
					'options > loop'         => [
						'type'    => 'select',
						'std'     => 'yes',
						'label'   => esc_html__( 'Infinite Loop', 'wpc-smart-notification' ),
						'options' => [
							'yes' => [
								'text' => esc_html__( 'Yes', 'wpc-smart-notification' ),
							],
							'no'  => [
								'text' => esc_html__( 'No', 'wpc-smart-notification' ),
							],
						],
					],
					'options > pause'        => [
						'type'    => 'select',
						'std'     => 'yes',
						'label'   => esc_html__( 'Pause On Hover', 'wpc-smart-notification' ),
						'options' => [
							'yes' => [
								'text' => esc_html__( 'Yes', 'wpc-smart-notification' ),
							],
							'no'  => [
								'text' => esc_html__( 'No', 'wpc-smart-notification' ),
							],
						],
					],
					'options > link'         => [
						'type'        => 'select',
						'std'         => 'same',
						'label'       => esc_html__( 'Product Link', 'wpc-smart-notification' ),
						'description' => esc_html__( 'Choose the way to open the product link. If choose "Open quick view popup", you need to install plugin WPC Smart Quick View.', 'wpc-smart-notification' ),
						'options'     => [
							'same'  => [
								'text' => esc_html__( 'Open in same tab', 'wpc-smart-notification' ),
							],
							'new'   => [
								'text' => esc_html__( 'Open in new tab', 'wpc-smart-notification' ),
							],
							'woosq' => [
								'text' => esc_html__( 'Open quick view popup', 'wpc-smart-notification' ),
							],
						],
					],
					'options > disable'      => [
						'type'        => 'checkbox',
						'std'         => '',
						'label'       => esc_html__( 'Disable', 'wpc-smart-notification' ),
						'description' => esc_html__( 'Select the where you want to disable the box.', 'wpc-smart-notification' ),
						'options'     => [
							'cart'     => [
								'text' => esc_html__( 'Cart', 'wpc-smart-notification' ),
							],
							'checkout' => [
								'text' => esc_html__( 'Checkout', 'wpc-smart-notification' ),
							],
							'mobile'   => [
								'text' => esc_html__( 'Mobile', 'wpc-smart-notification' ),
							],
						],
					],
				]
			]
		];
	}

	function get_html() {
		$active_tab = sanitize_key( $_GET['tab'] ?? 'settings' );
		?>
        <div class="wpclever_settings_page wrap">
            <h1 class="wpclever_settings_page_title"><?php echo esc_html__( 'WPC Smart Notifications', 'wpc-smart-notification' ) . ' ' . esc_html( WPCSN_VERSION ) . ' ' . ( defined( 'WPCSN_PREMIUM' ) ? '<span class="premium" style="display: none">' . esc_html__( 'Premium', 'wpc-smart-notification' ) . '</span>' : '' ); ?></h1>
            <div class="wpclever_settings_page_desc about-text">
                <p>
					<?php printf( /* translators: stars */ esc_html__( 'Thank you for using our plugin! If you are satisfied, please reward it a full five-star %s rating.', 'wpc-smart-notification' ), '<span style="color:#ffb900">&#9733;&#9733;&#9733;&#9733;&#9733;</span>' ); ?>
                    <br/>
                    <a href="<?php echo esc_url( WPCSN_REVIEWS ); ?>"
                       target="_blank"><?php esc_html_e( 'Reviews', 'wpc-smart-notification' ); ?></a> |
                    <a href="<?php echo esc_url( WPCSN_CHANGELOG ); ?>"
                       target="_blank"><?php esc_html_e( 'Changelog', 'wpc-smart-notification' ); ?></a> |
                    <a href="<?php echo esc_url( WPCSN_DISCUSSION ); ?>"
                       target="_blank"><?php esc_html_e( 'Discussion', 'wpc-smart-notification' ); ?></a>
                </p>
            </div>
            <div class="wpclever_settings_page_nav">
                <h2 class="nav-tab-wrapper">
                    <a href="<?php echo esc_url( admin_url( 'admin.php?page=wpclever-wpcsn&tab=settings' ) ); ?>"
                       class="<?php echo esc_attr( $active_tab === 'settings' ? 'nav-tab nav-tab-active' : 'nav-tab' ); ?>">
						<?php esc_html_e( 'Settings', 'wpc-smart-notification' ); ?>
                    </a>
                    <a href="<?php echo esc_url( admin_url( 'admin.php?page=wpclever-wpcsn&tab=localization' ) ); ?>"
                       class="<?php echo esc_attr( $active_tab === 'localization' ? 'nav-tab nav-tab-active' : 'nav-tab' ); ?>">
						<?php esc_html_e( 'Localization', 'wpc-smart-notification' ); ?>
                    </a>
                    <a href="<?php echo esc_url( admin_url( 'admin.php?page=wpclever-wpcsn&tab=premium' ) ); ?>"
                       class="<?php echo $active_tab === 'premium' ? 'nav-tab nav-tab-active' : 'nav-tab'; ?>"
                       style="color: #c9356e">
						<?php esc_html_e( 'Premium Version', 'wpc-smart-notification' ); ?>
                    </a> <a href="<?php echo esc_url( admin_url( 'admin.php?page=wpclever-kit' ) ); ?>" class="nav-tab">
						<?php esc_html_e( 'Essential Kit', 'wpc-smart-notification' ); ?>
                    </a>
                </h2>
            </div>
            <div class="wpclever_settings_page_content">
				<?php if ( $active_tab === 'settings' ) { ?>
                    <form method="post" class="wpcsn-wrap">
						<?php
						$form = formControl\initialization::get_instance( [
							'class'    => get_class( $this ),
							'settings' => $this->settings(),
							'instance' => $this->instance,
						] );
						echo $form->formBuilding();
						echo '<div class="form-action"><button type="submit" class="button button-primary">', esc_html__( 'Update Options', 'wpc-smart-notification' ), '</button></div>';
						?>
                    </form>
				<?php } elseif ( $active_tab === 'localization' ) { ?>
                    <form method="post" action="options.php">
                        <table class="form-table">
                            <tr class="heading">
                                <th scope="row"><?php esc_html_e( 'General', 'wpc-smart-notification' ); ?></th>
                                <td>
									<?php esc_html_e( 'Leave blank to use the default text and its equivalent translation in multiple languages.', 'wpc-smart-notification' ); ?>
                                </td>
                            </tr>
                            <tr>
                                <th><?php /* translators: product */
									esc_html_e( 'You may also like %s', 'wpc-smart-notification' ); ?></th>
                                <td>
                                    <label>
                                        <input type="text" name="wpcsn_localization[also_like]" class="regular-text"
                                               value="<?php echo esc_attr( Wpcsn_Helper()->localization( 'also_like' ) ); ?>"
                                               placeholder="<?php /* translators: product */
										       esc_attr_e( 'You may also like %s', 'wpc-smart-notification' ); ?>"/>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th><?php /* translators: cart */
									esc_html_e( 'Your cart: %s', 'wpc-smart-notification' ); ?></th>
                                <td>
                                    <label>
                                        <input type="text" name="wpcsn_localization[your_cart]" class="regular-text"
                                               value="<?php echo esc_attr( Wpcsn_Helper()->localization( 'your_cart' ) ); ?>"
                                               placeholder="<?php /* translators: cart */
										       esc_attr_e( 'Your cart: %s', 'wpc-smart-notification' ); ?>"/> </label>
                                </td>
                            </tr>
                            <tr>
                                <th><?php /* translators: name & address */
									esc_html_e( '%1$s from %2$s purchased a', 'wpc-smart-notification' ); ?></th>
                                <td>
                                    <label>
                                        <input type="text" name="wpcsn_localization[name_address]" class="regular-text"
                                               value="<?php echo esc_attr( Wpcsn_Helper()->localization( 'name_address' ) ); ?>"
                                               placeholder="<?php /* translators: name & address */
										       esc_attr_e( '%1$s from %2$s purchased a', 'wpc-smart-notification' ); ?>"/>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th><?php /* translators: product & stock */
									esc_html_e( '%1$s has %2$d left only. Don\'t miss it!', 'wpc-smart-notification' ); ?></th>
                                <td>
                                    <label>
                                        <input type="text" name="wpcsn_localization[low_stock]" class="regular-text"
                                               value="<?php echo esc_attr( Wpcsn_Helper()->localization( 'low_stock' ) ); ?>"
                                               placeholder="<?php /* translators: product & stock */
										       esc_attr_e( '%1$s has %2$d left only. Don\'t miss it!', 'wpc-smart-notification' ); ?>"/>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th><?php /* translators: product */
									esc_html_e( '%s is on-sale. Hurry up!', 'wpc-smart-notification' ); ?></th>
                                <td>
                                    <label>
                                        <input type="text" name="wpcsn_localization[on_sale]" class="regular-text"
                                               value="<?php echo esc_attr( Wpcsn_Helper()->localization( 'on_sale' ) ); ?>"
                                               placeholder="<?php /* translators: product */
										       esc_attr_e( '%s is on-sale. Hurry up!', 'wpc-smart-notification' ); ?>"/>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th><?php /* translators: counter */
									esc_html_e( '%s people are viewing this product now.', 'wpc-smart-notification' ); ?></th>
                                <td>
                                    <label>
                                        <input type="text" name="wpcsn_localization[viewing]" class="regular-text"
                                               value="<?php echo esc_attr( Wpcsn_Helper()->localization( 'viewing' ) ); ?>"
                                               placeholder="<?php /* translators: counter */
										       esc_attr_e( '%s people are viewing this product now.', 'wpc-smart-notification' ); ?>"/>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th><?php /* translators: cart count */
									esc_html_e( '(%s item)', 'wpc-smart-notification' ); ?></th>
                                <td>
                                    <label>
                                        <input type="text" name="wpcsn_localization[item]" class="regular-text"
                                               value="<?php echo esc_attr( Wpcsn_Helper()->localization( 'item' ) ); ?>"
                                               placeholder="<?php /* translators: cart count */
										       esc_attr_e( '(%s item)', 'wpc-smart-notification' ); ?>"/> </label>
                                </td>
                            </tr>
                            <tr>
                                <th><?php /* translators: cart count */
									esc_html_e( '(%s items)', 'wpc-smart-notification' ); ?></th>
                                <td>
                                    <label>
                                        <input type="text" name="wpcsn_localization[items]" class="regular-text"
                                               value="<?php echo esc_attr( Wpcsn_Helper()->localization( 'items' ) ); ?>"
                                               placeholder="<?php /* translators: cart count */
										       esc_attr_e( '(%s items)', 'wpc-smart-notification' ); ?>"/> </label>
                                </td>
                            </tr>
                            <tr>
                                <th><?php esc_html_e( 'about %d day ago.', 'wpc-smart-notification' ); ?></th>
                                <td>
                                    <label>
                                        <input type="text" name="wpcsn_localization[day_ago]" class="regular-text"
                                               value="<?php echo esc_attr( Wpcsn_Helper()->localization( 'day_ago' ) ); ?>"
                                               placeholder="<?php esc_attr_e( 'about %d day ago.', 'wpc-smart-notification' ); ?>"/>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th><?php esc_html_e( 'about %d days ago.', 'wpc-smart-notification' ); ?></th>
                                <td>
                                    <label>
                                        <input type="text" name="wpcsn_localization[days_ago]" class="regular-text"
                                               value="<?php echo esc_attr( Wpcsn_Helper()->localization( 'days_ago' ) ); ?>"
                                               placeholder="<?php esc_attr_e( 'about %d days ago.', 'wpc-smart-notification' ); ?>"/>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th><?php esc_html_e( 'about %d hour ago.', 'wpc-smart-notification' ); ?></th>
                                <td>
                                    <label>
                                        <input type="text" name="wpcsn_localization[hour_ago]" class="regular-text"
                                               value="<?php echo esc_attr( Wpcsn_Helper()->localization( 'hour_ago' ) ); ?>"
                                               placeholder="<?php esc_attr_e( 'about %d hour ago.', 'wpc-smart-notification' ); ?>"/>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th><?php esc_html_e( 'about %d hours ago.', 'wpc-smart-notification' ); ?></th>
                                <td>
                                    <label>
                                        <input type="text" name="wpcsn_localization[hours_ago]" class="regular-text"
                                               value="<?php echo esc_attr( Wpcsn_Helper()->localization( 'hours_ago' ) ); ?>"
                                               placeholder="<?php esc_attr_e( 'about %d hours ago.', 'wpc-smart-notification' ); ?>"/>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th><?php /* translators: minute */
									esc_html_e( 'about %d minute ago.', 'wpc-smart-notification' ); ?></th>
                                <td>
                                    <label>
                                        <input type="text" name="wpcsn_localization[minute_ago]" class="regular-text"
                                               value="<?php echo esc_attr( Wpcsn_Helper()->localization( 'minute_ago' ) ); ?>"
                                               placeholder="<?php /* translators: minute */
										       esc_attr_e( 'about %d minute ago.', 'wpc-smart-notification' ); ?>"/>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th><?php /* translators: minute */
									esc_html_e( 'about %d minutes ago.', 'wpc-smart-notification' ); ?></th>
                                <td>
                                    <label>
                                        <input type="text" name="wpcsn_localization[minutes_ago]" class="regular-text"
                                               value="<?php echo esc_attr( Wpcsn_Helper()->localization( 'minutes_ago' ) ); ?>"
                                               placeholder="<?php /* translators: minute */
										       esc_attr_e( 'about %d minutes ago.', 'wpc-smart-notification' ); ?>"/>
                                    </label>
                                </td>
                            </tr>
                            <tr class="submit">
                                <th colspan="2">
									<?php settings_fields( 'wpcsn_localization' ); ?><?php submit_button(); ?>
                                </th>
                            </tr>
                        </table>
                    </form>
				<?php } elseif ( $active_tab === 'premium' ) { ?>
                    <div class="wpclever_settings_page_content_text">
                        <p>
                            Get the Premium Version just $29!
                            <a href="https://wpclever.net/downloads/wpc-smart-notification?utm_source=pro&utm_medium=wpcsn&utm_campaign=wporg"
                               target="_blank">https://wpclever.net/downloads/wpc-smart-notification</a>
                        </p>
                        <p><strong>Extra features for Premium Version:</strong></p>
                        <ul style="margin-bottom: 0">
                            <li>- Add custom notifications with text editor.</li>
                            <li>- Get the lifetime update & premium support.</li>
                        </ul>
                    </div>
				<?php } ?>
            </div><!-- /.wpclever_settings_page_content -->
            <div class="wpclever_settings_page_suggestion">
                <div class="wpclever_settings_page_suggestion_label">
                    <span class="dashicons dashicons-yes-alt"></span> Suggestion
                </div>
                <div class="wpclever_settings_page_suggestion_content">
                    <div>
                        To display custom engaging real-time messages on any wished positions, please install
                        <a href="https://wordpress.org/plugins/wpc-smart-messages/" target="_blank">WPC Smart
                            Messages</a> plugin. It's free!
                    </div>
                    <div>
                        Wanna save your precious time working on variations? Try our brand-new free plugin
                        <a href="https://wordpress.org/plugins/wpc-variation-bulk-editor/" target="_blank">WPC Variation
                            Bulk Editor</a> and
                        <a href="https://wordpress.org/plugins/wpc-variation-duplicator/" target="_blank">WPC Variation
                            Duplicator</a>.
                    </div>
                </div>
            </div>
        </div>
		<?php
	}

	function save_form( $new_instance ) {
		$form = formControl\initialization::get_instance( [
			'class'        => get_class( $this ),
			'settings'     => $this->settings(),
			'old_instance' => $this->instance,
			'new_instance' => $new_instance,
		] );

		$data = $form->sanitizeInstance();

		return update_option( 'wpcsn_opts', $data );
	}

	public static function get_instance() {
		static $single;

		if ( empty( $single ) ) {
			$single = new self();
		}

		return $single;
	}
}
