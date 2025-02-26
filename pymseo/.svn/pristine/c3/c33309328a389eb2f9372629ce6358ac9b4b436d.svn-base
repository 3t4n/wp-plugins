<?php
// PAGINA OPCIONES GDPR
if(!function_exists('wp_get_current_user')) { include(ABSPATH . "wp-includes/pluggable.php"); }

function pymseo_opciones_js(){
	?>
		<table>
			<tr>
				<th scope="row"></th>
				<td></td>
			</tr>
			<tr>
				<th scope="row"><?php _e('Estadisticas JS - Footer','pymseo'); ?></th>
				<td><label for="pymseoJSEstadisticas"><textarea name="pymseoJSEstadisticas" rows="15"><?php echo esc_js(get_option('pymseoJSEstadisticas')) ?></textarea></label></td>
			</tr>
			<tr>
				<th scope="row"></th>
				<td></td>
			</tr>
		</table>
		<hr>
		
	<?php
}

if (get_option('pymseoJSEstadisticas')) {
		function fun_pymseo_js_estadisticas(){ ?>
		

		<?php echo esc_js(get_option('pymseoJSEstadisticas')) ?>
		
		<?php
		}
		add_action( 'wp_footer', 'fun_pymseo_js_estadisticas');
	} 

?>