<?php
/*
 * Page Name: Add New
 */

use CounterBox\Admin\CreateFields;
use CounterBox\Admin\Settings;
use CounterBox\WOWP_Plugin;

defined( 'ABSPATH' ) || exit;

$options = Settings::get_options();

$title = $options['title'] ?? '';
$id    = $options['id'] ?? '';

if ( ! isset( $options['live_preview'] ) ) {
	$builder_open = ' open';
} elseif ( ! empty( $options['live_preview'] ) ) {
	$builder_open = ' open';
} else {
	$builder_open = '';
}
?>
    <form action="" id="wpie-settings" class="wpie-settings__wrapper" method="post">

        <div class="wpie-settings__main">

            <div class="wpie-field">
                <label class="wpie-field__label">
                <span class="screen-reader-text">
                    <?php esc_html_e( 'Enter title here', 'counter-box' ); ?></span>
                    <input type="text" name="title" size="30" value="<?php echo esc_attr( $title ); ?>" id="title"
                           placeholder="<?php esc_attr_e( 'Add title', 'counter-box' ); ?>">
                </label>
            </div>

            <details class="wpie-item is-builder"<?php echo esc_attr( $builder_open ); ?>>
                <input type="hidden" name="param[live_preview]" class="wpie-item__toggle" value="1">
                <summary class="wpie-item_heading">
                    <h3>
                        <span class="wpie-icon wpie_icon-eye-open"></span>
                        <span class="wpie-icon wpie_icon-eye-closed"></span>
                        <?php esc_html_e( 'Live preview', 'counter-box' ); ?>
                    </h3>
                    <span class="wpie-item_heading_toogle">
                    <span class="dashicons dashicons-arrow-down"></span>
                    <span class="dashicons dashicons-arrow-up "></span>
                </span>
                </summary>

                <div class="wpie-live-preview">
                    <style id="wpie-live-preview-style"></style>
                    <div class="wpie-counter-preview" id="wpie-builder"></div>
                </div>

            </details>



			<?php Settings::init(); ?>

        </div>

        <div class="wpie-settings__sidebar">
			<?php require_once WOWP_Plugin::dir() . 'admin/settings/sidebar.php'; ?>
        </div>

        <input type="hidden" name="tool_id" value="<?php echo absint( $id ); ?>" id="tool_id"/>
        <input type="hidden" name="item_time" value="<?php echo esc_attr( time() ); ?>"/>
		<?php wp_nonce_field( WOWP_Plugin::PREFIX . '_nonce', WOWP_Plugin::PREFIX . '_settings' ); ?>
    </form>
<?php
