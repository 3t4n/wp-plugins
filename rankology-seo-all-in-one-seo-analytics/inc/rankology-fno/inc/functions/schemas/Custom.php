<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Custom JSON-LD
function rankology_automatic_rich_snippets_custom_option($schema_datas) {
    //if no data
    if (0 != count(array_filter($schema_datas))) {
        $custom 							= $schema_datas['custom'];

        $variables = null;
        $variables = apply_filters('rankology_dyn_variables_fn', $variables);

        $post                                     = $variables['post'];
        $term                                     = $variables['term'];
        $rankology_titles_title_template           = $variables['rankology_titles_title_template'];
        $rankology_titles_description_template     = $variables['rankology_titles_description_template'];
        $rankology_paged                           = $variables['rankology_paged'];
        $the_author_meta                          = $variables['the_author_meta'];
        $sep                                      = $variables['sep'];
        $rankology_excerpt                         = $variables['rankology_excerpt'];
        $post_category                            = $variables['post_category'];
        $post_tag                                 = $variables['post_tag'];
        $post_thumbnail_url                       = $variables['post_thumbnail_url'];
        $get_search_query                         = $variables['get_search_query'];
        $woo_single_cat_html                      = $variables['woo_single_cat_html'];
        $woo_single_tag_html                      = $variables['woo_single_tag_html'];
        $woo_single_price                         = $variables['woo_single_price'];
        $woo_single_price_exc_tax                 = $variables['woo_single_price_exc_tax'];
        $woo_single_sku                           = $variables['woo_single_sku'];
        $author_bio                               = $variables['author_bio'];
        $rankology_get_the_excerpt                 = $variables['rankology_get_the_excerpt'];
        $rankology_titles_template_variables_array = $variables['rankology_titles_template_variables_array'];
        $rankology_titles_template_replace_array   = array_map(function($value) {
            return $value !== null ? htmlentities($value) : null;
        }, $variables['rankology_titles_template_replace_array']);
        $rankology_excerpt_length                  = $variables['rankology_excerpt_length'];

        preg_match_all('/%%_cf_(.*?)%%/', $custom, $matches); //custom fields

        if ( ! empty($matches)) {
            $rankology_titles_cf_template_variables_array = [];
            $rankology_titles_cf_template_replace_array   = [];

            foreach ($matches['0'] as $key => $value) {
                $rankology_titles_cf_template_variables_array[] = $value;
            }

            foreach ($matches['1'] as $key => $value) {
                $rankology_titles_cf_template_replace_array[] = esc_attr(get_post_meta($post->ID, $value, true));
            }
        }

        preg_match_all('/%%_ct_(.*?)%%/', $custom, $matches2); //custom terms taxonomy

        if ( ! empty($matches2)) {
            $rankology_titles_ct_template_variables_array = [];
            $rankology_titles_ct_template_replace_array   = [];

            foreach ($matches2['0'] as $key => $value) {
                $rankology_titles_ct_template_variables_array[] = $value;
            }

            foreach ($matches2['1'] as $key => $value) {
                $term = wp_get_post_terms($post->ID, $value);
                if ( ! is_wp_error($term)) {
                    $rankology_titles_ct_template_replace_array[] = esc_attr($term[0]->name);
                }
            }
        }

        //Default
        $custom = str_replace($rankology_titles_template_variables_array, $rankology_titles_template_replace_array, $custom);

        //Custom fields
        if ( ! empty($matches) && ! empty($rankology_titles_cf_template_variables_array) && ! empty($rankology_titles_cf_template_replace_array)) {
            $custom = str_replace($rankology_titles_cf_template_variables_array, $rankology_titles_cf_template_replace_array, $custom);
        }

        //Custom terms taxonomy
        if ( ! empty($matches2) && ! empty($rankology_titles_ct_template_variables_array) && ! empty($rankology_titles_ct_template_replace_array)) {
            $custom = str_replace($rankology_titles_ct_template_variables_array, $rankology_titles_ct_template_replace_array, $custom);
        }

        $html = wp_specialchars_decode($custom, ENT_COMPAT);

        $html .= "\n";

        $html = apply_filters('rankology_schemas_auto_custom_html', $html);

        echo $html;
    }
}
