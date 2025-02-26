<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

//add action to add custom admin menu
add_action( 'admin_menu', 'wot_email_attachment_add_custom_admin_menu' );

/**
 * Add Custom admin menu
 */
function wot_email_attachment_add_custom_admin_menu(){

    add_submenu_page('woocommerce', esc_html__( 'Email Attachment by Orders Status ', 'email-attachment-by-order-status-products' ), esc_html__( 'Email Attachment by Orders Status', 'email-attachment-by-order-status-products' ), 'manage_options', 'wot-ea-option', 'wot_ea_manage_settings' );
}

/**
 * Register theme options action
 */
add_action( 'admin_init', 'wot_ea_register_settings' );

/**
 * Register theme option function
 */
function wot_ea_register_settings() {
    register_setting( 'wot_wc_attachment_options', 'wot_wc_attachment_options', 'wot_ea_sanitize' );
}

/**
 * sanitize input values
 */
function wot_ea_sanitize( $options ) {

    // If we have options lets sanitize them
    if ( $options ) {

    }
    // Return sanitized options
    return $options;

}
/**
 * Sanitize Theme options Array values
 */
function wot_ea_sanitize_array($dataArray) {
    $new_input = array();

    // Loop through the input and sanitize each of the values
    foreach ( $dataArray as $key => $val ) {

        switch ( $key ) {

            case 'wot_ea_order_status':

                $new_input[ $key ] = sanitize_text_field( $val );
                break;

            case 'wot_ea_product_option':

                $new_input[ $key ] = sanitize_text_field( $val );
                break;

            case 'wot_ea_product_type':

                $new_input[ $key ] = sanitize_text_field( $val );
                break;

            case 'wot_ea_product_lists':

                $new_input[ $key ] = (!empty($val)) ? (int)  sanitize_text_field($val) : '';
                break;

            case 'wot_ea_attachment_file':

                $new_input[ $key ] = (!empty($val)) ? (int)  sanitize_text_field($val) : '';
                break;

            case 'wot_ea_product_lists_multiple':

                $new_lists = array();
                foreach ($val as $ke=>$v) {
                    $new_lists[$ke] = (!empty($v)) ? (int)  sanitize_text_field($v) : '';
                }
                $new_input[ $key ] = $new_lists;
                break;

            case 'wot_ea_attachment_file_lang':

                $lang_new_lists = array();
                foreach ($val as $ke=>$v) {
                    $lang_new_lists[$ke] = (!empty($v)) ? (int)  sanitize_text_field($v) : '';
                }
                $new_input[ $key ] = $lang_new_lists;
                break;


        }

    }

    return $new_input;
}
/*
 * call back function settings
 */
