<?php
namespace ExactLinks\App\Hooks\Handlers;

use ExactLinks\App\Helpers\Shortner;
use ExactLinks\App\Models\Link;

class GutenbergApiHandler 
{   

    public function registerRoutes()
    {
        register_rest_route('exactlinks/v1', '/get_attributes', [
            'methods' => 'GET',
            'callback' => [$this, 'getAttributes'],
            'permission_callback' => '__return_true'
        ]);
        
        register_rest_route('exactlinks/v1', '/get_slug_guten', [
            'methods' => 'GET',
            'callback' => [$this, 'getSlugConfigGuten'],
            'permission_callback' => '__return_true'
        ]);

        register_rest_route('exactlinks/v1', '/get_link_guten', [
            'methods' => 'GET',
            'callback' => [$this, 'getLink'],
            'permission_callback' => '__return_true'
        ]);
        
        register_rest_route('exactlinks/v1', '/update_guten_post', [
            'methods' => 'POST',
            'callback' => [$this, 'updateLink'],
            'permission_callback' => '__return_true'
        ]);
    }

    public function getAttributes($request)
    {   
        $url = esc_url($request['url']);
    
        try {
            $headers = @get_meta_tags($url, true);
        } catch (\Throwable $th) {
            wp_send_json_error( 'Attribute not Found' );
        }
    
        $title = $this->getTitle($headers, $url);
        $description = $this->getMetaDescription($headers, $url);
        $image = $this->getFeaturedImage($headers);

        if ($this->getDomainNameByUrl($url) == 'amazon') {
            $dom =  $this->getHTMLContent($url);
            $title = trim($dom->getElementById('productTitle')->textContent);
            $description = trim($dom->getElementById('productTitle')->textContent);
            $image = $dom->getElementById('landingImage')->getAttribute('src');
        }

        $data = [
            'url'              => $url,
            'meta_title'       => $title,
            'title'            => $title,
            'featured_image'   => $image,
            'meta_description' => $description,
            'target_domain'    => (new Link)->getDomainByUrl($url),
            'headers'          => $headers,
        ];

        wp_send_json(array(
            'data' => $data,
        ));
    }

    public function getLink($request)
    {
        $link = (new Link);

        $slug    = sanitize_text_field($request['slug']);
        $getLink = $link->isSlug($slug);
        
        if (!$getLink) {
            return;
        }

        $linkData = $link->getLink($getLink['id']);
        
        wp_send_json(array(
            'data' => $linkData,
        ));
    }

    public function updateLink($request)
    {   
        if ($request['slug'] == '') {
            return;
        }

        if ($request['tags'] == null) {
            $request['tags'] = [];
        }
        
        $settings = $this->generateGetConfigs($request);

        $data = [
            'type'            => 'box_content',
            'slug'            => sanitize_text_field($request['slug']),
            'target_url'      => sanitize_url($request['targetURL']),
            'title'           => sanitize_text_field($request['title']),
            'button_text'     => sanitize_text_field($request['buttonText']),
            'badge_text'      => sanitize_text_field($request['badgeText']),
            'price'           => sanitize_text_field($request['price']),
            'meta_description'=> wp_unslash(wp_kses_post($request['description'])),
            'disclosure'      => wp_unslash(wp_kses_post($request['disclosure'])),
            'featured_image'  => sanitize_url($request['boxContentImageUrls']),
            'tags'            => maybe_serialize(wp_unslash($request['tags'])),
            'settings'        => maybe_serialize(wp_unslash($settings)),
            'redirect_type'   => intval(301),
            'created_at'      => gmdate('Y-m-d H:i:s'),
            'updated_at'      => gmdate('Y-m-d H:i:s'),
            'last_link_check' => gmdate('Y-m-d H:i:s'),
            'author_id'       => get_current_user_id(),
        ];

        $link = (new Link);
        // slug is available and slug validation
        $isSlugAvailable =  $link->isSlugAvailable(sanitize_text_field($request['slug']));
        
        // is slug available then create link
        if ($isSlugAvailable) {
            $createdLinkId = $link->insertGetId($data);
            $createdLink = $link->getLink($createdLinkId);
            $createdLink->just_created = true;
           
            wp_send_json(array(
                'message' => __('Link Successfully Created', 'exact-links'),
                'data' => $createdLink
            ));

        } else {
            // Now we have a valid slug let's update the URL now
            $getLink = $link->isSlug(sanitize_text_field($request['slug']));
            $link->where('id', $getLink['id'])->update($data);

            wp_send_json(array(
                'message' => __('Link Successfully Updated', 'exact-links'),
                'data'    => $link->getLink($getLink['id'])
            ));
        }
    }

