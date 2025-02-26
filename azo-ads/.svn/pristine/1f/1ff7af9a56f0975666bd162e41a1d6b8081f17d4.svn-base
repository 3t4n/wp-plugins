<?php
/**
 * Get value from the list of conditional visibility
 * 
 * @since 1.0.0
 * @return array
 */
add_action( 'wp_ajax_azoads_get_value_list_visibility', 'azoads_get_value_list_visibility' );
function azoads_get_value_list_visibility() {

    $_wpnonce = isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '';
    $vtid = isset( $_POST['vtid'] ) ? sanitize_text_field( $_POST['vtid'] ) : '';

    if ( $_wpnonce == '' || ! wp_verify_nonce( $_wpnonce, 'azoads-manage-ad' ) ) wp_send_json_error( 'Sorry, your nonce did not verify.' );

    if ( $vtid == '' ) wp_send_json_error( 'Invalid data.' );
    
    $vt_value = array();
    $azo_ads_visibility =  azoads_get_list_visibility();

    switch ( $vtid ) {

        case array_keys( $azo_ads_visibility )[0] :
            array_push( $vt_value, array(
                    'id'            => 'everywhere',
                    'text'          => __( 'Everywhere', 'azo-ads' )
                ), array(
                    'id'            => 'homepage',
                    'text'          => __( 'Homepage', 'azo-ads' )
                )
            );
            break;
        
        case array_keys( $azo_ads_visibility )[1] :
            $vt_args = array(
                'post_type'             => 'page',
                'posts_per_page'        => -1
            );
            $vt_query = new WP_Query( $vt_args );
            if ( $vt_query->have_posts() ) {
                while ( $vt_query->have_posts() ) {
                    $vt_query->the_post();

                    array_push( $vt_value, array(
                        'id'            => get_the_ID(),
                        'text'          => get_the_title()
                    ) );
                }
                wp_reset_postdata();
            }
            break;
        
        case array_keys( $azo_ads_visibility )[2] :
            $vt_templates = wp_get_theme()->get_page_templates();
            foreach ( $vt_templates as $key => $value ) {
                array_push( $vt_value, array( 
                    'id'        => $key,
                    'text'      => $value
                ) );
            }
            break;
        
        case array_keys( $azo_ads_visibility )[3] :
            $vt_args = array(
                'posts_per_page'        => -1
            );
            $vt_query = new WP_Query( $vt_args );
            if ( $vt_query->have_posts() ) {
                while ( $vt_query->have_posts() ) {
                    $vt_query->the_post();

                    array_push( $vt_value, array(
                        'id'            => get_the_ID(),
                        'text'          => get_the_title()
                    ) );
                }
                wp_reset_postdata();
            }
            break;
            
        case array_keys( $azo_ads_visibility )[4] :
            $vt_categories = get_categories( array(
                'hide_empty'            => false,
            ) );
            foreach ( $vt_categories as $vt_category) {
                array_push( $vt_value, array( 
                    'id'        => $vt_category->term_id,
                    'text'      => $vt_category->name
                ) );
            }
            break;
            
        case array_keys( $azo_ads_visibility )[5] :
            $vt_post_formats = get_theme_support( 'post-formats' );
            $vt_post_formats = array_shift( $vt_post_formats );
            foreach ( $vt_post_formats as $value ) {
                array_push( $vt_value, array( 
                    'id'        => $value,
                    'text'      => ucfirst( $value )
                ) );
            }
            break;
        
        case array_keys( $azo_ads_visibility )[6] :
            $vt_args = array(
                'public' => true,
            );
            $vt_post_types = get_post_types( $vt_args, 'objects' );
            foreach ( $vt_post_types as $vt_post_type ) {
                array_push( $vt_value, array( 
                    'id'        => $vt_post_type->name,
                    'text'      => $vt_post_type->labels->name
                ) );
            }
            break;
            
        case array_keys( $azo_ads_visibility )[7] :
            $vt_args = array(
                'public' => true,
            );
            $vt_taxonomies = get_taxonomies( $vt_args, 'objects' );
            foreach ( $vt_taxonomies as $vt_taxonomy ) {
                array_push( $vt_value, array( 
                    'id'        => $vt_taxonomy->name,
                    'text'      => $vt_taxonomy->labels->name
                ) );
            }
            break;
            
        case array_keys( $azo_ads_visibility )[8] :
            $vt_tags = get_tags( array(
                'hide_empty'            => false,
            ) );
            foreach ( $vt_tags as $vt_tag ) {
                array_push( $vt_value, array( 
                    'id'        => $vt_tag->term_id,
                    'text'      => $vt_tag->name
                ) );
            }
            break;
            
        case array_keys( $azo_ads_visibility )[9] :
            $vt_roles = get_editable_roles();
            foreach ( $vt_roles as $id => $role_info ) {
                array_push( $vt_value, array( 
                    'id'        => $id,
                    'text'      => $role_info['name']
                ) );
            }
            break;
    }

    wp_send_json_success( $vt_value );
}


