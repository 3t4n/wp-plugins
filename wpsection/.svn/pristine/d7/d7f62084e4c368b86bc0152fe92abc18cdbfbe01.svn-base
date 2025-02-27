<?php
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;


if (class_exists('MrwooMart')) {
if (class_exists('woocommerce')) {

class Wpsection_Wps_Recent_Viewed extends Widget_Base {

    public function get_name() {
        return 'wpsection_wps_recent_viewed';
    }

    public function get_title() {
        return __( ' Recently Viewed', 'wpsection' );
    }

    public function get_icon() {
        return 'eicon-product-description';
    }

    public function get_categories() {
        return [ 'wpsection_shop' ];
    }
	
	
	
	

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'wpsection' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'recent_title',
            [
                'label' => __( 'Title', 'wpsection' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Recently Viewed Products', 'wpsection' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $recent_title = $settings['recent_title'];

		
		// Sanitize the cookie input using filter_input
$cookie_value = filter_input(INPUT_COOKIE, 'woocommerce_recently_viewed', FILTER_SANITIZE_STRING);

// If the cookie is not empty, process the value
$viewed_products = !empty($cookie_value) ? (array) explode('|', wp_unslash($cookie_value)) : array();

// Apply additional sanitization and filtering
$viewed_products = array_reverse(array_filter(array_map('absint', $viewed_products)));


        if (empty($viewed_products)) {
            return;
        }

        $query_args = array(
            'posts_per_page' => 8,
            'no_found_rows'  => 1,
            'post_status'    => 'publish',
            'post_type'      => 'product',
            'post__in'       => $viewed_products,
            'orderby'        => 'post__in',
        );

        $recently_viewed = new \WP_Query($query_args);

        if ($recently_viewed->have_posts()) : ?>
            <div class="recent_viewed_products">
                <div class="container">
                    <div class="recent_view_inner">
                        <?php if ($recent_title) : ?>    
                                    <div class="title"><?php echo esc_html($recent_title); ?></div>        
                        <?php endif; ?>
                        <div class="row">
                            <?php while ($recently_viewed->have_posts()) : $recently_viewed->the_post(); ?>                              
                                        <?php wc_get_template_part('content', 'product'); ?>                              
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php wp_reset_postdata();
        endif;
    }

  
}
Plugin::instance()->widgets_manager->register_widget_type( new Wpsection_Wps_Recent_Viewed() );
}}