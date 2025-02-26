<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_404_enable_callback() {
    $options = get_option('rankology_fno_option_namer');

    $check = isset($options['rankology_404_enable']); ?>

<label for="rankology_404_enable">
    <input id="rankology_404_enable" name="rankology_fno_option_namer[rankology_404_enable]" type="checkbox" <?php checked($check, '1'); ?>
    value="1"/>

    <?php esc_html_e('Enable 404 monitoring', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_404_enable'])) {
        esc_attr($options['rankology_404_enable']);
    }
}

function rankology_404_cleaning_callback() {
    $options = get_option('rankology_fno_option_namer');

    $check = isset($options['rankology_404_cleaning']); ?>

<label for="rankology_404_cleaning">
    <input id="rankology_404_cleaning" name="rankology_fno_option_namer[rankology_404_cleaning]" type="checkbox" <?php checked($check, '1'); ?>
    value="1"/>
    <?php
        $args = [];
        $args = apply_filters( 'rankology_404_cleaning_query', $args );
        $days = !empty($args['date_query'][0]['before']) ? strtotime($args['date_query'][0]['before']) : '30 days';

        if (is_int($days)) {
            $days = human_time_diff( $days, current_time('timestamp') );
        }
        /* translators: %s: human readable date, e.g. 1 day or 2 months */
        printf(__('Automatically delete 404 after %s', 'wp-rankology'), $days);
    ?>
</label>
<br>
<br>
<p style="display: none;">
    <a href="<?php echo admin_url('admin.php?page=rankology-import-export#tab=tab_rankology_tool_redirects'); ?>"
        id="rankology-clean-404" class="btn btnTertiary">
        <?php esc_html_e('Clean manually your 404', 'wp-rankology'); ?>
    </a>
</p>

<?php if (isset($options['rankology_404_cleaning'])) {
        esc_attr($options['rankology_404_cleaning']);
    }
}

