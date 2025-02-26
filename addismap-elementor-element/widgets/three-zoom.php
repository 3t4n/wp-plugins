<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Widget_AddisMap_ThreeZoom extends Widget_Base {

    public function get_name() {
        return 'addismap-three-zoom';
    }
    public function get_title() {
        return __( 'AddisMap Map with 3 Zooms', 'elementor-custom-element' );
    }
    public function get_icon() {
        return 'eicon-post';
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'section_my_custom',
            [
                'label' => esc_html__( 'Location on Map', 'elementor' ),
            ]
        );

        $this->add_control(
            'label',
            [
                'label' => __( 'Text', 'elementor-custom-element' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'title' => __( 'Location Label', 'elementor-custom-element' ),
            ]
        );


        $this->add_control(
            'latitude',
            [
                'label' => __( 'Latitude (Example: 9.000)', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => '8.900',
            ]
        );

        $this->add_control(
            'longitude',
            [
                'label' => __( 'Longitude (Example: 38.000)', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => '38.750',
            ]
        );

        $this->add_control(
            'back_link',
            [
                'label' => __( 'Link Map with AddisMap.com', 'elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {

        $settings = $this->get_settings();

        // get our input from the widget settings.
        $label = ! empty( $settings['label'] ) ? $settings['label'] : 'Location';
        $lat = ! empty( $settings['latitude'] ) ? (float)$settings['latitude'] : 8.900;
        $lng = ! empty( $settings['longitude'] ) ? (float)$settings['longitude'] : 38.750;
        $backLink = ! empty( $settings['back_link'] ) ? $settings['back_link'] == 'yes' : false;
        ?>

        <?php if ($backLink): ?>
            <a href="http://www.addismap.com/#16/<?php echo $lat ?>/<?php echo $lng ?>">
        <?php endif; ?>
                <img alt="Map: How to find us." title="<?php echo $label ?>" src="http://www.addismap.com/static-3z-map.php?lat=<?php echo $lat ?>&lng=<?php echo $lng ?>&name=<?php urlencode($label) ?>">
        <?php if ($backLink): ?>
            </a>
        <?php endif; ?>
        <?php
    }
    protected function content_template() {}
    public function render_plain_content( $instance = [] ) {}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_AddisMap_ThreeZoom() );
