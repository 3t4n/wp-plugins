<?php

/*
  Plugin Name: SlideBox
  Plugin URI:
  Description: Easy Add SlideBox To Your Content.
  Author: HC
  Version: 1.0
  Author URI: http://leblogduwebmaster.fr/
 */

if(is_admin()){
    include("SlideBoxAdmin.php");
    new SlideBoxAdmin();
} else {
    include("SlideBoxFront.php");
    new SlideBoxFront();
}

?>