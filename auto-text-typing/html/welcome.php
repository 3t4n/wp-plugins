<?php
if (!defined('ABSPATH') && !is_admin()) {
    exit;
}

// PLUGIN DATAS
$datas = get_plugin_data(MELIBU_PLUGIN_PATH_07 . 'auto-text-typing.php', $markup = true, $translate = true);

?>
<div class="wrap">

    <div class="st_wp_brand">
        <h1>
            <img src="<?php echo plugins_url("auto-text-typing/img/icon-MB.png"); ?>" alt="icon-MB-20" width="50" class="st_wp_logo"> 
            <?php echo $datas['Name']; ?>
            <span><?php _e('Professional Themes and Plugins for WordPress', 'auto-text-typing'); ?></span>
        </h1>
    </div>
    
    <hr />
    <div class="st_wp_brand_box">
        <p>
            <?php _e('Version', 'auto-text-typing'); ?>: <?php echo $datas['Version']; ?> | DB Version: <?php echo get_option('melibu-plugin-typing-db-version'); ?>
        </p>
    </div>
    <hr />

    <div class="mb-st-grid-9">
        <div class="welcome-panel">

            <div class="welcome-panel-column-container st-center">
                <p class="about-description">
                    <?php _e('This documentation should help you.', 'auto-text-typing'); ?>
                </p>
                <br />

                <div class="mb_shortcode">

                    <h3>SHORTCODE</h3>
                    <code>
                        [wp_mb_plugin_typing]...<?php _e('Here comes the selected typing text', 'auto-text-typing'); ?>...[/wp_mb_plugin_typing]
                    </code>
                    <div class='st-melibuPlugin-area'>
                        <label for='mb_plugin_download_input'><?php _e('That is the short code. You can copy a short code and place on a page, post or in a widget. Or use the short code has been integrated into your editor, a click is enough and the part buttons after save visible.', 'auto-text-typing'); ?></label><br />
                        <input ondblclick="this.setSelectionRange(0, this.value.length)" 
                               id='mb_plugin_download_input' 
                               class='melibu_input' 
                               type="text" 
                               value='[wp_mb_plugin_typing]...<?php _e('Here comes the selected typing text', 'auto-text-typing'); ?>...[/wp_mb_plugin_typing]'
                               readonly="readonly" />
                        <p>
                            <small><?php _e('Please take the short code double click to copy', 'auto-text-typing'); ?></small>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <div class="mb-st-grid-3">
        <div class="melibu-postbox postbox st-margin-top-15">
            <h2>
                <span><?php _e('Use Typing in WP Editor', 'auto-text-typing'); ?></span>
            </h2>
            <p>
                <?php _e('Take your part to put the buttons shortcode in WP editor Melabu', 'auto-text-typing'); ?>.
            </p>
            <img src="<?php echo plugins_url("screenshot-5.png", dirname(__FILE__)); ?>" alt="screenshot-1" width="650" class="st-img"/>
        </div>
        <div class="melibu-postbox postbox">
            <h2>
                <span><?php _e('Use Typing in Text Widgets', 'auto-text-typing'); ?></span>
            </h2>
            <p>
                <?php _e('Use the automatic retype any text widget', 'auto-text-typing'); ?>.
            </p>
            <img src="<?php echo plugins_url("screenshot-6.png", dirname(__FILE__)); ?>" alt="screenshot-1" width="650" class="st-img"/>
        </div>
    </div>
    
</div>