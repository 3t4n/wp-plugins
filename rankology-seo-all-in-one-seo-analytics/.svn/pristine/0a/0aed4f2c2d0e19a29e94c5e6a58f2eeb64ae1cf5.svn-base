<?php

function rankology_get_dyn_variables()
{
    return apply_filters('rankology_get_dynamic_variables', [
        '%%sep%%'                           => 'Separator',
        '%%sitetitle%%'                     => __('Site Title', 'wp-rankology'),
        '%%tagline%%'                       => __('Tagline', 'wp-rankology'),
        '%%post_title%%'                    => __('Post Title', 'wp-rankology'),
        '%%post_excerpt%%'                  => __('Post excerpt', 'wp-rankology'),
        '%%post_content%%'                  => __('Post content / product description', 'wp-rankology'),
        '%%post_thumbnail_url%%'            => __('Post thumbnail URL', 'wp-rankology'),
        '%%post_url%%'                      => __('Post URL', 'wp-rankology'),
        '%%post_date%%'                     => __('Post date', 'wp-rankology'),
        '%%post_modified_date%%'            => __('Post modified date', 'wp-rankology'),
        '%%post_author%%'                   => __('Post author', 'wp-rankology'),
        '%%post_category%%'                 => __('Post category', 'wp-rankology'),
        '%%post_tag%%'                      => __('Post tag', 'wp-rankology'),
        '%%_category_title%%'               => __('Category title', 'wp-rankology'),
        '%%_category_description%%'         => __('Category description', 'wp-rankology'),
        '%%tag_title%%'                     => __('Tag title', 'wp-rankology'),
        '%%tag_description%%'               => __('Tag description', 'wp-rankology'),
        '%%term_title%%'                    => __('Term title', 'wp-rankology'),
        '%%term_description%%'              => __('Term description', 'wp-rankology'),
        '%%search_keywords%%'               => __('Search keywords', 'wp-rankology'),
        '%%current_pagination%%'            => __('Current number page', 'wp-rankology'),
        '%%page%%'                          => __('Page number with context', 'wp-rankology'),
        '%%cpt_plural%%'                    => __('Plural Post Type Archive name', 'wp-rankology'),
        '%%archive_title%%'                 => __('Archive title', 'wp-rankology'),
        '%%archive_date%%'                  => __('Archive date', 'wp-rankology'),
        '%%archive_date_day%%'              => __('Day Archive date', 'wp-rankology'),
        '%%archive_date_month%%'            => __('Month Archive title', 'wp-rankology'),
        '%%archive_date_month_name%%'       => __('Month name Archive title', 'wp-rankology'),
        '%%archive_date_year%%'             => __('Year Archive title', 'wp-rankology'),
        '%%_cf_your_custom_field_name%%'    => __('Custom fields from post, page, post type and term taxonomy', 'wp-rankology'),
        '%%_ct_your_custom_taxonomy_slug%%' => __('Custom term taxonomy from post, page or post type', 'wp-rankology'),
        '%%wc_single_cat%%'                 => __('Single product category', 'wp-rankology'),
        '%%wc_single_tag%%'                 => __('Single product tag', 'wp-rankology'),
        '%%wc_single_short_desc%%'          => __('Single product short description', 'wp-rankology'),
        '%%wc_single_price%%'               => __('Single product price', 'wp-rankology'),
        '%%wc_single_price_exc_tax%%'       => __('Single product price taxes excluded', 'wp-rankology'),
        '%%wc_sku%%'                        => __('Single SKU product', 'wp-rankology'),
        '%%currentday%%'                    => __('Current day', 'wp-rankology'),
        '%%currentmonth%%'                  => __('Current month', 'wp-rankology'),
        '%%currentmonth_short%%'            => __('Current month in 3 letters', 'wp-rankology'),
        '%%currentyear%%'                   => __('Current year', 'wp-rankology'),
        '%%currentdate%%'                   => __('Current date', 'wp-rankology'),
        '%%currenttime%%'                   => __('Current time', 'wp-rankology'),
        '%%author_first_name%%'             => __('Author first name', 'wp-rankology'),
        '%%author_last_name%%'              => __('Author last name', 'wp-rankology'),
        '%%author_website%%'                => __('Author website', 'wp-rankology'),
        '%%author_nickname%%'               => __('Author nickname', 'wp-rankology'),
        '%%author_bio%%'                    => __('Author biography', 'wp-rankology'),
        '%%_ucf_your_user_meta%%'           => __('Custom User Meta', 'wp-rankology'),
        '%%currentmonth_num%%'              => __('Current month in digital format', 'wp-rankology'),
        '%%target_keyword%%'                => __('Target keyword', 'wp-rankology'),
    ]);
}

/**
 * @param string $classes
 *
 * @return string
 */
