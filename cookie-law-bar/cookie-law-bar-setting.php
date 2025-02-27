<?php
if (!current_user_can('activate_plugins')) {
    die('The account you\'re logged in to doesn\'t have permission to access this page.');
}

function clb_has_valid_nonce() {
    $nonce_actions = array('clb_settings');
    $nonce_form_prefix = 'clb-form_nonce_';
    $nonce_action_prefix = 'clb-wpnonce_';
    foreach ($nonce_actions as $key => $value) {
        if (isset($_POST[$nonce_form_prefix.$value])) {
            check_admin_referer($nonce_action_prefix.$value, $nonce_form_prefix.$value);
            return true;
        }
    }
    return false;
}

if (!empty($_POST)) {
    $nonce_result_check = clb_has_valid_nonce();
    if ($nonce_result_check === false) {
        die('Unable to save changes. Make sure you are accessing this page from the Wordpress dashboard.');
    }
}

// Post fields that require verification.
$valid_fields = array(
    /*'clb_bar_msg' => array(
        'key_name' => 'clb_bar_msg',
        'length' => 4000
    ),*/
    'clb_bar_pos' => array(
        'key_name' => 'clb_bar_pos',
        'values' => array('top', 'bottom')
    ),
    'clb_bar_color' => array(
        'key_name' => 'clb_bar_color',
        'regexp' => '/^#[0-9a-fA-F]{3,6}+$/'
    ),
    'clb_bar_text_color' => array(
        'key_name' => 'clb_bar_text_color',
        'regexp' => '/^#[0-9a-fA-F]{3,6}+$/'
    ),
    /*'clb_btn_msg' => array(
        'key_name' => 'clb_btn_msg',
        'length' => 1000
    ),*/
    'clb_btn_color' => array(
        'key_name' => 'clb_btn_color',
        'regexp' => '/^#[0-9a-fA-F]{3,6}+$/'
    ),
    'clb_btn_text_color' => array(
        'key_name' => 'clb_btn_text_color',
        'regexp' => '/^#[0-9a-fA-F]{3,6}+$/'
    ));

// Check POST fields and remove bad input.
foreach ($valid_fields as $key) {

    if (isset($_POST[$key['key_name']]) ) {

        // SANITIZE first
        $_POST[$key['key_name']] = trim(sanitize_text_field($_POST[$key['key_name']]));

        // Validate
        if (isset($key['regexp'])) {
            if (!preg_match($key['regexp'], $_POST[$key['key_name']])) {
                unset($_POST[$key['key_name']]);
            }

        } else if (isset($key['type']) && $key['type'] == 'int') {
            if (!intval($_POST[$key['key_name']])) {
                unset($_POST[$key['key_name']]);
            }

        } else if (isset($key['length']) && $key['length'] > 0) {
            if (strlen($_POST[$key['key_name']]) > $key['length']) {
                unset($_POST[$key['key_name']]);
            }

        } else {
            $valid = false;
            $vals = $key['values'];
            foreach ($vals as $val) {
                if ($_POST[$key['key_name']] == $val) {
                    $valid = true;
                }
            }
            if (!$valid) {
                unset($_POST[$key['key_name']]);
            }
        }
    }
}

if (isset($_POST['submit'])) {
    foreach (clb_options() as $opt) {
        if (isset($_POST[$opt])) {
            update_option($opt, $_POST[$opt]);
        }
    }
    update_option('clb_version', CLB_VERSION);
} else if (isset($_POST['default'])) {
    clb_delete_all_options();
    clb_default_setting();
}

$clb_bar_msg         =  stripslashes_deep(esc_html(get_option('clb_bar_msg')));
$clb_bar_pos         =  esc_attr(get_option('clb_bar_pos'));
$clb_bar_color       =  esc_attr(get_option('clb_bar_color'));
$clb_bar_text_color  =  esc_attr(get_option('clb_bar_text_color'));
$clb_btn_msg         =  esc_html(get_option('clb_btn_msg'));
$clb_btn_color       =  esc_attr(get_option('clb_btn_color'));
$clb_btn_text_color  =  esc_attr(get_option('clb_btn_text_color'));
?>

<style>
.version {
  position: absolute;
  top: 6px;
  right: 16px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  display: inline-block;
  margin: 20px 0 0;
  padding: 6px 10px;
  font-size: 12px;
  line-height: 14px;
  color: #FFF;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  white-space: nowrap;
  vertical-align: baseline;
  background-color: #999;
}
</style>
<span class="version"><?php echo clb_i('Version: %s', esc_html(CLB_VERSION)); ?></span>
<div class="clb-setting">
    <h1><?php echo clb_i('Cookie Law Bar Settings'); ?></h1>

    <!-- Configuration form -->
    <form method="POST" enctype="multipart/form-data">
    <?php wp_nonce_field('clb-wpnonce_clb_settings', 'clb-form_nonce_clb_settings'); ?>
    <table class="form-table">
        <tr>
            <th scope="row" valign="top"><?php echo clb_i('Bar message'); ?></th>
            <td>
                <textarea name="clb_bar_msg" style="width:100%;min-height:80px;"><?php echo $clb_bar_msg; ?></textarea>
            </td>
        </tr>
        <tr>
            <th scope="row" valign="top"><?php echo clb_i('Bar position'); ?></th>
            <td>
                <select name="clb_bar_pos">
                    <option value="top" <?php selected('top', $clb_bar_pos); ?>><?php echo clb_i('Top'); ?></option>
                    <option value="bottom" <?php selected('bottom', $clb_bar_pos); ?>><?php echo clb_i('Bottom'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th scope="row" valign="top"><?php echo clb_i('Bar background'); ?></th>
            <td>
                <input type="text" name="clb_bar_color" value="<?php echo $clb_bar_color; ?>"/>
            </td>
        </tr>
        <tr>
            <th scope="row" valign="top"><?php echo clb_i('Bar text color'); ?></th>
            <td>
                <input type="text" name="clb_bar_text_color" value="<?php echo $clb_bar_text_color; ?>"/>
            </td>
        </tr>
        <tr>
            <th scope="row" valign="top"><?php echo clb_i('Button message'); ?></th>
            <td>
                <textarea name="clb_btn_msg" style="width:100%;min-height:40px;"><?php echo $clb_btn_msg; ?></textarea>
            </td>
        </tr>
        <tr>
            <th scope="row" valign="top"><?php echo clb_i('Button background'); ?></th>
            <td>
                <input type="text" name="clb_btn_color" value="<?php echo $clb_btn_color; ?>"/>
            </td>
        </tr>
        <tr>
            <th scope="row" valign="top"><?php echo clb_i('Button text color'); ?></th>
            <td>
                <input type="text" name="clb_btn_text_color" value="<?php echo $clb_btn_text_color; ?>"/>
            </td>
        </tr>
    </table>
    <p class="submit" style="text-align: left">
        <input name="submit" type="submit" value="Save" class="button-primary button" tabindex="4">
        <input name="default" type="submit" value="Restore to default" class="button-primary button" tabindex="4">
    </p>
    </form>
    <hr>
    <b>Feel free to try our other widgets powered by <a href="https://widgetpack.com/">Widget Pack</a>.</b>
</div>