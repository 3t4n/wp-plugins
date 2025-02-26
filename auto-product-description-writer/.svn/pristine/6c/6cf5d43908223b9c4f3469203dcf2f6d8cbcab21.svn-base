<?php
/**
 * Insights Settings Page
 *
 * @author MoMo Themes
 * @package momoacgwc
 * @since v1.2.5
 */

global $momoacgwc;
?>
<div id="momo-be-form">
	<div class="momo-be-wrapper">
		<?php require_once 'partial-momo-acgwc-topbar.php'; ?>
		<?php do_action( 'momo_acgwc_api_shout' ); ?>
		<table class="momo-be-tab-table" width="100%">
			<tbody>
				<tr>
					<td valign="top" class="momo-be-tab-menu">
						<ul class="momo-be-main-tab momo-be-block-section">
							<li><a class="momo-be-tablinks active" href="#momo-be-insights-reports"><i class='bx bx-file' ></i><span><?php esc_html_e( 'Reports', 'momoacgwc' ); ?></span></a></li>
							<li><a class="momo-be-tablinks" href="#momo-be-insights-sales"><i class='bx bx-line-chart' ></i><span><?php esc_html_e( 'Sales', 'momoacgwc' ); ?></span></a></li>
							<li><a class="momo-be-tablinks" href="#momo-be-insights-product"><i class='bx bx-cube' ></i><span><?php esc_html_e( 'Product', 'momoacgwc' ); ?></span></a></li>
							<li><a class="momo-be-tablinks" href="#momo-be-insights-customer"><i class='bx bx-user-circle' ></i><span><?php esc_html_e( 'Customer', 'momoacgwc' ); ?></span></a></li>
							<li><a class="momo-be-tablinks" href="#momo-be-insights-dashboard"><i class='bx bx-bar-chart-alt-2' ></i><span><?php esc_html_e( 'Performance', 'momoacgwc' ); ?></span></a></li>
							<!-- <li><a class="momo-be-tablinks" href="#momo-be-insights-emails"><i class='bx bx-mail-send' ></i><span><?php //esc_html_e( 'Emails', 'momoacgwc' ); ?></span></a></li> -->
							
						</ul>
					</td>
				</tr>
				<tr>
					<td class="momo-be-main-tabcontent" width="100%" valign="top">
						<div class="momo-be-working"></div>
						<div id="momo-be-insights-reports" class="momo-be-admin-content active">
							<?php require_once 'page-momo-acgwc-insights-reports.php'; ?>
						</div>
						<div id="momo-be-insights-sales" class="momo-be-admin-content">
							<?php require_once 'page-momo-acgwc-insights-sales.php'; ?>
						</div>
						<div id="momo-be-insights-product" class="momo-be-admin-content">
							<?php require_once 'page-momo-acgwc-insights-product.php'; ?>
						</div>
						<div id="momo-be-insights-customer" class="momo-be-admin-content">
							<?php require_once 'page-momo-acgwc-insights-customer.php'; ?>
						</div>
						<!-- <div id="momo-be-insights-emails" class="momo-be-admin-content">
							<?php //require_once 'page-momo-acgwc-insights-emails.php'; ?>
						</div> -->
						<div id="momo-be-insights-dashboard" class="momo-be-admin-content">
							<?php require_once 'page-momo-acgwc-insights-dashboard.php'; ?>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<?php require_once $momoacgwc->plugin_path . 'includes/admin/pages/partial-momo-settings-footer.php'; ?>
