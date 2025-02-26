<?php

namespace ExactLinks\App\Hooks\Handlers;

use ExactLinks\App\App;
use ExactLinks\App\Models\Link;
use ExactLinks\Framework\Support\Arr;
use ExactLinks\App\Models\LinkAnalytics;
use ExactLinks\App\Models\ConversionItems;
use ExactLinks\App\Libs\Browser\BrowserDetection;
use ExactLinks\App\Libs\BotDetection\BotDetection;
use ExactLinks\App\Libs\CountryNames\CountryNames;

class FrontendHandler
{
    public function redirectionURL() 
    {   
        $userAgent = (isset($_SERVER['HTTP_USER_AGENT'])) ? sanitize_text_field($_SERVER['HTTP_USER_AGENT']) : '';
        // Don't track from Bot
        if ((new BotDetection)->is_bot($userAgent)) {
			return false;
		}

        $slug = $this->getCurrentUrl();

        $post = (new Link)->isSlug($slug);

        if (isset($post)) {

            $this->createAnalytics($post);

            $postId = intval($post->id);

            $types = array('simple', 'box_content', 'choice_links', 'ab_links');

            if (in_array($post->type, $types)) {
                $this->redirectionURLLink($post);
            } elseif ($post->type == 'choice_pages') {
                $this->choiceLinksRedirect($postId); 
            } elseif ($post->type == 'ab_pages') {
                $this->abSplitLinksRedirect($postId);
            }
        } 
        else {
            $settings = get_option('exactlinks_settings');
            
            if (isset($settings['pageRedirection404'])) {
                $this->redirection404();
            }
        }
    }

