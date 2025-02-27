<?php

/**
 * Dashboard action URL
 *
 * This file is used to display a dashboard action url
 *
 * @link       http://www.wcvendors.com
 * @since      2.5.2
 */

?>

<div class="row-actions row-actions-<?php echo esc_attr( $this->id ); ?>">
    <?php

    foreach ( $this->actions as $ac => $details ) {

        if ( ! empty( $details ) ) {

            if ( empty( $details['url'] ) ) {
                if ( 'view' === $ac ) {
                    $action_url = get_permalink( $object_id );
                } else {
                    $action_url = WCV_Vendor_Dashboard::get_dashboard_page_url( $this->post_type . '/' . $ac . '/' . $object_id );
                }
            } else {
                $action_url = $details['url'];
            }
        }

        $class    = ! empty( $details['class'] ) ? 'class="' . esc_attr( $details['class'] ) . '"' : '';
        $customId = ! empty( $details['id'] ) ? 'id="' . esc_attr( $details['id'] ) . '"' : '';
        $target   = ! empty( $details['target'] ) ? 'target="' . esc_attr( $details['target'] ) . '"' : '';
        $custom   = '';
        if ( ! empty( $details['custom'] ) ) {
            foreach ( $details['custom'] as $attr => $value ) {
                $custom .= esc_attr( $attr ) . '="' . esc_attr( $value ) . '" ';
            }
        }

        printf( '<a href="%s" %s %s %s %s>%s</a>', esc_url( $action_url ), $customId, $class, $target, $custom, esc_html( $details['label'] ) ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
    ?>
</div>
