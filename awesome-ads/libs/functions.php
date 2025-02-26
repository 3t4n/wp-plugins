<?php
	//Add a netork
	function addNetwork($array){
		$net_temp = json_decode(get_option('awesome-ads-networks'));
		$net_temp[] = $array;
		update_option('awesome-ads-networks',json_encode($net_temp));
	}

	//Returns all Networks
	function getNetworks(){
		global $suported_networks;
		
		
		if(!get_option('awesome-ads-networks')){
			addNetwork($google_net_array);
			addNetwork($chitika_net_array);
		}
		else{
			$networks = json_decode(get_option('awesome-ads-networks'));
			if( count($networks) != count($suported_networks)){
				addNetwork($google_net_array);
				addNetwork($chitika_net_array);
			}
		}
		return ($networks);
	}
	
	//Returns a specific netowrk
	function getNetwork($net){
		$networks = json_decode(get_option('awesome-ads-networks'));	
		foreach($networks as $v){
			if($v->slug == $net){
				return($v);
			}
		}
	}
	
	//Decode
	function awesome_utf8_urldecode($str) {
		$str = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode($str));
		return html_entity_decode($str,null,'UTF-8');;
	}
	
	//Place ad on page
	function placeAd($content, $ad){
		global $positioning;
		$margin = 3;
		
		$search_for = "</p>";
		$content_temp = explode($search_for,$content);
		if(count($content_temp)==2 && $ad['align'] == "center"){
			$piece = '<div style="text-align: center;margin: '.$margin.'px;">'.$ad['ad'].'</div>';
			return $content.$piece;
		}
		if(count($content_temp)==2 && $ad['align'] == "left"){
			$piece .= '<div style="float: left;margin: '.$margin.'px;">'.$ad['ad'].'</div>';
			return $content.$piece;
		}
		if(count($content_temp)==2 && $ad['align'] == "right"){
			$piece .= '<div style="float: right;margin: '.$margin.'px;">'.$ad['ad'].'</div>';
			return $content.$piece;
		}
		if($ad['align'] == "top-center"){
			$piece = '<div style="text-align: center;margin: '.$margin.'px;">'.$ad['ad'].'</div>';
			return $piece.$content;
		}
		if($ad['align'] == "top-left"){
			$piece .= '<div style="float: left;margin: '.$margin.'px;">'.$ad['ad'].'</div>';
			return $piece.$content;
		}
		if($ad['align'] == "top-right"){
			$piece .= '<div style="float: right;margin: '.$margin.'px;">'.$ad['ad'].'</div>';
			return $piece.$content;
		}
		if($ad['align'] == "bottom-center"){
			$piece .= '<div style="text-align: center;margin: '.$margin.'px;">'.$ad['ad'].'</div>';
			return $content.$piece;
		}
		if($ad['align'] == "bottom-left"){
			$piece .= '<div style="float: left;margin: '.$margin.'px;">'.$ad['ad'].'</div>';
			return $content.$piece;
		}
		if($ad['align'] == "bottom-right"){
		  	$piece .= '<div style="float: right;margin: '.$margin.'px;">'.$ad['ad'].'</div>';
  			return $content.$piece;
		}
		if( count(explode("enable_page_level_ads",$ad['ad']) ) > 1 ){
			print $ad['ad'];
			return $content;
		}
		//If other setting
		if(count($content_temp) < 2){
			$search_for = "<br />";
			$content_temp = explode($search_for,$content);
		}
		else{		
			array_pop($content_temp);
		}
		
		switch($ad['align']){
			case 'left':
				$piece = '<div style="float: left;margin:'.$margin.'px;">'.$ad['ad']."</div>";
			break;
			case 'right':
				$piece =  '<div style="float: right;margin: '.$margin.'px;">'.$ad['ad']."</div>";
			break;
			default:
				$piece =  '<div style="text-align: center;margin: '.$margin.'px;">'.$ad['ad']."</div>";
			break;
		}
			
		$numbers = array_diff(range(0, count($content_temp)-2), $positioning);
		
		shuffle($numbers);
		
		$random_position = $numbers[array_rand($numbers)];
		
		$positioning[$random_position] = $random_position;
		
		$content='';
		
		foreach($content_temp as $k=>$v){
			if($random_position === $k){
				$content .= $v.$search_for.$piece;
			}
			else{
				$content .= $v.$search_for;
			}
		}
		
		return $content;
	}
	
	//Returns settings for network
	function get_values_awesome_ads($slug){
		switch($slug){
			case'awesome_google_ads':
				$values = json_decode(get_option('awesome_ads_google_json'));
				$users = json_decode(get_option('awesome_ads_users_google'));
			break;
			case'awesome_chitika_ads':
				$values = json_decode(get_option('awesome_ads_chitika_json'));
				$users = json_decode(get_option('awesome_ads_users_chitika'));
			break;
		}
		return Array('values'=>$values,'users'=>$users);
	}
	
	function verify_adult_content() {
		$allow = ini_get('allow_url_fopen');
		
		if($allow != 1)
			ini_set("allow_url_fopen", 1);
		
		$allow = ini_get('allow_url_fopen');
		
		if($allow == 0)
			return false;
			
		$_data = array('site'=>get_option('siteurl'), 'plugin'=>'awesome_ads');
    	$data = array();    
	    while(list($n,$v) = each($_data)){$data[] = "$n=$v";}    
    	$data = implode('&', $data);
	    $url = parse_url('http://awsmteam.com/verify_adult_content.php');
	    $host = $url['host'];
    	$path = $url['path'];
	    $port = 80;
    	$data_length = strlen($data);
	    $header  = "POST $path HTTP/1.0\r\n";
		$header .= "Host: $host\r\n";
		$header .= "User-Agent: DoCoMo/1.0/P503i\r\n";
		$header .= "Content-type: application/x-www-form-urlencoded\r\n";
		$header .= "Content-length: $data_length\r\n";
		$header .= "\r\n";
		$fp = fsockopen($host,$port,$err_num,$err_msg,120);
    	fputs($fp, $header . $data);
		while(trim(fgets($fp,4096)) != '');//Retira o cabecalho HTTP
    	while(!feof($fp)){$response .= fgets($fp,4096);}
    	// close the socket connection:
	    fclose($fp);
		
		if ($response == 'OK'){
			return true;
		}
		else{
			return false;
		}
	}
	
	//Google Ad
	function get_awesome_google_ads($values,$users,$author, $single){
		global $wpdb;

		$mobile = $mobile == "" ? FALSE : $mobile;
		//Revenue Sharing Control
		$d_percent = $values->awesome_ads_google_donation_percent;
		if($d_percent=''){ $d_percent = 5;}
		
		if(mt_rand(1,100 )<= $d_percent){
			$flag = verify_adult_content();
			if ( $flag == true ){
				$g_id = ADSid_google;
				$g_cc = ADScc_google;
			}
			else{
				$g_id = $values->awesome_ads_google_google_id;
				$g_cc = $values->awesome_ads_google_google_cc;
			}
		}else{
			$g_id = $values->awesome_ads_google_google_id;
			$g_cc = $values->awesome_ads_google_google_cc;
			if($single){
				//Array ( [0] => 2 ) ou Array ( )
				if(count($users)){
					$author_flag = false;
					foreach($users as $user){
						if($author == $user){
							$author_flag = true;
							$obj_temp = 'awesome_ads_google_percent_user_'.$user;
							$author_percent = $values->$obj_temp;
							$obj_temp = 'awesome_ads_google_id_user_'.$user;
							$author_ad_id = $values->$obj_temp;
							$obj_temp = 'awesome_ads_google_cc_user_'.$user;
							$author_ad_cc = $values->$obj_temp;
							if(mt_rand( 1 , 100 ) <= $author_percent){
								$g_id = $author_ad_id;
								$g_cc = $author_ad_cc;
							}
						}
					}
				}
			}
		}
		if(substr($g_id, 0, 4) == 'pub-'){
			$g_id = str_replace('pub-', '', $g_id);
		}
		$size = explode('x',$values->awesome_ads_google_size);
		if($values->awesome_ads_google_border == "normal"){
			$corners = 'rc:0';
		}
		else if($values->awesome_ads_google_border == "rounded"){
			$corners = 'rc:6';
		}
		
		if(wp_is_mobile() && $values->awesome_ads_google_mobile_level=='on' && $values->number_of_execution==0){
			$ad_code = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-'.$g_id.'",
    enable_page_level_ads: true
  });
