<?php

namespace Asura\Integration\Vendor\OxygenBuilder;

/**
 * @version  3.7.beta-1
 */
class Utils {

    /**
     * @see \OXY_VSB_Connection::ct_connection_body_class
     */
    public static function bodyClass( $classes ) {
        if ( defined( 'SHOW_CT_BUILDER' ) ) {
            $classes[] = 'ct_connection_active';
        }

        return $classes;
    }

    /**
     * @see \OXY_VSB_Connection::oxygen_vsb_connection_register_settings
     */
    public static function registerSettings() {
        if ( ! self::can( true ) ) {
            return;
        }

        register_setting( 'oxygen_vsb_options_group', 'oxygen_vsb_color_lookup_table', [
            Utils::class,
            'oxygen_vsb_color_lookup_table_convert'
        ] );
        register_setting( 'oxygen_vsb_options_group_library', 'oxygen_vsb_screenshot_generate_url' );
        register_setting( 'oxygen_vsb_options_group_library', 'oxygen_vsb_site_screenshot', [
            'sanitize_callback' => function ( $data ) {
                return esc_url( $data );
            }
        ] );

    }

    /**
     * @see \oxygen_vsb_current_user_can_access
     * @see \oxygen_vsb_current_user_can_full_access
     */
    public static function can( bool $full = false ) {
        if ( is_multisite() && is_super_admin() ) {
            return true;
        }

        $user = wp_get_current_user();

        if ( ! $user ) {
            return false;
        }

        $user_edit_mode = self::get_user_edit_mode();

        if ( $full ) {
            if ( $user_edit_mode === "true" ) {
                return true;
            } else if ( $user_edit_mode === "false" || $user_edit_mode == 'edit_only' ) {
                return false;
            }
        } else {
            if ( $user_edit_mode === "true" || $user_edit_mode == 'edit_only' ) {
                return true;
            } else if ( $user_edit_mode === "false" ) {
                return false;
            }
        }

        if ( $user && isset( $user->roles ) && is_array( $user->roles ) ) {
            foreach ( $user->roles as $role ) {
                if ( $role === 'administrator' ) {
                    return true;
                }
                $option = get_option( "oxygen_vsb_access_role_{$role}", false );
                if ( $option && $option === 'true' ) {
                    return true;
                }

                if ( $full ) {
                    if ( $option && $option == 'true' ) {
                        return true;
                    }
                } else {
                    if ( $option && ( $option == 'true' || $option == 'edit_only' ) ) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    /**
     * @see \oxygen_vsb_get_user_edit_mode
     */
    public static function get_user_edit_mode( bool $skip_role = false ) {

        $user_id           = get_current_user_id();
        $users_access_list = get_option( "oxygen_vsb_options_users_access_list", [] );

        if ( isset( $users_access_list[ $user_id ] ) && isset( $users_access_list[ $user_id ][0] ) ) {
            return $users_access_list[ $user_id ][0];
        }

        if ( $skip_role ) {
            return "";
        }

        $user = wp_get_current_user();

        if ( ! $user ) {
            return "";
        }

        $edit_only = false;

        if ( $user && isset( $user->roles ) && is_array( $user->roles ) ) {
            foreach ( $user->roles as $role ) {
                if ( $role == 'administrator' ) {
                    return "true";
                }
                $option = get_option( "oxygen_vsb_access_role_$role", false );
                if ( $option && $option == 'true' ) {
                    return "true";
                }

                if ( $option && $option == 'edit_only' ) {
                    $edit_only = true;
                }
            }
        }

        if ( $edit_only ) {
            return "edit_only";
        }

        return "";
    }

    /**
     * @see \OXY_VSB_Connection::oxygen_vsb_color_lookup_table_convert
     */
    public static function oxygen_vsb_color_lookup_table_convert( $data ) {

        $data = explode( "\r\n", $data );

        $processedData = array();

        foreach ( $data as $item ) {
            if ( strpos( $item, '=' ) < 0 || strripos( $item, '=' ) !== strpos( $item, '=' ) ) {
                continue;
            }

            $exploded = explode( '=', $item );

            $processedData[ trim( $exploded[0] ) ] = trim( $exploded[1] );
        }

        return $processedData;

    }

    /**
     * @see \OXY_VSB_Connection::oxygen_vsb_get_component_ready
     */
    public static function getComponentReady( $key, $item, $page, $screenshots, $ct_preview_url ) {
        $section  = [];
        $nicename = '';

        if ( isset( $item['options']['nicename'] ) ) {
            $nicename = $item['options']['nicename'];
        } else { // derive a nicename
            if ( $page->post_type == 'oxy_user_library' ) {
                $nicename = $page->post_title;
            } else {
                $nicename = 'Component ' . $key;
            }
        }

        $section['id']   = $item['id'];
        $section['name'] = $nicename;

        $preview_query_args = [
            'render_component_screenshot' => 'true'
        ];

        if ( $page->post_type == 'oxy_user_library' ) {
            $page_category = get_post_meta( $page->ID, '_ct_connection_page_category', true );

            if ( $page_category ) {
                $section['category'] = $page_category;
            } else {
                return false; // uncategorized wont be included
                $section['category'] = 'Uncategorized';
            }

        } else {

            if ( isset( $item['options']['ct_category'] ) ) {
                $section['category'] = $item['options']['ct_category'];
            } else {
                return false; // uncategorized wont be included
                $section['category'] = 'Uncategorized';
            }

            $preview_query_args['selector'] = $item['options']['selector'];
        }

        $section['source'] = get_site_url();

        $url = add_query_arg( $preview_query_args, ( $ct_preview_url && ! empty( $ct_preview_url ) ) ? $ct_preview_url : get_permalink( $page->ID ) );

        if ( $ct_preview_url && ! empty( $ct_preview_url ) ) {
            $url = add_query_arg( [
                'screenshot_template' => $page->ID
            ], $url );
        }

        $section['url'] = $url;
        if ( $page->post_type == 'oxy_user_library' ) {
            $section['screenshot_url'] = ( is_array( $screenshots ) && isset( $screenshots['page'] ) ) ? $screenshots['page'] : 'https://via.placeholder.com/600x100?text=no+screenshot';
        } else {
            $section['screenshot_url'] = ( is_array( $screenshots ) && isset( $screenshots[ $item['id'] ] ) ) ? $screenshots[ $item['id'] ] : 'https://via.placeholder.com/600x100?text=no+screenshot';
        }

        $section['page'] = $page->ID;

        return $section;
    }

    /**
     * @see \OXY_VSB_Connection::oxygen_vsb_process_component
     */
    public static function processComponent( $item, $globalColors ) {
        // recursively go through the component and replace any re-usable with the corresponding content
        if ( $item['children'] ) {
            $item['children'] = self::recursivelyReplaceReusable( $item['children'] );
        }

        $appliedClasses = self::appliedClasses( [ 'content' => [ $item ] ] );

        $appliedGlobalColors = [];

        $appliedGlobalColors = self::extractGlobalColors( [ $item ], $globalColors );


        $allClasses = get_option( 'ct_components_classes' );

        $appliedClasses = array_intersect_key( $allClasses, $appliedClasses );

        // find applied global colors in the applied classes
        $appliedGlobalColors = self::extractGlobalColors( $appliedClasses, $globalColors ) + $appliedGlobalColors;

        $result = [
            'component' => $item,
            'classes'   => $appliedClasses,
            'colors'    => $appliedGlobalColors
        ];


        $oxygen_vsb_color_lookup_table = get_option( 'oxygen_vsb_color_lookup_table', false );
        if ( is_array( $oxygen_vsb_color_lookup_table ) ) {
            $result['lookuptable'] = $oxygen_vsb_color_lookup_table;
        }

        return $result;
    }

    /**
     * @see \OXY_VSB_Connection::oxygen_vsb_recursively_replace_reusable
     */
    public static function recursivelyReplaceReusable( $children ) {

        foreach ( $children as $key => $item ) {

            if ( $item['name'] == 'ct_reusable' ) {
                $children[ $key ]['shortcodes'] = get_post_meta( $item['options']['view_id'], 'ct_builder_shortcodes', true );
            }
            if ( isset( $item['options']['view_id'] ) ) {
                $post = get_post( $item['options']['view_id'] );

                $children[ $key ]['post_title'] = $post->post_title;
                $children[ $key ]['menu_order'] = $post->menu_order;

                if ( $item['children'] ) {
                    $children[ $key ]['children'] = self::recursivelyReplaceReusable( $item['children'] );
                }
            }

        }

        return $children;
    }

    /**
     * @see \OXY_VSB_Connection::oxygen_vsb_connection_applied_classes
     */
    public static function appliedClasses( $shortcodes ) {
        $classes = [];
        if ( isset( $shortcodes['content'] ) ) {
            $classes = self::extractClasses( $shortcodes['content'] );
        }

        return $classes;
    }

    /**
     * @see \OXY_VSB_Connection::oxygen_vsb_connection_extract_classes
     */
    public static function extractClasses( $children ) {

        $classes = [];

        foreach ( $children as $child ) {

            if ( isset( $child['options']['classes'] ) ) {
                foreach ( $child['options']['classes'] as $item ) {
                    if ( is_string( $item ) ) {
                        $classes[ $item ] = false;
                    }
                }
            }

            if ( isset( $child['children'] ) ) {
                $classes = array_merge( $classes, self::extractClasses( $child['children'] ) );
            }
        }

        return $classes;
    }

    /**
     * @see \OXY_VSB_Connection::oxygen_vsb_connection_extract_global_colors
     */
    public static function extractGlobalColors( $children, $globalColors ) {

        $colors = [];

        foreach ( $children as $key => $item ) {

            if ( is_string( $item ) ) {
                $matches = [];

                $children[ $key ] = preg_match_all( '/color\((\d*)\)/', $item, $matches );

                foreach ( $matches[1] as $match ) {
                    if ( isset( $globalColors['colors'] ) ) {
                        foreach ( $globalColors['colors'] as $gColor ) {
                            if ( $gColor['id'] == intval( $match ) ) {
                                $colors[ intval( $match ) ] = [
                                    'id'    => $gColor['id'],
                                    'name'  => $gColor['name'],
                                    'value' => $gColor['value']
                                ];
                                break;
                            }
                        }
                    }

                }
            } else if ( is_array( $children[ $key ] ) ) {
                $colors = self::extractGlobalColors( $children[ $key ], $globalColors ) + $colors;
            }
        }

        return $colors;
    }

}
