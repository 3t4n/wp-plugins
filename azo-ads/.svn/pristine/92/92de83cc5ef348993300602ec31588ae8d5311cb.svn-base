<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 *  Check the current page is in AZO Ads pages.
 *
 *  @since 1.0.0
 *  @return bool True if is AZO Ads admin page.
 */
function azoads_is_admin_page() {
    $current_page = get_query_var( 'page' );
    if ( ! is_admin() || ! did_action( 'wp_loaded' ) ) {
        return false;
    }
    if ( strpos( 'azo-ads', $current_page ) ) {
        return true;
    }
}

/**
 * Get list of ads position
 * 
 * @since 1.0.0
 * @return array
 */
function azoads_get_list_position() {
    return array(
        'beginning-of-post'             => __( 'Beginning of Post', 'azo-ads' ),
        'middle-of-post'                => __( 'Middle of Post', 'azo-ads' ),
        'end-of-post'                   => __( 'End of Post', 'azo-ads' ),
        'before-image'                  => __( 'Before Image', 'azo-ads' ),
        'after-image'                   => __( 'After Image', 'azo-ads' ),
        'before-the-last-paragraph'     => __( 'Before the last Paragraph', 'azo-ads' ),
        'after-paragraph'               => __( 'After Paragraph', 'azo-ads' ),
        'after-the-more-tag'            => __( 'After the more tag', 'azo-ads' ),
        'before-a-html-tag'             => __( 'Before a HTML Tag', 'azo-ads' ),
        'after-a-html-tag'              => __( 'After a HTML Tag', 'azo-ads' ),
        'after-the-percentage'             => __( 'After the Percentage', 'azo-ads' ),
        'by-the-word-count'             => __( 'By the Word Count', 'azo-ads' ),
        'shortcode'                     => __( 'Shortcode', 'azo-ads' ),
        'sticky-ads'                    => __( 'Sticky Ad', 'azo-ads' ),
        'ads-inbetween-loop'            => __( 'Ads Inbetween Loop', 'azo-ads' ),
    );
}

/**
 * Get list of ads position form
 * 
 * @since 1.0.0
 * @return array
 */
function azoads_get_form_position() {
    $id = azoads_get_param_from_url( 'id' );
    $id = ( $id > 0 ) ? absint( $id ) : 0;
    // define additional form for ads position
    return array(
        'before-image'             => array(
            array(
                'title'             => __( 'Number of image index', 'azo-ads' ),
                'tooltip'           => __( 'Number of image index that you would like start to display the ad', 'azo-ads' ),
                'tt_url'            => '',
                'type'              => 'number',
                'name'              => 'before_image_index',
                'value'             => 1,
                'class'             => 'azo-ads-form-control'
            )
        ),
        'after-image'             => array(
            array(
                'title'             => __( 'Number of image index', 'azo-ads' ),
                'tooltip'           => __( 'Number of image index that you would like start to display the ad', 'azo-ads' ),
                'tt_url'            => '',
                'type'              => 'number',
                'name'              => 'after_image_index',
                'value'             => 1,
                'class'             => 'azo-ads-form-control'
            )
        ),
        'after-paragraph'             => array(
            array(
                'title'             => __( 'Number of paragraphs', 'azo-ads' ),
                'tooltip'           => __( 'Input the number of paragraphs that your ad should appear after', 'azo-ads' ),
                'tt_url'            => '',
                'type'              => 'number',
                'name'              => 'after_paragraph_index',
                'value'             => 1,
                'class'             => 'azo-ads-form-control repeatByTag'
            ),
            array(
                'title'             => __( 'Repeat every <span class="count"></span> paragraph<span class="sop"></span>', 'azo-ads' ),
                'tooltip'           => __( 'Repeat the ad?', 'azo-ads' ),
                'tt_url'            => '',
                'type'              => 'checkbox',
                'name'              => 'repeat_paragraph',
                'value'             => 0,
                'class'             => 'form-check-box'
            ),
        ),
        'before-a-html-tag'             => array(
            array(
                'title'             => __( 'HTML tag name', 'azo-ads' ),
                'tooltip'           => __( 'Choose your HTML tag name', 'azo-ads' ),
                'tt_url'            => '',
                'type'              => 'select',
                'name'              => 'before_html_tag_name',
                'value'             => array(
                    'h1'        => 'H1',
                    'h2'        => 'H2',
                    'h3'        => 'H3',
                    'h4'        => 'H4',
                    'h5'        => 'H5',
                    'h6'        => 'H6',
                    'img'       => 'IMG',
                    'div'       => 'DIV',
                    'p'         => 'P',
                ),
                'class'             => 'azo-ads-dropdown',
                'attribute'         => array(
                    'data-control'          => 'select2',
                    'data-hide-search'      => 'true',
                    'data-placeholder'      => 'Select Option',
                    'data-azo-ads-filter'   => 'Select Option',
                ),
            ),
            array(
                'title'             => __( 'Number of tags', 'azo-ads' ),
                'tooltip'           => __( 'Input the number of tags that your ad should appear before', 'azo-ads' ),
                'tt_url'            => '',
                'type'              => 'number',
                'name'              => 'before_html_tag_index',
                'value'             => 1,
                'class'             => 'azo-ads-form-control repeatByTag'
            ),
            array(
                'title'             => __( 'Repeat every <span class="count"></span> tag<span class="sop"></span>', 'azo-ads' ),
                'tooltip'           => __( 'Repeat the ad?', 'azo-ads' ),
                'tt_url'            => '',
                'type'              => 'checkbox',
                'name'              => 'before_html_tag_repeat',
                'value'             => 0,
                'class'             => 'form-check-box'
            ),
        ),
        'after-a-html-tag'             => array(
            array(
                'title'             => __( 'HTML tag name', 'azo-ads' ),
                'tooltip'           => __( 'Choose your HTML tag name', 'azo-ads' ),
                'tt_url'            => '',
                'type'              => 'select',
                'name'              => 'after_html_tag_name',
                'value'             => array(
                    'h1'        => 'H1',
                    'h2'        => 'H2',
                    'h3'        => 'H3',
                    'h4'        => 'H4',
                    'h5'        => 'H5',
                    'h6'        => 'H6',
                    'img'       => 'IMG',
                    'div'       => 'DIV',
                    'p'         => 'P',
                ),
                'class'             => 'azo-ads-dropdown',
                'attribute'         => array(
                    'data-control'          => 'select2',
                    'data-hide-search'      => 'true',
                    'data-placeholder'      => 'Select Option',
                    'data-azo-ads-filter'   => 'Select Option',
                ),
            ),
            array(
                'title'             => __( 'Number of tags', 'azo-ads' ),
                'tooltip'           => __( 'Input the number of tags that your ad should appear after', 'azo-ads' ),
                'tt_url'            => '',
                'type'              => 'number',
                'name'              => 'after_html_tag_index',
                'value'             => 1,
                'class'             => 'azo-ads-form-control repeatByTag'
            ),
            array(
                'title'             => __( 'Repeat every <span class="count"></span> tag<span class="sop"></span>', 'azo-ads' ),
                'tooltip'           => __( 'Repeat the ad?', 'azo-ads' ),
                'tt_url'            => '',
                'type'              => 'checkbox',
                'name'              => 'after_html_tag_repeat',
                'value'             => 0,
                'class'             => 'form-check-box'
            ),
        ),
        'after-the-percentage'             => array(
            array(
                'title'             => __( 'Number of percentage (1 - 99)', 'azo-ads' ),
                'tooltip'           => __( 'Set the percentage of the content that your ad should appear after', 'azo-ads' ),
                'tt_url'            => '',
                'type'              => 'number',
                'name'              => 'after_the_percentage_amount',
                'value'             => 50,
                'class'             => 'azo-ads-form-control repeatByTag',
                'attribute'         => array(
                    'min'   => 1,
                    'max'   => 99,
                ),
            ),
        ),
        'by-the-word-count'             => array(
            array(
                'title'             => __( 'Number of word count', 'azo-ads' ),
                'tooltip'           => __( 'Set the word count of the content that your ad should appear after', 'azo-ads' ),
                'tt_url'            => '',
                'type'              => 'number',
                'name'              => 'by_the_word_count_amount',
                'value'             => 100,
                'class'             => 'azo-ads-form-control',
            ),
        ),
        'shortcode'             => array(
            array(
                'title'             => __( 'PHP shortcode', 'azo-ads' ),
                'tooltip'           => __( 'Embed PHP shortcode to your theme file to show your ad', 'azo-ads' ),
                'tt_url'            => '',
                'type'              => 'input',
                'name'              => 'shortcode_php',
                'value'             => htmlspecialchars( '<?php echo do_shortcode( \'[azoads id=' . ( ( $id > 0 ) ? $id : __( 'YOUR_ID', 'azo-ads' ) ) . ']\' ); ?>' ),
                'class'             => 'azo-ads-form-control',
                'attribute'         => array(
                    'disabled'          => 'disabled',
                ),
            ),
            array(
                'title'             => __( 'Post content shortcode', 'azo-ads' ),
                'tooltip'           => __( 'Embed this shortcode to your posts or pages to show your ad', 'azo-ads' ),
                'tt_url'            => '',
                'type'              => 'input',
                'name'              => 'shortcode_post',
                'value'             => htmlspecialchars( '[azoads id=' . ( ( $id > 0 ) ? $id : __( 'YOUR_ID', 'azo-ads' ) ) . ']' ),
                'class'             => 'azo-ads-form-control',
                'attribute'         => array(
                    'disabled'          => 'disabled',
                ),
            ),
        ),
        'sticky-ads'             => array(
            array(
                'title'             => __( 'Show close button', 'azo-ads' ),
                'tooltip'           => __( 'Show a close button to allow visitors to close your ad', 'azo-ads' ),
                'tt_url'            => '',
                'type'              => 'checkbox',
                'name'              => 'sticky_ads_close',
                'value'             => 0,
                'class'             => 'form-check-box'
            ),
        ),
    );
}

