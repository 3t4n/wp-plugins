<?php

namespace ExactLinks\App\Hooks\Handlers;

use ExactLinks\App\Models\Link;
use ExactLinks\App\Libs\Mailer\BrokenLinkMailer;

class BrokenLinkCheckHandler {

    public function dailyBrokenLinkChecker()
    {
        $links =  Link::where('status', 'active')->get();
       
        if (!count($links)) {
            return;
        }

        foreach ($links as $link) {
            // if link broken  
            if ($this->isLinkBroken($link->target_url)) {
              
                $updateBrokenData = [
                    'featured_image'   => EXACTLINKS_PLUGIN_URL."assets/images/warning.png",
                    'status'           => sanitize_text_field('broken'),
                    'updated_at'       => gmdate('Y-m-d H:i:s')
                ];

                Link::where('id', $link->id)->update($updateBrokenData);
            } 
        }

        BrokenLinkMailer::brokenLinkMailSend();
    }

    public function isLinkBroken($url) {
        
        if (!$url) {
            return false;
        }
      
        // For amazon
        if ($this->getDomainNameByUrl($url) == 'amazon') {
            $title =  $this->getHTMLContent($url);
          
            if (strpos($title, 'Page Not Found') !== false) {
                return true;
            } else {
                return false;
            }
        }
        
        return false;
    }

    private function getDomainNameByUrl($url)
    {
        $parse = parse_url($url);

        if (isset($parse['host'])) {
            $hostName = explode('.', $parse['host']);
            return $hostName[1];
        }

        return "";
    }

     // Get HTML Content (like Amazon product HTML)
     public function getHTMLContent($url) {
        $request = wp_remote_get($url);

        if (!is_wp_error($request)) {
            $request = wp_remote_retrieve_body($request);
        }

        $dom = new \DOMDocument();
        libxml_use_internal_errors(1);
        $dom->loadHTML($request);

        $titles = $dom->getElementsByTagName('title');

        foreach ($titles as $title) {
            return $title->nodeValue;
        }
    }
}