<?php

class SlideBoxAdmin {

    private $options = array();

    function __construct() {
        $this->init();
    }

    function init() {
        add_action('admin_menu', array($this, 'plugin_admin_actions_slide_box'));
        add_action('admin_init', array($this, 'register_my_options'));
        add_action('admin_enqueue_scripts', array($this, 'my_admin_scripts'));
        add_action('init', array($this, 'my_button'));
    }

    function plugin_admin_actions_slide_box() {
        add_theme_page("SlideBox", "SlideBox", "manage_options", "Slide-Box", array($this, "plugin_menu_slide_box"));
    }

    function register_my_options() {
        $this->options[] = "slidebox_css_title";
        $this->options[] = "slidebox_css_content";
        $this->options[] = "slidebox_img_more";
        $this->options[] = "slidebox_img_less";
        for ($i = 0; $i < count($this->options); $i++) {
            register_setting('slidebox_options', $this->options[$i]);
        }
    }

    function my_admin_scripts() {
        // JS
        wp_enqueue_script('jquery');
        wp_enqueue_media();
        wp_register_script('slidebox_admin_js', plugins_url('admin.js', __FILE__));
        wp_enqueue_script('slidebox_admin_js');
        // CSS
        wp_register_style('slidebox_admin_css', plugins_url('admin.css', __FILE__));
        wp_enqueue_style('slidebox_admin_css');
    }

    /* function uninstall() {
      for ($i = 0; $i < count($this->options); $i++) {
      delete_option($this->options[$i]);
      delete_site_option($this->options[$i]);
      }
      } */

    // BUTTON FOR EDITOR
    function my_button() {
        add_filter("mce_external_plugins", array($this, "slidebox_add_buttons"));
        add_filter('mce_buttons', array($this, 'slidebox_register_buttons'));
    }

    function slidebox_add_buttons($plugin_array) {
        $plugin_array['slidebox'] = plugins_url('plugin.js', __FILE__);
        return $plugin_array;
    }

    function slidebox_register_buttons($buttons) {
        array_push($buttons, 'slidebox');
        return $buttons;
    }

    // END BUTTON FOR EDITOR
    // SHOW IN ADMIN    
    function plugin_menu_slide_box() {
        ?>
        <div class="slideboxPluginContent">
            <h1>Slidebox Configuration</h1>
            <hr />
            <p><strong>Default CSS Plugin</strong></p>

<textarea class="textareaslideboxdefault" readonly>
.slideBoxHiddenText{
    display:none;
}
.slideboxTitle{
    background-position: left center;
    background-repeat: no-repeat;
    padding:5px 0px 15px 50px;
    margin:5px 5px 15px 5px;    
    border-bottom:1px solid #f1f0f0;
    cursor:pointer;
    font-size:25px;
    line-height:30px;
    font-weight:bold;
    color:black;
}

.slideboxTitle+div{
    color:#8c8c8c;
    padding:15px;
}

.slideboxPlus{
    background-image: url("plus.png");
}
.slideboxMoins{
    background-image: url("moins.png");
}</textarea>            

            <hr />

            <form method="post" action="options.php">
                <?php settings_fields('slidebox_options'); ?>
                <?php do_settings_sections('slidebox_options'); ?>
                <p>
                    <label for="csstitle"><strong>Custom CSS for Slidebox's Title</strong> (Leave blank to use default css)</label>
                </p>
                <p>
                <p>.slideboxTitle{</p><textarea class="textareaslidebox" id="csstitle" name="slidebox_css_title"><?php echo esc_attr(get_option('slidebox_css_title')); ?></textarea>
                <p>}</p>

                <p><small>Example: color:red;</small></p>
                <hr />
                <p>
                    <label for="csscontent"><strong>Custom CSS for Slidebox's Content</strong> (Leave blank to use default css)</label>
                </p>
                <p>
                <p>.slideboxTitle+div{</p>
                <textarea class="textareaslidebox" id="csscontent" name="slidebox_css_content"><?php echo esc_attr(get_option('slidebox_css_content')); ?></textarea>
                <p>}</p>

                <p><small>Example: color:blue;</small></p>
                <hr />

                <p><label for="upload_image_more"><strong>Change Image for SlideUp</strong></label></p>
                <input id="upload_image_more" type="text" size="36" name="slidebox_img_more" value="<?php echo esc_attr(get_option('slidebox_img_more')); ?>" /> 
                <input id="upload_image_more_button" class="button" type="button" value="Choose or Upload Image" />
                <p>Enter a URL or upload an image (Leave blank to use default image : <img align="absmiddle" src="http://localhost/wordpress_plugins/wp-content/plugins/slidebox/moins.png" /> *25x25px)</p>
                <hr />

                <p><label for="upload_image_less"><strong>Change Image for SlideDown</strong></label></p>
                <input id="upload_image_less" type="text" size="36" name="slidebox_img_less" value="<?php echo esc_attr(get_option('slidebox_img_less')); ?>" /> 
                <input id="upload_image_less_button" class="button" type="button" value="Choose or Upload Image" />
                <p>Enter a URL or upload an image (Leave blank to use default image : <img align="absmiddle" src="http://localhost/wordpress_plugins/wp-content/plugins/slidebox/plus.png" /> *25x25px)</p>
                <hr />

                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }

}
