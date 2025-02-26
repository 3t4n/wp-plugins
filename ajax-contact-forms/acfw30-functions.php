<?php
//languages textdomain settings
add_action('plugins_loaded','acfw30_languages');
function acfw30_languages() {
	load_plugin_textdomain('acfw30', false, dirname( plugin_basename( __FILE__ ) ).'/languages/');
}


//validate_data
function acfw30_validate_data($count, $number, $data){

	if($number=="y") $data=preg_replace('/[^0-9]/', '', $data);
	
	if(strlen($data)>$count){
		$data_len=strlen($data)-$count;
		$data= substr($data, 0, -$data_len);
	}

	return $data;
}

//get url
function acfw30_get_url() {
  $url  = @(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
  $url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
  $url .= $_SERVER["REQUEST_URI"];
  return $url;
}

//Get list contact icons
function acfw30_get_contact_icons(){
	$sp_separator ='<option disabled>-------</option>';
	$sp_icon_list ='
		<option value="fa-phone-square">&#xf098; fa-phone-square</option>
		<option value="fa-phone">&#xf095; fa-phone</option>
		<option value="fa-mobile">&#xf10b; fa-mobile</option>
		<option value="fa-envelope">&#xf0e0; fa-envelope</option>
		<option value="fa-envelope-o">&#xf003; fa-envelope-o</option>
		<option value="fa-comment">&#xf075; fa-comment</option>
		<option value="fa-comment-o">&#xf0e5; fa-comment-o</option>
		<option value="fa-comments-o">&#xf086; fa-comments-o</option>
		<option value="fa-commenting">&#xf27a; fa-commenting</option>
		<option value="fa-commenting-o">&#xf27b; fa-commenting-o</option>
		<option value="fa-pencil">&#xf040; fa-pencil</option>
		<option value="fa-pencil-square">&#xf14b; fa-pencil-square</option>
		<option value="fa-pencil-square-o">&#xf044; fa-pencil-square-o</option>
		<option value="fa-question">&#xf128; fa-question</option>
		<option value="fa fa-question-circle">&#xf059; fa fa-question-circle</option>
		<option value="fa fa-question-circle-o">&#xf29c; fa fa-question-circle-o</option>
		<option value="none">none</option>
	';
	echo $sp_separator;
	do_action('acfw30_add_contact_icons', $sp_icon_list);
	echo $sp_icon_list;
}

//Get icon's symbol
function acfw30_get_icons_symbol($icon_name){
	$icons_symbol_array = array(
		array('NAME'=>'fa-whatsapp', 'ICON' => '&#xf232;'),
		array('NAME'=>'fa-phone-square', 'ICON' => '&#xf098;'),
		array('NAME'=>'fa-phone', 'ICON' => '&#xf095;'),
		array('NAME'=>'fa-mobile', 'ICON' => '&#xf10b;'),
		array('NAME'=>'fa-envelope', 'ICON' => '&#xf0e0;'),
		array('NAME'=>'fa-envelope-o', 'ICON' => '&#xf003;'),
		array('NAME'=>'fa-comment', 'ICON' => '&#xf075;'),
		array('NAME'=>'fa-comments-o', 'ICON' => '&#xf086;'),
		array('NAME'=>'fa-commenting', 'ICON' => '&#xf27a;'),
		array('NAME'=>'fa-commenting-o', 'ICON' => '&#xf27b;'),
		array('NAME'=>'fa-pencil', 'ICON' => '&#xf040;'),
		array('NAME'=>'fa-pencil-square', 'ICON' => '&#xf14b;'),
		array('NAME'=>'fa-pencil-square-o', 'ICON' => '&#xf044;'),
		array('NAME'=>'fa-question', 'ICON' => '&#xf128;'),
		array('NAME'=>'fa-question-circle', 'ICON' => '&#xf059;'),
		array('NAME'=>'fa-question-circle-o', 'ICON' => '&#xf29c;'),
	);

	foreach ($icons_symbol_array as $icons_symbol) {
		if($icons_symbol['NAME'] == $icon_name) return $icons_symbol['ICON'];
	}
}

//get animation class
function acfw30_get_animation_class($acfw30_animation_button) { 
	$acfw30_animation_button = strtolower($acfw30_animation_button);
	if($acfw30_animation_button == 'none'){$animation_class = ' ';}   
    if($acfw30_animation_button == 'rotate'){$animation_class = 'ak86_rotate';}             	
    if($acfw30_animation_button == 'tada'){$animation_class = 'ak86_tada';}   
    if($acfw30_animation_button == 'swing'){$animation_class = 'ak86_swing';}   
    if($acfw30_animation_button == 'grow'){$animation_class = 'ak86_grow';} 
    if($acfw30_animation_button == 'shrink'){$animation_class = 'ak86_shrink';}
    if($acfw30_animation_button == 'buzz'){$animation_class = 'ak86_buzz';} 
    if($acfw30_animation_button == 'forward'){$animation_class = 'ak86_forward';}
    if($acfw30_animation_button == 'backward'){$animation_class = 'ak86_backward';} 
	return $animation_class;
}


add_shortcode('acfw30_title', 'acfw30_title');
function acfw30_title($atts, $content = null) {
	extract( shortcode_atts(array(
		'text' => 'Title',
    ), $atts ) );

	$result = '<div class="title_h3">'.$text.'</div>'; 
	
	return $result;
}

add_shortcode('acfw30_subtitle', 'acfw30_subtitle');
function acfw30_subtitle($atts, $content = null) {
	extract( shortcode_atts(array(
		'text' => 'Subtitle',
    ), $atts ) );

	$result = '<div class="title_h4">'.$text.'</div>'; 
	
	return $result;
}

add_shortcode('acfw30_input_text', 'acfw30_input_text');
function acfw30_input_text($atts, $content = null) {
	extract( shortcode_atts(array(
		'name' => 'acfw30_name',
		'required' => 'y',
		'minlength' => '2',
		'maxlength' => '10',
    ), $atts ) );

	$result = '<input type="text" class="acfw30_input_text" name="'.$name.'" minlength="'.$minlength.'" maxlength="'.$maxlength.'"'; 
	if($required == 'y') $result .= 'required';
	$result .= '>';

	return $result;
}

add_shortcode('acfw30_input_number', 'acfw30_input_number');
function acfw30_input_number($atts, $content = null) {
	extract( shortcode_atts(array(
		'name' => 'acfw30_number',
		'required' => 'y',
		'minlength' => '2',
		'maxlength' => '10',
    ), $atts ) );

	$result = '<input type="number" class="acfw30_input_number" name="'.$name.'" minlength="'.$minlength.'" maxlength="'.$maxlength.'"'; 
	if($required == 'y') $result .= 'required';
	$result .= '>';

	return $result;
}

add_shortcode('acfw30_input_email', 'acfw30_input_email');
function acfw30_input_email($atts, $content = null) {
	extract( shortcode_atts(array(
		'name' => 'acfw30_email',
		'required' => 'y',
    ), $atts ) );

	$result = '<input type="email" class="acfw30_input_email" name="'.$name.'"'; 
	if($required == 'y') $result .= 'required';
	$result .= '>';

	return $result;
}

add_shortcode('acfw30_input_phone', 'acfw30_input_phone');
function acfw30_input_phone($atts, $content = null) {
	extract( shortcode_atts(array(
		'name' => 'acfw30_phone',
		'required' => 'y',
		'mask' => '+7(999)999-9999'
    ), $atts ) );

	$result = '<input type="tel" class="acfw30_input_tel" name="'.$name.'"'; 
	if($required == 'y') $result .= 'required';
	$result .= '>';
	$result .= '<input type="hidden" class="acfw30_tel_mask" value="'.$mask.'">';

	return $result;
}

add_shortcode('acfw30_textarea', 'acfw30_textarea');
function acfw30_textarea($atts, $content = null) {
	extract( shortcode_atts(array(
		'name' => 'acfw30_textarea',
		'required' => 'y',
		'minlength' => '2',
		'maxlength' => '300',
    ), $atts ) );

	$result = '<textarea class="acfw30_textarea" name="'.$name.'" minlength="'.$minlength.'" maxlength="'.$maxlength.'"';
	if($required == 'y') $result .= 'required';
	$result .= '>';
	$result .= '</textarea>';

	return $result;
}

add_shortcode('acfw30_submit', 'acfw30_submit');
function acfw30_submit($atts, $content = null) {
	extract( shortcode_atts(array(
		'name' => 'acfw30_submit',
		'text' => 'Send',
    ), $atts ) );

	$result = '<button type="submit" name="'.$name.'" class="acfw30_submit">'.$text.'</button>';

	return $result;
}

add_shortcode('acfw30_page', 'acfw30_page');
function acfw30_page($atts, $content = null) {
	$result = '<input type="hidden" name="acfw30_page" class="acfw30_page" value="'.acfw30_get_url().'">';
	return $result;
}

add_shortcode('acfw30_ip', 'acfw30_ip');
function acfw30_ip($atts, $content = null) {
	$result = '<input type="hidden" name="acfw30_ip" class="acfw30_ip" value="'.$_SERVER['REMOTE_ADDR'].'">';
	return $result;
}

add_shortcode('acfw30_success_message', 'acfw30_success_message');
function acfw30_success_message($atts, $content = null) {
	extract( shortcode_atts(array(
		'text' => 'Thank you!',
    ), $atts ) );
	$result = '<input type="hidden" name="acfw30_success_message" class="acfw30_success_message" value="'.$text.'">';
	return $result;
}
?>