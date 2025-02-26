<?php 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit();

$full_path = WP_PLUGIN_URL . '/'. str_replace( basename( __FILE__ ), "", plugin_basename(__FILE__) );
?>

<link href="<? echo $full_path; ?>css/bootstrap.min.css" rel="stylesheet">
<script src="<? echo $full_path; ?>js/bootstrap.min.js"></script>

<?php

    /*
     * Save post variable to options
     * @ Since 1.0.0
     */
    if($_POST['autolinkitunes_hidden'] == 'Y' && current_user_can('manage_options')) {
        //Form data sent

        $oldtoken = get_option('autolinkitunes_token');
        $token = trim($_POST['autolinkitunes_token']);

        if($oldtoken != $token) {

            $token = str_replace( array('  ',' ', '   '),'',$token );
            $token = strip_tags( $token );
            $token = wp_filter_nohtml_kses( $token );
            $token = sanitize_text_field( $token );

            if(strlen($token) > 5 && preg_match('/^[a-zA-Z0-9]+$/', $token)) {
                update_option('autolinkitunes_token', $token);
                ?>
                <div class="updated"><p><strong><?php _e('Successfully saved token!' ); ?></strong></p></div>
                <?php
            } else {
                ?>
                <div class="error"><p><strong><?php _e('Invalid token!' ); ?></strong></p></div>
                <?php
            }

        } else { 
            ?>
            <div class="updated"><p><strong><?php _e('Successfully saved token!' ); ?></strong></p></div>
            <? 
        }
    } else {
        /*
         * Show the value of option at the moment
         * @ Since 1.0.0
         */
        $token = trim(get_option('autolinkitunes_token'));
        $token = str_replace( array('  ',' ', '   '),'',$token );
        $token = strip_tags( $token );
        $token = wp_filter_nohtml_kses( $token );
        $token = sanitize_text_field( $token );
    }
?>

<!--
 * Tab Navigation Bar
 * @ Since 1.0.1
-->
<div class="wrap">
    <?php    echo "<h2>" . __( 'Auto Link iTunes Affiliate', 'autolinkitunes_trdom' ) . "</h2>"; ?><br>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">General</a></li>
        <li role="presentation"><a href="#tutorial" aria-controls="tutorial" role="tab" data-toggle="tab">How to</a></li>
        <li role="presentation"><a href="#faq" aria-controls="faq" role="tab" data-toggle="tab">FAQ</a></li>
        <li role="presentation"><a href="#support" aria-controls="support" role="tab" data-toggle="tab">Support</a></li>
        <li role="presentation"><a href="#donate" aria-controls="donate" role="tab" data-toggle="tab">Donate</a></li>
        <li role="presentation"><a href="#network" aria-controls="network" role="tab" data-toggle="tab">Network</a></li>
    </ul>
</div><br>

<div class="tab-content">

<!--
 * Form to input, show and save the token
 * @ Since 1.0.0
 * @ Updated 1.0.1
-->
<div role="tabpanel" class="tab-pane wrap active" id="home">
     
    <form name="autolinkitunes_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="autolinkitunes_hidden" value="Y">
        <?php    echo "<h4>" . __( 'Enter your iTunes Affiliate token', 'autolinkitunes_trdom' ) . "</h4>"; ?>
        <p><input type="text" class="form-control" name="autolinkitunes_token" value="<?php echo $token; ?>" placeholder="Affiliate Token" size="20"></p>
         
     
        <p class="submit">
        <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save token', 'autolinkitunes_trdom' ) ?>" />
        </p>
    </form>

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="position: fixed; bottom: 30px; right: 10px;">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="GALJKHVNEE334">
        <input type="image" src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="Jetzt einfach, schnell und sicher online bezahlen – mit PayPal.">
        <img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
    </form>
</div>

<!--
 * Short Tutorial of how to use the Plugin
 * @ Since 1.0.0
 * @ Updated 1.0.1
-->
<div role="tabpanel" class="tab-pane wrap" id="tutorial">
    <?php    echo "<h2>" . __( 'How to use', 'autolinkitunes_trdom' ) . "</h2>"; ?>
    <?php    echo "<li>" . __( 'Login iTunes Affiliate Network (<a href="http://affiliate.itunes.apple.com" target="_blank">LINK</a>)', 'autolinkitunes_trdom' ) . "</li>"; ?>
    <?php    echo "<li>" . __( 'In the top right of the you can find your Affiliate-Token', 'autolinkitunes_trdom' ) . "</li>"; ?>
    <?php    echo "<li>" . __( 'Copy it and paste it into the textfield in this plugin', 'autolinkitunes_trdom' ) . "</li>"; ?>
    <?php    echo "<li>" . __( 'Click: save token', 'autolinkitunes_trdom' ) . "</li>"; ?>
    <?php    echo "<li>" . __( 'Now every iTunes Link you insert into your blog will become an affiliate link.', 'autolinkitunes_trdom' ) . "</li>"; ?>
</div>

<!--
 * FAQ Area
 * @ Since 1.0.0
 * @ Updated 1.0.1
-->
<div role="tabpanel" class="tab-pane wrap" id="faq">
    <?php    echo "<h2>" . __( 'FAQ', 'autolinkitunes_trdom' ) . "</h2>"; ?>
    <?php    echo "<p>" . __( '<b>Why do I not see my affiliate token when I hover over my iTunes link?</b>', 'autolinkitunes_trdom' ) . "</p>"; ?>
    <?php    echo "<p>" . __( 'The Auto Link Maker javascript is an onclick event so the affiliate token is added once the link has been clicked.', 'autolinkitunes_trdom' ) . "</p>"; ?>
</div>

<!--
 * Support Area
 * @ Since 1.0.0
 * @ Updated 1.0.1
-->
<div role="tabpanel" class="tab-pane wrap" id="support">
    <?php    echo "<h2>" . __( 'Support', 'autolinkitunes_trdom' ) . "</h2>"; ?>
    <?php    echo "<p>" . __( 'Do you have questions or found a bug? Feel free to mail me: <a href="mailto:kontakt@kisimedia.de" target="_blank">kontakt@kisimedia.de</a>', 'autolinkitunes_trdom' ) . "</p>"; ?>
</div>

<!--
 * Donate Area
 * @ Since 1.0.1
-->
<div role="tabpanel" class="tab-pane wrap" id="donate">
    <?php    echo "<h2>" . __( 'Help us with a small donation', 'autolinkitunes_trdom' ) . "</h2>"; 
             echo "<p>" . __( 'This is a free plugin for wordpress to help you with your blog. The development of a plugin needs time. So maybe you want to support us with a small donation, that we can create updates for this plugin in the future.<br><b>Thank you for your support!</b>', 'autolinkitunes_trdom' ) . "</p>"; ?>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="GALJKHVNEE334">
        <input type="image" src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="Jetzt einfach, schnell und sicher online bezahlen – mit PayPal.">
        <img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
    </form>
</div>

<!--
 * Include the iTunes Affiliate Network Area
 * @ Since 1.0.1
-->
<div role="tabpanel" class="tab-pane wrap" id="network">
    <?php    echo "<p>" . __( 'After you logged in the iTunes Affiliate Network, you can see your statistik here. (<a href="https://itunes.phgconsole.performancehorizon.com/login/itunes/de?" target="_blank">LOGIN</a>)<br>You have to reload the page after login.', 'autolinkitunes_trdom' ) . "</p>"; ?>
    <iframe src="https://itunes.phgconsole.performancehorizon.com/login/itunes?" style="width: 100%; height: 550px;"></iframe>
</div>


</div>
