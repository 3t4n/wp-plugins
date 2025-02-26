<?php

// Prevent direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Gyrojob_SEO_Texo_Nomy {

    public function __construct() {
        // Add meta fields to the term editing pages

    add_action( 'category_add_form_fields', [$this, 'gyrojob_seo_add_taxonomy_meta_fields'] );
    add_action( 'post_tag_add_form_fields', [$this, 'gyrojob_seo_add_taxonomy_meta_fields'] );

    add_action( 'category_edit_form_fields', [$this, 'gyrojob_seo_edit_taxonomy_meta_fields'], 10, 2 );
    add_action( 'post_tag_edit_form_fields', [$this, 'gyrojob_seo_edit_taxonomy_meta_fields'], 10, 2 );

    add_action( 'edited_category', [$this, 'gyrojob_seo_save_taxonomy_meta'], 10, 2 );
    add_action( 'edited_post_tag', [$this, 'gyrojob_seo_save_taxonomy_meta'], 10, 2 );

    add_action( 'edited_category', [$this, 'gyrojob_seo_save_taxonomy_meta'] );
    add_action( 'create_category', [$this, 'gyrojob_seo_save_taxonomy_meta'] );
    add_action( 'edited_post_tag', [$this, 'gyrojob_seo_save_taxonomy_meta'] );
    add_action( 'create_post_tag', [$this, 'gyrojob_seo_save_taxonomy_meta'] );

    add_action('wp_head', [$this, 'gyrojob_seo_output_taxonomy_meta_tags'],'');


    }





    // Add meta boxes to taxonomy edit screens.

    public function gyrojob_seo_add_taxonomy_meta_fields( $taxonomy ) {
                // Add a nonce field.
    wp_nonce_field( 'gyrojob_seo_save_taxonomy_meta', 'gyrojob_seo_meta_tags_me_nonce' );
    ?>
    <tr class="form-field">
        <th><label for="meta_title"><h1>Gyrojob SEO</h1></label></th>
    </tr>     
    <div class="form-field">
        <label for="meta_title">Meta Title</label>
        <input type="text" id="gyrojob_seo_meta_title" name="gyrojob_seo_meta_title" value="" class="regular-text1">
    </div>
    <div class="form-field">
        <label for="meta_description">Meta Description</label>
        <textarea id="gyrojob_seo_meta_description" name="gyrojob_seo_meta_description" class="large-text" rows="3"></textarea>
    </div>
    <div class="form-field">
        <label for="meta_keywords">Meta Keywords</label>
        <input type="text" id="gyrojob_seo_meta_keywords" name="gyrojob_seo_meta_keywords" value="" class="regular-text">
    </div>
    <div class="form-field">
        <label>Noindex</label>
        <label><input type="radio" name="gyrojob_seo_meta_noindex" value="noindex"> Noindex</label>
        <label><input type="radio" name="gyrojob_seo_meta_noindex" value="index" checked> Index</label>
    </div>
    <div class="form-field">
        <label>Nofollow</label>
        <label><input type="radio" name="gyrojob_seo_meta_nofollow" value="nofollow"> Nofollow</label>
        <label><input type="radio" name="gyrojob_seo_meta_nofollow" value="follow" checked> Follow</label>
    </div>
    <div class="form-field">
        <label for="_meta_canonical">Canonical URL</label>
        <input type="url" id="gyrojob_seo_meta_canonical" name="gyrojob_seo_meta_canonical" value="" class="regular-text">
    </div>
    <div class="form-field">
        <label for="_meta_twi">Twitter - image URL</label>
        <input type="url" id="meta_twi" name="meta_twi" value="" class="regular-text">
    </div>    
    
    
    
        <div class="form-field">
    
    
<div class="px-5 py-5">
  <div id="box">
      <h1><b>Hello, <span id="title" data-messages='["To active more seo featchers like - Woocommerce SEO, page title, description, keywords, facebook, twitter meta data use AI tools.", "Unlock AI tools.", "24/7 support."]'></span></b></h1>
  </div>
</div>
                         <a href="https://plugin.gyrojob.com/ai.php" target="_blank" class="aii"><h1 id="hhai"><font class="imgai">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><b>Unlock - AI</b></h1></a><br><br><br>End Gyrojob SEO</center><br><hr><br><br><br><br>
               
    
       </div>  
    
    
    <?php 
    }












    public function gyrojob_seo_edit_taxonomy_meta_fields( $term, $taxonomy ) {
        // Add a nonce field.
    wp_nonce_field( 'gyrojob_seo_save_taxonomy_meta', 'gyrojob_seo_meta_tags_me_nonce' );
    
    $meta_title = get_term_meta( $term->term_id, '_gyrojob_seo_post_meta_title', true );
    $meta_description = get_term_meta( $term->term_id, '_gyrojob_seo_post_meta_description', true );
    $meta_noindex = get_term_meta( $term->term_id, '_gyrojob_seo_post_meta_noindex', true );
    $meta_nofollow = get_term_meta( $term->term_id, '_gyrojob_seo_post_meta_nofollow', true );
    $meta_canonical = get_term_meta( $term->term_id, '_gyrojob_seo_post_meta_canonical', true );

    ?>
    
    <tr class="form-field">
        <th><label>&nbsp;</label></th>
        <td><b>Gyrojob SEO</b></td>
    </tr>
    <tr class="form-field">
        <th><label for="gyrojob_seo_meta_title">Meta Title</label></th>
        <td><input type="text" id="gyrojob_seo_meta_title" name="gyrojob_seo_meta_title" value="<?php echo esc_attr( $meta_title ); ?>" class="regular-text"></td>
    </tr>
    <tr class="form-field">
        <th><label for="gyrojob_seo_meta_description">Meta Description</label></th>
        <td><textarea id="gyrojob_seo_meta_description" name="gyrojob_seo_meta_description" class="large-text" rows="3"><?php echo esc_textarea( $meta_description ); ?></textarea></td>
    </tr>
    <tr class="form-field">
        <th>Noindex</th>
        <td>
            <label><input type="radio" name="gyrojob_seo_meta_noindex" value="1" <?php checked( $meta_noindex, '1' ); ?>> Yes</label>
            <label><input type="radio" name="gyrojob_seo_meta_noindex" value="0" <?php checked( $meta_noindex, '0' ); ?> checked> No</label>
        </td>
    </tr>
    <tr class="form-field">
        <th>Nofollow</th>
        <td>
            <label><input type="radio" name="gyrojob_seo_meta_nofollow" value="1" <?php checked( $meta_nofollow, '1' ); ?>> Yes</label>
            <label><input type="radio" name="gyrojob_seo_meta_nofollow" value="0" <?php checked( $meta_nofollow, '0' ); ?> checked> No</label>
        </td>
    </tr>
    <tr class="form-field">
        <th><label for="gyrojob_seo_meta_canonical">Canonical URL</label></th>
        <td><input type="url" id="gyrojob_seo_meta_canonical" name="gyrojob_seo_meta_canonical" value="<?php echo esc_attr( $meta_canonical ); ?>" class="regular-text"></td>
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    <?php


    }





















    // Save taxonomy meta fields.
    public function gyrojob_seo_save_taxonomy_meta( $term_id ) {
        // Verify nonce.
    if ( ! isset( $_POST['gyrojob_seo_meta_tags_me_nonce'] ) || ! wp_verify_nonce( sanitize_textarea_field(wp_unslash($_POST['gyrojob_seo_meta_tags_me_nonce'])), 'gyrojob_seo_save_taxonomy_meta' ) ) {
        return;
    }
    
    
   if ( isset( $_POST['gyrojob_seo_meta_title'] ) ) {
        update_term_meta( $term_id, '_gyrojob_seo_post_meta_title', sanitize_text_field( wp_unslash($_POST['gyrojob_seo_meta_title']) ) );
    }
    if ( isset( $_POST['gyrojob_seo_meta_description'] ) ) {
        update_term_meta( $term_id, '_gyrojob_seo_post_meta_description', sanitize_textarea_field(wp_unslash( $_POST['gyrojob_seo_meta_description']) ) );
    }
    if ( isset( $_POST['gyrojob_seo_meta_noindex'] ) ) {
        update_term_meta( $term_id, '_gyrojob_seo_post_meta_noindex', sanitize_text_field(wp_unslash( $_POST['gyrojob_seo_meta_noindex']) ) );
    }
    if ( isset( $_POST['gyrojob_seo_meta_nofollow'] ) ) {
        update_term_meta( $term_id, '_gyrojob_seo_post_meta_nofollow', sanitize_text_field(wp_unslash( $_POST['gyrojob_seo_meta_nofollow']) ) );
    }
    if ( isset( $_POST['gyrojob_seo_meta_canonical'] ) ) {
        update_term_meta( $term_id, '_gyrojob_seo_post_meta_canonical', esc_url_raw(wp_unslash( $_POST['gyrojob_seo_meta_canonical']) ) );
    }
    


    }

    

   
   


    // Output custom meta tags for taxonomy archive pages.
    public function gyrojob_seo_output_taxonomy_meta_tags() {
    
    if ( is_category() || is_tag() ) {
        
        
        $term_id = get_queried_object_id();

        $meta_title = get_term_meta( $term_id, '_gyrojob_seo_post_meta_title', true );
        $meta_description = get_term_meta( $term_id, '_gyrojob_seo_post_meta_description', true );
        $meta_noindex = get_term_meta( $term_id, '_gyrojob_seo_post_meta_noindex', true );
        $meta_nofollow = get_term_meta( $term_id, '_gyrojob_seo_post_meta_nofollow', true );
        $meta_canonical = get_term_meta( $term_id, '_gyrojob_seo_post_meta_canonical', true );

 ?>
	<!-- Gyrojob seo Meta Description - login to - https://plugin.gyrojob.com -->
        <meta name="siteVerification" content=""/>
        <?php if (!empty($meta_title)) { ?>
<title><?php echo esc_attr($meta_title); ?></title><?php } ?>
        <?php if (!empty($meta_description)) { ?>
        
        <meta name="description" content="<?php echo esc_attr($meta_description); ?>" /><?php } ?>
        
        <meta property="og:type" content=""/>
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
echo '<meta name="robots" content="nofollow">' . "\n"; } ?>
        <meta property="og:site_name" content=""/>
        <meta name="twitter:title" content=""/>
        <meta name="twitter:description" content=""/>
        <meta name="twitter:image" content=""/>
        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="robots" content="noarchive" class="Gyrojob-seo-meta-tag" />    
        <!-- END Gyrojob seo Meta Description - login to - https://plugin.gyrojob.com -->
<?php



    }
    }








     


 
 

    
    

            
     








}







