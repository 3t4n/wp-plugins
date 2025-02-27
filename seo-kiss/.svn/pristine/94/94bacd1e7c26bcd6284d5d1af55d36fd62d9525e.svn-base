<?php

if ( class_exists( 'MeowPro_SeoKissCore' ) && class_exists( 'Meow_SeoKissCore' ) ) {
	function seo_kiss_thanks_admin_notices() {
		echo '<div class="error"><p>' . __( 'Thanks for installing the Pro version of SEO Kiss :) However, the free version is still enabled. Please disable or uninstall it.', 'media-cleaner' ) . '</p></div>';
	}
 
	add_action( 'admin_notices', 'seo_kiss_thanks_admin_notices' );
	return;
}

spl_autoload_register(function ( $class ) {
  $necessary = true;
  $file = null;
  if ( strpos( $class, 'Meow_SeoKiss' ) !== false ) {
    $file = SEOKISS_PATH . '/classes/' . str_replace( 'meow_seokiss', '', strtolower( $class ) ) . '.php';
  }
  else if ( strpos( $class, 'MeowCommon_' ) !== false ) {
    $file = SEOKISS_PATH . '/common/' . str_replace( 'meowcommon_', '', strtolower( $class ) ) . '.php';
  }
  else if ( defined( "SEOKISS_PRO" ) && strpos( $class, 'MeowCommonPro_' ) !== false ) {
    $file = SEOKISS_PATH . '/common/premium/' . str_replace( 'meowcommonpro_', '', strtolower( $class ) ) . '.php';
  }
  else if ( strpos( $class, 'MeowPro_SeoKiss' ) !== false ) {
    $necessary = false;
    $file = SEOKISS_PATH . '/premium/' . str_replace( 'meowpro_seokiss', '', strtolower( $class ) ) . '.php';
  }
  else if ( strpos( $class, 'Meow_Modules' ) !== false ) {
    $file = SEOKISS_PATH . '/classes/modules/' . str_replace( 'meow_modules_seokiss_', '', strtolower( $class ) ) . '.php';
  }
  if ( $file ) {
    if ( !$necessary && !file_exists( $file ) ) {
      return;
    }
    require( $file );
  }
});

//require_once( SEOKISS_PATH . '/classes/api.php');
require_once( SEOKISS_PATH . '/common/helpers.php');


global $SeoKissCore;
$SeoKissCore = new Meow_SeoKissCore();

?>