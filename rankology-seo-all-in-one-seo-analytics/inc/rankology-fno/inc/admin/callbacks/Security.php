<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_advanced_security_metaboxe_sdt_role_callback() {

    $options = get_option('rankology_advanced_option_name');

    global $wp_roles;

    if ( ! isset($wp_roles)) {
        $wp_roles = new WP_Roles();
    }
    foreach ($wp_roles->get_names() as $key => $value) {
        $check = isset($options['rankology_advanced_security_metaboxe_sdt_role'][$key]); ?>
    <p>
        <label
            for="rankology_advanced_security_metaboxe_sdt_role_<?php echo $key; ?>">
            <input
                id="rankology_advanced_security_metaboxe_sdt_role_<?php echo $key; ?>"
                name="rankology_advanced_option_name[rankology_advanced_security_metaboxe_sdt_role][<?php echo $key; ?>]"
                type="checkbox" <?php if ('1' == $check) { ?>
            checked="yes"
            <?php } ?>
            value="1"/>

            <strong><?php echo $value; ?></strong> (<em><?php echo translate_user_role($value,  'default'); ?>)</em>
        </label>

    </p>

    <?php if (isset($options['rankology_advanced_security_metaboxe_sdt_role'][$key])) {
            esc_attr($options['rankology_advanced_security_metaboxe_sdt_role'][$key]);
        }
    }
}


function rankology_advanced_security_ga_widget_role_callback() {

    $options = get_option('rankology_advanced_option_name');

    global $wp_roles;

    if ( ! isset($wp_roles)) {
        $wp_roles = new WP_Roles();
    }

    foreach ($wp_roles->get_names() as $key => $value) {
        $check = isset($options['rankology_advanced_security_ga_widget_role'][$key]); ?>
    <p>
        <label
            for="rankology_advanced_security_ga_widget_role_<?php echo $key; ?>">
            <input
                id="rankology_advanced_security_ga_widget_role_<?php echo $key; ?>"
                name="rankology_advanced_option_name[rankology_advanced_security_ga_widget_role][<?php echo $key; ?>]"
                type="checkbox" <?php if ('1' == $check) { ?>
            checked="yes"
            <?php } ?>
            value="1"/>

            <strong><?php echo $value; ?></strong> (<em><?php echo translate_user_role($value,  'default'); ?>)</em>
        </label>
    </p>

    <?php if (isset($options['rankology_advanced_security_ga_widget_role'][$key])) {
            esc_attr($options['rankology_advanced_security_ga_widget_role'][$key]);
        }
    }
}
