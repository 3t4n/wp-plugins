<?php

namespace imbaa\AffilipusLinkfilter\Routines;

class activation {

    public function __construct(){


        register_activation_hook( AFFILIPUS_LINKFILTER_DIR.'/affilipus-linkfilter.php', [$this,'create_tables'] );


    }

    public function create_tables(){

        global $wpdb;

        $tables = [

            "  CREATE TABLE `{$wpdb->prefix}affilipus_linkfilter` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
              `status_code` int(11),
              `last_check` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (`id`),
              KEY `last_check` (`last_check`),
              KEY `url` (`url`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;"

        ];


        if(defined('ABSPATH')){

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            foreach($tables as $sql){




                dbDelta($sql);

            }

        }


    }

}