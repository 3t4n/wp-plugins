<?php
require_once 'functions/twitteroauth/twitteroauth.php';
include_once 'functions/translator/include-translation.php';
include_once 'functions/message-manager.php';
define('DISALLOW_FILE_EDIT', true);

class TwitterWidget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'twitter_widget', // Base ID
                'Twitter Widget', // Name
                array('description' => __('Twitter Widget', 'netjas_domain'),), // Args
                array('width' => 455));
    }

    public function form($instance) {
        ?>
        <p>
            <?php
            $transient = 'authorize_url';
            if (get_transient($transient)) {
                ?>
                <script type="text/javascript">
                    window.open('<?php echo get_transient($transient); ?>', '', 'width=500,height=500');
                </script>
                <?php
                delete_transient($transient);
            }
            ?>
        <table>
            <tr>
                <td colspan="2"><span style="font-size: 12px;color: darkgray;text-align: left;text-decoration: underline;"><?php esc_attr_e('Twitter Settings', 'ajax-twitter-widget'); ?></span></td>
            </tr>
            <tr>
                <td> <label for="<?php echo $this->get_field_id('SCREEN_NAME'); ?>"><?php esc_attr_e('Twitter Name @: ', 'ajax-twitter-widget') ?></label></td>
                <td><input style="width:320px;" id="<?php echo $this->get_field_id('SCREEN_NAME') ?>" name="<?php echo $this->get_field_name('SCREEN_NAME'); ?>" type="text" value="<?php echo $instance['SCREEN_NAME']; ?>"/></td>
            </tr>
            <tr>
                <td style="120px;" ><label for="<?php echo $this->get_field_id('NUMBER_OF_TWEETS'); ?>"><?php esc_attr_e('# Tweets: ', 'ajax-twitter-widget') ?></label></td>
                <td><select id="<?php echo $this->get_field_id('NUMBER_OF_TWEETS'); ?>" name="<?php echo $this->get_field_name('NUMBER_OF_TWEETS'); ?>">
                        <option value = "2" <?php echo ('2' === $instance['NUMBER_OF_TWEETS']) ? 'selected="selected"' : ''; ?>>2</option>
                        <option value = "3" <?php echo ('3' === $instance['NUMBER_OF_TWEETS']) ? 'selected="selected"' : ''; ?>>3</option>
                        <option value = "4" <?php echo ('4' === $instance['NUMBER_OF_TWEETS']) ? 'selected="selected"' : ''; ?>>4</option>
                        <option value = "5" <?php echo ('5' === $instance['NUMBER_OF_TWEETS']) ? 'selected="selected"' : ''; ?>>5</option>
                        <option value = "6" <?php echo ('6' === $instance['NUMBER_OF_TWEETS']) ? 'selected="selected"' : ''; ?>>6</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="120px;" ><label for="<?php echo $this->get_field_id('UPDATE_TIME'); ?>"><?php esc_attr_e('Update Interval (s): ', 'ajax-twitter-widget') ?></label></td>
                <td><select id="<?php echo $this->get_field_id('UPDATE_TIME'); ?>" name="<?php echo $this->get_field_name('UPDATE_TIME'); ?>">
                        <option value = "60" <?php echo ('60' === $instance['UPDATE_TIME']) ? 'selected="selected"' : ''; ?>>60</option>
                        <option value = "120" <?php echo ('120' === $instance['UPDATE_TIME']) ? 'selected="selected"' : ''; ?>>120</option>
                        <option value = "300" <?php echo ('300' === $instance['UPDATE_TIME']) ? 'selected="selected"' : ''; ?>>300</option>
                        <option value = "600" <?php echo ('600' === $instance['UPDATE_TIME']) ? 'selected="selected"' : ''; ?>>600</option>
                    </select> s</td>
            </tr>
            <tr>
                <td colspan="2"><hr></td>
            </tr>
            <tr>
                <td colspan="2"><span style="font-size: 12px;color: darkgray;text-align: left;text-decoration: underline;"><?php esc_attr_e('Style Settings', 'ajax-twitter-widget'); ?></span></td>
            </tr>
            <tr>
                <td style="120px;" ><label for="<?php echo $this->get_field_id('FONT_FAMILY'); ?>"><?php esc_attr_e('FONT FAMILY: ', 'ajax-twitter-widget') ?></label></td>
                <td>
                    <select id="<?php echo $this->get_field_id('FONT_FAMILY'); ?>" name="<?php echo $this->get_field_name('FONT_FAMILY'); ?>">
                        <option value = "fantasy" <?php echo ('fantasy' === $instance['FONT_FAMILY']) ? 'selected="selected"' : ''; ?>>fantasy</option>
                        <option value = "cursive" <?php echo ('cursive' === $instance['FONT_FAMILY']) ? 'selected="selected"' : ''; ?>>cursive</option>
                        <option value = "monospace" <?php echo ('monospace' === $instance['FONT_FAMILY']) ? 'selected="selected"' : ''; ?>>monospace</option>
                        <option value = "sans-serif" <?php echo ('sans-serif' === $instance['FONT_FAMILY']) ? 'selected="selected"' : ''; ?>>sans-serif</option>
                        <option value = "serif" <?php echo ('serif' === $instance['FONT_FAMILY']) ? 'selected="selected"' : ''; ?>>serif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="120px;" ><label for="<?php echo $this->get_field_id('FONT_SIZE'); ?>"><?php esc_attr_e('FONT SIZE: ', 'ajax-twitter-widget') ?></label></td>
                <td>
                    <select id="<?php echo $this->get_field_id('FONT_SIZE'); ?>" name="<?php echo $this->get_field_name('FONT_SIZE'); ?>">
                        <option value = "12" <?php echo ('12px' === $instance['FONT_SIZE']) ? 'selected="selected"' : ''; ?>>12px</option>
                        <option value = "13" <?php echo ('13px' === $instance['FONT_SIZE']) ? 'selected="selected"' : ''; ?>>13px</option>
                        <option value = "14" <?php echo ('14px' === $instance['FONT_SIZE']) ? 'selected="selected"' : ''; ?>>14px</option>
                        <option value = "15" <?php echo ('15px' === $instance['FONT_SIZE']) ? 'selected="selected"' : ''; ?>>15px</option>
                        <option value = "16" <?php echo ('16px' === $instance['FONT_SIZE']) ? 'selected="selected"' : ''; ?>>16px</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="120px;" ><label for="<?php echo $this->get_field_id('TEXT_COLOR'); ?>"><?php esc_attr_e('TEXT COLOR (HEX): ', 'ajax-twitter-widget') ?></label></td>
                <td><input value="<?php echo $instance['TEXT_COLOR']; ?>" id="<?php echo $this->get_field_id('TEXT_COLOR') ?>" name="<?php echo $this->get_field_name('TEXT_COLOR'); ?>" type="color" /><br/></td>
            </tr>
            <tr>
                <td style="120px;" ><label for="<?php echo $this->get_field_id('HEADER_COLOR'); ?>"><?php esc_attr_e('HEADER COLOR (HEX): ', 'ajax-twitter-widget') ?></label></td>
                <td><input value="<?php echo $instance['HEADER_COLOR']; ?>" id="<?php echo $this->get_field_id('HEADER_COLOR') ?>" name="<?php echo $this->get_field_name('HEADER_COLOR'); ?>" type="color" /></td>
            </tr>
            <tr>
                <td style="120px;" ><label for="<?php echo $this->get_field_id('BORDER_COLOR'); ?>"><?php esc_attr_e('BORDER COLOR (HEX): ', 'ajax-twitter-widget') ?></label></td>
                <td><input value="<?php echo $instance['BORDER_COLOR']; ?>" id="<?php echo $this->get_field_id('BORDER_COLOR') ?>" name="<?php echo $this->get_field_name('BORDER_COLOR'); ?>" type="color" /></td>
            </tr>
            <tr>
                <td style="120px;" ><label for="<?php echo $this->get_field_id('LOGO_COLOR'); ?>"><?php esc_attr_e('LOGO COLOR: ', 'ajax-twitter-widget') ?></label></td>
                <td>
                    <select class="<?php echo ($instance['LOGO_COLOR']) ? $instance['LOGO_COLOR'] . '-link' : 'white-link'; ?>" id="<?php echo $this->get_field_id('LOGO_COLOR'); ?>" name="<?php echo $this->get_field_name('LOGO_COLOR'); ?>">
                        <option class="none-link" value = "none" <?php echo ('none' === $instance['LOGO_COLOR']) ? 'selected="selected"' : ''; ?>>NONE</option>
                        <option class="none-link" value = "image" <?php echo ('image' === $instance['LOGO_COLOR']) ? 'selected="selected"' : ''; ?>>IMAGE</option>
                        <option class="white-link" value = "white" <?php echo ('white' === $instance['LOGO_COLOR']) ? 'selected="selected"' : ''; ?>>WHITE</option>
                        <option class="blue-link" value = "blue" <?php echo ('blue' === $instance['LOGO_COLOR']) ? 'selected="selected"' : ''; ?>>BLUE</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><hr></td>
            </tr>
            <tr>
                <td colspan="2"><span style="font-size: 12px;color: darkgray;text-align: left;text-decoration: underline;"><?php esc_attr_e('Twitter Button Settings', 'ajax-twitter-widget'); ?></span></td>
            </tr>
            <tr>
                <td style="width: 160px;"><?php esc_attr_e('FOLLOW BUTTON: ', 'ajax-twitter-widget') ?></td>
                <td style="width: 280px"><input id="<?php echo $this->get_field_id('FOLLOW_BUTTON'); ?>" name="<?php echo $this->get_field_name('FOLLOW_BUTTON'); ?>" type="checkbox" <?php echo ('1' === $instance['FOLLOW_BUTTON']) ? 'checked="checked"' : ''; ?> value="1"/></td>
            </tr>
            <tr>
                <td style="width: 160px;"><?php esc_attr_e('SHOW FOLLOWERS: ', 'ajax-twitter-widget') ?></td>
                <td style="width: 280px"><input id="<?php echo $this->get_field_id('SHOW_FOLLOWERS'); ?>" name="<?php echo $this->get_field_name('SHOW_FOLLOWERS'); ?>" type="checkbox" <?php echo ('TRUE' === $instance['SHOW_FOLLOWERS']) ? 'checked="checked"' : ''; ?> value="TRUE"/></td>
            </tr>
            <tr>
                <td style="width: 160px;"><?php esc_attr_e('DATA DNT: ', 'ajax-twitter-widget') ?></td>
                <td style="width: 280px"><input id="<?php echo $this->get_field_id('DATA_DNT'); ?>" name="<?php echo $this->get_field_name('DATA_DNT'); ?>" type="checkbox" <?php echo ('TRUE' === $instance['DATA_DNT']) ? 'checked="checked"' : ''; ?> value="TRUE"/></td>
            </tr>
        </table>
        </p>
        <style type="text/css">
            .white-link {
                background-color: whitesmoke;
            }
            .blue-link {
                background-color: #4099FF;
            }
            div.widgets-sortables.ui-sortable {
                width: auto;
            }
            div.widget {
                width: auto;
            }
        </style><?php
    }

    public function widget($args, $instance) {
            ?>
        <aside class="widget" id="twitter-widget">
            <div class="twitter-head">
                <a class="twitter-color-<?php echo $instance[LOGO_COLOR] ?>" href="https://twitter.com/<?php echo $instance['SCREEN_NAME']; ?>" target="_blank"></a>
                <?php if ($instance['FOLLOW_BUTTON'] === '1') { ?>
                    <a href="https://twitter.com/<?php echo $instance['SCREEN_NAME']; ?>" data-dnt="<?php echo ($instance['DATA_DNT'] === 'TRUE') ? 'true' : 'false'; ?>" class="twitter-follow-button" data-show-screen-name="false" <?php echo ($instance['SHOW_FOLLOWERS'] === 'TRUE') ? 'data-show-count="true"' : 'data-show-count="false"'; ?>></a>
                    <script>!function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (!d.getElementById(id)) {
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//platform.twitter.com/widgets.js";
                                fjs.parentNode.insertBefore(js, fjs);
                            }
                        }(document, "script", "twitter-wjs");</script>
                <?php } ?>
            </div>
            <div id="twitter-content">

            </div>
            <img id="loader" src="<?php echo plugins_url('ajax-twitter-widget') . '/css/images/loader.gif' ?>" alt="loading tweets"/>
        </aside><?php
    }

    function update($new_instance, $old_instance) {
        delete_transient('lastTweets');
        $requestURL = validate_twitter_oauth($new_instance['CONSUMER_KEY'], $new_instance['CONSUMER_SECRET']);
        if ($new_instance['SCREEN_NAME'] === '' or !$requestURL) {
            if ($new_instance['SCREEN_NAME'] === '') {
                $new_instance['SCREEN_NAME'] = 'INVALID NAME';
                set_transient('twitter_status', "1");
            }
        } else {
            set_transient('twitter_status', "2");
            set_transient('update_time', $new_instance['UPDATE_TIME']);
            if (get_transient('token') === false) {
                set_transient('authorize_url', $requestURL);
            }
        }
        return $new_instance;
    }

}

