<?php
// PAGINA OPCIONES GENERAL
function pymseo_opciones_estado(){
?>
<h2><?php _e( 'WordPress Environment', 'pymseo' ); ?></h2>
		<table class="form-table">
			<tr>
				<th scope="row"><?php _e('Home URL:','pymseo'); ?></th>
				<td><?php echo esc_url_raw( home_url() ); ?></td>
			</tr>
			<tr>
				<th scope="row"><?php _e('Site URL:','pymseo'); ?></th>
				<td><?php echo esc_url_raw( site_url() ); ?></td>
			</tr>
			<tr>
				<th scope="row"><?php _e('WP Path:','pymseo'); ?></th>
				<td><?php echo defined( 'ABSPATH' ) ? esc_html( ABSPATH ) : esc_html__( 'N/A', 'pymseo' ); ?></td>
			</tr>
			<tr>
				<th scope="row"><?php _e('WP Content Path:','pymseo'); ?></th>
				<td><?php echo defined( 'WP_CONTENT_DIR' ) ? esc_html( WP_CONTENT_DIR ) : esc_html__( 'N/A', 'pymseo' ); ?></td>
			</tr>

			<tr>
				<th scope="row"><?php _e('WP Version:','pymseo'); ?></th>
				<td><?php bloginfo( 'version' ); ?></td>
			</tr>
			<tr>
				<th scope="row"><?php _e('WP Multisite:','pymseo'); ?></th>
				<td><?php echo ( is_multisite() ) ? '✔' : '✘'; ?></td>
			</tr>
			<tr>
				<th scope="row"><?php _e('PHP Memory Limit:','pymseo'); ?></th>
				<td>
					<?php
						$memory = ini_get( 'memory_limit' );
						if ( ! $memory || -1 === $memory ) {
							$memory = wp_convert_hr_to_bytes( WP_MEMORY_LIMIT );
						}
						if ( ! is_numeric( $memory ) ) {
							$memory = wp_convert_hr_to_bytes( $memory );
						}
						?>
						<?php if ( $memory < 128000000 ) : ?>
								<?php /* translators: %1$s: Current value. %2$s: URL. */ ?>
								<?php printf( __( '%1$s - We recommend setting memory to at least <strong>128MB</strong>. Please define memory limit in <strong>wp-config.php</strong> file. To learn how, see: <a href="%2$s" target="_blank" rel="noopener noreferrer">Increasing memory allocated to PHP.</a>', 'pymsol' ), esc_attr( size_format( $memory ) ), 'http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP' );?>
							
						<?php else : ?>
							<?php echo esc_attr( size_format( $memory ) ); ?>
						<?php endif; ?>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php _e('WP Debug Mode:','pymseo'); ?></th>
				<td>
					<?php if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) : ?>
						<?php _e('Yes','pymseo'); ?>
					<?php else : ?>
						<?php _e('No','pymseo'); ?>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php _e('Language:	','pymseo'); ?></th>
				<td><?php echo esc_attr( get_locale() ); ?></td>
			</tr>
