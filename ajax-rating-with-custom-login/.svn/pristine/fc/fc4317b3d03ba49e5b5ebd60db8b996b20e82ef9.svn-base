<?php
//create rating shortcode//
function mith_arcl_rating_shortcode ( $atts , $content = null ){
	extract( shortcode_atts(
		array(
			'count' => '5',
			'type' => 'star',
			'color' => '#fde16d',
		), $atts )
	);
	
	
	
	
	global $current_user;
	global $wpdb;
	get_currentuserinfo();
   
$table_name  = $wpdb->prefix . "ratings";
 $user_id = $current_user->ID;
 $post_id = get_the_ID(); 
 
 ?>
   

 <script>
jQuery(document).ready(function(){
jQuery("#rating_submit-<?php the_ID();?>").click(function(){
var rating_value = jQuery("#rat-<?php the_ID();?>").val();
var post_id = <?php the_ID();?>;
jQuery.ajax({
type: 'POST',   // Adding Post method
url: MyAjax.ajaxurl, // Including ajax file
data: {"action": "mith_arcl_ajax_rating_query", "drating_value":rating_value, "dpost_id":post_id,}, // Sending data dname to post_word_count function.
success: function(data){ // Show returned data using the function.
//alert(data);
jQuery('.res-<?php echo get_the_ID();?>').html(data);
//	if(jQuery('#rat-<?php the_ID();?>').val())
	if(rating_value!=0)
			{
				//alert(rating_value);
			jQuery('#rating_submit-<?php echo get_the_ID();?>').hide();
			}
}
});
});



jQuery( document ).ajaxComplete( function( event, request, settings ) {
	var settinga =	settings.data;
	if (settinga.indexOf('action=my_ajax_function') > -1)
	{
		
	// testing
		
	};
 	});
});
</script>

<?php
 //$rating_value = $_POST['drating_value'];
 $check_rating = $wpdb->get_row("SELECT * FROM $table_name WHERE user_id = $user_id AND post_id = $post_id "); 

if ($check_rating) 

{
	
$rated_text = esc_attr(get_option('rated_text'));
if ($rated_text=="")
{
$rated_text = "You have already rated this post";
}

	echo "<p class='bg-info msg'>".$rated_text."</p>"; ?>
	<script>
	jQuery(function() {
  jQuery('#rat-<?php the_ID();?>').attr('data-readonly','true')
  jQuery('#rating_submit-<?php the_ID();?>').hide();
  
})
	</script>
<?php

}
  
 $table_name  = $wpdb->prefix . "ratings";
  $get_rating_count = $wpdb->get_row("SELECT SUM(rating_value) as rat FROM $table_name WHERE post_id = $post_id");
  
 $grc = $get_rating_count->rat;
  
  $get_rating_count1 = $wpdb->get_row("SELECT  COUNT(*) as ratcount FROM $table_name WHERE post_id = $post_id");
  
 $grc1 = $get_rating_count1->ratcount;
  
  if ( $grc1) {
 $avgrat =  $grc /  $grc1;
  $avgrat = number_format($avgrat, 1);
   }
else {
	
	$avgrat = 0;
}   
   
   

 ?>
 
 <form action="#" method="POST">
 <?php
 if ($type == 'thumb'){
	$type = '&#xf164;';
	}
	
	if ($type == 'coffee'){
		$type = '&#xf0f4;';
	}
	
	if ($type == 'star'){
		$type = '&#xf005;';
	}
	
	if ($type == 'heart'){
		$type = '&#xf004;';
	}
	
 ?>
<input  id="rat-<?php the_ID();?>" class="rating" data-min="0" data-max="<?php echo $count;?>" data-stars="<?php echo $count;?>" step="0.5" data-size="sm"
 data-symbol="<?php echo $type;?>" data-show-clear="false" data-glyphicon="false" data-rating-class="rating-fa" value="<?php echo $avgrat;?>" name="rating-<?php the_ID();?>">
 
 <style>
 
 .rating-container .rating-stars {color:<?php echo $color;?>!important}
 
 </style>

 <div class="res-<?php echo get_the_ID();?>"></div>
 

 
 </form>
 <?php if ( is_user_logged_in() ) { 
 $submittext = esc_attr(get_option('submittext'));
if ($submittext=="")
{
$submittext = "Submit";
}

 
 ?>

  <input type="button" value="<?php echo $submittext;?>" id="rating_submit-<?php the_ID();?>" />
 
<?php
 } 
 else { ?>
	 <div class="nologin"><p class="bg-info msg">Please  <a data-toggle="modal" data-target=".bs-req-lg" class="main_pop" href="#" 
   data-keyboard="false">login </a> to give rating</p></div>
   

	 
<?php }

}

add_shortcode('AJAXRATING','mith_arcl_rating_shortcode');