    public function getCurrentUrl()
    {
        $currentUrl =  sanitize_url("http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        $actualUrl  = explode(sanitize_text_field($_SERVER['HTTP_HOST']), $currentUrl)[1];
        $slug = substr($actualUrl, 1);
        $slug = explode('?', $slug )[0];

        return $slug;
    }

    public function redirection404() {

        add_action('template_redirect', function() {

            $settings = get_option('exactlinks_settings');

            if ( (defined('DOING_CRON') && DOING_CRON) || (defined('XMLRPC_REQUEST') && XMLRPC_REQUEST) || (defined('DOING_AJAX') && DOING_AJAX) ) return;
            
            if (is_admin()) return;
            
            if (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], 'sitemap.xml') !== false) return;
            
            global $wp_query;
            if ($wp_query->is_404 === false) return;

            if (wp_redirect($settings['pageRedirection404'], 301)) die;
            
        }, PHP_INT_MAX);
    }

    public function redirectionURLLink($post) {
        if (!$post) {
            return;
        }

        echo $this->redirectRenderPreview($post); 
        die;
    }

    public function redirectRenderPreview($post) {
       $app = App::getInstance();
     
       return $app->view->make('public.RedirectFrontendview', compact('post'));
    }


    public function choiceLinksRedirect($postId)
    {  
        $posts = (new Link)->getLink($postId);
        
        if (!$posts) {
            return;
        }

        echo $this->choiceLinksRenderPreview($posts); 
        die;
    }

    public function choiceLinksRenderPreview($posts)
    {
       $app = App::getInstance();
        
       $app->addAction('wp_enqueue_scripts', [$this, 'enqueueScripts']);

       return $app->view->make('public.Frontendview', compact('posts'));
    }

    public function enqueueScripts()
    {
        wp_enqueue_style('exactlinks-common', EXACTLINKS_PLUGIN_URL.'assets/public/css/exactlinks-common.css');
    }
    
    /**
     * get Traffic Source
    */ 
    public function getTrafficSource()
    {   
        $trafficSourceName = __('Direct', 'exact-links');
        
        if (isset($_SERVER['HTTP_REFERER'])) {
            $trafficSourceName = sanitize_url($_SERVER['HTTP_REFERER']);
        }

        return $trafficSourceName;
    }

    public function getDetectedDevice()
    {
        $browserDetection =  (new BrowserDetection);

        $userAgent = ''; 

        if (isset($_SERVER, $_SERVER['HTTP_USER_AGENT'])) {
            $userAgent = sanitize_text_field($_SERVER['HTTP_USER_AGENT']);
        }

        $browserName = $browserDetection->getBrowser($userAgent);
        $osName      = $browserDetection->getOS($userAgent);
        $devicesName = $browserDetection->getDevice($userAgent);
       
        return apply_filters('exactlinks/get_detected_device', [
            'browserName'       => $browserName['browser_name'] ?: __('(not set)', 'exact-links'),
            'osName'            => $osName['os_name'] ?: __('(not set)', 'exact-links'),
            'devicesName'       => $devicesName['device_type'] ?: __('(not set)', 'exact-links'),
            'trafficSourceName' => $this->getTrafficSource(),
            'ipAddress'         =>  App::getInstance("request")->getIp()
        ]);
    }

    /**
     * Get Detected Country And City  
    */

    public function getDetectedCountry($ipAddress) {
        $data      = @file_get_contents("https://ipinfo.io/$ipAddress");
        $ipInfo    = json_decode($data);

        return apply_filters('exactlinks/get_detected_country', [
            'country_name' =>  isset($ipInfo->country) ? (new CountryNames)->getCountryName($ipInfo->country) : __('(not set)', 'exact-links'),
            'city_name'    =>  isset($ipInfo->city) ? $ipInfo->city : __('(not set)', 'exact-links')
        ]);
    }

    /***
     * Insert Traking data 
    */
    public function createAnalytics($post)
    {  
        // detected Device
        $deviceInfo = $this->getDetectedDevice();

        // Country Detected 
        $ipInfo =  $this->getDetectedCountry($deviceInfo['ipAddress']);
      
        // checking Ip Address
        $isIpAddress = (new LinkAnalytics)->isIpAddress($post->id, $deviceInfo['ipAddress']);
        
        //cookie set slug 
        $this->exlSetCookie($post->slug);

        $data = [
            'link_id'             => intval($post->id),
            'slug'                => sanitize_text_field($post->slug),
            'os_name'             => sanitize_text_field($deviceInfo['osName']),
            'ip'                  => sanitize_text_field($deviceInfo['ipAddress']),
            'devices_name'        => sanitize_text_field($deviceInfo['devicesName']),
            'browser_name'        => sanitize_text_field($deviceInfo['browserName']),
            'traffic_source_name' => $deviceInfo['trafficSourceName'],
            'country_name'        => sanitize_text_field($ipInfo['country_name']),
            'city_name'           => sanitize_text_field($ipInfo['city_name']),
            'date'                => date("Y-m-d H:i:s")
        ];
       
        apply_filters('exactlinks/before_create_analytics', $data);

        // insert Analytic data
        (new LinkAnalytics)->insertGetId($data);
        // insert click data
        $this->createClick($post, $isIpAddress);
    }

    /**
     *  A/B Split Testing Redirection URL & insert data
    */
    public function abSplitLinksRedirect($postId)
    {  
        $abSplitPost = $this->abSplitPriority($postId);
        $id          = intval($abSplitPost['id']);
        $deviceInfo  = $this->getDetectedDevice();
        $abLink = (new Link)->where('id', $id)->first(); 
        
        if (!$abLink) {
            return;
        }

        //cookie set slug 
        $this->exlSetCookie($abLink->slug);

        // checking Ip Address
        $ipAddress = App::getInstance("request")->getIp();
        $isIpAddress = (new LinkAnalytics)->isIpAddress($abLink['id'], $ipAddress);
        
        $data = [
            'link_id'      => $id,
            'os_name'      => sanitize_text_field($deviceInfo['osName']),
            'ip'           => sanitize_text_field($deviceInfo['ipAddress']),
            'devices_name' => sanitize_text_field($deviceInfo['devicesName']),
            'browser_name' => sanitize_text_field($deviceInfo['browserName']),
            'traffic_source_name' => $deviceInfo['trafficSourceName'],
            'date'         => date("Y-m-d H:i:s")
        ];

        apply_filters('exactlinks/before_ab_split_create_analytics', $data);

        // insert ablink Analytic data (link wise)
        (new LinkAnalytics)->insertGetId($data);
        // insert click data
        $this->createClick($abLink, $isIpAddress);
        
        wp_redirect($abLink->target_url, $abLink->redirect_type);
        exit();
    }

    /**
     *  A/B Split Testing Priority
    */
    public function abSplitPriority($postId)
    {
        $posts = (new Link)->getLink($postId);
        $posts =  Arr::get($posts, 'ab_links'); 
        
        if (!$posts) {
            return null;
        }

        $priorities = array();
        
        foreach ($posts as $row) {
            $priorities[] = $row['priority'];
        }

        $count = count($priorities);
        $num =  mt_rand(0, array_sum($priorities));
        
        $i = $n = 0;

        while ($i < $count) {
            $n += $priorities[$i];
            if ($n >= $num) break;
            $i++;
        }

        return $posts[$i] ? $posts[$i] : null;
    }

    /**
     * insert click & unique click data when URL redirection
    */
    public function createClick($post, $isIpAddress)
    {
        if (!$isIpAddress) {
            $uniqueClick = $post->total_unique_click + 1;
        } else {
            $uniqueClick = $post->total_unique_click;
            
            if ($uniqueClick == 0) {
                $uniqueClick = 1;
            }
        }

        $data = array(
            'total_click' => intval($post->total_click + 1),
            'total_unique_click' => intval($uniqueClick)
        );
        
        $createClick = (new Link)->where('id', $post->id)->update($data);
        
        return $createClick;
    }

    /**
     * cookie save when short link click
    */

    public function exlSetCookie($slug)
    {
        //cookie set slug 
        if (defined('WC_VERSION') || defined('EDD_VERSION')) {
            $cookie_name  = "exactlinks_slug";
            $cookie_value = sanitize_text_field($slug);
            $settings     = get_option('exactlinks_settings');
            setcookie(
                $cookie_name,
                $cookie_value,
                time() + (86400 * $settings['activeCookies'])
            ); // 86400 = 1 day
        }
    }

    /**
     *  cookie save for woocommerce conversion track
    */
    public function woocommerceCampaignMeta($order, $data)
    {  
        if (isset($_COOKIE['exactlinks_slug'])) {
            $slug = sanitize_text_field($_COOKIE['exactlinks_slug']);
            
            if ($slug) {
                $order->update_meta_data('_exactlinks_slug', $slug);
            }
        }
    }

    /**
     *  woocommerce conversion track
    */
    public function woocommerceCompletePurchase($orderId)
    {   
        $order = wc_get_order( $orderId );

        if (!$order) {
            return;
        }
        
        $slug = $order->get_meta('_exactlinks_slug');
        $link = (new Link)->isSlug($slug);

        if (!$link) {
            return;
        }
       
        $ipAddress = App::getInstance("request")->getIp();
        
        $data = array(
            'link_id'          => intval($link->id),
            'ip'               => $ipAddress,
            'slug'             => sanitize_text_field($link->slug),
            'conversion_text'  => sanitize_text_field('thankyou_url'),
            'conversion_amount'=> floatval($order->get_total()),
            'date'             => date("Y-m-d H:i:s"),
        );

        apply_filters('exactlinks/before_woocommerce_create_analytics', $data);

        (new LinkAnalytics)->insertGetId($data);
        //link conversion rate;
        $conversionRate = array(
            'conversion_rate'  => intval($link->conversion_rate + 1),
        );
        
        (new Link)->where('id', $link->id)->update($conversionRate);
    }

    /**
     * WooCommerce Conversion Items Save
    */

    public function WooCommerceConversionItems($order) {
      
        if (!$order) {
            return;
        }

        $slug = $order->get_meta('_exactlinks_slug');
        $link = (new Link)->isSlug($slug);
       
        if (!$link) {
            return;
        }
        
        foreach ($order->get_items() as $item_id => $item) {
            $data = array(
                'link_id'       => intval($link->id),
                'slug'          => sanitize_text_field($slug),
                'product_name'  => sanitize_text_field($item->get_name()),
                'sale_quantity' => intval($item->get_quantity()),
                'price'         => floatval($item->get_total()),
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),

            );

            apply_filters('exactlinks/before_woocommerce_create_conversion_lists', $data);

            (new ConversionItems)->insertGetId($data);
        }
    }


    /**
     *  cookie save in post meta for EDD conversion track
    */
    public function eddCampaignMeta($paymentId = 0, $payment_data = array())
    {  
        if (isset($_COOKIE['exactlinks_slug'])) {
            $slug = sanitize_text_field($_COOKIE['exactlinks_slug']);

            $payment = edd_get_payment($paymentId);

            if ($slug) {
                edd_update_payment_meta($payment->id, '_exactlinks_slug', $slug);
            }
        }
    }

    /**
     *  EDD conversion track
    */
    public function eddCompletePurchase($paymentId) 
    {
        $payment = edd_get_payment($paymentId);

        $slug = edd_get_payment_meta($payment->id, '_exactlinks_slug');
        $link = (new Link)->isSlug($slug);

        if (!$link) {
            return;
        }
        
        $ipAddress = App::getInstance("request")->getIp();
        $data = array(
            'link_id'          => intval($link->id),
            'ip'               => $ipAddress,
            'slug'             => sanitize_text_field($link->slug),
            'conversion_text'  => sanitize_text_field('thankyou_url'),
            'conversion_amount'=> floatval($payment->total),
            'date'             => date("Y-m-d H:i:s"),
        );

        apply_filters('exactlinks/before_edd_create_analytics', $data);

        (new LinkAnalytics)->insertGetId($data);
        //link conversion rate;
        $conversionRate = array(
            'conversion_rate'  => intval($link->conversion_rate + 1),
        );
        
        (new Link)->where('id', $link->id)->update($conversionRate);

        // Insert edd Items
        $this->eddConversionItems($payment, $link);
    }

    public function eddConversionItems($payment, $link)
    {
        $items = $payment->cart_details;
    
        foreach ($items as $item) {
            $data = array(
                'link_id'       => intval($link->id),
                'slug'          => sanitize_text_field($link->slug),
                'product_name'  => sanitize_text_field($item['name']),
                'sale_quantity' => intval($item['quantity']),
                'price'         => floatval($item['price']),
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            );

            apply_filters('exactlinks/before_edd_create_conversion_lists', $data);

            (new ConversionItems)->insertGetId($data);
        }
    }
}