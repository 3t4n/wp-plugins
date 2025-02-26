<?php
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 /**
 * The admin settings of the plugin.
 * @since      1.0.0
 */
?>

<div class="wrap">

    <!-- <h1><?php esc_html_e( "Lexilink Settings", 'lexilink' ); ?></h1> -->
    <img style="height: 60px;" src="<?php echo esc_attr( LEXILINK_PLUGIN_URL . 'public/assets/images/logo.svg' ); ?>" alt="Lexilink logo">

    <form enctype="multipart/form-data" action="" method="post">
    
        <table class="form-table">
            <tr>
                <th>
                    <label><?php esc_html_e( 'Shortcode', 'lexilink' ); ?></label>
                </th>
                <td>
                    <input type="text" value="[lexilink_display]" readonly>
                    <p class="description"><?php esc_html_e( 'Insert the shortcode to display the glossary.', 'lexilink' ); ?></p>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'A dedicated page by definition', 'lexilink' ); ?></label>
                </th>
                <td>
                    <label class="lexilink-switch">
                        <input type="hidden" name="lexilink[dedicated_page]" value="0">
                        <input type="checkbox" name="lexilink[dedicated_page]" value="1" <?php checked( $settings['dedicated_page'], '1' ); ?> >
                        <span class="lexilink-switch__slider"></span>
                    </label>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Accordion', 'lexilink' ); ?></label>
                </th>
                <td>
                    <label class="lexilink-switch">
                        <input type="hidden" name="lexilink[accordion]" value="0">
                        <input type="checkbox" name="lexilink[accordion]" value="1" <?php checked( $settings['accordion'], '1' ); ?> >
                        <span class="lexilink-switch__slider"></span>
                    </label>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Search Bar', 'lexilink' ); ?></label>
                </th>
                <td>
                    <label class="lexilink-switch">
                        <input type="hidden" name="lexilink[search_bar]" value="0">
                        <input type="checkbox" name="lexilink[search_bar]" value="1" <?php checked( $settings['search_bar'], '1' ); ?> >
                        <span class="lexilink-switch__slider"></span>
                    </label>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Text color', 'lexilink' ); ?></label>
                </th>
                <td>
                    <input class="lexilink-color" type="text" name="lexilink[text_color]" value="<?php echo esc_attr( $settings['text_color'] ); ?>"/>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Background color', 'lexilink' ); ?></label>
                </th>
                <td>
                    <input class="lexilink-color" type="text" name="lexilink[background_color]" value="<?php echo esc_attr( $settings['background_color'] ); ?>"/>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Accent color', 'lexilink' ); ?></label>
                </th>
                <td>
                    <input class="lexilink-color" type="text" name="lexilink[accent_color]" value="<?php echo esc_attr( $settings['accent_color'] ); ?>"/>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Import', 'lexilink' ); ?></label>
                </th>
                <td>
                    <?php submit_button( __( 'Upload file and import', 'lexilink' ), 'secondary', 'lexilink_import', false, array( 'disabled' => 'disabled' ) ); ?>
                    <input type="file" id="lexilink_import_file_input" name="lexilink_import_file" size="25" accept=".csv" />
                    <?php /* translators: %s: maximum file size */ ?>
                    <p class="description"><?php echo esc_html( sprintf( __( 'Maximum size: %s', 'lexilink' ), $size ) ); ?></p>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Export', 'lexilink' ); ?></label>
                </th>
                <td>
                    <?php submit_button( __( 'Download Export File', 'lexilink' ), 'secondary', 'lexilink_export', false ); ?>
                </td>
            </tr>
        </table>
    
        <?php
            wp_nonce_field( 'lexilink-settings' );
            submit_button();
        ?>
    </form>

</div>