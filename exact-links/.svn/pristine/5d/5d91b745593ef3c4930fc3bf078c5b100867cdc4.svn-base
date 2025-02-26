<?php

namespace ExactLinks\App\Http\Controllers;

use ExactLinks\App\Models\Link;
use ExactLinks\App\Models\UTMTemplate;
use ExactLinks\App\Models\SubDomain;
use ExactLinks\App\Helpers\Shortner;
use ExactLinks\Framework\Request\Request;

class LinkController extends Controller
{
    public function getLinks(Request $request)
    {
        $links = Link::whereNull('parent_id')
                ->orderBy('id', 'DESC');
        $type   = sanitize_text_field($request->get('type'));
        $search = sanitize_text_field($request->get('search'));
        $status = sanitize_text_field($request->get('status'));
        $tag    = sanitize_text_field($request->get('tag'));
        
        if ($type) {
            $links = $links->where('type', $type);
        }

        if ($search) {
            $links = $links->where(function ($query) use ($search) {
                $query->where('id', 'LIKE', '%' . $search . '%')
                    ->orWhere('type', 'LIKE', '%' . $search . '%')
                    ->orWhere('target_url', 'LIKE', '%' . $search . '%')
                    ->orWhere('slug', 'LIKE', '%' . $search . '%')
                    ->orWhere('target_domain', 'LIKE', '%' . $search . '%')
                    ->orWhere('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('meta_title', 'LIKE', '%' . $search . '%')
                    ->orWhere('meta_description', 'LIKE', '%' . $search . '%')
                    ->orWhere('featured_image', 'LIKE', '%' . $search . '%')
                    ->orWhere('utm_source', 'LIKE', '%' . $search . '%')
                    ->orWhere('utm_medium', 'LIKE', '%' . $search . '%')
                    ->orWhere('utm_campaign', 'LIKE', '%' . $search . '%')
                    ->orWhere('utm_term', 'LIKE', '%' . $search . '%')
                    ->orWhere('utm_content', 'LIKE', '%' . $search . '%')
                    ->orWhere('note', 'LIKE', '%' . $search . '%')
                    ->orWhere('author_id', 'LIKE', '%' . $search . '%')
                    ->orWhere('tags', 'REGEXP', '.*;s:[0-9]+:"' . $search . '".*');
            });
        }

        if ($status) {
            $links = $links->where('status', $status);
        }

        if ($tag) {
            $links = $links->where('tags', 'REGEXP', '.*;s:[0-9]+:"' . $tag . '".*');
        }

        $links = $links->paginate();

        foreach ($links as $link) {
            $link->human_created_at = human_time_diff(strtotime($link->created_at), time()) . ' ago';
        }

        if (!$links->isEmpty()) {
            $getAllTags = $this->getAllTags();
        } else {
            $getAllTags = [];
        }

        return $this->sendSuccess([
            'links' => $links,
            'type'  => $type,
            'tags'  => $getAllTags,
        ]);
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

        return $dom;
    }

    public function getAllTags()
    {
        $links = Link::select(['tags'])->whereNotNull('tags')->get();
       
        $tags = [];

        foreach ($links as $link) {
            $items = maybe_unserialize($link->tags);
            foreach ($items as $item) {
                $tags[] = ucfirst($item);
            }
        }

        return array_unique($tags);
    }

    public function getLink(Request $request, $id)
    {
        $link = (new Link)->getLink($id);
       
        $link->utml_template = (new UTMTemplate)->getUTMTemplateByID($link['utm_template_id']);

        $link->subDomain = (new SubDomain)->getSubDomainByID($link['subdomain_id']);

        return $this->sendSuccess([
            'link' => $link,
        ]);
    }

    public function createLink(Request $request)
    {
        $link = (new Link); 

        $linkType = sanitize_text_field($request->get('type'));

        if (Link::where('slug', sanitize_text_field($request->get('slug')))->first()) {
            return $this->sendError([
                'message' => __('The provided short url is not available. Please change the short link', 'exact-links')
            ],423);
        }

        if ($linkType == 'simple') {
            $createdLinkId = $this->handleSimpleLinkCreation($request, $link);
        } elseif ($linkType == 'box_content') {
            $createdLinkId = $this->handleBoxContentLinkCreation($request, $link);
        } elseif ($linkType == 'choice_pages') {
            $createdLinkId = $this->handleChoiceLinkCreation($request, $link);
        } elseif ($linkType == 'ab_pages') {
            if (defined('EXACTLINKSPRO_DIR_FILE')) {
                $createdLinkId =  \ExactLinksPro\App\Services\ABLinkCreation::handleAbLinkCreation($request, $link);
            }
        }

        $createdLink = $link->getLink($createdLinkId);

        $createdLink->just_created = true;

        return $this->sendSuccess($createdLink);
    }

    public function updateLink(Request $request, $linkId)
    {
        $link = Link::findOrFail($linkId);

        $linkData = wp_unslash($request->get('link'));

        $slug = sanitize_text_field($linkData['slug']);
        
        if ($link->slug != $slug) {
            // it's a new slug
            if (Link::where('slug', $slug)->where('id', '!=', $link->id)->first()) {
                return $this->sendError([
                    'message' => __('The provided slug is already taken', 'exact-links')
                ]);
            }
        }

        $defaultTags = isset($linkData['tags']) ? $linkData['tags'] : [];

        // Now we have a valid slug let's update the URL now
        $updateData = [
            'type'             => sanitize_text_field($linkData['type']),
            'slug'             => $slug,
            'target_url'       => sanitize_url($linkData['target_url']),
            'target_domain'    => $link->getDomainByUrl(sanitize_url($linkData['target_url'])),
            'title'            => ($linkData['title']) ? sanitize_text_field($linkData['title']) : sanitize_text_field($linkData['meta_title']),
            'meta_title'       => sanitize_text_field($linkData['meta_title']),
            'meta_description' => wp_unslash(wp_kses_post($linkData['meta_description'])),
            'button_text'      => sanitize_text_field($linkData['button_text']),
            'badge_text'       => sanitize_text_field($linkData['badge_text']),
            'price'            => sanitize_text_field($linkData['price']),
            'disclosure'       => wp_unslash(wp_kses_post($linkData['disclosure'])),
            'tags'             => maybe_serialize(wp_unslash($defaultTags)),
            'settings'         => maybe_serialize(wp_unslash($linkData['settings'])),
            'featured_image'   => sanitize_url($linkData['featured_image']),
            'utm_template_id'  => intval($linkData['utm_template_id']),
            'utm_source'       => sanitize_text_field($linkData['utm_source']),
            'utm_medium'       => sanitize_text_field($linkData['utm_medium']),
            'utm_campaign'     => sanitize_text_field($linkData['utm_campaign']),
            'utm_term'         => sanitize_text_field($linkData['utm_term']),
            'utm_content'      => sanitize_text_field($linkData['utm_content']),
            'subdomain_id'     => intval($linkData['subdomain_id']),
            'subdomain_name'   => sanitize_text_field($linkData['subdomain_name']),
            'category_id'      => intval($linkData['category_id']),
            'status'           => sanitize_text_field('active'),
            'note'             => sanitize_text_field($linkData['note']),
            'updated_at'       => gmdate('Y-m-d H:i:s')
        ];

        Link::where('id', $link->id)->update($updateData);

        if ($linkData['type'] == 'choice_pages') {
            $choiceLinks = $linkData['choice_links'];
            $childrenIds = [];
            foreach ($choiceLinks as $index => $choiceLink) {
                if (isset($choiceLink['id'])) {
                    $data = [
                        'target_url'     => sanitize_url($choiceLink['target_url']),
                        'slug'           => $choiceLink['slug'],
                        'priority'       => $index + 1,
                        'target_domain'  => $link->getDomainByUrl(sanitize_url($choiceLink['target_url'])),
                        'button_text'    => sanitize_text_field($choiceLink['button_text'])
                    ];
                    $link->where('id', $choiceLink['id'])->update($data);
                    $childrenIds[] = $choiceLink['id'];
                } else {
                    $choiceLinkData = [
                        'type'            => sanitize_text_field('choice_links'),
                        'parent_id'       => intval($linkData['id']),
                        'slug'            => sanitize_text_field($this->getSlugConfig()),
                        'priority'        => $index + 1,
                        'author_id'       => get_current_user_id(),
                        'status'          => 'active',
                        'target_url'      => sanitize_url($choiceLink['target_url']),
                        'target_domain'   => $link->getDomainByUrl(sanitize_url($choiceLink['target_url'])),
                        'button_text'     => sanitize_text_field($choiceLink['button_text']),
                        'created_at'      => gmdate('Y-m-d H:i:s'),
                        'updated_at'      => gmdate('Y-m-d H:i:s'),
                        'last_link_check' => gmdate('Y-m-d H:i:s')
                    ];
                    $childrenIds[] = $link->insertGetId($choiceLinkData);
                }
            }

            $link->deleteUnusedChilds($linkData['id'], $childrenIds);
            
        } elseif ($linkData['type'] == 'ab_pages') {
            $abLinks = $linkData['ab_links'];
            $childrenIds = [];
            foreach ($abLinks as $index => $abLink) {
                if (isset($abLink['id'])) {
                    $data = [
                        'target_url' => sanitize_url($abLink['target_url']),
                        'priority'   => intval($abLink['priority']),
                        'slug'       => $abLink['slug']
                    ];
                    $link->where('id', $abLink['id'])->update($data);
                    $childrenIds[] = $abLink['id'];
                } else {
                    $abLinkData = [
                        'type'            => sanitize_text_field('ab_links'),
                        'slug'            => sanitize_text_field($this->getSlugConfig()),
                        'parent_id'       => intval($linkData['id']),
                        'priority'        => intval($abLink['priority']),
                        'author_id'       => get_current_user_id(),
                        'status'          => 'active',
                        'target_url'      => sanitize_url($abLink['target_url']),
                        'target_domain'   => $link->getDomainByUrl(sanitize_url($abLink['target_url'])),
                        'created_at'      => gmdate('Y-m-d H:i:s'),
                        'updated_at'      => gmdate('Y-m-d H:i:s'),
                        'last_link_check' => gmdate('Y-m-d H:i:s')
                    ];
                    $childrenIds[] = $link->insertGetId($abLinkData);
                }
            }
            // Now Delete the other childs
            $link->deleteUnusedChilds($linkData['id'], $childrenIds);
        }

        return $this->sendSuccess([
            'message' => __('Link successfully updated', 'exact-links'),
            'link'    => $link->getLink($link->id)
        ], 200);
    }

    public function maybeDeleteLinks(Request $request)
    {
        $linkIds    = wp_unslash($request->get('link_ids'));
        $actionType = sanitize_text_field($request->get('action_type'));
    
        if ($actionType == 'delete') {
            $links = Link::whereIn('id', $linkIds)->get();

            $links->each(function ($link) {
                $link->delete();
            });

            return $this->sendSuccess([
                'message' => __('Selected links successfully deleted', 'exact-links')
            ], 200);
        }

        Link::whereIn('id', $linkIds)
            ->orWhereIn('parent_id', $linkIds)
            ->update([
                'status'     => $actionType,
                'updated_at' => gmdate('Y-m-d H:i:s')
            ]);

        return $this->sendSuccess([
            'message' => __('Selected links successfully updated', 'exact-links')
        ], 200);

    }

    public function getLinkAttributes(Request $request)
    {
        $url = sanitize_url($request->get('url'));

        try {
            $headers = @get_meta_tags($url, true);
        } catch (\Throwable $th) {
            return $this->sendError([
                'message' => __('Attribute not Found', 'exact-links')
            ], 200);
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

       return $this->sendSuccess($data);
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


    /**
     * Slug ajax request when create link page open & Choice page & a/b link create
    */
    public function getSlugConfig()
    {
        return (new Shortner)->getSlug();
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

    
    private function handleChoiceLinkCreation($request, $link)
    {
        $title           = sanitize_text_field($request->get('title'));
        $slug            = sanitize_text_field($request->get('slug'));
        $choiceLinks     = wp_unslash($request->get('choice_pages'));
        $metaTitle       = sanitize_text_field($request->get('meta_title'));
        $metaDescription = wp_unslash(wp_kses_post($request->get('meta_description')));
        $disclosure      = wp_unslash(wp_kses_post($request->get('disclosure')));
        $featuredImage   = sanitize_url($request->get('featured_image'));
        $tags            = wp_unslash($request->get('tags'));
        $settings        = wp_unslash($request->get('settings'));
        $globalSettings  = get_option('exactlinks_settings');

        $data = [
            'type'             => 'choice_pages',
            'slug'             => $slug,
            'title'            => $title,
            'meta_title'       => $metaTitle,
            'meta_description' => $metaDescription,
            'disclosure'       => $disclosure,
            'tags'             => maybe_serialize($tags),
            'settings'         => maybe_serialize($settings),
            'featured_image'   => $featuredImage,
            'redirect_type'    => $globalSettings['redirection'] ? intval($globalSettings['redirection']) : 301,
            'created_at'       => gmdate('Y-m-d H:i:s'),
            'updated_at'       => gmdate('Y-m-d H:i:s'),
            'last_link_check'  => gmdate('Y-m-d H:i:s'),
            'author_id'        => get_current_user_id()
        ];

        $createdLinkId = $link->insertGetId($data);

        foreach ($choiceLinks as $linkIndex => $choiceLink) {
            $choiceLinkData = [
                'type'            => 'choice_links',
                'slug'            => sanitize_text_field($this->getSlugConfig()),
                'parent_id'       => intval($createdLinkId),
                'priority'        => $linkIndex + 1,
                'author_id'       => get_current_user_id(),
                'status'          => 'active',
                'target_url'      => sanitize_url($choiceLink['target_url']),
                'target_domain'   => $link->getDomainByUrl(sanitize_url($choiceLink['target_url'])),
                'button_text'     => sanitize_text_field($choiceLink['button_text']),
                'redirect_type'   => $globalSettings['redirection'] ? intval($globalSettings['redirection']) : 301,
                'created_at'      => gmdate('Y-m-d H:i:s'),
                'updated_at'      => gmdate('Y-m-d H:i:s'),
                'last_link_check' => gmdate('Y-m-d H:i:s'),
            ];

            $link->insert($choiceLinkData);
        }

        return $createdLinkId;
    }

    private function handleBoxContentLinkCreation($request, $link)
    {
        $targetUrl       = sanitize_url($request->get('target_url'));
        $slug            = sanitize_text_field($request->get('slug'));
        $globalSettings  = get_option('exactlinks_settings');
        $title           = sanitize_text_field($request->get('title'));
        $buttonText      = sanitize_text_field($request->get('button_text'));
        $badgeText       = sanitize_text_field($request->get('badge_text'));
        $price           = sanitize_text_field($request->get('price'));
        $metaDescription = wp_unslash(wp_kses_post($request->get('meta_description')));
        $disclosure      = wp_unslash(wp_kses_post($request->get('disclosure')));
        $settings        = wp_unslash($request->get('settings'));
        $tags            = wp_unslash($request->get('tags'));
        $featuredImage   = sanitize_url($request->get('featured_image'));

        $data = [
            'type'             => 'box_content',
            'slug'             => $slug,
            'target_url'       => $targetUrl,
            'title'            => $title,
            'button_text'      => $buttonText,
            'badge_text'       => $badgeText,
            'price'            => $price,
            'meta_description' => $metaDescription,
            'disclosure'       => $disclosure,
            'featured_image'   => $featuredImage,
            'settings'         => maybe_serialize($settings),
            'tags'             => maybe_serialize($tags),
            'target_domain'    => $link->getDomainByUrl($targetUrl),
            'redirect_type'    => $globalSettings['redirection'] ? intval($globalSettings['redirection']) : 301,
            'created_at'       => gmdate('Y-m-d H:i:s'),
            'updated_at'       => gmdate('Y-m-d H:i:s'),
            'last_link_check'  => gmdate('Y-m-d H:i:s'),
            'author_id'        => get_current_user_id(),
        ];

        return $link->insertGetId($data);
    }

    private function handleSimpleLinkCreation($request, $link)
    {
        $targetUrl       = sanitize_url($request->get('target_url'));
        $slug            = sanitize_text_field($request->get('slug'));
        $globalSettings  = get_option('exactlinks_settings');
        $title           = sanitize_text_field($request->get('title'));
        $metaDescription = wp_unslash(wp_kses_post($request->get('meta_description')));
        $tags            = wp_unslash($request->get('tags'));
        $featuredImage   = sanitize_url($request->get('featured_image'));
       
        $data = [
            'type'             => 'simple',
            'slug'             => $slug,
            'target_url'       => $targetUrl,
            'title'            => $title,
            'meta_description' => $metaDescription,
            'featured_image'   => $featuredImage,
            'tags'             => maybe_serialize($tags),
            'utm_template_id'  => intval($request->get('utm_template_id')),
            'utm_source'       => sanitize_text_field($request->get('utm_source')),
            'utm_medium'       => sanitize_text_field($request->get('utm_medium')),
            'utm_campaign'     => sanitize_text_field($request->get('utm_campaign')),
            'utm_term'         => sanitize_text_field($request->get('utm_term')),
            'utm_content'      => sanitize_text_field($request->get('utm_content')),
            'subdomain_id'     => intval($request->get('subdomain_id')),
            'subdomain_name'   => sanitize_text_field($request->get('subdomain_name')),
            'target_domain'    => $link->getDomainByUrl($targetUrl),
            'redirect_type'    => $globalSettings['redirection'] ? intval($globalSettings['redirection']) : 301,
            'created_at'       => gmdate('Y-m-d H:i:s'),
            'updated_at'       => gmdate('Y-m-d H:i:s'),
            'last_link_check'  => gmdate('Y-m-d H:i:s'),
            'author_id'        => get_current_user_id(),
        ];

        return $link->insertGetId($data);
    }
}

