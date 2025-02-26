<?php
/**
 * MoMo ACG - Autoblog Settings Page
 *
 * @author MoMo Themes
 * @package momoacg
 * @since v3.5.0
 */

global $momoacg;
?>
<div id="momo-be-form">
	<div class="momo-be-wrapper">
		<h2 class="momo-be-settings-header">
			<?php esc_html_e( 'MoMo Themes - Auto Blogging', 'momoacg' ); ?>
		</h2>
		<table class="momo-be-tab-table" width="100%">
			<tbody>
				<tr>
					<td class="momo-be-tab-menu">
						<ul class="momo-be-main-tab">
							<li><a class="momo-be-tablinks active" href="#momo-be-content-generator"><i class='bx bx-copy'></i><span><?php esc_html_e( 'Content Generator', 'momoacg' ); ?></span></a></li>
							<li><a class="momo-be-tablinks" href="#momo-be-auto-blog-settings"><i class='bx bx-timer'></i><span><?php esc_html_e( 'Auto Blogging', 'momoacg' ); ?></span></a></li>
							<li><a class="momo-be-tablinks" href="#momo-be-rssfeed-editor"><i class='bx bx-rss' ></i><span><?php esc_html_e( 'RSS Feed Writer', 'momoacg' ); ?></span></a></li>
							<li><a class="momo-be-tablinks" href="#momo-be-bulkcw-editor"><i class='bx bxs-book-content'></i><span><?php esc_html_e( 'Bulk Writer', 'momoacg' ); ?></span></a></li>
							<li><a class="momo-be-tablinks" href="#momo-be-rssfeed-queue-list"><i class='bx bxs-add-to-queue'></i><span><?php esc_html_e( 'Queue List', 'momoacg' ); ?></span></a></li>
							<?php require_once $momoacg->plugin_path . 'includes/admin/pages/partial-momo-settings-header.php'; ?>
						</ul>
					</td>
				</tr>
				<tr>
					<td class="momo-be-main-tabcontent" width="100%" valign="top">
						<div class="momo-be-working"></div>	
						<div id="momo-be-content-generator" class="momo-be-admin-content active">
							<?php require $momoacg->plugin_path . 'autoblog/admin/pages/page-momo-acg-content-generator.php'; ?>
						</div>
						<div id="momo-be-auto-blog-settings" class="momo-be-admin-content">
							<?php require_once 'page-momo-acg-auto-blog.php'; ?>
						</div>
						<div id="momo-be-rssfeed-editor" class="momo-be-admin-content">
							<?php require_once 'page-momo-rssfeed-editor.php'; ?>
						</div>
						<div id="momo-be-bulkcw-editor" class="momo-be-admin-content">
							<?php require $momoacg->plugin_path . 'bulkcw/pages/page-momo-bulkcw-editor.php'; ?>
						</div>
						<div id="momo-be-rssfeed-queue-list" class="momo-be-admin-content">
							<?php require_once 'page-momo-rssfeed-queue-list.php'; ?>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
