<?php
/*
Plugin Name: Google Analytics Visits
Plugin URI: http://peplamb.com/google-analytics-visits/
Description: <a href="http://peplamb.com/google-analytics-visits/" target="_blank">Google Analytics Visits</a> by <strong><a href="http://peplamb.com/" target="_blank">PepLamb</a></strong>! This plugin uses Google Analytics API to fetch data from your analytics account and displays user visits from each country in the widget. You will have to enter the account details in the options page <i>Google Analytics Visits</i>. After enabling this plugin visit the <strong><a href="options-general.php?page=google-analytics-visits/google-analytics-visits.php">settings</a></strong> page and enter your Google Analytics' username/password and ProfileID. <p>'<strong>Google Analytics Visits</strong>' Wordpress Plugin is a personal open source project. Started in 2009, I have put considerable amount of hours adding, refining, tuning, fixing, maintaining the plugin with the goal to make it useful and add to Wordpress community. I need your help to achieve this.</p><p><a href='https://pledgie.com/campaigns/23208' target="_blank">Donate</a></p>
Version: 1.1.6.6
Author: PepLamb
Author URI: http://peplamb.com/
*/
/*
    Copyright 2009-2014  PepLamb  (email : peplamb@gmail.com)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
class GoogleAnalyticsVisits extends WP_Widget {

    function GoogleAnalyticsVisits() {
        $widget_ops = array('classname' => 'widget_text', 'description' => __('Google Analytics Visits by PepLamb'));
        $control_ops = array('width' => 400, 'height' => 350);
        $this->WP_Widget('GoogleAnalyticsVisits', __('Google Analytics Visits'), $widget_ops, $control_ops);
    }

    function widget( $args, $instance ) {
        // init
        $before_widget  = "";
        $before_title   = "";
        $after_title    = "";
        $after_widget   = "";

        // populate
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
        echo $before_widget;
        if ( !empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        ?>
    <div class="GoogleAnalyticsVisits"><?php GoogleAnalyticsVisits_print(); ?></div>
    <?php
        echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        $title = strip_tags($instance['title']);
        ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
    <div style="clear: both;"><?php GoogleAnalyticsVisits_plugin_print_facebook_like_button(); ?><div style="clear: both;"></div></div>
    <p style="text-align: center;">
        <?php GoogleAnalyticsVisits_donate(); ?>
    </p>
    <?php
    }
}
function GoogleAnalyticsVisitsInit() {
    register_widget('GoogleAnalyticsVisits');
}

add_action('widgets_init', 'GoogleAnalyticsVisitsInit');

function GoogleAnalyticsVisits_admin_head() {
    if(stristr(GoogleAnalyticsVisits_currPageURL(), "google-analytics-visits.php")) {
        ?>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo WP_PLUGIN_URL; ?>/google-analytics-visits/css/style.css' />
    <?php
    }
}
add_action('admin_head', 'GoogleAnalyticsVisits_admin_head');

function GoogleAnalyticsVisits_wp_head() {
    ?>
<link rel='stylesheet' type='text/css' media='screen' href='<?php echo WP_PLUGIN_URL; ?>/google-analytics-visits/css/style.css' />
<?php
}
add_action('wp_head', 'GoogleAnalyticsVisits_wp_head');

if(isset($_POST['Submit']) && isset($_POST['GoogleAnalyticsVisits_save'])) {
    if($_POST['Submit'] == "Save" && $_POST['GoogleAnalyticsVisits_save'] == "Save") {
        $expire = mktime(date("H"), date("i"), date("s"), date("m")  , date("d"), date("Y")) + (60 * $_POST['GoogleAnalyticsVisits_cacheExpiresMinutes']);
        $now    = mktime(date("H"), date("i"), date("s"), date("m")  , date("d"), date("Y"));

        update_option('GoogleAnalyticsVisits_username'  ,                       $_POST['GoogleAnalyticsVisits_username']);
        if($_POST['GoogleAnalyticsVisits_password'])
            update_option('GoogleAnalyticsVisits_password',                     $_POST['GoogleAnalyticsVisits_password']);
        update_option('GoogleAnalyticsVisits_profileID' ,                       $_POST['GoogleAnalyticsVisits_profileID']);

        update_option('GoogleAnalyticsVisits_maxResults',                       $_POST['GoogleAnalyticsVisits_maxResults']?$_POST['GoogleAnalyticsVisits_maxResults']:10);

        update_option('GoogleAnalyticsVisits_visitsSinceDays',                  is_numeric($_POST['GoogleAnalyticsVisits_visitsSinceDays'])?$_POST['GoogleAnalyticsVisits_visitsSinceDays']:"");

        update_option('GoogleAnalyticsVisits_cacheEnable',                      $_POST['GoogleAnalyticsVisits_cacheEnable']);

        update_option('GoogleAnalyticsVisits_cacheExpiresMinutes',              $_POST['GoogleAnalyticsVisits_cacheExpiresMinutes']);

        update_option('GoogleAnalyticsVisits_cacheExpires',                     $expire);

        update_option('GoogleAnalyticsVisits_displayHeader' ,                   $_POST['GoogleAnalyticsVisits_displayHeader']);

        update_option('GoogleAnalyticsVisits_displayHeader_CustomText' ,        $_POST['GoogleAnalyticsVisits_displayHeader_CustomText']);

        update_option('GoogleAnalyticsVisits_displayFlagsCountryNamesBoth' ,    $_POST['GoogleAnalyticsVisits_displayFlagsCountryNamesBoth']);

        update_option('GoogleAnalyticsVisits_displayTotalCountries' ,           $_POST['GoogleAnalyticsVisits_displayTotalCountries']);

        update_option('GoogleAnalyticsVisits_displayVisits' ,                   $_POST['GoogleAnalyticsVisits_displayVisits']);
        update_option('GoogleAnalyticsVisits_displayTotalVisits',               $_POST['GoogleAnalyticsVisits_displayTotalVisits']);
        update_option('GoogleAnalyticsVisits_displayPageviews' ,                $_POST['GoogleAnalyticsVisits_displayPageviews']);
        update_option('GoogleAnalyticsVisits_displayTotalPageviews',            $_POST['GoogleAnalyticsVisits_displayTotalPageviews']);

        update_option('GoogleAnalyticsVisits_displayPoweredBy',                 $_POST['GoogleAnalyticsVisits_displayPoweredBy']);

        try {
            update_option('GoogleAnalyticsVisits_cache',                        GoogleAnalyticsVisits_widget_output());
        }
        catch(Exception $e) {
            if(stristr($e, "Invalid value for ids parameter"))
                $output = "<strong>Google Analytics Vists Alert:</strong> please check/recheck/enter your Google Analytics Profile ID.";
            elseif(stristr($e, "Failed to request report data"))
                update_option('GoogleAnalyticsVisits_cache',                "<strong>Google Analytics Vists Alert:</strong> please check/recheck/enter your Google Analytics Profile ID.");
            elseif(stristr($e, "Failed to authenticate user"))
                update_option('GoogleAnalyticsVisits_cache',                "<strong>Google Analytics Vists Alert:</strong> please check/recheck/enter your Google Analytics account details (username and password).");
            else
                update_option('GoogleAnalyticsVisits_cache',                "<strong>Google Analytics Vists Alert:</strong> unknown error please contact me at <a href=\"http://peplamb.com/google-analytics-visits/#respond\">plugin page</a> if you find this error/message.<br /><br /><pre>" . $e . "</pre>");
        }

        add_action( 'admin_notices', 'GoogleAnalyticsVisits_options_saved_notice', 9 );
    }
}
function GoogleAnalyticsVisits_options_saved_notice() {
    echo "<div class='updated'><p>Google Analytics Visits options saved.</p></div>";
}

function GoogleAnalyticsVisits_donate_url() {
    return "https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=TV873GDVX3MQC&lc=US&item_name=PepLamb&item_number=Google%20Analytics%20Visits&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted";
}
function GoogleAnalyticsVisits_donate() {
    ?>
    <a href='https://pledgie.com/campaigns/23208' target="_blank"><img alt='Click here to lend your support to: Google Analytics Visits Wordpress Plugin and make a donation at pledgie.com !' src='https://pledgie.com/campaigns/23208.png?skin_name=chrome' border='0' ></a>
    <?php
}
function GoogleAnalyticsVisits_currPageURL() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function GoogleAnalyticsVisits_activate() {
    if(!get_option('GoogleAnalyticsVisits_maxResults'))
        add_option('GoogleAnalyticsVisits_maxResults', '10');

    if(!get_option('GoogleAnalyticsVisits_cacheEnable'))
        add_option('GoogleAnalyticsVisits_cacheEnable', 'yes');
    if(!get_option('GoogleAnalyticsVisits_cacheExpiresMinutes'))
        add_option('GoogleAnalyticsVisits_cacheExpiresMinutes', '60');

    if(!get_option('GoogleAnalyticsVisits_displayFlagsCountryNamesBoth'))
        add_option('GoogleAnalyticsVisits_displayFlagsCountryNamesBoth', 'both');

    if(!get_option('GoogleAnalyticsVisits_displayTotalCountries'))
        add_option('GoogleAnalyticsVisits_displayTotalCountries', 'yes');

    if(!get_option('GoogleAnalyticsVisits_displayVisits'))
        add_option('GoogleAnalyticsVisits_displayVisits', 'yes');
    if(!get_option('GoogleAnalyticsVisits_displayTotalVisits'))
        add_option('GoogleAnalyticsVisits_displayTotalVisits', 'yes');
    if(!get_option('GoogleAnalyticsVisits_displayPageviews'))
        add_option('GoogleAnalyticsVisits_displayPageviews', 'yes');
    if(!get_option('GoogleAnalyticsVisits_displayTotalPageviews'))
        add_option('GoogleAnalyticsVisits_displayTotalPageviews', 'yes');

    if(get_option('GoogleAnalyticsVisits_displayPoweredBy'))
        update_option('GoogleAnalyticsVisits_displayPoweredBy', 'yes');
    else
        add_option('GoogleAnalyticsVisits_displayPoweredBy', 'yes');
}
function GoogleAnalyticsVisits_deactivate() {
}
register_activation_hook( __FILE__, 'GoogleAnalyticsVisits_activate' );
register_deactivation_hook( __FILE__, 'GoogleAnalyticsVisits_deactivate' );

function GoogleAnalyticsVisits_options() {
    ?>
<div class="wrap">
    <div class="icon32" id="icon-options-general"><br/></div>
    <h2 style="margin-top:0">Google Analytics Visits <?php echo GoogleAnalyticsVisits_plugin_get_version(); ?> Options</h2>
    <p>
        <?php
        GoogleAnalyticsVisits_plugin_print_facebook_like_button();
        echo " ";
        GoogleAnalyticsVisits_plugin_print_twitter_follow_button();
        echo " ";
        GoogleAnalyticsVisits_plugin_print_twitter_share_a_link_button();
        echo " ";
        GoogleAnalyticsVisits_plugin_print_google_plus_1_button();
        ?>
    </p>

    <div style="width: 620px;">
        <div style="float:left;background-color:white;padding: 10px 10px 10px 10px;margin-right:15px;border: 1px solid #ddd;">
            <div style="width:300px;">
                <h3>Donate</h3>
                <p>'<strong>Google Analytics Visits</strong>' Wordpress Plugin is a personal open source project. Started in 2009, I have put considerable amount of hours adding, refining, tuning, fixing, maintaining the plugin with the goal to make it useful and add to Wordpress community. I need your help to achieve this.</p>
                <p><a href='https://pledgie.com/campaigns/23208' target="_blank"><img alt='Click here to lend your support to: Google Analytics Visits Wordpress Plugin and make a donation at pledgie.com !' src='https://pledgie.com/campaigns/23208.png?skin_name=chrome' border='0' ></a></p>
            </div>
        </div>
        <div id="sideblock" style="float:right;width:270px;margin-left:10px;">
            <h2 style="margin-top: -20px;">Information</h2>
            <div id="dbx-content" style="text-decoration:none;">
                <img src="<?php echo WP_PLUGIN_URL; ?>/google-analytics-visits/images/home.png" alt="Home Image"><a target="_blank" style="text-decoration:none;" href="http://peplamb.com/google-analytics-visits/">Google Analytics Visits Home</a><br />
                <img src="<?php echo WP_PLUGIN_URL; ?>/google-analytics-visits/images/rate.png" alt="Rate Image"><a target="_blank" style="text-decoration:none;" href="http://wordpress.org/extend/plugins/google-analytics-visits/">Rate this plugin</a><br />
                <img src="<?php echo WP_PLUGIN_URL; ?>/google-analytics-visits/images/help.png" alt="Help Image"><a target="_blank" style="text-decoration:none;" href="http://peplamb.com/google-analytics-visits/#respond">Support and Help</a><br />
                <br />
                <!-- <img src="<?php echo WP_PLUGIN_URL; ?>/google-analytics-visits/images/twit.png" alt="Twitter Image"><a target="_blank" style="text-decoration:none;" href="http://twitter.com/peplamb/"> Follow updates on Twitter</a><br /> -->
                <?php
                GoogleAnalyticsVisits_plugin_print_facebook_like_button();
                echo " ";
                GoogleAnalyticsVisits_plugin_print_twitter_follow_button();
                echo " ";
                GoogleAnalyticsVisits_plugin_print_twitter_share_a_link_button();
                echo " ";
                GoogleAnalyticsVisits_plugin_print_google_plus_1_button();
                echo "<br />";
                ?>
                <strong>More plugins by PepLamb:</strong>
                <ul>
                    <li><a target="_blank" href="http://peplamb.com/linkable-title-html-and-php-widget/">Linkable Title Html and Php Widget</a></li>
                    <li><a target="_blank" href="http://peplamb.com/custom-field-cookie/">Custom Field Cookie</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div style="clear:both;"></div>

    <form method="post" action="">
        <table class="form-table">
            <tbody>
            <tr valign="top">
                <th scope="row"><label for="GoogleAnalyticsVisits_username">Google Account Username (username/gmail):</label></th>
                <td>
                    <input type="text" class="regular-text" value="<?php echo get_option('GoogleAnalyticsVisits_username'); ?>" name="GoogleAnalyticsVisits_username" id="GoogleAnalyticsVisits_username"/>
                    <span class="setting-description"></span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="GoogleAnalyticsVisits_password">Google Account Password:</label></th>
                <td>
                    <input type="password" class="regular-text" value="" name="GoogleAnalyticsVisits_password" id="GoogleAnalyticsVisits_password"/><br />
                    <span class="setting-description"><?php echo get_option('GoogleAnalyticsVisits_password')?"Password is protected or re-enter password to change!":""; ?></span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="GoogleAnalyticsVisits_profileID">Profile ID:</label></th>
                <td>
                    <input type="text" class="regular-text" value="<?php echo get_option('GoogleAnalyticsVisits_profileID'); ?>" name="GoogleAnalyticsVisits_profileID" id="GoogleAnalyticsVisits_profileID"/><br />
                    <span class="setting-description">Need help finding your Profile ID? Watch this <a href="http://peplamb.com/google-analytics-visits/#ProfileId">video</a>.</span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="GoogleAnalyticsVisits_maxResults">Max Results:</label></th>
                <td>
                    <input type="text" class="small-text" value="<?php echo get_option('GoogleAnalyticsVisits_maxResults'); ?>" name="GoogleAnalyticsVisits_maxResults" id="GoogleAnalyticsVisits_maxResults"/><br />
                    <span class="setting-description">Example: 10 or 15 or 20 etc (Default: 10)</span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="GoogleAnalyticsVisits_visitsSinceDays">Visits Since </label></th>
                <td>
                    <input type="text" class="small-text" value="<?php echo get_option('GoogleAnalyticsVisits_visitsSinceDays'); ?>" name="GoogleAnalyticsVisits_visitsSinceDays" id="GoogleAnalyticsVisits_visitsSinceDays"/> Days<br />
                    <span class="setting-description">Define the number of days you want the analytics visits for, Example: 30 or 60 or 90 etc (Note: blank will display all results)</span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="GoogleAnalyticsVisits_cacheEnable">Enable Cache?</label></th>
                <td>
                    <fieldset id="GoogleAnalyticsVisits_cacheEnable"><legend class="hidden">Enable Cache?</legend>
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_cacheEnable')=='yes'   ?'checked="checked"':''; ?> value="yes" name="GoogleAnalyticsVisits_cacheEnable"/> Yes
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_cacheEnable')=='no'    ?'checked="checked"':''; ?> value="no"  name="GoogleAnalyticsVisits_cacheEnable"/> No
                    </fieldset>
                    <span class="setting-description"></span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="GoogleAnalyticsVisits_cacheExpiresMinutes">If Cache Enabled, Cache Expires in :</label></th>
                <td>
                    <input type="text" class="small-text" value="<?php echo get_option('GoogleAnalyticsVisits_cacheExpiresMinutes'); ?>" name="GoogleAnalyticsVisits_cacheExpiresMinutes" id="GoogleAnalyticsVisits_cacheExpiresMinutes"/> Minutes<br />
                    <span class="setting-description">Example: 30 or 60 (for 1 hour) or 1440 (60 minutes x 24 hours = 1440 minutes for 1 day) etc</span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="GoogleAnalyticsVisits_displayHeader">Display Header?</label></th>
                <td>
                    <fieldset id="GoogleAnalyticsVisits_displayHeader"><legend class="hidden">Display Header?</legend>
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayHeader')=='yes'         ?'checked="checked"':''; ?> value="yes"         name="GoogleAnalyticsVisits_displayHeader"              /> Yes
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayHeader')=='no'          ?'checked="checked"':''; ?> value="no"          name="GoogleAnalyticsVisits_displayHeader"              /> No
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayHeader')=='custom'      ?'checked="checked"':''; ?> value="custom"      name="GoogleAnalyticsVisits_displayHeader"              /> If Custom Text fill this text field
                        <input type="text"  value="<?php echo get_option('GoogleAnalyticsVisits_displayHeader_CustomText')?>"                                           name="GoogleAnalyticsVisits_displayHeader_CustomText"   />
                    </fieldset>
                    <span class="setting-description"></span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="GoogleAnalyticsVisits_displayFlagsCountryNamesBoth">Display </label></th>
                <td>
                    <fieldset id="GoogleAnalyticsVisits_displayFlagsCountryNamesBoth"><legend class="hidden">Display </legend>
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayFlagsCountryNamesBoth')=='flags'            ?'checked="checked"':''; ?> value="flags"           name="GoogleAnalyticsVisits_displayFlagsCountryNamesBoth"/> Flags
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayFlagsCountryNamesBoth')=='country_names'    ?'checked="checked"':''; ?> value="country_names"   name="GoogleAnalyticsVisits_displayFlagsCountryNamesBoth"/> Country Names
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayFlagsCountryNamesBoth')=='both'             ?'checked="checked"':''; ?> value="both"            name="GoogleAnalyticsVisits_displayFlagsCountryNamesBoth"/> Both.
                    </fieldset>
                    <span class="setting-description"></span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="GoogleAnalyticsVisits_displayTotalCountries">Display Total Countries?</label></th>
                <td>
                    <fieldset id="GoogleAnalyticsVisits_displayTotalCountries"><legend class="hidden">Display Total Countries?</legend>
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayTotalCountries')=='yes'         ?'checked="checked"':''; ?> value="yes"         name="GoogleAnalyticsVisits_displayTotalCountries"/> Yes
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayTotalCountries')=='no'          ?'checked="checked"':''; ?> value="no"          name="GoogleAnalyticsVisits_displayTotalCountries"/> No
                    </fieldset>
                    <span class="setting-description"></span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="GoogleAnalyticsVisits_displayVisits">Display Visits?</label></th>
                <td>
                    <fieldset id="GoogleAnalyticsVisits_displayVisits"><legend class="hidden">Display Visits?</legend>
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayVisits')=='yes'         ?'checked="checked"':''; ?> value="yes"         name="GoogleAnalyticsVisits_displayVisits"/> Yes
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayVisits')=='no'          ?'checked="checked"':''; ?> value="no"          name="GoogleAnalyticsVisits_displayVisits"/> No
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayVisits')=='percentage'  ?'checked="checked"':''; ?> value="percentage"  name="GoogleAnalyticsVisits_displayVisits"/> Yes but percentage
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayVisits')=='onlyVisitsNoPercentage'  ?'checked="checked"':''; ?> value="onlyVisitsNoPercentage"  name="GoogleAnalyticsVisits_displayVisits"/> Yes but no percentage
                    </fieldset>
                    <span class="setting-description"></span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="GoogleAnalyticsVisits_displayTotalVisits">Display Total Visits?</label></th>
                <td>
                    <fieldset id="GoogleAnalyticsVisits_displayTotalVisits"><legend class="hidden">Display Visits?</legend>
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayTotalVisits')=='yes'   ?'checked="checked"':''; ?> value="yes" name="GoogleAnalyticsVisits_displayTotalVisits"/> Yes
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayTotalVisits')=='no'    ?'checked="checked"':''; ?> value="no"  name="GoogleAnalyticsVisits_displayTotalVisits"/> No
                    </fieldset>
                    <span class="setting-description"></span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="GoogleAnalyticsVisits_displayPageviews">Display Pageviews?</label></th>
                <td>
                    <fieldset id="GoogleAnalyticsVisits_displayPageviews"><legend class="hidden">Display Pageviews?</legend>
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayPageviews')=='yes'          ?'checked="checked"':''; ?> value="yes"         name="GoogleAnalyticsVisits_displayPageviews"/> Yes
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayPageviews')=='no'           ?'checked="checked"':''; ?> value="no"          name="GoogleAnalyticsVisits_displayPageviews"/> No
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayPageviews')=='percentage'   ?'checked="checked"':''; ?> value="percentage"  name="GoogleAnalyticsVisits_displayPageviews"/> Yes but percentage
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayPageviews')=='onlyPageviewsNoPercentage'   ?'checked="checked"':''; ?> value="onlyPageviewsNoPercentage"  name="GoogleAnalyticsVisits_displayPageviews"/> Yes but no percentage
                    </fieldset>
                    <span class="setting-description"></span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="GoogleAnalyticsVisits_displayTotalPageviews">Display Total Pageviews?</label></th>
                <td>
                    <fieldset id="GoogleAnalyticsVisits_displayTotalPageviews"><legend class="hidden">Display Total Pageviews?</legend>
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayTotalPageviews')=='yes'   ?'checked="checked"':''; ?> value="yes" name="GoogleAnalyticsVisits_displayTotalPageviews"/> Yes
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayTotalPageviews')=='no'    ?'checked="checked"':''; ?> value="no"  name="GoogleAnalyticsVisits_displayTotalPageviews"/> No
                    </fieldset>
                    <span class="setting-description"></span>
                </td>
            </tr>
                <?php if(true) { ?>
            <tr valign="top">
                <th scope="row"><label for="GoogleAnalyticsVisits_displayPoweredBy">Display Powered By?</label></th>
                <td>
                    <fieldset id="GoogleAnalyticsVisits_displayPoweredBy"><legend class="hidden">Display Powered By?</legend>
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayPoweredBy')=='yes'   ?'checked="checked"':''; ?> value="yes" name="GoogleAnalyticsVisits_displayPoweredBy"/> Yes
                        <input type="radio" <?php echo get_option('GoogleAnalyticsVisits_displayPoweredBy')=='no'    ?'checked="checked"':''; ?> value="no"  name="GoogleAnalyticsVisits_displayPoweredBy"/> No
                    </fieldset>
                    <span class="setting-description">This option will add the code <code>Powered By &lt;a href='http://peplamb.com'&gt;Peplamb.com&lt;/a&gt;</code>. These links and donations are greatly appreciated.</span>
                </td>
            </tr>
                <?php } ?>
            </tbody>
        </table>
        <p class="submit">
            <input type="hidden" value="Save" name="GoogleAnalyticsVisits_save"/>
            <input type="submit" value="Save" class="button-primary" name="Submit"/>
        </p>
    </form>
    <div style="float:left;">
        <h3>Preview</h3>
        <?php GoogleAnalyticsVisits_print(true) ?>
    </div>
</div>
<?php
}
function GoogleAnalyticsVisits_menu() {
    add_options_page('Google Analytics Visits', 'Google Analytics Visits', 8, __FILE__, 'GoogleAnalyticsVisits_options');
}
add_action('admin_menu', 'GoogleAnalyticsVisits_menu');

function GoogleAnalyticsVisits_print($debug = false) {
    $GAV_cEn = get_option('GoogleAnalyticsVisits_cacheEnable');
    $GAV_cEM = get_option('GoogleAnalyticsVisits_cacheExpiresMinutes');
    $GAV_cEx = get_option('GoogleAnalyticsVisits_cacheExpires');
    $GAV_che = get_option('GoogleAnalyticsVisits_cache');

    if(!function_exists('wp_cache_get'))
        include (ABSPATH.'wp-includes/cache.php');

    if($GAV_cEn == 'yes') {
        $now = mktime(date("H"), date("i"), date("s"), date("m")  , date("d"), date("Y"));
        if($now > $GAV_cEx or strlen($GAV_che)==0) {
            $expire = $now + (60 * $GAV_cEM);
            update_option('GoogleAnalyticsVisits_cacheExpires',  $expire);
            update_option('GoogleAnalyticsVisits_cache',  GoogleAnalyticsVisits_widget_output());
            $output = get_option('GoogleAnalyticsVisits_cache');
        }
        else
            $output = get_option('GoogleAnalyticsVisits_cache');
    }
    else {
        try {
            $output = GoogleAnalyticsVisits_widget_output();
        }
        catch(Exception $e) {
            if($debug == true) {
                $output = "<br /><strong>Debug Report:</strong> <span style='font-size: small;'>( In-case you see this you have some problem kindly used this data to report me or fix things yourself remember im always here to help :) )</span><br /><pre>$e</pre>";
            }
            else {
                if(stristr($e, "Invalid value for ids parameter"))
                    $output = "<strong>Google Analytics Vists Alert:</strong> please check/recheck/enter your Google Analytics Profile ID.";
                elseif(stristr($e, "Failed to request report data"))
                    $output = "<strong>Google Analytics Vists Alert:</strong> please check/recheck/enter your Google Analytics Profile ID.";
                elseif(stristr($e, "Failed to authenticate user"))
                    $output = "<strong>Google Analytics Vists Alert:</strong> please check/recheck/enter your Google Analytics account details (username and password).";
                else
                    $output = "<strong>Google Analytics Vists Alert:</strong> unknown error please contact me at <a href=\"http://peplamb.com/google-analytics-visits/#respond\">plugin page</a> if you find this error/message.<br /><br /><pre>" . $e . "</pre>";
            }
        }
    }
    /*
        if($GAV_cEn == 'yes') {
            $output = wp_cache_get('GoogleAnalyticsVisits_settings', 'GoogleAnalyticsVisits_cache');
            if($output == false) {
                $output = GoogleAnalyticsVisits_widget_output()."<br />CACHE DOEN'T EXIST SO CREATED";
                $expire = 60 * $GAV_cEx;
                echo "Expire: ".$expire."<br />";
                echo "Time Now: ".mktime(date("H"), date("i"), date("s"), date("m")  , date("d"), date("Y"))."<br ?>";
                wp_cache_set('GoogleAnalyticsVisits_settings', $output, 'GoogleAnalyticsVisits_cache', $expire);
            }
        }
        else
            $output = GoogleAnalyticsVisits_widget_output()."<br />NOT FROM CACHE";
    */

    echo $output;
}
function GoogleAnalyticsVisits_widget_output() {
    $countries = array("afghanistan"=>"af","aland islands"=>"ax","albania"=>"al","algeria"=>"dz","american samoa"=>"as","andorra"=>"ad","angola"=>"ao","anguilla"=>"ai","antarctica"=>"aq","antigua and barbuda"=>"ag","argentina"=>"ar","armenia"=>"am","aruba"=>"aw","ascension island"=>"ac","australia"=>"au","austria"=>"at","azerbaijan"=>"az","bahamas"=>"bs","bahrain"=>"bh","barbados"=>"bb","bangladesh"=>"bd","belarus"=>"by","belgium"=>"be","belize"=>"bz","benin"=>"bj","bermuda"=>"bm","bhutan"=>"bt","botswana"=>"bw","bolivia"=>"bo","bosnia and herzegovina"=>"ba","bouvet island"=>"bv","brazil"=>"br","british indian ocean territory"=>"io","brunei darussalam"=>"bn","bulgaria"=>"bg","burkina faso"=>"bf","burundi"=>"bi","cambodia"=>"kh","cameroon"=>"cm","canada"=>"ca","cape verde"=>"cv","cayman islands"=>"ky","central african republic"=>"cf","chad"=>"td","chile"=>"cl","china"=>"cn","christmas island"=>"cx","cocos (keeling) islands"=>"cc","colombia"=>"co","comoros"=>"km","congo"=>"cg","congo, democratic republic"=>"cd","cook islands"=>"ck","costa rica"=>"cr","cote d'ivoire (ivory coast)"=>"ci","croatia (hrvatska)"=>"hr","cuba"=>"cu","cyprus"=>"cy","czech republic"=>"cz","czechoslovakia (former)"=>"cs","denmark"=>"dk","djibouti"=>"dj","dominica"=>"dm","dominican republic"=>"do","east timor"=>"tp","ecuador"=>"ec","egypt"=>"eg","el salvador"=>"sv","equatorial guinea"=>"gq","eritrea"=>"er","estonia"=>"ee","ethiopia"=>"et","falkland islands (malvinas)"=>"fk","faroe islands"=>"fo","fiji"=>"fj","finland"=>"fi","france"=>"fr","france, metropolitan"=>"fx","french guiana"=>"gf","french polynesia"=>"pf","french southern territories"=>"tf","f.y.r.o.m. (macedonia)"=>"mk","gabon"=>"ga","gambia"=>"gm","georgia"=>"ge","germany"=>"de","ghana"=>"gh","gibraltar"=>"gi","great britain (uk)"=>"gb","greece"=>"gr","greenland"=>"gl","grenada"=>"gd","guadeloupe"=>"gp","guam"=>"gu","guatemala"=>"gt","guinea"=>"gn","guinea-bissau"=>"gw","guyana"=>"gy","haiti"=>"ht","heard and mcdonald islands"=>"hm","honduras"=>"hn","hong kong"=>"hk","hungary"=>"hu","iceland"=>"is","india"=>"in","indonesia"=>"id","iran"=>"ir","iraq"=>"iq","ireland"=>"ie","israel"=>"il","isle of man"=>"im","italy"=>"it","jersey"=>"je","jamaica"=>"jm","japan"=>"jp","jordan"=>"jo","kazakhstan"=>"kz","kenya"=>"ke","kiribati"=>"ki","korea (north)"=>"kp","korea (south)"=>"kr","kuwait"=>"kw","kyrgyzstan"=>"kg","laos"=>"la","latvia"=>"lv","lebanon"=>"lb","liechtenstein"=>"li","liberia"=>"lr","libya"=>"ly","lesotho"=>"ls","lithuania"=>"lt","luxembourg"=>"lu","macau"=>"mo","madagascar"=>"mg","malawi"=>"mw","malaysia"=>"my","maldives"=>"mv","mali"=>"ml","malta"=>"mt","marshall islands"=>"mh","martinique"=>"mq","mauritania"=>"mr","mauritius"=>"mu","mayotte"=>"yt","mexico"=>"mx","micronesia"=>"fm","moldova"=>"md","monaco"=>"mc","montenegro"=>"me","montserrat"=>"ms","morocco"=>"ma","mozambique"=>"mz","myanmar"=>"mm","namibia"=>"na","nauru"=>"nr","nepal"=>"np","netherlands"=>"nl","netherlands antilles"=>"an","neutral zone"=>"nt","new caledonia"=>"nc","new zealand (aotearoa)"=>"nz","nicaragua"=>"ni","niger"=>"ne","nigeria"=>"ng","niue"=>"nu","norfolk island"=>"nf","northern mariana islands"=>"mp","norway"=>"no","oman"=>"om","pakistan"=>"pk","palau"=>"pw","palestinian territory, occupied"=>"ps","panama"=>"pa","papua new guinea"=>"pg","paraguay"=>"py","peru"=>"pe","philippines"=>"ph","pitcairn"=>"pn","poland"=>"pl","portugal"=>"pt","puerto rico"=>"pr","qatar"=>"qa","reunion"=>"re","romania"=>"ro","russian federation"=>"ru","rwanda"=>"rw","s. georgia and s. sandwich isls."=>"gs","saint kitts and nevis"=>"kn","saint lucia"=>"lc","saint vincent & the grenadines"=>"vc","samoa"=>"ws","san marino"=>"sm","sao tome and principe"=>"st","saudi arabia"=>"sa","senegal"=>"sn","serbia"=>"rs","seychelles"=>"sc","sierra leone"=>"sl","singapore"=>"sg","slovenia"=>"si","slovak republic"=>"sk","solomon islands"=>"sb","somalia"=>"so","south africa"=>"za","spain"=>"es","sri lanka"=>"lk","st. helena"=>"sh","st. pierre and miquelon"=>"pm","sudan"=>"sd","suriname"=>"sr","svalbard & jan mayen islands"=>"sj","swaziland"=>"sz","sweden"=>"se","switzerland"=>"ch","syria"=>"sy","taiwan"=>"tw","tajikistan"=>"tj","tanzania"=>"tz","thailand"=>"th","togo"=>"tg","tokelau"=>"tk","tonga"=>"to","trinidad and tobago"=>"tt","tunisia"=>"tn","turkey"=>"tr","turkmenistan"=>"tm","turks and caicos islands"=>"tc","tuvalu"=>"tv","uganda"=>"ug","ukraine"=>"ua","united arab emirates"=>"ae","united kingdom"=>"gb","united states"=>"us","us minor outlying islands"=>"um","uruguay"=>"uy","ussr (former)"=>"su","uzbekistan"=>"uz","vanuatu"=>"vu","vatican city state (holy see)"=>"va","venezuela"=>"ve","viet nam"=>"vn","british virgin islands"=>"vg","virgin islands (u.s.)"=>"vi","wallis and futuna islands"=>"wf","western sahara"=>"eh","yemen"=>"ye","yugoslavia (former)"=>"yu","zambia"=>"zm","zaire"=>"zr","zimbabwe"=>"zw","great britain"=>"gb","russia"=>"ru","slovakia"=>"sk","north korea"=>"kp","south korea"=>"kr","vietnam"=>"vn","croatia"=>"hr","yugoslavia"=>"yu","virgin islands"=>"vi","vatican city state"=>"va","ussr"=>"su","palestinian territory"=>"ps","palestinian territories"=>"ps","palestinian occupied"=>"ps","palestinian"=>"ps","new zealand"=>"nz","falkland islands"=>"fk","czechoslovakia"=>"cs","cocos islands"=>"cc","myanmar [burma]"=>"mm","mongolia"=>"mn","réunion"=>"re","macedonia [fyrom]"=>"mk","congo, the democratic republic of the"=>"cd","congo, the democratic republic of"=>"cd","congo, the democratic republic"=>"cd","congo, democratic republic of the"=>"cd","congo, democratic republic of"=>"cd","congo [drc]"=>"cd");

    $GAV_usr = get_option('GoogleAnalyticsVisits_username');
    $GAV_pwd = get_option('GoogleAnalyticsVisits_password');
    $GAV_pID = get_option('GoogleAnalyticsVisits_profileID');

    $GAV_mRs = get_option('GoogleAnalyticsVisits_maxResults');
    $GAV_vSDs= get_option('GoogleAnalyticsVisits_visitsSinceDays');
    $From    = '2005-01-01';

    if(is_numeric($GAV_vSDs)) {
        $todays_year = date("Y");
        $todays_month = date("m");
        $todays_day = date("d");

        $date = "$todays_year-$todays_month-$todays_day";
        $newdate = strtotime ( "-$GAV_vSDs day" , strtotime ( $date ) ) ;
        $newdate = date ( 'Y-m-d' , $newdate );

        $From = $newdate;
    }

    define('ga_email',      $GAV_usr);
    define('ga_password',   $GAV_pwd);
    define('ga_profile_id', $GAV_pID);

    if(!ga_email || !ga_password || !ga_profile_id) {
        $output = "<strong>Google Analytics Visits Error</strong>: please enter your account details in the options page.";
        return $output;
    }

    if(!class_exists('gapi'))
        require 'lib/gapi/gapi.class.php';

    $ga = new gapi(ga_email, ga_password);
    $ga->requestReportData(ga_profile_id, array('country'), array('visits', 'pageviews'), array('-visits', '-pageviews'), null, $From, null, 1, $GAV_mRs);

    $GAV_dFCB= get_option('GoogleAnalyticsVisits_displayFlagsCountryNamesBoth');
    $GAV_dHd = get_option('GoogleAnalyticsVisits_displayHeader');
    $GAV_dHCT= get_option('GoogleAnalyticsVisits_displayHeader_CustomText');

    $GAV_dTCs= get_option('GoogleAnalyticsVisits_displayTotalCountries');

    $GAV_dVs = get_option('GoogleAnalyticsVisits_displayVisits');
    $GAV_dTVs= get_option('GoogleAnalyticsVisits_displayTotalVisits');
    $GAV_dPv = get_option('GoogleAnalyticsVisits_displayPageviews');
    $GAV_dTPv= get_option('GoogleAnalyticsVisits_displayTotalPageviews');

    $output = '<table class="GoogleAnalyticsVisits_table">';
    $output .= '  <thead>'."\n";
    if($GAV_dHd == "yes") {
        $output .= '    <tr class="GoogleAnalyticsVisits_tr">'."\n";
        if($GAV_dFCB == 'both' || $GAV_dFCB == 'flags')
            $output .= '        <th style="text-align:left" class="GoogleAnalyticsVisits_th_flag">Flags</th>'."\n";
        if($GAV_dFCB == 'both' || $GAV_dFCB == 'country_names')
            $output .= '        <th style="text-align:left" class="GoogleAnalyticsVisits_th_country">Countries</th>'."\n";
        if($GAV_dVs == 'yes')
            $output .= '        <th style="text-align:right" class="GoogleAnalyticsVisits_th_visits"><span class="GoogleAnalyticsVisits_th_span" title="Visits with percentage">Visits (%)</span></th>'."\n";
        elseif($GAV_dVs == 'percentage')
            $output .= '        <th style="text-align:right" class="GoogleAnalyticsVisits_th_visits"><span class="GoogleAnalyticsVisits_th_span" title="Visits in percentage">V (%)</span></th>'."\n";
        elseif($GAV_dVs == 'onlyVisitsNoPercentage')
            $output .= '        <th style="text-align:right" class="GoogleAnalyticsVisits_th_visits"><span class="GoogleAnalyticsVisits_th_span" title="Visits">Visits</span></th>'."\n";
        if($GAV_dPv == 'yes')
            $output .= '        <th style="text-align:right" class="GoogleAnalyticsVisits_th_pageviews"><span class="GoogleAnalyticsVisits_th_span" title="Page views with percentage">Page views (%)</span></th>'."\n";
        elseif($GAV_dPv == 'percentage')
            $output .= '        <th style="text-align:right" class="GoogleAnalyticsVisits_th_pageviews"><span class="GoogleAnalyticsVisits_th_span" title="Page views in percentage">PV (%)</span></th>'."\n";
        elseif($GAV_dPv == 'onlyPageviewsNoPercentage')
            $output .= '        <th style="text-align:right" class="GoogleAnalyticsVisits_th_pageviews"><span class="GoogleAnalyticsVisits_th_span" title="Page views">Page views</span></th>'."\n";
        $output .= '    </tr>'."\n";
    }
    elseif($GAV_dHd == "custom") {
        $cols = 0;
        $output .= '    <tr class="GoogleAnalyticsVisits_tr">'."\n";
        if($GAV_dFCB == 'both' || $GAV_dFCB == 'flags')
            $cols++;
        if($GAV_dFCB == 'both' || $GAV_dFCB == 'country_names')
            $cols++;
        if($GAV_dVs == 'yes')
            $cols++;
        elseif($GAV_dVs == 'percentage')
            $cols++;
        elseif($GAV_dVs == 'onlyVisitsNoPercentage')
            $cols++;
        if($GAV_dPv == 'yes')
            $cols++;
        elseif($GAV_dPv == 'percentage')
            $cols++;
        elseif($GAV_dPv == 'onlyPageviewsNoPercentage')
            $cols++;
        $output .= '        <th style="text-align:left" colspan="'.$cols.'" class="GoogleAnalyticsVisits_th_custom_text"><span class="GoogleAnalyticsVisits_th_span" title="Pageviews">'.$GAV_dHCT.'</span></th>'."\n";
        $output .= '    </tr>'."\n";
    }
    $output .= '  </thead>'."\n";

    $notSetResult = 0;
    $notSetVisits = 0;
    $notSetPageviews = 0;

    $output .= '  <tbody>'."\n";
    foreach($ga->getResults() as $result) {
        if(stristr($result->getCountry(), "(not set)")) {
            $notSetResult = 1;
            $notSetVisits = $result->getVisits();
            $notSetPageviews = $result->getPageviews();
            continue;
        }
        $output .= '    <tr class="GoogleAnalyticsVisits_tr">'."\n";
        if($GAV_dFCB == 'both' || $GAV_dFCB == 'flags') {
            $flag_img = null;
            if($countries[strtolower($result->getCountry())])
                $flag_img = '<span style="width:16px; height:11px;" class="peplamb-gav-'.$countries[strtolower($result->getCountry())].'" title="'.$result->getCountry().'"> </span>';
            $output .= '        <td style="text-align:left" class="GoogleAnalyticsVisits_td_flag">'.($flag_img?$flag_img:"").'</td>'."\n";
        }
        if($GAV_dFCB == 'both' || $GAV_dFCB == 'country_names')
            $output .= '        <td style="text-align:left" class="GoogleAnalyticsVisits_td_country"> '.$result->getCountry().' </td>'."\n";
        if($GAV_dVs == 'yes')
            $output .= '        <td style="text-align:right" class="GoogleAnalyticsVisits_td_visits"> '.$result->getVisits().' ('.(round(($result->getVisits() * 100) / $ga->getVisits(), 0)).' %) </td>'."\n";
        elseif($GAV_dVs == 'percentage')
            $output .= '        <td style="text-align:right" class="GoogleAnalyticsVisits_td_visits"> '.(round(($result->getVisits() * 100) / $ga->getVisits(), 0)).' % </td>'."\n";
        elseif($GAV_dVs == 'onlyVisitsNoPercentage')
            $output .= '        <td style="text-align:right" class="GoogleAnalyticsVisits_td_visits"> '.$result->getVisits().'</td>'."\n";
        if($GAV_dPv == 'yes')
            $output .= '        <td style="text-align:right" class="GoogleAnalyticsVisits_td_pageview"> '.$result->getPageviews().' ('.(round(($result->getPageviews() * 100) / $ga->getPageviews(), 0)).' %) </td>'."\n";
        elseif($GAV_dPv == 'percentage')
            $output .= '        <td style="text-align:right" class="GoogleAnalyticsVisits_td_pageview"> '.(round(($result->getPageviews() * 100) / $ga->getPageviews(), 0)).' % </td>'."\n";
        elseif($GAV_dPv == 'onlyPageviewsNoPercentage')
            $output .= '        <td style="text-align:right" class="GoogleAnalyticsVisits_td_pageview"> '.$result->getPageviews().'</td>'."\n";
        $output .= '    </tr>'."\n";
    }
    $output .= '  </tbody>'."\n";
    $output .= '</table>'."\n";

    $output .= '<table class="GoogleAnalyticsVisits_table">'."\n";

    if($GAV_dTCs == 'yes') {
        //$output .= '    <tr class="GoogleAnalyticsVisits_tr">'."\n";
        //$output .= '        <th class="GoogleAnalyticsVisits_th" style="text-align:right">Total Countries:</th>'."\n";
        //$output .= '        <td class="GoogleAnalyticsVisits_td" style="text-align:right">'.($ga->getTotalResults() - $notSetResult).'</td>'."\n";
        //$output .= '    </tr>'."\n";
    }

    if($GAV_dTVs == 'yes') {
        $output .= '    <tr class="GoogleAnalyticsVisits_tr">'."\n";
        $output .= '        <th class="GoogleAnalyticsVisits_th" style="text-align:right">Total Visits:</th>'."\n";
        $output .= '        <td class="GoogleAnalyticsVisits_td" style="text-align:right">'.($ga->getVisits() - $notSetVisits).'</td>'."\n";
        $output .= '    </tr>'."\n";
    }

    if($GAV_dTPv == 'yes') {
        $output .= '    <tr class="GoogleAnalyticsVisits_tr">'."\n";
        $output .= '        <th class="GoogleAnalyticsVisits_th" style="text-align:right">Total Pageviews:</th>'."\n";
        $output .= '        <td class="GoogleAnalyticsVisits_td" style="text-align:right">'.($ga->getPageviews() - $notSetPageviews).'</td>'."\n";
        $output .= '    </tr>'."\n";
    }

    $GAV_dPB = get_option('GoogleAnalyticsVisits_displayPoweredBy');
    if($GAV_dPB == "yes") {
        $output .= '    <tr class="GoogleAnalyticsVisits_tr">'."\n";
        $output .= '        <td colspan="2"><center><span style="font-size:small;">Powered By <a href="http://peplamb.com">PepLamb.com</a></span></center></td>'."\n";
        $output .= '    </tr>'."\n";
    }

    $output .= '</table>'."\n<!-- Google Analytics Visits v" . GoogleAnalyticsVisits_plugin_get_version() . " by PepLamb (PepLamb.com) -->";

    return $output;
}

