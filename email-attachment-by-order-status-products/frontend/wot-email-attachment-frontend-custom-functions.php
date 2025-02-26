<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Action to add Attachment for woocommerce email
 */
add_filter( 'woocommerce_email_attachments', 'wot_ea_add_custom_attachment_by_order_status', 10 ,3);
function wot_ea_add_custom_attachment_by_order_status($attachments, $email_id, $email_order) {

    if( $email_id != 'new_order' ) {
        if( !empty($email_order) ) {

            $wot_wc_attachment_options = get_option('wot_wc_attachment_options');

            /*
             * Check Attachment option is enable or not
             * */
            if ( !empty($wot_wc_attachment_options['wot_ea_order_email_attachment']) ) {
                if ( !empty($wot_wc_attachment_options['wot_woo_email_attach']) ) {

                    $attachments_file_id = wot_ea_get_all_attachment_by_order_email($email_id, $email_order);
                    if ( !empty($attachments_file_id) ) {
                        foreach ( $attachments_file_id as $fileID ) {
                            $attachments[] = get_attached_file($fileID);
                        }
                    }
                }
            }
        }
    }
    return $attachments;
}

/**
 * Get all Attachment id by order Status & Products
 */
function wot_ea_get_all_attachment_by_order_email($email_id,$email_order) {
    $order_status  = $email_order->get_status();
    /**
     * Get Multi Languages option when WPML is Active
     */
    $languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=0&orderby=code' );

    if( !empty($order_status) ) {
        $order_status  = 'wc-'.$order_status;
        $wot_wc_attachment_options = get_option('wot_wc_attachment_options');
        if( !empty($wot_wc_attachment_options['wot_woo_email_attach']) ) {
            $attachement_array = [];
            foreach ( $wot_wc_attachment_options['wot_woo_email_attach'] as $attach ) {
                if( $attach['wot_ea_order_status'] == $order_status ) {
                    if( $attach['wot_ea_product_option'] == 'all' ) {

                        /* Check WPML is active and check order placed language */
                        if( !empty($languages) ) {
                            $order_id  = $email_order->get_id();
                            $order_language = get_post_meta( $order_id, 'wot_ea_order_current_language', true );
                            if( !empty($attach['wot_ea_attachment_file_lang'][$order_language]) ) {
                                $attachement_array[] = $attach['wot_ea_attachment_file_lang'][$order_language];
                            }
                            else  if( !empty($attach['wot_ea_attachment_file']) ) {
                                $attachement_array[] = $attach['wot_ea_attachment_file'];
                            }
                        }
                        else  if( !empty($attach['wot_ea_attachment_file']) ) {
                            $attachement_array[] = $attach['wot_ea_attachment_file'];
                        }
                    }
                    else if( $attach['wot_ea_product_option'] == 'product_type' ) {

                        $attach_product_type = $attach['wot_ea_product_type'];
                        foreach( $email_order->get_items() as $item_id => $item ) {
                            //Get the product ID
                            $product_id = $item->get_product_id();
                            $product = wc_get_product($product_id);
                            if ( !empty($product) ) {
                                if ( $product->is_type($attach_product_type) ) {

                                    /* Check WPML is active and check order placed language */
                                    if( !empty($languages) ) {
                                        $order_id  = $email_order->get_id();
                                        $order_language = get_post_meta( $order_id, 'wot_ea_order_current_language', true );
                                        if( !empty($attach['wot_ea_attachment_file_lang'][$order_language]) ) {
                                            $attachement_array[] = $attach['wot_ea_attachment_file_lang'][$order_language];
                                        }
                                        else  if( !empty($attach['wot_ea_attachment_file']) ) {
                                            $attachement_array[] = $attach['wot_ea_attachment_file'];
                                        }
                                    }
                                    else  if( !empty($attach['wot_ea_attachment_file']) ) {
                                        $attachement_array[] = $attach['wot_ea_attachment_file'];
                                    }

                                }
                            }
                        }
                    }
                    else if( $attach['wot_ea_product_option'] == 'single_product' ) {
                        $attach_product_id = $attach['wot_ea_product_lists'];
                        foreach( $email_order->get_items() as $item_id => $item ) {
                            //Get the product ID
                            $product_id = $item->get_product_id();
                            if( $product_id == $attach_product_id ) {
                                /* Check WPML is active and check order placed language */
                                if( !empty($languages) ) {
                                    $order_id  = $email_order->get_id();
                                    $order_language = get_post_meta( $order_id, 'wot_ea_order_current_language', true );
                                    if( !empty($attach['wot_ea_attachment_file_lang'][$order_language]) ) {
                                        $attachement_array[] = $attach['wot_ea_attachment_file_lang'][$order_language];
                                    }
                                    else  if( !empty($attach['wot_ea_attachment_file']) ) {
                                        $attachement_array[] = $attach['wot_ea_attachment_file'];
                                    }
                                }
                                else  if( !empty($attach['wot_ea_attachment_file']) ) {
                                    $attachement_array[] = $attach['wot_ea_attachment_file'];
                                }

                            }
                        }
                    }
                    else if( $attach['wot_ea_product_option'] == 'multiple_product' ) {
                        $attach_product_ids = $attach['wot_ea_product_lists_multiple'];
                        foreach( $email_order->get_items() as $item_id => $item ) {
                            //Get the product ID
                            $product_id = $item->get_product_id();
                            if( in_array($product_id,$attach_product_ids) ) {
                                /* Check WPML is active and check order placed language */
                                if( !empty($languages) ) {
                                    $order_id  = $email_order->get_id();
                                    $order_language = get_post_meta( $order_id, 'wot_ea_order_current_language', true );
                                    if( !empty($attach['wot_ea_attachment_file_lang'][$order_language]) ) {
                                        $attachement_array[] = $attach['wot_ea_attachment_file_lang'][$order_language];
                                    }
                                    else  if( !empty($attach['wot_ea_attachment_file']) ) {
                                        $attachement_array[] = $attach['wot_ea_attachment_file'];
                                    }
                                }
                                else  if( !empty($attach['wot_ea_attachment_file']) ) {
                                    $attachement_array[] = $attach['wot_ea_attachment_file'];
                                }

                            }
                        }
                    }
                }
            }
            return $attachement_array;
        }
        else {
            return '';
        }
    }
}
add_action('woocommerce_checkout_update_order_meta', 'wot_ea_save_lang_meta_while_place_order', 20, 2);
function wot_ea_save_lang_meta_while_place_order( $order_id, $data ) {
    $languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=0&orderby=code' );
    if( !empty($languages) ) {
        if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $current_lang = esc_attr(ICL_LANGUAGE_CODE);
            update_post_meta($order_id, 'wot_ea_order_current_language', $current_lang);
        }
    }
}