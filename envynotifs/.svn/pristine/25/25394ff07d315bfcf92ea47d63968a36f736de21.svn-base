<?php

// Global Settings
if ( ! function_exists( 'envy_notifs_global_settings' ) ) :

    function envy_notifs_global_settings() {

        // Position Options
        add_settings_section("position_section", __('Position Options', 'envy-notifs'), null, "envy_notifs_general_options");

        add_settings_field("select-global-position", __('Select Notification Position', 'envy-notifs'), "envy_notifs_position_function_display", "envy_notifs_general_options", "position_section");  

        add_settings_field("select-single-position", __('Where You Want to Show?', 'envy-notifs'), "envy_notifs_position_single_function_display", "envy_notifs_general_options", "position_section");

        add_settings_field("select-left-right-position", __('Left & Right Sidebar Position', 'envy-notifs'), "envy_notifs_left_right_position_display", "envy_notifs_general_options", "position_section");

        add_settings_field("notifs-mobile-hide", __('Notice Hide on Mobile Devices', 'envy-notifs'), "envy_notifs_mobile_display", "envy_notifs_general_options", "position_section"); 

        register_setting("position_section", "new_settings");

        // Date & Time Options
        add_settings_section("date_section", __('Date/Time Options', 'envy-notifs'), null, "envy_notifs_general_options"); 

        add_settings_field("date-notice", __('Date/Time Instructions:', 'envy-notifs'), "envy_notifs_date_notice_display", "envy_notifs_general_options", "date_section");
        
        add_settings_field("select-start-date", __('Start Date for Notice', 'envy-notifs'), "envy_notifs_start_date_function_display", "envy_notifs_general_options", "date_section"); 
        add_settings_field("select-end-date", __('End Date for Notice', 'envy-notifs'), "envy_notifs_end_date_function_display", "envy_notifs_general_options", "date_section"); 

        add_settings_field("select-start-time", __('Start Time for Notice', 'envy-notifs'), "envy_notifs_start_time_function_display", "envy_notifs_general_options", "date_section"); 
        add_settings_field("select-end-time", __('End Time for Notice', 'envy-notifs'), "envy_notifs_end_time_function_display", "envy_notifs_general_options", "date_section"); 

        register_setting("date_section", "new_settings");

        // Content Options 
        add_settings_section("content_section", __('Content Options', 'envy-notifs'), null, "envy_notifs_general_options");

        add_settings_field("notifs-scroll-show", __('Notice Scrolling Enabled', 'envy-notifs'), "envy_notifs_scroll_display", "envy_notifs_general_options", "content_section");

        add_settings_field("notifs-bar-font-size", __('Notice Font Size', 'envy-notifs'), "envy_notifs_font_size_display", "envy_notifs_general_options", "content_section");

        add_settings_field("notifs-bar-font-weight", __('Notice Font Weight', 'envy-notifs'), "envy_notifs_font_weight_display", "envy_notifs_general_options", "content_section");

        add_settings_field("notifs-bar-btn-text", __('Button Text', 'envy-notifs'), "envy_notifs_btn_display", "envy_notifs_general_options", "content_section"); 

        add_settings_field("notifs-bar-btn-border", __('Button Border Radius', 'envy-notifs'), "envy_notifs_btn_border_display", "envy_notifs_general_options", "content_section"); 

        add_settings_field("notifs-bar-icon-size", __('Icon Font Size', 'envy-notifs'), "envy_notifs_icon_size_display", "envy_notifs_general_options", "content_section");

        add_settings_field("notifs-bar-icon-class", __('Icon Class', 'envy-notifs'), "envy_notifs_icon_display", "envy_notifs_general_options", "content_section");

        add_settings_field("notifs-bar-icon-border", __('Icon Border Radius', 'envy-notifs'), "envy_notifs_icon_border_display", "envy_notifs_general_options", "content_section"); 
        
        // Subscribe Options
        add_settings_field("notifs-bar-subscribe-title", __('Subscribe Title', 'envy-notifs'), "envy_notifs_subscribe_title_display", "envy_notifs_general_options", "content_section");

        add_settings_field("notifs-bar-subscribe", __('Subscribe Form Shortcode', 'envy-notifs'), "envy_notifs_subscribe_display", "envy_notifs_general_options", "content_section");

        add_settings_field("shortcode-notice", __('Recommended Plugin:', 'envy-notifs'), "envy_notifs_shortcode_notice_display", "envy_notifs_general_options", "content_section");
        
        register_setting("content_section", "new_settings");

        // Social Options
        add_settings_section("social_section", __('Social Options', 'envy-notifs'), null, "envy_notifs_social_options");

        add_settings_field("notifs-bar-social-title", __('Social Title', 'envy-notifs'), "envy_notifs_social_title_display", "envy_notifs_social_options", "social_section");

        add_settings_field("facebook-display", __('Facebook Link:', 'envy-notifs'), "envy_notifs_social_facebook_display", "envy_notifs_social_options", "social_section"); 
        add_settings_field("twitter-display", __('Twitter Link:', 'envy-notifs'), "envy_notifs_social_twitter_display", "envy_notifs_social_options", "social_section"); 

        add_settings_field("instagram-display", __('Instagram Link:', 'envy-notifs'), "envy_notifs_social_instagram_display", "envy_notifs_social_options", "social_section");

        add_settings_field("linkedin-display", __('Linkedin Link:', 'envy-notifs'), "envy_notifs_social_linkedin_display", "envy_notifs_social_options", "social_section");

        add_settings_field("skype-display", __('Skype Link:', 'envy-notifs'), "envy_notifs_social_skype_display", "envy_notifs_social_options", "social_section");

        register_setting("social_section", "new_settings");
        
        // Color Options 
        add_settings_section("color_section", __('Color Options', 'envy-notifs'), null, "envy_notifs_color_options");

        add_settings_field("notifs-bar-bg-color", __('Notifs Bar Background Color', 'envy-notifs'), "envy_notifs_bg_color_display", "envy_notifs_color_options", "color_section"); 

        add_settings_field("notifs-bar-font-color", __('Notifs Bar Font Color', 'envy-notifs'), "envy_notifs_font_color_display", "envy_notifs_color_options", "color_section");

        add_settings_field("notifs-btn-bg-color", __('Notifs Button Background Color', 'envy-notifs'), "envy_notifs_btn_bg_color_display", "envy_notifs_color_options", "color_section");

        add_settings_field("notifs-btn-bg-hover-color", __('Notifs Button Background Hover Color', 'envy-notifs'), "envy_notifs_btn_bg_hover_color_display", "envy_notifs_color_options", "color_section"); 

        add_settings_field("notifs-btn-font-color", __('Notifs Button Font Color', 'envy-notifs'), "envy_notifs_btn_font_color_display", "envy_notifs_color_options", "color_section");

        add_settings_field("notifs-btn-font-hover-color", __('Notifs Button Font Hover Color', 'envy-notifs'), "envy_notifs_btn_font_hover_color_display", "envy_notifs_color_options", "color_section");

        add_settings_field("notifs-icon-bg-color", __('Notifs Close Icon Background Color', 'envy-notifs'), "envy_notifs_icon_bg_color_display", "envy_notifs_color_options", "color_section");

        add_settings_field("notifs-icon-bg-hover-color", __('Notifs Close Icon Background Hover Color', 'envy-notifs'), "envy_notifs_icon_bg_hover_color_display", "envy_notifs_color_options", "color_section"); 

        add_settings_field("notifs-icon-font-color", __('Notifs Close Icon Font Color', 'envy-notifs'), "envy_notifs_icon_font_color_display", "envy_notifs_color_options", "color_section");

        add_settings_field("notifs-icon-font-hover-color", __('Notifs Close Icon Font Hover Color', 'envy-notifs'), "envy_notifs_icon_font_hover_color_display", "envy_notifs_color_options", "color_section");

        add_settings_field("notifs-open-icon-bg-color", __('Notifs Open Icon Background Color', 'envy-notifs'), "envy_notifs_open_icon_bg_color_display", "envy_notifs_color_options", "color_section");

        add_settings_field("notifs-open-icon-font-color", __('Notifs Open Icon Font Color', 'envy-notifs'), "envy_notifs_open_icon_font_color_display", "envy_notifs_color_options", "color_section");

        register_setting("color_section", "new_settings");
    }

