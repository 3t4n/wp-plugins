<?php
/**
 * Contains the wallet edit template.
 *
 */

defined( 'ABSPATH' ) || exit;

?>
<table class="form-table">
    <tr>
        <th><label for="wallet_balance"><?php _e( 'Wallet Balance', 'getpaid-wallet' ); ?></label></th>
        <td>
            <input
                type="text"
                value="<?php echo esc_attr( wpinv_wallet_get_user_balance( $user_id, false ) ); ?>"
                name="wallet_balance"
                id="wallet_balance"
                class="regular-text"
            >
            <p class="description"><?php _e( 'Do not include the currency symbol or thousands separator.', 'getpaid-wallet' )?></p>
        </td>
    </tr>
</table>