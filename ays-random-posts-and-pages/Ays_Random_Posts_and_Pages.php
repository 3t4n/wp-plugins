<?php
/*
Plugin Name: WordPress Random Posts and Pages
Plugin URI: http://ays-pro.com/
Description:The main advantage of this widget is random movement of random links and every time they are changing.
Version: 1.0.1
Author: http://ays-pro.com/
License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/




class WordPress_Random_Posts_and_Pages extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'WordPress_Random_Posts_and_Pages', 

// Widget name will appear in UI
__('WordPress Random Posts and Pages widget', 'WordPress_Random_Posts_and_Pages_domain'), 

// Widget description
array( 'description' => __( 'The main advantage of this widget is random movement of random links and every time they are changing.', 'random_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'ays_title', $instance['title'] );
$ays_width = apply_filters( 'ays_width', $instance['ays_width'] );
$ays_height = apply_filters( 'ays_height', $instance['ays_height'] );
$ays_box_background = apply_filters( 'ays_box_background', $instance['ays_box_background'] );
$ays_box_border_color = apply_filters( 'ays_box_border_color', $instance['ays_box_border_color'] );
$ays_box_border_thickness = apply_filters('ays_box_border_thickness', $instance['ays_box_border_thickness']);    
$ays_box_border_radius = apply_filters( 'ays_box_border_radius', $instance['ays_box_border_radius'] );
$ays_box_shadow = apply_filters( 'ays_box_shadow', $instance['ays_box_shadow'] );  
$ays_count_links = apply_filters( 'ays_count_links', $instance['ays_count_links'] );
$ays_count_letters = apply_filters( 'ays_count_letters', $instance['ays_count_letters'] );

$ays_link_background = apply_filters( 'ays_link_background', $instance['ays_link_background'] );
$ays_link_color = apply_filters( 'ays_link_color', $instance['ays_link_color'] );
$ays_link_padding = apply_filters( 'ays_link_padding', $instance['ays_link_padding'] );
$ays_link_border_radius = apply_filters( 'ays_link_border_radius', $instance['ays_link_border_radius'] );
$ays_link_font = apply_filters( 'ays_link_font', $instance['ays_link_font'] );
$ays_animate_speed = apply_filters( 'ays_animate_speed', $instance['ays_animate_speed'] );
$ays_link_hover_bg = apply_filters( 'ays_link_hover_bg', $instance['ays_link_hover_bg'] );
$ays_link_hover_color = apply_filters( 'ays_link_hover_color', $instance['ays_link_hover_color'] );
$ays_link_hover_border = apply_filters( 'ays_link_hover_border', $instance['ays_link_hover_border'] );


// get random posts and pages
global $wpdb;
$rand_posts = $wpdb->get_results("SELECT ID,post_title,post_type FROM " . $wpdb->prefix . "posts WHERE (post_type='post' OR post_type='page') AND post_status='publish' ORDER BY rand()  Limit ".$ays_count_links);

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
echo "<div id='aysdiv_container'>";
	foreach($rand_posts as $ays_post)
	{
		$title_len=strlen($ays_post->post_title);
		if($title_len>$ays_count_letters)
		{
			$innerlink=substr($ays_post->post_title, 0, $ays_count_letters).'...';
		}
		else
		{
			$innerlink=$ays_post->post_title;
		}
		$href = get_permalink($ays_post->ID);
		echo "<a href='".$href."' class='ayslink_serial'>".$innerlink."</a>";
	}
	echo "</div>";
$color_prefix="#";
?>
	<style>
	div#aysdiv_container {
		height:<?php echo $ays_height; ?>px;
		width: 100%;
		border:<?php echo $ays_box_border_thickness.'px';?> solid <?php echo $color_prefix.$ays_box_border_color; ?>;
		background-color:<?php echo $color_prefix.$ays_box_background; ?>;
        border-radius: <?php echo $ays_box_border_radius;?>px;
		position: relative;
		
	}	
    div#aysdiv_container:hover {
        box-shadow: <?php echo $ays_box_shadow; ?>;
	}

	a.ayslink_serial {
		background-color:<?php echo $color_prefix.$ays_link_background; ?>;
		color:<?php echo $color_prefix.$ays_link_color; ?>;
		padding:<?php echo $ays_link_padding?>px;
		border-radius: <?php echo $ays_link_border_radius; ?>px;
		-webkit-border-radius: <?php echo $ays_link_border_radius; ?>px;  
		-moz-border-radius: <?php echo $ays_link_border_radius; ?>px;
		
		cursor:pointer;
		position: absolute;
		display: inline-block;
		text-decoration: none;
		width: auto;
		font-family:<?php echo $ays_link_font; ?>;
		
	}
	</style>

	<script>
		jQuery(document).ready(function() {
			jQuery('#aysdiv_container').find('.ayslink_serial').each(function(){
				var one_a=this;
				setTimeout(function(){aysanimateArt(jQuery(one_a))}, Math.floor(Math.random() * 1000) );
				
		});
			jQuery( ".ayslink_serial" ).mouseover(function() {
			jQuery( this ).stop( true, false );
			jQuery( this ).css("z-index","2");
			jQuery( this ).css("color","<?php echo $color_prefix.$ays_link_hover_color; ?>");
			jQuery( this ).css("border","solid 1px <?php echo $color_prefix.$ays_link_hover_border; ?>");
			jQuery( this ).css("background-color","<?php echo $color_prefix.$ays_link_hover_bg; ?>");
			});
		
		   jQuery( ".ayslink_serial" ).mouseout(function() {
			   aysanimateArt(jQuery(this));
			   jQuery( this ).css("z-index","0");
			   jQuery( this ).css("color","<?php echo $color_prefix.$ays_link_color; ?>");
			   jQuery( this ).css("border","none");
			   jQuery( this ).css("background-color","<?php echo $color_prefix.$ays_link_background; ?>");
			});
		
		});

		function aysnewPosition(cont,serial_link) {
			var h = cont.height() - serial_link.height()-2*parseInt(serial_link.css("padding"));
			var w = cont.width() - serial_link.width()-2*parseInt(serial_link.css("padding"));

			var nh = Math.floor(Math.random() * h);
			var nw = Math.floor(Math.random() * w);

			return [nh, nw];
			
		}
		
		var speed=<?php echo $ays_animate_speed ?>;

		function aysanimateArt(serial_link) {
			var cont = jQuery('#aysdiv_container');
			var new_pos = aysnewPosition(cont,serial_link);

			serial_link.animate({
				top: new_pos[0],
				left: new_pos[1]
				}, Math.floor(speed+(Math.random() * 1000)), function() {
				aysanimateArt(serial_link);
			});

		}

	 
	</script>
<?php
// This is where you run the code and display the output
echo __( 'Hello, World!'.$ays_width.$ays_count_letters, 'WordPress_Random_Posts_and_Pages_domain' );



echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {

$title = ( isset( $instance[ 'title' ] ) ) ? $instance[ 'title' ] :  __( 'AYS random internal links', 'WordPress_Random_Posts_and_Pages_domain' );
$ays_width = ( isset( $instance[ 'ays_width' ] ) ) ? $instance[ 'ays_width' ] :  __( '270', 'WordPress_Random_Posts_and_Pages_domain' );
$ays_height = ( isset( $instance[ 'ays_height' ] ) ) ? $instance[ 'ays_height' ] :  __( '300', 'WordPress_Random_Posts_and_Pages_domain' );
$ays_box_background = ( isset( $instance[ 'ays_box_background' ] ) ) ? $instance[ 'ays_box_background' ] :  __( 'cedfe0', 'WordPress_Random_Posts_and_Pages_domain' );
$ays_box_border_color = ( isset( $instance[ 'ays_box_border_color' ] ) ) ? $instance[ 'ays_box_border_color' ] :  __( '004466', 'WordPress_Random_Posts_and_Pages_domain' );

$ays_box_border_thickness = ( isset($instance['ays_box_border_thickness'])) ? $instance['ays_box_border_thickness'] : __('3', 'WordPress_Random_Posts_and_Pages_domain' );
$ays_box_border_radius = ( isset( $instance[ 'ays_box_border_radius' ] ) ) ? $instance[ 'ays_box_border_radius' ] :  __( '10', 'WordPress_Random_Posts_and_Pages_domain' );
$ays_box_shadow = ( isset( $instance[ 'ays_box_shadow' ] ) ) ? $instance[ 'ays_box_shadow' ] :  __( '0px 0px 6px 8px #BCE7E9', 'WordPress_Random_Posts_and_Pages_domain' );
    
    
$ays_count_links = ( isset( $instance[ 'ays_count_links' ] ) ) ? $instance[ 'ays_count_links' ] :  __( '5', 'WordPress_Random_Posts_and_Pages_domain' );
$ays_count_letters = ( isset( $instance[ 'ays_count_letters' ] ) ) ? $instance[ 'ays_count_letters' ] :  __( '15', 'WordPress_Random_Posts_and_Pages_domain' );

$ays_link_background = ( isset( $instance[ 'ays_link_background' ] ) ) ? $instance[ 'ays_link_background' ] :  __( '808080', 'WordPress_Random_Posts_and_Pages_domain' );
$ays_link_color = ( isset( $instance[ 'ays_link_color' ] ) ) ? $instance[ 'ays_link_color' ] :  __( 'FFFFFF', 'WordPress_Random_Posts_and_Pages_domain' );
$ays_link_padding = ( isset( $instance[ 'ays_link_padding' ] ) ) ? $instance[ 'ays_link_padding' ] :  __( '4', 'WordPress_Random_Posts_and_Pages_domain' );
$ays_link_border_radius = ( isset( $instance[ 'ays_link_border_radius' ] ) ) ? $instance[ 'ays_link_border_radius' ] :  __( '3', 'WordPress_Random_Posts_and_Pages_domain' );
$ays_link_font = ( isset( $instance[ 'ays_link_font' ] ) ) ? $instance[ 'ays_link_font' ] :  __( 'arial', 'WordPress_Random_Posts_and_Pages_domain' );
$ays_animate_speed = ( isset( $instance[ 'ays_animate_speed' ] ) ) ? $instance[ 'ays_animate_speed' ] :  __( '1400', 'WordPress_Random_Posts_and_Pages_domain' );
$ays_link_hover_bg = ( isset( $instance[ 'ays_link_hover_bg' ] ) ) ? $instance[ 'ays_link_hover_bg' ] :  __( 'FFFFFF', 'WordPress_Random_Posts_and_Pages_domain' );
$ays_link_hover_color = ( isset( $instance[ 'ays_link_hover_color' ] ) ) ? $instance[ 'ays_link_hover_color' ] :  __( '808080', 'WordPress_Random_Posts_and_Pages_domain' );
$ays_link_hover_border = ( isset( $instance[ 'ays_link_hover_border' ] ) ) ? $instance[ 'ays_link_hover_border' ] :  __( '004466', 'WordPress_Random_Posts_and_Pages_domain' );

// Include our css for admin
wp_enqueue_style( 'ays_widget.css',plugins_url( 'css/ays_widget.css', __FILE__ ) );
// Include our custom jQuery file with WordPress Color Picker dependency
wp_enqueue_script( 'jscolor', plugins_url( 'jscolor/jscolor.js', __FILE__ ), array( 'wp-color-picker' ), false, true ); 

// Widget admin form
?>
<script>
	jscolor.bind();
</script>
<p class="ays_field_section">
	<!-- box title -->
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
	<input class="ays_field" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p class="ays_field_section">
	<!-- box width -->
	<label for="<?php echo $this->get_field_id( 'ays_width' ); ?>"><?php _e( 'Box Width:' ); ?></label> 
	<input class="ays_field" id="<?php echo $this->get_field_id( 'ays_width' ); ?>" name="<?php echo $this->get_field_name( 'ays_width' ); ?>" type="text" value="<?php echo esc_attr( $ays_width ); ?>" />
</p>
<p class="ays_field_section">
	<!-- box height -->
	<label for="<?php echo $this->get_field_id( 'ays_height' ); ?>"><?php _e( 'Box Height:' ); ?></label> 
	<input class="ays_field" id="<?php echo $this->get_field_id( 'ays_height' ); ?>" name="<?php echo $this->get_field_name( 'ays_height' ); ?>" type="text" value="<?php echo esc_attr( $ays_height ); ?>" />
</p>
<p class="ays_field_section">
	<!-- box background color -->
	<label for="<?php echo $this->get_field_id( 'ays_box_background' ); ?>"><?php _e( 'Box background color:' ); ?></label> 
	<input autocomplete="off" class="color" id="<?php echo $this->get_field_id( 'ays_box_background' ); ?>" name="<?php echo $this->get_field_name( 'ays_box_background' ); ?>" type="text" value="<?php echo esc_attr( $ays_box_background ); ?>" />
</p>
<p class="ays_field_section">
	<!-- box border color -->
	<label for="<?php echo $this->get_field_id( 'ays_box_border_color' ); ?>"><?php _e( 'Box border color:' ); ?></label> 
	<input class="color" id="<?php echo $this->get_field_id( 'ays_box_border_color' ); ?>" name="<?php echo $this->get_field_name( 'ays_box_border_color' ); ?>" type="text" value="<?php echo esc_attr( $ays_box_border_color ); ?>" />
</p>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                                                                <!-- Nareks added start -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<p class="ays_field_section">
	<!-- box border thickness -->
	<label for="<?php echo $this->get_field_id( 'ays_box_border_thickness' ); ?>"><?php _e( 'Box border thickness:' ); ?></label> 
	<input class="ays_field" id="<?php echo $this->get_field_id( 'ays_box_border_thickness' ); ?>" name="<?php echo $this->get_field_name( 'ays_box_border_thickness' ); ?>" type="text" value="<?php echo esc_attr( $ays_box_border_thickness ); ?>" />
</p>
<p class="ays_field_section">
	<!-- box border radius -->
	<label for="<?php echo $this->get_field_id( 'ays_box_border_radius' ); ?>"><?php _e( 'Box border radius:' ); ?></label> 
	<input class="ays_field" id="<?php echo $this->get_field_id( 'ays_box_border_radius' ); ?>" name="<?php echo $this->get_field_name( 'ays_box_border_radius' ); ?>" type="text" value="<?php echo esc_attr( $ays_box_border_radius ); ?>" />
</p>
<p class="ays_field_section">
    <!-- box shadow -->
    <label for="<?php echo $this->get_field_id('ays_box_shadow'); ?>"><?php _e('Box shadow:'); ?></label>
    <input class="ays_field" id="<?php echo $this->get_field_id('ays_box_shadow'); ?>" name="<?php echo $this->get_field_name('ays_box_shadow'); ?>" type="text" value="<?php echo esc_attr($ays_box_shadow); ?>" />
</p>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                                                                <!-- Nareks added ended -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<p class="ays_field_section">
	<!-- box links count -->
	<label for="<?php echo $this->get_field_id( 'ays_count_links' ); ?>"><?php _e( 'Links count:' ); ?></label> 
	<input class="ays_field" id="<?php echo $this->get_field_id( 'ays_count_links' ); ?>" name="<?php echo $this->get_field_name( 'ays_count_links' ); ?>" type="text" value="<?php echo esc_attr( $ays_count_links ); ?>" />
</p>
<p class="ays_field_section">
	<!-- links count letters-->
	<label for="<?php echo $this->get_field_id( 'ays_count_letters' ); ?>"><?php _e( 'Quantity letters:' ); ?></label> 
	<input class="ays_field" id="<?php echo $this->get_field_id( 'ays_count_letters' ); ?>" name="<?php echo $this->get_field_name( 'ays_count_letters' ); ?>" type="text" value="<?php echo esc_attr( $ays_count_letters ); ?>" />
</p>

<p class="ays_field_section">
	<!-- links background color -->
	<label for="<?php echo $this->get_field_id( 'ays_link_background' ); ?>"><?php _e( 'Links Background color:' ); ?></label> 
	<input class="color" id="<?php echo $this->get_field_id( 'ays_link_background' ); ?>" name="<?php echo $this->get_field_name( 'ays_link_background' ); ?>" type="text" value="<?php echo esc_attr( $ays_link_background ); ?>" />
</p>
<p class="ays_field_section">
	<!-- links color -->
	<label for="<?php echo $this->get_field_id( 'ays_link_color' ); ?>"><?php _e( 'Links color:' ); ?></label> 
	<input class="color" id="<?php echo $this->get_field_id( 'ays_link_color' ); ?>" name="<?php echo $this->get_field_name( 'ays_link_color' ); ?>" type="text" value="<?php echo esc_attr( $ays_link_color ); ?>" />
</p>
<p class="ays_field_section">
	<!-- links padding -->
	<label for="<?php echo $this->get_field_id( 'ays_link_padding' ); ?>"><?php _e( 'Link padding:' ); ?></label> 
	<input class="ays_field" id="<?php echo $this->get_field_id( 'ays_link_padding' ); ?>" name="<?php echo $this->get_field_name( 'ays_link_padding' ); ?>" type="text" value="<?php echo esc_attr( $ays_link_padding ); ?>" />
</p>
<p class="ays_field_section">
	<!-- links border radius -->
	<label for="<?php echo $this->get_field_id( 'ays_link_border_radius' ); ?>"><?php _e( 'Links border radius:' ); ?></label> 
	<input class="ays_field" id="<?php echo $this->get_field_id( 'ays_link_border_radius' ); ?>" name="<?php echo $this->get_field_name( 'ays_link_border_radius' ); ?>" type="text" value="<?php echo esc_attr( $ays_link_border_radius ); ?>" />
</p>
<p class="ays_field_section">
	<!-- links text font -->
	<label for="<?php echo $this->get_field_id( 'ays_link_font' ); ?>"><?php _e( 'Font:' ); ?></label> 
	<select class="ays_field" name="<?php echo $this->get_field_name( 'ays_link_font' ); ?>" id="<?php echo $this->get_field_id( 'ays_link_font' ); ?>">
		<option <?php if($ays_link_font=="arial") echo "selected"; ?> value="arial">Arial</option>
		<option <?php if($ays_link_font=="lucida grande") echo "selected"; ?> value="lucida grande">Lucida grande</option>
		<option <?php if($ays_link_font=="segoe ui") echo "selected"; ?> value="segoe ui">Segoe ui</option>
		<option <?php if($ays_link_font=="tahoma") echo "selected"; ?> value="tahoma">Tahoma</option>
		<option <?php if($ays_link_font=="trebuchet ms") echo "selected"; ?> value="trebuchet ms">Trebuchet ms</option>
		<option <?php if($ays_link_font=="verdana") echo "selected"; ?> value="verdana">Verdana</option>
	</select>
</p>
<p class="ays_field_section">
	<!-- links animation speed -->
	<label for="<?php echo $this->get_field_id( 'ays_animate_speed' ); ?>"><?php _e( 'Animation speed:' ); ?></label> 
	<select class="ays_field" name="<?php echo $this->get_field_name( 'ays_animate_speed' ); ?>" id="<?php echo $this->get_field_id( 'ays_animate_speed' ); ?>">
		<option <?php if($ays_animate_speed=="700") echo "selected"; ?>  value="700">Fast</option>
		<option <?php if($ays_animate_speed=="1400") echo "selected"; ?>  value="1400">Normal</option>
		<option <?php if($ays_animate_speed=="2300") echo "selected"; ?>  value="2300">Slow</option>
	</select>
</p>
<p class="ays_field_section">
	<!-- links hover background color -->
	<label for="<?php echo $this->get_field_id( 'ays_link_hover_bg' ); ?>"><?php _e( 'Links hover background color:' ); ?></label> 
	<input class="color" id="<?php echo $this->get_field_id( 'ays_link_hover_bg' ); ?>" name="<?php echo $this->get_field_name( 'ays_link_hover_bg' ); ?>" type="text" value="<?php echo esc_attr( $ays_link_hover_bg ); ?>" />
</p>
<p class="ays_field_section">
	<!-- links hover color -->
	<label for="<?php echo $this->get_field_id( 'ays_link_hover_color' ); ?>"><?php _e( 'Links hover color:' ); ?></label> 
	<input class="color" id="<?php echo $this->get_field_id( 'ays_link_hover_color' ); ?>" name="<?php echo $this->get_field_name( 'ays_link_hover_color' ); ?>" type="text" value="<?php echo esc_attr( $ays_link_hover_color ); ?>" />
</p>
<p class="ays_field_section">
	<!-- links hover border color -->
	<label for="<?php echo $this->get_field_id( 'ays_link_hover_border' ); ?>"><?php _e( 'Links hover border color:' ); ?></label> 
	<input class="color" id="<?php echo $this->get_field_id( 'ays_link_hover_border' ); ?>" name="<?php echo $this->get_field_name( 'ays_link_hover_border' ); ?>" type="text" value="<?php echo esc_attr( $ays_link_hover_border ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['ays_width'] = ( ! empty( $new_instance['ays_width'] ) ) ? strip_tags( $new_instance['ays_width'] ) : '';
$instance['ays_height'] = ( ! empty( $new_instance['ays_height'] ) ) ? strip_tags( $new_instance['ays_height'] ) : '';
$instance['ays_box_background'] = ( ! empty( $new_instance['ays_box_background'] ) ) ? strip_tags( $new_instance['ays_box_background'] ) : '';
$instance['ays_box_border_color'] = ( ! empty( $new_instance['ays_box_border_color'] ) ) ? strip_tags( $new_instance['ays_box_border_color'] ) : '';

$instance['ays_box_border_thickness'] = ( ! empty( $new_instance['ays_box_border_thickness'] ) ) ? strip_tags( $new_instance['ays_box_border_thickness'] ) : ''; 
$instance['ays_box_border_radius'] = ( ! empty( $new_instance['ays_box_border_radius'] ) ) ? strip_tags( $new_instance['ays_box_border_radius'] ) : '';     
$instance['ays_box_shadow'] = (!empty($new_instance['ays_box_shadow'])) ? strip_tags($new_instance['ays_box_shadow']) : '';
    
$instance['ays_count_links'] = ( ! empty( $new_instance['ays_count_links'] ) ) ? strip_tags( $new_instance['ays_count_links'] ) : '';
$instance['ays_count_letters'] = ( ! empty( $new_instance['ays_count_letters'] ) ) ? strip_tags( $new_instance['ays_count_letters'] ) : '';
$instance['ays_link_background'] = ( ! empty( $new_instance['ays_link_background'] ) ) ? strip_tags( $new_instance['ays_link_background'] ) : '';
$instance['ays_link_color'] = ( ! empty( $new_instance['ays_link_color'] ) ) ? strip_tags( $new_instance['ays_link_color'] ) : '';
$instance['ays_link_padding'] = ( ! empty( $new_instance['ays_link_padding'] ) ) ? strip_tags( $new_instance['ays_link_padding'] ) : '';
$instance['ays_link_border_radius'] = ( ! empty( $new_instance['ays_link_border_radius'] ) ) ? strip_tags( $new_instance['ays_link_border_radius'] ) : '';
$instance['ays_link_font'] = ( ! empty( $new_instance['ays_link_font'] ) ) ? strip_tags( $new_instance['ays_link_font'] ) : '';
$instance['ays_animate_speed'] = ( ! empty( $new_instance['ays_animate_speed'] ) ) ? strip_tags( $new_instance['ays_animate_speed'] ) : '';
$instance['ays_link_hover_bg'] = ( ! empty( $new_instance['ays_link_hover_bg'] ) ) ? strip_tags( $new_instance['ays_link_hover_bg'] ) : '';
$instance['ays_link_hover_color'] = ( ! empty( $new_instance['ays_link_hover_color'] ) ) ? strip_tags( $new_instance['ays_link_hover_color'] ) : '';
$instance['ays_link_hover_border'] = ( ! empty( $new_instance['ays_link_hover_border'] ) ) ? strip_tags( $new_instance['ays_link_hover_border'] ) : '';

return $instance;
}
} // Class random ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'WordPress_Random_Posts_and_Pages' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
?>
