<?php
// A callback function to add custom fields to taxonomy page.
function pcme_title_desc_taxonomy_custom_fields($tag) {
    $t_id = $tag->term_id;
    $term_meta_page_title = get_term_meta($t_id, 'pcme_product_category_meta_title', true);
    $term_meta_page_description = get_term_meta($t_id, 'pcme_product_category_meta_description', true);
?>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="page_title"><?php _e('SEO Meta Title'); ?></label>
        </th>
        <td>
            <input type="text" name="term_meta[page_title]" id="term_meta[page_title]" size="40" value="<?php echo $term_meta_page_title ? $term_meta_page_title : ''; ?>"><br />
            <span class="description"><?php _e('The HTML meta title meta tag content value'); ?></span>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="page_desc"><?php _e('SEO Meta Description'); ?></label>
        </th>
        <td>
            <textarea name="term_meta[page_desc]" id="term_meta[page_desc]" rows="5" cols="50" class="large-text"><?php echo $term_meta_page_description ? $term_meta_page_description : ''; ?></textarea><br/>
            <span class="description"><?php _e('The HTML meta description tag content value'); ?></span>
        </td>
    </tr>
<?php
}

// A callback function to save SEO title and description values.
function pcme_save_taxonomy_custom_fields($term_id) {
    if (isset( $_POST['term_meta'])) {
        if (!get_term_meta($term_id, 'pcme_product_category_meta_title')) {
            add_term_meta($term_id, 'pcme_product_category_meta_title', '', true);
        }
        if (isset($_POST['term_meta']['page_title'])) {
            $page_title = sanitize_text_field($_POST['term_meta']['page_title']);
            update_term_meta($term_id, 'pcme_product_category_meta_title', $page_title);
        }
        if (!get_term_meta($term_id, 'pcme_product_category_meta_description')) {
            add_term_meta($term_id, 'pcme_product_category_meta_description', '', true);
        }
        if (isset($_POST['term_meta']['page_desc'])) {
            $page_desc = sanitize_textarea_field($_POST['term_meta']['page_desc']);
            update_term_meta($term_id, 'pcme_product_category_meta_description', $page_desc);
        }
    }
}
