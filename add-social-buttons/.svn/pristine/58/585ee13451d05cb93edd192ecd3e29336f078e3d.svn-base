<?php
if (!defined('ABSPATH')) exit;


/**
 * Add Metaboxes
 */
function addsocialbuttons_add_metaboxes()
{
    add_meta_box('addsocialbuttons_meta_box', 'Your Buttons', 'addsocialbuttons_metaboxes', 'addsocialbuttons', 'normal', 'high', null);
}

add_action('add_meta_boxes', 'addsocialbuttons_add_metaboxes');


/**
 * Show the content of Metaboxes
 */
function addsocialbuttons_metaboxes()
{
    global $post;

    wp_nonce_field(basename(__FILE__), 'addsocialbuttons_nonce');
    ?>

    <table class="form-table addsocialbuttons_table">
        <tr>
            <th class="row-title" colspan="2">
                <h2>Report the Links</h2>
            </th>
        </tr>

        <tr>
            <th class="row-title">
                <label for="addsocialbuttons_btn_facebook">Facebook</label>
            </th>
            <td>
                <input value="<?= esc_attr(get_post_meta($post->ID, 'addsocialbuttons_btn_facebook', true)); ?>"
                       id="addsocialbuttons_btn_facebook"
                       name="addsocialbuttons_btn_facebook" class="regular-text" type="text"
                       placeholder="https://www.facebook.com/">
            </td>
        </tr>

        <tr>
            <th class="row-title">
                <label for="addsocialbuttons_btn_">Twitter</label>
            </th>
            <td>
                <input value="<?= esc_attr(get_post_meta($post->ID, 'addsocialbuttons_btn_twitter', true)); ?>"
                       id="addsocialbuttons_btn_twitter"
                       name="addsocialbuttons_btn_twitter" class="regular-text" type="text"
                       placeholder="https://twitter.com/">
            </td>
        </tr>

        <tr>
            <th class="row-title">
                <label for="addsocialbuttons_btn_instagram">Instagram</label>
            </th>
            <td>
                <input value="<?= esc_attr(get_post_meta($post->ID, 'addsocialbuttons_btn_instagram', true)); ?>"
                       id="addsocialbuttons_btn_instagram"
                       name="addsocialbuttons_btn_instagram" class="regular-text" type="text"
                       placeholder="https://www.instagram.com/">
            </td>
        </tr>

        <tr>
            <th class="row-title">
                <label for="addsocialbuttons_btn_linkedin">Linkedin</label>
            </th>
            <td>
                <input value="<?= esc_attr(get_post_meta($post->ID, 'addsocialbuttons_btn_linkedin', true)); ?>"
                       id="addsocialbuttons_btn_linkedin"
                       name="addsocialbuttons_btn_linkedin" class="regular-text" type="text"
                       placeholder="https://linkedin.com/">
            </td>
        </tr>

        <tr>
            <th class="row-title">
                <label for="addsocialbuttons_btn_youtube">Youtube</label>
            </th>
            <td>
                <input value="<?= esc_attr(get_post_meta($post->ID, 'addsocialbuttons_btn_youtube', true)); ?>"
                       id="addsocialbuttons_btn_youtube"
                       name="addsocialbuttons_btn_youtube" class="regular-text" type="text"
                       placeholder="https://youtube.com/">
            </td>
        </tr>

        <tr>
            <th class="row-title">
                <label for="addsocialbuttons_btn_pinterest">Pinterest</label>
            </th>
            <td>
                <input value="<?= esc_attr(get_post_meta($post->ID, 'addsocialbuttons_btn_pinterest', true)); ?>"
                       id="addsocialbuttons_btn_pinterest"
                       name="addsocialbuttons_btn_pinterest" class="regular-text" type="text"
                       placeholder="https://pinterest.com/">
            </td>
        </tr>

        <tr>
            <th class="row-title">
                <label for="addsocialbuttons_btn_flickr">Flickr</label>
            </th>
            <td>
                <input value="<?= esc_attr(get_post_meta($post->ID, 'addsocialbuttons_btn_flickr', true)); ?>"
                       id="addsocialbuttons_btn_flickr"
                       name="addsocialbuttons_btn_flickr" class="regular-text" type="text"
                       placeholder="https://www.flickr.com/">
            </td>
        </tr>

        <tr>
            <th class="row-title">
                <label for="addsocialbuttons_btn_yahoo">Yahoo</label>
            </th>
            <td>
                <input value="<?= esc_attr(get_post_meta($post->ID, 'addsocialbuttons_btn_yahoo', true)); ?>"
                       id="addsocialbuttons_btn_yahoo"
                       name="addsocialbuttons_btn_yahoo" class="regular-text" type="text"
                       placeholder="https://yahoo.com/">
            </td>
        </tr>

        <tr>
            <th class="row-title">
                <label for="addsocialbuttons_btn_behance">Behance</label>
            </th>
            <td>
                <input value="<?= esc_attr(get_post_meta($post->ID, 'addsocialbuttons_btn_behance', true)); ?>"
                       id="addsocialbuttons_btn_behance"
                       name="addsocialbuttons_btn_behance" class="regular-text" type="text"
                       placeholder="https://www.behance.net/">
            </td>
        </tr>

        <tr>
            <th class="row-title">
                <label for="addsocialbuttons_btn_blogger">Blogger</label>
            </th>
            <td>
                <input value="<?= esc_attr(get_post_meta($post->ID, 'addsocialbuttons_btn_blogger', true)); ?>"
                       id="addsocialbuttons_btn_blogger"
                       name="addsocialbuttons_btn_blogger" class="regular-text" type="text"
                       placeholder="https://www.blogger.com/">
            </td>
        </tr>

        <tr>
            <th class="row-title">
                <label for="addsocialbuttons_btn_dribbble">Dribbble</label>
            </th>
            <td>
                <input value="<?= esc_attr(get_post_meta($post->ID, 'addsocialbuttons_btn_dribbble', true)); ?>"
                       id="addsocialbuttons_btn_dribbble"
                       name="addsocialbuttons_btn_dribbble" class="regular-text" type="text"
                       placeholder="https://dribbble.com/">
            </td>
        </tr>

        <tr>
            <th class="row-title">
                <label for="addsocialbuttons_btn_google_plus">Google Plus</label>
            </th>
            <td>
                <input value="<?= esc_attr(get_post_meta($post->ID, 'addsocialbuttons_btn_google_plus', true)); ?>"
                       id="addsocialbuttons_btn_google_plus"
                       name="addsocialbuttons_btn_google_plus" class="regular-text" type="text"
                       placeholder="https://plus.google.com/">
            </td>
        </tr>

    </table>
    <?php
}


