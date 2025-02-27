<?php
defined( 'ABSPATH' ) || exit;
$title = __( 'Reading Settings' );
$post_types = get_post_types( array( 'publicly_queryable' => true,'public' => true ),'names','or' );
$page_on_front = get_option( 'page_on_front' );
$post_type_saved = $page_on_front && absint( $page_on_front ) > 0 ? get_post_type( $page_on_front ) : 'page';
?>
<style id="frontype-css">.frontype-current{background-color:#000 !important;color:#fff !important}</style>
<div class="wrap">
<h1><?php echo esc_html( $title ); ?></h1>
<form method="post" action="options.php">
<?php
settings_fields( 'reading' );
if ( ! in_array( get_option( 'blog_charset' ), array( 'utf8', 'utf-8', 'UTF8', 'UTF-8' ), true ) ) {
	add_settings_field( 'blog_charset', esc_html__( 'Encoding for pages and feeds' ),'options_reading_blog_charset','reading','default', array( 'label_for' => 'blog_charset' ) );
}
if ( ! get_pages() ) : ?>
<input name="show_on_front" type="hidden" value="posts" />
<table class="form-table" role="presentation">
	<?php
	if ( 'posts' !== get_option( 'show_on_front' ) ) :
		update_option( 'show_on_front','posts' );
	endif;

else :
	if ( 'page' === get_option( 'show_on_front' ) && ! get_option( 'page_on_front' ) && ! get_option( 'page_for_posts' ) ) {
		update_option( 'show_on_front','posts' );
	}
	?>
<table class="form-table" role="presentation">
<tr>
<th scope="row"><?php _e( 'Your homepage displays' ); ?></th>
<td id="front-static-pages"><fieldset><legend class="screen-reader-text"><span><?php esc_html_e( 'Your homepage displays' ); ?></span></legend>
	<p><label>
		<input name="show_on_front" type="radio" value="posts" class="tog" <?php checked( 'posts', get_option( 'show_on_front' ) ); ?> />
		<?php _e( 'Your latest posts' ); ?>
	</label>
	</p>
	<p><label>
		<input name="show_on_front" type="radio" value="page" class="tog" <?php checked( 'page', get_option( 'show_on_front' ) ); ?> />
		<?php
		printf(
			/* translators: %s: URL to Pages screen. */
			__( 'A <a href="%s">static page</a> (select below)' ),
			'edit.php?post_type=page'
		);
		?>
	</label>
  <ul><li>
  <label for="frontype-post-types-sel"><?php esc_html_e( 'Type' ); ?></label>
  <select id="frontype-post-types-sel">
  <?php
  foreach( $post_types as $post_type ){
    if( !is_post_type_viewable( $post_type ) ) continue;
    $post_type_obj = get_post_type_object( $post_type );
    $selected = isset( $_GET['ftype'] ) && $post_type === sanitize_text_field( $_GET['ftype'] ) || ( !isset( $_GET['ftype'] ) && $post_type_saved === $post_type ) ? ' selected' : '';
    $url = add_query_arg( 'ftype',esc_attr( $post_type ),admin_url( 'options-general.php?page=frontype' ) );
  ?>
	<option class="frontype-option"<?php echo $selected; ?> value="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $post_type_obj->labels->singular_name ); ?></option>
  <?php
  }
  ?>
  </select>
  </li></ul>
<ul>
	<li><label for="page_on_front">
	<?php
	printf(
		/* translators: %s: Select field to choose the front page. */
		__( 'Homepage: %s' ),
		wp_dropdown_pages(
			array(
        'hierarchical' => true,
				'name' => 'page_on_front',
				'echo' => 0,
				'show_option_none'  => __( '&mdash; Select &mdash;' ),
				'option_none_value' => '0',
				'selected' => get_option( 'page_on_front' ),
			)
		)
	);
	?>
</label></li>
	<li><label for="page_for_posts">
	<?php
	printf(
		/* translators: %s: Select field to choose the page for posts. */
		__( 'Posts page: %s' ),
		wp_dropdown_pages(
			array(
				'name'              => 'page_for_posts',
				'echo'              => 0,
				'show_option_none'  => __( '&mdash; Select &mdash;' ),
				'option_none_value' => '0',
				'selected'          => get_option( 'page_for_posts' ),
			)
		)
	);
	?>
</label></li>
</ul>
	<?php if ( 'page' === get_option( 'show_on_front' ) && get_option( 'page_for_posts' ) === get_option( 'page_on_front' ) ) : ?>
	<div id="front-page-warning" class="notice notice-warning inline"><p><?php _e( '<strong>Warning:</strong> these pages should not be the same!' ); ?></p></div>
	<?php endif; ?>
	<?php if ( get_option( 'wp_page_for_privacy_policy' ) === get_option( 'page_for_posts' ) || get_option( 'wp_page_for_privacy_policy' ) === get_option( 'page_on_front' ) ) : ?>
	<div id="privacy-policy-page-warning" class="notice notice-warning inline"><p><?php _e( '<strong>Warning:</strong> these pages should not be the same as your Privacy Policy page!' ); ?></p></div>
	<?php endif; ?>
</fieldset></td>
</tr>
<?php endif; ?>
<tr>
<th scope="row"><label for="posts_per_page"><?php _e( 'Blog pages show at most' ); ?></label></th>
<td>
<input name="posts_per_page" type="number" step="1" min="1" id="posts_per_page" value="<?php form_option( 'posts_per_page' ); ?>" class="small-text" /> <?php _e( 'posts' ); ?>
</td>
</tr>
<tr>
<th scope="row"><label for="posts_per_rss"><?php _e( 'Syndication feeds show the most recent' ); ?></label></th>
<td><input name="posts_per_rss" type="number" step="1" min="1" id="posts_per_rss" value="<?php form_option( 'posts_per_rss' ); ?>" class="small-text" /> <?php _e( 'items' ); ?></td>
</tr>
<tr>
<th scope="row"><?php _e( 'For each post in a feed, include' ); ?> </th>
<td><fieldset><legend class="screen-reader-text"><span><?php _e( 'For each post in a feed, include' ); ?> </span></legend>
	<p>
		<label><input name="rss_use_excerpt" type="radio" value="0" <?php checked( 0, get_option( 'rss_use_excerpt' ) ); ?>	/> <?php _e( 'Full text' ); ?></label><br />
		<label><input name="rss_use_excerpt" type="radio" value="1" <?php checked( 1, get_option( 'rss_use_excerpt' ) ); ?> /> <?php _e( 'Excerpt' ); ?></label>
	</p>
	<p class="description">
		<?php
		printf(
			/* translators: %s: Documentation URL. */
			__( 'Your theme determines how content is displayed in browsers. <a href="%s">Learn more about feeds</a>.' ),
			__( 'https://wordpress.org/support/article/wordpress-feeds/' )
		);
		?>
	</p>
</fieldset></td>
</tr>

<tr class="option-site-visibility">
<th scope="row"><?php has_action( 'blog_privacy_selector' ) ? _e( 'Site visibility' ) : _e( 'Search engine visibility' ); ?> </th>
<td><fieldset><legend class="screen-reader-text"><span><?php has_action( 'blog_privacy_selector' ) ? _e( 'Site visibility' ) : _e( 'Search engine visibility' ); ?> </span></legend>
<?php if ( has_action( 'blog_privacy_selector' ) ) : ?>
	<input id="blog-public" type="radio" name="blog_public" value="1" <?php checked( '1', get_option( 'blog_public' ) ); ?> />
	<label for="blog-public"><?php _e( 'Allow search engines to index this site' ); ?></label><br/>
	<input id="blog-norobots" type="radio" name="blog_public" value="0" <?php checked( '0', get_option( 'blog_public' ) ); ?> />
	<label for="blog-norobots"><?php _e( 'Discourage search engines from indexing this site' ); ?></label>
	<p class="description"><?php _e( 'Note: Neither of these options blocks access to your site &mdash; it is up to search engines to honor your request.' ); ?></p>
	<?php
	do_action( 'blog_privacy_selector' );
	?>
<?php else : ?>
	<label for="blog_public"><input name="blog_public" type="checkbox" id="blog_public" value="0" <?php checked( '0', get_option( 'blog_public' ) ); ?> />
	<?php _e( 'Discourage search engines from indexing this site' ); ?></label>
	<p class="description"><?php _e( 'It is up to search engines to honor this request.' ); ?></p>
<?php endif; ?>
</fieldset></td>
</tr>

<?php do_settings_fields( 'reading', 'default' ); ?>
</table>

<?php do_settings_sections( 'reading' ); ?>

<?php submit_button(); ?>
</form>
</div>
<script id="frontype-js">
document.getElementById('frontype-post-types-sel').addEventListener('change',function(){
  document.location.href = this.value;
});
</script>
