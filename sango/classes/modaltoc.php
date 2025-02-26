<?php

/**
 * PC
 */
function sangoplus_modalpop_js1() {
	$options = get_option( 'my_theme_options' );
	if ( $options['originCheckbox1'] && wp_is_mobile() && is_single() ) {
		?>
<div class="modaltoc">
<a class="js-modal-open" href=""><i class="fas fa-list-ul"></i></a>
</div>
<div class="modal js-modal" style="display: none;">
<div class="modal__bg js-modal-close"></div>
<div class="modal__content">
<a class="modal__closebutton js-modal-close"><i class="far fa-times-circle"></i></a>
<dl id="index">
<dt>目次</dt>
</dl>
</div>
</div>
		<?php
	}
}
add_action( 'wp_footer', 'sangoplus_modalpop_js1' );



/**
 * SP
 */
function sangoplus_modalpop_js2() {
	$options = get_option( 'my_theme_options' );
	if ( $options['originCheckbox2'] && ! wp_is_mobile() && is_single() ) {
		?>
<div class="modaltoc">
<a class="js-modal-open" href=""><i class="fas fa-list-ul"></i></a>
</div>
<div class="modal js-modal" style="display: none;">
<div class="modal__bg js-modal-close"></div>
<div class="modal__content">
<a class="modal__closebutton js-modal-close"><i class="far fa-times-circle"></i></a>
<dl id="index">
<dt>目次</dt>
</dl>
</div><!--modal__inner-->
</div><!--modal-->
		<?php
	}
}
add_action( 'wp_footer', 'sangoplus_modalpop_js2' );

/**
 * Color
 */
function sangoplus_toccustomizer_color() {
	$options = get_option( 'my_theme_options' );
	if ( $options['originCheckbox1'] || $options['originCheckbox2'] ) {
		$toc_background_color = get_theme_mod( 'toc_background_color', '#6bb6ff' );
		$toc_icon_color       = get_theme_mod( 'toc_icon_color', '#FFF' );
		?>
<style type="text/css">
.modaltoc {background-color: <?php echo esc_html( $toc_background_color ); ?>;}
.modaltoc i {color: <?php echo esc_html( $toc_icon_color ); ?>;}
</style>
		<?php
	}
}
add_action( 'wp_head', 'sangoplus_toccustomizer_color' );
