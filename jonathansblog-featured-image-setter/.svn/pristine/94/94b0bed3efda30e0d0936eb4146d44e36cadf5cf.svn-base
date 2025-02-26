<?php

// -- how many without
// select count(ID) from wp_posts where post_type='post' and ID not in (select post_id from wp_postmeta where meta_key = '_thumbnail_id');

// -- how many with
// select count(post_id) from wp_postmeta where meta_key = '_thumbnail_id'

?>

<h1><?php esc_html_e( 'borncreative featured image setter.', 'borncreative-featured-image-setter'); ?></h1>
<p><a href="https://www.borncreative.co.uk">borncreative.co.uk</a>
<h2><?php esc_html_e('Posts Without Featured Image Set', 'borncreative-featured-image-setter'); ?></h2>
<?php
echo borncreative_featured_image_setter_count_all_posts_without_featured_image_set();
?>
<p><?php esc_html_e('To set an image for the above posts, please select an image and click Apply.', 'borncreative-featured-image-setter');?></p>
<?php
borncreative_featured_image_setter_show_media_library();
?>
<h2><?php esc_html_e('Posts With Featured Image Set', 'borncreative-featured-image-setter'); ?></h2>
<?php
echo borncreative_featured_image_setter_count_all_posts_with_featured_image_set();

