<?php

function render_messages() {
    echo "<div>";
    if (isset($_GET['status'])):
        if ($_GET['status'] == 'success'):
            echo "<div class=\"notice notice-success is-dismissible\">
            <p>Settings saved successfully!</p>
            </div>";
        endif;
        if ($_GET['status'] == 'error'):
            echo "<div class=\"notice notice-error is-dismissible\">
            <p>Something went wrong!</p>
            </div>";
        endif;
    endif;
    if(!is_woocommerce_activated()):
        echo "<div class=\"notice notice-warning is-dismissible\">
        <p>WooCommerce is not activated. Please activate WooCommerce to use Aimtell WooCommerce features.</p>
        </div>";
    endif;
    echo "</div>";
}

function debugme() {
    atlog("Only log if it's log level 1", 1);
    atlog("Only log if it's log level 2", 2);
    atlog("Only log if it's log level 3", 3);
    atlog("Only log if it's log level 4", 4);
}

// debugme();

?>

    <div>
        <?php render_messages(); ?>
    </div>

    <div class="wrap aimtell login">
        
        <div class="centerfloat">

            <div class="title" style="color: #FFFFFF; font-weight: 700; font-size: 30px; margin-top: 20px; margin-bottom: 20px; text-align: center;">Aimtell Push Settings</div>
            
            <div class="loginBox">

<form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
                    
                    <div class="row">
                        <div class="col">

                            <div class="setting">
                                <p>
                                    <label class="checkbox-inline" for="aimtell_woocommerce_tracking">
                                        <input type="checkbox" name="aimtell_woocommerce_tracking" id="aimtell_woocommerce_tracking" value="1" <?php checked(get_aimtell_woocommerce_tracking(), 1); ?>>
                                        <strong>Enable WooCommerce engagement boost</strong>
                                    </label> 
                                    <a href="https://documentation.aimtell.com/wordpress-feature-enable-woocommerce-boost?z=1" class="icon-info" target="_blank">?</a>
                                </p>
                                <p>
                                    Detects when customers add items to their cart but leave before completing their purchase. This helps you re-engage them to boost sales.
                                    
                                </p>
                            </div>

                            <div class="setting">
                                <p>
                                    <label class="checkbox-inline" for="aimtell_woocommerce_abandoned_browse">
                                        <input type="checkbox" name="aimtell_woocommerce_abandoned_browse" id="aimtell_woocommerce_abandoned_browse" value="1" <?php checked(get_aimtell_woocommerce_abandoned_browse(), 1); ?>>
                                        <strong>Enable WooCommerce abandoned browse</strong>
                                    </label> 
                                    <a href="https://documentation.aimtell.com/wordpress-feature-enable-woocommerce-boost?z=1" class="icon-info" target="_blank">?</a>
                                </p>
                                <p>
                                    WooCommerce abandoned browse delay (minutes):
                                    <input type="number" step="1" name="aimtell_woocommerce_abandoned_browse_delay" id="aimtell_woocommerce_abandoned_browse_delay" value="<?php echo get_aimtell_woocommerce_abandoned_browse_delay(); ?>" style="width: 50px;">
                                </p>
                                <p>
                                    Identifies when customers view a product page and then leave it idle for a specified period. This allows you to follow up and encourage conversion.
                                    
                                </p>
                            </div>

                            <div class="setting">
                                <p>
                                    <?php $aimtell_woocommerce_logging_level = get_aimtell_woocommerce_logging_level(); ?>
                                    <strong>Enable Aimtell logging</strong>
                                    <select name="aimtell_woocommerce_logging_level" id="aimtell_woocommerce_logging_level">
                                        <option value="0" <?= $aimtell_woocommerce_logging_level==0 ? 'selected="selected"' : '' ?> >None</option>
                                        <option value="1" <?= $aimtell_woocommerce_logging_level==1 ? 'selected="selected"' : '' ?> >Error</option>
                                        <option value="2" <?= $aimtell_woocommerce_logging_level==2 ? 'selected="selected"' : '' ?> >Error + Warning</option>
                                        <option value="3" <?= $aimtell_woocommerce_logging_level==3 ? 'selected="selected"' : '' ?> >Error + Warning + Info</option>
                                        <option value="4" <?= $aimtell_woocommerce_logging_level==4 ? 'selected="selected"' : '' ?> >Error + Warning + Info + Debug</option>
                                    </select>
                                </p>
                                <p>
                                    Allows you to enable logging for easier debugging. Log file is located on your server at <span class="code"><?php echo get_aimtell_log_file(); ?></span> .
                                    
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="row" style="margin-top:12px;">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Save Settings</button>
                        </div>
                    </div>

                    <input type="hidden" name="action" value="save_aimtell_settings">
                    <?php wp_nonce_field('save_aimtell_settings', 'aimtell_settings_nonce'); ?>

                </div>
</form>
                
            <div align="center" class="signup-text"> 
                <span> Not yet a user? <a style="color:#FFF" target="_BLANK" href="https://aimtell.com/trial?utm_source=wordpress&utm_medium=plugin">Click to here create an account. </a></span> 
            </div>
        </div>
    </div>

<style>
.loginBox {
    padding: 30px 50px 30px 50px;
}
.code {
    color: #99CC99;
    font-family: monospace;
    /* don't let it line break */
    white-space: nowrap;
}
.loginBox .setting {
    border-left: 4px solid #009933;
    padding: 0.3em 0 0.3em 1em;
    margin: 0 0 1.2em 0;
}
.loginBox select {
    width: 100%;
}
.centerfloat {
    width: 600px;
    margin-left: auto;
    margin-right: auto;
}
.wrap { 
    margin-top:40px;
}
/* on screens 960px width and smaller */
@media screen and (max-width: 960px) {
    .centerfloat {
        width: calc(100% - 40px);
        margin-left: 20px;
    }
}

</style>