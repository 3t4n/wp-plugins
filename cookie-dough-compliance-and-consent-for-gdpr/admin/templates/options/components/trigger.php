<?php

/**
 * The template for the trigger of a section
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options/components
 */

?>

<div class="cdc-content__option__trigger" data-index="<?php esc_attr($trigger_index); ?>" >

    <div class="cdc-content__option__trigger__txt">
        <p class="cdc-content__option__trigger__txt__title"><?php esc_html_e($trigger_title); ?></p>
        <p class="cdc-content__option__trigger__txt__description" title="<?php esc_attr_e($trigger_description); ?>"><?php esc_html_e($trigger_description); ?></p>
    </div>

    <div class="cdc-content__option__trigger__img"><?php echo file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/open-option.svg' ); ?></div>

</div>