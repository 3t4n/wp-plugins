<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class mycbgenie_ads_widget_plugin extends WP_Widget {

//function mycbgenie_ads_widget_plugin() {
function __construct() {

//   parent::WP_Widget(false, $name = __('MCG : ClickBank Affiliate Ads', 'mycbgenie_ads_widget'),
   parent::__construct(false, $name = __('MCG : ClickBank Affiliate Ads', 'mycbgenie_ads_widget'),
	array( 'description' => __( 'This will serve clickbank affiliate ads on your widget, matching with your page content.
	For details visit http://MyCBGenie.com', 'mycbgenie_ads_widget' ), ) 
);

  	wp_enqueue_script('mycbgenie_widget_settings', 				plugin_dir_url(__FILE__).'js/widget_settings.js', array('jquery'),'',true );
	wp_enqueue_script('mycbgenie-ads-jscolor_pick', 				plugins_url('/bxslider_carousel/js/jscolor/jscolor.min.js', __FILE__),array('jquery'));


}  


// widget form creation

function form($instance) {


// Check values
if( $instance) {
$title 							= esc_attr($instance['title']);
$format 						= esc_attr($instance['format']);
$no_of_products 				= esc_attr($instance['no_of_products']);
$auto_show						= esc_attr($instance['auto_show']);
$no_of_products_at_a_time		= esc_attr($instance['no_of_products_at_a_time']);
$speed 							= esc_attr($instance['speed']);
$pause_delay					= esc_attr($instance['pause_delay']);
$no_of_products_move_transition = esc_attr($instance['no_of_products_move_transition']);
$image_width					= esc_attr($instance['image_width']);
$show_product_descr				= esc_attr($instance['show_product_descr']);
$automatic_keywords				= esc_attr($instance['automatic_keywords']);
$keywords						= esc_attr($instance['keywords']);
$link_color						= esc_attr($instance['link_color']);
$border_color					= esc_attr($instance['border_color']);
$descr_color					= esc_attr($instance['descr_color']);
$default_font_family			= esc_attr($instance['default_font_family']);
$rows							= esc_attr($instance['rows']);
$cols							= esc_attr($instance['cols']);
$fill_color						= esc_attr($instance['fill_color']);
$title_tag						= esc_attr($instance['title_tag']);
$banner_size					= esc_attr($instance['banner_size']);
$orientation					= esc_attr($instance['orientation']);
$height_adjustment				= esc_attr($instance['height_adjustment']);
$show_read_more_btn				= esc_attr($instance['show_read_more_btn']);
$tracking_id					= esc_attr($instance['tracking_id']);


} else {

$title = 'RELATED PRODUCTS';
$format='';
$no_of_products=5;
$auto_show="yes";
$no_of_products_at_a_time =3;
$speed	=	1500;
$pause_delay = 4000;
$no_of_products_move_transition=1;
$image_width=180;
$show_product_descr="1";
$default_font_family="0";
$automatic_keywords="automatic";
$keywords='';
$link_color="0000FF";
$border_color="ddd";
$descr_color="A9A9A9";
$cols=1;
$rows=4;
$fill_color="FFFFFF";
$title_tag="H3";
$banner_size="336x280";
$orientation="vertical";
$height_adjustment=0;
$show_read_more_btn=1;
$tracking_id='';
}



	
//echo $no_of_products."ddd";

?>

<title>height_adjustment</title>

<div id="<?php echo $this->get_field_id('mycbgenie_general_div'); ?>">

		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'mycbgenie_ads_widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		
	<!--
	    <p>
		<label for="<?php echo $this->get_field_id('title_tag'); ?>"><?php _e('Title Tag', 'mycbgenie_ads_widget'); ?></label>
		<select class="" id="<?php echo $this->get_field_id('title_tag'); ?>" name="<?php echo $this->get_field_name('title_tag'); ?>">
			<option value="H1" <?php if ($title_tag=="H1") echo 'selected="selected"';?> >H1</option>
			<option value="H2" <?php if ($title_tag=="H2") echo 'selected="selected"';?> >H2</option>
			<option value="H3" <?php if ($title_tag=="H3") echo 'selected="selected"';?> >H3</option>	
			<option value="H4" <?php if ($title_tag=="H4") echo 'selected="selected"';?> >H4</option>	
			<option value="H5" <?php if ($title_tag=="H5") echo 'selected="selected"';?> >H5</option>		
			<option value="H6" <?php if ($title_tag=="H6") echo 'selected="selected"';?> >H6</option>		
		</select>
		
		</p>
	-->
		
		
		
		<p>
		<label for="<?php echo $this->get_field_id('format'); ?>"><?php _e('Ad Format', 'mycbgenie_ads_widget'); ?></label>
		<select class="widefat_format" id="<?php echo $this->get_field_id('format'); ?>" name="<?php echo $this->get_field_name('format'); ?>">
			<option value="load" <?php if ($format=="load") echo 'selected="selected"';?> ></option>

			<option value="text" <?php if ($format=="text") echo 'selected="selected"';?> >Text Ads</option>
			<option value="banner" <?php if ($format=="banner") echo 'selected="selected"';?> >Banner Ads</option>
			<option value="carousel" <?php if ($format=="v_carousel") echo 'selected="selected"';?> >Carousel Ads</option>	
			<option value="image_ads" <?php if ($format=="image_ads") echo 'selected="selected"';?> >Image Grid Ads</option>		
		</select>
		
		</p>
</div>


<div   id="<?php echo $this->get_field_id('mycbgenie_orientation_div'); ?>">

		<p>
		<label for="<?php echo $this->get_field_id('orientation'); ?>"><?php _e('Orientation', 'mycbgenie_ads_widget'); ?></label>
		<select class="" id="<?php echo $this->get_field_id('orientation'); ?>" name="<?php echo $this->get_field_name('orientation'); ?>">
			<option value="horizontal" <?php if ($orientation=="horizontal") echo 'selected="selected"';?> >Horizontal</option>
			<option value="vertical" <?php if ($orientation=="vertical") echo 'selected="selected"';?> >Vertical</option>
		</select>
		
		</p>
</div>




<div  style="" id="<?php echo $this->get_field_id('mycbgenie_keywords_div'); ?>">
	
		
		<label for="<?php echo $this->get_field_id('automatic_keywords'); ?>"><?php _e('<strong>Ad content selection </strong>:', 'mycbgenie_ads_widget'); ?></label> <br/>
		
		
		
		
		<input class="widefat" id="<?php echo $this->get_field_id('automatic_keywords'); ?>" name="<?php echo $this->get_field_name('automatic_keywords'); ?>" 
			type="radio" <?php if ($automatic_keywords=="automatic")  echo 'checked';?> value="automatic" />Automatic
		<br />
		<input class="widefat" id="<?php echo $this->get_field_id('automatic_keywords'); ?>" name="<?php echo $this->get_field_name('automatic_keywords'); ?>" 
			type="radio"  <?php if ($automatic_keywords=="keywords")  echo 'checked';?> value="keywords" />Keywords
		
		
		<br />
	

			<input  size=5 	class="widefat" id="<?php echo $this->get_field_id('keywords'); ?>" name="<?php echo $this->get_field_name('keywords'); ?>" 
					type="text" value="<?php echo $keywords; ?>" />

		


</div>
	

<div id="<?php echo $this->get_field_id('mycbgenie_banner_ads_div'); ?>">

		<p>
		<label for="<?php echo $this->get_field_id('banner_size'); ?>"><?php _e('Banner Size', 'mycbgenie_ads_widget'); ?></label>
		<select class="" id="<?php echo $this->get_field_id('banner_size'); ?>" name="<?php echo $this->get_field_name('banner_size'); ?>">
			<option value="728x90" <?php if ($banner_size=="728x90") echo 'selected="selected"';?> >728x90</option>
			<option value="468x60" <?php if ($banner_size=="468x60") echo 'selected="selected"';?> >468x60</option>
			<option value="234x60" <?php if ($banner_size=="234x60") echo 'selected="selected"';?> >234x60</option>
			<option value="336x280" <?php if ($banner_size=="336x280") echo 'selected="selected"';?> >336x280</option>	
			<option value="300x250" <?php if ($banner_size=="300x250") echo 'selected="selected"';?> >300x250</option>	
			<option value="250x250" <?php if ($banner_size=="250x250") echo 'selected="selected"';?> >250x250</option>		
			<option value="125x125" <?php if ($banner_size=="125x125") echo 'selected="selected"';?> >125x125</option>					
			<option value="120x600" <?php if ($banner_size=="120x600") echo 'selected="selected"';?> >120x600</option>		
			<option value="160x600" <?php if ($banner_size=="160x600") echo 'selected="selected"';?> >160x600</option>		
			<option value="120x240" <?php if ($banner_size=="120x240") echo 'selected="selected"';?> >120x240</option>		
			<option value="120x60" <?php if ($banner_size=="120x60") echo 'selected="selected"';?> >120x60</option>		
		</select>
		
		</p>

</div>




<div id="<?php echo $this->get_field_id('mycbgenie_image_width_div'); ?>">
	
		<p>
	<label for="<?php echo $this->get_field_id('image_width'); ?>"><?php _e('Product image width (in pxs)', 'mycbgenie_ads_widget'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('image_width'); ?>" name="<?php echo $this->get_field_name('image_width'); ?>" 
			type="text" value="<?php echo $image_width; ?>" style="width:60px;" />
	</p>
</div>	
	
	

<div id="<?php echo $this->get_field_id('mycbgenie_carousel_ads_div'); ?>">
	
<p>
	<label for="<?php echo $this->get_field_id('no_of_products'); ?>"><?php _e('The no of products for slide', 'mycbgenie_ads_widget'); ?></label>
	<select class="" id="<?php echo $this->get_field_id('no_of_products'); ?>" name="<?php echo $this->get_field_name('no_of_products'); ?>" >
		<option value="1"  <?php if ($no_of_products=="1")  echo 'selected="selected"';?>>1</option>
		<option value="2"  <?php if ($no_of_products=="2")  echo 'selected="selected"';?>>2</option>
		<option value="3"  <?php if ($no_of_products=="3")  echo 'selected="selected"';?>>3</option>
		<option value="4"  <?php if ($no_of_products=="4")  echo 'selected="selected"';?>>4</option>
		<option value="5"  <?php if ($no_of_products=="5")  echo 'selected="selected"';?>>5</option>						
		<option value="6"  <?php if ($no_of_products=="6")  echo 'selected="selected"';?>>6</option>
		<option value="7"  <?php if ($no_of_products=="7")  echo 'selected="selected"';?>>7</option>
		<option value="8"  <?php if ($no_of_products=="8")  echo 'selected="selected"';?>>8</option>						
		<option value="9"  <?php if ($no_of_products=="9")  echo 'selected="selected"';?>>9</option>
		<option value="10"  <?php if ($no_of_products=="10")  echo 'selected="selected"';?>>10</option>
		<option value="11"  <?php if ($no_of_products=="11")  echo 'selected="selected"';?>>11</option>
		<option value="12"  <?php if ($no_of_products=="12")  echo 'selected="selected"';?>>12</option>
		<option value="13"  <?php if ($no_of_products=="13")  echo 'selected="selected"';?>>13</option>
		<option value="14"  <?php if ($no_of_products=="14")  echo 'selected="selected"';?>>14</option>
		<option value="15"  <?php if ($no_of_products=="15")  echo 'selected="selected"';?>>15</option>										
	</select>	
	
	</p>

	<p>
	<label for="<?php echo $this->get_field_id('no_of_products_at_a_time'); ?>"><?php _e('The no of products to display at a time<br> (only for vertical mode)', 'mycbgenie_ads_widget'); ?></label>
	<select class="" id="<?php echo $this->get_field_id('no_of_products_at_a_time'); ?>" name="<?php echo $this->get_field_name('no_of_products_at_a_time'); ?>" >
		<option value="1"  <?php if ($no_of_products_at_a_time=="1")  echo 'selected="selected"';?>>1</option>
		<option value="2"  <?php if ($no_of_products_at_a_time=="2")  echo 'selected="selected"';?>>2</option>
		<option value="3"  <?php if ($no_of_products_at_a_time=="3")  echo 'selected="selected"';?>>3</option>
		<option value="4"  <?php if ($no_of_products_at_a_time=="4")  echo 'selected="selected"';?>>4</option>
		<option value="5"  <?php if ($no_of_products_at_a_time=="5")  echo 'selected="selected"';?>>5</option>						
		<option value="6"  <?php if ($no_of_products_at_a_time=="6")  echo 'selected="selected"';?>>6</option>						
		<option value="7"  <?php if ($no_of_products_at_a_time=="7")  echo 'selected="selected"';?>>7</option>						
		<option value="8"  <?php if ($no_of_products_at_a_time=="8")  echo 'selected="selected"';?>>8</option>												
	</select>
	</p>
	
	

	<p>
	<label for="<?php echo $this->get_field_id('auto_show'); ?>"><?php _e('Auto Slide', 'mycbgenie_ads_widget'); ?></label>
	<select class="" id="<?php echo $this->get_field_id('auto_show'); ?>" name="<?php echo $this->get_field_name('auto_show'); ?>" >
			<option value="yes"  <?php if ($auto_show=="yes")  echo 'selected="selected"';?>>Yes</option>
			<option value="no" <?php if ($auto_show=="no") echo 'selected="selected"';?>>No</option>
	</select>
	
	</p>
	
	
	

	<p>
	<label for="<?php echo $this->get_field_id('speed'); ?>"><?php _e('Speed - slide transition duration (in ms)', 'mycbgenie_ads_widget'); ?></label>
	<select class="" id="<?php echo $this->get_field_id('speed'); ?>" name="<?php echo $this->get_field_name('speed'); ?>" >
		<option value="300"  <?php if ($speed=="300")  echo 'selected="selected"';?>>300</option>
		<option value="600"  <?php if ($speed=="600")  echo 'selected="selected"';?>>600</option>
		<option value="900"  <?php if ($speed=="900")  echo 'selected="selected"';?>>900</option>
		<option value="1200"  <?php if ($speed=="1200")  echo 'selected="selected"';?>>1200</option>
		<option value="1500"  <?php if ($speed=="1500")  echo 'selected="selected"';?>>1500</option>						
		<option value="1800"  <?php if ($speed=="1800")  echo 'selected="selected"';?>>1800</option>								
	</select>
	</p>
	





	<p>
	<label for="<?php echo $this->get_field_id('pause_delay'); ?>"><?php _e('Delay - time (in ms) between each transition', 'mycbgenie_ads_widget'); ?></label>
	<select class="" id="<?php echo $this->get_field_id('pause_delay'); ?>" name="<?php echo $this->get_field_name('pause_delay'); ?>" >
		<option value="2000"  <?php if ($pause_delay=="2000")  echo 'selected="selected"';?>>2000</option>
		<option value="3000"  <?php if ($pause_delay=="3000")  echo 'selected="selected"';?>>3000</option>
		<option value="4000"  <?php if ($pause_delay=="4000")  echo 'selected="selected"';?>>4000</option>
		<option value="5000"  <?php if ($pause_delay=="5000")  echo 'selected="selected"';?>>5000</option>
		<option value="6000"  <?php if ($pause_delay=="6000")  echo 'selected="selected"';?>>6000</option>						
	</select>
	</p>
		
		
	
	
	<p>
	<label for="<?php echo $this->get_field_id('no_of_products_move_transition'); ?>"><?php _e('The no of products to move on transition', 'mycbgenie_ads_widget'); ?></label>
	<select class="" id="<?php echo $this->get_field_id('no_of_products_move_transition'); ?>" 
				name="<?php echo $this->get_field_name('no_of_products_move_transition'); ?>" >
				
		<option value="1"  <?php if ($no_of_products_move_transition=="1")  echo 'selected="selected"';?>>1</option>
		<option value="2"  <?php if ($no_of_products_move_transition=="2")  echo 'selected="selected"';?>>2</option>
		<option value="3"  <?php if ($no_of_products_move_transition=="3")  echo 'selected="selected"';?>>3</option>
		<option value="4"  <?php if ($no_of_products_move_transition=="4")  echo 'selected="selected"';?>>4</option>
		<option value="5"  <?php if ($no_of_products_move_transition=="5")  echo 'selected="selected"';?>>5</option>
							
	</select>
	</p>	
	
	
</div>

<div id="<?php echo $this->get_field_id('mycbgenie_rows_cols_div'); ?>">

	<p>
	<label for="<?php echo $this->get_field_id('rows'); ?>"><?php _e('Rows', 'mycbgenie_ads_widget'); ?></label>
	<select  class="" id="<?php echo $this->get_field_id('rows'); ?>" name="<?php echo $this->get_field_name('rows'); ?>" >
		<option value="1"  <?php if ($rows=="1")  echo 'selected="selected"';?>>1</option>
		<option value="2"  <?php if ($rows=="2")  echo 'selected="selected"';?>>2</option>
		<option value="3"  <?php if ($rows=="3")  echo 'selected="selected"';?>>3</option>
		<option value="4"  <?php if ($rows=="4")  echo 'selected="selected"';?>>4</option>
		<option value="5"  <?php if ($rows=="5")  echo 'selected="selected"';?>>5</option>						
		<option value="6"  <?php if ($rows=="6")  echo 'selected="selected"';?>>6</option>

	</select>	
		<label for="<?php echo $this->get_field_id('rows'); ?>"><?php _e('X', 'mycbgenie_ads_widget'); ?></label>

	


	<select  class="" id="<?php echo $this->get_field_id('cols'); ?>" name="<?php echo $this->get_field_name('cols'); ?>" >
		<option value="1"  <?php if ($cols=="1")  echo 'selected="selected"';?>>1</option>
		<option value="2"  <?php if ($cols=="2")  echo 'selected="selected"';?>>2</option>
		<option value="3"  <?php if ($cols=="3")  echo 'selected="selected"';?>>3</option>
		<option value="4"  <?php if ($cols=="4")  echo 'selected="selected"';?>>4</option>
		<option value="5"  <?php if ($cols=="5")  echo 'selected="selected"';?>>5</option>						
		<option value="6"  <?php if ($cols=="6")  echo 'selected="selected"';?>>6</option>

	</select>	
		<label for="<?php echo $this->get_field_id('cols'); ?>"><?php _e('Cols', 'mycbgenie_ads_widget'); ?></label>
	</p>

</div>


<div id="<?php echo $this->get_field_id('mycbgenie_show_read_more_btn_div'); ?>">

	<!--
		<p>
		<input class="widefat" id="<?php echo $this->get_field_id('show_read_more_btn'); ?>" name="<?php echo $this->get_field_name('show_read_more_btn'); ?>" 
			type="checkbox" <?php if ($show_read_more_btn=="1")  echo 'checked="checked"';?> value="1" />
				<label for="<?php echo $this->get_field_id('show_read_more_btn'); ?>"><?php _e('Show READ MORE button', 'mycbgenie_ads_widget'); ?></label>
	</p>
	-->
	
</div>	


<div id="<?php echo $this->get_field_id('mycbgenie_image_carousel_text_ads_common_div'); ?>">

	<!--
	<p>

		<label for="<?php echo $this->get_field_id('height_adjustment'); ?>"><?php _e('Height adjustment ( +/- )', 'mycbgenie_ads_widget'); ?></label>				
		 <input  size=4 id="<?php echo $this->get_field_id('height_adjustment'); ?>" name="<?php echo $this->get_field_name('height_adjustment'); ?>" 
			type="text"  " value="<?php echo $height_adjustment; ?>"/> <label>(pxs)</label><br />

	</p>
		-->
		
		
	<p>

		# <input  size=4 id="<?php echo $this->get_field_id('fill_color'); ?>" name="<?php echo $this->get_field_name('fill_color'); ?>" 
			type="text"  class="jscolor" value="<?php echo $fill_color; ?>"/>
		<label for="<?php echo $this->get_field_id('fill_color'); ?>"><?php _e('[ Fill color ] ', 'mycbgenie_ads_widget'); ?></label>				
	</p>
	
	
	<p>
		
		# <input  size=4  id="<?php echo $this->get_field_id('link_color'); ?>" name="<?php echo $this->get_field_name('link_color'); ?>" 
			type="text"  class="jscolor" value="<?php echo $link_color; ?>"/>
		<label for="<?php echo $this->get_field_id('link_color'); ?>"><?php _e('[ Link color ]', 'mycbgenie_ads_widget'); ?></label>		
	</p>
		
	
	<p>

		# <input  size=4  id="<?php echo $this->get_field_id('border_color'); ?>" name="<?php echo $this->get_field_name('border_color'); ?>" 
			type="text"  class="jscolor" value="<?php echo $border_color; ?>"  />
		<label for="<?php echo $this->get_field_id('border_color'); ?>"><?php _e('[ Border color ]', 'mycbgenie_ads_widget'); ?></label>
					
	</p>
	



	<p>
		<input class="widefat" id="<?php echo $this->get_field_id('show_product_descr'); ?>" name="<?php echo $this->get_field_name('show_product_descr'); ?>" 
			type="checkbox" <?php if ($show_product_descr=="1")  echo 'checked="checked"';?> value="1" />
				<label for="<?php echo $this->get_field_id('show_product_descr'); ?>"><?php _e('Show product description', 'mycbgenie_ads_widget'); ?></label>
	</p>
	

	
	
	<p>

		# <input   size=4 id="<?php echo $this->get_field_id('descr_color'); ?>" name="<?php echo $this->get_field_name('descr_color'); ?>" 
			type="text"  class="jscolor" value="<?php echo $descr_color; ?>"/>
		<label for="<?php echo $this->get_field_id('descr_color'); ?>"><?php _e('[ Description color ]', 'mycbgenie_ads_widget'); ?></label>				
	</p>
	
	
	
	<p>
		<input class="widefat" id="<?php echo $this->get_field_id('default_font_family'); ?>" name="<?php echo $this->get_field_name('default_font_family'); ?>" 
			type="checkbox" <?php if ($default_font_family=="1")  echo 'checked="checked"';?> value="1" />
				<label for="<?php echo $this->get_field_id('default_font_family'); ?>">
				<?php _e('Defaut font family set (above color selections will be ignored)', 'mycbgenie_ads_widget'); ?></label>
	</p>
	
</div>

<div id="tracking">	

	<p>
		<label for="<?php echo $this->get_field_id('tracking_id'); ?>"><?php _e('Tracking ID (no spaces and special chars)', 'mycbgenie_ads_widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('tracking_id'); ?>" name="<?php echo $this->get_field_name('tracking_id'); ?>" type="text" value="<?php echo $tracking_id; ?>" />
	</p>
	
	<p>&nbsp;</p>
				
</div>

<?php
}



function update($new_instance, $old_instance) {
$instance = $old_instance;
// Fields

									//arguments (field, single words or not, integer vale or not, default integer value)
$instance['title'] 							= mycbgenie_ads_validation_check ( $new_instance['title'], "no", "no","0");
$instance['format'] 						= mycbgenie_ads_validation_check ( $new_instance['format'], "yes", "no","0");
$instance['no_of_products'] 				= mycbgenie_ads_validation_check ( $new_instance['no_of_products'], "yes", "yes","1");
$instance['auto_show'] 						= mycbgenie_ads_validation_check ( $new_instance['auto_show'], "yes", "no","");
$instance['no_of_products_at_a_time'] 		= mycbgenie_ads_validation_check ( $new_instance['no_of_products_at_a_time'], "yes", "yes","1");
$instance['speed'] 							= mycbgenie_ads_validation_check ( $new_instance['speed'], "yes", "yes","300");
$instance['pause_delay'] 					= mycbgenie_ads_validation_check ( $new_instance['pause_delay'], "yes", "yes","4000");
$instance['no_of_products_move_transition'] = mycbgenie_ads_validation_check ( $new_instance['no_of_products_move_transition'], "yes", "yes","1");
$instance['image_width'] 					= mycbgenie_ads_validation_check ( $new_instance['image_width'], "yes", "yes","180");
$instance['show_product_descr'] 			= mycbgenie_ads_validation_check ( $new_instance['show_product_descr'], "yes", "yes","1");

//$instance['show_product_descr'] 			=  ( $new_instance['show_product_descr'] );

$instance['automatic_keywords'] 			= mycbgenie_ads_validation_check ( $new_instance['automatic_keywords'], "yes", "no","");
$instance['keywords'] 						= mycbgenie_ads_validation_check ( $new_instance['keywords'], "no", "no","");
$instance['link_color'] 					= mycbgenie_ads_validation_check ( $new_instance['link_color'], "yes", "no","");
$instance['descr_color'] 					= mycbgenie_ads_validation_check ( $new_instance['descr_color'], "yes", "no","");
$instance['default_font_family'] 			= mycbgenie_ads_validation_check ( $new_instance['default_font_family'], "yes", "yes","1");
$instance['border_color'] 					= mycbgenie_ads_validation_check ( $new_instance['border_color'], "yes", "no","");
$instance['rows'] 							= mycbgenie_ads_validation_check ( $new_instance['rows'], "yes", "yes","1");
$instance['cols'] 							= mycbgenie_ads_validation_check ( $new_instance['cols'], "yes", "yes","1");
$instance['fill_color'] 					= mycbgenie_ads_validation_check ( $new_instance['fill_color'], "yes", "no","");
$instance['title_tag'] 						= mycbgenie_ads_validation_check ( $new_instance['title_tag'], "yes", "no","");
$instance['banner_size'] 					= mycbgenie_ads_validation_check ( $new_instance['banner_size'], "yes", "no","");
$instance['orientation'] 					= mycbgenie_ads_validation_check ( $new_instance['orientation'], "yes", "no","");
$instance['height_adjustment'] 				= mycbgenie_ads_validation_check ( $new_instance['height_adjustment'], "yes", "yes",0);
$instance['show_read_more_btn'] 			= mycbgenie_ads_validation_check ( $new_instance['show_read_more_btn'], "yes", "yes",1);
$instance['tracking_id'] 					= mycbgenie_ads_validation_check ( $new_instance['tracking_id'], "yes", "no","");





return $instance;
}






// display widget
function widget($args, $instance) {
extract( $args );
$hide_footer="";	
		 
// these are the widget options
$title = apply_filters('widget_title', $instance['title']);
$format = $instance['format'];
$kws	=	($instance['keywords']);
$automatic_keywords	=  $instance['automatic_keywords'];
$speed = $instance['speed'];
$auto_show = $instance['auto_show'];
if ($auto_show=="yes") {$auto_show="true";} else {$auto_show="false";}
$no_of_products_at_a_time =$instance['no_of_products_at_a_time'];
$delay = $instance['pause_delay'];
$moveSildes=$instance['no_of_products_move_transition'];
$im_width=$instance['image_width'];
$show_product_descr=$instance['show_product_descr'];
$default_font_family=$instance['default_font_family'];


$border_color = $instance['border_color'];
$link_color = $instance['link_color'];
$descr_color = $instance['descr_color'];



$no_of_products = $instance['no_of_products'];
$rows = $instance['rows'];
$cols = $instance['cols'];
$fill_color = $instance['fill_color'];
$title_tag = $instance['title_tag'];
$banner_size = $instance['banner_size'];
$orientation = $instance['orientation'];
$height_adjustment = $instance['height_adjustment'];
$show_read_more_btn = $instance['show_read_more_btn'];
$tracking_id	= $instance['tracking_id'];


echo $args['before_title'] . $title . $args['after_title'];

//make as a function
		if ($automatic_keywords=="automatic"){
			
			$kws= mycbgenie_fetch_keywords_for_automatic();
		}
		



		if (strlen($kws)<3 ){ 	 echo 'No keywords detected automatically'; return;}
		

//end as a function

	
if (  ($format=="text")  ) {

	//do_shortcode('[mycbgenie_text_ad  kws="acne beauty" show_product_descr="1" default_font_family="1" fill_color="ffffff" link_color="" border_color="" show_read_more_btn="0" rows=1"  cols="4" descr_color="000000" height_adjustment="0" hide_footer="0"]'); 
	
	echo mycbgenie_text_ads_script($rows, $cols,  $kws,  $show_product_descr, 
								$show_read_more_btn,  $default_font_family, $fill_color,$border_color, $link_color, $descr_color, $height_adjustment, $hide_footer,$tracking_id);
								
								
}



if (  ($format=="carousel") ) {

	//$kws="acne";

	//do_shortcode('[mycbgenie_carousel_ad title="RELATED PRODUCTS" no_of_products="6" im_width="180" vertical_no_of_products="3" auto_show="true" speed="300" delay="3000" moveSlides="1" orientation="vertical" kws="acne beauty" show_product_descr="1" default_font_family="1" fill_color="ffffff" link_color="" border_color="" ]'); 
	echo mycbgenie_carousel_ads_script($title, $no_of_products, $im_width, $no_of_products_at_a_time, $auto_show, $speed, $delay, $moveSildes,  $orientation,  $kws,  $show_product_descr,  $default_font_family, $fill_color, $border_color, $link_color,$hide_footer,$tracking_id);


}


if ($format=="image_ads") {

	//do_shortcode('[mycbgenie_image_ad title="RELATED PRODUCTS" title_tag="H4" cols="1" rows="4" kws="acne beauty" im_width="180" show_product_descr="0" default_font_family="1" fill_color="ffffff" link_color="" border_color="" show_read_more_btn="0"]'); 
	echo mycbgenie_image_ads_script($title, $title_tag, $rows, $cols, $kws, $im_width,  $show_product_descr, $show_read_more_btn, $default_font_family, $fill_color,$border_color, $link_color,$height_adjustment,$hide_footer,$tracking_id);

}

if ($format=="banner") {

	//do_shortcode('[mycbgenie_banner_ad banner_size="160x600" kws="acne beauty"]'); 
	echo mycbgenie_banner_ads_script($banner_size,$kws, $hide_footer,$tracking_id);

}


//echo $after_widget;

}

} //class





// register widget
function fn_mycbgenie_ads_widget_plugin ()
{

	return register_widget("mycbgenie_ads_widget_plugin");
}
add_action ('widgets_init', 'fn_mycbgenie_ads_widget_plugin');


// register widget
//add_action('widgets_init', create_function('', 'return register_widget("mycbgenie_ads_widget_plugin");'));



?>