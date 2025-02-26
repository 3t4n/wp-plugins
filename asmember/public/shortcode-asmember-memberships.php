<?php

class asmember_memberships_frontend
{

	public function __construct()
	{
		add_shortcode('asmember_memberships',array($this,'shortcode_asmember_memberships_listings'));
		add_shortcode('asmember_memberships_show_price',array($this,'shortcode_asmember_memberships_show_price'));
		
		add_filter( 'the_content', array($this,'asmember_filter_the_content') ); 
				
	}

	function shortcode_asmember_memberships_show_price($atts = '')
	{
		
		$attr_value = shortcode_atts( array(        
        'id' => 0,
    	), $atts );
		
		if($attr_value['id']>0)$membership_id=$attr_value['id'];else $membership_id=0;
		
		if($membership_id>0)
		{
			$membership=get_post($membership_id);
			
			ob_start();	
			
			if($membership->_asmember_memberships_betrag==0)
			{
				echo "<p><b>Betrag: kostenlos</b></p>\n";
			}else
			{
				if($membership->_asmember_memberships_angebot_betrag<$membership->_asmember_memberships_betrag and $membership->_asmember_memberships_angebot_bis>time())
				{
					echo "<p><b>Betrag: <span style=\"color:#ff0000\">".number_format($membership->_asmember_memberships_angebot_betrag, 2, ',', '.')."</span> <s>".number_format($membership->_asmember_memberships_betrag, 2, ',', '.')."</s> Euro incl. MwSt</b></p>";	
				}else
				echo "<p><b>Betrag: ".number_format($membership->_asmember_memberships_betrag, 2, ',', '.')." Euro incl. MwSt</b></p>";
			}
		
			
			return ob_get_clean();
		}
		
	}
	
	public function shortcode_asmember_memberships_listings()
	{
		//$options=get_option('asverein_options_downloads');
	
		//$posts_per_page=$options['asverein_options_downloads_count_entries_listings'];
		//$posts_per_page=9;
	
		//$obj = get_queried_object();
	
		//$paged = ( get_query_var('pagenum') ) ? get_query_var('pagenum') : 1;
		//if($_GET['pagenum'])$paged=$_GET['pagenum'];else $paged=1;
		
		//if($_GET['cat_id'])$cat_id=$_GET['cat_id'];
	
		//if($_POST['cat_id'])$cat_id = $_POST['cat_id'];
	
	
		//$term_slug = get_query_var( 'asverein_downloads_category' );
	
		/*
		if($cat_id>0)
		{	
			$args = array(
 			'post_type' => 'asverein_events',		
 			'posts_per_page' => $posts_per_page, 		
 			'paged' => $paged,
 			'tax_query' =>  array(
				array(
				'taxonomy' => 'asfirms_events_category',
				'field'    => 'id',
				'terms'    => $cat_id,
				'include_children' => true
			),
			
			),
			'order' => 'ASC',
  			'orderby' => 'meta_value',
  			'meta_key' => '_asverein_events_date'		
			);
		}else
		{
			
		}	
		*/
		$args = array(
 			'post_type' => 'asdownload_memberships',		
 			'posts_per_page' => 5000	
  			
			);
	
		$custom_query = new WP_Query($args); 	
					
		if ( $custom_query->have_posts() ) : 
		
			ob_start();		
			?>
			<div id="post-wrapper" class="asdownload-listings-container">

			<?php 		
			while ( $custom_query->have_posts() ) : $custom_query->the_post();?>
			<?php $post=get_post();?>
			<div class="asdownload-listings-item">	
						
				<?php the_title( sprintf( '<a href="%s" rel="bookmark" class="asdownload-listings-item-title">', esc_url( get_permalink() ) ), '</a>' ); ?>
					
				<div class="asverein-listings-item-info">					
					
					<span><?php the_excerpt();?></span>
					<span>Version: <?php echo $post->_asdownload_downloads_version;?></span>
						
				</div>
			</div>
			<?php endwhile; ?>

			</div>

			<?php
			//$baselink=asfirms_get_page_listings_link();
  	
  			/*
  			if( $numpages == '' ) {
    		//global $wp_query;
    	
			$numpages = $custom_query->max_num_pages;
    		if( ! $numpages ) {
        	$numpages = 1;
    		}
  			}
  	
  			$format='?pagenum=%#%';
  			
  			
  			$pagination_args = array(
    			'base'         => $baselink.'%_%',
    			//'base'         => $base,
    			'format'       => $format,
    			'total'        => $numpages,
    			'current'      => $paged
    			//'show_all'     => false,
    			//'end_size'     => 1,
    			//'mid_size'     => $pagerange,
    			//'prev_next'    => true,
    			//'prev_text'    => __( '&laquo;' ),
    			//'next_text'    => __( '&raquo;' ),
    			//'type'         => 'array',
    			//'add_args'     => false,
    			//'add_fragment' => ''
  			);

  			$paginate_links = paginate_links( $pagination_args );
  			
  			echo "<nav class=\"navigation paging-navigation\">\n";
  			echo $paginate_links;
  			echo "</nav>\n";
  			*/
  			?>
  			
			<?php //asfirms_pagination( $custom_query->max_num_pages, "", $paged);?>
			<?php				
			return ob_get_clean();
		endif;	
	
	}
	
	
	
	function asmember_filter_the_content( $content )
	{
 		if( is_singular('asmember_memberships') && in_the_loop() && is_main_query() )
 		{
    		global $post;		
			ob_start();	
			include ASMEMBER_PLUGIN_DIR . 'templates/single-asmember-memberships.php';							
			return ob_get_clean();        
    	} 
    
    
    	return $content;
	}



}

$asmember_memberships_frontend = new asmember_memberships_frontend();