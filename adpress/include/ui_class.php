<?php

/***********************************************************************
* Class: ADPRESS_UserInterface
*
* User Interface hooks and helpers.
*
* The shortcode and widget rendering.
*
************************************************************************/

if (! class_exists('ADPRESS_UserInterface')) {
    class ADPRESS_UserInterface {
        
        /******************************
         * PUBLIC PROPERTIES & METHODS
         ******************************/
        /** Adpress main plugin class */
        var $adpress;

        /*************************************
         * The Constructor
         */
        function __construct() {
            $this->adpress = $GLOBALS['AdPress'];
        } 

        
        /*************************************
         * method: render_shortcode
         *
         * Allows attributes:
         *
         *  id = numeric, the ID number of the ad to display
         *  shorthand = string, the shorthand id of the ad to display
         *
         */
        function render_shortcode($params=null) {

            $this->adpress->wpcsl->shortcode_was_rendered = true;

            // If we are a widget, clear blank params
            //
            if ($this->adpress->is_widget) {
                foreach ($params as $key=>$value) {
                    if ($params[$key] === '') {
                        unset($params[$key]);
                    }
                }
            }

            // Set the attributes, default or passed in shortcode
            //
            $this->adpress->Attributes = shortcode_atts(
                array(
                        'id'        => $this->adpress->wpcsl->settings->get_item('adid', -1),
                        'shorthand' => $this->adpress->wpcsl->settings->get_item('shorthand','')
                    ), 
                $params
                );
            $custom = array();

            // Use shorthand to get ID if ID not set
            //
            if ( 
                  ( ($this->adpress->Attributes['id'] < 0) ||
                    ($this->adpress->Attributes['id'] === '') 
                  ) && 
                    ($this->adpress->Attributes['shorthand'] != '')
                ){   
                $postInfo = get_posts(
                    array(
                        'post_type' => 'adpress_ad',
                        'name' => $this->adpress->Attributes['shorthand']     
                        )
                    );   
                $this->adpress->Attributes['id']  = $postInfo[0]->ID;
            }
            
            // If ID is set, use that to get custom fields
            if ($this->adpress->Attributes['id'] > 0) {
                
                // Post type is not an adpress ad - get out
                //
                if (get_post_type($this->adpress->Attributes['id']) != 'adpress_ad') { return; }

                // Get the attributes for the ad
                //
                $this->adpress->Attributes = array_merge($this->adpress->Attributes, get_post_custom($this->adpress->Attributes['id']));
                
                // Set The Image
                $this->adpress->Attributes['thumbnails'] =
                    wp_get_attachment_image_src(
                        get_post_thumbnail_id( $this->adpress->Attributes['id'] )
                    );

                // Setup The Ad
                //
                $adContent = apply_filters($this->adpress->prefix."RenderAd",
                    '<a href="'.$this->adpress->Attributes[$this->adpress->prefix.'-destination'][0].'">' .
                        '<img src="' . $this->adpress->Attributes['thumbnails'][0] . '" />'.                
                    '</a>'
                    );
                return $adContent;


            }
            
            return '';
        }
        
    }
}        
     

