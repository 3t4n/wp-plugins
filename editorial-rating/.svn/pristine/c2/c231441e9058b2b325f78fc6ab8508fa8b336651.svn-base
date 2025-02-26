<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: switcher_box
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'WPAS_Field_switcher_Box' ) ) {
  class WPAS_Field_switcher_Box extends WPAS_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $active      = ( ! empty( $this->value ) ) ? ' wpas--active' : '';
      $text_on     = ( ! empty( $this->field['text_on'] ) ) ? $this->field['text_on'] : esc_html__( 'On', 'wpas' );
      $text_off    = ( ! empty( $this->field['text_off'] ) ) ? $this->field['text_off'] : esc_html__( 'Off', 'wpas' );
      $text_width  = ( ! empty( $this->field['text_width'] ) ) ? ' style="width: '. esc_attr( $this->field['text_width'] ) .'px;"': '';
      $swc_name    = ( ! empty( $this->field['swc_name'] ) ) ? $this->field['swc_name'] : esc_html__( 'Name of the Switcher.', 'wpas' );
      $short_desc  = ( ! empty( $this->field['short_desc'] ) ) ? $this->field['short_desc'] : esc_html__( 'Short Description: Lorem ipsum dolor sit amet consectetur adipiscing elit himenaeos, pulvinar risus tincidunt et cursus ut vitae tristique, dignissim parturient nascetur donec facilisi netus suspendisse.', 'wpas' );
      $demo_link   = ( ! empty( $this->field['demo_link'] ) ) ? $this->field['demo_link'] : esc_html__( 'http://pluginic.com/', 'wpas' );
      $doc_link    = ( ! empty( $this->field['doc_link'] ) ) ? $this->field['doc_link'] : '';
      $video_link  = ( ! empty( $this->field['video_link'] ) ) ? $this->field['video_link'] : esc_html__( 'http://pluginic.com/', 'wpas' );
      $badge_name  = ( ! empty( $this->field['badge_name'] ) ) ? $this->field['badge_name'] : '';

      echo $this->field_before();
      ?>
      <div class="wpas--sb_wrap <?php echo ! empty( $badge_name ) ? 'wpas--sbn wpas--sbb-' . strtolower( $badge_name ) : ''; ?>" badge-title="<?php echo $badge_name; ?>">
        <div class="wpas--sb_inner">
          <div class="wpas--sb_title"><?php echo $swc_name ?></div>
          <div class="wpas--sb_s_desc"><?php echo wp_kses_post( $short_desc ); ?></div>
        </div>
        <div class="wpas--sb_btm">
          <div class="wpas--switcher<?php echo esc_attr( $active ); ?>"<?php echo $text_width; ?>>
            <span class="wpas--on"><?php echo esc_attr( $text_on ); ?></span>
            <span class="wpas--off"><?php echo esc_attr( $text_off ); ?></span>
            <span class="wpas--ball"></span>
            <input type="hidden" name="<?php echo esc_attr( $this->field_name() ); ?>" value="<?php echo esc_attr( $this->value ); ?>"<?php echo $this->field_attributes(); ?> />
          </div>
          <div class="wpas--sources">
            <ul>
              <li>
                <a href="<?php echo esc_url( $demo_link ); ?>" target="_blank">
                  <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg><span>Demo</span>
                </a>
              </li>
              <?php if ( ! empty( $doc_link ) ) : ?>
              <li>
                <a href="<?php echo esc_url( $doc_link ); ?>" target="_blank">
                  <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg><span>Doc</span>
                </a>
              </li>
              <?php endif; ?>
              <li>
                <a href="<?php echo esc_url( $video_link ); ?>" target="_blank">
                  <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg><span>Video</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <?php
      echo ( ! empty( $this->field['label'] ) ) ? '<span class="wpas--label">'. esc_attr( $this->field['label'] ) . '</span>' : '';

      echo $this->field_after();

    }

  }
}