</table>
<hr />
<h2><?php esc_attr_e( 'Datos del servidor', 'pymseo' ); ?></h2>
<table class="form-table">
			<tr>
				<th scope="row"><?php esc_attr_e( 'Software servidor', 'pymseo' ); ?></th>
				<td><?php echo isset( $_SERVER['SERVER_SOFTWARE'] ) ? esc_attr( sanitize_text_field( wp_unslash( $_SERVER['SERVER_SOFTWARE'] ) ) ) : esc_attr__( 'desconocido', 'pymseo' ); ?></td>
			</tr>
			<tr>
				<th scope="row"><?php _e( 'PHP Version:', 'pymseo' ); ?></th>
				<td><?php
						$php_version = null;
						if ( defined( 'PHP_VERSION' ) ) {
							$php_version = PHP_VERSION;
						} elseif ( function_exists( 'phpversion' ) ) {
							$php_version = phpversion();
						}
						if ( null === $php_version ) {
							$message = esc_attr__( 'Version del PHP no detectada', 'pymseo' );
						} else {
							if ( version_compare( $php_version, '7.2' ) >= 0 ) {
								$message = $php_version;
							} else {
								$message = sprintf(
									esc_attr__( '%1$s. WordPress recommendation: %2$s or above. See %3$s for details.', 'pymseo' ),
									$php_version,
									'7.2',
									'<a href="https://wordpress.org/about/requirements/" target="_blank">' . esc_attr__( 'Requisitos Wordpress', 'pymseo' ) . '</a>'
								);
							}
						}
						echo $message; 
						?>
				</td>
				</tr>
			<tr>
				<th scope="row"><?php esc_attr_e( 'PHP Post Max Size', 'pymseo' ); ?></th>
				<td><?php echo esc_attr( size_format( wp_convert_hr_to_bytes( ini_get( 'post_max_size' ) ) ) ); ?></td>
			</tr>
			<tr>
				<th scope="row"><?php esc_attr_e( 'PHP Time Limit', 'pymseo' ); ?></th>
				<td>
					<?php
							$time_limit = ini_get( 'max_execution_time' );

							if ( 180 > $time_limit && 0 != $time_limit ) {
								echo ' ' . sprintf( __( '%1$s - Es recomedable aumentar el tiempo maximo de ejecución a 180.<br /><a href="%2$s" target="_blank" rel="noopener noreferrer">¿Como incrementar el tiempo maximo de ejecución en PHP?</a>', 'pymseo' ), $time_limit, 'https://megazona.com/como-aumentar-php-time-limit-en-wordpress' ) . ' '; 
							} else {
								echo ' ' . esc_attr( $time_limit ) . ' ';
							}
							?>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php esc_attr_e( 'PHP Max Input Vars', 'pymseo' ); ?></th>
				<td>
					<?php
						$registered_navs = get_nav_menu_locations();
						$menu_items_count = array(
							'0' => '0',
						);
						foreach ( $registered_navs as $handle => $registered_nav ) {
							$menu = wp_get_nav_menu_object( $registered_nav );
							if ( $menu ) {
								$menu_items_count[] = $menu->count;
							}
						}

						$max_items = max( $menu_items_count );
						$required_input_vars = $max_items * 20;

						?>
				<?php
							$max_input_vars = ini_get( 'max_input_vars' );
							$required_input_vars = $required_input_vars + ( 500 + 1000 );
							if ( $max_input_vars < $required_input_vars ) {
								echo ' ' . sprintf( __( '%1$s - Recommended Value: %2$s.<br />Max input vars limitation will truncate POST data such as menus. See: <a href="%3$s" target="_blank" rel="noopener noreferrer">Increasing max input vars limit.</a>', 'pymseo' ), $max_input_vars, '<strong>' . $required_input_vars . '</strong>', 'http://sevenspark.com/docs/ubermenu-3/faqs/menu-item-limit' ) . ' '; 
							} else {
								echo ' ' . esc_attr( $max_input_vars ) . ' ';
							}
							?>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php esc_attr_e( 'MySQL Version:', 'pymseo' ); ?></th>
				<td>
					<?php global $wpdb; ?>
					<?php echo esc_attr( $wpdb->db_version() ); ?>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php esc_attr_e( 'Max Upload Size:', 'pymseo' ); ?></th>
				<td><?php echo esc_attr( size_format( wp_max_upload_size() ) ); ?></td>
			</tr>
			<tr>
				<th scope="row"><?php esc_attr_e( 'GD Library:', 'pymseo' ); ?></th>
				<td>
				<?php
						$info = esc_attr__( 'No instalado', 'pymseo' );
						if ( extension_loaded( 'gd' ) && function_exists( 'gd_info' ) ) {
							$info = esc_attr__( 'Instalado', 'pymseo' );
							$gd_info = gd_info();
							if ( isset( $gd_info['GD Version'] ) ) {
								$info = $gd_info['GD Version'];
							}
						}
						echo esc_attr( $info );
						?>
				</td>
			</tr>	
		</table>
<hr />
<h3><?php esc_attr_e( 'Plugins activos', 'pymseo' ); ?></h3>
<?php
		$active_plugins = (array) get_option( 'active_plugins', array() );

		if ( is_multisite() ) {
			$active_plugins = array_merge( $active_plugins, array_keys( get_site_option( 'active_sitewide_plugins', array() ) ) );
		}
		?>
		<table class="form-table">
				<?php

				foreach ( $active_plugins as $plugin ) {

					$plugin_data    = @get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
					$dirname        = dirname( $plugin );
					$version_string = '';
					$network_string = '';

					if ( ! empty( $plugin_data['Name'] ) ) {

						if ( ! empty( $plugin_data['PluginURI'] ) ) {
							$plugin_name = '<a href="' . esc_url( $plugin_data['PluginURI'] ) . '" title="' . __( 'Visit plugin homepage', 'pymseo' ) . '" target="_blank" rel="noopener">' . esc_html( $plugin_data['Name'] ) . '</a>';
						} else {
							$plugin_name = esc_html( $plugin_data['Name'] );
						}
						?>
						<tr>
							<th scope="row">
								<?php echo $plugin_name;  ?>
							</th>
							<td>
								<?php printf( esc_attr__( 'por %s', 'pymseo' ), '<a href="' . esc_url( $plugin_data['AuthorURI'] ) . '" target="_blank" rel="noopener">' . esc_html( $plugin_data['AuthorName'] ) . '</a>' ) . ' &ndash; ' . esc_html( $plugin_data['Version'] ) . $version_string . $network_string; ?>
							</td>
						</tr>
						<?php
					}
				}
				?>
		</table>
		
		
    <?php
}
?>