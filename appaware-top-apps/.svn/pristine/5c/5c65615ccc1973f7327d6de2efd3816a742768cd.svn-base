<?php

/*
Plugin Name: AppAware Top Android Apps Widget
Plugin URI: http://appaware.com/widgets
Description: The AppAware Top Android Apps Widget allows to easily add top Android Apps to the Main Sidebar. Apps are shown with their featured graphics in a very visual way.
Version: 1.1
Author: AppAware team
Author URI: http://appaware.com
*/     

class AppAwareTopAppsWidget extends WP_Widget
{

    static $add_script = TRUE;

    function AppAwareTopAppsWidget()
    {

        global $wp_styles;

        $self = parent::WP_Widget(false, $name = 'AppAwareTopAppsWidget');

        $widget_ops = array('description' => __('Display the Top Apps from AppAware on Android'), 'classname' => 'appaware_top_apps_widget');
        $this->WP_Widget('appaware_top_apps', __('AppAware Top Android Apps'), $widget_ops);

        wp_register_script('aa-js', 'http://appaware.com/widgets/aa.js', null, null, false);
        wp_enqueue_script('aa-js');
    }

    function widget($args, $instance)
    {

        if (isset($instance['error']) && $instance['error'])
            return;

        extract($args);
        $width = $instance['width'];
        if (intval($width) < 100) {
            $width = 100;
        }
        $type = $instance['type'];
        $delta = $instance['delta'];
        $c = $instance['c'];
        $cc = $instance['cc'];

        $num = $instance['number'];
        if (intval($num) < 1) {
            $num = 1;
        }

        if (is_null($cc) || empty($cc)) {
            $cc = 'worldwide';
        } else {
            $cc = strtoupper($cc);
        }

        $lang = $instance['lang'];
        if (empty($lang)) {
            $lang = 'en-US';
        }else{
            $lang = strtolower($lang) . '-' . strtoupper($lang);
        }

        $url = 'http://appaware.com/top?t=' . $type . '&d=' . $delta . '&num=' . $num . '&cc=' . $cc . '&c=' . $c . '&lang=' . $lang;

 
        echo '<span style="width: ' . $width . 'px !important" class="appaware-top"><a href="' . $url . '">Top Android Apps by AppAware</a></span>';

    }


