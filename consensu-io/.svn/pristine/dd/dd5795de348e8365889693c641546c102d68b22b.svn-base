<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://consensu.io
 * @since      1.0.0
 *
 * @package    Consensu_IO
 * @subpackage Consensu_IO/admin/partials
 * 
 */

 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

?>

<div class="wrap">
    <h2><?php esc_html_e('LGPD Consensu.IO Plugin', 'consensu-io') ?>
    <small>(v 1.0.5)</small>
    </h2>


    <?php if( isset($_GET['settings-updated']) ) { ?>
<div id=”message” class=”updated”>
<p><strong><?php esc_html_e('Settings saved.', 'consensu-io') ?></strong></p>
</div>
<?php } ?>

    <form method="post" id="consensu_form" novalidate>
    <input type="hidden" name="consensu_form" value="true"/>
    <?php wp_nonce_field('consensu_io_options_update', 'consensu_io_nonce'); ?>
        <div>
            <section id="c-key">
                <table class="form-table">
                    <tr>
                        <th scope="row"><?php esc_html_e('Chave de Identificação (key):', 'consensu-io') ?></th>
                        <td>
                            <input type="text" size="100" placeholder="" name="consensu_options[client_key]" value="<?php echo esc_attr($options['client_key']); ?>">
                            <a target="_blank" href="https://app.consensu.io/sites"><i class="dashicons-before dashicons-external"></i></a>
                            <br>
                            <p class="description"><?php esc_html_e('Insira no campo acima a sua Key - Ex:', 'consensu-io') ?>
                                ("<code>d41d8cd98f00b204e9800998ecf8427e.1d8cd98f00b204e9800998ecf8427</code>")</p>
                        </td>
                    </tr>
                </table>
            </section>
           
            <section id="c-troubleshoot" class="tab-content">
                <table class="form-table">
                    <tr>
                        <th scope="row"><?php esc_html_e('Debug mode' , 'consensu-io')?> :</th>
                        <td><label><input type="checkbox" name="consensu_options[debug_mode]"
                                          value="1" <?php checked($options['debug_mode'], 1) ?>><?php esc_html_e('Habilitar modo debug para administradores', 'consensu-io') ?>
                                </label>

                            <p class="description"><?php esc_html_e("Deve ser usado apenas temporariamente ou durante o desenvolvimento, não se esqueça de desativá-lo na produção", 'consensu-io') ?> </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e('Debug database options', 'consensu-io') ?> :</th>
                        <td>
                            <pre class="db-dump"><?php print_r($options); ?></pre>
                        </td>
                    </tr>
                </table>
            </section>
        </div> 
        <?php submit_button() ?>
    </form>
    <hr>
    <p>
        <?php esc_html_e('Desenvolvido com muita dedicação e ❤️ especialmente para sua empresa / website.', 'consensu-io') ?> | <a target="_blank" href="http://consensu.io?utm_source=plugin&utm_medium=plugin-wordpress&utm_campaign=bottom-link">Consensu.io</a> |
        ★★★★★ <?php esc_html_e('Rate this on', 'consensu-io') ?>
        <a href="https://wordpress.org/support/plugin/consensu-io/reviews/?filter=5" target="_blank"><?php esc_html_e('WordPress', 'consensu-io') ?></a>
    </p>
</div> <!-- .wrap-->
