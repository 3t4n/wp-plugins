<?php
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;

if (class_exists('MrwooMart')) {
if (class_exists('woocommerce')) {

class wpsection_wps_cart_summary_Widget extends Widget_Base {

    public function get_name() {
        return 'wpsection_wps_cart_summary';
    }

    public function get_title() {
        return __( 'Cart Summary', 'wpsection' );
    }

    public function get_icon() {
        return 'eicon-cart-medium';
    }

    public function get_keywords() {
        return [ 'wpsection', 'product' ];
    }
    
    public function get_categories() {
        return [ 'wpsection_shop' ];
    }
	
        protected function _register_controls() {
            $this->start_controls_section(
                'product_cart_sunnery_settings',
                [
                    'label' => esc_html__('Product Car Summery Settings', 'wpsection'),
                ]
            );

         

$this->add_control(
    'show_icon',
    [
        'label'       => esc_html__( 'Show Icon', 'wpsection' ),
        'type'        => \Elementor\Controls_Manager::CHOOSE,
        'options'     => [
            'show' => [
                'title' => esc_html__( 'Show', 'wpsection' ),
                'icon'  => 'eicon-check-circle',
            ],
            'none' => [
                'title' => esc_html__( 'Hide', 'wpsection' ),
                'icon'  => 'eicon-close-circle',
            ],
        ],
        'default'     => 'show',
        'selectors'   => [
            '{{WRAPPER}} .service-section .icon-box' => 'display: {{VALUE}} !important',
        ],
    ]
);

$this->add_control(
    'cartsumery_cart_icon',
    [
        'label'       => __( 'Cart Icon', 'wpsection' ),
        'type'        => \Elementor\Controls_Manager::ICONS,
        'default'     => [
            'value'   => 'flaticon-check-out',
            'library' => 'solid',
        ],
    ]
);
	
			
$this->add_control(
			'icon_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'wpsection' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'condition'    => array( 'show_icon' => 'show' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'wpsection' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpsection' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'wpsection' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .service-section .icon-box ' => 'text-align: {{VALUE}} !important',
				),
			)
		);	
$this->add_control(
			'icon_color',
			array(
				'label'     => __( ' Color', 'wpsection' ),
				'condition'    => array( 'show_icon' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  .service-section .icon-box i' => 'color: {{VALUE}} !important',

				),
			)
		);
		
$this->add_control(
			'icon_bgcolor',
			array(
				'label'     => __( 'Background Color', 'wpsection' ),
				'condition'    => array( 'show_icon' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  .service-section .icon-box' => 'background: {{VALUE}} !important',

				),
			)
		);		
	$this->add_control(
			'icon_padding',
			array(
				'label'     => __( 'Padding', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_icon' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}}  .service-section .icon-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

	$this->add_control(
			'icon_margin',
			array(
				'label'     => __( 'Margin', 'wpsection' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_icon' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}}  .service-section .icon-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'icon_typography',
				'condition'    => array( 'show_icon' => 'show' ),
				'label'    => __( 'Typography', 'wpsection' ),
				'selector' => '{{WRAPPER}}  .service-section .icon-box i',
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'icon_border',
				'condition'    => array( 'show_icon' => 'show' ),
				'selector' => '{{WRAPPER}}  .service-section .icon-box',
			)
		);
		$this->add_control(
			'icon_border_radius',
			array(
				'label' => esc_html__( 'Border Radius', 'wpsection' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'condition'    => array( 'show_icon' => 'show' ),
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .service-section .icon-box' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			)
		);

		$this->end_controls_section();
	
			
			
//End of icon	

	// New Tab#4 Block 

		$this->start_controls_section(
					'cart_summer_block',
					[
						'label' => __( 'Block Setting', 'wpsection' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);
		
$this->add_control(
			'cart_summer_block_width',
			[
				'label' => esc_html__( 'Block Width', 'wpsection' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-cart-summary' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);	





		$this->add_control(
			'cart_summer_block_color',
			array(
				'label'     => __( 'Background Color', 'wpsection' ),
				//'condition'    => array( 'show_block' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cart_summer_block' => 'background: {{VALUE}} !important',
				),
			)
		);
	
		
	
		

			
		$this->add_control(
			'cart_summer_block_margin',
			array(
				'label'     => __( 'Block Margin', 'wpsection' ),
			//'condition'    => array( 'show_block' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .woocommerce-cart-summary' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_control(
			'cart_summer_block_padding',
			array(
				'label'     => __( 'Block Padding', 'wpsection' ),
				//'condition'    => array( 'show_block' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}}  .woocommerce-cart-summary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

			$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'cart_summer_block_shadow',
				//'condition'    => array( 'show_block' => 'show' ),
				'label' => esc_html__( 'Box Shadow', 'wpsection' ),
				'selector' => '{{WRAPPER}} .woocommerce-cart-summary',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'cart_summer_block_border',
				//'condition'    => array( 'show_block' => 'show' ),
				'label' => esc_html__( 'Box Border', 'wpsection' ),
				'selector' => '{{WRAPPER}} .woocommerce-cart-summary',
			]
		);
		$this->add_control(
			'cart_summer_block_border_radius',
			array(
				'label' => esc_html__( 'Border Radius', 'wpsection' ),
				//'condition'    => array( 'show_block' => 'show' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'condition'    => array( 'show_button' => 'show' ),
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-cart-summary' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			)
		);


		

				
		$this->end_controls_section();
		
		
//End of Text=========				
        }	
	
	
	
protected function render() {
	 $settings = $this->get_settings_for_display();
     $allowed_tags = wp_kses_allowed_html('post');
     $unique_id = 'wps_cart_summary_' . $this->get_id(); // Generate unique ID for this widget instance

    // Check if WooCommerce is activated and the cart object is initialized
    if (class_exists('WooCommerce') && is_object(WC()->cart)) {
        $cart_count = WC()->cart->get_cart_contents_count();
        $cart_url   = wc_get_cart_url(); // Get the URL of the cart page
    } else {
        return; // If WooCommerce is not active or cart is not initialized, return without rendering anything
    }

    ?>

 <div class="woocommerce-cart-summary-toggle service-section">
    <div id="cart-summary-icon-<?php echo esc_attr($unique_id); ?>" class="icon-box">
        <i class=" <?php echo esc_attr($settings['cartsumery_cart_icon']['value']); ?>"></i>
    </div>
    <p class="wps_cart_summery_number"><?php echo esc_html($cart_count); ?></p>
</div>


    <div id="cart-summary-<?php echo esc_attr($unique_id); ?>" class="woocommerce-cart-summary " style="display: none;">
        <button class="close-cart-summary">&times;</button> <!-- Close button added here -->
        <h2><?php esc_html_e('Your Cart Summary', 'wpsection'); ?></h2>
        <table class="cart-summary-table">
            <tbody>
                <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
                    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                    $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) :
                        $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                        ?>
                        <tr class="cart-summary-item" data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>">
                            <td class="cart-summary-remove">
                                <button class="remove-item-button" data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>" data-unique-id="<?php echo esc_attr($unique_id); ?>">&times;</button>
                            </td>
                            <td class="cart-summary-thumbnail">
                                <?php
                                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                                if (!$product_permalink) {
                                    echo wp_kses_post($thumbnail);
                                } else {
                                    printf('<a href="%s">%s</a>', esc_url($product_permalink), wp_kses_post($thumbnail));
                                }
                                ?>
                            </td>
                            <td class="cart-summary-price">
                                <div class="cart-summary-name">
                                    <?php
                                    if (!$product_permalink) {
                                        echo wp_kses_post($_product->get_name() . '&nbsp;');
                                    } else {
                                        echo wp_kses_post(sprintf('<a href="%s">%s</a>', esc_url($product_permalink), esc_html($_product->get_name())));
                                    }

                                    do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

                                    echo wp_kses_post(wc_get_formatted_cart_item_data($cart_item));

                                    if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'wpsection') . '</p>', $product_id));
                                    }
                                    ?>
                                </div>
                                <?php
                                $price = WC()->cart->get_product_price($_product);
                                echo wp_kses_post(apply_filters('woocommerce_cart_item_price', $price, $cart_item, $cart_item_key));
                                ?>
                            </td>
                            <td class="cart-summary-quantity">
                                <div class="quantity-buttons">
                                    <button class="quantity-minus" data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>" data-unique-id="<?php echo esc_attr($unique_id); ?>">-</button>
                                    <input type="number" class="quantity-input" value="<?php echo esc_attr($cart_item['quantity']); ?>" min="1" readonly>
                                    <button class="quantity-plus" data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>" data-unique-id="<?php echo esc_attr($unique_id); ?>">+</button>
                                </div>
                            </td>
                        </tr>
                    <?php
                    endif;
                endforeach;
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">
                        <div class="cart_summary_total_area">
                            <p><?php esc_html_e('Total', 'wpsection'); ?>:</p>
                            <p class="cart-summary-total">
                                <?php wc_cart_totals_order_total_html(); ?>
                            </p>
                        </div>
                        <div class="cart-summary-footer">
                            <div class="cart-summary-buttons">
                                <a class="button checkout-button" href="<?php echo esc_url(wc_get_checkout_url()); ?>"><?php esc_html_e('Checkout', 'wpsection'); ?></a>
                                <a class="button view-cart-button" href="<?php echo esc_url($cart_url); ?>"><?php esc_html_e('View Cart', 'wpsection'); ?></a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <script>
        jQuery(document).ready(function($) {
            const nonce = '<?php echo esc_js(wp_create_nonce('woocommerce-cart')); ?>';
            const uniqueId = '<?php echo esc_js($unique_id); ?>';

            $('#cart-summary-icon-' + uniqueId).on('click', function() {
                $('#cart-summary-' + uniqueId).slideToggle();
            });

            $('.close-cart-summary').on('click', function() {
                $('#cart-summary-' + uniqueId).slideUp();
            });

            $('.remove-item-button[data-unique-id="' + uniqueId + '"]').on('click', function() {
                const cartItemKey = $(this).data('cart-item-key');
                const data = {
                    action: 'woocommerce_remove_cart_item',
                    cart_item_key: cartItemKey,
                    _wpnonce: nonce
                };

                $.ajax({
                    url: '<?php echo esc_url(admin_url('admin-ajax.php')); ?>',
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        if (response.success) {
                            $('tr[data-cart-item-key="' + cartItemKey + '"]').remove();
                            $('.cart-summary-total').html(response.data.cart_total);
                            $('.final-amount').text(response.data.cart_total);
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });

            $('.quantity-buttons button[data-unique-id="' + uniqueId + '"]').on('click', function() {
                const cartItemKey = $(this).data('cart-item-key');
                const quantityInput = $(this).closest('.quantity-buttons').find('.quantity-input');
                let newQuantity = parseInt(quantityInput.val(), 10);

                if ($(this).hasClass('quantity-plus')) {
                    newQuantity++;
                } else if ($(this).hasClass('quantity-minus')) {
                    newQuantity = newQuantity > 1 ? newQuantity - 1 : 1;
                }

                quantityInput.val(newQuantity);

                const productPriceText = $('tr[data-cart-item-key="' + cartItemKey + '"] .cart-summary-price').text();
                const productPrice = parseFloat(productPriceText.replace('$', '').replace(',', ''));
                const newTotal = (productPrice * newQuantity).toFixed(2);

                $('tr[data-cart-item-key="' + cartItemKey + '"] .cart-summary-total .woocommerce-Price-amount bdi').text('$' + newTotal);

                const data = {
                    action: 'woocommerce_update_cart_item_quantity',
                    cart_item_key: cartItemKey,
                    quantity: newQuantity,
                    _wpnonce: nonce
                };

                $.ajax({
                    url: '<?php echo esc_url(admin_url('admin-ajax.php')); ?>',
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        if (response.success) {
                            $('.cart-summary-total').html(response.data.cart_total);
                            $('.final-amount').text(response.data.cart_total);
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>

    <?php
}




}

Plugin::instance()->widgets_manager->register_widget_type( new wpsection_wps_cart_summary_Widget() );

} }