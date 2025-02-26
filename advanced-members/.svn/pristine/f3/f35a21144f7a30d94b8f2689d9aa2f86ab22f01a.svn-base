<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
?>
<div class="wrap acf-settings-wrap">

	<h1><?php echo esc_html($page_title); ?></h1>

	<form id="post" method="post" name="post">
		<?php wp_nonce_field( 'amem_dashboard_update', 'dashboard_update_nonce', false ); ?>
		<div id="poststuff" class="poststuff">

			<div id="post-body" class="metabox-holder columns-<?php echo 1 == get_current_screen()->get_columns() ? '1' : '2'; ?>">

				<div id="postbox-container-1" class="postbox-container">

					<?php do_meta_boxes( 'amem_dashboard_page', 'side', null ); ?>

				</div>
				<div id="postbox-container-2" class="postbox-container">
					<div class="inside">
						<div class="acf-tab-dashboard-wrap -top">
							<ul class="acf-hl acf-tab-dashboard-group">
								<?php
								$class = ' class="active"';
								foreach ( $tabs as $tab_key => $tab ) {
									echo sprintf('<li%2$s><a href="%3$s" class="acf-tab-custom" data-placement="top" data-endpoint="0" data-key="acf_field_group_settings_tabs">%1$s</a></li>', esc_html($tab['label']), $class, esc_url($tab['link']));
									$class = '';
								}
								?>
							</ul>
						</div>
						<?php
						foreach ( $tabs as $tab_key => $tab_label ) {
							$wrapper_class = str_replace( '_', '-', $tab_key );
							echo '<div class="field-group-settings-tab amem-' . esc_attr( $wrapper_class ) . '-settings">';
							switch ( $tab_key ) {
								case 'modules' :
									acf_render_field_wrap(
										array(
											'type'         => 'true_false',
											'name'         => '_use_redirects',
											'key'          => '_use_redirects',
											'prefix'       => 'amem_modules',
											'value'        => amem()->options->getmodule('_use_redirects'),
											'label'        => __( 'Redirects', 'advanced-members' ),
											'instructions' => __( 'Redirect users to different pages or URLs after they register, login in and log out based on user roles.', 'advanced-members' ),
											'default'      => true,
											'default_value' => true,
											'ui'           => 1,
										),
										'div'
									);
									global $wp_version;
									if ( version_compare( $wp_version, '5.4.0', '>=' ) ) {
										acf_render_field_wrap(
											array(
												'type'         => 'true_false',
												'name'         => '_use_menu',
												'key'          => '_use_menu',
												'prefix'       => 'amem_modules',
												'value'        => amem()->options->getmodule('_use_menu'),
												'label'        => __( 'Menu Item Visibility', 'advanced-members' ),
												'instructions' => __( 'Enable/disable menu visibility settings on navigation menu screen. You can show or hide the menu by user\'s login status and role.', 'advanced-members' ),
												'default'      => true,
												'default_value' => true,
												'ui'           => 1,
											),
											'div'
										);
									} else {
										acf_render_field_wrap(
											array(
												'type'         => 'message',
												'label'        => __( 'Menu Visibility', 'advanced-members' ),
												'message' => __( 'Menu Visibility feature is supported on WP 5.4.0 or later.', 'advanced-members' ),
											),
											'div'
										);
									}
									acf_render_field_wrap(
										array(
											'type'         => 'true_false',
											'name'         => '_use_adminbar',
											'key'          => '_use_adminbar',
											'prefix'       => 'amem_modules',
											'value'        => amem()->options->getmodule('_use_adminbar'),
											'label'        => __( 'Disable Admin Bar', 'advanced-members' ),
											'instructions' => __( 'Disable the admin bar based on user roles.', 'advanced-members' ),
											'default'      => true,
											'default_value' => true,
											'ui'           => 1,
										),
										'div'
									);
								break;
							}

							do_action( 'amem/admin/html_dashboard_page/tab=' . $tab_key );
							echo '</div>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
