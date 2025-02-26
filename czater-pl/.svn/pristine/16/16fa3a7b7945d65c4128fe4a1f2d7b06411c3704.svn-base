<?php
/*
  Plugin Name: Chater.biz
  Plugin URI: http://www.chater.biz
  Description: Live chat for your website
  Version: 1.0.9
  Author: Chater.biz
  Author URI: info@chater.biz
 */

defined('ABSPATH') or die('No script kiddies please!');

if (!class_exists('Chater')) {

    class Chater {

        public static $setting_page_url = '/wp-admin/admin.php?page=chater_settings_page';
        public static $plugin_name = 'chater';
        public static $czaterLangs = [
            'chatIsOn' => 'Your chat is ready to use',
            'yourChat' => 'Live chat for your website',
            'pasteYourCode' => 'Copy "tok" parameter from this website:   <a href="https://www.chater.biz/userPanel/codes">https://www.chater.biz/userPanel/codes</a>
            and paste here:',
            'cssTemplate' => 'css_template from this website: <a href="https://www.chater.biz/userPanel/settings_advanced">https://www.chater.biz/userPanel/settings_advanced</a>',
            'autoCompleteLogin' => 'Automatically fill in login',
            'autoCompleteEmail' => 'Automatically fill in email',
            'save' => 'Save'
        ];
        public static $pluginPrefix = 'chaterbiz_';

        public static function translate($phrase) {
            return self::$czaterLangs[$phrase];
        }

        /**
         * Init chat. Should be started at all pages on frontend
         */
        public static function wp_head() {
            //delete_option( ChatsAction::$optionKey );
            if (get_option(self::$pluginPrefix . "CzaterId") != "0") {
                global $current_user;
                get_currentuserinfo();

                if (is_admin()) {
                    $login = "";
                    $email = "";
                }
                else {
                    $login = $current_user->user_login;
                    $email = $current_user->user_email;
                }

                if (get_option(self::$pluginPrefix . "czaterAutoCompliteLogin") != 1) {
                    $login = "";
                }
                if (get_option(self::$pluginPrefix . "czaterAutoCompliteEmail") != 1) {
                    $email = "";
                }
                ?>
                <script type="text/javascript">
                    window.$czater || (function (d, s) {
                        var z = $czater = function (c) {
                            z._.push(c)
                        }, $ = z.s = d.createElement(s), e = d.getElementsByTagName(s)[0];
                        z.set = function (o) {
                            z.set._.push(o)
                        };
                        z._ = [];
                        z.set._ = [];
                        $.async = !0;
                        $.setAttribute('charset', 'utf-8');
                        $.src = 'https://www.czater.pl/assets/modules/chat/js/chat.js';
                        z.t = +new Date;
                        z.tok = "<?php echo get_option(self::$pluginPrefix . "CzaterId"); ?>";
                        <?php if(get_option(self::$pluginPrefix . "css_template")!=""): ?> 
                            z.css_template = "<?php echo get_option(self::$pluginPrefix . "css_template"); ?>";
                        <?php endif;?>
                        z.domain = "https://www.czater.pl/";
                        z.login = "<?php echo $login; ?>";
                        z.email = "<?php echo $email; ?>";
                        $.type = 'text/javascript';
                        e.parentNode.insertBefore($, e)
                    })(document, 'script');</script>
                <?php
            }
        }

        public static function admin_menu() {
            if (is_admin()) {
                add_menu_page('Chater.biz', 'Chater.biz', 'manage_options', 'chater_settings_page', array('Chater', 'chater_settings_page'), plugins_url(self::$plugin_name . '/assets/iconC.png'));
            }
        }

        public static function admin_init() {
            add_option(self::$pluginPrefix . "CzaterId", "0");
            add_option(self::$pluginPrefix . "css_template", "");
            add_option(self::$pluginPrefix . "czaterAutoCompliteLogin", "1");
            add_option(self::$pluginPrefix . "czaterAutoCompliteEmail", "1");
        }

        private function get_string_between($string, $start, $end) {
            $string = " " . $string;
            $ini = strpos($string, $start);
            if ($ini == 0)
                return "";
            $ini += strlen($start);
            $len = strpos($string, $end, $ini) - $ini;
            return substr($string, $ini, $len);
        }

        public static function chater_settings_page() { 
            if ($_POST['send']) {
                preg_match('/[0-9a-f]{40}/i', $_POST['czaterCode'], $matches);
                update_option(self::$pluginPrefix . 'CzaterId', $matches[0]);

                preg_match('/[0-9a-zA-Z]{8}/', $_POST['css_template'], $code);
                if($code[0]){
                    update_option(self::$pluginPrefix . "css_template", $code[0]);
                } else {
                    update_option(self::$pluginPrefix . "css_template", '');
                }                

                update_option(self::$pluginPrefix . 'czaterAutoCompliteLogin', sanitize_text_field(trim($_POST['czaterAutoCompliteLogin'])));
                update_option(self::$pluginPrefix . 'czaterAutoCompliteEmail', sanitize_text_field(trim($_POST['czaterAutoCompliteEmail'])));
                echo "<p style='background:#bfb;padding:20px;b'>" . self::translate('chatIsOn') . "</p>";
            }
            ?>
            <h1>Chater.biz</h1>
            <p>
                <?php echo self::translate('yourChat') ?>
            </p>
            <form method="post" action="<?php echo admin_url('admin.php?page=chater_settings_page') ?>">
                <label>
                    <?php echo self::translate('pasteYourCode') ?> <br/>
                    <input 
                        type="text"
                        name="czaterCode" 
                        style="max-width: 100%; min-width: 150px;" 
                        value="<?php echo get_option(self::$pluginPrefix . "CzaterId"); ?>"
                    >
                </label><br/><br/>

                (optional)<br/>
                <label>
                    <?php echo self::translate('cssTemplate') ?><br/>
                    <input
                        type="text"
                        name="css_template"
                        value="<?php echo get_option(self::$pluginPrefix . "css_template"); ?>"
                    >
                </label><br/><br/>

                <label>
                    <input 
                        type="checkbox" 
                        name="czaterAutoCompliteLogin" 
                        value="1" 
                        <?php echo (get_option(self::$pluginPrefix . "czaterAutoCompliteLogin") == 1) 
                            ? 'checked="checked"'
                            : '' ?>
                    > <?php echo self::translate('autoCompleteLogin') ?>
                </label><br/><br/>

                <label>
                    <input 
                        type="checkbox" 
                        name="czaterAutoCompliteEmail" 
                        value="1" 
                        <?php echo (get_option(self::$pluginPrefix . "czaterAutoCompliteEmail") == 1) 
                            ? 'checked="checked"'
                            : '' ?>
                    > <?php echo self::translate('autoCompleteEmail') ?>
                </label><br/><br/>

                <input type="submit" value="<?php echo self::translate('save') ?>" name="send"/>
            </form>    
            <?php
        }
    }
}

//init plugin on frontend
add_action('wp_head', array('Chater', 'wp_head'));

add_action('admin_init', array('Chater', 'admin_init'));
add_action('admin_menu', array('Chater', 'admin_menu'));
