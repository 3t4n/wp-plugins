<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: notice
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'Chat_Whatsapp_Field_notice' ) ) {
  class Chat_Whatsapp_Field_notice extends Chat_Whatsapp_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $style = ( ! empty( $this->field['style'] ) ) ? $this->field['style'] : 'normal';

      echo ( ! empty( $this->field['content'] ) ) ? '<div class="chat-whatsapp-notice chat-whatsapp-notice-'. esc_attr( $style ) .'">'. wp_kses_post($this->field['content']) .'</div>' : '';

    }

  }
}
