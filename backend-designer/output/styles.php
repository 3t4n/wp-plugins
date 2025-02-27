<?php

add_action('admin_footer', 'ddbd_output_styles');
function ddbd_output_styles()
{

    $ddbd_current_scheme = get_user_option('admin_color', get_current_user_id());

    if ($ddbd_current_scheme != "backend_designer") {
        return false;
    }

    $ddbd_options = get_option('ddbd_settings');

    $primarycolor = $ddbd_options['primarycolor'];
    $primarytext = $ddbd_options['text-for-primary'];
    $secondarycolor = $ddbd_options['secondarycolor'];
    $secondarytext = $ddbd_options['text-for-secondary'];
    $focuscolor = $ddbd_options['focus-color'];
    $customFont = $ddbd_options['custom_font'];

?>

    <style type="text/css">
        /* Admin Panel */

        #wpadminbar,
        #adminmenu,
        #adminmenu .wp-submenu,
        #adminmenuback,
        #adminmenuwrap,
        .wp-core-ui .button-primary,
        #wpadminbar .ab-sub-wrapper,
        #wpadminbar ul,
        #wpadminbar ul li,
        .wp-submenu li:hover {
            <?php if (isset($primarycolor)) { ?>background: <?php echo $primarycolor ?>;
            border-color: <?php echo $primarycolor ?>;
            <?php } ?><?php if (isset($primarytext)) { ?>color: <?php echo $primarytext ?>;
            <?php } ?>
        }

        #wpadminbar a,
        #adminmenu a,
        #adminmenu .wp-submenu a,
        #adminmenuback a,
        #adminmenuwrap a,
        .wp-core-ui .button-primary,
        #wpadminbar a.ab-item,
        #wpadminbar>#wp-toolbar span.ab-label,
        #wpadminbar>#wp-toolbar span.noticon,
        #wpadminbar #adminbarsearch::before,
        #wpadminbar .ab-icon::before,
        #wpadminbar .ab-item::before,
        #adminmenu div.wp-menu-image::before,
        .wp-submenu li:hover {
            <?php if (isset($primarytext)) { ?>color: <?php echo $primarytext ?>;
            <?php } ?>
        }

        .wp-submenu li:hover {
            opacity: .8;
        }

        #adminmenu .wp-has-current-submenu .wp-submenu,
        #adminmenu .wp-has-current-submenu .wp-submenu.sub-open,
        #adminmenu .wp-has-current-submenu.opensub .wp-submenu,
        #adminmenu a.wp-has-current-submenu:focus+.wp-submenu,
        .no-js li.wp-has-current-submenu:hover .wp-submenu,
        #adminmenu li.menu-top:hover,
        #adminmenu li.opensub>a.menu-top,
        #adminmenu li>a.menu-top:focus,
        #wpadminbar .ab-top-menu>li.hover>.ab-item,
        #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus,
        #wpadminbar:not(.mobile) .ab-top-menu>li:hover>.ab-item,
        #wpadminbar:not(.mobile) .ab-top-menu>li>.ab-item:focus {
            <?php if (isset($secondarycolor)) { ?>background: <?php echo $secondarycolor ?>;
            <?php } ?>
        }

        #adminmenu .wp-has-current-submenu .wp-submenu a,
        #adminmenu .wp-has-current-submenu .wp-submenu.sub-open a,
        #adminmenu .wp-has-current-submenu.opensub .wp-submenu a,
        #adminmenu a.wp-has-current-submenu:focus+.wp-submenu a,
        .no-js li.wp-has-current-submenu:hover .wp-submenu a,
        #adminmenu li.menu-top:hover a,
        #adminmenu li.opensub>a.menu-top a,
        #adminmenu li>a.menu-top:focus a,
        #wpadminbar .ab-top-menu>li.hover>.ab-item,
        #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus,
        #wpadminbar:not(.mobile) .ab-top-menu>li:hover>.ab-item,
        #wpadminbar:not(.mobile) .ab-top-menu>li>.ab-item:focus a,
        #adminmenu li a:focus div.wp-menu-image::before,
        #adminmenu li.opensub div.wp-menu-image::before,
        #adminmenu li:hover div.wp-menu-image::before,
        #adminmenu li.menu-top:hover,
        #adminmenu li.opensub>a.menu-top,
        #adminmenu li>a.menu-top:focus,
        .wp-submenu li:hover,
        #wpadminbar .quicklinks .menupop ul li a:focus,
        #wpadminbar .quicklinks .menupop ul li a:focus strong,
        #wpadminbar .quicklinks .menupop ul li a:hover,
        #wpadminbar .quicklinks .menupop ul li a:hover strong,
        #wpadminbar .quicklinks .menupop.hover ul li a:focus,
        #wpadminbar .quicklinks .menupop.hover ul li a:hover,
        #wpadminbar li #adminbarsearch.adminbar-focused::before,
        #wpadminbar li .ab-item:focus::before,
        #wpadminbar li a:focus .ab-icon::before,
        #wpadminbar li.hover .ab-icon::before,
        #wpadminbar li.hover .ab-item::before,
        #wpadminbar li:hover #adminbarsearch::before,
        #wpadminbar li:hover .ab-icon::before,
        #wpadminbar li:hover .ab-item::before,
        #wpadminbar.nojs .quicklinks .menupop:hover ul li a:focus,
        #wpadminbar.nojs .quicklinks .menupop:hover ul li a:hover,
        #wpadminbar:not(.mobile)>#wp-toolbar a:focus span.ab-label,
        #wpadminbar:not(.mobile)>#wp-toolbar li:hover span.ab-label,
        #wpadminbar>#wp-toolbar li.hover span.ab-label {
            <?php if (isset($secondarytext)) { ?>color: <?php echo $secondarytext ?>;
            <?php } ?>
        }

        #adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head,
        #adminmenu .wp-menu-arrow,
        #adminmenu .wp-menu-arrow div,
        #adminmenu li.current a.menu-top,
        #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,
        .folded #adminmenu li.current.menu-top,
        .folded #adminmenu li.wp-has-current-submenu,
        .wp-core-ui .button-primary.focus,
        .wp-core-ui .button-primary.hover,
        .wp-core-ui .button-primary:focus,
        .wp-core-ui .button-primary:hover {
            <?php if (isset($focuscolor)) { ?>background: <?php echo $focuscolor ?>;
            <?php } ?>
        }

        .wp-core-ui .button-primary.focus,
        .wp-core-ui .button-primary.hover,
        .wp-core-ui .button-primary:focus,
        .wp-core-ui .button-primary:hover {
            <?php if (isset($focuscolor)) { ?>box-shadow: 0 1px 0 <?php echo $focuscolor ?>;
            -webkit-box-shadow: 0 1px 0 <?php echo $focuscolor ?>;
            -o-box-shadow: 0 1px 0 <?php echo $focuscolor ?>;
            border-color: <?php echo $focuscolor ?>;
            <?php } ?>
        }

        /* Custom Font */

        <?php if (isset($customFont)) { ?>body {
            font-family: <?php echo $customFont ?>, 'Open Sans', sans-serif;
        }

        <?php } ?>
    </style>

