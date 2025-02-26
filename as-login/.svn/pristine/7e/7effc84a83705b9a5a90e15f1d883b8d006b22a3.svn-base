<?php
// logo
function as_login_logo() {
$as_opt = (array)get_option('as_opt_save');
$as_login_image = (isset($as_opt['as_login_image'])) ? $as_opt['as_login_image'] : '' ;
$as_box_color = (isset($as_opt['as_login_box_bg_color'])) ? $as_opt['as_login_box_bg_color'] : '' ;
$as_text_color = (isset($as_opt['as_login_text_color'])) ? $as_opt['as_login_text_color'] : '' ;
$as_other_link = (isset($as_opt['as_login_other_link']) == 'yes') ? 'none' : '' ;
$as_login_width = (isset($as_opt['as_login_width'])) ? $as_opt['as_login_width'] : '320' ;
$as_message_bg_color = (isset($as_opt['as_message_bg_color'])) ? $as_opt['as_message_bg_color'] : '' ;
$as_message_text_color = (isset($as_opt['as_message_text_color'])) ? $as_opt['as_message_text_color'] : '' ;
$as_message_border_width = (isset($as_opt['as_message_border_width'])) ? $as_opt['as_message_border_width'] : '' ;
$as_message_border_color = (isset($as_opt['as_message_border_color'])) ? $as_opt['as_message_border_color'] : '' ;
$as_login_input_color = (isset($as_opt['as_login_input_color'])) ? $as_opt['as_login_input_color'] : '' ;
$as_login_input_text_color = (isset($as_opt['as_login_input_text_color'])) ? $as_opt['as_login_input_text_color'] : '' ;
$as_login_other_link_color = (isset($as_opt['as_login_other_link_color'])) ? $as_opt['as_login_other_link_color'] : '' ;
$as_login_other_link_hv_color = (isset($as_opt['as_login_other_link_hv_color'])) ? $as_opt['as_login_other_link_hv_color'] : '' ;
$as_login_other_link_fz = (isset($as_opt['as_login_other_link_fz'])) ? $as_opt['as_login_other_link_fz'] : '' ;
$as_logo_size = (isset($as_opt['as_logo_size'])) ? $as_opt['as_logo_size'] : '' ;
$as_bg_color = (isset($as_opt['as_bg_color'])) ? $as_opt['as_bg_color'] : '' ;
$as_bg_image = (isset($as_opt['as_bg_image'])) ? $as_opt['as_bg_image'] : '' ;
$as_bg_repeat = (isset($as_opt['as_bg_repeat'])) ? $as_opt['as_bg_repeat'] : '' ;
$as_bg_size = (isset($as_opt['as_bg_size'])) ? $as_opt['as_bg_size'] : '' ;
$as_button_color = (isset($as_opt['as_button_color'])) ? $as_opt['as_button_color'] : '' ;
$as_button_hover_color = (isset($as_opt['as_button_hover_color'])) ? $as_opt['as_button_hover_color'] : '' ;
$as_button_border_color = (isset($as_opt['as_button_border_color'])) ? $as_opt['as_button_border_color'] : '' ;
?>

    <style type="text/css">
     .login h1 a {
       background-image: url(<?php echo $as_login_image; ?>);
       background-size: <?php echo $as_logo_size; ?>px;
       height: <?php echo $as_logo_size; ?>px;
       width: <?php echo $as_logo_size; ?>px;
     }
    body.login {
        background-image: url(<?php echo $as_bg_image; ?>);
        background-attachment: fixed;
        background-color: <?php echo $as_bg_color; ?>;
        background-position: center;
        background-repeat: <?php echo $as_bg_repeat; ?>;
        background-size: <?php echo $as_bg_size; ?>
    }
    body.login div{

    }
     body.login div#login {
        width: <?php echo $as_login_width; ?>px;
        padding-top: 50px;
     }
     body.login div#login p.message {
        background-color: <?php echo $as_message_bg_color ?>;
        color: <?php echo $as_message_text_color ?>;
        border-left: <?php echo $as_message_border_width; ?>px solid <?php echo $as_message_border_color ?>;
     }
     body.login div#login h1 {}
     body.login div#login h1 a {}
     body.login div#login form {
        background-color: <?php echo $as_box_color; ?>;
     }
     body.login div#login form#loginform p {}
     body.login div#login form p label,body.login div#login form p  {
        color: <?php echo $as_text_color ?>;
     }
     body.login div#login form input.input {
        background-color: <?php echo $as_login_input_color ?>;
        color: <?php echo $as_login_input_text_color ?>;
     }
     body.login div#login form#loginform input#user_login {}
     body.login div#login form#loginform input#user_pass {}
     body.login div#login form#loginform p.forgetmenot {}
     body.login div#login form#loginform p.forgetmenot input#rememberme {}
     body.login div#login form#loginform p.submit {}

     body.login div#login form p.submit input#wp-submit {
background-color: <?php echo $as_button_color; ?>;
border-color: <?php echo $as_button_border_color; ?>;

     }
     body.login div#login form p.submit input#wp-submit:hover {
background-color: <?php echo $as_button_hover_color; ?>;
     }

     body.login div#login p#nav {
        text-align: center;
     }
     body.login div#login p#nav a {
        text-align: center;
     }
     body.login div#login p#nav, body.login div#login p#nav a,body.login div#login p#backtoblog a {
        display: <?php echo $as_other_link; ?>;
        color:<?php echo $as_login_other_link_color; ?>;
        font-size: <?php echo $as_login_other_link_fz; ?>px;
     }
     body.login div#login p#nav a:hover,body.login div#login p#backtoblog a:hover {
        color:<?php echo $as_login_other_link_hv_color; ?>;
     }
     body.login div#login p#backtoblog {
        text-align: center;
     }
     body.login div#login p#backtoblog a {}
    </style>

<?php }
add_action( 'login_enqueue_scripts', 'as_login_logo' );

// home url

function as_login_logo_url_change() {
    $as_opt = (array)get_option('as_opt_save');
    $as_logo_url = $as_opt['as_login_url'];
    if (isset($as_logo_url) === true) {
        return esc_url($as_logo_url);
    }else{
        return home_url();
    }
}
add_filter( 'login_headerurl', 'as_login_logo_url_change' );

// logo title

function as_login_logo_url_title_change() {
    $as_opt = (array)get_option('as_opt_save');
    $as_logo_url = $as_opt['as_login_title'];
    if (isset($as_logo_url) === true) {
        return $as_logo_url;
    }
}
add_filter( 'login_headertitle', 'as_login_logo_url_title_change' );
