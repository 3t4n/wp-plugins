<?php
class class_functions {
//  Autor: Eberhard Heber
//  Beschreibung: Functionsklasse um Oberflächenelemente darzustellen und
//                Datei zum Downloadbereitzustellen

// Alle Metadatenfelder abholen
  function get_Meta(){
    global $post;
    $save = array();

    $myposts = get_posts('numberposts=-1');
    foreach($myposts as $post) {
      $custom_field_keys = get_post_custom_keys($post->ID);
      if ($custom_field_keys != null){
	      foreach ( $custom_field_keys as $key => $value ) {
	        $valuet = trim($value);
	        $save[] = $value;
	      }
      }
    }
    
    $save = array_merge(array_unique($save));
		// Filter, sollte man vielleicht auslagern. Nee! :D DB gestützt ...
   	for ($i = 0; $i < count($save); $i ++){
   		if (ereg("_edit_lock", $save[$i])){
   			$save[$i] =	array_pop($save);
   		}
   		if (ereg("_edit_last", $save[$i])){
   			$save[$i] =	array_pop($save);
   		}
   		if (ereg("_rc_cwp_write_panel_id", $save[$i])){
   			$save[$i] =	array_pop($save);
   		}
   		if (ereg("typ", $save[$i])){
   			$save[$i] =	array_pop($save);
   		}
   	}
    return $save;
  }

// Metabox generieren
  function add_Meta_Box(){
    $array = $this->get_Meta();
    $out = '<p>markieren:<input type="radio" name="checkall" onclick="checkedall(true)" /> alle <input type="radio" name="checkall" onclick="checkedall(false)" /> keine</p>
<table>';
    for ($i = 0; $i < count($array); $i ++){
      $out .= '<tr><td><input type="checkbox" name="'.$i.'" value="'.$array[$i].'" /></td><td>'.$array[$i].'</td></tr>';
    }
    $out .= '</table>';
    echo $out;
  }

// Export
  function export_txt($meta_array, $cat){
    global $post;
		$lastposts = array();
		
    $datei = 'export.csv';
    $text = '';
    for ($i = 0; $i < count($meta_array); $i ++){
      $text .= '"'.$meta_array[$i].'"';
      if ($i == count($meta_array)-1){
        $text .= "\n";
      } else {
        $text .= ",";
      }
    }
    
    $lastposts = get_posts(array( 'numberposts' => -1, 'category' => $cat ));
    foreach($lastposts as $post) :
      setup_postdata($post);
      $thePostID = $post->ID;
      $keys = array();
      $custom_field_keys = get_post_custom_keys($thePostID);
        foreach ( $custom_field_keys as $key => $value ) {
          $valuet = trim($value);
            if ( '_' == $valuet{0} )
            continue;
          $keys[] = $value;
        }
        for ($i = 0; $i < count($meta_array); $i ++){
          if ($i == 0){
              $text .= "\"";
          }
          for ($j = 0; $j < count($keys); $j ++){
            if ($keys[$j] == $meta_array[$i]){
              $text .= get_post_meta($thePostID, $meta_array[$i], true);
            }
          }
          if ($i == count($meta_array)-1){
            $text .= "\"\n";
          } else {
            $text .= "\",\"";
          }
        }
    endforeach;
    echo $text;
    print_r($lastposts);
    $this->send_file($datei, utf8_decode($text), 0);
  }
	// datei wird gesendet
  function send_file($file, $content, $type){
    $dir = dirname (__FILE__) . '/down/';
    $handle = fopen( $dir . $file, 'w+');
    fwrite($handle, $content);
    fclose($handle);

    echo '<a href="'. get_option('siteurl') .'/wp-content/plugins/contact-export/down/index.php?type='.$type.'">Datei runterladen</a>';
    //echo '<br /><br /><a href="' . $_SERVER['PHP_SELF'] . '?page=contact-export/' . basename(__FILE__);'" >zurück</a>';
  }

// Export via posts  
  function filter($meta_box){
	 $checked = array();
	 unset($meta_box['checkall']);
	 unset($meta_box['next']);
		for ($i = 0; $i < count($meta_box); $i++){
			for ($j = 0; $j < $_POST['checked_num']; $j ++){
				if ($meta_box[$i] == 'checked'.$j){
					$checked[] = $meta_box[$i];
					unset($meta_box[$i]);
				}
			}
		}
		$meta_box = array_merge(array_unique($meta_box));
		return $meta_box;
  }
  
  function export_via_posts($postID, $meta){
    $dir = dirname (__FILE__) . '/down/';
    $fp = fopen($dir.'export.csv', 'w');
    
    $content = '';
    for ($i = 0; $i < count($meta); $i ++){
      $content .= '"'.$meta[$i].'"';
      if ($i == count($meta)-1){
        $content .= "\r\n";
      } else {
        $content.= ",";
      }
    }
 
    for ($i = 0; $i < count($postID); $i ++){
      for ($k = 0; $k < count($meta); $k ++){
        $content .= '"'.get_post_meta($postID[$i], $meta[$k], true).'"';
        if ($k == count($meta)-1){
          $content .= "\r\n";
        } else {
          $content.= ",";
        }         
      } 
    }
    //echo '<pre>'.$content.'</pre>';

    fwrite($fp, utf8_decode($content));    
    fclose($fp);
    
    echo '<a href="'.get_option('siteurl').'/wp-content/themes/wp-contact-manager/down/export.csv">Datei herunterladen</a>';
  }
  
  
}
?>
