<?php 
/*******************************************************************************
    Plugin Name:  Agent Storm by StormRETS
    Version:      1.2.10
    Plugin URI:   http://www.stormrets.com/plugins/wordpress
    Description:  StormRETS MLS IDX plugin for RETS, FTP and REAXML feeds. See http://www.stormrets.com for more information.
    Author:       StormRETS, Inc.
    Author URI:   http://www.stormrets.com/
    Copyright:    Copyright © 2010 StormRETS, Inc. All Rights Reserved.
*******************************************************************************/

/*******************************************************************************
    Wordpress IDX and Contact Manager Plugin
    Copyright (C) 2010-2011 StormRETS, Inc.

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*******************************************************************************/

define('AS_PLUGIN_DIRECTORY', 'agent-storm');


if( !class_exists( 'WP_Http' ) ) include_once( ABSPATH . WPINC. '/class-http.php' );

/**
 *
 */
class ASException extends Exception {
}


/**
 *
 */
class AgentStorm {
    
    /**
     * Register the Custom CSS Styles and Javascript used on the Admin pages
     */
    function adminInit() {
        
        wp_register_script('AgentStormJqueryUI', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js', array('jquery'));
        wp_register_style('AgentStormDefault', WP_PLUGIN_URL . DIRECTORY_SEPARATOR . AS_PLUGIN_DIRECTORY . '/static/css/default.css');
        wp_register_style('AgentStormJqueryUI', WP_PLUGIN_URL . DIRECTORY_SEPARATOR . AS_PLUGIN_DIRECTORY . '/static/css/custom.css');
        
        wp_enqueue_style('AgentStormDefault');
        wp_enqueue_script("thickbox");
        
        $this->detectSEOPlugins();
        
    }
    
    /**
     * Register the Admin Menu Item and add the action to load the admin styles when the page is requested
     */
    function adminRegisterMenu() {
        
        $page = add_menu_page('Agent Storm', 'Agent Storm', 'administrator', __FILE__, array(&$this, 'displayAdmin'), WP_PLUGIN_URL . DIRECTORY_SEPARATOR . AS_PLUGIN_DIRECTORY . '/static/images/icon.png');
        add_action('admin_print_styles-' . $page, array($this, 'adminLoadStyles'));
        
    }
    
    /**
     * Adds the easy insert buttons to the Add Post and Add Page Toolbars
     */
    function adminFooter() {
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_admin_footer.php';
    }
    
    /**
     * Enqueue the CSS and Javascript used on the admin pages to be loaded.
     */
    function adminLoadStyles() {
        
        // Unregister built-in jquery scripts
        //
		wp_deregister_script('jquery-ui-core'); #wp
		wp_deregister_script('jquery-ui-sortable'); #wp
		wp_deregister_script('jquery-ui-tabs'); #wp
        
        // Load new scripts
        //
        wp_enqueue_script("AgentStormJqueryUI");
        wp_enqueue_style('AgentStormJqueryUI');
        
    }
    
    /**
     * Detect various free SEO Plugins and check they are correctly configured to
     * not process generated idx plugins
     */
    function detectSEOPlugins() {
        
        // If All In One SEO Pack is detected lets check we are configured not to
        // process generate IDX pages
        //
        if (class_exists('All_in_One_SEO_Pack')) {
            $aioseop = AgentStormSettingCache::get('aioseop_options', array());
            if (array_key_exists('aiosp_ex_pages', $aioseop)) {
                $match = false;
                foreach (explode(',', $aioseop['aiosp_ex_pages']) as $item) {
                    if (!empty($item) && substr(AgentStormSettingCache::get('as_idx_propertyprefix'), 0, strlen($item)) == $item) {
                        $match = true;
                    }
                }
                if (!$match) {
                    wp_cache_set('agentstorm_admin_notice', '<strong>StormRETS</strong><br />All In One SEO Pack was detected but does not appear to be correctly configured for use with Agent Storm. Search Engine Optimization may be compromized as a result. For more information see <a href="http://www.stormrets.com/faqs/wordpress/wordpress-seo-plugin-compatibility" target="_blank">http://www.stormrets.com/faqs/wordpress/wordpress-seo-plugin-compatibility</a>');
                	add_action( 'admin_notices', array(&$this, 'displayAdminNotices'));
                }
            }
        }
        
    }
    
    function displayAdminNotices() {
		echo '<div class="error fade"><p>' . wp_cache_get('agentstorm_admin_notice') . '</p></div>';
    }
    
    /**
     * Enqueue the CSS and Javascript used on the IDX pages
     */
    function loadSiteStyles() {
        
        // Require jQuery
        //
        wp_enqueue_script("jquery");
        
        // Register the Javascript files
        //
        wp_register_script('GoogleMaps', 'http://maps.google.com/maps/api/js?sensor=false&region=US');
        wp_register_script('AgentStormMaps', 'http://www.stormrets.com/javascripts/maps/loader.js', array('jquery'));
        wp_register_script('AgentStormUndercover', WP_PLUGIN_URL . DIRECTORY_SEPARATOR . AS_PLUGIN_DIRECTORY . '/static/js/jquery.undercover.js', array('jquery'));
        
        // Register the Site Default Styles
        //
        wp_register_style('AgentStormSite', WP_PLUGIN_URL . DIRECTORY_SEPARATOR . AS_PLUGIN_DIRECTORY . '/static/css/site.css');
        wp_register_style('AgentStormSiteRed', WP_PLUGIN_URL . DIRECTORY_SEPARATOR . AS_PLUGIN_DIRECTORY . '/static/css/site-red.css');
        wp_register_style('AgentStormSiteBlue', WP_PLUGIN_URL . DIRECTORY_SEPARATOR . AS_PLUGIN_DIRECTORY . '/static/css/site-blue.css');
        wp_register_style('AgentStormSiteGrey', WP_PLUGIN_URL . DIRECTORY_SEPARATOR . AS_PLUGIN_DIRECTORY . '/static/css/site-grey.css');
        wp_register_style('AgentStormSiteBrown', WP_PLUGIN_URL . DIRECTORY_SEPARATOR . AS_PLUGIN_DIRECTORY . '/static/css/site-brown.css');
        
        // Add the correct built in stylesheets
        //
        switch (AgentStormSettingCache::get('as_usestyle', '')) {
            case '1':
                wp_enqueue_style('AgentStormSite');
                break;
            case '2':
                wp_enqueue_style('AgentStormSite');
                wp_enqueue_style('AgentStormSiteRed');
                break;
            case '3':
                wp_enqueue_style('AgentStormSite');
                wp_enqueue_style('AgentStormSiteBlue');
                break;
            case '4':
                wp_enqueue_style('AgentStormSite');
                wp_enqueue_style('AgentStormSiteGrey');
                break;
            case '5':
                wp_enqueue_style('AgentStormSite');
                wp_enqueue_style('AgentStormSiteBrown');
                break;
        }
        
        // Add the required Javascript files
        //
        wp_enqueue_script('AgentStormUndercover');
        wp_enqueue_script('GoogleMaps');
        wp_enqueue_script('AgentStormMaps');
        wp_enqueue_script('thickbox');
		
        // Add the CSS Files
        //
        wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, '1.0');
		
    }
    
    /**
     * Add various SEO headers such as the canonical link if we need to.
     */
    function siteHead() {
        if (wp_cache_get('agentstorm_canonical')) {
            echo '<link rel="canonical" href="' . wp_cache_get('agentstorm_canonical') . '" />';
        }
    }
    
    /**
     * Helper function to check if we have a valid API key and hostname
     */
    function isConfigured() {
    	return (AgentStormSettingCache::get('as_hostname', false) && AgentStormSettingCache::get('as_apikey', false));
    }
    
    /**
     * Display the Admin page used to configure the plug-in
     */
    function displayAdmin() {
        
        if (!empty($_POST)) {
            $this->saveAdmin();
        }
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_admin.php';
        
    }
    
