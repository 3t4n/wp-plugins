<?php 


/**
 * This file registers new custom field at Slider Taxanomy to display a shortcode
 *
 * @package    	Terra_Themes_Tools
 * @link        http://terra-themes.com, https://paulund.co.uk/add-custom-meta-taxonomies
 * Author:      Paulund
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * Custom Taxanomy is "slides-category", registered on post-type-slider.php
 */


// Add fields on custom taxonomies
add_action( 'slides-category_edit_form_fields', 'add_edit_custom_fields');
add_action( 'edited_slides-category', 'save_custom_taxonomy_meta');


/**
 * Add the edit custom fields
 */
function add_edit_custom_fields( $term )
{
    $termMeta = get_option( 'custom_taxonomy_meta_' . $term->term_id );
    $shortcode = '[terra-themes-header-slider slider="' . $term->slug . '" autoplay="5000" transition="fade" navigation="true" pagination="true" stop_on_hover="true" overlay="true" responsive="false"]';
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="term_meta[field1]"><?php _e( 'Slider Shortcode', 'terra_themes_tools' ); ?></label></th>
        <td>
            <input type='text' name='term_meta[field1]' id='term_meta[field1]' readonly='' value='<?php echo $shortcode ?>'><br />
            <span class="description"><?php _e('Info: autoplay (false or duration in ms), transition (fade, fadeUp, backSlide, goDown), navigation (true/false), pagination (true/false), stop_on_hover (true/false), overlay (true/false), responsive (true/false) image scaling on smaller screens < 992px.', 'terra_themes_tools'); ?></span><br />
            <span class="description"><?php _e('Use this shortcode to insert it on a page.', 'terra_themes_tools'); ?></span>
        </td>
    </tr>
    <?php
}

/**
 * Add a column to add custom fields
 */
function add_shortcode_column($columns) {
    $new_columns = array(
        'cb' => '<input type="checkbox" />',
        'name' => __('Name', 'terra_themes_tools'),
        'shortcode' => __('Shortcode', 'terra_themes_tools'),
        //'description' => __('Description', 'terra_themes_tools'),
        'slug' => __('Slug', 'terra_themes_tools'),
        'posts' => __('Slides', 'terra_themes_tools')
        );
    return $new_columns;
}
add_filter("manage_edit-slides-category_columns", 'add_shortcode_column'); 


function manage_theme_columns($output, $column_name, $term_id) {
    $term = get_term($term_id, 'slides-category');
        switch ($column_name) {
        case 'shortcode':
            $output = '[terra-themes-header-slider slider="' . $term->slug . '" autoplay="5000" transition="fade" navigation="true" pagination="true" stop_on_hover="true" overlay="true" responsive="false"]';
            break;
 
        default:
            break;
    }
    return $output;   
}
add_filter("manage_slides-category_custom_column", 'manage_theme_columns', 10, 3);