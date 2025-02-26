<?php
/*
 * RB Disable Right Click
 * Version:           1.0.9 - 38451
 * Author:            RBS
 * Date:              03 02 2020 12:11:29 GMT
 */

if (!defined('WPINC') || !defined("ABSPATH")) {
    die();
}

$types = get_post_types(array('public' => true), 'objects');

if (isset($_POST['submit']) ) {
    check_admin_referer('rb_disable_right_click_options');
    $this->options['enable'] = (isset($_POST['rb_disable_right_click']) && $_POST['rb_disable_right_click'] == 'enable') ? true : false;
    $this->save_options();
}
?>
<style> .indent {padding-left: 2em} </style>
<div class="wrap">
    <h1><?php _e('Disable Right Click RB', 'disable-right-click-rb');?></h1>
    <p>
        <?php _e('Here you can configure your right click protection tools. Section with all configuration settings of this tool.', 'disable-right-click-rb');?>
    </p>
    <form action="" method="post" id="disable-comments">
        <ul>
            <li>
                <label for="rb_disable_right_click_on">
                    <input type="radio" id="rb_disable_right_click_on" name="rb_disable_right_click" value="disable" <?php checked(isset($this->options['enable']) && !$this->options['enable'] );?> />
                    <strong>
                        <?php _e('Disable', 'disable-right-click-rb');?>
                    </strong>
                </label>
            </li>
            <li>
                <label for="rb_disable_right_click_off">
                    <input type="radio" id="rb_disable_right_click_off" name="rb_disable_right_click" value="enable" <?php checked(isset($this->options['enable']) && $this->options['enable'] );?> />
                    <strong>
                        <?php _e('Enable', 'disable-right-click-rb');?>
                    </strong>
                </label>
            </li>
        </ul>
        <?php wp_nonce_field('rb_disable_right_click_options');?>
        <p class="submit">
            <input class="button-primary" type="submit" name="submit" value="<?php echo esc_attr(__('Save Changes', 'disable-right-click-rb')); ?>">
        </p>
    </form>
</div>
