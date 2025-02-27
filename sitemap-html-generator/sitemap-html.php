<h2 id="pages">
<?php
$pages_title = get_option( 'pages_title' );
$pages_text = esc_html( $pages_title );
if(empty($pages_text)){
echo 'Pages';
}
echo esc_html( $pages_text );
?>
</h2>
<ul>

<?php
wp_list_pages(
  array(
    'exclude' => '',
    'title_li' => '',
  )
);
?>
</ul>
<h2 id="posts">
<?php
$posts_title = get_option( 'posts_title' );
$posts_text = esc_html( $posts_title );
if(empty($posts_text)){
echo 'Posts';
}
echo esc_html( $posts_text );
?>
</h2>
<ul>
<?php

$categories = get_categories();
foreach ($categories as $cat) {
	$category_link = get_category_link($cat->cat_ID);
	echo '<li><h3> <a href="'.esc_url( $category_link ).'" title="'.esc_attr($cat->name).'">'.$cat->name.'</a></h3>';
	echo "<ul>";
  

  $args = array( 
            'posts_per_page' => -1,
            'cat ' => $cat->cat_ID
        );
        $posts = get_posts($args);
        if (!empty($posts) ) {
            foreach($posts as $post){
                $postID = $post->ID;
                $category = get_the_category($postID);
                if ($category[0]->cat_ID == $cat->cat_ID) {
                    echo '<li><a href="'.get_permalink($postID).'">'.get_the_title($postID).'</a></li>';
                }
            }}
  echo "</ul>";
  echo "</li>";
}
?>
</ul>
