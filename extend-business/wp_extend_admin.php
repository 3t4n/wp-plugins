<?php
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    if( ! current_user_can( 'administrator' ) ) exit;

    if ($_POST['extend_hidden']=='Y') {
        check_admin_referer( 'update_extend_public_key' );

        $extend_public_key = sanitize_key($_POST['extend_public_key']);

        if( preg_match( '/^[a-f0-9]+$/', $extend_public_key ) ) {
            update_option('extend_public_key',$extend_public_key);
            echo '<div class="notice notice-success is-dismissible"><p><strong>Success</strong></p></div>';
        }
        else {
            echo '<div class="notice notice-error is-dismissible"><p><strong>Invalid Public Key</strong></p></div>';
        }
    } else {
        $extend_public_key = get_option('extend_public_key');
    }
?>
<div class="wrap">
    <?php    echo "<h2>" . __( 'Extend For Business', 'extend_trdom' ) . "</h2>"; ?>

    <form name="extend_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <p>
          <?php _e("Copy your Extend Public Key from your Dashboard and paste it in the box below. You will find your Public Key under the 'Developers' tab when you sign into your Extend dashboard." ); ?>
        </p>
        <input type="hidden" name="extend_hidden" value="Y">
        <p><?php _e("Public Key: " ); ?><input type="text" name="extend_public_key" style="padding: 10px; width: 100%; border: solid 1px #ccc" placeholder="Paste your Public Key here" value="<?php echo esc_attr($extend_public_key); ?>" size="20"></p>
        <p class="submit">
        <?php wp_nonce_field( 'update_extend_public_key' ); ?>
        <input type="submit" name="Submit" style="padding:10px; background: #0073aa; color: #ffffff; font-size: 16px; border: none; border-radius: 5px; cursor: pointer" value="<?php _e('Update Public Key', 'extend_trdom' ) ?>" />
        </p>
    </form>
</div>
