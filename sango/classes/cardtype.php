<?php
/**
 * Sango PLUS

 * @package    WordPress
 * @author     kakakazu
 */

if ( ! function_exists( 'sng_normal_card' ) ) {
	$options = get_option( 'cardtype_options' );
	if ( $options['cardtypeCheckbox1'] ) {
		function sng_normal_card() {
			?>
<article class="cardtype__article">
<a class="cardtype__link tags_flex" href="<?php the_permalink(); ?>">
<p class="cardtype__img">
<img src="<?php echo esc_url( featured_image_src( 'thumb-520' ) ); ?>" alt="<?php the_title(); ?>">
</p>
<div class="cardtype__article-info">
			<?php if ( ! get_option( 'remove_pubdate' ) ) : ?>
<time class="updated entry-time dfont" datetime="<?php the_modified_date( 'Y-m-d' ); ?>"><?php the_modified_date( 'Y年m月d日' ); ?></time>
<?php endif; ?>
	<h2><?php the_title(); ?></h2>
		</div>
			<div class="card_foot">
				<div class="card_footltags">
					<ul>
					<?php
					$tags = get_the_tags();
					if ( $tags ) {
						foreach ( $tags as $tag ) {
								echo '<li class="' . esc_html( 'tag-link-$tag->term_id' ) . '">' . esc_html( $tag->name ) . '</li>';
						}
					}
					?>
					</ul>
				</div>
			</div>
			</a>
			<?php
			if ( ! is_archive() ) {
				output_catogry_link();
			}
			newmark();/*newマーク*/
			?>
		</article>
			<?php
		}
	}
}

/* cardtype background color */
function splus_customizer_cardtypecolor() {
	$options = get_option( 'cardtype_options' );
	if ( $options['cardtypeCheckbox1'] ) {
		$cardtype_background_color1 = get_theme_mod( 'cardtype_background_color1', '#f4f4f4' );
		$cardtype_textcolor1        = get_theme_mod( 'cardtype_textcolor1', '#666' );
		$cardtype_iconcolor1        = get_theme_mod( 'cardtype_iconcolor1', '#999' );
		$cardtype_text              = get_theme_mod( 'cardtype_text' );
		?>
<style type="text/css">
.card_footltags ul li {
background: <?php echo esc_html( $cardtype_background_color1 ); ?>;
color: <?php echo esc_html( $cardtype_textcolor1 ); ?>;
}
.card_footltags ul li:before {
	content: "\<?php echo esc_html( $cardtype_text ); ?>";
	color: <?php echo esc_html( $cardtype_iconcolor1 ); ?>;
}
</style>
		<?php
	}
}
add_action( 'wp_head', 'splus_customizer_cardtypecolor', 1000 );
