<?php
/**
 * Admin help message.
 *
 * @package WooCommerce_PagSeguro/Admin/Settings
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<style type="text/css">
    .form-table{
        clear:none !important;
    }
    #sm_rebuild h2{
        font-size:25px;
    }
</style>
<div class="wrap">
    <form method="POST" action="options.php">
        <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
        <div id="poststuff" class="metabox-holder has-right-sidebar">
            <div class="inner-sidebar">
                <div id="side-sortables" class="meta-box-sortabless ui-sortable" style="position:relative;">
                    <div id="sm_pnres" class="postbox">
                        <h3 class="hndle"><span>About this Plugin:</span></h3>
                        <div class="inside">
                            <a class="sm_button sm_pluginHome" target="_blank" href="https://github.com/heitorspedroso">Author</a><br>
                            <a class="sm_button sm_pluginHome" target="_blank" href="https://br.wordpress.org/plugins/age-restriction-18-for-checkout-fields">Wordpress Plugin</a><br><br>
                            <a class="button activate-now button-primary" target="_blank" href="https://wordpress.org/support/plugin/age-restriction-18-for-checkout-fields/reviews/" style="font-size:18px;">
                                Send Your Review
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="has-sidebar sm-padded">
                <div id="post-body-content" class="has-sidebar-content">
                    <div class="meta-box-sortabless">
                        <!-- Rebuild Area -->
                        <div id="sm_rebuild" class="postbox">
                            <div class="inside">
                                <?php settings_fields( 'age_restriction_settings' );	//pass slug name of page, also referred
                                //to in Settings API as option group name
                                do_settings_sections( 'age_restriction_settings' ); 	//pass slug name of page
                                submit_button();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
