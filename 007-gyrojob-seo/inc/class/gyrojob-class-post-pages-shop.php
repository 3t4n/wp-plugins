<?php

// Prevent direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


class Gyrojob_SEO_Page_Shop_Description {

    public function __construct() {
        add_action('add_meta_boxes', [$this, 'gyrojob_seo_meta_boxes']);
        add_action('save_post', [$this, 'gyrojob_seo_save_meta_box_data']);
        add_action('wp_head', [$this, 'gyrojob_seo_output_meta_tags'],'');
    }

    public function gyrojob_seo_meta_boxes() {
        add_meta_box(
            'gyrojob_seo_meta_tags_meta_box',
            'Gyrojob SEO',
            [$this, 'gyrojob_seo_render_meta_box'],
            ['post', 'page'],
            'normal',
            'high'
        );
    }

    public function gyrojob_seo_render_meta_box($post) {
                // Add a nonce field.
        wp_nonce_field( 'gyrojob_seo_save_meta_box_data', 'gyrojob_seo_meta_post_page_nonce' );
        
        $meta_title = get_post_meta($post->ID,             '_gyrojob_seo_post_meta_title', true);
        $meta_description = get_post_meta($post->ID, '_gyrojob_seo_post_meta_description', true);
        $meta_noindex = get_post_meta($post->ID,         '_gyrojob_seo_post_meta_noindex', true);
        $meta_nofollow = get_post_meta($post->ID,       '_gyrojob_seo_post_meta_nofollow', true);
        $meta_canonical = get_post_meta($post->ID,     '_gyrojob_seo_post_meta_canonical', true);

        ?>
                <table class="form-table">
            <tr>
                <th><label for="gyrojob_seo_meta_title">Title</label></th>
                <td><input type="text" name="gyrojob_seo_meta_title" id="gyrojob_seo_meta_title" value="<?php echo esc_attr($meta_title); ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th><label for="gyrojob_seo_meta_description">Description</label></th>
                <td><textarea name="gyrojob_seo_meta_description" id="gyrojob_seo_meta_description" class="large-text"><?php echo esc_textarea($meta_description); ?></textarea></td>
            </tr>
            <tr>
                <th>Noindex</th>
                <td>
                    <label><input type="radio" name="gyrojob_seo_meta_noindex" value="1" <?php checked($meta_noindex, '1'); ?>> Yes</label>
                    <label><input type="radio" name="gyrojob_seo_meta_noindex" value="0" <?php checked($meta_noindex, '0'); ?> checked> No</label>
                </td>
            </tr>
            <tr>
                <th>Nofollow</th>
                <td>
                    <label><input type="radio" name="gyrojob_seo_meta_nofollow" value="1" <?php checked($meta_nofollow, '1'); ?>> Yes</label>
                    <label><input type="radio" name="gyrojob_seo_meta_nofollow" value="0" <?php checked($meta_nofollow, '0'); ?> checked> No</label>
                </td>
            </tr>
            <tr>
                <th><label for="gyrojob_seo_meta_canonical">Canonical URL</label></th>
                <td><input type="text" name="gyrojob_seo_meta_canonical" id="gyrojob_seo_meta_canonical" value="<?php echo esc_attr($meta_canonical); ?>" class="regular-text"></td>
            </tr>
            
            
            
            <tr valign="top">
                     <td colspan=2><center>
<div class="px-5 py-5">
  <div id="box">
      <h1><b>Hello, <span id="title" data-messages='["To active more seo featchers like - Woocommerce SEO, page title, description, keywords, facebook, twitter meta data use AI tools.", "Unlock AI tools.", "24/7 support."]'></span></b></h1>
  </div>
</div>
                         <a href="https://plugin.gyrojob.com/ai.php" target="_blank" class="aii"><h1 id="hhai"><font class="imgai">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><b>Unlock - AI</b></h1></a><br><br><br>End Gyrojob SEO</center><br><hr><br><br><br><br>
                </tr>
            
            
            
            
            
            
            
            
            
        </table>
        <?php

    }

