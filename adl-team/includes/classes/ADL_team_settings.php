<?php

if ( !class_exists('ADL_team_settings') ):
class ADL_team_settings {

    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_team_settings'));
        add_action('init', array($this, 'save_settings_data'));
    }


    public function add_team_settings()
    {
        add_submenu_page('edit.php?post_type='.ADL_TEAM_POST_TYPE, __('Team Settings', ADL_TEAM_TEXTDOMAIN), __('Team Slug Settings', ADL_TEAM_TEXTDOMAIN), 'manage_options', ADL_TEAM_POST_TYPE.'-settings', array($this, 'display_settings'));
    }

    public function display_settings()
    {
        $slug = get_option('adl_team_slug');
        ?>
        <div class="wrap">
            <h2><?php esc_html_e('Team Settings', ADL_TEAM_TEXTDOMAIN ); ?> </h2>
            <?php
            if ($_GET['success']){ ?>
                <div class="notice notice-success is-dismissible">
                    <p><?php _e( 'Settings Saved Successfully!', ADL_TEAM_TEXTDOMAIN ); ?></p>
                </div>
            <?php }
            ?>

            <form method="POST" action="" name="adl_team_settings">
                <?php wp_nonce_field(); ?>
                <table class="form-table">

                    <tr valign="top">
                        <th scope="row">
                            <label for="adl_team_slug">
                                <?php esc_html_e('Team Custom Slug:', ADL_TEAM_TEXTDOMAIN); ?>
                            </label>
                        </th>
                        <td>
                            <input type="text" id="adl_team_slug"
                                   name="adl_team_slug" size="25" placeholder="eg. our-team"
                                   value="<?php echo !empty($slug) ? esc_attr($slug) : ''?>"
                            />
                            <p class="cmb2-metabox-description">
                                <?php
                                printf(__('You can use a custom slug for your team. Default slug is %1$s. It means if no slug is set, "%1$s" will be as slug. Change it to whatever you want eg. our-team etc.', ADL_TEAM_TEXTDOMAIN),
                                    '<strong>'.ADL_TEAM_POST_TYPE.'</strong>'
                                );
                                ?>
                            </p>
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }

    public function save_settings_data()
    {

        if (!empty($_POST['adl_team_slug']) && !empty($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce']) ){
            // we have data and nonce is valid, lets proceed to saving
            $slug = sanitize_text_field($_POST['adl_team_slug']);
            update_option('adl_team_slug', $slug);
            wp_redirect( add_query_arg('success', true));

        }

    }
}

endif;