<?php
$addons = auto_aliexpress_get_addons();
?>
<div id="aliexpress-apps" class="aliexpress-box-tab active">

    <div class="aliexpress-box">

        <div class="aliexpress-box-header">

            <h2 class="aliexpress-box-title">
                <?php esc_html_e( 'Your API Settings', Auto_Aliexpress::DOMAIN ); ?>
            </h2>

        </div>

        <div id="aliexpress-integrations-page" class="aliexpress-box-body">
            <p>
                <?php esc_html_e( 'Auto Aliexpress integrates with your favorite third party apps. You can connect to the available apps via their API here and activate them to collect data in the Integrations tab of your forms, polls or quizzes.', Auto_Aliexpress::DOMAIN ); ?>
            </p>

            <div class="aliexpress-integrations-block">

                <span class="aliexpress-table-title"><?php esc_html_e( 'Connected Apps', Auto_Aliexpress::DOMAIN ); ?></span>

                <?php
                if ( ! empty( $addons['connected'] ) ) {
                ?>

                <table class="aliexpress-table aliexpress-table--apps">
                    <tbody>
                    <?php foreach ( $addons['connected'] as $key => $provider ) : ?>

                    <tr class="aliexpress-integration-enabled">
                        <td class="aliexpress-table-item-title">
                            <div class="aliexpress-app--wrapper">
                                <img src="<?php echo esc_attr($provider['icon_url']); ?>" alt="<?php echo esc_attr($provider['name']); ?>" class="aliexpress-addon-image" aria-hidden="true">
                                <span><?php echo esc_html($provider['name']); ?></span>
                                <a href="#integration-popup" class="aliexpress-connect-integration" data-effect="mfp-zoom-in" data-slug="<?php echo esc_attr($provider['slug']); ?>">
                                <button class="aliexpress-button-icon aliexpress-tooltip aliexpress-tooltip-top-right connect-integration">
                                    <ion-icon name="settings-outline"></ion-icon>
                                    <span class="aliexpress-screen-reader-text"><?php esc_html_e( 'Connect this integration', Auto_Aliexpress::DOMAIN ); ?></span>
                                </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

                <?php } else { ?>

                    <div class="aliexpress-notice aliexpress-notice-info">
                        <p><?php esc_html_e( 'You are not connected to any third party apps. You can connect to the available apps listed below and activate them in your modules to collect data.', Auto_Aliexpress::DOMAIN ); ?></p>
                    </div>

                <?php } ?>

                <span class="aliexpress-description">
                    <?php esc_html_e( 'To activate any of these to collect data, go to the Integrations tab of your forms, polls or quizzes.', Auto_Aliexpress::DOMAIN ); ?>
                </span>

            </div>

            <div class="aliexpress-integrations-block">

                <span class="aliexpress-table-title"><?php esc_html_e( 'Available Apps', Auto_Aliexpress::DOMAIN ); ?></span>

                <?php
                if ( ! empty( $addons['not_connected'] ) ) {
                ?>

                <table class="aliexpress-table aliexpress-table--apps">
                    <tbody>
                    <?php foreach ( $addons['not_connected'] as $key => $provider ) : ?>
                        <tr>
                            <td class="aliexpress-table-item-title">
                                <div class="aliexpress-app--wrapper">
                                    <img src="<?php echo esc_attr($provider['icon_url']); ?>"  alt="<?php echo esc_attr($provider['name']); ?>" class="aliexpress-addon-image" aria-hidden="true">
                                    <span><?php echo esc_html($provider['name']); ?></span>
                                    <a href="#integration-popup" class="aliexpress-connect-integration" data-effect="mfp-zoom-in" data-slug="<?php echo esc_attr($provider['slug']); ?>">
                                        <button class="aliexpress-button-icon aliexpress-tooltip aliexpress-tooltip-top-right" >
                                        <ion-icon name="add"></ion-icon>
                                        <span class="aliexpress-screen-reader-text"><?php esc_html_e( 'Connect this integration', Auto_Aliexpress::DOMAIN ); ?></span>
                                    </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>


                <?php
                    }
                ?>

            </div>
        </div>

    </div>

    <!-- Integration Popup -->
    <div id="integration-popup" class="white-popup mfp-with-anim mfp-hide">
    </div>

</div>