add_action('widgets_init', 'setup_twitter_widget');

function setup_twitter_widget() {
    register_widget("TwitterWidget");
    $twitterStatus = get_transient('twitter_status');
    if ($twitterStatus !== "3") {
        add_action('admin_notices', 'admin_twitter_notices');
    }
    if (is_active_widget('', '', 'twitter_widget')) {
        wp_enqueue_style('twitter-style', plugins_url('ajax-twitter-widget/css/twitter-widget.css'));
        wp_enqueue_script('jquery');
        add_action('wp_enqueue_scripts', 'ajax_script_method');
        add_action('wp_ajax_nopriv_netjas_twitter_retrieve', 'netjas_twitter_retrieve');
        add_action('wp_ajax_netjas_twitter_retrieve', 'netjas_twitter_retrieve');
    }
}

function ajax_script_method() {
    $twitterOptions = get_twitter_options();
    wp_enqueue_script(
            'ajax-script', plugins_url('ajax-twitter-widget/js/sidebar-tweets.js'), array('jquery'), '1.0', true
    );
    wp_localize_script('ajax-script', 'data', array('ajax_url' => admin_url('admin-ajax.php'),
        'text_color' => $twitterOptions['TEXT_COLOR'],
        'header_color' => $twitterOptions['HEADER_COLOR'],
        'border_color' => $twitterOptions['BORDER_COLOR'],
        'followers_count' => $twitterOptions['SHOW_FOLLOWERS'],
        'font_family' => $twitterOptions['FONT_FAMILY'],
        'font_size' => $twitterOptions['FONT_SIZE'],
        'update_time' => $twitterOptions['UPDATE_TIME']));
    $localeClass = getTranslationArray(getLanguage());
    wp_localize_script('ajax-script', 'locale', $localeClass->translationArray);
}

