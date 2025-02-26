<?php
/**
 * Content type template.
 *
 * @package Aithenticate
 */

defined( 'ABSPATH' ) || exit;

$content_type = get_post_meta( get_the_ID(), '_content_type', true );

if ( ! $content_type ) {
	$content_type = 'ai';
}

$content_type_label = 'human' === $content_type ? __( 'a human', 'aithenticate' ) : __( 'artificial intelligence', 'aithenticate' );
$image_name         = 'human' === $content_type ? 'human-content-2.png' : 'ai-content-2.png';
$company_slug       = aithenticate_get_company_slug();

?>

<div class="aithenticate-banner">
	<img
		src="<?php echo esc_url( aithenticate()->plugin_url() . 'assets/images/' . $image_name ); ?>"
		alt=""
		class="aithenticate-banner__image"
	>
	<p class="aithenticate-banner__text">
		<?php
		if ( 'human' === $content_type ) :
			esc_html_e( 'This content is labeled as created by a human', 'aithenticate' );
		else :
			esc_html_e( 'AI was used to generate part or all of this content', 'aithenticate' );
		endif;
		?>
		-
		<a
			href="https://aithenticate.org/company/<?php echo esc_attr( $company_slug ); ?>/<?php echo esc_attr( $content_type ); ?>-content"
			target="_blank"
			class="aithenticate-banner__link"
		>
			<?php esc_html_e( 'more information', 'aithenticate' ); ?>
		</a>
	</p>
</div>
