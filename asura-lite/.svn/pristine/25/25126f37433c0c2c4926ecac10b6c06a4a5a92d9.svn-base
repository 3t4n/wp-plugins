<?php

namespace Asura\Integration\Vendor\OxygenBuilder;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

/**
 * @version  3.7.beta-1
 */
class Demo {
    public static function init() {
        add_shortcode( 'asura_demo', [ Demo::class, 'shortcodeDemo' ] );

        self::addAjax( 'asura_demo_get_items', [ Demo::class, 'getItems' ] );
    }

    public static function addAjax( $tag, $handler, $priority = 10, $args = 1 ) {
        self::addAjaxPriv( $tag, $handler, $priority, $args );
        self::addAjaxNoPriv( $tag, $handler, $priority, $args );
    }

    public static function addAjaxPriv( $tag, $handler, $priority = 10, $args = 1 ) {
        add_action( "wp_ajax_{$tag}", $handler, $priority, $args );
    }

    public static function addAjaxNoPriv( $tag, $handler, $priority = 10, $args = 1 ) {
        add_action( "wp_ajax_nopriv_{$tag}", $handler, $priority, $args );
    }

    /**
     * @see \OXY_VSB_Connection::oxygen_vsb_connection_items
     */
    public static function getItems() {
        $validator = Validator::make( $_REQUEST, [
            'term_slug' => 'required|string',
        ] );

        if ( $validator->fails() ) {
            return;
        }

        if ( ! term_exists( $_REQUEST['term_slug'], 'designset' ) ) {
            return;
        }

        $data = Cache::remember( "asuraOxyDemo_getItems_{$_REQUEST['term_slug']}", Carbon::now()->addMinutes( 5 ), function () {

            $posts = get_posts( [
                'post_type'   => [
                    'asura_designpedia',
                    'page',
                    'ct_template',
                    'oxy_user_library'
                ],
                'numberposts' => - 1,
                'tax_query'   => [
                    [
                        'taxonomy' => 'designset',
                        'field'    => 'slug',
                        'terms'    => $_REQUEST['term_slug']
                    ],
                ],
            ] );

            $pages      = [];
            $components = [];
            $categories = [
                'pages'      => [],
                'components' => [],
            ];

            $oxygenCategories = [
                'pages'      => [
                    'uncategorized'  => 'Uncategorized',
                    'home'           => 'Home',
                    'content'        => 'Content',
                    'pricing'        => 'Pricing',
                    'about'          => 'About',
                    'contact'        => 'Contact',
                    'onepagelanding' => 'One-Page & Landing'
                ],
                'components' => [
                    'uncategorized'      => 'Uncategorized',
                    'header'             => 'Headers',
                    'herotitle'          => 'Heros & Titles',
                    'content'            => 'Content',
                    'showcase'           => 'Showcase',
                    'socialproof'        => 'Social Proof',
                    'people'             => 'People',
                    'pricing'            => 'Pricing',
                    'calltoaction'       => 'Call To Action',
                    'contact'            => 'Contact',
                    'slidertabaccordion' => 'Sliders, Tabs, & Accordions',
                    'blog'               => 'Blog',
                    'footer'             => 'Footers',
                ]
            ];

            foreach ( $posts as $page ) {

                $ct_preview_url = false;

                if ( $page->post_type === 'ct_template' ) {
                    $ct_preview_url = get_post_meta( $page->ID, 'ct_preview_url', true );
                }

                $screenshots = get_post_meta( $page->ID, 'oxygen_vsb_components_screenshots', true );

                $shortcodes = get_post_meta( $page->ID, 'ct_builder_shortcodes', true );

                if (
                    ( $page->post_type != 'oxy_user_library' && get_post_meta( $page->ID, '_ct_connection_use_page', true ) )
                    && 'reusable_part' !== get_post_meta( $page->ID, 'ct_template_type', true ) 
                ) {

                    $providedScreenshot = $page->post_type == 'ct_template' ? get_post_meta( $page->ID, '_ct_connection_page_screenshot', true ) : false;

                    $returnPage = [
                        'id'             => $page->ID,
                        'name'           => $page->post_title,
                        'source'         => get_site_url(),
                        'url'            => ( $ct_preview_url ? $ct_preview_url : get_permalink( $page->ID ) ) . '?noadminbar=true',
                        'type'           => $page->post_type,
                        'screenshot_url' => $providedScreenshot ? $providedScreenshot : ( ( is_array( $screenshots ) && isset( $screenshots['page'] ) ) ? $screenshots['page'] : 'https://via.placeholder.com/600x100?text=no+screenshot' )
                    ];

                    $page_category = get_post_meta( $page->ID, '_ct_connection_page_category', true );

                    if ( $page_category ) {
                        $returnPage['category'] = $page_category;
                    } else {
                        $returnPage['category'] = 'uncategorized';
                    }

                    if ( array_search( $returnPage['category'], array_column( $categories['pages'], 'key' ) ) === false ) {
                        $categories['pages'][] = [
                            'key'   => $returnPage['category'],
                            'label' => $oxygenCategories['pages'][ $returnPage['category'] ]
                        ];
                    }

                    if ( ! $shortcodes || empty( $shortcodes ) ) {
                        continue;
                    }

                    $pages[] = $returnPage;

                }

                if ( ! get_post_meta( $page->ID, '_ct_connection_use_sections', true ) && $page->post_type != 'oxy_user_library' ) {
                    continue;
                }

                $shortcodes = parse_shortcodes( $shortcodes, false );

                if ( is_array( $shortcodes['content'] ) && sizeof( $shortcodes['content'] ) > 0 ) {

                    if ( $page->post_type == 'oxy_user_library' && sizeof( $shortcodes['content'] ) > 1 ) {
                        $newItem = array(
                            'name'    => 'ct_div_block',
                            'id'      => 0,
                            'options' => []
                        );
                        $comp    = Utils::getComponentReady( 0, $newItem, $page, $screenshots, $ct_preview_url );
                        if ( $comp ) {
                            $k = array_search( $comp['category'], $oxygenCategories['components'] );
                            if ( array_search( $k, array_column( $categories['components'], 'key' ) ) === false ) {
                                $categories['components'][] = [
                                    'key'   => $k,
                                    'label' => $oxygenCategories['components'][ $k ]
                                ];
                            }
                            $comp['category'] = $k;
                            $components[]     = $comp;
                        }

                    } else {

                        foreach ( $shortcodes['content'] as $key => $item ) {
                            if ( $item['name'] == 'ct_section' || $item['name'] == 'oxy_header' || $item['name'] == 'ct_div_block' ) {
                                $comp = Utils::getComponentReady( $key, $item, $page, $screenshots, $ct_preview_url );
                                if ( $comp ) {
                                    $k = array_search( $comp['category'], $oxygenCategories['components'] );
                                    if ( array_search( $k, array_column( $categories['components'], 'key' ) ) === false ) {
                                        $categories['components'][] = [
                                            'key'   => $k,
                                            'label' => $oxygenCategories['components'][ $k ]
                                        ];
                                    }
                                    $comp['category'] = $k;
                                    $components[]     = $comp;
                                }
                            }
                        }
                    }

                }

            }

            return [
                'components' => $components,
                'pages'      => $pages,
                'categories' => $categories,
            ];
        } );


        if ( $data ) {
            return wp_send_json( $data );
        }
    }