    public function gyrojob_seo_save_meta_box_data($post_id) {
        // Verify nonce.
    if ( ! isset( $_POST['gyrojob_seo_meta_post_page_nonce'] ) || ! wp_verify_nonce( sanitize_textarea_field(wp_unslash($_POST['gyrojob_seo_meta_post_page_nonce'])), 'gyrojob_seo_save_meta_box_data' ) ) {
        return;
    }
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
        

        if (!isset($_POST['gyrojob_seo_meta_title'])) return;
        if (!isset($_POST['gyrojob_seo_meta_description'])) return;
        if (!isset($_POST['gyrojob_seo_meta_canonical'])) return;
        
        update_post_meta($post_id, '_gyrojob_seo_post_meta_title', sanitize_text_field(wp_unslash($_POST['gyrojob_seo_meta_title'])));
        update_post_meta($post_id, '_gyrojob_seo_post_meta_description', sanitize_textarea_field(wp_unslash($_POST['gyrojob_seo_meta_description'])));
        update_post_meta($post_id, '_gyrojob_seo_post_meta_noindex', isset($_POST['gyrojob_seo_meta_noindex']) ? sanitize_text_field(wp_unslash($_POST['gyrojob_seo_meta_noindex'])) : '');
        update_post_meta($post_id, '_gyrojob_seo_post_meta_nofollow', isset($_POST['gyrojob_seo_meta_nofollow']) ? sanitize_text_field(wp_unslash($_POST['gyrojob_seo_meta_nofollow'])) : '');
        update_post_meta($post_id, '_gyrojob_seo_post_meta_canonical', esc_url_raw(wp_unslash($_POST['gyrojob_seo_meta_canonical'])));
        

    }

    public function gyrojob_seo_output_meta_tags() {
        if (is_singular(['post', 'page']) || (function_exists('is_shop') && is_shop())) {
            $post_id = is_singular() ? get_queried_object_id() : null;
            if (function_exists('is_shop') && is_shop()) {
                $post_id = get_option('woocommerce_shop_page_id');
            }

            $meta_title = get_post_meta($post_id, '_gyrojob_seo_post_meta_title', true);
            $meta_description = get_post_meta($post_id, '_gyrojob_seo_post_meta_description', true);
            $meta_noindex = get_post_meta($post_id, '_gyrojob_seo_post_meta_noindex', true);
            $meta_nofollow = get_post_meta($post_id, '_gyrojob_seo_post_meta_nofollow', true);
            $meta_canonical = get_post_meta($post_id, '_gyrojob_seo_post_meta_canonical', true);
?>    <!-- Gyrojob seo Meta Description - login to - https://plugin.gyrojob.com -->
        <meta name="siteVerification" content=""/>
        <?php if (!empty($meta_title)) { 
?><title><?php echo esc_attr($meta_title); ?></title><?php } ?>
        
        <?php if (!empty($meta_description)) { ?>
<meta name="description" content="<?php echo esc_attr($meta_description); ?>" /><?php } ?>

        <meta property="og:type" content="article"/>
        <meta property="og:title" content=""/>
        <meta property="og:description" content=""/>
        <meta property="og:url" content=""/>
<?php if (!empty($meta_canonical)) { ?>
        <link rel="canonical" href="<?php echo esc_url($meta_canonical); ?>" />
<?php } ?>
        <?php
            if ($meta_noindex === '1') {
                echo '<meta name="robots" content="noindex' . ($meta_nofollow === '1' ? ', nofollow' : '') . '">' . "\n";
            } elseif ($meta_nofollow === '1') {
                echo '<meta name="robots" content="nofollow">' . "\n";           } ?>
        <meta property="og:site_name" content=""/>
        <meta name="twitter:title" content=""/>
        <meta name="twitter:description" content=""/>
        <meta name="twitter:image" content=""/>
        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="robots" content="" class="Gyrojob-seo-meta-tag" />
        <!-- END Gyrojob seo Meta Description - login to - https://plugin.gyrojob.com -->
<?php

        }
    }























}


























