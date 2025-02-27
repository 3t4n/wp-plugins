<?php
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Plugin;

class WPSection_wps_text_flip_Widget extends Widget_Base {

    public function get_name() {
        return 'wpsection_wps_text_flip';
    }

    public function get_title() {
        return __( 'Text Flip', 'wpsection' );
    }

    public function get_icon() {
        return 'eicon-slider-album';
    }

    public function get_keywords() {
        return [ 'wpsection', 'flip', 'text', 'slider', 'carousel' ];
    }

    public function get_categories() {
        return [ 'wpsection_shop' ]; // Ensure this category exists in Elementor
    }

    protected function _register_controls() {
        // Registering the section for text flip content
        $this->start_controls_section(
            'wps_text_flip_settings',
            [
                'label' => esc_html__( 'Text Flip Settings', 'wpsection' ),
            ]
        );

        // Repeater for adding multiple text and image pairs
        $repeater = new Repeater();

        // Control for text content
        $repeater->add_control(
            'flip_text',
            [
                'label' => __( 'Text to Flip', 'wpsection' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Special Offer - Save 20% with Code XYZ123', 'wpsection' ),
                'placeholder' => __( 'Enter text here', 'wpsection' ),
            ]
        );

        // Control for adding an image
        $repeater->add_control(
            'flip_image',
            [
                'label' => __( 'Image', 'wpsection' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
                'description' => __( 'Select an image to display with the text', 'wpsection' ),
            ]
        );

        // Adding repeater to the widget
        $this->add_control(
            'text_image_repeater',
            [
                'label' => __( 'Text and Image Sets', 'wpsection' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [],
                'title_field' => '{{{ flip_text }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $text_image_sets = !empty( $settings['text_image_repeater'] ) ? $settings['text_image_repeater'] : [];

        // If there are items to display
        if ( ! empty( $text_image_sets ) ) {
            // Unique ID for this section
            $unique_id = 'wps-text-flip-' . uniqid();
            ?>
            <div id="<?php echo esc_attr( $unique_id ); ?>" class="text-flip-container">
                <div class="text-flip-wrapper">
                    <?php foreach ( $text_image_sets as $index => $set ) : ?>
                        <div class="text-flip-slide" data-index="<?php echo esc_attr( $index ); ?>">
                            <div class="flip-content">
                                <?php if ( ! empty( $set['flip_image']['url'] ) ) : ?>
                                    <div class="flip-image">
                                        <img src="<?php echo esc_url( $set['flip_image']['url'] ); ?>" alt="<?php echo esc_attr( $set['flip_text'] ); ?>" />
                                    </div>
                                <?php endif; ?>

                                <?php if ( ! empty( $set['flip_text'] ) ) : ?>
                                    <p class="flip-text"><?php echo esc_html( $set['flip_text'] ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div> <!-- End text-flip-slide -->
                    <?php endforeach; ?>
                </div> <!-- End text-flip-wrapper -->
            </div> <!-- End text-flip-container -->

            <script>
document.addEventListener('DOMContentLoaded', function () {
    let index = 0;
    const slides = document.querySelectorAll('#<?php echo esc_js( $unique_id ); ?> .text-flip-slide');
    const totalSlides = slides.length;

    // Function to show the current slide and hide the others
    function showSlide() {
        slides.forEach((slide, i) => {
            slide.style.opacity = '0'; // Hide all slides initially
            slide.style.transform = 'translateY(50px)'; // Move all slides below the view
        });

        // Show the current slide
        const currentSlide = slides[index];
        currentSlide.style.opacity = '1';
        currentSlide.style.transform = 'translateY(0)'; // Bring the current slide into view
    }

    // Initially show the first slide immediately upon page load
    showSlide();

    // Change slide every 3 seconds
    setInterval(function() {
        index = (index + 1) % totalSlides; // Move to the next slide, loop back after the last one
        showSlide();
    }, 3000);
});
            </script>

            <style>

            </style>
            <?php
        }
    }
}

// Register the widget with Elementor
Plugin::instance()->widgets_manager->register_widget_type( new WPSection_wps_text_flip_Widget() );
