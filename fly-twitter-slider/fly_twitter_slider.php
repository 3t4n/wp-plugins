<?php
/*
  Plugin Name: Fly Twitter Slider
  Plugin URI: http://social-media-extensions.com/wp/
  Description: Thanks for installing  Fly Twitter Slider
  Version: 1.0
  Author: Social Media Extensions
  Author URI: http://social-media-extensions.com/wp/
 */

class Fly_twitter_Sidebar {

    public $options;

    public function __construct() {

        $this->options = get_option('fly_twitter_options');
        $this->fly_twitter_setting_register();


    }
  
    public static function fly_twitter_sidebar_slider_menu() {
        add_menu_page(__('Fly Twitter Sidebar', 'fly-twitter-sidebar'), __('Fly Twitter Slider', 'fly-twitter-sidebar'), 'manage_options', __FILE__, array('Fly_twitter_Sidebar', 'fly_show_setting_page'), 'dashicons-twitter', '80');
    }

    public static function fly_show_setting_page() {
        ?>
        <div class="wrap">
        <?php screen_icon(); ?>
            <h2>Fly Twitter Slider Configuration</h2>
            <form method="post" action="options.php" enctype="multipart/form-data">

                <?php settings_fields('fly_twitter_options'); ?>
        <?php do_settings_sections(__FILE__); ?>
                <p class="submit">
                    <input name="submit" type="submit" class="button-primary" value="Save Changes"/>
                </p>
            </form>
        </div>
        <?php
    }

    public function fly_twitter_setting_register() {
        register_setting('fly_twitter_options', 'fly_twitter_options', array($this, 'fly_twitter_sidebar_validate'));
        add_settings_section('fly_twitter_sidebar_slider', 'Settings', array($this, 'fly_twitter_sidebar_slider_cb'), __FILE__);
        add_settings_field('widget_id', 'Widget ID', array($this, 'fly_twitter_name_settings'), __FILE__, 'fly_twitter_sidebar_slider');
        add_settings_field('twitter_username', 'Twitter Name', array($this, 'fly_twitter_url'), __FILE__, 'fly_twitter_sidebar_slider');
        add_settings_field('icon', 'Margin Top', array($this, 'fly_twitter_margin'), __FILE__, 'fly_twitter_sidebar_slider');
        add_settings_field('fly_tw_height', 'Height', array($this, 'fly_tw_height'), __FILE__, 'fly_twitter_sidebar_slider');
        add_settings_field('position', 'Theme', array($this, 'fly_twitter_possition'), __FILE__, 'fly_twitter_sidebar_slider');
        add_settings_field('link_color', 'Link Color', array($this, 'fly_link_color'), __FILE__, 'fly_twitter_sidebar_slider');
        add_settings_field('border_color', 'Border Color', array($this, 'fly_border_color'), __FILE__, 'fly_twitter_sidebar_slider');
        add_settings_field('language', 'Language', array($this, 'fly_twitter_language_settings'), __FILE__, 'fly_twitter_sidebar_slider');
        add_settings_field('fly_tw_img_show', 'Icon', array($this, 'fly_tw_show_img'), __FILE__, 'fly_twitter_sidebar_slider');
        //add_settings_field('fly_page_show', 'Show', array($this, 'fly_tw_page_show'), __FILE__, 'fly_twitter_sidebar_slider');
        
    }

    public function fly_twitter_sidebar_validate($plugin_options) {
        return($plugin_options);
    }

    public function fly_twitter_sidebar_slider_cb() {

    }
    public function fly_tw_height() {
        if (empty($this->options['fly_tw_height']))
            $this->options['fly_tw_height'] = 350;
        echo "<input name='fly_twitter_options[fly_tw_height]' type='text' value='{$this->options['fly_tw_height']}' />";
    }

    public function fly_twitter_name_settings() {
        if (empty($this->options['widget_id']))
            $this->options['widget_id'] = "";
        echo "<input name='fly_twitter_options[widget_id]' type='text' value='{$this->options['widget_id']}' />";
    }
   
    public function fly_twitter_url() {
        if (empty($this->options['twitter_username']))
            $this->options['twitter_username'] = "";
        echo "<input name='fly_twitter_options[twitter_username]' type='text' value='{$this->options['twitter_username']}' />";
    }

    public function fly_twitter_margin() {
        (!empty($this->options['icon']))?$icon=$this->options['icon']:$icon=150;  
        echo "<input name='fly_twitter_options[icon]' type='text' value='$icon' />";
    }


    public function fly_border_color() {
        (!empty($this->options['border_color']))?$border_color=$this->options['border_color']:$border_color="#fff";
        echo "<input type='text' name='fly_twitter_options[border_color]' value='$border_color' class='my-color-field'} />";
    }



    public function fly_link_color() {
        (!empty($this->options['link_color']))?$color=$this->options['link_color']:$color="#fff";          ;
        echo "<input type='text' name='fly_twitter_options[link_color]' value='$color' class='my-color-field'} />";
    }
    public function fly_twitter_possition() {
        (!empty($this->options['position']))?$position=$this->options['position']:$position="right"; 
        $items = array('light', 'dark');
        echo "<select name='fly_twitter_options[position]'>";
        foreach ($items as $item) {
            $selected = ($position === $item) ? 'selected = "selected"' : '';
            echo "<option value='$item' $selected>$item</option>";
        }
        echo "</select>";
    }

