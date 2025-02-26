<?php
require('../../../wp-config.php');

$pages = get_pages('sort_column=menu_order');
$total_pages = count($pages);

echo '
	var tinyMCELinkList = new Array( 
';

function get_page_level ($page) {	
	if ($page->post_parent == 0)
		return 0;
	else {
		$i = 0;
		$parent = get_post($page->post_parent); // Get initial page's parent
		$loop = 1;
		while ($i < 10) {
			$i++;
			if ($parent->post_parent == 0) // If this post parent is a root, then end the loop
				return $i;
			else // Otherwise, get the parent to the parent and try again
				$parent = get_post($parent->post_parent);
		}
	}
}

foreach ($pages as $post) {
	setup_postdata($post);
	$i++;
	echo '["';
	echo str_repeat('--', get_page_level($post));
	the_title();
	echo '", "';
	the_permalink();
	echo '"]';
	if ($i != $total_pages)
		echo ', ';
}

echo '
	);
';
?>