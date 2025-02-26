<?php
if (is_admin())
{
        add_action('admin_menu', 'pxc_amm_menu');
        add_action('admin_init', 'pxc_amm_init');
        add_action('admin_enqueue_scripts', 'pxc_amm_admin_enqueue_scripts');

        add_action('pre_add_option_pxc_amm_url_terms', 'pre_update_option_pxc_amm_url_terms', 10, 2);
        add_action('pre_update_option_pxc_amm_url_terms', 'pre_update_option_pxc_amm_url_terms', 10, 2);
        add_action('pre_add_option_pxc_amm_url_privacy', 'pre_update_option_pxc_amm_url_privacy', 10, 2);
        add_action('pre_update_option_pxc_amm_url_privacy', 'pre_update_option_pxc_amm_url_privacy', 10, 2);
        add_action('pre_add_option_pxc_amm_url_imprint', 'pre_update_option_pxc_amm_url_imprint', 10, 2);
        add_action('pre_update_option_pxc_amm_url_imprint', 'pre_update_option_pxc_amm_url_imprint', 10, 2);    
}

function pxc_amm_menu() {
        add_options_page(
        __("pxc-amm-settings-page-link", 'pxc_amm'),
        __("pxc-amm-settings-page-link", 'pxc_amm'), 
        'manage_options', 
        'pxc_amm',      
        'pxc_amm_options');
}

function pxc_amm_init() 
{
	register_setting('pxc_amm_group', 'pxc_amm_apikey', array('type' => 'string'));
	register_setting('pxc_amm_group', 'pxc_amm_url_terms', array('type' => 'string'));
	register_setting('pxc_amm_group', 'pxc_amm_url_privacy', array('type' => 'string'));
        register_setting('pxc_amm_group', 'pxc_amm_url_imprint', array('type' => 'string'));
        
        add_action('wp_ajax_hwp_ajax_page_search', function() {

                $s = wp_unslash( $_GET['q'] );
    
                $comma = _x( ',', 'page delimiter' );
                if ( ',' !== $comma )
                    $s = str_replace( $comma, ',', $s );
                if ( false !== strpos( $s, ',' ) ) {
                    $s = explode( ',', $s );
                    $s = $s[count( $s ) - 1];
                }
                $s = trim( $s );
    
                $term_search_min_chars = 2;
    
                $q = new WP_Query( 
                    array( 
                        's' => $s,
                        'posts_per_page' => 5,
                        'post_type' => 'page'
                        ) 
                    );
    
                if ($q->have_posts()) {
                    while ( $q->have_posts() ) {
                        $q->the_post();
                        $results[] = get_the_title();
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                } else {
                    $results = '';
                }
    
                echo join( $results, "\n" );
                wp_die();
        });
    
}

function pxc_amm_options() 
{
	include(PXC_AMM_PLUGIN_DIR . '/pxc-amm-settings-form.php');
}

function pxc_amm_admin_enqueue_scripts() 
{
        wp_enqueue_script('pxc-amm-admin', PXC_AMM_PLUGIN_URL . 'js/admin.js', array('suggest'), PXC_AMM_VERSION, true);
}

function pre_update_option_pxc_amm_url_terms($new_value, $old_value)
{
        return pxc_amm_update_url_option('pxc_amm_url_terms', $new_value);
}

function pre_update_option_pxc_amm_url_privacy($new_value, $old_value)
{
        return pxc_amm_update_url_option('pxc_amm_url_privacy', $new_value);
}

function pre_update_option_pxc_amm_url_imprint($new_value, $old_value)
{
        return pxc_amm_update_url_option('pxc_amm_url_imprint', $new_value);
}

function pxc_amm_update_url_option($option_name, $option_value)
{
        if ($option_value) {
                foreach ($option_value as $k => $v) {
                        
                        $p = get_page_by_title($v);
                        if ($p) {
                                $option_value[$k] = $p->ID;
                        }  
                }    
        }

        return @json_encode($option_value);
}