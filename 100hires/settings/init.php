<?php

function hiresRegisterSettingPage()
{
    add_menu_page(
        __('100hires', '100hires'),
        __('100hires', '100hires'),
        'manage_options',
        '100hires',
        'hiresMenuPage',
        'dashicons-media-code'
    );
}

add_action('admin_menu', 'hiresRegisterSettingPage');

/**
 * Display a custom menu page
 */
function hiresMenuPage()
{
    hiresOptions();
    ?>
    <div>
        <h1><?php _e("100hires", "100hires"); ?></h1>
        <hr>

        <div>
            <form method="post">
                <label>
                    Your company code:
                    <input type="text"
                           name="hires_company_code"
                           size="50"
                           value="<?php echo esc_attr(get_option('hires_company_code')); ?>">
                </label>
                <br>
                <br>
                <small>You can find your <b>Company code</b>
                    <a href="https://app.100hires.com/settings/integrations#wordpress"
                                                             target="_blank">here</a>
                </small>
                <br>
                <br>
                <input type="submit" name="hires_setting" class="button button-primary" value="Save">
            </form>
        </div>
        <br>
        <hr>
        <div class="">
            <h3>Instructions</h3>
            
            <p>
            1.  To use the plugin, <a href="https://app.100hires.com/auth/login?ref=wp-plugin" target="_blank">get your free account</a> 
            </p>
            <p>
            2. <a href="https://app.100hires.com/job/create" target="_blank">Create a job</a> and change its status to Public.
            </p>
            <p>
            3. Copy your company code from <a href="https://app.100hires.com/settings/integrations" target="_blank">Settings / Integrations / Wordpress</a> and put it into this admin section of the 100Hires Wordpress plugin (see "Your company code" field above).
            </p>
            <p>
                4. Create a page called “Careers” on you WP website, place the <code>[100hires]</code> shortcode into this page. This will list your jobs on this page. 
            </p>
            <br><br>
            If you need any help, drop us a line at <a href="mailto:support@100hires.com">support@100hires.com</a>
        </div>
    </div>
    <?php
}


function hiresOptions()
{
    if (isset($_POST["hires_company_code"])) {
        $hiresCompanyKey = sanitize_key($_POST["hires_company_code"]);
        if (!empty($hiresCompanyKey)) {
            update_option("hires_company_code", $hiresCompanyKey);
        }
    }
}


function hiresNotice()
{
    if (get_option("hires_company_code")) {
        return;
    }
    ?>
    <div class="notice notice-error is-dismissible">
        <p><?php _e(
                sprintf(
                    'Please enter <b>Company code</b> on the 
                     <a href="%s">settings page</a> to make shortcode <code>[100hires]</code> work.',
                    site_url() . "/wp-admin/admin.php?page=100hires"
                ), '100hires'
            ); ?>
        </p>
    </div>
    <?php
}

add_action('admin_notices', 'hiresNotice');