    function form($instance)
    {

        $width = esc_attr($instance['width']);
        if (intval($width) < 200) {
            $width = 200;
        }
        $type = esc_attr($instance['type']);
        if (empty($type)) {
            $type = 'popular';
        }
        $delta = esc_attr($instance['delta']);
        if (empty($delta)) {
            $delta = 'week';
        }
        $c = esc_attr($instance['c']);
        $cc = esc_attr($instance['cc']);
        if (!empty($cc)) {
            $type = 'country';
            $delta = 'week';
        }

        $lang = esc_attr($instance['lang']);
        if (empty($lang)) {
            $lang = 'en';
        }

        if (!$number = (int)$instance['number'])
            $number = 10;


        ?>
    <p><label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Widget Width (in px):'); ?></label>
        <input id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>"
               type="text" value="<?php echo $width; ?>" size="10"/></p>
    <p><label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Apps List:'); ?>
        <select class="widefat" id="<?php echo $this->get_field_id('type'); ?>"
                name="<?php echo $this->get_field_name('type') ?>">
            <option value="popular" <?= ($type == 'popular') ? 'selected' : ''?>>Popular</option>
            <option value="trending" <?= ($type == 'trending') ? 'selected' : ''?>>Trending</option>
            <option value="country" <?= ($type == 'country') ? 'selected' : ''?>>Country-Specific</option>
            <option value="paid" <?= ($type == 'paid') ? 'selected' : ''?>>Paid</option>
            <option value="installed" <?= ($type == 'installed') ? 'selected' : ''?>>Most Installed</option>
            <option value="updated" <?= ($type == 'updated') ? 'selected' : ''?>>Most Updated</option>
            <option value="removed" <?= ($type == 'removed') ? 'selected' : ''?>>Most Removed</option>
        </select></label></p>
    <p><label for="<?php echo $this->get_field_id('c'); ?>"><?php _e('Category:'); ?>
        <select class="widefat" id="<?php echo $this->get_field_id('c'); ?>"
                name="<?php echo $this->get_field_name('c'); ?>">
            <option value="0" <?= ($c == '0') ? 'selected' : ''?>>All Apps</option>
            <option value="1" <?= ($c == '1') ? 'selected' : ''?>>All Games</option>
            <option value="2" <?= ($c == '2') ? 'selected' : ''?>>Books & Reference</option>
            <option value="3" <?= ($c == '3') ? 'selected' : ''?>>Business</option>
            <option value="4" <?= ($c == '4') ? 'selected' : ''?>>Comics</option>
            <option value="5" <?= ($c == '5') ? 'selected' : ''?>>Communication</option>
            <option value="6" <?= ($c == '6') ? 'selected' : ''?>>Education</option>
            <option value="7" <?= ($c == '7') ? 'selected' : ''?>>Entertainment</option>
            <option value="8" <?= ($c == '8') ? 'selected' : ''?>>Finance</option>
            <option value="9" <?= ($c == '9') ? 'selected' : ''?>>Health & Fitness</option>
            <option value="10" <?= ($c == '10') ? 'selected' : ''?>>Lifestyle</option>
            <option value="11" <?= ($c == '11') ? 'selected' : ''?>>Media & Video</option>
            <option value="12" <?= ($c == '12') ? 'selected' : ''?>>Medical</option>
            <option value="13" <?= ($c == '13') ? 'selected' : ''?>>Music & Audio</option>
            <option value="14" <?= ($c == '14') ? 'selected' : ''?>>News & Magazines</option>
            <option value="15" <?= ($c == '15') ? 'selected' : ''?>>Personalization</option>
            <option value="16" <?= ($c == '16') ? 'selected' : ''?>>Photography</option>
            <option value="17" <?= ($c == '17') ? 'selected' : ''?>>Productivity</option>
            <option value="18" <?= ($c == '18') ? 'selected' : ''?>>Shopping</option>
            <option value="19" <?= ($c == '19') ? 'selected' : ''?>>Social</option>
            <option value="20" <?= ($c == '20') ? 'selected' : ''?>>Sports</option>
            <option value="21" <?= ($c == '21') ? 'selected' : ''?>>Tools</option>
            <option value="22" <?= ($c == '22') ? 'selected' : ''?>>Transportation</option>
            <option value="23" <?= ($c == '23') ? 'selected' : ''?>>Travel & Local</option>
            <option value="24" <?= ($c == '24') ? 'selected' : ''?>>Weather</option>
            <option value="25" <?= ($c == '25') ? 'selected' : ''?>>Libraries & Demo</option>
            <option value="26" <?= ($c == '26') ? 'selected' : ''?>>Arcade & Action</option>
            <option value="27" <?= ($c == '27') ? 'selected' : ''?>>Brain & Puzzle</option>
            <option value="28" <?= ($c == '28') ? 'selected' : ''?>>Cards & Casino</option>
            <option value="29" <?= ($c == '29') ? 'selected' : ''?>>Casual</option>
            <option value="30" <?= ($c == '30') ? 'selected' : ''?>>Racing</option>
            <option value="31" <?= ($c == '31') ? 'selected' : ''?>>Sports Games</option>


        </select>
    </label></p>

    <p><label for="<?php echo $this->get_field_id('cc'); ?>"><?php _e('Country Code'); ?></label>
        <input id="<?php echo $this->get_field_id('cc'); ?>" name="<?php echo $this->get_field_name('cc'); ?>"
               type="text" value="<?php echo $cc; ?>"/></p>


    <p><label for="<?php echo $this->get_field_id('delta'); ?>"><?php _e('Time interval:'); ?>
        <select class="widefat" id="<?php echo $this->get_field_id('delta'); ?>"
                name="<?php echo $this->get_field_name('delta'); ?>">
            <option value="hour" <?= ($delta == 'hour') ? 'selected' : ''?>>Hour</option>
            <option value="day" <?= ($delta == 'day') ? 'selected' : ''?>>Day</option>
            <option value="week" <?= ($delta == 'week') ? 'selected' : ''?>>Week</option>
            <option value="month" <?= ($delta == 'month') ? 'selected' : ''?>>Month</option>
        </select>
    </label></p>
    <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of apps:'); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>"
               type="text" value="<?php echo $number; ?>" size="10"/></p>

    <p><label for="<?php echo $this->get_field_id('lang'); ?>"><?php _e('Widget Language (country-code)'); ?></label>
        <input id="<?php echo $this->get_field_id('lang'); ?>" name="<?php echo $this->get_field_name('lang'); ?>"
               type="text" value="<?php echo $lang; ?>"/></p>

    <p>More widgets: <ul><li><a href="http://appaware.com/widgets" target="_blank">http://appaware.com/widgets</a></li><li><a href="http://playboard.me/widgets" target="_blank">http://playboard.me/widgets</a></li></ul></p>

    <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['width'] = strip_tags($new_instance['width']);
        $instance['type'] = strip_tags($new_instance['type']);
        $instance['delta'] = strip_tags($new_instance['delta']);
        $instance['cc'] = strip_tags($new_instance['cc']);
        $instance['c'] = strip_tags($new_instance['c']);
        $instance['lang'] = strip_tags($new_instance['lang']);

        if (!$number = (int)$new_instance['number'])
            $number = 10;
        $instance['number'] = $number;

        return $instance;
    }


}

add_action('widgets_init', create_function('', 'return register_widget("AppAwareTopAppsWidget");'));
