<?php



/**********************



 This is the default template for AJAXLOGIN.



 Please do make a copy and put in your theme directory.



 Elements which always must exist:

  - The forms al_registerForm, al_loginForm and al_lostPassword

  - The message spans al_registerMessage, al_loginMessage and al_lostPasswordMessage



 Elements that must exist for the al_show****()-functions to work (recommended!)

  - al_loading

  - al_login

  - al_register

  - al_lostPassword



 Just follow the format of the original al_template.php and you should be safe.



 I know that the original does not conform to XHTML validation because of the <style>-tag. Just copy the styles you are using to your own CSS and you'll validate just fine.



 The surrounding <li> are only there for widget compability.

 ***********************/

?>

<?php


global $wpdb;

$query=" SELECT *

FROM `".$wpdb->prefix."latest_post_carousel` where id=1";

$result=mysql_query($query);



while($row=@mysql_fetch_array($result))

{

	$d_type=$row['display_type'];

	$height=$row['height'];

	$width=$row['width'];

	$time=$row['time'];

	//$width=250;

}

include("carousel_css.php");

?>





<form action="#" method="post">

<input type="hidden" name='h' id="hiddens" value="<? echo $width; ?>">

<input type="hidden" name='t' id="times" value="<? echo $time; ?>">

</form>

<script type="text/javascript" src="<?php echo bloginfo( 'wpurl' ).'/wp-content/plugins/latest-post-carousel/mootools.js'; ?>">



</script>

<script type="text/javascript">

window.addEvent('domready', function() { 



	// Let's define some variables first

	var wrapper = $('wrap'); // The outer wrapper

	var carousel = $('carousel'); // The inner wrapper

	var items = $$('#carousel li'); // The different elements, this is an array

	var w=document.getElementById('hiddens').getAttribute("value")

	var t=document.getElementById('times').getAttribute("value")

	//alert(t);

	var item_width = w; // The full width of a single item (incl. borders, padding, etc ... if there is any)

	var max_margin = items.length * item_width - item_width;

	

	// Set up the animation

	var animation = new Fx.Tween(carousel, {duration: 500});

	

	// The function to browse forward

	function next_item(pos){

		if(pos == -max_margin){

			animation.start('left', 0);

		} else { 

			var newposition = pos - item_width;

			animation.start('left', newposition);

		}

	}

	

	// The function to browse backward

	function previous_item(pos){

		if(pos == 0){

			animation.start('left', -max_margin);

		} else { 

			var newposition = pos + item_width;

			animation.start('left', newposition);

		}

	}

	

	// Set up the 'next' and 'previous' buttons

	/* $('next').addEvent('click', function(){

		var position = parseInt(carousel.getStyle('left'));

		next_item(position);

	});

	

	$('previous').addEvent('click', function(){

		var position = parseInt(carousel.getStyle('left'));

		previous_item(position);

	});

	*/

	var repeat = function() {

var position = parseInt(carousel.getStyle('left'));

next_item(position);

};

repeat.periodical(t);

	

}); 

</script>






<div id="container_carousel">

		<!--<a id="previous" style="color:#000000">Previous</a><a id="next" style="color:#000000">Next</a>-->





		<div id="wrap">

			<ul id="carousel">
				<div style="MARGIN: 0px 0px 0px 0px; /*background-color:red;*/ padding:0; list-style:none; list-style:none;">
			

			<?php 

				 global $post;

				 $myposts = get_posts('numberposts=10');

				 //print_r($myposts);

				 foreach($myposts as $post) :

				 setup_postdata($post);

				/*style="height:<?php echo $height; ?>;width:<?php echo $width; ?>;" */

			 ?>

 				<li ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php  if($d_type=='the_content') { the_content(); }

																						else if($d_type=='the_excerpt') { the_excerpt(); }?>

				



				</li>

				

			 <?php 

			

			 endforeach; 

			 

			   ?>

			   

			 </div>

				

			</ul>

		</div>

	</div>











