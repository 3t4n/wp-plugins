<?php defined('ABSPATH') or die("No script kiddies please!"); ?>

<div class= "ec-settings-container">
    <div class="ec-about-main-wrapper">
        <div class="ec-header">
            <div>
                <div id="ec-fb-root"></div>
                <script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
                <script>!function(d, s, id){var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location)?'http':'https'; if (!d.getElementById(id)){js = d.createElement(s); js.id = id; js.src = p + '://platform.twitter.com/widgets.js'; fjs.parentNode.insertBefore(js, fjs); }}(document, 'script', 'twitter-wjs');</script>
            </div>
            <div class="ec-header-section">
                <div class="ec-header-left">
                    <div class="ec-title"><?php _e('Everest Counter Lite', 'everest-counter-lite'); ?></div>
                    <div class="ec-version-wrap">
                        <span>Version <?php echo E_COUNTER_VERSION; ?></span>
                    </div>
                </div>

                <div class="ec-header-social-link">
                    <p class="ec-follow-us"><?php _e('Follow us for new updates', 'everest-counter-lite'); ?></p>
                    <div class="fb-like" data-href="https://www.facebook.com/accesspressthemes" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
                    <a href="https://twitter.com/accesspressthemes" class="twitter-follow-button" data-show-count="false">Follow @accesspressthemes</a>
                </div>
            </div>
        </div>
        <div class="ec-how-to-use-container">
            <div class="ec-column-one-wrap">
                <div class="ec-panel-body">
                    <div class="ec-row">
                        <div class="ec-col-three-third">
                            <h3><?php _e('More WordPress Stuff', 'everest-counter-lite'); ?></h3>
                            <div class="ec-tab-wrapper">
                                <p><strong><?php _e('Everest Counter Lite - Responsive stat counter Plugin for WordPress', 'everest-counter-lite') ?></strong> <?php _e('- is a Free WordPress Plugin by AccessPress Themes.', 'everest-counter-lite'); ?> </p>
                                <p><?php _e('AccessPress Themes is a venture of Access Keys - who has developed hundreds of Custom WordPress themes and plugins for its clients over the years. ', 'everest-counter-lite'); ?></p>
                                <p><strong><?php _e('Everest Counter', 'everest-counter-lite') ?></strong><?php _e(' - is a Free WordPress stat counter plugin packaged with 15 beautiful pre-designed templates. With this fully responsive stat counter builder, you can display your stat counter however you like and configure it to the most. Use different layouts available and showcase your stat counters.', 'everest-counter-lite'); ?></p>
                                <div class="ec-halfseperator"></div>
                                <p><strong><?php _e('Please visit our product page for more details here:', 'everest-counter-lite'); ?></strong>
                                    <br />
                                    <a href="https://accesspressthemes.com/wordpress-plugins/everest-counter-lite" target="_blank">https://accesspressthemes.com/wordpress-plugins/everest-counter-lite</a>
                                </p>
                                <div class="ec-halfseperator"></div>
                                <p><strong><?php _e('Please visit our demo page here:', 'everest-counter-lite'); ?></strong>
                                    <br />
                                    <a href="http://demo.accesspressthemes.com/wordpress-plugins/everest-counter-lite" target="_blank">http://demo.accesspressthemes.com/wordpress-plugins/everest-counter-lite/</a>
                                </p>

                                <div class="ec-halfseperator"></div>
                                <p><strong><?php _e('Plugin documentation can be found here:', 'everest-counter-lite'); ?></strong>
                                    <br />
                                    <a href="https://accesspressthemes.com/documentation/everest-counter-lite/" target="_blank">https://accesspressthemes.com/documentation/everest-counter-lite/</a>
                                </p>
                                <div class="ec-halfseperator"></div>
                                <p><strong><?php _e('Premium version of the plugin can be found here:', 'everest-counter-lite'); ?></strong>
                                    <br />
                                    <a href="<?php echo EC_PRO_LINK?>" target="_blank"><?php echo EC_PRO_LINK?></a>
                                </p>

                                <p>&nbsp;</p>
                                <h3><?php _e('Get in touch', 'everest-counter-lite'); ?></h3>
                                <p><?php _e('If you have any question/feedback, please get in touch:', 'everest-counter-lite'); ?></p>
                                <p>
                                    <strong>General enquiries:</strong> <a href="mailto:info@accesspressthemes.com">info@accesspressthemes.com</a><br />
                                    <strong>Support:</strong> <a href="mailto:support@accesspressthemes.com">support@accesspressthemes.com</a><br />
                                    <strong>Sales:</strong> <a href="mailto:sales@accesspressthemes.com">sales@accesspressthemes.com</a>
                                </p>
                                <div class="ec-seperator"></div>
                                <div class="ec-dottedline"></div>
                                <div class="ec-seperator"></div>
                            </div>
                        </div>
                        <div class="ec-col-three-third">
                            <h3><?php _e('Get social', 'everest-counter-lite'); ?></h3>
                            <p><?php _e('Get connected with us on social media. Facebook is the best place to find updates on our themes/plugins: ', 'everest-counter-lite'); ?></p>
                            <p><strong>Like us on facebook:</strong>
                                <br />
                                <iframe style="border: none; overflow: hidden; width: 700px; height: 250px;" src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FAccessPress-Themes%2F1396595907277967&amp;width=842&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=true&amp;appId=1411139805828592" width="240" height="150" frameborder="0" scrolling="no"></iframe>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="ec-upgrade-to-pro">
            <img src='<?php // echo E_COUNTER_IMAGE_DIR; ?>/upgrade-banner-1.jpg' alt='Upgrade banner 1'/>
            <div class="ec-buttons-wrapper">
            <a href="http://demo.accesspressthemes.com/wordpress-plugins/everest-counter/" target="_blank">View Demo</a>
            <a href="https://codecanyon.net/item/everest-counter-beautiful-stat-counter-plugin-for-wordpress/20418334?ref=AccessKeys" target="_blank">Purchase</a>
            <a href="https://accesspressthemes.com/wordpress-plugins/everest-counter/" target="_blank">Plugin Information</a>
            </div>
            <img src='<?php // echo E_COUNTER_IMAGE_DIR; ?>/upgrade-banner-2.jpg' alt='Upgrade banner 2'/>
        </div> -->

        <div class="ec-upgrade-to-pro">
            <a href="<?php echo EC_PRO_LINK ?>" target="_blank">
                <img src="<?php echo E_COUNTER_IMAGE_DIR . '/upgrade-to-pro/upgrade-to-pro.png' ?>" style="width:80%;">
            </a>

            <div class="ec-upgrade-button-wrap-backend">

                <a href="<?php echo EC_PRO_DEMO; ?>" class="smls-demo-btn" target="_blank">Demo</a>

                <a href="<?php echo EC_PRO_LINK; ?>" target="_blank" class="smls-upgrade-btn">Upgrade</a>

                <a href="<?php echo EC_PRO_DETAIL; ?>" target="_blank" class="smls-upgrade-btn">Plugin Information</a>

            </div>

            <a href="<?php echo EC_PRO_LINK ?>" target="_blank">
                <img src="<?php echo E_COUNTER_IMAGE_DIR; ?>/upgrade-to-pro/upgrade-to-pro-feature.png" alt="<?php _e( 'Everest Comment Rating', 'everest-counter-lite' ); ?>" style="width:80%;">
            </a>
        </div>

    </div>
    <!-- <div class="ec-upgrade-wrapper">
        <a href="<?php //echo EC_PRO_LINK ?>" target="_blank">
            <img src="<?php //echo E_COUNTER_IMAGE_DIR . '/upgrade-to-pro.png' ?>" style="width:100%;">
        </a>

        <div class="ec-upgrade-button-wrap-backend">

            <a href="<?php //echo EC_PRO_DEMO; ?>" class="smls-demo-btn" target="_blank">Demo</a>

            <a href="<?php //echo EC_PRO_LINK; ?>" target="_blank" class="smls-upgrade-btn">Upgrade</a>

            <a href="<?php //echo EC_PRO_DETAIL; ?>" target="_blank" class="smls-upgrade-btn">Plugin Information</a>

        </div>

        <a href="<?php //echo EC_PRO_LINK ?>" target="_blank">
            <img src="<?php //echo E_COUNTER_IMAGE_DIR; ?>upgrade-to-pro-feature.png" alt="<?php //_e( 'Everest Comment Rating', 'everest-counter-lite' ); ?>" style="width:100%;">
        </a>
    </div> -->

</div>