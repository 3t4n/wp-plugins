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
		<?php do_action( 'momo_acgwc_api_shout' ); ?>
		<table class="momo-be-tab-table" width="100%">
			<tbody>
				<tr>
					<td valign="top" class="momo-be-tab-menu">
						<ul class="momo-be-main-tab momo-be-block-section">
							<li><a class="momo-be-tablinks active" href="#momo-be-automation-automation"><i class='bx bx-repeat' ></i><span><?php esc_html_e( 'Automation', 'momoacgwc' ); ?></span></a></li>
							<li><a class="momo-be-tablinks" href="#momo-be-automation-workflows"><i class='bx bx-shuffle'></i><span><?php esc_html_e( 'Workflows', 'momoacgwc' ); ?></span></a></li>
							<!-- <li><a class="momo-be-tablinks" href="#momo-be-automation-queue"><i class='bx bx-list-ul' ></i><span><?php esc_html_e( 'Queue', 'momoacgwc' ); ?></span></a></li> -->							
						</ul>
					</td>
				</tr>
				<tr>
					<td class="momo-be-main-tabcontent" width="100%" valign="top">
						<div class="momo-be-working"></div>
						<div id="momo-be-automation-automation" class="momo-be-admin-content active">
							<?php require_once 'page-momo-acgwc-automation-automation.php'; ?>
						</div>
						<div id="momo-be-automation-workflows" class="momo-be-admin-content">
							<?php require_once 'page-momo-acgwc-automation-workflows.php'; ?>
						</div>
						<div id="momo-be-automation-queue" class="momo-be-admin-content">
							<?php //require_once 'page-momo-acgwc-insights-product.php'; ?>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<?php require_once $momoacgwc->plugin_path . 'includes/admin/pages/partial-momo-settings-footer.php'; ?>
