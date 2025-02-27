<?php
/**
 * Easy Populate Posts groups.
 *
 * @package spp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$maybe_ajax = filter_input( INPUT_POST, 'action', FILTER_DEFAULT );
$maybe_ajax = ! empty( $maybe_ajax ) && 'spp_groups_list' === $maybe_ajax ? true : false;
$maybe_hash = filter_input( INPUT_POST, 'groupId', FILTER_DEFAULT );
?>
<input type="hidden" name="spp_groups[load]" id="spp_groups_load" value="">
<input type="hidden" name="spp_groups[discard]" id="spp_groups_discard" value="">
<input type="hidden" name="spp_groups[export]" id="spp_groups_export" value="">
<?php
if ( ! empty( self::$settings_groups ) ) {
	$list = self::$settings_groups;
	foreach ( $list as $k => $v ) {
		?>
		<div class="group-row">
			<button class="hint-icon" data-target="do-group-load" data-id="<?php echo esc_html( $k ); ?>" title="<?php esc_html_e( 'Load', 'spp' ); ?>"><span class="dashicons dashicons-arrow-left-alt as-icon"></span></button>
			<button class="hint-icon" data-target="do-group-export" data-id="<?php echo esc_html( $k ); ?>" title="<?php esc_html_e( 'Export', 'spp' ); ?>"><span class="dashicons dashicons-arrow-up-alt as-icon"></span></button>
			<?php echo esc_html( $v['name'] ); ?>
			<button class="hint-icon" data-target="do-group-discard" data-id="<?php echo esc_html( $k ); ?>" title="<?php esc_html_e( 'Discard', 'spp' ); ?>" data-hash="<?php echo esc_html( $k ); ?>" data-type="discard"><span class="dashicons dashicons-trash as-icon"></span></button>
			<?php
			if ( $maybe_hash === $k ) {
				?>
				<div style="grid-column: span 4;"><?php esc_html_e( 'Copy the JSON string', 'spp' ); ?></div>
				<textarea id="content-<?php echo esc_html( $k ); ?>"><?php echo esc_html( $v['content'] ); ?></textarea>
				<script>
				const element = document.getElementById('content-<?php echo esc_html( $k ); ?>');
				if (element) {
					element.scrollIntoView({behavior: 'smooth', inline: 'nearest'});
				}
				</script>
				<?php
			}
			?>
		</div>
		<?php
	}
} else {
	esc_html_e( 'No groups.', 'spp' );
}

if ( $maybe_ajax ) {
	$groups_save = filter_input( INPUT_POST, 'spp_groups', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY );
	if ( ! empty( $groups_save['load'] ) ) {
		?>
		<script>window.reload();</script>
		<?php
	}

	wp_die();
}
