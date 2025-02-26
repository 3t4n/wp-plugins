<?php

namespace ExactLinks\App\Http\Controllers;

use ExactLinks\App\Models\Link;
use ExactLinks\App\Models\LinkAnalytics;
use ExactLinks\Framework\Request\Request;
use ExactLinks\App\Libs\Browser\BrowserDetection;
use ExactLinks\App\Hooks\Handlers\FrontendHandler;

class IntegrationsController extends Controller {


    public function getMigrationLinks(Request $request)
    {
        global $wpdb;

        $table = $request->get('plugin_name');
       
        // if ($table == 'thirstylink') {
        //     $links = get_posts(array('posts_per_page' => -1, 'post_type' => $table, 'post_status' => 'publish'));
        //     $isMigrated =  get_option('exactlinks_migration_'.$table, false);
        //     return $this->sendSuccess([
        //         'links' => $links,
        //         'total' => count($links),
        //         'clicks' => [],
        //         'isMigrated' => $isMigrated,
        //         'message' => 'Pick Data that You want to Import',
        //     ]);
        // } 
        
        if ($table == 'prli_links') {
            $clickTable =  'prli_clicks';
        } elseif ($table == 'betterlinks') { 
            $clickTable =  'betterlinks_clicks';
        }  elseif ($table == 'short_links') { 
            $clickTable =  'short_link_clicks';
        }  elseif ($table == 'kc_us_links') { 
            $clickTable =  'kc_us_clicks';
        }
 
        /**
         * Links Table 
        */
        $linksTable = $wpdb->prefix . $table;
        $links = $wpdb->get_results(
            "SELECT * FROM {$linksTable}"
        );

        /**
         * Clicks Table 
        */
        $clicksTable = $wpdb->prefix . $clickTable;
        $clicks = $wpdb->get_results(
            "SELECT * FROM {$clicksTable}"
        );

        // update_option('exactlinks_migration_prli_links', false);

       $isMigrated =  get_option('exactlinks_migration_'.$table, false);

        return $this->sendSuccess([
            'links' => $links,
            'total' => count($links),
            'clicks' => $clicks,
            'isMigrated' => $isMigrated,
            'message' => 'Pick Data that You want to Import',
        ]);
    }

    public function runMigrationLinks(Request $request)
    {   
       
        $links = $request->get('links');
        $clicks = $request->get('clicks');
        $pluginName = $request->get('plugin_name');
        $createdLinksData = [];
        $createdClicksData = [];

        foreach($links as  $link) {
            $slug = "";

            if ($pluginName == 'prli_links' || $pluginName == 'kc_us_links') {
               $slug =  $link['slug'];
            } elseif ($pluginName == 'betterlinks') { 
                $slug =  $link['link_slug'];
            } 
            // elseif($pluginName == 'thirstylink') {
            //     $slug =  $link['post_name'];
            // } 
            elseif ($pluginName == 'short_links') {
                $slug =  $link['link_name'];
            } 

            if (Link::where('slug', sanitize_text_field( $slug ))->first()) {
                return $this->sendError([
                    'message' => __('The provided short url is not available. Please change the short link', 'exact-links')
                ],423);
            }
        }

        if ($pluginName == 'prli_links') {
            $createdLinksData = $this->prettyLinksMigration($links);
            $createdClicksData = $this->prettyClicksMigration($clicks);
        } elseif ($pluginName == 'betterlinks') {
            $createdLinksData = $this->betterLinksMigration($links);
            $createdClicksData = $this->betterClicksMigration($clicks);
        } 
        // elseif ($pluginName == 'thirstylink') {
        //     $createdLinksData = $this->thirstyLinksMigration($links);
        // } 
        elseif ($pluginName == 'short_links') {
            $createdLinksData = $this->shortLinksMigration($links);
            $createdClicksData = $this->shortClicksMigration($clicks);
        } elseif ($pluginName == 'kc_us_links') {
            $createdLinksData = $this->URLShortifyLinksMigration($links);
            $createdClicksData = $this->URLShortifyClicksMigration($clicks);
        }

        update_option('exactlinks_migration_'.$pluginName, true);
        
        return $this->sendSuccess([
            'message' => __('Link successfully migrated', 'exact-links'),
            'links'    => $createdLinksData,
            'clicks' => $createdClicksData
        ], 200);
    }

