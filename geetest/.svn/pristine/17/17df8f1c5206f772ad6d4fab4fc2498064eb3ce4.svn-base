<?php
function GCV4_checked($value)
{
    if ($value == "1") {
        echo "checked";
    }
}
?>
<div class="wrap">
    <a name="geetest"></a>
    <h2>GeeTest captcha setting</h2>

    <form id="setting_form" method="post" action="options.php">
        <?php settings_fields('geetest_options_group'); ?>
        <?php do_settings_sections('geetest_options_group'); ?>
        <p>Get captcha ID and key from <a href="https://www.geetest.com/en/?plugin=wordpress" title=""  target="_blank">GeeTest</a></p>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Version</th>
                <td>
                    <select name="geetest_options[version_options]"
                            id="geetest_options[version_options]" onchange="setVar(this);">
                        <option value="v3" <?php if (get_option('geetest_options')['version_options']=='v3') {
                            echo 'selected';
                        } ?> >version 3</option>
                        <option value="v4" <?php if (get_option('geetest_options')['version_options']=='v4') {
                            echo 'selected';
                        } ?> >version 4</option>
                    </select>
                    <br><br>
                    <label>Please fill in the ID and key of the corresponding version below. Otherwise, the captcha will not work properly.</label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">ID</th>
                <td>
                    <input id="input_public_key" type="text" name="geetest_options[public_key]" size="40" value="<?php echo esc_attr(get_option('geetest_options')['public_key']); ?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Key</th>
                <td>
                    <input id="input_public_key"  type="text" name="geetest_options[private_key]" size="40" value="<?php echo esc_attr(get_option('geetest_options')['private_key']); ?>" />
                </td>
            </tr>
        </table>
        <h2>We supported</h2>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Comment form</th>
                <td>
                    <input type="checkbox" id ="geetest_options[show_in_comments]" name="geetest_options[show_in_comments]" value="1" <?php GCV4_checked(esc_attr(get_option('geetest_options')['show_in_comments'])); ?> />
                    <label for="geetest_options[show_in_comments]"></label>
                </td>
            </tr>
        </table>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Sign in</th>
                <td>
                    <input type="checkbox" id ="geetest_options[show_in_login]" name="geetest_options[show_in_login]" value="1" <?php GCV4_checked(esc_attr(get_option('geetest_options')['show_in_login'])); ?> />
                    <label for="geetest_options[show_in_login]"></label>
                </td>
            </tr>
        </table>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Sign up</th>
                <td>
                    <input type="checkbox" id ="geetest_options[show_in_registration]" name="geetest_options[show_in_registration]" value="1" <?php GCV4_checked(esc_attr(get_option('geetest_options')['show_in_registration'])); ?> />
                    <label for="geetest_options[show_in_registration]"></label>
                </td>
            </tr>
        </table>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Gravity Form</th>
                <td>
                    <input type="checkbox" id ="geetest_options[show_in_gform]" name="geetest_options[show_in_gform]" value="1" <?php GCV4_checked(esc_attr(get_option('geetest_options')['show_in_gform'])); ?> />
                    <label for="geetest_options[show_in_gform]"></label>
                </td>
            </tr>
        </table>
        <div id = "supported">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Lost Password Form</th>
                    <td>
                        <input type="checkbox" id ="geetest_options[show_in_lostpassword]" name="geetest_options[show_in_lostpassword]" value="1" <?php GCV4_checked(esc_attr(get_option('geetest_options')['show_in_lostpassword'])); ?> />

                    </td>
                </tr>
            </table>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">WooCommerce Register Form</th>
                    <td>
                        <input type="checkbox" id ="geetest_options[show_in_wcregister]" name="geetest_options[show_in_wcregister]" value="1" <?php GCV4_checked(esc_attr(get_option('geetest_options')['show_in_wcregister'])); ?> />

                    </td>
                </tr>
            </table>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">WooCommerce Login Form</th>
                    <td>
                        <input type="checkbox" id ="geetest_options[show_in_wclogin]" name="geetest_options[show_in_wclogin]" value="1" <?php GCV4_checked(esc_attr(get_option('geetest_options')['show_in_wclogin'])); ?> />

                    </td>
                </tr>
            </table>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">WooCommerce Checkout Form</th>
                    <td>
                        <input type="checkbox" id ="geetest_options[show_in_wccheckout]" name="geetest_options[show_in_wccheckout]" value="1" <?php GCV4_checked(esc_attr(get_option('geetest_options')['show_in_wccheckout'])); ?> />

                    </td>
                </tr>
            </table>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">WooCommerce Lost Password Form</th>
                    <td>
                        <input type="checkbox" id ="geetest_options[show_in_wclostpassword]" name="geetest_options[show_in_wclostpassword]" value="1" <?php GCV4_checked(esc_attr(get_option('geetest_options')['show_in_wclostpassword'])); ?> />

                    </td>
                </tr>
            </table>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Contact Form 7</th>
                    <td>
                        <input type="checkbox" id ="geetest_options[show_in_cf7]" name="geetest_options[show_in_cf7]" value="1" <?php GCV4_checked(esc_attr(get_option('geetest_options')['show_in_cf7'])); ?> />

                    </td>
                </tr>
            </table>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">bbPress New topic</th>
                    <td>
                        <input type="checkbox" id ="geetest_options[show_in_bbp_new]" name="geetest_options[show_in_bbp_new]" value="1" <?php GCV4_checked(esc_attr(get_option('geetest_options')['show_in_bbp_new'])); ?> />

                    </td>
                </tr>
            </table>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">bbPress reply to topic</th>
                    <td>
                        <input type="checkbox" id ="geetest_options[show_in_bbp_reply]" name="geetest_options[show_in_bbp_reply]" value="1" <?php GCV4_checked(esc_attr(get_option('geetest_options')['show_in_bbp_reply'])); ?> />

                    </td>
                </tr>
            </table>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">wpforms</th>
                    <td>
                        <input type="checkbox" id ="geetest_options[show_in_wpforms]"
                               name="geetest_options[show_in_wpforms]" value="1" <?php GCV4_checked(esc_attr(get_option('geetest_options')['show_in_wpforms'])); ?> />

                    </td>
                </tr>
            </table>

        </div>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Language</th>
                <td>
                    <select name="geetest_options[lang_options]" id="geetest_options[lang_options]">
                        <option value="en" <?php if (get_option('geetest_options')['lang_options']=='en') {
                            echo 'selected';
                        } ?> >English</option>
                        <option value="zh-cn" <?php if (get_option('geetest_options')['lang_options']=='zh-cn') {
                            echo 'selected';
                        } ?> >简体中文</option>
                        <option value="zh-hk" <?php if (get_option('geetest_options')['lang_options']=='zh-hk') {
                            echo 'selected';
                        } ?> >繁体中文</option>
                    </select>
                </td>
            </tr>
        </table>
        <p class="submit"><input type="submit" class="button-primary" title="" value="Submit &raquo;" /></p>
    </form>

