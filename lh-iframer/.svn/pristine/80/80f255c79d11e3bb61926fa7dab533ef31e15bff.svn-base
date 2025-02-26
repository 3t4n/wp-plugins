<!DOCTYPE html>
<html itemscope="itemscope" itemtype="http://schema.org/WebPage" lang="en-AU"
 xmlns:og="http://ogp.me/ns#" class="no-js">
<head>
<title><?php wp_title_rss(); ?></title>
<?php rel_canonical(); ?>
<style>
img {
    max-width: 100%;
    height: auto;
}

.jp-relatedposts {
display: none;
}
</style>
</head>
<body>
<?php while( have_posts()) : the_post(); ?>
<article>
<?php  the_title( '<h1 class="entry-title">', '</h1>' ); ?>
<div class="entry-content">
<?php the_content_feed(); ?>
</div>
</article>
<?php endwhile; ?>
</body>
</html>