    /**
     * Pretty Links Migration
    */
    public function prettyLinksMigration($links)
    {
        $linkTable = (new Link); 
        
        $createdLinksData = [];

        foreach ($links as  $link) {
            $data = [
                'type'             => 'simple',
                'slug'             => $link['slug'],
                'target_url'       => $link['url'],
                'title'            => $link['name'],
                'meta_description' => $link['description']?: null,
                'redirect_type'    => $link['redirect_type'],
                'created_at'       => $link['created_at'], 
                'updated_at'       => $link['updated_at'],
                'last_link_check'  => gmdate('Y-m-d H:i:s'),
                'author_id'        => get_current_user_id()
            ];

            $createdLinkId =  $linkTable->insertGetId($data);

            $createdLink = $linkTable->getLink($createdLinkId);

            $createdLink->just_created = true;

            array_push($createdLinksData, $createdLink);
        }

        return $createdLinksData;
    }

    /**
     * Pretty Links Clicks Migration
    */
    public function prettyClicksMigration($clicks)
    {
        $browserDetection =  (new BrowserDetection);

        $createdClicksData = [];

        if (empty($clicks)) {
            return $createdClicksData;
        }

        foreach ($clicks as  $click) {
            $osName = $browserDetection->getOS($click['browser']);
            $devicesName = $browserDetection->getDevice($click['browser']);
            $browserName = $browserDetection->getBrowser($click['browser']);
            $slug = sanitize_text_field($click['uri']);
            
            if (substr($slug, 0, 1) === '/') {
                $slug = substr($slug, 1); // Removes the first character (the slash)
            }

            $link = Link::where('slug', $slug)->first();

            // checking Ip Address
            $isIpAddress = (new LinkAnalytics)->isIpAddress($link->id, $click['ip']);

            $data = [
                'link_id'             => intval($link['id']),
                'slug'                => $slug,
                'os_name'             => sanitize_text_field($osName['os_name']),
                'ip'                  => sanitize_text_field($click['ip']),
                'devices_name'        => sanitize_text_field($devicesName['device_type']),
                'browser_name'        => sanitize_text_field($browserName['browser_name']),
                'traffic_source_name' => $click['referer']?:'Direct', 
                'country_name'        => '(not set)',
                'city_name'           => '(not set)',
                'date'                => $click['created_at'],
            ];

            $createdClickId = LinkAnalytics::insertGetId($data);

            $createdClick =  LinkAnalytics::where('id', $createdClickId )->first();

            $createdClick->just_created = true;

            array_push($createdClicksData, $createdClick);

            /**
             * insert click & unique click data in Link Table
            */
            (new FrontendHandler)->createClick($link, $isIpAddress);
        }

        return $createdClicksData; 
    }

    /**
     * BetterLinks Links Migration
    */
    public function betterLinksMigration($links)
    {
        $linkTable = (new Link); 
        
        $createdLinksData = [];

        foreach ($links as  $link) {
            $data = [
                'type'             => 'simple',
                'slug'             => $link['link_slug'],
                'target_url'       => $link['target_url'],
                'title'            => $link['link_title'],
                'meta_description' => $link['link_note']?: null,
                'redirect_type'    => $link['redirect_type'],
                'created_at'       => $link['link_date'],
                'updated_at'       => $link['link_modified_gmt'],
                'last_link_check'  => $link['link_modified'],
                'author_id'        => $link['link_author'],
            ];
            
            $createdLinkId =  $linkTable->insertGetId($data);

            $createdLink = $linkTable->getLink($createdLinkId);

            $createdLink->just_created = true;

            array_push($createdLinksData, $createdLink);
        }

        return $createdLinksData;
    }