function wot_ea_manage_settings(){
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

        if ( ! did_action( 'wp_enqueue_media' ) ) {
            wp_enqueue_media();
        }
        wp_enqueue_style('wot_ea_style',WOTEA_ADMIN_URL.'/css/wot-ea-style.css',array(),NULL);
        wp_enqueue_script('wot_ea_scripts',WOTEA_ADMIN_URL.'/js/wot-ea-scripts.js',array(),NULL,true);

        /**
         * Form submit Event
         */
        if( isset($_POST['wot-ea-save-settings-button']) ) {

            $wot_options = get_option('wot_wc_attachment_options');
            if( isset($_POST['theme_options']) ) {

                /*
                * Sanitize all values in theme options
                * */
                $new_theme_options['wot_ea_order_email_attachment'] = sanitize_text_field($_POST['theme_options']['wot_ea_order_email_attachment']);
                if(isset($_POST['theme_options']['wot_woo_email_attach']) && !empty($_POST['theme_options']['wot_woo_email_attach']) ) {
                    foreach ($_POST['theme_options']['wot_woo_email_attach'] as $keyOption=>$theme_option_loop) {
                        $new_theme_options['wot_woo_email_attach'][$keyOption] = wot_ea_sanitize_array($theme_option_loop);
                    }
                }
                if( !empty($new_theme_options['wot_ea_order_email_attachment']) && $new_theme_options['wot_ea_order_email_attachment'] == 1 ) {

                    if( !empty($new_theme_options['wot_woo_email_attach']) ) {

                        if( !empty($wot_options['wot_woo_email_attach']) ) {
                            $merge_options['wot_woo_email_attach'] = array_merge($wot_options['wot_woo_email_attach'],$new_theme_options['wot_woo_email_attach']);
                            $unique_options['wot_woo_email_attach'] = array_unique($merge_options['wot_woo_email_attach'], SORT_REGULAR);
                            array_unshift($unique_options['wot_woo_email_attach']);
                            unset($unique_options[0]);
                            $new_theme_options['wot_woo_email_attach'] = $unique_options['wot_woo_email_attach'];
                        }
                    }
                    else {
                        $new_theme_options['wot_woo_email_attach'] = (isset($wot_options['wot_woo_email_attach']) && !empty($wot_options['wot_woo_email_attach'])) ? $wot_options['wot_woo_email_attach'] : '';
                    }
                }
                else {
                    unset( $new_theme_options['wot_woo_email_attach'] );
                }
                /*
                 * Sanitize all values in theme options
                 * */
                if( !empty($new_theme_options['wot_woo_email_attach']) ) {
                    foreach ( $new_theme_options['wot_woo_email_attach'] as $key_attach=>$email_attach ) {
                        $new_theme_options['wot_woo_email_attach'][$key_attach]  = wot_ea_sanitize_array($email_attach);
                    }
                }
                update_option('wot_wc_attachment_options',$new_theme_options);

            }
            else {
                update_option('wot_wc_attachment_options',['wot_ea_order_email_attachment'=>'']);
            }
        }

        /**
         * Get all email attachment order option used in form
         */
        $wot_options = get_option('wot_wc_attachment_options');
        $wot_ptype_options =
            array('all'=>'All',
                'product_type'=>'Product Type',
                'single_product'=>'Single Product',
                'multiple_product'=>'Multiple Product');
        $products = get_posts( array(
            'post_type' => 'product',
            'numberposts' => -1,
            'post_status' => 'publish',

        ));
        $productLists = array();
        if( !empty($products) ) {
            $productLists = array_column($products,'post_title','ID') ;
        }
        $order_statuses = wc_get_order_statuses();
        $wot_ea_order_email_attachment = !empty($wot_options['wot_ea_order_email_attachment']) ? esc_attr( $wot_options['wot_ea_order_email_attachment'] ) : '';

        /**
         * Get Multi Languages option when WPML is Active
         */
        $languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=0&orderby=code' );

        ?>
        <div class="wot-email-attachment-settings-section">
        <div class="wrap woocommerce-layout__primary">
            <h1><?php esc_html_e( 'Woocommerce Email Attachment Setting Page', 'email-attachment-by-order-status-products' ) ?></h1>
            <div class="wot-ea-content">
                <form method="post" action="" class="attachment_form" onsubmit="return checkValidation()">
                    <?php settings_fields( 'wot_wc_attachment_options' ); ?>
                    <table class="form-table enable-attachment-table ">
                        <tr valign="top">
                            <td scope="row">
                                <label><strong><?php esc_html_e( 'Enable Email Attachment', 'email-attachment-by-order-status-products' ); ?></strong></label>
                            </td>
                            <td scope="row" >
                                <label>
                                    <input name="theme_options[wot_ea_order_email_attachment]" class="wot_ea_order_email_attachment wppd-ui-toggle" type="checkbox" value="1" <?php echo (!empty($wot_ea_order_email_attachment) && esc_attr($wot_ea_order_email_attachment) == 1) ?'Checked' :'' ?>/>
                                </label>
                            </td>
                        </tr>

                    </table>
                    <div class="OrderEmailAttachmentSection">
                        <?php  $order_option_counter = 1;?>

                        <!-- Show existing attachment in table Row -->


                            <?php if( !empty($wot_options['wot_woo_email_attach']) ) {
                            ?>
                            <table class="form-table wot-ea-form-table">
                                <tr>
                                    <th style="width: 20%">
                                        <?php esc_html_e('Order Status','email-attachment-by-order-status-products');?>
                                    </th>
                                    <th style="width: 10%">
                                        <?php esc_html_e('Product Option','email-attachment-by-order-status-products');?>
                                    </th>
                                    <th style="width: 20%"> <?php esc_html_e('Product Or Type','email-attachment-by-order-status-products');?></th>
                                    <th style="width: 40%">
                                        <?php esc_html_e('Attachment','email-attachment-by-order-status-products');?>
                                    </th>
                                    <th style="width: 10%">
                                        <?php esc_html_e('Action','email-attachment-by-order-status-products');?>
                                    </th>
                                </tr>

                                <?php
                                foreach ( $wot_options['wot_woo_email_attach'] as $wot_key=>$wot_option ) {

                                    if( !empty($wot_option['wot_ea_order_status']) ) {
                                        ?>
                                        <tr valign="top" data-id="<?php echo esc_attr($wot_key);?>">
                                            <td scope="row">
                                                <?php echo esc_attr($order_statuses[$wot_option['wot_ea_order_status']]) .' '. esc_html(__('order', 'wot_ae')); ?>
                                            </td>
                                            <td>
                                                <?php echo esc_attr($wot_ptype_options[$wot_option['wot_ea_product_option']]); ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (!empty($wot_option['wot_ea_product_type'])) {
                                                    echo esc_attr($wot_option['wot_ea_product_type']);
                                                }
                                                else if ( !empty($wot_option['wot_ea_product_lists']) ) {
                                                    esc_html_e('Product :  ','email-attachment-by-order-status-products');
                                                    echo ( !empty($productLists)) ? esc_attr($productLists[$wot_option['wot_ea_product_lists']]) : esc_attr($wot_option['wot_ea_product_lists']);
                                                }
                                                else if ( !empty($wot_option['wot_ea_product_lists_multiple']) ) {
                                                    esc_html_e('Product :  ','email-attachment-by-order-status-products');
                                                    foreach ($wot_option['wot_ea_product_lists_multiple'] as $keyp=>$plist) {
                                                        echo (!empty($productLists)) ? esc_attr($productLists[$plist]).' ' : esc_attr($plist);
                                                    }
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0"
                                                       class="attachment-table">
                                                    <tr>
                                                        <td>
                                                            <?php if(!empty($languages)) {
                                                                esc_html_e('Default File (English)','email-attachment-by-order-status-products');
                                                            }
                                                            else {
                                                                esc_html_e('Default File','email-attachment-by-order-status-products');
                                                            }?>

                                                        </td>
                                                        <td>
                                                            <?php if ( !empty($wot_option['wot_ea_attachment_file']) && $woo_attachment_file = wp_get_attachment_url(esc_attr($wot_option['wot_ea_attachment_file'])) ) { ?>

                                                                <a href="<?php echo esc_url($woo_attachment_file) ?>"
                                                                   class="wot_ea_attachment_file"> <?php echo esc_attr(basename($woo_attachment_file)); ?></a>&nbsp;
                                                                <?php
                                                            } else {
                                                                ?>
                                                            <?php }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    if (!empty($languages)) {
                                                        ?>
                                                        <?php
                                                        foreach ($languages as $lang) {
                                                            if ($lang['active'] == 1) continue;
                                                            ?>


                                                            <tr>
                                                                <td><?php echo $lang['translated_name'] ?> <?php esc_html_e('File','email-attachment-by-order-status-products');?> </td>
                                                                <td>
                                                                    <?php if (!empty($wot_option['wot_ea_attachment_file_lang'][$lang['code']]) && $woo_attachment_file = wp_get_attachment_url($wot_option['wot_ea_attachment_file_lang'][$lang['code']])) { ?>

                                                                        <a href="<?php echo esc_url($woo_attachment_file) ?>"
                                                                           class="wot_ea_attachment_file"> <?php echo esc_attr(basename($woo_attachment_file)); ?></a>&nbsp;

                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </table>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" class="remove-order-attachment-option"><i
                                                            class="dashicons-before dashicons-dismiss"></i></a>
                                            </td>

                                        </tr>


                                        <?php
                                        $order_option_counter++;
                                    }
                                }
                                }
                                ?>
                            </table>
                        </div>
                        <table class="form-table wot-ea-form-table wot-ea-form-table-submit">
                            <tr valign="top">
                                <td scope="row" >
                                    <a href="javascript:void(0)" class="add-order-attachment"><?php echo esc_html( __( 'Add Attachment', 'email-attachment-by-order-status-products' ) ); ?></a>
                                </td>
                                <td scope="row" >

                                </td>
                            </tr>
                        </table>
                        <div class="add-more-section ">
                        </div>

                    <?php submit_button( esc_html__( 'Save Settings', 'email-attachment-by-order-status-products' ), 'primary', 'wot-ea-save-settings-button' ); ?>
                </form>
                <div class="woo-attachment-settings-section" style="display: none;">
                    <table class="form-table wot-ea-form-table-add">

                        <tr valign="top">
                            <td scope="row" >
                                <label><strong><?php esc_html_e( 'Select Order Status for Attachment', 'email-attachment-by-order-status-products' ); ?></strong></label>
                            </td>
                            <td scope="row" >
                                <label>
                                    <input type="hidden" class="attach_counter" value="<?php echo esc_attr($order_option_counter);?>" />
                                    <select name="" class="wot_ea_order_status">
                                        <option value=""><?php esc_html_e('Select Order Status','email-attachment-by-order-status-products')?> </option>
                                        <?php foreach ( $order_statuses as $okey=>$ostatus )  {
                                            ?>
                                            <option value="<?php echo esc_attr($okey);?>"><?php echo esc_attr($ostatus);?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </label>
                            </td>
                            <td><td><a href="javascript:void(0)" class="remove-new-order-attachment-option"><i class="dashicons-before dashicons-dismiss"></i></a></td>
                        </tr>
                        <tr valign="top" class="product-option-div">
                            <td scope="row" >
                                <label><strong><?php esc_html_e('Add Attachment By', 'email-attachment-by-order-status-products' ); ?></strong></label>
                            </td>
                            <td scope="row" >
                                <?php
                                $k = 1;
                                foreach ( $wot_ptype_options as $wot_ptype=>$wot_ptype_option )  {
                                    $ptype_checked = ( $wot_ptype == 'all') ?'Checked':'';
                                    ?>
                                    <label>
                                        <input type="radio" name="" class="wot_ea_product_option" value="<?php echo esc_attr($wot_ptype);?>" <?php echo $ptype_checked;?> /><?php echo esc_attr($wot_ptype_option);?>
                                    </label>

                                    <?php
                                    $k++;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr valign="top" class="product-type-selection"></tr>
                        <tr valign="top">
                            <td scope="row" >
                                <label><strong><?php esc_html_e( 'Upload Attachment', 'email-attachment-by-order-status-products' ); ?></strong></label>
                            </td>
                            <td scope="row" >
                                <table border="1" cellspacing="0" cellpadding="0" class="attachment-table">

                                    <tr>
                                        <td>
                                            <?php if(!empty($languages)) {
                                                esc_html_e('Default File (English)','email-attachment-by-order-status-products');
                                            }
                                            else {
                                                esc_html_e('Default File','email-attachment-by-order-status-products');
                                            }?>
                                        </td>
                                        <td class="file-attachment-section">
                                            <a href="javascript:void(0)" class="wot_ea_attachment_file" ><i class="dashicons-before dashicons-upload"></i> </a>
                                            <a href="javascript:void(0)" class="remove-attachment" style="display:none"><i class="dashicons-before dashicons-dismiss"></i></a>
                                            <input type="hidden" name="" class="wot_attachment_file_input wot_attachment_file_default" value="">
                                        </td>
                                    </tr>
                                    <?php
                                    if( !empty($languages) ) {
                                        ?>
                                        <?php
                                        foreach( $languages as $lang ) {
                                            if( $lang['code'] == 'en' ) continue;
                                            ?>
                                            <tr>
                                                <td><?php echo esc_attr($lang['translated_name'])?> <?php esc_html_e('File','email-attachment-by-order-status-products');?> </td>
                                                <td>
                                                    <a href="javascript:void(0)" class="wot_ea_attachment_file" ><i class="dashicons-before dashicons-upload"></i></a>
                                                    <a href="javascript:void(0)" class="remove-attachment" style="display:none"><i class="dashicons-before dashicons-dismiss"></i></a>
                                                    <input type="hidden" data-lang="<?php echo esc_attr($lang['code']) ?>"   class="wot_attachment_file_input wot_attachment_file_lang" value="">
                                                </td>
                                            </tr>

                                            <?php
                                        }
                                    }
                                    ?>
                                </table>
                                <span class="file_validtion"><?php esc_html_e('You must upload Default file','email-attachment-by-order-status-products'); ?></span>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
        </div>

        <?php
    } else {
        ?>
        <div class="wrap">
            <p><?php esc_html_e( 'Woocommerce plugin must be enabled', 'email-attachment-by-order-status-products' ); ?> </p>
        </div>
        <?php
    }

}

/**
 * Get Product options using Ajax
 */
function wot_get_product_type() {

    $num_count = (isset($_REQUEST['a_count'])) ? sanitize_text_field($_REQUEST['a_count']) : 0;
    $product_option  = (isset($_REQUEST['product_ption'])) ? sanitize_text_field($_REQUEST['product_ption']) : '';
    if( !empty($product_option) ) {
        if( $product_option == 'product_type' ) {
            $product_types = wc_get_product_types();
            if( !empty($product_types) ) {
                ?>

                <td scope="row" >
                    <label><strong><?php esc_html_e( 'Product Type', 'email-attachment-by-order-status-products' ); ?></strong></label>
                </td>
                <td scope="row" >

                    <label>
                        <select name="theme_options[wot_woo_email_attach][<?php echo esc_attr($num_count);?>][wot_ea_product_type]" class="wot_ea_product_type">
                            <?php
                            foreach ( $product_types as $ptkey=>$pdata ) {
                                if($ptkey == 'grouped') continue;
                                if($ptkey == 'external') continue;
                                ?>
                                <option value="<?php echo esc_attr($ptkey);?>"><?php echo esc_attr($pdata);?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </label>
                </td>


                <?php
            }

        }
        else if ( $product_option == 'single_product') {
            $products = get_posts( array(
                'post_type' => 'product',
                'numberposts' => -1,
                'post_status' => 'publish',

            ));
            if(!empty($products)) {
                ?>
                <td scope="row" >
                    <label><strong><?php esc_html_e( 'Product', 'email-attachment-by-order-status-products' ); ?></strong></label>
                </td>
                <td scope="row" >

                    <label>
                        <select name="theme_options[wot_woo_email_attach][<?php echo ($num_count);?>][wot_ea_product_lists]" class="wot_ea_product_lists">
                            <?php
                            foreach ( $products as $pkey=>$product ) {
                                ?>
                                <option value="<?php echo esc_attr($product->ID);?>"><?php echo esc_attr($product->post_title);?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </label>
                </td>
                <?php
            }
        }
        else if ($product_option == 'multiple_product') {
            $products = get_posts( array(
                'post_type' => 'product',
                'numberposts' => -1,
                'post_status' => 'publish',

            ));
            if(!empty($products)) {
                ?>
                <td scope="row" >
                    <label><strong><?php esc_html_e( 'Product', 'email-attachment-by-order-status-products' ); ?></strong></label>
                </td>
                <td scope="row" >

                    <label>
                        <select name="theme_options[wot_woo_email_attach][<?php echo esc_attr($num_count);?>][wot_ea_product_lists_multiple][]" class="wot_ea_product_lists_multiple" multiple>
                            <!--<option value=""><?php /*esc_html_e( 'Select Product', 'email-attachment-by-order-status-products' ); */?></option>-->
                            <?php
                            foreach ( $products as $pkey=>$product ) {
                                ?>
                                <option value="<?php echo esc_attr($product->ID);?>"><?php echo esc_attr($product->post_title);?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </label>
                </td>
                <?php
            }
        }
    }
    exit;

}
add_action('wp_ajax_wot_get_product_type', 'wot_get_product_type');
add_action('wp_ajax_nopriv_wot_get_product_type', 'wot_get_product_type');


/**
 * Remove Existing order attachment option
 */
function wot_remove_order_status_row() {
    $order_status_key = (isset($_REQUEST['order_status_key'])) ?  (int) sanitize_text_field($_REQUEST['order_status_key']): '';

    if( isset($order_status_key) ) {
        $wot_options = get_option('wot_wc_attachment_options');
        if( array_key_exists( $order_status_key,$wot_options['wot_woo_email_attach']) ) {
            unset($wot_options['wot_woo_email_attach'][$order_status_key] );
        }
        $updated = update_option('wot_wc_attachment_options',$wot_options);
    }
    exit;
}
add_action('wp_ajax_wot_remove_order_status_row', 'wot_remove_order_status_row');
add_action('wp_ajax_nopriv_wot_remove_order_status_row', 'wot_remove_order_status_row');