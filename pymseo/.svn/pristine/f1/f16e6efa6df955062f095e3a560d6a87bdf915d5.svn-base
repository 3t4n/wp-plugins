<?php
/*
Plugin Name: pymSEO
Plugin URI: https://developer.wordpress.org/plugins/pymseo/
Description: pymSEO is a collection of functions that solve the most common problems of WordPress.
Author: pymsol
Author URI: https://pymsol.es
Version: 1.3.6
License:GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

pymSEO is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
pymseo is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with pymseo. If not, see {License URI}.
*/

if (!defined( 'ABSPATH')) exit; // Exit if accessed directly

define('PYMSEO_PLUGIN_DIR', WP_PLUGIN_DIR. '/pymseo');
require PYMSEO_PLUGIN_DIR. '/includes/variables.php';
require PYMSEO_PLUGIN_DIR. '/includes/update.php';

// add al menu administrador top
function pymseo_admin_menu_top()
{
	add_menu_page(
		'pymseo',
		'pymSEO',
		'manage_options',
		'pymseo',
		'fun_pymseo_monta_el_panel',
		plugin_dir_url(__FILE__) . 'icono-pymseo.svg',
		100
	);
}
add_action('admin_menu', 'pymseo_admin_menu_top');
// Add el boton de ajustes
function fun_pymseo_panel_enlace_configuracion ( $links ) {
    $settings_link = array( 'settings' => '<a href="' . admin_url('admin.php?page=pymseo') . '">' . __('Settings', 'pymseo') . '</a>');
	return array_merge( $links, $settings_link );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'fun_pymseo_panel_enlace_configuracion');
// Add el boton de donar
function fun_pymseo_panel_enlace_donacion($links, $file) {
    if ($file == plugin_basename(__FILE__)) {
        $links[] = '<a href="https://paypal.me/pymsol" target="_blank">' . _e('Donate', 'pymseo') . '</a>';
    }
    return $links;
}
add_filter( 'plugin_row_meta', 'fun_pymseo_panel_enlace_donacion', 10, 2 );
// Añadimos link footer vote
add_filter('admin_footer_text', function() {
	/* translators: %s: five stars */
	return ' ' . sprintf( __( 'If you like <strong>pymSEO</strong>, please %1$sleave us a rating of %2$s. Thank you!', 'pymsol' ), '<a href="https://wordpress.org/support/plugin/pymseo/reviews/#new-post" target="_blank">', '5&starf;</a>' ) . ' ';
});

function fun_pymseo_monta_el_panel() {
	?>
	<div class="wrap" id="capapymseo">
		<h1>Ajustes pymSEO</h1>
		<h2 class="nav-tab-wrapper">
			<a class="nav-tab nav-tab-active" id="general" href="#"><?php _e('Options','pymseo'); ?></a>
			<a class="nav-tab" id="wpo" href="#"><?php _e('WPO','pymseo'); ?></a>
			<a class="nav-tab" id="crawlbudget" href="#"><?php _e('Crawl Budget','pymseo'); ?></a>
			<a class="nav-tab" id="seguridad" href="#"><?php _e('Security','pymseo'); ?></a>
			<a class="nav-tab" id="gdpr" href="#"><?php _e('Privacy','pymseo'); ?></a>
			<a class="nav-tab" id="ux" href="#"><?php _e('UX/UI','pymseo'); ?></a>
			<a class="nav-tab" id="js" style="display:none" href="#"><?php _e('JS','pymseo'); ?></a>
			<a class="nav-tab" id="estado" href="#"><?php _e('System Status','pymseo'); ?></a>
		</h2>
		<form method="post" action="<?php echo pymseo_generate_url_with_nonce('pymseo'); ?>">
			<div class="capapanel">
				<input type="hidden" name="action" value="form_guardar_ajustes">
				<div id="capa-general" class="capa"><?php pymseo_opciones_general(); ?></div>
				<div id="capa-wpo" class="capa"><?php pymseo_opciones_wpo(); ?></div>
				<div id="capa-crawlbudget" class="capa"><?php pymseo_opciones_crawlbudget(); ?></div>
				<div id="capa-seguridad" class="capa"><?php pymseo_opciones_seguridad(); ?></div>
				<div id="capa-gdpr" class="capa"><?php pymseo_opciones_gdpr(); ?></div>
				<div id="capa-ux" class="capa"><?php pymseo_opciones_ux(); ?></div>
				<div id="capa-js" class="capa"><?php pymseo_opciones_js(); ?></div>
				<div id="capa-estado" class="capa"><?php pymseo_opciones_estado(); ?></div>
			</div>
			<input type="submit" value='<?php _e('Save Changes','pymseo'); ?>' class="button button-primary">
		</form>
	</div>
<script><?php require PYMSEO_PLUGIN_DIR. '/js/pymseo-funciones.js'; ?></script>
<style><?php require PYMSEO_PLUGIN_DIR. '/css/pymseo-estilos.css'; ?></style>
<?php 
}
?>