/**
 * Get value from the list of conditional targeting
 * 
 * @since 1.0.0
 * @return array
 */
add_action( 'wp_ajax_azoads_get_value_list_targeting', 'azoads_get_value_list_targeting' );
function azoads_get_value_list_targeting() {

    $_wpnonce = isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '';
    $vtid = isset( $_POST['vtid'] ) ? sanitize_text_field( $_POST['vtid'] ) : '';

    if ( $_wpnonce == '' || ! wp_verify_nonce( $_wpnonce, 'azoads-manage-ad' ) ) wp_send_json_error( 'Sorry, your nonce did not verify.' );
    
    if ( $vtid == '' ) wp_send_json_error( 'Invalid data.' );
    
    $vt_value = array();
    $azo_ads_targeting =  azoads_get_list_targeting();

    // require Pro version
    if ( ( ! defined( 'AZOADS_PRO_VERSION' ) || ! azoads_activated_pro() ) && in_array( $vtid, azoads_get_list_targeting_only_pro() ) ) wp_send_json_error( 'Require Pro Version' );

    switch ( $vtid ) {

        case array_keys( $azo_ads_targeting )[0] :
            $browser_language = [['value'=>'af','label'=>'Afrikanns'],['value'=>'sq','label'=>'Albanian'],['value'=>'ar','label'=>'Arabic'],['value'=>'hy','label'=>'Armenian'],['value'=>'eu','label'=>'Basque'],['value'=>'bn','label'=>'Bengali'],['value'=>'bg','label'=>'Bulgarian'],['value'=>'ca','label'=>'Catalan'],['value'=>'km','label'=>'Cambodian'],['value'=>'zh','label'=>'Chinese (Mandarin)'],['value'=>'hr','label'=>'Croation'],['value'=>'cs','label'=>'Czech'],['value'=>'da','label'=>'Danish'],['value'=>'nl','label'=>'Dutch'],['value'=>'en','label'=>'English'],['value'=>'et','label'=>'Estonian'],['value'=>'fj','label'=>'Fiji'],['value'=>'fi','label'=>'Finnish'],['value'=>'fr','label'=>'French'],['value'=>'ka','label'=>'Georgian'],['value'=>'de','label'=>'German'],['value'=>'el','label'=>'Greek'],['value'=>'gu','label'=>'Gujarati'],['value'=>'he','label'=>'Hebrew'],['value'=>'hi','label'=>'Hindi'],['value'=>'hu','label'=>'Hungarian'],['value'=>'is','label'=>'Icelandic'],['value'=>'id','label'=>'Indonesian'],['value'=>'ga','label'=>'Irish'],['value'=>'it','label'=>'Italian'],['value'=>'ja','label'=>'Japanese'],['value'=>'jw','label'=>'Javanese'],['value'=>'ko','label'=>'Korean'],['value'=>'la','label'=>'Latin'],['value'=>'lv','label'=>'Latvian'],['value'=>'lt','label'=>'Lithuanian'],['value'=>'mk','label'=>'Macedonian'],['value'=>'ms','label'=>'Malay'],['value'=>'ml','label'=>'Malayalam'],['value'=>'mt','label'=>'Maltese'],['value'=>'mi','label'=>'Maori'],['value'=>'mr','label'=>'Marathi'],['value'=>'mn','label'=>'Mongolian'],['value'=>'ne','label'=>'Nepali'],['value'=>'no','label'=>'Norwegian'],['value'=>'fa','label'=>'Persian'],['value'=>'pl','label'=>'Polish'],['value'=>'pt','label'=>'Portuguese'],['value'=>'pa','label'=>'Punjabi'],['value'=>'qu','label'=>'Quechua'],['value'=>'ro','label'=>'Romanian'],['value'=>'ru','label'=>'Russian'],['value'=>'sm','label'=>'Samoan'],['value'=>'sr','label'=>'Serbian'],['value'=>'sk','label'=>'Slovak'],['value'=>'sl','label'=>'Slovenian'],['value'=>'es','label'=>'Spanish'],['value'=>'sw','label'=>'Swahili'],['value'=>'sv','label'=>'Swedish '],['value'=>'ta','label'=>'Tamil'],['value'=>'tt','label'=>'Tatar'],['value'=>'te','label'=>'Telugu'],['value'=>'th','label'=>'Thai'],['value'=>'bo','label'=>'Tibetan'],['value'=>'to','label'=>'Tonga'],['value'=>'tr','label'=>'Turkish'],['value'=>'uk','label'=>'Ukranian'],['value'=>'ur','label'=>'Urdu'],['value'=>'uz','label'=>'Uzbek'],['value'=>'vi','label'=>'Vietnamese'],['value'=>'cy','label'=>'Welsh'],['value'=>'xh','label'=>'Xhosa']];
            foreach ( $browser_language as $value ) {
                array_push( $vt_value, array(
                    'id'            => $value['value'],
                    'text'          => $value['label']
                ) );
            }
            break;
            
        // cookie
        case array_keys( $azo_ads_targeting )[2] :
            array_push( $vt_value, array( 
                'id'        => -1,
                'text'      => ''
            ) );
            break;
        
        // device type
        case array_keys( $azo_ads_targeting )[3] :
            $device_type = array(
                'desktop'           => 'Desktop',
                'tablet'            => 'Tablet',
                'mobile'            => 'Mobile',
            );
            foreach ( $device_type as $key => $value ) {
                array_push( $vt_value, array( 
                    'id'        => $key,
                    'text'      => $value
                ) );
            }
            break;
        
        // logged-in
        case array_keys( $azo_ads_targeting )[4] :
            $logged_in = array(
                1           => 'Yes',
                0           => 'No'
            );
            foreach ( $logged_in as $key => $value ) {
                array_push( $vt_value, array( 
                    'id'        => $key,
                    'text'      => $value
                ) );
            }
            break;
            
        case array_keys( $azo_ads_targeting )[5] :
            array_push( $vt_value, array( 
                'id'        => -1,
                'text'      => ''
            ) );
            break;
            
        case array_keys( $azo_ads_targeting )[6] :
            array_push( $vt_value, array( 
                'id'        => -1,
                'text'      => ''
            ) );
            break;
            
        case array_keys( $azo_ads_targeting )[7] :
            array_push( $vt_value, array( 
                'id'        => -1,
                'text'      => ''
            ) );
            break;
            
        case array_keys( $azo_ads_targeting )[8] :
            $vt_roles = get_editable_roles();
            foreach ( $vt_roles as $id => $role_info ) {
                array_push( $vt_value, array( 
                    'id'        => $id,
                    'text'      => $role_info['name']
                ) );
            }
            break;
        default:
            if ( defined( 'AZOADS_PRO_VERSION' ) && azoads_activated_pro() && in_array( $vtid, azoads_get_list_targeting_only_pro() ) ) {
                $vt_value = azoads_pro_get_value_list_targeting( $vtid );
            }
            break;
    }

    wp_send_json_success( $vt_value );
}

