<?php

/***********************************************************************
* Class: ADPRESS_AdminUI
*
* Provides various UI functions when someone is an admin on the WP site.
*
************************************************************************/

if (! class_exists('ADPRESS_AdminUI')) {
    class ADPRESS_AdminUI {
        
        /******************************
         * PUBLIC PROPERTIES & METHODS
         ******************************/
        /** Adpress main plugin */
        public $parent = null;

        /**
         * The Constructor
         */
        function __construct() {
            $this->setParent();
        }

        /**
         * Set the parent property to point to the primary plugin object.
         *
         * Returns false if we can't get to the main plugin object.
         *
         * @global wpCSL_plugin__slplus $slplus_plugin
         * @return type boolean true if plugin property is valid
         */
        function setParent() {
            if (!isset($this->parent) || ($this->parent == null)) {
                $this->parent = $GLOBALS['AdPress'];
            }
            return (isset($this->parent) && ($this->parent != null));
        }        


        /**
         *
         */
        function ProSettings() {

            $ProPackMsg = (!$this->parent->wpcsl->propack_enabled           ?
                    ' ' . __('This is a Pro Pack feature.', ADPRESS_PREFIX) :
                    ''
                );

            $this->parent->wpcsl->settings->add_section(
               array(
                   'name' => 'Pro Pack',
                   'description' => __('Extended settings available for licensed Pro Pack users.',ADPRESS_PREFIX) .
                                '<span style="float:right;">(<a href="#" onClick="'.
                                'jQuery.post(ajaxurl,{action: \'license_reset_propack\'},function(response){alert(response);});'.
                                '">'.__('Delete license',ADPRESS_PREFIX).'</a>)</span>'
                        ,
                   'start_collapsed' => false
               )
            );
            $this->parent->wpcsl->settings->add_item(
                       __('Pro Pack', ADPRESS_PREFIX),
                       __('Ad ID', ADPRESS_PREFIX),
                       'adid',
                       'text',
                       false,
                       __('If no ad ID is specified, show this ad.', ADPRESS_PREFIX) .  $ProPackMsg,
                       null,
                       null,
                       !$this->parent->wpcsl->propack_enabled
              );
            $this->parent->wpcsl->settings->add_item(
                   __('Pro Pack', ADPRESS_PREFIX),
                   __('Ad Shorthand', ADPRESS_PREFIX),
                   'shorthand',
                   'text',
                   false,
                   __('If no ad ID is specified, show this ad. ID takes precedence.', ADPRESS_PREFIX) .  $ProPackMsg,
                   null,
                   null,
                   !$this->parent->wpcsl->propack_enabled
            );
        }
    }
}        
     

