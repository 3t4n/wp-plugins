<?php
class SFTags_Admin {
	/**
	 * Constructor
	 */
	public function __construct() {
		// Box for advanced tags
		add_action( 'add_meta_boxes', array(__CLASS__, 'add_meta_boxes'), 10, 1 );
	}
	
	public static function add_meta_boxes( $post_type ) {
		add_meta_box('sf-tags-settings', __('Autogenerate Tags - Settings', 'sf-tags'), array(__CLASS__, 'metabox'), $post_type, 'side', 'core' );
	}
	
	public static function metabox( $post ) {
?>	
	<div class="sf-generate-tags-form">
		<input type="checkbox" name="sf_from_images" value="sf_from_images" id="sf_from_images" checked="checked" /><?php _e('From Images', 'sf-tags'); ?>
		<input type="checkbox" name="sf_from_text" value="sf_from_images" id="sf_from_text" checked="checked"/><?php _e('From Text', 'sf-tags') ?>
		<input type="hidden" name="sf_post_id" id="sf_post_id" value="<?php global $post; echo "$post->ID"; ?>">
		<p><?php _e('Limit tags to:', 'sf-tags') ?></p>
		<input type="number" name="sf_limit_tags" id="sf_limit_tags" value=""/>
		<br />
    	<a class="button" id="btnSubmit"><?php _e('Generate Tags', 'sf-tags') ?></a>
		<br />
		<p><?php _e('Exclude words (comma separated):', 'sf-tags') ?></p>
		<input type="text" name="sf_remove_words" id="sf_remove_words" value=""/>
		<br />
		<br />
		<?php _e('(save the post to get all of the content evaluated)', 'sf-tags') ?>
	</div>

<?php
	}
}
