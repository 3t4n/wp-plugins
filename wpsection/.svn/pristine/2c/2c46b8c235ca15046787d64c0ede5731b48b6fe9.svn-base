<?php
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;

class WPSection_wps_marque_Widget extends Widget_Base {

    public function get_name() {
        return 'wpsection_wps_marque';
    }

    public function get_title() {
        return __( 'Text Marque', 'wpsection' );
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
            'marque_settings',
            [
                'label' => esc_html__( 'Marquee Items', 'wpsection' ),
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
        $unique_id = 'wps-marque-' . uniqid();

        echo '<div id="' . esc_attr( $unique_id ) . '" class="wps-marque">';
        echo '<div class=" wps-marque-items">';

        // Static items to fill the section immediately
        foreach ( $settings['marquee_items'] as $item ) {
            echo '<div class="wps-marque-item">';
            if ( ! empty( $item['image']['url'] ) ) {
                echo '<img src="' . esc_url( $item['image']['url'] ) . '" alt="' . esc_attr( $item['title'] ) . '" />';
            }
            if ( ! empty( $item['title'] ) ) {
                echo '<h4>' . esc_html( $item['title'] ) . '</h4>';
            }
            if ( ! empty( $item['text'] ) ) {
                echo '<p>' . esc_html( $item['text'] ) . '</p>';
            }
            echo '</div>';
        }

        echo '</div>'; // End .wps-marque-items
        echo '</div>'; // End .wps-marque

        // Inline JavaScript for marquee functionality with hover effect
        ?>
		<style>
			.wps-marque-items {
 			   display: flex;
			}
		</style>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const marquee = document.getElementById('<?php echo esc_js( $unique_id ); ?>');
                const marqueeItems = marquee.querySelector('.wps-marque-items');
                const clone = marqueeItems.cloneNode(true); // Clone items for smooth looping
                marqueeItems.style.display = 'flex';
                marqueeItems.parentNode.appendChild(clone);

                let scrollAmount = 0;
                let isPaused = false;

                function marqueeScroll() {
                    if (!isPaused) {
                        scrollAmount -= 1; // Adjust scroll speed
                        marqueeItems.style.transform = `translateX(${scrollAmount}px)`;
                        clone.style.transform = `translateX(${scrollAmount}px)`;
                        if (Math.abs(scrollAmount) >= marqueeItems.offsetWidth) {
                            scrollAmount = 0; // Reset to initial position
                        }
                    }
                    requestAnimationFrame(marqueeScroll);
                }

                // Pause marquee on hover
                marquee.addEventListener('mouseover', function () {
                    isPaused = true;
                });

                // Resume marquee when mouse leaves
                marquee.addEventListener('mouseout', function () {
                    isPaused = false;
                });

                marqueeScroll();
            });
        </script>
        <?php
    }
}


}

// Register the widget
Plugin::instance()->widgets_manager->register_widget_type( new WPSection_wps_marque_Widget() );