/**
 * This function gets the present plugin version.
 *
 * @since 1.1.4.8
 */
function GoogleAnalyticsVisits_plugin_get_version() {
    if ( ! function_exists( 'get_plugins' ) )
        require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    $plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
    $plugin_file = basename( ( __FILE__ ) );
    return $plugin_folder[$plugin_file]['Version'];
}
/**
 * This function gets the plugin name.
 *
 * @since 1.1.4.9
 */
function GoogleAnalyticsVisits_plugin_get_plugin_name() {
    if ( ! function_exists( 'get_plugins' ) )
        require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    $plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
    $plugin_file = basename( ( __FILE__ ) );
    return $plugin_folder[$plugin_file]['Name'];
}
/**
 * This function gets the plugin uri.
 *
 * @since 1.1.4.9
 */
function GoogleAnalyticsVisits_plugin_get_plugin_url() {
    if ( ! function_exists( 'get_plugins' ) )
        require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    $plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
    $plugin_file = basename( ( __FILE__ ) );
    return $plugin_folder[$plugin_file]['PluginURI'];
}

/**
 * This function prints facebook like button.
 *
 * @since 1.1.4.9.8
 */
function GoogleAnalyticsVisits_plugin_print_facebook_like_button( $echo = true ) {
    $slug = "google-analytics-visits";

    $facebook_like = sprintf( __('<div id="fb-root"></div><script type="text/javascript">(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "http://connect.facebook.net/en_US/all.js#xfbml=1";fjs.parentNode.insertBefore(js, fjs);}(document, "script", "facebook-jssdk"));</script>', $slug)) .
    sprintf( __('<div class="fb-like" data-href="http://peplamb.com/%s/" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>', $slug), $slug);

    if($echo) {
        printf( $facebook_like );
    }
    else {
        return $facebook_like;
    }
}
/**
 * This function prints twitter_share_a_link button.
 *
 * @since 1.1.6.2
 */
