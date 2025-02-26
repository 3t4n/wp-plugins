<?php 
/*
Plugin Name: Automatic Sitemap
Plugin URI: https://wphelpbd.com/plugins/automatic-sitemap
Description: This plugin allow your wordpress to automatically create and update xml-sitemap in your blog.
Just install it to your wordpress installation and enjoy.
Version: 1.0
Author: Ft Farhad
Author URI: http://facebook.com/ftfarhad1

*/


/* Coding start */
function ft_create_sitemap() {
  $postsForSitemap = get_posts(array(
    'numberposts' => -1,
    'orderby' => 'modified',
    'post_type'  => array('post','page'),
    'order'    => 'DESC'
  ));

  $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
  $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

  foreach($postsForSitemap as $post) {
    setup_postdata($post);

    $postdate = explode(" ", $post->post_modified);

    $sitemap .= '<url>'.
      '<loc>'. get_permalink($post->ID) .'</loc>'.
      '<lastmod>'. $postdate[0] .'</lastmod>'.
      '<changefreq>monthly</changefreq>'.
    '</url>';
  }

  $sitemap .= '</urlset>';

  $fp = fopen(ABSPATH . "sitemap.xml", 'w');
  fwrite($fp, $sitemap);
  fclose($fp);
}
add_action("publish_post", "ft_create_sitemap");
add_action("publish_page", "ft_create_sitemap");
/* Ok that's all */
?>