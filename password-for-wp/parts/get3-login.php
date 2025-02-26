<?php
    global $wp_version;
    $statusPass = get_option('g3_password_status');
    $analysePass = get_option('g3_password_pass');
    $error = '';

    if (isset($_COOKIE['accessPassword']) && $_COOKIE['accessPassword'] !== $analysePass) {
        setcookie('accessPassword', '', time() - 3600, '/', '', is_ssl(), true);
    }
    
    if (isset($_POST['passw10'])) {
        $passTime = sanitize_text_field($_POST['passw10']);
        if ($passTime === $analysePass) {
            setcookie('accessPassword', $analysePass, time() + (86400 * 30), '/', '', is_ssl(), true);
            wp_safe_redirect(home_url());
            exit;
        } else {
            $error = __('Incorrect password', 'password-for-wp');
        }
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php the_title(); ?></title>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap&subset=latin-ext);body,html{min-height:100%;height:100%}body{background:#fff;padding:0;margin:0;font-family:Roboto,sans-serif;line-height:1.4em}#get3_login_page{position:fixed;height:100%;width:100%;z-index:99999;background-size:cover;background-repeat:no-repeat;font-family:Roboto,sans-serif;font-size:15px;color:#2d2d2d;display:flex;justify-content:center;align-items:center}.welcome{border:1px solid #dedede;max-width:520px;background:#fff;padding:40px 35px}.row .logo{color:#2d2d2d;-webkit-transition:.2s ease-in-out all;-o-transition:.2s ease-in-out all;transition:.2s ease-in-out all;text-decoration:none;font-family:Roboto,sans-serif;font-size:15px;margin:0}.row .logo span{-webkit-transition:.6s ease-in-out all;-o-transition:.6s ease-in-out all;transition:.6s ease-in-out all;color:#ff4500;-webkit-transition-delay:.4s;-o-transition-delay:.4s;transition-delay:.4s;font-family:Roboto,sans-serif}.row .w1{font-size:20px;color:#ff4500;margin-bottom:25px;border:0;width:100%;border-bottom:1px solid #e6e6e6;padding-bottom:5px}.row h2{font-size:38px;line-height:1.6em;margin:0}.row h3{font-size:28px;line-height:1.4em;margin:0}.footer{margin-top:auto;margin-bottom:30px;align-items:center}.btn-accept{background:#ff4500;color:#fff;-webkit-transition:.2s ease-in-out all;-o-transition:.2s ease-in-out all;transition:.2s ease-in-out all;border:1px solid #ff4500;min-width:210px;height:35px;font-size:15px;-webkit-transition:.2s ease-in-out all;-o-transition:.2s ease-in-out all;transition:.2s ease-in-out all;cursor:pointer}.inp{margin-top:30px}.btn-accept:hover{-webkit-transition:.2s ease-in-out all;-o-transition:.2s ease-in-out all;transition:.2s ease-in-out all;border:1px solid #e6e6e6;background:#fff;color:#2d2d2d}input[type=password]:focus{box-shadow:none;outline-width:0;border:0;border-bottom:3px solid #ff4500}button:focus{box-shadow:none;outline-width:0;border:0}.errors{color:red}.dashicons-admin-network:before{font-family:dashicons!important;content:"\f112"}@media (min-width:1000px){.welcome{min-width:580px}}@media screen and (max-width:999px){.welcome{border:0 solid #dedede;max-width:100%;min-height:300px;background:#fff;padding:40px 35px}#get3_login_page{position:absolute;background:#fff;display:block}body{background:#fff}.row h2{font-size:30px;line-height:1.3em;margin:0 0 20px 0}.row h3{font-size:20px;line-height:1.4em;margin:0}.btn-accept{width:100%}}
    </style>
</head>
<body style="background-color:<?php echo get_option('g3_color_text'); ?>;">
    <div id="get3_login_page">
        <div class="welcome">
        <form method="post" action="">
                <div class="row">
                    <p class="logo"><?php echo __('Password protected. ','password-for-wp'); ?> <span class="lh-beta"><?php echo __('You must log in.','password-for-wp'); ?></span></p>
                </div>
                <div class="row inp">
                    <div class="errors"><?php if($error != '') { echo $error; } ?></div>
                    <input type="password" name="passw10" class="w1" autofocus>
                </div>
                <div class="footer">
                <button class="button btn-accept"><?php echo __('Log in','password-for-wp'); ?></button>
                </div>
                <div class="row">
                    <h2><?php echo get_option('g3_text1'); ?></h2>
                    <h3><?php echo get_option('g3_text2'); ?></h3>
                </div>
        </form>
        </div>
    </div>
</body>
</html>
