<?php

/**
 * The template for the custom settings page
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates
 */

?>

<div class="wrap">

    <div class="cdc-content full-width" id="cdc-main-container">

        <div class="cdc-content__options">

            <div class="cdc-content__options__header">

                <button class="cdc-content__options__header__btn" id="cdc-header-back-btn"><?php echo file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/back.svg' ); ?></button>

                <p class="cdc-content__options__header__txt" id="cdc-header-option-name"><?php _e( 'Options', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ); ?></p>

            </div>

            <div class="cdc-content__options__content">

                <form class="cdc-content__options__content__form" method="post" action="">

                    <div class="cdc-content__options__content__form__scroll">

                        <?php
                            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/option-main.php';
                            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/option-mandatory.php';
                            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/option-optional.php';
                            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/option-personalization.php';
                            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/option-cookie-settings.php';
                            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/option-advanced-settings.php';
                            include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/option-credits.php';
                        ?>
                        
                    </div>

                    <div class="cdc-content__options__content__form__save">
                        <?php
                            wp_nonce_field( 'cdc_admin_custom_settings_page_action', '_cdc_admin_nonce'  );
                            $button_text = __( 'Save my changes', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
                            submit_button( $button_text, 'primary', 'submit', false );
                        ?>
                    </div>

                </form>

            </div>


        </div>
        
        <div class="cdc-content__preview">

            <div class="cdc-content__preview__header">

                <button class="cdc-content__preview__header__btn" id="cdc-header-close">
                    <span class="cdc-content__preview__header__btn__close"><?php echo file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/close.svg' ); ?></span>
                    <span class="cdc-content__preview__header__btn__open"><?php echo file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/full-screen.svg' ); ?></span>
                </button>

                <p class="cdc-content__preview__header__txt"><?php _e( 'Preview', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN ); ?></p>

            </div>

            <div class="cdc-content__preview__content">

                <?php
                    include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/preview/demo.php';
                    include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/preview/message-popup.php';
                ?>

            </div>

        </div>

        <div class="cdc-content__popup">

            <div class="cdc-content__popup__overlay"></div>

            <div class="cdc-content__popup__modal">

                <div class="cdc-content__popup__modal__header">
                    <button class="cdc-content__popup__modal__header__close"><?php echo file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/close.svg' ); ?></button>
                </div>

                <div class="cdc-content__popup__modal__body">

                    <?php
                        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/popup/steps/step-01.php';
                        include COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/popup/steps/step-02.php';
                    ?>

                </div>

            </div>
                    
        </div>

    </div>

</div>