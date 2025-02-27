<?php
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;


if (class_exists('MrwooMart')) {
if (class_exists('woocommerce')) {
        class wpsection_wps_load_more_Widget extends Widget_Base {

            public function get_name() {
                return 'wpsection_wps_load_more';
            }

            public function get_title() {
                return __('Load More Products', 'wpsection');
            }

            public function get_icon() {
                return 'eicon-cart-medium';
            }

            public function get_keywords() {
                return ['wpsection', 'product'];
            }

            public function get_categories() {
                return ['wpsection_shop'];
            }

            protected function _register_controls() {
                $this->start_controls_section(
                    'product_load_more_settings',
                    [
                        'label' => esc_html__('Product Load More Settings', 'wpsection'),
                    ]
                );

                $this->add_control('products_per_page', [
                    'label' => __('Products per Page', 'wpsection'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 6,
                    'min' => 1,
                ]);

                $this->end_controls_section();
            }

            protected function render() {
                $settings = $this->get_settings_for_display();
                $products_per_page = $settings['products_per_page'];
                $unique_id = 'wps_load_more_' . $this->get_id();

                // Start the product loop
                $args = [
                    'post_type' => 'product',
                    'posts_per_page' => $products_per_page,
                ];
                $loop = new WP_Query($args);

                echo '<div class="custom-woo-products" id="' . esc_attr($unique_id) . '">';
 echo '<div class="row">';
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) {
                        $loop->the_post();
						
                        wc_get_template_part('content', 'product');
						
                    }
                } else {
                    echo esc_html__('No products found', 'wpsection');
                }

                echo '</div>';
echo '</div>';
               if ($loop->found_posts > $products_per_page) {
        echo '<button class="load-more" data-unique-id="' . esc_attr($unique_id) . '">' . esc_html__('Load More', 'wpsection') . '</button>';
        echo '<div class="loading-spinner" style="display:none;">' . esc_html__('Loading...', 'wpsection') . '</div>'; // Spinner placeholder
    }
                wp_reset_postdata();
                ?>

                 <script>
        jQuery(document).ready(function($) {
            let offset = <?php echo esc_js($products_per_page); ?>; // Initial offset
            const uniqueId = '<?php echo esc_js($unique_id); ?>';
            const productsPerPage = <?php echo esc_js($products_per_page); ?>;
            let totalProducts = <?php echo esc_js($loop->found_posts); ?>; // Total products found
            let loadedProducts = <?php echo esc_js($products_per_page); ?>; // Initially loaded products

            $('.load-more[data-unique-id="' + uniqueId + '"]').on('click', function() {
                $('.loading-spinner').show(); // Show the spinner

                $.ajax({
                    url: '<?php echo esc_url(admin_url('admin-ajax.php')); ?>',
                    type: 'POST',
                    data: {
                        action: 'load_more_products',
                        offset: offset,
                        products_per_page: productsPerPage,
                    },
                    success: function(response) {
                        if (response) {
                            $('#' + uniqueId).append(response);
                            offset += productsPerPage; // Increment offset
                            loadedProducts += productsPerPage; // Update loaded products
                            
                            // Update button text
                            $('.load-more[data-unique-id="' + uniqueId + '"]').text('Loaded ' + loadedProducts + '/' + totalProducts);
                        } else {
                            $('.load-more[data-unique-id="' + uniqueId + '"]').hide(); // Hide button if no more products
                        }
                        $('.loading-spinner').hide(); // Hide the spinner
                    },
                });
            });
        });

        
    </script>

                <?php
            }
        }

Plugin::instance()->widgets_manager->register_widget_type(new wpsection_wps_load_more_Widget());


} }      




   
