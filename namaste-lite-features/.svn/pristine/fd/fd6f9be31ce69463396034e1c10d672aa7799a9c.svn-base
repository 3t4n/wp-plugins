<?php if (!defined('FW')) die( 'Forbidden' );

$atts['column'] = trim($atts['column']);
if ( $atts['column'] != '1'  && $atts['column'] != '2' && $atts['column'] != '4' ) $atts['column'] = '3';
$lesscolumn = $atts['column'];
if ( $atts['column']==4 ) $lesscolumn = 3;

$atts['category'] = trim($atts['category']);

if ( function_exists( 'fw_get_db_customizer_option') ) {
	$namaste_read_more_text = fw_get_db_customizer_option( 'read_more_text');
	if ( $namaste_read_more_text =='') {  $namaste_read_more_text = __( 'Read more', 'namaste-lite' ) ; }
}	
else {  $namaste_read_more_text = __( 'Read more', 'namaste-lite' ) ;}

$random_carousel_1_number = rand(1000,9999);
?>
<div id="owl-news-namaste" class="owl-carousel carousel owl row owl-news-namaste-<?php echo esc_attr($random_carousel_1_number); ?> owl-pagination-<?php echo esc_attr($atts['pagination']); ?> owl-navigation-<?php echo esc_attr($atts['navigation']); ?>">
	<?php 
	$slider = array(
    'category_name' => '' . sanitize_title($atts['category']) . '',
    'order'    => 'DESC',
	'posts_per_page'	=>	1000,);
    $slider = new WP_Query( $slider ); 

    while ($slider->have_posts()) : $slider->the_post(); 
    
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
        <?php if (has_post_thumbnail( $slider->ID ) ){  
        $image = wp_get_attachment_url( get_post_thumbnail_id($slider->ID), 'medium' ) ; ?> 
        <div class="small-thumb-holder">
            <div class="small-thumb-overlay">
                <a href="<?php echo esc_url($permalink); ?>">    
                    <div class="small-thumb" style="background-image: url(<?php echo esc_url($image); ?>)"></div>
                </a>
            </div>
        </div>
        <?php } ?>
        <div class="entry-content">
            <p class="carousel-excerpt"><?php echo wp_kses_post($namaste_excerpt); ?>... </p>        
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
	<?php endwhile; ?>  
</div>
<script type="text/javascript"> 
	jQuery(document).ready(function($){
		$(document).ready(function() {
	
		  var owl = $(".owl-news-namaste-<?php echo esc_attr($random_carousel_1_number); ?>");
	
		  owl.owlCarousel({
			  
		  navigation : true, // Show next and prev buttons
		  navigationText : ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
		  pagination : true,
	 
		  items : <?php echo esc_attr($atts['column']); ?>, 
		  itemsDesktop : [5000,<?php echo esc_attr($atts['column']); ?>], 
		  itemsDesktop : [1170,<?php echo esc_attr($lesscolumn); ?>],
		  itemsDesktopSmall : [900,1], 
		  itemsTablet: [600,1], 
		  itemsMobile : [400,1],
		  <?php if ( $atts['delay'] != 'false' && $atts['delay'] != '') { ?> 			  
		  autoPlay : <?php echo esc_attr($atts['delay']); ?>000,
		  <?php } else { ?>
		  autoPlay : false,
		  <?php } ?>		
		  });
		});
	 });
</script>
<?php wp_reset_query(); ?>	