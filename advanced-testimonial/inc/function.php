<?php

function best_testimonial_slider_post() {

	$labels = array(
		'name'               => _x( 'Advanced Testimonial', 'advanced-testimonial' ),
		'singular_name'      => _x( 'Advanced Testimonial', 'advanced-testimonial' ),
		'add_new'            => _x( 'Create New Slider', 'advanced-testimonial' ),
		'add_new_item'       => __( 'Create New Slider', 'advanced-testimonial' ),
		'edit_item'          => __( 'Edit Slider', 'advanced-testimonial' ),
		'all_items' 		 => __( 'View Sliders', 'advanced-testimonial' ),
		'view_item'          => __( 'View Slider', 'advanced-testimonial' ),
		'search_items'       => __( 'Search Sliders', 'advanced-testimonial' ),
		'not_found'          => __( 'No Sliders', 'advanced-testimonial' ),
		'not_found_in_trash' => __( 'No Sliders Found In Trash', 'advanced-testimonial' ),
		'menu_name' => 'Advanced Testimonial',
	);
	$args = array(
		'labels'        => $labels,
		'public'    => true,
		'supports'	=> array( 'title', ),
		'publicly_queryable' => true,
		'exclude_from_search' => true, // Check if this is legit
		'menu_icon' => 'dashicons-images-alt2',

	);
	register_post_type( 'slider', $args );

	}

	add_action( 'init', 'best_testimonial_slider_post' );


//========================================


function slider_function(){
	
	?>
 
<script type="text/javascript">


(function ($) {
"use strict";

$(document).ready(function(){

jQuery('.testimonial-area').each(function(){

	var slider_id = jQuery(this).attr('id');
	var arrows = jQuery(this).data('arrows');
	var autoplay = jQuery(this).data('autoplay');
	var autoplayspeed = jQuery(this).data('autoplayspeed');

    if (arrows == 1) {
      var arrows = true;
    } else {
      var arrows = false;
    }



            $('#' + slider_id + ' .client-img-slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: autoplay,
                autoplaySpeed: autoplayspeed,
                arrows: false,
                prevArrow: '<button class="testi-prev"><i class="flaticon-left-arrow"></i></button>',
                nextArrow: '<button class="testi-next"><i class="flaticon-right-arrow"></i></button>',
                vertical: true,
                verticalSwiping: true,
                centerMode: true,
                centerPadding: '100px',
                dots: false,
                asNavFor: '.testi-content-slider',
                focusOnSelect: true,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 1,
                            arrows: false,
                            vertical: false,
                            verticalSwiping: false,
                        }
                },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            arrows: false,
                            vertical: false,
                            verticalSwiping: false,
                        }
                }

                ]


            });

            $('#' + slider_id + ' .testi-content-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay:autoplay,
                arrows: arrows,
                autoplaySpeed: autoplayspeed,
                prevArrow: '<button class="testi-prev"><i class="flaticon-left-arrow"></i></button>',
                nextArrow: '<button class="testi-next"><i class="flaticon-right-arrow"></i></button>',
                dots: false,
                asNavFor: '.client-img-slider',

                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            arrows: false,

                        }
                }


                ]

            });
            
    });
    });

})(jQuery);

</script> 

	<?php

}

add_action('wp_footer', 'slider_function', 100);


