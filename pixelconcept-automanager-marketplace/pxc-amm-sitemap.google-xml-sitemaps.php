<?php

/*
Registers a callback function to integrate into the Google XML Sitemaps Generator for WordPress by Arne Brachhold.
Developed using Version 4.1.0. See: http://www.arnebrachhold.de/redir/sitemap-home/
*/

function pxc_amm_sm_integrate_googlexmlsitemaps() {

	$generatorObject = &GoogleSitemapGenerator::GetInstance();
    if ($generatorObject!=null)  {

        $post = pxc_amm_sm_list_pages()[0];
        $targetpage_url = get_page_link($post);
        $urls = pxc_amm_sm_list_urls($targetpage_url, null);

        foreach ($urls as $url) {
            $generatorObject->AddUrl($url["location"], time(), "daily", 0.8);
        }
    }
}

add_action("sm_buildmap", "pxc_amm_sm_integrate_googlexmlsitemaps");