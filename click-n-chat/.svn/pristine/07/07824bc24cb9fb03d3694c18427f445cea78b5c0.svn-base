<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_user_list() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'cnc_social_users';	
	// Fetch users
	$users = $wpdb->get_results("SELECT * FROM {$table_name} order by position");
	// Fetch Setting
	$cnc_setting_popup = get_option('cnc_setting_popup');
?> 
	<div class="my-3">   
        <h1 class="wp-heading-inline">Social Users</h1>
        <a href="?page=wa-clicknchat&tab=add_edit_user&mode=add" class="page-title-action">Add New Social User</a>
    </div>
    <div class="cnc-container-no-padding cnc-bg-white cnc-shadow">
        <div class="table-responsive">  
            <table class="wp-list-table cnc-list-table striped widefat fixed table-view-list pages" id="sortable-user-list">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>User</th>
                        <th>Social<br />Channel</th>
                        <th>Designation</th>
                        <th>Description</th>
                        <th>Woo-<br />commerce</th>
                        <th>Page<br />Widget</th>
                        <th>Popup<br />Widget</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                    <tr data-rowid='<?php echo esc_attr($user->id); ?>'>
                        <td data-colname="Position" valign="middle"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="30" height="30" viewBox="0 0 256 256" xml:space="preserve">
                            <defs>
                            </defs>
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                <path d="M 45 90 c -0.282 0 -0.551 -0.119 -0.741 -0.328 l -20 -22.044 c -0.266 -0.293 -0.334 -0.715 -0.174 -1.077 c 0.161 -0.361 0.519 -0.595 0.915 -0.595 l 9.08 0 l 0 -20.525 c 0 -0.349 0.182 -0.672 0.479 -0.854 c 0.296 -0.183 0.667 -0.196 0.979 -0.035 l 19.841 10.219 c 0.333 0.171 0.542 0.515 0.542 0.889 l 0 10.307 l 9.079 0 c 0.396 0 0.754 0.233 0.914 0.595 c 0.16 0.362 0.093 0.784 -0.174 1.077 l -20 22.044 C 45.551 89.881 45.282 90 45 90 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(92,158,198); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 54.921 45.569 c -0.157 0 -0.313 -0.037 -0.458 -0.111 L 34.622 35.239 c -0.333 -0.171 -0.542 -0.515 -0.542 -0.889 l 0 -10.306 l -9.08 0 c -0.396 0 -0.754 -0.233 -0.915 -0.595 c -0.16 -0.361 -0.092 -0.784 0.174 -1.077 l 20 -22.044 c 0.379 -0.418 1.103 -0.418 1.481 0 l 20 22.044 c 0.267 0.293 0.334 0.715 0.174 1.077 c -0.16 0.362 -0.519 0.595 -0.914 0.595 l -9.079 0 l 0 20.525 c 0 0.349 -0.182 0.672 -0.479 0.854 C 55.282 45.521 55.102 45.569 54.921 45.569 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(146,206,94); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                            </svg>
                        </td>
                        <td data-colname="User">
                            <a class="row-title" href="<?php echo esc_html(admin_url('admin.php?page=wa-clicknchat&tab=add_edit_user&mode=edit&id=' . $user->id)); ?>">
                                <?php if ($user->user_icon) { 
                                
                                    if($user->user_icon == 'social_icon') { ?><img class="cnc-table-icon" src="<?php echo esc_attr(CLICK_N_CHAT_DIR_URL . 'assets/images/svgs/'.$user->social_type.'.svg'); ?>" /><?php }else{ ?><img class="cnc-table-icon" style="border-radius: 50%;" src="<?php echo esc_url($user->user_icon); ?>" style="max-width: 100px;">
                                <?php }} ?>&nbsp;
                                <?php echo esc_html($user->name); ?>
                            </a>
                            <div class="row-actions">
                                <span class="edit"><a href="<?php echo esc_html(admin_url('admin.php?page=wa-clicknchat&tab=add_edit_user&mode=edit&id=' . $user->id)); ?>">Edit</a> | </span><span class="trash"><a href="<?php echo esc_html(admin_url('admin.php?page=wa-clicknchat&tab=add_edit_user&mode=delete&action=delete&id=' . $user->id)); ?>" onclick="return confirm('Are you sure?');" class="submitdelete">Trash</a></div>
                        </td>
                        <td data-colname="Social Channel">
                            <img class="cnc-table-icon" src="<?php echo esc_attr(CLICK_N_CHAT_DIR_URL . 'assets/images/svgs/'.$user->social_type.'.svg'); ?>" />&nbsp;<?php echo esc_html($user->cnc_social_id); ?>
                        </td>
                        <td data-colname="Designation"><?php echo esc_html($user->designation); ?></td>
                        <td data-colname="Description"><?php echo esc_html($user->description); ?></td>
                        <td data-colname="Woocommerce">
                            <label class="cnc-switch">
                                <input data-uid="<?php echo esc_html($user->id)  ?>" data-col="is_woo" class="cnc-user-status" type="checkbox" <?php echo esc_html(($user->is_woo == "1" ? "checked" : ""));  ?> >
                                <span class="cnc-switch-slider"></span>
                            </label>
                        </td>
                        <td data-colname="Page Widget">
                            <label class="cnc-switch">
                                <input data-uid="<?php echo esc_html($user->id)  ?>" data-col="is_widget" class="cnc-user-status" type="checkbox" <?php echo esc_html(($user->is_widget == "1" ? "checked" : ""));  ?> >
                                <span class="cnc-switch-slider"></span>
                            </label>
                        </td>
                        <td data-colname="Popup Widget">
                            <label class="cnc-switch">
                                <input data-uid="<?php echo esc_html($user->id)  ?>" data-col="status" class="cnc-user-status" type="checkbox" <?php echo esc_html(($user->status == "1" ? "checked" : ""));  ?> >
                                <span class="cnc-switch-slider"></span>
                            </label>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
	</div>
    <div id="message" class="inline notice">
        <p class="help">
            <b>Woocommerce:</b> Active social users will be displayed in Woocommerce.				 
        </p>
        <p class="help">
            <b>Page Widget:</b> Active social users will be displayed in page widget (Widget shortcode <b>[cnc_chatbot_widget]</b>).			 
        </p>
        <p class="help">
            <b>Popup Widget:</b> Active social users will be displayed in Popup.		 
        </p>
    </div>
<?php
}