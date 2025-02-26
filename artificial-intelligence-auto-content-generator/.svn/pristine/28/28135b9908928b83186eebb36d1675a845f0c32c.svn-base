<?php
/**
 * MoMo ACG - Admin Settings Page
 *
 * @author MoMo Themes
 * @package momoacg
 * @since v1.0
 */
global $momoacg;
$openai_settings = get_option( 'momo_acg_openai_settings' );
$api_key         = isset( $openai_settings['api_key'] ) ? $openai_settings['api_key'] : '';
$info            = esc_html__( 'Add the API key to get started.', 'momoacg' );
?>
<div id="momo-be-form">
	<div class="momo-be-wrapper">
		<!-- <h2 class="momo-be-settings-header">
			<?php esc_html_e( 'MoMo Themes - Auto Content Generator', 'momoacg' ); ?>
		</h2>
		<div class="momo-be-hr-line"></div> -->
		<table class="momo-be-tab-table" width="100%">
			<tbody>
				<tr>
					<td class="momo-be-tab-menu">
						<ul class="momo-be-main-tab">
							<li><a class="momo-be-tablinks active" href="#momo-be-settings-openai"><i class='bx openai-icon-custom'></i><span><?php esc_html_e( 'API', 'momoacg' ); ?></span></a></li>
							<li><a class="momo-be-tablinks" href="#momo-be-settings-general"><i class='bx bx-cog'></i><span><?php esc_html_e( 'General', 'momoacg' ); ?></span></a></li>
							<?php do_action( 'momo_acg_admin_tab_li' ); ?>
							<?php
							if ( empty( $api_key ) ) {
								?>
								<li style="margin-left:auto;align-items: center;">
									<div class="momo-be-api-key-info">
										<i class='bx bxs-info-circle'></i>
										<span><?php echo esc_html( $info ); ?></span>
									</div>
								</li>
								<?php
							}
							?>
							<?php require_once $momoacg->plugin_path . 'includes/admin/pages/partial-momo-settings-header.php'; ?>
						</ul>
					</td>
				</tr>
				<tr>
					<td class="momo-be-main-tabcontent" width="100%" valign="top">
						<div class="momo-be-working"></div>	
						<div id="momo-be-settings-openai" class="momo-be-admin-content active">
							<form method="post" action="options.php" id="momo-momoacg-admin-settings-form">
								<?php settings_fields( 'momoacg-settings-openai-group' ); ?>
								<?php do_settings_sections( 'momoacg-settings-openai-group' ); ?>
								<?php require_once 'page-momo-acg-openai.php'; ?>
								<?php
								submit_button(
									esc_html__( 'Save Changes', 'momoacg' ),
									'primary momo-be-float-right',
									'submit',
								);
								?>
							</form>
						</div>
						<div id="momo-be-settings-general" class="momo-be-admin-content">
							<form method="post" action="options.php" id="momo-momoacg-general-settings-form">
								<?php settings_fields( 'momoacg-settings-general-group' ); ?>
								<?php do_settings_sections( 'momoacg-settings-general-group' ); ?>
								<?php require_once 'page-momo-acg-general.php'; ?>
								<?php
								submit_button(
									esc_html__( 'Save Changes', 'momoacg' ),
									'primary momo-be-float-right',
									'submit',
								);
								?>
							</form>
						</div>
						<?php do_action( 'momo_acg_admin_tab_content' ); ?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