function netjas_twitter_retrieve() {
    if (count($_GET) === 0) {
        header('HTTP/1.1 403 METHOD NOT ALLOWED');
        return;
    }
    header('HTTP/1.1 200 OK');
    header('Content-Type: application/json');
    $result = '';
    $lastTweets = get_transient('lastTweets');
    if (FALSE === $lastTweets) {
        $result = get_twitter_messages();
        set_transient('lastTweets', $result, get_transient('update_time'));
    } else {
        $result = get_transient('lastTweets');
    }
    echo $result;
}

function validate_twitter_oauth($key, $secret) {
    if ($key === '' or $secret === '') {
        return FALSE;
    }
    $requestURL = FALSE;
    $to = new TwitterOAuth(ck, cs);
    $token = $to->getRequestToken(plugins_url('/ajax-twitter-widget/functions/callback.php'));
    if ($token['oauth_callback_confirmed'] === 'true') {
        $tokenArray = array(
            'oauth_token' => $token['oauth_token'],
            'oauth_token_secret' => $token['oauth_token_secret']
        );
        delete_transient('ttoken');
        set_transient('ttoken', $tokenArray);
        $requestURL = $to->getAuthorizeURL($token);
    }
    return $requestURL;
}

function get_twitter_messages() {
    $tokenArray = get_transient('token');

    $twitterOptions = get_twitter_options();

    /* Create a TwitterOauth object with consumer/user tokens. */
    $connection = new TwitterOAuth(ck, cs, $tokenArray['oauth_token'], $tokenArray['oauth_token_secret']);

    $newTwitters = json_encode($connection->get('statuses/user_timeline', array('screen_name' => $twitterOptions['SCREEN_NAME'], 'count' => $twitterOptions['NUMBER_OF_TWEETS'],
                'exclude_replies' => 'false')));
    return $newTwitters;
}