function GoogleAnalyticsVisits_plugin_print_twitter_share_a_link_button( $echo = true ) {
    $slug = "google-analytics-visits";

    $twitter_share_a_link = sprintf( __('<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://peplamb.com/%s/" data-via="peplamb" data-related="peplamb" data-hashtags="peplamb">Tweet</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>', $slug), $slug);

    if($echo) {
        printf( $twitter_share_a_link );
    }
    else {
        return $twitter_share_a_link;
    }
}
/**
 * This function prints google_plus_1 button.
 *
 * @since 1.1.6.2
 */
function GoogleAnalyticsVisits_plugin_print_google_plus_1_button( $echo = true ) {
    $slug = "google-analytics-visits";

    $google_plus_1 = sprintf( __('<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><div class="g-plusone" data-size="medium" data-href="peplamb.com/%s/"></div>', $slug), $slug);

    if($echo) {
        printf( $google_plus_1 );
    }
    else {
        return $google_plus_1;
    }
}
/**
 * This function prints twitter_follow button.
 *
 * @since 1.1.6.2
 */
function GoogleAnalyticsVisits_plugin_print_twitter_follow_button( $echo = true ) {
    $slug = "google-analytics-visits";

    $twitter_follow = sprintf( __('<a href="https://twitter.com/peplamb" class="twitter-follow-button" data-show-count="false">Follow @peplamb</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>', $slug));

    if($echo) {
        printf( $twitter_follow );
    }
    else {
        return $twitter_follow;
    }
}

