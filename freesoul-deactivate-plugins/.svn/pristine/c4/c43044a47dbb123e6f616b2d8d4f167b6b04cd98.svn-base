<?php
/**
 * Template Table Head Singles.

 * @package Freesoul Deactivate Plugins
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

?>

<tr id="eos-dp-table-head">
  <th class="fdp-legend" style="vertical-align:top;background:#f1f1f1;border-style:none;text-align:initial;padding-top:45px">
	<span>
	  <span class="eos-dp-locked-wrp eos-dp-icon-wrp" style="position:relative"><span class="eos-post-locked-icon" style="width:40px;height:21px"></span>
	  <span class="eos-dp-no-decoration fdp-has-tooltip">
		<span class="dashicons dashicons-editor-help" style="font-size:24px"></span>
		<p class="fdp-tooltip" style="width:auto;white-space:inherit"><?php printf( wp_kses_post( __( 'The row settings will override the %1$sPost Types settings%2$s.', 'freesoul-deactivate-plugins' ) ), '<a href="' . esc_url( admin_url( '?page=eos_dp_by_post_type' ) ) . '" target="_fdp_post_types">', '</a>' ); ?></p>
	  </span>
	</span>
	<span>&nbsp;&nbsp;&nbsp;</span>
	<span>
	  <span class="eos-dp-unlocked-wrp eos-dp-icon-wrp" style="position:relative"><span class="eos-post-unlocked-icon" style="width:40px;height:19px"></span>
	  <span class="eos-dp-no-decoration fdp-has-tooltip">
		<span class="dashicons dashicons-editor-help" style="font-size:24px"></span>
		<p class="fdp-tooltip" style="width:auto;white-space:inherit"><?php printf( wp_kses_post( __( 'The %1$sPost Types settings%2$s will override the row settings.', 'freesoul-deactivate-plugins' ) ), '<a href="' . esc_url( admin_url( '?page=eos_dp_by_post_type' ) ) . '" target="_fdp_post_types">', '</a>' ); ?></p>
	  </span>
	</span>
	<?php if ( ! $fdp_is_single_post ) { ?>
	<div style="margin-top:16px">
	  <span id="eos-dp-lock-all" class="button<?php echo $is_home ? ' eos-hidden' : ''; ?>">
		<?php esc_html_e( 'Activate all rows', 'eos-dp-pro' ); ?>
	  </span>
	  <span id="eos-dp-unlock-all" class="button<?php echo $is_home ? ' eos-hidden' : ''; ?>">
		<?php esc_html_e( 'Disable all rows', 'eos-dp-pro' ); ?>
	  </span>
	</div>
		<?php do_action( 'fdp_before_row_filters' ); ?>
	<div id="fdp-show-page-filters-wrp" style="margin-top:16px"><span id="fdp-show-page-filters" class="button"><?php esc_html_e( 'Page Filters', 'freesoul-deactivate-plugins' ); ?><span class="dashicons dashicons-arrow-down" style="font-size:28px"></span></span></div>
	<div id="fdp-singles-filter" class="eos-hidden" style="position:absolute">
	  <p style="margin-top:6px">
		<span title="<?php esc_attr_e( 'Show all', 'freesoul-deactivate-plugins' ); ?>" style="color:initial;border-color:initial" class="eos-active button fdp-filter-all"><?php esc_html_e( 'Show all', 'freesoul-deactivate-plugins' ); ?></span>
	  </p>
	  <div>
		<span title="<?php esc_attr_e( 'Homepage', 'freesoul-deactivate-plugins' ); ?>" class="eos-dp-active hover dashicons dashicons-admin-home" data-class=".fdp-row-is-home"></span>
		<span title="<?php esc_attr_e( 'Active rows', 'freesoul-deactivate-plugins' ); ?>" class="eos-dp-active hover dashicons dashicons-yes" data-class=".eos-post-locked"></span>
		<span title="<?php esc_attr_e( 'Not active rows', 'freesoul-deactivate-plugins' ); ?>" class="eos-dp-active hover dashicons dashicons-no-alt" data-class=".eos-dp-post-row:not(.eos-post-locked)"></span>
		<span title="<?php esc_attr_e( 'Included in the navigation', 'freesoul-deactivate-plugins' ); ?>" class="eos-dp-active hover dashicons dashicons-menu-alt2" data-class=".fdp-in-nav"></span>
		<span title="<?php esc_attr_e( 'Private', 'freesoul-deactivate-plugins' ); ?>" class="eos-dp-active hover dashicons dashicons-privacy" data-class=".fdp-row-private"></span>
		<br/>
		<?php if ( $is_hierarchical ) { ?>
		<span title="<?php esc_attr_e( 'Child page', 'freesoul-deactivate-plugins' ); ?>" class="eos-dp-active hover fdp-child-page dashicons dashicons-networking" data-class=".fdp-row-is-child"></span>
		<span title="<?php esc_attr_e( 'Top level page', 'freesoul-deactivate-plugins' ); ?>" class="eos-dp-active hover fdp-parent-page dashicons dashicons-networking" data-class=".fdp-top-level-page"></span>
		<?php } ?>
		<span title="<?php esc_attr_e( 'Plugins all active', 'freesoul-deactivate-plugins' ); ?>" class="eos-dp-active hover fdp-all-active dashicons dashicons-plugins-checked" data-class="[data-disabled-plugins='0']"></span>
		<span title="<?php esc_attr_e( 'Plugins all disabled', 'freesoul-deactivate-plugins' ); ?>" class="eos-dp-active hover fdp-all-disabled dashicons dashicons-admin-plugins" data-class="[data-active-plugins='0']"></span>
		<?php
		if ( function_exists( 'eos_scfm_post_types' ) ) {
			?>
		  <span title="<?php esc_attr_e( 'Mobile', 'freesoul-deactivate-plugins' ); ?>" class="eos-dp-active hover dashicons dashicons-smartphone" data-class=".eos-dp-mobile"></span>
		<?php } ?>
		<?php if ( class_exists( 'WooCommerce' ) && 'page' === $post_type ) { ?>
		<span title="<?php esc_attr_e( 'WooCommerce pages', 'freesoul-deactivate-plugins' ); ?>" class="eos-dp-active hover dashicons dashicons-cart" data-class=".eos-dp-woo-row"></span>
	  <?php } ?>
	  </div>
	</div>
		<?php do_action( 'fdp_after_row_filters' ); ?>
	<?php } else { ?>
	<div style="clear:both"></div>
	<?php } ?>
  </th>
  <?php
	$n = 0;
	foreach ( $active_plugins as $plugin ) {
		if ( in_array( $plugin, array_keys( $plugins_by_dirs ) ) ) {
			$plugin_name = strtoupper( eos_dp_get_plugin_name_by_slug( $plugin ) );
			$details_url = esc_url(
				add_query_arg(
					array(
						'tab'         => 'plugin-information',
						'plugin'      => dirname( $plugin ),
						'TB_iframe'   => true,
						'eos_dp'      => $plugin,
						'eos_dp_info' => 'true',
					),
					admin_url( 'plugin-install.php' )
				)
			);
			?>
	  <th class="eos-dp-name-th">
		<div>
		  <div id="eos-dp-plugin-name-<?php echo esc_attr( $n + 1 ); ?>" class="eos-dp-plugin-name" data-path="<?php echo esc_attr( $plugin ); ?>">
			<span><a title="<?php printf( esc_attr__( 'View details of %s', 'freesoul-deactivate-plugins' ), esc_attr( $plugin_name ) ); ?>" href="<?php echo esc_url( $details_url ); ?>" target="_blank"><?php echo esc_html( $plugin_name ); ?></a></span>
		  </div>
		  <div class="eos-dp-global-chk-col-wrp">
			<div class="eos-dp-not-active-wrp"><input title="<?php echo esc_attr( sprintf( esc_attr__( 'Activate/deactivate %s everywhere', 'freesoul-deactivate-plugins' ), $plugin_name ) ); ?>" data-col="<?php echo esc_attr( $n + 1 ); ?>" class="eos-dp-global-chk-col" type="checkbox" /></div>
			<?php if ( defined( 'FDP_BETA_VERSION' ) && FDP_BETA_VERSION ) { ?>
			  <div class="eos-dp-reset-col" data-col="<?php echo esc_attr( $n + 1 ); ?>"><span title="<?php echo esc_attr( sprintf( esc_attr__( 'Restore last saved options for %s everywhere', 'freesoul-deactivate-plugins' ), $plugin_name ) ); ?>" class="dashicons dashicons-image-rotate"></span></div>
			<?php } ?>
			<?php do_action( 'eos_dp_table_head_col_after' ); ?>
		  </div>
		  <div class="fdp-p-n"><?php echo esc_attr( $n + 1 ); ?></div>
		</div>
	  </th>
			<?php
			++$n;
		}
	}
	?>
</tr>