function rankology_404_redirect_home_callback() {
    $options = get_option('rankology_fno_option_namer');

    $selected = isset($options['rankology_404_redirect_home']) ? $options['rankology_404_redirect_home'] : null; ?>

<select id="rankology_404_redirect_home" name="rankology_fno_option_namer[rankology_404_redirect_home]">
    <option <?php if ('none' == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="none"><?php esc_html_e('None', 'wp-rankology'); ?>
    </option>
    <option <?php if ('home' == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="home"><?php esc_html_e('Homepage', 'wp-rankology'); ?>
    </option>
    <option <?php if ('custom' == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="custom"><?php esc_html_e('Custom URL', 'wp-rankology'); ?>
    </option>
</select>

<?php if (isset($options['rankology_404_redirect_home'])) {
        esc_attr($options['rankology_404_redirect_home']);
    }
}

function rankology_404_redirect_custom_url_callback() {
    $options = get_option('rankology_fno_option_namer');
    $check = isset($options['rankology_404_redirect_custom_url']) ? $options['rankology_404_redirect_custom_url'] : null;

    printf(
        '<input type="text" name="rankology_fno_option_namer[rankology_404_redirect_custom_url]" placeholder="' . esc_html__('Enter your custom url', 'wp-rankology') . '" aria-label="' . __('Redirect to specific URL', 'wp-rankology') . '" value="%s"></textarea>',
        esc_html($check)
    );
}

function rankology_404_redirect_status_code_callback() {
    $options = get_option('rankology_fno_option_namer');

    $selected = isset($options['rankology_404_redirect_status_code']) ? $options['rankology_404_redirect_status_code'] : null; ?>

<select id="rankology_404_redirect_status_code" name="rankology_fno_option_namer[rankology_404_redirect_status_code]">
    <option <?php if ('301' == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="301"><?php esc_html_e('301 redirect', 'wp-rankology'); ?>
    </option>
    <option <?php if ('302' == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="302"><?php esc_html_e('302 redirect', 'wp-rankology'); ?>
    </option>
    <option <?php if ('307' == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="307"><?php esc_html_e('307 redirect', 'wp-rankology'); ?>
    </option>
</select>

<?php if (isset($options['rankology_404_redirect_status_code'])) {
        esc_attr($options['rankology_404_redirect_status_code']);
    }
}

function rankology_404_enable_mails_callback() {
    $options = get_option('rankology_fno_option_namer');

    $check = isset($options['rankology_404_enable_mails']); ?>

<label for="rankology_404_enable_mails">
    <input id="rankology_404_enable_mails" name="rankology_fno_option_namer[rankology_404_enable_mails]" type="checkbox"
        <?php checked($check, '1'); ?>
    value="1"/>

    <?php esc_html_e('1 email per week with the top 404 errors, and the latest logged (within a limit of 10).', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_404_enable_mails'])) {
        esc_attr($options['rankology_404_enable_mails']);
    }
}

function rankology_404_enable_mails_from_callback() {
    $options = get_option('rankology_fno_option_namer');
    $check = isset($options['rankology_404_enable_mails_from']) ? $options['rankology_404_enable_mails_from'] : null;

    printf(
        '<input type="text" name="rankology_fno_option_namer[rankology_404_enable_mails_from]" placeholder="' . esc_html__('Enter your email', 'wp-rankology') . '" aria-label="' . __('Send emails to', 'wp-rankology') . '" value="%s" />',
        esc_html($check)
    );

    ?>
        <p class="description">
            <?php esc_html_e('Separate emails by comma','wp-rankology'); ?>
        </p>
    <?php
}

function rankology_404_disable_automatic_redirects_callback() {
    $options = get_option('rankology_fno_option_namer');

    $check = isset($options['rankology_404_disable_automatic_redirects']); ?>

<label for="rankology_404_disable_automatic_redirects">
    <input id="rankology_404_disable_automatic_redirects"
        name="rankology_fno_option_namer[rankology_404_disable_automatic_redirects]" type="checkbox" <?php checked($check, '1'); ?>
    value="1"/>

    <?php esc_html_e('Disable notifications on slug changes or post / term deletions', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_404_disable_automatic_redirects'])) {
        esc_attr($options['rankology_404_disable_automatic_redirects']);
    }
}

function rankology_404_disable_guess_automatic_redirects_404_callback() {
    $options = get_option('rankology_fno_option_namer');

    $check = isset($options['rankology_404_disable_guess_automatic_redirects_404']); ?>

<label for="rankology_404_disable_guess_automatic_redirects_404">
    <input id="rankology_404_disable_guess_automatic_redirects_404"
        name="rankology_fno_option_namer[rankology_404_disable_guess_automatic_redirects_404]" type="checkbox" <?php checked($check, '1'); ?>
    value="1"/>

    <?php esc_html_e('Stop WordPress to attempt to guess a redirect URL for a 404 request', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_404_disable_guess_automatic_redirects_404'])) {
        esc_attr($options['rankology_404_disable_guess_automatic_redirects_404']);
    }
}

function rankology_404_ip_logging_callback() {
    $options = get_option('rankology_fno_option_namer');

    $selected = isset($options['rankology_404_ip_logging']) ? $options['rankology_404_ip_logging'] : null; ?>

<select id="rankology_404_ip_logging" name="rankology_fno_option_namer[rankology_404_ip_logging]">
    <option <?php if ('none' == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="none"><?php esc_html_e('No IP logging', 'wp-rankology'); ?>
    </option>
    <option <?php if ('full' == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="full"><?php esc_html_e('Full IP logging', 'wp-rankology'); ?>
    </option>
    <option <?php if ('anon' == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="anon"><?php esc_html_e('Anonymize the last part', 'wp-rankology'); ?>
    </option>
</select>

<?php if (isset($options['rankology_404_ip_logging'])) {
        esc_attr($options['rankology_404_ip_logging']);
    }
}

