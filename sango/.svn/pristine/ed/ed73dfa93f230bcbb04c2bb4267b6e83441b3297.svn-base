<?php

/**
 * Background color
 */
function splus_customizer_loadingcolor() {
	$logo_url = get_theme_mod( 'loadinganime_img' );
	if ( ! empty( $logo_url ) ) {
		$loadinganime_background_color1 = get_theme_mod( 'loadinganime_background_color1', '#6bb6ff' );
		$loadinganime_background_color2 = get_theme_mod( 'loadinganime_background_color2', '#85e3ec' );
		$loadinganime_background_color3 = get_theme_mod( 'loadinganime_background_color3', '#FFF' );
		?>
<style type="text/css">
.loading-anime-wrap {
background: <?php echo esc_html( $loadinganime_background_color1 ); ?>;
background: linear-gradient(270deg, <?php echo esc_html( $loadinganime_background_color1 ); ?> 0%, <?php echo esc_html( $loadinganime_background_color2 ); ?> 100%);
}
.loading-anime-wrap .loading-anime-line {
background-color: <?php echo esc_html( $loadinganime_background_color3 ); ?>;
}
</style>
		<?php
	}
}
add_action( 'wp_head', 'splus_customizer_loadingcolor' );


/**
 * Loading
 */
function splus_customizer_loadingcontent() {
	$loading_url  = get_theme_mod( 'loadinganime_img' );
	$loading_text = get_theme_mod( 'loadinganime_text' );
	if ( ! empty( $loading_url ) ) {
		if ( ! empty( $loading_url ) && ! empty( $loading_text ) ) {
			?>
	<div class="loading-anime-wrap">
		<div class="loading-anime-box">
			<img class="loading-anime-boximg" src="<?php echo esc_url( $loading_url ); ?>" alt="<?php bloginfo( 'name' ); ?>">
			<p class="loading-anime-boxtext dfont"><?php echo esc_html( $loading_text ); ?></p>
		</div>
		<div class="loading-anime-line"></div>
	</div>
			<?php
		}
		if ( ! empty( $loading_url ) && empty( $loading_text ) ) {
			?>
	<div class="loading-anime-wrap">
		<img class="loading-anime-img" src="<?php echo esc_url( $loading_url ); ?>" alt="<?php bloginfo( 'name' ); ?>">
		<div class="loading-anime-line"></div>
	</div>
			<?php
		}
	}}
add_action( 'wp_body_open', 'splus_customizer_loadingcontent' );

/**
 * Background color
 */
function customizer_loadingfuwafuwa() {
	$options = get_option( 'loadinganime_options' );
	if ( $options['loadinganimeCheckbox1'] ) {
		?>
<style type="text/css">
.loading-anime-box, .loading-anime-wrap .loading-anime-img {
animation: fuwahuwa 3s linear infinite;
}
</style>
		<?php
	}
}
add_action( 'wp_head', 'customizer_loadingfuwafuwa' );
