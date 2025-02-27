<?php

/**
 * The Easy Timeout Session is a plugin that allows you to change the
 * session timeout for a wordpress user. This particular file is
 * responsible for including the dependencies and starting the plugin.
 *
 * @package ETS
 */

?>
<style>
    .easy-wysiwyg-style-head {
        color: #cdbfe3;
        text-shadow: 0 1px 0 rgba(0,0,0,.1);
        background-color: #6f5499;
    }
    .easy-wysiwyg-style-head h1 {
        color: #ffffff !important;
        font-family: HelveticaNeue, 'Helvetica Neue', Helvetica, Arial, Verdana, sans-serif;
    }
    .about-wrap .wp-badge {
        right: 15px;
        background-color: transparent;
        box-shadow: none;
    }
    .about-text {
        color: #cdbfe3 !important;
    }


    .easy-more {
        margin-top: 15px;
        background: #FFFFFF;
        border: 1px solid #E5E5E5;
        position: relative;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.04);
        padding: 5px 15px;
    }
    .easy-plugins-box {
        background-color: #EEEFFF;
        border: 1px solid #E5E5E5;
        border-top: 0 none;
        position: relative;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.04);
        padding: 15px;
    }
    .easy-bottom {
        background-color: #52ACCC;
        color: #FFFFFF;
        border: 1px solid #FFFFFF;
        border-top: 0 none;
        position: relative;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.04);
        padding: 5px 15px;
    }
    .easy-bottom a {
        color: #FFFFFF;
    }
    .border {
        border: 1px solid #E5E5E5;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.04);
        padding: 20px;
    }
    .nopadding {
        padding-right: 0px !important;
    }
</style>

<div class="wrap about-wrap">
    <div class="row easy-wysiwyg-style-head">
        <div class="col-md-12 ">
            <h1>Easy Wysiwyg Style</h1>
            <div class="about-text">Thank you for installing Easy Wysiwyg Style! Easy Wysiwyg Style WordPress plugin makes
                it even easier to format your content and customize your site.</div>
            <div class="wp-badge">EWS v1.2</div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-9">
            <div>
                <h3>Easy Wysiwyg Style Configuration</h3>
                <p>To configure this plugin is easy. Just specify the context class of your theme, and
                    the location of the CSS inside your Theme folder.</p>
            </div>
            <div class="img-rounded border">
                <form method="post" action="options.php">
                    <?php
                    settings_fields( 'ews' );
                    do_settings_sections( 'ews' );
                    $ews=get_option('ews'); if ($ews == null) { $ews = array(); }
                    ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">css context class</label>
                        <p class="help-block">(without '.') Eg. entry-content , container , main-container , main-text-content </p>
                        <input type="text" class="form-control" id="ews[class]" name="ews[class]" placeholder="main-container"
                               value="<?php echo $ews['class']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">css file location</label>
                        <p class="help-block">(inside your theme) Eg. style.css , css/style.css , library/css/style.css </p>
                        <input type="text" class="form-control" id="ews[css]" name="ews[css]" placeholder="css/style.css"
                               value="<?php echo $ews['css']?>">
                    </div>
                    <?php submit_button(); ?>
                </form>
            </div>
        </div>
        <div class="col-md-3 nopadding">
            <div class="easy-more">
                <h4>Related plugins:</h4>
                <ul>
                    <li>
                        <a href="https://wordpress.org/plugins/easy-admin-menu/" target="_blank">· Easy Admin Menu</a>
                    </li>
                    <li>
                        <a href="https://wordpress.org/plugins/easy-login-form/" target="_blank">· Easy Login Form</a>
                    </li>
                    <li>
                        <a href="https://wordpress.org/plugins/easy-options-page/" target="_blank">· Easy Options Page</a>
                    </li>
                    <li>
                        <a href="https://wordpress.org/plugins/easy-timeout-session/" target="_blank">· Easy Timeout Session</a>
                    </li>
                    <li>
                        <a href="https://wordpress.org/plugins/easy-wysiwyg-style/" target="_blank">· Easy Wysiwyg Style</a>
                    </li>
                </ul>
            </div>
            <div class="easy-plugins-box">
                <!--                <h2>Easy Wysiwyg Style</h2>-->
                <div class="text-center">
                    <p>This plugin is Free Software and is made available free of charge.</p>
                    <p>If you like the software, please consider a donation.</p>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="CHXF6Q9T3YLQU">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>
            </div>
            <div class="easy-bottom">
                Created by <a href="http://jokiruiz.com" target="_blank">Joaquín Ruiz</a>
            </div>
        </div>
    </div>
</div>
