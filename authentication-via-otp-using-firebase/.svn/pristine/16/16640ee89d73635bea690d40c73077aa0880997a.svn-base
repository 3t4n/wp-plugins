<?php

/**
 * Register a admin menu page.
 */
if (!function_exists('aafa_firebase_auth_admin')) {
    function aafa_firebase_auth_admin()
    {
        add_menu_page(
            __('Firebase Authentication', 'authentication-via-otp-using-Firebase'), // page title
            'Firebase authentication', //menu title 
            'manage_options',   // capability
            'firebase-auth', //slug
            'aafa_firebase_auth_admin_fun', // callback
            AAFA_PLUGIN_URL . '/assets/img/firebase.png', // icon
            10 // position
        );

        add_submenu_page(
            'firebase-auth',
            'User Info',
            'Users',
            'manage_options',
            'firebase-auth-users',
            'aafa_firebase_auth_user_fun'
        );

        add_submenu_page(
            'firebase-auth',
            'Documentation',
            'Documentation',
            'manage_options',
            'https://appgenixinfotech.com/otp/' // link to document page
        );
    }
}
add_action('admin_menu', 'aafa_firebase_auth_admin');
add_action('admin_init', function () {
    global $menu;
    foreach ($menu as $key => $value) {
        if ($value[2] == 'firebase-auth') {
            $menu[$key][4] = 'custom-firebase-auth';
        }
    }
});


# admin page
if (!function_exists('aafa_firebase_auth_admin_fun')) {
    function aafa_firebase_auth_admin_fun()
    {
        $firebase_config = get_option('fa_firebase_config', true); // GET firebase settings
        $style_config = get_option('fa_style_config', true); // GET genral settings
        $settings_config = get_option('fa_settings_config', true); // GET genral settings

        # get page list for redirect user after sycessfully login using otp : START
        $args = array(
            'post_type' => 'page',
            'orderby'    => 'ID',
            'post_status' => 'publish',
            'order'    => 'DESC',
            'posts_per_page' => -1 // this will retrive all the post that is published 
        );
        $result = new WP_Query($args);
        $page_list = '';
        if (!empty($result->posts)) {
            $redirect_page = empty($settings_config['redirect_page']) ? 0 : $settings_config['redirect_page'];
            $page_list .= '<option value="0">Select Page:</option>';
            foreach ($result->posts as $page) {
                $selected = '';
                if ($page->ID == $redirect_page) {
                    $selected = 'selected';
                }
                $page_list .= '<option value="' . $page->ID . '"' . $selected . ' >' . __(esc_html($page->post_title), '') . '</option>';
            }
        }
        # get page list for redirect user after sycessfully login using otp : END
        require AAFA_PLUGIN_PATH . "/template/admin.php";
    }
}
if (!function_exists('aafa_firebase_auth_user_fun')) {
    function aafa_firebase_auth_user_fun()
    {
        # get page list for redirect user after sycessfully login using otp : END
        require AAFA_PLUGIN_PATH . "/template/admin_users.php";
    }
}
#user edit profile page
if (!function_exists('aafa_my_extra_author_fields')) {
    function aafa_my_extra_author_fields($user)
    {
?>
        <h3><?php echo __('User Phone Number', 'authentication-via-otp-using-Firebase') ?></h3>
        <table class="form-table">
            <tr>
                <th><label for="fa_phonelogin"><?php echo __('Phone', 'authentication-via-otp-using-Firebase') ?></label></th>
                <td>
                    <input type="text" name="fa_phonelogin" id="fa_phonelogin" class="regular-text" value="<?php echo esc_html_e(get_user_meta($user->ID, 'fa_phonelogin', true), 'authentication-via-otp-using-Firebase'); ?>" />
                </td>
            </tr>
        </table>
<?php }
}

add_action('show_user_profile', 'aafa_my_extra_author_fields');
add_action('edit_user_profile', 'aafa_my_extra_author_fields');

#user edit profile page save data
add_action('personal_options_update', 'aafa_save_extra_user_profile_fields');
add_action('edit_user_profile_update', 'aafa_save_extra_user_profile_fields');
if (!function_exists('aafa_save_extra_user_profile_fields')) {
    function aafa_save_extra_user_profile_fields($user_id)
    {
        if (empty($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'update-user_' . $user_id)) {
            return;
        }

        if (!current_user_can('edit_user', $user_id)) {
            return false;
        }

        if (!empty($_POST['fa_phonelogin'])) {
            update_user_meta($user_id, 'fa_phonelogin', sanitize_text_field($_POST['fa_phonelogin']));
        }
    }
}
