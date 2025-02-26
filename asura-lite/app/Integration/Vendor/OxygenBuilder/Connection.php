<?php

namespace Asura\Integration\Vendor\OxygenBuilder;

/**
 * @version 3.7.beta-1
 */
class Connection {
    public static function init() {
        if ( get_option( 'oxygen_vsb_enable_connection' ) != true ) {
            register_post_type( 'oxy_user_library', self::blockPostType() );
            add_action( 'admin_menu', [ Connection::class, 'blockLibraryPage' ], 10 );
        }

        add_action( 'add_meta_boxes', [ Connection::class, 'pageCategoryMetaBox' ] );
        add_action( 'save_post', [ Connection::class, 'metaBoxSave' ] );
        add_action( 'template_redirect', [ Connection::class, 'blockElementPostType' ] );
        add_action( 'admin_enqueue_scripts', function () {
            wp_register_script( 'oxygen_vsb_connection_admin', CT_FW_URI . '/admin/js/oxygen_connection_admin.js', [ 'jquery' ] );
        } );
        add_action( 'wp_enqueue_scripts', [ Connection::class, 'enqueueScreenshotScript' ] );
        add_action( 'wp_ajax_oxygen_connection_screenshot', [
            Connection::class,
            'oxygen_connection_screenshot'
        ] );
    }

    /**
     * @see \OXY_VSB_Connection::ct_connection_element_post_type
     */
    public static function blockPostType() {
        return [
            'description'         => '',
            'public'              => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'has_archive'         => false,
            'capability_type'     => 'post',
            'hierarchical'        => false,
            'rewrite'             => false,
            'query_var'           => true,
            'menu_position'       => '',
            'show_in_menu'        => 'some_arbitrary',
            'show_in_nav_menus'   => false,
            'show_in_admin_bar'   => true,
            'show_in_rest'        => false,
            'exclude_from_search' => true,
            'rewrite_withfront'   => true,
            'supports'            => [ 0 => 'title', ],
            'labels'              => [
                'name'               => 'Blocks',
                'singular_name'      => 'Block',
                'menu_name'          => 'Block Library',
                'all_items'          => 'Block Library',
                'add_new'            => 'Add New',
                'add_new_item'       => 'Add New Block',
                'edit_item'          => '',
                'new_item'           => '',
                'view_item'          => '',
                'search_items'       => '',
                'not_found'          => '',
                'not_found_in_trash' => '',
                'parent_item_colon'  => '',
                'name_admin_bar'     => 'Library Block',
            ],
        ];

    }

    /**
     * @see \OXY_VSB_Connection::ct_block_library_page
     */
    public static function blockLibraryPage() {
        if ( ! Utils::can( true ) ) {
            return;
        }

        add_submenu_page( 'asura', 'Block Library', 'Block Library', 'read', 'edit.php?post_type=oxy_user_library' );
    }

    /**
     * @see \OXY_VSB_Connection::ct_connection_page_category_meta_box
     */
    public static function pageCategoryMetaBox() {

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( 'true' == get_option( 'oxygen_vsb_ignore_post_type_' . get_current_screen()->post_type, false ) ) {
            return;
        }

        add_meta_box(
            'ct_connection_metabox',
            'Oxygen - Design Set Options',
            [ Connection::class, 'pageCategoryMetaBoxCallback' ],
            [
                'asura_designpedia',
                'page',
                'ct_template',
                'oxy_user_library'
            ],
            'normal',
            'high'
        );

    }

    /**
     * @see \OXY_VSB_Connection::ct_connection_page_category_box_callback
     */
    public static function pageCategoryMetaBoxCallback() {
        wp_register_script( 'oxygen_vsb_connection_admin', CT_FW_URI . '/admin/js/oxygen_connection_admin.js', [ 'jquery' ] );
        wp_enqueue_script( 'oxygen_vsb_connection_admin' );
        wp_enqueue_media();

        global $post;
        $categories = [];

        if ( $post->post_type == 'oxy_user_library' ) {
            global $ct_component_categories;
            $categories = $ct_component_categories;
        } elseif ( ( $post->post_type == 'page' || $post->post_type == 'asura_designpedia' ) && get_post_meta( $post->ID, '_ct_connection_use_page', true ) ) {
            $categories = [
                'home'           => 'Home',
                'content'        => 'Content',
                'pricing'        => 'Pricing',
                'about'          => 'About',
                'contact'        => 'Contact',
                'onepagelanding' => 'One-Page & Landing'
            ];
        }

        echo (string) view( 'vendor.oxygen.metabox.page-category', [
            'post'       => $post,
            'categories' => $categories,
            'category'   => get_post_meta( $post->ID, '_ct_connection_page_category', true )
        ] );

    }

