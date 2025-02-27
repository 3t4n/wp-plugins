<?php
/**
 * Easy Populate Posts content.
 *
 * @package spp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$title1 = 'first';
$title2 = 'first not-visible';
if ( self::has_pattern( self::$settings['title_prefix'] ) ) {
	$title1 = 'first not-visible';
	$title2 = 'first';
}
?>
<div>
	<h3><?php esc_html_e( 'Content', 'spp' ); ?></h3>
	<em id="title-prefix-note">(<?php esc_html_e( 'use #NO for counter', 'spp' ); ?>)</em>
	<h4 id="spp_title_prefix_elem" class="<?php echo esc_attr( $title1 ); ?>"><?php esc_html_e( 'Title Prefix', 'spp' ); ?></h4>
	<h4 id="spp_title_elem" class="<?php echo esc_attr( $title2 ); ?>"><?php esc_html_e( 'Title', 'spp' ); ?></h4>
	<input type="text" name="spp[title_prefix]" id="spp_title_prefix" value="<?php echo esc_attr( self::$settings['title_prefix'] ); ?>" size="20">
	<p id="spp_title_prefix_counter" class="row-span text-number hidden">
		<span><em><?php esc_html_e( 'start the auto-increment prefix number from this', 'spp' ); ?></em></span>
		<span><input type="number" name="spp[start_counter]" id="spp_start_counter" value="<?php echo esc_attr( self::$settings['start_counter'] ); ?>" size="20" disabled="disabled"></span>
	</p>

	<h4><?php esc_html_e( 'Content', 'spp' ); ?></h4>
	<select name="spp[content_type]" id="spp_content_type">
		<option value="0"<?php selected( 0, self::$settings['content_type'] ); ?>><?php esc_attr_e( 'random', 'spp' ); ?></option>
		<option value="1"<?php selected( 1, self::$settings['content_type'] ); ?>><?php esc_attr_e( 'Star Wars', 'spp' ); ?></option>
		<option value="2"<?php selected( 2, self::$settings['content_type'] ); ?>><?php esc_attr_e( 'Lorem Ipsum', 'spp' ); ?></option>
		<option value="3"<?php selected( 3, self::$settings['content_type'] ); ?>><?php esc_attr_e( 'the Gutenberg template', 'spp' ); ?></option>
	</select>

	<div id="spp-content-g-wrap"
		<?php if ( 3 !== (int) self::$settings['content_type'] ) : ?>
			style="display:none;"
		<?php endif; ?>>
		<h4 class="with-hint">
			<?php esc_html_e( 'Gutenberg Template', 'spp' ); ?>
			<button class="hint-icon" data-target="#spp_hint_gutenberg_template"><span class="dashicons dashicons-info as-icon"></span></button>
		</h4>
		<textarea name="spp[gutenberg_template]" id="spp_gutenberg_template" rows="6"><?php echo esc_attr( self::$settings['gutenberg_template'] ); ?></textarea>

		<div id="spp_hint_gutenberg_template" class="spp_hint not-visible">
			<button class="hint-icon" data-target="#spp_hint_gutenberg_template"><span class="dashicons dashicons-dismiss as-icon"></span></button>
			<div class="first">
				<?php esc_html_e( 'Use the example below, or add your own post template. For generating random texts, you can use the custom patterns in the template.', 'spp' ); ?>
			</div>
			<hr>
			<pre style="max-width: 100%; overflow-x: scroll"><?php echo esc_html( '<!-- wp:media-text {"align":"full","mediaType":"image","imageFill":false,"useFeaturedImage":true,"style":{"color":{"background":"#[LCOLOR]"}}} -->' . PHP_EOL . '<div class="wp-block-media-text alignfull is-stacked-on-mobile has-background" style="background-color:#[LCOLOR]"><figure class="wp-block-media-text__media"></figure><div class="wp-block-media-text__content"><!-- wp:post-title /-->' . PHP_EOL . PHP_EOL . '<!-- wp:post-excerpt /--></div></div>' . PHP_EOL . '<!-- /wp:media-text -->' . PHP_EOL . PHP_EOL . '<!-- wp:paragraph --><p>#[S-35:220]. #[S-35:220]. #[S-35:220].</p><!-- /wp:paragraph -->' . PHP_EOL . PHP_EOL . '<!-- wp:quote {"style":{"color":{"text":"#[DCOLOR]"},"elements":{"link":{"color":{"text":"#[DCOLOR]"}}}},"className":"is-style-default"} -->' . PHP_EOL . '<blockquote class="wp-block-quote is-style-default has-text-color has-link-color" style="color:#[DCOLOR]"><!-- wp:paragraph -->' . PHP_EOL . '<p><strong>#[S-35:220].</strong></p>' . PHP_EOL . '<!-- /wp:paragraph --><cite>#[S-1:16] #[S-1:16]</cite></blockquote>' . PHP_EOL . '<!-- /wp:quote -->' . PHP_EOL . PHP_EOL . '<!-- wp:paragraph --><p>#[S-35:220]. #[S-35:220].</p><!-- /wp:paragraph -->' . PHP_EOL . PHP_EOL . '<!-- wp:details -->' . PHP_EOL . '<details class="wp-block-details"><summary>#[S-5:64]</summary><!-- wp:paragraph -->' . PHP_EOL . '<p>#[S-35:220].</p>' . PHP_EOL . '<!-- /wp:paragraph --></details>' . PHP_EOL . '<!-- /wp:details -->' . PHP_EOL . PHP_EOL . '<!-- wp:details -->' . PHP_EOL . '<details class="wp-block-details"><summary>#[S-5:64]</summary><!-- wp:paragraph -->' . PHP_EOL . '<p>#[S-35:220].</p>' . PHP_EOL . '<!-- /wp:paragraph --></details>' . PHP_EOL . '<!-- /wp:details -->' . PHP_EOL . PHP_EOL . '<!-- wp:paragraph --><p>#[S-35:220]. #[S-35:220]. #[S-35:220].</p><!-- /wp:paragraph -->' ); ?></pre>
			<p>
				<?php esc_html_e( 'For more accuracy in configuring the blocks, you can use the following patterns inside the template:', 'spp' ); ?>
				<ol>
					<li><code>#[POST_ID]</code></li>
					<li><code>#[POST_TITLE]</code></li>
					<li><code>#[POST_EXCERPT]</code></li>
					<li><code>#[FEATURED_IMAGE_ID]</code></li>
					<li><code>#[FEATURED_IMAGE_URL]</code></li>
					<li><code>#[META_meta_key]</code></li>
				</ol>
			</p>
		</div>
	</div>

	<div id="spp-content-p-wrap"
		<?php if ( 3 === (int) self::$settings['content_type'] ) : ?>
		style="display:none;"
		<?php endif; ?>>
		<h4><?php esc_html_e( 'Paragraphs', 'spp' ); ?></h4>
		<select name="spp[content_p]" id="spp_content_p">
			<option value="0"<?php selected( 0, self::$settings['content_p'] ); ?>><?php esc_attr_e( 'random', 'spp' ); ?></option>
			<option value="1"<?php selected( 1, self::$settings['content_p'] ); ?>>1</option>
			<option value="2"<?php selected( 2, self::$settings['content_p'] ); ?>>2</option>
			<option value="3"<?php selected( 3, self::$settings['content_p'] ); ?>>3</option>
			<option value="4"<?php selected( 4, self::$settings['content_p'] ); ?>>4</option>
			<option value="5"<?php selected( 5, self::$settings['content_p'] ); ?>>5</option>
		</select>
		<p>
			<label>
				<input type="checkbox"
					name="spp[gutenberg_block]"
					id="spp_gutenberg_block"
					<?php checked( self::$settings['gutenberg_block'], 1 ); ?>>
				<?php esc_html_e( 'generate as Gutenberg blocks', 'spp' ); ?>
			</label>
		</p>
	</div>

	<h4><?php esc_html_e( 'Excerpt', 'spp' ); ?></h4>
	<select name="spp[excerpt]" id="spp_excerpt">
		<option value="0"<?php selected( 0, self::$settings['excerpt'] ); ?>><?php esc_attr_e( 'no', 'spp' ); ?></option>
		<option value="2"<?php selected( 2, self::$settings['excerpt'] ); ?>><?php esc_attr_e( 'random', 'spp' ); ?></option>
		<option value="1"<?php selected( 1, self::$settings['excerpt'] ); ?>><?php esc_attr_e( 'excerpt from content', 'spp' ); ?></option>
	</select>

	<h4><?php esc_html_e( 'Sticky', 'spp' ); ?></h4>
	<select name="spp[has_sticky]" id="spp_has_sticky">
		<option value="0"<?php selected( 0, self::$settings['has_sticky'] ); ?>><?php esc_attr_e( 'random', 'spp' ); ?></option>
		<option value="1"<?php selected( 1, self::$settings['has_sticky'] ); ?>><?php esc_attr_e( 'yes', 'spp' ); ?></option>
		<option value="2"<?php selected( 2, self::$settings['has_sticky'] ); ?>><?php esc_attr_e( 'no', 'spp' ); ?></option>
	</select>
</div>