    /**
     * BetterLinks Clicks Migration
    */
    public function betterClicksMigration($clicks)
    {
        $browserDetection =  (new BrowserDetection);

        $createdClicksData = [];

        if (empty($clicks)) {
            return $createdClicksData;
        }

        foreach ($clicks as  $click) {

            $osName = $browserDetection->getOS($click['browser']);
            $devicesName = $browserDetection->getDevice($click['browser']);
            $browserName = $browserDetection->getBrowser($click['browser']);

            $slug = sanitize_text_field($click['uri']);
            
            if (substr($slug, 0, 1) === '/') {
                $slug = substr($slug, 1); // Removes the first character (the slash)
            }

            $link = Link::where('slug', $slug)->first();

            // checking Ip Address
            $isIpAddress = (new LinkAnalytics)->isIpAddress($link->id, $click['ip']);

            $data = [
                'link_id'             => intval($link['id']),
                'slug'                => $slug,
                'os_name'             => sanitize_text_field($osName['os_name']),
                'ip'                  => sanitize_text_field($click['ip']),
                'devices_name'        => sanitize_text_field($devicesName['device_type']),
                'browser_name'        => sanitize_text_field($browserName['browser_name']),
                'traffic_source_name' => $click['referer']?:'Direct',
                'country_name'        => '(not set)',
                'city_name'           => '(not set)',
                'date'                => $click['created_at'],
                
            ];

            
            $createdClickId = LinkAnalytics::insertGetId($data);

            $createdClick =  LinkAnalytics::where('id', $createdClickId )->first();

            $createdClick->just_created = true;

            array_push($createdClicksData, $createdClick);

            /**
             * insert click & unique click data in Link Table
            */
            (new FrontendHandler)->createClick($link, $isIpAddress);
        }

        return $createdClicksData;
    }

    /**
     * ThirstyAffiliates Links Migration
    */
    // public function thirstyLinksMigration($links)
    // { 
    //     $linkTable = (new Link); 
        
    //     $createdLinksData = [];

    //     foreach ($links as  $link) {
    //         $data = [
    //             'type'             => 'simple',
    //             'slug'             => $link['post_name'],
    //             'target_url'       => get_post_meta($link['ID'], '_ta_destination_url', true),
    //             'title'            => $link['post_title'],
    //             'redirect_type'    => get_post_meta($link['ID'], '_ta_redirect_type', true),
    //             'created_at'       => $link['post_date'], 
    //             'updated_at'       => $link['post_modified'],
    //             'last_link_check'  => gmdate('Y-m-d H:i:s'),
    //             'author_id'        => $link['post_author']
    //         ];

    //         $createdLinkId =  $linkTable->insertGetId($data);

    //         $createdLink = $linkTable->getLink($createdLinkId);

    //         $createdLink->just_created = true;

    //         array_push($createdLinksData, $createdLink);
    //     }
    //     return $createdLinksData;
    // }


    /**
     * Short Links (MyThemeShop) Links Migration
    */
    public function shortLinksMigration($links)
    { 
        $linkTable = (new Link); 
        
        $createdLinksData = [];

        foreach ($links as  $link) {
            $data = [
                'type'             => 'simple',
                'slug'             => $link['link_name'],
                'target_url'       => $link['link_url'],
                'title'            => $link['link_title'],
                'meta_description' => $link['link_description']?: null,
                'featured_image'   => $link['link_image']?: null,
                'redirect_type'    => $link['link_redirection_method'],
                'created_at'       => $link['link_created'], 
                'updated_at'       => $link['link_updated'],
                'last_link_check'  => gmdate('Y-m-d H:i:s'),
                'note'             => sanitize_text_field($link['link_notes'])?: '',
                'author_id'        => $link['link_owner']
            ];

            $createdLinkId =  $linkTable->insertGetId($data);

            $createdLink = $linkTable->getLink($createdLinkId);

            $createdLink->just_created = true;

            array_push($createdLinksData, $createdLink);
        }
        return $createdLinksData;
    }

    /**
     * Short Links Clicks (MyThemeShop) Migration
    */
    public function shortClicksMigration($clicks)
    {
        $browserDetection =  (new BrowserDetection);

        $createdClicksData = [];

        if (empty($clicks)) {
            return $createdClicksData;
        }

        foreach ($clicks as  $click) {

            $osName = $browserDetection->getOS($click['click_useragent']);
            $devicesName = $browserDetection->getDevice($click['click_useragent']);
            $browserName = $browserDetection->getBrowser($click['click_useragent']);

            $slug = sanitize_text_field($click['click_uri']);
           
            if (substr($slug, 0, 1) === '/') {
                $slug = substr($slug, 1); // Removes the first character (the slash)
            }

            $link = Link::where('slug', $slug)->first();

            // checking Ip Address
            $isIpAddress = (new LinkAnalytics)->isIpAddress($link->id, $click['click_ip']);

            $data = [
                'link_id'             => intval($link['id']),
                'slug'                => $slug,
                'os_name'             => sanitize_text_field($osName['os_name']),
                'ip'                  => sanitize_text_field($click['click_ip']),
                'devices_name'        => sanitize_text_field($devicesName['device_type']),
                'browser_name'        => sanitize_text_field($browserName['browser_name']),
                'traffic_source_name' => $click['click_referrer']?:'Direct',
                'country_name'        => '(not set)',
                'city_name'           => '(not set)',
                'date'                => $click['click_date'],
            ];

            $createdClickId = LinkAnalytics::insertGetId($data);

            $createdClick =  LinkAnalytics::where('id', $createdClickId )->first();

            $createdClick->just_created = true;

            array_push($createdClicksData, $createdClick);

            /**
             * insert click & unique click data in Link Table
            */
            (new FrontendHandler)->createClick($link, $isIpAddress);
        }

        return $createdClicksData; 
    }

