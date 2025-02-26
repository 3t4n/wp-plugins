<?php

/** Display the panel */
if ( get_option( 'cyberslider_disable_welcome_panel' ) == false ) :

    /** URL references */
    $links = array(
        'faqs' => 'http://cyberspeclab.com/guides/',
        'support-forums' => 'http://cyberspeclab.com/forum/',
    );

?>
<div id="cyberslider-welcome-message" class="welcome-panel">
    <?php
        /** Before actions */
        do_action( 'cyberslider_welcome_panel_before' );
    ?>
    
    <div class="welcome-panel-content">
        <h3><?php _e( 'Welcome to Cyber Slider', 'cyberslider' ); ?></h3>
        <p class="about-description">
            <?php _e( 'Thank you for using Cyber Slider! For Support or Instructions please visit the links below.', 'cyberslider' ); ?>
        </p>
        <div class="welcome-panel-column-container">
            <div class="welcome-panel-column">
                <h4><?php _e( 'Need Support!', 'cyberslider' ); ?></h4>
                <li><a href='<?php echo $links['support-forums']; ?>'><?php _e( 'Support Forums', 'cyberslider' ); ?></a></li>
                <li><a href='<?php echo $links['faqs']; ?>'><?php _e( 'Read our documentation', 'cyberslider' ); ?></a></li>
            </div>
            
            <div class="welcome-panel-column">
                <h4><?php _e( 'Like this plugin?', 'cyberslider' ); ?></h4>
                <ul>
                    <li><p>Either you are using one of our plugins for personal or business purposes, we do our best to make it the perfect free plugin for you. If you find our free work useful consider buying us a coffee...:)<br><br></p>
                    <p style="text-align:center;"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&amp;business=cyberspeclabpro%40gmail%2ecom&amp;lc=US&amp;item_name=CyberSpecLab&amp;currency_code=USD&amp;bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted"><img alt="Donate Button with Credit Cards" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" /></a></p></li>
                </ul>
            </div>

            <div class="welcome-panel-column">
                <h4><?php _e( 'Follow us', 'cyberslider' ); ?></h4>
                <ul>
                    <li><iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FCyberSpecLab%2F162781543926606&amp;width=90&amp;height=21&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>  <br /> <br />
                    <a href="https://twitter.com/cyberspeclab" class="twitter-follow-button" data-show-count="false" data-size="small">Follow @cyberspeclab</a>
                    <script>!function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (!d.getElementById(id)) {
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//platform.twitter.com/widgets.js";
                                fjs.parentNode.insertBefore(js, fjs);
                            }
                        }(document, "script", "twitter-wjs");</script>
                        </li>
                </ul>
            </div>
        </div>
    </div>

    <?php
        /** After actions */
        do_action( 'cyberslider_welcome_panel_after' );
    ?>
</div>
<?php endif; ?>