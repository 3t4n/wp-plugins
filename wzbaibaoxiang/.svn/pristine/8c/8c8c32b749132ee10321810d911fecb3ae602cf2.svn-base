<?php
class websitebox{
    function __construct() {
        $websitebox_base = get_option('websitebox_base');
        if(isset($websitebox_base['art_cron']) && $websitebox_base['art_cron']){
            $this->websitebox_art_cron();
        }
      
        if(is_admin()){
            add_action( 'admin_enqueue_scripts', [$this,'websitebox_enqueue'] );
            add_filter('plugin_action_links_'.WEBSITEBOX_NAME, [$this,'websitebox_plugin_action_links']);
            add_action('admin_menu',[$this, 'websitebox_addpages']);
            $this->websitebox_gonggao();
        }
        add_filter( 'wp_handle_upload', [$this,'websitebox_watermark'] );
        register_activation_hook(WEBSITEBOX_FILE, [$this,'websitebox_pluginaction']);
        $this->websitebox_tongji();
    }
    public function websitebox_gonggao(){
        global $wpdb;
        $charset_collate = '';
        if (!empty($wpdb->charset)) {
          $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
        }
        if (!empty( $wpdb->collate)) {
          $charset_collate .= " COLLATE {$wpdb->collate}";
        }
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        if($wpdb->get_var("show tables like '{$wpdb->prefix}websitebox_gonggao'") !=  $wpdb->prefix."websitebox_gonggao"){
            $sql4 = "CREATE TABLE " . $wpdb->prefix . "websitebox_gonggao (
                id bigint NOT NULL AUTO_INCREMENT,
                gid bigint default 0,
                UNIQUE KEY id (id)
            ) $charset_collate;";
            dbDelta($sql4);
        }
        if($wpdb->get_var("show tables like '{$wpdb->prefix}websitebox_backup'") !=  $wpdb->prefix."websitebox_backup"){
            $sql4 = "CREATE TABLE " . $wpdb->prefix . "websitebox_backup (
                id bigint NOT NULL AUTO_INCREMENT,
                time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                url varchar(255) default NULL,
                link varchar(255) default NULL,
                UNIQUE KEY id (id)
            ) $charset_collate;";
            dbDelta($sql4);
        }
    }
    public function websitebox_tongji(){
        $websitebox_tongji = get_option('websitebox_tongji');
        if(!$websitebox_tongji || (isset($websitebox_tongji) && $websitebox_tongji['time']<time()) ){
            $wp_version =  get_bloginfo('version');
            $data = websitebox::websitebox_url(0);
        	$url = "http://wp.seohnzz.com/api/websitebox/index?url={$data}&type=5&url1=".md5($data.'seohnzz.com')."&theme_version=".WEBSITEBOX_VERSION."&php_version=".PHP_VERSION."&wp_version={$wp_version}";
        	$defaults = array(
                'timeout' => 120,
                'connecttimeout'=>120,
                'redirection' => 3,
                'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
                'sslverify' => FALSE,
            );
            $result = wp_remote_get($url,$defaults);
            if($websitebox_tongji!==false){
                update_option('websitebox_tongji',['time'=>time()+7*3600*24]);
            }else{
                add_option('websitebox_tongji',['time'=>time()+7*3600*24]);
            }
        }
    }
    public function websitebox_art_cron(){
        require plugin_dir_path( WEBSITEBOX_FILE ) . 'inc/websitebox_art_cron.php';
    }
    public function websitebox_enqueue($hook){
        if( 'toplevel_page_websitebox' != $hook ) return;
        require plugin_dir_path( WEBSITEBOX_FILE ) . 'assets.php';
        foreach($assets as $key=>$val){
            if($val['type']=='css'){
                 wp_enqueue_style( $val['name'],  plugin_dir_url( WEBSITEBOX_FILE ).'assets/'.$val['url'],false,'','all');
            }elseif($val['type']=='js'){
                wp_enqueue_script( $val['name'], plugin_dir_url( WEBSITEBOX_FILE ).'assets/'.$val['url'], '', '', true);
            }
        }
        wp_register_script('websitebox.js', false, null, false);
        wp_enqueue_script('websitebox.js');
        $url1 = websitebox::websitebox_url(0);
         $websitebox_is_mianze = get_option('websitebox_is_mianze');
         $websitebox_is_mianze = $websitebox_is_mianze?$websitebox_is_mianze:0;
        wp_add_inline_script('websitebox.js', 'var websitebox_wztkj_url="'.plugins_url('wzbaibaoxiang').'",websitebox_nonce="'. wp_create_nonce('websitebox').'",websitebox_ajax="'.esc_url(admin_url('admin-ajax.php')).'",websitebox_is_mianze="'.$websitebox_is_mianze.'";', 'before');

        wp_enqueue_media();
        
        
    }
    public function websitebox_plugin_action_links ( $links) {
        $links[] = '<a href="' . esc_url(admin_url( 'admin.php?page=websitebox' )) . '">设置</a>';
        return $links;
    }
    public  function websitebox_addpages(){
        add_menu_page(__('网站百宝箱','websitebox'), __('网站百宝箱','websitebox'), 'manage_options', 'websitebox', [$this,'websitebox_toplevelpage'] );
        
    }
    public  function websitebox_toplevelpage(){
        echo "<div id='websitebox_wztkj-app'></div>";
    }
    public function websitebox_pluginaction(){
        global $wpdb;
        $charset_collate = '';
        
        if (!empty($wpdb->charset)) {
          $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
        }
    
        if (!empty( $wpdb->collate)) {
          $charset_collate .= " COLLATE {$wpdb->collate}";
        }
        $sql = "CREATE TABLE " . $wpdb->prefix . "websitebox_liuyan (
                id int(10) NOT NULL AUTO_INCREMENT,
                time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                content text NOT NULL,
                UNIQUE KEY id (id)
            ) $charset_collate;";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($sql);
    }
    public function websitebox_watermark($upload){
        $websitebox_shuiyin = get_option('websitebox_shuiyin');
        
        if(isset($websitebox_shuiyin['auto']) && $websitebox_shuiyin['auto']==1){
            
            if($websitebox_shuiyin['type']==3){
                $websitebox_shuiyin['type']=5;
            }elseif($websitebox_shuiyin['type']==4){
                $websitebox_shuiyin['type']=9;
            }elseif($websitebox_shuiyin['type']==5){
                $websitebox_shuiyin['type']=3;
            }elseif($websitebox_shuiyin['type']==2){
                $websitebox_shuiyin['type']=7;
            }
            $this->websitebox_watermark_create($upload['file'],$upload['file'],$websitebox_shuiyin['title'],'30',$websitebox_shuiyin['size'],$websitebox_shuiyin['word'],$websitebox_shuiyin['type']);
        }
        return $upload;
    }
    public function websitebox_watermark_create($imgurl, $newimgurl, $text, $margin='30', $fontSize = '14', $color = '#790000', $point = '1', $font = 'STXINGKA.TTF', $angle = '0', $watermark_margin = '80'){
        $margin = intval($margin);
    	$angle = intval($angle);
   
    	$watermark_margin = intval($watermark_margin);
    	$imageCreateFunArr = array(
    		'image/jpeg' => 'imagecreatefromjpeg', 'image/png' => 'imagecreatefrompng', 'image/gif' => 'imagecreatefromgif'
    	);
    	$imageOutputFunArr = array('image/jpeg' => 'imagejpeg', 'image/png' => 'imagepng', 'image/gif' => 'imagegif');
    	$imgsize = getimagesize($imgurl);
    	
    	if (empty($imgsize)) { return false; }
    	$imgWidth = $imgsize[0];
    	$imgHeight = $imgsize[1];
    
    	$imgMime = $imgsize['mime'];
    	if (!isset($imageCreateFunArr[$imgMime])) { return false; }
    	if (!isset($imageOutputFunArr[$imgMime])) { return false; }
    	$imageCreateFun = $imageCreateFunArr[$imgMime];
    	$imageOutputFun = $imageOutputFunArr[$imgMime];
    	$im = $imageCreateFun($imgurl);
    	
    	$color = explode(',', $this->websitebox_hex2rgb($color));
    	
    	$text_color = imagecolorallocate($im, intval($color[0]), intval($color[1]), intval($color[2]));
    	
    	$point = intval($point) >= 0 && intval($point) <= 10 ? intval($point) : 1;
    	
    	$fontSize = intval($fontSize) > 0 ? intval($fontSize) : 14;
    	$angle = ($angle >= 0 && $angle < 90 || $angle > 270 && $angle < 360) ? $angle : 0;
    	$fontUrl = plugin_dir_path( WEBSITEBOX_FILE ) . 'inc/fonts/STXINGKA.TTF' ;
    	$text = explode('|', $text);
    	$textLength = count($text) - 1;
    	$maxtext = 0;
    	foreach ($text as $val) {
    		$maxtext = strlen($val) > strlen($maxtext) ? $val : $maxtext;
    	}
    	$textSize = imagettfbbox($fontSize, 0, $fontUrl, $maxtext);
    	$textWidth = $textSize[2] - $textSize[1];
    	$textHeight = $textSize[1] - $textSize[7];
    	$lineHeight = $textHeight + 3;
    	if ($textWidth + 40 > $imgWidth || $lineHeight * $textLength + 40 > $imgHeight) { return false; }
    	
    	if ($point == 10) {
    		$position = array('pointLeft' => $margin, 'pointTop' => $margin);
    		if ($angle != 0) {
    			$position = $this->websitebox_SetAngle($angle, $point, $position, $textWidth, $imgHeight);
    		}
    		$x_length = $imgWidth - $margin;
    		$y_length = $imgHeight - $margin;
    		for  ($x = $position['pointLeft']; $x < $x_length; $x++ ) {
    			for ($y = $position['pointTop']; $y < $y_length; $y++) {
    				foreach ($text as $key => $val) {
    					imagettftext($im, $fontSize, $angle, $x, $y + $key * $lineHeight, $text_color, $fontUrl, $val);
    				}
    				$y += ($lineHeight * count($text) + $watermark_margin);
    			}
    			$x += ($textWidth + $watermark_margin);
    		}
    	} else {
    		if ( $point == 0 ) {
    			$point = wp_rand(1, 9);
    		}
    		$position = $this->websitebox_position($point, $imgWidth, $imgHeight, $textWidth, $textLength, $lineHeight, $margin);
    		if ($angle != 0) {
    			$position = $this->websitebox_SetAngle($angle, $point, $position, $textWidth, $imgHeight);
    		}
    		foreach ($text as $key => $val) {
    	    	imagettftext($im, $fontSize, $angle, $position['pointLeft'], $position['pointTop'] + $key * $lineHeight, $text_color, $fontUrl, $val);
    		}
    	}
    	if ( $imgMime == 'image/jpeg' ) {
    		$imageOutputFun($im, $newimgurl, 100);
    	} else {
    		$imageOutputFun($im, $newimgurl);
    	}
    	imagedestroy($im);
    	return $newimgurl;
        
    }
    public function  websitebox_hex2rgb($hexColor) {
    	$color = str_replace('#', '', $hexColor);
    	if (strlen($color) > 3) {
    		$rgb = array(
    			'r' => hexdec(substr($color, 0, 2)),
    			'g' => hexdec(substr($color, 2, 2)),
    			'b' => hexdec(substr($color, 4, 2))
    		);
    	} else {
    		$color = $hexColor;
    		$r = substr($color, 0, 1) . substr($color, 0, 1);
    		$g = substr($color, 1, 1) . substr($color, 1, 1);
    		$b = substr($color, 2, 1) . substr($color, 2, 1);
    		$rgb = array(
    			'r' => hexdec($r),
    			'g' => hexdec($g),
    			'b' => hexdec($b)
    		);
    	}
    	return $rgb['r'].','.$rgb['g'].','.$rgb['b'];
    }
    public function websitebox_SetAngle ( $angle, $point, $position, $textWidth, $imgHeight ) {
    	if ($angle < 90) {
    		$diffTop = ceil(sin(deg2rad($angle)) * $textWidth);
    
    		if (in_array($point, array(1, 2, 3))) {
    			$position['pointTop'] += $diffTop;
    		} elseif (in_array($point, array(4, 5, 6))) {
    			if ($textWidth > ceil($imgHeight / 2)) {
    				$position['pointTop'] += ceil(($textWidth - $imgHeight / 2) / 2);
    			}
    		}
    	} elseif ($angle > 270) {
    		$diffTop = ceil(sin(deg2rad(360 - $angle)) * $textWidth);
    
    		if (in_array($point, array(7, 8, 9))) {
    			$position['pointTop'] -= $diffTop;
    		} elseif (in_array($point, array(4, 5, 6))) {
    			if ($textWidth > ceil($imgHeight / 2)) {
    				$position['pointTop'] = ceil(($imgHeight - $diffTop) / 2);
    			}
    		}
    	}
    	return $position;
    }
    public function websitebox_position($point, $imgWidth, $imgHeight, $textWidth, $textLength, $lineHeight, $margin) {
    	$pointLeft = $margin;
    	$pointTop = $margin;
    	switch ($point) {
    		case 1:
    			$pointLeft = $margin;
    			$pointTop = $margin;
    			break;
    		case 2:
    			$pointLeft = floor(($imgWidth - $textWidth) / 2);
    			$pointTop = $margin;
    			break;
    		case 3:
    			$pointLeft = $imgWidth - $textWidth - $margin;
    			$pointTop = $margin;
    			break;
    		case 4:
    			$pointLeft = $margin;
    			$pointTop = floor(($imgHeight - $textLength * $lineHeight) / 2);
    			break;
    		case 5:
    			$pointLeft = floor(($imgWidth - $textWidth) / 2);
    			$pointTop = floor(($imgHeight - $textLength * $lineHeight) / 2);
    			break;
    		case 6:
    			$pointLeft = $imgWidth - $textWidth - $margin;
    			$pointTop = floor(($imgHeight - $textLength * $lineHeight) / 2);
    			break;
    		case 7:
    			$pointLeft = $margin;
    			$pointTop = $imgHeight - $textLength * $lineHeight - $margin;
    			break;
    		case 8:
    			$pointLeft = floor(($imgWidth - $textWidth) / 2);
    			$pointTop = $imgHeight - $textLength * $lineHeight - $margin;
    			break;
    		case 9:
    			$pointLeft = $imgWidth - $textWidth - $margin;
    			$pointTop = $imgHeight - $textLength * $lineHeight - $margin;
    			break;
    	}
    	return array('pointLeft' => $pointLeft, 'pointTop' => $pointTop);
    }
    public static function websitebox_url($type=0){
        if($type==1){
            $url1 = get_option('siteurl');
            $url1 = parse_url($url1);
            $url1 = $url1['scheme'].'://'.$url1['host'];
            return $url1;
        }else{
            $url1 = get_option('siteurl');
            $url1 = str_replace('https://','',$url1);
            $url1 = str_replace('http://','',$url1);
            $url1 = trim($url1,'/');
            $url1 = explode('/',$url1);
            return $url1[0];
        }
    }
    
}
?>