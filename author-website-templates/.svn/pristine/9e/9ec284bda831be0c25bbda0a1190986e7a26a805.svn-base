<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Rswpthemes_Awt_Email_Signup_Widget extends \Elementor\Widget_Base {

    // Widget Name
    public function get_name() {
        return 'rswpthemes_awt_email_signup_widget';
    }

    // Widget Title
    public function get_title() {
        return __( 'AWT Email Signup Form', 'author-website-templates' );
    }

    // Widget Icon
    public function get_icon() {
        return 'dashicons dashicons-email';
    }

    // Widget Categories
    public function get_categories() {
        return [ 'rswpthemes_awt_widgets' ];
    }
    public function get_style_depends() {
        return [ 'rswpthemes-awt-email-signup' ];
    }

    // Widget Controls
    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'author-website-templates' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'signup_heading',
            [
                'label' => __( 'Heading', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Want To Hear More From Taylor?', 'author-website-templates' ),
            ]
        );

        $this->add_control(
            'signup_sub_heading',
            [
                'label' => __( 'Subheading', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Sign up to receive news, updates, and exclusive content.', 'author-website-templates' ),
            ]
        );

        $this->add_control(
            'signup_shortcode',
            [
                'label' => __( 'Form Shortcode', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __( '[your_form_shortcode]', 'author-website-templates' ),
            ]
        );

        $this->end_controls_section();
    }

    // Widget Output in Frontend
    protected function render() {

        $settings = $this->get_settings_for_display();

        $signupHeading = $settings['signup_heading'];
        $signupSubHeading = $settings['signup_sub_heading'];
        $fromShortcode = $settings['signup_shortcode'];
        ?>
        <div class="awt-email-signup-section">
            <div class="container">
                <div class="email-signup-wrapper">
                    <div class="row justify-content-md-center align-items-center email-signup-item email-signup-row">
                        <div class="col-lg-7 mb-md-4 mb-4 mb-lg-0 col-md-12 align-self-center email-signup-column email-signup-cover-column">
                            <div class="email-signup-content-wrapper">
                                <?php if ( ! empty( $signupHeading ) ) : ?>
                                    <h4 class="email-signup-title"><?php echo esc_html( $signupHeading ); ?></h4>
                                <?php endif; ?>

                                <?php if ( ! empty( $signupSubHeading ) ) : ?>
                                    <p class="email-signup-desc"><?php echo esc_html( $signupSubHeading ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ( ! empty( $fromShortcode ) ) : ?>
                        <div class="col-lg-5 col-md-12 align-self-center email-signup-column email-signup-content-column">
                            <div class="email-signup-form-wrapper">
                                <div class="email-signup-form-container">
                                    <?php echo do_shortcode( $fromShortcode ); ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
}
