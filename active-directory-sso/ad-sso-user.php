<?php

    function ad_sso_get_user_id( $userid ) {
        $user = get_userdatabylogin( $userid );
        return $user->ID;
    }

    function ad_sso_get_ldap_information( $domain, $userid ) {

        $ad_sso_fqdn = get_option('ad_sso_fqdn');
        $ad_sso_ou = get_option('ad_sso_ou');

        $ad_sso_username = get_option('ad_sso_username');
        $ad_sso_password = get_option('ad_sso_password');
        $ad_sso_domain = get_option('ad_sso_domain');


        $ldapCred = $ad_sso_username . '@' . $ad_sso_fqdn;
        try {
            $connection = ldap_connect('ldap://' . $ad_sso_fqdn);
            //Set some variables
            ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);

            try {
                //Bind to the ldap directory
                $bind = ldap_bind($connection, $ldapCred, $ad_sso_password);

                //Search the directory
                $result = ldap_search($connection, $ad_sso_ou, '(samaccountname=' . $userid . ')');
                //Create result set
                $entries = ldap_get_entries($connection, $result);

                $ad_info = array("email"=>(empty($entries[0]["mail"][0]) ? $userid . '@' . $ad_sso_fqdn : $entries[0]["mail"][0]), 
                    "given_name"=>$entries[0]["givenname"][0], 
                    "sn"=>$entries[0]["sn"][0]);

                return $ad_info;
            } catch(Exception $e) {
                echo 'Caught exception binding to LDAP Directory: ',  $e->getMessage(), "<br />";
            }
        } catch(Exception $e) {
            echo 'Caught exception connecting to domain: ',  $e->getMessage(), "<br />";
        }


    }

    function ad_sso_register_new_user( $userid, $ad_info ) {
        $random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
        $user_id = wp_create_user( $userid, $random_password, $ad_info['email'] );

        // if the default role hasn't been set, default to subscriber
        $ad_sso_default_role = (strlen(get_option('ad_sso_default_role')) > 0 ? get_option('ad_sso_default_role') : 'subscriber');
        // if a value isn't set or true, default to false
        $ad_sso_show_toolbar = (get_option('ad_sso_show_toolbar') == '1' ? 'true' : 'false');

        wp_update_user(
            array (
                'ID' => ad_sso_get_user_id( $userid ),
                'first_name' => $ad_info['given_name'],
                'last_name' => $ad_info['sn'],
                'show_admin_bar_front' => $ad_sso_show_toolbar,
                'display_name' =>  $ad_info['given_name'] . ' ' . $ad_info['sn'],
                'role' => $ad_sso_default_role
            )
         );
    }

    function ad_sso_update_user( $userid, $ad_info ) {
        wp_update_user(
            array (
                'ID' => ad_sso_get_user_id( $userid ),
                'first_name' => $ad_info['given_name'],
                'last_name' => $ad_info['sn'],
                'display_name' =>  $ad_info['given_name'] . ' ' . $ad_info['sn'],
                'user_email' => $ad_info['email']
            )
         );
    }

    /*  Get domain and username of user */
    $cred = explode('\\', $_SERVER['REMOTE_USER']);
    /*  seperate domain and user variables  */
    list($ad_sso_local_domain,, $ad_sso_local_userid) = $cred;
    
    if ( is_user_logged_in() ) {
        global $current_user;
        get_currentuserinfo();
        if ( !(strtolower(trim($current_user->user_login)) === strtolower(trim($ad_sso_local_userid)))) {
            wp_logout();
        }
    }
    if ( !is_user_logged_in() ) {
        $ad_info = ad_sso_get_ldap_information( $ad_sso_local_domain, $ad_sso_local_userid );
    
        if (username_exists( $ad_sso_local_userid )) {
            ad_sso_update_user($ad_sso_local_userid, $ad_info); 

        } else {
            ad_sso_register_new_user($ad_sso_local_userid, $ad_info); 
        }
        $user_id = ad_sso_get_user_id( $ad_sso_local_userid );
        wp_set_current_user($user_id, $ad_sso_local_userid);
        wp_set_auth_cookie($user_id);
        do_action('wp_login', $ad_sso_local_userid);

    }
?>