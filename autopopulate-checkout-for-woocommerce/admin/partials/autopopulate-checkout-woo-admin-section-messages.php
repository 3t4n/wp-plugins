<?php

/**a
 * Provide a view for a section
 *
 * Enter text below to appear below the section title on the Settings page
 *
 * @link       https://www.wpconcierges.com/plugins/order_postback_woo/
 * @since      1.0.0
 *
 * @package    order_postback_woo
 * @subpackage order_postback_woo/admin/partials
 */

?>
 <div class="order-postback-woo-note">
                            <h3><?php 
            echo  esc_html__( 'Instructions', 'autopopulate-checkout-woo' ) ;
            ?></h3>
                            <p><?php 
            echo  sprintf( wp_kses( __( 'This plugin allows you to pass in key value pairs to any page on your WordPress site and those values will be set to the related Woocommerce checkout fields ', 'autopopulate-checkout-woo' ), array(
                'a' => array(
                'href'   => array(),
                'target' => array(),
            ),
            ) ), esc_url( 'https://www.wpconcierges.com/plugin-resources/autopopulate-checkout-woo/' ) ) ;
            ?></p>
            <h3><?php 
            echo  esc_html__( 'Documentation', 'autopopulate-checkout-woo' ) ;
            ?></h3>
              <p><?php 
            echo  sprintf( wp_kses( __( 'Place the KEY of the INCOMING QUERY String that you want you want the INCOMING QUERY String VALUE to be set on checkout  <a href="%s" target="_blank">Documenation</a>. Enjoy.', 'autopopulate-checkout-woo' ), array(
                'a' => array(
                'href'   => array(),
                'target' => array(),
            ),
            ) ), esc_url( 'https://www.wpconcierges.com/plugin-resources/autopopulate-checkout-woo/' ) ) ;
            ?></p>

                        </div>