/**
 * Saves the content
 */
function addsocialbuttons_save_metaboxes($post_id, $post, $update)
{
    //Checking the Nonce
    if (!isset($_POST['addsocialbuttons_nonce']) || !wp_verify_nonce($_POST['addsocialbuttons_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    //If the user has permissions to change the data
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
        return $post_id;
    }

    //Starting vars
    $addsocialbuttons_btn_facebook = $addsocialbuttons_btn_twitter = $addsocialbuttons_btn_instagram = $addsocialbuttons_btn_linkedin = $addsocialbuttons_btn_youtube = $addsocialbuttons_btn_pinterest = $addsocialbuttons_btn_flickr = $addsocialbuttons_btn_yahoo = $addsocialbuttons_btn_behance = $addsocialbuttons_btn_blogger = $addsocialbuttons_btn_dribbble = $addsocialbuttons_btn_google_plus = '';

    if (isset($_POST['addsocialbuttons_btn_facebook'])) {
        $addsocialbuttons_btn_facebook = sanitize_text_field($_POST['addsocialbuttons_btn_facebook']);
    }
    update_post_meta($post_id, 'addsocialbuttons_btn_facebook', $addsocialbuttons_btn_facebook);

    if (isset($_POST['addsocialbuttons_btn_twitter'])) {
        $addsocialbuttons_btn_twitter = sanitize_text_field($_POST['addsocialbuttons_btn_twitter']);
    }
    update_post_meta($post_id, 'addsocialbuttons_btn_twitter', $addsocialbuttons_btn_twitter);

    if (isset($_POST['addsocialbuttons_btn_instagram'])) {
        $addsocialbuttons_btn_instagram = sanitize_text_field($_POST['addsocialbuttons_btn_instagram']);
    }
    update_post_meta($post_id, 'addsocialbuttons_btn_instagram', $addsocialbuttons_btn_instagram);

    if (isset($_POST['addsocialbuttons_btn_linkedin'])) {
        $addsocialbuttons_btn_linkedin = sanitize_text_field($_POST['addsocialbuttons_btn_linkedin']);
    }
    update_post_meta($post_id, 'addsocialbuttons_btn_linkedin', $addsocialbuttons_btn_linkedin);

    if (isset($_POST['addsocialbuttons_btn_youtube'])) {
        $addsocialbuttons_btn_youtube = sanitize_text_field($_POST['addsocialbuttons_btn_youtube']);
    }
    update_post_meta($post_id, 'addsocialbuttons_btn_youtube', $addsocialbuttons_btn_youtube);

    if (isset($_POST['addsocialbuttons_btn_pinterest'])) {
        $addsocialbuttons_btn_pinterest = sanitize_text_field($_POST['addsocialbuttons_btn_pinterest']);
    }
    update_post_meta($post_id, 'addsocialbuttons_btn_pinterest', $addsocialbuttons_btn_pinterest);

    if (isset($_POST['addsocialbuttons_btn_flickr'])) {
        $addsocialbuttons_btn_flickr = sanitize_text_field($_POST['addsocialbuttons_btn_flickr']);
    }
    update_post_meta($post_id, 'addsocialbuttons_btn_flickr', $addsocialbuttons_btn_flickr);

    if (isset($_POST['addsocialbuttons_btn_yahoo'])) {
        $addsocialbuttons_btn_yahoo = sanitize_text_field($_POST['addsocialbuttons_btn_yahoo']);
    }
    update_post_meta($post_id, 'addsocialbuttons_btn_yahoo', $addsocialbuttons_btn_yahoo);

    if (isset($_POST['addsocialbuttons_btn_behance'])) {
        $addsocialbuttons_btn_behance = sanitize_text_field($_POST['addsocialbuttons_btn_behance']);
    }
    update_post_meta($post_id, 'addsocialbuttons_btn_behance', $addsocialbuttons_btn_behance);

    if (isset($_POST['addsocialbuttons_btn_blogger'])) {
        $addsocialbuttons_btn_blogger = sanitize_text_field($_POST['addsocialbuttons_btn_blogger']);
    }
    update_post_meta($post_id, 'addsocialbuttons_btn_blogger', $addsocialbuttons_btn_blogger);

    if (isset($_POST['addsocialbuttons_btn_dribbble'])) {
        $addsocialbuttons_btn_dribbble = sanitize_text_field($_POST['addsocialbuttons_btn_dribbble']);
    }
    update_post_meta($post_id, 'addsocialbuttons_btn_dribbble', $addsocialbuttons_btn_dribbble);

    if (isset($_POST['addsocialbuttons_btn_google_plus'])) {
        $addsocialbuttons_btn_google_plus = sanitize_text_field($_POST['addsocialbuttons_btn_google_plus']);
    }
    update_post_meta($post_id, 'addsocialbuttons_btn_google_plus', $addsocialbuttons_btn_google_plus);

}

add_action('save_post', 'addsocialbuttons_save_metaboxes', 10, 3);