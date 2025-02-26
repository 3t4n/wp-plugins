<?php

function AWMT_handlerMaintenance()
{
    //da sistemare
    $isAdminLogged = is_user_logged_in() && is_admin();
    $isLoginPage = $GLOBALS['pagenow'] === 'wp-login.php';

    // Se l'admin non è loggato e la pagina corrente non è quella di login
    if (!$isAdminLogged && !$isLoginPage) {
        if($_SERVER['REQUEST_URI']=="/wp-admin/"){
            wp_redirect(home_url('wp-login.php'));
        }else{
          $message = "<h1>".esc_html(__('Site under maintenance','aruba-wp-migration-tool'))."</h1><p>".esc_html(__('Maintenance operations are underway on this site','aruba-wp-migration-tool'))."</p>";
          wp_die(wp_kses_post($message),esc_html(__('Site under maintenance','aruba-wp-migration-tool')));
        }
    }
}