    /**
     * URL Shortify Links Migration
    */
    public function URLShortifyLinksMigration($links)
    { 
        $linkTable = (new Link); 
        
        $createdLinksData = [];

        foreach ($links as  $link) {
            $data = [
                'type'             => 'simple',
                'slug'             => $link['slug'],
                'target_url'       => $link['url'],
                'title'            => $link['name'],
                'meta_description' => $link['description']?: null,
                'redirect_type'    => $link['redirect_type'],
                'created_at'       => $link['created_at'], 
                'updated_at'       => $link['updated_at'],
                'last_link_check'  => gmdate('Y-m-d H:i:s'),
                'author_id'        => $link['created_by_id']
            ];

            $createdLinkId =  $linkTable->insertGetId($data);

            $createdLink = $linkTable->getLink($createdLinkId);

            $createdLink->just_created = true;

            array_push($createdLinksData, $createdLink);
        }

        return $createdLinksData;
    }

    /**
     * URL Shortify Clicks Migration
    */
    public function URLShortifyClicksMigration($clicks)
    {
        $browserDetection =  (new BrowserDetection);

        $createdClicksData = [];

        if (empty($clicks)) {
            return $createdClicksData;
        }

        foreach ($clicks as  $click) {

            $osName = $browserDetection->getOS($click['user_agent']);
            $devicesName = $browserDetection->getDevice($click['user_agent']);
            $browserName = $browserDetection->getBrowser($click['user_agent']);

            $slug = sanitize_text_field($click['uri']);

            if (substr($slug, 0, 1) === '/') {
                $slug = substr($slug, 1); // Removes the first character (the slash)
            }

            $link = Link::where('slug', $slug)->first();

            // checking Ip Address
            $isIpAddress = (new LinkAnalytics)->isIpAddress($link->id, $click['ip']);

            $data = [
                'link_id'             => intval($link['id']),
                'slug'                => $slug,
                'os_name'             => sanitize_text_field($osName['os_name']),
                'ip'                  => sanitize_text_field($click['ip']),
                'devices_name'        => sanitize_text_field($devicesName['device_type']),
                'browser_name'        => sanitize_text_field($browserName['browser_name']),
                'traffic_source_name' => $click['referer']?:'Direct',
                'country_name'        => '(not set)',
                'city_name'           => '(not set)',
                'date'                => $click['created_at'],
            ];

            $createdClickId = LinkAnalytics::insertGetId($data);

            $createdClick =  LinkAnalytics::where('id', $createdClickId )->first();

            $createdClick->just_created = true;

            array_push($createdClicksData, $createdClick);

            /**
             * insert click & unique click data in Link Table
            */
            (new FrontendHandler)->createClick($link, $isIpAddress);
        }

        return $createdClicksData; 
    }


    public function deactivatePlugin(Request $request)
    {
        require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        
        $pluginName = $request->get('plugin_name');

        $deactivePlugin = '';

        if ($pluginName == 'prli_links') {
            $deactivePlugin = 'pretty-link/pretty-link.php';
        } 
        
        if ($pluginName == 'betterlinks') {
            $deactivePlugin = 'betterlinks/betterlinks.php';
        }

        if ($pluginName == 'short_links') {
            $deactivePlugin = 'mts-url-shortener/mts-url-shortener.php';
        }

        if ($pluginName == 'kc_us_links') {
            $deactivePlugin = 'url-shortify/url-shortify.php';
        }

        // if ($pluginName == 'thirstylink') {
        //     $deactivePlugin = 'thirstyaffiliates/thirstyaffiliates.php';
        // }

        $deactivate = deactivate_plugins($deactivePlugin);
        
        return $this->sendSuccess([
            'message' => __('Link successfully deactivated', 'exact-links'),
        ], 200);
    }
}