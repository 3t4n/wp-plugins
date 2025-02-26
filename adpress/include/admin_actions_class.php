<?php

/***********************************************************************
* Class: ADPRESS_Admin_Actions
*
* The action hooks and helpers.
*
* The methods in here are normally called from an action hook that is
* called via the WordPress action stack.  
* 
* See http://codex.wordpress.org/Plugin_API/Action_Reference
*
************************************************************************/

if (! class_exists('ADPRESS_Admin_Actions')) {
    class ADPRESS_Admin_Actions {
        
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
            $this->parent = $this->adpress;
        }
        
        /*************************************
         * method: admin_init
         */        
        function admin_init() {
            // AdPress Ad Interface Extra Data
            // *should we check we are on adpress create ad page first?*
            //
            add_meta_box('render_content_area_ui', __('Ad Information',$this->adpress->prefix), 
                array('ADPRESS_Ad_EditUI','render_content_area_ui')  , 
                'adpress_ad', 'normal', 'high'
                );            
            
            // WordPress Built-In Image Box
            add_meta_box('postimagediv', __('Ad Graphic',$this->adpress->prefix), 
                'post_thumbnail_meta_box', 
                'adpress_ad', 'normal', 'core');

            require_once($this->parent->plugin_dir . 'include/admin_ui_class.php');
            $this->parent->AdminUI = new ADPRESS_AdminUI();
            
            // Pro Pack
            //
            if ($this->parent->wpcsl->propack_enabled) {
                $this->parent->AdminUI->ProSettings();
            }
        }            
        
        /**
        * Creates a settings page
        * @param mixed $tabs Currently existing tabs
        * @return mixed the array of new tabs
        */
        function settings($tabs) {
            // Add sections to our AdPress Plugin
            // *This is only called when visible*
            //

            $tabs['Settings'] = array (             // The tab to add - can be any arbitrary name
                'name'          => 'Settings',      // The display name to show the world (Will be automagically translated)
                'content'       => array(           // An array of sections
                    'default settings' => array(    // The section to create
                        'name'              => 'Default Settings',
                        'description'       => 'Set the default values for shortcodes and widgets. These settings are optional.',
                        'start_collapsed'   => false,
                        'items'             => array(   // An array of items
                            'adid'          => array(
                                'display_name'      => 'Ad ID',
                                'name'              => 'adid',
                                'type'              => 'text',
                                'required'          => false,
                                'description'       => 'If no ID is specified, show this ad.  A Pro Pack feature.',
                                'custom'            => null,
                                'value'             => null,
                                'disabled'          => true,    //show the option grayed out
                                'action'            => null     //action to call when the option is changed (not yet implemented)
                            ),
                            'shorthand'     => array(
                                'display_name'      => 'Ad Shorthand',
                                'name'              => 'shorthand',
                                'type'              => 'text',
                                'required'          => false,
                                'description'       => 'If no ID is specified, show this ad.  A Pro Pack feature.',
                                'custom'            => null,
                                'value'             => null,
                                'disabled'          => true,
                                'action'            => null
                            )
                        )
                    )
                )
            );

            return $tabs;
        }
            
        /*************************************
         * method: admin_print_styles
         */
        function admin_print_styles() {
            global $post;
            if (
                ($this->adpress->wpcsl->isOurAdminPage ||
                    (isset($post) && ($post->post_type == 'adpress_ad'))
                ) &&            
                file_exists($this->adpress->plugin_dir.'css/admin.css')
                ) {
                    wp_enqueue_style('csl_adpress_admin_css', $this->adpress->plugin_url .'/css/admin.css'); 
            }
        } 
        
        /*************************************
         * method: manage_posts_custom_column
         */
        function manage_posts_custom_column($column)
        {
            global $post;
            switch ($column) {
                case 'id':
                    echo $post->ID;
                    break;
                case 'shorthand':
                    echo $post->post_name;
                    break;
                case 'status':
                    echo $post->post_status;
                    break;
                case 'destination':
                    $theURL = apply_filters($this->adpress->prefix."MetaValue", $post->ID,$column);
                    echo apply_filters($this->adpress->prefix."Change Destination", $theURL, "CSA");
                    break;
                case 'graphic':                    
                    echo get_the_post_thumbnail( $post->ID);
                    break;
                default:                    
                    echo apply_filters($this->adpress->prefix."MetaValue", $post->ID,$column);
            }
        }

        /**
         *
         * @param type $theURL
         * @param type $target
         * @return type
         */
        function processDestination($theURL, $target) {
            return '<a href="'.$theURL.'" target="'.$target.'">'.$theURL.'</a>';
        }

        /*************************************
         * method: save_post
         */
        function save_post($post_id)
        {     
                        
            // User is not allowed to edit pages - skip this
            //
            if (!current_user_can( 'edit_page', $post_id )) {
                return;
            }
            
            
            // Save Ads
            //
            if (isset($_POST['post_type'])  && ('adpress_ad' == $_POST['post_type']))  {            
                ADPRESS_Ad_EditUI::save_post();
            }
        }      
        
        //------------------------------------------
        // HELPERS
        //------------------------------------------
        
        
        /*************************************
         * method: getMetaValue
         * 
         * returns the value of a meta field for a given postID
         */        
        function getMetaValue($postid,$name) {
            $custom = get_post_custom($postid);
            return (isset($custom[$this->adpress->prefix.'-'.$name])?$custom[$this->adpress->prefix.'-'.$name][0]:'');                
        }
                
    }
}        
     