endif;

add_action("admin_init", "envy_notifs_global_settings");

// Position Display
function envy_notifs_position_function_display() {
    $notifs_bar_position = (array)get_option('new_settings');
    if( isset( $notifs_bar_position['select-global-position'] ) ) : 
      $notifs_bar_position_new = $notifs_bar_position['select-global-position'];
    endif; ?>
    <select name="new_settings[select-global-position]">
      <option value="none" <?php if(isset($notifs_bar_position_new)) : selected($notifs_bar_position_new, "none"); endif; ?>><?php echo esc_html__('None', 'envy-notifs'); ?></option>
      <option value="top" <?php if(isset($notifs_bar_position_new)) : selected($notifs_bar_position_new, "top"); endif; ?>><?php echo esc_html__('Top', 'envy-notifs'); ?></option>
      <option value="bottom" <?php if(isset($notifs_bar_position_new)) : selected($notifs_bar_position_new, "bottom"); endif; ?>><?php echo esc_html__('Bottom', 'envy-notifs'); ?></option>
      <option value="leftside" <?php if(isset($notifs_bar_position_new)) : selected($notifs_bar_position_new, "leftside"); endif; ?>><?php echo esc_html__('Leftside', 'envy-notifs'); ?></option>
      <option value="rightside" <?php if(isset($notifs_bar_position_new)) : selected($notifs_bar_position_new, "rightside"); endif; ?>><?php echo esc_html__('Rightside', 'envy-notifs'); ?></option>
      <option value="popup" <?php if(isset($notifs_bar_position_new)) : selected($notifs_bar_position_new, "popup"); endif; ?>><?php echo esc_html__('Popup', 'envy-notifs'); ?></option>
    </select>
    <?php
}