    protected function generateGetConfigs($request)
    {
        $settings = array (
            'box_template'=>  sanitize_text_field($request['selectedTemplate']),
            'new_tab' => sanitize_text_field($request['newTab']),
            'no_follow' => sanitize_text_field($request['noFollow']),
            'description' => sanitize_text_field($request['showDescription']),
            'disclosure' => sanitize_text_field($request['showDisclosure']),
            'price' => sanitize_text_field($request['showPrice']),
            'styles' => array(
                'badgeStyles' => array(
                    'color'   => array(
                        'key'   => 'color',
                        'value' => sanitize_text_field($request['badgeTextColor'])
                    ),
                    'backgroundColor'   => array(
                        'key'   => 'backgroundcolor',
                        'value' => sanitize_text_field($request['badgeBgColor'])
                    )
                ),
                'buttonStyles' => array(
                    'color'   => array(
                        'key'   => 'color',
                        'value' => sanitize_text_field($request['buttonTextColor'])
                    ),
                    'backgroundColor'   => array(
                        'key'   => 'backgroundcolor',
                        'value' => sanitize_text_field($request['buttonBgColor'])
                    )
                )
            )
        );

        return $settings;
    }

    public function getSlugConfigGuten()
    {
        wp_send_json(array(
            'slug' => (new Shortner)->getSlug()
        ));
    }

     /**
     * Get only domain name
    */
    public function getDomainNameByUrl($url)
    {
        $parse = parse_url($url);

        if (isset($parse['host'])) {
            $hostName = explode('.', $parse['host']);
            return $hostName[1];
        }

        return "";
    }

    public function getHTMLContent($url) {
        $request = wp_remote_get($url);

        if (!is_wp_error($request)) {
            $request = wp_remote_retrieve_body($request);
        }

        $dom = new \DOMDocument();
        libxml_use_internal_errors(1);
        $dom->loadHTML($request);

        return $dom;
    }


    private function getTitle($headers, $url)
    {
        $possibleValues = [
            'og:title',
            'og:description',
            'title',
            'twitter:title',
            'description',
            'twitter:description'
        ];

        foreach ($possibleValues as $key) {
            if (isset($headers[$key]) && $headers[$key]) {
                return $headers[$key];
            }
        }

        $title = '';
        $wp_http = new \WP_Http;
        $result = $wp_http->request($url, array('sslverify' => false));

        if (!$result or is_a($result, 'WP_Error') or !isset($result['body'])) {
            return '';
        }

        $data = $result['body'];

        // Look for <title>(.*?)</title> in the text
        if ($data and preg_match('#<title>[\s\n\r]*?(.*?)[\s\n\r]*?</title>#im', $data, $matches)) {
            $title = html_entity_decode(trim($matches[1]));
        }

        //Attempt to covert cyrillic and other weird shiz to UTF-8 - if it fails we'll just return the slug next
        if (extension_loaded('mbstring') && function_exists('iconv')) {
            $title = iconv(mb_detect_encoding($title, mb_detect_order(), true), "UTF-8", $title);
        }

        return $title;
    }

    private function getMetaDescription($headers, $url)
    {
        $possibleValues = [
            'og:description',
            'og:title',
            'description',
            'twitter:description',
            'title',
            'twitter:title',
        ];

        foreach ($possibleValues as $key) {
            if (isset($headers[$key]) && $headers[$key]) {
                return $headers[$key];
            }
        }

        $title = '';
        $wp_http = new \WP_Http;
        $result = $wp_http->request($url, array('sslverify' => false));

        if (!$result or is_a($result, 'WP_Error') or !isset($result['body'])) {
            return '';
        }

        $data = $result['body'];

        // Look for <title>(.*?)</title> in the text
        if ($data and preg_match('#<title>[\s\n\r]*?(.*?)[\s\n\r]*?</title>#im', $data, $matches)) {
            $title = html_entity_decode(trim($matches[1]));
        }

        //Attempt to covert cyrillic and other weird shiz to UTF-8 - if it fails we'll just return the slug next
        if (extension_loaded('mbstring') && function_exists('iconv')) {
            $title = iconv(mb_detect_encoding($title, mb_detect_order(), true), "UTF-8", $title);
        }

        return $title;
    }

    private function getFeaturedImage($headers)
    {
        $possibleValues = [
            'og:image',
            'twitter:image'
        ];

        foreach ($possibleValues as $key) {
            if (isset($headers[$key]) && $headers[$key]) {
                return $headers[$key];
            }
        }

        return '';
    }
}