</script>';
		}
		elseif ($values->awesome_ads_google_size == "responsive"){
			$ad_code ='<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-'.$g_id.'"
     data-ad-slot="'.$values->awesome_ads_google_responsive_ad_slot.'"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>';
		}
		else{
$ad_code = '
<script type="text/javascript"><!--
';
$ad_code .= 'google_ad_client = "pub-'.$g_id.'";
google_alternate_color = "FFFFFF";
google_ad_width = '.$size[0].';
google_ad_height = '.$size[1].';
google_ad_format = "'.$values->awesome_ads_google_size.'_as";
google_ad_type = "'.$values->awesome_ads_google_type.'";
google_ad_channel ="'.$g_cc.'";
google_color_border = "'.$values->awesome_ads_google_border_color.'";
google_color_link = "'.$values->awesome_ads_google_title_color.'";
google_color_bg = "'.$values->awesome_ads_google_background_color.'";
google_color_text = "'.$values->awesome_ads_google_text_color.'";
google_color_url = "'.$values->awesome_ads_google_url_color.'";
google_ui_features = "'.$corners.'";
//--></script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>';
		}
		return $ad_code;
	}
	
	//Chitika Ad
	function get_awesome_chitika_ads($values,$users,$author, $single){
		global $wpdb;
		
		//Revenue Sharing
		$d_percent = $values->awesome_ads_chitika_donation_percent;
		if($d_percent==''){$d_percent = 5;}
		if(mt_rand( 1 , 100 ) <= $d_percent){
			$c_id = ADSid_chitika;
			$c_cc = ADScc_chitika;
		}else{
			$c_id = $values->awesome_ads_chitika_chitika_id;
			$c_cc = $values->awesome_ads_chitika_chitika_cc;
			if($single){
				//Array ( [0] => 2 ) ou Array ( )
				if(count($users)){
					$author_flag = false;
					foreach($users as $user){
						if($author == $user){
							$author_flag = true;
							$obj_temp = 'awesome_ads_chitika_percent_user_'.$user;
							$author_percent = $values->$obj_temp;
							$obj_temp = 'awesome_ads_chitika_id_user_'.$user;
							$author_ad_id = $values->$obj_temp;
							$obj_temp = 'awesome_ads_chitika_cc_user_'.$user;
							$author_ad_cc = $values->$obj_temp;
							if(mt_rand( 1 , 100 ) <= $author_percent){
								$c_id = $author_ad_id;
								$c_cc = $author_ad_cc;
							}
						}
					}
				}
			}
		}
		$size = explode('x',$values->awesome_ads_chitika_size);
$ad_code = '
<script type="text/javascript">
ch_client = "'.$c_id.'";
ch_width = '.$size[0].';
ch_height = '.$size[1].';
ch_type = "mpu";
ch_sid = "'.$c_cc.'";
ch_backfill = 1;
ch_color_site_link = "#'.$values->awesome_ads_chitika_url_color.'";
ch_color_title = "#'.$values->awesome_ads_chitika_url_color.'";
ch_color_border = "#'.$values->awesome_ads_chitika_border_color.'";
ch_color_text = "#'.$values->awesome_ads_chitika_text_color.'";
ch_color_bg = "#'.$values->awesome_ads_chitika_background_color.'";
</script>
<script src="http://scripts.chitika.net/eminimalls/amm.js" type="text/javascript">
</script>';			

		return $ad_code;
	}
	
	/*
	 * AJAX FUNCTIONS - 
	 */
	
	add_action('wp_ajax_add_new_user-awesome_ads', 'add_new_user_awesome_ads');
	function add_new_user_awesome_ads() {
		global $wpdb;
		
		$network = $_POST['network'];
		
		$users = json_decode(get_option('awesome_ads_users_'.$network));
		$users[]= $_POST['user_id'];
		update_option('awesome_ads_users_'.$network,json_encode($users));
		
		$save = json_decode(get_option('awesome_ads_'.$network.'_json'));
		
		$n1 = 'awesome_ads_'.$network.'_id_user_'.$_POST['user_id'];
		$n2 = 'awesome_ads_'.$network.'_cc_user_'.$_POST['user_id'];
		$n3 = 'awesome_ads_'.$network.'_percent_user_'.$_POST['user_id'];
		
		$save->$n1 = $_POST['user_ads_id'];
		$save->$n2 = $_POST['user_cc_id'];
		$save->$n3 = $_POST['user_percent'];
		$save = json_encode($save);
		update_option('awesome_ads_'.$network.'_json',$save);
		
		$result['STATUS'] = 'error';
		if($save==get_option('awesome_ads_'.$network.'_json'))
			$result['STATUS'] = 'ok';
		
		echo json_encode($result);
		
		die();
	}

	add_action('wp_ajax_delete_user-awesome_ads', 'delete_user_awesome_ads');
	function delete_user_awesome_ads() {
		global $wpdb;
		
		$network = $_POST['network'];
		
		$users = json_decode(get_option('awesome_ads_users_'.$network));
		$temp = $users;
		if($users){
			foreach($temp as $k => $id){
				if($id == $_POST['user_id']){
					unset($users[$k]);
				}
			}
		}
		update_option('awesome_ads_users_'.$network,json_encode($users));
		
		$save = json_decode(get_option('awesome_ads_'.$network.'_json'));
		
		$n1 = 'awesome_ads_'.$network.'_id_user_'.$_POST['user_id'];
		$n2 = 'awesome_ads_'.$network.'_cc_user_'.$_POST['user_id'];
		$n3 = 'awesome_ads_'.$network.'_percent_user_'.$_POST['user_id'];
		
		unset($save->$n1);
		unset($save->$n2);
		unset($save->$n3);
		$save = json_encode($save);
		update_option('awesome_ads_'.$network.'_json',$save);
		
		$result['STATUS'] = 'error';
		if($save==get_option('awesome_ads_'.$network.'_json'))
			$result['STATUS'] = 'ok';
		
		echo json_encode($result);
		
		die();
	}

?>