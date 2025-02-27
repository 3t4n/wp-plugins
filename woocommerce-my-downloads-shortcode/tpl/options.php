<style>
    .wc-ppp-settings-wrap h2.hndle {
        background-color: #23282d;
        color: #ccc;
        text-align:left;
        font-weight:bold;
    }

    .wc-ppp-settings-wrap .description {
        margin-bottom: 20px;
        font-size: 12px;
    }


    #post-body ul.wcppp-tab-bar {
        float: left;
        width: 120px;
        text-align: right;
        /* Negative margin for the sake of those without JS: all tabs display */
        margin: 0 -120px 0 5px;
        padding: 0;
    }



    body.woocommerce-payperpost_page_wc_pay_per_post-settings .about-wrap img {
        width: 140px;
    }

    .pramadillo-badge {
        position: absolute;
        top: 0;
        right: 0;
        color: #fff;
        font-size: 14px;
        text-align: center;
        font-weight: 600;
        margin: 5px 0 0;
        height: 140px;
        display: inline-block;
        width: 140px;
        text-rendering: optimizeLegibility;
        box-shadow: 0 1px 3px rgba(0,0,0,.2);

    }

    .pramadillo-badge img {
        width:100%;
    }

    .about-wrap.debug h3 {
        margin: inherit;
        font-size: inherit;
        line-height: inherit;
    }
    label {
        font-weight:bold;
    }

</style>

<div class="wrap  about-wrap full-width-layout">
    <h1><?php _e( 'My Downloads Shortcode for WooCommerce Settings' ); ?></h1>
    <p class="about-text"><?php _e( 'If you have any questions or want to suggest a feature request please reach out to me at <a href="https://pramadillo.com" target="_blank">pramadillo.com</a>.  If you really dig this plugin consider leaving me a review!', 'wc_pay_per_post' ); ?></p>
    <div class="pramadillo-badge"><img src="<?php echo plugin_dir_url( __DIR__ ) . 'icon.png'; ?>"/></div>

    <div class="wc-ppp-settings-wrap">

        <div id="poststuff">

            <div id="post-body" class="metabox-holder columns-2">

                    <div id="post-body-content">

                        <div class="postbox">
                            <h2 class="hndle"><?php esc_attr_e( 'Restricted Content Message', 'wc_pay_per_post' ); ?></h2>

                            <div class="inside">
                                <form action="options.php" method="post">
		                            <?php settings_fields( self::$prefix . '_options' ); ?>
                                    <table class="widefat" style="border:0;">
                                        <tr>
                                            <td>
                                                <label>Available Downloads Heading</label><br>
                                                <input type="text" name="<?php echo self::$prefix; ?>_downloads_heading" style="width:100%;" value="<?php echo get_option( self::$prefix . '_downloads_heading' ); ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Content if user has no downloads.</label><br>
                                                <textarea name="<?php echo self::$prefix; ?>_no_downloads" style="width:100%; height:200px;"><?php echo get_option( self::$prefix . '_no_downloads' ); ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Show Downloads Remaining on Template: </label>
                                                <input type="checkbox" value="1" name="<?php echo self::$prefix; ?>_show_downloads_remaining" <?php checked( get_option( self::$prefix . '_show_downloads_remaining' ), 1 ); ?>>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Show Available Download Count on Template: </label>
                                                <input type="checkbox" value="1" name="<?php echo self::$prefix; ?>_show_download_count" <?php checked( get_option( self::$prefix . '_show_download_count' ), 1 ); ?>>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label>Show Date Purchased on Template: </label>
                                                <input type="checkbox" value="1" name="<?php echo self::$prefix; ?>_show_date" <?php checked( get_option( self::$prefix . '_show_date' ), 1 ); ?>>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Download Button Label <br><small>If left blank it will default to "Download [Product Name]"</small></label><br>
                                                <input type="text" name="<?php echo self::$prefix; ?>_download_button_label" style="width:100%;" value="<?php echo get_option( self::$prefix . '_download_button_label' ); ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Download Button Classes </label><br>
                                                <input type="text" name="<?php echo self::$prefix; ?>_download_button_class" style="width:100%;" value="<?php echo get_option( self::$prefix . '_download_button_class' ); ?>"/>
                                            </td>
                                        </tr>

                                    </table>
		                            <?php submit_button( 'Save Settings' ); ?>

                                </form>
                            </div>
                        </div>

            </div>
<!--            SideBar-->
            <div id="postbox-container-1" class="postbox-container">

                <div class="postbox">
                    <h2 class="hndle"><?php esc_attr_e( 'Usage' ); ?></h2>

                    <div class="inside">
                        <h3>Shortcodes</h3>
                        All Downloads Shortcode:
                        <code>[woocommerce-my-downloads]</code>
                        <br><br>
                        Single Produt Download Button:
                        <code>[woocommerce-my-downloads-button id=PRODUCT_ID]</code>

                    </div>

                </div>

                <div class="postbox">
                    <h2 class="hndle"><?php esc_attr_e( 'Have Questions? Request a Feature?', 'wc_pay_per_post' ); ?></h2>

                    <div class="inside">
                        <p><?php _e( 'If you have any questions or want to suggest a feature request please reach out to me at <a href="https://pramadillo.com" target="_blank">pramadillo.com</a>.  If you really dig this plugin consider leaving me a review!', 'wc_pay_per_post' ); ?></p>

                    </div>

                </div>


            </div>
        </div>

        <br class="clear">
    </div>
</div>