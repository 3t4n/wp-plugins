<?php
// ###############################
// DISABLE RSS Feeds 
// <link rel="alternate" type="application/rss+xml" title="Feed" href="feed" />
// <link rel="alternate" type="application/rss+xml" title="RSS de los comentarios" href="/comments/feed" />
//###############################
// Añadimos redireccion a si misma
// Eliminamos la META
// Disable global RSS, RDF & Atom feeds.
add_action( 'do_feed','fun_pymseo_redirect_301', -1 );
add_action( 'do_feed_rdf','fun_pymseo_redirect_301', -1 );
add_action( 'do_feed_rss','fun_pymseo_redirect_301', -1 );
add_action( 'do_feed_rss2','fun_pymseo_redirect_301', -1 );
add_action( 'do_feed_atom','fun_pymseo_redirect_301', -1 );
// Disable comment feeds.
add_action( 'do_feed_rss2_comments','fun_pymseo_redirect_301', -1 );
add_action( 'do_feed_atom_comments','fun_pymseo_redirect_301', -1 );
// Prevent feed links from being inserted in the <head> of the page.
add_action( 'feed_links_show_posts_feed','__return_false', -1 );
add_action( 'feed_links_show_comments_feed','__return_false', -1 );
remove_action( 'wp_head','feed_links', 2 );
remove_action( 'wp_head','feed_links_extra', 3 );
// Añadimos el bloqueo de las rss al .HTACCESS
array_push($pymlineashtaccessBlock,'# BEGIN - BLOCK -> Feed and redirect' );
array_push($pymlineashtaccessBlock,'RewriteRule ^(.*/)?feed(/rss|/rss2|/atom|/rdf)?/?$ /$1 [R=301,NC,L]' );
array_push($pymlineashtaccessBlock,'RewriteCond %{QUERY_STRING} (?|&)feed=' );
array_push($pymlineashtaccessBlock,'RewriteRule (.*) $1/? [R=301,NC,L]' );
array_push($pymlineashtaccessBlock,'# END - BLOCK -> Feed and redirect' );

?>