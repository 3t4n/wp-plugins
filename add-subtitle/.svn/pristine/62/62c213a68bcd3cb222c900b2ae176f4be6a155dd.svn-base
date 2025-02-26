<?php
/**
 * Handles the demo custom meta box functionality
 *
 * @package Subtitle
 * @since 1.1.0
 */

// Exit if accessed directly 
if ( !defined( 'ABSPATH' ) ) exit;

global $post, $wpd_sub_title_model;

$model = $wpd_sub_title_model;

$prefix = WPD_SUB_TITLE_META_PREFIX;

wp_nonce_field( WPD_SUB_TITLE_BASENAME, 'at_wpd_sub_title_meta_nonce' );
		
$wpd_sub_title_addtitle 	= get_post_meta( $post->ID, $prefix . 'title', true ); 
?>
<style>
input#wpd_sub_title_addtitle {
    font-size: 20px;
    width: 100%;
} 
</style>
<div class="" id="titlewrap">
<!--</label><?php //echo __( 'Add Subtitle Here', 'wpdsubtitle' ); ?></label>-->
<input type="text" id="wpd_sub_title_addtitle" class="wpd-sub-title-addtitle regular-text" name="<?php echo $prefix ?>title" value="<?php echo $model->wpd_sub_title_escape_attr( $wpd_sub_title_addtitle ); ?>" placeholder="Add Subtitle Here" />
</div>		