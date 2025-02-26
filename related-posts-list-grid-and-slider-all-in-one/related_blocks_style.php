<?php ob_start(); 

//define all variables the needed alot

include 'the_globals.php';

$aio_related_posts_settings = aio_read_options();

$rstyle = $aio_related_posts_settings['related_posts_type'];

$rstyle = 'related_list';

if ($rstyle == 'related_list'){

	$thumbw = $aio_related_posts_settings['list_thumbw'];
	
	$thumbh = $aio_related_posts_settings['list_thumbh'];
	
	$vspace = $aio_related_posts_settings['list_vspace'];
	
}else if ($rstyle == 'related_grid'){

	$thumbw = $aio_related_posts_settings['grid_imagew'];
	
	$thumbh = $aio_related_posts_settings['grid_imageh'];
	
	$vspace = $aio_related_posts_settings['grid_vspace'];
	
	$hspace = $aio_related_posts_settings['grid_hspace'];
	
}else{

	$thumbw = $aio_related_posts_settings['slider_imagew'];
	
	$thumbh = $aio_related_posts_settings['slider_imageh'];
}

$list_use_css3_effects = $aio_related_posts_settings['list_use_css3_effects'];

$list_css3_shadow = $aio_related_posts_settings['list_css3_shadow'];

$list_css3_thumb_radius = $aio_related_posts_settings['list_css3_thumb_radius'];

$list_image_direction = $aio_related_posts_settings['list_image_direction'];

$a_font_size = $aio_related_posts_settings['a_font_size'];

$show_thumbs = $aio_related_posts_settings['list_show_thumbs'];

$excerpt_length = $aio_related_posts_settings['list_excerpt_length'];

$image_resizing = $aio_related_posts_settings['image_resizing'];

?>

<style type="text/css">
#related_posts_rpw h3{

	font-size: 14px;

	border: medium none;

	padding: 0 0 6px;

	margin: 0 0 6px;

	<?php echo aio_get_text_align();?>

	<?php echo aio_get_direction();?>

}
.related_posts_list_main_image {

	<?php echo aio_get_float();?>
	
	<?php
	if($rstyle == 'related_grid')
		echo "margin: 0;";
	?>
    padding: 0px;
    
    border: 1px solid #dddddd;
    
    overflow: hidden;
    
    position: relative;
    
	width: <?php echo $thumbw;?>px;

	height: <?php echo $thumbh;?>px;
}

.related_posts_list_main_image img{
	
	overflow: hidden;
	
	left: 50%;

    position: absolute;
    
    top: 50%;
    
    transform: translateY(-52%) translateX(-52%); 
}

.related_posts_list_main_image img{
   
    background: none repeat scroll 0 0 #FFFFFF;
    
    border-radius: 0;
    
    box-shadow: none;
    
    margin: 0;
    
    max-width: none;
    
    padding: 3px;
    
    border: 1px solid;
    
    <?php
	if($image_resizing == 'fit'){ ?>
    	width: <?php echo $thumbw+10 ?>px;
    <?php }?>
    
    transition: all 1s ease 0.1s;

}

<?php if($list_use_css3_effects == 'Yes'){ ?>

.related_posts_list_main_image:hover img {
    
    overflow: hidden;
    
    transition: all 2s ease 0.1s;
    
    z-index: 100;
    
    transform: translateY(-50%) translateX(-50%) scale(1.1, 1.1);
}

<?php } ?>

<?php if($list_css3_shadow != 'None'){ ?>

.related_posts_list_main_image{
	
	-webkit-box-shadow: 0 0 <?php echo $list_css3_shadow; ?>px #666666;// Safari and chrome
	
	-khtml-box-shadow: 0 0 <?php echo $list_css3_shadow; ?>px #666666;// Linux browsers
	
	-moz-box-shadow: 0px 0px <?php echo $list_css3_shadow; ?>px #666666;
	
	box-shadow: 0px 0px <?php echo $list_css3_shadow; ?>px #666666;
	
	z-index: 2;
	
	behavior: url(<?php echo $rpwpluginsurl; ?>/ie-css3.htc);

}

<?php } ?>

