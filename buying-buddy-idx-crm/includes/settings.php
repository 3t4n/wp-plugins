<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly   

/* Show Settings Page */
function buyingbuddy_settings() 
{
    global $buyingbuddy_options, $buyingbuddyObj, $wp_rewrite, $buyingbuddy_version;

    $msg_status     = "";  
    $plugin_data    = get_plugin_data(plugin_dir_path( __FILE__ )."../buying-buddy.php"); 
    $origAcid       = $buyingbuddy_options["acid"];

     if (!empty($_POST['buyingbuddy_submitted'])) {
        if ( empty( $_POST['buyingbuddy_settings'] ) || !wp_verify_nonce( $_POST['buyingbuddy_settings'], 'buyingbuddy_settings_action' ) ) {
           exit ('There was a problem submitting the form. Please refresh and try again.');
        } else {

            $buyingbuddy_options = array(
                "installed"     => "true",
                "accept_terms"  => 1,
                "last_modified" => time(),
            );

            $buyingbuddy_acid = sanitize_text_field($_POST["buyingbuddy_acid"]);
            $paramsArray = array (
                "acid"      =>  $buyingbuddy_acid,
                "domain"    =>  esc_url($_SERVER['HTTP_HOST']),
                "wp"        =>  esc_html(get_bloginfo("version")),
                "plugin"    =>  esc_html($plugin_data['Version']),
                "rand"      =>  esc_html(rand(10,100))
            );

            $url      = "/api/account-info/check-acid/";
            $response = $buyingbuddyObj->getApiData($url,$paramsArray);

            if ($response->valid == "true"){
                $buyingbuddy_options['acid'] = $buyingbuddy_acid;
                $buyingbuddy_options["installed"] = "true";
                $buyingbuddy_options["auto_updates"] = "yes";
                $buyingbuddy_options["last_modified"] = time();
                update_option('buyingbuddy_options', serialize($buyingbuddy_options));
            } else {
                $buyingbuddy_options["acid"] = $origAcid;
                $invalid_acid = "true";
            }

            if (!empty($_POST['buyingbuddy_google_map'])) $buyingbuddy_options['google_map'] = sanitize_text_field($_POST['buyingbuddy_google_map']);
            if (!empty($_POST['buyingbuddy_google_map_key'])) $buyingbuddy_options['google_map_key'] = sanitize_text_field($_POST['buyingbuddy_google_map_key']);;
            if (!empty($_POST['buyingbuddy_footer'])) $buyingbuddy_options['footer'] = sanitize_text_field($_POST['buyingbuddy_footer']);
            if (!empty($_POST['buyingbuddy_disable'])) $buyingbuddy_options['disable'] = sanitize_text_field($_POST['buyingbuddy_disable']);
            if (!empty($_POST['buyingbuddy_auto_updates'])) $buyingbuddy_options['auto_updates'] = sanitize_text_field($_POST['buyingbuddy_auto_updates']);
            if (!empty($_POST['buyingbuddy_express'])) $buyingbuddy_options['express'] = sanitize_text_field($_POST['buyingbuddy_express']);
            if (!empty($_POST['buyingbuddy_allowedids'])) update_option('buyingbuddy_allowedids', serialize(array_map('trim',explode(",",sanitize_text_field($_POST['buyingbuddy_allowedids'])))));
            else update_option('buyingbuddy_allowedids','');

            update_option('buyingbuddy_options', serialize($buyingbuddy_options));

            if (isset($buyingbuddy_options['google_map_key']) && $buyingbuddy_options['google_map_key'] != "") {
                $urlarr = array (
                    "acid"      =>  $buyingbuddy_options["acid"],
                    "domain"    =>  sanitize_text_field($_SERVER['HTTP_HOST']),
                    "google_map_key" =>  $buyingbuddy_options["google_map_key"],
                );
                $url      = "/api/account-info/set-map-key/?".http_build_query($urlarr);
                $acctData = $buyingbuddyObj->getApiData($url, array());
            }               

            if ( $invalid_acid == "true" ){

                $msg_status = '<div class="alert alert-sm alert-danger alert-marker marker-right border-inner-outline lh-13">
                                <div class="marker-icon">
                                    <img src="'.esc_url(plugin_dir_url(__FILE__)).'../images/circle-check.png" alt="">
                                </div>
                                <span class="weight700">Invalid Activation Key Entered.</span>
                            </div>';

            } else {

                $msg_status = '<div class="alert alert-sm alert-success alert-marker marker-right border-inner-outline lh-13">
                                <div class="marker-icon">
                                    <img src="'.esc_url(plugin_dir_url(__FILE__)).'../images/circle-check.png" alt="">
                                </div>                                                           
                                <span class="weight700">Buying Buddy options have been updated.</span>
                            </div>';
            }

        }

    }

    if (!empty($_POST['buyingbuddy_add_templates'])) {

        if ( empty( $_POST['buyingbuddy_add_templates'] ) || ! wp_verify_nonce( $_POST['buyingbuddy_install'], 'buyingbuddy_install_action' ) ) {
           exit ('There was a problem submitting the form. Please refresh and try again.');
        } else {

            $demo_pages = array();
            if ($_POST['buyingbuddy_install_map'] == 1) $demo_pages[] = array (sanitize_text_field($_POST["buyingbuddy_install_map_title"]),sanitize_text_field($_POST["buyingbuddy_install_map_slug"]),'[mbb_widget id="MBBv3_InteractiveMap" filter="price_min:400000+price_max:1000000+bedrooms_total_min:3+baths_total_min:2"]','buyingbuddy_install_map');
            if ($_POST['buyingbuddy_install_about'] == 1) $demo_pages[] = array (sanitize_text_field($_POST["buyingbuddy_install_about_title"]),sanitize_text_field($_POST["buyingbuddy_install_about_slug"]),'[mbb_widget id="MBBv3_OfficeRoster"]','buyingbuddy_install_about');
            if ($_POST['buyingbuddy_install_calculator'] == 1) $demo_pages[] = array (sanitize_text_field($_POST["buyingbuddy_install_calculator_title"]),sanitize_text_field($_POST["buyingbuddy_install_calculator_slug"]),'[mbb_widget id="MBBv3_Calculator"]','buyingbuddy_install_calculator');
            if ($_POST['buyingbuddy_install_cma'] == 1) $demo_pages[] = array (sanitize_text_field($_POST["buyingbuddy_install_cma_title"]),sanitize_text_field($_POST["buyingbuddy_install_cma_slug"]),'[mbb_widget id="MBBv3_LcForm" filter="form:cmashort+phone_rqd:no+labelcolor:#ffffff+textcolor:#ffffff+backgroundpanel:0,0,0,0.35+formname:CMA request+title:Do You Know What Your Home Is Worth?+description:Values have increased in your area. Find out how much your home is worth now!"]','buyingbuddy_install_cma');
            if ($_POST['buyingbuddy_install_contact'] == 1) $demo_pages[] = array (sanitize_text_field($_POST["buyingbuddy_install_contact_title"]),sanitize_text_field($_POST["buyingbuddy_install_contact_slug"]),'[mbb_widget id="MBBv3_LcForm" filter="form:contactme"]','buyingbuddy_install_contact');
            if ($_POST['buyingbuddy_install_featured'] == 1) $demo_pages[] = array (sanitize_text_field($_POST["buyingbuddy_install_featured_title"]),sanitize_text_field($_POST["buyingbuddy_install_featured_slug"]),'[mbb_widget id="MBBv3_FeaturedGallery" filter="price_min:400000+price_max:1000000+bedrooms_total_min:3+baths_total_min:2"]','buyingbuddy_install_featured');
            
            $pageOptions = array();
            foreach($demo_pages as $pagearr) {
                $new_page = array(
                    'post_type'     => 'page',          
                    'post_title'    => $pagearr[0], 
                    'post_content'  => $pagearr[2],
                    'post_status'   => 'publish',       
                    'post_author'   => esc_html(get_current_user_id()),           
                    'post_name'     => $pagearr[1]
                );
                if (!get_page_by_path(  $pagearr[1], OBJECT, 'page')) {
                    $new_page_id = wp_insert_post($new_page);
                    $buyingbuddy_options[ $pagearr[3] ] = 1;
                }
            }

            if ( !empty($buyingbuddy_options) ){
                update_option('buyingbuddy_options', serialize($buyingbuddy_options));
            }         

            $msg_status = '<div class="alert alert-sm alert-success alert-marker marker-right border-inner-outline lh-13">
                                <div class="marker-icon">
                                    <img src="'.esc_url(plugin_dir_url(__FILE__)).'../images/circle-check.png" alt="">
                                </div>        
                                Template Pages pages installed successfully.
                            </div>';                       
		}

	}

    if (!empty($_POST['buyingbuddy_install'])) {
        if ( empty( $_POST['buyingbuddy_install'] ) || ! wp_verify_nonce( $_POST['buyingbuddy_install'], 'buyingbuddy_install_action' ) ) {
           exit ('There was a problem submitting the form. Please refresh and try again.');
        } else {
            $demo_pages = array();
            if ($_POST['buyingbuddy_install_map'] == 1) $demo_pages[] = array ("Map",sanitize_text_field($_POST["buyingbuddy_install_map_slug"]),'[mbb_widget id="MBBv3_InteractiveMap" filter="price_min:400000+price_max:1000000+bedrooms_total_min:3+baths_total_min:2"]','buyingbuddy_install_map');
            if ($_POST['buyingbuddy_install_about'] == 1) $demo_pages[] = array ("About",sanitize_text_field($_POST["buyingbuddy_install_about_slug"]),'[mbb_widget id="MBBv3_OfficeRoster"]','buyingbuddy_install_about');
            if ($_POST['buyingbuddy_install_calculator'] == 1) $demo_pages[] = array ("Calculator",sanitize_text_field($_POST["buyingbuddy_install_calculator_slug"]),'[mbb_widget id="MBBv3_Calculator"]','buyingbuddy_install_calculator');
            if ($_POST['buyingbuddy_install_cma'] == 1) $demo_pages[] = array ("Home Value",sanitize_text_field($_POST["buyingbuddy_install_cma_slug"]),'[mbb_widget id="MBBv3_LcForm" filter="form:cmashort+phone_rqd:no+labelcolor:#ffffff+textcolor:#ffffff+backgroundpanel:0,0,0,0.35+formname:CMA request+title:Do You Know What Your Home Is Worth?+description:Values have increased in your area. Find out how much your home is worth now!"]','buyingbuddy_install_cma');
            if ($_POST['buyingbuddy_install_contact'] == 1) $demo_pages[] = array ("Contact",sanitize_text_field($_POST["buyingbuddy_install_contact_slug"]),'[mbb_widget id="MBBv3_LcForm" filter="form:contactme"]','buyingbuddy_install_contact');
            if ($_POST['buyingbuddy_install_featured'] == 1) $demo_pages[] = array (sanitize_text_field($_POST["buyingbuddy_install_featured_title"]),sanitize_text_field($_POST["buyingbuddy_install_featured_slug"]),'[mbb_widget id="MBBv3_FeaturedGallery" filter="price_min:400000+price_max:1000000+bedrooms_total_min:3+baths_total_min:2"]','buyingbuddy_install_featured');

            $pageOptions = array();
            foreach($demo_pages as $pagearr) {
                $new_page = array(
                    'post_type'     => 'page',          
                    'post_title'    => $pagearr[0],
                    'post_content'  => $pagearr[2],
                    'post_status'   => 'publish',       
                    'post_author'   => esc_html(get_current_user_id()),           
                    'post_name'     => $pagearr[1]
                );
                if ( !get_page_by_path(  $pagearr[1], OBJECT, 'page') ) {
                    $new_page_id = wp_insert_post($new_page);
                    $buyingbuddy_options[ $pagearr[3] ] = 1;
                }
            }
            
            $buyingbuddy_options["installed_pages"] = 1;
            update_option('buyingbuddy_options', serialize($buyingbuddy_options)); 
            
            $msg_status = '<div class="alert alert-sm alert-success alert-marker marker-right border-inner-outline lh-13">
                                <div class="marker-icon">
                                    <img src="'.esc_url(plugin_dir_url(__FILE__)).'../images/circle-check.png" alt="">
                                </div>        
                                Demo pages installed successfully.
                            </div>';                       
        }

    }
    
    $invalid_acid = "";
    $buyingbuddy_acid = "";
    
    if (!empty($_POST['buyingbuddy_accept_terms']) && sanitize_text_field($_POST['buyingbuddy_accept_terms']) == 1) {
        if ( empty( $_POST['buyingbuddy_terms'] ) || ! wp_verify_nonce( $_POST['buyingbuddy_terms'], 'buyingbuddy_terms_action' ) ) {
           exit ('There was a problem submitting the form. Please refresh and try again.');
        } else {
            $buyingbuddy_options['accept_terms'] = 1;
            $buyingbuddy_options['trial'] = "";
            $buyingbuddy_options['purchase'] = "";
            $buyingbuddy_arr = array();
            foreach ($buyingbuddy_options as $key => $val) {
                $buyingbuddy_arr[sanitize_text_field($key)] = sanitize_text_field($val); 
            }
            update_option('buyingbuddy_options', serialize($buyingbuddy_arr));
        }            
    }

    if (!empty($_POST['buyingbuddy_check_activation'])  && sanitize_text_field($_POST['buyingbuddy_check_activation']) == 1) {
        if ( empty( $_POST['buyingbuddy_activate'] ) || ! wp_verify_nonce( $_POST['buyingbuddy_activate'], 'buyingbuddy_activate_action' ) ) {
           exit ('There was a problem submitting the form. Please refresh and try again.');
        } else {

            $buyingbuddy_acid = sanitize_text_field($_POST["buyingbuddy_acid"]);
            $urlarr = array (
                "acid"      =>  $buyingbuddy_acid,
                "domain"    =>  esc_url($_SERVER['HTTP_HOST']),
                "wp"        =>  esc_html(get_bloginfo("version")),
                "plugin"    =>  esc_html($plugin_data['Version']),
                "rand"      =>  esc_html(rand(10,100))
            );

            if (isset($buyingbuddy_options["google_map_key"])) $urlarr["wp_google_maps_key"] = $buyingbuddy_options["google_map_key"];

            $url      = "/api/account-info/check-acid/?".http_build_query($urlarr);
            $response = $buyingbuddyObj->getApiData($url, array());

            if ($response->valid == "true"){
              $buyingbuddy_options['acid'] = $buyingbuddy_acid;  
              $buyingbuddy_options["installed"] = "true";
              $buyingbuddy_options["auto_updates"] = "yes";
              $buyingbuddy_options["last_modified"] = time();
              update_option('buyingbuddy_options', serialize($buyingbuddy_options));                
            } else {
              $invalid_acid = 1;  
            }

        }    
                        
    }

    if (!empty($_GET["buyingbuddy_orderstr"])) { // return from Trial or Purchase order
        $orderarr = unserialize(base64_decode(sanitize_text_field($_GET["buyingbuddy_orderstr"])));
        if (!empty($orderarr["acid"]) && sanitize_text_field($orderarr["acid"]) != "") $buyingbuddy_options["installed"] = "true";
       // print_r($orderarr);
    }

    $buyingbuddy_allowedids = unserialize(sanitize_text_field(get_option('buyingbuddy_allowedids')));
    if (is_array($buyingbuddy_allowedids)) $buyingbuddy_allowedids = implode(",",$buyingbuddy_allowedids);
    if (isset($buyingbuddy_options["rosterpage"])) {
    } else $buyingbuddy_options["rosterpage"] = "no";
    if (isset($buyingbuddy_options["express"])) {
    } else $buyingbuddy_options["express"] = "no";
    if (!empty($buyingbuddy_options["google_map_key"]) && sanitize_text_field($buyingbuddy_options["google_map_key"]) == "error") $buyingbuddy_options["google_map_key"] = "";
    $purchase = "";
    $trial = "";
    require_once plugin_dir_path( __FILE__ ).'../views/settings_header.php';
    
    $buyingbuddy_allowedids_option = sanitize_text_field(get_option("buyingbuddy_allowedids"));
    $buyingbuddy_theme_id = sanitize_text_field(get_option("buyingbuddy_theme_id"));
    if ($buyingbuddy_allowedids_option) {
        $buyingbuddy_allowedids_arr = unserialize($buyingbuddy_allowedids_option);
        $buyingbuddy_allowedids = implode(",",$buyingbuddy_allowedids_arr);
    } else $buyingbuddy_allowedids = "";  
    
    $active_plugins = get_option('active_plugins'); 
    $plugin_list = "<ul style='list-style:disc;margin-left:25px;'>";
    foreach($active_plugins as $key => $value) {
        $string = explode('/',$value); // Folder name will be displayed
        $plugin_list .=  "<li>".$string[0] ."</li>";
    }
    $plugin_list .= "</ul>";
    
    if (isset($orderarr["acid"])) 
    { 

        if (!empty($orderarr["acid"])) $acid = sanitize_text_field($orderarr["acid"]);
        if (!empty($orderarr["purchase"])) $purchase = sanitize_text_field($orderarr["purchase"]);
        if (!empty($orderarr["trial"])) $trial = sanitize_text_field($orderarr["trial"]);
        if (!empty($orderarr["accounttype_id"])) $accounttype_id = sanitize_text_field($orderarr["accounttype_id"]);

        if ($purchase == 1 || $trial == 1) {
            $foundation_pages = array(
               "search" => array("bbidx-search","Property Search",'[mbb_widget id="MBBv3_SearchForm"]'),
               "results" => array("listing-results","Search Results",'[mbb_widget id="MBBv3_ListingResults"]'),
               "details" => array("listing-details","Property Details",'[mbb_widget id="MBBv3_SearchDetails"]'),
               "market" => array("listing-market","Area Market Report",'[mbb_widget id="MBBv3_MarketReport"]')
           );
           foreach($foundation_pages as $pagearr) {
                $new_page = array(
                    'post_type'     => 'page',          
                    'post_title'    => $pagearr[1], 
                    'post_content'  => $pagearr[2],
                    'post_status'   => 'publish',       
                    'post_author'   => esc_html(get_current_user_id()),           
                    'post_name'     => $pagearr[0]  
                );
                if (!get_page_by_path(  $pagearr[0], OBJECT, 'page')) {
                    $new_page_id = wp_insert_post($new_page);
                } 
            }    

        }
        $buyingbuddy_options["installed"] = "true";
        $buyingbuddy_options = array(
            "acid"              => sanitize_text_field($acid),
            "foundation_pages"  => "true",
            "trial"             => $trial,
            "accept_terms"      => 1,
            "purchase"          => $purchase,
            "installed"         => "true"
        );
        $buyingbuddy_options["google_map_key"] = "";
        update_option('buyingbuddy_options', serialize($buyingbuddy_options));

        // Get IDX Agreement info for this MLS
        $current_user = wp_get_current_user();

        $urlarr = array (
            "acid"      =>  $acid,
            "domain"    =>  sanitize_text_field($_SERVER['HTTP_HOST']),
            "wp"        =>  esc_html(get_bloginfo("version")),
            "plugin"    =>  sanitize_text_field($plugin_data['Version']),
            "email"     =>  esc_html($current_user->user_email)
        );

        $url = "/api/account-info/get-idx-info/?".http_build_query($urlarr);
        $domainData = $buyingbuddyObj->getApiData($url, array()); 

        if (!empty($domainData->mls_nm) )  $mls_idxname = wp_kses_post($domainData->mls_nm);
        else $mls_idxname = "";
        if (!empty($domainData->idx_approval) )  $idx_approval = wp_kses_post($domainData->idx_approval);
        else $idx_approval = "";        
        $show_sidebar = ""; 
        require_once plugin_dir_path( __FILE__ ).'../views/settings_messages.php';
        require_once plugin_dir_path( __FILE__ ).'../views/settings_neworder.php';

    } else { // show default options page or installation page

        // check if acid exists from old Buying Buddy plugin.
        if (empty($buyingbuddy_options["acid"])) {
            $old_mbb_options = unserialize(get_option("mbb_options"));
            if (!empty($old_mbb_options)) {
                $buyingbuddy_options["acid"] = sanitize_text_field($old_mbb_options["acid"]);
                $buyingbuddy_options["google_map"] = sanitize_text_field($old_mbb_options["google_map"]);
                if (empty($buyingbuddy_options["google_map_key"])) $buyingbuddy_options["google_map_key"] = sanitize_text_field($old_mbb_options["google_map_key"]);
                $buyingbuddy_options["footer"] = sanitize_text_field($old_mbb_options["footer"]);
                $buyingbuddy_options["disable"] = sanitize_text_field($old_mbb_options["disable"]);
                $buyingbuddy_options["express"] = sanitize_text_field($old_mbb_options["express"]);
                $buyingbuddy_options["mbb_allowedids"] = sanitize_text_field($old_mbb_options["mbb_allowedids"]);
                if (!empty($buyingbuddy_options["acid"])) update_option('buyingbuddy_options', serialize($buyingbuddy_options));
            }   
        }

        $domainarr = parse_url(esc_url($_SERVER['HTTP_HOST']));
        $urlarr = array (
            "acid"      =>  sanitize_text_field($buyingbuddy_options["acid"]),
            "domain"    =>  $domainarr["host"],
            "rand"      =>  esc_html(rand(10,100))
        );

        $url = "/api/account-info/check-acid/?".http_build_query($urlarr);
        $response = $buyingbuddyObj->getApiData($url, array());
        if (!empty($response) && $response->valid == "true") {
          $buyingbuddy_status = $response->status;
          $buyingbuddy_results_slug = $response->results_slug;  

          $foundation_pages = array(
              "search" => array("bbidx-search","Property Search",'[mbb_widget id="MBBv3_SearchForm"]'),
              "results" => array("listing-results","Search Results",'[mbb_widget id="MBBv3_ListingResults"]'),
              "details" => array("listing-details","Property Details",'[mbb_widget id="MBBv3_SearchDetails"]'),
              "market" => array("listing-market","Area Market Report",'[mbb_widget id="MBBv3_MarketReport"]')
          );
          foreach($foundation_pages as $pagearr) {
              $new_page = array(
                  'post_type'     => 'page',
                  'post_title'    => $pagearr[1],
                  'post_content'  => $pagearr[2],
                  'post_status'   => 'publish',
                  'post_author'   => esc_html(get_current_user_id()),
                  'post_name'     => $pagearr[0]
              );
              if (!get_page_by_path(  $pagearr[0], OBJECT, 'page')) {
                  $new_page_id = wp_insert_post($new_page);
              }
          }
          
        } else {
          $buyingbuddy_status = 30;  
          $results_slug = "";  
        }    

        $userinfo = wp_get_current_user();
        $userarr = array(
                "domain" => esc_url(get_site_url()),
                "email" => esc_html($userinfo->user_email),
                "name" => esc_html($userinfo->display_name)
        );

        $trialstr = base64_encode(serialize($userarr));
        $userarr["purchase"] = 1;
        $purchasestr = base64_encode(serialize($userarr));
        $show_sidebar = 1;

        if (!empty($buyingbuddy_options["accept_terms"]) && sanitize_text_field($buyingbuddy_options["accept_terms"]) == 1) {
            if (!empty($buyingbuddy_options["acid"]) && sanitize_text_field($buyingbuddy_options["acid"]) != "") {
                if (empty($buyingbuddy_options["google_map_key"])) $buyingbuddy_options["google_map_key"] = "";
                if (empty($buyingbuddy_options["google_map"])) $buyingbuddy_options["google_map"] = "";
                if (empty($buyingbuddy_options["disable"])) $buyingbuddy_options["disable"] = "";
                if (empty($buyingbuddy_options["trial"])) $buyingbuddy_options["trial"] = "";
                if (empty($buyingbuddy_options["purchase"])) $buyingbuddy_options["purchase"] = "";
               
               // get latest theme from LAC and clear rewrite rules
                flush_rewrite_rules();
                $wp_rewrite->flush_rules(); 
            
                $urlarr = array (
                    "acid"      =>  esc_html($buyingbuddy_options["acid"]),
                    "domain"    =>  sanitize_url($_SERVER['HTTP_HOST']),
                    "wp"        =>  esc_html(get_bloginfo("version")),
                    "wp_google_maps_key" =>  sanitize_text_field($buyingbuddy_options["google_map_key"]),
                    "plugin"    =>  sanitize_text_field($buyingbuddy_version)
                );   
                            
                $url = "/api/account-info/get-domain-info/?".http_build_query($urlarr);
                $vars = $buyingbuddyObj->getApiData($url, array());
                if (!empty($vars)) {
                    $arr = explode("~",$vars);
                    $theme_id = sanitize_text_field($arr[0]);
                    $google_map_key = sanitize_text_field($arr[1]);
                } else {
                    $theme_id = "";
                    $google_map_key = "";
                }
                if (!empty($theme_id) && !empty($theme_id) && !empty($buyingbuddy_options["acid"])) {
                    update_option('buyingbuddy_theme_id', $theme_id);
                }
               require_once plugin_dir_path( __FILE__ ).'../views/settings_messages.php'; 
               require_once plugin_dir_path( __FILE__ ).'../views/settings_options.php';
            } else {
               $show_sidebar = ""; 
               require_once plugin_dir_path( __FILE__ ).'../views/settings_install.php';                                
            }
        } else {
            $show_sidebar = "";
            require_once plugin_dir_path( __FILE__ ).'../views/settings_terms.php';  
        }

    }

    require_once plugin_dir_path( __FILE__ ).'../views/settings_footer.php';         

}
/* Create a Settings page  */
function buyingbuddy_options_page() 
{
   //add_options_page("Buying Buddy Install", "Buying Buddy", 'manage_options', "buying-buddy", 'buyingbuddy_install');
   add_menu_page("Buying Buddy", "Buying Buddy", 'manage_options', "buying-buddy", 'buyingbuddy_settings',plugin_dir_url( __FILE__ ).'../images/bbicon.png',30);
}
/* Add 'Settings' link to the List of installed Plugins page */
function buyingbuddy_plugin_page_links( $links ) 
{
     $settings_link = array(
        '<a href="' . esc_url(admin_url( 'options-general.php?page=buying-buddy' )) . '">Settings</a>'
     );
    return array_merge( $links, $settings_link );    
} 
// Add CSS within in Admin
function buyingbuddy_admin_style() 
{
  wp_enqueue_style('bb-admin-styles', plugin_dir_url(__FILE__).'../css/custom.css');
}
function buyingbuddy_admin_notice() 
{
    echo '<div class="updated"><div class="bb-text bb-small mb-4">Buying Buddy Settings updated successfully.</div></div>';
}

?>
