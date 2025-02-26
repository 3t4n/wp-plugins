<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<div class="inside">
<?php
	if ( ! $post->initial() ) :
?>
	<p class="description">
	<label for="atlas-discuss-form-shortcode"><?php echo esc_html( __( "Copy this shortcode and paste it into your post, page, or text widget content:", 'atlas-discuss-form-demo' ) ); ?></label>
	<span class="shortcode wp-ui-highlight"><input type="text" id="atlas-discuss-form-shortcode" onfocus="this.select();" readonly="readonly" class="large-text code" value="<?php echo esc_attr( $post->shortcode() ); ?>" /></span>
	</p>
<?php
		if ( $old_shortcode = $post->shortcode( array( 'use_old_format' => true ) ) ) :
?>
	<p class="description">
	<label for="atlas-discuss-form-shortcode-old"><?php echo esc_html( __( "You can also use this old-style shortcode:", 'atlas-discuss-form-demo' ) ); ?></label>
	<span class="shortcode old"><input type="text" id="atlas-discuss-form-shortcode-old" onfocus="this.select();" readonly="readonly" class="large-text code" value="<?php echo esc_attr( $old_shortcode ); ?>" /></span>
	</p>
<?php
		endif;
	endif;
?>
</div>