    /**
     * Called on Form Postback to save the admin settings
     */
    function saveAdmin() {
        
        $as = new AgentStormRequest(AgentStormSettingCache::get('as_hostname'), AgentStormSettingCache::get('as_apikey'));
        
        // Save the Settings Variables
        //
        if (isset($_POST['as_settings_save'])) {
            
            // Save the Options
            //
            if (isset($_POST['as_usestyle'])) {
                AgentStormSettingCache::set('as_usestyle', $_POST['as_usestyle']);
            }
            if (isset($_POST['as_hostname'])) {
				if (substr($_POST['as_hostname'], -1) !== '/') {
					AgentStormSettingCache::set('as_hostname', $_POST['as_hostname'].'/');
				} else {
					AgentStormSettingCache::set('as_hostname', $_POST['as_hostname']);
				}
            }
            if (isset($_POST['as_pipelining'])) {
                AgentStormSettingCache::set('as_pipelining', true);
            } else {
                AgentStormSettingCache::set('as_pipelining', false);
            }
            
            // Force and Update of the Cities database
            //
            $as_tags = $as->getTags();
            AgentStormSettingCache::set('as_tags', $as_tags->Tags);
            
            // Force update of the Property Metadata
            //
            $as_metadata = $as->getPropertyMetaData();
            AgentStormSettingCache::set('as_metadata', $as_metadata->MetaData);
            
            // If we have previously selected a tag and it does not exist in the current 
            // dataset (maybe we switched hostnames) then reset the flag.
            //
            if (AgentStormSettingCache::get('as_idx_settings_tag', '') != '') {
                $tag_exists = false;
                foreach ($as_tags->Tags as $tag) {
                    if (AgentStormSettingCache::get('as_idx_settings_tag', '') == $tag->Name) {
                        $tag_exists = true;
                    }
                }
                if (!$tag_exists) AgentStormSettingCache::set('as_idx_settings_tag', '');
            }
            
            // Get the cities
            //
            AgentStormSettingCache::set('as_cities', $as->getCities());
            
            // Schedule the Cities and Tags caches to be refreshed hourly
            //
            agentstorm_hourly();
            
        }
        
        // Save the Contact Manager Settings
        //
        if (isset($_POST['as_contact_save'])) {
            if (isset($_POST['as_contact_loginhook']) && !empty($_POST['as_contact_loginhook'])) {
                AgentStormSettingCache::set('as_contact_loginhook', '1');
            } else {
                AgentStormSettingCache::set('as_contact_loginhook', '0');
            }
            if (isset($_POST['as_contact_emailnotification']) && !empty($_POST['as_contact_emailnotification'])) {
                AgentStormSettingCache::set('as_contact_emailnotification', '1');
            } else {
                AgentStormSettingCache::set('as_contact_emailnotification', '0');
            }
            if (isset($_POST['as_contact_emaillogin']) && !empty($_POST['as_contact_emaillogin'])) {
                AgentStormSettingCache::set('as_contact_emaillogin', '1');
            } else {
                AgentStormSettingCache::set('as_contact_emaillogin', '0');
            }
            if (isset($_POST['as_contact_emailregister']) && !empty($_POST['as_contact_emailregister'])) {
                AgentStormSettingCache::set('as_contact_emailregister', '1');
            } else {
                AgentStormSettingCache::set('as_contact_emailregister', '0');
            }
            if (isset($_POST['as_contact_tags'])) {
                AgentStormSettingCache::set('as_contact_tags', $_POST['as_contact_tags']);
            }
            if (isset($_POST['as_contact_source'])) {
                AgentStormSettingCache::set('as_contact_source', $_POST['as_contact_source']);
            }
			if (isset($_POST['as_contact_lightbox_header'])) {
				AgentStormSettingCache::set('as_contact_lightbox_header', $_POST['as_contact_lightbox_header']);
			}
        }
        
        // Save the IDX Data Settings
        //
        if (isset($_POST['as_idx_save'])) {
            if (isset($_POST['as_idx_template_result'])) {
                AgentStormSettingCache::set('as_idx_template_result', $_POST['as_idx_template_result']);
            }
            if (isset($_POST['as_idx_template_property'])) {
                AgentStormSettingCache::set('as_idx_template_property', $_POST['as_idx_template_property']);
            }
            if (isset($_POST['as_idx_template_noresults'])) {
                AgentStormSettingCache::set('as_idx_template_noresults', $_POST['as_idx_template_noresults']);
            }
            if (isset($_POST['as_page_title']) && !empty($_POST['as_page_title'])) {
                AgentStormSettingCache::set('as_page_title', '1');
            } else {
                AgentStormSettingCache::set('as_page_title', '0');
            }
            if (isset($_POST['as_force_login']) && !empty($_POST['as_force_login'])) {
                AgentStormSettingCache::set('as_force_login', '1');
            } else {
                AgentStormSettingCache::set('as_force_login', '0');
            }
            if (isset($_POST['as_requestshowing_button']) && !empty($_POST['as_requestshowing_button'])) {
                AgentStormSettingCache::set('as_requestshowing_button', '1');
            } else {
                AgentStormSettingCache::set('as_requestshowing_button', '0');
            }
            if (isset($_POST['as_requestshowing_link'])) {
                AgentStormSettingCache::set('as_requestshowing_link', $_POST['as_requestshowing_link']);
            } else {
                AgentStormSettingCache::set('as_requestshowing_link', '');
            }
            if (isset($_POST['as_idx_punctuation']) && !empty($_POST['as_idx_punctuation'])) {
                AgentStormSettingCache::set('as_idx_punctuation', $_POST['as_idx_punctuation']);
            } else {
                AgentStormSettingCache::set('as_idx_punctuation', '0');
            }
            if (isset($_POST['as_idx_linkstate']) && !empty($_POST['as_idx_linkstate'])) {
                AgentStormSettingCache::set('as_idx_linkstate', $_POST['as_idx_linkstate']);
            } else {
                AgentStormSettingCache::set('as_idx_linkstate', '0');
            }
            if (isset($_POST['as_idx_schools']) && !empty($_POST['as_idx_schools'])) {
                AgentStormSettingCache::set('as_idx_schools', $_POST['as_idx_schools']);
            } else {
                AgentStormSettingCache::set('as_idx_schools', '0');
            }
            if (isset($_POST['as_idx_gmap']) && !empty($_POST['as_idx_gmap'])) {
                AgentStormSettingCache::set('as_idx_gmap', '1');
            } else {
                AgentStormSettingCache::set('as_idx_gmap', '0');
            }
            if (isset($_POST['as_idx_bview']) && !empty($_POST['as_idx_bview'])) {
                AgentStormSettingCache::set('as_idx_bview', '1');
            } else {
                AgentStormSettingCache::set('as_idx_bview', '0');
            }
            if (isset($_POST['as_idx_walkscore'])) {
                AgentStormSettingCache::set('as_idx_walkscore', $_POST['as_idx_walkscore']);
            }
            if (isset($_POST['as_idx_searchtxt'])) {
                AgentStormSettingCache::set('as_idx_searchtxt', $_POST['as_idx_searchtxt']);
            }
        }
        
        // Save the IDX Data Settings
        //
        if (isset($_POST['as_idx_settings_save'])) {
            if (isset($_POST['as_idx_settings_field_type']) && !empty($_POST['as_idx_settings_field_type'])) {
                AgentStormSettingCache::set('as_idx_settings_field_type', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_field_type', '0');
            }
            if (isset($_POST['as_idx_settings_field_suburbzip']) && !empty($_POST['as_idx_settings_field_suburbzip'])) {
                AgentStormSettingCache::set('as_idx_settings_field_suburbzip', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_field_suburbzip', '0');
            }
            if (isset($_POST['as_idx_settings_field_subdivision']) && !empty($_POST['as_idx_settings_field_subdivision'])) {
                AgentStormSettingCache::set('as_idx_settings_field_subdivision', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_field_subdivision', '0');
            }
            if (isset($_POST['as_idx_settings_field_price']) && !empty($_POST['as_idx_settings_field_price'])) {
                AgentStormSettingCache::set('as_idx_settings_field_price', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_field_price', '0');
            }
            if (isset($_POST['as_idx_settings_field_bedrooms']) && !empty($_POST['as_idx_settings_field_bedrooms'])) {
                AgentStormSettingCache::set('as_idx_settings_field_bedrooms', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_field_bedrooms', '0');
            }
            if (isset($_POST['as_idx_settings_field_bathrooms']) && !empty($_POST['as_idx_settings_field_bathrooms'])) {
                AgentStormSettingCache::set('as_idx_settings_field_bathrooms', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_field_bathrooms', '0');
            }
            if (isset($_POST['as_idx_settings_field_lotsize']) && !empty($_POST['as_idx_settings_field_lotsize'])) {
                AgentStormSettingCache::set('as_idx_settings_field_lotsize', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_field_lotsize', '0');
            }
            if (isset($_POST['as_idx_settings_field_size']) && !empty($_POST['as_idx_settings_field_size'])) {
                AgentStormSettingCache::set('as_idx_settings_field_size', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_field_size', '0');
            }
            if (isset($_POST['as_idx_settings_field_shortsale']) && !empty($_POST['as_idx_settings_field_shortsale'])) {
                AgentStormSettingCache::set('as_idx_settings_field_shortsale', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_field_shortsale', '0');
            }
            if (isset($_POST['as_idx_settings_field_foreclosure']) && !empty($_POST['as_idx_settings_field_foreclosure'])) {
                AgentStormSettingCache::set('as_idx_settings_field_foreclosure', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_field_foreclosure', '0');
            }
            if (isset($_POST['as_idx_settings_classes_res']) && !empty($_POST['as_idx_settings_classes_res'])) {
                AgentStormSettingCache::set('as_idx_settings_classes_res', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_classes_res', '0');
            }
            if (isset($_POST['as_idx_settings_classes_com']) && !empty($_POST['as_idx_settings_classes_com'])) {
                AgentStormSettingCache::set('as_idx_settings_classes_com', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_classes_com', '0');
            }
            if (isset($_POST['as_idx_settings_classes_lnd']) && !empty($_POST['as_idx_settings_classes_lnd'])) {
                AgentStormSettingCache::set('as_idx_settings_classes_lnd', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_classes_lnd', '0');
            }
            if (isset($_POST['as_idx_settings_classes_mob']) && !empty($_POST['as_idx_settings_classes_mob'])) {
                AgentStormSettingCache::set('as_idx_settings_classes_mob', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_classes_mob', '0');
            }
            if (isset($_POST['as_idx_settings_classes_mfh']) && !empty($_POST['as_idx_settings_classes_mfh'])) {
                AgentStormSettingCache::set('as_idx_settings_classes_mfh', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_classes_mfh', '0');
            }
            if (isset($_POST['as_idx_settings_classes_rnt']) && !empty($_POST['as_idx_settings_classes_rnt'])) {
                AgentStormSettingCache::set('as_idx_settings_classes_rnt', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_classes_rnt', '0');
            }
            if (isset($_POST['as_idx_settings_classes_con']) && !empty($_POST['as_idx_settings_classes_con'])) {
                AgentStormSettingCache::set('as_idx_settings_classes_con', '1');
            } else {
                AgentStormSettingCache::set('as_idx_settings_classes_con', '0');
            }
            if (isset($_POST['as_idx_settings_pagelimit'])) {
                AgentStormSettingCache::set('as_idx_settings_pagelimit', $_POST['as_idx_settings_pagelimit']);
            }
            if (isset($_POST['as_idx_settings_tag'])) {
	            if (AgentStormSettingCache::get('as_idx_settings_tag') !== $_POST['as_idx_settings_tag']) {
	            	AgentStormSettingCache::set('as_idx_settings_tag', $_POST['as_idx_settings_tag']);
		            AgentStormSettingCache::set('as_cities', $as->getCities());
	            }
            }
        }
        
        // Save the Agent Information
        //
        if (isset($_POST['as_idx_agent_save'])) {
            if (isset($_POST['as_idx_agent_name'])) {
                AgentStormSettingCache::set('as_idx_agent_name', $_POST['as_idx_agent_name']);
            }
            if (isset($_POST['as_idx_agent_phone'])) {
                AgentStormSettingCache::set('as_idx_agent_phone', $_POST['as_idx_agent_phone']);
            }
            if (isset($_POST['as_idx_agent_email'])) {
                AgentStormSettingCache::set('as_idx_agent_email', $_POST['as_idx_agent_email']);
            }
            if (isset($_POST['as_idx_agent_extra'])) {
                AgentStormSettingCache::set('as_idx_agent_extra', $_POST['as_idx_agent_extra']);
            }
        }
        
        // Save the IDX Data Settings
        //
        if (isset($_POST['as_idx_permalinks_save'])) {
            if (isset($_POST['as_idx_searchprefix'])) {
                AgentStormSettingCache::set('as_idx_searchprefix', $_POST['as_idx_searchprefix']);
            }
            if (isset($_POST['as_idx_propertyprefix'])) {
                AgentStormSettingCache::set('as_idx_propertyprefix', $_POST['as_idx_propertyprefix']);
            }
            if (isset($_POST['as_idx_stateurlprefix'])) {
                AgentStormSettingCache::set('as_idx_stateurlprefix', $_POST['as_idx_stateurlprefix']);
            }
            if (isset($_POST['as_idx_cityurlprefix'])) {
                AgentStormSettingCache::set('as_idx_cityurlprefix', $_POST['as_idx_cityurlprefix']);
            }
        }
        
        // Save the Map Search Settings
        //
        if (isset($_POST['as_idx_mapsearch_save'])) {
            if (isset($_POST['as_map_width'])) {
                AgentStormSettingCache::set('as_map_width', $_POST['as_map_width']);
            }
            if (isset($_POST['as_map_height'])) {
                AgentStormSettingCache::set('as_map_height', $_POST['as_map_height']);
            }
            if (isset($_POST['as_map_provider'])) {
                AgentStormSettingCache::set('as_map_provider', $_POST['as_map_provider']);
            }
            if (array_key_exists('as_map_lat', $_POST)) {
                AgentStormSettingCache::set('as_map_lat', $_POST['as_map_lat']);
            }
            if (array_key_exists('as_map_lng', $_POST)) {
                AgentStormSettingCache::set('as_map_lng', $_POST['as_map_lng']);
            }
            if (array_key_exists('as_map_zoom', $_POST)) {
                AgentStormSettingCache::set('as_map_zoom', $_POST['as_map_zoom']);
            }
        }
        
        //
        //
        if (isset($_POST['as_install_templates'])) {
            $this->installTemplates();
        }
        
    }
    
    /**
     * AJAX function that saves the display fields and their order
     */
    function saveResultLayout() {
        
        // Loop through the metadata and for each property type, if it has been passed, save the new order
        //
        foreach (AgentStormSettingCache::get('as_metadata', array()) as $metadata) {
            if (array_key_exists($metadata->id, $_POST)) {
                AgentStormSettingCache::set('as_metadata_' . $metadata->id . '_' . $_POST['target'], implode(',', $_POST[$metadata->id]));
                foreach ($_POST[$metadata->id] as $field) {
                    if (!empty($_POST[$metadata->id . '_' . $field])) {
                        AgentStormSettingCache::set('as_fields_' . $metadata->id . '_' . $field, $_POST[$metadata->id . '_' . $field]);
                    } else {
                        delete_option('as_fields_' . $metadata->id . '_' . $field);
                    }
                }
            }
        }
        
    }
    
    function shortCodeBuilder() {
        header('Content-Type: text/html');
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_shortcode_designer.php';
        exit;
    }
    
    /**
     * Install the default Templates
     */
    function installTemplates() {
        
        // Check if the default templates already exist
        //
        $exists = false;
        $d = @dir(TEMPLATEPATH);
        while (false !== ($entry = $d->read())) {
            if (in_array($entry, array("agentstorm_result.php", "agentstorm_results.php", "agentstorm_noresults.php", "agentstorm_search.php"))) {
                $exists = true;
            }
        }
        
        // If the Templates dont exist install them
        //
        if (!$exists) {
            
            copy(WP_PLUGIN_DIR . '/agent-storm/agentstorm_result.php', TEMPLATEPATH . '/agentstorm_result.php');
            copy(WP_PLUGIN_DIR . '/agent-storm/agentstorm_results.php', TEMPLATEPATH . '/agentstorm_results.php');
            copy(WP_PLUGIN_DIR . '/agent-storm/agentstorm_noresults.php', TEMPLATEPATH . '/agentstorm_noresults.php');
            copy(WP_PLUGIN_DIR . '/agent-storm/agentstorm_search.php', TEMPLATEPATH . '/agentstorm_search.php');
            
        }
        
    }
    
    /**
     *
     */
    static function getOneLiner() {
        $one_liners = array(
            'Our IDX Plugin is <strong>causing a storm</strong> in Real Estate.',
            '<strong>Storm Repairs?</strong> Check out the <a href="http://www.stormrets.com/docs/" target="_blank">Documentation</a>!',
			'<a href="http://eepurl.com/hbVSU">Subscribe to our Wordpress Newsletter</a>. For the latest news, updates and videos.'
        );
        return $one_liners[array_rand($one_liners, 1)];
    }
	
	function preventFakeStaticRedirect($redirect_url) {
		if (substr($redirect_url, -6) == '.html/') {
			return false;
		}
	}
	
}

class AgentStormLogin extends stdClass {
	
	private $error = '';
	
	function init() {
		add_filter('wp_authenticate', array(&$this, 'check_login'), 1, 2);
		add_action('profile_update', array(&$this, 'profile_update'));
		add_action('user_register', array(&$this, 'user_register'));
		add_action('register_form', array(&$this, 'register_form'));
	}
	
	function initForceLogin() {
		add_action('wp_footer', array(&$this, 'wp_footer'));
	}
	
	function check_login($username, $password) {
		
		if ($username && $password) {
			
			$as = new AgentStormRequest(AgentStormSettingCache::get('as_hostname'), AgentStormSettingCache::get('as_apikey'));
			$as->format = 'xml';
			$as_results = $as->getContactByUsername($username);
			
			// Check the User exists
			if ($as_results->Count == 0) {
				add_filter('login_errors', array(&$this, 'login_errors'));
				$this->error = _('<strong>ERROR:</strong> Username or Password was incorrect');
				return null;
			}
			
			// Get the Contact from the Result
			$as_user = $as_results->Contacts[0];
			
			// Check the Password is correct
			if (wp_hash_password($password) !== $as_user->Meta->Password) {
				add_filter('login_errors', array(&$this, 'login_errors'));
				$this->error = _('<strong>ERROR:</strong> Username or Password was incorrect');
				return null;
			}
			
			// Save the User to the local WP database
			if (!get_userdatabylogin($username)) {
				$userarray['user_login'] = $as_user->Meta->Username;
				$userarray['user_pass'] = $as_user->Meta->Password;
				$userarray['first_name'] = $as_user->Meta->FirstName;
				$userarray['last_name'] = $as_user->Meta->LastName;
				$userarray['user_url'] = '';
				$userarray['user_email'] = $as_user->Meta->EmailAddress;
				$userarray['display_name'] = $as_user->Name;
				$userid = wp_insert_user($userarray);
				update_usermeta($userid, 'as_id', $as_user->Id);
			}
			
			if (AgentStormSettingCache::get("as_contact_emaillogin", false)) {
				wp_mail( AgentStormSettingCache::get( 'admin_email' ), "[ " . AgentStormSettingCache::get( 'blogname' ) . " ] ".__( 'Returning Visitor' ).' '.$as_user->Meta->Username, "" );
			}
			
			// Return the WP User object
			return get_userdatabylogin($username);
			
		}
		
	}
	
	function user_register($user_id) {
		
		if ($user_id) {
			
			$user = get_userdata($user_id);
			
			// Build the basic document to be posted
			//
			$xmldoc = new SimpleXMLElement('<?xml version = "1.0" encoding = "UTF-8"?><Contacts></Contacts>');
			$contact = $xmldoc->addChild("Contact"); 
			$contact->addChild('Name', $_POST['user_first_name'] . ' ' . $_POST['user_last_name']); 
			$contact->addChild('ContactSource', AgentStormSettingCache::get('as_contact_source')); 
			
			// If we have been passed an Email Address add it to the XML to be posted
			//
			if (isset($_POST['user_email']) && !empty($_POST['user_email'])) {
				$email_addresses = $contact->addChild('EmailAddresses');
				$email_address_c = $email_addresses->addChild('EmailAddress');
				$email_address = $email_address_c->addChild('EmailAddress', $_POST['user_email']);
			}
			
			// If we have been passed a Phone Number add it to the XML to be posted
			//
			if (isset($_POST['as_contact_phone']) && !empty($_POST['as_contact_email'])) {
				$phone_numbers = $contact->addChild('PhoneNumbers');
				$phone_number_c = $phone_numbers->addChild('PhoneNumber');
				$phone_number = $phone_number_c->addChild('Number', $_POST['user_phone']);
			}
			
			// If we have been passed a Message add it to the XML to be posted
			//
			$meta = $contact->addChild('Meta');
			$meta_u = $meta->addChild('Username', $user->user_login);
			$meta_u = $meta->addChild('Password', $user->user_pass);
			
			$request = new AgentStormRequest(AgentStormSettingCache::get('as_hostname'), AgentStormSettingCache::get('as_apikey'));
			$request->format = 'xml';
			$as_user = $request->putRemote('contacts', array(), $xmldoc->asXML());
			
			if ($as_user->Contact) {
				update_usermeta($user_id, 'as_id', (string) $as_user->Contact->Id);
				if (AgentStormSettingCache::get("as_contact_emailregister", false)) {
					wp_mail( AgentStormSettingCache::get( 'admin_email' ), "[ " . AgentStormSettingCache::get( 'blogname' ) . " ] ".__( 'Visitor Registered' ).' '.$user->user_login, "" );
				}
				wp_set_auth_cookie( $user_id, false, is_ssl() );
				wp_redirect( $_POST['redirect_to'] );
			}
			
		}
		
	}
	
	function register_form() {
		echo '<p>';
		echo '    <label>First Name<br>';
		echo '    <input type="text" name="user_first_name" id="user_first_name" class="input" value="'.((array_key_exists('user_first_name', $_POST)) ? $_POST['user_first_name'] : '').'" size="20" tabindex="30"></label>';
	    echo '</p>';
		echo '<p>';
		echo '    <label>Last Name<br>';
		echo '    <input type="text" name="user_last_name" id="user_last_name" class="input" value="'.((array_key_exists('user_last_name', $_POST)) ? $_POST['user_last_name'] : '').'" size="20" tabindex="40"></label>';
	    echo '</p>';
		echo '<p>';
		echo '    <label>Phone Number<br>';
		echo '    <input type="text" name="user_phone" id="user_phone" class="input" value="'.((array_key_exists('user_phone', $_POST)) ? $_POST['user_phone'] : '').'" size="20" tabindex="50"></label>';
	    echo '</p>';
	}
	
	function profile_update($user_id) {
		
		if ($user_id) {
			
			$user = get_userdata($user_id);
			$user_contact_id = get_metadata('user', $user_id, 'as_id', true );
			
			$as = new AgentStormRequest(AgentStormSettingCache::get('as_hostname'), AgentStormSettingCache::get('as_apikey'));
			$as->format = 'json';
			$as_results = $as->getContactByUsername($user->user_login);
			
			// Get the Contact from the Result
			if ($as_results->Count == 1) {
				
				$as_user = $as_results->Contact;
				
				$xmldoc = new SimpleXMLElement('<?xml version = "1.0" encoding = "UTF-8"?><Contacts></Contacts>');
				$contact = $xmldoc->addChild("Contact"); 
				$contact->addChild('Id', $user_contact_id); 
				
				$meta = $contact->addChild('Meta');
				$meta_u = $meta->addChild('Username', $user->user_login);
				$meta_u = $meta->addChild('Password', $user->user_pass);
				
				$as_user = $as->postRemote('contacts', array(), $xmldoc->asXML());
				
			}
			
		}
		
	}
	
	function login_errors() {
		return $this->error;
	}
	
	function wp_footer() {
		echo '<script type="text/javascript">';
		echo '    AS_LOGGED_IN='.((is_user_logged_in()) ? 'true' : 'false').';';
		echo '    AS_BASEURL="'.get_bloginfo('url').'";';
		echo '    AS_SEARCHURL="'.get_bloginfo('url').'/'.trim(AgentStormSettingCache::get('as_idx_searchprefix'), '/').'/";';
		echo '</script>';
		echo '<script type="text/javascript" src="/wp-content/plugins/agent-storm/static/js/agentstorm_login.js"></script>';
		echo '<div id="as_login" style="overflow:hidden; display:none;">';
		echo '	  '.AgentStormSettingCache::get('as_contact_lightbox_header');
		echo '    <div style="overflow:hidden;">';
		echo '        <div style="float:left; width:50%;">';
		echo '            <h3 style="margin-bottom:0.5em">Register</h3>';
		echo '            <form name="registerform" id="registerform" action="/wp-login.php?action=register" method="post">';
		echo '            	<p id="reg_passmail">A password will be e-mailed to you.</p>';
		echo '            	<div class="agentstorm-formitem">';
		echo '            		<label>Username</label>';
		echo '            		<input type="text" name="user_login" id="user_login" class="input" value="" size="20" tabindex="10" />';
		echo '            	</div>';
		echo '            	<div class="agentstorm-formitem">';
		echo '            		<label>E-mail</label>';
		echo '            		<input type="text" name="user_email" id="user_email" class="input" value="" size="20" tabindex="20" />';
		echo '            	</div>';
		echo '            	<div class="agentstorm-formitem">';
		echo '            		<label>First Name</label>';
		echo '            		<input type="text" name="user_first_name" id="user_first_name" class="input" value="" size="20" tabindex="30" />';
		echo '            	</div>';
		echo '            	<div class="agentstorm-formitem">';
		echo '            		<label>Last Name</label>';
		echo '            		<input type="text" name="user_last_name" id="user_last_name" class="input" value="" size="20" tabindex="40" />';
		echo '            	</div>';
		echo '            	<div class="agentstorm-formitem">';
		echo '            		<label>Phone Number</label>';
		echo '            		<input type="text" name="user_phone" id="user_phone" class="input" value="" size="20" tabindex="50" />';
		echo '            	</div>';
		echo '            	<div class="agentstorm-formitem" style="margin-left:150px;">';
		echo '            		<input type="hidden" value="/" class="as_redirectto" name="redirect_to">';
		echo '            	    <p><input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Register" tabindex="60"></p>';
		echo '            	</div>';
		echo '            </form>';
		echo '        </div>';
		echo '        <div style="float:left; width:50%;">';
		echo '            <h3 style="margin-bottom:0.5em">Login</h3>';
		echo '            <form method="post" action="/wp-login.php" id="loginform" name="loginform">';
		echo '            	<p id="reg_passmail">Enter your username and password.</p>';
		echo '            	<div class="agentstorm-formitem">';
		echo '            		<label for="user_login">Username</label>';
		echo '            		<input type="text" tabindex="100" size="20" value="" class="input" id="user_login" name="log">';
		echo '            	</div>';
		echo '            	<div class="agentstorm-formitem">';
		echo '            		<label for="user_pass">Password</label>';
		echo '            		<input type="password" tabindex="110" size="20" value="" class="input" id="user_pass" name="pwd">';
		echo '            	</div>';
		echo '            	<div class="agentstorm-formitem" style="margin-left:150px;">';
		echo '            	    <label><input type="checkbox" tabindex="120" value="forever" id="rememberme" name="rememberme"> Remember Me</label>';
		echo '				</div>';
		echo '            	<div class="agentstorm-formitem" style="margin-left:150px;">';
		echo '            		<input type="submit" tabindex="130" value="Log In" class="button-primary" id="wp-submit" name="wp-submit">';
		echo '            		<input type="hidden" value="/" class="as_redirectto" name="redirect_to">';
		echo '            	</div>';
		echo '            </form>';
		echo '        </div>';
		echo '    </div>';
		echo '</div>';
	}
	
}

class AgentStormIDX extends stdClass {
    
    public $wp = null;
    
    public $var1 = '';
    
    public $var2 = '';
    
    public $var3 = '';
    
    public $var4 = '';
    
    public $title = '';
    
    /**
     * On each page load check if the request relates to a IDX page, if so,
     * override the page so the correct IDX page is returned
     */
    function init(&$wp) {
        
        // Keep a copy of the $wp variable for later use
        //
        $this->wp = $wp;
        
        // Get the URL of the current request
        //
        $path = $this->wp->request;
        $groups = array();
        
        // Parse the current url against the known Permalinks for each page type
        //
        $property_url = $this->parseUrl('as_idx_propertyprefix');
        if (!$property_url) $property_url = $this->parseUrl('as_idx_cityurlprefix');
        if (!$property_url) $property_url = $this->parseUrl('as_idx_stateurlprefix');
        
        // Get the URL of the search page
        //
        $search_url = trim(AgentStormSettingCache::get('as_idx_searchprefix'), '/');
        
        // If we have match against a SEO page.
        //
        if (!empty($property_url)) {
            
            $this->var1 = str_replace('-', ' ', $property_url['state']);
            $this->var2 = str_replace('-', ' ', $property_url['city']);
            $this->var3 = str_replace('-', ' ', $property_url['id']);
            $this->var4 = str_replace('-', ' ', $property_url['listing_id']);
            
            if (!empty($this->var1) || !empty($this->var2) || !empty($this->var3) || !empty($this->var4)) {
                
                $this->clearActions();
                
                add_filter('the_posts', array(&$this, 'seoFilter'));
                add_filter('wp_title', array(&$this, 'seoTitle'));
                add_filter('aioseop_title_single', array(&$this, 'seoTitle'));
                add_action('template_redirect', array(&$this, 'seoPage'));
				remove_filter('the_content', 'wpautop');
                
            }
        
        // If we have a match for the search page...
        //
        } elseif (preg_match("/" . preg_quote($search_url, '/') . "\/?/", $path, $groups)) {
            
            $this->clearActions();
            
            add_filter('the_posts', array(&$this, 'searchFilter'));
            add_filter('wp_title', array(&$this, 'searchTitle'));
            add_filter('aioseop_title_single', array(&$this, 'seoTitle'));
            add_action('template_redirect', array(&$this, 'searchPage'));
			remove_filter('the_content', 'wpautop');
            
        } elseif (strtolower($path) == 'user/clearsearch') {
			
            // Get the Current User
            //
            global $current_user;
            get_currentuserinfo();
            
            // Save the new MetaData
            //
            update_user_meta($current_user->ID, 'as_saved_queries', json_encode(array()));
            
            // Redirect back to previous page
            //
            wp_redirect($_SERVER['HTTP_REFERER']);
            exit;
            
        } elseif (strtolower($path) == 'user/savesearch') {
            
            // Get the Current User
            //
            global $current_user;
            get_currentuserinfo();
            
            // Save the Query
            //
            $queries = json_decode(get_user_meta($current_user->ID, 'as_saved_queries', true));
            if (!$queries) $queries = array(); 
            $queries[] = $_GET;
            
            // Save the new MetaData
            //
            update_user_meta($current_user->ID, 'as_saved_queries', json_encode($queries));
            
            // Redirect back to previous page
            //
            wp_redirect($_SERVER['HTTP_REFERER']);
            exit;
            
        } elseif (strtolower($path) == 'user/clearproperty') {
			
            // Get the Current User
            //
            global $current_user;
            get_currentuserinfo();
            
            // Save the new MetaData
            //
            update_user_meta($current_user->ID, 'as_saved_properties', json_encode(array()));
            
            // Redirect back to previous page
            //
            wp_redirect($_SERVER['HTTP_REFERER']);
            exit;
            
        } elseif (strtolower($path) == 'user/saveproperty') {
            
            // Get the Current User
            //
            global $current_user;
            get_currentuserinfo();
            
            // Save the Property
            //
            $property = new stdClass();
            $property->ListingId = $_GET['ListingId'];
            $property->FullAddress = $_GET['FullAddress'];
            
            // Add the Item to our Saved Properties array
            //
            $properties = json_decode(get_user_meta($current_user->ID, 'as_saved_properties', true));
            if (!$properties) $properties = array(); 
            $properties[] = $property;
            
            // Save the new MetaData
            //
            update_user_meta($current_user->ID, 'as_saved_properties', json_encode($properties));
            
            // Redirect back to previous page
            //
            wp_redirect($_SERVER['HTTP_REFERER']);
            exit;
            
        }
        
        // Register the IDX Short codes
        //
        add_shortcode('agentstorm', array(&$this, 'addShortCode'));
        
    }
    
    /**
     * Clears all wordpress query vars if we are in a dynamic idx page, prevents
     * 404 errors being returned by Wordpress
     */
    function processQueryVars($qv) {
        
        $property_url = $this->parseUrl('as_idx_propertyprefix');
        if (!$property_url) $property_url = $this->parseUrl('as_idx_cityurlprefix');
        if (!$property_url) $property_url = $this->parseUrl('as_idx_stateurlprefix');
        $search_url = trim(AgentStormSettingCache::get('as_idx_searchprefix'), '/');
        
        if (!empty($property_url) || preg_match("/" . preg_quote($search_url, '/') . "\/?/", $path)) {
            return;
        }
        
        return $qv;
        
    }
    
    /**
     * Remove various headers which could incorrectly report the page to SE's
     */
    function clearActions() {
        
        remove_action('wp_head','feed_links_extra');
        remove_action('wp_head','rsd_link');
        remove_action('wp_head','wlwmanifest_link');
        remove_action('wp_head','index_rel_link');
        remove_action('wp_head','parent_post_rel_link');
        remove_action('wp_head','start_post_rel_link');
        remove_action('wp_head','prev_post_rel_link');
        remove_action('wp_head','adjacent_posts_rel_link_wp_head');
        remove_action('wp_head','noindex');
        remove_action('wp_head','wp_generator');
        remove_action('wp_head','rel_canonical');
        
    }
    
    /**
     * Process a short code is included on the current page
     */
    function addShortCode($atts) {
        
        // Extract the short code options into php variables
        //
        extract(shortcode_atts(array(
            'template' => 'large',
            'show_pager' => false,
            'show_map' => false,
            'show_count' => false,
            'agent_id' => '',
            'mls_number' => '',
            'city' => '',
            'subdivision' => '',
            'area' => '',
            'beds' => '',
            'baths' => '',
            'zip' => '',
            'price' => '',
            'lotsqft' => '',
            'sqft' => '',
            'shortsale' => '',
            'foreclosure' => '',
            'waterfrontlocation' => '',
            'sort' => 'ListPrice',
            'sort_direction' => 'DESC',
            'limit' => 5,
			'lat' => '',
			'lng' => '',
			'zoom' => '',
			'icon' => '',
			'width' => '',
			'height' => ''
        ), $atts));
        
        // Process the template
        //
        $file = '';
        switch ($template) {
            
            // Simple search interface
            //
            case 'small':
                $file = 'agentstorm_searchsmall.php';
                break;
            
            // Tabbed search interface
            //
            case 'tabbed':
                $file = 'agentstorm_searchtabbed.php';
                break;
            
            // Simple search interface
            //
            case 'map':
                $file = 'agentstorm_map.php';
                break;
            
            // Latest Properties
            //
            case 'latest':
                $sort = 'ModificationTimestamp';
                $sort_direction = 'DESC';
            
            // Short code Searches
            //
            case 'search':
                $as = new AgentStormRequest(AgentStormSettingCache::get('as_hostname'), AgentStormSettingCache::get('as_apikey'));
                
                $filters = array();
                if (!empty($agent_id)) $filters['AgentId'] = $agent_id;
                if (!empty($mls_number)) $filters['ListingId'] = $mls_number;
                if (!empty($city)) $filters['City'] = $city;
                if (!empty($subdivision)) $filters['SubDivision'] = $subdivision;
                if (!empty($area)) $filters['Area'] = $area;
                if (!empty($beds)) $filters['Bedrooms'] = $beds;
                if (!empty($baths)) $filters['FullBaths'] = $baths;
                if (!empty($zip)) $filters['Zip'] = $zip;
                if (!empty($price)) $filters['ListPrice'] = $price;
                if (!empty($lotsqft)) $filters['LotSqFt'] = $lotsqft;
                if (!empty($sqft)) $filters['SqFt'] = $sqft;
                if (!empty($shortsale)) $filters['IsShortSale'] = 'Y';
                if (!empty($foreclosure)) $filters['IsForeclosure'] = 'Y';
                if (!empty($waterfrontlocation)) $filters['WaterFrontLocation'] = $waterfrontlocation;
                if (!empty($sort)) $filters['sort'] = $sort;
                if (!empty($sort_direction)) $filters['sort_direction'] = $sort_direction;
                if (!empty($limit)) $filters['limit'] = $limit;
                if (array_key_exists('offset', $_GET)) $filters['offset'] = $_GET['offset'];
                
                $properties = $as->getProperties($filters);
                $results = $properties->Properties;
                
                $file = 'agentstorm_results.php';
                break;
            
            default:
                $file = 'agentstorm_search.php';
                break;
            
        }
        
        ob_start();
		if (file_exists(TEMPLATEPATH . DIRECTORY_SEPARATOR . $file)) {
			include TEMPLATEPATH . DIRECTORY_SEPARATOR . $file;
		} else {
			include dirname(__FILE__) . DIRECTORY_SEPARATOR . $file;
		}
        $page_content = ob_get_contents();
        ob_end_clean();
        return $page_content;
        
    }
    
    function getUrlRegex($url_option_name) {
        
        $regex = preg_quote(trim(AgentStormSettingCache::get($url_option_name), '/'), '/');
        
        $regex = str_replace('%state%',        '([a-zA-Z- ]+)',      $regex);
        $regex = str_replace('%city%',         '([a-zA-Z0-9- ]+)',   $regex);
        $regex = str_replace('%id%',           '([0-9]+)',           $regex);
        $regex = str_replace('%listing_id%',   '([a-zA-Z0-9]+)',     $regex);
        $regex = str_replace('%full_address%', '([a-zA-Z0-9-]+)',    $regex);
        $regex = str_replace('%subdivision%',  '([a-zA-Z0-9- ]+)',   $regex);
        
        return $regex;
        
    }
    
    function parseUrl($url_option_name) {
        
        $return = array();
        $empty = true;
        
        $regex = $this->getUrlRegex($url_option_name);
        
        preg_match_all('/(%[a-zA-Z_]+%)/', AgentStormSettingCache::get($url_option_name), $regex_matches, PREG_OFFSET_CAPTURE);
        preg_match_all('/' . $regex . '/', urldecode($this->wp->request), $url_matches);
        
        foreach ($regex_matches[0] as $key => $match) {
            if (!empty($url_matches[$key + 1][0])) {
                $return[str_replace('%', '', $match[0])] = $url_matches[$key + 1][0];
                $empty = false;
            }
        }
        
        return ($empty) ? false : $return;
        
    }
    
    function getPermalink($url, $property) {
        
        if (isset($property->State))       $url = str_replace('%state%',        agentstorm_slugify($property->State),       $url);
        if (isset($property->City))        $url = str_replace('%city%',         agentstorm_slugify($property->City),        $url);
        if (isset($property->Id))          $url = str_replace('%id%',           agentstorm_slugify($property->Id),          $url);
        if (isset($property->ListingId))   $url = str_replace('%listing_id%',   agentstorm_slugify($property->ListingId),   $url);
        if (isset($property->FullAddress)) $url = str_replace('%full_address%', agentstorm_slugify($property->FullAddress), $url);
        if (isset($property->SubDivision)) $url = str_replace('%subdivision%',  agentstorm_slugify($property->SubDivision), $url);
        return $url;
        
    }
    
    function getPropertyPermalink($property) {
        return $this->getPermalink(get_bloginfo('url', 'display') . '/' . AgentStormSettingCache::get('as_idx_propertyprefix'), $property);
    }
    
    function getStatePermalink($property) {
        return $this->getPermalink(get_bloginfo('url', 'display') . '/' . AgentStormSettingCache::get('as_idx_stateurlprefix'), $property);
    }
    
    function getCityPermalink($property) {
        return $this->getPermalink(get_bloginfo('url', 'display') . '/' . AgentStormSettingCache::get('as_idx_cityurlprefix'), $property);
    }
    
    function seoFilter($posts) {
        
        $results = null;
        
        $query = array();
        $offset = (array_key_exists('offset', $_GET)) ? $_GET['offset'] : '0';
        $limit = AgentStormSettingCache::get('as_idx_pagelimit', 10);
        
		$cached_properties = wp_cache_get('as_result_properties');
		$cached_count = wp_cache_get('as_result_count');
		$cached_totalcount = wp_cache_get('as_result_totalcount');
		
		$properties = new stdClass();
		if (empty($cached_properties) && empty($cached_count) && empty($cached_totalcount)) {
			
			$as = new AgentStormRequest(trim(AgentStormSettingCache::get('as_hostname')), trim(AgentStormSettingCache::get('as_apikey')));
			if (!empty($this->var3) && is_numeric($this->var3)) {
				$properties = $as->getProperty($this->var3);
			} elseif (!empty($this->var4)) {
				$properties = $as->getProperties(array(
					'ListingId' => $this->var4
				));
			} elseif (!empty($this->var1) || !empty($this->var2)) {
				$query = array(
					'limit' => $limit,
					'offset' => $offset,
					'Status' => 'A'
				);
				if (!empty($this->var1)) {
					$query['State'] = $this->var1;
				}
				if (!empty($this->var2)) {
					$query['City'] = $this->var2;
				}
				$properties = $as->getProperties($query);
			}
			
			// Cache the results so we can easily retrieve them if a custom page template is selected
			//
			wp_cache_set('as_result_properties', $properties->Properties);
			wp_cache_set('as_result_count', $properties->Count);
			wp_cache_set('as_result_totalcount', $properties->TotalCount);
			
		} else {
			
			$properties->Properties = $cached_properties;
			$properties->Count = $cached_count;
			$properties->TotalCount = $cached_totalcount;
			
		}
		
        $results = $properties->Properties;
        $state = $this->var1;
        $city = $this->var2;
        
        if (sizeof($results) == 0) {
        	
            $this->title = _('Properties for Sale in ');
            $this->title .= (!empty($city)) ? ucwords(strtolower($city)) : '';
			$this->title .= ((AgentStormSettingCache::get('as_idx_punctuation', true)) ? ', ' : ' ');
            $this->title .= (strlen($state) == 2) ? strtoupper($state) : ucwords(strtolower($state));
            
            wp_cache_set('as_result_pagetype', 'noresults');
            
            // Build the Response
            //
            ob_start();
			if (file_exists(TEMPLATEPATH . DIRECTORY_SEPARATOR . 'agentstorm_noresults.php')) {
				include TEMPLATEPATH . DIRECTORY_SEPARATOR . 'agentstorm_noresults.php';
			} else {
				include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_noresults.php';
			}
            $page_content = ob_get_contents();
            ob_end_clean();
            
        } elseif (sizeof($results) == 1) {
        	
            $result = $results[0];
            $this->title = $result->FullAddress . ((AgentStormSettingCache::get('as_idx_punctuation', true)) ? ', ' : ' ') . ucwords(strtolower($result->City)) . ((AgentStormSettingCache::get('as_idx_punctuation', true)) ? ', ' : ' ') . ((strlen($result->State) == 2) ? strtoupper($result->State) : ucwords(strtolower($result->State))) . ((AgentStormSettingCache::get('as_idx_punctuation', true)) ? ', ' : ' ') . $result->Zip;
            
            wp_cache_set('as_result_pagetype', 'property');
            
            // We want to set the correct canoninal for individual properties
            //
            wp_cache_set('agentstorm_canonical', $this->getPropertyPermalink($result));
            
            // Get the Walkscore
            //
            if (AgentStormSettingCache::get('as_idx_walkscore')) {
                $walkscore = @json_decode(@file_get_contents('http://api.walkscore.com/score?format=json&address=' . urlencode($result->StreetNumber . ' ' . $result->StreetPrefix . ' ' . $result->StreetName . ' ' . $result->StreetSuffix . ' ' . $result->City . ' ' . $result->State . ' ' . $result->Zip) . '&lat=' . $result->Latitude . '&lon=' . $result->Longitude . '&wsapikey=' . AgentStormSettingCache::get('as_idx_walkscore')));
            }
            
            // Build the Response
            //
            ob_start();
			if (file_exists(TEMPLATEPATH . DIRECTORY_SEPARATOR . 'agentstorm_result.php')) {
				include TEMPLATEPATH . DIRECTORY_SEPARATOR . 'agentstorm_result.php';
			} else {
				include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_result.php';
			}
            $page_content = ob_get_contents();
            ob_end_clean();
            
            
        } else {
            
            $this->title = _('Properties for Sale in ');
            $this->title .= (!empty($city)) ? ucwords($city) : '';
			$this->title .= ((AgentStormSettingCache::get('as_idx_punctuation', true)) ? ', ' : ' ');
            $this->title .= ((strlen($state) == 2) ? strtoupper($state) : ucwords(strtolower($state)));
            
            wp_cache_set('as_result_pagetype', 'results');
            
            // Build the Response
            //
        	ob_start();
			if (file_exists(TEMPLATEPATH . DIRECTORY_SEPARATOR . 'agentstorm_results.php')) {
				include TEMPLATEPATH . DIRECTORY_SEPARATOR . 'agentstorm_results.php';
			} else {
				include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_results.php';
			}
            $page_content = ob_get_contents();
            ob_end_clean();
            
        }
        
		global $wp_query;
		$wp_query->is_404 = false;
		$wp_query->is_single = false;
		$wp_query->is_page = true;
		
        return array(new AgentStormPage(-1, $this->title, $page_content));
        
    }
    
    function seoTitle() {
        return $this->title . ' - ';
    }
    
    function seoPage() {
        
        $results = wp_cache_get('as_result_properties');
        $count = wp_cache_get('as_result_count');
        $totalcount = wp_cache_get('as_result_totalcount');
        
        switch (wp_cache_get('as_result_pagetype')) {
            case 'noresults':
                include(TEMPLATEPATH . DIRECTORY_SEPARATOR . AgentStormSettingCache::get('as_idx_template_noresults', 'page.php'));
                break;
            case 'property':
                include(TEMPLATEPATH . DIRECTORY_SEPARATOR . AgentStormSettingCache::get('as_idx_template_property', 'page.php'));
                break;
            case 'results':
                include(TEMPLATEPATH . DIRECTORY_SEPARATOR . AgentStormSettingCache::get('as_idx_template_result', 'page.php'));
                break;
            default:
                include(TEMPLATEPATH . DIRECTORY_SEPARATOR . 'page.php');
        }
    	exit;
    }
    
    function searchFilter($post) {
        
        $as = new AgentStormRequest(trim(AgentStormSettingCache::get('as_hostname')), trim(AgentStormSettingCache::get('as_apikey')));
        
        $query = array();
        
		$cached_properties = wp_cache_get('as_result_properties');
		$cached_count = wp_cache_get('as_result_count');
		$cached_totalcount = wp_cache_get('as_result_totalcount');
		
		$properties = new stdClass();
		if ($_GET['as_searchwidget_submit']) {
			
			if (empty($cached_properties) && empty($cached_count) && empty($cached_totalcount) && $_GET['as_searchwidget_submit']) {
			
				// MLS Number
				//
				if (isset($_GET['as_mlsnumber']) && !empty($_GET['as_mlsnumber'])) {
					$query['ListingId'] = $_GET['as_mlsnumber'];
				}
				
				// Property Type
				//
				if (isset($_GET['as_propertytype']) && !empty($_GET['as_propertytype'])) {
					if (is_array($_GET['as_propertytype'])) {
						$query['Type'] = implode(',', $_GET['as_propertytype']);
					} else {
						$query['Type'] = $_GET['as_propertytype'];
					}
				}
				
				// City
				//
				if (isset($_GET['as_city']) && !empty($_GET['as_city'])) {
					$query['City'] = $_GET['as_city'];
				}
				
				// Zip Code / Suburb
				//
				if (isset($_GET['as_suburbzip']) && !empty($_GET['as_suburbzip'])) {
					if (preg_match("/^[0-9]{5}$/", $_GET['as_suburbzip'])) {
						$query['Zip'] = $_GET['as_suburbzip'];
					} else {
						$query['City'] = $_GET['as_suburbzip'];
					}
				}
				
				// Sub Division
				//
				if (isset($_GET['as_subdivision'])) {
					$query['SubDivision'] = urldecode($_GET['as_subdivision']);
				}
				
				// Price High to Low Handler
				//
				if (isset($_GET['as_pricerange_min']) && isset($_GET['as_pricerange_max']) && $_GET['as_pricerange_min'] > 0 && $_GET['as_pricerange_max'] > 0) {
					$query['ListPrice'] = $_GET['as_pricerange_min'] . ':' . $_GET['as_pricerange_max'];
					
				} elseif (isset($_GET['as_pricerange_min']) && $_GET['as_pricerange_min'] > 0) {
					$query['ListPrice'] = $_GET['as_pricerange_min'] . '+';
					
				} elseif (isset($_GET['as_pricerange_max']) && $_GET['as_pricerange_max'] > 0) {
					$query['ListPrice'] = $_GET['as_pricerange_max'] . '-';
					
				}
				
				// Lot Size Handler
				//
				if (isset($_GET['as_lotsize_min']) && isset($_GET['as_lotsize_max']) && $_GET['as_lotsize_min'] > 0 && $_GET['as_lotsize_max'] > 0) {
					$query['LotSqft'] = $_GET['as_lotsize_min'] . ':' . $_GET['as_lotsize_max'];
					
				} elseif (isset($_GET['as_lotsize_min']) && $_GET['as_lotsize_min'] > 0) {
					$query['LotSqft'] = $_GET['as_lotsize_min'] . '+';
					
				} elseif (isset($_GET['as_lotsize_max']) && $_GET['as_lotsize_max'] > 0) {
					$query['LotSqft'] = $_GET['as_lotsize_max'] . '-';
					
				}
				
				// Size Handler
				//
				if (isset($_GET['as_size_min']) && isset($_GET['as_size_max']) && $_GET['as_size_min'] > 0 && $_GET['as_size_max'] > 0) {
					$query['Sqft'] = $_GET['as_size_min'] . ':' . $_GET['as_size_max'];
					
				} elseif (isset($_GET['as_size_min']) && $_GET['as_size_min'] > 0) {
					$query['Sqft'] = $_GET['as_size_min'] . '+';
					
				} elseif (isset($_GET['as_size_max']) && $_GET['as_size_max'] > 0) {
					$query['Sqft'] = $_GET['as_size_max'] . '-';
					
				}
				
				// Bedrooms
				//
				if (isset($_GET['as_bedrooms']) && !empty($_GET['as_bedrooms'])) {
					$query['Bedrooms'] = $_GET['as_bedrooms'];
				}
				
				// Bathrooms
				//
				if (isset($_GET['as_bathrooms']) && !empty($_GET['as_bathrooms'])) {
					$query['FullBathrooms'] = $_GET['as_bathrooms'];
				}
				
				// City Search
				if (isset($_GET['as_city']) & !empty($_GET['as_city'])) {
					$query['City'] = $_GET['as_city'];
				}
				
				// Short Sale Search
				if (isset($_GET['as_shortsale']) && !empty($_GET['as_shortsale'])) {
					$query['IsShortSale'] = 'Y';
				}
				
				// Foreclosure/Bank Owned Search
				if (isset($_GET['as_foreclosure']) && !empty($_GET['as_foreclosure'])) {
					$query['IsForeclosure'] = 'Y';
				}
				
				$query['Status'] = 'A';
				
				// Paging
				//
				$offset = 0;
				if (isset($_GET['offset']) && !empty($_GET['offset'])) {
					$query['offset'] = $offset = $_GET['offset'];
				}
				
				// Sort
				//
				if (isset($_GET['sort']) && !empty($_GET['sort'])) {
					$query['sort'] = $_GET['sort'];
				}
				
				// Sort Direction
				//
				if (isset($_GET['sort_direction']) && !empty($_GET['sort_direction'])) {
					$query['sort_direction'] = $_GET['sort_direction'];
				}
				
				// Limit
				//
				$limit = $query['limit'] = AgentStormSettingCache::get('as_idx_settings_pagelimit', 10);
				
				// Query the API and get the Results for the search
				//
				$properties = $as->getProperties($query);
				
			} else {
				
				$properties->Properties = $cached_properties;
				$properties->Count = $cached_count;
				$properties->TotalCount = $cached_totalcount;
				
			}
			
            $this->title = _('Search Results');
            
            // Cache the results so we can easily retrieve them if a custom page template is selected
            //
            wp_cache_set('as_result_properties', $properties->Properties);
            wp_cache_set('as_result_count', $properties->Count);
            wp_cache_set('as_result_totalcount', $properties->TotalCount);
            
            $results = $properties->Properties;
            
            if (empty($results) || sizeof($results) == 0) {
                
                wp_cache_set('as_result_pagetype', 'noresults');
                
                // Build the Response
                //
                ob_start();
				if (file_exists(TEMPLATEPATH . '/agentstorm_noresults.php')) {
					include TEMPLATEPATH . '/agentstorm_noresults.php';
				} else {
					include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_noresults.php';
				}
                $page_content = ob_get_contents();
                ob_end_clean();
                
            } elseif (sizeof($results) == 1) {
                
                $result = $results[0];
                
                wp_cache_set('as_result_pagetype', 'property');
                
                // We want to set the correct canoninal for individual properties
                //
                wp_cache_set('agentstorm_canonical', $this->getPropertyPermalink($result));
                
                // Build the Response
                //
                ob_start();
				if (file_exists(TEMPLATEPATH . '/agentstorm_result.php')) {
					include TEMPLATEPATH . '/agentstorm_result.php';
				} else {
					include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_result.php';
				}
                $page_content = ob_get_contents();
                ob_end_clean();
                
            } else {
                
                wp_cache_set('as_result_pagetype', 'results');
                
                // Build the Response
                //
                ob_start();
				if (file_exists(TEMPLATEPATH . '/agentstorm_results.php')) {
					include TEMPLATEPATH . '/agentstorm_results.php';
				} else {
					include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_results.php';
				}
                $page_content = ob_get_contents();
                ob_end_clean();
                
            }
            
        } else {
            
            $this->title = _('Property Search');
            
            // Build the Response
            //
            ob_start();
			if (file_exists(TEMPLATEPATH . '/agentstorm_search.php')) {
				include TEMPLATEPATH . '/agentstorm_search.php';
			} else {
				include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_search.php';
			}
            $page_content = ob_get_contents();
            ob_end_clean();
            
        }
        
		global $wp_query;
		$wp_query->is_404 = false;
		$wp_query->is_single = false;
		$wp_query->is_page = true;
		
        // Return a dummy page with the result
        //
        return array(new AgentStormPage(-1, $this->title, $page_content));
        
    }
    
    function searchTitle() {
        $this->seoTitle();
    }
    
    function searchPage() {
        $this->seoPage();
    }
    
}

class AgentStormPagination {

	var $base_url			= ''; // The page we are linking to
	var $total_rows  		= ''; // Total number of items (database results)
	var $per_page	 		= 10; // Max number of items you want shown per page
	var $num_links			=  2; // Number of "digit" links to show before/after the currently viewed page
	var $cur_page	 		=  0; // The current page being viewed
	var $first_link   		= 'First';
	var $next_link			= '&gt;';
	var $prev_link			= '&lt;';
	var $last_link			= 'Last &rsaquo;';
	var $uri_segment		= 3;
	var $full_tag_open		= '';
	var $full_tag_close		= '';
	var $first_tag_open		= '';
	var $first_tag_close	= '&nbsp;';
	var $last_tag_open		= '&nbsp;';
	var $last_tag_close		= '';
	var $cur_tag_open		= '&nbsp;<strong>';
	var $cur_tag_close		= '</strong>';
	var $next_tag_open		= '&nbsp;';
	var $next_tag_close		= '&nbsp;';
	var $prev_tag_open		= '&nbsp;';
	var $prev_tag_close		= '';
	var $num_tag_open		= '&nbsp;';
	var $num_tag_close		= '';
	var $page_query_string	= FALSE;
	var $query_string_segment = 'per_page';

	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 */
	function AgentStormPagination($params = array())
	{
		if (count($params) > 0)
		{
			$this->initialize($params);
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize Preferences
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 * @return	void
	 */
	function initialize($params = array())
	{
		if (count($params) > 0)
		{
			foreach ($params as $key => $val)
			{
				if (isset($this->$key))
				{
					$this->$key = $val;
				}
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Generate the pagination links
	 *
	 * @access	public
	 * @return	string
	 */
	function create_links()
	{
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 OR $this->per_page == 0)
		{
			return '';
		}

		// Calculate the total number of pages
		$num_pages = ceil($this->total_rows / $this->per_page);

		// Is there only one page? Hm... nothing more to do here then.
		if ($num_pages == 1)
		{
			return '';
		}

		// Determine the current page number.
		$this->num_links = (int)$this->num_links;

		if ($this->num_links < 1)
		{
			echo _('Your number of links must be a positive number.');
		}

		if ( ! is_numeric($this->cur_page))
		{
			$this->cur_page = 0;
		}

		// Is the page number beyond the result range?
		// If so we show the last page
		if ($this->cur_page > $this->total_rows)
		{
			$this->cur_page = ($num_pages - 1) * $this->per_page;
		}

		$uri_page_number = $this->cur_page;
		$this->cur_page = floor(($this->cur_page/$this->per_page) + 1);

		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		$end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

		// Is pagination being used over GET or POST?  If get, add a per_page query
		// string. If post, add a trailing slash to the base URL if needed
		$this->base_url = $this->base_url;

  		// And here we go...
		$output = '';

		// Render the "First" link
		if  ($this->cur_page > ($this->num_links + 1))
		{
			$output .= $this->first_tag_open.'<a href="'.$this->base_url.'">'.$this->first_link.'</a>'.$this->first_tag_close;
		}

		// Render the "previous" link
		if  ($this->cur_page != 1)
		{
			$i = $uri_page_number - $this->per_page;
			if ($i == 0) $i = '';
			$output .= $this->prev_tag_open.'<a href="'.$this->base_url.$i.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
		}

		// Write the digit links
		for ($loop = $start -1; $loop <= $end; $loop++)
		{
			$i = ($loop * $this->per_page) - $this->per_page;

			if ($i >= 0)
			{
				if ($this->cur_page == $loop)
				{
					$output .= $this->cur_tag_open.$loop.$this->cur_tag_close; // Current page
				}
				else
				{
					$n = ($i == 0) ? '' : $i;
					$output .= $this->num_tag_open.'<a href="'.$this->base_url.$n.'">'.$loop.'</a>'.$this->num_tag_close;
				}
			}
		}

		// Render the "next" link
		if ($this->cur_page < $num_pages)
		{
			$output .= $this->next_tag_open.'<a href="'.$this->base_url.($this->cur_page * $this->per_page).'">'.$this->next_link.'</a>'.$this->next_tag_close;
		}

		// Render the "Last" link
		if (($this->cur_page + $this->num_links) < $num_pages)
		{
			$i = (($num_pages * $this->per_page) - $this->per_page);
			$output .= $this->last_tag_open.'<a href="'.$this->base_url.$i.'">'.$this->last_link.'</a>'.$this->last_tag_close;
		}

		// Kill double slashes.  Note: Sometimes we can end up with a double slash
		// in the penultimate link so we'll kill all double slashes.
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		$output = $this->full_tag_open.$output.$this->full_tag_close;

		return $output;
	}
}

class AgentStormCaptcha { 

    var $session_key = null; 
    var $temp_dir    = null; 
    var $width       = 160; 
    var $height      = 60; 
    var $jpg_quality = 15; 
         
         
    /** 
     * Constructor - Initializes Captcha class! 
     * 
     * @param string $session_key 
     * @param string $temp_dir 
     * @return captcha 
     */ 
    function captcha( $session_key,  $temp_dir ) { 
        $this->session_key = $session_key; 
        $this->temp_dir    = $temp_dir; 
    } 
     
             
    /** 
     * Generates Image file for captcha 
     * 
     * @param string $location 
     * @param string $char_seq 
     * @return unknown 
     */ 
    function _generate_image( $location,  $char_seq ) { 
        $num_chars = strlen($char_seq); 
         
        $img = imagecreatetruecolor( $this->width,  $this->height ); 
        imagealphablending($img,  1); 
        imagecolortransparent( $img ); 
         
        // generate background of randomly built ellipses 
        for ($i=1; $i<=200; $i++) 
        { 
            $r = round( rand( 0,  100 ) ); 
            $g = round( rand( 0,  100 ) ); 
            $b = round( rand( 0,  100 ) ); 
            $color = imagecolorallocate( $img,  $r,  $g,  $b ); 
            imagefilledellipse( $img, round(rand(0, $this->width)),  round(rand(0, $this->height)),  round(rand(0, $this->width/16)),  round(rand(0, $this->height/4)),  $color );     
        } 
         
        $start_x = round($this->width / $num_chars); 
        $max_font_size = $start_x; 
        $start_x = round(0.5*$start_x); 
        $max_x_ofs = round($max_font_size*0.9); 
         
        // set each letter with random angle,  size and color 
        for ($i=0;$i<=$num_chars;$i++) 
        { 
            $r = round( rand( 127,  255 ) ); 
            $g = round( rand( 127,  255 ) ); 
            $b = round( rand( 127,  255 ) ); 
            $y_pos = ($this->height/2)+round( rand( 5,  20 ) ); 
             
            $fontsize = round( rand( 18,  $max_font_size) ); 
            $color = imagecolorallocate( $img,  $r,  $g,  $b); 
            $presign = round( rand( 0,  1 ) ); 
            $angle = round( rand( 0,  25 ) ); 
            if ($presign==true) $angle = -1*$angle; 
             
            ImageTTFText( $img,  $fontsize,  $angle,  $start_x+$i*$max_x_ofs,  $y_pos,  $color,  'default.ttf',  substr($char_seq, $i, 1) ); 
        } 
         
        // create image file 
        imagejpeg( $img,  $location,  $this->jpg_quality ); 
        flush(); 
        imagedestroy( $img ); 
             
        return true; 
    } 
     
     
    /** 
     * Returns name of the new generated captcha image file 
     * 
     * @param unknown_type $num_chars 
     * @return unknown 
     */ 
    function get_pic( $num_chars=8 ) { 
        // define characters of which the captcha can consist 
        $alphabet = array(  
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 
            '1', '2', '3', '4', '5', '6', '7', '8', '9', '0' ); 
             
        $max = sizeof( $alphabet ); 
         
        // generate random string 
        $captcha_str = ''; 
        for ($i=1;$i<=$num_chars;$i++) // from 1..$num_chars 
        { 
            // choose randomly a character from alphabet and append it to string 
            $chosen = rand( 1,  $max ); 
            $captcha_str .= $alphabet[$chosen-1]; 
        } 
         
        // generate a picture file that displays the random string 
        if ( $this->_generate_image( $this->temp_dir.'/'.'cap_'.md5( strtolower( $captcha_str )).'.jpg' ,  $captcha_str ) ) 
        { 
            $fh = fopen( $this->temp_dir.'/'.'cap_'.$this->session_key.'.txt',  "w" ); 
            fputs( $fh,  md5( strtolower( $captcha_str ) ) ); 
            return( md5( strtolower( $captcha_str ) ) ); 
        } 
        else  
        { 
            return false; 
        } 
    } 
     
    /** 
     * check hash of password against hash of searched characters 
     * 
     * @param string $char_seq 
     * @return boolean 
     */ 
    function verify( $char_seq ) { 
        $fh = fopen( $this->temp_dir.'/'.'cap_'.$this->session_key.'.txt',  "r" ); 
        $hash = fgets( $fh ); 
         
        if (md5(strtolower($char_seq)) == $hash) 
            return true; 
        else  
            return false;             
    }         
} 

class AgentStormPage {
    
    public $ID = -1;
    
    public $post_title = '';
    
    public $post_content = '<p></p>';
    
    public $post_author;
    
    public $post_status = 'publish';
    
    public $post_type = 'page';
    
    public $ping_status = 'closed';
    
    public $comment_status = 'closed';
    
    public $comment_count = 0;
    
    public $post_date = '';
    
    public $post_date_gmt = '';
    
    /**
     *
     */
    function __construct($id, $title, $content) {
        $this->post_date = current_time('mysql');
        $this->post_date_gmt = current_time('mysql', 1);
        $this->post_author = 1;
        $this->ID = $id;
        $this->post_title = $title;
        $this->post_content = $content;
    }
    
    /**
     *
     */
    function toArray() {
        $return = array();
        foreach ($this as $key => $value) {
            $return[$key] = $value;
        }
        return $return;
    }
    
}


class AgentStormWidgetContact {
    
    /**
     *
     */
    function init() {
        register_sidebar_widget(_('Agent Storm Contact Manager Widget'), array($this, 'display'));
        register_widget_control(_('Agent Storm Contact Manager Widget'), array($this, 'displayAdmin'));
    }
    
    /**
     *
     */
    function canCreateCaptcha() {
    	return function_exists('imagecreatetruecolor');
    }
     
    /**
     *
     */
    function display($args) {
        
        // Build our captcha session code
        //
        if (array_key_exists('as_session_code', $_POST)) {
			$session_code = $_POST['as_session_code'];
        } else {
        	$session_code = md5(round(rand(0, 40000)));
        }
        
        $as_saved = false;
        if (!empty($_POST)) {
            if (isset($_POST['as_contactwidget_submit'])) {
                
                // Build the basic document to be posted
                //
                $xmldoc = new SimpleXMLElement('<?xml version = "1.0" encoding = "UTF-8"?><Contacts></Contacts>');
                $contact = $xmldoc->addChild("Contact"); 
                $contact->addChild('Name', $_POST['as_contact_name']); 
                $contact->addChild('ContactSource', AgentStormSettingCache::get('as_contact_source')); 
                
                // If we have been passed an Email Address add it to the XML to be posted
                //
                if (isset($_POST['as_contact_email']) && !empty($_POST['as_contact_email'])) {
                    $email_addresses = $contact->addChild('EmailAddresses');
                    $email_address_c = $email_addresses->addChild('EmailAddress');
                    $email_address = $email_address_c->addChild('EmailAddress', $_POST['as_contact_email']);
                }
                
                // If we have been passed a Phone Number add it to the XML to be posted
                //
                if (isset($_POST['as_contact_phone']) && !empty($_POST['as_contact_email'])) {
                    $phone_numbers = $contact->addChild('PhoneNumbers');
                    $phone_number_c = $phone_numbers->addChild('PhoneNumber');
                    $phone_number = $phone_number_c->addChild('Number', $_POST['as_contact_phone']);
                }
                
                // If we have been passed a Message add it to the XML to be posted
                //
                if (isset($_POST['as_contact_message']) && !empty($_POST['as_contact_email'])) {
                    $notes = $contact->addChild('Notes');
                    $note_c = $notes->addChild('Note');
                    $note = $note_c->addChild('Note', $_POST['as_contact_message']);
                }
                
                $request = new AgentStormRequest(AgentStormSettingCache::get('as_hostname'), AgentStormSettingCache::get('as_apikey'));
                $as_saved = $request->postRemote('contacts', array(), $xmldoc->asXML());
                
            }
        }
        
        extract($args);
        echo $before_widget;
        echo $before_title . AgentStormSettingCache::get('as_contactwidget_title') . $after_title;
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_contact.php';
        echo $after_widget;
        
    }
    
    /**
     *
     */
    function displayAdmin() {
        if (!empty($_POST)) {
            $this->saveAdmin();
        }
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_contactoptions.php';
    }
    
    /**
     *
     */
    function saveAdmin() {
        if (isset($_POST['as_contactwidget_save'])) {
            AgentStormSettingCache::set('as_contactwidget_title', $_POST['as_contactwidget_title']);
            AgentStormSettingCache::set('as_contactwidget_desc', $_POST['as_contactwidget_desc']);
            AgentStormSettingCache::set('as_contactwidget_success', $_POST['as_contactwidget_success']);
            AgentStormSettingCache::set('as_contactwidget_button', $_POST['as_contactwidget_button']);
        }
    }
    
}

class AgentStormWidgetSearchMLSNumber {
    
    /**
     *
     */
    function init() {
        register_sidebar_widget(_('Agent Storm Search by MLS Number'), array($this, 'display'));
        register_widget_control(_('Agent Storm Search by MLS Number'), array($this, 'displayAdmin'));
    }
    
    /**
     *
     */
    function display($args) {
        
        extract($args);
        echo $before_widget;
        echo $before_title . AgentStormSettingCache::get('as_searchmlsnumberwidget_title') . $after_title;
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_searchmlsnumber.php';
        echo $after_widget;
        
    }
    
    /**
     *
     */
    function displayAdmin() {
        if (!empty($_POST)) {
            $this->saveAdmin();
        }
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_searchmlsnumberoptions.php';
    }
    
    /**
     *
     */
    function saveAdmin() {
        if (isset($_POST['as_searchmlsnumberwidget_save'])) {
            AgentStormSettingCache::set('as_searchmlsnumberwidget_title', $_POST['as_searchmlsnumberwidget_title']);
            AgentStormSettingCache::set('as_searchmlsnumberwidget_desc', $_POST['as_searchmlsnumberwidget_desc']);
        }
    }
    
}

class AgentStormWidgetLoggedIn {
    
    /**
     *
     */
    function init() {
        register_sidebar_widget(_('Agent Storm Logged In User'), array($this, 'display'));
        register_widget_control(_('Agent Storm Logged In User'), array($this, 'displayAdmin'));
    }
    
    /**
     *
     */
    function display($args) {
        
        if (!is_user_logged_in()) return;
        
        // Get the logged in user
        //
        global $current_user;
        get_currentuserinfo();
        
        // Display the Widget
        //
        extract($args);
        echo $before_widget;
        if (AgentStormSettingCache::get('as_loggedinwidget_title')) echo $before_title . ucwords(str_replace('#NAME#', $current_user->display_name, AgentStormSettingCache::get('as_loggedinwidget_title'))) . $after_title;
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_loggedin.php';
        echo $after_widget;
        
    }
    
    /**
     *
     */
    function displayAdmin() {
        if (!empty($_POST)) {
            $this->saveAdmin();
        }
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_loggedinoptions.php';
    }
    
    /**
     *
     */
    function saveAdmin() {
        if (isset($_POST['as_loggedinwidget_save'])) {
            AgentStormSettingCache::set('as_loggedinwidget_title', $_POST['as_loggedinwidget_title']);
            AgentStormSettingCache::set('as_loggedinwidget_desc', $_POST['as_loggedinwidget_desc']);
        }
    }
    
}

class AgentStormWidgetSearchDetails {
    
    /**
     *
     */
    function init() {
        register_sidebar_widget(_('Agent Storm Search Details'), array($this, 'display'));
        register_widget_control(_('Agent Storm Search Details'), array($this, 'displayAdmin'));
    }
    
    /**
     *
     */
    function display($args) {
        
        // Display the Widget
        //
        extract($args);
        echo $before_widget;
        echo $before_title . AgentStormSettingCache::get('as_searchdetailswidget_title') . $after_title;
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_searchdetails.php';
        echo $after_widget;
        
    }
    
    /**
     *
     */
    function displayAdmin() {
        if (!empty($_POST)) {
            $this->saveAdmin();
        }
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_searchdetailsoptions.php';
    }
    
    /**
     *
     */
    function saveAdmin() {
        if (isset($_POST['as_searchdetailswidget_save'])) {
            AgentStormSettingCache::set('as_searchdetailswidget_title', $_POST['as_searchdetailswidget_title']);
            AgentStormSettingCache::set('as_searchdetailswidget_desc', $_POST['as_searchdetailswidget_desc']);
			if (array_key_exists('as_configurablesearchwidget_summary', $_POST)) {
	            AgentStormSettingCache::set('as_configurablesearchwidget_summary', true);
			} else {
	            AgentStormSettingCache::set('as_configurablesearchwidget_summary', false);
			}
        }
    }
    
}

class AgentStormWidgetPriceFilter {
    
    /**
     *
     */
    function init() {
        register_sidebar_widget(_('Agent Storm Price Filter'), array($this, 'display'));
        register_widget_control(_('Agent Storm Price Filter'), array($this, 'displayAdmin'));
    }
    
    /**
     *
     */
    function display($args) {
        
        // Display the Widget
        //
        extract($args);
        echo $before_widget;
        echo $before_title . AgentStormSettingCache::get('as_pricefilterwidget_title') . $after_title;
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_pricefilter.php';
        echo $after_widget;
        
    }
    
    /**
     *
     */
    function displayAdmin() {
        if (!empty($_POST)) {
            $this->saveAdmin();
        }
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_pricefilteroptions.php';
    }
    
    /**
     *
     */
    function saveAdmin() {
        if (isset($_POST['as_pricefilterwidget_save'])) {
            AgentStormSettingCache::set('as_pricefilterwidget_title', $_POST['as_pricefilterwidget_title']);
            AgentStormSettingCache::set('as_pricefilterwidget_desc', $_POST['as_pricefilterwidget_desc']);
        }
    }
    
}

class AgentStormWidgetPropertyTypeFilter {
    
    /**
     *
     */
    function init() {
        register_sidebar_widget(_('Agent Storm Property Type Filter'), array($this, 'display'));
        register_widget_control(_('Agent Storm Property Type Filter'), array($this, 'displayAdmin'));
    }
    
    /**
     *
     */
    function display($args) {
        
        // Display the Widget
        //
        extract($args);
        echo $before_widget;
        echo $before_title . AgentStormSettingCache::get('as_propertytypefilterwidget_title') . $after_title;
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_propertytypefilter.php';
        echo $after_widget;
        
    }
    
    /**
     *
     */
    function displayAdmin() {
        if (!empty($_POST)) {
            $this->saveAdmin();
        }
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_propertytypefilteroptions.php';
    }
    
    /**
     *
     */
    function saveAdmin() {
        if (isset($_POST['as_propertytypefilterwidget_save'])) {
            AgentStormSettingCache::set('as_propertytypefilterwidget_title', $_POST['as_propertytypefilterwidget_title']);
            AgentStormSettingCache::set('as_propertytypefilterwidget_desc', $_POST['as_propertytypefilterwidget_desc']);
        }
    }
    
}

class AgentStormWidgetNavigation {
    
    /**
     *
     */
    function init() {
        register_sidebar_widget(_('Agent Storm Navigation Widget'), array($this, 'display'));
        register_widget_control(_('Agent Storm Navigation Widget'), array($this, 'displayAdmin'));
    }
    
    /**
     *
     */
    function display($args) {
        
        $as = new AgentStormRequest(AgentStormSettingCache::get('as_hostname'), AgentStormSettingCache::get('as_apikey'));
        $cities = AgentStormSettingCache::get('as_cities');
        
        extract($args);
        echo $before_widget;
        echo $before_title . AgentStormSettingCache::get('as_navigationwidget_title') . $after_title;
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_navigation.php';
        echo $after_widget;
        
    }
    
    /**
     *
     */
    function displayAdmin() {
        if (!empty($_POST)) {
            $this->saveAdmin();
        }
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_navigationoptions.php';
    }
    
    /**
     *
     */
    function saveAdmin() {
        if (isset($_POST['as_navigationwidget_save'])) {
            AgentStormSettingCache::set('as_navigationwidget_title', $_POST['as_navigationwidget_title']);
            AgentStormSettingCache::set('as_navigationwidget_desc', $_POST['as_navigationwidget_desc']);
        }
    }
    
    function getPermalink($url, $object) {
        
        if (isset($object->State))       $url = str_replace('%state%',        agentstorm_slugify($object->State),       $url);
        if (isset($object->City))        $url = str_replace('%city%',         agentstorm_slugify($object->City),        $url);
        if (isset($object->Id))          $url = str_replace('%id%',           agentstorm_slugify($object->Id),          $url);
        if (isset($object->FullAddress)) $url = str_replace('%full_address%', agentstorm_slugify($object->FullAddress), $url);
        if (isset($object->SubDivision)) $url = str_replace('%subdivision%',  agentstorm_slugify($object->SubDivision), $url);
        return $url;
        
    }
    
}


class AgentStormWidgetSearch {
    
    /**
     *
     */
    function init() {
        register_sidebar_widget(_('Agent Storm Search Widget'), array($this, 'display'));
        register_widget_control(_('Agent Storm Search Widget'), array($this, 'displayAdmin'));
    }
    
    /**
     *
     */
    function display($args) {
        
        $as = new AgentStormRequest(AgentStormSettingCache::get('as_hostname'), AgentStormSettingCache::get('as_apikey'));
        $cities = AgentStormSettingCache::get('as_cities');
        
        extract($args);
        echo $before_widget;
        echo $before_title . AgentStormSettingCache::get('as_searchwidget_title') . $after_title;
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_search.php';
        echo $after_widget;
        
    }
    
    /**
     *
     */
    function displayAdmin() {
        if (!empty($_POST)) {
            $this->saveAdmin();
        }
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_searchoptions.php';
    }
    
    /**
     *
     */
    function saveAdmin() {
        if (isset($_POST['as_searchwidget_save'])) {
            AgentStormSettingCache::set('as_searchwidget_title', $_POST['as_searchwidget_title']);
            AgentStormSettingCache::set('as_searchwidget_desc', $_POST['as_searchwidget_desc']);
        }
    }
    
}

class AgentStormWidgetConfigurableSearch {
    
    /**
     *
     */
    function init() {
        register_sidebar_widget(_('Agent Storm Configurable Search Widget'), array($this, 'display'));
        register_widget_control(_('Agent Storm Configurable Search Widget'), array($this, 'displayAdmin'));
    }
    
    /**
     *
     */
    function display($args) {
        
        $as = new AgentStormRequest(AgentStormSettingCache::get('as_hostname'), AgentStormSettingCache::get('as_apikey'));
        $cities = AgentStormSettingCache::get('as_cities');
        
        extract($args);
        echo $before_widget;
        echo $before_title . AgentStormSettingCache::get('as_configurablesearchwidget_title') . $after_title;
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_configurablesearch.php';
        echo $after_widget;
        
    }
    
    /**
     *
     */
    function displayAdmin() {
        if (!empty($_POST)) {
            $this->saveAdmin();
        }
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'agentstorm_widget_configurablesearchoptions.php';
    }
    
    /**
     *
     */
    function saveAdmin() {
        if (isset($_POST['as_configurablesearchwidget_save'])) {
            AgentStormSettingCache::set('as_configurablesearchwidget_title', $_POST['as_configurablesearchwidget_title']);
            AgentStormSettingCache::set('as_configurablesearchwidget_desc', $_POST['as_configurablesearchwidget_desc']);
            AgentStormSettingCache::set('as_configurablesearchwidget_type', $_POST['as_configurablesearchwidget_type']);
            AgentStormSettingCache::set('as_configurablesearchwidget_suburbzip', $_POST['as_configurablesearchwidget_suburbzip']);
            AgentStormSettingCache::set('as_configurablesearchwidget_subdivision', $_POST['as_configurablesearchwidget_subdivision']);
            AgentStormSettingCache::set('as_configurablesearchwidget_price', $_POST['as_configurablesearchwidget_price']);
            AgentStormSettingCache::set('as_configurablesearchwidget_bedrooms', $_POST['as_configurablesearchwidget_bedrooms']);
            AgentStormSettingCache::set('as_configurablesearchwidget_bathrooms', $_POST['as_configurablesearchwidget_bathrooms']);
            AgentStormSettingCache::set('as_configurablesearchwidget_lotsize', $_POST['as_configurablesearchwidget_lotsize']);
            AgentStormSettingCache::set('as_configurablesearchwidget_size', $_POST['as_configurablesearchwidget_size']);
            AgentStormSettingCache::set('as_configurablesearchwidget_shortsale', $_POST['as_configurablesearchwidget_shortsale']);
            AgentStormSettingCache::set('as_configurablesearchwidget_foreclosure', $_POST['as_configurablesearchwidget_foreclosure']);
        }
    }
    
}

class AgentStormActions {
    
    function init($links, $file) {
        $this_plugin = plugin_basename(__FILE__);
        if ( $file == $this_plugin ){
            array_unshift($links, '<a href="http://getsatisfaction.com/stormrets">' . __('Support') . '</a>');
            array_unshift($links, '<a href="admin.php?page=' . $this_plugin . '">' . __('Settings') . '</a>');
        }
        return $links;
    }
    
}

class AgentStormUserExtensions {
    
    function init() {
		add_filter('manage_users_columns', array(&$this, 'column_headers'), 15, 1);
		add_action('manage_users_custom_column', array(&$this, 'column_header_field'), 15, 3);
		add_action('show_user_profile', array(&$this, 'user_profile'));
		add_action('edit_user_profile', array(&$this, 'user_profile'));
    }
    
	function column_headers( $defaults ) {
		$defaults['as-sp-userfield'] = __('Saved Properties', 'user-column');
		$defaults['as-ss-userfield'] = __('Saved Searches', 'user-column');
		return $defaults;
	}
	
	function column_header_field($value, $column_name, $id) {
		if( $column_name == 'as-sp-userfield' ) {
			if ( current_user_can('edit_users') ) {
				return sizeof(json_decode(get_usermeta($id, 'as_saved_properties')));
			} else {
				return '&mdash;';
			}
		}
		if( $column_name == 'as-ss-userfield' ) {
			if ( current_user_can('edit_users') ) {
				return sizeof(json_decode(get_usermeta($id, 'as_saved_queries')));
			} else {
				return '&mdash;';
			}
		}
	}
	
	function user_profile( $user ) {
		
		$queries = json_decode(get_usermeta($user->ID, 'as_saved_queries'));
		$properties = json_decode(get_usermeta($user->ID, 'as_saved_properties'));
		
?>
		
		<h3>Saved Properties</h3>
		<?php if (sizeof($properties)): ?>
			<ul>
				<?php foreach ($properties as $property): ?>
				<li><a href="<?php echo bloginfo('url'); ?>/<?php echo AgentStormSettingCache::get('as_idx_searchprefix'); ?>?as_mlsnumber=<?php echo $property->ListingId; ?>&as_searchwidget_submit=1"><?php echo $property->FullAddress; ?> #<?php echo $property->ListingId; ?></a></li>
				<?php endforeach; ?>
			</ul>
		<?php else: ?>
			<strong>This user has no saved properties</strong>
		<?php endif; ?>
		
		<h3>Saved Queries</h3>
		<?php if (sizeof($queries)): ?>
			<ul>
				<?php foreach ($queries as $query_id => $query): ?>
	            <li><a href="<?php echo get_bloginfo('url', 'display') . '/' . AgentStormSettingCache::get('as_idx_searchprefix'); ?>?<?php foreach($query as $k => $v): echo $k . '=' . $v . '&'; endforeach; ?>">Query #<?php echo $query_id+1; ?></a></li>
				<?php endforeach; ?>
			</ul>
		<?php else: ?>
			<strong>This user has no saved queries</strong>
		<?php endif; ?>
		
<?php
		
	}
	
}

class AgentStormToolbar {
    
}

class AgentStormSettingCache {
	
	static $settings = null;
	
	static function populateCache() {
		global $wpdb;
		$options = $wpdb->get_results("SELECT option_name, option_value FROM {$wpdb->prefix}options WHERE option_name LIKE 'as_%'");
		foreach ($options as $option) {
			self::$settings[$option->option_name] = $option->option_value;
		}
	}
	
	static function get($key, $default = '') {
		if (!self::$settings) {
			self::populateCache();
		}
		if (self::$settings) {
			if (array_key_exists($key, self::$settings)) {
				$return_value = self::$settings[$key];
				if ((substr($return_value,0, 2) == 'a:') || (substr($return_value,0, 2) == 'O:'))  {
					return unserialize($return_value);
				}
				return self::$settings[$key];
			}
			return $default;
		}
	}
	
	static function set($key, $value) {
		if (is_array($value) || is_object($value)) {
			$value = serialize($value);
		}
		self::$settings[$key] = $value;
		return update_option($key, $value);
	}

}

class AgentStormRequest {
    
    /**
     *
     */
    public $hostname = '';
    
    /**
     *
     */
    public $apikey = '';
    
    /**
     *
     */
    public $format = 'json';
    
    
    /**
     *
     */
    function __construct($hostname, $apikey) {
        $this->hostname = $hostname;
        $this->apikey = $apikey;
    }
    
    /**
     *
    */
    private function buildParams($params) {
        $return = '?';
        foreach ($params as $key => $value) {
            $return .= $key . '=' . urlencode($value) . '&';
        }
        return trim($return, '&');
    }
    
	/**
	 *
	 */
	function parseResult($result) {
        
		switch ($this->format) {
            
            case 'json':
                return json_decode($result);
                break;
            
            case 'xml':
                return @simplexml_load_string($result);
                break;
			
			default:
				return false;
				break;
            
        }
		
	}
	
	/**
	 *
	 */
	function runInBackground($command, $priority = 0) {
		if ($priority) {
			$pid = shell_exec("nohup nice -n $priority $command 2> /dev/null & echo $!");
		} else {
			$pid = shell_exec("$command >> /tmp/sr_pipeliner.log 2> /dev/null & echo $!");
		}
		return($pid);
	}	
    
	/**
	 *
	 */
	function isProcessRunning($pid) {
       exec("ps $pid", $process_state);
       return(count($process_state) >= 2);
	}
	
    /**
     *
     */
    function getRemote($path, $params = array()) {
        
		# Build the URL
		#
		$params['apikey'] = $this->apikey;
		$param_string = $this->buildParams($params);
		$url = $this->hostname . $path . '.' . $this->format . $param_string;
		
		# If pipelining is enabled, make the request via the pipeliner
		#
		if (AgentStormSettingCache::get('as_pipelining', false)) {
			
			# Check/Fire the API Pipelining Server
			#
			$pid = AgentStormSettingCache::get('as_backpid', 0);
			if (!$pid || !$this->isProcessRunning($pid)) {
				$pid = $this->runInBackground('/usr/bin/php ' . dirname(__FILE__) . '/agentstorm_keepalive_server.php');
				AgentStormSettingCache::set('as_backpid', $pid);
			}
			
			if (!$this->isProcessRunning($pid)) {
				die("Failed to start server");
			}
			
			$queue = msg_get_queue(100381);
			
			# Build our message
			$message = new stdClass();
			$message->url = $url;
			$message->rt = rand(110000, 120000);
			$message->validity = time()+5;
			
			$msgtype = 1;
			$maxsize = 102400;

			# Send the Request
			#
			$m = json_encode($message);
			msg_send($queue, $msgtype, $m, true, true, $err);
			
			# Get the Result
			#
			$ret_queue = msg_get_queue($message->rt);
			$chunks = array();
			$encoding = 'plain';
			if (msg_receive($ret_queue, 1, $rt_memtype, $maxsize, $data, true)===true) {
				$chunks[] = $data;
				$encoding = $data['encoding'];
				for ($i=0; $i <= $data['chunks']-2; $i++ ) {
					$rety_count = 0;
					while ($rety_count <= 5) {
						if (msg_receive($ret_queue, 1, $rt_memtype, $maxsize, $data, true)===true) {
							$chunks[] = $data;
							break;
						}
						$rety_count++;
						usleep(10000);
					}
				}
			}
			msg_remove_queue($ret_queue);
            
			# Parse the Chunked Data
			#
			$data = '';
			foreach ($chunks as $chunk) {
				$data .= $chunk['data'];
			}

			# Deflate is needed
			#
			if ($encoding == 'deflate') {
				$data = gzuncompress($data);
			}
			
			return $this->parseResult($data);
			
		} else {
			
			$request = new WP_Http();
			$result = $request->request( $url, array( 'headers' => array( 'X-Forwarded-For' => $_SERVER['REMOTE_ADDR'] ) ) );
			
			if ( is_wp_error($result) ) {
				wp_mail(
					"hello@stormrets.com",
					"[ " . AgentStormSettingCache::get( 'blogname' ) . " ] ".__( 'Error Encountered' ), 
					"Error Code: ".$result->get_error_code()."\r\n".
					"Error Message: ".$result->get_error_message($result->get_error_code())."\r\n".
					"Error Data: ".$result->get_error_data($result->get_error_code())."\r\n"
				);
				return false;
			} else {
				return $this->parseResult($result['body']);
			}
			
		}
        
    }
    
    /**
     *
     */
    function postRemote($path, $params = array(), $data) {
        
        $params['apikey'] = $this->apikey;
        $param_string = $this->buildParams($params);
        
        $ch = curl_init($this->hostname . $path . '.' . $this->format . $param_string);
        //curl_setopt($ch, CURLOPT_MUTE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, "$data");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        $data = curl_exec($ch);
        if (!curl_errno($ch)) {
            
			curl_close($ch);
			
	        return $this->parseResult($data);
			
        }
        
        return false;
        
    }
    
    /**
     *
     */
    function putRemote($path, $params = array(), $data) {
        
        $params['apikey'] = $this->apikey;
        $param_string = $this->buildParams($params);
        
        $ch = curl_init($this->hostname . $path . '.' . $this->format . $param_string);
        //curl_setopt($ch, CURLOPT_MUTE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, "$data");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $data = curl_exec($ch);
        if (!curl_errno($ch)) {
            
			curl_close($ch);
			
	        return $this->parseResult($data);
			
        }
        
        return false;
        
    }
    
    /**
     *
     */
    function getContacts() {
        return $this->getRemote('contacts');
    }
    
    /**
     *
     */
    function getContact($contact_id) {
        return $this->getRemote('contacts/' . $contact_id);
    }
    
    /**
     *
     */
    function getContactByUsername($username) {
        return $this->getRemote('contacts', array('Meta.Username' => $username));
    }
    
    /**
     *
     */
    function getProperties($search = array()) {
        if (AgentStormSettingCache::get(as_idx_settings_tag, '') != '') {
            return $this->getRemote('properties/tags/' . AgentStormSettingCache::get(as_idx_settings_tag, ''), $search);
        } else {
            return $this->getRemote('properties', $search);
        }
    }
    
    /**
     *
     */
    function getProperty($property_id) {
        return $this->getRemote('properties/' . $property_id);
    }
    
    /**
     * Get Property Tags on this account
     */
    function getTags() {
        return $this->getRemote('properties/tags');
    }
    
    /**
     * Get Property MetaData
     */
    function getPropertyMetaData() {
        return $this->getRemote('properties/fields');
    }
    
    /**
     *
     */
    function getCities() {
        if (AgentStormSettingCache::get(as_idx_settings_tag, '') != '') {
            return $this->getRemote('properties/tags/' . AgentStormSettingCache::get(as_idx_settings_tag, '') . '/cities', $search);
        } else {
            return $this->getRemote('properties/cities', $search);
        }
    }
    
}

/**
 *
 */
function agentstorm_slugify($string) {
    
	$string = utf8_decode($string);
	$string = html_entity_decode($string);
	
	$ponctu = array("?", ".", "!", ",");
	$string = str_replace($ponctu, "", $string);
	
	$string = trim($string);
	$string = preg_replace('/([^a-z0-9]+)/i', '-', $string);
	$string = strtolower($string);
 
	if (empty($string)) return 'n-a';
	
	return utf8_encode($string);

}

/**
 *
 */
function agentstorm_activate() {
    
    // Schedule the Hourly cache update
    //
    wp_schedule_event(time(), 'hourly', 'agentstorm_hourly');
    
    // Set some variables
    //
    if (AgentStormSettingCache::get('as_usestyle', '') == '') AgentStormSettingCache::set('as_usestyle', true);
    if (AgentStormSettingCache::get('as_idx_gmap', '') == '') AgentStormSettingCache::set('as_idx_gmap', true);
    if (AgentStormSettingCache::get('as_idx_bview', '') == '') AgentStormSettingCache::set('as_idx_bview', true);
    if (AgentStormSettingCache::get('as_contact_source', '') == '') AgentStormSettingCache::set('as_contact_source', 'Wordpress Blog');
	if (AgentStormSettingCache::get('as_contact_lightbox_header', '') == '') AgentStormSettingCache::set('as_contact_lightbox_header', 'You must be logged in or register on this site to search the IDX.');
    if (AgentStormSettingCache::get('as_idx_settings_pagelimit', '') == '') AgentStormSettingCache::set('as_idx_settings_pagelimit', '10');
    if (AgentStormSettingCache::get('as_idx_punctuation', '') == '') AgentStormSettingCache::set('as_idx_punctuation', true);
	if (AgentStormSettingCache::get('as_idx_linkstate', '') == '') AgentStormSettingCache::set('as_idx_linkstate', true);
	
    // Set default API key
    //
    if (AgentStormSettingCache::get('as_hostname', '') == '') AgentStormSettingCache::set('as_hostname', 'http://example.stormrets.com/');
    if (AgentStormSettingCache::get('as_apikey', '') == '') AgentStormSettingCache::set('as_apikey', 'XuAohILgqw83r3J31HyukiMTCOxwbuEN');
    
    // Enable all Property Classes
    //
    if (AgentStormSettingCache::get('as_idx_settings_classes_res', '') == '') AgentStormSettingCache::set('as_idx_settings_classes_res', true);
    if (AgentStormSettingCache::get('as_idx_settings_classes_com', '') == '') AgentStormSettingCache::set('as_idx_settings_classes_com', true);
    if (AgentStormSettingCache::get('as_idx_settings_classes_lnd', '') == '') AgentStormSettingCache::set('as_idx_settings_classes_lnd', true);
    if (AgentStormSettingCache::get('as_idx_settings_classes_mob', '') == '') AgentStormSettingCache::set('as_idx_settings_classes_mob', false);
    if (AgentStormSettingCache::get('as_idx_settings_classes_mfh', '') == '') AgentStormSettingCache::set('as_idx_settings_classes_mfh', false);
    if (AgentStormSettingCache::get('as_idx_settings_classes_rnt', '') == '') AgentStormSettingCache::set('as_idx_settings_classes_rnt', false);
    
    // Enable all Property Classes
    //
    if (AgentStormSettingCache::get('as_idx_settings_field_type', '') == '') AgentStormSettingCache::set('as_idx_settings_field_type', true);
    if (AgentStormSettingCache::get('as_idx_settings_field_suburbzip', '') == '') AgentStormSettingCache::set('as_idx_settings_field_suburbzip', true);
    if (AgentStormSettingCache::get('as_idx_settings_field_price', '') == '') AgentStormSettingCache::set('as_idx_settings_field_price', true);
    if (AgentStormSettingCache::get('as_idx_settings_field_bedrooms', '') == '') AgentStormSettingCache::set('as_idx_settings_field_bedrooms', true);
    if (AgentStormSettingCache::get('as_idx_settings_field_bathrooms', '') == '') AgentStormSettingCache::set('as_idx_settings_field_bathrooms', true);
    if (AgentStormSettingCache::get('as_idx_settings_field_lotsize', '') == '') AgentStormSettingCache::set('as_idx_settings_field_lotsize', true);
    if (AgentStormSettingCache::get('as_idx_settings_field_size', '') == '') AgentStormSettingCache::set('as_idx_settings_field_size', true);
    if (AgentStormSettingCache::get('as_idx_settings_field_shortsale', '') == '') AgentStormSettingCache::set('as_idx_settings_field_shortsale', true);
    if (AgentStormSettingCache::get('as_idx_settings_field_foreclosure', '') == '') AgentStormSettingCache::set('as_idx_settings_field_foreclosure', true);
    
    // Setup Default Views for Property Tpes
    //
    if (AgentStormSettingCache::get('as_metadata_COM_header', '') == '') AgentStormSettingCache::set('as_metadata_COM_header', 'ListingId,BuildingName,NumberOfFloors,TenencyType');
    if (AgentStormSettingCache::get('as_metadata_COM_property', '') == '') AgentStormSettingCache::set('as_metadata_COM_property', 'ListingId,BuildingName,NumberOfFloors,TenencyType');
    if (AgentStormSettingCache::get('as_metadata_COM_features', '') == '') AgentStormSettingCache::set('as_metadata_COM_features', '');
    if (AgentStormSettingCache::get('as_metadata_LND_header', '') == '') AgentStormSettingCache::set('as_metadata_LND_header', 'ListingId,LotSqFt');
    if (AgentStormSettingCache::get('as_metadata_LND_property', '') == '') AgentStormSettingCache::set('as_metadata_LND_property', 'ListingId,LotSqFt');
    if (AgentStormSettingCache::get('as_metadata_LND_features', '') == '') AgentStormSettingCache::set('as_metadata_LND_features', '');
    if (AgentStormSettingCache::get('as_metadata_RES_header', '') == '') AgentStormSettingCache::set('as_metadata_RES_header', 'ListingId,Bedrooms,FullBathrooms,HalfBathrooms,YearBuilt');
    if (AgentStormSettingCache::get('as_metadata_RES_property', '') == '') AgentStormSettingCache::set('as_metadata_RES_property', 'ListingId,Bedrooms,FullBathrooms,HalfBathrooms,YearBuilt');
    if (AgentStormSettingCache::get('as_metadata_RES_features', '') == '') AgentStormSettingCache::set('as_metadata_RES_features', 'ConstructionMaterials,Cooling,DiningRoomDescription,EnergySavingFeatures,ExteriorFeatures,LotFeatures,Fencing,FireplaceFeatures,Flooring,Heating,KitchenDescription,LaundryDescription,OtherRoomsDescription,Roof,PoolFeatures,SpaFeatures,Utilities,Electric,Water,Gas,Sewer');
    
    // Setup the Permalink Structure
    //
    if (AgentStormSettingCache::get('as_idx_searchprefix', '') == '') AgentStormSettingCache::set('as_idx_searchprefix', 'property-search/');
    if (AgentStormSettingCache::get('as_idx_propertyprefix', '') == '') AgentStormSettingCache::set('as_idx_propertyprefix', 'property/%state%/%city%/%id%-%full_address%.html');
    if (AgentStormSettingCache::get('as_idx_stateurlprefix', '') == '') AgentStormSettingCache::set('as_idx_stateurlprefix', 'property/%state%');
    if (AgentStormSettingCache::get('as_idx_cityurlprefix', '') == '') AgentStormSettingCache::set('as_idx_cityurlprefix', 'property/%state%/%city%');
    
    // Setup the Permalink Structure
    //
    if (AgentStormSettingCache::get('as_idx_template_result', '') == '') AgentStormSettingCache::set('as_idx_template_result', 'page.php');
    if (AgentStormSettingCache::get('as_idx_template_property', '') == '') AgentStormSettingCache::set('as_idx_template_property', 'page.php');
    if (AgentStormSettingCache::get('as_idx_template_noresults', '') == '') AgentStormSettingCache::set('as_idx_template_noresults', 'page.php');
    
    // Force update the cache
    //
    agentstorm_hourly();
    
}

/**
 *
 */
function agentstorm_deactivate() {
    wp_clear_scheduled_hook('agentstorm_hourly');
}

/**
 *
 */
function agentstorm_hourly() {
    if (AgentStormSettingCache::get('as_hostname') && AgentStormSettingCache::get('as_apikey')) {
        
        $as = new AgentStormRequest(AgentStormSettingCache::get('as_hostname'), AgentStormSettingCache::get('as_apikey'));
        
        $as_cities = $as->getCities();
        AgentStormSettingCache::set('as_cities', $as->getCities());
        
        $as_tags = $as->getTags();
        AgentStormSettingCache::set('as_tags', $as_tags->Tags);
        
        $as_metadata = $as->getPropertyMetaData();
        AgentStormSettingCache::set('as_metadata', $as_metadata->MetaData);
        
    }
}

/**
 *
 */
function agentstorm_metadatasort($a, $b) {
	if ($a->Name == $b->Name) {
		return 0;
	}
	return ($a->Name < $b->Name) ? -1 : 1;
}




// Initialize the Agent Storm Plugin
//
$agentstorm = new AgentStorm();
add_action('admin_init', array(&$agentstorm, 'adminInit'));
add_action('admin_menu', array(&$agentstorm, 'adminRegisterMenu'));
add_action('admin_footer', array(&$agentstorm, 'adminFooter'));
add_action('wp_ajax_agentstorm_result_layout', array(&$agentstorm, 'saveResultLayout'));
add_action('wp_ajax_agentstorm_shortcode_builder', array(&$agentstorm, 'shortCodeBuilder'));
add_action('wp_enqueue_scripts', array(&$agentstorm, 'loadSiteStyles'));
add_action('wp_head', array(&$agentstorm, 'siteHead'));
add_filter('redirect_canonical', array(&$agentstorm, 'preventFakeStaticRedirect'));
register_activation_hook(__FILE__, 'agentstorm_activate');
register_deactivation_hook(__FILE__, 'agentstorm_deactivate');
register_sidebar( array(
	'name'          => __('Agent Storm Above Listing'),
	'description'   => 'Widget area displayed above property listings'
));
register_sidebar( array(
	'name'          => __('Agent Storm - Below Listing'),
	'description'   => 'Widget area displayed below property listings'
));

// Initialize the Contact Manager Sidebar Widget
//
$agentstorm_contact_widget = new AgentStormWidgetContact();
add_action('plugins_loaded', array(&$agentstorm_contact_widget, 'init'));

// Initialize the Navigation Widget
//
$agentstorm_navigation_widget = new AgentStormWidgetNavigation();
add_action('plugins_loaded', array(&$agentstorm_navigation_widget, 'init'));

// Initialize the Search Widget
//
$agentstorm_search_widget = new AgentStormWidgetSearch();
add_action('plugins_loaded', array(&$agentstorm_search_widget, 'init'));

// Initialize the Search Widget
//
$agentstorm_configurablesearch_widget = new AgentStormWidgetConfigurableSearch();
add_action('plugins_loaded', array(&$agentstorm_configurablesearch_widget, 'init'));

// Initialize the MLS Number Search Widget
//
$agentstorm_mls_number_search_widget = new AgentStormWidgetSearchMLSNumber();
add_action('plugins_loaded', array(&$agentstorm_mls_number_search_widget, 'init'));

// Initialize the Search Detail Widget
//
$agentstorm_search_details_widget = new AgentStormWidgetSearchDetails();
add_action('plugins_loaded', array(&$agentstorm_search_details_widget, 'init'));

// Initialize the Price Filter Widget
//
$agentstorm_price_filter_widget = new AgentStormWidgetPriceFilter();
add_action('plugins_loaded', array(&$agentstorm_price_filter_widget, 'init'));

//
//
$agentstorm_propertytype_filter_widget = new AgentStormWidgetPropertyTypeFilter();
add_action('plugins_loaded', array(&$agentstorm_propertytype_filter_widget, 'init'));

// Initialize the Logged In Widget
//
$agentstorm_logged_in_widget = new AgentStormWidgetLoggedIn();
add_action('plugins_loaded', array(&$agentstorm_logged_in_widget, 'init'));

// Initialize the IDX Search/Display Controller
//
$agentstorm_idx = new AgentStormIDX();
add_action('parse_request', array(&$agentstorm_idx, 'init'));
add_filter('query_vars', array(&$agentstorm_idx, 'processQueryVars'));

//
//
$agentstorm_actions = new AgentStormActions();
add_filter('plugin_action_links', array(&$agentstorm_actions, 'init'), 10, 2 );

//
//
$agentstorm_login = new AgentStormLogin();
if (AgentStormSettingCache::get('as_contact_loginhook', false)) {
	$agentstorm_login->init();
}
if (AgentStormSettingCache::get('as_force_login', false)) {
	$agentstorm_login->initForceLogin();
}

$agentstorm_user_extensions = new AgentStormUserExtensions();
$agentstorm_user_extensions->init();
