<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.streamweasels.com
 * @since      1.0.0
 *
 * @package    Streamweasels_Player_Pro
 * @subpackage Streamweasels_Player_Pro/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="cp-streamweasels wrap">
    <div class="cp-streamweasels__header">
        <div class="cp-streamweasels__header-logo">
            <img src="<?php echo plugin_dir_url( __FILE__ ) . '../img/sw-full-logo.png'; ?>">
        </div>
        <div class="cp-streamweasels__header-title">
            <h3>StreamWeasels</h3>
            <p>Our Twitch plugins have changed! In order to get your Twitch Player working again, you must download our latest plugin - <a href="plugin-install.php?s=StreamWeasels+Twitch+Integration&tab=search&type=term" style="color:#fff">StreamWeasels Twitch Integration</a>.</p>
        </div>        
    </div>
    <div class="cp-streamweasels__wrapper">
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="post-body-content">
                <div class="meta-box-sortables ui-sortable">
                    <div class="postbox">
                        <div class="inside">
                            <div class="setup-instructions">
                                <div class="setup-instructions--left">
                                    <h3>What's New?</h3>
                                    <p>All StreamWeasels plugins are now connected to the new Twitch API, Helix. This has enabled new possibilities, better performance and more reliability for your plugin, but you must make a few changes to get your plugin back up-and-running. </p>
                                    <h3>You must install our new Twitch Integration plugin</h3>
                                    <p>In order for your Twitch Player to get back up-and-running, please install our new plugin - <a href="plugin-install.php?s=StreamWeasels+Twitch+Integration&tab=search&type=term">StreamWeasels Twitch Integration</a></p>
                                    <p>Once installed, you can head over to the fancy new admin page for StreamWeasels Twitch Integration, where you will find a familiar admin interface which should allow you to do everything Twitch Player does, plus much more.</p>
                                    <h3>Your new shortcodes</h3>
                                    <p>You may have noticed your [getTwitchPlayer] shortcode no longer works. Once you have installed and setup our new <a href="plugin-install.php?s=StreamWeasels+Twitch+Integration&tab=search&type=term">StreamWeasels Twitch Integration</a> plugin, you should change your Twitch Player shortcodes to the following:</p> 
                                    <code>[streamweasels layout="player"]</code></p>
                                    <h3>Exciting New Features</h3>
                                    <p>Our new <a href="plugin-install.php?s=StreamWeasels+Twitch+Integration&tab=search&type=term">StreamWeasels Twitch Integration</a> plugin unlocks new possibilities for your Twitch Player:</p>
                                    <ul class="swti-twitch-bullets" style="list-style-type: disc;padding-left:20px;">
                                        <li>Display streams based on Game Playing, Channel List or Twitch Team.</li>
                                        <li>You can now combine fields. EG: display all members of a Twitch Team but only if they are playing a specific game.</li>
                                        <li>You can now filter by Stream Title. EG: display all GTA V Streams but only if they have NoPixel in the Stream Title.</li>
                                        <li>Free users now have access to advanced shortcodes, allowing multiple Twitch Players on the one site.</li>
                                        <li>Free users can now display upto 20 streams at once.</li>
                                    </ul>
                                    <p>For more information, checkout our <a href="https://support.streamweasels.com/article/53-twitch-integration-migration-guide" target="_blank">Twitch Integration migration guide.</a>.</p>
                                </div>
                                <div class="setup-instructions--right">
                                    <h3>Video Guide</h3>
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/0-Wdo9Ugo48" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
            <div id="postbox-container-1" class="postbox-container">
                <div class="meta-box-sortables">
                    <div class="postbox">
                        <h3>StreamWeasels Links</h3>
                        <div class="inside">
                            <p>WordPress Themes and Plugins for Twitch Streamers.</p>
                            <ul>
                                <li>
                                    <a href="https://support.streamweasels.com/article/53-twitch-integration-migration-guide" target="_blank">Twitch Integration Migration Guide</a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/channel/UCo885jUiOeyhtHDFUbdx8rQ" target="_blank">Check out our YouTube Guides</a>
                                </li>       
                                <li>
                                    <a href="https://twitter.com/StreamWeasels" target="_blank">Follow us on Twitter</a>
                                </li>
                                <li>
                                    <a href="https://discord.gg/HSwfPbm" target="_blank">Join us on Discord</a>
                                </li> 
                                <li>
                                    <a href="https://www.streamweasels.com/contact/" target="_blank">Need Help? Get in touch!</a>
                                </li>                                                          
                            </ul>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>