// Individual Display
function envy_notifs_position_single_function_display() {
    $notifs_bar_single = (array)get_option('new_settings');
    if( isset( $notifs_bar_single['select-single-position'] ) ) :
      $notifs_bar_single_new = $notifs_bar_single['select-single-position'];
    endif; ?>
    <select name="new_settings[select-single-position]">
      <option value="all" <?php if(isset($notifs_bar_single_new )) : selected($notifs_bar_single_new, "all"); endif; ?>><?php echo esc_html__('All', 'envy-notifs'); ?></option>
      <option value="home" <?php if(isset($notifs_bar_single_new )) : selected($notifs_bar_single_new, "home"); endif; ?>><?php echo esc_html__('Home', 'envy-notifs'); ?></option>
      <option value="pages" <?php if(isset($notifs_bar_single_new )) : selected($notifs_bar_single_new, "pages"); endif; ?>><?php echo esc_html__('Pages', 'envy-notifs'); ?></option>
      <option value="posts" <?php if(isset($notifs_bar_single_new )) : selected($notifs_bar_single_new, "posts"); endif; ?>><?php echo esc_html__('Posts', 'envy-notifs'); ?></option>
    </select>
<?php }

// Left & Right Sidebar Position Display
function envy_notifs_left_right_position_display() {
    $notifs_left_right_position = (array)get_option('new_settings');
    if( isset( $notifs_left_right_position['select-left-right-position'] ) ) :
      $notifs_left_right_position_new = $notifs_left_right_position['select-left-right-position'];
    endif; ?>
    <select name="new_settings[select-left-right-position]">
      <option value="inside-window" <?php if(isset($notifs_left_right_position_new)) : selected($notifs_left_right_position_new, "inside-window"); endif; ?>><?php echo esc_html__('Inside Window', 'envy-notifs'); ?></option>
      <option value="outside-window" <?php if(isset($notifs_left_right_position_new)) : selected($notifs_left_right_position_new, "outside-window"); endif; ?>><?php echo esc_html__('Ouside Window', 'envy-notifs'); ?></option>
    </select>
<?php }

// Mobile Display
function envy_notifs_mobile_display() {
    $notifs_bar_mobile_hide = (array)get_option('new_settings');
    if( isset( $notifs_bar_mobile_hide['notifs-mobile-hide'] ) ) :
      $notifs_bar_mobile_hide_new = $notifs_bar_mobile_hide['notifs-mobile-hide'];
    else:
      $notifs_bar_mobile_hide_new = '';
    endif; ?>
    <?php 
    echo __('<input type="checkbox" name="new_settings[notifs-mobile-hide]" value="1" '.checked(1, $notifs_bar_mobile_hide_new, false).' >', 'envy-notifs').__('Hide', 'envy-notifs');
    ?>
<?php }

// Timezone Display
function envy_notifs_date_notice_display() {
    echo __('Before set your date & time, you should set your timezone from'.'<br>'.'<b><a href="options-general.php">Settings - General - Timezone - Set your country</b></a>', 'envy-notifs');
}

// Start Date Display
function envy_notifs_start_date_function_display() {
    $notifs_bar_start_date = (array)get_option('new_settings');
    if( isset( $notifs_bar_start_date['select-start-date'] ) ) :
      $notifs_bar_start_date_new = $notifs_bar_start_date['select-start-date'];
    endif; ?>
    <input type="date" id="startDate" name="<?php echo esc_attr( 'new_settings[select-start-date]' ); ?>" value="<?php if( isset( $notifs_bar_start_date_new ) ) : echo esc_attr( $notifs_bar_start_date_new ); endif; ?>" class="regular-text"><br/><br/>
    <?php echo esc_html__("N.B: Before Today's Date Is Not Valid", "envy-notifs"); ?>
<?php }

