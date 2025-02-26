<!-- slider div for left-->

<div id="ssi-absolute">
    <ul class="contact-side">
        <?php if ("" != get_option('sc_social_slider_facebook')) { ?>
        <li class="ssi-facebook"><a target="_blank" href="<?php echo get_option('sc_social_slider_facebook') ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>

        <?php if ("" != get_option('sc_social_slider_twitter')) { ?>
        <li class="ssi-twitter"><a target="_blank" href="<?php echo get_option('sc_social_slider_twitter') ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>

        <?php if ("" != get_option('sc_social_slider_gplus')) { ?>
        <li class="ssi-gplus"><a target="_blank" href="<?php echo get_option('sc_social_slider_gplus') ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>

        <?php if ("" != get_option('sc_social_slider_instagram')) { ?>
        <li class="ssi-instagram"><a target="_blank" href="<?php echo get_option('sc_social_slider_instagram') ?>"><i class="fa fa-instagram"></i></a></li> <?php } ?>

        <?php if ("" != get_option('sc_social_slider_pinterest')) { ?>
        <li class="ssi-pinterest"><a target="_blank" href="<?php echo get_option('sc_social_slider_pinterest') ?>"><i class="fa fa-pinterest"></i></a></li><?php } ?>
              
        <?php if ("" != get_option('sc_social_slider_linkedin')) { ?>
        <li class="ssi-linkedin"><a target="_blank" href="<?php echo get_option('sc_social_slider_linkedin') ?>"><i class="fa fa-linkedin"></i></a></li> <?php } ?>

        <?php if ("" != get_option('sc_social_slider_youtube')) { ?>
        <li class="ssi-youtube"><a target="_blank" href="<?php echo get_option('sc_social_slider_youtube') ?>"><i class="fa fa-youtube"></i></a></li><?php } ?>

        <?php if ("" != get_option('sc_social_slider_shortcode')) { ?>
        <li class="ssi-envelope"><a id="ssi-contact"><i class="fa fa-envelope-o"></i></a></li><?php } else if ("" != get_option('sc_social_slider_email')) { ?>
            <li class="ssi-envelope"><a href="<?php echo 'mailto:' . get_option('sc_social_slider_email') ?>"><i class="fa fa-envelope-o"></i></a></li><?php } ?>

        <?php if ("" != get_option('sc_social_slider_phone')) { ?>
            <li class="ssi-phone"><a href="callto:<?php echo get_option('sc_social_slider_phone') ?>"><i class="fa fa-phone"></i></a></li><?php } ?>

        <?php if ("" != get_option('sc_social_slider_skype')) { ?>
            <li class="ssi-skype"><a href="skype:<?php echo get_option('sc_social_slider_skype') ?>?call"><i class="fa fa-skype"></i></a></li><?php } ?>

        <?php if ("" != get_option('sc_social_slider_foursquare')) { ?>
            <li class="ssi-foursquare"><a target="_blank" href="<?php echo get_option('sc_social_slider_foursquare') ?>"><i class="fa fa-foursquare"></i></a></li><?php } ?>

        <?php if ("" != get_option('sc_social_slider_github')) { ?>
            <li class="ssi-github"><a target="_blank" href="<?php echo get_option('sc_social_slider_github') ?>"><i class="fa fa-github"></i></a></li><?php } ?>

        <?php if ("" != get_option('sc_social_slider_tumblr')) { ?>
            <li class="ssi-tumblr"><a target="_blank" href="<?php echo get_option('sc_social_slider_tumblr') ?>"><i class="fa fa-tumblr"></i></a></li><?php } ?>

        <?php if ("" != get_option('sc_social_slider_store')) { ?>
            <li class="ssi-store"><a target="_blank" href="<?php echo get_option('sc_social_slider_store') ?>"><i class="fa fa-shopping-cart"></i></a></li><?php } ?>
    </ul>
</div>
<div id="ssi-dim"></div>
<div id="ssi-contact-form">
    <h1 class="ssi-top-bar">
        <span id="ssi-close-x"><img src="<?php echo SC_SOCIAL_SLIDER_PATH . 'images/close-x.png' ?>" /></span>
        Contact Us
    </h1>
    <div class="ssi-contact-content">
        <?php echo do_shortcode(get_option('sc_social_slider_shortcode')); ?>
    </div>
</div>
<script language="JavaScript">
    jQuery('.contact-side li').hover(function() {
        jQuery(this).stop().animate({
            'width': '65px'
        }, 250)
    }, function() {
        jQuery(this).stop().animate({
            'width': '45px'
        }, 200)
    });
</script>
