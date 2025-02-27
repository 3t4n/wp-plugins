<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package wbdemo
 */
 get_header();
 $show_meta=tcp_option('show-meta','tc_single_page_style','yes');
 $show_related_items=tcp_option('show-related-portfolio','tc_single_page_style','yes');

 $related_items_sd=tcp_option('related-items-sd','tc_single_page_style','yes');
 $related_items_sd_words=tcp_option('related-items-sd-words','tc_single_page_style', '20' );
 $rcolumn=tcp_option('tcp-rcolumn','tc_single_page_style', 'tcpcol_three' );
 $pl_target=tcp_option('pl-target','tc_portfolio_basics', '_blank' );
 $hide_eyeicons=tcp_option('hide-eyeicons','tc_portfolio_basics', 'no' );


  ?>

<section class="tcp-hero-section">

      <div class="tcode-container">

              <div id="tcode-row" class="tcode-row">
<article class="tcode-col-lg-5 tcode-col-md-5 thumb-size">
       <?php if ( has_post_thumbnail()) : ?>

              <?php  the_post_thumbnail( 'wbdemo-featured', array( 'class' => 'wb-thumbnail' )); ?>

       <?php endif;
  		// Start the loop.
  		while ( have_posts() ) : the_post();

  			// Include the page content template.

        ?>
</article>

<article class="tcp-stext-block tcode-col-lg-6 tcode-col-md-6">
  <h1 class="tcp-single-title"><?php the_title(); ?></h1>

  <?php if($show_meta=='yes'){?>
<div class="tcpc-pcat">
  <?php
  $terms = get_the_terms( $post->ID, 'tcportfolio_category' );
          if ( $terms && ! is_wp_error( $terms ) ) :
              $links = array();
              foreach ( $terms as $term ) {
                  $links[] = $term->name;
              }
              $tax_links = join( ", ", str_replace(' ', '-', $links));
            echo  $tax ='<span class="tcpc-cat-icon"> <i class="fa fa-tags" aria-hidden="true"></i> </span> <span class="tcpc-cat">'.strtolower($tax_links).'</span>';
            //$tax;
          else :
        $tax = '';
      endif;
// end add terms
    ?>
  </div>
<?php }?>

    <div class="tcp-content">
      <?php the_content(); ?>
    </div>

</article>

<?php
          // End the loop.
  		endwhile;
  		?>


   </div> <!-- row -->

  </div>  <!-- container -->

</section>

<div style="clear:both"></div>

<?php if($show_related_items=='yes'){?>

<section class="tcp-related-sec">

  <div class="container">


<div id="row" class="row">
  <div class="tcp-single-title-box">
  <h1 class="tcp-single-title"> Related portfolio Items </h1>
  </div>
<?php

$pop_style='one';
$tcp_cats =wp_get_post_terms($post->ID, 'tcportfolio_category', array("fields" => "names"));
$args = array(
    'orderby' => 'date',
     'order' => $order,
      'tcportfolio_category' =>$tcp_cats,
      'showposts' =>10,
      'post_type' => 'tcportfolio'
);


$tc_loop= new WP_Query( $args );
 global $post;
 $tc_view='';
 $tc_view.='<div class="tcportfolio_single_container tcportfolio-container">';
  if ($tc_loop->have_posts()) :
    while ($tc_loop->have_posts()) : $tc_loop->the_post();  // wb portfolio start

    if ( has_post_thumbnail() ) {  // check if the post has a Post Thumbnail assigned to it.
        $tc_view.='<div class="tcportfolio_related_items ' . $rcolumn .'">';

                $tc_view.='<img class="tcp_single_cover" src="'.get_the_post_thumbnail_url('','full').'" alt="" />';
                //$tc_view.='</div>'; // tc_flipper
                $tc_view.='<div class="tc_overlay">';
                     $tc_view.='<h3 class="tcp-title"><a target="'.$pl_target.'" class="tcp-link" href="'.get_the_permalink().'" > '.get_the_title().' </a> </h3>';
                         if($related_items_sd=='yes'){
                         $tc_view.='<p class="tcp-short-des">'.themescode_limit_text(get_the_excerpt(), $related_items_sd_words).'</p>';
                          }
                     $tc_view.='<div class="tcp_links">';
                     $tc_view.='<a target="'.$pl_target.'" class="tcpc-link tcp-ext" href="'.get_the_permalink().'"><i class="fa fa-external-link" aria-hidden="true"></i></a>';
                     //$tc_view.='<a class="tcpc-link tcp-view" href="'.get_the_permalink().'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                      if($hide_eyeicons=='no'){
                     $tc_view.='<a class="tcpc-link tcp-view tcpc_pop open-popup-link" href="#tcpc_pop_'.get_the_id().'" data-effect="mfp-zoom-in"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                        }
                     $tc_view.='</div>'; // tc_overlay
                $tc_view.='</div>'; // tc_overlay
                  ?>
                <div id="tcpc_pop_<?php echo get_the_id(); ?>" class="tc-owl-white-popup mfp-hide mfp-with-anim">

                  <?php if($pop_style=='one'){ ?>
                    <div class="tc_owlpop_left_block">
                          <?php
                              $tc_owl_thumbnail_popup = get_the_post_thumbnail(get_the_ID(), 'full', array( 'class' =>'tc-owlpop-wps-img' ));
                             echo  $tc_owl_thumbnail_popup;
                           ?>
                      </div>  <!-- tc_owlpop_left_block  -->
                      <div class="tc_owlpop_right_block">
                        <!-- Carousel Tile -->
                            <h2 class="tc_qv_product_title"><?php echo get_the_title();?></h2>
                        <p><?php echo get_the_content(); ?> </p>

                        </div>

                        <?php } ?>

                        <?php if($pop_style=='two'){ ?>

                          <div class="tc_owlpop_two">
                                <?php
                                    $tcpc_thumbnail_popup = get_the_post_thumbnail(get_the_ID(), 'full', array( 'class' =>'tc-owlpop-wps-img' ));
                                    echo  $tcpc_thumbnail_popup;
                                 ?>
                          </div>  <!-- tc_owlpop_left_block  -->

                       <?php } ?>

                </div>
                <?php

        //$tc_view.='</div>'; // tc_flipper
      }
    $tc_view.='</div>'; // tcportfolio_items
  endwhile; //
  endif;
$tc_view.='</div>';
wp_reset_query();
echo  $tc_view;
?>
</div>
</div>
</section>
<div style="clear:both"></div>
<?php } ?>
<?php  get_footer(); ?>
