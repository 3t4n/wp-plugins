<?php if (!defined('FW')) die( 'Forbidden' ); 

$atts['title'] = trim($atts['title']);

if ( function_exists( 'fw_get_db_customizer_option') ) {
	$namaste_read_more_text = fw_get_db_customizer_option( 'read_more_text');
	if ( $namaste_read_more_text =='') {  $namaste_read_more_text = __( 'Read more', 'namaste-lite' ) ; }
}	
else {  $namaste_read_more_text = __( 'Read more', 'namaste-lite' ) ;}
		
$postmiracle = array(
	'posts_per_page' => 1,
	'name' => '' . sanitize_title($atts['title']) . ''
);

$postmiracle = new WP_Query( $postmiracle ); 
while ($postmiracle->have_posts()) : $postmiracle->the_post(); 

$permalink = get_permalink();
$title = get_the_title() ;
$author = get_the_author();
$namaste_excerpt = substr(get_the_excerpt(), 0,210);
$taglist = get_the_tag_list( '<span class="tag-list">', '</span><span class="tag-list"> ', '</span>') ;
$category_list = get_the_category_list( __( ', ', 'namaste-lite' ) );
$tag = get_the_tags(); 
?>
<div class="post-shortcode">
	<div class="entry-elements">
		<span class="category-list"><?php echo wp_kses_post($category_list); ?></span>                   
	</div>
	<h3 class="entry-title"><a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a></h3>
	<p class="entry-meta"><span class="post-author"><?php echo esc_html($author); ?></span></p>
	<?php if (has_post_thumbnail( $postmiracle->ID ) ){  
    $image = wp_get_attachment_url( get_post_thumbnail_id($postmiracle->ID), 'medium' ) ; ?> 
	<div class="small-thumb-holder">
        <div class="small-thumb-overlay">
            <a href="<?php echo esc_url($permalink); ?>">    
                <div class="small-thumb" style="background-image: url(<?php echo esc_url($image); ?>)"></div>
            </a>
        </div>
    </div>
	<?php } ?>     
	<div class="entry-content">
        <p class="post-excerpt"><?php echo wp_kses_post($namaste_excerpt); ?>... </p>        
        <div class="clearfix"></div>
        <div class="button post-2-button">
            <a class="btn" href="<?php echo esc_url($permalink); ?>" target="_blank"><span><?php echo esc_html($namaste_read_more_text); ?></span></a>
        </div>
        <div class="clearfix"></div>
		<?php if (! $tag) { } else { ?>
		<div class="home-tags"><?php echo wp_kses_post($taglist); ?></div>
		<?php } ?>
	</div>
</div>
<?php 							  
endwhile;
wp_reset_query(); ?>