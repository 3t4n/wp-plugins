<?php

/**
 * Store Tabs
 *
 * This file is used to output the store tabs on settings and signup page
 *
 * @link       http://www.wcvendors.com
 * @since      2.5.2
 */
?>

<ul class="<?php echo esc_attr( $css_class ); ?>" style="padding:0; margin:0;">
    <?php foreach ( $store_tabs as $store_tab ) : ?>
        <li><a class="tabs-tab<?php echo esc_attr( implode( ' ', $store_tab['class'] ) ); ?> <?php echo esc_html( $store_tab['target'] ); ?>"
                href="#<?php echo esc_attr( $store_tab['target'] ); ?>"><?php echo esc_html( $store_tab['label'] ); ?></a></li>
    <?php endforeach; ?>
</ul>
