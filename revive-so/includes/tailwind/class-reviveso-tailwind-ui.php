<?php

/**
 * REVIVESO_Tailwind_UI class.
 *
 * Used to handle the tailwind UI in order to have a uniform look and feel across the plugin.
 * Used on more general elements, like tables and such.
 *
 * @since 2.0.0
 */
class REVIVESO_Tailwind_UI extends REVIVESO_BaseController {

	use REVIVESO_Admin_Settings;
	use REVIVESO_SettingsData;
	use REVIVESO_Hooker;
	use REVIVESO_HelperFunctions;

	/**
	 * Holds the class object.
	 *
	 * @since 2.0.0
	 *
	 * @var object
	 */
	public static $instance;

	/**
	 * REVIVESO_Tailwind_UI constructor.
	 *
	 * @since 2.0.0
	 */
	private function __construct() {
		parent::__construct();
		// Enqueue required scripts and styles.
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ), 100 );
		// Add the Tailwind class to the body
		add_filter( 'admin_body_class', array( $this, 'add_body_class' ) );
	}

	/**
	 * Returns the singleton instance of the class.
	 *
	 * @return object The REVIVESO_Tailwind_UI object.
	 *
	 * @since 2.0.0
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof REVIVESO_Tailwind_UI ) ) {
			self::$instance = new REVIVESO_Tailwind_UI();
		}

		return self::$instance;
	}

	/**
	 * Enqueue the admin scripts and styles.
	 *
	 * @since 2.0.0
	 */
	public function enqueue_admin_scripts() {
		if ( ! REVIVESO_Admin::is_reviveso_admin_page() ) {
			return;
		}
		global $wp_styles;
		// Dequeue all the styles except the ones we need.
		foreach ( $wp_styles->queue as $handle ) {
			if ( false === strpos( $handle, 'reviveso' ) ) {
				wp_dequeue_style( $handle );
			}
		}
		do_action( 'reviveso_tailwind_scripts_enqueue' );
		wp_enqueue_style( 'reviveso-general' );
		wp_enqueue_script( 'reviveso-tailwind' );
		wp_enqueue_style( 'reviveso-tailwind' );
		wp_enqueue_style( 'reviveso-custom-tailwind' );
		wp_enqueue_style( 'dashicons' );
	}

	/**
	 * Tailwind classes for the admin list table
	 *
	 * @since 2.0.0
	 */
	public static function table() {
		$return = array(
			'wrapper'          => array( 'default' => 'inline-block min-w-full mt-2 sm:rounded-lg align-middle flow-root' ),
			'pagination'       => array( 'default' => 'inline-block min-w-full mt-2 min-w-full flex items-center justify-between bg-white' ),
			'pagination_inner' => array( 'default' => 'grid min-w-full sm:grid-cols-2 items-end' ),
			'table'            => array( 'default' => 'min-w-full divide-y divide-gray-300' ),
			'tbody'            => array( 'default' => 'divide-y divide-gray-200 bg-white' ),
			'thead'            => array( 'default' => '' ),
			'tfoot'            => array( 'default' => '' ),
			'tr'               => array( 'default' => '' ),
			'th'               => array( 'default' => 'px-3 py-3.5 text-left text-sm font-semibold text-gray-900 text-left' ),
			'td'               => array( 'default' => 'px-3 py-5 text-sm text-gray-500' ),
			'table_img_wrap'   => array( 'default' => 'h-14 w-14 flex-shrink-0' ),
			'table_img'        => array( 'default' => 'h-14 w-14 rounded-full' ),
			'table_img_url'    => array( 'default' => REVIVESO_URL . 'assets/images/reviveso-revived-posts-placeholder.jpg' ),
			'table_text'       => array( 'default' => 'font-medium text-gray-900' ),
			'extra'            => array( 'default' => 'lg:col-span-1 lg:text-center' ),
			// ^ (extra) - should not be used, just add classes that needs to be in this addon for any reason.
		);

		return apply_filters( 'reviveso_tailwind_table', $return );
	}


	/**
	 * Tailwind classes for the admin list table
	 *
	 * @since 2.0.0
	 */
	public static function table_heads() {
		$return = array(
			'default' => 'px-3 py-3.5 text-left text-sm font-semibold text-gray-900 text-left',
			'cb'      => 'relative px-7 sm:w-12 sm:px-6',
		);

		return apply_filters( 'reviveso_tailwind_table_heads', $return );
	}

	/**
	 * Tailwind classes for the stats cards
	 *
	 * @since 2.0.0
	 */
	public static function card() {
		return apply_filters( 'reviveso_tailwind_card', 'flex flex-col bg-gray-700/5 p-8' );
	}

	/**
	 * Tailwind classes for the select element
	 *
	 * @since 2.0.0
	 */
	public static function select() {
		return apply_filters( 'reviveso_tailwind_select', ' block w-full rounded-md py-3 px-3 pl-3 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6 ' );
	}

	/**
	 * Tailwind classes for the navigation
	 *
	 * @since 2.0.0
	 */
	public static function navigation() {
		$return = array(
			'wrapper' => 'border-b border-gray-200',
			'nav'     => '-mb-px flex',
			'a'       => 'text-gray-500 hover:border-gray-300 hover:text-gray-700 border-b-2 py-4 px-6 text-center text-sm font-medium',
		);

		return apply_filters( 'reviveso_tailwind_nav', $return );
	}

	/**
	 * Tailwind classes for the button
	 *
	 * @since 2.0.0
	 */
	public static function secondary_button() {
		return apply_filters( 'reviveso_tailwind_secondary_button', 'rounded-full bg-indigo-50 px-3.5 py-2 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100' );
	}

	/**
	 * Tailwind classes for the button
	 *
	 * @since 2.0.0
	 */
	public static function primary_button() {
		return apply_filters( 'reviveso_tailwind_primary_button', 'rounded-full m-2 bg-indigo-600 px-3.5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 hover:cursor-pointer' );
	}

	/**
	 * Tailwind classes for the major navigation
	 *
	 * @since 2.0.0
	 */
	public function main_nav() {
		$head_tag = apply_filters( 'reviveso_dashboard_header_tag', $this->tag . '' . $this->version );
		global $submenu;
		$tabs       = $submenu['reviveso'];
		$active_tab = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : 'dashboard';

		?>
		<nav x-data='{ open: false }' class='major-nav grid border-b border-gray-200'>
			<div class='flex justify-items-center back-button'>
				<a href='<?php
				echo esc_url( get_admin_url() ); ?>' class='text-black hover:bg-gray-50 hover:text-indigo-600 rounded-md px-3 py-2 text-sm font-medium hover:text-indigo-600 focus:text-indigo-600'>
					<span class='dashicons dashicons-arrow-left-alt2 ml-6'></span><?php
					echo esc_html__( 'Back', 'revive-so' ); ?>
				</a>
			</div>
			<div class='max-w-10xl px-2 sm:px-6 lg:px-8'>
				<div class='relative flex h-16 items-center justify-between py-2'>
					<div class='flex flex-row flex-1 items-center justify-center sm:items-stretch sm:justify-start'>
						<a href="<?php
						echo esc_url( admin_url( 'admin.php?page=reviveso' ) ); ?>" class="text-black hover:text-indigo-600 logo-link">
							<div class='flex flex-col flex-shrink-0 items-center relative'>
								<span class='corner corner-tl'></span>
								<h2 class=''>Revive.so</h2>
								<span class="head-tip rounded-md text-xs font-small"><?php
									echo esc_html( $head_tag ); ?></span>
								<span class="corner corner-br"></span>
							</div>
						</a>

						<div class="sm:ml-6 flex items-center">
							<div class="flex space-x-4">
								<?php
								$url_input = 'admin.php?page=';
								foreach ( $tabs as $tab ) {
									list( $name, $capability, $uri, $title ) = $tab;
									$link = $url_input . $uri;
									if ( 'reviveso-upsell-tab' != $uri ):
										?>
										<a href="<?php
										echo esc_url( admin_url( $link ) ); ?>" class="cursor-pointer tab-upsell <?php
										echo( $active_tab == $uri ? 'text-indigo-600 rounded-md px-3 py-2 text-sm font-medium' : 'text-black hover:text-indigo-600 rounded-md px-3 py-2 text-sm font-medium' ); ?> focus:text-indigo-600" id="reviveso-tab-<?php
										echo esc_attr( sanitize_title( $title ) ); ?>"><?php
											echo esc_html( $name ); ?></a>
									<?php

									else:
										?>
										<div class="cursor-pointer tab-upsell <?php
										echo( $active_tab == $uri ? 'bg-gray-900 text-gray-700 rounded-md px-3 py-2 text-sm font-medium' : 'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium' ); ?> hover:text-white focus:text-white" id="reviveso-tab-<?php
										echo esc_attr( sanitize_title( $title ) ); ?>"><?php
											echo esc_html( $name ); ?>
											<span class="inline-flex items-center rounded-md bg-yellow-400/10 px-2 py-1 text-xs font-medium text-yellow-500 ring-1 ring-inset ring-yellow-400/20">PRO</span>

										</div>
									<?php
									endif;
								}
								?>
							</div>
						</div>
					</div>
					<div class='hidden sm:ml-6 sm:flex sm:items-center'>
						<div class='top-sharebar'>
							<a class='share-btn rate-btn no-popup border border-gray-200 bg-gray-200 text-black hover:text-indigo-600' href='https://wordpress.org/support/plugin/revive-so/reviews/?filter=5#new-post' target='_blank' title="<?php
							esc_html_e( 'Please rate 5 stars if you like Reviveso', 'revive-so' ); ?>"><span class='dashicons dashicons-star-filled'></span> <?php
								esc_html_e( 'Rate 5 stars', 'revive-so' ); ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<?php
	}

	/**
	 * Tailwind classes for the major navigation
	 *
	 * @since 2.0.0
	 */
	public function major_nav( $active_tab, $tabs ) {
		$class_name = apply_filters( 'reviveso_plguin_settings_class_name', '' );
		$head_tag   = apply_filters( 'reviveso_dashboard_header_tag', $this->tag . '' . $this->version );
		global $submenu;
		$links = $submenu['reviveso'];
		?>
		<nav x-data='{ open: false }' class='bg-gray-800 major-nav'>
			<div class='max-w-10xl px-2 sm:px-6 lg:px-8'>
				<div class='relative flex h-16 items-center justify-between py-2'>
					<div class='flex flex-row flex-1 items-center justify-center sm:items-stretch sm:justify-start'>
						<div class='flex flex-col flex-shrink-0 items-center relative'>
							<span class='corner corner-tl'></span>
							<h2 class='text-gray-700'>Revive.so</h2>
							<span class="head-tip text-gray-700 rounded-md text-xs font-small <?php
							echo esc_attr( $class_name ); ?>"><?php
								echo esc_html( $head_tag ); ?></span>
							<span class="corner corner-br"></span>
						</div>

						<div class="ml-6 flex items-center">
							<div class="flex space-x-4">

								<?php
								foreach ( $tabs as $key => $tab ) {
									?>
									<a href="<?php
									echo esc_attr( $tab['link'] ); ?>" class="<?php
									echo( $active_tab == $key ? ' bg-gray-900 text-gray-700 rounded-md px-3 py-2 text-sm font-medium' : ' text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium' );
									echo isset( $tab['class'] ) ? esc_attr( $tab['class'] ) : ''; ?> hover:text-white focus:text-white" id="reviveso-tab-<?php
									echo esc_attr( $key ); ?>"><?php
										echo esc_html( $tab['name'] ); ?><?php
										echo isset( $tab['badge'] ) ? '<span class="badge text-gray-900">' . esc_attr( $tab['badge'] ) . '</span>' : ''; ?></a>
									<?php
								}
								?>
							</div>
						</div>
					</div>
					<div class='hidden sm:ml-6 sm:flex sm:items-center'>
						<div class='top-sharebar'>
							<a class='share-btn rate-btn no-popup' href='https://wordpress.org/support/plugin/revive-so/reviews/?filter=5#new-post' target='_blank' title="<?php
							esc_html_e( 'Please rate 5 stars if you like Reviveso', 'revive-so' ); ?>"><span class='dashicons dashicons-star-filled'></span> <?php
								esc_html_e( 'Rate 5 stars', 'revive-so' ); ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<?php
	}

	/**
	 * Tailwind classes for the minor navigation
	 *
	 * @since 2.0.0
	 */
	public static function minor_nav( $key, $items, $tab ) {
		$tailwind_nav = self::navigation();
		$allowed_html = array( 'i' => array( 'class' => array() ) );
		echo '<div class="reviveso-' . esc_attr( $key ) . ' ' . esc_attr( $tailwind_nav['wrapper'] ) . ' reviveso-minor-nav ">';
		echo '<nav class="' . esc_attr( $tailwind_nav['nav'] ) . '" aria-label=\'Tabs\'>';
		foreach ( $items as $item => $subtab ) {
			$icon  = isset( $subtab['has_icon'] ) ? '<i class="dashicons ' . esc_attr( $subtab['has_icon'] ) . '"></i>' : '';
			$class = isset( $subtab['class'] ) ? esc_attr( $subtab['class'] ) : '';
			$badge = isset( $subtab['badge'] ) ? '<span class="reviveso-badge">' . esc_html( $subtab['badge'] ) . '</span>' : '';
			if ( ! $tab ) {
				$tab = $item;
			}
			$active = ( $item == $tab ? 'text-indigo-600 border-b-2 border-indigo-500' : 'border-transparent' );

			echo wp_kses_post( sprintf( '<a href="%s" class="%s %s %s" data-type="%s"> %s %s %s </a>', esc_attr( $subtab['link'] ), esc_attr( $tailwind_nav['a'] ), esc_attr( $active ), esc_attr( $class ), esc_attr( $item ), $icon, wp_kses( $subtab['name'], $allowed_html ), $badge ) );
		}
		echo '</nav>';
		echo '</div>';
	}

	/**
	 * Tailwind layout for sidebar navigation
	 *
	 * @since 2.0.0
	 */
	public function sidebar_nav() {
		$settings        = $this->get_settings_fields();
		$current_tab     = isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : ( isset( $_GET['page'] ) && 'reviveso' === $_GET['page'] ? 'general' : 'null' );
		$current_section = isset( $_GET['section'] ) ? sanitize_text_field( wp_unslash( $_GET['section'] ) ) : 'query';

		if ( empty( $settings[ $current_tab ][ $current_section ] ) ) {
			$sidebar_class = 'border-0';
			$component     = 'border-0';
		} else {
			$sidebar_class = 'lg:flex';
			$component     = 'border-r';
		}
		?>
		<div class='relative clearfix sidebar grid'>
		<!-- Static sidebar for desktop -->
		<div class='<?php
		echo esc_attr( $sidebar_class ); ?>  lg:inset-y-0 lg:z-50 lg:flex-col'>
			<!-- Sidebar component, swap this element with another sidebar if you like -->
			<div class='flex grow flex-col gap-y-5 overflow-y-auto px-6 pb-4 <?php
			echo esc_attr( $component ); ?> border-gray-200 bg-white px-6'>
				<nav class='flex flex-1 flex-col'>
					<ul role='list' class='flex flex-1 flex-col gap-y-7'>
						<li>
							<ul role='list' class='-mx-2 space-y-1 pt-3'>
								<?php
								if ( isset( $settings[ $current_tab ] ) ) {
									$url = 'admin.php?page=reviveso&tab=' . $current_tab . '&section=';
									foreach ( $settings[ $current_tab ] as $key => $value ) {
										if ( $current_section == $key ) {
											$class = 'bg-gray-50 text-indigo-600';
										} else {
											$class = 'text-gray-700';
										}
										?>
										<li>
											<a href='<?php
											echo esc_url( admin_url( $url . $key ) ); ?>' class='<?php
											echo esc_attr( $class ); ?> hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold'><?php
												echo esc_html( $value['name'] ); ?></a>
										</li>

										<?php
									}
								}
								?>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>

		<div class='reviveso-clearfix'>
		<main class='reviveso-clearifx'>
		<div class='px-4 sm:px-6 lg:px-8'>
		<!-- Your content -->
		<?php
	}

	/**
	 * Tailwind layout ending, in order to close the divs and put the content inside
	 *
	 * @since 2.0.0
	 */
	public static function main_ender() {
		?>
		</div>
		</main>
		<div class="reviveso-clearfix">
			<?php
			include __DIR__ . '/footer.php'; ?>
		</div>
		</div>
		</div>
		<?php
	}

	/**
	 * Tailwind classes for the text input
	 *
	 * @since 2.0.0
	 */
	public static function text_input() {
		return apply_filters( 'reviveso_tailwind_text_input', 'block w-full rounded-md border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 reviveso-form-control reviveso-form-el reviveso-expand' );
	}

	/**
	 * Tailwind classes for the text search input
	 *
	 * @since 2.0.0
	 */
	public static function search_input() {
		return apply_filters( 'reviveso_tailwind_text_input', 'w-4/5 inline-block rounded-md border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-700 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6
' );
	}

	/**
	 * Tailwind classes for the textarea search input
	 *
	 * @since 2.0.0
	 */
	public static function textarea_input() {
		return apply_filters( 'reviveso_tailwind_textarea_input', 'block w-full rounded-md border-0 py-3 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-700 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6' );
	}

	/**
	 * Renders Tailwind pagination
	 *
	 * @since 2.0.0
	 */
	public static function pagination( $args, $per_page, $witch = 'top' ) {
		if ( empty( $args ) ) {
			return;
		}
		$total_pages = $args['total_pages'];

		if ( 1 >= $total_pages ) {
			return;
		}

		$total_items  = $args['total_items'];
		$on_page      = $args['per_page'];
		$current      = isset( $_GET['paged'] ) ? absint( $_GET['paged'] ) : 1;
		$from         = max( ( $current - 1 ) * $per_page, 1 );
		$to           = ( ( $current - 1 ) * $per_page ) + $on_page;
		$allowed_html = array(
			'a'    => array(
				'href'  => array(),
				'class' => array(),
				'rel'   => array(),
			),
			'span' => array(
				'class' => array(),
			),
			'svg'  => array(
				'class'       => array(),
				'viewBox'     => array(),
				'fill'        => array(),
				'aria-hidden' => array(),
			),
			'path' => array(
				'fill-rule' => array(),
				'd'         => array(),
				'clip-rule' => array(),
			),
		);

		$notif = sprintf(
			/* translators: 1: start result number, 2: end result number, 3: total results */
			__( 'Showing %1$s to %2$s of %3$s results', 'revive-so' ),
			'<span class="font-medium">' . $from . '</span>',
			'<span class="font-medium">' . $to . '</span>',
			'<span class="font-medium">' . $total_items . '</span>'
		);

		$previous = '<a href="' . add_query_arg( array( 'paged' => max( $current - 1, 1 ) ) ) . '" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
				    <span class="sr-only">' . __( 'Previous', 'revive-so' ) . '</span>
				    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
				        <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd"></path>
				    </svg>
				</a>';

		$next = '<a href="' . add_query_arg( array( 'paged' => min( $current + 1, $total_pages ) ) ) . '" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
				    <span class="sr-only">Next</span>
				    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
				        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd"></path>
				    </svg>
				</a>';

		$elipsis = '<span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>';

		$current_class = "relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-gray-700 focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600";
		$default_class = "relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0";
		$display       = '';
		$p1            = '';
		$p2            = '';
		$p3            = '';
		if ( 6 >= $total_pages ) {
			$display .= $previous;
			for ( $i = 1; $i <= $total_pages; $i ++ ) {
				if ( $current == $i ) {
					$display .= '<a href="' . esc_url( add_query_arg( array( 'paged' => $i ) ) ) . '" class="' . esc_attr( $current_class ) . '">' . esc_html( $i ) . '</a>';
				} else {
					$display .= '<a href="' . esc_url( add_query_arg( array( 'paged' => $i ) ) ) . '" class="' . esc_attr( $default_class ) . '">' . esc_html( $i ) . '</a>';
				}
			}
			$display .= $next;
		} else {
			if ( 1 != $current && $total_pages != $current ) {
				$max = $current >= $total_pages - 2 ? 2 : $current;
				for ( $i = ( $max - 1 ); $i <= ( $max + 1 ); $i ++ ) {
					$val = $i;

					if ( $val === $total_pages - 2 ) {
						$val = $val - 3;
						$p1  = '<a href="' . esc_url( add_query_arg( array( 'paged' => $val ) ) ) . '" class="' . esc_attr( $default_class ) . '">' . esc_html( $val ) . '</a>' . $p1;
						continue;
					}

					if ( $current == $val ) {
						$p1 .= '<a href="' . esc_url( add_query_arg( array( 'paged' => $val ) ) ) . '" class="' . esc_attr( $current_class ) . '">' . esc_html( $val ) . '</a>';
					} else {
						$p1 .= '<a href="' . esc_url( add_query_arg( array( 'paged' => $val ) ) ) . '" class="' . esc_attr( $default_class ) . '">' . esc_html( $val ) . '</a>';
					}
				}

				$p2 .= $elipsis;

				for ( $i = $total_pages - 2; $i <= $total_pages; $i ++ ) {
					if ( $current == $i ) {
						$p3 .= '<a href="' . esc_url( add_query_arg( array( 'paged' => $i ) ) ) . '" class="' . esc_attr( $current_class ) . '">' . esc_html( $i ) . '</a>';
					} else {
						$p3 .= '<a href="' . esc_url( add_query_arg( array( 'paged' => $i ) ) ) . '" class="' . esc_attr( $default_class ) . '">' . esc_html( $i ) . '</a>';
					}
				}
			} else {
				if ( 1 == $current ) {
					$p1 .= '<a href="' . esc_url( add_query_arg( array( 'paged' => 1 ) ) ) . '" class="' . esc_attr( $current_class ) . '">' . esc_html( 1 ) . '</a>';
				} else {
					$p1 .= '<a href="' . esc_url( add_query_arg( array( 'paged' => 1 ) ) ) . '" class="' . esc_attr( $default_class ) . '">' . esc_html( 1 ) . '</a>';
				}
				$p1 .= '<a href="' . esc_url( add_query_arg( array( 'paged' => 2 ) ) ) . '" class="' . esc_attr( $default_class ) . '">' . 2 . '</a>';
				$p1 .= '<a href="' . esc_url( add_query_arg( array( 'paged' => 3 ) ) ) . '" class="' . esc_attr( $default_class ) . '">' . 3 . '</a>';

				$p2 .= $elipsis;

				$p3 .= '<a href="' . esc_url( add_query_arg( array( 'paged' => $total_pages - 2 ) ) ) . '" class="' . esc_attr( $default_class ) . '">' . esc_html( $total_pages - 2 ) . '</a>';
				$p3 .= '<a href="' . esc_url( add_query_arg( array( 'paged' => $total_pages - 1 ) ) ) . '" class="' . esc_attr( $default_class ) . '">' . esc_html( $total_pages - 1 ) . '</a>';
				if ( $total_pages == $current ) {
					$p3 .= '<a href="' . esc_url( add_query_arg( array( 'paged' => $total_pages ) ) ) . '" class="' . esc_attr( $current_class ) . '">' . esc_html( $total_pages ) . '</a>';
				} else {
					$p3 .= '<a href="' . esc_url( add_query_arg( array( 'paged' => $total_pages ) ) ) . '" class="' . esc_attr( $default_class ) . '">' . esc_html( $total_pages ) . '</a>';
				}
			}

			$display = $previous . $p1 . $p2 . $p3 . $next;
		}
		?>
		<div class="text-right sm:col-span-2 lg:col-span-1 <?php
		echo ( 'bottom' == $witch ) ? 'sm:col-span-2 lg:col-span-3' : ''; ?>">
			<?php
			if ( 'top' == $witch ) : ?>
				<p class="text-sm text-gray-700 text-right sm:mt-2"> <?php
					echo wp_kses_post( $notif ); ?> </p>
			<?php
			endif; ?>
			<nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
				<?php
				echo wp_kses( $display, $allowed_html ); ?>
			</nav>
			<?php
			if ( 'bottom' == $witch ) : ?>
				<p class="text-sm text-gray-700 text-right"> <?php
					echo wp_kses_post( $notif ); ?> </p>
			<?php
			endif; ?>
		</div>
		<?php
	}

	/**
	 * Renders Tailwind dropdown buttons
	 *
	 * @since 2.0.0
	 */
	public static function dropdown( $options, $selected, $input_name ) {
		?>

		<div class='relative w-40 inline-block align-middle'>
			<input class="dropdown-input dropdown-input-<?php
			echo esc_attr( $input_name ); ?>" id="dropdown-input-<?php
			echo esc_attr( $input_name ); ?>" type='hidden' name="<?php
			echo esc_attr( $input_name ); ?>" value="<?php
			echo esc_attr( $selected ); ?>"/>
			<button type='button' class='dropdown-button relative w-full cursor-pointer rounded-md bg-white py-3 px-3 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-outline-none focus-ring-2 focus-ring-indigo-600 sm-text-sm sm-leading-6' data-expanded='false'>
        <span class='dropdown-name block truncate'><?php
	        echo esc_html( $options[ $selected ] ); ?></span>
				<span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
            <svg class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd"/>
            </svg>
        </span>
			</button>

			<ul class="dropdown-options absolute z-10 mt-1 max-h-60 w-auto overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus-outline-none sm-text-sm" tabindex="-1" role="listbox" style="display:none;">
				<?php
				foreach ( $options as $value => $name ) {
					?>
					<li class="dropdown-option text-gray-900 relative cursor-pointer select-none py-2 pl-8 pr-4 hover:bg-indigo-600 hover:text-white" role="option" data-value="<?php
					echo esc_attr( $value ); ?>">
                <span class="dropdown-option-name font-normal block truncate"><?php
	                echo esc_html( $name ); ?></span>
						<span class="dropdown-option-check absolute inset-y-0 left-0 flex items-center pl-1.5 hover:text-white" style="display: <?php
						echo ( $value == $selected ) ? 'flex;' : 'none;'; ?>">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"/>
                    </svg>
                </span>
					</li>
					<?php
				}
				?>
			</ul>
		</div>
		<?php
	}

	/**
	 * Display the main page
	 *
	 * @since 2.0.0
	 */
	public function tailwind_main_page() {
		$settings        = $this->get_settings_fields();
		$current_tab     = isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'general';
		$current_section = isset( $_GET['section'] ) ? sanitize_text_field( wp_unslash( $_GET['section'] ) ) : 'query';
		$page_tabs       = $this->get_tabs();
		include __DIR__ . '/main.php';
	}

	/**
	 * Add required Tailwind class to the body
	 *
	 * @since 2.0.0
	 */
	public function add_body_class( $classes ) {
		$classes .= 'h-full bg-white';

		return $classes;
	}

	/**
	 * Tailwind classes for the cards. Used in the extensions page.
	 *
	 * @since 2.0.0
	 */
	public static function tailwind_cards() {
		$cards = array(
			'wrapper' => 'grid grid-flow-col sm:grid-cols-3 grid-cols-4 gap-3',
			'card'    => 'overflow-hidden rounded-xl border border-gray-200',
			'header'  => '',
			'title'   => '',
			'body'    => 'text-center border-b border-gray-900/5 bg-gray-50 p-6',
			'footer'  => 'p-6',
		);

		return apply_filters( 'reviveso_tailwind_cards', $cards );
	}
}