    public function fly_twitter_cover_settings() {
        if (empty($this->options['cover']))
            $this->options['cover'] = "true";
        $items = array('true', 'false');
        echo "<select name='fly_twitter_options[cover]'>";
        foreach ($items as $cover) {
            $selected = ($this->options['cover'] === $cover) ? 'selected = "selected"' : '';
            echo "<option value='$cover' $selected>$cover</option>";
        }
        echo "</select>";
    }

    public function fly_twitter_post_settings() {
        if (empty($this->options['post']))
            $this->options['post'] = "false";
        $items = array('false', 'true');
        echo "<select name='fly_twitter_options[post]'>";
        foreach ($items as $post) {
            $selected = ($this->options['post'] === $post) ? 'selected = "selected"' : '';
            echo "<option value='$post' $selected>$post</option>";
        }
        echo "</select>";
    }

    public function fly_twitter_language_settings() {
        if (empty($this->options['language']))
            $this->options['language'] = "en_US";
        $items = array('en_US', 'en_GB', 'af_ZA', 'bn_IN', 'es_ES', 'it_IT', 'ar_AR', 'tt_RU');
        echo "<select name='fly_twitter_options[language]'>";
        foreach ($items as $language) {
            $selected = ($this->options['language'] === $language) ? 'selected = "selected"' : '';
            echo "<option value='$language' $selected>$language</option>";
        }
        echo "</select>";
    }
    public function fly_tw_show_img() {
        //$imgURL = plugins_url('fb_sidebar_slider/assets/css/fb-left.png');
        $img_url = array(
            'img1' => plugin_dir_url(__FILE__) . 'assets/img/ticon1.png',
            'img2' => plugin_dir_url(__FILE__) . 'assets/img/ticon2.png'
        );

        foreach ($img_url as $key => $value_tw):
            ?>
            <input id="<?php echo $key ?>" type="radio" name="fly_twitter_options[fly_tw_img_show]" value="<?php echo $value_tw; ?>"<?php if ($this->options['fly_tw_img_show'] == $value_tw) echo 'checked'; ?>> <label for="<?php echo $key ?>"><img  src="<?php echo $value_tw; ?>" alt="Icon"></label>

            <?php
        endforeach;
    }



}

add_action('admin_menu', 'fly_twitter_options_menu');

function fly_twitter_options_menu() {
    Fly_twitter_Sidebar::fly_twitter_sidebar_slider_menu();
}

add_action('admin_init', 'fly_twitter_object');

function fly_twitter_object() {
    new Fly_twitter_Sidebar();
}

add_action('wp_footer', 'fly_twitter_sidebar_footer');

function fly_twitter_sidebar_footer() {

    $o = get_option('fly_twitter_options');
    extract($o);
    $responsive_twitter ='';
    $responsive_twitter .= '<a class="twitter-timeline" 
                                href="'.$twitter_username.'" 
                                data-widget-id="'.$widget_id.'" 
                                data-height="'.$fly_tw_height.'" 
                                data-width="" 
                                data-theme="'.$position.'"
                                data-link-color="'.$link_color.'"
                                data-border-color="'.$border_color.'">
                                Tweets by @'. $twitter_username .'
                            </a>
            </div>';
    ?>

        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

    <div id="flyouttab">
        <div class="flyinset">
            <div id="tw_flybutton" style="left: 0px;top: <?php echo $icon; ?>px;"><img src="<?php echo $fly_tw_img_show; ?>"></div>
            <div id="tw_flyarea" style="left: -350px;top: <?php echo $icon; ?>px;">
                <div class="tw_close">X</div>
                <div class="form-area">
                    <?php echo $responsive_twitter; ?>
                </div>
				<div class="support" style="font-size: 9px;text-align: right;position: relative;top: -10px;margin-bottom: -15px;"><a href="http://hayesroofing.com/" target="_blank" style="color: #808080;" title="click here">Edmonds Roofer</a></div>
            </div>
        </div>
    </div>
    <?php
}

add_action('wp_enqueue_scripts', 'fly_twitter_sidebar_css_register');

function fly_twitter_sidebar_css_register() {
    wp_enqueue_style('fly_twitter_sidebar_css', plugins_url('assets/css/style.css', __FILE__));
}

add_action('wp_enqueue_scripts', 'fly_twitter_sidebar_script_register');

function fly_twitter_sidebar_script_register() {

    wp_enqueue_script('fly_twitter_sidebar_js', plugins_url('assets/js/main.js', __FILE__), array('jquery'));
    
}

add_action( 'admin_enqueue_scripts', 'fly_enqueue_color_picker' );
function fly_enqueue_color_picker() {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'Fly_twitter_Sidebar_cl_js', plugins_url('assets/js/color.js', __FILE__ ), array( 'wp-color-picker' ), '', true );
}
