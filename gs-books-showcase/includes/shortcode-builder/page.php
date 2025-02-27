<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

/**
 * Template file doc comment
 * Description of what this module (or file) is doing.
 *
 * @package GS_BOOKS
 */
?>
<div class="app-container">
	<div class="main-container">
		<div id="gs-book-showcase-shortcode-app">
			<header class="gs-book-showcase-header">
				<div class="gs-containeer-f">
					<div class="gs-roow">
						<div class="logo-area gs-col-xs-6">
							<router-link to="/"><img src="<?php echo esc_url( GS_BOOKS_PLUGIN_URI . '/assets/img/books.png' ); ?>" alt="GS Book Showcase"></router-link>
						</div>
						<div class="menu-area gs-col-xs-6 text-right">
							<ul>
								<router-link to="/" tag="li"><a><?php esc_html_e( 'Shortcodes', 'gsbookshowcase' ); ?></a></router-link>
								<router-link to="/shortcode" tag="li"><a><?php esc_html_e( 'Create New', 'gsbookshowcase' ); ?></a></router-link>
								<router-link to="/preferences" tag="li"><a><?php esc_html_e( 'Preferences', 'gsbookshowcase' ); ?></a></router-link>
								<router-link to="/taxonomies" tag="li"><a><?php esc_html_e( 'Taxonomies', 'gsbookshowcase' ); ?></a></router-link>
								<router-link to="/bulk-import" tag="li"><a><?php esc_html_e( 'Bulk Import', 'gsbookshowcase' ); ?></a></router-link>
								<router-link to="/localization" tag="li"><a><?php esc_html_e( 'Localization', 'gsbookshowcase' ); ?></a></router-link>
								<router-link to="/demo-data" tag="li"><a><?php esc_html_e( 'Demo Data', 'gsbookshowcase' ); ?></a></router-link>
							</ul>
						</div>
					</div>
				</div>
			</header>

			<div class="gs-book-showcase-app-view-container">
				<router-view :key="$route.fullPath"></router-view>
			</div>

		</div>
	</div>
</div>