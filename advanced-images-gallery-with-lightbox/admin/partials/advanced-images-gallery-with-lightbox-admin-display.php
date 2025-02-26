<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.itpathsolutions.com/
 * @since      1.0.0
 *
 * @package    Advanced_Images_Gallery_With_Lightbox
 * @subpackage Advanced_Images_Gallery_With_Lightbox/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php 
$aigwl_object  = new Advanced_Images_Gallery_With_Lightbox();
$aigwl_domain = $aigwl_object->get_plugin_name();
$aigwl_options = $aigwl_object->aigwl_get_options();  
$aigwl_get_all_post_type = $aigwl_object->aigwl_get_all_post_type();
$layout_option         = $aigwl_object->aigwl_display_layout_options();			
$hover_effect_option   = $aigwl_object->aigwl_image_hover_effect_options();	
?>
<!-- Layout Selection -->
<div class="aigwl_row">
    <div class="aigwl_row_name">Select Gallery Layout:</div>
    <div class="aigwl_row_desc aigwl_preview_note">
        <select name="aigwl_display_layout" id="aigwl_style">
            <?php echo esc_html($aigwl_options['aigwl_display_layout']); ?>
            <option class="aigwl_gallery-1" value="1"
                <?php if($aigwl_options['aigwl_display_layout'] == '1'){ echo esc_attr("selected");}?>>Grid Gallery
            </option>
            <option class="aigwl_gallery-2" value="2"
                <?php if($aigwl_options['aigwl_display_layout'] == '2'){ echo esc_attr("selected");}?>>
                Masonary Gallery</option>
            <option class="aigwl_gallery-3" value="3"
                <?php if($aigwl_options['aigwl_display_layout'] == '3'){ echo esc_attr("selected");}?>>
                Diamond Gallery</option>
            <option class="aigwl_gallery-4" value="4"
                <?php if($aigwl_options['aigwl_display_layout'] == '4'){ echo esc_attr("selected");}?>>
                Fullwidth Gallery</option>
            <option class="aigwl_gallery-5" value="5"
                <?php if($aigwl_options['aigwl_display_layout'] == '5'){ echo esc_attr("selected");}?>>
                Slick Slider</option>
            <option class="aigwl_gallery-6" value="6"
                <?php if($aigwl_options['aigwl_display_layout'] == '6'){ echo esc_attr("selected");}?>>
                Hexagonal Gallery</option>
        </select>
        <a class="preview_gallerys" id="layout_preview">Preview Layout</a>
		<div class="preview_note">
           <strong>(Note: Preview Layout is Just Sample Layout)</strong>
        </div>
    </div>
    <div class="aigwl_style_output">

        <div id="previewModel" class="preview_modal">

            <!-- Modal content -->
            <div class="preview-modal-content">
                <div class="modal-header">
                    <span class="preview_close">&times;</span>
                </div>
                <div class="preview-modal-body">
                    <img class="aigwl_style_1"
                        src="<?php echo esc_url(plugins_url($aigwl_domain) .'/admin/images/grid-gallery.png'); ?>"
                        alt="img1"
                        <?php esc_attr_e(($aigwl_options['aigwl_display_layout'] == '1') ? '' : 'style=display:none');?>>
                    <img class="aigwl_style_2"
                        src="<?php  echo esc_url(plugins_url($aigwl_domain) .'/admin/images/masonary-gallery.png'); ?>"
                        alt="img2"
                        <?php esc_attr_e(($aigwl_options['aigwl_display_layout'] == '2') ? '' : 'style=display:none');?>>
                    <img class="aigwl_style_3"
                        src="<?php  echo esc_url(plugins_url($aigwl_domain) .'/admin/images/diamond-gallery.png'); ?>"
                        alt="img3"
                        <?php esc_attr_e(($aigwl_options['aigwl_display_layout'] == '3') ? '' : 'style=display:none');?>>
                    <img class="aigwl_style_4"
                        src="<?php  echo esc_url(plugins_url($aigwl_domain) .'/admin/images/fullwidth-gallery.png'); ?>"
                        alt="img4"
                        <?php esc_attr_e(($aigwl_options['aigwl_display_layout'] == '4') ? '' : 'style=display:none');?>>
                    <img class="aigwl_style_5"
                        src="<?php  echo esc_url(plugins_url($aigwl_domain) .'/admin/images/slick-slider.png'); ?>"
                        alt="img5"
                        <?php esc_attr_e(($aigwl_options['aigwl_display_layout'] == '5') ? '' : 'style=display:none');?>>
                    <img class="aigwl_style_6"
                        src="<?php  echo esc_url(plugins_url($aigwl_domain) .'/admin/images/hexagonal-gallery.png'); ?>"
                        alt="img6"
                        <?php esc_attr_e(($aigwl_options['aigwl_display_layout'] == '6') ? '' : 'style=display:none');?>>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Image Upload / Update -->
