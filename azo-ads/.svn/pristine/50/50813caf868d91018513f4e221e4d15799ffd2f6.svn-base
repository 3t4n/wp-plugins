<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// HOOK & FILTER
// re-create azoads_options when save/delete ads
add_action( 'save_post', 'azoads_update_options', 10, 3 );
add_action( 'after_delete_post', 'azoads_update_options_delete', 10, 2 );

add_filter( 'the_content', 'azoads_render_ads', 100 );
add_action( 'init', 'azoads_background_ads' );
add_action( 'the_post', 'azoads_loop_ads', 10, 2 );

add_action( 'wp_head',  'azoads_global_head' );

add_action( 'wp_footer', 'azoads_global_footer', 100 );

add_filter( 'plugin_action_links', 'azoads_action_links', 10, 2 );

/**
 * Plugin action links
 *
 * @since 1.6.0
 * @param array $links
 * @param string $file
 * @return array $links
 */
function azoads_action_links( $links, $file ) {
    // only adding action links when plugin activated
    if ( ! in_array( $file, apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) return $links;

    $azoads_action_links = '<a href="' . admin_url( 'admin.php?page=azo-ads-settings' ) . '">' . esc_html__( 'Settings', 'azo-ads' ) . '</a> | <a href="https://ads.azonow.com/documentation/">' . esc_html__( 'Documentation', 'azo-ads' ) . '</a> | <a href="https://my.azonow.com/support/">' . esc_html__( 'Support', 'azo-ads' ) . '</a>';

    if ( $file != 'azo-ads-pro/azo-ads-pro.php' ) {
        $azoads_action_links .= ' | <a href="https://my.azonow.com/shop/azo-ads-pro/">' . esc_html__( 'Pro Version', 'azo-ads' ) . '</a>';
    }

	if ( $file == 'azo-ads/azo-ads.php' || $file == 'azo-ads-pro/azo-ads-pro.php' ) {
        array_unshift( $links, $azoads_action_links );
    }
	return $links;
}

/**
 * Adding custom stuff to footer theme
 */
function azoads_global_footer() {
    global $azoads_options, $azoads_active;

    // implement azo-ads-nonce in front-end
    if ( ! empty( $azoads_active ) && count( $azoads_active ) > 0 ) {
        echo '
        <form class="azo-ads-footer-form">
            ' . wp_kses( wp_nonce_field( 'azoads-front-end', '_azoadsnonce', true, false ), array( 'input' => array( 'type' => array(), 'id' => array(), 'name' => array(), 'value' => array() ) ) ) . '
        </form>
        ';
    }
    
    if ( ! empty( $azoads_options['ads'] ) ) {
        foreach ( $azoads_options['ads'] as $key => $value ) {
            if ( isset( $value['aa_id'] ) && ! in_array( $value['aa_id'], $azoads_active ) ) continue;
            if ( isset( $value['aa_type'] ) && $value['aa_type'] == 'text-html-javascript' ) { // load javascript of the ad in footer
                if ( isset( $value['aa_content_footer'] ) && strlen( $value['aa_content_footer'] ) > 0 ) {
                    echo $value['aa_content_footer'];
                }
            }
        }
    }

    // ad blocker detector
    if ( azoads_get_setting( 'ab_detector' ) == 1 ) {
        $ab_detector_title = ( azoads_get_setting( 'ab_detector_title' ) != '' ) ? azoads_get_setting( 'ab_detector_title' ) : __( 'Ad Blocker Detector', 'azo-ads' );
        $ab_detector_content = ( azoads_get_setting( 'ab_detector_content' ) != '' ) ? azoads_get_setting( 'ab_detector_content' ) : __( 'Please consider to disable Ad Blocker to able to access the website. Thank you!', 'azo-ads' );
        ?>
        <script type="text/javascript">
        ( function ( $ ) {
            // function called if AdBlock is detected
            function adBlockDetected() {
                $( 'body' ).css( 'overflow', 'hidden' );
                $( 'body' ).append( '<div class="azoads-ab-detected"><div class="azoads-ab-detected-overlay"></div><div class="azoads-ab-detected-inner"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V240c0 8.8-7.2 16-16 16s-16-7.2-16-16V64c0-17.7-14.3-32-32-32s-32 14.3-32 32V336c0 1.5 0 3.1 .1 4.6L67.6 283c-16-15.2-41.3-14.6-56.6 1.4s-14.6 41.3 1.4 56.6L124.8 448c43.1 41.1 100.4 64 160 64H304c97.2 0 176-78.8 176-176V128c0-17.7-14.3-32-32-32s-32 14.3-32 32V240c0 8.8-7.2 16-16 16s-16-7.2-16-16V64c0-17.7-14.3-32-32-32s-32 14.3-32 32V240c0 8.8-7.2 16-16 16s-16-7.2-16-16V32z"/></svg><h3><?php echo esc_html( $ab_detector_title ); ?></h3><div class="ab-detector-content"><?php echo esc_html( $ab_detector_content ); ?></div></div></div>' )
            }
            if ( typeof blockAdBlock === 'undefined' ) adBlockDetected();
            else blockAdBlock.onDetected(adBlockDetected);
        } )( jQuery );
        </script>
        <style>
        /* Ad Blocker Detector */
        .azoads-ab-detected {
            position: fixed;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            z-index: 9999;
        }
        .azoads-ab-detected-overlay {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9998;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(15px);
        }
        .azoads-ab-detected-inner {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 500px;
            background: #d91717;
            color: #FFF;
            margin: 1rem;
            padding: 2rem 1rem;
            border-radius: .25rem;
            z-index: 9999;
        }
        .azoads-ab-detected-inner h3 {
            margin: 0 0 10px;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .azoads-ab-detected-inner svg {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
            fill: #FFF;
        }
        .ab-detector-content {
            text-align: center;
        }
        </style>
        <?php
    }
}

/**
 * Render ads
 * 
 * @global array $azoads_options
 * @return string html
 */
function azoads_render_ads( $content ) {
    global $azoads_options, $azoads_active;
    $mixed_content = $content;

    // do not process in admin interface page
    if ( is_admin() ) return $content;
    
    // empty ads so do nothing
    if ( empty( $azoads_options['ads'] ) || empty( $azoads_active ) ) return $content;

    foreach ( $azoads_options['ads'] as $aa ) {

        // check if the current ad is not inside active ads
        if ( isset( $aa['aa_id'] ) && ! in_array( $aa['aa_id'], $azoads_active ) ) continue;

        // check if the current ad is expired
        if ( isset( $aa['aa_expire_datetime'] ) && ( strtotime( $aa['aa_expire_datetime'] ) > 0 ) && ( strtotime( $aa['aa_expire_datetime'] ) < current_time( 'timestamp' ) ) ) continue;

        // Pro version: check if current ad is in days range
        if ( defined( 'AZOADS_PRO_VERSION' ) && azoads_activated_pro() && isset( $aa['aa_show_by_days'] ) && strlen( $aa['aa_show_by_days'] ) > 0 ) {
            if ( function_exists( 'azoads_pro_logic_visible' ) )
                if ( ! azoads_pro_logic_visible( $aa, 'show_by_days' ) ) continue;
        }

        // check position & get ads content
        $ads_content = azoads_get_ads_content( $aa['aa_id'] );

        // set fixed position for some ad type case
        if ( $aa['aa_type'] == 'popup' ) $aa['aa_position'] = 'end-of-post';
        elseif ( in_array( $aa['aa_type'], array( 'half-screen', 'skip' ) ) ) $aa['aa_position'] = 'end-of-post';

        switch ( $aa['aa_position'] ) {
            case 'beginning-of-post':
                $mixed_content = $ads_content . $content;
                break;
            case 'middle-of-post':
                $close_p = '</p>';
                $p_arr = explode( $close_p, $content );
                $paragraph_id     = floor( ( count( $p_arr ) / 2 ) );
                foreach ($p_arr as $index => $paragraph) {
                    if ( trim( $paragraph ) ) {
                        $p_arr[$index] .= $close_p;
                    }
                    if ( $paragraph_id == $index + 1 ) {
                        $p_arr[$index] .= $ads_content;
                    }
                }
                $mixed_content = implode( '', $p_arr ); 
            
                break;
            case 'end-of-post':
                $mixed_content = $content . $ads_content;
                break;
            case 'before-image':
                // replace uppercase tags to lower
                $uc_tags = array( '<A ', '</A>', '<IMG', '<FIGURE ' );
                $lc_tags = array( '<a ', '</a>', '<img', '<figure ' );
                $content = str_replace( $uc_tags, $lc_tags, $content );
                $image_position = ( isset( $aa['aa_before_image_index'] ) && $aa['aa_before_image_index'] > 0 ) ? $aa['aa_before_image_index'] : 1;
                // find all images in content
                $images_arr = explode( $lc_tags[2], $content );
                if ( count( $images_arr ) > $image_position ) {

                    $figure_open = explode( '<figure ', $images_arr[$image_position - 1] );
                    if ( count( $figure_open ) > 1 ) {
                        $figure_open[count( $figure_open ) - 2] .= $ads_content;
                        $images_arr[$image_position - 1] = implode( '<figure ', $figure_open );
                    }
                    else {
                        $anchor_open = explode( '<a ', $images_arr[$image_position - 1] );
                        if ( count( $anchor_open ) > 1 ) {
                            // the image got anchor tag outside
                            if ( strpos( $anchor_open[count( $anchor_open ) - 1], $lc_tags[1] ) === FALSE ) {
                                $anchor_open[count( $anchor_open ) - 2] .= $ads_content;
                                $images_arr[$image_position - 1] = implode( '<a ', $anchor_open );
                            }
                            else { // the image has no anchor tag outside
                                $images_arr[$image_position - 1] = $images_arr[$image_position - 1] . $ads_content;
                            }
                        }
                        else {
                            $images_arr[$image_position - 1] = $images_arr[$image_position - 1] . $ads_content;
                        }
                    }
                    
                    $content = implode( $lc_tags[2], $images_arr );
                    $mixed_content = $content;
                }
                break;
            case 'after-image':
                // replace uppercase tags to lower
                $uc_tags = array( '<A ', '</A>', '<IMG', '<FIGCAPTION ', '</FIGCAPTION>', '[CAPTION ', '[/CAPTION]' );
                $lc_tags = array( '<a ', '</a>', '<img', '<figcaption ', '</figcaption>', '[caption ', '[/caption]' );
                $content = str_replace( $uc_tags, $lc_tags, $content );
                $image_position = ( isset( $aa['aa_after_image_index'] ) && $aa['aa_after_image_index'] > 0 ) ? $aa['aa_after_image_index'] : 1;
                // find all images in content
                $images_arr = explode( $lc_tags[2], $content );
                if ( count( $images_arr ) > $image_position ) {
                    $figcaption_close = explode( $lc_tags[4], $images_arr[$image_position] );
                    $caption_close = explode( $lc_tags[6], $images_arr[$image_position] );
                    if ( count( $figcaption_close ) > 1 ) {
                        // the image got figcaption tag next to
                        $figcaption_close[1] = $ads_content . $figcaption_close[1];
                        $images_arr[$image_position] = implode( $lc_tags[4], $figcaption_close );
                    }
                    elseif ( count( $caption_close ) > 1 ) {
                        // the image got caption tag next to
                            $caption_close[1] = $ads_content . $caption_close[1];
                            $images_arr[$image_position] = implode( $lc_tags[6], $caption_close );
                    }
                    else {
                        $end_image_tag = explode( '>', $images_arr[$image_position] );
                        if ( count( $end_image_tag ) > 1 ) {
                            $end_image_tag[1] = $ads_content . $end_image_tag[1];
                            $images_arr[$image_position] = implode( '>', $end_image_tag );
                        }
                    }
                    
                    $content = implode( $lc_tags[2], $images_arr );
                    $mixed_content = $content;
                }
                break;
            case 'before-the-last-paragraph':
                $close_p = '</p>';
                $paragraphs = explode( $close_p, $content );
                if ( count( $paragraphs ) > 1 ) {
                    $paragraphs[count( $paragraphs ) - 2] = $ads_content . $paragraphs[count( $paragraphs ) - 2];

                    $content = implode( $close_p, $paragraphs );
                    $mixed_content = $content;
                }
                break;
            case 'after-paragraph':
                $close_p = '</p>';
                $p_position = ( isset( $aa['aa_after_paragraph_index'] ) && $aa['aa_after_paragraph_index'] > 0 ) ? $aa['aa_after_paragraph_index'] : 1;
                $p_repeat = ( isset( $aa['aa_repeat_paragraph'] ) && $aa['aa_repeat_paragraph'] == 1 ) ? true : false;
                $p_arr = explode( $close_p, $content );
                if ( count( $p_arr ) > 1 ) {
                    foreach ( $p_arr as $index => $paragraph ) {
                        if ( ( ( $index + 1 ) % $p_position ) == 0 ) {
                            if ( ( count( $p_arr ) % $p_position ) == 0 && count( $p_arr ) == ( $index + 1 ) ) break;
                            $p_arr[$index + 1] = $ads_content . $p_arr[$index + 1];
                            if ( ! $p_repeat ) break;
                        }
                    }
                    $content = implode( $close_p, $p_arr );
                    $mixed_content = $content;
                }
                break;
            case 'after-the-more-tag':
                $mixed_content = str_replace( '<span id="more-' . get_the_ID() . '"></span>', $ads_content, $content );
                break;
            case 'before-a-html-tag':
                $tag_name = $aa['aa_before_html_tag_name'];
                $tag_position = ( isset( $aa['aa_before_html_tag_index'] ) && $aa['aa_before_html_tag_index'] > 0 ) ? $aa['aa_before_html_tag_index'] : 1;
                $tag_repeat = ( isset( $aa['aa_before_html_tag_repeat'] ) && $aa['aa_before_html_tag_repeat'] == 1 ) ? true : false;
                $tag_pattern = '/<' . $tag_name . '(.*?)>/i';
                if ( $tag_pattern ) {
                    
                    // fix issue about image wrapped by figure tag
                    if ( $tag_name == 'img' ) {
                        $content_img = explode( '<img ', $content );
                        if ( count( $content_img ) > 1 ) {
                            foreach ( $content_img as $key => $value ) {

                                if ( $key % $tag_position == 0 ) {
                                    
                                    if ( ( $tag_repeat || $key == 0 ) && count( $content_img ) != ( $key + 1 ) ) {

                                        $content_img_index = explode( '<figure ', $content_img[$key] );
                                        if ( count( $content_img_index ) > 1 ) {
                                            $content_img_index[count( $content_img_index ) - 2] = $content_img_index[count( $content_img_index ) - 2] . $ads_content;
                                            $content_img[$key] = implode( '<figure ', $content_img_index );
                                        }
                                        else { // not found
                                            $content_img[$key] = $value . $ads_content;
                                        }

                                    }

                                }
                            }
                            $content = implode( '<img ', $content_img );
                        }
                    }
                    else {

                        $vars = array(
                            'content'                   => $content,
                            'tag_name'                  => $tag_name,
                            'ads_content'               => $ads_content,
                            'tag_position'              => $tag_position,
                            'tag_repeat'                => $tag_repeat,
                            'count'                     => 0
                        );

                        $content = preg_replace_callback( $tag_pattern, function( $matches ) use( &$vars ) {
                            if ( $vars['count'] % $vars['tag_position'] == 0 ) {
                                if ( $vars['tag_repeat'] || $vars['count'] == 0 ) {
                                    $matches[0] = $vars['ads_content'] . $matches[0];
                                }
                            }
                            $vars['count'] ++;
                            return $matches[0];
                        }, $content );
                    }
                }
                $mixed_content = $content;
                break;
            case 'after-a-html-tag':
                $tag_name = $aa['aa_after_html_tag_name'];
                $tag_position = ( isset( $aa['aa_after_html_tag_index'] ) && $aa['aa_after_html_tag_index'] > 0 ) ? $aa['aa_after_html_tag_index'] : 1;
                $tag_repeat = ( isset( $aa['aa_after_html_tag_repeat'] ) && $aa['aa_after_html_tag_repeat'] == 1 ) ? true : false;
                $tag_pattern = '/<' . $tag_name . '(.*?)>/i';
                if ( $tag_pattern ) {
                    
                    // fix issue about image wrapped by figure tag
                    if ( $tag_name == 'img' ) {
                        $content_img = explode( '<img ', $content );
                        if ( count( $content_img ) > 1 ) {
                            foreach ( $content_img as $key => $value ) {

                                if ( $key % $tag_position == 0 && $key != 0 ) {
                                    
                                    if ( ( $tag_repeat || $key == $tag_position ) ) {

                                        $content_img_index = explode( '</figure>', $content_img[$key] );
                                        if ( count( $content_img_index ) > 1 ) {
                                            $content_img_index[1] = $ads_content . $content_img_index[1];
                                            $content_img[$key] = implode( '</figure>', $content_img_index );
                                        }
                                        else { // not found
                                            $content_img_end = explode( '>', $content_img[$key] );
                                            if ( count( $content_img_end ) > 1 ) {
                                                if ( substr( trim( $content_img_end[1] ), 0, 4 ) == '</a>' ) {
                                                    $content_anchor = explode( '</a>', $content_img_end[1] );
                                                    if ( count( $content_anchor ) > 1 ) {
                                                        $content_anchor[1] = $ads_content . $content_anchor[1];
                                                        $content_img_end[1] = implode( '</a>', $content_anchor );
                                                    }
                                                }
                                                else {
                                                    $content_img_end[1] = $ads_content . $content_img_end[1];
                                                }
                                                $content_img[$key] = implode( '>', $content_img_end );
                                            }
                                        }

                                    }

                                }
                            }
                            $content = implode( '<img ', $content_img );
                        }
                    }
                    else {
                        $tag_pattern = '/<\/' . $tag_name . '>/i';
                        $vars = array(
                            'content'                   => $content,
                            'tag_name'                  => $tag_name,
                            'ads_content'               => $ads_content,
                            'tag_position'              => $tag_position,
                            'tag_repeat'                => $tag_repeat,
                            'count'                     => 0
                        );

                        $content = preg_replace_callback( $tag_pattern, function( $matches ) use( &$vars ) {
                            if ( ( ( $vars['count'] + 1 ) % $vars['tag_position'] == 0 ) && $vars['count'] != 0 ) {
                                if ( $vars['tag_repeat'] || $vars['count'] == ( $vars['tag_position'] - 1 ) ) {
                                    $matches[0] = $matches[0] . $vars['ads_content'];
                                }
                            }
                            $vars['count'] ++;
                            return $matches[0];
                        }, $content );
                        // exit;
                    }
                }
                $mixed_content = $content;
                break;
            case 'after-the-percentage':
                $percent_amount = ( isset( $aa['aa_after_the_percentage_amount'] ) && $aa['aa_after_the_percentage_amount'] > 0 ) ? $aa['aa_after_the_percentage_amount'] : 50;
                $close_p = '</p>';
                $paragraphs = explode( $close_p, $content );
                if ( count( $paragraphs ) > 1 ) {
                    $ads_p = intval( ( $percent_amount * ( count( $paragraphs ) - 1 ) ) / 100 );
                    foreach ( $paragraphs as $key => $p ) {
                        if ( $key == $ads_p ) {
                            $paragraphs[$key] = $ads_content . $paragraphs[$key];
                        }
                    }

                    $content = implode( $close_p, $paragraphs );
                    $mixed_content = $content;
                }
                break;
            case 'by-the-word-count':
                $word_count_amount = ( isset( $aa['aa_by_the_word_count_amount'] ) && $aa['aa_by_the_word_count_amount'] > 0 ) ? $aa['aa_by_the_word_count_amount'] : 100;
                $tag_name = 'p';
                $tag_pattern = '%(<' . $tag_name . '[^>]*>.*?</' . $tag_name . '>)%i';
                $vars = array(
                    'ads_content'               => $ads_content,
                    'word_count_amount'         => $word_count_amount,
                    'ads_is_show'               => false,
                    'word_count'                => 0
                );
                $content = preg_replace_callback( $tag_pattern, function( $matches ) use( &$vars ) {
                    $current_word_count = str_word_count( html_entity_decode( wp_strip_all_tags( $matches[0] ) ) );
                    $vars['word_count'] += $current_word_count;
                    if ( $vars['word_count'] >= $vars['word_count_amount'] && ! $vars['ads_is_show'] ) {
                        $matches[0] .= $vars['ads_content'];
                        $vars['ads_is_show'] = true;
                    }
                    
                    return $matches[0];
                }, $content );
                $mixed_content = $content;
                break;
            case 'sticky-ads':
                $mixed_content .= $ads_content;
                break;
            default:
                return $content;
        }
    }

    return $mixed_content;
}

/**
 * Check individual ads conditional
 * 
 * @param numeric $aa_id
 * @global object $post
 * @return bool
 */
function azoads_is_visible( $aa_id ) {
    global $post;

    $is_visible = false;
    if ( $post->ID == $aa_id ) $is_visible = true;

    return $is_visible;
}

/**
 * Update azoads_options where store all settings & azo ads
 * 
 * @return none
 */
function azoads_update_options( $post_id, $post, $update ) {
	
	// only process if post_type = azo-ads
	if ( 'azo-ads' !== $post->post_type ) {
		return;
	}

    // only process for update post
    if ( ! $update ) {
		return;
	}
    
    $options = azoads_update_options_data();
    update_option( 'azoads_options', $options );
}

/**
 * Update azoads_options where store all settings & azo ads when ads deleted
 * 
 * @return none
 */
function azoads_update_options_delete( $post_id, $post ) {
	
	// only process if post_type = azo-ads
	if ( 'azo-ads' !== $post->post_type ) {
		return;
	}
    
    $options = azoads_update_options_data();
    update_option( 'azoads_options', $options );
}

/**
 * Get azoads_options for all ads with array
 * 
 * @return array
 */
function azoads_update_options_data() {
    global $azoads_options;

    $aas = array();
    $options = array();

    if ( isset( $azoads_options['settings'] ) && ! empty( $azoads_options['settings'] ) ) $options['settings'] = $azoads_options['settings'];

    $aa_args = array(
        'post_type'             => 'azo-ads',
        'post_status'           => 'publish',
        'posts_per_page'        => -1
    );
    $aa_query = new WP_Query( $aa_args );
    if ( $aa_query->have_posts() ) {
        while ( $aa_query->have_posts() ) {
            $aa_query->the_post();

            $aa = array();
            $aa['ID'] = get_the_ID();
            $aa['post_title'] = get_the_title();
            
            $post_meta = get_post_custom( $aa['ID'] );
            foreach ( $post_meta as $key => $value ) {
                $aa[$key] = $value[0];
            }

            $aas[] = $aa;
        }
        
        $options['ads'] = $aas;
    }
    
    return $options;
}

/**
 * Get ads content for ad type: background. We must hook into init
 * 
 * @return string
 */
function azoads_background_ads() {
    if ( ! is_admin() ) ob_start( 'azoads_background_ads_content' );
}

function azoads_background_ads_content( $content ) {
    global $azoads_options, $post, $azoads_active;

    $id = $post->ID;

    // empty ads so do nothing
    if ( empty( $azoads_options['ads'] ) || empty( $azoads_active ) ) return $content;

    foreach ( $azoads_options['ads'] as $aa ) {

        if ( ! in_array( $aa['aa_id'], $azoads_active ) ) continue;

        if ( $aa['aa_type'] == 'background' ) {

            if ( ! empty( $aa['aa_background_image'] ) ) {
                $ads_content = '<div style="background-image: url(' . esc_attr( $aa['aa_background_image'] ) . ');position: absolute;top: 0;left: 0;width: 100%;height: 100%;background-repeat: no-repeat;background-position: center;background-size: cover;"></div>';
            }
            if ( ! empty( $aa['aa_background_url'] ) ) {
                $ads_content = '<a style="background-image: url(' . esc_attr( $aa['aa_background_image'] ) . ');position: absolute;top: 0;left: 0;width: 100%;height: 100%;background-repeat: no-repeat;background-position: center;background-size: cover;" href="' . esc_url( $aa['aa_background_url'] ) . '" target="_blank"></a>';
            }

            $html_body_open_after = '<div class="azoads-background-ads-wrapper">' . $ads_content . '<div class="azoads-background-ads-page-content">';

            $content = preg_replace( '/(\<body.*\>)/', '$1' . $html_body_open_after, $content );

            $content = str_replace( array( '</body>', '</BODY>' ), '</div></div></body>', $content );
        }
    }

    return $content;
}

/**
 * Get ads content for ad type: Loop Ads. The Ads should be shown in Loop of Post
 * 
 * @since 1.0.0
 * @param object $post post object
 * @param object $wp_query WP_Query object
 */
function azoads_loop_ads( $post, $wp_query = null ) {
    global $azoads_options, $azoads_active;

    $is_ajax = defined( 'DOING_AJAX' ) && DOING_AJAX;
    if ( ! $wp_query instanceof WP_Query || is_feed() || ( is_admin() && ! $is_ajax ) ) return;
    if ( $wp_query->is_main_query() && is_single() ) return;
    if ( $wp_query->is_singular() || ! $wp_query->in_the_loop ) return;
    if ( ! is_admin() && ! did_action( 'wp_head' ) ) return;
    if ( ! isset( $wp_query->current_post ) ) return;

    $curr_index = $wp_query->current_post;
    // don't show Ad if is first post
    if ( $curr_index == 0 ) return;
    // empty ads so do nothing
    if ( empty( $azoads_options['ads'] ) || empty( $azoads_active ) ) return;
    foreach ( $azoads_options['ads'] as $aa ) {
        
        if ( ! in_array( $aa['aa_id'], $azoads_active ) ) continue;

        if ( $aa['aa_type'] == 'loop' ) {

            $allowed_html = array(
                'div'           => array(
                    'class'         => array(),
                    'data-adid'     => array(),
                    'style'         => array(),
                ),
                'article'       => array(
                    'id'            => array(),
                    'class'         => array(),
                ),
                'header'        => array(
                    'class'         => array(),
                ),
                'h2'            => array(
                    'class'         => array(),
                ),
                'a'             => array(
                    'href'          => array(),
                    'class'         => array(),
                    'rel'           => array(),
                    'title'         => array(),
                    'target'        => array(),
                ),
                'section'       => array(
                    'class'         => array(),
                ),
                'img'           => array(
                    'style'         => array(),
                    'src'           => array(),
                    'class'         => array(),
                    'alt'           => array(),
                    'decoding'      => array(),
                    'loading'       => array(),
                ),
                'p'             => array()
            );

            if ( $aa['aa_loop_repeat'] != 1 ) {
                if ( $curr_index == $aa['aa_loop_index_post'] ) {
                    // echo azoads_get_ads_content( $aa['aa_id'] );
                    echo wp_kses( azoads_get_ads_content( $aa['aa_id'] ), $allowed_html );
                }
            }
            else {
                if ( ( $curr_index % $aa['aa_loop_index_post'] ) == 0 ) {
                    echo wp_kses( azoads_get_ads_content( $aa['aa_id'] ), $allowed_html );
                }
            }
        }
    }
}