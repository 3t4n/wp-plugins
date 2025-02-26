<?php
/*
Plugin Name: post gallery
Plugin URI: http://www.zeevm.co.il
Description: Creates a nice post gallery/post archive, uses a choosen category to show a grid list of posts with image, read more and the excerpt.
Version: 0.4
Author URI: ze'ev ma'ayan
Author URI: http://www.zeevm.co.il

/*  TM zeev.co.il */
add_action('init', 'process_post');
//limit number of words in the text under the img
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}
//create shortcode things
function process_post(){ 
function button_shortcode( $atts, $content = null ) {
ob_start(); // begin output buffering
   extract( shortcode_atts( array(
      'cat' => 'cat',
	  'onpage' => 'onpage',
	  'words' => 'words'
      ), $atts ) );?>
	  <ul class="zeevul">
<?php query_posts( array ( 'cat' => $cat, 'posts_per_page' => $onpage));
if (have_posts()) : while (have_posts()) : the_post();
  // do whatever you want
?>
<li>
					<h2 href="<?php the_permalink(); ?>"><?php the_title(); ?></h2>
					<?php
                if(has_post_thumbnail()) { ?>
                    <div class="entry-thumbnail">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                    </div>
            <?php } else { ?>
                <div class="entry-thumbnail">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo plugins_url(); ?>/post-gallery-and-archive/default-img.png" alt="Image Unavailable" /></a>
                </div>
            <?php } ?>

<p><?php echo excerpt($words); ?></p>
<a href="<?php the_permalink(); ?>">Read More >></a>
	</li>
<?php
endwhile;
wp_reset_query();
?><?php endif;
// style it up
 ?>
</ul>
<style>
ul.zeevul {
width:100%;
}
ul.zeevul li {
list-style:none!important;
display:inline-block;
vertical-align: bottom;
width:27%;
margin-left:2%;
margin-top:50px;
}
ul.zeevul li img{
width:100%;
height:170px;
opacity: 1;
transition: opacity .25s ease-in-out;
-moz-transition: opacity .25s ease-in-out;
-webkit-transition: opacity .25s ease-in-out;
}
ul.zeevul li img:hover{
opacity:0.6;
filter:alpha(opacity=60);
}
@media screen and (max-width: 1024px){
ul.zeevul li {
width:100%;
margin-left:0;
margin-top:5px;
}
}
</style>
<?php
 $output = ob_get_contents(); // end output buffering
    ob_end_clean(); // grab the buffer contents and empty the buffer
    return $output;
} 
Function archive()  { return sheker();}
add_shortcode('post-gallery', 'button_shortcode');
}?>