<?php
/*
Plugin Name: AVVO Star Rating Plugin for Lawyers
Plugin URI: http://wiserbrand.com/blog/
Description: Plugin to show your star Avvo rating anywhere throughout your website. Automatically updates rating as it changes on Avvo.
Version: 1.0
Author: Wiserbrand.com
Author URI: http://wiserbrand.com/
License: GPL2
*/
?>
<?php
/*  Copyright 2017 Dmitry Fedoryaka  (email : dmitry@wiserbrand.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php 
	function avvowiserrating_function($atts) {
	$context = stream_context_create(array(
    	'http' => array(
        	'header' => array('User-Agent: '.$_SERVER['HTTP_USER_AGENT']),
    	),
	));
		extract(shortcode_atts(array(
		"acc" => '',
    ), $atts));	
	if(!function_exists('file_get_html')){
		require_once('simple_html_dom.php');
	}
	$links = array(
		"$acc",
	);
foreach ($links as $l){
    $htmlget = file_get_contents($l, false, $context);
    $html = str_get_html($htmlget);
    $a = $html->find('.small');
    $muted = $html->find('.small .text-muted');
    $countmuted = count($muted);
	$b = $html->find('.u-font-size-large');
	$red = $html->find('.u-text-color-red');
    $countred = count($red);
	$homerating = get_option('home');
	$all_rating_options = get_option('avvo_rating_options');
if($homerating == $all_rating_options['my_rating_text']){
	if($b[0]->content > 4.5&&$countmuted == 1&&$countred == 4){
		return '<p itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue" content="'.$b[0]->content.'"><span style="color:#f1c40f">&#9733;&#9733;&#9733;&#9733;&#9733;</span> based on <a target="_blank" rel="nofollow" style="color: #337ab7 !important; font-weight: 400;" href="'.$acc.'"><span style="color: #337ab7 !important; font-weight: 400;" itemprop="reviewCount">'.$a[0]->content.'</span> AVVO reviews</a></p><br/>';
	}
	if($b[0]->content > 3.5&&$b[0]->content <= 4.5&&$countmuted == 1&&$countred == 4){
		return '<p itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue" content="'.$b[0]->content.'"><span style="color:#f1c40f">&#9733;&#9733;&#9733;&#9733;</span> based on <a target="_blank" rel="nofollow" style="color: #337ab7 !important; font-weight: 400;" href="'.$acc.'"><span style="color: #337ab7 !important; font-weight: 400;" itemprop="reviewCount">'.$a[0]->content.'</span> AVVO reviews</a></p><br/>';
	}
	if($b[0]->content > 2.5&&$b[0]->content <= 3.5&&$countmuted == 1&&$countred == 4){
		return '<p itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue" content="'.$b[0]->content.'"><span style="color:#f1c40f">&#9733;&#9733;&#9733;</span> based on <a target="_blank" rel="nofollow" style="color: #337ab7 !important; font-weight: 400;" href="'.$acc.'"><span style="color: #337ab7 !important; font-weight: 400;" itemprop="reviewCount">'.$a[0]->content.'</span> AVVO reviews</a></p><br/>';
	}
	if($b[0]->content > 1.5&&$b[0]->content <= 2.5&&$countmuted == 1&&$countred == 4){
		return '<p itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue" content="'.$b[0]->content.'"><span style="color:#f1c40f">&#9733;&#9733;</span> based on <a target="_blank" rel="nofollow" style="color: #337ab7 !important; font-weight: 400;" href="'.$acc.'"><span style="color: #337ab7 !important; font-weight: 400;" itemprop="reviewCount">'.$a[0]->content.'</span> AVVO reviews</a></p><br/>';
	}
	if($b[0]->content > 0.5&&$b[0]->content <= 1.5&&$countmuted == 1&&$countred == 4){
		return '<p itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue" content="'.$b[0]->content.'"><span style="color:#f1c40f">&#9733;</span> based on <a target="_blank" rel="nofollow" style="color: #337ab7 !important; font-weight: 400;" href="'.$acc.'"><span style="color: #337ab7 !important; font-weight: 400;" itemprop="reviewCount">'.$a[0]->content.'</span> AVVO reviews</a></p><br/>';
	}
	
	if($b[0]->content > 4.5&&$countmuted == 1){
		return '<p itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue" content="'.$b[0]->content.'"><span style="color:#f1c40f">&#9733;&#9733;&#9733;&#9733;&#9733;</span> based on <a target="_blank" rel="nofollow" style="color: #337ab7 !important; font-weight: 400;" href="'.$acc.'"><span style="color: #337ab7 !important; font-weight: 400;" itemprop="reviewCount">'.$a[1]->content.'</span> AVVO reviews</a></p><br/>';
	}
	if($b[0]->content > 3.5&&$b[0]->content <= 4.5&&$countmuted == 1){
		return '<p itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue" content="'.$b[0]->content.'"><span style="color:#f1c40f">&#9733;&#9733;&#9733;&#9733;</span> based on <a target="_blank" rel="nofollow" style="color: #337ab7 !important; font-weight: 400;" href="'.$acc.'"><span style="color: #337ab7 !important; font-weight: 400;" itemprop="reviewCount">'.$a[1]->content.'</span> AVVO reviews</a></p><br/>';
	}
	if($b[0]->content > 2.5&&$b[0]->content <= 3.5&&$countmuted == 1){
		return '<p itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue" content="'.$b[0]->content.'"><span style="color:#f1c40f">&#9733;&#9733;&#9733;</span> based on <a target="_blank" rel="nofollow" style="color: #337ab7 !important; font-weight: 400;" href="'.$acc.'"><span style="color: #337ab7 !important; font-weight: 400;" itemprop="reviewCount">'.$a[1]->content.'</span> AVVO reviews</a></p><br/>';
	}
	if($b[0]->content > 1.5&&$b[0]->content <= 2.5&&$countmuted == 1){
		return '<p itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue" content="'.$b[0]->content.'"><span style="color:#f1c40f">&#9733;&#9733;</span> based on <a target="_blank" rel="nofollow" style="color: #337ab7 !important; font-weight: 400;" href="'.$acc.'"><span style="color: #337ab7 !important; font-weight: 400;" itemprop="reviewCount">'.$a[1]->content.'</span> AVVO reviews</a></p><br/>';
	}
	if($b[0]->content > 0.5&&$b[0]->content <= 1.5&&$countmuted == 1){
		return '<p itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue" content="'.$b[0]->content.'"><span style="color:#f1c40f">&#9733;</span> based on <a target="_blank" rel="nofollow" style="color: #337ab7 !important; font-weight: 400;" href="'.$acc.'"><span style="color: #337ab7 !important; font-weight: 400;" itemprop="reviewCount">'.$a[1]->content.'</span> AVVO reviews</a></p><br/>';
	}

	if($b[0]->content > 4.5&&$countmuted == 0||$countmuted == 2){
		return '<p itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue" content="'.$b[0]->content.'"><span style="color:#f1c40f">&#9733;&#9733;&#9733;&#9733;&#9733;</span> based on <a target="_blank" rel="nofollow" style="color: #337ab7 !important; font-weight: 400;" href="'.$acc.'"><span style="color: #337ab7 !important; font-weight: 400;" itemprop="reviewCount">'.$a[0]->content.'</span> AVVO reviews</a></p><br/>';
	}
	if($b[0]->content > 3.5&&$b[0]->content <= 4.5&&$countmuted == 0||$countmuted == 2){
		return '<p itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue" content="'.$b[0]->content.'"><span style="color:#f1c40f">&#9733;&#9733;&#9733;&#9733;</span> based on <a target="_blank" rel="nofollow" style="color: #337ab7 !important; font-weight: 400;" href="'.$acc.'"><span style="color: #337ab7 !important; font-weight: 400;" itemprop="reviewCount">'.$a[0]->content.'</span> AVVO reviews</a></p><br/>';
	}
	if($b[0]->content > 2.5&&$b[0]->content <= 3.5&&$countmuted == 0||$countmuted == 2){
		return '<p itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue" content="'.$b[0]->content.'"><span style="color:#f1c40f">&#9733;&#9733;&#9733;</span> based on <a target="_blank" rel="nofollow" style="color: #337ab7 !important; font-weight: 400;" href="'.$acc.'"><span style="color: #337ab7 !important; font-weight: 400;" itemprop="reviewCount">'.$a[0]->content.'</span> AVVO reviews</a></p><br/>';
	}
	if($b[0]->content > 1.5&&$b[0]->content <= 2.5&&$countmuted == 0||$countmuted == 2){
		return '<p itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue" content="'.$b[0]->content.'"><span style="color:#f1c40f">&#9733;&#9733;</span> based on <a target="_blank" rel="nofollow" style="color: #337ab7 !important; font-weight: 400;" href="'.$acc.'"><span style="color: #337ab7 !important; font-weight: 400;" itemprop="reviewCount">'.$a[0]->content.'</span> AVVO reviews</a></p><br/>';
	}
	if($b[0]->content > 0.5&&$b[0]->content <= 1.5&&$countmuted == 0||$countmuted == 2){
		return '<p itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><span itemprop="ratingValue" content="'.$b[0]->content.'"><span style="color:#f1c40f">&#9733;</span> based on <a target="_blank" rel="nofollow" style="color: #337ab7 !important; font-weight: 400;" href="'.$acc.'"><span style="color: #337ab7 !important; font-weight: 400;" itemprop="reviewCount">'.$a[0]->content.'</span> AVVO reviews</a></p><br/>';
	}
}
if($homerating != $all_rating_options['my_rating_text']){
return "Plugin is not activated";
}
}
}
add_shortcode('rating', 'avvowiserrating_function');

$true_rating_page = 'rating.php';

function true_rating_options() {
	global $true_rating_page;
	add_options_page( 'AVVO Rating', 'AVVO Rating', 'manage_options', $true_rating_page, 'true_option_rating_page');  
}
add_action('admin_menu', 'true_rating_options');
 
function true_option_rating_page(){
	global $true_rating_page;
	?><div class="wrap">
		<h2>Rating plugin activation</h2><br>
		<p><b>Please enter your website URL (<?php echo get_option('home'); ?>)</b></p>
		<form style="margin: 0;
    			     position: relative;
    			     top: -13px;" 
		method="post" enctype="multipart/form-data" action="options.php">
			<?php 
			settings_fields('avvo_rating_options');
			do_settings_sections($true_rating_page);
			?>
			<?php 
				$homerating = get_option('home');
				$all_rating_options = get_option('avvo_rating_options');
				if($all_rating_options == true){
					if($homerating != $all_rating_options['my_rating_text']){
						echo "<span style=\"color:red;\">Wrong URL</span>";
					}
					if($homerating == $all_rating_options['my_rating_text']){
						echo "<span style=\"color:green;\">Thank you for activating the plugin!</span>";
					}
				}
			?>
			<p>By clicking the button you agree that we will receive the URL of your website. We don’t support spam and will not give your website URL to the third parties.</p>
			<p class="submit">  
				<input type="submit" class="button-primary" value="<?php _e('Send email and activate') ?>" />  
			</p>
		</form>
		<p style="position: relative;bottom: 20px;">Also you can subscribe to our <a href='http://wiserbrand.com/email-subscription'>SEO tips.</a></p>
		<?php 
			if($homerating == $all_rating_options['my_rating_text']){
			mail("wiserbrandfeedback@gmail.com", "New website", $all_rating_options['my_rating_text']);
			}
		?>
	</div><?php
}
function avvorating_option_settings() {
	global $true_rating_page;
	register_setting( 'avvo_rating_options', 'avvo_rating_options', 'true_rating_validate_settings' );
 
	add_settings_section( 'true_section_1', '', '', $true_rating_page );
 
	$true_field_params = array(
		'type'      => 'text',
		'id'        => 'my_rating_text',
		'desc'      => '',
		'label_for' => 'my_rating_text'
	);
	add_settings_field( 'my_text_field', '', 'true_option_rating_display_settings', $true_rating_page, 'true_section_1', $true_field_params );
}
add_action( 'admin_init', 'avvorating_option_settings' );

function true_option_rating_display_settings($args) {
	extract( $args );
 
	$option_name = 'avvo_rating_options';
 
	$o = get_option( $option_name );
 
	switch ( $type ) {  
		case 'text':  
			$o[$id] = esc_attr( stripslashes($o[$id]) );
			echo "<input style=\"position: relative;right: 223px;\" class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";  
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
		break;
	}
}

function true_rating_validate_settings($input) {
	foreach($input as $k => $v) {
		$valid_input[$k] = trim($v);
	}
	return $valid_input;
}
?>