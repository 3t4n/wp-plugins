<?php

add_action('admin_menu', 'll_add_admin_page');

function ll_add_admin_page() {

    add_submenu_page(
        'users.php',
        'Temporary Login Links',
        'Temporary Login',
        'manage_options',
        'temporary-login-links',
        'll_admin_page_content'
    );
}

function ll_enqueue_custom_admin_script($hook) {
    if (isset($_GET['page']) && $_GET['page'] === 'temporary-login-links') {
        
		wp_enqueue_script(
            'helpers', 
            LL_PLUGIN_DIR . 'admin/js/helpers.js', 
            array('jquery'), 
            LL_PLUGIN_VERSION, 
            true 
        );

        wp_enqueue_script(
            'api-calls-script',
            LL_PLUGIN_DIR . 'admin/js/api-calls.js',
            array('jquery', 'helpers'),
            LL_PLUGIN_VERSION,
            true 
        );

        wp_enqueue_script(
            'custom-admin-script', 
            LL_PLUGIN_DIR . 'admin/js/admin-page.js', 
            array('jquery', 'api-calls-script', 'helpers'), 
            LL_PLUGIN_VERSION, 
            true 
        );

		
        wp_enqueue_style(
            'admin-custom-style', 
            LL_PLUGIN_DIR . 'admin/css/admin-page.css', 
            array(), 
            LL_PLUGIN_VERSION 
        );

        wp_localize_script('api-calls-script', 'api', array(
            'nonce' => wp_create_nonce('wp_rest')
        ));
    }
}
add_action('admin_enqueue_scripts', 'll_enqueue_custom_admin_script');

function ll_admin_page_render_row_template($data = []) {
    $allowed_html_tags = [
        'tr' => [
            'class' => [],
            'data-is-expired' => [],
            'data-id' => [],
        ],
        'td' => [
            'class' => [],
        ],
        'a' => [
            'href' => [],
            'target' => [],
            'class' => [],
            'data-link' => [],
            'aria-label' => [],
        ],
        'div' => [
            'class' => [],
        ],
        'span' => [
            'class' => [],
        ],
        'br' => [],
    ];

    $template = '
    <tr class="link-row" data-is-expired="%is_expired%" data-id="%id%">
        <td class="link column-link">
            <a href="%link_url%" target="_blank">%relative_link_url%</a>
            <div class="row-actions">
                <span class="copy">
                    <a href="#" class="copy-btn" data-link="%link_url%" aria-label="Copy the link to Clipboard">Copy to Clipboard</a> |
                </span>
                <span class="delete">
                    <a href="#" class="delete-btn" data-link="%id%" aria-label="Delete the link">Delete</a>
                </span>
            </div>
        </td>
        <td class="logins-as column-logins-as">%display_name% <br />(%role%)</td>
        <td class="expires-in column-expires-in">%expiration_time%</td>
        <td class="logins-used column-logins-used">%logins_used_max%</td>
    </tr>';

    foreach ($data as $placeholder => $value) {
        $template = str_replace("%{$placeholder}%", esc_html($value), $template);
    }

    echo wp_kses($template, $allowed_html_tags);
}

function ll_admin_page_render_no_links_found_template() {
    $allowed_html_tags = [
        'tr' => [
            'id' => [],
        ],
        'td' => [
            'colspan' => [],
        ],
    ];

	$template = '
    <tr id="row-no-link-found"><td colspan="4">No temporary login links found.</td></tr>';

    echo wp_kses($template, $allowed_html_tags);
}

