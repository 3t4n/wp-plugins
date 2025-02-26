<?php

namespace FeatherLoginPagePro;

add_action( "plugins_loaded", function() {
    
    loadClasses();

    do_action( "ftlpp_loaded" );

} );


function loadClasses() {

    require( Config::getAdminPath() . "custom-login-url.php" );
    require( Config::getAdminPath() . "expirable-login-link.php" ); 
    require( Config::getAdminPath() . "limit-login-attempts.php" );

    CustomLoginURL::getInstance()->setupExtension();
    ExpirableLoginLink::getInstance()->setupExtension();
    LimitLoginAttempts::getInstance()->setupExtension();

}







  