<?php if($list_css3_thumb_radius != 'None'){ ?>

	.related_posts_list_main_image{

		-webkit-border-radius: <?php echo $list_css3_thumb_radius; ?>px;// Safari and chrome
		
		-khtml-border-radius: <?php echo $list_css3_thumb_radius; ?>px;// Linux browsers
		
		-moz-border-radius: <?php echo $list_css3_thumb_radius; ?>px;
		
		border-radius: <?php echo $list_css3_thumb_radius; ?>px;
		
		behavior: url(<?php echo $rpwpluginsurl; ?>/ie-css3.htc);}

<?php } ?>


#related_posts_rpw
{
	text-align: center;
	
	display: table;
	
	width: 100%;
	
}


#related_posts_rpw ul{

	margin:0px;

	padding: 0px;
	
	justify-content: flex-start  flex-end  center   space-between  space-around;
}

#related_posts_rpw li:after{

	clear: both;

	content: ".";

	display: block;

	height: <?php echo $vspace; ?>px;

	line-height: 0;

	visibility: hidden;

}

.related_posts_list_excerpt_p{
	    
	    overflow: hidden;
	    
	    <?php if($show_thumbs == 'Yes' && $excerpt_length < 13) $excerpt_p_height = 30; ?>
	    
	    <?php if($show_thumbs == 'Yes' && $excerpt_length > 12) $excerpt_p_height = 50; ?>
	    
	    <?php if($show_thumbs == 'Yes' && $$thumbw > 80) $excerpt_p_height = 50; ?>
	    
	    height: <?php echo $excerpt_p_height ?>px;
}

.related_posts_list_main_content {

	<?php echo aio_get_text_align();?>
	
	<?php echo aio_get_direction();?>
	
	<?php echo aio_get_float();?>
}

.related_posts_list_main_content p{

	<?php echo aio_get_text_align();?>
	
	<?php echo aio_get_direction();?>
	
	margin: 0px 0px 2px 0px;

}

.related_posts_list_main_content a{

	font-weight: bold;
}

<?php ///////////////////////////////List css//////////////////////
if($rstyle == 'related_list'){ ?>
#related_posts_rpw li{

	display: block;

	border-bottom: 1px dotted #CCCCCC;
	
	margin: 0 0 4px;

	padding: 0 0 1px;
}

.related_posts_list_main_image {
	<?php
	if($list_image_direction == 'left')
			echo "margin: 0px 10px 0px 0px;";
		else
			echo "margin: 0px 0px 0px 10px;";
	?>
}

<?php } ?>



<?php ///////////////////////////////grid css//////////////////////
if($rstyle == 'related_grid'){ ?>
.related_posts_list_main_content {
    
    margin-top: <?php echo $thumbh;?>px;
    
    position: absolute;

    width: <?php echo $thumbw;?>px;

}

#related_posts_rpw ul{

	margin:0px;

	padding: 0px;
	
	justify-content: flex-start  flex-end  center   space-between  space-around;
}

#related_posts_rpw li{

    display: block;
    
    <?php echo aio_get_float();?>
    
    <?php echo aio_get_text_align();?>
	
	<?php echo aio_get_direction();?>
    
    <?php    
    if($list_image_direction == 'left')
		echo "margin: 0px 0px 83px 12px;";
	else
		echo "margin: 0px 12px 83px 0px;";
    ?>
    padding: 0 <?php echo $hspace;?>px 6px;
}

.related_posts_list_main_content a {
    font-size: <?php echo $a_font_size;?>pt;
}
<?php } ?>
</style>

<?php ///////////////////////////////slider JS//////////////////////
if($rstyle == 'related_slider'){ ?>
<style type="text/css">
.related_posts_list_main_image {

	<?php echo aio_get_float();?>
	
	border: 1px solid #EEEEEE;
	
    margin: 7px 10px;
    
    padding: 3px;
}
.related_posts_list_main_image44 {
	<?php
	if($list_image_direction == 'left')
			echo "margin: 0px 10px 0px 0px;";
		else
			echo "margin: 0px 0px 0px 10px;";
	?>
}
.related_posts_list_main_image img {

    background: none repeat scroll 0 0 #FFFFFF;
    
    border: 1px solid #CCCCCC;
    
    margin: 0px 0px 0px 0px;
    
    padding: 0px;
    
    vertical-align: middle;
}
.no_style_img img{

	border: 0px;
	
}
.related_posts_ttc_time {

	display: block;
	
	color: #7979FF;
	
	<?php echo aio_get_opposite_text_align();?>

	<?php echo aio_get_direction();?>
	
	<?php echo aio_get_opposite_float();?>
		
	font: 13px/28px sans-serif;
	
	z-index: 1;
	
	right: 15px;
	
	top: 0px;
	
	width: 120px;
}

#slider{
	margin: 0px;
	
	padding: 0px;
}