/**
 * Manage ads (Add/Edit)
 * 
 * @since 1.0.0
 * @return array
 */
add_action( 'wp_ajax_azoads_manage_ads', 'azoads_manage_ads' );
function azoads_manage_ads() {
    global $current_user;

    $_wpnonce = isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '';
    $azoads_variables = isset( $_POST['azoads_variables'] ) ? sanitize_text_field( $_POST['azoads_variables'] ) : '';

    if ( $_wpnonce == '' || ! wp_verify_nonce( $_wpnonce, 'azoads-manage-ad' ) ) wp_send_json_error( 'Sorry, your nonce did not verify.' );
    
    if ( ! empty( $azoads_variables ) ) {

        do_action( 'azoads_admin_before_ad_updated' );

        // get post status
        $post_status = 'draft';
        if ( isset( $_POST['active'] ) ) {
            if ( $_POST['active'] == 1 ) {
                $post_status = 'publish';
            }
            unset( $_POST['active'] );
        }

        // pass variables
        $ad_data = array();
        $azoads_variables = json_decode( html_entity_decode( stripslashes( $azoads_variables ) ) );
        foreach ( $azoads_variables as $variable_name ) {
            if ( isset( $_POST['type'] ) && in_array( $variable_name, array( 'content_header', 'content', 'content_footer' ) ) ) {
                $ad_data[$variable_name] = $_POST[$variable_name];
            }
            else {
                $ad_data[$variable_name] = sanitize_text_field( $_POST[$variable_name] );
            }
        }

        $post_title = ( strlen( $ad_data['title'] ) == 0 ) ? ( 'AZO Ads ' . ( get_posts( 'post_type=azo-ads&posts_per_page=1&fields=ids' )[0] + 1 ) ) : $ad_data['title'];
        
        $aa_args = array(
            'post_type'                 => 'azo-ads',
            'post_status'               => $post_status,
            'post_title'                => $post_title,
            'post_author'               => $current_user->ID
        );

        $post_id = absint( $ad_data['id'] );
        // adding new ads
        if ( $post_id == 0 ) {
            $post_id = wp_insert_post( $aa_args );
            $isUpdate = false;
        }
        // modify ads
        elseif ( $post_id > 0 ) { // edit ads
            $isUpdate = true;
        }
        // error
        else {
            wp_send_json_error( $post_id );
        }
        
        // insert ads custom post meta
        unset( $ad_data['action'] );
        $vt_element = ['visibility_include', 'visibility_exclude', 'targeting_include', 'targeting_exclude'];
        $vt_data = json_decode( html_entity_decode( stripslashes ( $ad_data['vt_data'] ) ) );
        foreach ( $ad_data as $key => $value ) {
            if ( $key == 'vt_data' ) {
                foreach ( $vt_data as $index => $vt_ie_content ) {
                    if ( ! empty( $vt_ie_content ) ) {
                        update_post_meta( $post_id, 'aa_' . $vt_element[$index], $vt_ie_content );
                    }
                    else {
                        delete_post_meta( $post_id, 'aa_' . $vt_element[$index] );
                    }
                }
            }
            else {
                update_post_meta( $post_id, 'aa_' . $key, $value );
            }
        }

        // fix re-update azoads_options for new post only due to save_post hook fired before inserting custom post meta
        if ( ! $isUpdate ) {
            $options = azoads_update_options_data();
            update_option( 'azoads_options', $options );

            do_action( 'azoads_admin_after_ad_updated' );
        }
        // update ads data
        else {
            $aa_args['ID'] = $post_id;
            wp_update_post( $aa_args );

            // re-update azoads_option again
            $options = azoads_update_options_data();
            update_option( 'azoads_options', $options );

            do_action( 'azoads_admin_after_ad_updated' );

            wp_send_json_success( array( 'azoads_options' => $options ) );
        }

        wp_send_json_success( array( 'post_id' => $post_id ) );
    }
}