/**
 * This function displays the update nag at the top of the
 * dashboard if there is an plugin update available.
 *
 * @since 1.1.4.9
 */
function GoogleAnalyticsVisits_update_nag() {

    if(isset($_GET["action"]) && $_GET["action"] == "upgrade-plugin") {
        return false;
    }

    $slug = "google-analytics-visits";
    $file = "$slug/$slug.php";

    if(!function_exists('plugins_api'))
        include(ABSPATH . "wp-admin/includes/plugin-install.php");

    $info = plugins_api('plugin_information', array('slug' => $slug ));

    if ( !current_user_can('update_plugins') )
        return false;
    if ( stristr(trim($info->version), trim(GoogleAnalyticsVisits_plugin_get_version())) )
        return false;

    $plugin_name = GoogleAnalyticsVisits_plugin_get_plugin_name();
    $plugin_url = GoogleAnalyticsVisits_plugin_get_plugin_url();

    if(function_exists('self_admin_url')) {
        $update_url = wp_nonce_url( self_admin_url('update.php?action=upgrade-plugin&plugin=') . $file, 'upgrade-plugin_' . $file);
    }
    else {// to support wp version < 3.1.0
        $update_url = wp_nonce_url( get_bloginfo('wpurl')."/wp-admin/".('update.php?action=upgrade-plugin&plugin=') . $file, 'upgrade-plugin_' . $file);
    }
    
    echo '<div id="update-nag">';
    //GoogleAnalyticsVisits_plugin_print_facebook_like_button();
    printf( __('<a href="%s" target="_blank">%s %s</a> is available! <a href="%s">Please update now</a>.', $slug), $plugin_url, $plugin_name, $info->version, $update_url );
    echo "<br />";
    printf( __("%s", $slug), GoogleAnalyticsVisits_donate());
    echo "<br />";
    GoogleAnalyticsVisits_plugin_print_facebook_like_button();
    echo " ";
    GoogleAnalyticsVisits_plugin_print_twitter_follow_button();
    echo " ";
    GoogleAnalyticsVisits_plugin_print_twitter_share_a_link_button();
    echo " ";
    GoogleAnalyticsVisits_plugin_print_google_plus_1_button();
    echo " ";
    echo '</div>';

    return true;
}
add_action('admin_notices', 'GoogleAnalyticsVisits_update_nag');

