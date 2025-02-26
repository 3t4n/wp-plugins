<?php
namespace Elementor;

class ALPONA_Addon_Card_Widget extends Widget_Base {

    public function get_name() {
        return  'alpona-addons-card-widget-id';
    }

    public function get_title() {
        return esc_html__( 'Card', 'alpona-addons-lite' );
    }



    public function get_script_depends() {
        return [
            'alponaaddons-script'
        ];
    }

    public function get_icon() {
        return 'fas fa-file-image';
    }

    public function get_categories() {
        return [ 'alponaaddons-for-elementor' ];
    }

    public function _register_controls() {
        
        // Image Settings
        $this->start_controls_section(
            'image_section',
            [
                'label' => __( 'Image', 'alpona-addons-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // Image
            $this->add_control(
                'image',
                [
                    'label' => __( 'Choose Image', 'alpona-addons-lite' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            // Show Image link
            $this->add_control(
                'show_image_link',
                [
                    'label' => __( 'Show Image Link', 'alpona-addons-lite' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'alpona-addons-lite' ),
                    'label_off' => __( 'Hide', 'alpona-addons-lite' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            // Image Link
            $this->add_control(
                'image_link',
                [
                    'label' => __( 'Image Link', 'alpona-addons-lite' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://www.example.com/', 'alpona-addons-lite' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                    'condition' => [
                        'show_image_link' => 'yes'
                    ]
                ]
            );

        $this->end_controls_section();

        // Content Settings
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'alpona-addons-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // Title
            $this->add_control(
                'card_title',
                [
                    'label' => __( 'Title', 'alpona-addons-lite' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Abstract: The Art of Design', 'alpona-addons-lite' ),
                    'label_block' => true,
                    'placeholder' => __( 'Type your title here', 'alpona-addons-lite' ),
                ]
            );

            // Divider
            $this->add_control(
                'show_divider',
                [
                    'label'        => __( 'Show Divider', 'alpona-addons-lite' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Show', 'alpona-addons-lite' ),
                    'label_off'    => __( 'Hide', 'alpona-addons-lite' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );

            // Content
            $this->add_control(
                'item_description',
                [
                    'label' => __( 'Description', 'alpona-addons-lite' ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => __( 'An in-depth look into computer design and modern contemporary design with some of the worlds most highly regarded designers.', 'alpona-addons-lite' ),
                    'placeholder' => __( 'Type your description here', 'alpona-addons-lite' ),
                ]
            );

        $this->end_controls_section();

        

        // Button Settings
        $this->start_controls_section(
            'button_section',
            [
                'label' => __( 'Button', 'alpona-addons-lite' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            // Button Link
            $this->add_control(
                'button_link',
                [
                    'label' => __( 'Link', 'alpona-addons-lite' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://www.example.com/', 'alpona-addons-lite' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                ]
            );

            // Button Text
            $this->add_control(
                'button_text',
                [
                    'label' => __( 'Text', 'alpona-addons-lite' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Read More', 'alpona-addons-lite' ),
                    'placeholder' => __( 'Type your text here', 'alpona-addons-lite' ),
                ]
            );

        $this->end_controls_section();


        // Style Tab
        $this->style_tab();
    }

    private function style_tab() {

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        // Image
        $image_target = $settings[ 'image_link' ][ 'is_external' ] ? ' target="_blank"' : '';
        $image_nofollow = $settings[ 'image_link' ][ 'nofollow' ] ? ' rel="nofollow"' : '';
        // Button
        $button_target = $settings[ 'button_link' ][ 'is_external' ] ? ' target="_blank"' : '';
		$button_nofollow = $settings[ 'button_link' ][ 'nofollow' ] ? ' rel="nofollow"' : '';
        ?>
        <div class="image-card">
            <div class="image" style="background-image: url(<?php echo esc_url( $settings[ 'image' ][ 'url' ] ); ?>);">
                <?php if( 'yes' == $settings[ 'show_image_link' ] ) : ?>
                    <a href="<?php echo esc_url( $settings[ 'image_link' ][ 'url' ] ) ?>" <?php echo $image_target; ?> <?php echo $image_nofollow; ?>></a>
                <?php endif; ?>
            </div>


            <div class="content">

                <div class="title">
                    <h2><?php echo $settings[ 'card_title' ]; ?></h2>
                </div>

                <?php if( 'yes' == $settings[ 'show_divider' ] ) : ?>
                    <div class="divider"></div>
                <?php endif; ?>

                <div class="excerpt">
                    <?php echo $settings[ 'item_description' ]; ?>
                </div>

                <div class="readmore">
                    <a href="<?php echo esc_url( $settings[ 'button_link' ][ 'url' ] ); ?>" <?php echo $button_target; ?> <?php echo $button_nofollow; ?> class="button button-readmore"><?php echo $settings[ 'button_text' ];  ?></a>
                </div>

            </div>


        </div>
        <?php
    }

    protected function content_template() {
        
    }

}
Plugin::instance()->widgets_manager->register_widget_type( new ALPONA_Addon_Card_Widget() );