<?php

/*
Registers a filter which adds our custom url provider to the Yoast SEO Sitemap generation.
*/

add_filter('wpseo_sitemaps_providers', function($providers) {

    class PXC_AMM_WPSEO_Sitemap_Provider implements WPSEO_Sitemap_Provider {
        
        public function handles_type($type) {            
            return substr($type, 0, 8) == 'pxc-amm-';
        }
        
        public function get_index_links($max_entries) {
            $index = array();
            $posts = pxc_amm_sm_list_pages();

            foreach ($posts as $post) {

                $index[] = array(
                    'loc'     => WPSEO_Sitemaps_Router::get_base_url('pxc-amm-' . $post->post_type . '-' . $post->post_name . '-sitemap.xml' ),
                    'lastmod' => date(DATE_W3C, time())
                );
            }

            return $index;
        }

        public function get_sitemap_links($type, $max_entries, $current_page) {

            $links = array();
            $posts = pxc_amm_sm_list_pages();
           
            foreach ($posts as $post) {

                $pname = $post->post_name;
                $ptype = $post->post_type;

                if (substr($type, 8, strlen($ptype)) == $ptype
                 && substr($type, 8 + strlen($ptype) + 1, strlen($pname))  == $pname)
                {
                    $targetpage_url = get_page_link($post);
                    $urls = pxc_amm_sm_list_urls($targetpage_url, null);

                    $links[] = array(
                        'loc' => $targetpage_url,
                        'mod' => date(DATE_W3C, time()),
        
                        // Deprecated, kept for backwards data compat. R.
                        'chf' => 'daily',
                        'pri' => 1,
                    );

                    foreach ($urls as $url) {
                        
                        $link = array(
                            'loc' => $url["location"],
                            'mod' => date(DATE_W3C, time()),
                            'images' => array(),

                            // Deprecated, kept for backwards data compat. R.
                            'chf' => 'daily',
                            'pri' => 1,
                        );

                        foreach ($url["images"] as $image) {
                            $i = array(
                                'src' => $image['src'],
                                'title' => $image['title'] || $pname
                            );

                            $link['images'][] = $i;
                        }
                         

                        $links[] = $link;
                    }
                }
            }

            return $links;
        }
    }

    $providers[] = new PXC_AMM_WPSEO_Sitemap_Provider();
    return $providers;
});
