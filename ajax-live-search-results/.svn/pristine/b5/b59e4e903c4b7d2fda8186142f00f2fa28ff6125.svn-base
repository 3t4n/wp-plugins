<?php function suggested_search_results(){
$options = get_option( 'toast_als_settings' );

    $the_query = new WP_Query( array( 
    'posts_per_page' => 8, 's' => esc_attr( $_POST['keyword'] ), 
    'post_type' => $options['toast_als_post_types']
    ) 
    );
    
    if( $the_query->have_posts() ) : ?>
       <?php while( $the_query->have_posts() ): $the_query->the_post(); ?>

           <div class="search-result" data-post-id ="<?php the_id(); ?>">
           <a href="<?php the_permalink(); ?>">
            <h4><?php the_title(); ?></h4>
           </a>
            </div>

        <?php endwhile; ?>
      <?php  wp_reset_postdata();  ?>
    <?php endif;
    die();
} ?>
<?php add_action('wp_ajax_suggested_search_results' , 'suggested_search_results');
add_action('wp_ajax_nopriv_suggested_search_results','suggested_search_results'); ?>
<?php function item_hovered(){ ?>
<?php global $post; ?>
<?php $post = $_POST['id'];  ?>
<?php setup_postdata( $post ); ?>

<div class="als-featured-thumbnail"><?php if(has_post_thumbnail()): ?><?php the_post_thumbnail('thumbnail'); ?><?php else: ?><div class="als-placeholder-image"></div><?php endif; ?></div>

<div class="als-featured-content">
<h3 class="als-featured-title"><?php the_title(); ?></h3>

<?php if(get_the_excerpt()): ?>
<?php $excerpt = get_the_excerpt(); ?>
<?php $excerpt = substr($excerpt, 0, -11).'...'; ?>
<?php endif; ?>

<div class="als-featured-excerpt"><?php echo $excerpt; ?></div>
<button href="<?php the_permalink(); ?>" class="button btn als-featured-button">Take me there</button>
</div>

<?php die(); ?>
<?php } ?>
<?php add_action('wp_ajax_nopriv_item_hovered' , 'item_hovered'); ?>
<?php add_action('wp_ajax_item_hovered' , 'item_hovered'); ?>
<?php function als_shortcode(){ ?>

<?php $options = get_option( 'toast_als_settings' ); ?>

<form class="als-search-area">
<input type="text" name="s" class="als-search" autocomplete="off" placeholder="Search..."></input>

   <div class="als-search-results">
    <div class="results-box"></div>
    <div class="als-featured-item"></div>
   </div>
   
<?php if(! empty($options['toast_als_post_types'])): ?>
<?php $post_types = $options['toast_als_post_types']; ?>
<input type="hidden" name="post_type" value="<?php foreach($post_types as $post_type){echo $post_type.',';} ?>"></input>
<?php endif; ?>

</form>
<?php }

add_shortcode('als_search', 'als_shortcode');