<?php
/**
 * MoMo ChatGPT - Chatbot Settings Page
 *
 * @author MoMo Themes
 * @package momochatgpt
 * @since v3.6.0
 */
global $momoacg;
?>
<div id="momo-be-form">
	<div class="momo-be-wrapper">
		<h2 class="momo-be-settings-header">
			<?php esc_html_e( 'MoMo Themes - ChatBot', 'momoacg' ); ?>
		</h2>
		<!-- <div class="momo-be-hr-line"></div> -->
		<table class="momo-be-tab-table" width="100%">
			<tbody>
				<tr>
					<td valign="top" class="momo-be-tab-menu">
						<ul class="momo-be-main-tab">
							<li><a class="momo-be-tablinks active" href="#momo-be-chatbot-settings"><i class='bx bxs-cog' ></i><span><?php esc_html_e( 'Settings', 'momoacg' ); ?></span></a></li>
							<li><a class="momo-be-tablinks" href="#momo-be-chatbot-dashboard"><i class='bx bxs-dashboard'></i><span><?php esc_html_e( 'Insight', 'momoacg' ); ?></span></a></li>
							<li><a class="momo-be-tablinks" href="#momo-be-chatbot-trainings"><i class='bx bx-bookmarks' ></i><span><?php esc_html_e( 'Trainings', 'momoacg' ); ?></span></a></li>
							<li><a class="momo-be-tablinks" href="#momo-be-chatbot-chatgpt"><i class='bx bxs-chat'></i></i><span><?php esc_html_e( 'ChatGPT', 'momoacg' ); ?></span></a></li>
							<?php require_once $momoacg->plugin_path . 'includes/admin/pages/partial-momo-settings-header.php'; ?>
						</ul>
					</td>
				</tr>
				<tr>
					<td class="momo-be-main-tabcontent" width="100%" valign="top">
						<div class="momo-be-working"></div>	
						<div id="momo-be-chatbot-dashboard" class="momo-be-admin-content">
							<?php require_once 'page-momo-acg-chatbot-dashboard.php'; ?>
						</div>
						<div id="momo-be-chatbot-settings" class="momo-be-admin-content active">
							<form method="post" action="options.php" id="momo-momoacg-chatbot-settings-form">
								<?php settings_fields( 'momoacg-settings-chatbot-group' ); ?>
								<?php do_settings_sections( 'momoacg-settings-chatbot-group' ); ?>
								<?php require_once 'page-momo-acg-chatbot.php'; ?>
								<?php
								submit_button(
									esc_html__( 'Save Changes', 'momoacg' ),
									'primary momo-be-float-right',
									'submit',
								);
								?>
							</form>
						</div>
						<div id="momo-be-chatbot-trainings" class="momo-be-admin-content">
							<form method="post" action="options.php" id="momo-momoacg-admin-settings-form">
								<?php settings_fields( 'momoacg-settings-cb-trainings-group' ); ?>
								<?php do_settings_sections( 'momoacg-settings-cb-trainings-group' ); ?>
								<?php require_once 'page-momo-acg-chatbot-trainings.php'; ?>
								<?php
								submit_button(
									esc_html__( 'Save Changes', 'momoacg' ),
									'primary momo-be-float-right',
									'submit',
								);
								?>
							</form>
						</div>
						<div id="momo-be-chatbot-chatgpt" class="momo-be-admin-content">
							<form method="post" action="options.php" id="momo-momoacg-admin-settings-form">
								<?php settings_fields( 'momoacg-settings-chatgpt-group' ); ?>
								<?php do_settings_sections( 'momoacg-settings-chatgpt-group' ); ?>
								<?php require_once $momoacg->plugin_path . 'chatgpt/admin/pages/page-momo-chatgpt-openai.php'; ?>
								<div class="momo-be-hr-line"></div>
								<?php require_once $momoacg->plugin_path . 'chatgpt/admin/pages/page-momo-chatgpt-openai-instructions.php'; ?>
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
