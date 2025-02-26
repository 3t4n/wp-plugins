<?php

/**
 * Provide a public-facing view for the plugin
 *

<!-- This file should primarily consist of ShortCode of Testimonial . -->
*/

class ALPRT_CLASS_Shortcodetestimonial extends ALPRT_testimonials_Public {
  
    function __construct() {

        $this->alprt_make_shortcode();
    }

    function alprt_shortcode_scripts(){
         $this->alprt_image_size();
    	 $this->alprt_enqueue_styles();
    	$this->alprt_enqueue_scripts();
    }


    /**
	 * This function is provided for Testimonials Shortcode .
	 */

    function alprt_func_testimonial_display($atts, $content = null) {

		extract(shortcode_atts(array(
			    'total' => '1',
				'order' => 'DESC',
				'category' => '',
				'pagestyle' => '',
				'backgroundcolor' => '#f5f5f6',
				'backgroundimage' => '',
				'bordercolor' => '#e1e1e4',
				'color' => '#a5a5a5'			

		), $atts));
		  $this->alprt_shortcode_scripts();
		   if(isset($atts['total'])){
		    	$limit=$atts['total'];
		   }else{$limit=1;}
		   if(isset($atts['category'])){
		    	  $category=$atts['category'];
		   }else{$category='';}
		   if(isset($atts['order'])){
		    	  $order=$atts['order'];
		   }else{$order='DESC';}

        $wp_posts=$this->alprt_get_testi_data($limit,$category,$order);
	
				?>
                <main id="main">
	       <?php
	           if(isset($atts['pagestyle'])){
		    	  $wp_option=$atts['pagestyle'];
		        }else{$wp_option='style1';}
	          
		        if(isset($atts['backgroundcolor'])){
		    	  $backgroundcolor=$atts['backgroundcolor'];
		        }else{$backgroundcolor='#f5f5f6';}

		        if(isset($atts['color'])){
		    	  $color=$atts['color'];
		        }else{$color='#a5a5a5';}

		        if(isset($atts['bordercolor'])){
		    	  $bordercolor=$atts['bordercolor'];
		        }else{$bordercolor='#e1e1e4';}

		        if(isset($atts['backgroundimage'])){
		    	  $backgroundimage=$atts['backgroundimage'];
		        }else{$backgroundimage='';}

	           $this->alprt_testimonial_css($backgroundcolor , $color , $bordercolor,$backgroundimage);

	           if($wp_option=='style1')
	           {
                    $alprt_html=$this->alprt_testimonial_style1($wp_posts);
                    
	           }
	            if($wp_option=='style2')
	           {
	           		 $alprt_html=$this->alprt_testimonial_style2($wp_posts);
                    

	           }
	            if($wp_option=='style3')
	           {
	           		 $alprt_html=$this->alprt_testimonial_style3($wp_posts);
                     
	           }
	            if($wp_option=='style4')
	           {
	           		 $alprt_html=$this->alprt_testimonial_style4($wp_posts);
                     
	           }
	            if($wp_option=='style5')
	           {
	           		 $alprt_html=$this->alprt_testimonial_style5($wp_posts);                

	           }
	            if($wp_option=='style6')
	           {
	           		 $alprt_html=$this->alprt_testimonial_style6($wp_posts);
                     
	           }
	           echo $alprt_html;
	        ?> 
	        </main>  
			<?php	wp_reset_postdata();
    }
    /**
	 * This function is provided for Testimonials Posts Data .
	 */
    function alprt_get_testi_data($limit,$category,$order)
    {
    	if( $category!='' ||  $category!='null' || $category!=0){
	
			$term = $category;
			
	  $args = array( 
						'post_type' 		=> 'alprt_testimonial',
						'posts_per_page' 	=> !empty($limit) ? $limit:'-1',
						'tax_query' => array(
							array(
								'taxonomy' => 'alprt-testicat',
								'terms' => $term,
								'field' => 'term_id',
							)
						), 
						'post_status'       => 'publish',
						'orderby' 			=> 'date',
						'order' 			=> !empty($order) ? $order:'ASC',
					);
					
				}else{
				
					$args = array( 
						'post_type' 		=> 'alprt_testimonial',
						'post_status'       => 'publish',
						'posts_per_page' 	=> !empty($limit) ? $limit:'1',
						'orderby'		 	=> 'date',
						'order' 			=>!empty($order) ? $order:'DESC',
					);
				
				}
				
				$wp_query=new WP_Query($args);
				$wp_posts= $wp_query->posts;
				return $wp_posts;
    }
    function alprt_make_shortcode() {
        add_shortcode('alpharage-testimonial', array($this,'alprt_func_testimonial_display'));
    }
}
new ALPRT_CLASS_Shortcodetestimonial;
?>