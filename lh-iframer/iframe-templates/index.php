<!DOCTYPE html>
<html itemscope="itemscope" itemtype="http://schema.org/WebPage" lang="en-AU"
 xmlns:og="http://ogp.me/ns#" class="no-js">
<head>
<title><?php wp_title_rss(); ?></title>
<style>
img {
    max-width: 100%;
    height: auto;
}
</style>
</head>
<body>
<?php while( have_posts()) : the_post(); ?>
<article>
<?php  the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	<div class="entry-content">
<?php the_content_feed(); ?>
</div>
</article>
<?php endwhile; ?>
</body>
</html>