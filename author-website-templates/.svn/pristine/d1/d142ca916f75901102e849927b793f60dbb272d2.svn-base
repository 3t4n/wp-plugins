<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Control_Media;
use \Elementor\Group_Control_Box_Shadow;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;

class Rswpthemes_Awt_About_Section extends Widget_Base {

    public function get_name() {
        return 'rswpthemes_awt_about_section';
    }

    public function get_title() {
        return __( 'AWT About Section', 'author-website-templates' );
    }

    public function get_icon() {
        return 'dashicons dashicons-admin-users';
    }

    public function get_style_depends() {
        return [ 'rswpthemes-awt-about-section' ];
    }

    public function get_categories() {
        return [ 'rswpthemes_awt_widgets' ];
    }

    protected function register_controls() {

        $pages = get_pages();
        $pages_options = [];

        foreach ( $pages as $page ) {
            $pages_options[ $page->post_name ] = $page->post_title;
        }

        // Welcome Text
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'author-website-templates' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'welcome_text',
            [
                'label' => __( 'Welcome Text', 'author-website-templates' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Meet Author', 'author-website-templates' ),
            ]
        );

        $this->add_control(
            'about_page',
            [
                'label' => __( 'About Page', 'author-website-templates' ),
                'type' => Controls_Manager::SELECT2,
                'options' => $pages_options, // Pass the page options
                'default' => array_key_first($pages_options), // Set the first page as default
            ]
        );

        $this->add_control(
            'about_button_text',
            [
                'label' => __( 'Button Text', 'author-website-templates' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'About Me', 'author-website-templates' ),
            ]
        );

        $this->add_control(
            'about_button_link',
            [
                'label' => __( 'Button Link', 'author-website-templates' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'follow_me_text',
            [
                'label' => __( 'Follow Me Text', 'author-website-templates' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Follow Me', 'author-website-templates' ),
            ]
        );

        // Social Links Repeater
        $repeater = new Repeater();

        $repeater->add_control(
            'social_icon',
            [
                'label' => __( 'Icon', 'author-website-templates' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-facebook',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
            'social_url',
            [
                'label' => __( 'Social URL', 'author-website-templates' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'author-website-templates' ),
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'social_links',
            [
                'label' => __( 'Social Links', 'author-website-templates' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'social_icon' => 'fa fa-facebook',
                        'social_url' => '#',
                    ],
                    [
                        'social_icon' => 'fa fa-twitter',
                        'social_url' => '#',
                    ],
                ],
                'title_field' => '{{{ social_icon.value }}}',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $getAboutMePageSlug = $settings['about_page'];
        $getAboutMePage = get_page_by_path( $getAboutMePageSlug );
        if ( empty( $getAboutMePage ) ) {
            return;
        }
        $socialLinks = $settings['social_links'];
        $welcomeText = $settings['welcome_text'];
        $buttonText = $settings['about_button_text'];
        $buttonLink = $settings['about_button_link']['url'];
        $shortDescription = '<p>' . str_replace("\n", '</p><p>', $getAboutMePage->post_excerpt) . '</p>';
        ?>
        <div class="awt-about-section">
            <div class="container about-me-section-container">
                <div class="row about-me-section-row">
                    <div class="col-md-6 align-self-center about-me-image-column">
                        <div class="about-me-image-container">
                            <?php echo wp_kses_post( get_the_post_thumbnail( $getAboutMePage->ID, 'full' ) ); ?>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center about-me-content-column">
                        <div class="about-me-content-wrapper">
                            <h5 class="welcome-text"><?php echo esc_html( $welcomeText ); ?></h5>
                            <h2 class="author-name"><?php echo wp_kses_post( $getAboutMePage->post_title ); ?></h2>
                            <div class="author-descriptions">
                                <?php echo wp_kses_post( $shortDescription ); ?>
                            </div>
                            <div class="button-and-link-wrapper">
                                <div class="about-me-button">
                                    <a href="<?php echo esc_url( $buttonLink ); ?>"><?php echo esc_html( $buttonText ); ?></a>
                                </div>
                                <div class="follow-me-icons">
                                    <div class="text">
                                        <span><?php echo esc_html( $settings['follow_me_text'] ); ?>:</span>
                                    </div>
                                    <div class="social-icons">
                                        <?php
                                        // Ensure $socialLinks is properly initialized and is an array
                                        if ( !empty( $socialLinks ) && is_array( $socialLinks ) ) {
                                            foreach ( $socialLinks as $social_link ) {
                                                // Ensure that 'social_url' and 'social_icon' are set
                                                if ( isset( $social_link['social_url']['url'], $social_link['social_icon']['value'] ) ) {
                                                    ?>
                                                    <a href="<?php echo esc_url( $social_link['social_url']['url'] ); ?>" class="social-link">
                                                        <i class="<?php echo esc_attr( $social_link['social_icon']['value'] ); ?>"></i>
                                                    </a>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    protected function content_template() {}

}
