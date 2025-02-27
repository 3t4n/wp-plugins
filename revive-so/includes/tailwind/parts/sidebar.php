<?php

/**
 * The sidebar of the application.
 */
$head_tag = apply_filters( 'reviveso_dashboard_header_tag', $this->tag . '' . $this->version );
global $submenu;
$tabs       = $submenu['reviveso'];
$dash_icons = apply_filters(
	'reviveso_menu_icons',
	array(
		'reviveso'                 => 'dashicons-dashboard',
		'reviveso-scheduled-tasks' => 'dashicons-calendar-alt',
		'reviveso-extensions'      => 'dashicons-admin-plugins',
	)
);
$active_tab = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : 'dashboard';
?>
	<!-- Static sidebar for desktop -->
	<div class='reviveso-sidebar lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col'>
		<!-- Sidebar component, swap this element with another sidebar if you like -->
		<div class='flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6 pb-4'>
			<nav class='flex flex-1 flex-col'>
				<ul role='list' class='flex flex-1 flex-col gap-y-3'>
					<?php
					$url_input = 'admin.php?page=';

					foreach ( $tabs as $tab ) {
						list( $name, $capability, $uri, $title ) = $tab;
						$link   = $url_input . $uri;
						$active = ( $active_tab === $uri && 'reviveso-upsell-tab' !== $active_tab ) ? 'bg-gray-50 text-indigo-600' : 'text-gray-700';
						$upsell = 'reviveso-upsell-tab' === $uri ? ' reviveso-tab-upsell ' : '';
						?>
						<li>
							<a href='<?php
							echo esc_url( admin_url( $link ) ); ?>' class='<?php
							echo esc_attr( $active . $upsell ); ?> hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold'>
								<?php
								$icon = '<span class="dashicons dashicons-info"></span>';
								if ( ! empty( $dash_icons[ $uri ] ) ) {
									$icon = '<span class="dashicons ' . esc_attr( $dash_icons[ $uri ] ) . '"></span>';
								}
								echo wp_kses_post( $icon );
								echo esc_html( $name ); ?>
								<?php
								echo 'reviveso-upsell-tab' === $uri ? '<span class="inline-flex items-center rounded-full bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">' . esc_html( 'PRO' ) . '</span>' : ''; ?>
							</a>
						</li>
						<?php
					}
					?>
					<li>
						<a href='<?php
						echo esc_url( admin_url() ); ?>' class='hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold back-button'>
							<span class='dashicons dashicons-arrow-left-alt'></span>
							<?php
							echo esc_html__( 'Back', 'revive-so' ); ?>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
<?php
