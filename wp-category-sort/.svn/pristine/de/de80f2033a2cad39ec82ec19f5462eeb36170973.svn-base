<?php // WP Category Sort - Category Sort Interface Page



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}



// display the all the categories
function wpCatSort_interface_page() { 

	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;
	
?>
	
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	</div>
	<div id="ajax-response"></div>
	<form action="edit.php" method="post">
		 <div id="wpCatSort_cont">
              <div id="post-body">                    
                        
                    <ul class="wpCatSortable" id="">
                                <?php //Get all the terms of category taxomony

										$args = array(
											'hide_empty' => 0,
											'show_count' => 1,
											'title_li' =>'',
											'walker' => new wpCatSort_Walker
										);

										wp_list_categories( $args );
                                ?>
                    </ul>
                            
                    <div class="clear"></div>
               </div>
                    
                <div class="alignleft actions">
                    <p class="submit">
                         <a href="javascript:;" class="wpCatSort_update-order button-primary"><?php _e( "Update", 'taxonomy-terms-order' ) ?></a>
                    </p>
                </div>
                    
         </div> 
    </form>    
<?php }