/**
 * Delete ads
 * 
 * @since 1.0.0
 * @return array
 */
add_action( 'wp_ajax_azoads_delete_ads', 'azoads_delete_ads' );
function azoads_delete_ads() {

    $_wpnonce = isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '';

    if ( $_wpnonce == '' || ! wp_verify_nonce( $_wpnonce, 'azoads-manage-ad' ) ) wp_send_json_error( 'Sorry, your nonce did not verify.' );

    $post_id = ( isset( $_POST['id'] ) && ! empty( $_POST[ 'id' ] ) ) ? absint( $_POST[ 'id' ] ) : 0;

    do_action( 'azoads_admin_before_ad_updated' );

    if ( $post_id > 0 ) {
            wp_delete_post( $post_id, true );

            do_action( 'azoads_admin_after_ad_updated' );

            wp_send_json_success();
    }
    else {
        wp_send_json_error();
    }
}

/**
 * Duplicate ads
 * 
 * @since 1.0.0
 * @return array
 */
add_action( 'wp_ajax_azoads_duplicate_ads', 'azoads_duplicate_ads' );
function azoads_duplicate_ads() {
    global $wpdb;

    $_wpnonce = isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '';
    
    if ( $_wpnonce == '' || ! wp_verify_nonce( $_wpnonce, 'azoads-manage-ad' ) ) wp_send_json_error( 'Sorry, your nonce did not verify.' );

    $post_id = isset( $_POST['id'] ) ? absint( $_POST['id'] ) : 0;
    if ( $post_id > 0 ) {

        do_action( 'azoads_admin_before_ad_updated' );
        
        $current_user = wp_get_current_user();
        
        $post = get_post( $post_id );
        
        if ( isset( $post ) && $post != null ) {
        
            $args = array(
                'post_type'             => $post->post_type,
                'post_title'            => $post->post_title . ' Duplicate',
                'post_date'             => $post->post_date,
                'post_date'             => $post->post_date,
                'post_modified'         => $post->post_modified,
                'post_status'           => 'draft',
                'post_author'           => $current_user->ID,
            );
            $new_post_id = wp_insert_post( $args );
        
            // duplicate all post meta just in two SQL queries
            $post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id = %d", $post_id ) );
            if ( count( $post_meta_infos ) != 0 ) {
                foreach ( $post_meta_infos as $meta_info ) {
                    $meta_key = $meta_info->meta_key;
                    if( $meta_key == '_wp_old_slug' ) continue;
                    $meta_value = addslashes( $meta_info->meta_value );
                    $wpdb->query( $wpdb->prepare( 'INSERT INTO ' . $wpdb->postmeta . ' (post_id, meta_key, meta_value) values (%d, %s, %s)', $new_post_id, $meta_key, $meta_value ) );
                }
            }

            do_action( 'azoads_admin_after_ad_updated' );

            wp_send_json_success( array(
                'ID'                    => $new_post_id,
            ) );
        }
    }

    wp_send_json_error();
}

