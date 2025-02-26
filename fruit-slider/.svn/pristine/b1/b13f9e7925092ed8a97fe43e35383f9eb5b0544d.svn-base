<?php
$root = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header("Content-type: text/css");
ob_start();

$option_name = 'slider_settings' ;
$option_value = get_option($option_name);
$color = $option_value['change_color'];
$hovercolor = $option_value['change_hovercolor'];
$show_control = $option_value['show_navbar'];
$show_bullets = $option_value['show_bullets'];
$navstyle =  $option_value['nav_style'];
$show_thumb =  $option_value['show_thumbnail'];
$style = $option_value['style_section'];
?>
<?php if($show_control == 'No')  { ?>
.fruitslider .fruit-arrows { 
	display:none;
}
.fruitslider .fruit-arrows span::after {
	background:none;	
}
.fruitslider .fruit-arrows span {
	background: none repeat scroll 0 0 rgba(0, 0, 0, 0) !important;
	opacity:0 !important;
}

<?php } ?>

<?php if($show_bullets == 'No')  { ?>
.fruit-dots { 
	display:none;
}
<?php } ?>

<?php if($show_thumb == 'No')  { ?>
.fruit-thumbnails {
	display:none;
}
<?php } ?>

.fruitslider .fruit-arrows span {
	background: none repeat scroll 0 0 <?php echo $color; ?>;;
}
.fruit-slide .slider_link a:before {
    border: 2px solid  <?php echo $hovercolor; ?>;    
    bottom: 0;
    content: "";
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    transition-duration: 0.3s;
    transition-property: top, right, bottom, left;
}
.fruit-slide .slider_link a {
    color: #ffffff;
    display: inline-block;
    font-size: 21px ;
    line-height: 1.333 ;
    padding: 10px 32px ;
    text-decoration: none ;
    text-transform: uppercase;
    box-shadow: 0 0 1px rgba(0, 0, 0, 0);
    display: inline-block;
    position: relative;
    transform: translateZ(0px);
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    border-color: transparent;
    transition:all 0.5s ease-in-out 0s;  
    border-radius :0px;
}
.fruit-slide .slider_link a:hover:before {
    bottom: -4px;
    left: -4px;
    right: -4px;
    top: -4px;
}
.fruit-slide .slider_link a:hover {
    background-color: <?php echo $hovercolor; ?>;
    text-decoration: none !important;
}
 


<?php if($style == 'Style-2') { ?>
.fruit-pagination.text-center {
    position: relative;   
    bottom: 60px;
}
.fruitslider .fruit-thumbnails {
    bottom:100px;
    z-index: 1;
}
.fruitslider .fruit-thumbnails .thumbnail-image {
    display: -moz-inline-box;
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
}
#fruitslider .fruit-thumbnails ul li img  {	
	opacity: 0.7;
	max-height:70px;
	border: 3px solid <?php echo $color; ?>;
}
#fruitslider .fruit-thumbnails ul li:hover img,
#fruitslider .fruit-thumbnails ul li.active img
  {	
	border: 3px solid <?php echo $hovercolor; ?>;
}
.fruitslider .fruit-thumbnails ul .fruit-thumbnail {
	 background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
	 margin:0 5px;
}
#fruitslider .fruit-thumbnails ul li.active img {
	opacity: 1 ;
}
.fruit-slide .slider_link{
    background: none repeat scroll 0 0 <?php echo $color; ?>;
    opacity: 0.6;
    display: inline-block;
    left: -30px !important;
    padding: 6px 25px 6px 60px;
    position: relative;
    top: 400px!important;
    transform: skewX(160deg);
}
.fruit-slide .slider_link a {
	text-shadow: none;
    transition: color 0.2s ease-out 0s;
    color: #ffffff;
    font-size: 1.84615em;
    line-height: 1;
    text-transform: uppercase;
    white-space: nowrap;
    display: block;
    margin-left: 23px;
    transform: skewX(20deg);
    font-weight: 700;
    transition: all 0.5s ease-in-out 0s;
}
.fruit-slide .slider_link a:hover { 	
	background-color: <?php echo $color; ?>;
	color : <?php echo $hovercolor; ?>
}

@media (max-width:480px) { 
#fruitslider .fruit-thumbnails ul li img {	
	max-height:50px;	
	}
.fruitslider .fruit-thumbnails {
    bottom: 62px;
}
<?php } ?>

