<?php

function Alobaidi_Gallery_settings_menu() {
    add_plugins_page('Alobaidi Gallery Settings', 'Alobaidi Gallery', 'manage_options', 'alobaidi_gallery_settings', 'Alobaidi_Gallery_settings_page');
}
add_action('admin_menu', 'Alobaidi_Gallery_settings_menu');


function Alobaidi_Gallery_settings_page(){
    ?>
        <div class="wrap">
            <h2>Alobaidi Gallery Settings</h2>
            <form method="post" action="options.php">
                <?php
                    settings_fields("alobaidi_gallery_settings_section");
                    do_settings_sections("alobaidi_gallery_settings");
                    submit_button();
                ?>
            </form>
            <div class="tool-box">
                <h3 class="title">Alobaidi Gallery Themes</h3>
                <p>Get <a href="http://wp-plugins.in/alobaidi_gallery_themes" target="_blank">Alobaidi Gallery themes</a> for $4.99 only!.</p>
                <h4 class="title">Recommended Links</h4>
                <p>Get collection of 87 WordPress themes for $69 only, a lot of features and free support! <a href="http://j.mp/ET_WPTime_ref_pl" target="_blank">Get it now</a>.</p>
                <p>See also:</p>
                    <ul>
                        <li><a href="http://j.mp/CM_WPTime" target="_blank">Premium WordPress themes on CreativeMarket.</a></li>
                        <li><a href="http://j.mp/TF_WPTime" target="_blank">Premium WordPress themes on Themeforest.</a></li>
                        <li><a href="http://j.mp/CC_WPTime" target="_blank">Premium WordPress plugins on Codecanyon.</a></li>
                    </ul>
                <p><a href="http://j.mp/ET_WPTime_ref_pl" target="_blank"><img src="<?php echo plugins_url( '/banner/570x100.jpg', __FILE__ ); ?>"></a></p>
            </div>
        </div>
    <?php
}