// End Date Display
function envy_notifs_end_date_function_display() {
    $notifs_bar_end_date = (array)get_option('new_settings');
    if( isset( $notifs_bar_end_date['select-end-date'] ) ) :
      $notifs_bar_end_date_new = $notifs_bar_end_date['select-end-date'];
    endif; ?>
    <input type="date" id="endDate" name="<?php echo esc_attr( 'new_settings[select-end-date]' ); ?>" value="<?php if( isset( $notifs_bar_end_date_new ) ) : echo esc_attr( $notifs_bar_end_date_new ); endif; ?>" class="regular-text"><br/><br/>
    <?php echo esc_html__("N.B: Before Today's Date Is Not Valid", "envy-notifs"); ?>
<?php }

// Start Time Display
function envy_notifs_start_time_function_display() {
    $notifs_bar_start_time = (array)get_option('new_settings');
    if( isset( $notifs_bar_start_time['select-start-time'] ) ) :
      $notifs_bar_start_time_new = $notifs_bar_start_time['select-start-time'];
    endif; ?>
    <input type="time" name="<?php echo esc_attr( 'new_settings[select-start-time]' ); ?>" value="<?php if( isset( $notifs_bar_start_time_new ) ) : echo esc_attr( $notifs_bar_start_time_new ); endif; ?>" class="regular-text"><br/><br/> <?php echo esc_html__ ('N.B: Select Specific Time as Your Local Time.', 'envy-notifs'); ?>
<?php }

// End Time Display
function envy_notifs_end_time_function_display() {
    $notifs_bar_end_time = (array)get_option('new_settings');
    if( isset( $notifs_bar_end_time['select-end-time'] ) ) : 
      $notifs_bar_end_time_new = $notifs_bar_end_time['select-end-time'];
    endif; ?>
    <input type="time" name="<?php echo esc_attr('new_settings[select-end-time]'); ?>" value="<?php if( isset( $notifs_bar_end_time_new ) ) : echo esc_attr( $notifs_bar_end_time_new ); endif; ?>" class="regular-text"><br/><br/> <?php echo esc_html__ ('N.B: Select Specific Time as Your Local Time.', 'envy-notifs'); ?>
<?php }

// Scroll Display
function envy_notifs_scroll_display() {
    $notifs_bar_scroll_show = (array)get_option('new_settings');
    if( isset( $notifs_bar_scroll_show['notifs-scroll-show'] ) ) :
        $notifs_bar_scroll_show_new = $notifs_bar_scroll_show['notifs-scroll-show'];
    else:
        $notifs_bar_scroll_show_new = '';
    endif;
    echo __('<input type="checkbox" name="new_settings[notifs-scroll-show]" value="1" '.checked(1, $notifs_bar_scroll_show_new, false).' >', 'envy-notifs').__('Enable', 'envy-notifs');
    ?>
<?php }

// Font Size Display
function envy_notifs_font_size_display() {
    $notifs_bar_font_size = (array)get_option('new_settings');
    if( isset($notifs_bar_font_size['notifs-bar-font-size']) ) :
      $notifs_bar_font_size_new = $notifs_bar_font_size['notifs-bar-font-size'];
    endif; ?>
    <input type="text" placeholder="20px" name="<?php echo esc_attr( 'new_settings[notifs-bar-font-size]' ); ?>" value="<?php if( isset( $notifs_bar_font_size_new ) ) : echo esc_attr( $notifs_bar_font_size_new ); else : echo esc_html__('20px', 'envy-notifs'); endif; ?>" class="regular-text">
<?php }

// Font Weight Display
function envy_notifs_font_weight_display() {
    $notifs_bar_font_weight = (array)get_option('new_settings');
    if( isset($notifs_bar_font_weight['notifs-bar-font-weight']) ) :
      $notifs_bar_font_weight_new = $notifs_bar_font_weight['notifs-bar-font-weight'];
    endif; ?>
    <input type="text" placeholder="600" name="<?php echo esc_attr( 'new_settings[notifs-bar-font-weight]' ); ?>" value="<?php if( isset( $notifs_bar_font_weight_new ) ) : echo esc_attr( $notifs_bar_font_weight_new ); else : echo esc_html__('600', 'envy-notifs'); endif; ?>" class="regular-text">
<?php }

// Button Display
function envy_notifs_btn_display() {
    $notifs_bar_btn_text = (array)get_option('new_settings');
    if( isset( $notifs_bar_btn_text['notifs-bar-btn-text'] ) ) :
      $notifs_bar_btn_text_new = $notifs_bar_btn_text['notifs-bar-btn-text'];
    endif; ?>
    <input type="text" placeholder="Read More" name="<?php echo esc_attr( 'new_settings[notifs-bar-btn-text]' ); ?>"value="<?php if( isset( $notifs_bar_btn_text_new ) ) : echo esc_attr( $notifs_bar_btn_text_new ); else : echo esc_html__('Read More', 'envy-notifs'); endif; ?>" class="regular-text">
<?php }

