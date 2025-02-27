<?php
/**
 * Easy Populate Posts images.
 *
 * @package spp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div>
	<h3><?php esc_html_e( 'Images', 'spp' ); ?></h3>

	<h4><?php esc_html_e( 'Random Images', 'spp' ); ?></h4>
	<div class="row-span four-one">
		<?php echo self::spp_images_mention(); // phpcs:ignore ?>
		<button class="hint-icon" data-target="#spp_hint_images"><span class="dashicons dashicons-info as-icon"></span></button>
	</div>
	<div id="spp_hint_images" class="spp_hint not-visible">
		<button class="hint-icon" data-target="#spp_hint_images"><span class="dashicons dashicons-dismiss as-icon"></span></button>
		<div class="first">
			<?php esc_html_e( 'You can add here the images URLs (separated by new line).', 'spp' ); ?>
		</div>
		<p>
			<?php esc_html_e( 'If you want to reuse images you already have in the media library, add the attachments IDs (separated by new line).', 'spp' ); ?>
		</p>
	</div>

	<div class="group-row import">
		<textarea name="spp[images_list]" id="spp_images_list"></textarea>
		<div>
			<button class="hint-icon" data-target="do-copy-images-list"><span class="dashicons dashicons-arrow-up-alt as-icon" title="<?php esc_html_e( 'Use the plugin sample images', 'spp' ); ?>"></span></button>
			<button class="hint-icon" data-target="do-reset-images-list"><span class="dashicons dashicons-trash as-icon" title="<?php esc_html_e( 'Discard', 'spp' ); ?>"></span></button>
		</div>
	</div>

	<span id="spp_initial_images"><?php echo self::$settings['default_images']; // phpcs:ignore ?></span>

	<div id="spp_settings_wrap"><?php self::spp_show_plugin_images(); ?></div>
	<p>
		<label><input type="checkbox" name="spp[random_no_image]" id="spp_random_no_image" <?php checked( self::$settings['random_no_image'], 1 ); ?>> <?php esc_html_e( 'randomly skip attaching featured image to the added posts', 'spp' ); ?></label>
	</p>

	<h3 class="secondary"><?php esc_html_e( 'Extra', 'spp' ); ?></h3>

	<h4 class="with-hint">
		<?php esc_html_e( 'Patterns', 'spp' ); ?>
		<button class="hint-icon" data-target="#spp_hint_patterns"><span class="dashicons dashicons-info as-icon"></span></button>
	</h4>

	<div id="spp_hint_patterns" class="spp_hint not-visible">
		<button class="hint-icon" data-target="#spp_hint_patterns"><span class="dashicons dashicons-dismiss as-icon"></span></button>
		<div class="first">
			<?php
			// Translators: %1$s - first pattern, %2$s - second pattern, %3$s - third pattern, %4$s - untranslatable `min` pattern part, %5$s - untranslatable `max` pattern part.
			echo wp_kses_post( sprintf( __( 'To generate even more random content, you could use the following patterns in the title prefix, in the terms names, and in the custom fields values. <ol><li>%1$s: this pattern will generate a random <b>capital letter</b> from A to Z</li><li>%2$s: this pattern will generate a random <b>number</b> between the %4$s and %5$s specified values</li><li>%3$s: this pattern will generate a random <b>string</b> with minimum %4$s words and maximum %5$s chars</li></ol>', 'spp' ),
				'<code>#[L]</code>',
				'<code>#[N-min:max]</code>',
				'<code>#[S-min:max]</code>',
				'`min`',
				'`max`'
			) );
			?>
		</div>
		<div>
			<?php
			$pattern_types = [
				[ '#[MOBILE]', __( 'mobile number', 'spp' ) ],
				[ '#[EMAIL]', __( 'email address', 'spp' ) ],
				[ '#[URL]', __( 'URL', 'spp' ) ],
				[ '#[l]', __( 'letter', 'spp' ) ],
				[ '#[L]', __( 'capital letter', 'spp' ) ],
				[ '#[S-5:32]', __( 'title', 'spp' ) ],
				[ '#[S-35:220]. #[S-35:220]. #[S-35:220].', __( 'text', 'spp' ) ],
				[ '#[N-0:100]', __( 'number between 0-100', 'spp' ) ],
				[ '#[N-0:100:L0]', __( 'with leading 0', 'spp' ) ],
				[ '#[N-0:100:T0]', __( 'with trailing 0', 'spp' ) ],
				[ '#[DATE]', __( 'date', 'spp' ) ],
				[ '#[DATEP]', __( 'past date', 'spp' ) ],
				[ '#[DATEF]', __( 'future date', 'spp' ) ],
				[ '#[TIME]', __( 'time', 'spp' ) ],
				[ '#[DATETIME]', __( 'date', 'spp' ) . ' & ' . __( 'time', 'spp' ) ],
				[ '#[TIMESTAMP]', __( 'timestamp', 'spp' ) ],
				[ '#[LON]', __( 'longitude', 'spp' ) ],
				[ '#[LAT]', __( 'latitude', 'spp' ) ],
				[ '#[COLOR]', __( 'color', 'spp' ) ],
				[ '#[LCOLOR]', __( 'light color', 'spp' ) ],
				[ '#[DCOLOR]', __( 'dark color', 'spp' ) ],
			];
			?>
			<h4><?php esc_html_e( 'Patterns', 'spp' ); ?></h4>
			<ul class="patterns-list">
				<?php
				foreach ( $pattern_types as $k => $item ) {
					echo '<li><span>&bull;</span><button class="hint-icon as-pattern button-link" data-target="do-pattern" data-type="' . esc_html( $item[0] ) . '">' . esc_html( $item[1] ) . '</button></li>';
				}
				?>
			</ul>
		</div>
		<div class="row-span two-one">
			<input type="text" name="spp_pattern_sample" id="spp_pattern_sample">
			<button id="spp_pattern_button" class="button"><?php esc_html_e( 'Test', 'spp' ); ?></button>
		</div>
		<div id="spp_pattern_test"></div>
		<p>
			<?php esc_html_e( 'When one of the patterns is used in the title prefix, the whole pattern will be used for generating the title.', 'spp' ); ?>
		</p>
	</div>

	<h4 class="with-hint">
		<?php esc_html_e( 'Import', 'spp' ); ?>/<?php esc_html_e( 'Export', 'spp' ); ?>
		<button class="hint-icon" data-target="#spp_hint_import_export"><span class="dashicons dashicons-info as-icon"></span></button>
	</h4>
	<div id="spp_hint_import_export" class="spp_hint not-visible">
		<button class="hint-icon" data-target="#spp_hint_import_export"><span class="dashicons dashicons-dismiss as-icon"></span></button>
		<div class="first">
			<?php esc_html_e( 'For easily switching/restoring settings, you can save these as groups, each with a name, then export/import the JSON string to use in other instances.', 'spp' ); ?>
		</div>

		<hr>
		<h4><?php esc_html_e( 'Import', 'spp' ); ?></h4>
		<?php esc_html_e( 'Paste the JSON string below, then click the import icon', 'spp' ); ?>
		<div class="group-row import">
			<textarea name="spp_groups[import]" id="spp_groups_import" placeholder="<?php esc_attr_e( 'JSON string to be imported', 'spp' ); ?>"></textarea>
			<div>
				<button class="hint-icon" data-target="do-group-action-import" title="<?php esc_html_e( 'Import', 'spp' ); ?>"><span class="dashicons dashicons-arrow-down-alt as-icon"></span></button>
			</div>
		</div>

		<h4><?php esc_html_e( 'Groups', 'spp' ); ?></h3>
		<?php esc_html_e( 'Save the current settings as a group', 'spp' ); ?>
		<div class="row-span four-one">
			<input type="text" name="spp_groups[add_title]" id="spp_groups_add_title" value="" placeholder="<?php esc_attr_e( 'Group name', 'spp' ); ?>" size="20">
			<div>
				<button class="hint-icon save-settings-alt" data-target="do-save" title="<?php esc_html_e( 'Save Settings', 'spp' ); ?>"><span class="dashicons dashicons-yes as-icon"></span></button>
			</div>
		</div>
		<div id="spp_groups_list">
			<?php self::display_groups(); ?>
		</div>
	</div>

	<hr>
	<button id="spp_save" class="button"><?php esc_html_e( 'Save Settings', 'spp' ); ?></button>
	<p>
		<button id="spp_execute" class="button button-primary"><?php esc_html_e( 'Generate Posts', 'spp' ); ?></button>
	</p>
</div>
