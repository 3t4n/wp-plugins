<?php
    global $wpdb;
    $table_name_animated_Accordion_content = $wpdb->prefix . 'animated_accordion_panels';
    $table_name_animated_Accordion = $wpdb->prefix . 'animated_accordion';
	$table_parameters=$wpdb->prefix . 'ata_parameters';
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    if ($wpdb->get_var('SHOW TABLES LIKE ' . $table_name_animated_Accordion_content) != $table_name_animated_Accordion_content) {
        $charset_collate = $wpdb->get_charset_collate();
        $sql1 = "CREATE TABLE $table_name_animated_Accordion_content(
	 id int NOT NULL AUTO_INCREMENT ,
	 name varchar(20) NOT NULL,
	 title varchar(100) NOT NULL,
	 text  varchar(10000) NOT NULL,
	 image varchar(200) NULL,
	 image_float varchar(20) NOT NULL,
	 titleBgColor varchar(200) NULL,
	 contentBgColor varchar(200) NULL,
	 ImageSize varchar(200) NULL,
	 titleFontSize varchar(200) NULL,
	 contentFontSize varchar(200) NULL,
	 titleSectionHeight varchar(200) NULL,
	 titleFontColor varchar(200) NULL,
	 contentFontColor varchar(200) NULL,
	 contentBorder varchar(200) NULL,
         titleBorder varchar(200) NULL,
	 UNIQUE KEY id (id),
	 PRIMARY KEY(id),
	 id_ata_id int  NOT NULL,
     KEY par_ind (id_ata_id)
	)$charset_collate;";

        dbDelta($sql1);
    }
    if ($wpdb->get_var('SHOW TABLES LIKE ' . $table_name_animated_Accordion) != $table_name_animated_Accordion) {
        $charset_collate = $wpdb->get_charset_collate();
        $sql2 = "CREATE TABLE $table_name_animated_Accordion(
	 ata_id int NOT NULL AUTO_INCREMENT,
	 ata_name varchar(100) NOT NULL,
	 UNIQUE KEY id (ata_id),
	 PRIMARY KEY(ata_id)
	  
	)$charset_collate;";

        dbDelta($sql2);
    }
    $sql = "ALTER TABLE " . $table_name_animated_Accordion_content . " ADD FOREIGN KEY (id_ata_id) REFERENCES " . $table_name_animated_Accordion . "(ata_id)
    ON DELETE CASCADE;";
    $wpdb->query($sql);
	
    /*if ($wpdb->get_var('SHOW TABLES LIKE ' . $table_parameters) != $table_parameters) {
        $charset_collate = $wpdb->get_charset_collate();
        $sql3 = "CREATE TABLE $table_parameters(
	 id int NOT NULL AUTO_INCREMENT ,
	 name varchar(100) NOT NULL,
	 value varchar(100) NOT NULL,
	 type varchar(20) NOT NULL,
	 UNIQUE KEY id (id),
	 PRIMARY KEY(id)
	
	)$charset_collate;";

        dbDelta($sql3);
    }
*/