/***********************************************************************
* Class: ADPRESS_Ad_EditUI
*
* The AdPress Ad Editor Management
*
* This handles the metabox display and editing.
* 
* See http://codex.wordpress.org/Plugin_API/Action_Reference
*
************************************************************************/

if (! class_exists('ADPRESS_Ad_EditUI')) {
    class ADPRESS_Ad_EditUI {
        
        /*************************************
         * method: render_content_area_ui
         */
        function render_content_area_ui() {
            $adpress = $GLOBALS['AdPress'];
            global $post;            

            // The JS to open the more info button
            //
            echo 
            '<script type="text/javascript">' .
                'jQuery(document).ready(function($) {' .
                    "$('.".$adpress->wpcsl->css_prefix."-moreicon').click(function(){".
                        "$(this).siblings('.".$adpress->wpcsl->css_prefix."-moretext').toggle();".
                        '});'.
                    '});'.         
            '</script>'
            ;            
            
            // The input boxes
            //
            print '<div class="'.$adpress->wpcsl->css_prefix.'-metabox-parent">';
            ADPRESS_Ad_EditUI::render_meta_input(
                'id',
                __('Ad ID', $adpress->prefix),
                sprintf(
                    __('The ad ID, you can use this or the permalink shorthand to display ads. [adpress id="%s"]', $adpress->prefix),
                    $post->ID                    
                    ),
                false,
                $post->ID
                );            
            ADPRESS_Ad_EditUI::render_meta_input(
                'shorthand',
                __('Ad Shorthand', $adpress->prefix),
                sprintf(
                    __('The ad shorthand. You can use this or the ad id to display ads. [adpress shorthand="%s"]', $adpress->prefix),
                    $post->post_name                 
                    ),
                false,
                $post->post_name
                );            
            ADPRESS_Ad_EditUI::render_meta_input(
                'destination',
                __('Destination', $adpress->prefix),
                __('The URL you want the ad to go to, fully qualified. (i.e. http://www.charlestonsw.com)', $adpress->prefix)
                );
            print '</div>';            
        }
        
        /*************************************
         * method: save_post
         */
        function save_post() {
            update_post_meta($_POST['ID'], $adpress->prefix.'-'.'destination', $_POST[$adpress->prefix.'-'.'destination']);            
        }    
        
        /*************************************
         * method: render_meta_input
         */
       function render_meta_input($name,$label,$description,$enabled=true,$value=null) {
            global $post;     
            $adpress = $GLOBALS['AdPress'];
            $custom = get_post_custom($post->ID);            
            if ($value == null) {
                $value = (isset($custom[$adpress->prefix.'-'.$name])?$custom[$adpress->prefix.'-'.$name][0]:'');                
            }
            print 
                '<div class="'.$adpress->wpcsl->css_prefix.'-metabox">'.
                '<div class="'.$adpress->wpcsl->css_prefix.'-input' . ($enabled?'':'-disabled').'">' .                
                    '<label>'.$label.'</label>' .
                    '<input type="text" name="'.$adpress->prefix.'-'.$name.'" value="'.$value.'" '. ($enabled?'':'disabled="disabled"').'/>' .
                    '</div>' .
                    '<div class="'.$adpress->wpcsl->css_prefix.'-moreicon" title="click for more info"><br/></div>' .
                    '<div class="'.$adpress->wpcsl->css_prefix.'-moretext">' .
                        $description .
                    '</div>' .
                '</div>'
                ;
             
         }
        
    }
}


