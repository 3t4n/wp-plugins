<?php
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<div class="wrap">
    <h1 class="wp-heading-inline">Elfskot Product Configurator</h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'elfskot-configurator-settings' ); ?>
        <?php do_settings_sections( 'elfskot-configurator-settings' ); ?>
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="configuratordomain">
                            Elfskot Configurator Domain (*.elfskot.cloud)
                        </label>                    
                    </th>
                    <td>
                        <input class="regular-text" type="text" id="configuratordomain" name="configurator_domain" value="<?php echo esc_attr(get_option('configurator_domain')); ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
        <?php submit_button('Save Changes') ?>
    </form>
   
</div>