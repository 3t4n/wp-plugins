<?php

/**
*
*Recipe post grid {SHORTCODE}
*
*@package AwesomeRecipePlugin
*/

function arpcpt_awesome_recipe_creator_shortcode(){

if (  is_home() ||  is_front_page() ){}else{ // Check weather it is homepage or not

  // Getting row data

  global $wpdb;

    $arpcpt_styles = $wpdb->get_row(
                        "SELECT * FROM `". $wpdb->prefix ."arpcpt_awesome_recipe_styles`
                        ORDER BY id DESC LIMIT 1"
                        ); 

    // Storing data into an array

    foreach ($arpcpt_styles as $key => $arpcpt_style) {

    }

  $arpcpt_number_of_posts = $arpcpt_styles->arpcpt_recipe_card_number_of_posts;


 // Pagination with numbering
function arpcpt_pagination_bar( $custom_query ) {

    $total_pages = $custom_query->max_num_pages;

    $big = 999999999; // need an unlikely integer

    if ($total_pages > 1){

        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}

// arguments for query
 $args = array('posts_per_page' => $arpcpt_number_of_posts,'post_type' => 'arpcpt_recipe', 'meta_key' => 'arpcpt_awesome_recipe_instruction', 'paged' => get_query_var('paged') ? get_query_var('paged') : 1); 

ob_start();

 ?>


<!--  CONTAINER -->

<div class="arpcpt_recipe-container">
    
    <?php $loop = new WP_Query($args); ?>

        <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();?>
    
    <!-- SINGLE POST DISPLAYING -->
    <div class="arpcpt_recipe-single-post-item" style="border: 1px solid <?php echo esc_html( $arpcpt_styles->arpcpt_recipe_card_border_color ); ?>; height:<?php echo esc_html( $arpcpt_styles->arpcpt_recipe_card_height ); ?>px;">

                <div class="arpcpt_shortcode-post-thumbnail">
                            
                    <a href="<?php echo esc_url ( get_permalink() );?>">
                            
                           <?php 
                                if ( has_post_thumbnail() ) { // Check if the post has thumbnail
                
                           esc_html( the_post_thumbnail( 'medium' ) ); // Show the thumbnail
                           
                                }else {
                                    
                               echo '<img src="' . plugins_url( '/assets/img/picture.png', dirname(__FILE__) ) . '" > '; // Show default thumbnail
                                                    } 
                            ?>
                              
                    </a>
                            
                </div> 

                <div class="arpcpt_shortcode-post-excerpt" style="background:<?php echo esc_html( $arpcpt_styles->arpcpt_recipe_card_background_color ); ?>;">
                
                      <h4 style="color:<?php echo esc_html( $arpcpt_styles->arpcpt_recipe_card_title_color ); ?>; font-size: <?php echo esc_html( $arpcpt_styles->arpcpt_recipe_card_title_font_size ); ?>; text-transform: <?php echo esc_html( $arpcpt_styles->arpcpt_recipe_card_title_font_style ); ?>;"><?php echo esc_html( the_title() ); ?></h4>
                      
                      
                      <strong>By <?php esc_html( the_author() ); ?> | <?php echo esc_html(get_the_date() ); ?><br><br></strong>
                      
                
                      <p style="color:<?php echo esc_html( $arpcpt_styles->arpcpt_recipe_card_excerpt_text_color); ?>;"><?php echo wp_trim_words( esc_html( get_the_excerpt() ), 40, '...' ); ?></p>
                
                      <p class="arpcpt_awesome-recipe-read-more"><a style="color:<?php echo esc_html( $arpcpt_styles->arpcpt_read_more_link_color ); ?> !important;" href="<?php echo esc_url( get_permalink() ); ?>"> Read More</a></p>
                
                </div>

    </div>

<!-- END SINGLE POST DISPLAYING -->

                  <?php endwhile; ?>

                  <?php else: ?>
                            <h1>No posts found!</h1>
                  <?php endif; ?>

                  <?php wp_reset_postdata();  ?>

</div><!-- END Recipe Container -->

<!-- Display pagination in center -->


  <div class="arpcpt_pagination-custom">
    <?php arpcpt_pagination_bar( $loop ); ?>
  </div>


<!-- Styles for recipe post grid -->

<style>

.arpcpt_recipe-single-post-item{
   width:<?php echo esc_html( $arpcpt_styles->arpcpt_recipe_card_width ); ?>%;
}
@media screen and (max-width:768px){
.arpcpt_recipe-single-post-item{
   width:100%;
}
}
.arpcpt_pagination-custom {
    clear: both !important;
    width: 100% !important;
    text-align: center !important;
    padding-top: 40px !important;
}
.arpcpt_pagination-custom a{
     color: #fff !important;
}
.arpcpt_pagination-custom a:hover{
  
}
.arpcpt_pagination-custom a span{
     background:<?php echo esc_html( $arpcpt_styles->arpcpt_recipe_card_title_color ); ?> !important;
     padding: 10px !important;
}
.arpcpt_pagination-custom a.prev.page-numbers {
     background:<?php echo esc_html( $arpcpt_styles->arpcpt_recipe_card_title_color ); ?> !important;
    padding: 10px !important;
}
.arpcpt_pagination-custom a.prev.page-numbers:hover {
    opacity: 0.9 !important;
}
.arpcpt_pagination-custom  span.page-numbers.current {
    background: #484848 !important;
    padding: 10px !important;
    color: #fff;
}
.arpcpt_pagination-custom  span.page-numbers.dots {
    font-size: 16px !important;
    font-weight: 600 !important;
    color: <?php echo esc_html( $arpcpt_styles->arpcpt_recipe_card_title_color ); ?> !important;
}
.arpcpt_pagination-custom  a.page-numbers{
    background:<?php echo esc_html( $arpcpt_styles->arpcpt_recipe_card_title_color ); ?> !important;
    padding: 10px !important;
}
.arpcpt_pagination-custom  a.page-numbers:hover{
    opacity: 0.9 !important;
}

</style>

<!-- END CONTAINER -->

<?php

return ob_get_clean();

}// ENDS IF (Check weather it is homepage or not.)

}// ENDS Function