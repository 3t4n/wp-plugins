<?php
/**
 * Plugin settings submenu template.
 *
 * @package oc-studio-integration
 */

namespace XAPP;

// Build help text for i18n.
$help_text = sprintf(
    __( 'You can find your keys at %1$s.', 'oc-studio-integration' ),
    sprintf(
        '<a href="">%1$s</a>',
        esc_url( 'https://studio.xapp.com' )
    )
);
?>

<div class="wrap xapp-settings-page">
    <h1><?php esc_html_e( 'XAPP AI Integration Settings', 'oc-studio-integration' ); ?></h1>
    <p><?php echo wp_kses_post( $help_text ); ?></p>

    <form method="post" action="options.php">
        <?php
            settings_fields( 'oc-studio-integration-settings-group' );
            do_settings_sections( 'oc-studio-integration-settings-group' );
        ?>

        <table class="form-table">
            <tr valign="top">
                <th scope="row"><label for="xapp-chat-widget-key"><?php esc_html_e( 'Chat Widget Key', 'oc-studio-integration' ); ?></label></th>

                <td>
                    <input
                        id="xapp-chat-widget-key"
                        name="xapp_chat_widget_key"
                        type="text"
                        value="<?php echo esc_attr( get_option( 'xapp_chat_widget_key' ) ); ?>"
                    />
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="xapp-form-widget-key"><?php esc_html_e( 'Scheduling Widget Key', 'oc-studio-integration' ); ?></label></th>

                <td>
                    <input
                        id="xapp-form-widget-key"
                        name="xapp_form_widget_key"
                        type="text"
                        value="<?php echo esc_attr( get_option( 'xapp_form_widget_key' ) ); ?>"
                    />
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="xapp-search-widget-key"><?php esc_html_e( 'Intelligent Search Key', 'oc-studio-integration' ); ?></label></th>

                <td>
                    <input
                        id="xapp-search-widget-key"
                        name="xapp_search_widget_key"
                        type="text"
                        value="<?php echo esc_attr( get_option( 'xapp_search_widget_key' ) ); ?>"
                    />
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>
    </form>
</div>