// Button Border Display
function envy_notifs_btn_border_display() {
    $notifs_bar_btn_border = (array)get_option('new_settings');
    if( isset( $notifs_bar_btn_border['notifs-bar-btn-border'] ) ) :
      $notifs_bar_btn_border_new = $notifs_bar_btn_border['notifs-bar-btn-border'];
    endif; ?>
    <input type="text" placeholder="4px" name="<?php echo esc_attr( 'new_settings[notifs-bar-btn-border]' ); ?>" value="<?php if( isset( $notifs_bar_btn_border_new ) ) : echo esc_attr( $notifs_bar_btn_border_new ); else : echo esc_html__('4px', 'envy-notifs'); endif; ?>" class="regular-text">
<?php }

// Icon Display
function envy_notifs_icon_display() {
    $notifs_bar_icon_class = (array)get_option('new_settings');
    if( isset( $notifs_bar_icon_class['notifs-bar-icon-class'] ) ) :
      $notifs_bar_icon_class_new = $notifs_bar_icon_class['notifs-bar-icon-class'];
    endif;  ?>   
    <input type="text" placeholder="fa fa-times" name="<?php echo esc_attr( 'new_settings[notifs-bar-icon-class]' ); ?>" value="<?php if( isset( $notifs_bar_icon_class_new ) ) : echo esc_attr( $notifs_bar_icon_class_new ); else : echo esc_html__('fa fa-times'); endif; ?>" class="regular-text">
<?php }

// Icon Size Display
function envy_notifs_icon_size_display() {
    $notifs_bar_icon_size = (array)get_option('new_settings');
    if( isset( $notifs_bar_icon_size['notifs-bar-icon-size'] ) ) :
        $notifs_bar_icon_size_new = $notifs_bar_icon_size['notifs-bar-icon-size']; 
    endif; ?>  
    <input type="text" placeholder="15px" name="<?php echo esc_attr( 'new_settings[notifs-bar-icon-size]' ); ?>" value="<?php if( isset( $notifs_bar_icon_size_new ) ) : echo esc_attr( $notifs_bar_icon_size_new ); else : echo esc_html__('15px', 'envy-notifs'); endif; ?>" class="regular-text">'
<?php }

// Icon Border Display
function envy_notifs_icon_border_display() {
    $notifs_bar_icon_border = (array)get_option('new_settings');
    if( isset( $notifs_bar_icon_border['notifs-bar-icon-border'] ) ) :
        $notifs_bar_icon_border_new = $notifs_bar_icon_border['notifs-bar-icon-border'];
    endif; ?>
    <input type="text" placeholder="4px" name="<?php echo esc_attr( 'new_settings[notifs-bar-icon-border]' ); ?>" value="<?php if( isset( $notifs_bar_icon_border_new ) ) : echo esc_attr( $notifs_bar_icon_border_new ); else : echo esc_html__('4px', 'envy-notifs'); endif; ?>" class="regular-text">
<?php }

// Subscriber Title Display
function envy_notifs_subscribe_title_display() {
    $notifs_bar_subscribe_title = (array)get_option('new_settings');
    if( isset( $notifs_bar_subscribe_title['notifs-bar-subscribe-title'] ) ) :
        $notifs_bar_subscribe_title_new = $notifs_bar_subscribe_title['notifs-bar-subscribe-title'];
    endif; ?>
    <input type="text" placeholder="Write title here..." name="<?php echo esc_attr( 'new_settings[notifs-bar-subscribe-title]' ); ?>" value="<?php if( isset( $notifs_bar_subscribe_title_new ) ) : echo esc_attr( $notifs_bar_subscribe_title_new ); else : echo esc_html__('Subscribe:', 'envy-notifs'); endif; ?>" class="regular-text">
<?php }

// Subscriber Display
function envy_notifs_subscribe_display() {
    $notifs_bar_subscribe = (array)get_option('new_settings');
    if( isset( $notifs_bar_subscribe['notifs-bar-subscribe'] ) ) :
        $notifs_bar_subscribe_new = $notifs_bar_subscribe['notifs-bar-subscribe'];
    endif; ?>
    <input type="text" placeholder="Write shortcode here..." name="<?php echo esc_attr( 'new_settings[notifs-bar-subscribe]' ); ?>" value="<?php if( isset( $notifs_bar_subscribe_new ) ) : echo esc_attr( $notifs_bar_subscribe_new ); endif; ?>" class="regular-text">
<?php }

// Subscriber Notice Display
function envy_notifs_shortcode_notice_display() {
    echo __('We recommended to use Mailchimp for WordPress Plugin For Subsrcibe'.'<br>'.'<b><a href="https://wordpress.org/plugins/mailchimp-for-wp">MC4WP: Mailchimp for WordPress</b></a>', 'envy-notifs');
}