/**
 * Update ads status
 * 
 * @since 1.0.0
 * @return array
 */
add_action( 'wp_ajax_azoads_update_ads_status', 'azoads_update_ads_status' );
function azoads_update_ads_status() {

    $_wpnonce = isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '';
    
    if ( $_wpnonce == '' || ! wp_verify_nonce( $_wpnonce, 'azoads-manage-ad' ) ) wp_send_json_error( 'Sorry, your nonce did not verify.' );

    do_action( 'azoads_admin_before_ad_updated' );

    $ad_active = isset( $_POST['active'] ) ? absint( $_POST['active'] ) : 0;
    if ( $ad_active == 1 ) $status = 'publish';
    elseif ( $ad_active == 0 ) $status = 'draft';
    else wp_send_json_error();

    $post_id = isset( $_POST['id'] ) ? absint( $_POST['id'] ) : 0;
    if ( $post_id == 0 ) wp_send_json_error();
    
    $aa_args = array(
        'ID'                        => $post_id,
        'post_status'               => $status,
    );
    wp_update_post( $aa_args );

    do_action( 'azoads_admin_after_ad_updated' );

    wp_send_json_success();
}

/**
 * Loading WordPress Media Uploader
 * 
 * @since 1.0.0
 * @return null
 */
add_action( 'admin_enqueue_scripts', 'azoads_media_uploader' );
function azoads_media_uploader() {
	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
}

/**
 * Front-End Ad Report
 * 
 * @since 1.0.0
 * @return json
 */
