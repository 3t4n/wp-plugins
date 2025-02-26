<?php

/**
 * The template for the cookie settings component
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options/components
 */

$data_cookie = array(
    'id' => $setting_id
);
?>

<div class="cdc-content__option__content__cookie-settings">

    <div class="cdc-content__option__content__cookie-settings__header">

        <div class="cdc-content__option__content__cookie-settings__header__title"><?php esc_html_e( $setting_title ); ?></div>

        <button class="cdc-content__option__content__cookie-settings__header__btn"><?php echo file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/plus.svg' ); ?></button>

    </div>

    <div class="cdc-content__option__content__cookie-settings__content" data-cookie="<?php echo esc_attr( json_encode($data_cookie) ); ?>">

        <?php
            $cookie_settings_line   = file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/cookie-settings-line.php' );
            $edit_svg               = file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/edit.svg' );
            $minus_svg              = file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/minus.svg' );

            if ( is_array($setting_value) ) {
                foreach ( $setting_value as $cookie_id => $cookie_items ) {
    
                    echo str_replace(
                        array( '{{SETTING_ID}}', '{{COOKIE_ID}}', '{{MANDATORY}}', '{{ID}}', '{{TITLE}}', '{{NAME}}', '{{DESC_SHORT}}', '{{DESC_LONG}}', '{{DOMAIN}}', '{{CATEGORY}}', '{{POLICY_URL}}', '{{FAVICON}}', '{{SCRIPT_RADIO}}', '{{SCRIPT_INPUT}}', '{{SCRIPT_SELECT}}', '{{SCRIPT_TEXTAREA}}', '{{EDIT_SVG}}', '{{MINUS_SVG}}' ),
                        array( esc_attr($setting_id), esc_attr($cookie_items['id']), esc_attr($cookie_items['mandatory']), esc_attr($cookie_items['id']), esc_attr($cookie_items['title']), esc_attr($cookie_items['name']), esc_attr($cookie_items['descShort']), esc_attr($cookie_items['descLong']), esc_attr($cookie_items['domain']), esc_attr($cookie_items['category']), esc_url($cookie_items['policyUrl']), esc_url($cookie_items['favicon']), esc_attr($cookie_items['scriptRadio']), esc_attr($cookie_items['scriptInput']), esc_attr($cookie_items['scriptSelect']), esc_attr($cookie_items['scriptTextarea']), $edit_svg, $minus_svg ),
                        $cookie_settings_line
                    );
                }
            }
        ?>

    </div>

</div>