// Display Admin Page Content
function ll_admin_page_content() {
    ?>
	<template id="row-no-link-found-template"><?php ll_admin_page_render_no_links_found_template(); ?></template>
    <template id="row-template"><?php ll_admin_page_render_row_template(); ?></template>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

        <div id="col-container" class="wp-clearfix">
            <!-- Left Column: Form to create a temporary login link -->
			<div id="col-left">
				<div class="col-wrap">
					<h2>New Temporary Login Link</h2>
					<form id="add_temp_login_link" class="ll-form" method="post" action="">
						<?php wp_nonce_field('create_link_nonce', 'nonce_field'); ?>

						<!-- User Selection Type: Temporary or Existing -->
						<div class="ll-form__field form-required term-name-wrap">
							<label class="ll-label">Logins As</label>
							<fieldset class="field-group-horizontal">
								<label class="ll-label ll-radio-button" for="user_type_temp">
									<input type="radio" name="user_type" id="user_type_temp" value="temporary" checked> 
									Temporary User
								</label>
								<label class="ll-label ll-radio-button" for="user_type_existing">
									<input type="radio" name="user_type" id="user_type_existing" value="existing"> 
									Existing User
								</label>
							</fieldset>
							<p class="description">Create a temporary user or use an existing one for the login link.</p>
						</div>

						<!-- User selection field -->
						<div class="ll-form__field form-required term-name-wrap" id="user-id-field" style="display: none;">
							<label class="ll-label" for="user_id">User</label>
							<select name="user_id" id="user_id" aria-required="true" disabled>
								<?php
								/**
								 * @todo Make a model for users and transients management
								 * 
								 * @see /services/LLUserTransientCleaner.php
								 */
								$total_users = get_transient('ll_total_user_count');

								if ($total_users === false) {
									$user_count = count_users();
									$total_users = $user_count['total_users'];

									set_transient('ll_total_user_count', $total_users, 3600);
								}

								$users = get_transient('ll_user_list');

								$limit = 1000;
								if ($users === false) {
									$users = get_users([
										'number' => $limit,
										'orderby' => 'ID', 
										'order' => 'ASC'
									]);

									set_transient('ll_user_list', $users, 3600);
								}

								foreach ($users as $user) {
									$role = !empty($user->roles) ? implode(', ', $user->roles) : 'No role';
									echo '<option value="' . esc_attr($user->ID) . '">' . esc_html($user->display_name) . ' (' . esc_html($role) . ')</option>';
								}
								?>
							</select>

							<p class="description">Log in as an existing user.</p>

							<?php if ($total_users > $limit): ?>
								<p class="notice">Note: Showing only the first <?php echo esc_html($limit); ?> registered users. There are <?php echo esc_html($total_users); ?> users in total.</p>
							<?php endif; ?>
						</div>


						<!-- Role selection field -->
						<div class="ll-form__field term-role-wrap" id="role-field">
							<label class="ll-label" for="role">Temporary User Role</label>
							<select name="role" id="role">
								<?php wp_dropdown_roles('administrator'); ?>
							</select>
							<p class="description">It will assign role to the temporary user for the link.</p>
						</div>

						<!-- Advanced Settings Toggle -->
						<div id="advanced-settings">
							<h3>
								<a href="#" class="advanced-settings-toggler" id="advanced-settings-toggler"
								data-label-show="Advanced Options" 
								data-label-hide="Advanced Options">
								<i class="advanced-settings-toggler__icon">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="-4.5 0 20 20" version="1.1">
										<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<g id="Dribbble-Light-Preview" transform="translate(-425.000000, -6679.000000)" fill="#000000">
												<g id="icons" transform="translate(56.000000, 160.000000)">
													<path d="M370.39,6519 L369,6520.406 L377.261,6529.013 L376.38,6529.931 L376.385,6529.926 L369.045,6537.573 L370.414,6539 C372.443,6536.887 378.107,6530.986 380,6529.013 C378.594,6527.547 379.965,6528.976 370.39,6519" id="arrow_right-[#333]">
													</path>
												</g>
											</g>
										</g>
									</svg>
								</i> 
								<span class="advanced-settings-toggler__text">Advanced Options</span>
								</a>
							</h3>

							<div id="advanced-settings-content" style="display: none;">
								<!-- Expiration Type options -->
								<div class="ll-form__field form-required">
									<label class="ll-label">Expiration Type</label>
									<fieldset class="field-group-horizontal">
										<label class="ll-label ll-radio-button" for="expiration-time">
											<input type="radio" name="expiration_type" id="expiration-time" value="time-based" checked>
											Time-Based
										</label>
										<br>
										<label class="ll-label ll-radio-button" for="login-times">
											<input type="radio" name="expiration_type" id="login-times" value="login-times">
											Login Times
										</label>
										<br>
										<label class="ll-label ll-radio-button" for="mixed">
											<input type="radio" name="expiration_type" id="mixed" value="mixed">
											Time-Based + Login Times
										</label>
									</fieldset>
									<p class="description">Select the expiration type for the temporary login link.</p>
								</div>

								<!-- Expiration Time field -->
								<div class="ll-form__field term-slug-wrap" id="expiration-time-field">
									<label class="ll-label" for="expiration-time-field">Expiration Time</label>
									<fieldset class="field-group-horizontal field-group-horizontal-no-gap">
										<input name="expiration_time" id="expiration-time-field" type="number" value="7" min="1" style="width: 70px;">
										<select name="expiration_unit" id="expiration-unit" style="width: 120px;">
											<option value="hour">Hours</option>
											<option value="day" selected>Days</option>
											<option value="week">Weeks</option>
											<option value="month">Months</option>
											<option value="year">Years</option>
										</select>
									</fieldset>
									<p class="description">Set the expiration time for the link.</p>
								</div>

								<!-- Max Logins field -->
								<div class="ll-form__field term-slug-wrap" id="login-times-field" style="display: none;">
									<label class="ll-label" for="max-logins">Max Logins</label>
									<input name="max_logins" id="max-logins" type="number" value="1" min="1" disabled>
									<p class="description">Set the maximum number of logins allowed (default: 1 login).</p>
								</div>
							</div>
						</div>

						<!-- Submit Button -->
						<p class="ll-submit">
							<input type="submit" name="submit" id="submit" class="button button-primary" value="Create Login Link">
							<span class="spinner"></span>
						</p>
					</form>
				</div>
			</div>
            <!-- /col-left -->

			<?php
			$links = LLLoginLink::getAll();
			?>

            <!-- Right Column: Table listing existing temporary login links -->
            <div id="col-right">
                <div class="col-wrap">
                    <form id="posts-filter" method="post">
                        <div class="tablenav top">
                            <div class="tablenav-pages one-page">
                                <span class="displaying-num"><span class="links-count"><?php echo count($links);?></span> items</span>
                            </div>
                            <br class="clear">
                        </div>

                        <h2 class="screen-reader-text">Temporary Login Links list</h2>
                        <table class="wp-list-table widefat fixed striped table-view-list tags">
							<thead>
								<tr>
									<th scope="col" id="link" class="manage-column column-link">Link</th>
									<th scope="col" id="logins-as" class="manage-column column-logins-as">Logins As</th>
									<th scope="col" id="expires-in" class="manage-column column-expires-in">Expires In</th>
									<th scope="col" id="logins-used" class="manage-column column-logins-used">Logins Used / Max Logins</th>
								</tr>
							</thead>
                            <tbody>
                                <?php
                                if (empty($links)) {
									ll_admin_page_render_no_links_found_template();
                                } else {
                                    foreach ($links as $link) {
										$row_data = $link->getRowData();
										ll_admin_page_render_row_template($row_data);
									}
                                }
                                ?>
                            </tbody>
                        </table>

                        <div class="tablenav bottom">
                            <div class="tablenav-pages one-page">
                                <span class="displaying-num"><span class="links-count"><?php echo count($links);?></span> items</span>
                            </div>
                            <br class="clear">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /col-right -->
        </div>
    </div>
    <?php
}
?>
