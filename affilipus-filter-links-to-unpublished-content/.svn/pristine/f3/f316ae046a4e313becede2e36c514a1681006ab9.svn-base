<?php

namespace imbaa\AffilipusLinkfilter\Routines;


class init {


    public function __construct(){


        if(AFFILIPUS_LINKFILTER_VERSION != get_option('affilipus_linkfilter_version')){


            $this -> upgrade();

        }

        if(is_admin()){


            /** ToDo: Enable as soon as there is an options page available to create global filtering. */
            new \imbaa\AffilipusLinkfilter\Admin\linkFilter();

        }
        else {

            new \imbaa\AffilipusLinkfilter\Output\linkFilter();
            new \imbaa\AffilipusLinkfilter\Output\shortCodes();

        }


    }


    public function upgrade(){


        global $wpdb;

        $wpdb -> query("TRUNCATE {$wpdb->prefix}affilipus_linkfilter;");


        update_option( 'affilipus_linkfilter_version', AFFILIPUS_LINKFILTER_VERSION, true );



    }


}