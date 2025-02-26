<?php

/***********************************************************************
* Class: ADPRESS_Actions
*
* The action hooks and helpers.
*
* The methods in here are normally called from an action hook that is
* called via the WordPress action stack.  
* 
* See http://codex.wordpress.org/Plugin_API/Action_Reference
*
************************************************************************/

if (! class_exists('ADPRESS_Actions')) {
    class ADPRESS_Actions {
        
        /******************************
         * PUBLIC PROPERTIES & METHODS
         ******************************/
        /** Adpress Plugin */
        var $adpress;

        /*************************************
         * The Constructor
         */
        function __construct() {
            $this->adpress = $GLOBALS['AdPress'];
        }
        
        
        /**************************************
         ** method: init()
         **
         ** Called when the WordPress init action is processed.
         **          
         ** WordPress builtin post types:
         ** 
         ** post - WordPress built-in post type
         ** page - WordPress built-in post type
         ** mediapage - WordPress built-in post type
         ** attachment - WordPress built-in post type
         ** revision - WordPress built-in post type
         ** nav_menu_item - WordPress built-in post type (Since 3.0)
         ** custom post type - any custom post type (Since 3.0)          
         **
         **/
        function init() {
            
            // Register Store Pages Custom Type
            register_post_type( 'adpress_ad',
                array(
                    'labels' => array(
                        'name'              => __( 'AdPress Ads', $this->adpress->prefix ),
                        'singular_name'     => __( 'AdPress Ad', $this->adpress->prefix ),
                        'add_new'           => __('Create An Ad', $this->adpress->prefix),
                        'add_new_item'      => __('Create New Ad', $this->adpress->prefix),
                        'edit_item'         => __('Edit Ad', $this->adpress->prefix),
                        'view_item'         => __('View Ad', $this->adpress->prefix),
                        'search_items'      => __('Search Ads', $this->adpress->prefix),
                        'not_found'         => __('No ads found.', $this->adpress->prefix),
                        'not_found_in_trash'=> __('No ads found in trash.', $this->adpress->prefix),
                        'all_items'         => __('List Ads', $this->adpress->prefix),
                    ),
                'public'            => true,
                'has_archive'       => true,
                'description'       => __('AdPress ads.',$this->adpress->prefix),
                'menu_postion'      => 20,   
                'menu_icon'         => $this->adpress->plugin_url . '/images/adpress_menuicon_16x16.png',
                'capability_type'   => 'page',
                'supports'          => 
                    array(
                            'title',
                            'revisions',
                            'thumbnail'
                        ),
                )
            );                
            
            // Register Stores Taxonomy
            //                
            register_taxonomy(
                    'ads',
                    'ad',
                    array (
                        'hierarchical'  => true,
                        'labels'        => 
                            array(
                                    'menu_name' => __('AdPress Ads',$this->adpress->prefix),
                                    'name'      => __('Ad Attributes',$this->adpress->prefix),
                                 )
                        )
                );                
        }        
    }
}        
     

