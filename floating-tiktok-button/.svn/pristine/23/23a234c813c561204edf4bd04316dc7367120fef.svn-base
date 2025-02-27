<div class="wrap container-fluid ftb-container">

    <?php 
include 'inc/top.view.php';
?>

    <div class="ftb-segment">

        <h2><?php 
echo __( 'About Floating Tiktok button + Tikcode (QrCode)', "floating-tiktok-button" );
?></h2>

        <p><?php 
echo __( 'This plugin allows you to deploy, on mobile and Desktop, either a Floating Tiktok button (fully customizable) linked to your Tiktok Account, or a "Tikcode" (QR Code provided by Tiktok, also linked to your Tiktok account) so that your visitors can visit your profile directly.', 'floating-tiktok-button' );
?></p>

    </div>

    <div id="ftb_app" class="row">

        <transition name="slide-fade">
        <p v-if="pro" class="ftb-pro" v-cloak>{{ pro }}</p>
        </transition>

        <div class="col-xs-8 col-main">

            <form method="post" class="ftb-form">

                <?php 
if ( function_exists( 'wp_nonce_field' ) ) {
    wp_nonce_field( 'ftb__settings', 'ftb__nonce' );
}
?>

                
                <?php 
include_once 'inc/step1.view.php';
?>

                <?php 
?>
                <div class="ftb-alert ftb-info" style="padding: 15px 20px; font-size: 16px">
                <span class="closebtn">&times;</span> 
                <?php 
echo sprintf( wp_kses( __( '<a href="%s">Get Pro version</a> to enable', "floating-tiktok-button" ), array(
    'a' => array(
        'href'   => array(),
        'target' => array(),
    ),
) ), esc_url( "admin.php?page=floating-tiktok-button-pricing" ) ) . " " . __( 'Floating TikTok Button Everywhere, Animated Icons, Custom Icon & Other Features', "floating-tiktok-button" );
?>
                </div>
                <?php 
?>

                <?php 
include_once 'inc/step2.view.php';
include_once 'inc/step3.view.php';
include_once 'inc/step4.view.php';
?>

                <div class="ftb-segment">

                    <div class="row">

                        <div class="col-xs-2">
                            <label class="ftb-label" for="remove_settings">
                                <strong>
                                    <?php 
echo __( 'Remove Settings', "floating-tiktok-button" );
?>
                                </strong>
                            </label>
                        </div>

                        <div class="col-xs-2">
                            <label class="ftb-toggle"><input id="remove_settings" type="checkbox" name="remove_settings" value="allow" <?php 
if ( $options::check( 'remove_settings' ) ) {
    echo 'checked';
}
?> />
                                <span class='ftb-toggle-slider ftb-toggle-round'></span></label>
                        </div>

                        <div class="col-xs-8 field">
                            <input type="submit" name="update" class="ftb-submit"
                                value="<?php 
echo esc_html__( 'Save Changes', "floating-tiktok-button" );
?>" />
                        </div>

                    </div>

                </div>

                <div class="ftb-segment">

                    <p><?php 
echo __( "<strong>Note:</strong> Make sure to clear your cache after saving changes.", "floating-tiktok-button" );
?>
                    </p>

                </div>
                

            </form>

            <?php 
include "inc/promotion.view.php";
?>

        </div>

        <div class="col-xs-4 ftb-side">

            <?php 
include_once "inc/button_preview.view.php";
?>

        </div>

    </div>

</div>