<?php

/**
 * Reports Main View
 */

?>
<div class="giveasap-settings-header">
    <img src="<?php echo esc_url( trailingslashit( GASAP_URI ) . 'assets/images/logo-color.svg' ); ?>" />
	<?php esc_html_e( 'Simple Giveaways', 'giveasap' ); ?>
</div>
<div class="giveasap-settings-subheader">
    <h2><?php esc_html_e( 'Reports', 'giveasap' ); ?></h2>
</div>
<div class="wrap">


	<h2 class="nav-tab-wrapper">
		<?php
			$sub_reports     = array();
			$current_section = '';

		if ( $reports ) {
			$current_section = isset( $_GET['section'] ) ? \Simple_Giveaways\Helpers::unslash_and_clean( $_GET['section'] ) : 'subscribers';
			foreach ( $reports as $report_section_slug => $report_section ) {
				$active_tab = '';
				if ( $report_section_slug === $current_section ) {
					$sub_reports = $report_section['reports'];
					$active_tab  = 'nav-tab-active';
				}
				?>
					<a class="nav-tab <?php echo esc_attr( $active_tab ); ?>" href="<?php echo esc_url_raw( admin_url( 'edit.php?post_type=giveasap&page=sg_reports&section=' . $report_section_slug ) ); ?>"><?php echo esc_html( $report_section['title'] ); ?></a>
					<?php
			}
		}
		?>
	</h2>
	<?php
	if ( $sub_reports ) {
		$active_report = isset( $_GET['report'] ) && isset( $sub_reports[ $_GET['report'] ] ) ? \Simple_Giveaways\Helpers::unslash_and_clean( $_GET['report'] ) : false;
		if ( false == $active_report ) {
			$report_slugs  = array_keys( $sub_reports );
			$active_report = $report_slugs[0];
		}
		echo '<ul class="subsubsub">';
		foreach ( $sub_reports as $sub_report_slug => $report_title ) {
			echo '<li>';
			echo '<a ' . ( $sub_report_slug === $active_report ? 'class="current"' : '' ) . ' href="' . esc_url_raw( admin_url( 'edit.php?post_type=giveasap&page=sg_reports&section=' . $current_section . '&report=' . $sub_report_slug ) ) . '">' . esc_html( $report_title ) . '</a>';
			echo '</li>';
		}
		do_action( 'sg_reports_' . $current_section . '_sub_reports' );
		echo '</ul>';
	}
		do_action( 'sg_reports_' . $current_section . '_after_sub_reports' );

		$options      = $report->has_report_options();
		$report_class = '';

	if ( $options ) {
		$report_class = 'with-options';
	}
	?>
	<div class="sg-report-view  <?php echo esc_attr( $report_class ); ?>">
		<?php $report->report_options(); ?>

		<div class="sg-report-container">
			<?php echo wp_kses_post( $report->get_view() ); ?>
		</div>
	</div>
	<?php
	if ( $options ) {
		?>
			<br/>
			<label><?php esc_html_e( 'Options', 'giveasap' ); ?></label>
			<div class="sg-report-options-switch on">
				<div class="data-on">
					<span class="selected"><?php esc_html_e( 'ON', 'giveasap' ); ?></span>
					<span><?php esc_html_e( 'OFF', 'giveasap' ); ?></span>
				</div>
				<div class="data-off">
					<span><?php esc_html_e( 'ON', 'giveasap' ); ?></span>
					<span class="selected"><?php esc_html_e( 'OFF', 'giveasap' ); ?></span>
				</div>
			</div>
			<?php
	}
	?>
</div>
<script type="text/javascript">

	var sgReports = {
		legend: <?php echo esc_attr( $report->show_legend() ); ?>,
		type: '<?php echo esc_attr( $report->get_type() ); ?>',
		labels: [<?php echo wp_kses_post( $report->get_labels() ); // phpcs:ignore ?>],
		datasets: <?php echo wp_json_encode( $report->get_data_sets() ); ?>
	};

</script>
