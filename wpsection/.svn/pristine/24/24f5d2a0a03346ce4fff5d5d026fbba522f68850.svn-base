<?php
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;

class WPSection_wps_slide_block_Widget extends Widget_Base {

    public function get_name() {
        return 'wpsection_wps_slide_block';
    }

    public function get_title() {
        return __( 'Slide Block', 'wpsection' );
    }

    public function get_icon() {
        return 'eicon-slider-album';
    }

    public function get_keywords() {
      return ['wpsection_category'];
    }

    public function get_categories() {
        return [ 'wpsection_shop' ]; // Ensure this category exists in Elementor
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'slide_block_settings',
            [
                'label' => esc_html__( 'Block Slide', 'wpsection' ),
            ]
        );

        // Column settings for desktop, tablet, and mobile
        $this->add_responsive_control(
            'columns',
            [
                'label' => esc_html__( 'Columns', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
                'tablet_default' => 2,
                'mobile_default' => 1,
                'min' => 1,
                'max' => 12,
                'step' => 1,
            ]
        );
        
        $this->add_responsive_control(
            'columns_tablet',
            [
                'label' => esc_html__( 'Tab Columns', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
                'tablet_default' => 2,
                'mobile_default' => 1,
                'min' => 1,
                'max' => 12,
                'step' => 1,
            ]
        );

        $this->add_responsive_control(
            'columns_mobile',
            [
                'label' => esc_html__( 'Mobile Columns', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
                'tablet_default' => 2,
                'mobile_default' => 1,
                'min' => 1,
                'max' => 12,
                'step' => 1,
            ]
        );

        $this->add_control(
            'auto_loop',
            [
                'label' => esc_html__( 'Auto Loop', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'wpsection' ),
                'label_off' => esc_html__( 'No', 'wpsection' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'auto_play',
            [
                'label' => esc_html__( 'Auto Play', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'wpsection' ),
                'label_off' => esc_html__( 'No', 'wpsection' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'auto_play_speed',
            [
                'label' => esc_html__( 'Auto Play Speed (ms)', 'wpsection' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3000,
                'min' => 1000,
                'max' => 10000,
                'step' => 100,
                'condition' => [
                    'auto_play' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'thumbnail_position',
            [
                'label'   => __( 'Thumbnail Position', 'wpsection' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'top',
                'options' => [
                    'top'    => __( 'Top', 'wpsection' ),
                    'left'   => __( 'Left', 'wpsection' ),
                ],
            ]
        );

        // Create a repeater for title, text, and image
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'wpsection' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Default Title', 'wpsection' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'text',
            [
                'label' => __( 'Text', 'wpsection' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Default Text', 'wpsection' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __( 'Image', 'wpsection' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'marquee_items',
            [
                'label' => __( 'Marquee Items', 'wpsection' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __( 'Title #1', 'wpsection' ),
                        'text' => __( 'Text #1', 'wpsection' ),
                    ],
                    [
                        'title' => __( 'Title #2', 'wpsection' ),
                        'text' => __( 'Text #2', 'wpsection' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( ! empty( $settings['marquee_items'] ) ) {
            // Unique ID for this marquee section
            $unique_id = 'wps-owl-carousel-' . uniqid();
            $thumbnail_position = $settings['thumbnail_position']; // Get the selected position

            ?>

            <div id="<?php echo esc_attr( $unique_id ); ?>" class="wps_marquie_area owl-carousel">
                <?php foreach ( $settings['marquee_items'] as $item ) : ?>
                    <div class="swiper-slide" style="<?php echo ( 'left' === $thumbnail_position ) ? 'display: flex;' : ''; ?>">
                        <div class="thumbnail">
                            <?php if ( ! empty( $item['image']['url'] ) ) : ?>
                                <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" />
                            <?php endif; ?>
                        </div>

                        <div class="content">
                            <?php if ( ! empty( $item['title'] ) ) : ?>
                                <h4><?php echo esc_html( $item['title'] ); ?></h4>
                            <?php endif; ?>

                            <?php if ( ! empty( $item['text'] ) ) : ?>
                                <p><?php echo esc_html( $item['text'] ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div> <!-- End .swiper-slide -->
                <?php endforeach; ?>
            </div> <!-- End .owl-carousel -->


<script>
    jQuery(document).ready(function($) {
        var carouselSettings = {
            loop: <?php echo wp_json_encode( $settings['auto_loop'] === 'yes' ); ?>,
            autoplay: <?php echo wp_json_encode( $settings['auto_play'] === 'yes' ); ?>,
            margin: 10,
            responsive: {
                0: { items: Math.min(2, <?php echo esc_js( $settings['columns_mobile'] ); ?> ) },
                480: { items: Math.min(2, <?php echo esc_js( $settings['columns_mobile'] ); ?>) },
                768: { items: Math.min(3, <?php echo esc_js( $settings['columns_tablet'] ); ?> ) },
                1024: { items: Math.min(6, <?php echo esc_js( $settings['columns'] ); ?>) }
            }
        };

        // Add autoplayTimeout only if autoplay is 'yes' and speed is set
        <?php if ( $settings['auto_play'] === 'yes' && !empty( $settings['auto_play_speed'] ) ) : ?>
            carouselSettings.autoplayTimeout = <?php echo esc_js( $settings['auto_play_speed'] ); ?>;
        <?php endif; ?>

        // Initialize Owl Carousel with settings
        $('#<?php echo esc_js( $unique_id ); ?>').owlCarousel(carouselSettings);
    });
</script>







            <?php
        }
    }

}

// Register the widget
Plugin::instance()->widgets_manager->register_widget_type( new WPSection_wps_slide_block_Widget() );
