<?php
/*
Plugin Name: Alivestats - Live Tracker
Plugin URI: https://alivestats.com/wp/
Description: This plugin Tracks Realtime Live Visitors Feed.
Author: Techniblogic
Version: 1.0.1
Author URI: http://www.techniblogic.com/
License:           GPL-2.0+
License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
class LiveTracker extends WP_Widget
{
	function LiveTracker() {
		$widget_options = array(
		'classname'		=>		'The Ultimate Live Tracker',
		'description' 	=>		'This plugin Tracks Realtime Live Visitors.'
		);
		
		parent::WP_Widget('simple_widget', 'The Ultimate Live Tracker', $widget_options);
	}
	
	function widget( $args, $instance ) {
		extract ( $args, EXTR_SKIP );
		$title = ( $instance['title'] ) ? $instance['title'] : ' ';
		$body = ( $instance['body'] ) ? $instance['body'] : 'This plugin Tracks Realtime Live Visitors.'
		?>
		<?php echo $before_widget ?>
		<?php echo $before_title . $title . $after_title ?>
		<p><?php //Widget
		$x=" <center><script> var color='red';";
	
	if(get_option('live_BorderRadius')=='30')
	$x.="var nim_border_r=false;";
	else
	$x.="var nim_border_r=".get_option('live_BorderRadius').";";
	
	if(get_option('live_Width')=="122")
	$x.="var nim_width=false;";
	else
	$x.="var nim_width=".get_option('live_Width').";";
	
	if(get_option('live_BackgroundColor')=="F04949")
	$x.="var nim_bgcolor=false;";
	else
	$x.="var nim_bgcolor='".get_option('live_BackgroundColor')."';";
	
	if(get_option('live_BorderColor')=="FFFFFF")
	$x.="var nim_border_c=false;";
	else
	$x.="var nim_border_c='".get_option('live_BorderColor')."';";
	
	if(get_option('live_TextColor')=="FFFFFF")
	$x.="var nim_color=false;";
	else
	$x.="var nim_color='".get_option('live_TextColor')."';";
	
	if(get_option('live_OnlineSize')=='17')
	$x.="var nim_online_size=false;";
	else
	$x.="var nim_online_size=".get_option('live_OnlineSize').";";
	
	if(get_option('live_CounterValuesSize')=='15')
	$x.="var nim_counter_size=false;";
	else
	$x.="var nim_counter_size=".get_option('live_CounterValuesSize').";";
	
	if(get_option('live_CounterHeadingSize')=='14')
	$x.="var nim_counter_h_size=false;";
	else
	$x.="var nim_counter_h_size=".get_option('live_CounterHeadingSize').";";
	
	if(get_option('live_Line')=='true')
	$x.="var nim_count=true;";
	else
	$x.="var nim_count=false;";
		
		$x.="</script> <script type='text/javascript' src='https://alivestats.com/widget.js'></script> <br><a href='https://alivestats.com' target='_blank' title='Free Visitor Tracking Widget'>Free Visitor Tracking Widget</a></center>"	;
		echo $x;
		?></p>
		<?php 
	}
	
	function update($new_instance,$old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
	
		
		return $instance;
	}
	
	function form( $instance ) {
		?>
		<br>
<label for="<?php echo $this->get_field_id('title'); ?>">
		Title: 
		<input  id="<?php echo $this->get_field_id('title'); ?>"
				name="<?php echo $this->get_field_name('title'); ?>"
				value="<?php echo $instance['title']  ?>" />
		</label><br><br>
        You can customize the widget look and feel <a href="<?php echo admin_url( 'options-general.php?page=live-nimlinks'); ?>">Here</a>
		<br><br><br>
		<?php 
	}
	
}
	
function LiveTracker_init() {
	register_widget("LiveTracker");
}
add_action('widgets_init','LiveTracker_init');

function cccomm_option_page()
{	if (  ! empty( $_POST ) && check_admin_referer('cccomm_admin_options-update') )
	{
		
		
		update_option( 'live_BorderRadius', $_POST['live_BorderRadius']);
		update_option( 'live_Width', $_POST['live_Width']);
		update_option( 'live_BackgroundColor', $_POST['live_BackgroundColor']);
		update_option( 'live_BorderColor', $_POST['live_BorderColor']);
		update_option( 'live_TextColor', $_POST['live_TextColor']);
		update_option( 'live_OnlineSize', $_POST['live_OnlineSize']);
		update_option( 'live_CounterValuesSize', $_POST['live_CounterValuesSize']);
		update_option( 'live_CounterHeadingSize', $_POST['live_CounterHeadingSize']);
		update_option( 'live_Line', $_POST['live_Line']);
			update_option( 'live_Recent', $_POST['live_Recent']);
		?>
		<div id="message" class="updated">Live Tracking Widget is Updated</div>
		<?php
	}
	
	?>
	<div class="wrap">
	<?php screen_icon(); ?>
	<h2>The Ultimate Live Tracker - Widget Customizer</h2>
	 by <a href='https://alivestats.com'>Alivestats.com</a>
    <script type="text/javascript" src="<?php echo plugins_url().'/alivestats-live-tracker/jscolor.js'?>"></script>
    <hr>
    <h2>Customize Settings</h2>
    <table border="0">
    <tr>
    <td>
   <?php
	if(get_option('live_Recent')!="1"  ){
		update_option( 'live_BorderRadius', '35');
		update_option( 'live_Width', '138');
		update_option( 'live_BackgroundColor', 'F04949');
		update_option( 'live_BorderColor', 'FFFFFF');
		update_option( 'live_TextColor', 'FFFFFF');
		update_option( 'live_OnlineSize', '19');
		update_option( 'live_CounterValuesSize', '15');
		update_option( 'live_CounterHeadingSize', '16');
		update_option( 'live_Line', '');
		update_option( 'live_Recent', '1');
	}
	
	?>
    <form action="" method="post" id="cc-comments-email-options-form">
   



    
	
    
    <h3><label for="live_BorderRadius">Border Radius: </label> <input
		type="range" min="1" max="35" id="live_BorderRadius"   name="live_BorderRadius"
		value="<?php echo esc_attr( get_option('live_BorderRadius') ); ?>"  onchange="showValue(this.value)" onSelect="showValue(this.value)" /></h3>
        
	  <h3><label for="live_Width">Width: </label> <input
		type="range" min="120" max="400" id="live_Width"  name="live_Width"
		value="<?php echo esc_attr( get_option('live_Width') ); ?>" onchange="wsize(this.value)" onSelect="wsize(this.value)" /></h3>
        
          <h3><label for="live_BackgroundColor">Background Color: </label> <input
		type="text" id="live_BackgroundColor" class="color"  name="live_BackgroundColor"
		value="<?php echo "#".esc_attr( get_option('live_BackgroundColor') ); ?>" onchange="bgcolor(this.value)" onSelect="bgcolor(this.value)"/></h3>
        
          <h3><label for="live_BorderColor">Border Color: </label> <input
		type="text" id="live_BorderColor" class="color"  name="live_BorderColor"
		value="<?php echo "#".esc_attr( get_option('live_BorderColor') ); ?>" onchange="bcolor(this.value)" onSelect="bcolor(this.value)"/></h3>
        
          <h3><label for="live_TextColor nim_color">Text Color: </label> <input
		type="text" id="live_TextColor" class="color"  name="live_TextColor"
		value="<?php echo "#".esc_attr( get_option('live_TextColor') ); ?>" onchange="tcolor(this.value)" onSelect="tcolor(this.value)"/></h3>
        
          <h3><label for="live_OnlineSize">Online Text Size: </label> <input
		type="range" min="10" max="60" id="live_OnlineSize"  name="live_OnlineSize"
		value="<?php echo esc_attr( get_option('live_OnlineSize') ); ?>" onchange="osize(this.value)" onSelect="osize(this.value)"/></h3>
        
        
       <!-- Hidden id-->
          <h3 style='display:none;'><label for="live_Recent">live_Recent: </label> <input
		type="text"  id="live_Recent"  name="live_Recent"
		value="1" /></h3>
        
        
          <h3><label for="live_CounterValuesSize">Vistors Counter Value Size: </label> <input
		type="range" min="10" max="60" id="live_CounterValuesSize"  name="live_CounterValuesSize"
		value="<?php echo esc_attr( get_option('live_CounterValuesSize') ); ?>" onchange="csize(this.value)" onSelect="csize(this.value)"/></h3>
        
          <h3><label for="live_CounterHeadingSize">Heading Size <em style="font-size:11px">(Visitors Counted)</em>: </label> <input
		type="range" min="10" max="60" id="live_CounterHeadingSize"   name="live_CounterHeadingSize"
		value="<?php echo esc_attr( get_option('live_CounterHeadingSize') ); ?>" onchange="tcsize(this.value)" onSelect="tcsize(this.value)"/></h3>
        
          <h3><label for="live_Line">Counter Values (Next Line): </label> <input
		type="checkbox" id="live_Line"   name="live_Line" <?php if( get_option('live_Line')=='true'){echo "checked='checked'";} ?> onclick="live_count()" value='true'/></h3>
    
    <p><input type="submit" name="submit" value="Update" class="button-primary button"/></p>
	<?php wp_nonce_field('cccomm_admin_options-update'); ?>
	</form></td><td width="100px"></td><td>
	<style>
.nim_button{font:15px Calibri,Arial,sans-serif;text-shadow:1px 1px 0 rgba(255,255,255,.4);text-decoration:none!important;white-space:nowrap;display:inline-block;vertical-align:baseline;position:relative;cursor:pointer;padding:10px 20px;background-repeat:no-repeat;background-image:url(https://alivestats.com/widget/widget_bg.png);background-repeat:repeat-x;background-position:bottom left,top right,0 0,0 0;background-clip:border-box;-moz-border-radius:8px;-webkit-border-radius:8px;border-radius:8px;-moz-box-shadow:0 0 1px #fff inset;-webkit-box-shadow:0 0 1px #fff inset;box-shadow:0 0 1px #fff inset;-webkit-transition:background-position 1s;-moz-transition:background-position 1s;transition:background-position 1s;outline:0;border-bottom:1px dotted #97cae6;color:#97cae6}
.nim_button:hover{border-bottom:1px dashed transparent;background-position:top left,bottom right,0 0,0 0}
.nim_button:active{bottom:-1px}
.nim_button.big{font-size:30px}
.nim_button.rounded{-moz-border-radius:4em;-webkit-border-radius:4em;border-radius:4em}
.red.nim_button{font-size:14px;color:#fff;border:1px solid #FFF;background-color:#F04949;text-shadow:none;background-image:url(widget_bg.png),url(widget_bg.png),-moz-radial-gradient(center,ellipse cover,#ef6b6b 0,#f04949 100%),-webkit-gradient(radial,center center,0,center center,100%,color-stop(0%,#ef6b6b),color-stop(100%,#f04949))}
.red.nim_button:hover{background-color:#F04949;background-image:url(widget_bg.png),url(widget_bg.png),-moz-radial-gradient(center,ellipse cover,#f04949 0,#ef6b6b 100%),-webkit-gradient(radial,center center,0,center center,100%,color-stop(0%,#f04949),color-stop(100%,#ef6b6b))}



</style>
<h2>Demo:</h2>
	  <center>  <a href='#' class='nim_button big red rounded' id="nim_button" target='_blank' title='Check Here for Live RealTime Tracking' style='padding:6px 15px 6px 17px;' ><font size='3px'>
<center id="nim_online">
 Online: 58
</center>
</font><center><span id="nim_counted">Visitors Counted : </span><b id='nim_counter' style="display:inline">3454354</b></center></a><br><a href='http://alivestats.com' target='_blank' title='Free Visitor Tracking Widget'>Free Visitor Tracking Widget</a></center></td>
<td width="70px"></td><td>
<div style="float:right;background-color:white;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;margin-left:20px;padding:10px;">
<img src='http://alivestats.com/beta/stats/dark-logo.png' alt="live logo" border="0" /><br>
<b><em><h3>The Ultimate Live Tracker</h3></em></b>
<em style="float:right"> by <a href="http://alivestats.com" title="The Ultimate Live Tracker" target="_blank">Alivestats.com</a></em><br><br>
<b>Creator:</b><br>Nimish Gupta<br>
Vivek Raj Agarwal<br><br>
<center>
<a href="http://alivestats.com/wpfeed" target="_blank" ><img src='<?php echo plugins_url().'/alivestats-live-tracker/banner.PNG'?>' alt="Live Tracking Feed New Widget" border="0" width="150px" /></a><br></center>
If It Helps (Donate) :
<!-- Donation Btn Starts-->
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="ngupta93@gmail.com">
<input type="hidden" name="lc" value="IN">
<input type="hidden" name="item_name" value="Donation">
<input type="hidden" name="button_subtype" value="services">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/btn/btn_donateCC_LG.gif" width="1" height="1">
</form></div>
<!--Donation Btn Ends-->


</td>

</tr></table>

<script type="text/javascript">
function showValue(newValue)
{
	document.getElementById("nim_button").style.borderRadius=newValue+"px";
}
function bgcolor(newValue)
{
	document.getElementById("nim_button").style.backgroundColor="#"+newValue;
}
function bcolor(newValue)
{
	document.getElementById("nim_button").style.borderColor="#"+newValue;
}
function tcolor(newValue)
{
	document.getElementById("nim_button").style.color="#"+newValue;
}

function live_count()
{
if (document.getElementById('live_Line').checked) {
 document.getElementById("nim_counter").style.display="block";
}
else{
	 document.getElementById("nim_counter").style.display="inline";
	
	}
}

function csize(newValue)
{
	document.getElementById("nim_counter").style.fontSize=newValue+"px";
}
function tcsize(newValue)
{
	document.getElementById("nim_counted").style.fontSize=newValue+"px";
}
function osize(newValue)
{
	document.getElementById("nim_online").style.fontSize=newValue+"px";
}
function wsize(newValue)
{
	document.getElementById("nim_button").style.minWidth=newValue+"px";
}


function demo(){
	
document.getElementById("nim_button").style.borderRadius=live_BorderRadius.value+"px";
document.getElementById("nim_button").style.backgroundColor="#"+live_BackgroundColor.value;
document.getElementById("nim_button").style.borderColor="#"+live_BorderColor.value;
document.getElementById("nim_button").style.color="#"+live_TextColor.value;

if (document.getElementById('live_Line').checked) {
 document.getElementById("nim_counter").style.display="block";
}
else{
	 document.getElementById("nim_counter").style.display="inline";
	}

document.getElementById("nim_counter").style.fontSize=live_CounterValuesSize.value+"px";
document.getElementById("nim_counted").style.fontSize=live_CounterHeadingSize.value+"px";
document.getElementById("nim_online").style.fontSize=live_OnlineSize.value+"px";
document.getElementById("nim_button").style.minWidth=live_Width.value+"px";


	}
	

window.onload = function () { demo(); }




</script>





	</div>
	<?php
}
function cccomm_plugin_menu()
{
	add_options_page('The Ultimate Live Tracker : Settings','The Ultimate Live Tracker', 'manage_options', 'live-nimlinks', 'cccomm_option_page');
}
add_action('admin_menu', 'cccomm_plugin_menu');