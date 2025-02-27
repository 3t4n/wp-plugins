<?php
// get needed classes
$classes = 'pixcode  pixcode--testimonial  testimonial';
$classes .= ! empty( $text_size ) ? ' testimonial--' . esc_attr( $text_size ) . '-text' : '';
// create class attribute
$classes = $classes !== '' ? 'class="' . esc_attr( $classes ) . '"' : '';

?>
<blockquote <?php echo $classes; ?>>
	<div class="testimonial__content"><?php echo wp_kses_post( $this->get_clean_content( $content ) ); ?></div>

	<?php if ( ! empty( $author ) ) {
		if ( ! empty( $link ) ) { ?>
			<a href="<?php echo esc_url( $link ); ?>">
		<?php } ?>

		<div class="testimonial__author-name"><?php echo esc_html( $author ); ?></div>

		<?php if ( ! empty( $link ) ) { ?>
			</a>
		<?php }

		if ( ! empty( $author_title ) ) { ?>
			<div class="testimonial__author-title"><?php echo esc_html( $author_title ); ?></div>
		<?php }
	} ?>
</blockquote>
