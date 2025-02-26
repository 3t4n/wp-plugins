<?php
// WPO -> Performance -> mover script al footer
function fun_pymseo_move_scripts_footer() {
	remove_action( 'wp_head', 'wp_print_scripts' );
	remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
	remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );

	add_action( 'wp_footer', 'wp_print_scripts', 5);
	add_action( 'wp_footer', 'wp_enqueue_scripts', 5);
	add_action( 'wp_footer', 'wp_print_head_scripts', 5);
}
add_action('wp_enqueue_scripts', 'fun_pymseo_move_scripts_footer');
?>