function get_twitter_options() {
    $a = get_option('widget_twitter_widget');
    if ($a) {
        $key = key($a);
        if (empty($a)) {
            return FALSE;
        } else {
            return $a[$key];
        }
    }
    return FALSE;
}

function admin_twitter_notices() {
    $twitterStatus = get_transient('twitter_status');
    $errorString = __('In order to complete the installation is necessary <strong><i>register</i></strong> the Twitter Widget application.', 'ajax-twitter-widget');
    $installedString = __('Twitter Widget has been installed and it is working.', 'ajax-twitter-widget');
    $errorMessage = new MessageManager($errorString, TRUE);
    $installedMessage = new MessageManager($installedString);
    switch ($twitterStatus) {
        case "1": //Twitter widget installed but not configurated or correctly configurated.
            echo $errorMessage->getMessage();
            break;
        case "2": //Twitter Correctly configurated but confirmation message has not be displayed yet.
            echo $installedMessage->getMessage();
            set_transient('lastTweets', get_twitter_messages(), get_transient('update_time'));
            set_transient('twitter_status', "3");
            break;
        case "3": //Confirmation Message displayed.
//            Doing nothing, the widget is installed and working;
            break;
    }
}

function getLanguage() {
    $a = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE'], 1);
    return $a[0];
}

function getLocale() {
    $localeClass = getTranslationArray(getLanguage());
    wp_localize_script('ajax-script', 'locale', $localeClass->translationArray);
}
        ?>