// Social Title Display
function envy_notifs_social_title_display() {
    $notifs_bar_social_title = (array)get_option('new_settings');
    if( isset( $notifs_bar_social_title['notifs-bar-social-title'] ) ) :
        $notifs_bar_social_title_new = $notifs_bar_social_title['notifs-bar-social-title'];
    endif; ?>
    <input type="text" placeholder="Write title here..." name="<?php echo esc_attr( 'new_settings[notifs-bar-social-title]' ); ?>" value="<?php if( isset( $notifs_bar_social_title_new ) ) : echo esc_attr( $notifs_bar_social_title_new ); endif; ?>" class="regular-text">
<?php }

function envy_notifs_social_facebook_display() {
    $notifs_bar_social_facebook = (array)get_option('new_settings');
    if( isset( $notifs_bar_social_facebook['facebook-display'] ) ) :
        $notifs_bar_social_facebook_new = $notifs_bar_social_facebook['facebook-display'];
    endif; ?>
    <input type="text" placeholder="Write social link here..." name="<?php echo esc_attr( 'new_settings[facebook-display]' ); ?>" value="<?php if( isset( $notifs_bar_social_facebook_new ) ) : echo esc_attr( $notifs_bar_social_facebook_new ); endif; ?>" class="regular-text">
<?php }

function envy_notifs_social_twitter_display() {
    $notifs_bar_social_twitter = (array)get_option('new_settings');
    if( isset( $notifs_bar_social_twitter['twitter-display'] ) ) :
        $notifs_bar_social_twitter_new = $notifs_bar_social_twitter['twitter-display'];
    endif; ?>
    <input type="text" placeholder="Write social link here..." name="<?php echo esc_attr( 'new_settings[twitter-display]' ); ?>" value="<?php if( isset( $notifs_bar_social_twitter_new ) ) : echo esc_attr( $notifs_bar_social_twitter_new ); endif; ?>" class="regular-text">
<?php }

function envy_notifs_social_instagram_display() {
    $notifs_bar_social_instagram = (array)get_option('new_settings');
    if( isset( $notifs_bar_social_instagram['instagram-display'] ) ) :
        $notifs_bar_social_instagram_new = $notifs_bar_social_instagram['instagram-display'];
    endif; ?>
    <input type="text" placeholder="Write social link here..." name="<?php echo esc_attr( 'new_settings[instagram-display]' ); ?>" value="<?php if( isset( $notifs_bar_social_instagram_new ) ) : echo esc_attr( $notifs_bar_social_instagram_new ); endif; ?>" class="regular-text">
<?php }

function envy_notifs_social_linkedin_display() {
    $notifs_bar_social_linkedin = (array)get_option('new_settings');
    if( isset( $notifs_bar_social_linkedin['linkedin-display'] ) ) :
        $notifs_bar_social_linkedin_new = $notifs_bar_social_linkedin['linkedin-display'];
    endif; ?>
    <input type="text" placeholder="Write social link here..." name="<?php echo esc_attr( 'new_settings[linkedin-display]' ); ?>" value="<?php if( isset( $notifs_bar_social_linkedin_new ) ) : echo esc_attr( $notifs_bar_social_linkedin_new ); endif; ?>" class="regular-text">
<?php }

function envy_notifs_social_skype_display() {
    $notifs_bar_social_skype = (array)get_option('new_settings');
    if( isset( $notifs_bar_social_skype['skype-display'] ) ) :
        $notifs_bar_social_skype_new = $notifs_bar_social_skype['skype-display'];
    endif; ?>
    <input type="text" placeholder="Write social link here..." name="<?php echo esc_attr( 'new_settings[skype-display]' ); ?>" value="<?php if( isset( $notifs_bar_social_skype_new ) ) : echo esc_attr( $notifs_bar_social_skype_new ); endif; ?>" class="regular-text">
<?php }

// Background Color Display
function envy_notifs_bg_color_display() {
    $notifs_bar_bg_color = (array)get_option('new_settings');
    if( isset( $notifs_bar_bg_color['notifs-bar-bg-color'] ) ) :
      $notifs_bar_bg_color_new = $notifs_bar_bg_color['notifs-bar-bg-color'];
    endif; ?>
    <input type="color" placeholder="#DD3333" name="<?php echo esc_attr( 'new_settings[notifs-bar-bg-color]' ); ?>" value="<?php if( isset( $notifs_bar_bg_color_new ) ) : echo esc_attr( $notifs_bar_bg_color_new ); else : echo esc_html__('#DD3333'); endif; ?>" class="regular-text">
<?php }

