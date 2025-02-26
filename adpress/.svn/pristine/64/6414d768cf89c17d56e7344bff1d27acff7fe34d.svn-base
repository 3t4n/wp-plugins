<?php

/***********************************************************************
* Class: ADPRESS_Admin_Filters
*
* The admin panel filters.
*
* The methods in here are normally called from an filters hook that is
* called via the WordPress filter stack.  
* 
* See http://codex.wordpress.org/Plugin_API/Action_Reference
*
************************************************************************/

if (! class_exists('ADPRESS_Admin_Filters')) {
    class ADPRESS_Admin_Filters {
        
        /******************************
         * PUBLIC PROPERTIES & METHODS
         ******************************/
        /** Adpress main plugin */
        var $adpress;

        /*************************************
         * The Constructor
         */
        function __construct() {
            $this->adpress = $GLOBALS['AdPress'];
        }
        
        /*************************************
         * method: adpress_ad_columns
         */                        
        function adpress_ad_columns($columns) {
            return 
                array(
                    'id'            => __('ID', $this->adpress->prefix)          ,
                    'shorthand'     => __('Shorthand', $this->adpress->prefix)  ,
                    'title'         => __('Name', $this->adpress->prefix)       ,
                    'graphic'       => __('Graphic',$this->adpress->prefix),
                    'destination'   => __('Destination', $this->adpress->prefix),
                    'status'        => __('Status', $this->adpress->prefix),
                    'date'          => __('Date', $this->adpress->prefix)
                );
        }       
    }
}        
     