add_action( 'wp_ajax_nopriv_azoads_report', 'azoads_report_function' );
add_action( 'wp_ajax_azoads_report', 'azoads_report_function' );
function azoads_report_function() {
    global $wpdb;

    $_azoadsnonce = isset( $_POST['_azoadsnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_azoadsnonce'] ) ) : '';
    
    if ( $_azoadsnonce == '' || ! wp_verify_nonce( $_azoadsnonce, 'azoads-front-end' ) ) wp_send_json_error( 'Sorry, your nonce did not verify.' );

    // $ad_ids = ( isset( $_POST['adids'] ) && ! empty( $_POST['adids'] ) ) ? (array) $_POST['adids'] : array();
    $ad_ids = array();
    if ( isset( $_POST['adids'] ) && ! empty( $_POST['adids'] ) ) {
        foreach ( $_POST['adids'] as $key => $ad_data ) {
            if ( isset( $ad_data['id'] ) && isset( $ad_data['ww'] ) ) {
                $ad_ids[$key]['id'] = absint( $ad_data['id'] );
                $ad_ids[$key]['ww'] = absint( $ad_data['ww'] );
            }
        }
    }

    $ad_url = isset( $_POST['url'] ) ? sanitize_text_field( $_POST['url'] ) : '';
    $ad_referrer = isset( $_POST['referrer'] ) ? sanitize_text_field( $_POST['referrer'] ) : '';
    $ad_type = isset( $_POST['type'] ) ? absint( $_POST['type'] ) : '';
    $ad_user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? sanitize_text_field( $_SERVER['HTTP_USER_AGENT'] ) : '';

    if ( ! empty( $ad_ids ) && isset( $ad_url ) && isset( $ad_referrer ) && $ad_type > 0 && in_array( $ad_type, array( 1, 2 ) ) ) {

        $adids = array_unique( $ad_ids, SORT_REGULAR );

        foreach ( $adids as $adid ) {

            // $aa_views = get_post_meta( $adid, 'aa_views', true );
            // $aa_views = ( $aa_views > 0 ) ? $aa_views : 0;
            // update_post_meta( $adid, 'aa_views', ( $aa_views + 1 ) );

            if ( $adid['ww'] <= 480 ) $device = 1;
            elseif ( $adid['ww'] > 480 && $adid['ww'] <= 1280 ) $device = 2;
            elseif ( $adid['ww'] > 1280 ) $device = 3;
            $wpdb->insert(
                $wpdb->prefix . 'azoads_report',
                array(
                    'ID'                => 0,
                    'post_id'           => $adid['id'],
                    'type'              => $ad_type,
                    'device'            => $device,
                    'timeline'          => current_time( 'timestamp' ),
                    'ip_address'        => azoads_get_client_ip(),
                    'url'               => $ad_url,
                    'referrer'          => $ad_referrer,
                    'user_agent'        => $ad_user_agent,
                ),
                array(
                    '%d',
                    '%d',
                    '%d',
                    '%d',
                    '%d',
                    '%s',
                    '%s',
                    '%s',
                    '%s'
                )
            );
        }
        wp_send_json_success();
    }
}

/**
 * Update Ad Report
 * 
 * @since 1.0.0
 * @return json
 */

add_action( 'wp_ajax_azoads_reports_update_chart', 'azoads_reports_update_chart_function' );
function azoads_reports_update_chart_function() {

    $_wpnonce = isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '';
    $ad = isset( $_POST['ad'] ) ? sanitize_text_field( $_POST['ad'] ) : 0;
    $ad_time = isset( $_POST['time'] ) ? sanitize_text_field( $_POST['time'] ) : '';
    
    if ( $_wpnonce == '' || ! wp_verify_nonce( $_wpnonce, 'azoads-report-ad' ) ) wp_send_json_error( 'Sorry, your nonce did not verify.' );
    
    if ( $ad != '' && $ad_time != '' ) {
        $reports = azoads_get_reports_data( $ad, $ad_time );
        wp_send_json_success( $reports );
    }
}

/**
 * Save Settings from Admin Plugin
 * 
 * @since 1.0.0
 * @return json
 */
add_action( 'wp_ajax_azoads_save_settings', 'azoads_save_settings_function' );
function azoads_save_settings_function() {
    global $azoads_options;

    do_action( 'azoads_admin_before_settings_saved', $_POST['settings'] );

    $_wpnonce = isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '';
    
    if ( $_wpnonce == '' || ! wp_verify_nonce( $_wpnonce, 'azoads-settings-ad' ) ) wp_send_json_error( 'Sorry, your nonce did not verify.' );

    if ( isset( $_POST['settings'] ) && is_array( $_POST['settings'] ) ) {
        foreach ( $_POST['settings'] as $key => $value ) {
            if ( isset( $value['name'] ) && isset( $value['value'] ) ) {
                $azoads_settings[$key]['name'] = sanitize_text_field( $value['name'] );
                $azoads_settings[$key]['value'] = $value['value']; // remove sanitization because of variables array
            }
        }
    }
    else $azoads_settings = array();

    if ( ! empty( $azoads_settings ) ) {

        $settings = array();
        $license_data = azoads_get_setting( 'license' );
        if ( is_object( $license_data ) ) $settings['license'] = $license_data;
        
        foreach ( $azoads_settings as $index => $var ) {
            $settings[$var['name']] = $var['value'];
        }
        $azoads_options['settings'] = $settings;

        // assign settings to plugin branding
        $azoads_options['settings']['brand'] = AZOADS_NAME;

        update_option( 'azoads_options', $azoads_options );

        // processing ads.txt
        if ( isset( $settings['ads_enable'] ) && strlen( $settings['ads_content'] ) > 0 ) {
            $ads_filename = ABSPATH . 'ads.txt';
            if ( $settings['ads_enable'] == 1 ) {
                file_put_contents( $ads_filename, $settings['ads_content'] );
            }
            else {
                if ( file_exists( $ads_filename ) ) {
                    unlink( $ads_filename );
                }
            }
        }

        do_action( 'azoads_admin_after_settings_saved' );
        
        wp_send_json_success( __( 'All settings saved!', 'azo-ads' ) );
    }
    else {
        wp_send_json_error();
    }
}

