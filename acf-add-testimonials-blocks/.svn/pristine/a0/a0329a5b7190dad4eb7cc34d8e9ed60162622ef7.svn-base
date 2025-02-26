<?php
/**
 * Template for Testimonial Slider block.
 *
 * Renders both in editor and frontend.
 *
 */

// Create class attribute allowing for custom "CustomNew" values.
$CustomNew = ( ! empty( $block['CustomNew'] ) ) ? sprintf( 'testimonial %s', $block['CustomNew'] ) : 'add_testimonials';
?>

<div class="slider-testimonial">
  <div class="container">
    <div class="slider_animation">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    	<div class="carousel-inner">
           <?php 
     		$i = 0;
     		while( have_rows('testimonial') ): the_row();
       		$image = wp_get_attachment_image_src(get_sub_field('client_image'), 'full'); ?>
        	<div class="carousel-item <?php if ($i==0) { echo 'active';} ?>">
      			<div class="client_name"><p><?php the_sub_field('client');?></p></div>    
            <div class="client_image"><img src="<?php the_sub_field('client_image'); ?>" alt="" /></div>
            <div class="client_role"><p><?php the_sub_field('client_role');?></p></div>
            <div class="client_review"><p><?php the_sub_field('client_review');?></p></div>
        	</div>
    		<?php 
    		$i++;
    		//endif;
    		endwhile; ?> 
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
    </div>
  </div>
</div>
<!-- <script type="text/javascript">
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
    document.getElementById('moar').onclick = function() {
      var section = document.createElement('section');
      section.className = 'section--purple wow fadeInDown';
      this.parentNode.insertBefore(section, this);
    };
  </script> -->
<?php
