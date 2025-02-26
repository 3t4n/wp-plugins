<?php
/**
 * MoMo ACG - Client Access Settings Page
 *
 * @author MoMo Themes
 * @package momoacg
 * @since v3.5.0
 */

global $momoacg;
?>
<div id="momo-be-form">
	<div class="momo-be-wrapper">
		<table class="momo-be-tab-table" width="100%">
			<tbody>
				<tr>
					<td class="momo-be-tab-menu">
						<ul class="momo-be-main-tab">
							<?php require_once $momoacg->plugin_path . 'includes/admin/pages/partial-momo-settings-header.php'; ?>
						</ul>
					</td>
				</tr>
				<tr>
					<td class="momo-be-main-tabcontent" width="100%" valign="top">
						<div id="momo-be-client-access" class="momo-be-admin-content active">
							<form method="post" action="options.php" id="momo-momoacg-credit-system-settings-form">
								<?php settings_fields( 'momoacg-settings-credit-system-group' ); ?>
								<?php do_settings_sections( 'momoacg-settings-credit-system-group' ); ?>
								<?php require_once 'page-momo-acg-client-access.php'; ?>
								<?php
									submit_button(
										esc_html__( 'Save Changes', 'momoacg' ),
										'primary momo-be-float-right',
										'submit',
									);
								?>
							</form>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
