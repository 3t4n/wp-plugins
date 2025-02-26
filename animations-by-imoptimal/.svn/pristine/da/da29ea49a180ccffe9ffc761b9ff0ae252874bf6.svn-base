<?php
if(!function_exists('imoanim_options_page')) {
    function imoanim_options_page() {
?>
<div id="imo-options" class="imo-wrap">
    <h1>
        <span class="imo-title"><?php esc_html_e('Animations by Imoptimal', 'imoptimal_animation'); ?></span>
        <a class="imo-logo" href="https://www.imoptimal.com/" target="_blank"></a>
    </h1>

    <h2 class="imo-instructions"><?php esc_html_e('Instructions', 'imoptimal_animation'); ?><span class="pointer"></span></h2>

    <ol class="imo-list">
        <li>a) <?php esc_html_e('First of all, set the number of animation groups that you can target with different animation settings (up to 100 groups).', 'imoptimal_animation'); ?></li>
        <li>b) <?php esc_html_e('Choose if the plugin files (styles and scripts) will be loaded in regular or minified version. Default: not minified.', 'imoptimal_animation'); ?></li>
        <li><?php esc_html_e('Open each animation group by clicking on its title bar.', 'imoptimal_animation'); ?></li>
        <li>1. <?php esc_html_e('Add the items you would like to animate either when they enter the screens viewport (visible area of a web page), or when they are hovered on/tapped on touchscreen.', 'imoptimal_animation');?></li>
        <li>2. <?php esc_html_e('Select the type of animation for that group of items.', 'imoptimal_animation'); ?></li>
        <li>3. <?php esc_html_e('Choose the duration of the animation (0.5 - 5 sec; with increments of 0.1 sec).', 'imoptimal_animation'); ?></li>
        <li>4. <?php esc_html_e('Choose the repetition of the animation (1 - 5 times; Infinite is also an option).', 'imoptimal_animation'); ?></li>
        <li>5. <?php esc_html_e('Choose the speed curve of the selected animation. Default: linear.', 'imoptimal_animation'); ?></li>
        <li>6. <?php esc_html_e('Choose the delay duration of animation when entering screens viewport (0.1 - 5 sec; with increments of 0.1 sec). Default: no delay.', 'imoptimal_animation'); ?></li>
        <li>7. <?php esc_html_e('Choose if the animation will be triggered every time selected items enter screens viewport. There is also an option to trigger animation on hover/tapped on touchscreen instead. Default: false.', 'imoptimal_animation'); ?></li>
        <li><?php esc_html_e('Use the preview button to check all of the choosen options in action.', 'imoptimal_animation'); ?></li>
    </ol>

    <p class="note"><?php esc_html_e('Note: "Save Meta Options" button is used to save the number of animation groups and the minification of plugin files, while "Save Animation Options" button is used for all of the options inside of every animation group.', 'imoptimal_animation'); ?></p>

    <noscript><?php esc_html_e('IMPORTANT: Javascript must be turned ON in your browser settings in order for this plugin to work!', 'imoptimal_animation'); ?></noscript>

    <div class="imo-content">

        <form action='options.php' method='post' id='imo-meta'>
            <div class="meta-border-top"><span><?php esc_html_e('Meta Options', 'imoptimal_animation') ?></span></div>
            <?php 
        settings_fields( 'imoanim_meta_group' );
                                 do_settings_sections( 'imoanim_meta_group' );
                                submit_button(esc_html('Save meta options', 'imoptimal_animation'), 'submit-class', 'submit', true, array('id' => 'submit-meta'));
            ?>
            <div class="meta-notice notice"></div>
            <div class="meta-border-bottom"><span><?php esc_html_e('Animation Options', 'imoptimal_animation') ?></span></div>
        </form>

        <form action='options.php' method='post' id='imo-animations'>
            <?php 
                settings_fields( 'imoanim_animations_group' );
                                 do_settings_sections( 'imoanim_animations_group' );
                                submit_button(esc_html('Save animation options', 'imoptimal_animation'), 'submit-class', 'submit', true, array('id' => 'submit-animations'));
            ?>
            <div class="animations-notice notice"></div>
            <div class="animations-border-bottom"></div>
        </form>

        <div class="imo-sidebar">

            <div class="rating">
                <h3><?php esc_html_e('Ratings & Reviews', 'imoptimal_animation'); ?></h3>
                <p>
                    <strong><?php esc_html_e('If you like this plugin, please consider leaving a', 'imoptimal_animation') ?></strong> 
                    ★★★★★ 
                    <strong><?php esc_html_e('rating', 'imoptimal_animation'); ?></strong><br>
                    <strong><?php esc_html_e('A huge thanks in advance!', 'imoptimal_animation'); ?></strong>
                </p>
                <a href="https://wordpress.org/support/plugin/animations-by-imoptimal/reviews/" target="_blank" class="button button-primary"><?php esc_html_e('Leave us a rating', 'imoptimal_animation'); ?></a>
            </div>

            <div class="meta-info">
                <h3><?php esc_html_e('About the plugin', 'imoptimal_animation'); ?></h3>
                <strong><?php esc_html_e('Developed by: ', 'imoptimal_animation'); ?></strong> <a href="https://www.imoptimal.com/" target="_blank">Imoptimal</a>

                <div class="contact-info">
                    <strong><?php esc_html_e('Need some support?', 'imoptimal_animation'); ?></strong> <br>
                    <strong><?php esc_html_e('Contact the developers via the Support Forum', 'imoptimal_animation'); ?></strong>
                    <div>
                        <a href="https://wordpress.org/support/plugin/animations-by-imoptimal/" target="_blank" class="button button-primary"><?php esc_html_e('Contact us', 'imoptimal_animation'); ?></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<?php }
} ?>