</div>
<script type="text/javascript">
    var show_in_login = document.getElementById('geetest_options[show_in_login]');
    var show_in_comments = document.getElementById('geetest_options[show_in_comments]');
    var show_in_registration = document.getElementById('geetest_options[show_in_registration]');
    var show_in_lostpassword = document.getElementById('geetest_options[show_in_lostpassword]');
    var show_in_wcregister = document.getElementById('geetest_options[show_in_wcregister]');
    var show_in_wclogin = document.getElementById('geetest_options[show_in_wclogin]');
    var show_in_wccheckout = document.getElementById('geetest_options[show_in_wccheckout]');
    var show_in_wclostpassword = document.getElementById('geetest_options[show_in_wclostpassword]');
    var show_in_cf7 = document.getElementById('geetest_options[show_in_cf7]');
    var show_in_bbp_new = document.getElementById('geetest_options[show_in_bbp_new]');
    var show_in_bbp_reply = document.getElementById('geetest_options[show_in_bbp_reply]')
    var show_in_wpforms = document.getElementById('geetest_options[show_in_wpforms]');
    var setting_form = document.getElementById('setting_form');
    var input_public_key = document.getElementById('input_public_key');
    var input_private_key = document.getElementById('input_private_key');
    setting_form.onsubmit=function(){
        if(show_in_login.checked == true||show_in_comments.checked == true||show_in_registration.checked == true||
            show_in_lostpassword.checked == true || show_in_wclogin.checked == true || show_in_wccheckout.checked == true
            || show_in_cf7.checked == true || show_in_bbp_new.checked == true || show_in_bbp_reply.checked == true
            || show_in_wcregister.checked == true || show_in_wpforms.checked == true){
            if(input_public_key.value=="" || input_private_key.value=="" ){
                alert("ID and key are required to activate GeeTest captcha!");
                return false;
            }
            else{
                return true;
            }
        }
    }

    if( document.getElementById('geetest_options[version_options]').value == 'v3'){
        document.getElementById('supported').style.display = "none";
    }else{
        document.getElementById('supported').style.display = "";
    }
    function setVar(sel){
        if(sel.value == 'v3'){
            document.getElementById('supported').style.display = "none";

        }else{
            document.getElementById('supported').style.display = "";
        }
    }
</script>