<div class="report-container">
	<div class="overall-grade-container report-block">
		<div class="overall-progress">

			<div class="col-lg-2 col-sm-3">
					<div class="knob"><input type="text" value="<?php echo esc_html( StoreYa_Benchmark_Report_Handler::get_overall_grade() ); ?>" class="dial"></div>
			</div>

		</div>
		<div class="overall-notes">
			<h2>Overall Grade (<?php echo esc_url( STOREYA_BENCHMARK_CLIENT_URL ); ?>)</h2>
			<?php if ( StoreYa_Benchmark_Report_Handler::is_report_exists() ): ?>
				<p>We have reviewed your store and compared it to thousands of large stores (7-8 figures in revenue). The following report will provide you with a benchmark and will guide you through improving your store in the following segments: Business, Marketing, Shopping Experience and Technical.</p>
				<p>All improvements can be executed today.</p>
			<?php else : ?>
				<p>Welcome to Google Ads & Google Shopping for WooCommerce by StoreYa. Please, click the "Analyze" button to get the report.</p>
			<?php endif; ?>
		</div>
		<div class="overall-footer">
			<?php if ( StoreYa_Benchmark_Report_Handler::is_report_exists() ): ?>
				<button id="sybm-start-btn" data-refresh="true">
			<span class="loadingbox" id="bh-loader">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
<circle cx="50" cy="50" fill="none" stroke="#fff" stroke-width="8" r="25" stroke-dasharray="117.80972450961724 41.269908169872416">
  <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.4925373134328357s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
</circle></svg></span>Refresh</button>
			<?php else: ?>
				<button id="sybm-start-btn">Analyze</button>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php if ( StoreYa_Benchmark_Report_Handler::is_report_exists() ): ?>
	<div class="report-container">
		<h2 class="report-title">Total stats</h2>

		<?php foreach ( StoreYa_Benchmark_Report_Handler::get_tabs() as $tab ): ?>
			<div class="report-block">
	<div class="report-box">
		<div class="report-grade">
					<div class="knob small"><input type="text" value="<?php echo esc_html( StoreYa_Benchmark_Report_Handler::get_tab_grade( $tab ) ); ?>" class="dial small"></div>
		</div>

				<h3><?php echo esc_html( StoreYa_Benchmark_Report_Handler::get_tab_title( $tab ) ); ?></h3>


</div>
				<div class="report-table">
					<?php foreach ( StoreYa_Benchmark_Report_Handler::get_tab_rows( $tab ) as $row ): ?>
						<div class="report-row">
							<strong class="name"><?php echo esc_html( StoreYa_Benchmark_Report_Handler::get_row_title( $row ) ); ?></strong>
							<span class="value">
								<?php 
									$row_value = StoreYa_Benchmark_Report_Handler::get_row_value( $row );

									switch ( $row_value ) {
										case 'False':
											echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#1d2327" d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>';
											break;
										case 'True':
											echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#5db656" d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>';
											break;
										case '-':
											echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#1d2327" d="M0 10h24v4h-24z"/></svg>';
											break;
									}
								?>
							</span>
							<div class="info-box"><?php echo wp_kses_post( StoreYa_Benchmark_Report_Handler::get_row_comment( $row ) ); ?></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>

	</div>
<?php endif; ?>