#related_posts_rpw ul li{

	margin: 0px;
	
	position: relative;
	
	background-image: url("<?php echo $aiopluginsurl; ?>/images/noimage.png");
	
	display: block;
	
	list-style:none;
	
	border-bottom:1px solid #EBDDE2;
	
	height: 110px;
	
	padding: 1px 5px 5px 5px !important;
	
	margin: 0px;
}
	
<?php $height = ''; if($aio_related_posts_settings['slider_show_images'] == 'Yes'){ $height = 'height: 125px'; }else{$height = 'height: 110px';} ?>

#tips {
    display:none;
    
    background-color: #FFFFFF;
    
    bottom: 0;
    
    color: #CCCCCC;

    <?php echo aio_get_text_align();?>

	<?php echo aio_get_direction();?>
	
    font: 13px/22px sans-serif;
    
    <?php echo $height ?>;
    
    min-width: 400px;
    
    position: fixed;
    
    right: 0;
    
    z-index: 99999;
}

#tips:hover {

	opacity: 1;
	
	-moz-transition: all 0.6s ease-out .5s;
}

<?php 
$css3_shadow = $aio_related_posts_settings['slider_css3_effect'];
if($css3_shadow != 'None'){ ?>
	#tips {
		box-shadow: 0 0 <?php echo $css3_shadow; ?>px #666666;
		-moz-box-shadow: 0 0 <?php echo $css3_shadow; ?>px #666666;
		-webkit-box-shadow: 0 0 <?php echo $css3_shadow; ?>px #666666;
	}
<?php } ?>

#tips h3{

	<?php echo aio_get_text_align();?>

	<?php echo aio_get_direction();?>
	
	font-weight: normal;
	
	font-size: 90%;
	
	color: #000000;
	
	margin:1px;
	
	height:26px;
	
	padding-top:5px;
	
	background-color: #F0F0F0;
}
.excerpt_span{

	color: #000000;
	
	<?php echo aio_get_text_align();?>

	<?php echo aio_get_direction();?>
		
	height: 64px;
	
	overflow: hidden;
}
#entry-meta-span {

    background: none repeat scroll 0 0 #000000;
    
    color: #CCCCCC;
    
    display: block;
    
    font-weight: 700;
    
    height: 25px;
    
    margin: -42px 0 0;
    
    opacity: 0.5;
    
    position: relative;
    
    text-align: center;
    
    z-index: 99999;
}
#aio-close {
    background: none repeat scroll 0 0 #F5F5F5;

    border-radius: 45px 45px 47px 52px;

    <?php echo aio_get_opposite_float();?>

    <?php echo aio_get_opposite_text_align();?>

	<?php echo aio_get_direction();?>

    margin: 5px;

    text-align: center;

    width: 19px;

    font-size: 8pt;

    height: 19px;

    color: gray;

    text-align: center;
}
.aio-close:hover {

    background-color: #E3E3E3;
    
    color: #000000;
    
    cursor: pointer;
    
    box-shadow: 0 0 5px red;
    
    transition: .6s ease 0s;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
 $(window).scroll(function(){
  // get the height of #wrap
  var h = $('#related_posts_height_scale').offset().top;
  h=h-$(window).height();
  var y = $(window).scrollTop();
  if( y > h && y != 0){
   // if we are show keyboardTips
   $("#tips").slideDown("slow");
  } else {
   $('#tips').hide('slow');
  }
 });
})
</script>
<?php
$limit = ($aio_related_posts_settings['slider_posts_limit']);
if($limit != 1){ ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#slider').easySlider({autoPlay: true});
		});
	</script>
<?php }} ?>






<?php

$out = ob_get_clean();

return $out;

?>