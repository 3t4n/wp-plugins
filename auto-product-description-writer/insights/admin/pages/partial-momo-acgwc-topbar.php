<?php
/**
 * Top bar for insights
 *
 * @since 1.2.5
 * @package momoacgwc
 */

$momo_acgwc_insights_settings = get_option( 'momo_acgwc_insights_settings' );
$time_filter                  = isset( $momo_acgwc_insights_settings['time_filter'] ) ? $momo_acgwc_insights_settings['time_filter'] : 'monthly';
?>
<div class="momo-acgwc-topbar">
	<div class="filter-select momo-acgwc">
		<select id="time-filter" name="momoacgwc-insights-time-filter" class="momo-acgwc">
			<option value="weekly" <?php selected( $time_filter, 'weekly' ); ?>><?php esc_html_e( 'Weekly', 'momoacgwc' ); ?></option>
			<option value="monthly" <?php selected( $time_filter, 'monthly' ); ?>><?php esc_html_e( 'Monthly', 'momoacgwc' ); ?></option>
			<option value="yearly" <?php selected( $time_filter, 'yearly' ); ?>><?php esc_html_e( 'Yearly', 'momoacgwc' ); ?></option>
		</select>
	</div>
</div>
<style>
	.momo-acgwc-topbar {
		display: flex;
		justify-content: flex-end;
		align-items: center;
		padding: 0.7rem;
		background-color: /* #fff */ transparent;
		border: /* 1px solid #ddd */ transparent;
		border-radius: 8px;
		text-align: right;
		box-shadow: /* 0 4px 8px rgba(0, 0, 0, 0.1) */ transparent;
		margin-bottom: 10px;
	}

	#momo-be-form  .momo-acgwc-topbar select {
		min-width: 120px;
		appearance: none; /* Removes default arrow */
		-webkit-appearance: none;
		-moz-appearance: none;
		padding-right: 2.5rem; /* Add space for the custom arrow */
		background-color: #fff;
		border: 1px solid #ddd;
		border-radius: 6px;
		font-size: 13px;
		color: #333;
		width: 200px; /* Optional: Adjust width as needed */
		position: relative;
	}
	.momo-acgwc-topbar::after {
		content: "";
		position: absolute;
		top: 50%;
		right: 1rem; /* Align to the right */
		transform: translateY(-50%);
		width: 0;
		height: 0;
		border-left: 6px solid transparent;
		border-right: 6px solid transparent;
		border-top: 8px solid #FF6978; /* Custom arrow color */
		pointer-events: none; /* Ensure it doesn't block select interactions */
	}

	#momo-be-form  .momo-acgwc-topbar select:focus {
		outline: none;
		border-color: #FF6978;
	}


	.filter-select.momo-acgwc select.momo-acgwc:hover {
		border-color: #0056b3;
	}
</style>