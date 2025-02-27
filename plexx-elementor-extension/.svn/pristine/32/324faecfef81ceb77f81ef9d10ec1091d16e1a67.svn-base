<?php

/**
 * Plexx Video Widget.
 */

use Elementor\Embed;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_Plexx_Video extends \Elementor\Widget_Base {


    public function get_name() {
        return 'plexx_video';
    }

    public function get_title() {
        return __( 'Plexx Video', 'themeworm' );
    }

    public function get_icon() {
        return 'eicon-video-camera';
    }

    public function get_categories() {
        return [ 'plexx-elementor-category' ];
    }

    public function get_keywords() {
        return [ 'video', 'plexx', 'masonry', 'autoplay', 'vimeo', 'youtube', 'selfhosted'];
    }

    public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);
   }


    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Video Settings', 'themeworm' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('plexx_video_type',
            [
                'label'         => __( 'Video Type', 'themeworm' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'options'       => [
                    'youtube'       => __('YouTube', 'themeworm'),
                    'vimeo'         => __('Vimeo', 'themeworm'),
                    'hosted'        => __('Self Hosted', 'themeworm'),
                ],
                'label_block'   => true,
                'default'       => 'vimeo',
            ]
        );

        $this->add_control('plexx_youtube_video_url',
            [
                'label'         => __('Video URL', 'themeworm'),
                'type'          => \Elementor\Controls_Manager::URL,
                'dynamic'       => [ 'active' => true ],
                'label_block'   => true,
                'description'   => __('URL format: youtube.com/watch?v=xxxxxxxx', 'themeworm'),
                'condition'     => [
                    'plexx_video_type' => 'youtube',
                ]
            ]);

            $this->add_control('plexx_vimeo_video_url',
                [
                    'label'         => __('Video URL', 'themeworm'),
                    'type'          => \Elementor\Controls_Manager::URL,
                    'dynamic'       => [ 'active' => true ],
                    'label_block'   => true,
                    'description'   => __('URL format: vimeo.com/XXXXXXXX', 'themeworm'),
                    'condition'     => [
                        'plexx_video_type' => 'vimeo',
                    ]
                ]);

        $this->add_control('plexx_video_hosted',
            [
                'label'         => __('Select Video', 'themeworm'),
                'type'          => \Elementor\Controls_Manager::MEDIA,
                'media_type' => 'video',
                'condition'     => [
                    'plexx_video_type'=> 'hosted'
                ]
            ]
        );

        $this->add_control(
          'video_autoplay',
          [
            'label' => __( 'Autoplay Video', 'themeworm' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'themeworm' ),
            'label_off' => __( 'No', 'themeworm' ),
            'return_value' => 'yes',
            'default' => 'no',
          ]
        );

        $this->add_control(
          'video_controls',
          [
            'label' => __( 'Hide Controls', 'themeworm' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'themeworm' ),
            'label_off' => __( 'No', 'themeworm' ),
            'return_value' => 'yes',
            'default' => 'no',
          ]
        );

        $this->add_control(
          'video_full_width',
          [
            'label' => __( 'Force Full Width', 'themeworm' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'themeworm' ),
            'label_off' => __( 'No', 'themeworm' ),
            'return_value' => 'yes',
            'default' => 'no',
          ]
        );

      $this->end_controls_section();

    }

    protected function render() {

      $settings = $this->get_settings_for_display();
      $this->add_render_attribute('plexx_video', 'class', 'plexx-video-widget');


      if ("yes" === $settings['video_full_width']) {

        $this->add_render_attribute( 'plexx_video', 'class', [ 'plexx-video-widget', 'force-full-width' ] );

      } ?>

      <div <?php echo $this->get_render_attribute_string('plexx_video'); ?>>

        <?php if( !empty( $settings['plexx_vimeo_video_url']['url'] ) && $settings['plexx_video_type'] == 'vimeo' ) {

          $autoplay = ("yes" === $settings['video_autoplay']) ? 'autoplay=true&muted=1' : '';
          $video_controls = ("yes" === $settings['video_controls']) ? 'controls=false' : ''; ?>

          <iframe src="<?php echo esc_url($this->get_video_params()) . '?' . $autoplay . '&' . $video_controls; ?>" frameborder="0" width="1920" height="1080" allowfullscreen allow="autoplay"></iframe>

        <?php } ?>

        <?php if( !empty( $settings['plexx_youtube_video_url']['url'] ) && $settings['plexx_video_type'] == 'youtube' ) {

          $autoplay = ("yes" === $settings['video_autoplay']) ? 'autoplay=1&mute=1' : '';
          $video_controls = ("yes" === $settings['video_controls']) ? 'controls=0' : ''; ?>

          <iframe src="<?php echo esc_url($this->get_video_params()) . '&' . $autoplay . '&' . $video_controls; ?>" frameborder="0" width="1920" height="1080" allowfullscreen allow="autoplay"></iframe>

        <?php } ?>


        <?php if( !empty( $settings['plexx_video_hosted']['url'] ) && $settings['plexx_video_type'] == 'hosted' ) {

          $autoplay = ("yes" === $settings['video_autoplay']) ? 'autoplay muted' : '';
          $video_controls = ("yes" === $settings['video_controls']) ? '' : 'controls'; ?>

          <video <?php echo esc_attr( $autoplay . ' ' . $video_controls ); ?> loop class="" playsinline>
            <source src="<?php echo esc_url( $settings['plexx_video_hosted']['url'] ); ?>" type="video/mp4">
          </video>

        <?php } ?>

      </div>
      <style>

      </style>

      <?php if ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) {
              $this->render_editor_script();
      } ?>

    <?php }


    private function get_video_params() {

        $settings = $this->get_settings_for_display();

        $link = ( 'vimeo' === $settings['plexx_video_type'] ) ? $settings['plexx_vimeo_video_url']['url'] : $settings['plexx_youtube_video_url']['url'];

        if ( ! empty( $link ) ) {
            if ( 'youtube' === $settings['plexx_video_type'] ) {
                $video_props    = Embed::get_video_properties( $link );
                $link           = Embed::get_embed_url( $link );
                $video_id       = $video_props['video_id'];
            } elseif ( 'vimeo' === $settings['plexx_video_type'] ) {
                $mask = '/^.*vimeo\.com\/(?:[a-z]*\/)*([‌​0-9]{6,11})[?]?.*/';
                $video_id = substr( $link, strpos( $link, '.com/' ) + 5 );
        				preg_match( $mask, $link, $matches );
        				if( $matches ) {
        					$video_id = $matches[1];
        				} else {
        					$video_id = substr( $link, strpos( $link, '.com/' ) + 5 );
        				}
                $link = sprintf( 'https://player.vimeo.com/video/%s', $video_id );
            }

            $id = $video_id;
        }

        return $link;

    }


    protected function render_editor_script() {

      ?><script type="text/javascript">
        jQuery( document ).ready( function( $ ) {

          $( '.plexx-video-widget' ).fitVids();

        });
      </script>
      <?php
    }


}
