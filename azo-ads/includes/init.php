<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Register Custom Post Type for AZO Ads
 * 
 * @since 1.0.0
 * @return array
 */
add_action( 'init', 'azoads_register_post_type' );
function azoads_register_post_type() {

	/**
	 * Post Type: AZO Ads.
	 */

	$labels = [
		'name' => esc_html__( 'AZO Ads', 'azo-ads' ),
		'singular_name' => esc_html__( 'AZO Ads', 'azo-ads' ),
	];

	$args = [
		'label' => esc_html__( 'AZO Ads', 'azo-ads' ),
		'labels' => $labels,
		'description' => '',
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => false,
		'show_in_rest' => true,
		'rest_base' => '',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'rest_namespace' => 'wp/v2',
		'has_archive' => false,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'delete_with_user' => false,
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'can_export' => false,
		'rewrite' => [ 'slug' => 'azo-ads', 'with_front' => true ],
		'query_var' => true,
		'supports' => [ 'title', 'editor', 'thumbnail' ],
		'show_in_graphql' => false,
	];

	register_post_type( 'azo-ads', $args );
}

/**
 * Get all options, ads... and store into global variable
 * 
 * @since 1.0.0
 * @return array
 */
add_action( 'init', 'azoads_init_options' );
function azoads_init_options() {
    global $azoads_options;
    $azoads_options = get_option( 'azoads_options' );
}

/**
 * Get list ad id from current page after checked visibility & targeting of individual ad
 * 
 * @return array
 */
add_action( 'wp', 'azoads_get_ads_from_current_page' );
function azoads_get_ads_from_current_page() {
    global $azoads_options, $azoads_active, $post;

    // empty ads so do nothing
    if ( empty( $azoads_options['ads'] ) ) return;

    $azoads_active = array();
    
    foreach ( $azoads_options['ads'] as $aa ) {

        // VISIBILITY: include
        $aa['aa_visibility_include'] = isset( $aa['aa_visibility_include'] ) ? $aa['aa_visibility_include'] : null;
        $visibility_include = unserialize( (string) $aa['aa_visibility_include'] );
        $logic_result_vi_pre = true;
        if ( ! empty( $visibility_include ) ) {
            $logic_cond_pre = '';
            foreach ( $visibility_include as $vi ) {
                $logic_cond = isset( $vi->condition ) ? $vi->condition : 'and';
                $logic_result = azoads_logic_visibility( $vi );
                
                switch ( $logic_cond_pre ) {
                    case 'and':
                        $logic_result_vi_pre = $logic_result_vi_pre &&  $logic_result;
                        $logic_cond_pre = $logic_cond;
                        break;
                    case 'or':
                        $logic_result_vi_pre = $logic_result_vi_pre ||  $logic_result;
                        $logic_cond_pre = $logic_cond;
                        break;
                    default:
                        $logic_result_vi_pre = $logic_result;
                        $logic_cond_pre = $logic_cond;
                        break;
                }
            }
        }

        // VISIBILITY: exclude
        $aa['aa_visibility_exclude'] = isset( $aa['aa_visibility_exclude'] ) ? $aa['aa_visibility_exclude'] : null;
        $visibility_exclude = unserialize( (string) $aa['aa_visibility_exclude'] );
        $logic_result_ve_pre = false;
        if ( ! empty( $visibility_exclude ) ) {
            $logic_cond_pre = '';
            foreach ( $visibility_exclude as $ve ) {
                $logic_cond = isset( $ve->condition ) ? $ve->condition : 'and';
                $logic_result = azoads_logic_visibility( $ve );
                switch ( $logic_cond_pre ) {
                    case 'and':
                        $logic_result_ve_pre = $logic_result_ve_pre &&  $logic_result;
                        $logic_cond_pre = $logic_cond;
                        break;
                    case 'or':
                        $logic_result_ve_pre = $logic_result_ve_pre ||  $logic_result;
                        $logic_cond_pre = $logic_cond;
                        break;
                    default:
                        $logic_cond_pre = $logic_cond;
                        $logic_result_ve_pre = $logic_result;
                        break;
                }
            }
        }

        // TARGETING: include
        $aa['aa_targeting_include'] = isset( $aa['aa_targeting_include'] ) ? $aa['aa_targeting_include'] : null;
        $targeting_include = unserialize( (string) $aa['aa_targeting_include'] );
        $logic_result_ti_pre = true;

        if ( ! empty( $targeting_include ) ) {
            $logic_cond_pre = '';
            foreach ( $targeting_include as $ti ) {
                $logic_cond = isset( $ti->condition ) ? $ti->condition : 'and';
                $logic_result = azoads_logic_targeting( $ti );
                
                switch ( $logic_cond_pre ) {
                    case 'and':
                        $logic_result_ti_pre = $logic_result_ti_pre &&  $logic_result;
                        $logic_cond_pre = $logic_cond;
                        break;
                    case 'or':
                        $logic_result_ti_pre = $logic_result_ti_pre ||  $logic_result;
                        $logic_cond_pre = $logic_cond;
                        break;
                    default:
                        $logic_result_ti_pre = $logic_result;
                        $logic_cond_pre = $logic_cond;
                        break;
                }
            }
        }

        // TARGETING: exclude
        $aa['aa_targeting_exclude'] = isset( $aa['aa_targeting_exclude'] ) ? $aa['aa_targeting_exclude'] : null;
        $targeting_exclude = unserialize( (string) $aa['aa_targeting_exclude'] );
        $logic_result_te_pre = false;
        if ( ! empty( $targeting_exclude ) ) {
            $logic_cond_pre = '';
            foreach ( $targeting_exclude as $te ) {
                $logic_cond = isset( $te->condition ) ? $te->condition : 'and';
                $logic_result = azoads_logic_targeting( $te );
                switch ( $logic_cond_pre ) {
                    case 'and':
                        $logic_result_te_pre = $logic_result_te_pre &&  $logic_result;
                        $logic_cond_pre = $logic_cond;
                        break;
                    case 'or':
                        $logic_result_te_pre = $logic_result_te_pre ||  $logic_result;
                        $logic_cond_pre = $logic_cond;
                        break;
                    default:
                        $logic_cond_pre = $logic_cond;
                        $logic_result_te_pre = $logic_result;
                        break;
                }
            }
        }
        
        // final logic
        if ( $logic_result_vi_pre && ! $logic_result_ve_pre && $logic_result_ti_pre && ! $logic_result_te_pre ) array_push( $azoads_active, $aa['aa_id'] );
    }
    return $azoads_active;
}
