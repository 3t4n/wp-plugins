<?php

/******************************************************************
/* Install the DB Table
******************************************************************/


function appten_imagerotator_db_install() {
	global $wpdb;
	global $installed_appten_imagerotator_version;
	global $appten_imagerotator_version;

	if ($installed_appten_imagerotator_version != $appten_imagerotator_version) {		
		$table_name = $wpdb->prefix . "appten_imagerotator";
		$sql = "CREATE TABLE " . $table_name . " (
  		`id` int(5) NOT NULL AUTO_INCREMENT,
		`width` int(5) NOT NULL,
  		`height` int(5) NOT NULL,
  		`music` varchar(255) NOT NULL,
  		`volumeLevel` int(3) NOT NULL,
  		`transition` varchar(20) NOT NULL,
  		`autoRotate` tinyint(4) NOT NULL,
  		`interval` int(5) NOT NULL,
  		`cornerRad` int(5) NOT NULL,
  		`navMode` varchar(20) NOT NULL,
  		`navType` varchar(20) NOT NULL,
  		`navBgColor` varchar(8) NOT NULL,
  		`navIcnColor` varchar(8) NOT NULL,
  		`navCornerRad` int(5) NOT NULL,
  		`navMarginRight` int(5) NOT NULL,
  		`navMarginBottom` int(5) NOT NULL,
  		`nbrButtons` tinyint(4) NOT NULL,
  		`backButton` tinyint(4) NOT NULL,
  		`volume` tinyint(4) NOT NULL,
  		`playPause` tinyint(4) NOT NULL,
  		`fullScreen` tinyint(4) NOT NULL,
  		`timerClock` tinyint(4) NOT NULL,
  		`show` varchar(255) NOT NULL,
  		`preview` text NOT NULL,
  		`link` 	text NOT NULL,
  		`w_type` text NOT NULL,
  		`message` longtext NOT NULL,
		UNIQUE KEY (`id`)
		);";
   		$wpdb->query($sql);
   		
		add_option( "appten_imagerotator_version", $appten_imagerotator_version );
	}
}


    
?>