/**
 * Get list of ads type
 * 
 * @since 1.0.0
 * @return array
 */
function azoads_get_list_type() {
    return array(
        'banner'                => __( 'Banner Ads', 'azo-ads' ),
        'background'            => __( 'Background Ads', 'azo-ads' ),
        'text-html-javascript'  => __( 'Text/HTML/Javascript', 'azo-ads' ),
        'video'                 => __( 'Video Ads', 'azo-ads' ),
        'popup'                 => __( 'Popup Ads', 'azo-ads' ),
        'loop'                  => __( 'Loop Ads', 'azo-ads' ),
        'random'                => __( 'Random Ads', 'azo-ads' ),
        'floating'              => __( 'Floating Ads', 'azo-ads' ),
        'group-insertion'       => __( 'Group Insertion', 'azo-ads' ),
        'carousel'              => __( 'Carousel Ads', 'azo-ads' ),
        'parallax'              => __( 'Parallax Ads', 'azo-ads' ),
        'rotator'               => __( 'Rotator Ads', 'azo-ads' ),
        'half-screen'           => __( 'Half Screen Ads', 'azo-ads' ),
        'skip'                  => __( 'Skip Ads', 'azo-ads' ),
        'parallax-fullscreen'   => __( 'Mobile Parallax Fullscreen Ads', 'azo-ads' ),
        // 'blindness'             => __( 'Blindness Ads', 'azo-ads' ),
        // 'ab-testing'            => __( 'A/B Testing', 'azo-ads' )
    );
}

/**
 * Get list of ads type available for Pro version
 * 
 * @since 1.0.0
 * @return array
 */
function azoads_get_list_type_only_pro() {
    return array( 'popup', 'loop', 'random', 'floating', 'group-insertion', 'carousel', 'parallax', 'rotator', 'half-screen', 'skip', 'parallax-fullscreen' );
}

/**
 * Get list of ads network
 * 
 * @since 1.0.0
 * @return array
 */
function azoads_get_list_network() {
    return array(
        'adsense'               => __( 'Google AdSense', 'azo-ads' ),
        'double-click'          => __( 'Double Click', 'azo-ads' ),
        'infolinks'             => __( 'Infolinks', 'azo-ads' ),
        'medianet'             => __( 'Media.net', 'azo-ads' ),
        'mediavine'             => __( 'Mediavine', 'azo-ads' ),
        'mgid'                  => __( 'MGID', 'azo-ads' ),
        'outbrain'              => __( 'Outbrain', 'azo-ads' ),
        'propeller'             => __( 'Propeller', 'azo-ads' ),
        'taboola'               => __( 'Taboola', 'azo-ads' ),
        'yandex'                => __( 'Yandex', 'azo-ads' ),
    );
}

/**
 * Get list of conditional visibility
 * 
 * @since 1.0.0
 * @return array
 */
function azoads_get_list_visibility() {
    return array(
        'general'           => __( 'General', 'azo-ads' ),
        'page'              => __( 'Page', 'azo-ads' ),
        'page-template'     => __( 'Page Template', 'azo-ads' ),
        'post'              => __( 'Post', 'azo-ads' ),
        'post'              => __( 'Post', 'azo-ads' ),
        'post-category'     => __( 'Post Category', 'azo-ads' ),
        'post-format'       => __( 'Post Format', 'azo-ads' ),
        'post-type'         => __( 'Post Type', 'azo-ads' ),
        'taxonomy'          => __( 'Taxonomy', 'azo-ads' ),
        'tags'              => __( 'Tags', 'azo-ads' ),
        'user-roles'        => __( 'User Roles', 'azo-ads' ),
    );
}

/**
 * Get list of conditional targeting
 * 
 * @since 1.0.0
 * @return array
 */
function azoads_get_list_targeting() {
    return array(
        'browser-language'          => __( 'Browser Language', 'azo-ads' ),
        'browser-width'             => __( 'Browser Width', 'azo-ads' ),
        // 'city'                      => __( 'City', 'azo-ads' ),
        'cookie'                    => __( 'Cookie', 'azo-ads' ),
        // 'country'                   => __( 'Country', 'azo-ads' ),
        'device-type'               => __( 'Device Type', 'azo-ads' ),
        'logged-in'                 => __( 'Logged In', 'azo-ads' ),
        'referring-url'             => __( 'Referring URL', 'azo-ads' ),
        'url-parameter'             => __( 'URL Parameter', 'azo-ads' ),
        'user-agent'                => __( 'User Agent', 'azo-ads' ),
        'user-roles'                => __( 'User Roles', 'azo-ads' )
    );
}

/**
 * Get list of conditional targeting available for Pro version
 * 
 * @since 1.0.0
 * @return array
 */
function azoads_get_list_targeting_only_pro() {
    return array( 'browser-width', 'city', 'country', 'device-type', 'user-agent' );
}

/**
 * Get the list of roles which is accessable to AZO Ads plugin menu
 *
 * @since 1.5.0
 * @return array
 */
function azoads_get_list_role_based_access() {
    $role_based_access = array( 
        'administrator'         => 'Administrator',
        'editor'                => 'Editor',
        'author'                => 'Author',
        'contributor'           => 'Contributor',
    );
    if ( class_exists( 'WPSEO_Options' ) ) {
        $role_based_access['wpseo_manager'] = 'SEO Manager';
        $role_based_access['wpseo_editor'] = 'SEO Editor';
    }

    return $role_based_access;
}

/**
 * Get ID of current ad in admin
 * 
 * @since 1.0.0
 * @return string
 */
function azoads_get_param_from_url( $string ) {
    $param = '';
    $request_uri = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( $_SERVER['REQUEST_URI'] ) : '';
    $admin_url = admin_url( sprintf( basename( $request_uri ) ) );
    $admin_url_component = wp_parse_url( $admin_url );
    parse_str( $admin_url_component['query'], $params );
    if ( isset( $params['page'] ) && strpos( $params['page'], 'azo-ads' ) !== false ) {
        if ( isset( $params[$string] ) ) {
            $param = $params[$string];
        }
    }
    return $param; 
}

/**
 * Get list of ads position
 * 
 * @since 1.2.0
 * @return array
 */
function azoads_get_day() {
    return array(
        'Mon'               => __( 'Monday', 'azo-ads' ),
        'Tue'               => __( 'Tuesday', 'azo-ads' ),
        'Wed'               => __( 'Wednesday', 'azo-ads' ),
        'Thu'               => __( 'Thursday', 'azo-ads' ),
        'Fri'               => __( 'Friday', 'azo-ads' ),
        'Sat'               => __( 'Saturday', 'azo-ads' ),
        'Sun'               => __( 'Sunday', 'azo-ads' ),
    );
}

/**
 * Get single ads detail from post_id
 * 
 * @since 1.0.0
 * @return array
 */
function azoads_get_ads( $post_id ) {
    $aa = array();
    if ( $post_id > 0 ) {
        $aa_args = array(
            'post_type'             => 'azo-ads',
            'p'                     => $post_id
        );
        $aa_query = new WP_Query( $aa_args );
        if ( $aa_query->have_posts() ) {
            while ( $aa_query->have_posts() ) {
                $aa_query->the_post();
    
                $aa['ID'] = get_the_ID();
                $aa['post_title'] = get_the_title();
                $aa['active'] = ( get_post_status() == 'publish' ) ? 1 : 0;
                
                $post_meta = get_post_custom( $aa['ID'] );
                foreach ( $post_meta as $key => $value ) {
                    $aa[$key] = $value[0];
                }
            }
            wp_reset_postdata();
        }
    }
    return $aa;
}

