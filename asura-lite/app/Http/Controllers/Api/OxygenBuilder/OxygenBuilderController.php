<?php

namespace Asura\Http\Controllers\Api\OxygenBuilder;

use Asura\Http\Controllers\Api\Controller;
use Asura\Integration\Vendor\OxygenBuilder\Utils;
use Asura\Models\License;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

/**
 * @version  3.7.beta-1
 */
class OxygenBuilderController extends Controller {

    /**
     * @see \OXY_VSB_Connection::oxygen_vsb_connection_items
     */
    public function items( Request $request ) {
        $this->validate( $request, [
            'hash'      => 'required|string|exists:\Asura\Models\License,hash',
            'term_slug' => 'required|string'
        ] );

        $license = License::where( 'hash', $request->hash )->first();

        if ( ( bool ) $license->status === false ) {
            return new JsonResponse( [ 'disabled' => 'Your license is disabled.' ], 403 );
        }

        if ( $license->expire_at && Carbon::parse( $license->expire_at )->lessThan( Carbon::today() ) ) {
            return new JsonResponse( [ 'expired' => 'Your license is expired.' ], 422 );
        }

        $term = $license->terms()->where( 'slug', $request->term_slug )->first();

        if ( ! $term ) {
            return new JsonResponse( [ 'not_found' => 'The term provided could not be found on license key.' ], 404 );
        } elseif ( (bool) $term->pivot->status === false ) {
            return new JsonResponse( [ 'disabled' => 'Your license is restricted from accessing the term.' ], 403 );
        }

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
                    'terms'    => $request->term_slug
                ],
            ],
        ] );

        $pages = [];

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
                    'url'            => $ct_preview_url ? $ct_preview_url : get_permalink( $page->ID ),
                    'type'           => $page->post_type,
                    'screenshot_url' => $providedScreenshot ? $providedScreenshot : ( ( is_array( $screenshots ) && isset( $screenshots['page'] ) ) ? $screenshots['page'] : 'https://via.placeholder.com/600x100?text=no+screenshot' )
                ];

                $page_category = get_post_meta( $page->ID, '_ct_connection_page_category', true );

                if ( $page_category ) {
                    $returnPage['category'] = $page_category;
                } else {
                    $returnPage['category'] = 'Uncategorized';
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
                        $components[] = $comp;
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
                                $components[] = $comp;
                            }
                        }
                    }
                }
            }
        }

        return JsonResource::collection( collect( [
            'components' => $components,
            'pages'      => $pages,
            'categories' => $categories,
        ] ) );
    }

    /**
     * @see \OXY_VSB_Connection::oxygen_vsb_connection_page_classes
     */
    public function pageClasses( Request $request ) {
        $this->validate( $request, [
            'hash'      => 'required|string|exists:\Asura\Models\License,hash',
            'term_slug' => 'required|string',
            'post_id'   => 'required|numeric|min:0'
        ] );

        $license = License::where( 'hash', $request->hash )->first();

        if ( ( bool ) $license->status === false ) {
            return new JsonResponse( [ 'disabled' => 'Your license is disabled.' ], 403 );
        }

        if ( $license->expire_at && Carbon::parse( $license->expire_at )->lessThan( Carbon::today() ) ) {
            return new JsonResponse( [ 'expired' => 'Your license is expired.' ], 422 );
        }

        $term = $license->terms()->where( 'slug', $request->term_slug )->first();

        if ( ! $term ) {
            return new JsonResponse( [ 'not_found' => 'The term provided could not be found on license key.' ], 404 );
        } elseif ( (bool) $term->pivot->status === false ) {
            return new JsonResponse( [ 'disabled' => 'Your license is restricted from accessing the term.' ], 403 );
        }

        $post = get_post( (int) $request->post_id );

        if ( ! $post ) {
            return new JsonResponse( [ 'not_found' => 'The post provided could not be found' ], 404 );
        } elseif ( ! has_term( $term->term_id, 'designset', $post ) ) {
            return new JsonResponse( [ 'not_found' => 'the term provided could not be found on the post' ], 404 );
        }

        $shortcodes = get_post_meta( $post->ID, 'ct_builder_shortcodes', true );
        $shortcodes = parse_shortcodes( $shortcodes, false );

        $globalColors = get_option( 'oxygen_vsb_global_colors', [] );

        foreach ( $shortcodes['content'] as $key => $item ) {

            // recursively go through the component and replace any re-usable with the corresponding content
            if ( isset( $shortcodes['content'][ $key ]['children'] ) ) {
                $shortcodes['content'][ $key ]['children'] = Utils::recursivelyReplaceReusable( $item['children'] );
            }

        }

        $appliedClasses = Utils::appliedClasses( $shortcodes );

        $appliedGlobalColors = [];

        $appliedGlobalColors = Utils::extractGlobalColors( $shortcodes, $globalColors );

        $allClasses = get_option( 'ct_components_classes' );

        $appliedClasses = array_intersect_key( $allClasses, $appliedClasses );

        // find applied global colors in the applied classes
        $appliedGlobalColors = Utils::extractGlobalColors( $appliedClasses, $globalColors ) + $appliedGlobalColors;

        $result = [
            'components' => $shortcodes['content'],
            'classes'    => $appliedClasses,
            'colors'     => $appliedGlobalColors
        ];

        $oxygen_vsb_color_lookup_table = get_option( 'oxygen_vsb_color_lookup_table', false );
        if ( is_array( $oxygen_vsb_color_lookup_table ) ) {
            $result['lookuptable'] = $oxygen_vsb_color_lookup_table;
        }

        return JsonResource::collection( collect( $result ) );
    }

    /**
     * @see \OXY_VSB_Connection::oxygen_vsb_connection_component_classes
     */
    public function componentClasses( Request $request ) {
        $this->validate( $request, [
            'hash'         => 'required|string|exists:\Asura\Models\License,hash',
            'term_slug'    => 'required|string',
            'post_id'      => 'required|numeric|min:0',
            'component_id' => 'required|numeric|min:0'
        ] );

        $license = License::where( 'hash', $request->hash )->first();

        if ( ( bool ) $license->status === false ) {
            return new JsonResponse( [ 'disabled' => 'Your license is disabled.' ], 403 );
        }

        if ( $license->expire_at && Carbon::parse( $license->expire_at )->lessThan( Carbon::today() ) ) {
            return new JsonResponse( [ 'expired' => 'Your license is expired.' ], 422 );
        }

        $term = $license->terms()->where( 'slug', $request->term_slug )->first();

        if ( ! $term ) {
            return new JsonResponse( [ 'not_found' => 'The term provided could not be found on license key.' ], 404 );
        } elseif ( (bool) $term->pivot->status === false ) {
            return new JsonResponse( [ 'disabled' => 'Your license is restricted from accessing the term.' ], 403 );
        }

        $id = (int) $request->component_id;

        $post = get_post( (int) $request->post_id );

        if ( ! $post ) {
            return new JsonResponse( [ 'not_found' => 'The post provided could not be found' ], 404 );
        } elseif ( ! has_term( $term->term_id, 'designset', $post ) ) {
            return new JsonResponse( [ 'not_found' => 'the term provided could not be found on the post' ], 404 );
        }

        $shortcodes = get_post_meta( $post->ID, 'ct_builder_shortcodes', true );

        $shortcodes = parse_shortcodes( $shortcodes, false );

        $globalColors = get_option( 'oxygen_vsb_global_colors', [] );

        if ( $id === 0 ) {
            $item = [
                'name'     => 'ct_div_block',
                'id'       => 0,
                'options'  => [
                    'nicename' => $post->post_title
                ],
                'children' => $shortcodes['content'],
            ];

            return JsonResource::collection( collect( Utils::processComponent( $item, $globalColors ) ) );
        } else {
            foreach ( $shortcodes['content'] as $key => $item ) {

                if ( $item['id'] === $id ) {

                    return JsonResource::collection( collect( Utils::processComponent( $item, $globalColors ) ) );
                }

            }

            return new JsonResponse( [ 'not_found' => 'the component provided could not be found' ], 404 );
        }
    }

}
