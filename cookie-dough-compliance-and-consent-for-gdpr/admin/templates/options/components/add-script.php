<?php

/**
 * The template for the add script component
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options/components
 */

$transient_name		= '_cdc_scripts_handles';
$transient_value	= get_site_transient( $transient_name );

if ( !is_array($transient_value) ) {
    $transient_value = array();
}

?>

<div class="cdc-content__option__content__add-script">

    <p class="cdc-content__option__content__add-script__title"><?php esc_html_e( $add_script_title ); ?></p>

    <div class="cdc-content__option__content__add-script__options">

        <div class="cdc-content__option__content__add-script__options__select">
            <label>
                <span><?php _e( 'Select by ID', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ); ?></span>
                <input type="radio" id="popup-scriptRadio-01" name="add-script-option" value="0" checked>
            </label>
            <label>
                <span><?php _e( 'Add script', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ); ?></span>
                <input type="radio" id="popup-scriptRadio-02" name="add-script-option" value="1">
            </label>
        </div>

        <div class="cdc-content__option__content__add-script__options__items">

            <div class="cdc-content__option__content__add-script__options__items__item show">

                <input type="text" class="cdc-content__option__content__add-script__options__items__item__input" id="popup-scriptInput">

                <div class="cdc-content__option__content__add-script__options__items__item__suggestions">
                    <?php foreach ( $transient_value as $script_handle ): ?>
                        <div class="cdc-content__option__content__add-script__options__items__item__suggestions__item" data-id="<?php echo esc_attr($script_handle); ?>"><?php esc_html_e($script_handle); ?></div>
                    <?php endforeach; ?>
                </div>

            </div>

            <div class="cdc-content__option__content__add-script__options__items__item">

                <select class="cdc-content__option__content__add-script__options__items__item__select" id="popup-scriptSelect">
                    <option value="head"><?php _e( 'Head', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ); ?></option>
                    <option value="body"><?php _e( 'Body', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ); ?></option>
                    <option value="footer"><?php _e( 'Footer', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ); ?></option>
                </select>

                <textarea 
                    class="cdc-content__option__content__add-script__options__items__item__textarea" 
                    id="popup-scriptTextarea"
                    placeholder="<script>&#10;&#x09;console.log('Hello World!');&#10;</script>"
                ></textarea>

            </div>

        </div>

    </div>


</div>