// Font Color Display
function envy_notifs_font_color_display() {
    $notifs_bar_font_color = (array)get_option('new_settings');
    if( isset( $notifs_bar_font_color['notifs-bar-font-color'] ) ) : 
      $notifs_bar_font_color_new = $notifs_bar_font_color['notifs-bar-font-color'];
    endif; ?>
    <input type="color" placeholder="#FFFFFF" name="<?php echo esc_attr( 'new_settings[notifs-bar-font-color]' ); ?>" value="<?php if( isset( $notifs_bar_font_color_new ) ) : echo esc_attr( $notifs_bar_font_color_new ); else : echo esc_html__('#FFFFFF'); endif; ?>" class="regular-text">
<?php }

// Button Background Color Display
function envy_notifs_btn_bg_color_display() {
    $notifs_btn_bg_color = (array)get_option('new_settings');
    if( isset( $notifs_btn_bg_color['notifs-btn-bg-color'] ) ) : 
      $notifs_btn_bg_color_new = $notifs_btn_bg_color['notifs-btn-bg-color'];
    endif; ?>
    <input type="color" placeholder="#0000FF" name="<?php echo esc_attr( 'new_settings[notifs-btn-bg-color]' ); ?>" value="<?php if( isset( $notifs_btn_bg_color_new ) ) : echo esc_attr( $notifs_btn_bg_color_new ); else : echo esc_html__('#0000FF'); endif; ?>" class="regular-text">
<?php }

// Button Background Hover Color Display
function envy_notifs_btn_bg_hover_color_display() {
    $notifs_btn_bg_hover_color = (array)get_option('new_settings');
    if( isset( $notifs_btn_bg_hover_color['notifs-btn-bg-hover-color'] ) ) : 
      $notifs_btn_bg_hover_color_new = $notifs_btn_bg_hover_color['notifs-btn-bg-hover-color'];
    endif; ?>
    <input type="color" placeholder="#FFFFFF" name="<?php echo esc_attr( 'new_settings[notifs-btn-bg-hover-color]' ); ?>" value="<?php if( isset( $notifs_btn_bg_hover_color_new ) ) : echo esc_attr( $notifs_btn_bg_hover_color_new ); else : echo esc_html__('#FFFFFF'); endif; ?>" class="regular-text">
<?php }

// Button Font Color Display
function envy_notifs_btn_font_color_display() {
    $notifs_btn_font_color = (array)get_option('new_settings');
    if( isset( $notifs_btn_font_color['notifs-btn-font-color'] ) ) :
      $notifs_btn_font_color_new = $notifs_btn_font_color['notifs-btn-font-color'];
    endif; ?>
    <input type="color" placeholder="#FFFFFF" name="<?php echo esc_attr( 'new_settings[notifs-btn-font-color]' ); ?>" value="<?php if( isset( $notifs_btn_font_color_new ) ) : echo esc_attr( $notifs_btn_font_color_new ); else : echo esc_html__('#FFFFFF'); endif; ?>" class="regular-text">
<?php }

// Button Font Hover Color Display
function envy_notifs_btn_font_hover_color_display() {
    $notifs_btn_font_hover_color = (array)get_option('new_settings');
    if( isset( $notifs_btn_font_hover_color['notifs-btn-font-hover-color'] ) ) :
      $notifs_btn_font_hover_color_new = $notifs_btn_font_hover_color['notifs-btn-font-hover-color'];
    endif; ?>
    <input type="color" placeholder="#0000FF" name="<?php echo esc_attr( 'new_settings[notifs-btn-font-hover-color]' ); ?>" value="<?php if( isset( $notifs_btn_font_hover_color_new ) ) : echo esc_attr( $notifs_btn_font_hover_color_new ); else : echo esc_html__('#0000FF'); endif; ?>" class="regular-text">
<?php }

// Icon Background Color Display
function envy_notifs_icon_bg_color_display() {
    $notifs_icon_bg_color = (array)get_option('new_settings');
    if( isset( $notifs_icon_bg_color['notifs-icon-bg-color'] ) ) :
      $notifs_icon_bg_color_new = $notifs_icon_bg_color['notifs-icon-bg-color'];
    endif; ?>
    <input type="color" placeholder="#FFFFFF" name="<?php echo esc_attr( 'new_settings[notifs-icon-bg-color]' ); ?>" value="<?php if( isset( $notifs_icon_bg_color_new ) ) : echo esc_attr( $notifs_icon_bg_color_new ); else : echo esc_html__('#FFFFFF'); endif; ?>" class="regular-text">
<?php }

