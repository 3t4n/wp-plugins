<hr />
<div class="footer" style="padding:15px 7px;">
    <div id=foot-contents>
        <div class="support">
            <?php
                $support = '<a href="http://codecabin.io/store/support/" target="_BLANK">'.__('Support Desk', 'sola-testimonials').'</a>';
                $contact = '<a href="http://codecabin.io/store/support/" target="_BLANK">'.__('Contact', 'sola-testimonials').'</a>';
            ?>
            <p><?php _e('If you find any errors or if you have any suggestions, Get in contact with us via our '.$support.' or our '.$contact.' page', 'sola'); ?></p>
            <?php 
            $twitter_link = "<a href='https://twitter.com/Code_Cabin'>".__('Follow us on Twitter', 'sola-testimonials')."</a>";
            if (function_exists("sola_t_register_pro")) { 
                global $sola_t_pro_version; 
                global $sola_t_pro_version_string; 
                ?>
                <p><?php _e('Super Testimonials Premium Version: ', 'sola-testimonials'); ?><a target='_BLANK' href="https://codecabin.io/store/super-testimonials-pro/?utm_source=plugin&utm_medium=link&utm_campaign=super_t_version_premium"><?php echo $sola_t_pro_version." ".$sola_t_pro_version_string; ?></a> |
                <a target="_blank" href="http://codecabin.io/store/support/"><?php _e('Support', 'sola-testimonials'); ?></a> | <?php echo $twitter_link; ?> </p>
                <?php } else { 
                    global $sola_t_version; global $sola_t_version_string; 
                    ?>
                    <p><?php _e('Super Testimonials Version: ', 'sola-testimonials'); ?><a target='_BLANK' href="http://codecabin.io/store/"><?php echo $sola_t_version." ".$sola_t_version_string; ?></a> |
                    <a target="_blank" href="http://codecabin.io/store/support/"><?php _e('Support', 'sola-testimonials'); ?></a> | 
                    <a target="_blank" id="upgrade" href="https://codecabin.io/store/super-testimonials-pro/?utm_source=plugin&utm_medium=link&utm_campaign=super_t_footer" title="Premium Upgrade"><?php _e('Go Premium', 'sola-testimonials'); ?></a> | <?php echo $twitter_link; ?> </p>
                <?php } ?>
        </div>
    </div>
</div>