/**
 * Get single ads content
 * 
 * @param numeric $id
 * @global array $azoads_options
 * @since 1.0.0
 * @return string
 */
function azoads_get_ads_content( $id ) {
    global $azoads_options;

    // empty ads so do nothing
    if ( empty( $azoads_options['ads'] ) ) return;

    /**
     * SETTINGS > Ad Disablement: Checking Conditions
     */
    // check if the visitors come from a bot/crawler/spider so disable the ad
    if ( azoads_get_setting( 'ad_hide_crawlers' ) == 1 ) {
        if ( azoads_is_crawler() && ! azoads_is_crawler_from_cache() ) return false;
    }
    // Pro version: disable ad if the current user role is set in settings
    if ( defined( 'AZOADS_PRO_VERSION' ) && ! empty( azoads_get_setting( 'ad_hide_roles' ) ) ) {
        if ( function_exists( 'azoads_pro_settings_ad_visible' ) )
            if ( ! azoads_pro_settings_ad_visible( 'ad_hide_roles' ) ) return;
    }
    // Pro version: hide ad based on the post types
    if ( defined( 'AZOADS_PRO_VERSION' ) && ! empty( azoads_get_setting( 'ad_hide_post_types' ) ) ) {
        if ( function_exists( 'azoads_pro_settings_ad_visible' ) )
            if ( ! azoads_pro_settings_ad_visible( 'ad_hide_post_types' ) ) return;
    }
    // Pro version: Click Fraud Protection
    if ( defined( 'AZOADS_PRO_VERSION' ) && azoads_get_setting( 'cfp_enable' ) == 1 ) {
        if ( function_exists( 'azoads_pro_settings_ad_visible' ) )
            if ( ! azoads_pro_settings_ad_visible( 'cfp_enable' ) ) return;
    }
    
    // now processing to the ad
    $aa = array();
    $content = '';
    foreach ( $azoads_options['ads'] as $item ) {
        if ( $item['aa_id'] == $id ) {
            $aa[$id] = $item;
        }
    }
    
    // get the ad content
    if ( ! empty( $aa ) ) {
        $ads_content = '';
        $extra_ads_content = '';
        switch ( $aa[$id]['aa_type'] ) {
            case 'banner':
                if ( ! empty( $aa[$id]['aa_banner_image'] ) ) {
                    $ads_content = '<img width="' . ( ( $aa[$id]['aa_banner_size_width'] >  0 ) ? esc_attr( $aa[$id]['aa_banner_size_width'] ) : 300 ) . '" height="' . ( ( $aa[$id]['aa_banner_size_height'] >  0 ) ? esc_attr( $aa[$id]['aa_banner_size_height'] ) : 250 ) . '" decoding="async" src="' . esc_url( $aa[$id]['aa_banner_image'] ) . '" alt="' . esc_attr( $aa[$id]['aa_title'] ) . '" style="max-width: 100%; height: auto;">';
                }
                if ( ! empty( $aa[$id]['aa_banner_parallax'] ) && $aa[$id]['aa_banner_parallax'] == 1 ) {
                    $ads_content = '
                    <span class="azo-ads-parallax parallax-' . esc_attr( $id ) . '"></span>
                    <style>
                    .parallax-' . esc_attr( $id ) . ' {
                        background-image: url(' . esc_url( $aa[$id]['aa_banner_image'] ) . ');
                        min-height: ' . ( ( ! empty( $aa[$id]['aa_banner_parallax_height'] ) && $aa[$id]['aa_banner_parallax_height'] >  0 ) ? esc_attr( $aa[$id]['aa_banner_parallax_height'] ) : 300 ) . 'px;
                    }
                    </style>
                    ';
                }
                if ( ! empty( $aa[$id]['aa_banner_url'] ) ) {
                    $ads_content = '<a href="' . esc_url( $aa[$id]['aa_banner_url'] ) . '" rel="nofollow" target="_blank">' . $ads_content . '</a>';
                }
                break;
            case 'background':
                // ad type content: background has been hook into init via azoads_background_ads function
                $ads_content = '';
                break;
            case 'text-html-javascript':
                $ads_content = $aa[$id]['aa_content'];
                break;
            case 'video':
                if ( ! empty( $aa[$id]['aa_video_id'] ) && $aa[$id]['aa_video_id'] > 0 ) {
                    $video_data = wp_get_attachment_metadata( $aa[$id]['aa_video_id'] );
                    $ads_content = '<video style="max-width: 100%;" width="' . ( isset( $aa[$id]['aa_video_width'] ) ? esc_attr( $aa[$id]['aa_video_width'] ) : 360 ) . '" height="auto" controls autoplay loop muted playsinline><source src="' . esc_url( $aa[$id]['aa_video'] ) . '" type="video/' . esc_attr( $video_data['fileformat'] ) . '"></video>';
                    if ( ! empty( $aa[$id]['aa_video_url'] ) && wp_http_validate_url( $aa[$id]['aa_video_url'] ) ) {
                        $ads_content = '<a href="' . esc_url( $aa[$id]['aa_video_url'] ) . '" target="_blank">' . $ads_content . '</a>';
                    }
                }
                
                break;
            case 'adsense':
                // Load Google AdSense Ads
                // Documented in README under Google AdSense
                $adsense_type = $aa[$id]['aa_adsense_type'];
                $adsense_code = '<ins';
                $adsense_attr = array(
                    'class'                         => 'adsbygoogle',
                    'style'                         => ( ( $aa[$id]['aa_adsense_size'] == 'fixed' ) ? 'display:inline-block;width:' . esc_attr( $aa[$id]['aa_adsense_size_width'] ) . 'px;height:' . esc_attr( $aa[$id]['aa_adsense_size_height'] ) . 'px;' : 'display:block;' ),
                    'data-ad-client'                => $aa[$id]['aa_adsense_client_id'],
                    'data-ad-slot'                  => $aa[$id]['aa_adsense_slot_id'],
                    'data-ad-layout'                => $aa[$id]['aa_adsense_type'],
                    'data-ad-format'                => 'auto',
                    'data-full-width-responsive'    => ( ( $aa[$id]['aa_adsense_size'] == 'responsive' ) ? 'true' : 'false' ),
                );
                switch ( $adsense_type ) {
                    case 'in-feed':
                        $adsense_attr['data-ad-layout-key'] = $aa[$id]['aa_adsense_layout_key'];
                        $adsense_attr['data-ad-format'] = 'fluid';
                        $adsense_attr['style'] = 'display:block;min-height:70px;';
                        $adsense_attr['data-full-width-responsive'] = '';
                        break;
                    case 'in-article':
                        $adsense_attr['data-ad-format'] = 'fluid';
                        $adsense_attr['style'] = 'display:block;text-align:center;';
                        $adsense_attr['data-full-width-responsive'] = '';
                        break;
                }
                foreach ( $adsense_attr as $key => $value ) {
                    if ( $value != '' ) $adsense_code .= ' ' . $key . '="' . $value . '"';
                }
                $adsense_code .= '></ins>';

                $adsense_js_param = '';
                if ( $adsense_type == 'auto' ) $adsense_js_param = '
                google_ad_client: "' . $aa[$id]['aa_adsense_client_id'] . '",
                enable_page_level_ads: true
                ';
                $adsense_js = '<script>(adsbygoogle = window.adsbygoogle || []).push({' . $adsense_js_param . '});</script>';
                $ads_content = $adsense_code . $adsense_js;
                break;
            case 'double-click':
                // Load DoubleClick Ads
                // Documented in README under DoubleClick
                $ads_content = '<script>googletag.cmd.push(function(){googletag.display("azoads_dc_' . esc_attr( $aa[$id]['aa_id'] ) . '");});</script>';
                break;
            case 'infolinks':
                // Load InfoLinks Ads
                // Documented in README under InfoLinks
                $ads_content = '<script type="text/javascript">var infolinks_pid = {' . $aa[$id]['aa_infolinks_pid'] . '}; var infolinks_wsid = {' . $aa[$id]['aa_infolinks_wsid'] . '}; var infolinks_adid = {' . $aa[$id]['aa_id'] . '};</script> <script type="text/javascript" src="//resources.infolinks.com/js/infolinks_main.js"></script>';
                break;
            case 'medianet':
                // Load Media.net Ads
                // Documented in README under Media.net
                $ads_content = '
                <script type="text/javascript">
                window._mNHandle = window._mNHandle || {};
                window._mNHandle.queue = window._mNHandle.queue || [];
                medianet_versionId = "3121199";
                </script>
                <script src="//contextual.media.net/dmedianet.js?cid=' . esc_attr( $aa[$id]['aa_medianet_cid'] ) . '" async="async"></script>
                <div id="' . $aa[$id]['aa_medianet_ad_unit_id'] . '">
                    <script type="text/javascript">
                    try {
                        window._mNHandle.queue.push(function () {
                            window._mNDetails.loadTag("' . esc_attr( $aa[$id]['aa_medianet_ad_unit_id'] ) . '", "' . esc_attr( $aa[$id]['aa_medianet_size_width'] ) . 'x' . esc_attr( $aa[$id]['aa_medianet_size_height'] ) . '", "' . esc_attr( $aa[$id]['aa_medianet_ad_unit_id'] ) . '");
                        });
                    }
                    catch (error) {
                    }
                    </script>
                </div>
                ';
                break;
            case 'mediavine':
                // Load Mediavine Ads
                // Documented in README under Mediavine
                $ad_content = '';
                break;
            case 'mgid':
                // Load MGID Ads
                // Documented in README under MGID
                $ads_content = '
                <!-- Composite Start -->
                <div id="' . esc_attr( $aa[$id]['aa_mgid_container'] ) . '"></div>
                <script src="' . esc_url( $aa[$id]['aa_mgid_js_src'] ) . '" async></script>
                <!-- Composite End -->
                ';
                break;
            case 'outbrain':
                $http_host = isset( $_SERVER['HTTP_HOST'] ) ? sanitize_text_field( $_SERVER['HTTP_HOST'] ) : '';
                $request_uri = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( $_SERVER['REQUEST_URI'] ) : '';
                // Load Outbrain Ads
                // Documented in README under Outbrain
                $ads_content = '
                <aside><div class="OUTBRAIN" data-src="' . ( "//" . $http_host . $request_uri ) . '" data-widget-id="' . esc_attr( $aa[$id]['aa_outbrain_widget_id'] ) . '"></div></aside>
                <script type="text/javascript" async="async" src="https://widgets.outbrain.com/outbrain.js"></script>
                ';
                break;
            case 'propeller':
                // Load Propeller Ads
                // Documented in README under Propeller
                $ads_content = '<script type="text/javascript" async="async">' . $aa[$id]['aa_propeller_js'] . '</script>';
                break;
            case 'taboola':
                // Load Taboola Ads
                // Documented in README under Taboola
                $ads_content = '
                <div id="azoads-taboola-' . esc_attr( $aa[$id]['aa_id'] ) . '"></div>
                <script type="text/javascript">
                window._taboola = window._taboola || [];
                _taboola.push({
                    mode:"thumbnails-a", 
                    container:"azoads-taboola-' . esc_attr( $aa[$id]['aa_id'] ) . '", 
                    placement:"AZOAds Taboola ' . esc_attr( $aa[$id]['aa_id'] ) . '", 
                    target_type: "mix"
                });
                </script>
                ';
                break;
            case 'yandex':
                // Load Yandex Ads
                // Documented in README under Yandex
                $ads_content = '
                <div id="azoads-taboola-' . esc_attr( $aa[$id]['aa_yandex_block_id'] ) . '" ></div>
                <script type="text/javascript">
                (function(w, d, n, s, t) {
                    w[n] = w[n] || [];
                    w[n].push(function() {
                        Ya.Context.AdvManager.render({
                            blockId: "' . esc_attr( $aa[$id]['aa_yandex_block_id'] ) . '",
                            renderTo: "azoads-taboola-' . esc_attr( $aa[$id]['aa_yandex_block_id'] ) . '",
                            async: true
                        });
                    });
                    t = d.getElementsByTagName("script")[0];
                    s = d.createElement("script");
                    s.type = "text/javascript";
                    s.src = "//an.yandex.ru/system/context.js";
                    s.async = true;
                    t.parentNode.insertBefore(s, t);
                })(this, this.document, "yandexContextAsyncCallbacks");
                </script>
                ';
                break;
            default:
                if ( ( defined( 'AZOADS_PRO_VERSION' ) && azoads_activated_pro() ) && in_array( $aa[$id]['aa_type'], azoads_get_list_type_only_pro() ) ) {
                    $azoads_pro_content = azoads_pro_get_ads_content( $id );
                    $ads_content = $azoads_pro_content['content'];
                    $aa[$id]['aa_position'] = $azoads_pro_content['position'];
                }
                break;
        }
        
        // empty ad content
        if ( strlen( $ads_content ) == 0 ) return $content;

        // build appearance css
        $appearance_css = '';
        $appearance_arr = array(
            'float'             => 'none',
            'margin'            => ( ( isset( $aa[$id]['aa_margin_top'] ) && ( $aa[$id]['aa_margin_top'] > 0 ) ) ? $aa[$id]['aa_margin_top'] : 0 ) . 'px ' . ( ( isset( $aa[$id]['aa_margin_right'] ) && ( $aa[$id]['aa_margin_right'] > 0 ) ) ? $aa[$id]['aa_margin_right'] : 0 ) . 'px ' . ( ( isset( $aa[$id]['aa_margin_bottom'] ) && ( $aa[$id]['aa_margin_bottom'] > 0 ) ) ? $aa[$id]['aa_margin_bottom'] : 0 ) . 'px ' . ( ( isset( $aa[$id]['aa_margin_left'] ) && ( $aa[$id]['aa_margin_left'] > 0 ) ) ? $aa[$id]['aa_margin_left'] : 0 ) . 'px',
            'padding'           => ( ( isset( $aa[$id]['aa_padding_top'] ) && ( $aa[$id]['aa_padding_top'] > 0 ) ) ? $aa[$id]['aa_padding_top'] : 0 ) . 'px ' . ( ( isset( $aa[$id]['aa_padding_right'] ) && ( $aa[$id]['aa_padding_right'] > 0 ) ) ? $aa[$id]['aa_padding_right'] : 0 ) . 'px ' . ( ( isset( $aa[$id]['aa_padding_bottom'] ) && ( $aa[$id]['aa_padding_bottom'] > 0 ) ) ? $aa[$id]['aa_padding_bottom'] : 0 ) . 'px ' . ( ( isset( $aa[$id]['aa_padding_left'] ) && ( $aa[$id]['aa_padding_left'] > 0 ) ) ? $aa[$id]['aa_padding_left'] : 0 ) . 'px',
        );
        if ( $aa[$id]['aa_align'] == 'center' ) {
            $appearance_arr['float'] = 'none';
            $appearance_arr['text-align'] = 'center';
        }
        else {
            $appearance_arr['float'] = $aa[$id]['aa_align'];
        }
        foreach ( $appearance_arr as $key => $value ) {
            $appearance_css .= $key . ':' . $value . ';';
        }
        
        // build appearance label
        if ( isset( $aa[$id]['aa_label'] ) && $aa[$id]['aa_label'] != '' ) {
            $appearance_label = '<div class="azoads-appearance-label">' . esc_html( $aa[$id]['aa_label'] ) . '</div>';
            if ( $aa[$id]['aa_label_position'] == 'below' ) {
                $ads_content .= '' . $appearance_label;
            }
            else {
                $ads_content = $appearance_label . $ads_content;
            }
        }

        // build extra attribute
        $attribute_arr = array();

        if ( defined( 'AZOADS_PRO_VERSION' ) && azoads_activated_pro() ) {
            $bwa = '';
            $browser_width_attr = azoads_pro_attr_browser_width( $id );
            // print_r($browser_width_attr);exit;
            foreach ( $browser_width_attr as $key => $value ) {
                if ( ! empty(  $value ) ) $bwa .= $key . '="' . implode( ';', $value ) . '" ';
            }
            $bwa = substr( $bwa, 0, -1 );
        }
        
        // show close btn for sticky ads & add an inner
        if ( $aa[$id]['aa_position'] == 'sticky-ads' ) {
            if ( $aa[$id]['aa_sticky_ads_close'] == 1 ) {
                $ads_content = '<div class="azoads-' . esc_attr( $aa[$id]['aa_position'] ) . '-inner">
                ' . $ads_content . '
                <a href="javascript:void(0);" class="azoads-' . esc_attr( $aa[$id]['aa_position'] ) . ' close-btn" title="' . __( 'Close Ad', 'azo-ads' ) . '">' . __( 'Close Ad', 'azo-ads' ) . '</a>
                </div>';
            }
        }

        $content = '
        <!-- BEGIN ' . AZOADS_NAME . ' v' . AZOADS_VERSION . ' -->
        <div class="azoads azoads-' . esc_attr( $aa[$id]['aa_position'] ) . ' azoads-' . esc_attr( $aa[$id]['aa_type'] ) . ' azoads-' . esc_attr( $id ) . '" data-adid="' . esc_attr( $id ) . '" style="' . esc_attr( $appearance_css ) . '"' . ( ( isset( $bwa ) && ! empty( $bwa ) ) ? ' ' . $bwa : '' ) . '>
        ' . $ads_content . '
        ' . $extra_ads_content . '
        </div>
        <!-- // END ' . AZOADS_NAME . ' v' . AZOADS_VERSION . ' -->';
    }
    return $content;
}

