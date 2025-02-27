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
          <article class="tcode-col-md-12 ">
                 <?php if ( has_post_thumbnail()) : ?>

                        <?php  the_post_thumbnail( 'wbdemo-featured', array( 'class' => 'wb-thumbnail' )); ?>

                 <?php endif;
            		// Start the loop.
            		while ( have_posts() ) : the_post();

            			// Include the page content template.

                  ?>
          </article>
  <?php
            // End the loop.
    		endwhile;
    ?>

<article class="tcode-col-md-12  sproduct-description">
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


  </div> <!-- row -->

 </div>  <!-- container -->
  </section>

<?php  get_footer(); ?>