function Alobaidi_Gallery_settings(){
    add_settings_section('alobaidi_gallery_settings_section', false, false, 'alobaidi_gallery_settings');

	add_settings_field( "alobaidi_gallery_home", 'Full Website', "alobaidi_gallery_home_callback", "alobaidi_gallery_settings", "alobaidi_gallery_settings_section", array('label_for' => 'alobaidi_gallery_home') );
    register_setting( 'alobaidi_gallery_settings_section', 'alobaidi_gallery_home' );

	add_settings_field( "alobaidi_gallery_page", 'Gallery Page', "alobaidi_gallery_page_callback", "alobaidi_gallery_settings", "alobaidi_gallery_settings_section", array('label_for' => 'alobaidi_gallery_page') );
    register_setting( 'alobaidi_gallery_settings_section', 'alobaidi_gallery_page' );

	add_settings_field( "alobaidi_gallery_count", 'Count Images', "alobaidi_gallery_count_callback", "alobaidi_gallery_settings", "alobaidi_gallery_settings_section", array('label_for' => 'alobaidi_gallery_count') );
    register_setting( 'alobaidi_gallery_settings_section', 'alobaidi_gallery_count' );

	add_settings_field( "alobaidi_gallery_filter", 'Black And White', "alobaidi_gallery_filter_callback", "alobaidi_gallery_settings", "alobaidi_gallery_settings_section", array('label_for' => 'alobaidi_gallery_filter') );
    register_setting( 'alobaidi_gallery_settings_section', 'alobaidi_gallery_filter' );

    add_settings_field( "alobaidi_gallery_sitename", 'Gallery Name', "alobaidi_gallery_sitename_callback", "alobaidi_gallery_settings", "alobaidi_gallery_settings_section", array('label_for' => 'alobaidi_gallery_sitename') );
    register_setting( 'alobaidi_gallery_settings_section', 'alobaidi_gallery_sitename' );

    add_settings_field( "alobaidi_gallery_tagline", 'Gallery Tagline', "alobaidi_gallery_tagline_callback", "alobaidi_gallery_settings", "alobaidi_gallery_settings_section", array('label_for' => 'alobaidi_gallery_tagline') );
    register_setting( 'alobaidi_gallery_settings_section', 'alobaidi_gallery_tagline' );

    add_settings_field( "alobaidi_gallery_facebook", 'Facebook Link', "alobaidi_gallery_facebook_callback", "alobaidi_gallery_settings", "alobaidi_gallery_settings_section", array('label_for' => 'alobaidi_gallery_facebook') );
    register_setting( 'alobaidi_gallery_settings_section', 'alobaidi_gallery_facebook' );

    add_settings_field( "alobaidi_gallery_twitter", 'Twitter Link', "alobaidi_gallery_twitter_callback", "alobaidi_gallery_settings", "alobaidi_gallery_settings_section", array('label_for' => 'alobaidi_gallery_twitter') );
    register_setting( 'alobaidi_gallery_settings_section', 'alobaidi_gallery_twitter' );

    add_settings_field( "alobaidi_gallery_instagram", 'Instagram Link', "alobaidi_gallery_instagram_callback", "alobaidi_gallery_settings", "alobaidi_gallery_settings_section", array('label_for' => 'alobaidi_gallery_instagram') );
    register_setting( 'alobaidi_gallery_settings_section', 'alobaidi_gallery_instagram' );

    add_settings_field( "alobaidi_gallery_favicon", 'Favicon Link', "alobaidi_gallery_favicon_callback", "alobaidi_gallery_settings", "alobaidi_gallery_settings_section", array('label_for' => 'alobaidi_gallery_favicon') );
    register_setting( 'alobaidi_gallery_settings_section', 'alobaidi_gallery_favicon' );

    add_settings_field( "alobaidi_gallery_bar", 'Disable Admin Bar', "alobaidi_gallery_bar_callback", "alobaidi_gallery_settings", "alobaidi_gallery_settings_section", array('label_for' => 'alobaidi_gallery_bar') );
    register_setting( 'alobaidi_gallery_settings_section', 'alobaidi_gallery_bar' );

    add_settings_field( "alobaidi_gallery_next", 'Translate "Next Page"', "alobaidi_gallery_next_callback", "alobaidi_gallery_settings", "alobaidi_gallery_settings_section", array('label_for' => 'alobaidi_gallery_next') );
    register_setting( 'alobaidi_gallery_settings_section', 'alobaidi_gallery_next' );

    add_settings_field( "alobaidi_gallery_prev", 'Translate "Previous Page"', "alobaidi_gallery_prev_callback", "alobaidi_gallery_settings", "alobaidi_gallery_settings_section", array('label_for' => 'alobaidi_gallery_prev') );
    register_setting( 'alobaidi_gallery_settings_section', 'alobaidi_gallery_prev' );

    add_settings_field( "alobaidi_gallery_setw", 'Translate "Settings"', "alobaidi_gallery_setw_callback", "alobaidi_gallery_settings", "alobaidi_gallery_settings_section", array('label_for' => 'alobaidi_gallery_setw') );
    register_setting( 'alobaidi_gallery_settings_section', 'alobaidi_gallery_setw' );

    add_settings_field( "alobaidi_gallery_medw", 'Translate "Upload Images"', "alobaidi_gallery_medw_callback", "alobaidi_gallery_settings", "alobaidi_gallery_settings_section", array('label_for' => 'alobaidi_gallery_medw') );
    register_setting( 'alobaidi_gallery_settings_section', 'alobaidi_gallery_medw' );
}
add_action( 'admin_init', 'Alobaidi_Gallery_settings' );


function alobaidi_gallery_home_callback(){
    ?>
        <label for="alobaidi_gallery_home"><input id="alobaidi_gallery_home" name="alobaidi_gallery_home" type="checkbox" value="1" <?php checked( get_option('alobaidi_gallery_home'), 1, true ); ?>>Display gallery as full website.</label>
    <?php
}


function alobaidi_gallery_page_callback(){
    ?>
        <input class="regular-text" name="alobaidi_gallery_page" type="text" id="alobaidi_gallery_page" value="<?php echo esc_attr( wp_filter_nohtml_kses( get_option('alobaidi_gallery_page') ) ); ?>">
        <p class="description">If you do not want gallery as full website, go to > Pages > Add New, and create new page, enter page link in this field to display gallery inside it.</p>
    <?php
}


function alobaidi_gallery_count_callback(){
    ?>
        <input class="small-text" name="alobaidi_gallery_count" type="text" id="alobaidi_gallery_count" value="<?php echo esc_attr( wp_filter_nohtml_kses( get_option('alobaidi_gallery_count') ) ); ?>">
        <p class="description">Enter count of images per page, default is 9 images.</p>
    <?php
}


function alobaidi_gallery_filter_callback(){
    ?>
        <label for="alobaidi_gallery_filter"><input id="alobaidi_gallery_filter" name="alobaidi_gallery_filter" type="checkbox" value="1" <?php checked( get_option('alobaidi_gallery_filter'), 1, true ); ?>>Enable black and white filter to images.</label>
    <?php
}


