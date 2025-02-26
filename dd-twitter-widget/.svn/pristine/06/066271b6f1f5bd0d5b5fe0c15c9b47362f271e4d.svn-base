<?php
/**
 * Created by PhpStorm.
 * User: dijkstradesign
 * Date: 17-11-13
 * Time: 12:04
 */

add_action('admin_menu', 'DD_twitterMenu');

function DD_twitterMenu() {

    add_options_page('DD Twitter', 'DD Twitter', 'manage_options', 'dd-twitter.php', 'twitterMenu');
    add_action( 'admin_init', 'register_dd_twitter_settings' );
}

function twitterMenu(){


    ?>
    <div class="wrap">
        <h2>DD Twitter settings</h2>

        <div id="poststuff">
            <div id="post-body" class="metabox-holder columns-2">
                <div id="postbox-container-1" class="postbox-container dd-sidebar">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                        <div id="donate" class="postbox">
                            <div class="handlediv" title="Click to toggle"><br></div><h3 class="hndle"><span>Donate to Developer</span></h3>
                            <div class="inside">
                                <div class="donate" id="submitrole">
                                    <div  class="misc-pub-section">
                                        <p>
                                            This plugin is distributed for free under a GNU General Public License or a GPL compatible license. This software is free as in beer and as in freedom; however, donations help to pay for time I could have spent on billable projects. Donations allow me to spend more time developing these free projects instead of working on billable projects. Help support your favorite plugins by donating to help pay for espresso to keep me awake. (I do most of my open source work while at the end of the day.).
                                        </p>
                                        <p>
                                            Donations allow me to spend more time developing all aspects of this plugin and providing the free support that so many people have enjoyed. (It also keeps me motivated: it is a great feeling for someone to be willing to pay — even a few Euros — for something they can get for free.) So be kind and please consider donating. Any amount is appreciated whether it be € 3.00 (price of a Dutch Beer) or more ;).
                                        </p>
                                        <h5>
                                            Wouter Dijkstra
                                        </h5>
                                    </div>
                                    <div id="major-publishing-actions">
                                        <div id="publishing-action">
                                            <span class="spinner"></span>
                                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=5V2C94HQAN63C&lc=US&item_name=Dijkstra%20Design&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted" target="_blank" class="beer button button-primary" title="Donate the developer">Donate</a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="postbox-container-2" class="postbox-container">
                    <p>Get your app key and token from <a href="https://dev.twitter.com/apps">https://dev.twitter.com/apps</a></p>
                    <form method="post" action="options.php">
                        <?php settings_fields( 'dd-twitter-settings' ); ?>
                        <?php do_settings_sections( 'dd-twitter-settings' ); ?>
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row">Consumerkey</th>
                                <td><input type="text" class="widefat" name="dd-twitter-consumerkey" value="<?php echo get_option('dd-twitter-consumerkey'); ?>" /></td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">Consumersecret</th>
                                <td><input type="password" class="widefat" name="dd-twitter-consumersecret" value="<?php echo get_option('dd-twitter-consumersecret'); ?>" /></td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">Accesstoken</th>
                                <td><input type="text" class="widefat" name="dd-twitter-accesstoken" value="<?php echo get_option('dd-twitter-accesstoken'); ?>" /></td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">Accesstokensecret</th>
                                <td><input type="password" class="widefat" name="dd-twitter-accesstokensecret" value="<?php echo get_option('dd-twitter-accesstokensecret'); ?>" /></td>
                            </tr>
                        </table>

                        <?php submit_button(); ?>

                    </form>
                </div>
            </div>
        </div>


    </div>
<?php


}



function register_dd_twitter_settings() {
    //register our settings
    register_setting( 'dd-twitter-settings', 'dd-twitter-consumerkey' );
    register_setting( 'dd-twitter-settings', 'dd-twitter-consumersecret' );
    register_setting( 'dd-twitter-settings', 'dd-twitter-accesstoken' );
    register_setting( 'dd-twitter-settings', 'dd-twitter-accesstokensecret' );
}