/**
 * Add FAQ and support information.
 *
 * @since 1.1.4.9
 */
function GoogleAnalyticsVisits_filter_plugin_links($links, $file) {
    if ( $file == plugin_basename(__FILE__) ) {
        $links[] = '<a href="http://peplamb.com/google-analytics-visits/">' . __('FAQ', 'google-analytics-visits') . '</a>';
        $links[] = '<a href="http://peplamb.com/google-analytics-visits/">' . __('Support', 'google-analytics-visits') . '</a>';
        $links[] = '<a href="http://peplamb.com/donate/">' . __('Donate', 'google-analytics-visits') . '</a>';
    }

    return $links;
}
add_filter('plugin_row_meta', 'GoogleAnalyticsVisits_filter_plugin_links', 10, 2);

/**
 * Add settings option.
 *
 * @since 1.1.4.9
 */
function GoogleAnalyticsVisits_filter_plugin_actions($links) {
    $new_links = array();
    $slug = "google-analytics-visits";
    if(function_exists('self_admin_url')) {
        $new_links[] = '<a href="'.self_admin_url('options-general.php?page='.$slug.'/'.$slug.'.php').'">' . __('Settings', $slug) . '</a>';
    }
    else {// to support wp version < 3.1.0
        $new_links[] = '<a href="'.get_bloginfo('wpurl')."/wp-admin/".('options-general.php?page='.$slug.'/'.$slug.'.php').'">' . __('Settings', $slug) . '</a>';
    }

    return array_merge($new_links, $links);
}
add_action('plugin_action_links_' . plugin_basename(__FILE__), 'GoogleAnalyticsVisits_filter_plugin_actions');

/**
 * Footer hook.
 *
 * @since 1.1.4.9.8
 */
function GoogleAnalyticsVisits_footer_hook() {
    echo '<!-- This website uses Google Analytics Visits v' . GoogleAnalyticsVisits_plugin_get_version() . ' Wordpress plugin developed by PepLamb (PepLamb.com) -->';
}
add_action('wp_footer', 'GoogleAnalyticsVisits_footer_hook');



// Common
function GoogleAnalyticsVisits_debug_print_r($array) {
    echo "<pre>";
    print_r($array);
    echo "<pre>";
    die();
}
?>