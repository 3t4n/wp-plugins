<?php

/*--------------------------------------------------------------*/
/*                   Plugin Setup Items           				*/                      
/*--------------------------------------------------------------*/


//---------------------Add Css----------------------

function casino_review_initial_script() {

	wp_enqueue_style('casino-review-css', CASINO_REVIEW_PLUGIN_PATH.'assets/css/style.min.css');	 
}
add_action('wp_enqueue_scripts', 'casino_review_initial_script',15);

//Add Columns to Casino Post Type

function casino_review_columns_add($columns){
	
  @$columns = array(
  
	 "cb" => "<input type=\"checkbox\" />",
	 
     "title" => __( 'Title' , 'casino-review'),
	 
     "Post_Id" =>__("Casino Post Id", 'casino-review'),
	 
	 "date" => __( 'Post Date' , 'casino-review'),
	 
  );
 
  return @$columns;
  
}

//Add Columns to Casino Post Type

function casino_review_edit_columns($column){
	
  global $post;

  switch ($column) {
	  
	  case 'Post_Id':
	  
		echo @$post->ID;
		
      break;

  }
}
add_action("manage_casino_review_posts_columns",  "casino_review_columns_add");
add_filter("manage_casino_review_posts_custom_column", "casino_review_edit_columns");