<div>
    <ul class="aigwl_gallery_gallery_mtb">
        <?php
        $hidden = array();
        if( $images = get_posts( array(
            'post_type' => 'attachment',
            'orderby' => 'post__in',
            'order' => 'ASC',
            'post__in' => explode(',',$aigwl_options['aigwl_gallery']), 
            'numberposts' => -1,
            'post_mime_type' => 'image'
        ) ) ) {
        foreach( $images as $image ) {
                $hidden[] = $image->ID;
                $image_src = wp_get_attachment_image_src( $image->ID, array( 80, 80 ) );
                $aigwl_gallery_image_alt = get_post_meta($image->ID, '_wp_attachment_image_alt', TRUE);
                $url = site_url();
                $aigwl_gallery_url = $url . '/wp-admin/upload.php?item=' . $image->ID ;
                ?>
        <li data-id="<?php echo esc_html($image->ID);  ?>">
            <a id="aigwl_uploaded_gallery_url" href="<?php echo esc_url($aigwl_gallery_url); ?>"><img
                    src="<?php echo esc_url($image_src[0]); ?>"
                    alt="<?php echo esc_attr($aigwl_gallery_image_alt); ?>" /></a><a href="#"
                class="aigwl_gallery_gallery_remove">&times;</a>
        </li>

        <?php }

        } ?>
    </ul>
    <div style="clear:both"></div>
</div>
<input type="hidden" name="aigwl_gallery" value="<?php echo esc_attr(join(',',$hidden)); ?>" class="file-input" />
<a href="#" class="button aigwl_gallery_upload_gallery_button">Upload Images</a>
<?php wp_enqueue_media(); ?>
<!-- Shortcode -->
<div id="aigwl_gallery_admin" class="wrap">

    <?php if($aigwl_options['aigwl_shortcode_name']): ?>
    <div class="aigwl_current_short_code">
        <h4>Copy this short code to display Gallery:</h4>
        <div class='aigwl-current-short-code-wrap'>
            <input type="text" size="30" readonly name="aigwl_shortcode" id="aigwl_shortcode_id"
                value="<?php esc_attr_e($aigwl_options['aigwl_shortcode_name'],$aigwl_domain);  ?>"
                disabled />&nbsp;&nbsp;
            <img src="<?php echo esc_url(plugins_url($aigwl_domain).'/admin/images/copy.svg');?>"
                class="aigwl-copy-to-clip" id="aigwl_copy_to_clip_id" alt="copy" />
        </div>
    </div>
    <?php endif; ?>
    <span class="aigwl-text-copied-msg" style="display:none;">Shortcode copied!</span>
    <?php wp_nonce_field('aigwl_cpt_nonce','aigwl_cpt_nonce' ); ?>
    <?php if(isset($_GET["update-status"])): ?>
    <div class="notice notice-success is-dismissible">
        <p><?php echo esc_html('Settings save successfully!'); ?>.</p>
    </div>
    <?php endif; ?>
</div>
<!-- Hover Effect -->
<div class="aigwl_row_desc">
    <div class="aigwl_row_name">Select Hover Effect:</div>
    <select name="aigwl_image_hover_effect" id="aigwl_style">
        <?php echo $aigwl_options['aigwl_image_hover_effect'] ?>
        <option class="aigwl_gallery_hover_effect_1" value="1"
            <?php if($aigwl_options['aigwl_image_hover_effect'] == '1'){ echo esc_attr("selected");}?>>
            No Effect</option>
        <option class="aigwl_gallery_hover_effect_2" value="2"
            <?php if($aigwl_options['aigwl_image_hover_effect'] == '2'){ echo esc_attr("selected");}?>>
            Zoom In Effect</option>
        <option class="aigwl_gallery_hover_effect_3" value="3"
            <?php if($aigwl_options['aigwl_image_hover_effect'] == '3'){ echo esc_attr("selected");}?>>
            Zoom Out Effect</option>
        <option class="aigwl_gallery_hover_effect_4" value="4"
            <?php if($aigwl_options['aigwl_image_hover_effect'] == '4'){ echo esc_attr("selected");}?>>Black Overlay
        </option>
        <option class="aigwl_gallery_hover_effect_5" value="5"
            <?php if($aigwl_options['aigwl_image_hover_effect'] == '5'){ echo esc_attr("selected");}?>>
            Grey Scale Effect</option>
        <option class="aigwl_gallery_hover_effect_6" value="6"
            <?php if($aigwl_options['aigwl_image_hover_effect'] == '6'){ echo esc_attr("selected");}?>>
            Wooble Vertical Effect</option>
    </select>
</div>
<div class="warning_for_fullwidth aigwl_style_4">
    <h6>Please Keep Full width Section for Full Width Gallery. (No Container)</h6>
</div>
<div class="warning_for_gallery_hover_effect aigwl_style_3">
    <h6>Black Overlay, Zoom In Effect, Zoom Out Effect Only Works for Grid Gallery, Masonary Gallery , Fullwidth Gallery
        & Slick Slider.</h6>
</div>