    /**
     * @see \OXY_VSB_Connection::ct_connection_metabox_save
     */
    public static function metaBoxSave( $post_id ) {

        if ( ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ) || ! isset( $_POST['ct_connection_metabox_nonce'] ) || ! wp_verify_nonce( $_POST['ct_connection_metabox_nonce'], 'ct_connection_metabox' ) ) {
            return $post_id;
        }

        if ( isset( $_POST['post_type'] ) && ( 'asura_designpedia' == sanitize_text_field( $_POST['post_type'] ) || 'page' == sanitize_text_field( $_POST['post_type'] ) || 'post' == sanitize_text_field( $_POST['post_type'] ) ) ) {
            if ( ! current_user_can( 'edit_page', $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }

        $ct_connection_page_category           = isset( $_POST['ct_connection_page_category'] ) ? sanitize_text_field( $_POST['ct_connection_page_category'] ) : false;
        $ct_connection_use_page                = isset( $_POST['ct_connection_use_page'] ) ? sanitize_text_field( $_POST['ct_connection_use_page'] ) : false;
        $ct_connection_use_default             = isset( $_POST['ct_connection_use_default'] ) ? sanitize_text_field( $_POST['ct_connection_use_default'] ) : false;
        $ct_connection_use_sections            = isset( $_POST['ct_connection_use_sections'] ) ? sanitize_text_field( $_POST['ct_connection_use_sections'] ) : false;
        $ct_connection_page_screenshot         = isset( $_POST['ct_connection_page_screenshot'] ) ? sanitize_text_field( $_POST['ct_connection_page_screenshot'] ) : false;
        $ct_connection_template_screenshot_url = isset( $_POST['ct_connection_template_screenshot_url'] ) ? sanitize_text_field( $_POST['ct_connection_template_screenshot_url'] ) : false;

        if ( $ct_connection_page_category ) {
            update_post_meta( $post_id, '_ct_connection_page_category', $ct_connection_page_category );
        } else {
            delete_post_meta( $post_id, '_ct_connection_page_category' );
        }

        if ( $ct_connection_use_page ) {
            update_post_meta( $post_id, '_ct_connection_use_page', $ct_connection_use_page );
        } else {
            delete_post_meta( $post_id, '_ct_connection_use_page' );
        }

        if ( $ct_connection_use_default ) {
            update_post_meta( $post_id, '_ct_connection_use_default', $ct_connection_use_default );
        } else {
            delete_post_meta( $post_id, '_ct_connection_use_default' );
        }

        if ( $ct_connection_use_sections ) {
            update_post_meta( $post_id, '_ct_connection_use_sections', $ct_connection_use_sections );
        } else {
            delete_post_meta( $post_id, '_ct_connection_use_sections' );
        }

        if ( $ct_connection_page_screenshot ) {
            update_post_meta( $post_id, '_ct_connection_page_screenshot', $ct_connection_page_screenshot );
        } else {
            delete_post_meta( $post_id, '_ct_connection_page_screenshot' );
        }

        if ( $ct_connection_template_screenshot_url ) {
            update_post_meta( $post_id, '_ct_connection_template_screenshot_url', $ct_connection_template_screenshot_url );
        } else {
            delete_post_meta( $post_id, '_ct_connection_template_screenshot_url' );
        }

    }

    /**
     * @see \OXY_VSB_Connection::ct_block_element_post_type
     */
    public static function blockElementPostType( $template ) {
        if ( is_singular( 'oxy_user_library' ) ) {

            $current_user = wp_get_current_user();

            if ( isset( $_REQUEST['render_component_screenshot'] ) || user_can( $current_user, 'administrator' ) ) {
                return $template;
            }

            global $wp_query;
            $wp_query->posts = [];
            $wp_query->post  = null;
            $wp_query->set_404();
            status_header( 404 );
            nocache_headers();
            wp_redirect( home_url() );
            exit();
        }
    }

    /**
     * @see \OXY_VSB_Connection::oxygen_vsb_screenshot_script
     */
    public static function enqueueScreenshotScript() {
        if ( isset( $_REQUEST['render_component_screenshot'] ) && stripslashes( $_REQUEST['render_component_screenshot'] ) == 'true' ) {
            $selector = isset( $_REQUEST['selector'] ) ? sanitize_text_field( $_REQUEST['selector'] ) : '';
            $post     = get_post();
            show_admin_bar( false );

            echo "<script> var oxygen_vsb_selectiveRenderingParams = {selector: '{$selector}',post_id: {$post->ID}} </script>";

            wp_enqueue_script( 'oxygen_vsb_screenshot_script', CT_FW_URI . '/admin/js/oxygen_connection_script.js', [ 'jquery' ] );
        }
    }

    /**
     * @see \OXY_VSB_Connection::oxygen_connection_screenshot
     */
    public static function oxygen_connection_screenshot() {
        if ( ! wp_verify_nonce( $_POST['ct_connection_generate_screenshot_nonce'], 'ct_connection_generate_screenshot' ) ) {
            die();
        }

        $apiurl = 'https://xejdaxc4wb.execute-api.us-east-2.amazonaws.com/prod/';

        $scapisecret = self::getSCAPIToken();

        ob_start();
        $something_failed = false;

        $renderURL = isset( $_REQUEST['renderURL'] ) ? esc_url( $_REQUEST['renderURL'] ) : false;

        $postId = isset( $_REQUEST['postId'] ) ? intval( $_REQUEST['postId'] ) : false;

        if ( ! $postId ) {
            // generate the home page screenshot and return the url

            $url = add_query_arg( array(
                'render_component_screenshot' => 'true'
            ), $renderURL ? $renderURL : get_home_url() );

            $success = false;
            $count   = 0;
            while ( ! $success && $count < 5 ) {
                $count ++;
                $get = wp_remote_get( $apiurl . '?url=' . urlencode( $url ), array(
                    'timeout' => 15,
                    'headers' => array( 'Auth' => $scapisecret )
                ) );

                $response_code = wp_remote_retrieve_response_code( $get );
                if ( $response_code === 401 ) {
                    $scapisecret = self::getSCAPIToken( true );
                    continue;
                }

                $type = wp_remote_retrieve_header( $get, 'content-type' );

                $size = wp_remote_retrieve_header( $get, 'content-length' );

                $isImage = ( $type == 'image/png' );

                $success = $isImage && is_numeric( $size ) && intval( $size ) > 1200;

                if ( $success ) {

                    $result = wp_upload_bits( 'site_screenshot.png', '', wp_remote_retrieve_body( $get ) );

                    $result = self::oxygen_connection_resize_screenshot( $result );

                    header( 'Content-Type: application/json' );

                    echo json_encode( array( 'url' => $result['url'] ) );
                }
            }

            die();
        }

        $post = get_post( $postId );

        $ct_preview_url = false;

        if ( $post->post_type === 'ct_template' ) {
            $ct_preview_url = get_post_meta( $postId, 'ct_preview_url', true );
        }

        $shortcodes = get_post_meta( $postId, 'ct_builder_shortcodes', true );
        $shortcodes = parse_shortcodes( $shortcodes );

        if ( is_array( $shortcodes['content'] ) && $post->post_type !== 'oxy_user_library' ) {
            echo "\n Component Screenshots \n";
            $componentIndex = isset( $_REQUEST['componentIndex'] ) ? intval( $_REQUEST['componentIndex'] ) : 0;

            if ( $componentIndex === 0 ) {
                $screenshots = array();
            } else {
                $screenshots = get_post_meta( $postId, 'oxygen_vsb_components_screenshots', true );
            }

            $loopIndex = 0;
            foreach ( $shortcodes['content'] as $key => $item ) {

                if ( $item['name'] == 'ct_section' || $item['name'] == 'oxy_header' || $item['name'] == 'ct_div_block' ) {

                    if ( $loopIndex !== $componentIndex ) {
                        $loopIndex ++;
                        continue;
                    }


                    $url = add_query_arg( array(
                        'render_component_screenshot' => 'true',
                        'selector'                    => $item['options']['selector']
                    ), ( $ct_preview_url && ! empty( $ct_preview_url ) ) ? $ct_preview_url : get_permalink( $postId ) );

                    if ( $ct_preview_url && ! empty( $ct_preview_url ) ) {
                        $url = add_query_arg( array(
                            'screenshot_template' => $post->ID
                        ), $url );
                    }

                    $success = false;
                    $count   = 0;
                    while ( ! $success && $count < 5 ) {
                        $count ++;

                        $get = wp_remote_get( $apiurl . '?url=' . urlencode( $url ), array(
                            'timeout' => 15,
                            'headers' => array( 'Auth' => $scapisecret )
                        ) );

                        $response_code = wp_remote_retrieve_response_code( $get );

                        if ( $response_code === 401 ) {
                            $scapisecret = self::getSCAPIToken( true );
                            continue;
                        }

                        $type = wp_remote_retrieve_header( $get, 'content-type' );
                        $size = wp_remote_retrieve_header( $get, 'content-length' );

                        $isImage = ( $type == 'image/png' );

                        $isOfSize = is_numeric( $size ) && intval( $size ) > 1200;

                        if ( $isImage && ! $isOfSize ) {

                            // could it be, because the component was empty?
                            // is it empty?
                            if ( ( ! isset( $item['options'] ) || ! isset( $item['options']['ct_content'] ) || trim( $item['options']['ct_content'] ) == '' ) && ( ! isset( $item['children'] ) || ! is_array( $item['children'] ) || sizeof( $item['children'] ) < 1 ) ) {

                                // yes empty (and the image is blank, not because of any glitch with the screenshot API), give it a free pass
                                $isOfSize = true;
                            }
                        }

                        $success = $isImage && $isOfSize;

                        if ( $success ) {
                            $size = wp_remote_retrieve_header( $get, 'content-length' );

                            $result = wp_upload_bits( 'component-screenshot-' . $postId . '-' . $item['id'] . '.png', '', wp_remote_retrieve_body( $get ) );

                            $result = self::oxygen_connection_resize_screenshot( $result );

                            $screenshots[ $item['id'] ] = $result['url'];
                            echo $result['url'] . "\n";
                        }
                    }

                    if ( ! $success && ! $something_failed ) {
                        $debug_output     = ob_get_clean();
                        $something_failed = true;
                        $componentRepeat  = isset( $_REQUEST['componentRepeat'] ) ? intval( $_REQUEST['componentRepeat'] ) : 0;

                        if ( $componentRepeat > 3 ) {
                            $results['error'] = true;
                        } else {
                            $results = array(
                                'componentIndex'  => $componentIndex,
                                'componentRepeat' => $componentRepeat + 1
                            );
                        }

                        @header( 'Content-type: application/json' );
                        echo json_encode( $results );
                        die();
                    } else {
                        update_post_meta( $postId, 'oxygen_vsb_components_screenshots', $screenshots );
                        $debug_output = ob_get_clean();
                        $results      = array(
                            'componentIndex' => $componentIndex + 1,
                            'componentShot'  => $result['url']
                        );

                        @header( 'Content-type: application/json' );
                        echo json_encode( $results );
                        die();
                    }

                    $loopIndex ++;
                }

            }

        }


        // screenshot for the whole page
        if ( $renderURL ) {
            $ct_preview_url = $renderURL;
        }

        $url = add_query_arg( array(
            'render_component_screenshot' => 'true'
        ), ( $ct_preview_url && ! empty( $ct_preview_url ) ) ? $ct_preview_url : get_permalink( $postId ) );

        if ( $ct_preview_url && ! empty( $ct_preview_url ) ) {
            $url = add_query_arg( array(
                'screenshot_template' => $post->ID
            ), $url );
        }

        $success = false;
        $count   = 0;

        while ( ! $success && $count < 5 ) {

            $count ++;

            $get = wp_remote_get( $apiurl . '?url=' . urlencode( $url ), array(
                'timeout' => 15,
                'headers' => array( 'Auth' => $scapisecret )
            ) );

            $response_code = wp_remote_retrieve_response_code( $get );
            if ( $response_code === 401 ) {
                $scapisecret = self::getSCAPIToken( true );
                continue;
            }

            $type = wp_remote_retrieve_header( $get, 'content-type' );

            $size = wp_remote_retrieve_header( $get, 'content-length' );

            $isImage = ( $type == 'image/png' );

            $success = $isImage && is_numeric( $size ) && intval( $size ) > 1200;

            if ( $success ) {
                $result = wp_upload_bits( 'page-screenshot-' . $postId . '.png', '', wp_remote_retrieve_body( $get ) );

                $result = self::oxygen_connection_resize_screenshot( $result );


                $screenshots['page'] = $result['url'];

                // this also needs to be assigned to the database in case its a template
                $post_type = get_post_type( $postId );

                if ( $post_type == 'ct_template' ) {
                    update_post_meta( $postId, '_ct_connection_page_screenshot', $screenshots['page'] );
                }
            }
        }

        if ( ! $success && ! $something_failed ) {
            $something_failed = true;
        }


        echo "\n Final Screenshots \n";


        update_post_meta( $postId, 'oxygen_vsb_components_screenshots', $screenshots );
        update_post_meta( $postId, '_ct_connection_screenshots_generated', date( "Y-m-d H:i:s" ) );

        $debug_output = ob_get_clean();

        $results = array(
            'screenshots' => $screenshots
        );

        if ( $something_failed ) {
            $results['error'] = true;
        }

        @header( 'Content-type: application/json' );
        echo json_encode( $results );

        die();
    }

    /**
     * @see \OXY_VSB_Connection::getSCAPIToken
     */
    public static function getSCAPIToken( $forceRefresh = false ) {

        $tokens  = get_option( 'oxy_vsb_scapi_tokens', false );
        $license = get_option( 'oxygen_license_key', false );
        $site    = get_site_url();

        $errors = array();

        if ( is_array( $tokens ) ) {
            $thatTime        = $tokens['timestamp'];
            $thatRefreshTime = $tokens['refreshTimestamp'];
            $timediff        = time() - $thatTime;
            $refreshTimediff = time() - $thatRefreshTime;

            if ( ! $forceRefresh && $timediff < 3500 ) { // 3500 is about to be an hour
                // echo "got existing token";
                return $tokens['IdToken'];

            } elseif ( $refreshTimediff < 2500000 ) { //2500000 is about to be 30 days
                //send refresh token to the register endpoint and receive access tokens

                $refreshToken = $tokens['RefreshToken'];

                $response = self::remoteGetSCAPI( array(
                    'action'       => 'refreshTokens',
                    'RefreshToken' => $refreshToken
                ) );

                if ( ! $response[0] ) {
                    // echo "got refreshed token";

                    if ( isset( $response[1]['AuthenticationResult'] ) && isset( $response[1]['AuthenticationResult']['IdToken'] ) ) {

                        self::storeSCAPITokensToDB( $response[1] );

                        return $response[1]['AuthenticationResult']['IdToken'];
                    } elseif ( isset( $response[1]['errorMessage'] ) ) {
                        $errors[] = $response[1]['errorMessage'];
                    }
                }

            }

            // if timediff is greater than 30 days or refresh attempt failed

            //send md5 of the license key to the register endpoint and receive access tokens

            if ( $license ) {
                $response = self::remoteGetSCAPI( array(
                    'action'  => 'reAuthenticate',
                    'license' => md5( $license ),
                    'site'    => $site
                ) );

                if ( ! $response[0] ) {
                    // echo "got reauthenticated token";

                    if ( isset( $response[1]['AuthenticationResult'] ) && isset( $response[1]['AuthenticationResult']['IdToken'] ) ) {

                        self::storeSCAPITokensToDB( $response[1], true );

                        return $response[1]['AuthenticationResult']['IdToken'];
                    } elseif ( isset( $response[1]['errorMessage'] ) ) {
                        $errors[] = $response[1]['errorMessage'];
                    }

                }
            }

        }

        // if reached so far, that means that we do not already have any tokens stored, so register
        if ( $license ) {
            // set up a transient response that the online API will access in order to determine that the site is available online
            $scapiChallenge = uniqid();
            set_transient( 'oxy_vsb_scapi_challenge', $scapiChallenge );


            //send license key, scapiChallenge, and site url (it cannot be a localhost or 127.0.0.1) to the register endpoint and receive access tokens

            $response = self::remoteGetSCAPI( array(
                'action'         => 'generateAccess',
                'license'        => $license,
                'scapiChallenge' => $scapiChallenge,
                'site'           => $site
            ) );

            if ( ! $response[0] ) {
                // echo "got new authentication token";
                if ( isset( $response[1]['AuthenticationResult'] ) && isset( $response[1]['AuthenticationResult']['IdToken'] ) ) {

                    self::storeSCAPITokensToDB( $response[1], true );

                    return $response[1]['AuthenticationResult']['IdToken'];
                } elseif ( isset( $response[1]['errorMessage'] ) ) {
                    $errors[] = $response[1]['errorMessage'];
                }

            }

        }

        if ( sizeof( $errors ) < 1 ) {
            $errors[] = 'A valid Oxygen license is required';
        }


        @header( 'Content-type: application/json' );
        echo json_encode( array(
            'error'         => true,
            'errorMessages' => $errors,
        ) );
        die();


    }

    /**
     * @see \OXY_VSB_Connection::remoteGetSCAPI
     */
    public static function remoteGetSCAPI( $body ) {

        $url = 'https://xejdaxc4wb.execute-api.us-east-2.amazonaws.com/prod/auth';

        $response = wp_remote_post( $url, array(
                'method'      => 'POST',
                'timeout'     => 45,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking'    => true,
                'headers'     => array( 'Content-Type' => 'application/json' ),
                'body'        => json_encode( $body ),
                'cookies'     => array()
            )
        );

        if ( is_wp_error( $response ) ) {
            $error_message = $response->get_error_message();

            return array(
                true,
                $error_message
            );

        } else {
            $body = wp_remote_retrieve_body( $response );

            return array(
                null,
                json_decode( $body, true )
            );
        }

    }

    /**
     * @see \OXY_VSB_Connection::storeSCAPITokensToDB
     */
    public static function storeSCAPITokensToDB( $data, $refresh = false ) {

        $tokens = get_option( 'oxy_vsb_scapi_tokens', array() );

        if ( ! is_array( $tokens ) ) {
            $tokens = array(); // in case of corrupt data
        }

        if ( isset( $data['AuthenticationResult'] ) ) {

            $tokens['AccessToken'] = $data['AuthenticationResult']['AccessToken'];
            $tokens['IdToken']     = $data['AuthenticationResult']['IdToken'];
            $tokens['timestamp']   = time();

            if ( $refresh ) {
                $tokens['RefreshToken']     = $data['AuthenticationResult']['RefreshToken'];
                $tokens['refreshTimestamp'] = time();
            }

        }


        update_option( 'oxy_vsb_scapi_tokens', $tokens );

    }

    /**
     * @see \OXY_VSB_Connection::oxygen_connection_resize_screenshot
     */
    public static function oxygen_connection_resize_screenshot( $result ) {

        $image = wp_get_image_editor( $result['file'] );

        if ( ! is_wp_error( $image ) ) {

            $size = $image->get_size();

            $image->resize( 520, 520 * $size['height'] / $size['width'], false );

            $image->resize( 520, 800, array( 'center', 'top' ) );

            $oName = strrchr( $result['file'], '/' );

            $oName = ltrim( $oName, '/' );

            $name = 'resized-' . $oName;

            $path = str_replace( $oName, $name, $result['file'] );

            $image->save( $path ); // a new smaller version is saved.

            $result['url'] = str_replace( $oName, $name, $result['url'] );

        }

        return $result;
    }
}