function alobaidi_gallery_sitename_callback(){
    ?>
        <input class="regular-text" name="alobaidi_gallery_sitename" type="text" id="alobaidi_gallery_sitename" value="<?php echo esc_attr( wp_filter_nohtml_kses( get_option('alobaidi_gallery_sitename') ) ); ?>">
        <p class="description">Enter gallery name, default is "<?php bloginfo('name'); ?>".</p>
    <?php
}


function alobaidi_gallery_tagline_callback(){
    ?>
        <input class="regular-text" name="alobaidi_gallery_tagline" type="text" id="alobaidi_gallery_tagline" value="<?php echo esc_attr( wp_filter_nohtml_kses( get_option('alobaidi_gallery_tagline') ) ); ?>">
        <p class="description">Enter gallery tagline, default is "<?php bloginfo('description'); ?>".</p>
    <?php
}


function alobaidi_gallery_facebook_callback(){
    ?>
        <input class="regular-text" name="alobaidi_gallery_facebook" type="text" id="alobaidi_gallery_facebook" value="<?php echo esc_attr( wp_filter_nohtml_kses( get_option('alobaidi_gallery_facebook') ) ); ?>">
        <p class="description">Enter your facebook profile link, will be display it in footer.</p>
    <?php
}


function alobaidi_gallery_twitter_callback(){
    ?>
        <input class="regular-text" name="alobaidi_gallery_twitter" type="text" id="alobaidi_gallery_twitter" value="<?php echo esc_attr( wp_filter_nohtml_kses( get_option('alobaidi_gallery_twitter') ) ); ?>">
        <p class="description">Enter your twitter profile link, will be display it in footer.</p>
    <?php
}


function alobaidi_gallery_instagram_callback(){
    ?>
        <input class="regular-text" name="alobaidi_gallery_instagram" type="text" id="alobaidi_gallery_instagram" value="<?php echo esc_attr( wp_filter_nohtml_kses( get_option('alobaidi_gallery_instagram') ) ); ?>">
        <p class="description">Enter your instagram profile link, will be display it in footer.</p>
    <?php
}


function alobaidi_gallery_favicon_callback(){
    ?>
        <input class="regular-text" name="alobaidi_gallery_favicon" type="text" id="alobaidi_gallery_favicon" value="<?php echo esc_attr( wp_filter_nohtml_kses( get_option('alobaidi_gallery_favicon') ) ); ?>">
        <p class="description">Enter your favicon link.</p>
    <?php
}


function alobaidi_gallery_bar_callback(){
    ?>
        <label for="alobaidi_gallery_bar"><input id="alobaidi_gallery_bar" name="alobaidi_gallery_bar" type="checkbox" value="1" <?php checked( get_option('alobaidi_gallery_bar'), 1, true ); ?>>Disable custom admin bar, will be display default admin bar.</label>
    <?php
}


function alobaidi_gallery_next_callback(){
    ?>
        <input class="regular-text" name="alobaidi_gallery_next" type="text" id="alobaidi_gallery_next" value="<?php echo esc_attr( wp_filter_nohtml_kses( get_option('alobaidi_gallery_next') ) ); ?>">
        <p class="description">Translate "Next Page" word in next page link (after mouseover), default word is "Next Page".</p>
    <?php
}


function alobaidi_gallery_prev_callback(){
    ?>
        <input class="regular-text" name="alobaidi_gallery_prev" type="text" id="alobaidi_gallery_prev" value="<?php echo esc_attr( wp_filter_nohtml_kses( get_option('alobaidi_gallery_prev') ) ); ?>">
        <p class="description">Translate "Previous Page" word in previous page link (after mouseover), default word is "Previous Page".</p>
    <?php
}


function alobaidi_gallery_setw_callback(){
    ?>
        <input class="regular-text" name="alobaidi_gallery_setw" type="text" id="alobaidi_gallery_setw" value="<?php echo esc_attr( wp_filter_nohtml_kses( get_option('alobaidi_gallery_setw') ) ); ?>">
        <p class="description">Translate "Settings" word in custom admin bar, default word is "Settings".</p>
    <?php
}


function alobaidi_gallery_medw_callback(){
    ?>
        <input class="regular-text" name="alobaidi_gallery_medw" type="text" id="alobaidi_gallery_medw" value="<?php echo esc_attr( wp_filter_nohtml_kses( get_option('alobaidi_gallery_medw') ) ); ?>">
        <p class="description">Translate "Upload Images" word in custom admin bar, default word is "Upload Images".</p>
    <?php
}

?>