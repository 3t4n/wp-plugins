<?php 

//submiting rating with ajax //

function mith_arcl_ajax_rating_query (){
 global $current_user;
global $wpdb;
get_currentuserinfo();
   
$table_name  = $wpdb->prefix . "ratings";
 $user_id = $current_user->ID;
 $post_id = $_POST['dpost_id']; 
 $rating_value = $_POST['drating_value'];


$check_rating = $wpdb->get_row("SELECT * FROM $table_name WHERE user_id = $user_id AND post_id = $post_id "); 
if ($check_rating) 

{
	echo "<p class='bg-info msg'>".esc_attr(get_option('rated_text'))."</p>"; ?>
	<script>
	jQuery(function() {
  jQuery('#rat-<?php the_ID();?>').attr('data-readonly','true')
  jQuery('#rating_submit-<?php the_ID();?>').hide();
  
})
	</script>
<?php

}
else {
if ($rating_value==0)

{ 
 echo "<p class='bg-danger msg'>Please rate the post</p>";
}

else {
  $sql = $wpdb->insert( 
	$table_name, 
	array( 
		'user_id' => $user_id, 
		'post_id' => $post_id,
		'rating_value' => $rating_value
	), 
	array( 
		'%s', 
		'%s',
'%s'		
	) 
);
$successfully_rated = esc_attr(get_option('successfully_rated'));
if ($successfully_rated=="")
{
$successfully_rated = "Successfully Rated";
}

echo "<p class='bg-success msg'>".$successfully_rated."</p> ";
 }
wp_die();
} 
}


add_action( 'wp_ajax_mith_arcl_ajax_rating_query', 'mith_arcl_ajax_rating_query' );
add_action( 'wp_ajax_nopriv_mith_arcl_ajax_rating_query', 'mith_arcl_ajax_rating_query' );