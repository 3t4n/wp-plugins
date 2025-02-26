<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );

include('common/header.php');
$plugin_settings = get_option( 'appts_settings' );
?>
<div class='appts-body-wrapper'>
    <!-- message area -->
    <?php if ( isset( $_GET[ 'message' ] ) && $_GET[ 'message' ] != '' ) { ?>
        <div class='appts-message'>
            <?php
            $msgid = $_GET[ 'message' ];
            switch ( $msgid ) {
                case '1':
                    ?>
                    <span class='appts-success'><?php _e( "Settings Saved Successfully", 'ap-pricing-tables-lite' ); ?></span>
                    <?php
                    break;

                case '3':
                    ?>
                    <span class='appts-success'><?php _e( "Settings restored Successfully.", 'ap-pricing-tables-lite' ); ?></span>
                    <?php
                    break;
                default:
                    ?>
                    <span class='appts-error'><?php _e( 'Something went wrong. Please try again.', 'ap-pricing-tables-lite' ); ?></span>
                    <?php
                    break;
            }
            ?>
        </div>
    <?php } ?>
    <!-- message area ends -->

    <form method='post' action='<?php echo admin_url() . 'admin-post.php'; ?>'>
        <input type="hidden" name='action' value='save_settings'>
        <?php
        $nonce_check = wp_create_nonce( 'appts-save-settings-nonce' );
        $nonce_restore = wp_create_nonce( 'appts-restore-default-settings-nonce' );
        ?>
        <input type='hidden' name='_wpnonce_check' value='<?php echo $nonce_check; ?>'/>
        <input type='hidden' name='_wpnonce_restore' value='<?php echo $nonce_restore; ?>'/>
        <div class='appts-plugin-settings-wrapper'>
            <div class='appts-tabs-wrapper'>
                <span class='appts-tab appts-active' id='appts-plugin-assets-settings' ><?php _e( 'Plugin Assets', 'ap-pricing-tables-lite' ); ?></span>
            </div>
            <div class="appts-tabs-content-wrapper">
                <div class='appts-tab-content appts-plugin-assets-settings'>
                    <div class="appts-assets-settings-content">
                        <p><?php _e( 'Disable Font Icons (Please disable the font icons only if you have already loaded those font icons from other source.)', 'ap-pricing-tables-lite' ); ?></p>
                    </div>
                    <div class='appts-fontawsome appts-input-wrap'>
                        <label><?php _e( 'Font Awesome', 'ap-pricing-tables-lite' ); ?></label>
                        <div class="appts-info-wrap">
                            <input type="checkbox" name="appts_settings[disable_font][fa]" value="1" <?php echo ! empty( $plugin_settings[ 'disable_font' ][ 'fa' ] ) ? ' checked="checked"' : ''; ?>>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="submit-reset-button">
            <button type="submit" name='save_settings'><?php _e( 'Save', 'ap-pricing-tables-lite' ); ?></button>
            <button type="submit" name='reset_settings' value='1' onclick="return confirm('Are you sure you want to restore default settings?')"><?php _e( 'Reset Settings', 'ap-pricing-tables-lite' ); ?></button>
        </div>
    </form>
</div>
<?php
include('common/footer.php');
