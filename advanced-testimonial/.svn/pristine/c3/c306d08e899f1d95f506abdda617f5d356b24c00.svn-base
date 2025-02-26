<?php

add_shortcode( 'advanced_testimonial', 'wpdocs_footag_func' );
function wpdocs_footag_func( $attr, $content = null){

extract(
    shortcode_atts(array(

    'id'=>'',
    'loop'=> true,
    'arrows'=> true,
    'autoplay'=> true,
    'autoplayspeed'=> 1000,
    ),$attr)
);


ob_start();

$post_id = $id;
$bts_autoplay = $autoplay;
$bts_arrows = $arrows;
$bts_autoplayspeed = $autoplayspeed;

$slider_post =  get_post( $post_id, ARRAY_A );

if ( $slider_post ) :  

?>


    <div class="testimonial-area" id="best_<?php echo $slider_post['post_name'] . rand(1, 9999);?>"  data-slider_id="<?php echo $post_id;?>" data-autoplay="<?php echo $bts_autoplay;?>" data-arrows="<?php echo $bts_arrows;?>" data-autoplayspeed="<?php echo $bts_autoplayspeed;?>" >
          <div class="row">

             <div class="col-lg-6 order-2 order-lg-1">
                <div class="client-thumb-wrap">
                   <div id="client-img-slider" class="client-img-slider">



<?php

$entries = get_post_meta( $post_id, 'advanced_testimonial_slider_group', true );


foreach ( (array) $entries as $key => $entry ) {

    $client_img = $client_name = $client_deg = $client_review_date = '';


    if ( isset( $entry['client_img'] ) ) {
        $client_img =  $entry['client_img'] ;
    }
    if ( isset( $entry['client_name'] ) ) {
        $client_name = esc_html( $entry['client_name'] );
    }

    if ( isset( $entry['client_deg'] ) ) {
        $client_deg = esc_html( $entry['client_deg'] );
    }

    if ( isset( $entry['review_star_number'] ) ) {
        $review_star_number = esc_html( $entry['review_star_number'] );
    }

    if ( isset( $entry['client_review_date'] ) ) {
        $client_review_date = esc_html( $entry['client_review_date'] );
    }

            ?>


                    <div class="single-testi-item">
                       <div class="client-img">
                          <img src="<?php echo esc_url( $client_img ); ?>">
                       </div>
                       <div class="author-testi-details">
                          <h4><?php echo esc_html( $client_name ); ?></h4>
                          <h5><?php echo esc_html( $client_deg ); ?></h5>
                          <span><i class="fa fa-star"></i><?php echo esc_html( $review_star_number .' '. $client_review_date ); ?></span>
                       </div>
                    </div>

        <?php

}

?>


                 </div>
              </div>
           </div>

           <div class="col-lg-6 order-1 order-lg-2">
              <div class="testi-content-wrap mt-30 ml-10">
                 <div class="section-title">
                  <?php

                  $bts_subheading = get_post_meta( $post_id, 'bts_subheading', true );
                  $bts_heading = get_post_meta( $post_id, 'bts_heading', true );

                  ?>
                    <h3><?php echo esc_html( $bts_subheading ); ?></h3>
                    <h2><?php echo esc_html( $bts_heading ); ?></h2>
                 </div>

                 <div id="testi-content-slider" class="testi-content-slider">

<?php


foreach ( (array) $entries as $key => $entry ) {

    $slide_desc = '';

    if ( isset( $entry['slide_desc'] ) ) {
        $slide_desc = esc_html( $entry['slide_desc'] );
    }

            ?>

                    <div class="single-testi-content">
                       <?php echo esc_html( $slide_desc ); ?>
                    </div>

        <?php
}

?>

                     </div>
                  </div>
               </div>

            </div>
      </div>


<?php

 else:  ?>

    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php endif; ?>

    <?php
    return ob_get_clean();
}