/**
 * Get single ads content by shortcode
 * 
 * @param array $atts
 * @since 1.0.0
 * @return string
 */
add_shortcode( 'azoads', 'azoads_add_shortcode' );
function azoads_add_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'id' => 0,
	), $atts, 'azoads' );

	return azoads_get_ads_content( $atts['id'] );
}

/**
 * Adding necessary stuffs to header
 * 
 * @param none
 * @since 1.0.0
 * @return none
 */
function azoads_global_head() {
    global $azoads_options, $azoads_active, $post;

    // empty ads so do nothing
    if ( empty( $azoads_options['ads'] ) ) return;

    $loadAdSenseJS = false;
    foreach ( $azoads_options['ads'] as $key => $value ) {

        if ( isset( $value['aa_id'] ) && ! in_array( $value['aa_id'], $azoads_active ) ) continue;

        if ( isset( $value['aa_type'] ) && $value['aa_type'] == 'text-html-javascript' ) { // load javascript of the ad in header
            if ( isset( $value['aa_content_header'] ) && strlen( $value['aa_content_header'] ) > 0 ) {
                echo $value['aa_content_header'];
            }
        }
        elseif ( isset( $value['aa_type'] ) && $value['aa_type'] == 'adsense' ) {
            $loadAdSenseJS  = true;
        }
        elseif ( isset( $value['aa_type'] ) && $value['aa_type'] == 'double-click' ) {
            // Load DoubleClick Ads
            // Documented in README under DoubleClick
            echo '
            <script async defer src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
            <script>
            window.googletag = window.googletag || {cmd: []};
            googletag.cmd.push(function() {
                googletag.defineSlot(&#039;/' . esc_html( $value['aa_dc_network_code'] ) . '/' . esc_html( $value['aa_dc_unit_name'] ) . '/&#039;, [' . esc_html( $value['aa_dc_size_width'] ) . ', ' . esc_html( $value['aa_dc_size_height'] ) . '], &#039;azoads_dc_' . esc_html( $value['aa_id'] ) . '&#039;).addService(googletag.pubads()); 
                googletag.pubads().enableSingleRequest();
                googletag.enableServices();
            });
            </script>
            ';
        }
        elseif ( isset( $value['aa_type'] ) && $value['aa_type'] == 'mediavine' ) {
            // Load Mediavine Ads
            // Documented in README under Mediavine
            echo '<script type="text/javascript" async="async" data-noptimize="1" data-cfasync="false" src="//scripts.mediavine.com/tags/' . esc_html( $value['aa_mediavine_site_id'] ) . '.js"></script>';
        }
        elseif ( isset( $value['aa_type'] ) && $value['aa_type'] == 'taboola' ) {
            // Load Taboola Ads
            // Documented in README under Taboola
            echo '<script type="text/javascript">window._taboola = window._taboola || [];
            _taboola.push({article:"auto"});
            !function (e, f, u) {
                e.async = 1;
                e.src = u;
                f.parentNode.insertBefore(e, f);
            }(document.createElement("script"), document.getElementsByTagName("script")[0], "//cdn.taboola.com/libtrc/' . esc_html( $value['aa_taboola_publisher_id'] ) . '/loader.js");</script>';
        }
    }

    if ( $loadAdSenseJS ) {
        // Load Google AdSense Ads
        // Documented in README under Google AdSense
        echo '<script async defer src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js" crossorigin="anonymous"></script>';
    }
}

/**
 * Check logic for every visibility
 * 
 * @since 1.0.0
 * @return boolean
 */
function azoads_logic_visibility( $vi ) {
    global $wp_query, $post;
    
    if ( ! is_object( $post ) ) {
        return false;
    }

    $current_user = wp_get_current_user();
    $visibility_type = $vi->type->value;
    $visibility_value = $vi->value->value;
    $logic = false;

    switch ( $visibility_type ) {
        case 'general':
            if ( is_front_page() || is_home() && $visibility_value == 'homepage' ) $logic = true;
            if ( $visibility_value == 'everywhere' ) $logic = true;
            break;
        case 'page':
            $page_id = $wp_query->get_queried_object_id();
            if ( $visibility_value == $page_id ) $logic = true;
            break;
        case 'page-template':
            $object_template = get_queried_object();
            $page_template = get_page_template_slug ($object_template );
            if ( $visibility_value == $page_template ) $logic = true;
        case 'post':
            if ( is_singular() && $visibility_value == $post->ID ) $logic = true;
            break;
        case 'post-category':
            if ( is_object( $post ) ) {
                $categories = get_the_category( $post->ID );
                if ( ! empty( $categories ) ) {
                    $list_cat = array();
                    foreach ( $categories as $category ) {
                        if ( $category->term_id > 0 ) array_push( $list_cat, $category->term_id );
                    }
                    if ( in_array( $visibility_value, $list_cat ) ) $logic = true;
                }
            }
            break;
        case 'post-format':
            $post_format = get_post_format( $post->ID );
            if ( $post_format === false ) $post_format = 'standard';
            if ( $visibility_value == $post_format ) $logic = true;
            break;
        case 'post-type':
            $post_type  = get_post_type( $post->ID );
            if ( is_singular() && $post_type == $visibility_value ) $logic = true;
            break;
        case 'taxonomy':
            if ( $visibility_value != '' ) {
                $post_terms = wp_get_post_terms( $post->ID, $visibility_value );
                if ( $post_terms ) $logic = true;
            }
            break;
        case 'tags':
            if ( has_tag( $visibility_value ) ) $logic = true;
            break;
        case 'user-roles':
            if ( in_array( $visibility_value, $current_user->roles ) ) $logic = true;
            break;
        default:
            $logic = false;
            break;
    }

    return $logic;
}

/**
 * Check logic for every targeting
 * 
 * @since 1.0.0
 * @return boolean
 */
function azoads_logic_targeting( $ti ) {
    global $wp_query, $post;
    
    if ( ! is_object( $post ) ) {
        return false;
    }

    $current_user = wp_get_current_user();
    $targeting_type = $ti->type->value;
    $targeting_value = $ti->value->value;
    $logic = false;

    switch ( $targeting_type ) {
        case 'browser-language':
            $http_lang = isset( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) ? sanitize_text_field( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) : '';
            $browser_language = substr( $http_lang, 0, 2 );
            if ( $browser_language == $targeting_value ) $logic = true;
            break;
        case 'cookie':
            if ( $targeting_value == '' ) {
                $logic = true;
            }
            else {
                $cookie_existed = isset( $_COOKIE[$targeting_value] ) ? true : false;
                $logic = $cookie_existed;
            }
            break;
        case 'device-type':
            require_once AZOADS_BASE_PATH . 'classes/class-azo-ads-mobile-detect.php';
            $AZOAds_MobileDetect = new \AZOAdsDetection\AZOAds_MobileDetect;

            $device_type = 'desktop';
            if ( $AZOAds_MobileDetect->isTablet() ) {
                $device_type = 'tablet';
            }
            if ( $AZOAds_MobileDetect->isMobile() && ! $AZOAds_MobileDetect->isTablet() ) {
                $device_type = 'mobile';
            }
            if ( $targeting_value == $device_type ) $logic = true;
            break;
        case 'logged-in':
            if ( is_user_logged_in() ) $loggedIn = 1;
            else $loggedIn = 0;
            if ( $targeting_value == $loggedIn ) $logic = true;
            break;
        case 'referring-url':
            $referrer = ( isset( $_SERVER['HTTP_REFERER'] ) ) ? sanitize_url( $_SERVER['HTTP_REFERER'] ) : '';
            if ( $targeting_value == $referrer ) $logic = true;
            break;
        case 'url-parameter':
            $parameter = ( isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( $_SERVER['REQUEST_URI'] ) : '' );
            if ( strpos( $parameter, $targeting_value ) !== false ) $logic = true;
            break;
        case 'user-roles':
            global $current_user;
            if ( in_array( $targeting_value, $current_user->roles ) ) $logic = true;
            break;
        default:
            if ( defined( 'AZOADS_PRO_VERSION' ) && azoads_activated_pro() && in_array( $targeting_type, azoads_get_list_targeting_only_pro() ) ) {
                $logic = azoads_pro_logic_targeting( $ti );
            }
            else {
                $logic = false;
            }
            break;
    }

    return $logic;
}

/**
 * Get attribute for Browser Width
 * 
 * @since 1.0.0
 * @return string
 */
function azoads_get_client_ip() {

    $ipaddress = '';
    $http_client_ip = isset( $_SERVER['HTTP_CLIENT_IP'] ) ? sanitize_text_field( $_SERVER['HTTP_CLIENT_IP'] ) : '';
    $http_x_forwarded_for = isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ? sanitize_text_field( $_SERVER['HTTP_X_FORWARDED_FOR'] ) : '';
    $http_x_forwarded = isset( $_SERVER['HTTP_X_FORWARDED'] ) ? sanitize_text_field( $_SERVER['HTTP_X_FORWARDED'] ) : '';
    $http_forwarded_for = isset( $_SERVER['HTTP_FORWARDED_FOR'] ) ? sanitize_text_field( $_SERVER['HTTP_FORWARDED_FOR'] ) : '';
    $http_forwarded = isset( $_SERVER['HTTP_FORWARDED'] ) ? sanitize_text_field( $_SERVER['HTTP_FORWARDED'] ) : '';
    $remote_addr = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( $_SERVER['REMOTE_ADDR'] ) : '';

    if ( $http_client_ip != '' ) $ipaddress = $http_client_ip;
    elseif ( $http_x_forwarded_for != '' ) $ipaddress = $http_x_forwarded_for;
    elseif ( $http_x_forwarded != '' ) $ipaddress = $http_x_forwarded;
    elseif ( $http_forwarded_for != '' ) $ipaddress = $http_forwarded_for;
    elseif ( $http_forwarded != '' ) $ipaddress = $http_forwarded;
    elseif ( $remote_addr != '' ) $ipaddress = $remote_addr;
    else $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

/**
 * Get data for Reports
 * 
 * @param string $ad
 * @param string $time
 * @since 1.0.0
 * @return array
 */
function azoads_get_reports_data( $ad_id, $time ) {
    global $azoads_options, $wpdb;
    
    $sql_condition = '';
    $date = array();
    $reports = array();
    $data = array();

    switch ( $time ) {
        case 'last-7-days':
            for ( $i = 0; $i <= 7; $i ++ ) {
                array_push( $date, wp_date( 'Ymd', strtotime( '-' . ( 7 - $i ) . ' days' ) ) );
            }
            break;
        case 'this-month':
            for( $i = 1; $i <= wp_date( 't' ); $i++ ) {
               $date[] = wp_date( 'Ym' ) . str_pad( $i, 2, '0', STR_PAD_LEFT );
            }
            break;
        case 'last-month':
            for( $i = 1; $i <= wp_date( 'j', strtotime( 'last day of previous month' ) ); $i ++ ) {
               $date[] = wp_date( 'Ym', strtotime( '-1 month' ) ) . $i;
            }
            break;
        case 'this-year':
            for( $i = 1; $i <= 12; $i ++ ) {
               $date[] = wp_date( 'Y' ) . sprintf( '%02d', $i );
            }
            break;
    }
    
    // get report by all or individual ad
    if ( $ad_id != 'all' && $ad_id > 0 ) $sql_condition = 'WHERE post_id = %d';
    else $sql_condition = 'WHERE "all" = %s';

    $result = $wpdb->get_results( 
        $wpdb->prepare( "SELECT ID, post_id, type, device, timeline FROM {$wpdb->prefix}azoads_report {$sql_condition} ORDER BY ID ASC", $ad_id ) 
    );
    
    foreach ( $result as $index => $ad ) {

        if ( $time == 'this-year' ) $ad_time = wp_date( 'Ym', $ad->timeline );
        else $ad_time = wp_date( 'Ymd', $ad->timeline );

        if ( in_array( $ad_time, $date ) ) {
            if ( $ad->type == 1 ) $reports[$ad_time]['impression'] = ( isset( $reports[$ad_time]['impression'] ) ? ( $reports[$ad_time]['impression'] + 1 ) : 1 );
            elseif ( $ad->type == 2 ) $reports[$ad_time]['click'] = ( isset( $reports[$ad_time]['click'] ) ? ( $reports[$ad_time]['click'] + 1 ) : 1 );

            $data['ad'][$ad->post_id][$ad->type][$ad->device] = ( isset( $data['ad'][$ad->post_id][$ad->type][$ad->device] ) ? ( $data['ad'][$ad->post_id][$ad->type][$ad->device] + 1 ) : 1 );
        }
    }

    // fill zero if empty data ad
    $aa_args = array(
        'post_type'             => 'azo-ads',
        'posts_per_page'        => -1,
        'orderby'               => 'ID',
        'order'                 => 'DESC'
    );
    $aa_query = new WP_Query( $aa_args );
    if ( $aa_query->have_posts() ) {
        while ( $aa_query->have_posts() ) {
            $aa_query->the_post();
            
            if ( ! isset( $data['ad'][get_the_ID()] ) ) {
                $data['ad'][get_the_ID()] = array();
            }

            // type: 1: impression, 2: click
            for ( $i = 0; $i < 2; $i ++ ) {
                if ( ! isset( $data['ad'][get_the_ID()][$i + 1] ) ) {
                    $data['ad'][get_the_ID()][$i + 1] = array();
                }

                // device: 1: mobile, 2: tablet, 3: desktop
                $j_count = 0;
                for ( $j = 0; $j < 3; $j ++ ) {
                    if ( ! isset( $data['ad'][get_the_ID()][$i + 1][$j + 1] ) ) {
                        $data['ad'][get_the_ID()][$i + 1][$j + 1] = 0;
                    }
                    $j_count += $data['ad'][get_the_ID()][$i + 1][$j + 1];
                }
                // total amount
                $data['ad'][get_the_ID()][$i + 1][4] = $j_count;
            }
        }
        wp_reset_postdata();
    }

    foreach ( $date as $value ) {
        $data['impression'][] = ( isset( $reports[$value]['impression'] ) ) ? $reports[$value]['impression'] : 0;
        $data['click'][] = ( isset( $reports[$value]['click'] ) ) ? $reports[$value]['click'] : 0;

        if ( $time == 'this-year' ) $data['categories'][] = substr( $value, 0, 4 ) . '-' . substr( $value, 4, 2 );
        else $data['categories'][] = substr( $value, 0, 4 ) . '-' . substr( $value, 4, 2 ) . '-' . substr( $value, 6, 2 );
    }

    return $data;
}

/**
 * Get Settings of Plugin
 * 
 * @since 1.0.0
 * @return any
 */
function azoads_get_setting( $var ) {
    global $azoads_options;
    $setting_value = '';
    if ( isset( $azoads_options['settings'] ) && ! empty( $azoads_options['settings'] ) ) {
        if ( isset( $azoads_options['settings'][$var] ) ) {
            $setting_value = $azoads_options['settings'][$var];
        }
    }
    return $setting_value;
}

/**
 * Check if pro license is valid
 * 
 * @since 1.0.0
 * @return boolean
 */
function azoads_activated_pro() {
    global $azoads_options;

    $license_data = azoads_get_setting( 'license' );
    $license_key = '';
    if ( property_exists( $license_data, 'status' ) ) {
        if ( $license_data->status == 'valid' ) return true;
        else return false;
    }
    return false;
}

/**
 * Check if pro license is valid
 * 
 * @since 1.0.0
 * @return boolean
 */
function azoads_get_dashboard_statistics() {
    global $azoads_options;
    
    $ads_args = array(
        'post_type'         => 'azo-ads',
        'posts_per_page'    => -1,
    );
    $ads_query = new WP_Query( $ads_args );
    $total_ads = ( isset( $azoads_options['ads'] ) ? count( $azoads_options['ads'] ) : 0 );
    return array(
        'total'             => $ads_query->found_posts,
        'active'            => $total_ads,
        'inactive'          => ( $ads_query->found_posts - $total_ads )
    );
}

/**
 * Clear all caching plugin provider
 * 
 * @since 1.3.0
 */
function azoads_clear_all_cache_provider() {
    global $wp_fastest_cache, $kinsta_cache, $file_prefix, $supercachedir;

    // Autoptimize
    if ( class_exists( 'autoptimizeCache' ) ) {
        autoptimizeCache::clearall();
    }
    // Breeze Cache
    elseif ( class_exists( 'Breeze_Admin' ) ) {
        do_action( 'breeze_clear_all_cache' );
    }
    // Cache Enabler
    elseif ( class_exists( 'Cache_Enabler' ) ) {
        Cache_Enabler::clear_total_cache();
    }
    // GoDaddy Cache
    elseif ( class_exists( '\WPaaS\Cache' ) ) {
        ccfm_godaddy_purge();
    }
    // Kinsta Cache
    elseif ( class_exists( '\Kinsta\Cache' ) && ! empty( $kinsta_cache ) ) {
        $kinsta_cache->kinsta_cache_purge->purge_complete_caches();
    }
    // LiteSpeed Cache
    elseif ( defined( 'LSCWP_V' ) ) {
        do_action( 'litespeed_purge_all' );
    }
    // SiteGround SuperCacher
    elseif ( function_exists( 'sg_cachepress_purge_cache' ) ) {
        sg_cachepress_purge_cache();
    }
    // WP Fastest Cache
    elseif ( method_exists( 'WpFastestCache', 'deleteCache' ) && ! empty( $wp_fastest_cache ) ) {
        $wp_fastest_cache->deleteCache( true );
    }
    // WP Optimize Cache
    elseif ( class_exists( 'WP_Optimize' ) && defined( 'WPO_PLUGIN_MAIN_PATH' ) ) {
        if ( ! class_exists( 'WP_Optimize_Cache_Commands' ) ) {
            include_once( WPO_PLUGIN_MAIN_PATH . 'cache/class-cache-commands.php' );
        }
        if ( class_exists( 'WP_Optimize_Cache_Commands' ) ) {
            $wpoptimize_cache_commands = new WP_Optimize_Cache_Commands();
            $wpoptimize_cache_commands->purge_page_cache();
        }
    }
    // WP Rocket
    elseif ( function_exists( 'rocket_clean_domain' ) ) {
        rocket_clean_domain();
        if ( function_exists( 'rocket_clean_minify' ) ) {
            rocket_clean_minify();
        }
    }
    // WP Super Cache
    elseif ( function_exists( 'wp_cache_clean_cache' ) ) {
        if ( empty( $supercachedir ) && function_exists( 'get_supercache_dir' ) ) {
            $supercachedir = get_supercache_dir();
        }
        wp_cache_clean_cache( $file_prefix );
    }
    // W3 Total Cache
    elseif ( function_exists( 'w3tc_pgcache_flush' ) ) { 
        w3tc_pgcache_flush(); 
    }
    // WPEngine Cache
    elseif ( class_exists( 'WpeCommon' ) ) {
        if ( method_exists( 'WpeCommon', 'purge_memcached' ) ) {
            WpeCommon::purge_memcached();
        }
        if ( method_exists( 'WpeCommon', 'clear_maxcdn_cache' ) ) {  
            WpeCommon::clear_maxcdn_cache();
        }
        if ( method_exists( 'WpeCommon', 'purge_varnish_cache' ) ) {
            WpeCommon::purge_varnish_cache();   
        }
    }

    // Elementor & Premium Addons (for CSS Cache)
    if ( did_action( 'elementor/loaded' ) ) {
        $elementor_inst = \Elementor\Plugin::instance();
        if ( ! empty( $elementor_inst ) && ! empty( $elementor_inst->files_manager ) ) {
            $elementor_inst->files_manager->clear_cache();
        }
    }
}

/**
 * Check if the visitors are robots, crawlers and spiders
 * 
 * @since 1.4.0
 * @return boolean
 */
function azoads_is_crawler() {

    if ( ! isset( $_SERVER['HTTP_USER_AGENT'] ) || empty( $_SERVER['HTTP_USER_AGENT'] ) ) return true;
    
    // define bots/crawlers/spiders pattern
    $brands = array( 'Googlebot', 'Googlebot-Mobile', 'Googlebot-Image', 'Googlebot-News', 'Googlebot-Video', 'AdsBot-Google([^-]|$)', 'AdsBot-Google-Mobile', 'Feedfetcher-Google', 'Mediapartners-Google', 'Mediapartners (Googlebot)', 'APIs-Google', 'Google-InspectionTool', 'Storebot-Google', 'GoogleOther', 'bingbot', 'Slurp', '[wW]get', 'LinkedInBot', 'Python-urllib', 'python-requests', 'aiohttp', 'httpx', 'libwww-perl', 'httpunit', 'Nutch', 'Go-http-client', 'phpcrawl', 'msnbot', 'jyxobot', 'FAST-WebCrawler', 'FAST Enterprise Crawler', 'BIGLOTRON', 'Teoma', 'convera', 'seekbot', 'Gigabot', 'Gigablast', 'exabot', 'ia_archiver', 'GingerCrawler', 'webmon ', 'HTTrack', 'grub.org', 'UsineNouvelleCrawler', 'antibot', 'netresearchserver', 'speedy', 'fluffy', 'findlink', 'msrbot', 'panscient', 'yacybot', 'AISearchBot', 'ips-agent', 'tagoobot', 'MJ12bot', 'woriobot', 'yanga', 'buzzbot', 'mlbot', 'yandex.combots', 'purebot', 'Linguee Bot', 'CyberPatrol', 'voilabot', 'Baiduspider', 'citeseerxbot', 'spbot', 'twengabot', 'postrank', 'Turnitin', 'scribdbot', 'page2rss', 'sitebot', 'linkdex', 'Adidxbot', 'ezooms', 'dotbot', 'Mail.RU_Bot', 'discobot', 'heritrix', 'findthatfile', 'europarchive.org', 'NerdByNature.Bot', '(sistrix|SISTRIX) [cC]rawler', 'Ahrefs(Bot|SiteAudit)', 'fuelbot', 'CrunchBot', 'IndeedBot', 'mappydata', 'woobot', 'ZoominfoBot', 'PrivacyAwareBot', 'Multiviewbot', 'SWIMGBot', 'Grobbot', 'eright', 'Apercite', 'semanticbot', 'Aboundex', 'domaincrawler', 'wbsearchbot', 'summify', 'CCBot', 'edisterbot', 'SeznamBot', 'ec2linkfinder', 'gslfbot', 'aiHitBot', 'intelium_bot', 'facebookexternalhit', 'Yeti', 'RetrevoPageAnalyzer', 'lb-spider', 'Sogou', 'lssbot', 'careerbot', 'wotbox', 'wocbot', 'ichiro', 'DuckDuckBot', 'lssrocketcrawler', 'drupact', 'webcompanycrawler', 'acoonbot', 'openindexspider', 'gnam gnam spider', 'web-archive-net.com.bot', 'backlinkcrawler', 'coccoc', 'integromedb', 'content crawler spider', 'toplistbot', 'it2media-domain-crawler', 'ip-web-crawler.com', 'siteexplorer.info', 'elisabot', 'proximic', 'changedetection', 'arabot', 'WeSEE:Search', 'niki-bot', 'CrystalSemanticsBot', 'rogerbot', '360Spider', 'psbot', 'InterfaxScanBot', 'CC Metadata Scaper', 'g00g1e.net', 'GrapeshotCrawler', 'urlappendbot', 'brainobot', 'fr-crawler', 'binlar', 'SimpleCrawler', 'Twitterbot', 'cXensebot', 'smtbot', 'bnf.fr_bot', 'A6-Indexer', 'ADmantX', 'Facebot', 'OrangeBot', 'memorybot', 'AdvBot', 'MegaIndex', 'SemanticScholarBot', 'ltx71', 'nerdybot', 'xovibot', 'BUbiNG', 'Qwantify', 'archive.org_bot', 'Applebot', 'TweetmemeBot', 'crawler4j', 'findxbot', 'S[eE][mM]rushBot', 'yoozBot', 'lipperhey', 'Y!J', 'Domain Re-Animator Bot', 'AddThis', 'Screaming Frog SEO Spider', 'MetaURI', 'Scrapy', 'Livelap[bB]ot', 'OpenHoseBot', 'CapsuleChecker', 'collection@infegy.com', 'IstellaBot', 'DeuSu', 'betaBot', 'Cliqzbot', 'MojeekBot', 'netEstate NE Crawler', 'SafeSearch microdata crawler', 'Gluten Free Crawler', 'Sonic', 'Sysomos', 'Trove', 'deadlinkchecker', 'Slack-ImgProxy', 'Embedly', 'RankActiveLinkBot', 'iskanie', 'SafeDNSBot', 'SkypeUriPreview', 'Veoozbot', 'Slackbot', 'redditbot', 'datagnionbot', 'Google-Adwords-Instant', 'adbeat_bot', 'WhatsApp', 'contxbot', 'pinterest.combot', 'electricmonk', 'GarlikCrawler', 'BingPreview', 'vebidoobot', 'FemtosearchBot', 'Yahoo Link Preview', 'MetaJobBot', 'DomainStatsBot', 'mindUpBot', 'Daum', 'Jugendschutzprogramm-Crawler', 'Xenu Link Sleuth', 'Pcore-HTTP', 'moatbot', 'KosmioBot', '[pP]ingdom', 'AppInsights', 'PhantomJS', 'Gowikibot', 'PiplBot', 'Discordbot', 'TelegramBot', 'Jetslide', 'newsharecounts', 'James BOT', 'Bark[rR]owler', 'TinEye', 'SocialRankIOBot', 'trendictionbot', 'Ocarinabot', 'epicbot', 'Primalbot', 'DuckDuckGo-Favicons-Bot', 'GnowitNewsbot', 'Leikibot', 'LinkArchiver', 'YaK', 'PaperLiBot', 'Digg Deeper', 'dcrawl', 'Snacktory', 'AndersPinkBot', 'Fyrebot', 'EveryoneSocialBot', 'Mediatoolkitbot', 'Luminator-robots', 'ExtLinksBot', 'SurveyBot', 'NING', 'okhttp', 'Nuzzel', 'omgili', 'PocketParser', 'YisouSpider', 'um-LN', 'ToutiaoSpider', 'MuckRack', "Jamie's Spider", 'AHC', 'NetcraftSurveyAgent', 'Laserlikebot', '^Apache-HttpClient', 'AppEngine-Google', 'Jetty', 'Upflow', 'Thinklab', 'Traackr.com', 'Twurly', 'Mastodon', 'http_get', 'DnyzBot', 'botify', '007ac9 Crawler', 'BehloolBot', 'BrandVerity', 'check_http', 'BDCbot', 'ZumBot', 'EZID', 'ICC-Crawler', 'ArchiveBot', '^LCC ', 'filterdb.iss.netcrawler', 'BLP_bbot', 'BomboraBot', 'Buck', 'Companybook-Crawler', 'Genieo', 'magpie-crawler', 'MeltwaterNews', 'Moreover', 'newspaper', 'ScoutJet', '(^| )sentry', 'StorygizeBot', 'UptimeRobot', 'OutclicksBot', 'seoscanners', 'Hatena', 'Google Web Preview', 'MauiBot', 'AlphaBot', 'SBL-BOT', 'IAS crawler', 'adscanner', 'Netvibes', 'acapbot', 'Baidu-YunGuanCe', 'bitlybot', 'blogmuraBot', 'Bot.AraTurka.com', 'bot-pge.chlooe.com', 'BoxcarBot', 'BTWebClient', 'ContextAd Bot', 'Digincore bot', 'Disqus', 'Feedly', 'Fetch', 'Fever', 'Flamingo_SearchEngine', 'FlipboardProxy', 'g2reader-bot', 'G2 Web Services', 'imrbot', 'K7MLWCBot', 'Kemvibot', 'Landau-Media-Spider', 'linkapediabot', 'vkShare', 'Siteimprove.com', 'BLEXBot', 'DareBoost', 'ZuperlistBot', 'Miniflux', 'Feedspot', 'Diffbot', 'SEOkicks', 'tracemyfile', 'Nimbostratus-Bot', 'zgrab', 'PR-CY.RU', 'AdsTxtCrawler', 'Datafeedwatch', 'Zabbix', 'TangibleeBot', 'google-xrawler', 'axios', 'Amazon CloudFront', 'Pulsepoint', 'CloudFlare-AlwaysOnline', 'Google-Structured-Data-Testing-Tool', 'WordupInfoSearch', 'WebDataStats', 'HttpUrlConnection', 'ZoomBot', 'VelenPublicWebCrawler', 'MoodleBot', 'jpg-newsbot', 'outbrain', 'W3C_Validator', 'Validator.nu', 'W3C-checklink', 'W3C-mobileOK', 'W3C_I18n-Checker', 'FeedValidator', 'W3C_CSS_Validator', 'W3C_Unicorn', 'Google-PhysicalWeb', 'Blackboard', 'ICBot', 'BazQux', 'Twingly', 'Rivva', 'Experibot', 'awesomecrawler', 'Dataprovider.com', 'GroupHigh', 'theoldreader.com', 'AnyEvent', 'Uptimebot.org', 'Nmap Scripting Engine', '2ip.ru', 'Clickagy', 'Caliperbot', 'MBCrawler', 'online-webceo-bot', 'B2B Bot', 'AddSearchBot', 'Google Favicon', 'HubSpot', 'Chrome-Lighthouse', 'HeadlessChrome', 'CheckMarkNetwork', 'www.uptime.com', 'Streamline3Bot', 'serpstatbot', 'MixnodeCache', '^curl', 'SimpleScraper', 'RSSingBot', 'Jooblebot', 'fedoraplanet', 'Friendica', 'NextCloud', 'Tiny Tiny RSS', 'RegionStuttgartBot', 'Bytespider', 'Datanyze', 'Google-Site-Verification', 'TrendsmapResolver', 'tweetedtimes', 'NTENTbot', 'Gwene', 'SimplePie', 'SearchAtlas', 'Superfeedr', 'feedbot', 'UT-Dorkbot', 'Amazonbot', 'SerendeputyBot', 'Eyeotabot', 'officestorebot', 'Neticle Crawler', 'SurdotlyBot', 'LinkisBot', 'AwarioSmartBot', 'AwarioRssBot', 'RyteBot', 'FreeWebMonitoring SiteChecker', 'AspiegelBot', 'NAVER Blog Rssbot', 'zenback bot', 'SentiBot', 'Domains Project', 'Pandalytics', 'VKRobot', 'bidswitchbot', 'tigerbot', 'NIXStatsbot', 'Atom Feed Robot', '[Cc]urebot', 'PagePeeker', 'Vigil', 'rssbot', 'startmebot', 'JobboerseBot', 'seewithkids', 'NINJA bot', 'Cutbot', 'BublupBot', 'BrandONbot', 'RidderBot', 'Taboolabot', 'Dubbotbot', 'FindITAnswersbot', 'infoobot', 'Refindbot', 'BlogTrafficd.d+ Feed-Fetcher', 'SeobilityBot', 'Cincraw', 'Dragonbot', 'VoluumDSP-content-bot', 'FreshRSS', 'BitBot', '^PHP-Curl-Class', 'Google-Certificates-Bridge', 'centurybot', 'Viber', 'e.ventures Investment Crawler', 'evc-batch', 'PetalBot', 'virustotal', '(^| )PTST', 'minicrawler', 'Cookiebot', 'trovitBot', 'seostar.co', 'IonCrawl', 'Uptime-Kuma', 'Seekport', 'FreshpingBot', 'Feedbin', 'CriteoBot', 'Snap URL Preview Service', 'Better Uptime Bot', 'RuxitSynthetic', 'Google-Read-Aloud', 'ValveSteam', 'OdklBot', 'GPTBot', 'ChatGPT-User', 'YandexRenderResourcesBot', 'LightspeedSystemsCrawler', 'ev-crawler', 'BitSightBot', 'woorankreview', 'Google-Safety', 'AwarioBot', 'DataForSeoBot', 'Linespider', 'WellKnownBot', 'A Patent Crawler', 'StractBot', 'search.marginalia.nu', 'YouBot', 'Nicecrawler', 'Neevabot', 'BrightEdge Crawler', 'SiteCheckerBotCrawler', 'TombaPublicWebCrawler', 'CrawlyProjectCrawler', 'KomodiaBot', 'KStandBot', 'CISPA Webcrawler', 'MTRobot', 'hyscore.io', 'AlexandriaOrgBot', '2ip bot', 'Yellowbrandprotectionbot', 'SEOlizer', 'vuhuvBot', 'INETDEX-BOT', 'Synapse', 't3versionsBot', 'deepnoc', 'Cocolyzebot', 'hypestat', 'ReverseEngineeringBot', 'sempi.tech', 'Iframely', 'MetaInspector', 'node-fetch', 'lkxscan', 'python-opengraph', 'OpenGraphCheck', 'developers.google.com+websnippet', 'SenutoBot', 'MaCoCu', 'NewsBlur', 'inoreader', 'NetSystemsResearch', 'PageThing', 'WordPress', 'PhxBot', 'ImagesiftBot', 'Expanse', 'InternetMeasurement', '^BW', 'GeedoBot', 'Audisto Crawler', 'PerplexityBot', '[cC]laude[bB]ot', 'Monsidobot', 'GroupMeBot', 'Vercelbot', 'vercel-screenshot' );
    $machine = implode( '|', $brands );
    $machine = preg_replace( '/(.*?)(?<!\\\)' . preg_quote( '/', '/' ) . '(.*?)/', '$1\\/$2', $machine );

    return preg_match( sprintf( '/%s/i', $machine ), wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) );
}

/**
 * Check if the visitors come from a cache provider (supports LiteSpeed Cache, WP Rocket, WP Super Cache). We should pass these cache providers.
 *
 * @since 1.4.0
 * @return boolean
 */
function azoads_is_crawler_from_cache() {

    if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && $_SERVER['HTTP_USER_AGENT'] !== '' ) {

        $user_agent = sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) );

        // LiteSpeed Cache user agent: lscache_runner, lscache_walker
        if ( strpos( $user_agent, 'lscache_' ) !== false ) return true;

        // WP Rocket
        if ( strpos( $user_agent, 'wprocketbot' ) !== false ) return true;

        // WP Super Cache
        $wp_user_agent = apply_filters( 'http_headers_useragent', 'WordPress/' . get_bloginfo( 'version' ) . '; ' . get_bloginfo( 'url' ) );
        if ( $wp_user_agent === $user_agent ) return true;

    }

    return false;
}