    public function shortcodeDemo( $atts ) {
        show_admin_bar( false );

        wp_enqueue_style( 'asura-demo', ASURA_PLUGIN_URL . 'public/css/app.css', [], THELOSTASURA );
        wp_register_script( 'manifest', ASURA_PLUGIN_URL . 'public/js/manifest.js', [], null );
        wp_register_script( 'vendor', ASURA_PLUGIN_URL . 'public/js/vendor.js', [], null );
        wp_enqueue_script( 'asura-demo', ASURA_PLUGIN_URL . 'public/js/demo.js', [
            'manifest',
            'vendor',
        ], null );

        $atts        = shortcode_atts( [ 'designset' => null, ], $atts );
        $_designsets = isset( $_REQUEST['designset'] ) ? sanitize_text_field( $_REQUEST['designset'] ) : $atts['designset'];

        $designsets = [];

        if ( $_designsets ) {
            $_designsets = explode( ',', $_designsets );

            foreach ( $_designsets as $_designset ) {
                if ( term_exists( $_designset, 'designset' ) ) {
                    $designsets[] = $_designset;
                }
            }
        } else {
            $designsets = get_terms( [
                'taxonomy'   => 'designset',
                'hide_empty' => true,
                'fields'     => 'slugs'
            ] );
        }

        wp_localize_script( 'asura-demo', 'asura', [
            'ajaxurl'     => admin_url( 'admin-ajax.php' ),
            'nonce'       => wp_create_nonce( 'demo' ),
            'designsets'  => $designsets,
            'breakpoints' => [
                'full_screen'     => '100%',
                'max_width'       => (int) ct_get_global_settings()['max-width'],
                'tablet'          => oxygen_vsb_get_breakpoint_width( 'tablet' ),
                'phone_landscape' => oxygen_vsb_get_breakpoint_width( 'phone-landscape' ),
                'phone_portrait'  => oxygen_vsb_get_breakpoint_width( 'phone-portrait' ),
            ]
        ] );

        if ( ! empty( $designsets ) ) {
            return (string) view( 'vendor.oxygen.demo' );
        }
    }
}
