<?php
/*
  Plugin Name: Add javascript attributes
  Description: This plugin helps to add async attribute to yout desire javascript file from admin.
  Author: ifourtechnolab
  Version: 1.0
  Author URI: http://www.ifourtechnolab.com/
  Text Domain: add-javascript-attr
  License: GPLv2 or later
  License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

add_action('admin_menu', 'add_js_attr_menu');

function add_js_attr_menu() {
    add_menu_page('Add Javascript Settings', 'Javascript Settings', 'administrator', 'add-javascript-attr', 'addJsAttrGetLayout', 'dashicons-admin-generic');
}

add_action('admin_init', 'add_js_attributes_settings');

function add_js_attributes_settings() {
    register_setting('add-js-attr-settings-group', 'javascript_name');
}

add_filter('script_loader_tag', 'add_js_attribute', 10, 2);

function add_js_attribute($tag, $handle) {

    $add_js_attr = explode(',', get_option('javascript_name'));
    
    if(in_array($handle, $add_js_attr)){
        return str_replace(' src', ' async="async" src', $tag);
    }
    return $tag;
}

function addJsAttrGetLayout() {
    ?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"></div>
        <h1>
            <?php esc_attr_e('Add your Javascript Handler', 'add-javascript-attr'); ?>
        </h1>
        <div id="poststuff">
            <div id="post-body" class="metabox-holder columns-2">
                <!-- main content -->
                <div id="post-body-content">
                    <div class="meta-box-sortables ui-sortable">
                        <div class="postbox ccs-container">
                            <h2><span>
                                    <?php esc_attr_e('Setting', 'add-javascript-attr'); ?>
                                </span>
                            </h2>
                            <div class="inside">
                                <form method="post" action="options.php">
                                    <?php settings_fields('add-js-attr-settings-group'); ?>
                                    <table class="form-table ccs-table">
                                        <tr valign="top">
                                            <td scope="row">
                                                <label for="tablecell">
                                                    <?php esc_attr_e('Add your multiple javascript handler', 'add-javascript-attr'); ?>
                                                </label>
                                            </td>
                                            <td>
                                                <input type="text" value="<?php esc_attr_e(get_option('javascript_name')); ?>" name="javascript_name" class="regular-text" /><br>
                                                <label for="tablecell">
                                                    <?php esc_attr_e('use comma(,) seprated formatted for multiple handler', 'add-javascript-attr'); ?>
                                                </label>
                                            </td>
                                        </tr>                
                                    </table>
                                    <?php submit_button(); ?>
                                </form>
                                <br class="clear" />
                            </div>
                            <!-- .inside -->
                        </div>
                        <!-- .postbox -->
                    </div>
                    <!-- .meta-box-sortables .ui-sortable -->
                </div>
                <!-- post-body-content -->

                <!-- sidebar -->
                <div id="postbox-container-1" class="postbox-container">
                    <div class="meta-box-sortables">
                        <div class="postbox">
                            <h2><span>
                                    <?php
                                    esc_attr_e(
                                            'Sidebar Content Header', 'add-javascript-attr'
                                    );
                                    ?>
                                </span></h2>

                            <div class="inside">
                                <p>
                                    <?php
                                    esc_attr_e(
                                            '', 'add-javascript-attr'
                                    );
                                    ?>
                                </p>
                            </div>
                            <!-- .inside -->
                        </div>
                        <!-- .postbox -->
                    </div>
                    <!-- .meta-box-sortables -->
                </div>
                <!-- #postbox-container-1 .postbox-container -->
            </div>
            <!-- #post-body .metabox-holder .columns-2 -->
            <br class="clear">
        </div>
        <!-- #poststuff -->
    </div> <!-- .wrap -->
    <?php
}