// Icon Background Hover Color Display
function envy_notifs_icon_bg_hover_color_display() {
    $notifs_icon_bg_hover_color = (array)get_option('new_settings');
    if( isset( $notifs_icon_bg_hover_color['notifs-icon-bg-hover-color'] ) ) :
      $notifs_icon_bg_hover_color_new = $notifs_icon_bg_hover_color['notifs-icon-bg-hover-color'];
    endif; ?>
    <input type="color" placeholder="#1A82A4" name="<?php echo esc_attr( 'new_settings[notifs-icon-bg-hover-color]' ); ?>" value="<?php if( isset( $notifs_icon_bg_hover_color_new ) ) : echo esc_attr( $notifs_icon_bg_hover_color_new ); else : echo esc_html__('#1A82A4'); endif; ?>" class="regular-text">
<?php }

// Icon Font Color Display
function envy_notifs_icon_font_color_display() {
    $notifs_icon_font_color = (array)get_option('new_settings');
    if( isset( $notifs_icon_font_color['notifs-icon-font-color'] ) ) :
      $notifs_icon_font_color_new = $notifs_icon_font_color['notifs-icon-font-color'];
    endif; ?>
    <input type="color" placeholder="#1A82A4" name="<?php echo esc_attr( 'new_settings[notifs-icon-font-color]' ); ?>" value="<?php if( isset( $notifs_icon_font_color_new ) ) : echo esc_attr( $notifs_icon_font_color_new ); else : echo esc_html__('#1A82A4'); endif; ?>" class="regular-text">
<?php }

// Icon Font Hover Color Display
function envy_notifs_icon_font_hover_color_display() {
    $notifs_icon_font_hover_color = (array)get_option('new_settings');
    if( isset( $notifs_icon_font_hover_color['notifs-icon-font-hover-color'] ) ) :
      $notifs_icon_font_hover_color_new = $notifs_icon_font_hover_color['notifs-icon-font-hover-color'];
    endif; ?>
    <input type="color" placeholder="#FFFFFF" name="<?php echo esc_attr( 'new_settings[notifs-icon-font-hover-color]' ); ?>" value="<?php if( isset( $notifs_icon_font_hover_color_new ) ) : echo esc_attr( $notifs_icon_font_hover_color_new ); else : echo esc_html__('#FFFFFF'); endif; ?>" class="regular-text">
<?php }

// Open Icon Background Color Display
function envy_notifs_open_icon_bg_color_display() {
    $notifs_open_icon_bg_color = (array)get_option('new_settings');
    if( isset( $notifs_open_icon_bg_color['notifs-open-icon-bg-color'] ) ) :
        $notifs_open_icon_bg_color_new = $notifs_open_icon_bg_color['notifs-open-icon-bg-color'];
    endif; ?>
    <input type="color" placeholder="#dd3333" name="<?php echo esc_attr( 'new_settings[notifs-open-icon-bg-color]' ); ?>" value="<?php if( isset( $notifs_open_icon_bg_color_new ) ) : echo esc_attr( $notifs_open_icon_bg_color_new ); else : echo esc_html__('#dd3333'); endif; ?>" class="regular-text">
<?php }

// Open Icon Font Color Display
function envy_notifs_open_icon_font_color_display() {
    $notifs_open_icon_font_color = (array)get_option('new_settings');
    if( isset( $notifs_open_icon_font_color['notifs-open-icon-font-color'] ) ) :
        $notifs_open_icon_font_color_new = $notifs_open_icon_font_color['notifs-open-icon-font-color'];
    endif; ?>
    <input type="color" placeholder="#FFFFFF" name="<?php echo esc_attr( 'new_settings[notifs-open-icon-font-color]' ); ?>" value="<?php if( isset( $notifs_open_icon_font_color_new ) ) : echo esc_attr( $notifs_open_icon_font_color_new ); else : echo esc_html__('#FFFFFF'); endif; ?>" class="regular-text">
<?php }

// Global Function
function envy_notifs_menu() {
    add_submenu_page("edit.php?post_type=envynotifs", __('Settings', 'envy-notifs'), __('Settings', 'envy-notifs'), "manage_options", "envy_notifs_options", "envy_notifs_plugin_menu_page");
}
 
add_action("admin_menu", "envy_notifs_menu");

function envy_notifs_plugin_menu_page() { ?>
    <div class="wrap">
        <?php settings_errors(); ?>
        <h1><?php echo esc_html__( 'Notification Bar Options', 'envy-notifs' ) ?></h1>
        <form method="POST" action="options.php">
            <?php
                do_settings_sections("envy_notifs_general_options");
                settings_fields("position_section");
                settings_fields("date_section");
                settings_fields("content_section");
                submit_button();
                do_settings_sections("envy_notifs_social_options");
                settings_fields("social_section");                
                submit_button();
                do_settings_sections("envy_notifs_color_options");
                settings_fields("color_section");                
                submit_button();
            ?>
        </form>
    </div>
<?php }