/**
 * Get latest blog news for Dashboard
 * 
 * @since 1.0.0
 * @return array
 */
add_action( 'wp_ajax_azoads_get_dashboard_news', 'azoads_get_dashboard_news' );
function azoads_get_dashboard_news() {

    $cache_key = 'azoads_dashboard_news';
    $data = get_transient( $cache_key );
    if ( false === $data ) {
        $response = wp_remote_get( AZOADS_NEWS_URL . '/wp-json/wp/v2/posts?_embed&per_page=6' );

        if ( is_wp_error( $response ) ) wp_send_json_success();
        else {
            $data = json_decode( wp_remote_retrieve_body( $response ) );
            set_transient( $cache_key, $data, DAY_IN_SECONDS );
        }
    }
    wp_send_json_success( $data );
}

/**
 * Export Settings to a .json file
 * 
 * @since 1.5.0
 * @return json
 */
add_action( 'wp_ajax_azoads_export_settings', 'azoads_export_settings_function' );
function azoads_export_settings_function() {
    global $azoads_options;
    
    // for download json, we must use GET method to get variables value
    $_wpnonce = isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '';
    
    if ( $_wpnonce == '' || ! wp_verify_nonce( $_wpnonce, 'azoads-settings-ad' ) ) wp_send_json_error( 'Sorry, your nonce did not verify.' );

    if ( isset( $azoads_options['settings'] ) ) {
        unset( $azoads_options['settings']['license'] );
        wp_send_json_success( array( 
                'filename'          => 'azo-ads-settings-' . date( 'Ymd-His', current_time( 'timestamp', 0 ) ) . '.json',
                'content'           => $azoads_options['settings']
            )
        );
    }
    wp_send_json_error();
}

/**
 * Import Settings from a .json file
 * 
 * @since 1.5.0
 * @return json
 */
add_action( 'wp_ajax_azoads_import_settings', 'azoads_import_settings_function' );
function azoads_import_settings_function() {
    global $azoads_options;
    
    $_wpnonce = isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '';
    
    if ( $_wpnonce == '' || ! wp_verify_nonce( $_wpnonce, 'azoads-settings-ad' ) ) wp_send_json_error( 'Sorry, your nonce did not verify.' );

    if ( isset( $_POST['settings'] ) && ! empty( $_POST['settings'] ) ) { // for next needs to check: isset( $_POST['settings']['brand'] ) && $_POST['settings']['brand'] == AZOADS_NAME

        $settings = $_POST['settings'];
        
        // add the license to settings configuration
        if ( isset( $azoads_options['settings']['license'] ) ) {
            $settings['license'] = $azoads_options['settings']['license'];
        }

        // saving the imported settings data
        $azoads_options['settings'] = $settings;

        update_option( 'azoads_options', $azoads_options );

        // processing ads.txt
        if ( isset( $settings['ads_enable'] ) && strlen( $settings['ads_content'] ) > 0 ) {
            $ads_filename = ABSPATH . 'ads.txt';
            if ( $settings['ads_enable'] == 1 ) {
                file_put_contents( $ads_filename, $settings['ads_content'] );
            }
            else {
                if ( file_exists( $ads_filename ) ) {
                    unlink( $ads_filename );
                }
            }
        }

        wp_send_json_success();
    }
    wp_send_json_error();
}