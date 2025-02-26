<div class="wrap">
    <h2>AutoShop Secret Key</h2>

    <form method="post" action="options.php">
        <?php settings_fields( 'autoshop-settings' ); ?>
        <?php do_settings_sections( 'autoshop-settings' ); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Secret Key</th>
                <td>
                    <input type="text" name="secretkey" value="<?php echo esc_attr( get_option('secretkey') ); ?>" class="regular-text" />
                    <p class="description">Enter shop secret key value on Autoshop App > Shop settings > Get secret key. Shop must first be created before they can be added here.</br>For more detail please refer <a target="_blank" href="http://autoshop.aucoz.com">Autoshop Website</a></p>
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>

    </form>
</div>