<?php

}

/**
 * Login Screen
 */

add_action('login_enqueue_scripts', 'ddbd_login_screen_customize');
function ddbd_login_screen_customize()
{

    $ddbd_options = get_option('ddbd_settings');

    // Sanitizing URL inputs
    $logoUrl = isset($ddbd_options['login-logo']) ? esc_url($ddbd_options['login-logo']) : '';
    $loginBgImage = isset($ddbd_options['login-bg']) ? esc_url($ddbd_options['login-bg']) : '';

    // Sanitizing and escaping color inputs
    $loginBgColor = isset($ddbd_options['login-bgcolor']) ? sanitize_hex_color($ddbd_options['login-bgcolor']) : '';
    $loginTextColor = isset($ddbd_options['login-textcolor']) ? sanitize_hex_color($ddbd_options['login-textcolor']) : '';

?>

    <style type="text/css">
        <?php if (isset($logoUrl)) { ?>.login h1 a {
            background-image: url(<?php echo $logoUrl; ?>) !important;
            background-size: contain;
            width: auto;
            height: auto;
            line-height: 1.7em;
        }

        <?php } ?>body.login {
            <?php if (isset($loginBgColor)) { ?>background: <?php echo $loginBgColor ?> !important;
            <?php } ?><?php if (isset($loginBgImage)) { ?>background: url(<?php echo $loginBgImage ?>) 0 0 no-repeat;
            background-size: cover;
            <?php } ?>
        }

        body.login a {
            <?php if (isset($loginTextColor)) { ?>color: <?php echo $loginTextColor; ?> !important;
            <?php } ?>
        }
    </style>

<?php }

/**
 * Custom fonts
 */

add_action('admin_head', 'backend_designer_font');
function backend_designer_font()
{

    $ddbd_options = get_option('ddbd_settings');

    if (empty($ddbd_options)) {
        return false;
    }

    $customFont = $ddbd_options['custom_font'];
    $http = (!empty($_SERVER['HTTPS'])) ? "https" : "http";
    $fontType = str_replace(' ', '+', $customFont);
    $font_var = '300,400,600,700,900,300italic,400italic,600italic,700italic,900italic';

    if (isset($customFont)) {

        echo "<link href='" . $http . "://fonts.googleapis.com/css?family=" . $fontType . ":" . $font_var . "' rel='stylesheet' type='text/css'>";
    }
}
