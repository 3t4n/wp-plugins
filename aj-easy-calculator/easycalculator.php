<?php

/**
 * Plugin Name: Easy Calculator
 * Plugin URI: http://vofoxsolutions.com
 * Description: A plug-in to insert a calculator at anywhere in your Wordpress site for easy calculations. This tool will come handy in real sites like real estate and subscription websites.
 * Version: 1.0.4
 * Author: Ajanth R
 * Author URI: http://vofoxsolutions.com
 */
 
	function easy_calculator() {
		$aj = rand(1,10000);
		$calculator =	'<style>
						.aj-box
						{
						background-color:#5d6563 !important;
						width:100% !important;
						border-radius:10px !important;
						position:relative !important;
						max-width:250px;
						padding-bottom:20px;
						} 
						.aj-display
						{
						background-color:#222 !important;
						width:92% !important;
						position:relative !important;
						left:4% !important;
						top:20px !important;
						height:40px !important;
						margin-bottom:22px;
						}
						.aj-display input
						{
						position:relative !important;
						left:2px !important;
						top:2px !important;
						height:35px !important;
						color:black !important;
						background-color:#bccd95 !important;
						font-size:21px !important;
						text-align:right !important;
						width:96.5%;
						} 
						.aj-box p
						{
						margin-bottom:6px;
						}
						.aj-keys
						{
						position:relative !important;
						top:15px !important;
						}
						.aj-button
						{
						width:19% !important;
						height:30px !important;
						border:none !important;
						border-radius:8px !important;
						margin-left:5% !important;
						cursor:pointer !important;
						border-top:2px solid transparent !important;
						}
						.aj-button.aj-gray
						{
						color:white !important;
						background-color:#6f6f6f !important;
						border-bottom:black 2px solid !important;
						border-top:2px #6f6f6f solid !important;
						margin-left:5% !important;
						}
						.aj-button.aj-pink
						{
						color:black !important;
						background-color:#ff4561 !important;
						border-bottom:black 2px solid !important;
						}
						.aj-button.aj-black
						{
						color:white !important;
						background-color:#303030 !important;
						border-bottom:black 2px solid !important;
						border-top:2px #303030 solid !important;
						}
						.aj-button.aj-orange
						{
						color:black !important;
						background-color:#FF9933 !important;
						border-bottom:black 2px solid !important;
						border-top:2px #FF9933 solid !important;
						}
						.aj-gray:active
						{
						border-top:black 2px solid !important;
						border-bottom:2px #6f6f6f solid !important;
						}
						.aj-pink:active
						{
						border-top:black 2px solid !important;
						border-bottom:#ff4561 2px solid !important;
						}
						.aj-black:active
						{
						border-top:black 2px solid !important;
						border-bottom:#303030 2px solid !important;
						}
						.aj-orange:active
						{
						border-top:black 2px solid !important;
						border-bottom:#FF9933 2px solid !important;
						}
						</style>
						<div class="aj-box">
						<div class="aj-display"><input type="text" readonly size="18" id="d'.$aj.'"></div>
						<div class="aj-keys">
							<p><input style="margin-left:18px;" type="button" class="aj-button aj-gray" 
							value="mrc" onclick=\'mrc'.$aj.'()\'><input type="button" class="aj-button aj-gray" 
							value="m-" onclick=\'mm'.$aj.'()\'><input type="button" class="aj-button aj-gray" value="m+"
							onclick=\'mp'.$aj.'()\'><input type="button" class="aj-button aj-pink" 
							value="/" onclick=\'v'.$aj.'("/")\'></p>
							<p><input type="button" class="aj-button aj-black" 
							value="7" onclick=\'v'.$aj.'("7")\'><input type="button" 
							class="aj-button aj-black" value="8" onclick=\'v'.$aj.'("8")\'><input type="button" class="aj-button aj-black" value="9" 
							onclick=\'v'.$aj.'("9")\'><input type="button" 
							class="aj-button aj-pink" value="*" onclick=\'v'.$aj.'("*")\'></p>
							<p><input type="button" class="aj-button aj-black" 
							value="4" onclick=\'v'.$aj.'("4")\'><input type="button" 
							class="aj-button aj-black" value="5" onclick=\'v'.$aj.'("5")\'><input type="button" class="aj-button aj-black" value="6" 
							onclick=\'v'.$aj.'("6")\'><input type="button" 
							class="aj-button aj-pink" value="-" onclick=\'v'.$aj.'("-")\'></p>
							<p><input type="button" class="aj-button aj-black" 
							value="1" onclick=\'v'.$aj.'("1")\'><input type="button" 
							class="aj-button aj-black" value="2" onclick=\'v'.$aj.'("2")\'><input type="button" class="aj-button aj-black" value="3" 
							onclick=\'v'.$aj.'("3")\'><input type="button" 
							class="aj-button aj-pink" value="+" onclick=\'v'.$aj.'("+")\'></p>
							<p><input type="button" class="aj-button aj-black" 
							value="0" onclick=\'v'.$aj.'("0")\'><input type="button" 
							class="aj-button aj-black" value="." onclick=\'v'.$aj.'(".")\'><input type="button" class="aj-button aj-black" value="C" 
							onclick=\'c'.$aj.'("")\'><input type="button" 
							class="aj-button aj-orange" value="=" onclick=\'e'.$aj.'()\'></p>
						</div>
						</div>
						<script>
						var ajm'.$aj.' = "";
						function mp'.$aj.'()
						{
						ajm'.$aj.' = document.getElementById("d'.$aj.'").value;
						}
						function mm'.$aj.'()
						{
						ajm'.$aj.' = "";
						}
						function mrc'.$aj.'()
						{
						document.getElementById("d'.$aj.'").value=ajm'.$aj.';
						}
						function c'.$aj.'(val)
						{
						document.getElementById("d'.$aj.'").value=val;
						}
						function v'.$aj.'(val)
						{
						document.getElementById("d'.$aj.'").value+=val;
						}
						function e'.$aj.'() 
						{ 
						try 
						{ 
						  c'.$aj.'(eval(document.getElementById("d'.$aj.'").value)) 
						} 
						catch(e) 
						{
						  c'.$aj.'(\'Error\') 
						} 
						}  
						</script>';

return $calculator;
  
	}

// Creating the widget 
class aj_easy_calculator extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'aj_easy_calculator', 

// Widget name will appear in UI
__('Calculator Widget', 'aj_easy_calculator_domain'), 

// Widget description
array( 'description' => __( 'Sample widget to display a basic calculator on your wordpress blog/site', 'aj_easy_calculator_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
$aj = rand(1,10000);
$calculator =	'<style>
						.aj-box
						{
						background-color:#5d6563 !important;
						width:100% !important;
						border-radius:10px !important;
						position:relative !important;
						max-width:250px;
						padding-bottom:20px;
						} 
						.aj-display
						{
						background-color:#222 !important;
						width:92% !important;
						position:relative !important;
						left:4% !important;
						top:20px !important;
						height:40px !important;
						margin-bottom:22px;
						}
						.aj-display input
						{
						position:relative !important;
						left:2px !important;
						top:2px !important;
						height:35px !important;
						color:black !important;
						background-color:#bccd95 !important;
						font-size:21px !important;
						text-align:right !important;
						width:96.5%;
						} 
						.aj-box p
						{
						margin-bottom:6px;
						}
						.aj-keys
						{
						position:relative !important;
						top:15px !important;
						}
						.aj-button
						{
						width:19% !important;
						height:30px !important;
						border:none !important;
						border-radius:8px !important;
						margin-left:5% !important;
						cursor:pointer !important;
						border-top:2px solid transparent !important;
						}
						.aj-button.aj-gray
						{
						color:white !important;
						background-color:#6f6f6f !important;
						border-bottom:black 2px solid !important;
						border-top:2px #6f6f6f solid !important;
						margin-left:5% !important;
						}
						.aj-button.aj-pink
						{
						color:black !important;
						background-color:#ff4561 !important;
						border-bottom:black 2px solid !important;
						}
						.aj-button.aj-black
						{
						color:white !important;
						background-color:#303030 !important;
						border-bottom:black 2px solid !important;
						border-top:2px #303030 solid !important;
						}
						.aj-button.aj-orange
						{
						color:black !important;
						background-color:#FF9933 !important;
						border-bottom:black 2px solid !important;
						border-top:2px #FF9933 solid !important;
						}
						.aj-gray:active
						{
						border-top:black 2px solid !important;
						border-bottom:2px #6f6f6f solid !important;
						}
						.aj-pink:active
						{
						border-top:black 2px solid !important;
						border-bottom:#ff4561 2px solid !important;
						}
						.aj-black:active
						{
						border-top:black 2px solid !important;
						border-bottom:#303030 2px solid !important;
						}
						.aj-orange:active
						{
						border-top:black 2px solid !important;
						border-bottom:#FF9933 2px solid !important;
						}
						</style>
						<div class="aj-box">
						<div class="aj-display"><input type="text" readonly size="18" id="d'.$aj.'"></div>
						<div class="aj-keys">
							<p><input style="margin-left:18px;" type="button" class="aj-button aj-gray" 
							value="mrc" onclick=\'mrc'.$aj.'()\'><input type="button" class="aj-button aj-gray" 
							value="m-" onclick=\'mm'.$aj.'()\'><input type="button" class="aj-button aj-gray" value="m+"
							onclick=\'mp'.$aj.'()\'><input type="button" class="aj-button aj-pink" 
							value="/" onclick=\'v'.$aj.'("/")\'></p>
							<p><input type="button" class="aj-button aj-black" 
							value="7" onclick=\'v'.$aj.'("7")\'><input type="button" 
							class="aj-button aj-black" value="8" onclick=\'v'.$aj.'("8")\'><input type="button" class="aj-button aj-black" value="9" 
							onclick=\'v'.$aj.'("9")\'><input type="button" 
							class="aj-button aj-pink" value="*" onclick=\'v'.$aj.'("*")\'></p>
							<p><input type="button" class="aj-button aj-black" 
							value="4" onclick=\'v'.$aj.'("4")\'><input type="button" 
							class="aj-button aj-black" value="5" onclick=\'v'.$aj.'("5")\'><input type="button" class="aj-button aj-black" value="6" 
							onclick=\'v'.$aj.'("6")\'><input type="button" 
							class="aj-button aj-pink" value="-" onclick=\'v'.$aj.'("-")\'></p>
							<p><input type="button" class="aj-button aj-black" 
							value="1" onclick=\'v'.$aj.'("1")\'><input type="button" 
							class="aj-button aj-black" value="2" onclick=\'v'.$aj.'("2")\'><input type="button" class="aj-button aj-black" value="3" 
							onclick=\'v'.$aj.'("3")\'><input type="button" 
							class="aj-button aj-pink" value="+" onclick=\'v'.$aj.'("+")\'></p>
							<p><input type="button" class="aj-button aj-black" 
							value="0" onclick=\'v'.$aj.'("0")\'><input type="button" 
							class="aj-button aj-black" value="." onclick=\'v'.$aj.'(".")\'><input type="button" class="aj-button aj-black" value="C" 
							onclick=\'c'.$aj.'("")\'><input type="button" 
							class="aj-button aj-orange" value="=" onclick=\'e'.$aj.'()\'></p>
						</div>
						</div>
						<script>
						var ajm'.$aj.' = "";
						function mp'.$aj.'()
						{
						ajm'.$aj.' = document.getElementById("d'.$aj.'").value;
						}
						function mm'.$aj.'()
						{
						ajm'.$aj.' = "";
						}
						function mrc'.$aj.'()
						{
						document.getElementById("d'.$aj.'").value=ajm'.$aj.';
						}
						function c'.$aj.'(val)
						{
						document.getElementById("d'.$aj.'").value=val;
						}
						function v'.$aj.'(val)
						{
						document.getElementById("d'.$aj.'").value+=val;
						}
						function e'.$aj.'() 
						{ 
						try 
						{ 
						  c'.$aj.'(eval(document.getElementById("d'.$aj.'").value)) 
						} 
						catch(e) 
						{
						  c'.$aj.'(\'Error\') 
						} 
						}  
						</script>';
echo __( $calculator, 'aj_easy_calculator_domain' );
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Easy Calculator', 'aj_easy_calculator_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class aj_easy_calculator ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'aj_easy_calculator' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
add_shortcode('easy_cal','easy_calculator');
?>