function rankology_render_dyn_variables($classes)
{
    $html = sprintf('<button type="button" class="'.rankology_btn_secondary_classes().' rankology-tag-single-all rankology-tag-dropdown %s"><span class="dashicons dashicons-arrow-down-alt2"></span></button>', $classes);
    if (! empty(rankology_get_dyn_variables())) {
        $html .= '<div class="rkseo-wrap-tag-variables-list"><ul class="rkseo-tag-variables-list">';
        foreach (rankology_get_dyn_variables() as $key => $value) {
            $html .= '<li data-value=' . $key . ' tabindex="0"><span>' . $value . '</span></li>';
        }
        $html .= '</ul></div>';
    }

    return $html;
}


// function rankology_get_dynamic_variables_with_post_id($post_id) {
//     return apply_filters('rankology_get_dynamic_variables_with_post_id', [
//         '%%sep%%' => '|', // Separator
//         '%%sitetitle%%' => get_bloginfo('name'), // Site Title
//         '%%tagline%%' => get_bloginfo('description'), // Tagline
//         '%%post_title%%' => $post_id ? get_the_title($post_id) : '', // Post Title
//         '%%post_excerpt%%' => $post_id ? get_the_excerpt($post_id) : '', // Post Excerpt
//         '%%post_content%%' => $post_id ? get_post_field('post_content', $post_id) : '', // Post Content
//         '%%post_thumbnail_url%%' => $post_id ? get_the_post_thumbnail_url($post_id) : '', // Post Thumbnail URL
//         '%%post_url%%' => $post_id ? get_permalink($post_id) : '', // Post URL
//         '%%post_date%%' => $post_id ? get_the_date('', $post_id) : '', // Post Date
//         '%%post_modified_date%%' => $post_id ? get_the_modified_date('', $post_id) : '', // Post Modified Date
//         '%%post_author%%' => $post_id ? get_the_author_meta('display_name', get_post_field('post_author', $post_id)) : '', // Post Author
//         '%%post_category%%' => $post_id ? get_the_category_list(', ', '', $post_id) : '', // Post Categories
//         '%%post_tag%%' => $post_id ? get_the_tag_list('', ', ', '', $post_id) : '', // Post Tags
//         '%%_cf_your_custom_field_name%%' => $post_id ? get_post_meta($post_id, 'your_custom_field_name', true) : '', // Custom Field
//         '%%_ct_your_custom_taxonomy_slug%%' => $post_id ? get_the_term_list($post_id, 'your_custom_taxonomy_slug', '', ', ', '') : '', // Custom Taxonomy
//         '%%wc_single_cat%%' => $post_id ? wc_get_product_category_list($post_id) : '', // Product Category
//         '%%wc_single_tag%%' => $post_id ? wc_get_product_tag_list($post_id) : '', // Product Tag
//         '%%wc_single_short_desc%%' => $post_id ? wp_strip_all_tags(get_post_meta($post_id, '_short_description', true)) : '', // Product Short Description
//         '%%wc_single_price%%' => $post_id ? wc_get_product($post_id)->get_price() : '', // Product Price
//         '%%wc_single_price_exc_tax%%' => $post_id ? wc_get_price_excluding_tax(wc_get_product($post_id)) : '', // Product Price Excluding Tax
//         '%%wc_sku%%' => $post_id ? wc_get_product($post_id)->get_sku() : '', // SKU
//     ]);
// }


function convert_text_with_dynamic_variables($string, $post_id) {
    //global $post;
    $post = $post_id ? get_post($post_id) : null;
    // Get dynamic variables and their replacements
    $dynamic_variables = rankology_get_dyn_variables();

    // Fetch additional data for dynamic replacements
    $replacements = [
       '%%sep%%' => '-', // Separator
        '%%sitetitle%%' => get_bloginfo('name'), // Site Title
        '%%tagline%%' => get_bloginfo('description'), // Tagline
        '%%post_title%%' =>  get_the_title($post_id)  , // Post Title
        '%%post_excerpt%%' =>  get_the_excerpt($post_id)  , // Post Excerpt
        '%%post_content%%' => get_post_field('post_content', $post_id) , // Post Content
        '%%post_thumbnail_url%%' =>  get_the_post_thumbnail_url($post_id) , // Post Thumbnail URL
        '%%post_url%%' =>  get_permalink($post_id) , // Post URL
        '%%post_date%%' => get_the_date('', $post_id) , // Post Date
        '%%post_modified_date%%' =>  get_the_modified_date('', $post_id) , // Post Modified Date
        '%%post_author%%' =>  get_the_author_meta('display_name', get_post_field('post_author', $post_id)) , // Post Author
        '%%post_category%%' =>  get_the_category_list(', ', '', $post_id) , // Post Categories
        
        '%%_cf_your_custom_field_name%%' =>  get_post_meta($post_id, 'your_custom_field_name', true) , // Custom Field
        
       
    ];


    
    // Combine static and dynamic replacements
    $replacements = array_merge($dynamic_variables, $replacements);

    // Replace placeholders with actual values
    $converted_text = str_replace(array_keys($replacements), array_values($replacements), $string);

    return $converted_text;
}
// Example usage
// $post_id = 123; // Replace with your actual post ID
// $string = "Post Title: %%post_title%% | Date: %%post_date%% | Author: %%post_author%%";
// $converted_text = convert_text_with_dynamic_variables($string, $post_id);

// echo $converted_text;

